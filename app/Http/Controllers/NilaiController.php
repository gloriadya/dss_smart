<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai; // Assuming you have a Nilai model
use App\Models\Kandidat; // Assuming you have a Kandidat model

class NilaiController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'kandidat_id' => 'required|exists:kandidats,id',
            'kriteria' => 'required|string',
            'nilai' => 'required|integer|min:1|max:100',
        ]);

        // Create a new Nilai instance and save it to the database
        $nilai = new Nilai();
        $nilai->kandidat_id = $request->kandidat_id;
        $nilai->kriteria = $request->kriteria;
        $nilai->nilai = $request->nilai;
        $nilai->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Nilai kandidat berhasil disimpan.');
    }
}