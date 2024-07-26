@extends('layouts.template')

@section('content')
    <div class="main-content">
        <section class="py-5">
            <div class="container px-5 mb-5">
                <div class="card-container overflow-hidden shadow rounded-4 border-0 mb-5">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="p-5 flex-fill">
                                <h2 class="fw-bolder mb-5">{{ $jobPosting->judul }}</h2>
                                <p>{{ $jobPosting->deskripsi }}</p>
                                <p class="card-text">Lokasi: {{ $jobPosting->lokasi }}</p>
                                <p class="card-text">Gaji: {{ $jobPosting->gaji }}</p>
                                <a href="{{ route('isian-data-pelamar.create', $jobPosting->id) }}" class="btn btn-secondary">Daftar Sekarang</a>
                            </div>
                            <div class="ms-auto d-flex justify-content-center">
                                @if($jobPosting->poster_lowongan)
                                    <img class="img-fluid" src="{{ asset('storage/' . $jobPosting->poster_lowongan) }}" alt="Poster Lowongan" />
                                @else
                                    <img class="img-fluid" src="https://dummyimage.com/300x400/343a40/6c757d" alt="Default Image" />
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
