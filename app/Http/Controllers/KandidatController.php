<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Kandidat;

class KandidatController extends Controller
{
    public function create()
    {
        return view('kandidat.create');
    }

    public function store(Request $request)
    {
        $kandidat = new Kandidat();

        $kandidat->nama = $request->input('nama');
        $kandidat->tempat_lahir = $request->input('tempat_lahir');
        $kandidat->tanggal_lahir = $request->input('tanggal_lahir');
        $kandidat->jenis_kelamin = $request->input('jenis_kelamin');
        $kandidat->alamat = $request->input('alamat');
        $kandidat->email = $request->input('email');

        $kandidat->save();

        return redirect()->route('kandidat.createCriteria', $kandidat->id)->with('success', 'Kandidat berhasil disimpan! Silakan masukkan nilai kriteria.');
    }

    public function createCriteria($id)
    {
        return view('kandidat.create', ['id' => $id]);
    }

    public function storeCriteria(Request $request, $id)
    {
        $validatedData = $request->validate([
            'pengalaman_kerja' => 'required|numeric',
            'pendidikan' => 'required|numeric',
            'kepribadian_dan_keterampilan' => 'required|numeric',
            'referensi' => 'required|numeric',
            'tes_keterampilan' => 'required|numeric',
            'keterampilan' => 'required|numeric',
            'keahlian_teknis' => 'required|numeric',
            'kesesuaian_budaya_perusahaan' => 'required|numeric',
            'wawancara' => 'required|numeric',
        ]);

        $nilai = new Nilai();
        $nilai->kandidat_id = $id;
        $nilai->pengalaman_kerja = $request->input('pengalaman_kerja');
        $nilai->pendidikan = $request->input('pendidikan');
        $nilai->kepribadian_dan_keterampilan = $request->input('kepribadian_dan_keterampilan');
        $nilai->referensi = $request->input('referensi');
        $nilai->tes_keterampilan = $request->input('tes_keterampilan');
        $nilai->keterampilan = $request->input('keterampilan');
        $nilai->keahlian_teknis = $request->input('keahlian_teknis');
        $nilai->kesesuaian_budaya_perusahaan = $request->input('kesesuaian_budaya_perusahaan');
        $nilai->wawancara = $request->input('wawancara');

        $nilai->save();
        // Tambahkan log untuk memastikan nilai tersimpan
        \Log::info('Nilai tersimpan:', $nilai->toArray());

        return redirect()->route('kandidat.rank')->with('success', 'Nilai kriteria berhasil disimpan!');
    }

    public function rank()
    {
        $kandidats = Kandidat::with('nilai')->get();
        $weights = [
            'pengalaman_kerja' => 12.5,
            'pendidikan' => 8.33,
            'kepribadian_dan_keterampilan' => 16.67,
            'referensi' => 8.33,
            'tes_keterampilan' => 4.17,
            'keterampilan' => 8.33,
            'keahlian_teknis' => 8.33,
            'kesesuaian_budaya_perusahaan' => 8.33,
            'wawancara' => 25,
        ];

        foreach ($kandidats as $kandidat) {
            $score = 0;
            if ($kandidat->nilai) {
                foreach ($weights as $criteria => $weight) {
                    $score += $kandidat->nilai->$criteria * ($weight / 100);
                }
            }
            // Tambahkan log untuk memastikan nilai diambil dan skor dihitung
            \Log::info('Kandidat:', $kandidat->toArray());
            \Log::info('Skor kandidat:', ['score' => $score]);
            $kandidat->score = $score;
        }

        $sortedKandidats = $kandidats->sortByDesc('score');

        return view('kandidat.rank', ['kandidats' => $sortedKandidats]);
    }
}
