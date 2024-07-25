<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistem Pendukung Keputusan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet" />
</head>

<body>
    <div class="sidebar">
        <div>
            <div class="logo">
                <img src="/images/logo.png" alt="Logo" style="width: 60%;">
            </div>
            <nav style="font-size: 0.8rem">
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
                <button style="font-size: 0.8rem" type="submit">Keluar Akun</button>
            </form>
        </div>
    </div>
    @yield('content')
</body>

</html>
