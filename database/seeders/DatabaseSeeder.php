<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //$this->call()　run()の中で記述するとseederを実行してデータベースにデータを挿入する
        $this->call([
            //UsersTableSeederのクラスrun()が実行される
            UsersTableSeeder::class,
        ]);
    }
}
