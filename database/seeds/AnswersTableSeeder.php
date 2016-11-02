<?php

use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Job
        DB::table('answers')->insert([
            'content' => 'Nghề nghiệp',
            'word_id' => '1',
            'is_correct' => true
        ]);
        DB::table('answers')->insert([
            'content' => 'Sự nghiệp',
            'word_id' => '1',
            'is_correct' => false
        ]);
        DB::table('answers')->insert([
            'content' => 'Thành công',
            'word_id' => '1',
            'is_correct' => false
        ]);
        DB::table('answers')->insert([
            'content' => 'Nông nghiệp',
            'word_id' => '1',
            'is_correct' => false
        ]);

        //Police
        DB::table('answers')->insert([
            'content' => 'Công an',
            'word_id' => '2',
            'is_correct' => true
        ]);
        DB::table('answers')->insert([
            'content' => 'Bộ đội',
            'word_id' => '2',
            'is_correct' => false
        ]);
        DB::table('answers')->insert([
            'content' => 'Lính cứu hỏa',
            'word_id' => '2',
            'is_correct' => false
        ]);
        DB::table('answers')->insert([
            'content' => 'Bác sĩ',
            'word_id' => '2',
            'is_correct' => false
        ]);

        //Worker
        DB::table('answers')->insert([
            'content' => 'Công an',
            'word_id' => '3',
            'is_correct' => true
        ]);
        DB::table('answers')->insert([
            'content' => 'Bộ đội',
            'word_id' => '3',
            'is_correct' => false
        ]);
        DB::table('answers')->insert([
            'content' => 'Lính cứu hỏa',
            'word_id' => '3',
            'is_correct' => false
        ]);
        DB::table('answers')->insert([
            'content' => 'Bác sĩ',
            'word_id' => '3',
            'is_correct' => false
        ]);

        //Teacher
        DB::table('answers')->insert([
            'content' => 'Giáo viên',
            'word_id' => '4',
            'is_correct' => true
        ]);
        DB::table('answers')->insert([
            'content' => 'Học sinh',
            'word_id' => '4',
            'is_correct' => false
        ]);
        DB::table('answers')->insert([
            'content' => 'Bảo vệ',
            'word_id' => '4',
            'is_correct' => false
        ]);
        DB::table('answers')->insert([
            'content' => 'Lao công',
            'word_id' => '4',
            'is_correct' => false
        ]);
    }
}
