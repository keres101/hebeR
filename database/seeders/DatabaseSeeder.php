<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Role::create([
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'admin',
            'last_name' => 'admin',
            'DNI' => '87654321',
            'date_of_birth' => '2000-02-22',
            'direction' => 'unknow',
            'email' => 'admin@admin.com',
            'role_id' => 1,
            'password' => Hash::make('admin123')
        ]);
    }
}
