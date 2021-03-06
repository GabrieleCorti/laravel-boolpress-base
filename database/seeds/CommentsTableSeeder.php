<?php

use Illuminate\Database\Seeder;
use App\Comment;
use App\Post;
use Faker\Generator as Faker;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $posts = Post::where('published', 1)->get();

        foreach ($posts as $post) {
            // 3. ciclo n volte per creare i commenti
            for ($i = 0; $i < rand(0, 3); $i++) {

                $newComment = new Comment();
                $newComment->post_id = $post->id;
                // 4. in caso di colonna nullable
            
                $newComment->name = $faker->name();

                $newComment->content = $faker->text();
                $newComment->save();
            }
        }    
    }
}
