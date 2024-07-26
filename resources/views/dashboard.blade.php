@extends('layouts.template')

@section('content')
    <div class="main-content">
        <div class="container p-4">
            <h1 class="text-gradient d-inline">Selamat Datang, {{ Auth::user()->name }}</h1>
            <div class="card-container overflow-hidden shadow rounded-4 border-0 my-4">
                <div class="d-flex justify-content-between align-items-center p-4">
                    <div class="text-muted fw-normal" style="font-size: 0.7rem">
                        Gunakan menu Penilaian Kandidat untuk memberikan penilaian kepada setiap pelamar, menu Data
                        Kandidat untuk melihat detail data dari pelamar dan menu Perankingan untuk melihat hasil
                        perankingan.
                    </div>
                    <a class="btn btn-secondary px-4 py-2 ms-3 d-flex align-items-center"
                        style="border-radius: 100px; white-space: nowrap;" href="{{ route('penilaian.index') }}">
                        Lakukan Penilaian
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
            <div class="card-container justify-content-center">
                <div class="card shadow bg-gradient border-0 rounded-4">
                    <div class="card-body text-center">
                        <div class="text-gradient rounded-4 mt-2" style="position: relative">
                            <div style="display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-grid" style="margin-right: 5px"></i>
                                <h5 class="card-title mt-2">Total Kandidat</h5>
                            </div>
                            <h1 class="text-gradient d-inline fs-1">{{ $totalKandidats }}</h1>
                        </div>
                        <div class="row text-center px-4">
                            <div class="col">
                                <h4 class="text-primary mb-1">{{ $totalLolosBerkas }}</h4>
                                <small class="text-dark">Kandidat Lolos</small>
                            </div>
                            <div class="col">
                                <h4 class="text-primary mb-1">{{ $totalGagal }}</h4>
                                <small class="text-dark">Kandidat Gagal</small>
                            </div>
                        </div>
                    </div>
                    <hr class="my-1">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-muted text-start ms-3 mb-2" style="font-size: 0.8rem">View</div>
                        <div class="text-end me-3 mb-1">
                            <a href="{{ route('kandidat.create') }}" style="color:#f59a09; font-size: 1.2rem">
                                <i class="bi bi-arrow-right-circle-fill"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card shadow bg-gradient border-0 rounded-4">
                    <div class="card-body text-center">
                        <div class="text-gradient rounded-4 mt-2" style="position: relative">
                            <div style="display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-grid" style="margin-right: 5px"></i>
                                <h5 class="card-title mt-2">Total Lowongan</h5>
                            </div>
                            <h1 class="text-gradient d-inline fs-1">{{ $totalLowongans }}</h1>
                        </div>
                        <div class="row text-center px-4">
                            <div class="col">
                                <h4 class="text-primary mb-1">{{ $totalLowonganBuka }}</h4>
                                <small class="text-dark">Lowongan Buka</small>
                            </div>
                            <div class="col">
                                <h4 class="text-primary mb-1">{{ $totalLowonganTutup }}</h4>
                                <small class="text-dark">Lowongan Tutup</small>
                            </div>
                        </div>
                    </div>
                    <hr class="my-1">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-muted text-start ms-3 mb-2" style="font-size: 0.8rem">View</div>
                        <div class="text-end me-3 mb-1">
                            <a href="{{ route('lowongan.index') }}" style="color:#f59a09; font-size: 1.2rem">
                                <i class="bi bi-arrow-right-circle-fill"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>

    </div>
@endsection
