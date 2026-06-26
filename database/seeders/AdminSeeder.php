<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Pesantren',
            'email' => 'admin@pesantren.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Staff Pesantren',
            'email' => 'staff@pesantren.com',
            'password' => Hash::make('staff123'),
            'role' => 'staff',
        ]);
    }
}