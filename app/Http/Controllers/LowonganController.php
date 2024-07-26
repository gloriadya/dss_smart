<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Alert;
use App\Models\Kandidat;
use App\Models\KandidatXLowongan;
use Illuminate\Support\Facades\DB;

class LowonganController extends Controller
{
    public function index()
    {
        $jobPostings = Lowongan::all();

        return view('user.daftar-lowongan.index', [
            'jobPostings' => $jobPostings
        ]);
    }

    public function status($id)
    {
        $kandidats = KandidatXLowongan::where('user_created_id', $id)->get();
        return view('user.status', compact('kandidats'));
    }

    public function lolos($id)
    {
        $kandidat = Kandidat::findOrFail($id);

        $kandidat->lolos_berkas = 1;
        $kandidat->save();

        $kandidats = KandidatXLowongan::all();

        $lowongans = DB::table('lowongans')->get();

        $years = DB::table('kandidat_x_lowongan')
            ->selectRaw('YEAR(created_at) as year')
            ->groupBy('year')
            ->get()
            ->pluck('year');

        return redirect()->route('kandidat.create', compact('kandidats', 'lowongans', 'years'));
    }

    public function gagal($id)
    {
        $kandidat = Kandidat::findOrFail($id);

        $kandidat->lolos_berkas = 0;
        $kandidat->save();

        $kandidats = KandidatXLowongan::all();

        $lowongans = DB::table('lowongans')->get();

        $years = DB::table('kandidat_x_lowongan')
            ->selectRaw('YEAR(created_at) as year')
            ->groupBy('year')
            ->get()
            ->pluck('year');

        return redirect()->route('kandidat.create', compact('kandidats', 'lowongans', 'years'));
    }

    public function show($id)
    {
        $jobPosting = Lowongan::findOrFail($id);

        return view('user.daftar-lowongan.detail', [
            'jobPosting' => $jobPosting
        ]);
    }

    public function buatLowonganView()
    {
        return view('admin.lowongan.create');
    }


    public function buatLowonganStore(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'poster_lowongan' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tanggal_dibuka' => 'required|date',
            'tanggal_ditutup' => 'required|date',
        ]);

        if ($request->hasFile('poster_lowongan')) {
            $posterPath = $request->file('poster_lowongan')->store('posters', 'public');
        }

        $lowongan = new Lowongan;
        $lowongan->judul = $request->judul;
        $lowongan->deskripsi = $request->deskripsi;
        $lowongan->lokasi = $request->lokasi;
        $lowongan->poster_lowongan = $posterPath ?? null;
        $lowongan->tanggal_dibuka = $request->tanggal_dibuka;
        $lowongan->tanggal_ditutup = $request->tanggal_ditutup;
        $lowongan->save();

        $filter = $request->input('filter');

        if ($filter == 'active') {
            $lowongans = Lowongan::where('tanggal_ditutup', '>=', now())
                ->orWhereNull('tanggal_ditutup')
                ->orderBy('tanggal_dibuka', 'desc')
                ->get();
        } elseif ($filter == 'closed') {
            $lowongans = Lowongan::where('tanggal_ditutup', '<', now())
                ->orderBy('tanggal_ditutup', 'desc')
                ->get();
        } else {
            $lowongans = Lowongan::orderBy('tanggal_dibuka', 'desc')
                ->get();
        }

        return redirect()->route('lowongan.index', compact('lowongans'))->with('success', 'Lowongan berhasil ditambahkan.');
    }

    public function listLowonganView(Request $request)
    {
        $filter = $request->input('filter');

        if ($filter == 'active') {
            $lowongans = Lowongan::where('tanggal_ditutup', '>=', now())
                ->orWhereNull('tanggal_ditutup')
                ->orderBy('tanggal_dibuka', 'desc')
                ->get();
        } elseif ($filter == 'closed') {
            $lowongans = Lowongan::where('tanggal_ditutup', '<', now())
                ->orderBy('tanggal_ditutup', 'desc')
                ->get();
        } else {
            $lowongans = Lowongan::orderBy('tanggal_dibuka', 'desc')
                ->get();
        }

        return view('admin.lowongan.list', compact('lowongans'));
    }

    public function editLowonganView($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        return view('admin.lowongan.edit', compact('lowongan'));
    }

    public function updateLowongan(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'poster_lowongan' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tanggal_dibuka' => 'required|date',
            'tanggal_ditutup' => 'nullable|date',
        ]);


        $lowongan = Lowongan::findOrFail($id);

        $lowongan->judul = $request->input('judul');
        $lowongan->deskripsi = $request->input('deskripsi');
        $lowongan->lokasi = $request->input('lokasi');
        $lowongan->tanggal_dibuka = $request->input('tanggal_dibuka');
        $lowongan->tanggal_ditutup = $request->input('tanggal_ditutup');


        if ($request->hasFile('poster_lowongan')) {

            if ($lowongan->poster_lowongan && file_exists(storage_path('app/public/posters/' . $lowongan->poster_lowongan))) {
                unlink(storage_path('app/public/posters/' . $lowongan->poster_lowongan));
            }

            $posterPath = $request->file('poster_lowongan')->store('posters', 'public');
            $lowongan->poster_lowongan = $posterPath;
        }

        $lowongan->save();

        return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil diperbarui!');
    }


    public function closeLowongan($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        $lowongan->tanggal_ditutup = now()->subDay();
        $lowongan->save();

        return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil ditutup!');
    }
}
