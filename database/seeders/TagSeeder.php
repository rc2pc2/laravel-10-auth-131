<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $categoryNames = [
            "Funny",
            "Sad",
            "New",
            "Happy",
            "Fast",
            "Long-read",
            "Banale",
            "Tranquillo",
            "Lanciafiamme",
            "Marcolanci"
        ];

        foreach ($categoryNames as $name) {
            $newCategory = new Tag();
            $newCategory->name = $name;
            $newCategory->color = $faker->unique()->hexColor();
            $newCategory->save();
        }
    }
}
