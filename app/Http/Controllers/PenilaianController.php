<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kandidat;
use App\Models\Lowongan;
use Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{
    public function index()
    {
        $lowongans = Lowongan::all();

        $years = DB::table('kandidat_x_lowongan')
            ->selectRaw('YEAR(created_at) as year')
            ->groupBy('year')
            ->get()
            ->pluck('year');

        return view('kandidat.index', compact('lowongans', 'years'));
    }
}
