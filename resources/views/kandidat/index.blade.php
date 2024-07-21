<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian Kandidat</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            background-color: #fff;
            color: #fff;
            width: 250px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .logo {
            margin-bottom: 20px;
            text-align: center;
        }
        .logo img {
            max-width: 100%;
        }
        nav {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        nav a {
            text-decoration: none;
            color: #3b4cca;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        nav a:hover, nav a.active {
            font-weight: bold;
            color: #fff;
            background-color: #3b4cca;
        }
        h1 {
            text-align: left;
            color: #333;
            font-size: 24px;
        }
        .main-content {
            background-color: #f9f9f9;
            flex: 1;
            padding: 40px;
        }
        .main-content h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .main-content p {
            font-size: 16px;
            color: #333;
        }
        .logout {
            text-align: center;
            margin-top: 20px;
        }
        .logout button {
            background: none;
            border: none;
            color: red;
            cursor: pointer;
            font-size: 16px;
        }
        .logout button:hover {
            color: red;
        }
        .btn-primary {
            color: #fff;
            background-color: #3b4cca;
            border-color: #3b4cca;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div>
            <div class="logo">
                <img src="images/logo.png" alt="Logo">
            </div>
            <nav>
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <a href="{{ route('kandidat.create') }}">Data Kandidat</a>
                <a href="#" class="active">Penilaian Kandidat</a>
                <a href="{{ route('kandidat.rank') }}">Perankingan</a>
            </nav>
        </div>
        <div class="logout">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Keluar Akun</button>
            </form>
        </div>
    </div>
    <div class="main-content">
        <h1>Penilaian Kandidat</h1>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form method="POST" action="{{ route('nilai.store') }}">
            @csrf
            <div class="form-group">
                <label for="lowongan_id">Pilih Lowongan</label>
                <select class="form-control" id="lowongan_id" name="lowongan_id" onchange="updateKandidatDropdown(this.value)">
                    <option value="">Pilih Lowongan</option>
                    @foreach($lowongans as $lowongan)
                        <option value="{{ $lowongan->id }}">{{ $lowongan->judul }}</option>
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
                <label for="pengalaman_kerja">Pengalaman Kerja</label>
                <input type="hidden" name="kriteria[]" value="Pengalaman Kerja">
                <input type="number" class="form-control" id="pengalaman_kerja" name="nilai[]" min="1" max="100" required>
            </div>
            <div class="form-group">
                <label for="pendidikan">Pendidikan</label>
                <input type="hidden" name="kriteria[]" value="Pendidikan">
                <input type="number" class="form-control" id="pendidikan" name="nilai[]" min="1" max="100" required>
            </div>
            <div class="form-group">
                <label for="kepribadian_keterampilan">Kepribadian dan Keterampilan</label>
                <input type="hidden" name="kriteria[]" value="Kepribadian dan Keterampilan">
                <input type="number" class="form-control" id="kepribadian_keterampilan" name="nilai[]" min="1" max="100" required>
            </div>
            <div class="form-group">
                <label for="referensi">Referensi</label>
                <input type="hidden" name="kriteria[]" value="Referensi">
                <input type="number" class="form-control" id="referensi" name="nilai[]" min="1" max="100" required>
            </div>
            <div class="form-group">
                <label for="tes_keterampilan">Tes Keterampilan</label>
                <input type="hidden" name="kriteria[]" value="Tes Keterampilan">
                <input type="number" class="form-control" id="tes_keterampilan" name="nilai[]" min="1" max="100" required>
            </div>
            <div class="form-group">
                <label for="kesesuaian_budaya">Kesesuaian Budaya Perusahaan</label>
                <input type="hidden" name="kriteria[]" value="Kesesuaian Budaya Perusahaan">
                <input type="number" class="form-control" id="kesesuaian_budaya" name="nilai[]" min="1" max="100" required>
            </div>
            <div class="form-group">
                <label for="wawancara">Wawancara</label>
                <input type="hidden" name="kriteria[]" value="Wawancara">
                <input type="number" class="form-control" id="wawancara" name="nilai[]" min="1" max="100" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        function updateKandidatDropdown(lowonganId) {
            fetch(`/api/kandidats/${lowonganId}`)
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
</body>
</html>
