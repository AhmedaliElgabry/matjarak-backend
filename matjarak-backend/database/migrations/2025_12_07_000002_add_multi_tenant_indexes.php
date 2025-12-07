<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Index for fast hostname lookup
        Schema::table('channels', function (Blueprint $table) {
            if (!$this->indexExists('channels', 'channels_hostname_index')) {
                $table->index('hostname', 'channels_hostname_index');
            }
        });

        // Index for admin channel lookup
        Schema::table('admins', function (Blueprint $table) {
            if (!$this->indexExists('admins', 'admins_channel_id_index')) {
                $table->index('channel_id', 'admins_channel_id_index');
            }
        });

        // Composite indexes for product_channels (fast filtering)
        Schema::table('product_channels', function (Blueprint $table) {
            if (!$this->indexExists('product_channels', 'product_channels_channel_product_index')) {
                $table->index(['channel_id', 'product_id'], 'product_channels_channel_product_index');
            }
        });
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

    private function indexExists($table, $index)
    {
        $indexes = Schema::getConnection()
            ->getDoctrineSchemaManager()
            ->listTableIndexes($table);
        
        return array_key_exists($index, $indexes);
    }
};