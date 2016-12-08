<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_number', 255);
            $table->decimal('cost', 16, 6);
            $table->integer('qty');
            $table->timestamp('agreement_at');
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')
                ->references('id')->on('clients')
                ->onDelete('cascade');
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')
                ->references('id')->on('status')
                ->onDelete('cascade');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('cascade');
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
        //
    }
}
