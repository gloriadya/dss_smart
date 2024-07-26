@extends('layouts.template')

@section('content')
    <div class="main-content">
        <h1>Ranking Kandidat</h1>
        <p>Data berikut merupakan data calon pegawai magang yang telah diurutkan berdasarkan hasil penilaian tertinggi</p>

        <!-- Dropdown for lowongan -->
        {{-- <form method="GET" action="{{ route('kandidat.rank') }}">
            <div class="form-group">
                <label for="lowongan_id">Pilih Lowongan</label>
                <select class="form-control" id="lowongan_id" name="lowongan_id" onchange="this.form.submit()">
                    <option value="">Semua Lowongan</option>
                    @foreach($lowongans as $lowongan)
                        <option value="{{ $lowongan->id }}" {{ request('lowongan_id') == $lowongan->id ? 'selected' : '' }}>
                            {{ $lowongan->judul }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form> --}}
        <form method="GET" action="{{ route('kandidat.rank') }}">
            <div class="form-group">
                <label for="lowongan_id">Pilih Lowongan</label>
                <select class="form-control" id="lowongan_id" name="lowongan_id" onchange="this.form.submit()">
                    <option value="">Semua Lowongan</option>
                    @foreach($lowongans as $lowongan)
                        <option value="{{ $lowongan->id }}" {{ request('lowongan_id') == $lowongan->id ? 'selected' : '' }}>
                            {{ $lowongan->judul }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="year">Pilih Tahun</label>
                <select class="form-control" id="year" name="year" onchange="this.form.submit()">
                    <option value="">Semua Tahun</option>
                    @for ($i = 2024; $i <= date('Y'); $i++)
                        <option value="{{ $i }}" {{ request('year') == $i ? 'selected' : '' }}>
                            {{ $i }}
                        </option>
                    @endfor
                </select>
            </div>
        </form>
        

        <!-- Download Button -->
        <form method="GET" action="{{ route('kandidat.rank') }}">
            <input type="hidden" name="download" value="true">
            <button type="submit" class="btn btn-secondary">Unduh Hasil Perangkingan</button>
        </form>

        @if($kandidats->isEmpty())
            <div class="no-scores">No candidates available</div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Skor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kandidats as $kandidat)
                        @if(isset($kandidat->nilai) && $kandidat->nilai != 0)
                            <tr>
                                <td>{{ $kandidat->nama }}</td>
                                <td>{{ number_format($kandidat->nilai, 2) }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
