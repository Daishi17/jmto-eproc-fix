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
                            <i class="fa-solid fa-money-check-dollar px-1"></i>
                            <small><strong>Data Tabel - Buku Rencana Umum Pengadaan (RUP)</strong></small>
                        </span>
                    </div>
                    <button type="button" class="btn btn-success btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-rup">
                        <i class="fa-solid fa-file px-1"></i>
                        Import Excel RUP
                    </button>
                    <div class="bd-highlight">
                        <a href="javascript:;" onclick="Tambah_rkap()" class="btn btn-primary btn-sm shadow-lg">
                            <i class="fa-solid fa-circle-plus px-1"></i>
                            Tambah Data
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="tbl_rkap" class="table table-bordered table-sm table-striped">
                        <thead class="bg-secondary">
                            <tr>
                                <th style="width:5%;"><small class="text-white">Kode</small></th>
                                <th style="width:6%;"><small class="text-white">Tahun</small></th>
                                <th style="width:20%;"><small class="text-white">Nama Program</small></th>
                                <th style="width:20%;"><small class="text-white">Departemen</small></th>
                                <th style="width:10%;"><small class="text-white">Total Pagu Buku RUP (Rp)</small></th>
                                <th style="width:12%;"><small class="text-white">Dokumen Excel</small></th>
                                <th style="width:6%;"><small class="text-white">Status</small></th>
                                <th style="width:20%;"><small class="text-white">
                                        <div class="text-center">More Options</div>
                                    </small></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
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
                <form id="form_rkap" action="javascript:;" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="card border-dark shadow-lg">
                                    <div class="card-header border-dark bd-blue-700 d-flex justify-content-between align-items-center">
                                        <div class="flex-grow-1 bd-highlight">
                                            <span class="text-white">
                                                <i class="fa-regular fa-rectangle-list px-1"></i>
                                                <small><strong>Form Data - Buku Rencana Umum Pengadaan (RUP)</strong></small>
                                            </span>
                                        </div>
                                        <div class="bd-highlight" id="type_modal" style="display: block;">
                                            <button type="button" class="btn btn-secondary btn-sm shadow-lg">
                                                <i class="fa-solid fa-pen-to-square px-1"></i>
                                                Ubah Data
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <input type="hidden" name="id_post_form">
                                        <input type="hidden" name="type_modal">
                                        <div class="row g-1">
                                            <div class="col-sm-3">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                                    <input type="text" class="form-control" name="kode_rkap" placeholder="Auto Number" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                                    <input type="number" class="form-control" maxlength="4" name="tahun_rkap" placeholder="Tahun">
                                                </div>
                                                <small class="text-danger label_tahun_rkap_validasi"></small>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-keyboard"></i></span>
                                                    <input type="text" class="form-control" name="nama_program_rkap" placeholder="Nama Program">
                                                </div>
                                                <!-- nama_program_rkap -->
                                                <small class="text-danger label_nama_program_rkap_validasi"></small>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-building-columns"></i></span>
                                                    <select class="form-select" name="id_departemen" aria-label="Default select example">
                                                        <option>Pilih Departemen</option>
                                                        <?php foreach ($result_departemen as $key => $value) { ?>
                                                            <option value="<?= $value['id_departemen'] ?>"><?= $value['kode_departemen'] ?> || <?= $value['nama_departemen'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <!-- id_departemen -->
                                                <small class="text-danger label_id_departemen_validasi"></small>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text">Rp.</span>
                                                    <input type="number" name="total_pagu_rkap" class="form-control total_pagu_rkap" placeholder="Total Pagu">
                                                </div>
                                                <small class="text-danger label_total_pagu_rkap_validasi"></small>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-money-bill-wave"></i></span>
                                                    <input type="text" id="tanpa_rupiah_rkap" name="rupiah_rkap" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-file-excel"></i></span>
                                                    <input type="hidden" name="file_rkap_manipulasi">
                                                    <input type="file" name="file_rkap" id="file" class="file_rkap" accept=".xlsx, .xls">
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
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-success btn-sm shadow-lg">
                                <i class="fa-solid fa-floppy-disk px-1"></i>
                                Simpan Data
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>


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
                        <a href="<?= base_url('format_excel/FORMAT_IMPORT_BUKU_RUP.xlsx') ?>" class="btn btn-success"> <img src="<?= base_url('assets/excel.png') ?>" style="width: 20px;" alt=""> Download Format Excel</a>
                    </center>
                    <br>
                    <br>
                    <form action="javascript:;" id="form_import_rkap" enctype="multipart/form-data" method="post">
                        <div class="input-group">
                            <input type="file" class="form-control form-control-sm" id="importexcel" aria-describedby="inputGroupFileAddon04" accept=".xlsx,.xls" name="importexcel" aria-label="Upload" required>
                            <button class="btn btn-sm btn-success btn_simpan" type="submit" id="inputGroupFileAddon04"><img src="<?= base_url('assets/excel.png') ?>" style="width: 20px;" alt="">UPLOAD</button>
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