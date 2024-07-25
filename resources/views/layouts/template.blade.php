<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistem Pendukung Keputusan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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
                <a href="{{ route('dashboard') }}" class="{{ Request::routeIs('dashboard') ? 'active' : '' }}"><i class="bi bi-grid" style="margin-right: 5px"></i>Dashboard</a>
                <a href="{{ route('kandidat.create') }}" class="{{ Request::routeIs('kandidat.create') ? 'active' : '' }}"><i class="bi bi-stickies" style="margin-right: 5px"></i>Data Kandidat</a>
                <a href="{{ route('penilaian.index') }}" class="{{ Request::routeIs('penilaian.index') ? 'active' : '' }}"><i class="bi bi-input-cursor-text" style="margin-right: 5px"></i>Penilaian Kandidat</a>
                <a href="{{ route('kandidat.rank') }}" class="{{ Request::routeIs('kandidat.rank') ? 'active' : '' }}"><i class="bi bi-bar-chart" style="margin-right: 5px"></i>Perankingan</a>
                <a href="{{ route('lowongan.index') }}" class="{{ Request::routeIs('lowongan.index') ? 'active' : '' }}"><i class="bi bi-plus-circle" style="margin-right: 5px"></i>Lowongan</a>
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
                <button style="font-size: 0.8rem" type="submit"><i class="bi bi-box-arrow-right" style="margin-right: 5px"></i>Keluar Akun</button>
            </form>
        </div>
    </div>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>
