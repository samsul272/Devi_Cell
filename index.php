<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Keuangan Devi Cell</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" href="dist/img/konter.png">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="dist/templeteimg/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="dist/templete/lib/animate/animate.min.css" rel="stylesheet">
    <link href="dist/templete/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="dist/templete/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="dist/templete/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 px-4 px-lg-5">
        <a href="index.php" class="navbar-brand d-flex align-items-center">
            <h2 class="m-0 text-primary"><img class="img-fluid me-2" src="dist/img/konter_transparan.png" alt="" style="width: 45px;">Devi Cell</h2>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php
        if (isset($_GET['href'])) {
            $hal = $_GET['href'];
            // $hal = $_GET['page'];
        }
        ?>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-4 py-lg-0">
                <a href="#home" class="nav-item nav-link">Home</a>
                <a href="#about" class="nav-item nav-link">About</a>
                <a href="#pemasukan" class="nav-item nav-link">Financial Data</a>
                <a href="#roadmap" class="nav-item nav-link">Roadmap</a>
                <a href="#contact" class="nav-item nav-link">Contact</a>
                <a href="login.php" class="nav-item nav-link btn btn-primary px-3" style="border-radius: 6px;">Login</a>
            </div>
            <div class="h-100 d-lg-inline-flex align-items-center d-none">
                <a class="btn btn-square rounded-circle bg-light text-primary me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-square rounded-circle bg-light text-primary me-2" href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid hero-header bg-light py-5 mb-5" id="home">
        <div class="container py-5">
            <div class=" row g-5 align-items-center">
                <div class="col-lg-6">
                    <h2 class="display-3 mb-3 animated slideInDown">Aplikasi Catatan Keuangan Konter Pulsa Devi Cell</h2>
                    <p class="animated slideInDown">Ini adalah aplikasi Manajemen Catatan Keuangan Konter Pulsa Devi Cell v.1</p>

                    <p class="animated slideInDown">Aplikasi ini berfungsi untuk mencatat aktivitas keuangan di konter pulsa Devi Cell, baik aktivitas pemasukan maupun pengeluaran.</p>
                    <a href="login.php" class="btn btn-primary  py-3 px-4 animated slideInDown" style="border-radius: 6px;">Mulai</a>
                </div>
                <div class="col-lg-6 animated fadeIn">
                    <img class="img-fluid animated pulse infinite" style="animation-duration: 3s;" src="dist/templete/img/hero-1.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- About Start -->
    <div class="container-xxl py-5" id="about">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid" src="dist/templete/img/about.png" alt="">
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h1 class="display-6">About Us</h1>
                        <p class="text-primary fs-5 mb-4">Sebuah Aplikasi Yang Dirancang dan Dibangun Seorang Mahasiswa Cokroaminoto Palopo</p>
                        <p>Aplikasi ini dibuat untuk memudahkan pengguna dalam mengelola data keuangan di konter pulsa Devi Cell
                        </p>
                        <p class="mb-4">Aplikasi ini menyediakan beberapa fitur di antaranya:</p>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fa fa-check bg-light text-primary btn-sm-square rounded-circle me-3 fw-bold"></i>
                            <span>Membuat data kategori pemasukan ataupun pengeluaran</span>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fa fa-check bg-light text-primary btn-sm-square rounded-circle me-3 fw-bold"></i>
                            <span>Melakukan Transaksi Pemasukan ataupun Pengeluaran</span>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <i class="fa fa-check bg-light text-primary btn-sm-square rounded-circle me-3 fw-bold"></i>
                            <span>Mencetak Data Transaksi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Features Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">Why Us!</h1>
                <p class="text-primary fs-5 mb-5">Karena Aplikasi ini mudah digunakan dan bisa menyimpan data dalam waktu yang lama</p>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-flex align-items-start">
                        <img class="img-fluid flex-shrink-0" src="dist/templete/img/icon-7.png" alt="">
                        <div class="ps-4">
                            <h5 class="mb-3">Mudah untuk Digunakan</h5>
                            <span>Aplikasi ini dibuat dengan tampilan yang mudah dipahami</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="d-flex align-items-start">
                        <img class="img-fluid flex-shrink-0" src="dist/templete/img/icon-6.png" alt="">
                        <div class="ps-4">
                            <h5 class="mb-3">Keamanan Data</h5>
                            <span>Aplikasi ini dikelola dengan enkripsi dengan adanya fitur login dan logout</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="d-flex align-items-start">
                        <img class="img-fluid flex-shrink-0" src="dist/templete/img/icon-8.png" alt="">
                        <div class="ps-4">
                            <h5 class="mb-3">24 Jam Akses Data Keuangan</h5>
                            <span>Dapat diakses dimanapun kapan pun tanpa terbatas waktu!</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-flex align-items-start">
                        <img class="img-fluid flex-shrink-0" src="dist/templete/img/icon-2.png" alt="">
                        <div class="ps-4">
                            <h5 class="mb-3">Data Eksport</h5>
                            <span>Data dapat disimpan dalam bentuk PDF</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="d-flex align-items-start">
                        <img class="img-fluid flex-shrink-0" src="dist/templete/img/icon-4.png" alt="">
                        <div class="ps-4">
                            <h5 class="mb-3">Kontrol Data User</h5>
                            <span>Admin dapat menambah dan mengelola data User</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="d-flex align-items-start">
                        <img class="img-fluid flex-shrink-0" src="dist/templete/img/icon-3.png" alt="">
                        <div class="ps-4">
                            <h5 class="mb-3">Fitur About/Tentang Aplikasi</h5>
                            <span>Memungkinkan informasi seputar aplikasi serta versi aplikasi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->


    <!-- Facts Start -->
    <?php
    include "inc/koneksi.php";
    include "inc/rupiah.php";
    include "inc/enk.php";
    ?>
    <?php
    $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk from transaksi where jenis='Masuk'");
    while ($data = $sql->fetch_assoc()) {
        $masuk = $data['tot_masuk'];
    }
    ?>
    <?php
    $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from transaksi where jenis='Keluar'");
    while ($data = $sql->fetch_assoc()) {
        $keluar = $data['tot_keluar'];
    }

    ?>
    <div class="container-xxl bg-light py-5 my-5" id="pemasukan">
        <div class="container py-5">
            <div class="row g-5">

                <div class="col-lg-4 col-md-6 text-center wow fadeIn" data-wow-delay="0.1s">
                    <img class="img-fluid mb-4" src="dist/templete/img/icon-9.png" alt="">
                    <h1>Rp.</h1>
                    <h1 class="display-4" data-toggle="counter-up"><?php echo $masuk; ?></h1>
                    <p class="fs-5 text-primary mb-0">Pemasukan Hari ini</p>
                </div>
                <div class="col-lg-4 col-md-6 text-center wow fadeIn" data-wow-delay="0.3s">
                    <img class="img-fluid mb-4" src="dist/templete/img/icon-10.png" alt="">
                    <h1>Rp.</h1>
                    <h1 class="display-4" data-toggle="counter-up"><?php echo $keluar; ?></h1>
                    <p class="fs-5 text-primary mb-0">Pengeluaran Hari ini</p>
                </div>
                <div class="col-lg-4 col-md-6 text-center wow fadeIn" data-wow-delay="0.5s">
                    <img class="img-fluid mb-4" src="dist/templete/img/icon-2.png" alt="">
                    <h1>Rp.</h1>
                    <h1 class="display-4" data-toggle="counter-up"><?php $saldo = $masuk - $keluar;
                                                                    echo ($saldo); ?></h1>
                    <p class="fs-5 text-primary mb-0">Total Pemasukan dan Pengeluaran</p>
                </div>
            </div>
            <?php

            ?>
        </div>
    </div>
    <!-- Facts End -->


    <!-- Roadmap Start -->
    <div class="container-xxl py-5" id="roadmap">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">Peta Jalan Perkembangan Konter Pulsa Devi Cell</h1>
                <p class="text-primary fs-5 mb-5">Sedikit Sejarah Tentang Berdirinya Konter Pulsa <br> Devi Cell Dusun Tulung Rejo</p>
            </div>
            <div class="owl-carousel roadmap-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="roadmap-item">
                    <div class="roadmap-point"><span></span></div>
                    <h5>Tahun 2020</h5>
                    <span>Konter Pulsa Devi Cell mulai berdiri</span>
                </div>
                <div class="roadmap-item">
                    <div class="roadmap-point"><span></span></div>
                    <h5>Tahun 2021</h5>
                    <span>Dibangun cabang baru konter pulsa Devi Cell yang terletak di Pembasean</span>
                </div>
                <div class="roadmap-item">
                    <div class="roadmap-point"><span></span></div>
                    <h5>Tahun 2021 - Sekarang</h5>
                    <span>Dibangun cabang baru konter pulsa Devi Cell yang terletak di Desa Sidobinangun</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Roadmap End -->


    <!-- Token Sale Start -->
    <!-- <div class="container-xxl bg-light py-5 my-5">
        <div class="container py-5">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">Token Sale</h1>
                <p class="text-primary fs-5 mb-5">Token Sale Countdown</p>
            </div>
            <div class="row g-3">
                <div class="col-6 col-md-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="bg-white text-center p-3">
                        <h1 class="mb-0">0</h1>
                        <span class="text-primary fs-5">Days</span>
                    </div>
                </div>
                <div class="col-6 col-md-3 wow fadeIn" data-wow-delay="0.3s">
                    <div class="bg-white text-center p-3">
                        <h1 class="mb-0">0</h1>
                        <span class="text-primary fs-5">Hours</span>
                    </div>
                </div>
                <div class="col-6 col-md-3 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-white text-center p-3">
                        <h1 class="mb-0">0</h1>
                        <span class="text-primary fs-5">Minutes</span>
                    </div>
                </div>
                <div class="col-6 col-md-3 wow fadeIn" data-wow-delay="0.7s">
                    <div class="bg-white text-center p-3">
                        <h1 class="mb-0">0</h1>
                        <span class="text-primary fs-5">Seconds</span>
                    </div>
                </div>
                <div class="col-12 text-center py-4">
                    <a class="btn btn-primary py-3 px-4" href="">Buy Token</a>
                </div>
                <div class="col-12 text-center">
                    <img class="img-fluid m-1" src="img/payment-1.png" alt="" style="width: 50px;">
                    <img class="img-fluid m-1" src="img/payment-2.png" alt="" style="width: 50px;">
                    <img class="img-fluid m-1" src="img/payment-3.png" alt="" style="width: 50px;">
                    <img class="img-fluid m-1" src="img/payment-4.png" alt="" style="width: 50px;">
                </div>
            </div>
        </div>
    </div> -->
    <!-- Token Sale Start -->


    <!-- FAQs Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">FAQs</h1>
                <p class="text-primary fs-5 mb-5">Seputar Pertanyaan mengenai Aplikasi</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.2s">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Bagaimana Cara Menggunakan Aplikasi?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Anda dapat menanyakan lebih lengkap pada alamat email muhammadsamsul20001@gmail.com
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.2s">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Apakah ada pembaharuan dari aplikasi ini?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Kemungkinan iya, jika ada bug atau error yang dikirimkan oleh pengguna aplikasi, atau akan diperbaharui jika pengguna membutuhkan fitur baru dari aplikasi yang dibuat.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.3s">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Mengapa aplikasi ini dibuat?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Aplikasi ini dibuat sebagai bentuk penyelesaian skripsi dari salah satu mahasiswa Cokroaminoto Palopo yang bernama Samsul, aplikasi ini dibuat untuk mempermudah dalam mengelola data keuangan dalam jangka yang panjang
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- FAQs Start -->


    <!-- Footer Start -->
    <div class="container-fluid bg-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s" id="contact">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6">
                    <h1 class="text-primary mb-4"><img class="img-fluid me-2" src="dist/img/konter_transparan.png" alt="" style="width: 45px;">Konter Pulsa Devi Cell</h1>
                    <span>Aplikasi Manajemen Catatan Keuangan Konter Pulsa Devi Cell v.1<br>
                        Aplikasi ini berfungsi untuk mencatat aktivitas keuangan di konter pulsa Devi Cell, baik aktivitas pemasukan maupun pengeluaran.</span>
                </div>
                <div class="col-md-6">
                    <h5 class="mb-4">Newsletter</h5>
                    <p>Informasi lebih lanjut bisa kirimkan email pelanggan.</p>
                    <div class="position-relative">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 px-3 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="mb-4">Get In Touch</h5>
                    <p><i class="fa fa-map-marker-alt me-3"></i>Desa Patila, Dusun Tulung Rejo, Sulawesi Selatan</p>
                    <p><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p><i class="fa fa-envelope me-3"></i>@muhammadsamsul20001</p>
                </div>
                <!-- <div class="col-lg-3 col-md-6">
                    <h5 class="mb-4">Our Services</h5>
                    <a class="btn btn-link" href="">Currency Wallet</a>
                    <a class="btn btn-link" href="">Currency Transaction</a>
                    <a class="btn btn-link" href="">Bitcoin Investment</a>
                    <a class="btn btn-link" href="">Token Sale</a>
                </div> -->
                <div class="col-lg-3 col-md-6">
                    <h5 class="mb-4">Quick Links</h5>
                    <a class="btn btn-link" href="#home">Home</a>
                    <a class="btn btn-link" href="#about">About Us</a>
                    <a class="btn btn-link" href="#contact">Contact Us</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="mb-4">Follow Us</h5>
                    <div class="d-flex">
                        <a class="btn btn-square rounded-circle me-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square rounded-circle me-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square rounded-circle me-1" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square rounded-circle me-1" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="#">devicell</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a href="https://htmlcodex.com">HTML Codex</a> Distributed By <a href="https://themewagon.com">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="dist/templete/lib/wow/wow.min.js"></script>
    <script src="dist/templete/lib/easing/easing.min.js"></script>
    <script src="dist/templete/lib/waypoints/waypoints.min.js"></script>
    <script src="dist/templete/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="dist/templete/lib/counterup/counterup.min.js"></script>

    <!-- Template Javascript -->
    <script src="dist/templete/js/main.js"></script>
</body>

</html>