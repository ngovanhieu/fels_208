<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'career',
            'description' => "A Career is an individual's journey through learning, work.",
            'photo' => 'user_files/category/category.png',
        ]);
    }
}
