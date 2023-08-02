<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKurir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kurir', function (Blueprint $table) {
            $table->id('idKurir');
            $table->string('namaKurir');
            $table->enum('kelamin', ['pria', 'perempuan'])->nullable()->default('pria');
            $table->string('umur');
            $table->string('telepon');
            $table->enum('statusKurir', ['aktif', 'nonaktif'])->nullable()->default('nonaktif');
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
        Schema::dropIfExists('kurir');
    }
}
