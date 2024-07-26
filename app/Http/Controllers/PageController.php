<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\lowongan;
use Carbon\Carbon;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PageController extends Controller
{
    public function welcomePage()
    {
        return view('welcome');
    }

    public function template()
    {
        return view('layouts.template');
    }

    public function dashboardPage()
    {
        $currentDate = Carbon::today();

        $totalLowongans = lowongan::count();
        $totalLowonganBuka = Lowongan::whereDate('tanggal_ditutup', '>', $currentDate)->count();
        $totalLowonganTutup = Lowongan::whereDate('tanggal_ditutup', '<=', $currentDate)->count();

        $totalKandidats = Kandidat::count();
        $totalLolosBerkas = Kandidat::where('lolos_berkas', true)->count();
        $totalGagal = Kandidat::where('lolos_berkas', false)->count();
        return view('dashboard', compact('totalLowongans', 'totalLowonganBuka', 'totalLowonganTutup', 'totalKandidats', 'totalLolosBerkas', 'totalGagal'));
    }

    public function getUserAuth(Request $request)
    {
        return $request->user();
    }
}
