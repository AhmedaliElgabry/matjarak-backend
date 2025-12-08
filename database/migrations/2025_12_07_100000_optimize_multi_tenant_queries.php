<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // 1. Ensure orders have channel_id
        if (!Schema::hasColumn('orders', 'channel_id')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->unsignedInteger('channel_id')->nullable()->after('id');
            });

            // Populate from channel_code
            DB::statement("
                UPDATE orders o
                JOIN channels c ON o.channel_code = c.code
                SET o.channel_id = c.id
                WHERE o.channel_id IS NULL
            ");
        }

        // 2. Ensure customers have channel_id
        if (!Schema::hasColumn('customers', 'channel_id')) {
            Schema::table('customers', function (Blueprint $table) {
                $table->unsignedInteger('channel_id')->nullable()->after('id');
            });
        }

        // 3. Add performance indexes
        $this->addIndexIfNotExists('orders', 'channel_id', 'orders_channel_id_index');
        $this->addIndexIfNotExists('customers', 'channel_id', 'customers_channel_id_index');
        
        // Composite indexes for faster queries
        $this->addCompositeIndexIfNotExists('orders', ['channel_id', 'status'], 'orders_channel_status_idx');
        $this->addCompositeIndexIfNotExists('orders', ['channel_id', 'created_at'], 'orders_channel_date_idx');
    }

    public function down()
    {
        if ($this->indexExists('orders', 'orders_channel_id_index')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->dropIndex('orders_channel_id_index');
            });
        }

        if ($this->indexExists('orders', 'orders_channel_status_idx')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->dropIndex('orders_channel_status_idx');
            });
        }

        if ($this->indexExists('orders', 'orders_channel_date_idx')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->dropIndex('orders_channel_date_idx');
            });
        }

        if ($this->indexExists('customers', 'customers_channel_id_index')) {
            Schema::table('customers', function (Blueprint $table) {
                $table->dropIndex('customers_channel_id_index');
            });
        }
    }

    /**
     * Add index if it doesn't exist
     */
    private function addIndexIfNotExists(string $table, string $column, string $indexName): void
    {
        if (!$this->indexExists($table, $indexName)) {
            Schema::table($table, function (Blueprint $table) use ($column, $indexName) {
                $table->index($column, $indexName);
            });
        }
    }

    /**
     * Add composite index if it doesn't exist
     */
    private function addCompositeIndexIfNotExists(string $table, array $columns, string $indexName): void
    {
        if (!$this->indexExists($table, $indexName)) {
            Schema::table($table, function (Blueprint $table) use ($columns, $indexName) {
                $table->index($columns, $indexName);
            });
        }
    }

    /**
     * Check if index exists
     */
    private function indexExists(string $table, string $index): bool
    {
        $results = DB::select("SHOW INDEX FROM {$table} WHERE Key_name = ?", [$index]);
        return !empty($results);
    }
};
