<body class="bg-white">
    <nav class="navbar fixed-top navbar-light bd-blue-700 ">
        <div class="container-fluid d-flex flex-wrap bg-light shadow-lg">
            <a class="navbar-brand">
                <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
                <b><span class="text-primary">Jasamarga Tollroad Operator</span></b>
            </a>
            <ul class="nav">
                <h6 class="text-dark">
                    <strong><?= $this->jam_tgl->tgl_indo(date('Y-m-d')) ?> || <label for="" id="jam"></label></strong>
                </h6>
            </ul>
        </div>
        <div class="container-fluid shadow-lg">
            <a class="navbar-brand">
                <small class="text-white">
                    <i class="fa-solid fa-tv px-1"></i>
                    E-TenderJMTO
                </small>
            </a>&nbsp;
            <a class="navbar-brand">
                <small class="text-white">
                    ||
                </small>
            </a>&nbsp;
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li>
                    <a href="<?= base_url() ?>panitia/beranda/beranda" class="nav-link px-2 text-white">
                        <i class="fa-solid fa-gauge-high mb-1"></i>
                        <small>Dashboard</small>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-business-time"></i>
                        <small>Transaksi Tender</small>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="<?= base_url() ?>panitia/daftar_paket/daftar_paket">
                                <i class="fa-solid fa-folder-plus px-1"></i>
                                <small>Daftar Paket Penyedia</small>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= base_url('panitia/beranda/beranda') ?>">
                                <i class="fa-solid fa-circle-info px-1"></i>
                                <small>Info Tender</small>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= base_url('administrator/berita_tender') ?>">
                                <i class="fa-solid fa-newspaper px-1"></i>
                                <small>Buat Berita / Pengumuman</small>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-chart-pie"></i>
                        <small>Laporan</small>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fa-solid fa-chart-simple px-1"></i>
                                <small>Tabel Total Tender</small>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fa-solid fa-chart-pie px-1"></i>
                                <small>Grafik & Rekap Tender</small>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fa-solid fa-chart-column px-1"></i>
                                <small>Penilaian Kinerja Rekanan</small>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fa-solid fa-chart-area px-1"></i>
                                <small>Progres Kinerja Rekanan</small>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php if ($this->session->userdata('role') == 2) { ?>
                    <li>
                        <a href="<?= base_url() ?>administrator/dashboard" class="nav-link px-2 text-white">
                            <i class="fa-solid fa-gauge-high mb-1"></i>
                            <small>Kembali Ke Menu Admin</small>
                        </a>
                    </li>
                <?php } else { ?>

                <?php }  ?>
            </ul>
            <div class="text-end">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 dropdown">
                        <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?php echo base_url(); ?>/assets/brand/avatar5.png" alt="mdo" width="32" height="32" class="rounded-circle shadow-lg">&nbsp;
                            <?php if ($this->session->userdata('role') == 2) { ?>
                                <small class="text-white">Administrator</small>
                            <?php } else { ?>
                                <small class="text-white">Panitia</small>
                            <?php }  ?>
                        </a>
                        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                            <li><a class="dropdown-item" href="#"><small><?= $this->session->userdata('nama_pegawai'); ?></small></a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#"><small><i class="fa-solid fa-user-gear px-1"></i>User Setting</small></a></li>
                            <li><a class="dropdown-item" href="<?= base_url('auth/logout') ?>"><small><i class="fa-solid fa-right-from-bracket px-1"></i>Log-Out System</small></a></li>
                        </ul>
                    </div>&nbsp;
                    <div class="flex-shrink-0">
                        <a href="" class="nav-link px-2 text-white">
                            <i class="fa-regular fa-file-pdf"></i>
                            <small>Guide || FAQ</small>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </nav><br><br><br>
    <hr>