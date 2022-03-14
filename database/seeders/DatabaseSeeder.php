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
            'name' => 'Test User',
            'email' => 'blackm111@protonmail.ch',
            'role' => 'admin',
            'password' => Hash::make('blackm111@protonmail.ch'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Test Test',
            'email' => 'blackm@protonmail.ch',
            'role' => 'customer',
            'password' => Hash::make('blackm@protonmail.ch'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('categories')->insert([
            'name' => 'One',
            'slug' => 'one',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('categories')->insert([
            'name' => 'Two',
            'slug' => 'two',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('categories')->insert([
            'name' => 'Three',
            'slug' => 'three',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
