<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class GenerateQuickSchema extends Command
{
    protected $signature = 'db:quick-schema';
    protected $description = 'Generate quick database schema for debugging (critical tables only)';

    protected $criticalTables = [
        'admins',
        'channels',
        'channel_translations',
        'channel_locales',
        'channel_currencies',
        'channel_inventory_sources',
        'categories',
        'category_translations',
        'product_categories',
        'product_channels',
        'inventory_sources',
        'locales',
        'currencies',
        'roles',
    ];

    public function handle()
    {
        $this->info('🚀 Generating quick schema...');
        
        $content = "# Quick Database Schema\n\n";
        $content .= "**Generated:** " . now()->format('Y-m-d H:i:s') . "\n\n";

        foreach ($this->criticalTables as $table) {
            $this->info("Processing: {$table}");
            
            if (!$this->tableExists($table)) {
                $this->warn("Table {$table} does not exist - skipping");
                continue;
            }

            $content .= "## {$table}\n\n";
            
            // Structure
            $columns = DB::select("DESCRIBE {$table}");
            $content .= "| Column | Type | Null | Key | Default |\n";
            $content .= "|--------|------|------|-----|--------|\n";
            foreach ($columns as $col) {
                $content .= "| {$col->Field} | {$col->Type} | {$col->Null} | {$col->Key} | " . 
                           ($col->Default ?? 'NULL') . " |\n";
            }
            
            // Row count and sample
            $count = DB::table($table)->count();
            $content .= "\n**Rows:** {$count}\n\n";
            
            if ($count > 0 && $count <= 100) {
                $sample = DB::table($table)->limit(5)->get();
                $content .= "**Sample:**\n```json\n";
                $content .= json_encode($sample, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                $content .= "\n```\n\n";
            }
            
            $content .= "---\n\n";
        }

        $filename = 'quick-schema-' . now()->format('Y-m-d-His') . '.md';
        File::put(base_path($filename), $content);
        
        $this->info("✅ Quick schema saved to: {$filename}");
        
        return 0;
    }

    protected function tableExists($table)
    {
        try {
            DB::table($table)->limit(1)->get();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}