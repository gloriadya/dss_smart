<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Ranking</title>
</head>
<body>
    <h1>Candidate Ranking</h1>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Skor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kandidats as $kandidat)
                @if($kandidat->nilai)
                    <tr>
                        <td>{{ $kandidat->nama }}</td>
                        <td>{{ $kandidat->score }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</body>
</html>
