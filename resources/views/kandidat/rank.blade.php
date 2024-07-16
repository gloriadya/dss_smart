<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perankingan</title>
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

        .no-scores {
            text-align: center;
            padding: 20px;
            font-size: 16px;
            color: #777;
        }

        .detail-column {
            white-space: nowrap;
        }

        .download-btn {
            margin-top: 20px;
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
            <a href="#" class="active">Perankingan</a>
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
        <h1>Ranking Kandidat</h1>
        <h2>Data berikut merupakan data calon pegawai magang yang telah diurutkan berdasarkan hasil penilaian tertinggi
        </h2>
        <!-- Download Button -->
        <form method="GET" action="{{ route('kandidat.rank') }}">
            <input type="hidden" name="download" value="true">
            <button type="submit" class="btn btn-success">Unduh Hasil Perangkingan</button>
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
                        @if(isset($kandidat->score) && $kandidat->score != 0)
                            <tr>
                                <td>{{ $kandidat->nama }}</td>
                                <td>{{ number_format($kandidat->score, 2) }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>

</html>