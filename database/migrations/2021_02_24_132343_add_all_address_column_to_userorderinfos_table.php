<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAllAddressColumnToUserorderinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('userorderinfos', function (Blueprint $table) {
           $table->string('fullname')->after('itemorder_id')->nullable();
           $table->string('full_address')->after('fullname')->nullable();
           $table->string('city')->after('full_address')->nullable();
           $table->string('state')->after('city')->nullable();
           $table->string('pin_code')->after('state')->nullable();
           $table->string('phone')->after('pin_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('userorderinfos', function (Blueprint $table) {
            //
        });
    }
}
