<?php

use Illuminate\Database\Seeder;
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
      // mi riferisco alla classe Factory ma con alias Faker
      // mi creo un oggetto faker
      $faker =Faker::create();

      for ($i=0; $i < 20; $i++) {
        $post = new Post();
        // metodo valido nel caso in cui non ho a che fare con un form ad esempio in quanto, non ho un $array

        // $post->title=$faker->sentence();
        // $post->content=$faker->text(2000);
        // $post->author=$faker->firstName. '  '. $faker->lastName;
        // $post->slug= Str::slug($post->title);

// metodo alternativo per popolare con dei faker le mie tabelle, obbligatorio quando uso i form
// in quanto ricevo un array che poi passo tramite il metodo fill e ne faccio il salvataggio nel db
        $titolo = $faker->sentence();
        $dati_post =[
          'title'=>$titolo,
          'content'=>$faker->text(2000),
          'author'=>$faker->firstName. '  '. $faker->lastName,
          'slug'=>Str::slug($post->title)
        ];

        $post->fill($dati_post);

        $post->save();
      }
    }
}
