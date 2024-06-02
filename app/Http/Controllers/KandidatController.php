<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\Nilai;
use Illuminate\Http\Request;

class KandidatController extends Controller
{
    public function index()
    {
        return view('kandidat.index', ['kandidats' => Kandidat::all()]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kandidat_id' => 'required|exists:kandidats,id',
            'kriteria' => 'required|string',
            'nilai' => 'required|integer|min:1|max:100',
        ]);

        $nilai = new Nilai();
        $nilai->kandidat_id = $validatedData['kandidat_id'];
        $nilai->kriteria = $validatedData['kriteria'];
        $nilai->nilai = $validatedData['nilai'];
        $nilai->save();

        return redirect()->back()->with('success', 'Nilai berhasil disimpan.');
    }

    public function calculate()
    {
        $kandidats = Kandidat::with('nilai')->get();
        $kriteriaBobot = [
            'Pengalaman Kerja' => 0.125,
            'Pendidikan' => 0.0833,
            'Kepribadian dan Keterampilan' => 0.1667,
            'Referensi' => 0.0833,
            'Tes Keterampilan' => 0.0417,
            'Keterampilan' => 0.0833,
            'Keahlian Teknis' => 0.0833,
            'Kesesuaian Budaya Perusahaan' => 0.0833,
            'Wawancara' => 0.25,
        ];

        foreach ($kandidats as $kandidat) {
            $totalScore = 0;
            foreach ($kandidat->nilai as $nilai) {
                $totalScore += $nilai->nilai * $kriteriaBobot[$nilai->kriteria];
            }
            $kandidat->total_score = $totalScore;
        }

        $sortedKandidats = $kandidats->sortByDesc('total_score');

        return view('hasil_perankingan', ['kandidats' => $sortedKandidats]);
    }
}
