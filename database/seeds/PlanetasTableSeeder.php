<?php

use Illuminate\Database\Seeder;

class PlanetasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Planeta::class, 10)->create();
    }
}
