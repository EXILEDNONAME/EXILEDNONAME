<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void {
        $this->call(Setting\SettingSeeder::class);
        $this->call(Access\RoleSeeder::class);
        $this->call(Access\UserSeeder::class);


    }
}
