<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistem Pendukung Keputusan</title>
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
        h1 {
            text-align: left;
            color: #333;
            font-size: 24px;
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
                <a href="#" class="active">Dashboard</a>
                <a href="{{ route('kandidat.create') }}">Input Data Kandidat</a>
                <a href="{{ route('penilaian.index') }}">Penilaian Kandidat</a>
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
    <h1>Selamat Datang,</h1>
        <p>Gunakan menu Penilaian Kandidat untuk memberikan penilaian kepada setiap calon pegawai magang, dan menu Perankingan untuk melihat hasil perankingan.</p>
    </div>
</body>
</html>
