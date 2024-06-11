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
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        .form {
            display: flex;
            flex-direction: column;
        }

        .form h2 {
            margin-bottom: 20px;
            color: #333333;
            text-align: center;
        }

        .form label {
            margin-bottom: 5px;
            color: #555555;
        }

        .form input, .form select, .form textarea, .form button {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #dddddd;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
        }

        .form input:focus, .form select:focus, .form textarea:focus {
            border-color: #80bdff;
            outline: none;
            box-shadow: 0 0 5px rgba(128, 189, 255, 0.5);
        }

        .form button {
            background-color: #28a745;
            color: #ffffff;
            border: none;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        .form button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <form class="form" method="POST" action="{{ route('kandidat.store') }}">
            @csrf
            <h2>Form Calon Kandidat</h2>
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="tempat-lahir">Tempat Lahir:</label>
            <input type="text" id="tempat-lahir" name="tempat_lahir" required>

            <label for="tanggal-lahir">Tanggal Lahir:</label>
            <input type="date" id="tanggal-lahir" name="tanggal_lahir" required>

            <label for="jenis-kelamin">Jenis Kelamin:</label>
            <select id="jenis-kelamin" name="jenis_kelamin" required>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>

            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" rows="4" required></textarea>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <button type="submit">Submit Form</button>
        </form>
    </div>
</body>
</html>
