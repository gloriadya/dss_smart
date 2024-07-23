@extends('layouts.template')

@section('content')
    <div class="main-content">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $jobPosting->judul }}</h5>
                <p class="card-text">{{ $jobPosting->deskripsi }}</p>
                <p class="card-text">Lokasi: {{ $jobPosting->lokasi }}</p>
                <p class="card-text">Gaji: {{ $jobPosting->gaji }}</p>
                <a href="{{ route('isian-data-pelamar.create', $jobPosting->id) }}" class="btn btn-primary">Daftar Sekarang</a>
            </div>
        </div>
    </div>
@endsection
