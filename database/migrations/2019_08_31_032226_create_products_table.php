<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->integer('quantity')->nullable();
            $table->float('price')->nullable();
            $table->float('promotion')->nullable();
            $table->string('description')->nullable();
            $table->text('content')->nullable();
            $table->string('col_val')->nullable();
            $table->integer('hot')->default(0);
            $table->string('key_word')->nullable();
            $table->integer('id_cate')->nullable();
            $table->integer('id_protype')->nullable();
            $table->integer('status')->default(1);

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
        Schema::dropIfExists('products');
    }
}
