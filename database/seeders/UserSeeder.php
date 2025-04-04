<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'uwimaanaolivia2000@gmail.com',
            'password' => Hash::make('@Uwimaana13.'),
        ]);
    }
}
