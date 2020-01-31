<?php

use Illuminate\Database\Seeder;

class TweetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Tweets')->insert([
            'content'=> Str::random(250),
            'author' => Str::random(50)
        ]);
    }
}
