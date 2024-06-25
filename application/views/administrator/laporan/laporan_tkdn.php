<main class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card border-dark">
                <div class="card-header border-dark bg-info">
                    <h6 class="card-title">
                        <span class="text-white">
                            <i class="fa-regular fa-folder-open px-1"></i>
                            <small><strong>File Laporan Pengadaan PDN, TKDN, dan IMPORT</strong></small>
                        </span>
                    </h6>
                </div>
            </div>
            <hr>
            <div class="card border-dark">
                <!-- <div class="card-header border-dark bg-info d-flex justify-content-between align-items-center">
                    <div class="flex-grow-1 bd-highlight">
                        <span class="text-white">
                            <i class="fa-regular fa-folder-open px-1"></i>
                            <small class="text-white"><strong>Data Tabel - Laporan Pengadaan Vendor </strong></small>
                        </span>
                    </div>

                </div> -->
                <div class="card-body">
                    <br>
                    <center>
                        <h5>Laporan Pengadaan PDN, TKDN, dan IMPORT PT JMTO TAHUN <label for="" class="tahun_pengadaan_label"></label></h5>
                    </center>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <select name="tahun_pengadaan" id="tahun_pengadaan" class="form-control">
                                <option value="">Pilih Tahun</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button type="button" id="filter" class="btn btn-primary"><i class="fa fa-search"></i> Filter</button>
                        </div>
                    </div>
                    <br>
                    <div style="overflow-x: auto;">
                        <table id="tbl_pengadaan_tkdn" class="table table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th rowspan="3">No</th>
                                    <th rowspan="3">Nama Pekerjaan</th>
                                    <th colspan="3">Komitmen Tahun <label for="" class="tahun_pengadaan_label"></th>
                                    <th colspan="12">Realisasi Tahun <label for="" class="tahun_pengadaan_label"></th>
                                    <!-- <th rowspan="3">Aksi</th> -->
                                </tr>
                                <tr>
                                    <th rowspan="2">Jenis Pekerjaan</th>
                                    <th rowspan="2">Jenis Anggaran</th>
                                    <th rowspan="2">Komitmen Anggaran Tahun <label for="" class="tahun_pengadaan_label"></th>
                                    <th rowspan="2">Nilai Kontrak Keseluruhan</th>
                                    <th rowspan="2">Nilai Kontrak Tahun <label for="" class="tahun_pengadaan_label"></th>
                                    <th rowspan="2">Nama Penyedia Barang dan Jasa</th>
                                    <th rowspan="2">Kualifikasi Penyedia (UMKK/Menengah/Besar)</th>
                                    <th rowspan="2">Status Pencatatan (PDN/TKDN/IMPORT)</th>
                                    <th colspan="4">Rincian HPS</th>
                                    <!-- <th>Realisasi Waktu <br> Mulai Kontrak</th>
                                    <th>Realisasi Waktu Berakhir <br> Kontrak</th>
                                    <th>Keterangan Lainnya <br> (Isian Text Bebas)</th> -->
                                </tr>
                                <tr>
                                    <th>Persentase PDN (%)</th>
                                    <th>Persentase TKDN <br> (%)</th>
                                    <th>Persentase Impor(%)</th>
                                    <th>Total Bobot(%)</th>
                                    <th>Realisasi Waktu <br> Mulai Kontrak</th>
                                    <th>Realisasi Waktu Berakhir <br> Kontrak</th>
                                    <th>Keterangan Lainnya <br> (Isian Text Bebas)</th>
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
    </div>
</main>


<div class="modal fade" tabindex="-1" id="modal-xl">
    <div class="modal-dialog modal-dialog-scrollable ">
        <div class="modal-content">
            <div class="modal-header">
                <a class="navbar-brand">
                    <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
                    <b><span class="text-primary">Jasamarga Tollroad Operator</span></b>
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="javascript:;" id="form_laporan_rup">
                    <div class="row">
                        <div class="col">
                            <div class="card border-dark shadow-lg">
                                <div class="card-header border-dark bd-blue-700 d-flex justify-content-between align-items-center">
                                    <div class="flex-grow-1 bd-highlight">
                                        <span class="text-white">
                                            <i class="fa-regular fa-rectangle-list px-1"></i>
                                            <small><strong>Form Data - Keterangan</strong></small>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <input type="text" name="id_rup" hidden>
                                    <label for="">Nama RUP</label>
                                    <textarea name="nama_rup" class="form-control" disabled></textarea>
                                    <br>
                                    <label for="">Keterangan</label>
                                    <textarea name="ket_laporan" class="form-control"></textarea>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-sm btn-success" data-bs-dismiss="modal">
                            <!-- <i class="fa-save fa-rectangle-xmark"></i> -->
                            Simpan
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>