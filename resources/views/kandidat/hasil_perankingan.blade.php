<!DOCTYPE html>
<html>
<head>
    <title>Hasil Perankingan Kandidat</title>
</head>
<body>
    <h1>Hasil Perankingan Kandidat</h1>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Total Skor</th>
        </tr>
        @foreach ($kandidats as $kandidat)
            <tr>
                <td>{{ $kandidat->nama }}</td>
                <td>{{ $kandidat->total_score }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>