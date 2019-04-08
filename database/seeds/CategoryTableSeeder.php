<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Category::class, 8)->create()->each(function($category){
            $boolean = random_int(0,1);
            $ids = range(1,10);
            shuffle($ids);
            if($boolean){
                $sliced = array_slice($ids, 0, 2);

                $category->foods()->attach($sliced);
            }
            
        });
    }
}
