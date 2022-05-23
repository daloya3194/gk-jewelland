<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleTableSeeder::class);

        DB::table('users')->insert([
            'firstname' => 'Admin',
            'lastname' => 'User',
            'email' => 'blackm111@protonmail.ch',
            'role' => 'admin',
            'standard_address' => 1,
            'password' => Hash::make('blackm111@protonmail.ch'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('addresses')->insert([
            'user_id' => 1,
            'firstname' => 'Admin',
            'lastname' => 'User',
            'street' => 'Hennigfeldstraße',
            'house_number' => '7',
            'zip_code' => 44795,
            'city' => 'Bochum',
            'country' => 'Deutschland',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'firstname' => 'Customer',
            'lastname' => 'User',
            'email' => 'blackm@protonmail.ch',
            'role' => 'customer',
            'password' => Hash::make('blackm@protonmail.ch'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('categories')->insert([
            'name' => 'Chain',
            'slug' => 'chain',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('categories')->insert([
            'name' => 'Ring',
            'slug' => 'ring',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('categories')->insert([
            'name' => 'Bracelet',
            'slug' => 'bracelet',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('labels')->insert([
            'name' => 'New',
            'slug' => 'new',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
