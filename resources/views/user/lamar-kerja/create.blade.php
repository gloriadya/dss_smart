<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Calon Pegawai</title>
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
        nav a:hover, nav a.active {
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
        .form-group select {
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
            <a href="{{ route('user.daftar-lowongan') }}" class="active">Daftar Lowongan</a>
        </nav>
        <div class="logout">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Keluar Akun</button>
            </form>
        </div>
    </div>

    <div class="main-content">
        <h1>Input Data Calon Pegawai</h1>
        <form class="form" method="POST" action="{{ route('isian-data-pelamar.store') }}">
            @csrf
            <input type="hidden" id="lowongan_id" name="lowongan_id" value="{{ $lowongan->id }}" required>
            <div class="form-group">
                <label for="nama">Lowongan</label>
                <input type="text" disabled value="{{ $lowongan->judul }}" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <input type="text" id="jurusan" name="jurusan" placeholder="Masukkan jurusan" required>
            </div>
            <div class="form-group">
                <label for="jenis-kelamin">Jenis Kelamin</label>
                <select id="jenis-kelamin" name="jenis_kelamin" required>
                    <option value="" disabled selected>Pilih jenis kelamin</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" placeholder="Masukkan alamat" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email" required>
            </div>
            <button type="submit" class="btn">Submit</button>
        </form>

        <!-- Modal -->
        <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Success</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ session('success') }}
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('kandidat.create') }}" class="btn btn-primary">Tetap di Halaman Input</a>
                        <a href="{{ route('penilaian.index') }}" class="btn btn-secondary">Lanjut ke Penilaian</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        @if(session('success'))
            $('#successModal').modal('show');
        @endif
    </script>
</body>
</html>
