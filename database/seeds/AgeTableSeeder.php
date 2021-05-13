<?php

use Illuminate\Database\Seeder;

class AgeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ages')->insert([
            'id' => '1',
            'age_name' => '10代',
        ]);
        DB::table('ages')->insert([
            'id' => '2',
            'age_name' => '20代',
        ]);
        DB::table('ages')->insert([
            'id' => '3',
            'age_name' => '30代',
        ]);
        DB::table('ages')->insert([
            'id' => '4',
            'age_name' => '40代',
        ]);
        DB::table('ages')->insert([
            'id' => '5',
            'age_name' => '50代',
        ]);
        DB::table('ages')->insert([
            'id' => '6',
            'age_name' => '60代',
        ]);
        DB::table('ages')->insert([
            'id' => '7',
            'age_name' => '70代',
        ]); 
    }
}
