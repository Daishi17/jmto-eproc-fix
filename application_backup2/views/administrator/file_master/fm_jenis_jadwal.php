<main class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card border-dark">
                <div class="card-header border-dark bg-danger">
                    <h6 class="card-title">
                        <span class="text-white">
                            <i class="fa-regular fa-folder-open px-1"></i>
                            <small><strong>File Master</strong></small>
                        </span>
                    </h6>
                </div>
            </div>
            <hr>
            <div class="card border-dark">
                <div class="card-header border-dark bg-warning d-flex justify-content-between align-items-center">
                    <div class="flex-grow-1 bd-highlight">
                        <span class="text-dark">
                            <i class="fa-regular fa-calendar-days px-1"></i>
                            <small><strong>Data Tabel - Jenis Jadwal Pengadaan</strong></small>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <!-- url -->
                    <input type="hidden" name="url_get_jadwal" value="<?= base_url('administrator/fm_jenis_jadwal/get_jadwal') ?>">
                    <input type="hidden" name="url_get_jadwal2" value="<?= base_url('administrator/fm_jenis_jadwal/get_jadwal2') ?>">
                    <input type="hidden" name="url_get_byid" value="<?= base_url('administrator/fm_jenis_jadwal/byid/') ?>">
                    <!-- end url -->
                    <table id="tbl_jadwal" class="table table-bordered table-sm table-striped">
                        <thead class="bg-secondary">
                            <tr>
                                <th style="width:8%;"><small class="text-white">Kode</small></th>
                                <th style="width:16%;"><small class="text-white">Jenis Jadwal Pengadaan</small></th>
                                <th style="width:12%;"><small class="text-white">Jenis Pengadaan</small></th>
                                <th style="width:12%;"><small class="text-white">Metode Pengadaan</small></th>
                                <th style="width:12%;"><small class="text-white">Metode Kualifikasi</small></th>
                                <th style="width:12%;"><small class="text-white">Dokumen Pemilihan</small></th>
                                <th style="width:8%;"><small class="text-white">Status</small></th>
                                <th style="width:15%;"><small class="text-white">
                                        <div class="text-center">More Options</div>
                                    </small>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr>
                                <td><small>101.201.01.01</small></td>
                                <td><small>Jasa Lain Tender Umum Prakualifikasi Satu File</small></td>
                                <td><small>Jasa Lain</small></td>
                                <td><small>Tender Umum</small></td>
                                <td><small>Prakualifikasi</small></td>
                                <td><small>Satu File</small></td>
                                <td><small><span class="badge bg-success">Aktif</span></small></td>
                                <td>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-info btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-tambah">
                                            <i class="fa-solid fa-users-viewfinder px-1"></i>
                                            <small>Detail</small>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm shadow-lg">
                                            <i class="fa-solid fa-trash-can px-1"></i>
                                            <small>Non Aktif</small>
                                        </button>
                                    </div>
                                </td> -->
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="modal-detail">
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
                                            <small><strong>Form Data - Jenis Jadwal Pengadaan</strong></small>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row g-1">
                                            <div class="col-sm-3">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                                    <input type="text" name="kode_jadwal" class="form-control" placeholder="Auto Number" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-magnifying-glass-chart"></i></span>
                                                    <input type="text" name="nama_jadwal_pengadaan" class="form-control" placeholder="Jenis Jadwal Pengadaan" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-briefcase"></i></span>
                                                    <input type="text" name="nama_jenis_pengadaan" class="form-control" placeholder="Jenis Pengadaan" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-business-time"></i></span>
                                                    <input type="text" name="nama_metode_pengadaan" class="form-control" placeholder="Metode Pengadaan" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-bars-progress"></i></span>
                                                    <input type="text" name="metode_kualifikasi" class="form-control" placeholder="Metode Kualifikasi" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-folder-tree"></i></span>
                                                    <input type="text" name="metode_dokumen" class="form-control" placeholder="Dokumen Pemililhan" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        </from>
                                </div>
                            </div>
                            <hr>
                            <div class="card border-dark shadow-lg">
                                <div class="card-header border-dark bg-warning d-flex justify-content-between align-items-center">
                                    <div class="flex-grow-1 bd-highlight">
                                        <span class="text-dark">
                                            <i class="fa-regular fa-rectangle-list px-1"></i>
                                            <small><strong>Form Data - Keterangan Jadwal Pengadaan</strong></small>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <div class="row g-1">
                                        <table id="tbl_jadwal2" class="table table-bordered table-sm table-striped">
                                            <thead class="bg-secondary">
                                                <tr>
                                                    <th style="width:5%;"><small class="text-white">No</small></th>
                                                    <th style="width:55%;"><small class="text-white">Keterangan Jadwal</small></th>
                                                    <!-- <th style="width:10%;"><small class="text-white">Status</small></th> -->
                                                    <!-- <th style="width:15%;">
                                                        <small class="text-white">
                                                            <div class="text-center">More Options</div>
                                                        </small>
                                                    </th> -->
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
                <div class="modal-footer d-flex justify-content-start">
                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">
                        <i class="fa-solid fa-rectangle-xmark"></i>
                        Keluar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="modal-xl-jadwal">
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
                                <div class="card-header border-dark bg-warning d-flex justify-content-between align-items-center">
                                    <div class="flex-grow-1 bd-highlight">
                                        <span class="text-dark">
                                            <i class="fa-regular fa-rectangle-list px-1"></i>
                                            <small><strong>Tabel Data - Keterangan Jadwal Pengadaan</strong></small>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row g-1">

                                            <table id="example2" class="table table-bordered table-sm table-striped">
                                                <thead class="bg-secondary">
                                                    <tr>
                                                        <th style="width:5%;"><small class="text-white">Kode</small></th>
                                                        <th style="width:55%;"><small class="text-white">Keterangan Jadwal</small></th>
                                                        <th style="width:10%;"><small class="text-white">Status</small></th>
                                                        <!-- <th style="width:15%;"><small class="text-white"><div class="text-center">More Options</div></small></th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><small>01</small></td>
                                                        <td><small>Pengumuman Pra Kualifikasi</small></td>
                                                        <td><small><span class="badge bg-success">Aktif</span></small></td>

                                                    </tr>
                                                    <tr>
                                                        <td><small>02</small></td>
                                                        <td><small>Download Dokumen Pengadaan</small></td>
                                                        <td><small><span class="badge bg-success">Aktif</span></small></td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>