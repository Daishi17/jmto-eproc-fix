<main class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card border-dark">
                <div class="card-header border-dark bg-danger">
                    <h6 class="card-title">
                        <span class="text-white">
                            <i class="fa-solid fa-cash-register"></i>
                            <small><strong>Sistem Informasi Rencana Umum Pengadaan (SI-RUP)</strong></small>
                        </span>
                    </h6>
                </div>
            </div>
            <hr>
            <div class="card border-dark">
                <div class="card-header border-dark bg-warning d-flex justify-content-between align-items-center">
                    <div class="flex-grow-1 bd-highlight">
                        <span class="text-dark">
                            <i class="fa-solid fa-money-check px-1"></i>
                            <small><strong>Data Tabel - Rencana Umum Pengadaan (RUP)</strong></small>
                        </span>
                    </div>
                    <div class="bd-highlight">
                        <button type="button" class="btn btn-primary btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-tambah">
                            <i class="fa-solid fa-circle-plus px-1"></i>
                            Tambah Data RUP
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-sm table-striped">
                        <thead class="bg-secondary">
                            <tr>
                                <th style="width:5%;"><small class="text-white">Kode</small></th>
                                <th style="width:10%;"><small class="text-white">Tahun</small></th>
                                <th style="width:20%;"><small class="text-white">Nama Paket</small></th>
                                <th style="width:20%;"><small class="text-white">Departemen</small></th>
                                <th style="width:10%;"><small class="text-white">Total Pagu (Rp)</small></th>
                                <th style="width:10%;"><small class="text-white">Status</small></th>
                                <th style="width:15%;"><small class="text-white">
                                        <div class="text-center">More Options</div>
                                    </small></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><small>CP.2023.101.201.0001</small></td>
                                <td><small>2023</small></td>
                                <td><small>Pengadaan Sewa Keamanan / Securty</small></td>
                                <td><small>Human Capital & General Affair</small></td>
                                <td><small>1.500.000.000</small></td>
                                <td><small><span class="badge bg-warning text-dark">Draft</span></small></td>
                                <td>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-info btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-detail">
                                            <i class="fa-solid fa-users-viewfinder px-1"></i>
                                            <small>Detail</small>
                                        </button>
                                        <button type="button" class="btn btn-success btn-sm shadow-lg">
                                            <i class="fa-regular fa-circle-up px-1"></i>
                                            <small>Finalisasi</small>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><small>OP.2023.102.201.0002</small></td>
                                <td><small>2023</small></td>
                                <td><small>Pengadaan Sewa Keamanan / Securty</small></td>
                                <td><small>Human Capital & General Affair</small></td>
                                <td><small>1.500.000.000</small></td>
                                <td><small><span class="badge bg-success text-white">Finalisasi</span></small></td>
                                <td>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-info btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-detail" disabled>
                                            <i class="fa-solid fa-users-viewfinder px-1"></i>
                                            <small>Detail</small>
                                        </button>
                                        <button type="button" class="btn btn-success btn-sm shadow-lg" disabled>
                                            <i class="fa-regular fa-circle-up px-1"></i>
                                            <small>Finalisasi</small>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="modal-xl-tambah">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="navbar-brand">
                        <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
                        <b><span class="text-primary">Jasamarga Tollroad Operator</span></b>
                    </a>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="card border-dark shadow-lg">
                                <div class="card-header border-dark bd-blue-700 d-flex justify-content-between align-items-center">
                                    <div class="flex-grow-1 bd-highlight">
                                        <span class="text-white">
                                            <i class="fa-regular fa-rectangle-list px-1"></i>
                                            <small><strong>Form Data - Rencana Kerja Anggaran Pengadaan (RKAP)</strong></small>
                                        </span>
                                    </div>
                                    <div class="bd-highlight">
                                        <a href="<?= base_url() ?>administrator/Sirup_form_rup">
                                            <button type="button" class="btn btn-warning btn-sm shadow-lg">
                                                <i class="fa-solid fa-circle-plus px-1"></i>
                                                Tambah RUP Non RKAP
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="card border-primary shadow-lg">
                                            <div class="card-header"><small class="text-primary"><b><i class="fa-solid fa-money-check-dollar px-1"></i>Info Rencana Kerja Anggaran (RKA)</b></small></div>
                                            <div class="card-body">
                                                <form>
                                                    <div class="row g-1">
                                                        <div class="col-sm-3">
                                                            <div class="input-group mb-1">
                                                                <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                                                <select class="form-select" aria-label="Default select example">
                                                                    <option selected>Pilih Tahun</option>
                                                                    <option value="0">All</option>
                                                                    <option value="1">2023</option>
                                                                    <option value="2">2024</option>
                                                                    <option value="3">2025</option>
                                                                    <option value="4">2026</option>
                                                                    <option value="5">2027</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <div class="input-group mb-2">
                                                                <span class="input-group-text"><i class="fa-solid fa-building-columns"></i></span>
                                                                <select class="form-select" aria-label="Default select example">
                                                                    <option selected>Pilih Departemen</option>
                                                                    <option value="0">All</option>
                                                                    <option value="1">Human Capital & General Affair</option>
                                                                    <option value="2">Finance & Accounting</option>
                                                                    <option value="3">Operation 1</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <button type="button" class="btn btn-sm btn-info">
                                                                <i class="fa-solid fa-filter px-1"></i>
                                                                Filter Data
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <table id="example2" class="table table-bordered table-sm table-striped">
                                                                <thead class="bg-secondary">
                                                                    <tr>
                                                                        <th style="width:10%;"><small class="text-white">Kode</small></th>
                                                                        <th style="width:10%;"><small class="text-white">Tahun</small></th>
                                                                        <th style="width:20%;"><small class="text-white">Nama Program</small></th>
                                                                        <th style="width:15%;"><small class="text-white">Departemen</small></th>
                                                                        <th style="width:15%;"><small class="text-white">Total Pagu (Rp)</small></th>
                                                                        <th style="width:10%;"><small class="text-white">Status</small></th>
                                                                        <th style="width:10%;"><small class="text-white">
                                                                                <div class="text-center">Options</div>
                                                                            </small></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><small>2023.101.201.001</small></td>
                                                                        <td><small>2023</small></td>
                                                                        <td><small>Pengadaan Sewa Keamanan / Securty</small></td>
                                                                        <td><small>Human Capital & General Affair</small></td>
                                                                        <td><small>1.500.000.000</small></td>
                                                                        <td><small><span class="badge bg-danger text-white">Belum Buat RUP</span></small></td>
                                                                        <td>
                                                                            <div class="text-center">
                                                                                <a type="button" class="btn btn-info btn-sm shadow-lg" href="<?= base_url() ?>administrator/Sirup_form_rup">
                                                                                    <i class="fa-solid fa-square-plus px-1"></i>
                                                                                    <small>Buat RUP</small>
                                                                                </a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    </from>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-start">
                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">
                        <i class="fa-solid fa-rectangle-xmark"></i>
                        Keluar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="modal-xl-detail">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="navbar-brand">
                        <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
                        <b><span class="text-primary">Jasamarga Tollroad Operator</span></b>
                    </a>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="card border-dark shadow-lg">
                                <div class="card-header border-dark bd-blue-700 d-flex justify-content-between align-items-center">
                                    <div class="flex-grow-1 bd-highlight">
                                        <span class="text-white">
                                            <i class="fa-regular fa-rectangle-list px-1"></i>
                                            <small><strong>Info Data - Rencana Umum Pengadaan (RUP)</strong></small>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-sm">
                                        <tr>
                                            <th class="bg-light">
                                                <small>Kode</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-barcode px-2"></i>
                                                <small>CP.2023.101.201.0001</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Tahun</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-calendar-days px-2"></i>
                                                <small>2023</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Departemen</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-building-columns px-2"></i>
                                                <small>Human Capital & General Affair</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Sections</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-map px-2"></i>
                                                <small>Procurement</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Nama Paket Pengadaan</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-keyboard px-2"></i>
                                                <small>Pengadaan Sewa Keamanan / Securty</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Lokasi Pekerjaan</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-location-dot fa-xl px-2"></i>
                                                <small>Kantor Pusat</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Jenis Pengadaan</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-briefcase px-2"></i>
                                                <small>Jasa Lain</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Metode Pengadaan</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-business-time px-2"></i>
                                                <small>Tender Umum</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Jenis Anggaran</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-money-check-dollar px-2"></i>
                                                <small>Capex</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Total Pagu (Rp.)</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-money-bill px-2"></i>
                                                <small>1.500.000.000</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Jangka Waktu Pelaksanaan</small>
                                            </th>
                                            <td colspan="2">
                                                <i class="fa-solid fa-calendar-days fa-lg px-2"></i>
                                                <small>31 Juli 2023 - 31 Juli 2024 &nbsp;</small>
                                                <i class="fa-solid fa-calendar-days fa-lg px-2"></i>
                                                <small>360 Hari &nbsp;</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light" colspan="2">
                                                <button type="button" class="btn btn-sm btn-success">
                                                    <i class="fa-solid fa-circle-up px-1"></i>
                                                    Finalisasi
                                                </button>
                                                <a href="<?= base_url() ?>administrator/Sirup_form_rup" class="btn btn-sm btn-warning">
                                                    <i class="fa-solid fa-pen-to-square px-1"></i>
                                                    Ubah RUP
                                                </a>
                                            </th>
                                        </tr>
                                    </table>
                                </div>
                                <div class="modal-footer d-flex justify-content-start">
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">
                                        <i class="fa-solid fa-rectangle-xmark"></i>
                                        Keluar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>