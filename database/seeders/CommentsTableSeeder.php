<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Comment::truncate();

        // $faker = Factory::create();
        //     Comment::factory(10)->create([
        //         'body' => $faker->paragraph,
        //     ]);
    }
}
