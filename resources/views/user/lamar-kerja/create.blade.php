@extends('layouts.template')

@section('content')
    <div class="main-content">
        <h1>Input Data Calon Pegawai</h1>
        <form class="form" method="POST" action="{{ route('isian-data-pelamar.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="lowongan_id" name="lowongan_id" value="{{ $lowongan->id }}" required>
            <div class="form-group">
                <label for="nama">Lowongan</label>
                <input type="text" disabled value="{{ $lowongan->judul }}" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <input type="text" id="jurusan" name="jurusan" placeholder="Masukkan jurusan" required>
            </div>
            <div class="form-group">
                <label for="jenis-kelamin">Jenis Kelamin</label>
                <select id="jenis-kelamin" name="jenis_kelamin" required>
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
            <div class="form-group">
                <label for="wa">Nomor WA</label>
                <input type="text" id="no_wa" name="no_wa" placeholder="Masukkan nomor WA" required>
            </div>
            <div class="form-group">
                <label for="cv">Link CV</label>
                <input type="url" id="cv" name="cv" placeholder="Masukkan link CV" required>
            </div>
            <div class="form-group">
                <label for="portofolio">Link Portofolio</label>
                <input type="url" id="portofolio" name="portofolio" placeholder="Masukkan link portofolio" required>
            </div>
            <div class="form-group">
                <label for="pengalaman">Pengalaman Kerja</label>
                <textarea id="pengalaman_kerja" name="pengalaman_kerja" placeholder="Masukkan pengalaman kerja" rows="4" required></textarea>
            </div>
            <button class="btn btn-secondary px-4 py-2 me-sm-3" style="border-radius: 100px" style="font-size: 0.8rem" type="submit">Submit</button>
        </form>

        <!-- Modal -->
        <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Success</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ session('success') }}
                    </div>
                    <!-- <div class="modal-footer">
                        <a href="{{ route('kandidat.create') }}" class="btn btn-primary">Tetap di Halaman Input</a>
                        <a href="{{ route('penilaian.index') }}" class="btn btn-secondary">Lanjut ke Penilaian</a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        @if(session('success'))
            $('#successModal').modal('show');
        @endif
    </script>
@endsection