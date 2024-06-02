@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('kandidats.create') }}" class="btn btn-primary">Tambah Kandidat</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kandidats as $kandidat)
            <tr>
                <td>{{ $kandidat->nama }}</td>
                <td>
                    <a href="#" class="btn btn-info">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection