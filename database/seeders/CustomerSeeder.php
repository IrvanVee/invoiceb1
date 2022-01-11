<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($p = 1; $p <= 10; $p++){

        	
        	DB::table('product')->insert([
                'product_name' => $faker->name,
        		'price' => $faker->random_int,
        		'stock' => $faker->random_int
        	]);

        }
    }
}
