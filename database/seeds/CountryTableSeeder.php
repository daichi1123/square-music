<?php

use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            'id' => '1',
            'country_name' => '日本',
        ]);
        DB::table('countries')->insert([
            'id' => '2',
            'country_name' => 'Argentina',
        ]);
        DB::table('countries')->insert([
            'id' => '3',
            'country_name' => 'Brazil',
        ]);
        DB::table('countries')->insert([
            'id' => '4',
            'country_name' => 'China',
        ]);
        DB::table('countries')->insert([
            'id' => '5',
            'country_name' => 'France',
        ]);
        DB::table('countries')->insert([
            'id' => '6',
            'country_name' => 'Italy',
        ]);
        DB::table('countries')->insert([
            'id' => '7',
            'country_name' => 'Netherlands',
        ]);
        DB::table('countries')->insert([
            'id' => '8',
            'country_name' => 'Republic of Korea',
        ]);
        DB::table('countries')->insert([
            'id' => '9',
            'country_name' => 'Spain',
        ]);
        DB::table('countries')->insert([
            'id' => '10',
            'country_name' => 'United Kingdom',
        ]);
        DB::table('countries')->insert([
            'id' => '11',
            'country_name' => 'United States of America',
        ]); 
    }
}
