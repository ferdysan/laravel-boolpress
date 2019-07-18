<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $categorie=['sport', 'tecnologia', 'fantasy', 'gossip', 'comics'];


      for ($i=0; $i < count($categorie); $i++) {

        $category = new Category();

        $dati_post =[
          'name'=>$categorie[$i],
          'slug'=>Str::slug($category->name)
        ];

        $category->fill($dati_post);

        $category->save();
      }

    }
}
