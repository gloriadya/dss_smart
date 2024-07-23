@extends('layouts.template')

@section('content')
    <div class="main-content">
        <h1>Penilaian Kandidat</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form method="POST" action="{{ route('nilai.store') }}">
            @csrf
            <div class="form-group">
                <label for="lowongan_id">Pilih Lowongan</label>
                <select class="form-control" id="lowongan_id" name="lowongan_id"
                    onchange="updateKandidatDropdown()">
                    <option value="">Pilih Lowongan</option>
                    @foreach ($lowongans as $lowongan)
                        <option value="{{ $lowongan->id }}">{{ $lowongan->judul }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tahun">Pilih Tahun</label>
                <select class="form-control" id="tahun" name="tahun" onchange="updateKandidatDropdown()">
                    <option value="">Pilih Tahun</option>
                    @foreach ($years as $year)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="kandidat_id">Nama Kandidat</label>
                <select class="form-control" id="kandidat_id" name="kandidat_id">
                    <option value="">Pilih Kandidat</option>
                </select>
            </div>
            <div class="form-group">
                <label for="pengalaman_kerja">Pengalaman Kerja (1-100)</label>
                {{-- <input type="hidden" name="pengalaman_kerja" value="pengalaman_kerja"> --}}
                <input type="number" class="form-control" id="pengalaman_kerja" name="pengalaman_kerja"
                    value="pengalaman_kerja" min="1" max="100" required>
            </div>
            <div class="form-group">
                <label for="pendidikan">Pendidikan</label>
                {{-- <input type="hidden" name="kriteria[]" value="Pendidikan"> --}}
                <input type="number" class="form-control" id="pendidikan" name="pendidikan" value="pendidikan"
                    min="1" max="100" required>
            </div>
            <div class="form-group">
                <label for="kepribadian_keterampilan">Kepribadian dan Keterampilan</label>
                {{-- <input type="hidden" name="kriteria[]" value="Kepribadian dan Keterampilan"> --}}
                <input type="number" class="form-control" id="kepribadian_keterampilan" name="kepribadian_keterampilan"
                    value="kepribadian_keterampilan" min="1" max="100" required>
            </div>
            <div class="form-group">
                <label for="referensi">Referensi</label>
                {{-- <input type="hidden" name="kriteria[]" value="Referensi"> --}}
                <input type="number" class="form-control" id="referensi" name="referensi" value="referensi"
                    min="1" max="100" required>
            </div>
            <div class="form-group">
                <label for="tes_keterampilan">Tes Keterampilan</label>
                {{-- <input type="hidden" name="kriteria[]" value="Tes Keterampilan"> --}}
                <input type="number" class="form-control" id="tes_keterampilan" name="tes_keterampilan"
                    value="tes_keterampilan" min="1" max="100" required>
            </div>
            <div class="form-group">
                <label for="kesesuaian_budaya">Kesesuaian Budaya Perusahaan</label>
                {{-- <input type="hidden" name="kriteria[]" value="Kesesuaian Budaya Perusahaan"> --}}
                <input type="number" class="form-control" id="kesesuaian_budaya" name="kesesuaian_budaya"
                    value="kesesuaian_budaya" min="1" max="100" required>
            </div>
            <div class="form-group">
                <label for="wawancara">Wawancara</label>
                {{-- <input type="hidden" name="kriteria[]" value="Wawancara"> --}}
                <input type="number" class="form-control" id="wawancara" name="wawancara" value="wawancara"
                    min="1" max="100" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        function updateKandidatDropdown() {
            const lowonganId = document.getElementById('lowongan_id').value;
            const year = document.getElementById('tahun').value;
    
            fetch(`/api/kandidats/${lowonganId}/${year}`)
                .then(response => response.json())
                .then(data => {
                    let select = document.getElementById('kandidat_id');
                    select.innerHTML = '<option value="">Pilih Kandidat</option>';
                    data.forEach(kandidat => {
                        select.innerHTML += `<option value="${kandidat.id}">${kandidat.nama}</option>`;
                    });
                });
        }
    </script>
    
@endsection
