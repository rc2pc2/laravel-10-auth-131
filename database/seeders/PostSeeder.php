<?php

namespace Database\Seeders;

use App\Models\Post;
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
        for ($i=0; $i < 50; $i++) {
            $newPost = new Post();
            $newPost->title = $faker->unique->realTextBetween(5, 30);
            $newPost->author = $faker->name();
            $newPost->content = $faker->realTextBetween(350, 800);
            $newPost->save();
        }
    }
}
