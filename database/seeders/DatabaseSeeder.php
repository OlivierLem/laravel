<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        DB::table("users")->insert([
            'name' => "utilisateur 1",
            'email' => "utilisateur1@gmail.com",
            "password" => bcrypt("azerty")
        ]);
        DB::table("users")->insert([
            'name' => "utilisateur 2",
            'email' => "utilisateur2@gmail.com",
            "password" => bcrypt("azerty")
        ]);
        DB::table('songs')->insert([
            'title' => 'chanson 1',
            'url' => 'https://file-examples-com.github.io/uploads/2017/11/file_example_MP3_700KB.mp3',
            'user_id' => 1,
            'votes' => 1350
        ]);

        DB::table('songs')->insert([
            'title' => 'chanson numéro deux',
            'url' => 'https://file-examples-com.github.io/uploads/2017/11/file_example_MP3_1MG.mp3',
            'user_id'=>2,
            'votes' => 10050
        ]);

    }
}
