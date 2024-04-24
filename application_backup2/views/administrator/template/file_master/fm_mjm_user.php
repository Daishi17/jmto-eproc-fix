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
            </div><hr>
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
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-sm table-striped">
                        <thead class="bg-secondary">
                            <tr>
                                <th style="width:10%;"><small class="text-white">Kode</small></th>
                                <th style="width:25%;"><small class="text-white">NIK & Nama Karyawan</small></th>
                                <th style="width:15%;"><small class="text-white">User Account</small></th>
                                <th style="width:10%;"><small class="text-white">Role User</small></th>
                                <th style="width:10%;"><small class="text-white">Status</small></th>
                                <th style="width:20%;"><small class="text-white"><div class="text-center">More Options</div></small></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><small>001</small></td>
                                <td><small>12345 || Angga</small></td>
                                <td><small>validator@angga</small></td>
                                <td><small><span class="badge swatch-orange">Validator</span></small></td>
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
                            </tr>
                            <tr>
                                <td><small>002</small></td>
                                <td><small>23456 || danang</small></td>
                                <td><small>panitia@danang</small></td>
                                <td><small><span class="badge bd-cyan-700">Panitia</span></small></td>
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
                            </tr>
                            <tr>
                                <td><small>003</small></td>
                                <td><small>12345 || Angga</small></td>
                                <td><small>unit@angga</small></td>
                                <td><small><span class="badge swatch-purple">Unit Kerja</span></small></td>
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
                            </tr>
                            <tr>
                                <td><small>004</small></td>
                                <td><small>23456 || danang</small></td>
                                <td><small>admin@danang</small></td>
                                <td><small><span class="badge swatch-pink">Administrator</span></small></td>
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
                        <img src="<?php echo base_url();?>/assets/brand/jm1.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
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
                                            <small><strong>Form Isian - Manajemen User</strong></small>
                                        </span>
                                    </div>
                                    <div class="bd-highlight">
                                        <button type="button" class="btn btn-secondary btn-sm shadow-lg">
                                            <i class="fa-solid fa-pen-to-square px-1"></i>
                                            Ubah Data
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form >
                                        <div class="row g-1">
                                            <div class="col-sm-4">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                                    <input type="text" class="form-control" placeholder="Kode <<auto>>" disabled> 
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-user-tie fa-lg"></i></span>
                                                    <input class="form-control" list="datalist_karyawan" id="exampleDataList" placeholder="Pilih Karyawan...">
                                                    <datalist id="datalist_karyawan">
                                                        <option value="12345 || Angga">
                                                        <option value="23456 || Danang">
                                                    </datalist>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-building-user"></i></span>
                                                    <!-- <input type="text" class="form-control" placeholder="Departemen <<auto>>" disabled>  -->
                                                    <select class="form-select" aria-label="Default select example" disabled>
                                                        <option selected>Departemen automatis</option>
                                                        <option value="1">Human Capital & General Affair</option>
                                                        <option value="2">Finance & Accounting</option>
                                                        <option value="3">Operations 1</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-user-gear"></i></span>
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected><small>Pilih Role</small></option>
                                                        <option value="1">Administrator</option>
                                                        <option value="2">Unit Kerja</option>
                                                        <option value="3">Validator</option>
                                                        <option value="3">Panitia</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="input-group mb-1">
                                                    <span class="input-group-text"><i class="fa-solid fa-user-lock"></i></span>
                                                    <input type="text" class="form-control" placeholder="Buat Akun User"> 
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group mb-1">
                                                <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                                                    <input type="password" class="form-control" placeholder="Buat Password (password minimal 8 karakter)">
                                                    <button class="btn btn-outline-secondary" type="button" ><i class="fa-solid fa-eye"></i></button>
                                                    <button class="btn btn-outline-secondary" type="button" ><i class="fa-solid fa-eye-slash"></i></button>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group mb-1">
                                                <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                                                    <input type="password" class="form-control" placeholder="Konfirmasi Password (password minimal 8 karakter)">
                                                    <button class="btn btn-outline-secondary" type="button" ><i class="fa-solid fa-eye"></i></button>
                                                    <button class="btn btn-outline-secondary" type="button" ><i class="fa-solid fa-eye-slash"></i></button>
                                                </div>
                                            </div>
                                            <!-- <div class="col-sm-2">
                                                <button type="button" class="btn btn-success btn-sm shadow-lg" disabled>
                                                    <i class="fa-solid fa-floppy-disk px-1"></i>
                                                    Simpan Data
                                                </button>
                                            </div> -->
                                        </div>
                                    </from>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-start">
                    <button type="button" class="btn btn-default btn-success shadow-lg" disabled>
                        <i class="fa-solid fa-floppy-disk px-1"></i>
                        Simpan Data
                    </button>
                    <button type="button" class="btn btn-default btn-danger" data-bs-dismiss="modal">
                        <i class="fa-solid fa-rectangle-xmark"></i>
                        Keluar
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>