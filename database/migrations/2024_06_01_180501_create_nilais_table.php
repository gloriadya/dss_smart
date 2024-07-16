<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaisTable extends Migration
{
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kandidat_id')->constrained()->onDelete('cascade');
            $table->integer('pengalaman_kerja')->nullable();
            $table->integer('pendidikan')->nullable();
            $table->integer('kepribadian_dan_keterampilan')->nullable();
            $table->integer('referensi')->nullable();
            $table->integer('tes_keterampilan')->nullable();
            $table->integer('kesesuaian_budaya_perusahaan')->nullable();
            $table->integer('wawancara')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nilais');
    }
}
