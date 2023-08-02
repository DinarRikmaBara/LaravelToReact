<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMSeller extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_seller', function (Blueprint $table) {
            $table->id('idMS');
            $table->unsignedBigInteger('sellerId');
            $table->foreign('sellerId')->references('idSeller')->on('seller')->onDelete('cascade')->onUpdate('cascade');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('desa');
            $table->string('jalan');
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
        Schema::dropIfExists('m_seller');
    }
}
