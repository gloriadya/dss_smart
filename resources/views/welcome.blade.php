<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sistem Pendukung Keputusan</title>

    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />

    <link href="css/style.css" rel="stylesheet" />
</head>

<body class="welcome d-flex flex-column">
    <main class="flex-shrink-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container px-5">
                <a class="navbar-brand" href="/"><img src="images/logo.png" width="70%" alt="PT Otak Kanan"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li><a class="btn btn-primary px-3 py-1 me-sm-3" style="border-radius: 100px;"
                                href="{{ route('register') }}">Register</a></li>
                        <li><a class="btn btn-secondary px-4 py-1 me-sm-3" style="border-radius: 100px"
                                href="{{ route('login') }}">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <header class="py-5">
            <div class="container px-5 pb-5">
                <div class="row align-items-center"> 
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="text-xxl-start">
                            <h1 class="display-5 fw-bolder mb-3"><span class="text-gradient d-inline">Aplikasi Seleksi Pegawai Magang</span></h1>
                            <div class="fs-6 font-weight-normal text-muted">
                                <p>Sistem ini dirancang untuk mempermudah manajemen dalam mengelola dan menganalisis
                                    nilai seleksi, sehingga dapat meningkatkan kualitas keputusan dan mempercepat proses
                                    seleksi calon pegawai magang di PT Otak Kanan.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-flex justify-content-center">
                            <div>
                                <img width="100%" src="/images/illustration.png" alt="..." />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section class="bg-light py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-xxl-8">
                        <div class="text-center my-5">
                            <h3 class="display-8 fw-bolder"><span class="text-gradient d-inline">Tentang PT Otak Kanan - Indonesia</span></h3>
                            <p class="text-muted">Lebih dari 10 tahun sejak berdiri tahun 2009 PT Otak Kanan telah menjalankan usaha dengan penuh kreativitas hingga kini menjadi perusahaan teknologi digital yang telah melayani ribuan pelanggan dari berbagai segmen pasar dan menjadi solusi bagi pribadi maupun perusahaan yang ingin bertransformasi menjadi lebih baik dan berkelanjutan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @auth
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var user = @json(Auth::user()); 
            if (user.is_admin === 1) {
                window.location.href = "{{ route('dashboard') }}";
            } else {
                window.location.href = "{{ route('user.daftar-lowongan') }}";
            }
        });
    </script>
    @endauth
</body>

</html>
