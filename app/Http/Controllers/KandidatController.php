<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\KandidatXLowongan;
use App\Models\Lowongan;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class KandidatController extends Controller
{
    public function create()
    {
        $kandidats = KandidatXLowongan::all();

        $lowongans = DB::table('lowongans')->get();

        $years = DB::table('kandidat_x_lowongan')
        ->selectRaw('YEAR(created_at) as year')
        ->groupBy('year')
        ->get()
        ->pluck('year');

        return view('kandidat.create', compact('kandidats', 'lowongans', 'years'));
    }

    public function index()
    {
        return view('kandidat.index', ['kandidats' => Kandidat::all()]);
    }

    // public function store(Request $request)
    // {
    //     $kandidat = new Kandidat();

    //     $kandidat->nama = $request->input('nama');
    //     $kandidat->jurusan = $request->input('jurusan');
    //     $kandidat->jenis_kelamin = $request->input('jenis_kelamin');
    //     $kandidat->alamat = $request->input('alamat');
    //     $kandidat->email = $request->input('email');
    //     $kandidat->no_wa = $request->input('no_wa');

    //     $kandidat->save();
    //     return redirect()->route('kandidat.create')->with('success', 'Berhasil mendaftar lowongan!');
    // }
    public function createCriteria($id)
    {
        $kandidat = Kandidat::findOrFail($id);
        return view('kandidat.create', compact('kandidat'));
    }
    // public function storeCriteria(Request $request, $id)
    // {
    //     $validatedData = $request->validate([
    //         'kandidat_id' => 'required|exists:kandidats,id',
    //         'kriteria' => 'required|string',
    //         'nilai' => 'required|integer|min:1|max:100',
    //     ]);

    //     $nilai = new Nilai();
    //     $nilai->kandidat_id = $validatedData['kandidat_id'];
    //     $nilai->kriteria = $validatedData['kriteria'];
    //     $nilai->nilai = $validatedData['nilai'];
    //     $nilai->save();

    //     return redirect()->back()->with('success', 'Nilai berhasil disimpan.');
    // }

    public function rank(Request $request)
    {
        $lowonganId = $request->input('lowongan_id');
        $year = $request->input('year');
        $lowongans = DB::table('lowongans')->get();

        $query = Nilai::select('kandidats.nama', 'nilais.nilai')
            ->join('kandidats', 'nilais.kandidat_id', '=', 'kandidats.id')
            ->join('kandidat_x_lowongan', 'kandidats.id', '=', 'kandidat_x_lowongan.kandidat_id');

        if ($lowonganId) {
            $query->where('kandidat_x_lowongan.lowongan_id', '=', $lowonganId);
        }

        if ($year) {
            $query->whereYear('kandidat_x_lowongan.created_at', '=', $year);
        }

        $kandidats = $query->orderByDesc('nilais.nilai')->get();

        $years = DB::table('kandidat_x_lowongan')
            ->selectRaw('YEAR(created_at) as year')
            ->groupBy('year')
            ->get()
            ->pluck('year');

        // $lowonganId = $request->input('lowongan_id');
        // $lowongans = DB::table('lowongans')->get();

        // if ($lowonganId) {
        //     $kandidats = Nilai::select('kandidats.nama', 'nilais.nilai')
        //         ->join('kandidats', 'nilais.kandidat_id', '=', 'kandidats.id')
        //         ->join('kandidat_x_lowongan', 'kandidats.id', '=', 'kandidat_x_lowongan.kandidat_id')
        //         ->where('kandidat_x_lowongan.lowongan_id', '=', $lowonganId)
        //         ->orderByDesc('nilais.nilai')
        //         ->get();
        // } else {
        //     $kandidats = Nilai::select('kandidats.nama', 'nilais.nilai')
        //         ->join('kandidats', 'nilais.kandidat_id', '=', 'kandidats.id')
        //         ->join('kandidat_x_lowongan', 'kandidats.id', '=', 'kandidat_x_lowongan.kandidat_id')
        //         ->orderByDesc('nilais.nilai')
        //         ->get();
        // }

        // $kandidats = $kandidatsQuery->get();

        // $weights = [
        //     'Pengalaman Kerja' => 0.15,
        //     'Pendidikan' => 0.1,
        //     'Kepribadian dan Keterampilan' => 0.2,
        //     'Referensi' => 0.05,
        //     'Tes Keterampilan' => 0.1,
        //     'Kesesuaian Budaya Perusahaan' => 0.1,
        //     'Wawancara' => 0.3,
        // ];

        // foreach ($kandidats as $kandidat) {
        //     $score = 0;
        //     $maxValues = [];
        //     $minValues = [];

        //     foreach ($weights as $criteria => $weight) {
        //         $maxValues[$criteria] = Nilai::where('kriteria', '=', $criteria)->max('nilai');
        //         $minValues[$criteria] = Nilai::where('kriteria', '=', $criteria)->min('nilai');
        //     }

        //     if ($kandidat->nilai) {
        //         foreach ($kandidat->nilai as $nilai) {
        //             $normalizedValue = 0;
        //             if (($nilai->nilai - $minValues[$nilai->kriteria]) != 0) {
        //                 $normalizedValue = 100 * ($nilai->nilai - $minValues[$nilai->kriteria]) / ($maxValues[$nilai->kriteria] - $minValues[$nilai->kriteria]);
        //             }

        //             $nilaiParameter = 0;
        //             foreach ($weights as $criteria => $weight) {
        //                 if ($criteria === $nilai->kriteria) {
        //                     $nilaiParameter = $weight;
        //                     continue;
        //                 }
        //             }
        //             $score += $normalizedValue * $nilaiParameter;
        //         }
        //     }
        //     $kandidat->score = $score;
        // }

        // $kandidats = $kandidats->sortByDesc('score');

        // if ($request->has('download')) {
        //     $spreadsheet = new Spreadsheet();
        //     $sheet = $spreadsheet->getActiveSheet();
        //     $sheet->setTitle('Ranking Kandidat');

        //     $sheet->setCellValue('A1', 'Nama');
        //     $sheet->setCellValue('B1', 'Score');

        //     $row = 2;
        //     foreach ($kandidats as $kandidat) {
        //         $sheet->setCellValue('A' . $row, $kandidat->nama);
        //         $sheet->setCellValue('B' . $row, $kandidat->score);
        //         $row++;
        //     }
        //     $writer = new Xlsx($spreadsheet);
        //     $filename = 'ranking_kandidat.xlsx';
        //     header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        //     header('Content-Disposition: attachment;filename="' . $filename . '"');
        //     header('Cache-Control: max-age=0');
        //     $writer->save('php://output');
        //     exit;
        // }

        return view('kandidat.rank', compact('kandidats', 'lowongans', 'years'));
    }

    public function isianBerkasLamaran($id)
    {
        $lowongan = Lowongan::findOrFail($id);

        return view('user.lamar-kerja.create', compact('lowongan'));
    }

    public function isianBerkasLamaranStore(Request $request)
    {

        $kandidat = new Kandidat();

        $kandidat->user_id = Auth::user()->id;
        $kandidat->nama = $request->input('nama');
        $kandidat->jurusan = $request->input('jurusan');
        $kandidat->jenis_kelamin = $request->input('jenis_kelamin');
        $kandidat->alamat = $request->input('alamat');
        $kandidat->email = $request->input('email');
        $kandidat->no_wa = $request->input('no_wa');
        $kandidat->cv = $request->input('cv');
        $kandidat->portofolio = $request->input('portofolio');
        $kandidat->pengalaman_kerja = $request->input('pengalaman_kerja');
        $kandidat->sudah_daftar = true;

        $kandidat->save();

        $relationTable = new KandidatXLowongan();

        $relationTable->kandidat_id = $kandidat->id;
        $relationTable->lowongan_id = $request->input('lowongan_id');
        $relationTable->user_created_id = auth()->user()->id;

        $relationTable->save();

        return redirect()->route('user.daftar-lowongan')->with('success', 'Berhasil mendaftar lowongan!');
    }

    // public function getKandidatsByLowongan($lowonganId, $year)
    // {
    //     $kandidats = DB::table('kandidats')
    //         ->join('kandidat_x_lowongan', 'kandidats.id', '=', 'kandidat_x_lowongan.kandidat_id')
    //         ->join('lowongans', 'kandidat_x_lowongan.lowongan_id', '=', 'lowongans.id')
    //         ->where('lowongans.id', '=', $lowonganId)
    //         ->whereYear('created_at', $year)
    //         ->select('kandidats.id', 'kandidats.nama')
    //         ->get();

    //     return response()->json($kandidats);
    // }

    public function getKandidatsByLowongan($lowonganId, $year)
    {
        $kandidats = DB::table('kandidat_x_lowongan')
            ->join('kandidats', 'kandidat_x_lowongan.kandidat_id', '=', 'kandidats.id')
            ->where('kandidat_x_lowongan.lowongan_id', $lowonganId)
            ->whereYear('kandidat_x_lowongan.created_at', $year)
            ->select('kandidats.id', 'kandidats.nama')
            ->get();

        return response()->json($kandidats);
    }


    // public function getKandidatsByLowongan($lowonganId, $year)
    // {
    //     $kandidats = DB::table('kandidat_x_lowongan')
    //         ->where('lowongan_id', $lowonganId)
    //         ->whereYear('created_at', $year)
    //         ->get();

    //     return response()->json($kandidats);
    // }
}
