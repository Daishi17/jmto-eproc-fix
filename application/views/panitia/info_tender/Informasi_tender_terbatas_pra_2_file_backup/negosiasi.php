<input type="hidden" name="url_get_vendor_negosiasi" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_vendor_negosiasi') ?>">
<input type="hidden" name="id_rup" value="<?= $row_rup['id_rup'] ?>">
<input type="hidden" name="url_simpan_link_negosiasi" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'simpan_link_negosiasi') ?>">
<main class="container">
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
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/aanwijzing_penawaran' . '/'  . $row_rup['id_url_rup']) ?>"><i class="fa fa-comments" aria-hidden="true"></i> Aanwijzing (Penawaran)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/evaluasi' . '/'  . $row_rup['id_url_rup']) ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i> Evaluasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" style="margin-left: 5px;" href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/negosiasi' . '/'  . $row_rup['id_url_rup']) ?>"><i class="fa fa-tags" aria-hidden="true"></i> Negosiasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white " style="margin-left: 5px;" href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/sanggahan_prakualifikasi' . '/'  . $row_rup['id_url_rup']) ?>"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Sanggahan Prakualifikasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/sanggahan_akhir' . '/'  . $row_rup['id_url_rup']) ?>"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Sanggahan </a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="card border-dark">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4>Negosiasi Pengadaan</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
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
                            <small class="text-white"><strong><i class="fa-solid fa-table px-1"></i> Data Tabel - Negosiasi Pengadaan</strong></small>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <div style="overflow-x: auto;">
                        <table class="table table-bordered" id="tbl_evaluasi">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th width="50px">No</th>
                                    <th width="200px">Nama Peserta</th>
                                    <th>Tanggal Negosiasi</th>
                                    <th>Link Meet (Jika Daring)</th>
                                    <th>Upload Bukti</th>
                                </tr>
                            </thead>
                            <tbody id="tbl_vendor_negosiasi">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</main>


<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="modal_negosiasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Form Negosiasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_upload_link_negosiasi" action="javascript:;" enctype="multipart/form-data">
                    <input type="hidden" name="id_vendor_mengikuti_paket" readonly class="form-control">
                    <div class="form-group">
                        <label for="">Nama Penyedia</label>
                        <input type="text" name="nama_penyedia" readonly class="form-control">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="">Tanggal Negosiasi</label>
                        <input type="date" name="tanggal_negosiasi" class="form-control">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="">Link Meet (Jika Daring)</label>
                        <input type="text" name="link_negosiasi" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary btn_simpan_negosiasi">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>