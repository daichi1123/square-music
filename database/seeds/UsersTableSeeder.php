<?php

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
        DB::table('users')->insert([
            'last_name' => '山田',
            'first_name' => '太郎',
            'email' => 'test1@example.com',
            'country_id' => '1',
            'age_id' => '1',
            'sex' => '男性',
            'self_introduction' => 'これはテストです。',
            'password' => bcrypt('example1'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'last_name' => '佐藤',
            'first_name' => '一美',
            'email' => 'test2@example.com',
            'country_id' => '1',
            'age_id' => '1',
            'sex' => '女性',
            'self_introduction' => 'これはテストです。',
            'password' => bcrypt('example2'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'last_name' => '徳井',
            'first_name' => '浩一',
            'email' => 'test3@example.com',
            'country_id' => '1',
            'age_id' => '2',
            'sex' => '男性',
            'self_introduction' => 'これはテストです。',
            'password' => bcrypt('example3'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'last_name' => '鈴木',
            'first_name' => '一郎',
            'email' => 'test4@example.com',
            'country_id' => '1',
            'age_id' => '1',
            'sex' => '男性',
            'self_introduction' => 'これはテストです。',
            'password' => bcrypt('example4'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'last_name' => 'Clemens',
            'middle_name' => 'Marshall',
            'first_name' => 'John',
            'email' => 'test5@example.com',
            'country_id' => '11',
            'age_id' => '3',
            'sex' => '男性',
            'self_introduction' => 'This is a test',
            'password' => bcrypt('example5'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'last_name' => 'Evans',
            'middle_name' => 'Louise',
            'first_name' => 'Aurora',
            'email' => 'test6@example.com',
            'country_id' => '10',
            'age_id' => '3',
            'sex' => '女性',
            'self_introduction' => 'This is a test',
            'password' => bcrypt('example6'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'last_name' => 'Villafanñ',
            'first_name' => 'Claudia',
            'email' => 'test7@example.com',
            'country_id' => '2',
            'age_id' => '2',
            'sex' => '女性',
            'self_introduction' => 'Esto es una prueba',
            'password' => bcrypt('example7'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'last_name' => '张',
            'first_name' => '伟',
            'email' => 'test8@example.com',
            'country_id' => '4',
            'age_id' => '4',
            'sex' => '男性',
            'self_introduction' => '这是一个测试',
            'password' => bcrypt('example8'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'last_name' => 'Mancini',
            'first_name' => 'Anna',
            'email' => 'test9@example.com',
            'country_id' => '6',
            'age_id' => '6',
            'sex' => '女性',
            'self_introduction' => 'Questa è una prova',
            'password' => bcrypt('example9'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'last_name' => 'Galois',
            'first_name' => 'Évariste',
            'email' => 'test10@example.com',
            'country_id' => '5',
            'age_id' => '5',
            'sex' => '男性',
            'self_introduction' => "C'est un test",
            'password' => bcrypt('example10'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
