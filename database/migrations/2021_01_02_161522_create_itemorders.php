<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemorders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('itemorders')) return;
        Schema::create('itemorders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('address')->nullable();
            $table->string('payment_type');
            $table->string('status_code');
            $table->string('status')->default(0);
            $table->string('date')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
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
        Schema::dropIfExists('itemorders');
    }
}
