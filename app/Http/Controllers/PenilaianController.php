<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kandidat;
use App\Models\Lowongan;

class PenilaianController extends Controller
{
    public function index()
    {
        $lowongans = Lowongan::all();

        return view('kandidat.index', compact('lowongans'));
    }
}
