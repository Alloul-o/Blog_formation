<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::truncate();

        $faker = Factory::create();
            $articles=Article::factory(10)->create([

                'titre' => $faker->sentence,
                'contenu' => $faker->paragraph,
            ]);
            foreach ($articles as $article) {
                Comment::factory(10)->create([
                    'contenu' => $faker->paragraph,
                    'article_id'=>$article->id,
                ]);
            }
           
    }
}
