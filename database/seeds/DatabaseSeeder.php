<?php

use App\Admin;
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
        $this->call([
            TagSeeder::class,
            OrderStatusSeeder::class,
            DailyCheckQuestionSeeder::class
        ]);
        Admin::insert([
            [
                'name'=>'Admin User',
                'email'=>'admin@gmail.com',
                'password'=> \Illuminate\Support\Facades\Hash::make('password'),
            ]
        ]);
    }
}
