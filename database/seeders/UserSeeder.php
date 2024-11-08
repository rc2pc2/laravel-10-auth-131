<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userDatas = [
            [
                "name" => "nina",
                "email" => "nina@gmail.com",
                "password" => "12345678",
            ],
            [
                "name" => "nino",
                "email" => "nino@gmail.com",
                "password" => "12345678"
            ],
            [
                "name" => "ninetta",
                "email" => "ninetta@gmail.com",
                "password" => "12345678",
            ]
        ];

        foreach ($userDatas as $singleUserData) {
            $user = new User();
            $user->name = $singleUserData["name"];
            $user->email = $singleUserData["email"];
            $user->password = Hash::make($singleUserData["password"]);
            $user->save();
        }
    }
}
