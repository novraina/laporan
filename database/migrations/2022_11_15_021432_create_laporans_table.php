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
        Schema::create('table_laporan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('nim', 15);
            $table->string('nama_peserta', 50);
            $table->string('jurusan', 50);
            $table->string('nip', 15);
            $table->string('nama_instruktur', 50);
            $table->string('materi_pelatihan', 100);
            $table->string('harga', 30);
            $table->timestamps();

            $table->index(['nim', 'nip', 'materi_pelatihan']);
            $table->foreign('nim')->references('nim')->on('table_peserta')->onDelete('cascade');; 
            $table->foreign('nip')->references('nip')->on('table_instruktur')->onDelete('cascade');; 
            $table->foreign('materi_pelatihan')->references('materi_pelatihan')->on('table_kelas')->onDelete('cascade');; 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporans');
    }
};
