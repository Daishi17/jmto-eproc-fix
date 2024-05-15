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
                        <button type="button" class="btn btn-success btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-rup">
                            <i class="fa-solid fa-file px-1"></i>
                            Import Excel RUP
                        </button>
                        <button type="button" class="btn btn-primary btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-tambah">
                            <i class="fa-solid fa-circle-plus px-1"></i>
                            Tambah Data RUP
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="tbl_rup" class="table table-bordered table-sm table-striped">
                        <thead class="bg-secondary">
                            <tr>
                                <th style="width:5%;"><small class="text-white">Kode</small></th>
                                <th style="width:10%;"><small class="text-white">Tahun</small></th>
                                <th style="width:20%;"><small class="text-white">Nama Paket RUP</small></th>
                                <th style="width:20%;"><small class="text-white">Department</small></th>
                                <th style="width:20%;"><small class="text-white">Waktu Pelaksanaan</small></th>
                                <th style="width:20%;"><small class="text-white">Persentase TKDN</small></th>
                                <th style="width:10%;"><small class="text-white">Total Pagu (Rp)</small></th>
                                <th style="width:10%;"><small class="text-white">Status</small></th>
                                <th style="width:15%;"><small class="text-white">
                                        <div class="text-center">More Options</div>
                                    </small></th>
                            </tr>
                        </thead>
                        <tbody>

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
                                            <small><strong>Form Data - Rencana Umum Pengadaan (RUP)</strong></small>
                                        </span>
                                    </div>
                                    <div class="bd-highlight">
                                        <a href="<?= base_url() ?>/administrator/sirup_rup/buat_rup_non_rkap">
                                            <button type="button" class="btn btn-warning btn-sm shadow-lg">
                                                <i class="fa-solid fa-circle-plus px-1"></i>
                                                Tambah RUP Diluar Buku
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="card border-primary shadow-lg">
                                            <div class="card-header"><small class="text-primary"><b><i class="fa-solid fa-money-check-dollar px-1"></i>Info Rencana Program Kerja/Buat RUP Berdasarkan Buku RUP</b></small></div>
                                            <div class="card-body">
                                                <div class="row g-1">
                                                    <div class="col-sm-3">
                                                        <div class="input-group mb-1">
                                                            <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                                            <select class="form-select" aria-label="Default select example" id="tahun_rkap">
                                                                <option selected>Pilih Tahun</option>
                                                                <option value="0">All</option>
                                                                <option value="2023">2023</option>
                                                                <option value="2024">2024</option>
                                                                <option value="2025">2025</option>
                                                                <option value="2026">2026</option>
                                                                <option value="2027">2027</option>
                                                                <option value="2028">2028</option>
                                                                <option value="2029">2029</option>
                                                                <option value="2030">2030</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <div class="input-group mb-2">
                                                            <span class="input-group-text"><i class="fa-solid fa-building-columns"></i></span>
                                                            <select class="form-select" aria-label="Default select example" id="id_departemen">
                                                                <option>Pilih Departemen</option>
                                                                <?php foreach ($result_departemen as $key => $value) { ?>
                                                                    <option value="<?= $value['id_departemen'] ?>"><?= $value['nama_departemen'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <button type="button" id="filter3" class="btn btn-sm btn-info">
                                                            <i class="fa-solid fa-filter px-1"></i>
                                                            Filter Data
                                                        </button>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <table id="tbl_rkap" class="table table-bordered table-sm table-striped">
                                                            <thead class="bg-secondary">
                                                                <tr>
                                                                    <th style="width:10%;"><small class="text-white">Kode</small></th>
                                                                    <th style="width:10%;"><small class="text-white">Tahun</small></th>
                                                                    <th style="width:20%;"><small class="text-white">Nama Buku RUP</small></th>
                                                                    <th style="width:15%;"><small class="text-white">Departemen</small></th>
                                                                    <th style="width:15%;"><small class="text-white">Total Pagu Buku RUP (Rp)</small></th>
                                                                    <th style="width:10%;"><small class="text-white">Status</small></th>
                                                                    <th style="width:10%;"><small class="text-white">
                                                                            <div class="text-center">Options</div>
                                                                        </small></th>
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
                                        <input type="hidden" name="random_kode">
                                        <tr>
                                            <th class="bg-light">
                                                <small>Kode</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-barcode px-2"></i>
                                                <!-- kode_rup -->
                                                <small id="kode_rup"></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Tahun</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-calendar-days px-2"></i>
                                                <!-- tahun_rup -->
                                                <small id="tahun_rup"></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Departemen</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-building-columns px-2"></i>
                                                <!-- nama_departemen -->
                                                <small id="nama_departemen"></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Sections</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-map px-2"></i>
                                                <!-- nama_section -->
                                                <small id="nama_section"></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Nama Paket Pengadaan</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-keyboard px-2"></i>
                                                <!-- nama_rup -->
                                                <small id="nama_rup"></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Lokasi Pekerjaan</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-location-dot fa-xl px-2"></i>
                                                <!-- detail_lokasi_rup -->
                                                <small id="detail_lokasi_rup"></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Jenis Pengadaan</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-briefcase px-2"></i>
                                                <!-- nama_jenis_pengadaan -->
                                                <small id="nama_jenis_pengadaan"></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Metode Pengadaan</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-business-time px-2"></i>
                                                <!-- metode_pengadaan -->
                                                <small id="nama_metode_pengadaan"></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Jenis Anggaran</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-money-check-dollar px-2"></i>
                                                <!-- nama_jenis_anggaran -->
                                                <small id="nama_jenis_anggaran"></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Status Pencatatan (TKDN/PDN/Import)</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-money-check-dollar px-2"></i>
                                                <small id="status_pencatatan"></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Persentase TKDN</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-money-check-dollar px-2"></i>
                                                <small id="persen_pencatatan"></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Nilai Persentase TKDN</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-money-check-dollar px-2"></i>
                                                <small id="nilai_pencatatan"></small>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="bg-light">
                                                <small>Total Pagu (Rp.)</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-money-bill px-2"></i>
                                                <!-- total_pagu_rup -->
                                                <small id="total_pagu_rup"></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Jangka Waktu Pelaksanaan</small>
                                            </th>
                                            <td colspan="2">
                                                <i class="fa-solid fa-calendar-days fa-lg px-2"></i>
                                                <small id="waktu_pelakasanaan"> &nbsp;</small>
                                                <i class="fa-solid fa-calendar-days fa-lg px-2"></i>
                                                <small id="hari_pelaksanaan"> &nbsp;</small> Hari Kalender
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light" colspan="2">
                                                <a href="javascript:;" onclick="finalisasi_rup()" class="btn btn-sm btn-success btn-finalisasi">
                                                    <i class="fa-solid fa-circle-up px-1"></i>
                                                    Finalisasi
                                                </a>
                                                <a href="javascript:;" onclick="ubah_rup()" class="btn btn-sm btn-warning btn-rup">
                                                    <i class="fa-solid fa-pen-to-square px-1"></i>
                                                    Ubah RUP
                                                </a>
                                            </th>
                                        </tr>
                                    </table>
                                </div>
                                <div class="modal-footer d-flex justify-content-start">
                                    <button type="button" class="btn btn-default btn-danger" data-bs-dismiss="modal">
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
<!-- Modal -->
<div class="modal fade" id="modal-xl-rup" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Data Rup</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <center>
                        <a href="<?= base_url('format_excel/FORMAT_IMPORT_RUP.xlsx') ?>" class="btn btn-success"> <img src="<?= base_url('assets/excel.png') ?>" style="width: 20px;" alt=""> Download Format Excel</a>
                    </center>
                    <br>
                    <br>
                    <form action="javascript:;" id="form_import_rup" enctype="multipart/form-data" method="post">
                        <div class="input-group">
                            <input type="file" class="form-control form-control-sm" id="importexcel" aria-describedby="inputGroupFileAddon04" accept=".xlsx,.xls" name="importexcel" aria-label="Upload" required>
                            <button class="btn btn-sm btn-success btn_simpan" type="submit" id="inputGroupFileAddon04"><img src="<?= base_url('assets/excel.png') ?>" style="width: 20px;" alt=""> UPLOAD</button>
                        </div>
                    </form>
                </div>
                <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>