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
            </div><hr>
            <div class="card border-dark">
                <div class="card-header border-dark bg-warning d-flex justify-content-between align-items-center">
                    <div class="flex-grow-1 bd-highlight">
                        <span class="text-dark">
                            <i class="fa-solid fa-business-time px-1"></i>
                            <small><strong>Data Tabel - Paket Tender / Pengadaan</strong></small>
                        </span>
                    </div>
                    <div class="bd-highlight">
                        <button type="button" class="btn btn-primary btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-tambah">
                            <i class="fa-solid fa-circle-plus px-1"></i>
                            Tambah Data Paket
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-sm table-striped">
                        <thead class="bg-secondary">
                            <tr>
                                <th style="width:5%;"><small class="text-white">Kode</small></th>
                                <th style="width:10%;"><small class="text-white">Tahun</small></th>
                                <th style="width:20%;"><small class="text-white">Nama Paket Tender / Pengadaan</small></th>
                                <th style="width:20%;"><small class="text-white">Departemen</small></th>
                                <th style="width:10%;"><small class="text-white">Total Pagu (Rp.)</small></th>
                                <th style="width:10%;"><small class="text-white">Status</small></th>
                                <th style="width:15%;"><small class="text-white"><div class="text-center">More Options</div></small></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><small>CP.2023.101.201.00001</small></td>
                                <td><small>2023</small></td>
                                <td><small>Pengadaan Sewa Keamanan / Securty</small></td>
                                <td><small>Human Capital & General Affair</small></td>
                                <td><small>1.500.000.000</small></td>
                                <td><small><span class="badge bg-success text-white">Finalisasi Paket</span></small></td>
                                <td>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-info btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-paket" disabled>
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
                            <tr>
                                <td><small>CP.2023.101.201.00002</small></td>
                                <td><small>2023</small></td>
                                <td><small>Pengadaan Sewa Keamanan / Securty Periode Kedua</small></td>
                                <td><small>Human Capital & General Affair</small></td>
                                <td><small>2.500.000.000</small></td>
                                <td><small><span class="badge bg-warning text-dark">Draft Paket</span></small></td>
                                <td>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-info btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-paket">
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
                                            <small><strong>Form Data - Paket Tender / Pengadaan</strong></small>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="card border-primary shadow-lg">
                                            <div class="card-header border-primary"><small class="text-primary"><b><i class="fa-solid fa-money-check-dollar px-1"></i>Info Rencana Umum Pengadaan (RUP) yang sudah Finalisasi</b></small></div>
                                            <div class="card-body">
                                                <form>
                                                    <div class="row g-1">
                                                        <div class="col-sm-2">
                                                            <div class="input-group mb-1">
                                                                <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                                                <select class="form-select" aria-label="Default select example" placeholder="Pilih Tahun..">
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
                                                        <div class="col-sm-5">
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
                                                        <div class="col-sm-5">
                                                            <div class="input-group mb-2">
                                                                <span class="input-group-text"><i class="fa-solid fa-map"></i></span>
                                                                <select class="form-select" aria-label="Default select example">
                                                                    <option selected>Pilih Sections</option>
                                                                    <option value="0">All</option>
                                                                    <option value="1">Human Capital & General Affair</option>
                                                                    <option value="2">Finance & Accounting</option>
                                                                    <option value="3">Operation 1</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <button type="button" class="btn btn-sm btn-secondary">
                                                            <i class="fa-solid fa-filter px-1"></i>
                                                            Filter Data
                                                        </button>
                                                    </div><hr>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <table id="example2" class="table table-bordered table-sm table-striped">
                                                                <thead class="bg-secondary">
                                                                    <tr>
                                                                        <th style="width:8%;"><small class="text-white">Kode</small></th>
                                                                        <th style="width:8%;"><small class="text-white">Tahun</small></th>
                                                                        <th style="width:20%;"><small class="text-white">Nama Paket RUP</small></th>
                                                                        <th style="width:15%;"><small class="text-white">Departemen</small></th>
                                                                        <th style="width:15%;"><small class="text-white">Total Pagu (Rp)</small></th>
                                                                        <th style="width:15%;"><small class="text-white">Jenis Pengadaan</small></th>
                                                                        <th style="width:14%;"><small class="text-white"><div class="text-center">Options</div></small></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><small>2023.101.201.001</small></td>
                                                                        <td><small>2023</small></td>
                                                                        <td><small>Pengadaan Sewa Keamanan / Securty</small></td>
                                                                        <td><small>Human Capital & General Affair</small></td>
                                                                        <td><small>1.500.000.000</small></td>
                                                                        <td><small>Jasa Lain</small></td>
                                                                        <td>
                                                                            <div class="text-center">
                                                                                <button type="button" class="btn btn-primary btn-sm shadow-lg" data-bs-toggle="modal"data-bs-dismiss="modal" data-bs-target="#modal-xl-paket">
                                                                                    <i class="fa-solid fa-square-plus"></i>
                                                                                    <small>Buat Paket</small>
                                                                                </button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><small>2023.101.201.002</small></td>
                                                                        <td><small>2023</small></td>
                                                                        <td><small>Pengadaan Sewa Keamanan / Securty</small></td>
                                                                        <td><small>Human Capital & General Affair</small></td>
                                                                        <td><small>1.500.000.000</small></td>
                                                                        <td><small>Jasa Konsultasi</small></td>
                                                                        <td>
                                                                            <div class="text-center">
                                                                                <button type="button" class="btn btn-primary btn-sm shadow-lg" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#modal-xl-paket">
                                                                                    <i class="fa-solid fa-square-plus"></i>
                                                                                    <small>Buat Paket</small>
                                                                                </button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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
    <div class="modal fade" id="modal-xl-paket">
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
                                            <i class="fa-solid fa-business-time px-1"></i>
                                            <small><strong>Form Data - Paket Tender / Pengadaan</strong></small>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <from>
                                        <table class="table table-bordered table-sm shadow-lg">
                                            <tr>
                                                <th class="bg-light">
                                                    <small>Kode</small>
                                                </th>
                                                <td>
                                                    <i class="fa-solid fa-barcode px-2"></i>
                                                    <small>CP.2023.101.201.0001</small>
                                                </td>
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
                                                    <small>Nama Paket</small>
                                                </th>
                                                <td colspan="3">
                                                    <i class="fa-solid fa-gift px-2"></i>
                                                    <small>Pengadaan Sewa Keamanan / Security Periode Kedua</small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="bg-light">
                                                    <small>Deskripsi Pekerjaan</small>
                                                </th>
                                                <td colspan="3">
                                                    <i class="fa-solid fa-align-justify px-2"></i>
                                                    <small>Sewa Keamaan Periode Kedua Untuk Gerbang Toll Jagorawi Periode Kedua</small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="bg-light">
                                                    <small>Detail Lokasi Pekerjaan</small>
                                                </th>
                                                <td colspan="3">
                                                    <i class="fa-solid fa-map-location-dot px-2"></i>
                                                    <small>Gerbang Toll Jakarta Cikampek</small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="bg-light">
                                                    <small>Lokasi Ruas Toll</small>
                                                </th>
                                                <td colspan="3">
                                                    <i class="fa-solid fa-road px-2"></i>
                                                    <small>Ruas Toll Jakarta Cikampek KM 17</small>&nbsp;&amp;
                                                    <small>Ruas Toll Jakarta Cikampek KM 37</small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="bg-light">
                                                    <small>Jenis & Metode Pengadaan</small>
                                                </th>
                                                <td>
                                                    <i class="fa-solid fa-briefcase px-2"></i>
                                                    <small>Jasa Lain</small>&nbsp;&amp; 
                                                    <i class="fa-solid fa-business-time px-1"></i>
                                                    <small>Tender Umum</small>
                                                </td>
                                                <th class="bg-light">
                                                    <small>Jenis Anggaran</small>
                                                </th>
                                                <td>
                                                    <i class="fa-solid fa-money-bill-transfer px-2"></i>
                                                    <small>Capex</small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="bg-light">
                                                    <small>Kualifikasi Usaha</small>
                                                </th>
                                                <td>
                                                    <i class="fa-solid fa-list px-2"></i>
                                                    <small>Menengah</small>
                                                </td>
                                                <th class="bg-light">
                                                    <small>Jenis Produk</small>
                                                </th>
                                                <td>
                                                    <i class="fa-solid fa-globe px-2"></i>
                                                    <small>Menggunakan Produk Dalam Negri</small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="bg-light">
                                                    <small>Status Pencatatan</small>
                                                </th>
                                                <td>
                                                    <i class="fa-solid fa-pen-to-square px-2"></i>
                                                    <small>TKDN</small>
                                                </td>
                                                <th class="bg-light">
                                                    <small>( % ) Pencatatan </small>
                                                </th>
                                                <td>
                                                    <i class="fa-solid fa-chart-simple px-2"></i>
                                                    <small>55</small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="bg-light">
                                                    <small>Tahun Jamak</small>
                                                </th>
                                                <td>
                                                    <i class="fa-solid fa-calendar-days px-2"></i>
                                                    <small>31/07/2023</small>&nbsp;
                                                    <small>-</small>
                                                    <small>31/07/2024</small>&nbsp;
                                                </td>
                                                <th class="bg-light">
                                                    <small>Jangka Waktu</small>
                                                </th>
                                                <td>
                                                    <i class="fa-solid fa-clock px-2"></i>
                                                    <small>360</small>&nbsp;&nbsp;<small>Hari</small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="bg-light">
                                                    <small>Sumber Dana</small>
                                                </th>
                                                <td>
                                                    <i class="fa-solid fa-building-columns px-2"></i>
                                                    <small>Human Capital & General Affair</small>
                                                </td>
                                                <th class="bg-light">
                                                    <small>Total Pagu RUP</small>
                                                </th>
                                                <td>
                                                    <i class="fa-solid fa-money-bill-wave px-2"></i>
                                                    <small>1.500.000.000</small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                    <table class="table table-bordered table-sm shadow-lg">
                                                        <thead>
                                                            <tr>
                                                                <th class="bg-danger text-white text-center" colspan="3">
                                                                    <small>Pemilihan Jenis Jadwal Pengadaan</small>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center bg-secondary text-white" scope="col">
                                                                    <small>Metode Kualifikasi Pengadaan</small>
                                                                </th>
                                                                <th class="text-center bg-secondary text-white" scope="col">
                                                                    <small>Metode Pemilihan Dokumen</small>
                                                                </th>
                                                                <th class="text-center bg-secondary text-white" scope="col">
                                                                    <small>Jenis Jadwal Pengadaan</small>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="input-group mb-2">
                                                                        <span class="input-group-text"><i class="fa-solid fa-briefcase"></i></span>
                                                                        <select class="form-select" aria-label="Default select example">
                                                                            <option selected>Pilih Metode Kualifikasi</option>
                                                                            <option value="1">Prakualifikasi</option>
                                                                            <option value="2">Pascakualifikasi</option>
                                                                        </select>  
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="input-group mb-2">
                                                                        <span class="input-group-text"><i class="fa-solid fa-folder-tree"></i></span>
                                                                        <select class="form-select" aria-label="Default select example">
                                                                            <option selected>Metode Pemilihan Dokumen</option>
                                                                            <option value="1">Satu File</option>
                                                                            <option value="2">Dua File</option>
                                                                        </select>  
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="input-group mb-2">
                                                                        <span class="input-group-text"><i class="fa-regular fa-calendar-check"></i></span>
                                                                        <select class="form-select" aria-label="Default select example">
                                                                            <option selected>Pilih Jenis Jadwal</option>
                                                                            <option value="1">Jasa Lain Tender Umum Prakualifikasi Satu File</option>
                                                                            <option value="2">Jasa Lain Tender Umum Prakualifikasi Dua File</option>
                                                                        </select>  
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <thead>
                                                            <tr>
                                                                <th class="bg-danger text-white text-center" colspan="3">
                                                                    <small>Pilih Panitia Pengadaan</small>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center bg-secondary text-white" colspan="2">
                                                                    <small>Pilih User Panitia</small>
                                                                </th>
                                                                <th class="text-center bg-secondary text-white" scope="col">
                                                                    <small>Pilih Role Panita</small>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <div class="input-group mb-2">
                                                                        <span class="input-group-text"><i class="fa-solid fa-users"></i></span>
                                                                        <input class="form-control" list="datalist_user" id="exampleDataList" placeholder="Pilih User...">
                                                                            <datalist id="datalist_user">
                                                                                <option value="001 || 1001 || Budi Apriyanto"></option>
                                                                                <option value="002 || 1002 || Angga Pramuja Syam"></option>
                                                                                <option value="002 || 1003 || Danang Prasetio Kusumo"></option>
                                                                            </datalist>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="input-group mb-2">
                                                                        <span class="input-group-text"><i class="fa-solid fa-users-gear"></i></span>
                                                                        <select class="form-select" aria-label="Default select example">
                                                                            <option selected>Pilih Role Panitia</option>
                                                                            <option value="1">Ketua Panitia</option>
                                                                            <option value="2">Sekretaris</option>
                                                                            <option value="2">Anggota</option>
                                                                        </select>  
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <thead>
                                                            <tr>
                                                                <th class="bg-ligth text-white text-start" colspan="3">
                                                                    <button type="button" class="btn btn-sm btn-success" data-bs-dismiss="modal">
                                                                        <i class="fa-solid fa-user-plus"></i>
                                                                        Tambah User Panitia
                                                                    </button>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <thead>
                                                            <tr>
                                                                <th class="bg-light text-white text-center" colspan="3">
                                                                    <table id="example2" class="table table-bordered table-sm table-striped">
                                                                        <thead class="bg-secondary">
                                                                            <tr>
                                                                                <th style="width:20%;"><small class="text-white">User Panitia</small></th>
                                                                                <th style="width:20%;"><small class="text-white">Role Panitia</small></th>
                                                                                <th style="width:15%;"><small class="text-white"><div class="text-center">Options</div></small></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><small>Budi Apriyanto</small></td>
                                                                                <td><small>Ketua Panitia</small></td>
                                                                                <td>
                                                                                    <div class="text-center">
                                                                                        <button type="button" class="btn btn-danger btn-sm shadow-lg">
                                                                                            <i class="fa-solid fa-trash"></i>
                                                                                            <small>Hapus User</small>
                                                                                        </button>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </td>
                                            </tr>
                                            
                                        </table>
                                    </from>
                                </div>
                                <div class="card-footer bg-transparent border-dark">
                                    <button type="button" class="btn btn-default btn-primary">
                                        <i class="fa-solid fa-floppy-disk px-1"></i>
                                        Simpan Data Paket
                                    </button>
                                    <button class="btn btn-warning" data-bs-target="#modal-xl-tambah" data-bs-toggle="modal" data-bs-dismiss="modal">
                                        <i class="fa-solid fa-angles-left px-1"></i>
                                        Kehalaman Sebelumnya
                                    </button>
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