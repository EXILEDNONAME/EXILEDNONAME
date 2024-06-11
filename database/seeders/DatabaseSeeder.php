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

        \App\Models\User::factory()->create([
            'name' => 'Administrator',
            'phone' => '08112448111',
            'username' => 'administrator',
            'address' => NULL,
            'email' => 'admin@exilednoname.com',
            'password' => '$2y$12$tGhu0lq9skDaUWT/O3pHGO4IUbPuU7PDij2javbQuFY.PUxv6Li.2',

        ]);
    }
}
