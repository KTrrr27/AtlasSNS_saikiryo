<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//DB::の記法を使用できるようにする↓↓
use Illuminate\Support\Facades\DB;
//パスワードの暗号化用↓↓
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //初期データの登録
        DB::table('users')->insert([
            [
                'username' => 'sns001',
                'email' => 'sns001@example.com',
                //暗号化 Hash::make()
                'password' => Hash::make('password001'),
                'bio' => 'sample001text',
                'icon_image' => 'icon001.jpg',
                //テスト用にnow()
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'sns002',
                'email' => 'sns002@example.com',
                //暗号化
                'password' => Hash::make('password002'),
                'bio' => 'sample002text',
                'icon_image' => 'icon002.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'sns003',
                'email' => 'sns003@example.com',
                //暗号化
                'password' => Hash::make('password003'),
                'bio' => 'sample003text',
                'icon_image' => 'icon003.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
