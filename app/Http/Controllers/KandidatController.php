<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
=======
use App\Models\Kandidat;
use App\Models\Nilai;
>>>>>>> 34908a597a7a32730dbb82dcd5e90ec2566bbba8
use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Kandidat;

class KandidatController extends Controller
{
    public function create()
    {
<<<<<<< HEAD
        return view('kandidat.create');
=======
        return view('kandidat.index', ['kandidats' => Kandidat::all()]);
>>>>>>> 34908a597a7a32730dbb82dcd5e90ec2566bbba8
    }

    public function store(Request $request)
    {
<<<<<<< HEAD
        $kandidat = new Kandidat();

        $kandidat->nama = $request->input('nama');
        $kandidat->tempat_lahir = $request->input('tempat_lahir');
        $kandidat->tanggal_lahir = $request->input('tanggal_lahir');
        $kandidat->jenis_kelamin = $request->input('jenis_kelamin');
        $kandidat->alamat = $request->input('alamat');
        $kandidat->email = $request->input('email');

        $kandidat->save();

        return redirect()->route('kandidat.createCriteria', $kandidat->id)->with('success', 'Kandidat berhasil disimpan! Silakan masukkan nilai kriteria.');
=======
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
>>>>>>> 34908a597a7a32730dbb82dcd5e90ec2566bbba8
    }

    public function createCriteria($id)
    {
<<<<<<< HEAD
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
=======
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
>>>>>>> 34908a597a7a32730dbb82dcd5e90ec2566bbba8
    }
}
