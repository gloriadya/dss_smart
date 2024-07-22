<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kandidat</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #3b4cca;
            color: #fff;
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
            <a href="#" class="active">Data Kandidat</a>
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

    <div class="main-content">
        <h1>Data Kandidat</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>No WA</th>
                    <th>CV</th>
                    <th>Portofolio</th>
                    <th>Pengalaman Kerja</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kandidats as $kandidat)
                <tr>
                    <td>{{ $kandidat->kandidat->id }}</td>
                    <td>{{ $kandidat->kandidat->nama }}</td>
                    <td>{{ $kandidat->kandidat->jurusan }}</td>
                    <td>{{ $kandidat->kandidat->jenis_kelamin }}</td>
                    <td>{{ $kandidat->kandidat->alamat }}</td>
                    <td>{{ $kandidat->kandidat->email }}</td>
                    <td>{{ $kandidat->kandidat->no_wa }}</td>
                    <td><a href="{{ $kandidat->kandidat->CV }}">{{ $kandidat->kandidat->CV }}</a></td>
                    <td><a href="{{ $kandidat->kandidat->portofolio }}">{{ $kandidat->kandidat->portofolio }}</a></td>
                    <td>{{ $kandidat->kandidat->pengalaman_kerja }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>