<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        // % prendo tutte le categorie
        $categoryIds = Category::all()->pluck("id");
        $userIds = User::all()->pluck("id");

        for ($i=0; $i < 50; $i++) {
            $newPost = new Post();
            // % inserisco l'id di una categoria in category_id
            // $newPost->category_id = 1;
            // $newPost->category_id = $faker->randomElement($categories)->id; //? altra possibilita'
            $newPost->category_id = $faker->randomElement($categoryIds);
            $newPost->title = $faker->unique->realTextBetween(5, 30);
            $newPost->user_id = $faker->randomElement($userIds);
            $newPost->content = $faker->realTextBetween(350, 800);
            $newPost->save();
        }
    }
}
