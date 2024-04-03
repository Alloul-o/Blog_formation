<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\Comment;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Database\Seeders\ArticlesTableSeeder;
use Database\Seeders\CommentsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $this->call(ArticlesTableSeeder::class);
        // $this->call(CommentsTableSeeder::class);
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
