<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Calon Kandidat</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            text-align: center;
        }

        .form h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333333;
        }

        .form h1 span {
            color: orange;
        }

        .form h1 span:last-child {
            color: #1a1aff;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555555;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #dddddd;
            border-radius: 30px;
            font-size: 16px;
            margin-left: auto;
            margin-right: auto;
            box-sizing: border-box;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #1a1aff;
            outline: none;
        }

        .form-group input::placeholder,
        .form-group select::placeholder,
        .form-group textarea::placeholder {
            color: #cccccc;
        }

        .btn {
            background-color: #1a1aff;
            color: white;
            padding: 10px 30px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-size: 16px;
            width: calc(100% - 20px);
            margin-left: auto;
            margin-right: auto;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0000e6;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hello, <span>future talent</span>!</h1>
        <form class="form" method="POST" action="{{ route('kandidat.store') }}">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
            </div>
            <div class="form-group">
                <label for="tempat-lahir">Tempat Lahir</label>
                <input type="text" id="tempat-lahir" name="tempat_lahir" placeholder="Masukkan tempat lahir" required>
            </div>
            <div class="form-group">
                <label for="tanggal-lahir">Tanggal Lahir</label>
                <input type="date" id="tanggal-lahir" name="tanggal_lahir" placeholder="Pilih tanggal" required>
            </div>
            <div class="form-group">
                <label for="jenis-kelamin">Jenis Kelamin</label>
                <select id="jenis-kelamin" name="jenis_kelamin" placeholder="Pilih jenis kelamin" required>
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
    </div>
</body>
</html>
