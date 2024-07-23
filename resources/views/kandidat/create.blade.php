@extends('layouts.template')

@section('content')
    <div class="main-content">
        <h1>Data Kandidat</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>No WA</th>
                    <th>CV</th>
                    <th>Portofolio</th>
                    <th>Pengalaman Kerja</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kandidats as $kandidat)
                <tr>
                    <td>{{ $kandidat->kandidat->id }}</td>
                    <td>{{ $kandidat->kandidat->nama }}</td>
                    <td>{{ $kandidat->kandidat->jurusan }}</td>
                    <td>{{ $kandidat->kandidat->jenis_kelamin }}</td>
                    <td>{{ $kandidat->kandidat->alamat }}</td>
                    <td>{{ $kandidat->kandidat->email }}</td>
                    <td>{{ $kandidat->kandidat->no_wa }}</td>
                    <td><a href="{{ $kandidat->kandidat->CV }}">{{ $kandidat->kandidat->CV }}</a></td>
                    <td><a href="{{ $kandidat->kandidat->portofolio }}">{{ $kandidat->kandidat->portofolio }}</a></td>
                    <td>{{ $kandidat->kandidat->pengalaman_kerja }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection