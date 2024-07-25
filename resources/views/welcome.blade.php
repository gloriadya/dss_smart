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

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
            <div class="container px-5">
                <a class="navbar-brand" href="/"><img src="images/logo.png" alt="PT Otak Kanan"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                        <li><a class="btn btn-primary btn-lg px-4 py-2 me-sm-3 fs-6 fw-bolder"
                                href="{{ route('register') }}">Register</a></li>
                        <li><a class="btn btn-primary btn-lg px-4 py-2 me-sm-3 fs-6 fw-bolder"
                                href="{{ route('login') }}">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <header class="py-5">
            <div class="container px-5 pb-5">
                <div class="row m-xl-auto">
                    <div class="col-lg-7">
                        <div class="text-xxl-start">
                            <h1 class="display-5 fw-bolder mb-5"><span class="text-gradient d-inline">Decision Support
                                    System</span></h1>
                            <div class="fs-6 font-weight-normal text-muted">
                                <p>Sistem ini dirancang untuk mempermudah manajemen dalam mengelola dan menganalisis
                                    nilai seleksi, sehingga dapat meningkatkan kualitas keputusan dan mempercepat proses
                                    seleksi calon pegawai magang di PT Otak Kanan.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="d-flex mt-5 mt-xxl-0">
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
                            <h2 class="display-8 fw-bolder"><span class="text-gradient d-inline">About PT. Otak Kanan - Indonesia</span></h2>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit
                                dolorum itaque qui unde quisquam consequatur autem. Eveniet quasi nobis aliquid cumque
                                officiis sed rem iure ipsa! Praesentium ratione atque dolorem?</p>
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
