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
            background-color: #f8f9fa;
        }
        .container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            background-color: #343a40;
            color: #fff;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        nav {
            background-color: #495057;
            color: #fff;
            padding: 15px 20px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        nav a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        nav a:hover {
            color: #adb5bd;
        }
        main {
            flex: 1;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
            border-radius: 10px;
        }
        footer {
            background-color: #343a40;
            color: #fff;
            padding: 15px 20px;
            text-align: center;
        }
        .btn-logout {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 16px;
        }
        .btn-logout:hover {
            color: #adb5bd;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Dashboard Admin</h1>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </header>
        <nav>
            <a href="{{ route('penilaian.index') }}">Penilaian Kandidat</a>
            <a href="{{ route('kandidat.rank') }}">Perankingan</a>
        </nav>
        <main>
            <h2>Selamat Datang, Admin</h2>
            <p>Gunakan menu di atas untuk mengelola penilaian kandidat dan perankingan.</p>
        </main>
        <footer>
            &copy; 2024 Sistem Pendukung Keputusan
        </footer>
    </div>
</body>
</html>
