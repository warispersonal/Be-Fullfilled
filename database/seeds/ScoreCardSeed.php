<?php


use App\ScoreCard;
use Illuminate\Database\Seeder;

class ScoreCardSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ScoreCard::insert([
            [
                'title'=>'FOCUS',
                'color'=>'#ABFAB7',
            ],
            [
                'title'=>'SLEEP',
                'color'=>'#E79EFD',
            ],
            [
                'title'=>'RELATIONSHIPS',
                'color'=>'#F2637E',
            ],
            [
                'title'=>'EXERCISE',
                'color'=>'#88CAFD',
            ],
            [
                'title'=>'NUTRITION',
                'color'=>'#ABB3FA',
            ],
            [
                'title'=>'ME TIME',
                'color'=>'#FAABAB',
            ],
            [
                'title'=>'CREATIVITY',
                'color'=>'#ECE49C',
            ],
            [
                'title'=>'GRATITUDE',
                'color'=>'#C1EE88',
            ]
        ]);
    }
}
