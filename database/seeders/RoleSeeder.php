<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleDatas = [
            [
                "name" => "Superadmin",
                "level" => 100,
            ],[
                "name" => "Admin",
                "level" => 80,
            ],[
                "name" => "Moderator",
                "level" => 50,
            ],[
                "name" => "User",
                "level" => 10,
            ],
        ];

        foreach ($roleDatas as $singleRoleData) {
            $role = new Role();
            $role->name = $singleRoleData["name"];
            $role->level= $singleRoleData["level"];
            $role->save();
        }
    }
}
