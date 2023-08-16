<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lamars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_loker');
            $table->foreign('id_loker')->references('id')->on('lowongan_pekerjaans')->restrictOnDelete();
            $table->unsignedBigInteger('id_pencari_kerja');
            $table->foreign('id_pencari_kerja')->references('id')->on('profile_users')->restrictOnDelete();
            $table->enum('status', ['pending', 'diterima', 'ditolak']);
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
        Schema::dropIfExists('lamars');
    }
};
