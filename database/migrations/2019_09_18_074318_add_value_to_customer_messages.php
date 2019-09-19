<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddValueToCustomerMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer_messages', function (Blueprint $table) {
            $table->unsignedInteger('id_user')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone', 20);
            $table->string('subject')->nullable();
            $table->string('message');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customer_messages', function (Blueprint $table) {
            //
        });
    }
}
