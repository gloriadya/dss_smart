{{-- @extends('layouts.template')

@section('content')
    <div class="main-content">
        <section class="py-5">
            <div class="container px-5 mb-5">
                <div class="card-container overflow-hidden shadow rounded-4 border-0 mb-5">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="p-5 flex-fill">
                                <div class="stepper">
                                    <div class="step {{ $kandidat->sudah_daftar === 1 ? 'active' : '' }}">
                                        <div class="circle">1</div>
                                        <div class="label">Sudah Daftar</div>
                                        <div class="description">Lorem ipsum dolor sit amet consectetur adipiscing elit.</div>
                                        <div class="line"></div>
                                    </div>
                                    <div class="step {{ $kandidat->lolos_berkas ? 'active' : '' }}">
                                        <div class="circle">2</div>
                                        <div class="label">
                                            {{ $kandidat->lolos_berkas === 0 ? 'Gagal' : 'Lolos Berkas' }}
                                        </div>
                                        <div class="description">Lorem ipsum dolor sit amet consectetur adipiscing elit.</div>
                                        <div class="line"></div>
                                    </div>
                                    <div class="step {{ $kandidat->sudah_dinilai ? 'active' : '' }}">
                                        <div class="circle">3</div>
                                        <div class="label">Sudah Dinilai</div>
                                        <div class="description">Lorem ipsum dolor sit amet consectetur adipiscing elit.</div>
                                        <div class="line"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection --}}
@extends('layouts.template')

@section('content')
    <div class="main-content">
        <section class="py-5">
            @foreach($kandidats as $kandidat)
            <div class="container px-5 mb-5">
                <div class="card-container overflow-hidden shadow rounded-4 border-0 mb-5">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="p-5 flex-fill">
                                <p class="text-gradient d-inline" style="font-size: 1rem; font-weight:600">{{ $kandidat->lowongan->judul }}</p>
                                <div class="stepper mt-3">
                                    <div class="step {{ $kandidat->kandidat->sudah_daftar === 1 ? 'active' : '' }}">
                                        <div class="circle">1</div>
                                        <div class="line" style="background-color: {{ $kandidat->kandidat->lolos_berkas ? '#F59A09' : '#5D5D5D' }}"></div>
                                        <div class="label">Sudah Daftar</div>
                                        <p class="mt-2">Pendaftaran telah selesai! Saatnya menunggu langkah selanjutnya.</p>
                                    </div>
                                    <div class="step {{ $kandidat->kandidat->lolos_berkas ? 'active' : '' }}">
                                        <div class="circle">2</div>
                                        <div class="line" style="background-color: {{ $kandidat->kandidat->sudah_dinilai ? '#F59A09' : '#5D5D5D' }}"></div>
                                        <div class="label">
                                            {{ $kandidat->kandidat->lolos_berkas === 0 ? 'Gagal' : 'Lolos Berkas' }}
                                        </div>
                                        <p class="mt-2">Berkas sudah lolos! Sekarang saatnya bersiap-siap untuk tahap selanjutnya.</p>
                                    </div>
                                    <div class="step {{ $kandidat->kandidat->sudah_dinilai ? 'active' : '' }}">
                                        <div class="circle">3</div>
                                        <div class="label">Menunggu Pengumuman</div>
                                        <p class="mt-2">Perjalanan seleksi belum berakhir. Semoga kabar baik segera datang.</p>
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
