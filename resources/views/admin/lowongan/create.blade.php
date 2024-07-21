<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Lowongan</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
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
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 100%;
        }

        nav {
            display: flex;
            flex-direction: column;
            gap: 10px;
            min-height: -webkit-fill-available;
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
            flex: 1;
            padding: 40px;
        }

        .main-content h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        .form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn {
            background-color: #3b4cca;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #1f2b6d;
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
            color: darkred;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="logo">
            <img src="/images/logo.png" alt="Logo">
        </div>
        <nav>
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('kandidat.create') }}">Data Kandidat</a>
            <a href="#" class="active">Input Data Lowongan</a>
            <a href="{{ route('penilaian.index') }}">Penilaian Kandidat</a>
            <a href="{{ route('kandidat.rank') }}">Perankingan</a>
        </nav>
        <div class="logout">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Keluar Akun</button>
            </form>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="main-content">
        <h1>Input Data Lowongan</h1>
        <form class="form" method="POST" action="{{ route('lowongan.store') }}" enctype="multipart/form-data">
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
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
