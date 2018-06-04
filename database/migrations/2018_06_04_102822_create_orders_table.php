<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    public $defaultSms = 'Thank you for shopping at JYP Store. Your ordered item(s) is/are ready to claim now. Please proceed to our main branch to claim your order. Thank you!';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sales_transaction_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('message')->default($defaultSms)->nullable();
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
        Schema::dropIfExists('orders');
    }
}
