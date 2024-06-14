<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Ranking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
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
        table th, table td {
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
    </style>
</head>
<body>
    <h1>Candidate Ranking</h1>
    @if($kandidats->isEmpty())
        <div class="no-scores">No candidates available</div>
    @else
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Skor</th>
                    <th class="detail-column">Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kandidats as $kandidat)
                    @if(isset($kandidat->score) && $kandidat->score != 0)
                        <tr>
                            <td>{{ $kandidat->nama }}</td>
                            <td>{{ number_format($kandidat->score, 2) }}</td>
                            <td class="detail-column">
                                <strong>Email:</strong> {{ $kandidat->email }}
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
