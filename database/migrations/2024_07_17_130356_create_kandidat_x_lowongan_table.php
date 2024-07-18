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
        Schema::create('kandidat_x_lowongan', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('kandidat_id');
            $table->unsignedBigInteger('lowongan_id');
            $table->unsignedBigInteger('user_created_id')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('user_created_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kandidat_id')->references('id')->on('kandidats')->onDelete('cascade');
            $table->foreign('lowongan_id')->references('id')->on('lowongans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kandidat_x_lowongan');
    }
};
