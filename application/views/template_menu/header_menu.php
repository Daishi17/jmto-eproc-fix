<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#7952b3">

    <title>E-Tender || JMTO</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/fontawesome-free/css/all.min.css">
    <link href="<?php echo base_url(); ?>/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/brand/jm1.png" />
    <link href="<?php echo base_url(); ?>/assets/css///bs5-style.css" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins-lte/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins-lte/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins-lte/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins-lte/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins-lte/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="<?php echo base_url(); ?>/assets/css/bs5-style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/css/bs4-card.css" rel="stylesheet">

    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins-lte/select2/css/select2.css">
</head>

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
                <!-- <img src="<?php echo base_url(); ?>/assets/brand/bootstrap-logo.svg" alt="" width="29" height="24" class="d-inline-block align-text-top"> -->
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
                <?php if ($this->session->userdata('role') == 4) { ?>
                    <li class="nav-item">
                        <a style="font-size:14px" href="<?= base_url() ?>validator/dashboard" class="nav-link px-2 text-white">
                            <i class="fa-solid fa-gauge-high mb-1"></i>
                            <small>Dashboard</small>
                        </a>
                    </li>
                <?php  } else { ?>
                    <li>
                        <a href="<?= base_url() ?>administrator/dashboard" class="nav-link px-2 text-white">
                            <i class="fa-solid fa-gauge-high mb-1"></i>
                            <small>Dashboard</small>
                        </a>
                    </li>
                <?php  }
                ?>

                <?php if ($this->session->userdata('role') == 3) { ?>
                <?php  } else { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-regular fa-folder-open"></i>
                            <small>File Master</small>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php if ($this->session->userdata('role') == 4) { ?>
                                <li>
                                    <a class="dropdown-item" href="<?= base_url() ?>validator/data_kbli">
                                        <i class="fa-regular fa-folder-open px-1"></i>
                                        <small>Data KBLI</small>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= base_url() ?>validator/data_sbu">
                                        <i class="fa-solid fa-folder-open px-1"></i>
                                        <small>Data SBU</small>
                                    </a>
                                </li>
                            <?php  } else { ?>
                                <li>
                                    <a class="dropdown-item" href="<?= base_url() ?>validator/data_kbli">
                                        <i class="fa-regular fa-folder-open px-1"></i>
                                        <small>Data KBLI</small>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= base_url() ?>validator/data_sbu">
                                        <i class="fa-solid fa-folder-open px-1"></i>
                                        <small>Data SBU</small>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= base_url() ?>administrator/Fm_unit_kerja">
                                        <i class="fa-solid fa-building-columns px-1"></i>
                                        <small>Data Departemen</small>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= base_url() ?>administrator/Fm_unit_area">
                                        <i class="fa-solid fa-map px-1"></i>
                                        <small>Data Sections</small>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= base_url() ?>administrator/Fm_karyawan">
                                        <i class="fa-solid fa-id-card-clip px-1"></i>
                                        <small> Data Karyawan</small>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= base_url() ?>administrator/Fm_mjm_user">
                                        <i class="fa-solid fa-user-gear px-1"></i>
                                        <small> Manajemen Role User</small>
                                    </a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= base_url() ?>administrator/Fm_jenis_pengadaan">
                                        <i class="fa-solid fa-briefcase px-1"></i>
                                        <small>Data Jenis Pengadaan</small>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= base_url() ?>administrator/Fm_metode_pengadaan">
                                        <i class="fa-solid fa-sitemap px-1"></i>
                                        <small>Data Metode Pengadaan</small>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= base_url() ?>administrator/Fm_jenis_jadwal">
                                        <i class="fa-regular fa-calendar-days px-1"></i>
                                        <small>Data Jenis Jadwal Pengadaan</small>
                                    </a>
                                </li>
                            <?php  }
                            ?>

                        </ul>
                    </li>
                <?php  }
                ?>

                <?php if ($this->session->userdata('role') == 3) { ?>
                <?php  } else { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user-tag"></i>
                            <small>Info Data Rekanan</small>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="<?= base_url() ?>validator/rekanan_baru">
                                    <i class="fa-solid fa-users-rectangle px-1"></i>
                                    <small>Daftar Rekanan Terbaru</small>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?= base_url() ?>validator/rekanan_tervalidasi">
                                    <i class="fa-solid fa-user-shield px-1"></i>
                                    <small>Data Status Rekanan Terdaftar</small>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?= base_url() ?>validator/rekanan_terundang">
                                    <i class="fa-solid fa-address-card px-1"></i>
                                    <small>Data Status Rekanan Tervalidasi</small>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?= base_url('validator/daftar_hitam') ?>">
                                    <i class="fa-solid fa-user-secret px-1"></i>
                                    <small>Daftar Hitam Rekanan</small>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php  }
                ?>

                <?php if ($this->session->userdata('role') == 4) { ?>
                <?php  } else { ?>

                    <?php if ($this->session->userdata('role') == 3) { ?>
                    <?php  } else { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-cash-register"></i>
                                <small>SI-RUP</small>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="<?= base_url() ?>administrator/Sirup_rka">
                                        <i class="fa-solid fa-money-check-dollar px-1"></i>
                                        <small>Rencana Kerja Anggaran Pengadaan (RKAP)</small>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= base_url() ?>administrator/Sirup_rup">
                                        <i class="fa-solid fa-money-check px-1"></i>
                                        <small>Rencana Umum Pengadaan (RUP)</small>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= base_url() ?>administrator/Sirup_buat_paket">
                                        <i class="fa-solid fa-business-time px-1"></i>
                                        <small>Buat Paket Penyedia</small>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-business-time"></i>
                                <small>Transaksi Tender</small>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="<?= base_url('panitia/daftar_paket/daftar_paket') ?>">
                                        <i class="fa-solid fa-folder-plus px-1"></i>
                                        <small>Daftar Paket Penyedia</small>
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
                    <?php  }
                    ?>

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
                                <a class="dropdown-item" href="<?= base_url('administrator/penilaian_kinerja') ?>">
                                    <i class="fa-solid fa-chart-column px-1"></i>
                                    <small>Penilaian Kinerja Rekanan</small>
                                </a>
                            </li>
                            <!-- <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa-solid fa-chart-area px-1"></i>
                                        <small>Progres Kinerja Rekanan</small>
                                    </a>
                                </li> -->
                        </ul>
                    </li>
                <?php  }
                ?>
            </ul>
            <div class="text-end">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 dropdown">
                        <?php if ($this->session->userdata('role') == 4) { ?>
                            <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?php echo base_url(); ?>/assets/brand/avatar5.png" alt="mdo" width="32" height="32" class="rounded-circle shadow-lg">&nbsp;
                                <small class="text-white">Validator</small>
                            </a>

                        <?php } else if ($this->session->userdata('role') == 3) { ?>
                            <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?php echo base_url(); ?>/assets/brand/avatar5.png" alt="mdo" width="32" height="32" class="rounded-circle shadow-lg">&nbsp;
                                <small class="text-white">Unit Kerja</small>
                            </a>
                        <?php  } else { ?>
                            <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?php echo base_url(); ?>/assets/brand/avatar5.png" alt="mdo" width="32" height="32" class="rounded-circle shadow-lg">&nbsp;
                                <small class="text-white">Administrator</small>
                            </a>
                        <?php  }
                        ?>
                        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                            <li><a class="dropdown-item" href="#"><small><?= $this->session->userdata('nama_pegawai'); ?></small></a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?= base_url('user_setting') ?>"><small><i class="fa-solid fa-user-gear px-1"></i>User Setting</small></a></li>
                            <li><a class="dropdown-item" href="<?= base_url('auth/logout') ?>"><small><i class="fa-solid fa-right-from-bracket px-1"></i>Log-Out System</small></a></li>
                        </ul>
                    </div>&nbsp;
                    <div class="flex-shrink-0">
                        <?php if ($this->session->userdata('role') == 2) { ?>
                            <!-- panitia -->
                            <a target="_blank" href="<?= base_url('assets/user_guide/Manual_Book_Panitia.pdf') ?>" class="nav-link px-2 text-white">
                                <i class="fa-regular fa-file-pdf"></i>
                                <small>Guide || FAQ</small>
                            </a>
                        <?php } else { ?>
                            <a target="_blank" href="<?= base_url('assets/user_guide/Manual_Book_Panitia.pdf') ?>" class="nav-link px-2 text-white">
                                <i class="fa-regular fa-file-pdf"></i>
                                <small>Guide || FAQ</small>
                            </a>
                        <?php  } ?>

                    </div>

                </div>
            </div>
        </div>
    </nav><br><br><br>
    <hr>