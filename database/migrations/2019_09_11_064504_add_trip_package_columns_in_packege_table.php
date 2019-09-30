<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTripPackageColumnsInPackegeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packeges', function (Blueprint $table) {
            $table->string('basic_dayOne_price')->nullable();
            $table->string('basic_dayTwo_price')->nullable();
            $table->string('basic_dayThree_price')->nullable();
            $table->string('premium_dayOne_price')->nullable();
            $table->string('premium_dayTwo_price')->nullable();
            $table->string('premium_dayThree_price')->nullable();
            $table->string('gold_dayOne_price')->nullable();
            $table->string('gold_dayTwo_price')->nullable();
            $table->string('gold_dayThree_price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('packeges', function (Blueprint $table) {
            //
        });
    }
}
