<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kandidat;

class PenilaianController extends Controller
{
    public function index()
    {
        $kandidats = Kandidat::all();
        return view('kandidat.index', compact('kandidats'));
    }
}