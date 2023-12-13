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
                <?php if ($this->session->flashdata('pesan')) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?= $this->session->flashdata('pesan'); ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    </div>
                <?php } ?>
                <div class="card-header border-dark bg-warning d-flex justify-content-between align-items-center">
                    <div class="flex-grow-1 bd-highlight">
                        <span class="text-dark">
                            <i class="fa-solid fa-id-card-clip px-1"></i>
                            <small><strong>Data Tabel - Karyawan</strong></small>
                        </span>
                    </div>
                    <div class="bd-highlight">
                        <button type="button" class="btn btn-primary btn-sm shadow-lg" onclick="show_modal()">
                            <i class="fa-solid fa-circle-plus px-1"></i>
                            Tambah Data
                        </button>
                        <button type="button" class="btn btn-success btn-sm" onclick="show_modal_import_karyawan()">
                            Import Data Karyawan
                        </button>
                    </div>
                </div>
                <!-- url -->
                <input type="hidden" name="url_post" value="<?= base_url('administrator/fm_karyawan/save') ?>">
                <input type="hidden" name="url_get_karyawan" value="<?= base_url('administrator/fm_karyawan/datatable_karyawan') ?>">
                <input type="hidden" name="url_get_byid" value="<?= base_url('administrator/fm_karyawan/byid/') ?>">
                <input type="hidden" name="url_aktifkan_karyawan" value="<?= base_url('administrator/fm_karyawan/aktif/') ?>">
                <input type="hidden" name="url_nonaktifkan_karyawan" value="<?= base_url('administrator/fm_karyawan/nonaktif/') ?>">
                <input type="hidden" name="url_karyawan_section" value="<?= base_url('administrator/fm_karyawan/data_section/') ?>">
                <!--  -->
                <div class="card-body">
                    <table id="tbl_karyawan" class="table table-bordered table-sm table-striped">
                        <thead class="bg-secondary">
                            <tr>
                                <th style="width:5%;"><small class="text-white">No</small></th>
                                <th style="width:10%;"><small class="text-white">NIK</small></th>
                                <th style="width:20%;"><small class="text-white">Nama Karyawan</small></th>
                                <th style="width:15%;"><small class="text-white">Departemen</small></th>
                                <th style="width:10%;"><small class="text-white">Section</small></th>
                                <th style="width:15%;"><small class="text-white">Email</small></th>
                                <th style="width:10%;"><small class="text-white">Status</small></th>
                                <th style="width:20%;"><small class="text-white">
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
                                            <small><strong>Form Data - Karyawan</strong></small>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="javascript:;" id="form_karyawan">
                                        <input type="hidden" name="id_pegawai">
                                        <div class="row g-1">
                                            <div class="col-sm-6">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                                    <input type="text" class="form-control" placeholder="NIK" name="nip">
                                                </div>
                                                <small class="nip text-danger"></small>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-keyboard"></i></span>
                                                    <input type="text" class="form-control" placeholder="Nama Karyawan" name="nama_pegawai">
                                                </div>
                                                <small class="nama_pegawai text-danger"></small>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-building-columns"></i></span>
                                                    <select class="form-select" aria-label="Default select example" name="id_departemen" onchange="get_section_dept()">
                                                        <option value="">Pilih Departemen</option>
                                                        <?php foreach ($departemen as $key => $value) {  ?>
                                                            <option value="<?= $value['id_departemen'] ?>"><?= $value['nama_departemen'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <small class="id_departemen text-danger"></small>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-map"></i></span>
                                                    <select class="form-select" aria-label="Default select example" name="id_section" id="form_section">

                                                    </select>
                                                </div>
                                                <small class="id_section text-danger"></small>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                                    <input type="email" class="form-control" placeholder="Alamat Email" name="email">
                                                </div>
                                                <small class="email text-danger"></small>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-phone-volume"></i></span>
                                                    <input type="number" class="form-control" placeholder="Nomor Telepon" name="no_telpon">
                                                </div>
                                                <small class="no_telpon text-danger"></small>
                                            </div>
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
</main>
<!-- Modal -->
<div class="modal fade" tabindex="-1" id="import_data_karyawan">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Data Karyawan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <center>
                        <a class="btn btn-success btn-sm" href="<?= base_url('file_admin/FORMAT_IMPORT KARYAWAN.xlsx')?>">Download Format</a>
                    </center>
                    <br>
                    <?= form_open_multipart('administrator/fm_karyawan/import_data_karyawan') ?>
                    <div class="input-group">
                        <input type="file" class="form-control form-control-sm" id="importexcel" aria-describedby="inputGroupFileAddon04" accept=".xlsx,.xls" name="importexcel" aria-label="Upload">
                        <button class="btn btn-sm btn-success" type="submit" id="inputGroupFileAddon04"><img src="<?= base_url('assets/excel.png') ?>" style="width: 20px;" alt=""> UPLOAD</button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>