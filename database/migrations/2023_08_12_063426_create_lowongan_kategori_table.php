<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lowongan_kategori', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lowongan_id');
            $table->unsignedBigInteger('kategori_id');
            $table->foreign('lowongan_id')->references('id')->on('lowongan_pekerjaans')->onDelete('cascade');
            $table->foreign('kategori_id')->references('id')->on('kategori_pekerjaans')->onDelete('cascade');
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
        Schema::dropIfExists('lowongan_kategori');
    }
};