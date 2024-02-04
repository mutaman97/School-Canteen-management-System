<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartHistortyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_historty', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_code');
            $table->string('parent_code');
            $table->string('card_no');
            $table->string('balance');
            $table->string('balance_before');
            $table->string('balance_after');
            $table->string('balance_date');
            $table->string('balance_time');
            $table->string('user_id');
            $table->string('trx_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_historty');
    }
}
