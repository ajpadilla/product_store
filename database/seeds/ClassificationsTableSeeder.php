<?php

use Illuminate\Database\Seeder;
use App\Store\Classification\Classification;

class ClassificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(Classification::class, 10)->create();
    }
}
