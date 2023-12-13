<!DOCTYPE html>
<html lang="en">
<?php
header("Content-Security-Policy: default-src 'self' *");
header("Content-Security-Policy: img-src 'self' *");
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-Frame-Options" content="sameorigin">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EPROC - JMTO</title>
    <!-- CSS Global Compulsory (Do not remove)-->
    <link rel="stylesheet" href="<?= base_url('assets_landing/') ?>bootstrap.min.css" />
    <!-- dattable -->
    <link rel="stylesheet" href="<?= base_url('assets_landing/') ?>dataTables.bootstrap4.min.css" />
    <!-- Template Style -->
    <link rel="stylesheet" href="<?= base_url('assets_landing/') ?>style.css" />
    <link rel="stylesheet" href="<?= base_url('assets_landing/') ?>sticky.css" />
</head>

<body>

    <!--=================================
    Header -->
    <header class="header header-transparent header-sticky">
        <div class="header-main py-2 py-lg-3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="d-lg-flex align-items-center">
                            <!-- logo -->
                            <a class="navbar-brand text-lg-center" href="index.html">
                                <img class="logo" src="<?= base_url() ?>assets/img/jmto_logo.png" alt="Logo">
                                <img class="sticky-logo" src="<?= base_url() ?>assets_landing/foto_navbar.jpeg" alt="Logo">
                            </a>
                            <nav class="navbar navbar-expand-lg">

                                <!-- Navbar toggler START-->
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <!-- Navbar toggler END-->

                                <!-- Navbar START -->
                                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                                    <ul class="navbar-nav">

                                    </ul>
                                </div>
                                <!-- Navbar END-->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle btn btn-dark text-black d-lg-flex d-none" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i>LOGIN</i><i class="fa fa-chevron-down"></i>
                                    </a>
                                    <!-- Dropdown Menu -->
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="https://jmto-vms.kintekindo.net/auth"><i> Penyedia</i></a></li>
                                        <li><a class="dropdown-item" href="<?= base_url('auth') ?>"><i> Non Penyedia</i></a></li>
                                    </ul>
                                </li>
                                <a href="https://drtproc.jmto.co.id/registrasi" class="btn btn-warning text-white btn-round ml-3"><i>REGISTRASI PENYEDIA</i></a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--=================================
    Header -->
    <div class="sticky-container">
        <style>
            /* Ikon media sosial */
            .sticky-container {
                padding: 0px;
                margin: 0px;
                position: fixed;
                right: -130px;
                top: 230px;
                width: 210px;
                z-index: 1100;
            }

            .sticky li {
                list-style-type: none;
                background-color: #fff;
                color: #efefef;
                height: 43px;
                padding: 0px;
                margin: 0px 0px 1px 0px;
                -webkit-transition: all 0.25s ease-in-out;
                -moz-transition: all 0.25s ease-in-out;
                -o-transition: all 0.25s ease-in-out;
                transition: all 0.25s ease-in-out;
                cursor: pointer;
            }

            .sticky li:hover {
                margin-left: -115px;
            }

            .sticky li img {
                float: left;
                margin: 5px 4px;
                margin-right: 5px;
            }

            .sticky li p {
                padding-top: 5px;
                margin: 0px;
                line-height: 16px;
                font-size: 11px;
            }

            .sticky li p a {
                text-decoration: none;
                color: #2C3539;
            }

            .sticky li p a:hover {
                text-decoration: underline;
            }
        </style>
        <ul class="sticky">
            <li>
                <img src="<?= base_url('assets/img/volume_logo.png') ?>" width="32" height="32">
                <p><a href="javascript:;" onclick="matikan()">Klik Untuk <br>Backsound</a></p>
            </li>
            <li>
                <img src="<?= base_url('assets/img/wa_logo.png') ?>" width="32" height="32">
                <p><a href="https://api.whatsapp.com/send?phone=+6281113004560&text=HALLO JASAMARGA TOLLROAD OPERATOR" target="_blank">Kontak Kami<br>081113004560</a></p>
            </li>
        </ul>
    </div>
    <!--=================================
    banner -->
    <section id="video1" class="banner align-items-center d-flex space-ptb bg-holder h-100vh bg-overlay-black-40" style="display: block;" data-jarallax='{"speed": 0.6}' data-jarallax-video="https://www.youtube.com/watch?v=bmyYwQr__B8&t=17s">
        <!-- Background Vimeo Parallax -->
        <div style="margin-top: 500px;margin-left:20px">
            <i class="text-white" style="font-size: 14px;font-weight:bold;">E - PROCUREMENT JMTO</i>
        </div>
        <div class="container">
            <div class="row justify-content-center text-center mb-0 pb-md-4">
                <div class="col-xl-12">

                </div>
            </div>
            <div class="row justify-content-center text-center pt-0 pt-md-4">
                <div class="col-xl-12">

                </div>
            </div>
        </div>
    </section>


    <section style="display: none;" id="video2" class="slider-04 bg-overlay-dark-50 bg-holder jarallax" data-speed='1' data-video-src="https://www.youtube.com/watch?v=bmyYwQr__B8&t=17s">
        <!-- Background Vimeo Parallax -->
        <div style="margin-top: 500px;margin-left:20px">
            <i class="text-white" style="font-size: 14px;font-weight:bold;">E - PROCUREMENT JMTO</i>
        </div>
        <div class="container">
            <div class="row justify-content-center text-center mb-0 pb-md-4">
                <div class="col-xl-12">

                </div>
            </div>
            <div class="row justify-content-center text-center pt-0 pt-md-4">
                <div class="col-xl-12">

                </div>
            </div>
        </div>
        <div class="sticky-container">
            <ul class="sticky">
                <li>
                    <img src="<?= base_url('assets/img/volume_logo.png') ?>" width="32" height="32">
                    <p><a href="javascript:;" onclick="matikan()">Klik Untuk <br>Backsound</a></p>
                </li>
                <li>
                    <img src="<?= base_url('assets/img/wa_logo.png') ?>" width="32" height="32">
                    <p><a href="#" target="_blank">Kontak Kami<br>081113004560</a></p>
                </li>
            </ul>
        </div>
    </section>


    <!--=================================
    banner -->
    <div class="footer-bottom bg-dark py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 text-center">
                    <i class="mb-0 text-white" style="font-size: 18px;">Saat ini JMTO mengoperasikan beberapa gerbang tol yang terdapat pada ruas tol sebagai berikut</i>
                    <br><br>
                </div>
                <br><br>
                <div class="col-md-3">
                    <center>
                        <img width="70px" src="<?= base_url() ?>assets/img/ruastol.png" alt="Logo"> <br><i class="text-white ml-2" style="font-size: 15px;"> Ruas Tol <i class="fa fa-caret-right" aria-hidden="true"></i> 50</i>
                    </center>
                </div>
                <div class="col-md-3">
                    <center>
                        <img width="70px" src="<?= base_url() ?>assets/img/gerbang.png" alt="Logo"> <br><i class="text-white ml-2" style="font-size: 15px;"> Gerbang Tol <i class="fa fa-caret-right" aria-hidden="true"></i> 316</i>
                    </center>
                </div>
                <div class="col-md-3">
                    <center>
                        <img width="70px" src="<?= base_url() ?>assets/img/gardu.png" alt="Logo"> <br><i class="text-white ml-2" style="font-size: 15px;"> Gardu Tol <i class="fa fa-caret-right" aria-hidden="true"></i> 1839</i>
                    </center>
                </div>
                <div class="col-md-3">
                    <center>
                        <img width="70px" src="<?= base_url() ?>assets/img/jalan.png" alt="Logo"> <br><i class="text-white ml-2" style="font-size: 15px;"> Panjang Jalan <i class="fa fa-caret-right" aria-hidden="true"></i> 2234 KM</i>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <!--=================================
    Category -->
    <section class="space-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 text-center">
                    <div class="section-title">
                        <h2 class="title"> <i> FITUR FITUR DALAM E - PROCUREMENT JMTO </i></h2>
                        <p class="mb-0"></p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="category border-radius py-4">
                        <div class="category-icon">
                            <a href="#" class="category-item text-center">
                                <img width="200px" height="188px" src="<?= base_url() ?>assets/img/logo3.png" alt="Logo">
                            </a>
                        </div>
                        <center>
                            <i style="font-size: 20px;" class="mt-3 text-black-20">Global supply Chain Solutions
                            </i>
                        </center>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-4 ml-5">
                    <div class="category border-radius py-4">
                        <div class="category-icon">
                            <a href="#" class="category-item text-center">
                                <img width="200px" height="100%" src="<?= base_url() ?>assets/img/monitoring.png" alt="Logo">
                            </a>
                        </div>
                        <center>
                            <i style="font-size: 20px;" class="mt-3 text-black-20">Solutions & Special Expertise
                            </i>
                        </center>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-4 ml-5">
                    <div class="category border-radius py-4">
                        <div class="category-icon">
                            <a href="#" class="category-item text-center">
                                <img width="200px" src="<?= base_url() ?>assets/img/proc.png" alt="Logo">
                            </a>
                        </div>
                        <center>
                            <i style="font-size: 20px;" class="mt-3 text-black-20">Integration Vendor </i>
                        </center>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-4 ml-5">
                    <div class="category border-radius py-4">
                        <div class="category-icon">
                            <a href="#" class="category-item text-center">
                                <img width="200px" src="<?= base_url() ?>assets/img/support.png" alt="Logo">
                            </a>
                        </div>
                        <center>
                            <i style="font-size: 20px;" class="mt-3 text-black-20">Technical Support
                            </i>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
    Category -->

    <!--=================================
    Gallery -->
    <section class="space-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 text-center">
                    <!-- Section Title START -->
                    <div class="section-title">
                        <h2>BERITA TENDER <i class="fa fa-newspaper-o" aria-hidden="true"></i></h2>
                        <p>Berita Terkini</p>
                    </div>
                    <!-- Section Title END -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered table_berita" style="font-style: italic;color:black">
                        <thead class="thead-inverse bg-dark text-white">
                            <tr>
                                <th>No <i class="fa fa-list-ol" aria-hidden="true"></i></th>
                                <th>Nama Berita <i class="fa fa-newspaper-o" aria-hidden="true"></i></th>
                                <th>Tanggal <i class="fa fa-clock-o" aria-hidden="true"></i></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
    Gallery -->


    <!--=================================
    tabs -->
    <section class="space-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 text-center">
                    <!-- Section Title START -->
                    <div class="section-title">
                        <h2>DAFTAR TENDER <i class="fa fa-newspaper-o" aria-hidden="true"></i></h2>
                        <p>Daftar Tender E-procurement JMTO</p>
                    </div>
                    <!-- Section Title END -->
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-12">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active bg-dark text-white" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i>PENGADAAN BARANG</i></a>
                            <a class="nav-item nav-link bg-warning text-white" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i>PENGADAAN JASA KONSULTASI</i></a>
                            <a class="nav-item nav-link bg-dark text-white" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><i>PENGADAAN JASA KONTRUKSI</i></a>
                            <a class="nav-item nav-link bg-warning text-white" id="nav-design-tab" data-toggle="tab" href="#nav-design" role="tab" aria-controls="nav-design" aria-selected="false"><i>PENGADAAN JASA LAINYA</i></a>
                        </div>
                    </nav>
                    <div class="tab-content bg-white p-4 p-md-5" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="section-title mb-4">
                                <h3 class="title">DATA PENGADAAN BARANG</h3>
                                <p class="mb-0">Data Tender Pengadaan Barang Yang Ada Pada E-procurement JMTO.</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-striped table-bordered table_berita" style="font-style: italic;font-size:10px;color:black">
                                            <thead class="thead-inverse bg-dark text-white">
                                                <tr>
                                                    <th>No <i class="fa fa-list-ol" aria-hidden="true"></i></th>
                                                    <th style="width:400px">Nama Paket <i class="fa fa-database" aria-hidden="true"></i></th>
                                                    <th>Hps <i class="fa fa-usd" aria-hidden="true"></i></th>
                                                    <th>Akhir Pendaftaran <i class="fa fa-calendar" aria-hidden="true"></i></th>
                                                    <th>Persyaratan <i class="fa fa-files-o" aria-hidden="true"></i></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="section-title mb-4">
                                <h3 class="title">DATA PENGADAAN JASA KONSULTASI</h3>
                                <p class="mb-0">Data Tender Pengadaan Barang Yang Ada Pada E-procurement JMTO.</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-striped table-bordered table_berita" style="font-style: italic;font-size:10px;color:black">
                                            <thead class="thead-inverse bg-dark text-white">
                                                <tr>
                                                    <th>No <i class="fa fa-list-ol" aria-hidden="true"></i></th>
                                                    <th style="width:400px">Nama Paket <i class="fa fa-database" aria-hidden="true"></i></th>
                                                    <th>Hps <i class="fa fa-usd" aria-hidden="true"></i></th>
                                                    <th>Akhir Pendaftaran <i class="fa fa-calendar" aria-hidden="true"></i></th>
                                                    <th>Persyaratan <i class="fa fa-files-o" aria-hidden="true"></i></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <div class="section-title mb-4">
                                <h3 class="title">DATA PENGADAAN JASA KONTRUKSI</h3>
                                <p class="mb-0">Data Tender Pengadaan Barang Yang Ada Pada E-procurement JMTO.</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-striped table-bordered table_berita" style="font-style: italic;font-size:10px;color:black">
                                            <thead class="thead-inverse bg-dark text-white">
                                                <tr>
                                                    <th>No <i class="fa fa-list-ol" aria-hidden="true"></i></th>
                                                    <th style="width:400px">Nama Paket <i class="fa fa-database" aria-hidden="true"></i></th>
                                                    <th>Hps <i class="fa fa-usd" aria-hidden="true"></i></th>
                                                    <th>Akhir Pendaftaran <i class="fa fa-calendar" aria-hidden="true"></i></th>
                                                    <th>Persyaratan <i class="fa fa-files-o" aria-hidden="true"></i></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-design" role="tabpanel" aria-labelledby="nav-design-tab">
                            <div class="section-title mb-4">
                                <h3 class="title">DATA PENGADAAN JASALAINYA</h3>
                                <p class="mb-0">Data Tender Pengadaan Barang Yang Ada Pada E-procurement JMTO.</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-striped table-bordered table_berita" style="font-style: italic;font-size:10px;color:black">
                                            <thead class="thead-inverse bg-dark text-white">
                                                <tr>
                                                    <th>No <i class="fa fa-list-ol" aria-hidden="true"></i></th>
                                                    <th style="width:400px">Nama Paket <i class="fa fa-database" aria-hidden="true"></i></th>
                                                    <th>Hps <i class="fa fa-usd" aria-hidden="true"></i></th>
                                                    <th>Akhir Pendaftaran <i class="fa fa-calendar" aria-hidden="true"></i></th>
                                                    <th>Persyaratan <i class="fa fa-files-o" aria-hidden="true"></i></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
    tabs -->


    <!--=================================
    Action box -->
    <section>
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 text-center">
                <!-- Section Title START -->
                <div class="section-title">
                    <h2>LOKASI <i class="fa fa-map-marker" aria-hidden="true"></i></h2>
                    <p>Lokasi Kami</p>
                </div>
                <!-- Section Title END -->
            </div>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1015243.0397777373!2d106.87879!3d-6.290899!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f29c898a114b%3A0xbdc38eee360b6262!2sJasa%20Marga!5e0!3m2!1sen!2sid!4v1685887740907!5m2!1sen!2sid" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
    <!--=================================
    Action box -->
    <!--=================================
    Footer-->
    <footer class="space-pt bg-overlay-black-90 bg-holder footer">
        <div class="container">
            <div class="row pb-5 pb-lg-6 mb-lg-3">
                <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0 pr-lg-5">
                    <a href="index.html"><img class="img-fluid mb-3 footer-logo" src="<?= base_url() ?>assets/img/jmto_logo.png" alt=""></a>
                    <p class="text-white">JMTO merupakan kelompok usaha PT Jasa Marga (Persero) Tbk dengan komposisi saham 99,9 persen dimiliki oleh PT Jasa Marga (Persero) Tbk dan 0,1 persen dimiliki oleh Induk Koperasi Karyawan Jasa Marga. Kegiatan Usaha JMTO meliputi Layanan Pengoperasian, ETC dan Layanan IT</p>
                    <h5 class="text-white mb-2 mb-sm-4">(021) 22984722</h5>
                    <div class="social-icon social-icon-style-02">
                        <ul>
                            <li><a href="#"><i class="fa fa-phone"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2 mb-4 mb-lg-0">
                    <h5 class="text-white mb-2 mb-sm-4"> Pengadaan</h5>
                    <div class="footer-link">
                        <ul class="list-unstyled mb-0">
                            <li><a class="text-white" href="#">Pengadaan Barang</a></li>
                            <li><a class="text-white" href="#">Pengadaan Jasa Lain</a></li>
                            <li><a class="text-white" href="#">Pengadaan Jasa Pemborongan</a></li>
                            <li><a class="text-white" href="#">Pengadaan Konsultansi</a></li>
                            <li><a class="text-white" href="#">Pengadaan Kontruksi</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2 mb-4 mb-sm-0">
                    <h5 class="text-white mb-2 mb-sm-4">Alamat Kami</h5>
                    <p class="text-white">Gedung Cabang Jagorawi Lt. 4
                        Plaza Tol Taman Mini Indonesia Indah
                        Jakarta, 13550 Indonesia
                        Telp. (021) 22984722</p>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <h5 class="text-white mb-2 mb-sm-4">Link Terkait</h5>
                    <p class="text-white">Helped thousands of clients to find the right property for their needs.</p>
                    <div class="footer-link">
                        <ul class="list-unstyled mb-0">
                            <li><a class="text-white" href="#">Corporate Internal Media (CIM)</a></li>
                            <li><a class="text-white" href="#">Electronic Operational Performance Appraisal (EOPA)</a></li>
                            <li><a class="text-white" href="#">Jasa Marga Livestreaming</a></li>
                            <li><a class="text-white" href="#">Privacy Policy</a></li>
                            <li><a class="text-white" href="#">JMTO Internal Web Mail</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom bg-dark py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 text-center">
                        <p class="mb-0 text-white">�PT Jasamarga Tollroad Operator. 2023 <a href="#"></a> Privacy & Policy</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--=================================
    Footer-->

    <!--=================================
    Back To Top-->
    <div id="back-to-top" class="back-to-top">up</div>
    <!--=================================
    Back To Top-->

    <!--=================================
    Javascript -->

    <!-- JS Global Compulsory (Do not remove)-->
    <script src="<?= base_url('assets_landing/') ?>jquery.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/plugins-lte/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets_landing/') ?>jarallax.min.js"></script>
    <script src="<?= base_url('assets_landing/') ?>jarallax-video.min.js"></script>
    <!-- Template Scripts (Do not remove)-->
    <script src="<?= base_url('assets_landing/') ?>custom.js"></script>

</body>

<script>
    $(document).ready(function() {
        $('.table_berita').DataTable();
    });
</script>
<script>
    $('.jarallax').jarallax({
        videoVolume: 1000,
        onInit: function() {
            var self = this;
            var video = self.video;
            video.unmute();
        }
    });

    function hidupkan() {
        $('.jarallax').jarallax({
            videoVolume: 1000,
            onInit: function() {
                var self = this;
                var video = self.video;
                video.unmute();
            }
        });
        $('#video1').hide()
        $('#video2').show()
    }

    function matikan() {
        location.reload('<?= base_url() ?>')
    }
</script>

</html>