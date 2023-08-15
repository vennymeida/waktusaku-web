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
        Schema::create('lowongan_pekerjaans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('profile_users')->restrictOnDelete();
            $table->unsignedBigInteger('id_perusahaan');
            $table->foreign('id_perusahaan')->references('id')->on('perusahaan')->restrictOnDelete();
            // $table->unsignedBigInteger('id_kategori');
            // $table->foreign('id_kategori')->references('id')->on('kategori_pekerjaans')->restrictOnDelete();
            $table->string('judul');
            $table->text('deskripsi');
            $table->text('requirement');
            $table->enum('tipe_pekerjaan', ['remote', 'onsite']);
            $table->enum('min_pendidikan', ['SMA', 'SMK', 'SMA/SMK', 'S1']);
            $table->enum('min_pengalaman', ['Tidak ada', 'Kurang dari setahun', 'Lebih dari setahun']);
            $table->string('lokasi');
            $table->integer('gaji_bawah');
            $table->integer('gaji_atas');
            $table->integer('jumlah_pelamar');
            $table->date('tutup');
            $table->enum('status', ['pending', 'dibuka', 'ditutup']);
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
        Schema::dropIfExists('lowongan_pekerjaans');
    }
};