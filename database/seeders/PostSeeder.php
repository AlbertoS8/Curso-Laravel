<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Post::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        for ($i=0; $i < 30; $i++) { 
            # code...
            $c = Category::inRandomOrder()->first();
            $title = Str::random(20);
            Post::create([
                'title' => $title, 
                'slug' => Str::slug($title), 
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga doloremque tempora harum ipsa, est molestias expedita excepturi obcaecati hic iusto deleniti, porro numquam voluptatibus eligendi molestiae. Quasi quo et suscipit!', 
                'content' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga doloremque tempora harum ipsa, est molestias expedita excepturi obcaecati hic iusto deleniti, porro numquam voluptatibus eligendi molestiae. Quasi quo et suscipit!',
                'posted' => 'yes', 
                'category_id' => $c->id
            ]);
        }
    }
}
