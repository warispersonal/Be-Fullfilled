<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropProductColumnFromOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            if (Schema::hasColumn('orders', 'price')){
                $table->dropColumn('price');
            }
            if (Schema::hasColumn('orders', 'product_id')){
                $table->dropColumn('product_id');
            }
            if (Schema::hasColumn('orders', 'quantity')){
                $table->dropColumn('quantity');
            }
            if (Schema::hasColumn('orders', 'total_price')){
                $table->dropColumn('total_price');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
