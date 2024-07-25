@extends('layouts.template')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="main-content">
        <h1>Input Data Lowongan</h1>
        <form class="form" method="POST" action="{{ route('lowongan.store') }}" enctype="multipart/form-data" style="width: 70%">
            @csrf
            <div class="form-group">
                <label for="judul">Judul Lowongan</label>
                <input type="text" id="judul" name="judul" placeholder="Masukkan judul lowongan" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi Lowongan</label>
                <textarea id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi lowongan" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <input type="text" id="lokasi" name="lokasi" placeholder="Masukkan lokasi" required>
            </div>
            <div class="form-group">
                <label for="poster_lowongan">Poster Lowongan</label>
                <input type="file" id="poster_lowongan" name="poster_lowongan" required>
            </div>
            <div class="form-group">
                <label for="tanggal_dibuka">Tanggal Dibuka</label>
                <input type="date" id="tanggal_dibuka" name="tanggal_dibuka" required>
            </div>
            <div class="form-group">
                <label for="tanggal_ditutup">Tanggal Ditutup</label>
                <input type="date" id="tanggal_ditutup" name="tanggal_ditutup" required>
            </div>
            <button class="btn btn-secondary px-4 py-2 me-sm-3" style="border-radius: 100px" style="font-size: 0.8rem" type="submit">Submit</button>
        </form>
    </div>
@endsection
