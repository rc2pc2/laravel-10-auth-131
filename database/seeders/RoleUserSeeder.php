<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $users = User::all();
        $roleIds = Role::all()->pluck("id");

        foreach ($users as $index => $user) {
            if($index === 0){
                $user->roles()->sync([1,2]);
            } else {
                $user->roles()->sync($faker->randomElement($roleIds));
            }
        }

    }
}
