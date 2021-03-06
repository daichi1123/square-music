<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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
            'password' => Hash::make('example1'),
            'country_id' => '1',
            'age_id' => '1',
            'sex' => '男性',
            'self_introduction' => 'これはテストです。',
            'insta_id' => 'instagram',
            'profile_image' => 'public/uploads/ujq7ViES93SNIDAoQfoh4XIg96o0sxlS7IxauHmA.jpg',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'last_name' => '佐藤',
            'first_name' => '一美',
            'email' => 'test2@example.com',
            'password' => Hash::make('example2'),
            'country_id' => '1',
            'age_id' => '1',
            'sex' => '女性',
            'self_introduction' => 'これはテストです。',
            'insta_id' => 'instagram',
            'profile_image' => 'public/uploads/zs4TrgUhlJujEroNdDveNNh431vaLAAidNgX4IuJ.jpg',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'last_name' => '徳井',
            'first_name' => '浩一',
            'email' => 'test3@example.com',
            'password' => Hash::make('example3'),
            'country_id' => '1',
            'age_id' => '2',
            'sex' => '男性',
            'insta_id' => 'instagram',
            'self_introduction' => 'これはテストです。',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'last_name' => '鈴木',
            'first_name' => '一郎',
            'email' => 'test4@example.com',
            'password' => Hash::make('example4'),
            'country_id' => '1',
            'age_id' => '1',
            'sex' => '男性',
            'insta_id' => 'instagram',
            'self_introduction' => 'これはテストです。',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'last_name' => 'Clemens',
            'middle_name' => 'Marshall',
            'first_name' => 'John',
            'email' => 'test5@example.com',
            'password' => Hash::make('example5'),
            'country_id' => '11',
            'age_id' => '3',
            'sex' => '男性',
            'self_introduction' => 'This is a test',
            'profile_image' => 'public/uploads/ib6rE9e8H1hRgqwedk3PbNqjhset5dvhoErfg8U4.jpg',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'last_name' => 'Evans',
            'middle_name' => 'Louise',
            'first_name' => 'Aurora',
            'email' => 'test6@example.com',
            'password' => Hash::make('example6'),
            'country_id' => '10',
            'age_id' => '3',
            'sex' => '女性',
            'insta_id' => 'instagram',
            'profile_image' => 'public/uploads/AQfUuQtgm5az8a4WbNNitmRqPIYuhUtmHtfVifBE.jpg',
            'self_introduction' => 'This is a test',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'last_name' => 'Villafanñ',
            'first_name' => 'Claudia',
            'email' => 'test7@example.com',
            'password' => Hash::make('example7'),
            'country_id' => '2',
            'age_id' => '2',
            'sex' => '女性',
            'self_introduction' => 'Esto es una prueba',
            'profile_image' => 'public/uploads/qyleMZVIM8TmayGKul6jImgRoC1MVXCGNw8r51Gy.jpg',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'last_name' => '张',
            'first_name' => '伟',
            'email' => 'test8@example.com',
            'password' => Hash::make('example8'),
            'country_id' => '4',
            'age_id' => '4',
            'sex' => '男性',
            'insta_id' => 'instagram',
            'self_introduction' => '这是一个测试',
            'profile_image' => 'public/uploads/GC4utimDr8o9pdjSY80Mdg2Y9htOjPUGGQ27q7Pf.jpg',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'last_name' => 'Mancini',
            'first_name' => 'Anna',
            'email' => 'test9@example.com',
            'password' => Hash::make('example9'),
            'country_id' => '6',
            'age_id' => '6',
            'sex' => '女性',
            'insta_id' => 'instagram',
            'profile_image' => 'public/uploads/WnSVApVOWthGv9La5jq7zw36W6eKHsNtAPVRi6nE.jpg',
            'self_introduction' => 'Questa è una prova',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'last_name' => 'Galois',
            'first_name' => 'Évariste',
            'email' => 'test10@example.com',
            'password' => Hash::make('example10'),
            'country_id' => '5',
            'age_id' => '5',
            'sex' => '男性',
            'insta_id' => 'instagram',
            'self_introduction' => "C'est un test",
            'profile_image' => 'public/uploads/VCQYVV4dPPcZZLQToVAcSz7DP8luV8jbxFyiZaWl.jpg',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
