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
            font-size: 24px;
            margin-bottom: 10px;
        }

        .main-content p {
            font-size: 16px;
            color: #333;
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
        .btn-primary {
            color: #fff;
            background-color: #3b4cca;
            border-color: #3b4cca;
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
            color: red;
        }

        h1 {
            text-align: left;
            color: #333;
            font-size: 24px;
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
                <!-- Conditionally render links based on role -->
                <!-- Admin Sidebar -->
                @if (Auth::user()->is_admin == 1)
                    <a href="{{ route('dashboard') }}" class="{{ Request::routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
                    <a href="{{ route('kandidat.create') }}" class="{{ Request::routeIs('kandidat.create') ? 'active' : '' }}">Data Kandidat</a>
                    <a href="{{ route('penilaian.index') }}" class="{{ Request::routeIs('penilaian.index') ? 'active' : '' }}">Penilaian Kandidat</a>
                    <a href="{{ route('kandidat.rank') }}" class="{{ Request::routeIs('kandidat.rank') ? 'active' : '' }}">Perankingan</a>
                @endif

                <!-- User Sidebar -->
                @if (Auth::user()->is_admin == 0)
                    <a href="{{ route('user.daftar-lowongan') }}" class="{{ Request::routeIs('user.daftar-lowongan') ? 'active' : '' }}">Daftar Lowongan</a>
                @endif
            </nav>
        </div>
        <div class="logout">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Keluar Akun</button>
            </form>
        </div>
    </div>
    @yield('content')
</body>

</html>
