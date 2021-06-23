<?php

use Illuminate\Database\Seeder;

class DailyCheckQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\DailyCheckQuestion::insert([
            [
                'title'=>'Did you do your \"You\'re Worth It Time\" today?',
            ],
            [
                'title'=>'Did you drink 64 oz. of water?',
            ],
            [
                'title'=>'Did you check in with your accountability partner?',
            ],
            [
                'title'=>'Did you journal?',
            ],
            [
                'title'=>'Did you rate your day?',
            ],
        ]);
    }
}
