<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\Nilai;
use Illuminate\Http\Request;

class KandidatController extends Controller
{
    public function create()
    {
        return view('kandidat.create');
    }
    public function index()
    {
        return view('kandidat.index', ['kandidats' => Kandidat::all()]);
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
        // return redirect()->route('kandidat.createCriteria', $kandidat->id)->with('success', 'Kandidat berhasil disimpan! Silakan masukkan nilai kriteria.')
        
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
    
    public function rank()
    {
        $kandidats = Kandidat::with('nilai')->get();
        $weights  = [
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

        // return response()->json($kandidats, 200);

        // foreach ($kandidats as $kandidat) {
        //     $totalScore = 0;
        //     // if (is_array($kandidat->nilai)) {
        //         // echo(">><<" . strval($totalScore));
        //         foreach ($kandidat->nilai as $nilai) {
        //             // echo(">><<" . strval($totalScore));
        //             if (isset($kriteriaBobot[$nilai['kriteria']])) {
        //                 $totalScore += $nilai->nilai * 1;
        //                 // echo(">>" + $totalScore);
        //             }
        //         }
        //     // }
        //     $kandidat->total_score = $totalScore;
        // }

        // return response()->json($kandidats, 200);
        foreach ($kandidats as $kandidat) {
            $score = 0;
            $maxValues = [];

            // Find maximum and minimum value for each criteria
            foreach ($weights as $criteria => $weight) {
                $maxValues[$criteria] = Nilai::where('kriteria', '=',$criteria)->max('nilai');
                $minValue[$criteria] = Nilai::where('kriteria', '=',$criteria)->min('nilai');
            }

            // Calculate score for each kandidat
            if ($kandidat->nilai) {
                foreach ($kandidat->nilai as $nilai) {
                    // Normalize nilai
                    $normalizedValue = (float) 0;
                    if ( ($nilai->nilai - (float) $minValue[$nilai->kriteria]) != 0){
                        $normalizedValue = 100 * ($nilai->nilai - (float) $minValue[$nilai->kriteria]) / ((float)$maxValues[$nilai->kriteria] -(float) $minValue[$nilai->kriteria]);
                    }

                    // Calculate weighted score

                    $nilaiParameter = 0;
                    foreach ($weights as $criteria => $weight) {
                        if ($criteria === $nilai->kriteria) {
                            $nilaiParameter = $weight;
                            continue;
                        }
                    }
                    $score += $normalizedValue * (float) $nilaiParameter;
                }
            }
            $kandidat->score = $score;
        }
        // foreach ($kandidats as $kandidat) {
        //     $score = 0;
        //     foreach ($kandidat->nilai as $nilai) {
        //         if (isset($weights[$nilai->kriteria])) {
        //             $score += $nilai->nilai * $weights[$nilai->kriteria];
        //         }
        //     }
        //     $kandidat->score = $score;
        // }

        $kandidats = $kandidats->sortByDesc('score');
        // return response()->json($kandidat, 200);

        return view('kandidat.rank', compact('kandidats'));
    }
}