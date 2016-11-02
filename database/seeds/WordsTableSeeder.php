<?php

use Illuminate\Database\Seeder;

class WordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('words')->insert([
            'content' => 'Job',
            'category_id' => 1
        ]);
        DB::table('words')->insert([
            'content' => 'Police',
            'category_id' => 1
        ]);
        DB::table('words')->insert([
            'content' => 'Worker',
            'category_id' => 1
        ]);
        DB::table('words')->insert([
            'content' => 'Teacher',
            'category_id' => 1
        ]);
    }
}
