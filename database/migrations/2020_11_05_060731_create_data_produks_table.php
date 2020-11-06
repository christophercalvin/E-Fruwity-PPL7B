<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_produks', function (Blueprint $table) {
                $table->increments ('id');
                $table->string('NamaProduk',50);
                $table->integer('StokProduk');
                $table->text('DeskripsiProduk');
                $table->integer('HargaProduk');
                $table->string('updated_at',100);
                $table->string('created_at',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_produks');
    }
}
