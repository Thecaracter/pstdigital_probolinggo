@extends('layout.applanding')
@section('title', 'PST Probolinggo')
@section('content')
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar & Carousel Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg bg-dark px-5 py-3 py-lg-0">
            <a href="/" class="navbar-brand p-0">
                <!-- Replace the icon with an image -->
                <img src="foto/logo_pst_putih.png" alt="PST" width="100" height="50" class="m-0">
            </a>
        </nav>


        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="\foto/foto_1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Pelayanan Statistik Terpadu
                                Digital</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Badan Pusat Statistik Kabupaten
                                Probolinggo
                            </h1>
                            <a href="/catalog" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Katalog</a>
                            <a href="https://wa.me/+6281210003513?text=Permisi admin,apakah saya bisa berkonsultasi dengan anda melalui wa"
                                class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Chat
                                Me</a>
                            @if ($jumlahDataHariIni > 5)
                                <a href="#" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight"
                                    onclick="handleKonsultasiClick()">
                                    Konsultasi Virtual
                                </a>
                                <script>
                                    function handleKonsultasiClick() {
                                        // Tampilkan SweetAlert
                                        Swal.fire({
                                            icon: 'info',
                                            title: 'Pemberitahuan',
                                            text: 'Mohon maaf, daftar tunggu untuk konsultasi virtual telah penuh.',
                                            showConfirmButton: false,
                                            timer: 3000 // Tampilkan selama 3 detik
                                        });
                                    }
                                </script>
                            @else
                                <a href="/formkonsultasi"
                                    class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">
                                    Konsultasi Virtual
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="foto/foto_2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">PST DIGITAL
                            </h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Badan Pusat Statistik Kabupaten
                                Probolinggo
                            </h1>
                            <a href="catalog" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Katalog</a>
                            <a href="https://wa.me/+6281210003513?text=Permisi admin,apakah saya bisa berkonsultasi dengan anda melalui wa"
                                class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Chat
                                Me</a>
                            @if ($jumlahDataHariIni > 5)
                                <a href="#" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight"
                                    onclick="handleKonsultasiClick()">
                                    Konsultasi Virtual
                                </a>
                                <script>
                                    function handleKonsultasiClick() {
                                        // Tampilkan SweetAlert
                                        Swal.fire({
                                            icon: 'info',
                                            title: 'Pemberitahuan',
                                            text: 'Mohon maaf, daftar tunggu untuk konsultasi virtual telah penuh.',
                                            showConfirmButton: false,
                                            timer: 3000 // Tampilkan selama 3 detik
                                        });
                                    }
                                </script>
                            @else
                                <a href="/formkonsultasi"
                                    class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">
                                    Konsultasi Virtual
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Navbar & Carousel End -->


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3"
                            placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->

    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">Tentang Kami</h5>
                        <h1 class="mb-0">Badan Pusat Statistik Kabupaten Probolinggo</h1>
                    </div>
                    <p class="mb-4">pstdigital.bpskabprobolinggo : untuk memberikan pelayanan data dan kegiatan BPS yang
                        terdiri dari beberapa jenis pelayanan yang dilakukan secara terpadu.
                    </p>
                    <div class="row g-0 mb-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Profesional</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Intergritas</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Informatif</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Amanah</h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded"
                            style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">No Telepon Interaktif</h5>
                            <h4 class="text-primary mb-0"> (0335) 422117 </h4>
                        </div>
                    </div>
                    {{-- <a href="quote.html" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s">Request
                        A Quote</a> --}}
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s"
                            src="foto/animasi1.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-10 col-md-6 footer-about">
                    <div class="col-lg-4 col-md-10 pt-5 mb-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="text-light mb-0">Sosial Media Kami</h3>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-geo-alt text-primary me-2"></i>
                            <p class="mb-0">Jln. Raya Lumajang KM 5, Sumbertaman, Probolinggo</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-envelope-open text-primary me-2"></i>
                            <p class="mb-0">bps3513@bps.go.id</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-telephone text-primary me-2"></i>
                            <p class="mb-0"> (0335) 422117 </p>
                        </div>
                        <div class="d-flex mt-4">
                            <a class="btn btn-primary btn-square me-2"
                                href="https://youtube.com/@bpskab.probolinggo6270?si=i4I_91rP5zSH07bB"><i
                                    class="fab fa-youtube fw-normal"></i></a>
                            <a class="btn btn-primary btn-square me-2"
                                href="https://www.facebook.com/bpskabupaten.probolinggo.9?mibextid=rS40aB7S9Ucbxw6v"><i
                                    class="fab fa-facebook-f fw-normal"></i></a>
                            <a class="btn btn-primary btn-square"
                                href="https://www.instagram.com/bpskabprobolinggo?igshid=OGQ5ZDc2ODk2ZA"><i
                                    class="fab fa-instagram fw-normal"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-white" style="background: #061429;">
        <div class="container text-center">
            <div class="row justify-content-end">
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                        <p class="mb-0"><a class="text-white border-bottom" href="#"></a>
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            <a class="text-white border-bottom" href="https://htmlcodex.com"></a>
                        </p>
                        <br><a class="border-bottom" href="https://themewagon.com" target="_blank"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>
@endsection
