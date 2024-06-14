<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistem Pendukung Keputusan</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
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
            background-color: #29388f;
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
            color: #fff;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        nav a:hover, nav a.active {
            background-color: #3b4cca;
        }
        .main-content {
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
            color: white;
            cursor: pointer;
            font-size: 16px;
        }
        .logout button:hover {
            color: #adb5bd;
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
                <a href="{{ route('penilaian.index') }}">Penilaian Kandidat</a>
                <a href="{{ route('kandidat.rank') }}">Perankingan</a>
            </nav>
        </div>
        <div class="logout">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Keluar Admin</button>
            </form>
        </div>
    </div>
    <div class="main-content">
        <h2>Selamat Datang Admin,</h2>
        <p>Gunakan menu Penilaian Kandidat untuk mengelola nilai kandidat, dan menu Perankingan untuk eksekusi nilai perankingan.</p>
    </div>
</body>
</html>
