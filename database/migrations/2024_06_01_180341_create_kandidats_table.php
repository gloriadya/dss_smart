<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKandidatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kandidats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id');
            $table->string('nama');
            $table->string('jurusan');
            $table->string('jenis_kelamin');
            $table->text('alamat');
            $table->string('email');
            $table->string('no_wa');
            $table->string('CV');
            $table->string('portofolio');
            $table->text('pengalaman_kerja');
            $table->boolean('sudah_daftar')->nullable();
            $table->boolean('lolos_berkas')->nullable();
            $table->boolean('sudah_dinilai')->nullable();
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
        Schema::dropIfExists('kandidats');
    }
}
