@extends('layouts.template')

@section('content')
    <div class="main-content">
        <div class="row">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h2 class="display-5 fw-bolder text-gradient d-inline">Lowongan Magang</h2>
            </div>
            <div class="card-container">
                @foreach ($jobPostings as $jobPosting)
                    <div class="card shadow border-0 rounded-4 mb-2">
                        <div class="card-body">
                            <div class="row align-items-center gx-5">
                                <div class="col text-center text-lg-start">
                                    <div class="bg-light p-4 rounded-4" style="position: relative">
                                        <div class="small fw-bolder mt-4">{{ $jobPosting->judul }}</div>
                                        <div class="small text-muted">{{ $jobPosting->lokasi }}</div>
                                        <div class="small fw-semibold mt-4">Rp.10.000.000,-</div>
                                        <div class="arrow-icon"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body mb-2">
                            <div style="display: flex; align-items: center;">
                                <img style="width: 40px; height: 40px; border-radius: 50%; margin-right: 10px;"
                                    src="/images/Data.jpg" alt="Logo">
                                <div>
                                    <div style="font-size: 0.7rem" class="fw-bolder">
                                        Open: {{ $jobPosting->tanggal_dibuka }}<br />
                                        Close: {{ $jobPosting->tanggal_ditutup }}
                                    </div>
                                </div>
                                <div style="position: absolute; bottom: 20px; right: 10px;">
                                    <a class="btn btn-secondary" href="{{ route('user.detail-job', $jobPosting->id) }}"
                                        style="border-radius: 100px;">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
