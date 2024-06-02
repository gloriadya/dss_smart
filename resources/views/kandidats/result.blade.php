@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Hasil Seleksi</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Total Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kandidats as $kandidat)
            <tr>
                <td>{{ $kandidat->nama }}</td>
                <td>{{ $kandidat->total_score }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection