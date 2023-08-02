<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeranjang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keranjang', function (Blueprint $table) {
            $table->id('idKeranjang');
            $table->unsignedBigInteger('produkId');
            $table->foreign('produkId')->references('idProduk')->on('produk')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->references('idUser')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('jumlahProduk');
            $table->enum('statusKeranjang', ['pending', 'done'])->nullable()->default('pending');
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
        Schema::dropIfExists('keranjang');
    }
}
