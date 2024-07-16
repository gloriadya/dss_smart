<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Kandidat;

class NilaiController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'kandidat_id' => 'required|exists:kandidats,id',
            'kriteria' => 'required|array',
            'kriteria.*' => 'required|string',
            'nilai' => 'required|array',
            'nilai.*' => 'required|integer|min:1|max:100',
        ]);

        // Loop through each kriteria and nilai to save them
        foreach ($request->kriteria as $index => $kriteria) {
            $nilai = new Nilai();
            $nilai->kandidat_id = $request->kandidat_id;
            $nilai->kriteria = $kriteria;
            $nilai->nilai = $request->nilai[$index];
            $nilai->save();
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Nilai kandidat berhasil disimpan.');
    }
}
