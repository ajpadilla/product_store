<?php

use App\Store\User\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $date = new DateTime;

    	\DB::table('users')->insert([
    		'first_name' => 'Alvaro',
	        'last_name' => 'Padilla',
	        'username' => 'ajpadilla88',
	        'address' => 'Las Delicias',
	        'post_code' => '5001',
	        'country_id' => 1,
	        'phone' => '0416-1342017' ,
	        'active' => 1,
	        'role' => 'admin',
	        'email' => 'ajpadilla88@gmail.com',
	        'password' => bcrypt('123456'),
	        'remember_token' => str_random(10),
            'created_at' => $date->format('Y-m-d h:m:s'),
            'updated_at' => $date->format('Y-m-d h:m:s') 
    	]);
        //factory(User::class, 10)->create();
    }
}
