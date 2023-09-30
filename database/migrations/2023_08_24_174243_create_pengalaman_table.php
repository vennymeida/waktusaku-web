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
        Schema::create('pengalaman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_pekerjaan');
            $table->string('nama_perusahaan');
            $table->text('alamat')->nullable();
            $table->enum('tipe', ['Fulltime', 'Parttime', 'Freelance', 'Internship']);
            $table->string('gaji')->nullable();
            $table->date('tanggal_mulai');
            $table->date('tanggal_berakhir');
            $table->timestamps();
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengalaman');
    }
};
