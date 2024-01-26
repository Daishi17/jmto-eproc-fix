<input type="hidden" name="url_upload_sanggahan_pra" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'upload_sanggahan_pra/') ?>">
<input type="hidden" name="url_hapus_sanggahan_pra" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'hapus_sanggahan_pra/') ?>">
<input type="hidden" name="url_get_sanggahan_pra" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_sanggahan_pra') ?>">
<input type="hidden" name="url_open_sanggahan_pra" value="http://localhost/jmto-vms/file_paket/<?= $row_rup['nama_rup'] ?>/">
<input type="hidden" name="url_open_sanggahan_pra_panitia" value="<?= base_url('file_paket/' . $row_rup['nama_rup'] . '/SANGGAHAN_PRAKUALIFIKASI' . '/') ?>">
<input type="hidden" name="id_rup" value="<?= $row_rup['id_rup'] ?>">
<main class="container">
    <div class="row">
        <div class="col">
            <div class="card border-dark" style="position: fixed; top:100px;z-index:999;width:95%;">
                <div class="card-header border-dark bg-white text-black">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/informasi_pengadaan' . '/' . $row_rup['id_url_rup']) ?>"><i class="fa fa-columns" aria-hidden="true"></i> Informasi Pengadaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/aanwijzing' . '/'  . $row_rup['id_url_rup']) ?>"><i class="fa fa-comments" aria-hidden="true"></i> Aanwijzing (PQ)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active " style="margin-left: 5px;" href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/sanggahan_prakualifikasi' . '/'  . $row_rup['id_url_rup']) ?>"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Sanggahan Kualifikasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/aanwijzing_penawaran' . '/'  . $row_rup['id_url_rup']) ?>"><i class="fa fa-comments" aria-hidden="true"></i> Aanwijzing (Penawaran)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/evaluasi' . '/'  . $row_rup['id_url_rup']) ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i> Evaluasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/negosiasi' . '/'  . $row_rup['id_url_rup']) ?>"><i class="fa fa-tags" aria-hidden="true"></i> Negosiasi</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/sanggahan_akhir' . '/'  . $row_rup['id_url_rup']) ?>"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Sanggahan Pemenang</a>
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
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th style="width: 400px;">Nama Paket</th>
                                <td><?= $row_rup['nama_rup'] ?></td>
                            </tr>
                            <tr>
                                <th>Kode Tender</th>
                                <td><?= $row_rup['kode_rup'] ?></td>
                            </tr>
                            <tr>
                                <th>Nama Jenis Pengadaan</th>
                                <td>Pengadaan <?= $row_rup['nama_jenis_pengadaan'] ?></td>
                            </tr>
                            <tr>
                                <th>Nama Metode Pemilihan </th>
                                <td><?= $row_rup['nama_metode_pengadaan'] ?> <?= $row_rup['metode_kualifikasi'] ?> (<?= $row_rup['metode_dokumen'] ?>)</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                    <div class="flex-grow-1 bd-highlight">
                        <span class="text-dark">
                            <small class="text-white"><strong><i class="fa-solid fa-table px-1"></i> Data Tabel - Sanggahan Prakualifikasi</strong></small>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>No</th>
                                <th width="200px">Nama Peserta</th>
                                <th>Keterangan Penyedia</th>
                                <th>Download File</th>
                                <th>File Balasan</th>
                                <th>Keterangan Panitia</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tbl_sanggah_pra">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</main>

<div class="modal fade" id="modal_balas_sanggahan_pra" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-bullhorn" aria-hidden="true"></i> Balas Sanggahan Prakualifikasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="javascript:;" id="form_sanggahan_prakualifikasi">
                <div class="modal-body">
                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                        <div>
                            <i class="fa fa-info-circle" aria-hidden="true"> </i> Balas Sanggahan Prakulifikasi !!! <br>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id_vendor_mengikuti_paket">
                        <input type="hidden" name="id_rup" value="<?= $row_rup['id_rup'] ?>">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama Penyedia</th>
                                <td><label for="" id="nama_penyedia"></label></td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td><textarea name="ket_sanggah_pra_panitia" class="form-control"></textarea></td>
                            </tr>
                            <tr>
                                <th>Upload</th>
                                <td><input type="file" name="file_sanggah_pra_panitia"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Batal</button>
                    <button type="submit" class="btn btn-success btn-sanggah"><i class="fas fa fa-upload"></i> Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>