<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id('idPesanan');
            $table->unsignedBigInteger('keranjangId');
            $table->foreign('keranjangId')->references('idKeranjang')->on('keranjang')->onDelete('no action')->onUpdate('no action');
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->references('idUser')->on('users')->onDelete('no action')->onUpdate('no action');
            $table->unsignedBigInteger('kurirId')->nullable();
            $table->foreign('kurirId')->references('idKurir')->on('kurir')->onDelete('no action')->onUpdate('no action');
            $table->string('harga');
            $table->enum('statusPesanan', ['perjalanan', 'done'])->nullable()->default('perjalanan');
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
        Schema::dropIfExists('pesanan');
    }
}
