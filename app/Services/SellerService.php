<?php

namespace App\Services;

use Webkul\Core\Models\Channel;
use Webkul\User\Models\Admin;
use Webkul\Category\Models\Category;
use Webkul\Inventory\Models\InventorySource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Exception;

class SellerService
{
    public function createSeller(array $data)
    {
        try {
            DB::beginTransaction();

            $rootCategory = Category::find(1);

            $channel = $this->createChannel($data, $rootCategory);
            $inventorySource = $this->createInventorySource($data['store_name'], $channel);
            $admin = $this->createAdminUser($data, $channel);

            DB::commit();

            return [
                'success' => true,
                'channel' => $channel,
                'admin' => $admin,
                'message' => 'Seller created successfully!'
            ];

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Failed to create seller: ' . $e->getMessage());
            
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    protected function createChannel(array $data, $rootCategory)
    {
        $channel = Channel::create([
            'code' => $data['store_code'],
            'timezone' => null,
            'theme' => $data['theme'] ?? 'default',
            'hostname' => $data['hostname'],
            'logo' => null,
            'favicon' => null,
            'home_seo' => null,
            'is_maintenance_on' => 0,
            'allowed_ips' => null,
            'root_category_id' => $rootCategory->id,
            'default_locale_id' => $data['default_locale_id'] ?? 1,
            'base_currency_id' => $data['base_currency_id'] ?? 1,
        ]);

        // Check if translation exists
        $translationExists = DB::table('channel_translations')
            ->where('channel_id', $channel->id)
            ->where('locale', 'ar')
            ->exists();

        if (!$translationExists) {
            DB::table('channel_translations')->insert([
                'channel_id' => $channel->id,
                'locale' => 'ar',
                'name' => $data['store_name'],
                'description' => $data['description'] ?? null,
                'maintenance_mode_text' => 'We are currently under maintenance.',
                'home_seo' => json_encode([
                    'meta_title' => $data['store_name'],
                    'meta_description' => $data['description'] ?? '',
                    'meta_keywords' => $data['store_name'],
                ]),
            ]);
        } else {
            DB::table('channel_translations')
                ->where('channel_id', $channel->id)
                ->where('locale', 'ar')
                ->update([
                    'name' => $data['store_name'],
                    'description' => $data['description'] ?? null,
                ]);
        }

        // Link all locales
        $locales = DB::table('locales')->get();
        foreach ($locales as $locale) {
            $exists = DB::table('channel_locales')
                ->where('channel_id', $channel->id)
                ->where('locale_id', $locale->id)
                ->exists();
            
            if (!$exists) {
                DB::table('channel_locales')->insert([
                    'channel_id' => $channel->id,
                    'locale_id' => $locale->id,
                ]);
            }
        }

        // Link all currencies
        $currencies = DB::table('currencies')->get();
        foreach ($currencies as $currency) {
            $exists = DB::table('channel_currencies')
                ->where('channel_id', $channel->id)
                ->where('currency_id', $currency->id)
                ->exists();
            
            if (!$exists) {
                DB::table('channel_currencies')->insert([
                    'channel_id' => $channel->id,
                    'currency_id' => $currency->id,
                ]);
            }
        }

        return $channel;
    }

    protected function createInventorySource($storeName, $channel)
    {
        $code = str_replace(' ', '_', strtolower($storeName)) . '_wh_' . time();

        $inventorySource = InventorySource::create([
            'code' => $code,
            'name' => $storeName . ' Warehouse',
            'description' => 'Main warehouse',
            'contact_name' => 'Manager',
            'contact_email' => 'warehouse@example.com',
            'contact_number' => '1234567890',
            'contact_fax' => null,
            'country' => 'EG',
            'state' => 'Cairo',
            'city' => 'Cairo',
            'street' => '123 Main St',
            'postcode' => '11511',
            'priority' => 0,
            'latitude' => null,
            'longitude' => null,
            'status' => 1,
        ]);

        DB::table('channel_inventory_sources')->insert([
            'channel_id' => $channel->id,
            'inventory_source_id' => $inventorySource->id,
        ]);

        return $inventorySource;
    }

    protected function createAdminUser(array $data, $channel)
    {
        // ==========================================
        // SAAS UPDATE: Assign 'Seller' Role (ID: 3)
        // ==========================================
        
        $adminId = DB::table('admins')->insertGetId([
            'name' => $data['admin_name'],
            'email' => $data['admin_email'],
            'password' => Hash::make($data['admin_password']),
            'role_id' => 3,       // <--- CHANGED: 1 (Admin) to 3 (Seller)
            'role' => 'seller',   // <--- ADDED: To match the 'role' column we added
            'channel_id' => $channel->id,
            'status' => 1,
            'image' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // DOUBLE CHECK: Force update channel_id and role again
        DB::table('admins')
            ->where('id', $adminId)
            ->update([
                'channel_id' => $channel->id,
                'role' => 'seller'
            ]);

        Log::info("Admin created with ID: $adminId for channel: {$channel->id} as Seller");

        return Admin::find($adminId);
    }

    public function updateSeller($channelId, array $data)
    {
        try {
            DB::beginTransaction();

            $channel = Channel::findOrFail($channelId);

            // Update channel
            DB::table('channels')
                ->where('id', $channelId)
                ->update([
                    'hostname' => $data['hostname'],
                    'theme' => $data['theme'] ?? 'default',
                    'updated_at' => now(),
                ]);

            // Update translation
            DB::table('channel_translations')
                ->where('channel_id', $channel->id)
                ->where('locale', 'ar')
                ->update([
                    'name' => $data['store_name'],
                ]);

            // Update admin - CRITICAL: Force channel_id to stay
            if (isset($data['admin_email'])) {
                $admin = DB::table('admins')
                    ->where('channel_id', $channel->id)
                    ->first();
                
                if ($admin) {
                    $updateData = [
                        'name' => $data['admin_name'],
                        'email' => $data['admin_email'],
                        'status' => isset($data['status']) ? 1 : 0,
                        'channel_id' => $channel->id, // FORCE IT
                        'updated_at' => now(),
                    ];

                    if (!empty($data['admin_password'])) {
                        $updateData['password'] = Hash::make($data['admin_password']);
                    }

                    DB::table('admins')
                        ->where('id', $admin->id)
                        ->update($updateData);

                    // DOUBLE CHECK: Force channel_id again after update
                    DB::table('admins')
                        ->where('id', $admin->id)
                        ->update(['channel_id' => $channel->id]);

                    Log::info("Admin {$admin->id} updated for channel: {$channel->id}");
                }
            }

            DB::commit();

            return [
                'success' => true,
                'message' => 'Seller updated successfully!'
            ];

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Failed to update seller: ' . $e->getMessage());
            
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    public function deleteSeller($channelId)
    {
        try {
            DB::beginTransaction();

            $channel = Channel::findOrFail($channelId);

            DB::table('admins')->where('channel_id', $channel->id)->delete();
            DB::table('channel_translations')->where('channel_id', $channel->id)->delete();
            DB::table('channel_locales')->where('channel_id', $channel->id)->delete();
            DB::table('channel_currencies')->where('channel_id', $channel->id)->delete();
            DB::table('channel_inventory_sources')->where('channel_id', $channel->id)->delete();

            $channel->delete();

            DB::commit();

            return [
                'success' => true,
                'message' => 'Seller deleted successfully!'
            ];

        } catch (Exception $e) {
            DB::rollBack();
            
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }
}