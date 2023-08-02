<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMkurir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mkurir', function (Blueprint $table) {
            $table->id('idMk');
            $table->unsignedBigInteger('kurirId');
            $table->foreign('kurirId')->references('idKurir')->on('kurir')->onDelete('cascade')->onUpdate('cascade');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('desa');
            $table->string('dusun');
            $table->string('alamatDetail');
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
        Schema::dropIfExists('mkurir');
    }
}
