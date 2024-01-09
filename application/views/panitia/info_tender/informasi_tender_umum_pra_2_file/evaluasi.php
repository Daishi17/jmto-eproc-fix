<main class="container">
    <!-- id rup global -->
    <input type="hidden" name="id_rup" value="<?= $row_rup['id_rup'] ?>">
    <div class="row">
        <div class="col">
            <div class="card border-dark">
                <div class="card-header border-dark bg-white text-black">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/informasi_pengadaan' . '/' . $row_rup['id_url_rup']) ?>"><i class="fa fa-columns" aria-hidden="true"></i> Informasi Pengadaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/aanwijzing' . '/'  . $row_rup['id_url_rup']) ?>"><i class="fa fa-comments" aria-hidden="true"></i> Aanwijzing (PQ)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white " style="margin-left: 5px;" href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/sanggahan_prakualifikasi' . '/'  . $row_rup['id_url_rup']) ?>"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Sanggahan Kualifikasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/aanwijzing_penawaran' . '/'  . $row_rup['id_url_rup']) ?>"><i class="fa fa-comments" aria-hidden="true"></i> Aanwijzing (Penawaran)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" style="margin-left: 5px;" href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/evaluasi' . '/'  . $row_rup['id_url_rup']) ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i> Evaluasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/negosiasi' . '/'  . $row_rup['id_url_rup']) ?>"><i class="fa fa-tags" aria-hidden="true"></i> Negosiasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/sanggahan_akhir' . '/'  . $row_rup['id_url_rup']) ?>"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Sanggahan Pemenang </a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="card border-dark">
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
                                <th>Nama Metode Pemilihan</th>
                                <td><?= $row_rup['metode_kualifikasi'] ?> (<?= $row_rup['metode_dokumen'] ?>)</td>
                            </tr>
                            <tr>
                                <th>HPS</th>
                                <td>Rp. <?= number_format($row_rup['total_hps_rup'], 2, ',', '.')  ?> </td>
                            </tr>

                            <?php if (date('Y-m-d H:i', strtotime($jadwal_evaluasi_dokumen_kualifikasi['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>


                            <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_evaluasi_dokumen_kualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_evaluasi_dokumen_kualifikasi['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                <tr>
                                    <th>TKDN</th>
                                    <td><?= number_format($row_rup['persen_pencatatan'], 2, ',', '.')  ?> % </td>
                                </tr>
                                <tr>
                                    <th>Metode Penilaian Penawaran</th>
                                    <td>
                                        <?php if ($row_rup['bobot_nilai'] == 1) { ?>
                                            Kombinasi
                                        <?php } else { ?>
                                            Biaya Terendah
                                        <?php  } ?>
                                    </td>
                                </tr>

                            <?php    } else { ?>
                                <tr>
                                    <th>TKDN</th>
                                    <td><?= number_format($row_rup['persen_pencatatan'], 2, ',', '.')  ?> % </td>
                                </tr>
                                <tr>
                                    <th>Metode Penilaian Penawaran</th>
                                    <td>
                                        <?php if ($row_rup['bobot_nilai'] == 1) { ?>
                                            Kombinasi
                                        <?php } else { ?>
                                            Biaya Terendah
                                        <?php  } ?>
                                    </td>
                                </tr>
                            <?php    } ?>

                        </table>
                    </div>
                </div>
                <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                    <div class="flex-grow-1 bd-highlight">
                        <span class="text-dark">
                            <small class="text-white"><strong><i class="fa-solid fa-table px-1"></i>Evalusi Pengadaan</strong></small>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <?php if (date('Y-m-d H:i', strtotime($jadwal_evaluasi_dokumen_kualifikasi['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>
                        <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_evaluasi_dokumen_kualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_evaluasi_dokumen_kualifikasi['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#evkualifikasi" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Evaluasi Akhir Kualifikasi</button>
                            </li>
                        <?php    } else { ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#evkualifikasi" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Evaluasi Akhir Kualifikasi</button>
                            </li>
                        <?php    } ?>

                        <?php if (date('Y-m-d H:i', strtotime($pembukaan_penawaran_file_II['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>
                        <?php    } else if (date('Y-m-d H:i', strtotime($pembukaan_penawaran_file_II['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($pembukaan_penawaran_file_II['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#evakhirpenawaran" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Evaluasi Akhir Penawaran</button>
                            </li>
                            <?php if ($row_rup['bobot_nilai'] == 1) { ?>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#evheatkdn" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Evaluasi HEA TKDN</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#peringkatakhirhea" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Peringkat Akhir HEA</button>
                                </li>
                            <?php } else { ?>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#peringkatakhirterendah" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Peringkat Akhir Harga Terendah</button>
                                </li>

                            <?php }   ?>
                        <?php    } else { ?>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#evakhirpenawaran" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Evaluasi Akhir Penawaran</button>
                            </li>
                            <?php if ($row_rup['bobot_nilai'] == 1) { ?>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#evheatkdn" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Evaluasi HEA TKDN</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#peringkatakhirhea" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Peringkat Akhir HEA</button>
                                </li>
                            <?php } else { ?>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#peringkatakhirterendah" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Peringkat Akhir Harga Terendah</button>
                                </li>

                            <?php }   ?>
                        <?php    } ?>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show" id="evkualifikasi" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="container-fluid">
                                <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                                    <div class="flex-grow-1 bd-highlight">
                                        <span class="text-dark">
                                            <small class="text-white"><strong><i class="fa-solid fa-table px-1"></i> Data Tabel - Evalusi Akhir Kualifikasi</strong></small>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div style="overflow-x: auto;">
                                        <table class="table table-bordered" id="tbl_evaluasi_kualifikasi" aria-describedby="tbl_evaluasi_info">
                                            <thead style="text-align: center;">
                                                <tr>
                                                    <th rowspan="3">No</th>
                                                    <th rowspan="3">Perusahaan</th>
                                                    <th rowspan="3">Evaluasi Administrasi</th>
                                                    <th colspan="2">Evaluasi Keuangan</th>
                                                    <th colspan="2">Evaluasi Teknis</th>
                                                    <th colspan="2">Evaluasi Akhir</th>
                                                    <th rowspan="3">Aksi</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="2">50%</th>
                                                    <th colspan="2">50%</th>
                                                    <th colspan="2">100%</th>
                                                </tr>
                                                <tr>
                                                    <th>Nilai</th>
                                                    <th>Keterangan</th>
                                                    <th>Nilai</th>
                                                    <th>Keterangan</th>
                                                    <th>Nilai</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody style="text-align: center;">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="evakhirpenawaran" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="container-fluid">
                                <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                                    <div class="flex-grow-1 bd-highlight">
                                        <span class="text-dark">
                                            <small class="text-white"><strong><i class="fa-solid fa-table px-1"></i> Data Tabel - Evalusi Akhir Penawaran</strong></small>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div style="overflow-x: auto;">
                                        <table class="table table-bordered" id="tbl_evaluasi_penawaran" aria-describedby="tbl_evaluasi_info">
                                            <thead style="text-align: center;">
                                                <tr>
                                                    <th rowspan="2">No</th>
                                                    <th rowspan="2">Nama Perusahaan</th>
                                                    <th rowspan="2">Harga Penawaran <br> (Setelah Koreksi Aritmatika)</th>
                                                    <th>Nilai Teknis</th>
                                                    <th rowspan="2">% Terhadap HPS</th>
                                                    <th>Nilai Usulan Biaya</th>
                                                    <th rowspan="2">Nilai Akhir</th>
                                                    <th rowspan="2">Peringkat Akhir</th>
                                                    <th rowspan="2">Keterangan</th>
                                                    <th rowspan="2">Aksi</th>
                                                </tr>
                                                <tr>
                                                    <th><?= $row_rup['bobot_teknis'] ?>%</th>
                                                    <th><?= $row_rup['bobot_biaya'] ?>%</th>
                                                </tr>
                                            </thead>
                                            <tbody style="text-align: center;">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="evheatkdn" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div style="overflow-x: auto;">
                                <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                                    <div class="flex-grow-1 bd-highlight">
                                        <span class="text-dark">
                                            <small class="text-white"><strong><i class="fa-solid fa-table px-1"></i> Data Tabel - Evalusi HEA TKDN</strong></small>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5 for=""> Nilai TKDN Minimum : <?= $row_rup['persen_pencatatan'] ?>%</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <h5 for="">Preferensi Maksimum : 25.00%</h5>
                                            <h5 for="">Preferensi Minimum : 00.00%</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <h5 for="">Jika TKDN Penawaran >= 25%</h5>
                                            <h5 for="">Jika TKDN Penawaran < 25%</h5> <br>
                                        </div>
                                    </div>
                                    <div style="overflow-x: auto;">

                                        <table class="table table-bordered" id="tbl_hea_tkdn" aria-describedby="tbl_evaluasi_info">
                                            <thead style="text-align: center;">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Perusahaan</th>
                                                    <th>Harga Penawaran <br> (Setelah Koreksi Aritmatika)</th>
                                                    <th>Nilai TKDN Penawaran</th>
                                                    <th>Harga Evaluasi Akhir (HEA)<br>(Setelah Koreksi Aritmatika)</th>
                                                    <th>Peringkat Sementara HEA</th>
                                                    <th>Keterangan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="peringkatakhirhea" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                                <div class="flex-grow-1 bd-highlight">
                                    <span class="text-dark">
                                        <small class="text-white"><strong><i class="fa-solid fa-table px-1"></i> Data Tabel - Peringkat Akhir HEA</strong></small>
                                    </span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div style="overflow-x: auto;">
                                    <table class="table table-bordered" id="tbl_akhir_hea">
                                        <thead style="text-align: center;">
                                            <tr>
                                                <th rowspan="2">No</th>
                                                <th rowspan="2">Nama Perusahaan</th>
                                                <th rowspan="2">Harga Penawaran (HEA) <br> (Setelah Koreksi Aritmatika)</th>
                                                <th>Nilai Teknis</th>
                                                <th rowspan="2">%HEA Terhadap HPS</th>
                                                <th>Nilai HEA</th>
                                                <th rowspan="2">Nilai Akhir</th>
                                                <th rowspan="2">Peringkat Akhir</th>
                                                <th rowspan="2">Keterangan</th>
                                                <th rowspan="2">Aksi</th>
                                            </tr>
                                            <tr>
                                                <th><?= $row_rup['bobot_teknis'] ?>%</th>
                                                <th><?= $row_rup['bobot_biaya'] ?>%</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="peringkatakhirterendah" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                                <div class="flex-grow-1 bd-highlight">
                                    <span class="text-dark">
                                        <small class="text-white"><strong><i class="fa-solid fa-table px-1"></i> Data Tabel - Peringkat Akhir Harga Terendah</strong></small>
                                    </span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div style="overflow-x: auto;">
                                    <table class="table table-bordered" id="tbl_peringkat_akhir_terendah">
                                        <thead style="text-align: center;">
                                            <tr>
                                                <th rowspan="2">No</th>
                                                <th rowspan="2">Nama Perusahaan</th>
                                                <th rowspan="2">Kelengkapan Dokumen Administrasi dan Teknis </th>
                                                <th rowspan="2">Harga Penawaran <br> (Setelah Koreksi Aritmatika)</th>
                                                <th rowspan="2">% Penawaran Terhadap HPS</th>
                                                <th>Nilai Biaya</th>
                                                <th rowspan="2">Peringkat Akhir</th>
                                                <th rowspan="2">Keterangan</th>
                                                <th rowspan="2">Aksi</th>
                                            </tr>
                                            <tr>
                                                <th>100%</th>
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
        </div>
</main>


<!-- Modal -->
<!-- kaulifikasi -->
<div class="modal fade" id="modal_evaluasi_kualifikasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a class="navbar-brand">
                    <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
                    <b><span class="text-primary">Jasamarga Tollroad Operator</span></b>

                </a>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_evaluasi_kualifikasi" action="javascript:;">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                            <div class="flex-grow-1 bd-highlight">
                                <span class="text-dark">
                                    <small class="text-white">
                                        <strong><i class="fa-solid fa-edit px-1"></i>
                                            Evaluasi Akhir Kualifikasi <label for="" class="nama_usaha"></label>
                                        </strong>
                                    </small>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="id_vendor_mengikuti_paket">
                            <div class="mb-3">
                                <label for="" class="form-label">Evaluasi Keuangan</label>
                                <input type="text" class="form-control number_only" name="ev_keuangan" onkeyup="dibawah_60()" placeholder="Evaluasi Keuangan">
                                <label for="" id="error_ev_keuangan" class="text-danger"></label>
                            </div>
                            <div class="mb-3" style="margin-top: -10px;">
                                <label for="" class="form-label">Evaluasi Teknis</label>
                                <input type="text" class="form-control number_only" disabled name="ev_teknis" placeholder="Evaluasi Teknis">
                                <label for="" id="error_ev_teknis" class="text-danger"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success" id="btn_ev_kualifikasi">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- penawaran -->
<div class="modal fade" id="modal_evaluasi_penawaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a class="navbar-brand">
                    <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
                    <b><span class="text-primary">Jasamarga Tollroad Operator</span></b>

                </a>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_evaluasi_penawaran" action="javascript:;">
                <input type="hidden" value="<?= $row_rup['total_hps_rup'] ?>" name="total_hps_rup">
                <input type="hidden" value="<?= $row_rup['id_rup'] ?>" name="id_rup_post">
                <input type="hidden" value="<?= $row_rup['bobot_teknis'] ?>" name="bobot_teknis">
                <input type="hidden" value="<?= $row_rup['bobot_biaya'] ?>" name="bobot_biaya">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                            <div class="flex-grow-1 bd-highlight">
                                <span class="text-dark">
                                    <small class="text-white">
                                        <strong><i class="fa-solid fa-edit px-1"></i>
                                            Evaluasi Akhir Penawaran <label for="" class="nama_usaha"></label>
                                        </strong>
                                    </small>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="id_vendor_mengikuti_paket">
                            <div class="mb-3" style="margin-top: -10px;">
                                <label for="" class="form-label">Nilai Teknis</label>
                                <input type="text" class="form-control number_only" onkeyup="penawaran_teknis_nilai()" name="ev_penawaran_teknis" placeholder="Nilai Teknis">
                                <label for="" id="error_ev_teknis" class="text-danger"></label>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Harga Penawaran (Setelah Koreksi Aritmatika)</label>
                                <input type="text" class="form-control number_only" name="nilai_penawaran" placeholder="Harga Penawaran (Setelah Koreksi Aritmatika)" onkeyup="format_rupiah()">
                                <input type="text" class="form-control" placeholder="Rp." name="penawaran_rp" disabled>
                                <label for="" id="error_ev_keuangan" class="text-danger"></label>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success" id="btn_ev_penawaran">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- hea_tkdn -->
<div class="modal fade" id="modal_evaluasi_hea_tkdn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a class="navbar-brand">
                    <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
                    <b><span class="text-primary">Jasamarga Tollroad Operator</span></b>

                </a>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_evaluasi_hea_tkdn" action="javascript:;">
                <input type="hidden" value="<?= $row_rup['total_hps_rup'] ?>" name="total_hps_rup">
                <input type="hidden" value="<?= $row_rup['id_rup'] ?>" name="id_rup_post">
                <input type="hidden" value="<?= $row_rup['bobot_teknis'] ?>" name="bobot_teknis">
                <input type="hidden" value="<?= $row_rup['bobot_biaya'] ?>" name="bobot_biaya">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                            <div class="flex-grow-1 bd-highlight">
                                <span class="text-dark">
                                    <small class="text-white">
                                        <strong><i class="fa-solid fa-edit px-1"></i>
                                            Evaluasi HEA TKDN <label for="" class="nama_usaha"></label>
                                        </strong>
                                    </small>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="id_vendor_mengikuti_paket">
                            <div class="mb-3">
                                <label for="" class="form-label">Harga Penawaran (Setelah Koreksi Aritmatika)</label>
                                <input type="text" class="form-control number_only" name="ev_hea_penawaran" placeholder="Harga Penawaran (Setelah Koreksi Aritmatika)" onkeyup="format_rupiah2()">
                                <input type="text" class="form-control" placeholder="Rp." name="penawaran_rp2" disabled>
                                <label for="" id="error_ev_keuangan" class="text-danger"></label>
                            </div>
                            <div class="mb-3" style="margin-top: -10px;">
                                <label for="" class="form-label">Nilai TKDN</label>
                                <input type="text" class="form-control number_only" name="ev_hea_tkdn" placeholder="Nilai TKDN">
                                <label for="" id="error_ev_teknis" class="text-danger"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success" id="btn_ev_tkdn">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- akhir_hea -->
<div class="modal fade" id="modal_evaluasi_akhir_hea" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a class="navbar-brand">
                    <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
                    <b><span class="text-primary">Jasamarga Tollroad Operator</span></b>

                </a>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_evaluasi_akhir_hea" action="javascript:;">
                <input type="hidden" value="<?= $row_rup['total_hps_rup'] ?>" name="total_hps_rup">
                <input type="hidden" value="<?= $row_rup['id_rup'] ?>" name="id_rup_post">
                <input type="hidden" value="<?= $row_rup['bobot_teknis'] ?>" name="bobot_teknis">
                <input type="hidden" value="<?= $row_rup['bobot_biaya'] ?>" name="bobot_biaya">
                <input type="hidden" name="ev_hea_harga">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                            <div class="flex-grow-1 bd-highlight">
                                <span class="text-dark">
                                    <small class="text-white">
                                        <strong><i class="fa-solid fa-edit px-1"></i>
                                            Evaluasi Peringkat Akhir HEA <label for="" class="nama_usaha"></label>
                                        </strong>
                                    </small>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="id_vendor_mengikuti_paket">
                            <div class="mb-3" style="margin-top: 10px;">
                                <label for="" class="form-label">Nilai Teknis</label>
                                <input type="text" class="form-control number_only" name="ev_akhir_hea_teknis" placeholder="Nilai Teknis">
                                <label for="" id="error_ev_teknis" class="text-danger"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success" id="btn_ev_hea_akhir">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- harga terendah -->
<div class="modal fade" id="modal_evaluasi_harga_terendah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a class="navbar-brand">
                    <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
                    <b><span class="text-primary">Jasamarga Tollroad Operator</span></b>

                </a>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_evaluasi_harga_terendah" action="javascript:;">
                <input type="hidden" value="<?= $row_rup['total_hps_rup'] ?>" name="total_hps_rup">
                <input type="hidden" value="<?= $row_rup['id_rup'] ?>" name="id_rup_post">
                <input type="hidden" value="<?= $row_rup['bobot_teknis'] ?>" name="bobot_teknis">
                <input type="hidden" value="<?= $row_rup['bobot_biaya'] ?>" name="bobot_biaya">
                <input type="hidden" name="ev_hea_harga">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                            <div class="flex-grow-1 bd-highlight">
                                <span class="text-dark">
                                    <small class="text-white">
                                        <strong><i class="fa-solid fa-edit px-1"></i>
                                            Evaluasi Peringkat Akhir Harga Terendah <label for="" class="nama_usaha"></label>
                                        </strong>
                                    </small>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="id_vendor_mengikuti_paket">
                            <div class="mb-3" style="margin-top: 10px;">
                                <label for="" class="form-label">Harga Penawaran (Setelah Koreksi Aritmatika)</label>
                                <input type="text" class="form-control number_only" name="ev_terendah_harga" placeholder="Harga Penawaran (Setelah Koreksi Aritmatika)" onkeyup="format_rupiah3()">
                                <input type="text" class="form-control" placeholder="Rp." name="penawaran_rp_terendah" disabled>
                                <label for="" id="error_ev_teknis" class="text-danger"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success" id="btn_ev_hea_akhir">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>