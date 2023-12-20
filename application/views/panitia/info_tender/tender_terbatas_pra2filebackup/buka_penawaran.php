<?php if ($this->session->userdata('token_panitia') == $row_rup['token_panitia']) { ?>
    <main class="container">
        <input type="hidden" name="id_rup" value="<?= $row_rup['id_rup'] ?>">
        <input type="hidden" name="url_byid_mengikuti" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_byid_mengikuti/') ?>">
        <div class="row">
            <div class="col">
                <div class="card border-dark">
                    <div class="card-header border-dark bg-white text-black">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h4>Informasi Pengadaan</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Nama Paket</th>
                                        <td><?= $row_rup['nama_rup'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama Jenis Pengadaan</th>
                                        <td><?= $row_rup['nama_jenis_pengadaan'] ?></td>

                                    </tr>
                                    <tr>
                                        <th>Nama Metode Pemilihan </th>
                                        <td><?= $row_rup['nama_metode_pengadaan'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>HPS</th>
                                        <td>Rp. <?= number_format($row_rup['total_hps_rup'], 2, ',', '.')  ?> </td>
                                    </tr>
                                    <tr>
                                        <th>TKDN</th>
                                        <td><?= number_format($row_rup['persen_pencatatan'], 2, ',', '.')  ?> </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- test -->
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-file1" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Dokumen Pengadaan File I</button>
                            </li>
                            <?php if (date('Y-m-d H:i', strtotime($jadwal_pembukaan_file2['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>
                                <!-- belom mulai -->

                            <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_pembukaan_file2['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_pembukaan_file2['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-file2" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Dokumen Pengadaan File II</button>
                                </li>

                            <?php    } else { ?>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-file2" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Dokumen Pengadaan File II</button>
                                </li>

                            <?php    } ?>

                        </ul>

                    </div>
                </div>
                <hr>
                <div class="card border-dark">
                    <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                        <div class="flex-grow-1 bd-highlight">
                            <span class="text-dark">
                                <small class="text-white"><strong><i class="fa-solid fa-table px-1"></i> Data Tabel - Dokumen Pengadaan</strong></small>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-file1" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="card">
                                    <div class="card-header bg-primary text-white">
                                        Dokumen Pengadaan File I
                                    </div>
                                    <div class="card-body">
                                        <table id="table_vendor_mengikuti_paket" class="table table-stripped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Peserta</th>
                                                    <th>Lihat & Download Dokumen Pengadaan</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-file2" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="card">
                                    <div class="card-header bg-danger text-white">
                                        Dokumen Pengadaan File II
                                    </div>
                                    <div class="card-body">
                                        <table id="table_vendor_mengikuti_paket_penawaran_II" class="table table-stripped table-bordered">
                                            <thead>
                                                <th>No</th>
                                                <th>Nama Peserta</th>
                                                <!-- <th>Nilai Penawaran</th>
                                                                <th>TKDN/PDN/IMPORT</th>
                                                                <th>Persentase TKDN/PDN/IMPORT </th> -->
                                                <th>Lihat Dok Penawaran</th>
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
    </main>

    <div class="modal fade" id="buka_penawaran1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-file" aria-hidden="true"></i> Dokumen File I</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                        <div>
                            <i class="fa fa-info-circle" aria-hidden="true"> </i> Pembukaan Dokumen File I Penyedia <label for="" class="nama_usaha_vendor"></label> <br>
                        </div>
                    </div>
                    <br>
                    <table id="table_dokumen_penawaran_file_I_vendor" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama File</th>
                                <th>File</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">1</td>
                                <td>Dokumen File 1</td>
                                <td><a href="#" class="btn btn-sm btn-info text-white"><i class="fa fa-eye"></i> Download</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="buka_penawaran1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-file" aria-hidden="true"></i> Dokumen File I</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                        <div>
                            <i class="fa fa-info-circle" aria-hidden="true"> </i> Pembukaan Dokumen File I Penyedia <label for="" class="nama_usaha_vendor"></label> <br>
                        </div>
                    </div>
                    <br>
                    <table id="table_dokumen_penawaran_file_I_vendor" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama File</th>
                                <th>File</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">1</td>
                                <td>Dokumen File 1</td>
                                <td><a href="#" class="btn btn-sm btn-info text-white"><i class="fa fa-eye"></i> Download</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="buka_penawaran2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-file" aria-hidden="true"></i> Dokumen File II</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                        <div>
                            <i class="fa fa-info-circle" aria-hidden="true"> </i> Pembukaan Dokumen File II Penyedia <label for="" class="nama_usaha_vendor"></label> <br>
                        </div>
                    </div>
                    <br>
                    <table id="table_dokumen_penawaran_file_II_vendor" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Usaha</th>
                                <!-- <th>Nilai Penawaran</th>
                                            <th>TKDN/PDN/IMPORT</th>
                                            <th>Persentase TKDN/PDN/IMPORT</th> -->
                                <th>File</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <main class="container-fluid">
        <div class="row">
            <div class="alert alert-primary d-flex align-items-center" role="alert">
                <div>
                    <i class="fa fa-info-circle" aria-hidden="true"></i> Silakan Masukan Token Paket Yang Dikirim Ke Whatsaap Anda
                </div>
                <br>
            </div>
            <div class="col-md-5">

            </div>
            <div class="col-md-3">
                <a class="btn btn-primary" href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'informasi_pengadaan/') . $row_rup['id_url_rup'] ?>"> Kembali Ke Informasi Pengadaan</a>
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </main>
<?php }
?>