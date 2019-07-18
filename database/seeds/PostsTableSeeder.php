<?php
use Illuminate\Database\Seeder;
// importo la classe factory per generare i miei contenuti faker
use Faker\Factory as Faker;
use App\Post;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // inizializziamo una variabile con un oggetto faker
        $faker = Faker::create();


        for ($i=0; $i < 10; $i++) {
           $post = new Post();


           $dati_post=[
             'title'=> $faker->sentence(),
             'content'=>$faker->text(2000),
             'author'=>$faker->firstName.'   '.$faker->lastname,
             'slug'=>Str::slug($post->title)
           ];

           $post->fill($dati_post);
           $post->save();
        }
    }
}
