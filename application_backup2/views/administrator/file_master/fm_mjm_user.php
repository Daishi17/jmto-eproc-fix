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
                            <i class="fa-solid fa-user-gear px-1"></i>
                            <small><strong>Data Tabel - Manajemen User</strong></small>
                        </span>
                    </div>
                    <div class="bd-highlight">
                        <button type="button" class="btn btn-primary btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-tambah">
                            <i class="fa-solid fa-circle-plus px-1"></i>
                            Tambah Data User
                        </button>
                    </div>
                </div>
                <!-- url -->
                <input type="hidden" name="url_get_bynip" value="<?= base_url('administrator/fm_mjm_user/get_byid/') ?>">
                <input type="hidden" name="url_post" value="<?= base_url('administrator/fm_mjm_user/save/') ?>">
                <input type="hidden" name="url_post_edit" value="<?= base_url('administrator/fm_mjm_user/update/') ?>">
                <input type="hidden" name="url_get_manajemen_user" value="<?= base_url('administrator/fm_mjm_user/datatable_karyawan/') ?>">
                <input type="hidden" name="url_get_byid" value="<?= base_url('administrator/fm_mjm_user/get_byid_mjm/') ?>">
                <input type="hidden" name="url_aktifkan_user" value="<?= base_url('administrator/fm_mjm_user/aktif/') ?>">
                <input type="hidden" name="url_nonaktifkan_user" value="<?= base_url('administrator/fm_mjm_user/nonaktif/') ?>">

                <input type="hidden" name="url_ubah_password" value="<?= base_url('administrator/fm_mjm_user/ubah_password/') ?>">
                <!-- end url -->
                <div class="card-body">
                    <table id="tbl_manajemen_user" class="table table-bordered table-sm table-striped">
                        <thead class="bg-secondary">
                            <tr>
                                <th style="width:5%;"><small class="text-white">No</small></th>
                                <th style="width:10%;"><small class="text-white">Kode</small></th>
                                <th style="width:25%;"><small class="text-white">NIK & Nama Karyawan</small></th>
                                <th style="width:15%;"><small class="text-white">User Account</small></th>
                                <th style="width:10%;"><small class="text-white">Role User</small></th>
                                <th style="width:10%;"><small class="text-white">Status</small></th>
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
                <form action="javascript:;" id="form_mjm_user">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="card border-dark shadow-lg">
                                    <div class="card-header border-dark bd-blue-700 d-flex justify-content-between align-items-center">
                                        <div class="flex-grow-1 bd-highlight">
                                            <span class="text-white">
                                                <i class="fa-regular fa-rectangle-list px-1"></i>
                                                <small><strong>Form Isian - Manajemen User</strong></small>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-body">

                                        <div class="row g-1">
                                            <div class="col-sm-4">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                                    <input type="text" class="form-control" value="<?= $kode ?>" name="kode_mjm_user" readonly>
                                                </div>
                                                <small class="kode_mjm_user text-danger"></small>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-user-tie fa-lg"></i></span>
                                                    <!-- <input class="form-control" list="datalist_karyawan" id="exampleDataList" placeholder="Pilih Karyawan..." name="id_pegawai" onclick="click_pegawai()" onkeyup="keyup_pegawai()"> -->
                                                    <select class="form-control" name="id_pegawai" onchange="get_pegawai()">
                                                        <option value="">--Pilih--</option>
                                                        <?php foreach ($karyawan as $res) { ?>
                                                            <option value="<?= $res['id_pegawai'] ?> "><?= $res['nama_pegawai'] ?> </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <small class="id_pegawai text-danger"></small>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-building-user"></i></span>
                                                    <input type="text" class="form-control" name="nama_departemen" placeholder="Departemen <<auto>>" disabled>
                                                    <!-- <select class="form-select" aria-label="Default select example" disabled>
                                                        <option selected>Departemen automatis</option>
                                                        <option value="1">Human Capital & General Affair</option>
                                                        <option value="2">Finance & Accounting</option>
                                                        <option value="3">Operations 1</option>
                                                    </select> -->
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-user-gear"></i></span>
                                                    <select class="form-select" aria-label="Default select example" name="id_role">
                                                        <option value="">--Pilih Role--</option>
                                                        <option value="2">Administrator</option>
                                                        <option value="3">Unit Kerja</option>
                                                        <option value="4">Validator</option>
                                                        <option value="5">Panitia</option>
                                                    </select>
                                                </div>
                                                <small class="role text-danger"></small>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-user-lock"></i></span>
                                                    <input type="text" class="form-control" placeholder="Buat Akun User" name="username">
                                                </div>
                                                <small class="username text-danger"></small>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                                                    <input type="password" class="form-control" placeholder="Buat Password (password minimal 8 karakter)" id="password" name="password">
                                                    <button class="btn btn-outline-secondary" onclick="myFunction1()" type="button"><i class="fa-solid fa-eye"></i></button>
                                                </div>
                                                <small class="password text-danger"></small>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                                                    <input type="password" class="form-control" id="confirmPassword" placeholder="Konfirmasi Password (password minimal 8 karakter)" name="password2">
                                                    <button class="btn btn-outline-secondary" onclick="myFunction2()" type="button"><i class="fa-solid fa-eye"></i></button>
                                                </div>
                                                <small class="password2 text-danger"></small>
                                            </div>
                                            <!-- <div class="col-sm-2">
                                                <button type="button" class="btn btn-success btn-sm shadow-lg" disabled>
                                                    <i class="fa-solid fa-floppy-disk px-1"></i>
                                                    Simpan Data
                                                </button>
                                            </div> -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-start">
                        <button type="submit" class="btn btn-default btn-success shadow-lg">
                            <i class="fa-solid fa-floppy-disk px-1"></i>
                            Simpan Data
                        </button>
                        <button type="button" class="btn btn-default btn-danger" data-bs-dismiss="modal">
                            <i class="fa-solid fa-rectangle-xmark"></i>
                            Keluar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="modal-xl-edit">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="navbar-brand">
                        <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
                        <b><span class="text-primary">Jasamarga Tollroad Operator</span></b>
                    </a>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="javascript:;" id="form_mjm_user_edit">
                    <input type="hidden" name="id_manajemen_user">
                    <input type="hidden" name="id_pegawai_edit">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="card border-dark shadow-lg">
                                    <div class="card-header border-dark bd-blue-700 d-flex justify-content-between align-items-center">
                                        <div class="flex-grow-1 bd-highlight">
                                            <span class="text-white">
                                                <i class="fa-regular fa-rectangle-list px-1"></i>
                                                <small><strong>Form Isian - Manajemen User</strong></small>
                                            </span>
                                        </div>
                                        <!-- <div class="bd-highlight">
                                        <button type="button" class="btn btn-secondary btn-sm shadow-lg">
                                            <i class="fa-solid fa-pen-to-square px-1"></i>
                                            Ubah Data
                                        </button>
                                    </div> -->
                                    </div>
                                    <div class="card-body">

                                        <div class="row g-1">
                                            <div class="col-sm-4">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                                    <input type="text" class="form-control" name="kode_mjm_user_edit" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-user-tie fa-lg"></i></span>
                                                    <!-- <input class="form-control" list="datalist_karyawan" id="exampleDataList" placeholder="Pilih Karyawan..." name="id_pegawai" onclick="click_pegawai()" onkeyup="keyup_pegawai()"> -->
                                                    <select class="form-control" name="id_pegawai_edit" onchange="get_pegawai_edit()" disabled>
                                                        <?php foreach ($karyawan as $res) { ?>
                                                            <option value="<?= $res['id_pegawai'] ?> "><?= $res['nama_pegawai'] ?> </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-building-user"></i></span>
                                                    <input type="text" class="form-control" name="nama_departemen_edit" placeholder="Departemen <<auto>>" disabled>
                                                    <!-- <select class="form-select" aria-label="Default select example" disabled>
                                                        <option selected>Departemen automatis</option>
                                                        <option value="1">Human Capital & General Affair</option>
                                                        <option value="2">Finance & Accounting</option>
                                                        <option value="3">Operations 1</option>
                                                    </select> -->
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-user-gear"></i></span>
                                                    <select class="form-select" aria-label="Default select example" name="id_role_edit">
                                                        <option value="2">Administrator</option>
                                                        <option value="3">Unit Kerja</option>
                                                        <option value="4">Validator</option>
                                                        <option value="5">Panitia</option>
                                                    </select>
                                                </div>
                                                <small class="role text-danger"></small>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-user-lock"></i></span>
                                                    <input type="text" class="form-control" placeholder="Buat Akun User" name="username_edit" disabled>
                                                </div>
                                            </div>

                                            <!-- <div class="col-sm-2">
                                                <button type="button" class="btn btn-success btn-sm shadow-lg" disabled>
                                                    <i class="fa-solid fa-floppy-disk px-1"></i>
                                                    Simpan Data
                                                </button>
                                            </div> -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-start">
                        <button type="submit" class="btn btn-default btn-success shadow-lg">
                            <i class="fa-solid fa-floppy-disk px-1"></i>
                            Simpan Data
                        </button>
                        <!-- <button type="button" class="btn btn-default btn-primary shadow-lg" data-bs-toggle="modal" data-bs-target="#ubah_pw">
                            <i class="fas fa-lock"></i>
                            Ubah Password
                        </button> -->
                        <button type="button" class="btn btn-default btn-danger" data-bs-dismiss="modal">
                            <i class="fa-solid fa-rectangle-xmark"></i>
                            Keluar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="ubah_pw" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a class="navbar-brand">
                    <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
                    <b><span class="text-primary">Jasamarga Tollroad Operator</span></b>
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="javascript:;" id="form_ubah_password">
                <input type="hidden" name="id_manajemen_user_ubah">
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="card border-dark shadow-lg">
                                    <div class="card-header border-dark bd-blue-700 d-flex justify-content-between align-items-center">
                                        <div class="flex-grow-1 bd-highlight">
                                            <span class="text-white">
                                                <i class="fa-regular fa-rectangle-list px-1"></i>
                                                <small><strong>Form Ubah Password</strong></small>
                                            </span>
                                        </div>
                                        <!-- <div class="bd-highlight">
                                        <button type="button" class="btn btn-secondary btn-sm shadow-lg">
                                            <i class="fa-solid fa-pen-to-square px-1"></i>
                                            Ubah Data
                                        </button>
                                    </div> -->
                                    </div>
                                    <div class="card-body">

                                        <div class="row g-1">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-user-lock"></i></span>
                                                    <input type="text" class="form-control" name="username_ubah_pw" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                                    <input type="password" class="form-control" name="password" placeholder="Masukkan Password Baru (min. 8 karakter)" id="password_baru">
                                                    <button class="btn btn-outline-secondary" onclick="myFunction3()" type="button"><i class="fa-solid fa-eye"></i></button>
                                                </div>
                                                <small class="password text-danger"></small>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                                    <input type="password" class="form-control" name="password2" placeholder="Ulangi Password Baru (min. 8 karakter)" id="confirmPassword_baru">
                                                    <button class="btn btn-outline-secondary" onclick="myFunction4()" type="button"><i class="fa-solid fa-eye"></i></button>
                                                </div>
                                                <small class="password2 text-danger"></small>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>