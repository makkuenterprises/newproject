<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToItemorders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('itemorders')) return;
        Schema::table('itemorders', function (Blueprint $table) {
            $table->string('payment_status')->after('payment_type')->nullable();
            $table->string('transaction_id')->after('payment_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('itemorders', function (Blueprint $table) {
            //
        });
    }
}
