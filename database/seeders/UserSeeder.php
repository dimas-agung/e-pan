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
        //
        $data = [
            [
                'name' => 'Admin',
                'email' => 'admin',
                'password' => 'admin123',
            ],

        ];

        foreach ($data as $key => $value) {
            $hashPassword = Hash::make($value['password']);
            $user = User::create([
                'name' => $value['name'],
                'email' => $value['email'],
                'password' => $hashPassword,
            ]);
            $users[] = $user;
        }
    }
}