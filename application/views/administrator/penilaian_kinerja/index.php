<main class="container-fluid">
    <input type="hidden" name="url_cek_dokumen_hps" value="<?= base_url('file_paket/') ?>">
    <input type="hidden" name="url_by_id_rup" value="<?= base_url('panitia/daftar_paket/daftar_paket/by_id_rup/') ?>">
    <input type="hidden" name="url_download_syarat_tambahan" value="<?= base_url('panitia/daftar_paket/daftar_paket/url_download_syarat_tambahan') ?>">
    <div class="row">
        <div class="col">
            <div class="card border-dark">
                <div class="card-header border-dark bg-gradient-color2">
                    <h6 class="card-title">
                        <span class="text-white">
                            <i class="fa-solid fa-circle-info"></i>
                            <small><strong>Penilaian Kinerja</strong></small>
                        </span>
                    </h6>
                </div>
            </div>
            <hr>
            <div class="card border-dark ">
                <div class="card-header border-dark bg-warning d-flex justify-content-between align-items-center">
                    <div class="flex-grow-1 bd-highlight">
                        <span class="text-dark">
                            <i class="fa-solid fa-table px-1"></i>
                            <small><strong>Data Tabel - Penilaian Kinerja</strong></small>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card border-warning shadow-sm">
                        <div class="card-header">
                            <div class="nav nav-tabs mb-3 bg-info" id="nav-tab" role="tablist">
                                <button class="nav-link active text-dark" id="nav-tenderumum-tab" data-bs-toggle="tab" data-bs-target="#nav-tenderumum" type="button" role="tab" aria-controls="nav-tenderumum" aria-selected="true">
                                    <i class="fa-solid fa-gift"></i>
                                    <small><b>Tender Umum &nbsp;<span class="badge bg-secondary"><?= count($count_tender_umum) ?></span></b></small>
                                </button>
                                <button class="nav-link text-dark" id="nav-tenderbatas-tab" data-bs-toggle="tab" data-bs-target="#nav-tenderbatas" type="button" role="tab" aria-controls="nav-tenderbatas" aria-selected="true">
                                    <i class="fa-solid fa-gift"></i>
                                    <small><b>Tender Terbatas &nbsp;<span class="badge bg-secondary"><?= count($count_tender_terbatas) ?></span></b></small>
                                </button>
                                <!-- <button class="nav-link text-dark" id="nav-seleksiumum-tab" data-bs-toggle="tab" data-bs-target="#nav-seleksiumum" type="button" role="tab" aria-controls="nav-seleksiumum" aria-selected="true">
                                    <i class="fa-solid fa-gift"></i>
                                    <small><b>Seleksi Umum &nbsp;<span class="badge bg-secondary">0</span></b></small>
                                </button> -->
                                <button class="nav-link text-dark" id="nav-juksung-tab" data-bs-toggle="tab" data-bs-target="#nav-juksung" type="button" role="tab" aria-controls="nav-juksung" aria-selected="true">
                                    <i class="fa-solid fa-gift"></i>
                                    <small><b>Penunjukan Langsung &nbsp;<span class="badge bg-secondary"><?= count($count_tender_juksung) ?></span></b></small>
                                </button>
                                <!-- <button class="nav-link text-dark" id="nav-selekterbatas-tab" data-bs-toggle="tab" data-bs-target="#nav-selekterbatas" type="button" role="tab" aria-controls="nav-selekterbatas" aria-selected="true">
                                    <i class="fa-solid fa-gift"></i>
                                    <small><b>Seleksi Terbatas &nbsp;<span class="badge bg-secondary">0</span></b></small>
                                </button> -->
                                <button class="nav-link text-dark" id="nav_vendor-tab" data-bs-toggle="tab" data-bs-target="#nav_vendor" type="button" role="tab" aria-controls="nav_vendor" aria-selected="true">
                                    <i class="fa-solid fa-gift"></i>
                                    <small><b>Rekap Penyedia &nbsp;<span class="badge bg-secondary"><?= count($count_tender_vendor) ?></span></b></small>
                                </button>
                            </div>
                            <div class="tab-content p-3 border bg-light" id="nav-tabContent">
                                <div class="tab-pane fade active show" id="nav-tenderumum" role="tabpanel" aria-labelledby="nav-tenderumum-tab">
                                    <div class="card border-dark">
                                        <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                                            <div class="flex-grow-1 bd-highlight">
                                                <span class="text-white">
                                                    <i class="fa-solid fa-circle-info px-1"></i>
                                                    <small><strong>Transaksi Tender Umum</strong></small>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <table id="tbl_paket_tender_umum" class="table table-bordered border-dark table-sm table-striped">
                                        <thead class="bg-secondary col-12">
                                            <tr>
                                                <th style="width: 1%;"><small class="text-white">No</small></th>
                                                <th class="col-2"><small class="text-white">Nama Rup</small></th>
                                                <th class="col-1"><small class="text-white">Tahun Rup</small></th>
                                                <th class="col-2"><small class="text-white">Nama Penyedia</small></th>
                                                <th class="col-2"><small class="text-white">Jenis Pengadaan</small></th>
                                                <th class="col-2"><small class="text-white">Metode Pemilihan</small></th>
                                                <th class="col-2"><small class="text-white">Rating Kinerja</small></th>
                                                <th class="col-2"><small class="text-white">Nilai Akhir Kinerja</small></th>
                                                <th class="col-1"><small class="text-white">Aksi</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane fade" id="nav-tenderbatas" role="tabpanel" aria-labelledby="nav-tenderbatas-tab">
                                    <div class="card border-dark">
                                        <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                                            <div class="flex-grow-1 bd-highlight">
                                                <span class="text-white">
                                                    <i class="fa-solid fa-circle-info px-1"></i>
                                                    <small><strong>Transaksi Tender Terbatas</strong></small>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <table id="tbl_paket_tender_terbatas" class="table table-bordered border-dark table-sm table-striped">
                                        <thead class="bg-secondary col-12">
                                            <tr>
                                                <th style="width: 1%;"><small class="text-white">No</small></th>
                                                <th class="col-2"><small class="text-white">Nama Rup</small></th>
                                                <th class="col-1"><small class="text-white">Tahun Rup</small></th>
                                                <th class="col-2"><small class="text-white">Nama Penyedia</small></th>
                                                <th class="col-2"><small class="text-white">Jenis Pengadaan</small></th>
                                                <th class="col-2"><small class="text-white">Metode Pemilihan</small></th>
                                                <th class="col-2"><small class="text-white">Rating Kinerja</small></th>
                                                <th class="col-2"><small class="text-white">Nilai Akhir Kinerja</small></th>
                                                <th class="col-1"><small class="text-white">Aksi</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane fade" id="nav-seleksiumum" role="tabpanel" aria-labelledby="nav-seleksiumum-tab">
                                    <div class="card border-dark">
                                        <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                                            <div class="flex-grow-1 bd-highlight">
                                                <span class="text-white">
                                                    <i class="fa-solid fa-circle-info px-1"></i>
                                                    <small><strong>Transaksi Seleksi Umum</strong></small>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <table id="example3" class="table table-bordered border-dark table-sm table-striped">
                                        <thead class="bg-secondary col-12">
                                            <tr>
                                                <th style="width: 1%;"><small class="text-white">No</small></th>
                                                <th class="col-2"><small class="text-white">Nama Rup</small></th>
                                                <th class="col-1"><small class="text-white">Tahun Rup</small></th>
                                                <th class="col-2"><small class="text-white">Nama Penyedia</small></th>
                                                <th class="col-2"><small class="text-white">Jenis Pengadaan</small></th>
                                                <th class="col-2"><small class="text-white">Metode Pemilihan</small></th>
                                                <th class="col-2"><small class="text-white">Rating Kinerja</small></th>
                                                <th class="col-2"><small class="text-white">Nilai Akhir Kinerja</small></th>
                                                <th class="col-1"><small class="text-white">Aksi</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><small>2023</small></td>
                                                <td><small>Pengadaan Sewa Keamanan / Securty</small></td>
                                                <td><small>General Affair</small></td>
                                                <td><small>Jasa Lain</small></td>
                                                <td><small>1.300.000.000</small></td>
                                                <td><small><span class="badge bg-success">Tender Sedang Berlangsung</span></small></td>
                                                <td>
                                                    <div class="text-center">
                                                        <button type="button" class="btn btn-info btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-detail">
                                                            <i class="fa-solid fa-users-viewfinder"></i>
                                                            <small>Detail</small>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane fade" id="nav-juksung" role="tabpanel" aria-labelledby="nav-juksung-tab">
                                    <div class="card border-dark">
                                        <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                                            <div class="flex-grow-1 bd-highlight">
                                                <span class="text-white">
                                                    <i class="fa-solid fa-circle-info px-1"></i>
                                                    <small><strong>Transaksi Penunjukan Langsung</strong></small>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <table id="tbl_paket_tender_juksung" class="table table-bordered border-dark table-sm table-striped">
                                        <thead class="bg-secondary col-12">
                                            <tr>
                                                <th style="width: 1%;"><small class="text-white">No</small></th>
                                                <th class="col-2"><small class="text-white">Nama Rup</small></th>
                                                <th class="col-1"><small class="text-white">Tahun Rup</small></th>
                                                <th class="col-2"><small class="text-white">Nama Penyedia</small></th>
                                                <th class="col-2"><small class="text-white">Jenis Pengadaan</small></th>
                                                <th class="col-2"><small class="text-white">Metode Pemilihan</small></th>
                                                <th class="col-2"><small class="text-white">Rating Kinerja</small></th>
                                                <th class="col-2"><small class="text-white">Nilai Akhir Kinerja</small></th>
                                                <th class="col-1"><small class="text-white">Aksi</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane fade" id="nav-selekterbatas" role="tabpanel" aria-labelledby="nav-selekterbatas-tab">
                                    <div class="card border-dark">
                                        <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                                            <div class="flex-grow-1 bd-highlight">
                                                <span class="text-white">
                                                    <i class="fa-solid fa-circle-info px-1"></i>
                                                    <small><strong>Transaksi Seleksi Terbatas</strong></small>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <table id="example9" class="table table-bordered border-dark table-sm table-striped">
                                        <thead class="bg-secondary col-12">
                                            <tr>
                                                <th style="width: 1%;"><small class="text-white">No</small></th>
                                                <th class="col-2"><small class="text-white">Nama Rup</small></th>
                                                <th class="col-1"><small class="text-white">Tahun Rup</small></th>
                                                <th class="col-2"><small class="text-white">Nama Penyedia</small></th>
                                                <th class="col-2"><small class="text-white">Jenis Pengadaan</small></th>
                                                <th class="col-2"><small class="text-white">Metode Pemilihan</small></th>
                                                <th class="col-2"><small class="text-white">Rating Kinerja</small></th>
                                                <th class="col-2"><small class="text-white">Nilai Akhir Kinerja</small></th>
                                                <th class="col-1"><small class="text-white">Aksi</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><small>2023</small></td>
                                                <td><small>Pengadaan Sewa Keamanan / Securty</small></td>
                                                <td><small>General Affair</small></td>
                                                <td><small>Jasa Lain</small></td>
                                                <td><small>1.300.000.000</small></td>
                                                <td><small><span class="badge bg-danger">Tender Sudah Selesai</span></small></td>
                                                <td>
                                                    <div class="text-center">
                                                        <button type="button" class="btn btn-info btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-detail">
                                                            <i class="fa-solid fa-users-viewfinder"></i>
                                                            <small>Detail</small>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane fade" id="nav_vendor" role="tabpanel" aria-labelledby="nav_vendor-tab">
                                    <div class="card border-dark">
                                        <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                                            <div class="flex-grow-1 bd-highlight">
                                                <span class="text-white">
                                                    <i class="fa-solid fa-circle-info px-1"></i>
                                                    <small><strong>Rekap Penyedia</strong></small>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <table id="tbl_rekap_vendor" class="table table-bordered border-dark table-sm table-striped">
                                        <thead class="bg-secondary col-12">
                                            <tr>
                                                <th style="width: 1%;"><small class="text-white">No</small></th>
                                                <th class="col-2"><small class="text-white">Nama Penyedia</small></th>
                                                <!-- <th class="col-1"><small class="text-white">Tahun Rup</small></th>
                                                <th class="col-2"><small class="text-white">Nama Penyedia</small></th>
                                                <th class="col-2"><small class="text-white">Jenis Pengadaan</small></th>
                                                <th class="col-2"><small class="text-white">Metode Pemilihan</small></th>
                                                <th class="col-2"><small class="text-white">Rating Kinerja</small></th> -->
                                                <th class="col-2"><small class="text-white">Nilai Akhir Kinerja</small></th>
                                                <th class="col-1"><small class="text-white">Aksi</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>

                                            </tr>
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
</main>


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
                <table id="tbl_paket_vendor" class="table table-bordered border-dark table-sm table-striped">
                    <thead class="bg-secondary col-12">
                        <tr>
                            <th style="width: 1%;"><small class="text-white">No</small></th>
                            <th class="col-2"><small class="text-white">Nama Paket</small></th>
                            <th class="col-1"><small class="text-white">Tahun</small></th>
                            <th class="col-1"><small class="text-white">Jenis Pengadaan</small></th>
                            <th class="col-1"><small class="text-white">Metode Pengadaan</small></th>
                            <!-- <th class="col-2"><small class="text-white">Rating Kinerja</small></th> -->
                            <th class="col-2"><small class="text-white">Nilai Akhir Kinerja</small></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
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