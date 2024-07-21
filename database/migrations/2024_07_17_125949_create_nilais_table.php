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
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kandidat_id');
            $table->integer('pengalaman_kerja');
            $table->integer('pendidikan');
            $table->integer('kepribadian_keterampilan');
            $table->integer('referensi');
            $table->integer('tes_keterampilan');
            $table->integer('kesesuaian_budaya');
            $table->integer('wawancara');
            // $table->unsignedBigInteger('kriteria_id');
            // $table->double('nilai', 8, 2);
            $table->timestamps();

            // Foreign keys
            $table->foreign('kandidat_id')->references('id')->on('kandidats');
            // $table->foreign('kriteria_id')->references('id')->on('kriterias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};
