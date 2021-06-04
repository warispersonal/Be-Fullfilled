<?php

use App\OrderStatus;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderStatus::insert([
            [
                'name'=>'Shipping',
            ],
            [
                'name'=>'Refund',
            ],
            [
                'name'=>'Complete',
            ]
        ]);
    }
}
