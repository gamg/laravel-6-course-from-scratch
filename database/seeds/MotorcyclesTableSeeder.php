<?php

use Illuminate\Database\Seeder;

class MotorcyclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Motorcycle', 50)->create();
    }
}
