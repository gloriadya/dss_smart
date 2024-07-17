<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\Nilai;
use App\Models\Lowongan;
use App\Models\KandidatXLowongan;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
        $kandidat->jurusan = $request->input('jurusan');
        $kandidat->jenis_kelamin = $request->input('jenis_kelamin');
        $kandidat->alamat = $request->input('alamat');
        $kandidat->email = $request->input('email');

        $kandidat->save();
        return redirect()->route('kandidat.create')->with('success', 'Kandidat berhasil disimpan! Silakan pilih opsi berikut.');
    }
    public function createCriteria($id)
    {
        $kandidat = Kandidat::findOrFail($id);
        return view('kandidat.create', compact('kandidat'));
    }
    public function storeCriteria(Request $request, $id){
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

    public function rank(Request $request)
    {
        $kandidats = Kandidat::with('nilai')->get();

        // Bobot setiap kriteria
        $weights  = [
            'Pengalaman Kerja' => 0.15,
            'Pendidikan' => 0.1,
            'Kepribadian dan Keterampilan' => 0.2,
            'Referensi' => 0.05,
            'Tes Keterampilan' => 0.1,
            'Kesesuaian Budaya Perusahaan' => 0.1,
            'Wawancara' => 0.3,
        ];

        foreach ($kandidats as $kandidat) {
            $score = 0;
            $maxValues = [];
            $minValues = [];

            // Menentukan nilai maksimum dan minimum dari setiap kriteria
            foreach ($weights as $criteria => $weight) {
                $maxValues[$criteria] = Nilai::where('kriteria', '=', $criteria)->max('nilai');
                $minValues[$criteria] = Nilai::where('kriteria', '=', $criteria)->min('nilai');
            }

            // Menghitung nilai setiap kandidat berdasarkan kriteria penilaian
            if ($kandidat->nilai) {
                foreach ($kandidat->nilai as $nilai) {
                    // Normalisasi nilai
                    $normalizedValue = 0;
                    if (($nilai->nilai - $minValues[$nilai->kriteria]) != 0) {
                        $normalizedValue = 100 * ($nilai->nilai - $minValues[$nilai->kriteria]) / ($maxValues[$nilai->kriteria] - $minValues[$nilai->kriteria]);
                    }

                    // Menghitung nilai berdasarkan bobot kriteria
                    $nilaiParameter = 0;
                    foreach ($weights as $criteria => $weight) {
                        if ($criteria === $nilai->kriteria) {
                            $nilaiParameter = $weight;
                            continue;
                        }
                    }
                    $score += $normalizedValue * $nilaiParameter;
                }
            }

            // Menyimpan nilai setiap kandidat
            $kandidat->score = $score;
        }

        // Mengurutkan kandidat berdasarkan nilai tertinggi
        $kandidats = $kandidats->sortByDesc('score');

        // Check if the request is for downloading the Excel file
        if ($request->has('download')) {
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setTitle('Ranking Kandidat');

            // Set headers
            $sheet->setCellValue('A1', 'Nama');
            $sheet->setCellValue('B1', 'Score');

            //dd($kandidat->score);
            // Populate data
            $row = 2;
            foreach ($kandidats as $kandidat) {
                //dd($kandidat->score);
                $sheet->setCellValue('A' . $row, $kandidat->nama);
                $sheet->setCellValue('B' . $row, $kandidat->score);
                $row++;
            }

            // Download the file
            $writer = new Xlsx($spreadsheet);
            $filename = 'ranking_kandidat.xlsx';
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . '"');
            header('Cache-Control: max-age=0');
            $writer->save('php://output');
            exit;
        }

        // Menampilkan urutan kandidat dari nilai tertinggi
        return view('kandidat.rank', compact('kandidats'));
    }

    public function isianBerkasLamaran($id)
    {
        $lowongan = Lowongan::findOrFail($id);

        return view('user.lamar-kerja.create',compact('lowongan'));
    }


    public function isianBerkasLamaranStore(Request $request)
    {

        $kandidat = new Kandidat();

        $kandidat->nama = $request->input('nama');
        $kandidat->jurusan = $request->input('jurusan');
        $kandidat->jenis_kelamin = $request->input('jenis_kelamin');
        $kandidat->alamat = $request->input('alamat');
        $kandidat->email = $request->input('email');

        $kandidat->save();

        $relationTable = new KandidatXLowongan();

        $relationTable->kandidat_id = $kandidat->id;
        $relationTable->lowongan_id = $request->input('lowongan_id');
        $relationTable->user_created_id = auth()->user()->id;

        $relationTable->save();

        return redirect()->route('isian-data-pelamar.create', $request->input('lowongan_id'))->with('success', 'Kandidat berhasil disimpan! Silakan pilih opsi berikut.');
    }
}
