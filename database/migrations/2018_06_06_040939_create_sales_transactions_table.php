<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->date('transaction_date')->index();
            $table->string('order_code')->unique();
            $table->string('customer_email');
            $table->integer('sold_quantity')->unsigned();
            $table->integer('total_amount')->unsigned();
            $table->boolean('order_status_id')->default(1);
            $table->integer('user_id')->unsigned()->index();
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
        Schema::dropIfExists('sales_transactions');
    }
}
