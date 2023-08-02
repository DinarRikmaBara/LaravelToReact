<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('idUser');
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('statusUser', ['aktif', 'banned'])->nullable()->default('aktif');
            $table->enum('role', ['costumer', 'seller','kurir'])->nullable()->default('costumer');
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
        Schema::dropIfExists('users');
    }
}
