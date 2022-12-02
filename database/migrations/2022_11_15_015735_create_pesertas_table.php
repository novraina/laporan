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
        Schema::create('table_peserta', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 15);
            $table->string('nama_peserta', 50);
            $table->string('jurusan', 50);
            $table->string('materi_pelatihan', 50);
            $table->timestamps();

            $table->index(['nim']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesertas');
    }
};
