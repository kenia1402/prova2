<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MoviesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            try {
                DB::table('movies')->insert([
                'name' => $faker->sentence(3),
                'synopsis' => $faker->paragraph,
                'year' => $faker->numberBetween(1980, 2023),
                'category' => $faker->randomElement(['Action', 'Drama', 'Comedy', 'Sci-Fi']),
                'cover_image' => $faker->imageUrl(400, 600, 'movies'),
                'trailer_link' => 'https://www.youtube.com/watch?v=' . $faker->regexify('[A-Za-z0-9]{11}'), // Generate a random YouTube video ID
                'created_at' => now(),
                'updated_at' => now(),
                 ]);
                }  catch (\Illuminate\Database\QueryException $e) {
                    dd($e->getMessage());
        }
    }
}
}