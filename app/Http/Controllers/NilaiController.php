<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Kandidat;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'lowongan_id' => 'required|exists:lowongans,id',
            'kandidat_id' => 'required|exists:kandidats,id',
            'pengalaman_kerja' => 'required|integer|min:1|max:100',
            'pendidikan' => 'required|integer|min:1|max:100',
            'kepribadian_keterampilan' => 'required|integer|min:1|max:100',
            'referensi' => 'required|integer|min:1|max:100',
            'tes_keterampilan' => 'required|integer|min:1|max:100',
            'kesesuaian_budaya' => 'required|integer|min:1|max:100',
            'wawancara' => 'required|integer|min:1|max:100',
        ]);

        $totalScore = (
            $validatedData['pengalaman_kerja'] +
            $validatedData['pendidikan'] +
            $validatedData['kepribadian_keterampilan'] +
            $validatedData['referensi'] +
            $validatedData['tes_keterampilan'] +
            $validatedData['kesesuaian_budaya'] +
            $validatedData['wawancara']
        );

        // Calculate the average score
        $nilai = $totalScore / 7;

        // Create a new Nilai record
        Nilai::create([
            'lowongan_id' => $request->lowongan_id,
            'kandidat_id' => $request->kandidat_id,
            'pengalaman_kerja' => $request->pengalaman_kerja,
            'pendidikan' => $request->pendidikan,
            'kepribadian_keterampilan' => $request->kepribadian_keterampilan,
            'referensi' => $request->referensi,
            'tes_keterampilan' => $request->tes_keterampilan,
            'kesesuaian_budaya' => $request->kesesuaian_budaya,
            'wawancara' => $request->wawancara,
            'nilai' => $nilai
        ]);

        $kandidat = Kandidat::findOrFail($request->kandidat_id);

        $kandidat->sudah_dinilai = 1;
        $kandidat->save();

        // Validate the incoming request data
        // $request->validate([
        //     'kandidat_id' => 'required|exists:kandidats,id',
        //     'kriteria' => 'required|array',
        //     'kriteria.*' => 'required|string',
        //     'nilai' => 'required|array',
        //     'nilai.*' => 'required|integer|min:1|max:100',
        // ]);

        // // Loop through each kriteria and nilai to save them
        // foreach ($request->kriteria as $index => $kriteria) {
        //     $nilai = new Nilai();
        //     $nilai->kandidat_id = $request->kandidat_id;
        //     $nilai->kriteria = $kriteria;
        //     $nilai->nilai = $request->nilai[$index];
        //     $nilai->save();
        // }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Nilai kandidat berhasil disimpan.');
    }

    public function getNilai($kandidatId)
    {
        $nilai = DB::table('nilai')->where('kandidat_id', $kandidatId)->first();
    
        // Cek jika nilai tidak ditemukan
        if (!$nilai) {
            return response()->json(['message' => 'Data not found'], 404);
        }
    
        return response()->json($nilai);
    }
    
}
