<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pendukung Keputusan</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'figtree', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #f9f9f9;
        }
        .header {
            width: 100%;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header img {
            height: 50px;
        }
        .header .buttons {
            display: flex;
            gap: 20px;
        }
        .header .buttons a {
            text-decoration: none;
            color: #fff;
            background-color: #1d4ed8;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: 600;
        }
        .content {
            text-align: center;
            padding: 40px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .content img {
            width: 60%;
            max-width: 500px;
            margin-bottom: 20px;
        }
        .content h1 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .content p {
            font-size: 18px;
            color: #4b5563;
            max-width: 1000px;
        }
        .antialiased {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
    </style>
</head>
<body class="antialiased">
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                @else
                    @if (Route::has('register'))
                    @endif
                @endauth
            </div>
        @endif
        <div class="flex flex-col w-full">
            <div class="header">
                <img src="images/logo.png" alt="PT Otak Kanan">
                <div class="buttons">
                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Login HRD</a>
                    <!-- <a href="{{ route('kandidat.store') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Form Pelamar</a> -->
                </div>
            </div>

            <div class="content">
                <img src="images/illustration.png" alt="Decision Support System">
                <h1>Decision Support System</h1>
                <p>Sistem ini dirancang untuk mempermudah manajemen dalam mengelola dan menganalisis nilai seleksi, sehingga dapat meningkatkan kualitas keputusan dan mempercepat proses seleksi calon pegawai magang di PT Otak Kanan.</p>
            </div>
        </div>
    </div>
</body>
</html>