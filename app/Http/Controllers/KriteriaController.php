<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all();
        return view('kriteria.index', compact('kriteria'));
    }
}