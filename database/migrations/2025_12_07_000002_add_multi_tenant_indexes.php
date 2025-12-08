<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Index for fast hostname lookup
        if (!$this->indexExists('channels', 'channels_hostname_index')) {
            Schema::table('channels', function (Blueprint $table) {
                $table->index('hostname', 'channels_hostname_index');
            });
        }

        // Index for admin channel lookup
        if (!$this->indexExists('admins', 'admins_channel_id_index')) {
            Schema::table('admins', function (Blueprint $table) {
                $table->index('channel_id', 'admins_channel_id_index');
            });
        }

        // Composite index for product_channels
        if (!$this->indexExists('product_channels', 'product_channels_channel_product_index')) {
            Schema::table('product_channels', function (Blueprint $table) {
                $table->index(['channel_id', 'product_id'], 'product_channels_channel_product_index');
            });
        }
    }

    public function down()
    {
        Schema::table('channels', function (Blueprint $table) {
            $table->dropIndex('channels_hostname_index');
        });

        Schema::table('admins', function (Blueprint $table) {
            $table->dropIndex('admins_channel_id_index');
        });

        Schema::table('product_channels', function (Blueprint $table) {
            $table->dropIndex('product_channels_channel_product_index');
        });
    }

    /**
     * Check if index exists using native MySQL query
     */
    private function indexExists(string $table, string $index): bool
    {
        $results = DB::select("SHOW INDEX FROM {$table} WHERE Key_name = ?", [$index]);
        return !empty($results);
    }
};
