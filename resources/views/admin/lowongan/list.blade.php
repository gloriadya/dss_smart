@extends('layouts.template')

@section('content')
    <div class="main-content">
        <h1>Daftar Lowongan</h1>
        <div class="mt-4" style="display: flex; justify-content: space-between; align-items: center;">
            <!-- Filter Form -->
            <form method="GET" action="{{ route('lowongan.index') }}" class="filter-form" style="width: 150px;">
                <div class="form-group">
                    <label for="filter">Status Lowongan</label>
                    <select id="filter" name="filter" class="form-control" onchange="this.form.submit()">
                        <option value="">Semua</option>
                        <option value="active" {{ request('filter') == 'active' ? 'selected' : '' }}>Aktif</option>
                        <option value="closed" {{ request('filter') == 'closed' ? 'selected' : '' }}>Ditutup</option>
                    </select>
                </div>
            </form>

            <!-- Button for Adding Lowongan -->
            <a href="{{ route('lowongan.create') }}" class="btn btn-secondary mb-3 mt-4" style="height: min-content;">
                Tambah Lowongan
            </a>
        </div>

        @if ($lowongans->isEmpty())
            <div class="no-data">Tidak ada lowongan yang tersedia</div>
        @else
            <table class="responsive-table" id="kandidatTable">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Lokasi</th>
                        <th>Tanggal Dibuka</th>
                        <th>Tanggal Ditutup</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lowongans as $lowongan)
                        <tr
                            style="{{ \Carbon\Carbon::parse($lowongan->tanggal_ditutup)->isPast() ? 'background-color: #bdb8ad;' : '' }}">
                            <td>{{ $lowongan->judul }}</td>
                            <td>{{ $lowongan->deskripsi }}</td>
                            <td>{{ $lowongan->lokasi }}</td>
                            <td>{{ $lowongan->tanggal_dibuka }}</td>
                            <td>{{ $lowongan->tanggal_ditutup }}</td>
                            <td>
                                @if (\Carbon\Carbon::parse($lowongan->tanggal_ditutup)->isPast())
                                    <span class="badge bg-dark text-light fw-normal" style="font-size: 0.7rem">Ditutup</span>
                                @else
                                    <a href="{{ route('lowongan.edit', $lowongan->id) }}"
                                        class="btn btn-primary btn-sm px-2"
                                        style="border-radius: 10px; font-size:0.7rem">Edit</a>
                                    <form action="{{ route('lowongan.close', $lowongan->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm px-2 mt-2"
                                            style="border-radius: 10px; font-size:0.7rem">Tutup</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
