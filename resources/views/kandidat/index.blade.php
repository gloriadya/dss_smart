<!DOCTYPE html>
<html>
<head>
    <title>Penilaian Kandidat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Penilaian Kandidat</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('nilai.store') }}">
        @csrf
        <div class="form-group">
            <label for="kandidat_id">Nama Kandidat</label>
            <select class="form-control" id="kandidat_id" name="kandidat_id">
                @foreach($kandidats as $kandidat)
                    <option value="{{ $kandidat->id }}">{{ $kandidat->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="kriteria">Kriteria</label>
            <select class="form-control" id="kriteria" name="kriteria">
                <option value="Pengalaman Kerja">Pengalaman Kerja</option>
                <option value="Pendidikan">Pendidikan</option>
                <option value="Kepribadian dan Keterampilan">Kepribadian dan Keterampilan</option>
                <option value="Referensi">Referensi</option>
                <option value="Tes Keterampilan">Tes Keterampilan</option>
                <option value="Keterampilan">Keterampilan</option>
                <option value="Keahlian Teknis">Keahlian Teknis</option>
                <option value="Kesesuaian Budaya Perusahaan">Kesesuaian Budaya Perusahaan</option>
                <option value="Wawancara">Wawancara</option>
            </select>
        </div>
        <div class="form-group">
            <label for="nilai">Nilai</label>
            <input type="number" class="form-control" id="nilai" name="nilai" min="1" max="100" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>

<!-- <!DOCTYPE html>
<html>
<head>
    <title>Penilaian Kandidat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Penilaian Kandidat</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('nilai.store') }}">
        @csrf
        <div class="form-group">
            <label for="kandidat_id">Nama Kandidat</label>
            <select class="form-control" id="kandidat_id" name="kandidat_id">
                @foreach($kandidats as $kandidat)
                    <option value="{{ $kandidat->id }}">{{ $kandidat->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="pengalaman_kerja">Pengalaman Kerja</label>
            <input type="number" class="form-control" id="pengalaman_kerja" name="pengalaman_kerja" min="1" max="100" required>
        </div>
        <div class="form-group">
            <label for="pendidikan">Pendidikan</label>
            <input type="number" class="form-control" id="pendidikan" name="pendidikan" min="1" max="100" required>
        </div>
        <div class="form-group">
            <label for="kepribadian_keterampilan">Kepribadian dan Keterampilan</label>
            <input type="number" class="form-control" id="kepribadian_keterampilan" name="kepribadian_keterampilan" min="1" max="100" required>
        </div>
        <div class="form-group">
            <label for="referensi">Referensi</label>
            <input type="number" class="form-control" id="referensi" name="referensi" min="1" max="100" required>
        </div>
        <div class="form-group">
            <label for="tes_keterampilan">Tes Keterampilan</label>
            <input type="number" class="form-control" id="tes_keterampilan" name="tes_keterampilan" min="1" max="100" required>
        </div>
        <div class="form-group">
            <label for="keterampilan">Keterampilan</label>
            <input type="number" class="form-control" id="keterampilan" name="keterampilan" min="1" max="100" required>
        </div>
        <div class="form-group">
            <label for="keahlian_teknis">Keahlian Teknis</label>
            <input type="number" class="form-control" id="keahlian_teknis" name="keahlian_teknis" min="1" max="100" required>
        </div>
        <div class="form-group">
            <label for="kesesuaian_budaya">Kesesuaian Budaya Perusahaan</label>
            <input type="number" class="form-control" id="kesesuaian_budaya" name="kesesuaian_budaya" min="1" max="100" required>
        </div>
        <div class="form-group">
            <label for="wawancara">Wawancara</label>
            <input type="number" class="form-control" id="wawancara" name="wawancara" min="1" max="100" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html> -->
