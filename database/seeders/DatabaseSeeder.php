<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory;
use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Database\Seeders\ArticlesTableSeeder;
use Database\Seeders\CommentsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory(10)->create();
        $adminUser = User::create([
            'name' => 'Admin_User',
            'email' => 'admin@example.com',
            'password' => bcrypt('demo'),
        ]);

        $regularUser = User::create([
            'name' => 'Regular_User',
            'email' => 'user@example.com',
            'password' => bcrypt('demo'),
        ]);
        //create roles
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);
        //create permissions
        $editArticlesPermission = Permission::create(['name' => 'edit articles']);
        $editCommemtsPermission = Permission::create(['name' => 'edit comments']);


        //give roles to users
        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();


        //give permissions to roles
        $adminRole->givePermissionTo([$editArticlesPermission]);
        $userRole->givePermissionTo([ $editCommemtsPermission]);

        $adminUser = User::where('email', 'admin@example.com')->first();
        $regularUser = User::where('email', 'user@example.com')->first();

        $adminUser->assignRole($adminRole);
        $regularUser->assignRole($userRole);
      

       
        
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'password' => 'demo',
        // ]);
      
        
       
        $faker = Factory::create();
            $articles=Article::factory(10)->create([
                'title' => fake()->sentence,
                'content' => fake()->paragraph,
                'publication_date'=>fake()->dateTimeBetween('-50 years', '-18 years')->format('Y-m-d'),
            ]);
            foreach ($articles as $article) {
                Comment::factory(1)->create([
                    'body' => $faker->paragraph,
                    'article_id'=>$article->id,
                ]);
                $tags=Tag::factory(2)->create([
                    'name_tag' => $faker->word,
                    'article_id'=>$article->id,
                ]);
                $categorys=Category::factory(2)->create([
                    'name_category' => $faker->word,
                    'article_id'=>$article->id,
                ]);
                foreach ($categorys as $category ) {
                    $article->category()->associate($category->id)->save();
                }
                foreach ($tags as $tag ) {
                    $article->tag()->associate($tag->id)->save();
                }
          
             }
           
    }
}
