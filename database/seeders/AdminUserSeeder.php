<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'projeto.carrosbr@gmail.com')->exists()) {
            User::create([
                'name' => 'admin',
                'email' => 'projeto.carrosbr@gmail.com',
                'password' => Hash::make('12345678'),
            ]);
        }
    }
}
