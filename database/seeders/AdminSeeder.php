<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin PetResQ',
            'email' => 'admin@petresq.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin'
        ]);
    }
}
