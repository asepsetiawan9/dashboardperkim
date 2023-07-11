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
        Schema::create('poverties', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->nullable();
            $table->string('nama')->nullable();
            $table->text('alamat')->nullable();
            $table->string('id_kecamatan')->nullable()->default(0);
            $table->string('id_desa')->nullable()->default(0);
            $table->string('tempat_lahir')->nullable();
            $table->string('status')->nullable();
            $table->string('kk')->nullable();
            $table->string('jk')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('tgl')->nullable();
            $table->text('foto_diri')->nullable();
            $table->string('status_pendidikan')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('tempat_tinggal')->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            $table->string('jenis_pekerjaan')->nullable();
            $table->string('sumber_air_minum')->nullable();
            $table->text('foto_rumah')->nullable();
            $table->year('tahun_input')->nullable();
            $table->string('sumber_penerangan_utama')->default(0)->nullable();
            $table->string('bab')->nullable();
            $table->string('status_bantuan')->default(1)->nullable();
            $table->string('tinggi_pondasi_rumah')->nullable();
            $table->integer('jumlah_jiwa')->default(0)->nullable();
            $table->integer('luas_ruangan')->default(0)->nullable();
            $table->string('kondisi_rumah')->nullable();
            $table->integer('status_rumah')->default(0)->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poverties');
    }
};
