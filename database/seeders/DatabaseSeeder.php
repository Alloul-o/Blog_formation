<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;
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
                'title' => fake()->sentence,
                'content' => fake()->paragraph,
                'publication_date'=>fake()->dateTimeBetween('-50 years', '-18 years')->format('Y-m-d'),
            ]);
            foreach ($articles as $article) {
                $id=$article->id;
                Comment::factory(3)->create([
                    'body' => $faker->paragraph,
                    'article_id'=>$id,
                ]);
                $tags=Tag::factory(1)->create([
                    'name_tag' => $faker->word,
                    'article_id'=>$id,
                    
                ]);
                $categorys=Category::factory(1)->create([
                    'name_category' => $faker->word,
                    'article_id'=>$id,
                ]);

            //     foreach ($tags as $tag) {
            //         $article->tag()->attach($tag->id);
            //     }

            //     foreach ($categorys as $category) {
            //         $article->category()->attach($category->id);
            //     }
            }
           
    }
}
