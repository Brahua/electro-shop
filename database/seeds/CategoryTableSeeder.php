<?php

use Illuminate\Database\Seeder;
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
    	Category::truncate();

        $category = new Category();
        $category->name = 'Laptops';
        $category->description = 'Todo tipo de computadoras portátiles.';
        $category->save();

        $category = new Category();
        $category->name = 'Accesorios';
        $category->description = 'Todo tipo de accesorios electrónicos.';
        $category->save();

        $category = new Category();
        $category->name = 'Cámaras';
        $category->description = 'Todo tipo de cámaras de video.';
        $category->save();

    }
}
