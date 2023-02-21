<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(1)->create(['email' => 'testadmin1@mail.com', 'role' => 'admin', 'password' => Hash::make('adminpassword')]);
        User::factory(1)->create(['email' => 'testuser1@mail.com', 'role' => 'user', 'password' => Hash::make('userpassword')]);
    }
}
