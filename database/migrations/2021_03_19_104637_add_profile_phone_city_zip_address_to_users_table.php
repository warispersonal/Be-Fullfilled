<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfilePhoneCityZipAddressToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('profile')->nullable()->after('password');
            $table->string('phone_number')->nullable()->after('profile');
            $table->string('city')->nullable()->after('phone_number');
            $table->string('zipcode')->nullable()->after('city');
            $table->string('street_address')->nullable()->after('zipcode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('profile');
            $table->dropColumn('phone_number');
            $table->dropColumn('city');
            $table->dropColumn('zipcode');
            $table->dropColumn('street_address');
        });
    }
}
