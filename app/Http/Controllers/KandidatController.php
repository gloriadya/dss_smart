<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\Kriteria;
use App\Models\Nilai;
use Illuminate\Http\Request;

class KandidatController extends Controller
{
    public function index()
    {
        return response()->json(Kandidat::all());
    }

    public function store(Request $request)
    {
        $kandidat = Kandidat::create($request->all());
        return response()->json($kandidat, 201);
    }

    public function calculate()
    {
        $kandidats = Kandidat::with('nilai.kriteria')->get();
        $kriterias = Kriteria::all();

        $totalBobot = $kriterias->sum('bobot');
        $kriterias->each(function ($item) use ($totalBobot) {
            $item->bobot_normalized = $item->bobot / $totalBobot;
        });

        foreach ($kandidats as $kandidat) {
            $kandidat->total_score = 0;
            foreach ($kandidat->nilai as $nilai) {
                $kandidat->total_score += $nilai->nilai * $nilai->kriteria->bobot_normalized;
            }
        }

        return response()->json($kandidats);
    }
}