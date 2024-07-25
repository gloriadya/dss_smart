@extends('layouts.template')

@section('content')
    <div class="main-content">
        <h1>Data Kandidat</h1>
        <div class="form-group">
            <label for="lowongan_id">Pilih Lowongan</label>
            <select class="form-control" id="lowongan_id" name="lowongan_id">
                <option value="">Pilih Lowongan</option>
                @foreach ($kandidats as $kandidat)
                    <option value="{{ $kandidat->lowongan->id }}">{{ $kandidat->lowongan->judul }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tahun">Pilih Tahun</label>
            <select class="form-control" id="tahun" name="tahun">
                <option value="">Pilih Tahun</option>
                @foreach ($years as $year)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endforeach
            </select>
        </div>
        <table class="responsive-table" id="kandidatTable">
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
                    <tr data-lowongan-id="{{ $kandidat->lowongan->id }}" data-tahun="{{ $kandidat->created_at->year }}">
                        <td>{{ $kandidat->kandidat->id }}</td>
                        <td>{{ $kandidat->kandidat->nama }}</td>
                        <td>{{ $kandidat->kandidat->jurusan }}</td>
                        <td style="text-align: center">{{ $kandidat->kandidat->jenis_kelamin }}</td>
                        <td>{{ $kandidat->kandidat->alamat }}</td>
                        <td>{{ $kandidat->kandidat->email }}</td>
                        <td>{{ $kandidat->kandidat->no_wa }}</td>
                        <td style="text-align: center"><a href="{{ $kandidat->kandidat->CV }}"><img
                                    src="/images/CV_Porto.png" width="20px" height="25px" /></a></td>
                        <td style="text-align: center"><a href="{{ $kandidat->kandidat->portofolio }}"><img
                                    src="/images/CV_Porto.png" width="20px" height="25px" /></a></td>
                        <td>{{ $kandidat->kandidat->pengalaman_kerja }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const lowonganSelect = document.getElementById('lowongan_id');
            const tahunSelect = document.getElementById('tahun');
            const table = document.getElementById('kandidatTable');
            const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

            function filterTable() {
                const lowonganId = lowonganSelect.value;
                const tahun = tahunSelect.value;

                for (let row of rows) {
                    const rowLowonganId = row.getAttribute('data-lowongan-id');
                    const rowTahun = row.getAttribute('data-tahun');

                    if ((lowonganId === '' || rowLowonganId === lowonganId) && (tahun === '' || rowTahun === tahun)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            }

            lowonganSelect.addEventListener('change', filterTable);
            tahunSelect.addEventListener('change', filterTable);
        });
    </script>
@endsection
