<?php

use Illuminate\Database\Seeder;
use App\Store\Country\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     	factory(Country::class, 300)->create();
    }
}
