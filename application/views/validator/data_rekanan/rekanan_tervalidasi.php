<main class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card border-dark">
                <div class="card-header border-dark bg-warning d-flex justify-content-between align-items-center">
                    <div class="flex-grow-1 bd-highlight">
                        <span class="text-dark">
                            <i class="fa-solid fa-table px-1"></i>
                            <small><strong>Data Tabel - Data Rekanan Tervalidasi (DRT)</strong></small>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-sm-6">
                        <div class="card border-dark shadow-lg">
                            <div class="card-body">
                                <from>
                                    <div class="row g-1">
                                        <div class="col-sm-6">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                                <select class="form-select" id="sts_upload_dokumen" name="sts_upload_dokumen" aria-label="Default select example">
                                                    <option value="">Filter Dokumen Upload</option>
                                                    <option value="">All</option>
                                                    <option value="1">Sudah Upload</option>
                                                    <option value="2">Belum Upload</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                                <select class="form-select" id="sts_dokumen_cek" name="sts_dokumen_cek" aria-label="Default select example">
                                                    <option value="">Filter Dokumen Cek</option>
                                                    <option value="">All</option>
                                                    <option value="1">Sudah DiPeriksa</option>
                                                    <option value="2">Belum Diperiksa</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" name="filter" id="filter" class="btn btn-primary btn-sm shadow-lg">
                                                <i class="fa-solid fa-list px-1"></i>
                                                <small>Filtering</small>
                                            </button>
                                        </div>
                                    </div>
                                </from>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <input type="hidden" name="url_get_rekanan_tervalidasi" value="<?= base_url('validator/rekanan_tervalidasi/get_rekanan_tervalidasi') ?>">
                    <input type="hidden" name="url_get_rekanan_tervalidasi_by_id" value="<?= base_url('validator/rekanan_tervalidasi/get_id_rekanan_tervalidasi/') ?>">
                    <input type="hidden" name="url_terima_rekanan_tervalidasi" value="<?= base_url('validator/rekanan_tervalidasi/terima') ?>">
                    <table id="tbl_rekanan_tervalidasi" class="table table-bordered table-sm table-striped">
                        <thead class="bg-secondary shadow-lg">
                            <tr>
                                <th style="width:5%;"><small class="text-white">No</small></th>
                                <th style="width:20%;"><small class="text-white">Nama Rekanan</small></th>
                                <th style="width:18%;"><small class="text-white">Jenis Usaha</small></th>
                                <th style="width:10%;"><small class="text-white">Kualifikasi</small></th>
                                <th style="width:15%;"><small class="text-white">Status Dokumen Upload</small></th>
                                <th style="width:15%;"><small class="text-white">Status Dokumen Cek</small></th>
                                <th style="width:22%;"><small class="text-white">
                                        <div class="text-center">More Options</div>
                                    </small></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr>
                                <td><small>Kreatif Intelegensi Teknologi</small></td>
                                <td><small>Jasa lainnya, Jasa Konsultasi, Jasa Pengadaan Barang</small></td>
                                <td><small>Menengah - (M1)</small></td>
                                <td><small><span class="badge bg-warning text-dark">Belum Upload Dokumen</span></small></td>
                                <td><small><span class="badge swatch-orange text-dark">Belum Upload</span></small></td>
                                <td>
                                    <div class="text-center">
                                        <a class="btn btn-warning btn-sm shadow-lg" href="<?= base_url() ?>validator/cek_dokumen" role="button">
                                            <i class="fa-solid fa-share-from-square px-1"></i>
                                            Check
                                        </a>
                                        <button type="button" class="btn btn-success btn-sm shadow-lg">
                                            <i class="fa-solid fa-envelope px-1"></i>
                                            <small>Message</small>
                                        </button>
                                        <button type="button" class="btn btn-primary btn-sm shadow-lg" disabled>
                                            <i class="fa-solid fa-paper-plane px-1"></i>
                                            <small>Invited</small>
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
</main>

<!-- modal pesan -->
<div class="modal fade" id="modal_pesan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white">Kirim Pesan</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_pesan" method="post">
                <div class="modal-body">

                    <input type="hidden" name="url_kirim_pesan" value="<?= base_url('validator/rekanan_tervalidasi/pesan/') ?>">
                    <input type="hidden" name="id_url_vendor">
                    <center>
                        <img src="<?= base_url('assets/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Pesan Anda </p>

                        <br>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-paper-plane px-1"></i> </span>
                            <textarea name="pesan" class="form-control"></textarea>
                        </div>
                    </center>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal!</button>
                    <button type="submit" class="btn btn-success"> <i class="fas fa fa-check"> </i> Kirim!</button>

                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal undang -->
<div class="modal fade" id="modal_undang" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white">Kirim Undangan Pembuktian Fisik</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_undang">
                <div class="modal-body">

                    <input type="hidden" name="url_kirim_undangan" value="<?= base_url('validator/rekanan_tervalidasi/undang/') ?>">
                    <input type="hidden" name="id_url_vendor">
                    <!-- <center>
                        <img src="<?= base_url('assets/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Isi Hari dan Tanggal Untuk Undang Penyedia </p>
                    </center> -->
                    <div class="row">
                        <div class="col-md-12">
                            <i>
                                Kepada Yth.
                                <br>
                                <b id="nama_usaha"> </b>
                                <br>
                            </i>
                            <i>
                                dokumen anda sudah tervalidasi silahkan lakukan pembuktian dokumen pada
                            </i>
                            <br>
                            <label class="col-form-label" style="text-align: right;">Hari<span style="color:red;">*</span></label>
                            <select name="hari" id="" class="form-control form-control-sm">
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jum'at">Jum'at</option>
                                <option value="Sabtu">Sabtu</option>
                                <option value="Minggu">Minggu</option>
                            </select>
                            <label class="col-form-label" style="text-align: right;">Tanggal<span style="color:red;">*</span></label>
                            <input class="tanggal_mulai form-control form-control-sm" type="date" name="tanggal" required="">
                            <label class="col-form-label" style="text-align: right;">Jam<span style="color:red;">*</span></label>
                            <input class="form-control form-control-sm" type="time" name="jam" required="">
                            <label class="col-form-label" style="text-align: right;">Keterangan</label>
                            <textarea name="keterangan" class="form-control"></textarea>
                            <br>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal!</button>
                    <button type="submit" class="btn btn-success"> <i class="fas fa fa-check"> </i> Kirim!</button>

                </div>
            </form>
        </div>
    </div>
</div>


<!-- modal daftar hitam -->
<div class="modal fade" id="modal_daftar_hitam" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white">Rekanan Daftar Hitam</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_daftar_hitam" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="text" name="id_url_vendor">
                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            <i>Daftar Hitamkan Penyedia</i>
                            <br>
                            <div class="form-group">
                                <label for="">Alasan Daftar Hitam</label>
                                <input type="text" name="alasan_daftar_hitam" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Masa Berlaku Mulai</label>
                                <input type="date" name="masa_berlaku_daftar_hitam_mulai" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Masa Berlaku Selesai</label>
                                <input type="date" name="masa_berlaku_daftar_hitam_selesai" id="" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="">Dokumen Pendukung / Penunjang</label>
                                <input type="file" name="file_dok_daftar_hitam" id="" class="form-control">
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal!</button>
                    <button type="submit" class="btn btn-success btn_daftar_hitam"> <i class="fas fa fa-check"> </i> Kirim!</button>
                </div>
            </form>
        </div>
    </div>
</div>