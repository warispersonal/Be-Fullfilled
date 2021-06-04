<?php

use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::insert([
            [
                'name'=>'Free Content',
            ],
            [
                'name'=>'Paid',
            ],
            [
                'name'=>'Popular',
            ],
            [
                'name'=>'Top on list',
            ],
        ]);
    }
}
