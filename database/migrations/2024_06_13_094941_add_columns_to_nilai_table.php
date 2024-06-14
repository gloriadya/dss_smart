<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToNilaiTable extends Migration
{
    public function up()
    {
        Schema::table('nilai', function (Blueprint $table) {
            $table->integer('pengalaman_kerja')->after('kandidat_id');
            $table->integer('pendidikan')->after('pengalaman_kerja');
            $table->integer('kepribadian_keterampilan')->after('pendidikan');
            $table->integer('referensi')->after('kepribadian_keterampilan');
            $table->integer('tes_keterampilan')->after('referensi');
            $table->integer('keterampilan')->after('tes_keterampilan');
            $table->integer('keahlian_teknis')->after('keterampilan');
            $table->integer('kesesuaian_budaya')->after('keahlian_teknis');
            $table->integer('wawancara')->after('kesesuaian_budaya');
        });
    }

    public function down()
    {
        Schema::table('nilai', function (Blueprint $table) {
            $table->dropColumn([
                'pengalaman_kerja',
                'pendidikan',
                'kepribadian_keterampilan',
                'referensi',
                'tes_keterampilan',
                'keterampilan',
                'keahlian_teknis',
                'kesesuaian_budaya',
                'wawancara'
            ]);
        });
    }
}
