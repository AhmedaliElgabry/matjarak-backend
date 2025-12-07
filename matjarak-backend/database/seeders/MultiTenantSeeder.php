<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class MultiTenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Ensure Super Admin Exists & is Unscoped
        $superAdminEmail = 'super@matjarak.test';
        $superAdmin = DB::table('admins')->where('email', $superAdminEmail)->first();

        if ($superAdmin) {
            DB::table('admins')->where('id', $superAdmin->id)->update(['channel_id' => null, 'name' => 'Super Admin']);
            $this->command->info('Super Admin updated.');
        } else {
             // Fallback: look for generic admin to promote
             $existingAdmin = DB::table('admins')->orderBy('id')->first();
             if ($existingAdmin) {
                 DB::table('admins')->where('id', $existingAdmin->id)->update(['channel_id' => null, 'email' => $superAdminEmail, 'name' => 'Super Admin']);
                 $this->command->info('Existing admin promoted to Super Admin.');
             } else {
                 DB::table('admins')->insert([
                     'name' => 'Super Admin',
                     'email' => $superAdminEmail,
                     'password' => Hash::make('admin123'),
                     'role_id' => 1,
                     'status' => 1,
                     'channel_id' => null,
                     'created_at' => Carbon::now(),
                     'updated_at' => Carbon::now(),
                 ]);
                 $this->command->info('Super Admin created.');
             }
        }

        // 2. Create Seller Channels
        $sellers = [
            [
                'code' => 'seller1',
                'name' => 'Seller 1',
                'hostname' => 'seller1.matjarak.test',
                'theme' => 'electronics',
                'email' => 'seller1@matjarak.test',
            ],
            [
                'code' => 'seller2',
                'name' => 'Seller 2',
                'hostname' => 'seller2.matjarak.test',
                'theme' => 'fashion',
                'email' => 'seller2@matjarak.test',
            ],
        ];

        foreach ($sellers as $sellerData) {
            $channelId = $this->createChannel($sellerData);
            $this->createSellerAdmin($sellerData['email'], $channelId, $sellerData['name']);
        }
    }

    protected function createChannel($data)
    {
        $existing = DB::table('channels')->where('code', $data['code'])->first();
        if ($existing) {
            return $existing->id;
        }

        $channelId = DB::table('channels')->insertGetId([
            'code'              => $data['code'],
            'theme'             => $data['theme'], // Assuming theme column exists or ignoring if not mapped yet
            'hostname'          => $data['hostname'],
            'root_category_id'  => 1,
            'default_locale_id' => 1,
            'base_currency_id'  => 1,
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        // Translations
        DB::table('channel_translations')->insert([
            'channel_id' => $channelId,
            'locale'     => 'en',
            'name'       => $data['name'],
            'home_seo'   => json_encode([
                'meta_title'       => $data['name'],
                'meta_description' => $data['name'] . ' Store',
                'meta_keywords'    => $data['name'],
            ]),
        ]);

        // Attach Currencies
        $currencies = DB::table('currencies')->get();
        foreach ($currencies as $currency) {
            DB::table('channel_currencies')->insert([
                'channel_id'  => $channelId,
                'currency_id' => $currency->id,
            ]);
        }

        // Attach Locales
        $locales = DB::table('locales')->get();
        foreach ($locales as $locale) {
            DB::table('channel_locales')->insert([
                'channel_id' => $channelId,
                'locale_id'  => $locale->id,
            ]);
        }

        // Attach Inventory
        DB::table('channel_inventory_sources')->insert([
            'channel_id'          => $channelId,
            'inventory_source_id' => 1,
        ]);

        $this->command->info("Channel {$data['code']} created.");

        return $channelId;
    }

    protected function createSellerAdmin($email, $channelId, $name)
    {
        $existing = DB::table('admins')->where('email', $email)->first();
        if ($existing) {
            DB::table('admins')->where('id', $existing->id)->update(['channel_id' => $channelId]);
            $this->command->info("Admin $email updated with channel ID.");
            return;
        }

        DB::table('admins')->insert([
            'name'       => $name . ' Admin',
            'email'      => $email,
            'password'   => Hash::make('admin123'),
            'role_id'    => 1, // Administrator role
            'status'     => 1,
            'channel_id' => $channelId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $this->command->info("Admin $email created.");
    }
}
