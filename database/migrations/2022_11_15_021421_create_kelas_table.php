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
        Schema::create('table_kelas', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('materi_pelatihan', 100);
            $table->string('ruangan', 10);
            $table->string('durasi', 10);
            $table->string('harga', 30);
            $table->timestamps();

            $table->index(['materi_pelatihan']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelas');
    }
};
