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