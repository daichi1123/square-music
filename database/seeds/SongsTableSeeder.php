<?php

use Illuminate\Database\Seeder;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('songs')->insert([
            'user_id' => '1',
            'url' => '3AUKs91RtPaNaMRcbZlotg?si=79957eb6561f482e',
            'comment' => 'This is a test',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('songs')->insert([
            'user_id' => '2',
            'url' => '5FxvEg7p95V0SjLFzS0fjq?si=08d0b1209c704ed5',
            'comment' => 'This is a test',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('songs')->insert([
            'user_id' => '3',
            'url' => '25ludTSHGTDSF8PZDTVCXV?si=69c592ca3f61449a',
            'comment' => 'This is a test',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('songs')->insert([
            'user_id' => '4',
            'url' => '3YGE2Mj23EsSwiBIshmiGf?si=e7edd73e2fab49b4',
            'comment' => 'This is a test',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('songs')->insert([
            'user_id' => '5',
            'url' => '7s2YEurLG8M0DczYCCEZFj?si=2ac0a6ea39bf4206',
            'comment' => 'This is a test',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('songs')->insert([
            'user_id' => '6',
            'url' => '0rPjoahZA25YpWnllfiVEf?si=d9f70825170f4522',
            'comment' => 'This is a test',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('songs')->insert([
            'user_id' => '7',
            'url' => '7h1qplLHxVgr3uSztUeubt?si=03b81ad09a2a467e',
            'comment' => 'lista de reproducción',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('songs')->insert([
            'user_id' => '8',
            'url' => '10riLAOhLDeTlxYdTSP8An?si=5f2088cd04a24312',
            'comment' => 'lista de reproducción',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('songs')->insert([
            'user_id' => '9',
            'url' => '1NevvUCbNRAPb6OQ3GjMOj?si=64194adbaf204100',
            'comment' => 'lista de reproducción',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
