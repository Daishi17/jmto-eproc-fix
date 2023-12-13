<main class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card border-dark">
                <div class="card-header border-dark bg-danger">
                    <h6 class="card-title">
                        <span class="text-white">
                            <i class="fa-regular fa-folder-open px-1"></i>
                            <small><strong>LIST DAFTAR HITAM PENYEDIA</strong></small>
                        </span>
                    </h6>
                </div>
            </div>
            <hr>
            <div class="card border-dark">
                <div class="card-header border-dark bg-gradient-blue text-white d-flex justify-content-between align-items-center">
                    <div class="flex-grow-1 bd-highlight">
                        <span class="text-white">
                            <i class="fa-regular fa-folder-open px-1"></i>
                            <small><strong>Data Tabel - Daftar Hitam</strong></small>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <table id="tbl_daftar_hitam" class="table table-bordered table-sm table-striped">
                        <thead class="bg-secondary">
                            <tr>
                            <tr>
                                <th style="width:5%;"><small class="text-white">No</small></th>
                                <th style="width:20%;"><small class="text-white">Nama Rekanan</small></th>
                                <th style="width:22%;"><small class="text-white">
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
</main>

<div class="modal fade" tabindex="-1" id="modal-xl-tambah">
    <div class="modal-dialog modal-dialog-scrollable">
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
                                        <small><strong>Form Data - Berita Tender</strong></small>
                                    </span>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="javascript:;" id="form_upload_berita" enctype="multipart/form-data">
                                    <input type="hidden" name="id_pegawai">
                                    <div class="row g-1">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-1">
                                                <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                                <input type="text" class="form-control" placeholder="Nama Berita" name="nama_berita">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="input-group mb-1">
                                                <span class="input-group-text"><i class="fa-solid fa-file"></i></span>
                                                <input type="file" class="form-control" name="file_berita">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <button type="submit" id="btn_simpan" class="btn btn-success btn-sm shadow-lg">
                                                <i class="fa-solid fa-floppy-disk px-1"></i>
                                                Simpan Data
                                            </button>
                                        </div>
                                    </div>
                                </form>
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