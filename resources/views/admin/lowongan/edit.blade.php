<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Lowongan</title>
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

        nav a:hover,
        nav a.active {
            font-weight: bold;
            color: #fff;
            background-color: #3b4cca;
        }

        .main-content {
            background-color: #f9f9f9;
            flex: 1;
            padding: 40px;
        }

        .main-content h1 {
            text-align: left;
            color: #333;
            font-size: 24px;
        }

        .main-content h2 {
            font-size: 16px;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        table thead {
            background-color: #f8f8f8;
            border-bottom: 2px solid #e0e0e0;
        }

        table th,
        table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f0f0f0;
            font-weight: bold;
            color: #555;
        }

        table tbody tr:hover {
            background-color: #f1f1f1;
        }

        table tbody tr:last-child td {
            border-bottom: none;
        }

        .no-data {
            text-align: center;
            padding: 20px;
            font-size: 16px;
            color: #777;
        }

        .filter-form {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div>
            <div class="logo">
                <img src="/images/logo.png" alt="Logo">
            </div>
            <nav>
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <a href="{{ route('kandidat.create') }}">Input Data Kandidat</a>
                <a href="{{ route('penilaian.index') }}">Penilaian Kandidat</a>
                <a href="{{ route('lowongan.index') }}" class="active">Daftar Lowongan</a>
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
        <div class="form">
            <h1>Edit Lowongan</h1>
            <form method="POST" action="{{ route('lowongan.update', $lowongan->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="judul">Judul Lowongan</label>
                    <input type="text" id="judul" name="judul" class="form-control" value="{{ $lowongan->judul }}" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4" required>{{ $lowongan->deskripsi }}</textarea>
                </div>
                <div class="form-group">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" id="lokasi" name="lokasi" class="form-control" value="{{ $lowongan->lokasi }}" required>
                </div>
                <div class="form-group">
                    <label for="poster_lowongan">Poster Lowongan (Gambar)</label>
                    <input type="file" id="poster_lowongan" name="poster_lowongan" class="form-control">
                    @if ($lowongan->poster_lowongan)
                        <img src="{{ asset('storage/' . $lowongan->poster_lowongan) }}" alt="Poster Lowongan" style="max-width: 150px; margin-top: 10px;">
                    @endif
                </div>

                <div class="form-group">
                    <label for="tanggal_dibuka">Tanggal Dibuka</label>
                    <input type="date" id="tanggal_dibuka" name="tanggal_dibuka" class="form-control" value="{{ $lowongan->tanggal_dibuka }}" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_ditutup">Tanggal Ditutup</label>
                    <input type="date" id="tanggal_ditutup" name="tanggal_ditutup" class="form-control" value="{{ $lowongan->tanggal_ditutup ? $lowongan->tanggal_ditutup : '' }}">
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
