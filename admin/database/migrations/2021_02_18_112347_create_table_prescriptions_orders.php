<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePrescriptionsOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_prescriptions', function (Blueprint $table) {
            $table->id();
            $table->integer('prescription_id');
            $table->integer('user_id');
            $table->string('product_name');
            $table->string('product_price');
            $table->string('total');
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
        Schema::dropIfExists('order_prescriptions');
    }
}
