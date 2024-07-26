@extends('layouts.template')

@section('content')
    <div class="main-content">
        <section class="py-5">
            @foreach($kandidats as $kandidat)
            <div class="container px-5 mb-5">
                <div class="card-container overflow-hidden shadow rounded-4 border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="p-4 flex-fill">
                                <p class="text-gradient d-inline" style="font-size: 1rem; font-weight:600">{{ $kandidat->lowongan->judul }}</p>
                                <div class="stepper mt-3">
                                    <div class="step {{ $kandidat->kandidat->sudah_daftar === 1 ? 'active' : '' }}">
                                        <div class="circle">1</div>
                                        <div class="line" style="background-color: {{ $kandidat->kandidat->lolos_berkas === 1 ? '#F59A09' : ($kandidat->kandidat->lolos_berkas === 0 ? '#dc3545' : '#5D5D5D') }}"></div>
                                        <div class="label">Sudah Daftar</div>
                                        <p class="mt-2 p-1">Pendaftaran telah selesai! Saatnya menunggu langkah selanjutnya.</p>
                                    </div>
                                    <div class="step {{ $kandidat->kandidat->lolos_berkas ? 'active' : '' }}">
                                        <div class="circle" style="background-color: {{ $kandidat->kandidat->lolos_berkas === 0 ? '#dc3545' :  ($kandidat->kandidat->lolos_berkas === 1 ? '#F59A09' : '#5D5D5D') }}">2</div>
                                        <div class="line" style="background-color: {{ $kandidat->kandidat->sudah_dinilai ? '#F59A09' : '#5D5D5D' }}"></div>
                                        <div class="label">
                                            {{ $kandidat->kandidat->lolos_berkas === 0 ? 'Gagal' : 'Lolos Berkas' }}
                                        </div>
                                        <p class="mt-2">{{ $kandidat->kandidat->lolos_berkas === 1 ? 'Berkas sudah lolos! Sekarang saatnya bersiap-siap untuk tahap selanjutnya.' : ($kandidat->kandidat->lolos_berkas === 0 ? 'Terima kasih telah melamar program magang di PT Otak Kanan. Setelah evaluasi mendalam, kami memutuskan untuk melanjutkan dengan kandidat lain yang lebih sesuai dengan kebutuhan kami saat ini. Jangan berkecil hati, tetap berjuang, dan semoga sukses dalam karier Anda ke depannya.' : 'Berkas sudah lolos! Sekarang saatnya bersiap-siap untuk tahap selanjutnya.') }}</p>
                                    </div>
                                    <div class="step {{ $kandidat->kandidat->sudah_dinilai ? 'active' : '' }}">
                                        <div class="circle">3</div>
                                        <div class="label">Menunggu Pengumuman</div>
                                        <p class="mt-2 p-1">Perjalanan seleksi belum berakhir. Semoga kabar baik segera datang.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </section>
    @endsection
