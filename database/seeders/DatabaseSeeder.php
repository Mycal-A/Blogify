<?php

namespace Database\Seeders;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::truncate();
        // Post::truncate();
        // Category::truncate();

        $user=User::factory()->create([
            'name'=>'John Dov'
        ]);
        
        Post::factory(5)->create([
            'user_id'=> $user->id
        ]);

        // $user=User::factory()->create();

        // $personal = Category::create([
        //     'name'=>'Personal',
        //     'slug'=>'personal'
        // ]);

        // $family=Category::create([
        //     'name'=>'Family',
        //     'slug'=>'family'
        // ]);

        // $woek=Category::create([
        //     'name'=>'Work',
        //     'slug'=>'work'
        // ]);
        
        // Post::create([
        //     'user_id'=>$user->id,
        //     'category_id'=>$personal->id,
        //     'title'=>"My Personal Post",
        //     'slug'=>'my-personal-post',
        //     'excerpt'=>'This is Excerpt',
        //     'body'=>'Of course, you may always convert Eloquent models or collections to JSON using their toJson methods; however, Eloquent resources provide more granular and robust control over the JSON serialization of your models and their relationships.',
        // ]);

        // Post::create([
        //     'user_id'=>$user->id,
        //     'category_id'=>$woek->id,
        //     'title'=>"My Work Post",
        //     'slug'=>'my-work-post',
        //     'excerpt'=>'This is Excerpt',
        //     'body'=>'Of course, you may always convert Eloquent models or collections to JSON using their toJson methods; however, Eloquent resources provide more granular and robust control over the JSON serialization of your models and their relationships.',
        // ]);

        // Post::create([
        //     'user_id'=>$user->id,
        //     'category_id'=>$family->id,
        //     'title'=>"My Family Post",
        //     'slug'=>'my-fsmily-post',
        //     'excerpt'=>'This is Excerpt',
        //     'body'=>'Of course, you may always convert Eloquent models or collections to JSON using their toJson methods; however, Eloquent resources provide more granular and robust control over the JSON serialization of your models and their relationships.',
        // ]);
    }
}
