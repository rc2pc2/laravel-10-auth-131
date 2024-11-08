<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $userIds = User::all()->pluck("id");

        foreach ($userIds as $userId) {
            $userDetail = new UserDetail();
            $userDetail->user_id = $userId;
            $userDetail->country = $faker->country();
            $userDetail->city = $faker->city();
            $userDetail->bio = $faker->realTextBetween(250, 400);
            $userDetail->image = $faker->imageUrl();
            $userDetail->save();
        }

    }
}
