<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('gender');
            $table->string('agama');
            $table->string('golongan_darah')->nullable();
            $table->string('status_perkawinan');
            $table->string('pendidikan');
            $table->string('institusi_pendidikan');
            $table->string('pekerjaan');
            $table->string('telpon');
            $table->string('sayap_pan')->nullable();
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('desa');
            $table->string('rt');
            $table->string('rw');
            $table->string('alamat');
            $table->integer('is_saksi')->nullable();
            $table->string('kode_tps')->nullable();
            $table->text('description')->nullable();
            $table->string('user_created')->nullable();
            $table->string('user_updated')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota');
    }
};