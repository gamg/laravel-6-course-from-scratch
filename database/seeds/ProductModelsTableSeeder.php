<?php

use Illuminate\Database\Seeder;

class ProductModelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\ProductModel', 60)->create();
    }
}
