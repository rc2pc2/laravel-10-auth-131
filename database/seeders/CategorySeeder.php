<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Faker\Generator as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryNames = [
            "Politics",
            "News",
            "Science",
            "Sport",
            "Programming",
            "Software",
            "Technology",
            "Math",
            "Art",
            "Literature"
        ];

        foreach ($categoryNames as $name) {
            $newCategory = new Category();
            $newCategory->name = $name;
            $newCategory->save();
        }
    }
}
