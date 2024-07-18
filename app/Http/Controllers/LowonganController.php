<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
    public function index()
    {
        $jobPostings = Lowongan::all();

        return view('user.daftar-lowongan.index', [
            'jobPostings' => $jobPostings
        ]);
    }

    public function show($id)
    {
        $jobPosting = Lowongan::findOrFail($id);

        return view('user.daftar-lowongan.detail', [
            'jobPosting' => $jobPosting
        ]);
    }
}
