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
                            <i class="fa-solid fa-id-card-clip px-1"></i>
                            <small><strong>Data Tabel - Karyawan</strong></small>
                        </span>
                    </div>
                    <div class="bd-highlight">
                        <button type="button" class="btn btn-primary btn-sm shadow-lg" onclick="show_modal()">
                            <i class="fa-solid fa-circle-plus px-1"></i>
                            Tambah Data
                        </button>
                    </div>
                </div>
                <!-- url -->
                <input type="hidden" name="url_post" value="<?= base_url('administrator/fm_karyawan/save') ?>">
                <input type="hidden" name="url_get_karyawan" value="<?= base_url('administrator/fm_karyawan/datatable_karyawan') ?>">
                <input type="hidden" name="url_get_byid" value="<?= base_url('administrator/fm_karyawan/byid/') ?>">
                <input type="hidden" name="url_aktifkan_karyawan" value="<?= base_url('administrator/fm_karyawan/aktif/') ?>">
                <input type="hidden" name="url_nonaktifkan_karyawan" value="<?= base_url('administrator/fm_karyawan/nonaktif/') ?>">
                <!--  -->
                <div class="card-body">
                    <table id="tbl_karyawan" class="table table-bordered table-sm table-striped">
                        <thead class="bg-secondary">
                            <tr>
                                <th style="width:5%;"><small class="text-white">NO</small></th>
                                <th style="width:10%;"><small class="text-white">NIK</small></th>
                                <th style="width:20%;"><small class="text-white">Nama Karyawan</small></th>
                                <th style="width:15%;"><small class="text-white">Departemen</small></th>
                                <th style="width:10%;"><small class="text-white">Role User</small></th>
                                <th style="width:15%;"><small class="text-white">Email</small></th>
                                <th style="width:10%;"><small class="text-white">Status</small></th>
                                <th style="width:20%;"><small class="text-white">
                                        <div class="text-center">More Options</div>
                                    </small></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr>
                                <td><small>123456</small></td>
                                <td><small>Budi</small></td>
                                <td><small>Human Capital & General Affair</small></td>
                                <td><small><span class="badge bg-primary">Validator</span></small></td>
                                <td><small>Validator@budi</small></td>
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
                                </td>
                            </tr> -->
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
                    <input type="hidden" name="id_pegawai">
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
                                    <!-- <div class="bd-highlight">
                                        <button type="button" class="btn btn-secondary btn-sm shadow-lg" id="button_ubah" onclick="ubah_data()">
                                            <i class="fa-solid fa-pen-to-square px-1"></i>
                                            Ubah Data
                                        </button>
                                    </div> -->
                                </div>
                                <div class="card-body">
                                    <form action="javascript:;" id="form_karyawan">
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
                                                    <select class="form-select" aria-label="Default select example" name="id_departemen">
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
                                                    <select class="form-select" aria-label="Default select example" name="id_section">
                                                        <option value="">Pilih Sections</option>
                                                        <?php foreach ($section as $key => $value) {  ?>
                                                            <option value="<?= $value['id_section'] ?>"><?= $value['nama_section'] ?></option>
                                                        <?php } ?>
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
                                            <div class="col-sm-6">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-user-gear"></i></span>
                                                    <select class="form-select" aria-label="Default select example" name="id_role">
                                                        <option value="">Pilih Role User</option>
                                                        <option value="2">Administrator</option>
                                                        <option value="3">Unit Kerja</option>
                                                        <option value="4">Validator</option>
                                                        <option value="5">Panitia</option>
                                                    </select>
                                                </div>
                                                <small class="id_role text-danger"></small>
                                            </div>
                                            <!-- <div class="col-sm-6">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-user-lock"></i></span>
                                                    <input type="text" class="form-control" placeholder="Buat Akun User">
                                                </div>
                                            </div> -->
                                            <div class="col-sm-6">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                                                    <input type="password" class="form-control" placeholder="Buat Password (password minimal 8 karakter)" name="password">
                                                    <button class="btn btn-outline-secondary" type="button"><i class="fa-solid fa-eye"></i></button>
                                                    <button class="btn btn-outline-secondary" type="button"><i class="fa-solid fa-eye-slash"></i></button>
                                                </div>
                                                <small class="password text-danger"></small>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                                                    <input type="password" class="form-control" placeholder="Konfirmasi Password (password minimal 8 karakter)" name="password2">
                                                    <button class="btn btn-outline-secondary" type="button"><i class="fa-solid fa-eye"></i></button>
                                                    <button class="btn btn-outline-secondary" type="button"><i class="fa-solid fa-eye-slash"></i></button>
                                                </div>
                                                <small class="password2 text-danger"></small>
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