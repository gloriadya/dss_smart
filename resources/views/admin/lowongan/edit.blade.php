@extends('layouts.template')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="main-content">
        <div class="form">
            <h1>Edit Lowongan</h1>
            <form method="POST" action="{{ route('lowongan.update', $lowongan->id) }}" enctype="multipart/form-data" style="width: 70%">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="judul">Judul Lowongan</label>
                    <input type="text" id="judul" name="judul" class="form-control" value="{{ $lowongan->judul }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4" required>{{ $lowongan->deskripsi }}</textarea>
                </div>
                <div class="form-group">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" id="lokasi" name="lokasi" class="form-control" value="{{ $lowongan->lokasi }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="poster_lowongan">Poster Lowongan (Gambar)</label>
                    <input type="file" id="poster_lowongan" name="poster_lowongan" class="form-control">
                    @if ($lowongan->poster_lowongan)
                        <img src="{{ asset('storage/' . $lowongan->poster_lowongan) }}" alt="Poster Lowongan"
                            style="max-width: 150px; margin-top: 10px;">
                    @endif
                </div>

                <div class="form-group">
                    <label for="tanggal_dibuka">Tanggal Dibuka</label>
                    <input type="date" id="tanggal_dibuka" name="tanggal_dibuka" class="form-control"
                        value="{{ $lowongan->tanggal_dibuka }}" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_ditutup">Tanggal Ditutup</label>
                    <input type="date" id="tanggal_ditutup" name="tanggal_ditutup" class="form-control"
                        value="{{ $lowongan->tanggal_ditutup ? $lowongan->tanggal_ditutup : '' }}">
                </div>
                <button type="submit" class="btn btn-secondary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
@endsection
