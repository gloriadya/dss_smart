@extends('layouts.template')

@section('content')
    <div class="main-content">
        <div class="row">
            @foreach($jobPostings as $jobPosting)
            <div class="col-sm-4 mb-3">
                <div class="card" style="width: 20rem; height: 21rem;">
                    <img src="https://picsum.photos/400/200" class="card-img-top" alt="Job Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $jobPosting->judul }}</h5>
                        <p class="card-text">{{ $jobPosting->deskripsi }}</p>
                        <a href="{{ route('user.detail-job', $jobPosting->id) }}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
