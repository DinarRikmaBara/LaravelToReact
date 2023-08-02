<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id('idProduk');
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->references('idUser')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('gambarProduk');
            $table->string('namaProduk');
            $table->enum('jenis', ['makanan', 'minuman'])->nullable()->default('makanan');
            $table->string('harga');
            $table->string('deskripsi');
            $table->enum('statusProduk', ['publish', 'nopublish'])->nullable()->default('nopublish');
            $table->enum('delete', ['true', 'false'])->nullable()->default('false');
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
        Schema::dropIfExists('produk');
    }
}
