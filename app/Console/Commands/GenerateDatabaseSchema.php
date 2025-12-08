<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class GenerateDatabaseSchema extends Command
{
    protected $signature = 'db:schema-export {--output=database-schema.md}';
    protected $description = 'Export complete database schema with structure, relationships, and sample data';

    public function handle()
    {
        $this->info('🔍 Analyzing database structure...');
        
        // FIX: Changed getOption() to option()
        $output = $this->option('output');
        
        $databaseName = config('database.connections.mysql.database');
        
        $content = $this->generateSchemaDocumentation($databaseName);
        
        File::put(base_path($output), $content);
        
        $this->info("✅ Database schema exported to: {$output}");
        $this->info("📊 Total size: " . number_format(strlen($content) / 1024, 2) . " KB");
        
        return 0;
    }

    protected function generateSchemaDocumentation($databaseName)
    {
        $content = "# Database Schema Documentation\n\n";
        $content .= "**Database:** `{$databaseName}`\n";
        $content .= "**Generated:** " . now()->format('Y-m-d H:i:s') . "\n";
        $content .= "**Laravel Version:** " . app()->version() . "\n\n";
        $content .= "---\n\n";

        // Table of Contents
        $content .= "## 📋 Table of Contents\n\n";
        $tables = $this->getAllTables();
        foreach ($tables as $table) {
            $content .= "- [{$table}](#{$table})\n";
        }
        $content .= "\n---\n\n";

        // Summary Statistics
        $content .= "## 📊 Database Statistics\n\n";
        $content .= "| Metric | Value |\n";
        $content .= "|--------|-------|\n";
        $content .= "| Total Tables | " . count($tables) . " |\n";
        
        $totalRows = 0;
        foreach ($tables as $table) {
            $count = DB::table($table)->count();
            $totalRows += $count;
        }
        $content .= "| Total Rows | " . number_format($totalRows) . " |\n\n";
        $content .= "---\n\n";

        // Critical Tables Overview
        $content .= "## 🔑 Critical Tables Overview\n\n";
        $criticalTables = [
            'admins' => 'Admin users and their channel assignments',
            'channels' => 'Multi-tenant channels/stores',
            'channel_translations' => 'Channel names and descriptions per locale',
            'channel_locales' => 'Locales linked to channels',
            'channel_currencies' => 'Currencies linked to channels',
            'channel_inventory_sources' => 'Inventory sources for each channel',
            'categories' => 'Product categories',
            'category_translations' => 'Category names per locale',
            'products' => 'Products',
            'product_channels' => 'Products linked to channels',
            'product_categories' => 'Products linked to categories',
            'inventory_sources' => 'Warehouse/inventory locations',
            'locales' => 'Available languages',
            'currencies' => 'Available currencies',
            'roles' => 'User roles and permissions',
        ];

        $content .= "| Table | Purpose | Row Count |\n";
        $content .= "|-------|---------|----------|\n";
        foreach ($criticalTables as $table => $purpose) {
            if (in_array($table, $tables)) {
                $count = DB::table($table)->count();
                $content .= "| `{$table}` | {$purpose} | {$count} |\n";
            }
        }
        $content .= "\n---\n\n";

        // Detailed table documentation
        $content .= "## 📑 Detailed Table Schemas\n\n";
        
        foreach ($tables as $table) {
            $this->info("Processing table: {$table}");
            $content .= $this->documentTable($table, $databaseName);
        }

        // Relationships Map
        $content .= "## 🔗 Key Relationships\n\n";
        $content .= $this->documentRelationships();

        return $content;
    }

    protected function getAllTables()
    {
        $tables = DB::select('SHOW TABLES');
        $dbName = 'Tables_in_' . config('database.connections.mysql.database');
        
        return array_map(function($table) use ($dbName) {
            return $table->$dbName;
        }, $tables);
    }

    protected function documentTable($table, $databaseName)
    {
        $content = "### {$table}\n\n";

        // Row count
        $rowCount = DB::table($table)->count();
        $content .= "**Rows:** {$rowCount}\n\n";

        // Column structure
        $content .= "#### Structure\n\n";
        $content .= "| Column | Type | Nullable | Default | Key | Extra |\n";
        $content .= "|--------|------|----------|---------|-----|-------|\n";

        $columns = DB::select("DESCRIBE {$table}");
        foreach ($columns as $column) {
            $content .= "| `{$column->Field}` | {$column->Type} | {$column->Null} | " . 
                       ($column->Default ?? 'NULL') . " | {$column->Key} | {$column->Extra} |\n";
        }
        $content .= "\n";

        // Indexes
        $indexes = DB::select("SHOW INDEXES FROM {$table}");
        if (count($indexes) > 0) {
            $content .= "#### Indexes\n\n";
            $content .= "| Key Name | Column | Unique | Type |\n";
            $content .= "|----------|--------|--------|------|\n";
            
            $processedIndexes = [];
            foreach ($indexes as $index) {
                $key = $index->Key_name;
                if (!in_array($key, $processedIndexes)) {
                    $unique = $index->Non_unique == 0 ? 'Yes' : 'No';
                    $content .= "| {$index->Key_name} | {$index->Column_name} | {$unique} | {$index->Index_type} |\n";
                    $processedIndexes[] = $key;
                }
            }
            $content .= "\n";
        }

        // Foreign Keys
        $foreignKeys = DB::select("
            SELECT 
                CONSTRAINT_NAME,
                COLUMN_NAME,
                REFERENCED_TABLE_NAME,
                REFERENCED_COLUMN_NAME
            FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
            WHERE TABLE_SCHEMA = '{$databaseName}'
            AND TABLE_NAME = '{$table}'
            AND REFERENCED_TABLE_NAME IS NOT NULL
        ");

        if (count($foreignKeys) > 0) {
            $content .= "#### Foreign Keys\n\n";
            $content .= "| Constraint | Column | References | Referenced Column |\n";
            $content .= "|------------|--------|------------|------------------|\n";
            foreach ($foreignKeys as $fk) {
                $content .= "| {$fk->CONSTRAINT_NAME} | `{$fk->COLUMN_NAME}` | `{$fk->REFERENCED_TABLE_NAME}` | `{$fk->REFERENCED_COLUMN_NAME}` |\n";
            }
            $content .= "\n";
        }

        // Sample data (first 3 rows)
        if ($rowCount > 0 && $rowCount <= 1000) {
            $sampleData = DB::table($table)->limit(3)->get();
            if ($sampleData->isNotEmpty()) {
                $content .= "#### Sample Data (First 3 Rows)\n\n";
                $content .= "```json\n";
                $content .= json_encode($sampleData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                $content .= "\n```\n\n";
            }
        } elseif ($rowCount > 1000) {
            $content .= "#### Sample Data\n\n";
            $content .= "*Table has {$rowCount} rows - sample data omitted for large tables*\n\n";
        }

        $content .= "---\n\n";

        return $content;
    }

    protected function documentRelationships()
    {
        $content = "### Core Multi-Tenant Relationships\n\n";
        $content .= "```\n";
        $content .= "channels (1) -----> (many) admins [via channel_id]\n";
        $content .= "channels (1) -----> (many) channel_translations [via channel_id]\n";
        $content .= "channels (many) <---> (many) locales [via channel_locales]\n";
        $content .= "channels (many) <---> (many) currencies [via channel_currencies]\n";
        $content .= "channels (many) <---> (many) inventory_sources [via channel_inventory_sources]\n";
        $content .= "channels (1) -----> (1) categories [via root_category_id]\n";
        $content .= "\n";
        $content .= "categories (1) -----> (many) category_translations [via category_id]\n";
        $content .= "categories (many) <---> (many) products [via product_categories]\n";
        $content .= "\n";
        $content .= "products (many) <---> (many) channels [via product_channels]\n";
        $content .= "products (many) <---> (many) categories [via product_categories]\n";
        $content .= "\n";
        $content .= "admins (many) -----> (1) roles [via role_id]\n";
        $content .= "admins (many) -----> (1) channels [via channel_id]\n";
        $content .= "  - channel_id = NULL → Super Admin\n";
        $content .= "  - channel_id = value → Seller Admin\n";
        $content .= "```\n\n";

        $content .= "### Important Notes\n\n";
        $content .= "- **Multi-tenancy:** Sellers are isolated by `channel_id`\n";
        $content .= "- **Super Admin:** Identified by `admins.channel_id = NULL`\n";
        $content .= "- **Categories:** Global (not channel-specific in structure)\n";
        $content .= "- **Products:** Linked to channels via `product_channels` pivot table\n";
        $content .= "- **Translations:** Most entities support multi-language via separate translation tables\n\n";

        return $content;
    }
}