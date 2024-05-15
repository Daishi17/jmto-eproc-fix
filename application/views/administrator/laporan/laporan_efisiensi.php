<main class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card border-dark">
                <div class="card-header border-dark bg-info">
                    <h6 class="card-title">
                        <span class="text-white">
                            <i class="fa-regular fa-folder-open px-1"></i>
                            <small><strong>Laporan Efisiensi</strong></small>
                        </span>
                    </h6>
                </div>
            </div>
            <hr>
            <div class="card border-dark">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#realisiasi_pic" type="button" role="tab" aria-controls="home" aria-selected="true">Realisasi PIC Pengadaan</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#resume" type="button" role="tab" aria-controls="profile" aria-selected="false">Resume</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#rekap_bulanan" type="button" role="tab" aria-controls="contact" aria-selected="false">Rekap Bulanan</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#efisiensi_juksung" type="button" role="tab" aria-controls="contact" aria-selected="false">Efisiensi Tender Juksung</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#efisiensi_terbatas" type="button" role="tab" aria-controls="contact" aria-selected="false">Efisiensi Tender Terbatas</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#efisiensi_umum" type="button" role="tab" aria-controls="contact" aria-selected="false">Efisiensi Tender Umum</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#efisiensi_perunit" type="button" role="tab" aria-controls="contact" aria-selected="false">Efisiensi Per-Unit Kerja</button>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active " id="realisiasi_pic" role="tabpanel" aria-labelledby="home-tab">
                            <br>

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah_realisasi">
                                + Tambah Realisasi PIC Pengadaan
                            </button>

                            <div id="load_realisasi" class="mt-4">

                            </div>
                        </div>
                        <div class="tab-pane fade " id="resume" role="tabpanel" aria-labelledby="profile-tab">
                            <br>
                            <div class="form-group">
                                <form action="javascript:;" id="form_filter_resume">
                                    <h6 for="">Tahun Anggaran</h6>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <select name="tahun_resume" id="" class="form-control">
                                                <option value="">Pilih Tahun</option>
                                                <option value="">Semua</option>
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
                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Filter</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <br>
                            <table class="table table-bordered" id="tbl_resume">
                                <thead class="text-center">
                                    <tr>
                                        <th>JENIS PENGADAAN</th>
                                        <th>ANGGARAN TAHUN <label for="" class="tahun"></label></th>
                                        <th>HPS PENGADAAN TAHUN <label for="" class="tahun"></label></th>
                                        <th>NILAI KONTRAK TAHUN <label for="" class="tahun"></label></th>
                                        <th>EFISIENSI TAHUN <label for="" class="tahun"></label></th>
                                        <th>PRESENTASE</label></th>
                                    </tr>
                                    <tr>
                                        <th>Pengadaan Langsung</th>
                                        <th><label for="" id="langsung_resume_pagu"></label></th>
                                        <th><label for="" id="langsung_resume_hps"></label></th>
                                        <th><label for="" id="langsung_resume_nilai_kontrak"></label></th>
                                        <th><label for="" id="langsung_resume_efisiensi"></label></th>
                                        <th><label for="" id="langsung_resume_presentase"> </label> %</th>
                                    </tr>
                                    <tr>
                                        <th>Penunjukan Langsung</th>
                                        <th><label for="" id="juksung_resume_pagu"></label></th>
                                        <th><label for="" id="juksung_resume_hps"></label></th>
                                        <th><label for="" id="juksung_resume_nilai_kontrak"></label></th>
                                        <th><label for="" id="juksung_resume_efisiensi"></label></th>
                                        <th><label for="" id="juksung_resume_presentase"></label> %</th>
                                    </tr>
                                    <tr>
                                        <th>Tender Terbatas</th>
                                        <th><label for="" id="terbatas_resume_pagu"></label></th>
                                        <th><label for="" id="terbatas_resume_hps"></label></th>
                                        <th><label for="" id="terbatas_resume_nilai_kontrak"></label></th>
                                        <th><label for="" id="terbatas_resume_efisiensi"></label></th>
                                        <th><label for="" id="terbatas_resume_presentase"></label> %</th>
                                    </tr>
                                    <tr>
                                        <th>Tender Umum</th>
                                        <th><label for="" id="umum_resume_pagu"></label></th>
                                        <th><label for="" id="umum_resume_hps"></label></th>
                                        <th><label for="" id="umum_resume_nilai_kontrak"></label></th>
                                        <th><label for="" id="umum_resume_efisiensi"></label></th>
                                        <th><label for="" id="umum_resume_presentase"></label> %</th>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <th><label for="" id="total_resume_pagu"></label></th>
                                        <th><label for="" id="total_resume_hps"></label></th>
                                        <th><label for="" id="total_resume_nilai_kontrak"></label></th>
                                        <th><label for="" id="total_resume_efisiensi"></label></th>
                                        <th><label for="" id="total_resume_presentase"></label> %</th>
                                    </tr>
                                    <tr>
                                        <th colspan="3">Persentase Selisih (%)</th>
                                        <th><label for="" id="total_persentasi_selisih"></label> %</th>
                                        <th><label for="" id="total_persentase_efisiensi"></label> %</th>
                                        <th></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="rekap_bulanan" role="tabpanel" aria-labelledby="contact-tab">
                            <br>

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah_rekap">
                                + Tambah Rekap Pengadaan
                            </button>

                            <div id="load_rekap" class="mt-4">

                            </div>
                        </div>

                        <div class="tab-pane fade " id="efisiensi_juksung" role="tabpanel" aria-labelledby="home-tab">
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <h6>Tabel Efisiensi Pengadaan Penunjukan Langsung Tahun <label for="" id="tahun_juksung"></label></h6>
                                </div>
                                <div class="col-md-4 d-flex">
                                    <select name="tahun_juksung_val" id="tahun_juksung_val" class="form-control">
                                        <option value="">Pilih Tahun Pengadaan</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                    </select>
                                    <button class="btn btn-sm btn-primary" style="margin-left: 30px;" id="filter_juksung"><i class="fa fa-search"></i> Filter</button>
                                </div>
                            </div>
                            <br>
                            <div style="overflow-x: auto;">
                                <table class="table table-bordered" id="tbl_efisiensi_juksung">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama Pengadaan</th>
                                        <th>Unit</th>
                                        <th>Pagu Anggaran</th>
                                        <th>Nilai HPS</th>
                                        <th>Nilai Kontrak</th>
                                        <th>Selisih</th>
                                        <th>Efisiensi</th>
                                        <th>Waktu Mulai Pengadaan</th>
                                        <th>Waktu Akhir Pengadaan</th>
                                        <th>Jangka Waktu Pelaksanaan</th>
                                        <th>PIC</th>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade  " id="efisiensi_terbatas" role="tabpanel" aria-labelledby="home-tab">
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <h6>Tabel Efisiensi Pengadaan Tender Terbatas Tahun <label for="" id="tahun_terbatas"></label></h6>
                                </div>
                                <div class="col-md-4 d-flex">
                                    <select name="tahun_terbatas_val" id="tahun_terbatas_val" class="form-control">
                                        <option value="">Pilih Tahun Pengadaan</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                    </select>
                                    <button class="btn btn-sm btn-primary" style="margin-left: 30px;" id="filter_terbatas"><i class="fa fa-search"></i> Filter</button>
                                </div>
                            </div>
                            <br>
                            <div style="overflow-x: auto;">
                                <table class="table table-bordered" id="tbl_efisiensi_terbatas">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama Pengadaan</th>
                                        <th>Unit</th>
                                        <th>Pagu Anggaran</th>
                                        <th>Nilai HPS</th>
                                        <th>Nilai Kontrak</th>
                                        <th>Selisih</th>
                                        <th>Efisiensi</th>
                                        <th>Waktu Mulai Pengadaan</th>
                                        <th>Waktu Akhir Pengadaan</th>
                                        <th>Jangka Waktu Pelaksanaan</th>
                                        <th>PIC</th>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade  " id="efisiensi_umum" role="tabpanel" aria-labelledby="home-tab">
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <h6>Tabel Efisiensi Pengadaan Tender Terbatas Tahun <label for="" id="tahun_umum"></label></h6>
                                </div>
                                <div class="col-md-4 d-flex">
                                    <select name="tahun_umum_val" id="tahun_umum_val" class="form-control">
                                        <option value="">Pilih Tahun Pengadaan</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                    </select>
                                    <button class="btn btn-sm btn-primary" style="margin-left: 30px;" id="filter_umum"><i class="fa fa-search"></i> Filter</button>
                                </div>
                            </div>
                            <br>
                            <div style="overflow-x: auto;">
                                <table class="table table-bordered" id="tbl_efisiensi_umum">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama Pengadaan</th>
                                        <th>Unit</th>
                                        <th>Pagu Anggaran</th>
                                        <th>Nilai HPS</th>
                                        <th>Nilai Kontrak</th>
                                        <th>Selisih</th>
                                        <th>Efisiensi</th>
                                        <th>Waktu Mulai Pengadaan</th>
                                        <th>Waktu Akhir Pengadaan</th>
                                        <th>Jangka Waktu Pelaksanaan</th>
                                        <th>PIC</th>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade  " id="efisiensi_perunit" role="tabpanel" aria-labelledby="home-tab">
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <h6>Tabel Efisiensi Pengadaan Tender Terbatas Tahun <label for="" class="tahun_unit_label"></label></h6>
                                </div>
                                <div class="col-md-4 d-flex">
                                    <select name="tahun_unit" id="tahun_unit" class="form-control">
                                        <option value="">Pilih Tahun Pengadaan</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                    </select>
                                    <button class="btn btn-sm btn-primary" style="margin-left: 30px;" onclick="load_data_perunit()"><i class="fa fa-search"></i> Filter</button>
                                </div>
                            </div>
                            <br>
                            <div style="overflow-x: auto;">
                                <table class="table table-bordered">
                                    <thead class="text-center" style=" vertical-align: middle;">
                                        <tr>
                                            <th rowspan="3">No</th>
                                            <th rowspan="3">Departemen / Unit Kerja</th>
                                            <th rowspan="3">Nilai RUP (Rencana Umum <br> Pengadaan) Tahun <label for="" class="tahun_unit_label"></label></th>
                                            <th colspan="8">Realisasi Tahun <label for="" class="tahun_unit_label"></label></th>
                                            <th rowspan="3">Efisiensi Tahun <label for="" class="tahun_unit_label"></label></th>
                                            <th rowspan="3">Persentase Efisiensi</th>
                                            <th rowspan="3">Persentase <br> Realisasi Terhadap <br> RUP</th>
                                            <th rowspan="3">Keterangan</th>
                                        </tr>
                                        <tr>
                                            <th colspan="2">Penunjukan Langsung</th>
                                            <th colspan="2">Tender Terbatas</th>
                                            <th colspan="2">Tender Umum</th>
                                            <th colspan="2">Total</th>
                                        </tr>
                                        <tr>
                                            <th>Hps</th>
                                            <th>Kontrak</th>
                                            <th>Hps</th>
                                            <th>Kontrak</th>
                                            <th>Hps</th>
                                            <th>Kontrak</th>
                                            <th>Hps</th>
                                            <th>Kontrak</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        $o = 1;
                                        foreach ($get_departemen as $key => $value) { ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $value['nama_departemen'] ?></td>
                                                <td>Rp. <label id="nilai_rup<?= $value['id_departemen'] ?>"></label></td>
                                                <td>Rp. <label id="hps_juksung<?= $value['id_departemen'] ?>"></label></td>
                                                <td>Rp. <label id="kontrak_juksung<?= $value['id_departemen'] ?>"></label></td>
                                                <td>Rp. <label id="hps_terbatas<?= $value['id_departemen'] ?>"></label></td>
                                                <td>Rp. <label id="kontrak_terbatas<?= $value['id_departemen'] ?>"></label></td>
                                                <td>Rp. <label id="hps_umum<?= $value['id_departemen'] ?>"></label></td>
                                                <td>Rp. <label id="kontrak_umum<?= $value['id_departemen'] ?>"></label></td>
                                                <td>Rp. <label id="hps_keseluruhan<?= $value['id_departemen'] ?>"></label></td>
                                                <td>Rp. <label id="kontrak_keseluruhan<?= $value['id_departemen'] ?>"></label></td>
                                                <td>Rp. <label id="efisiensi_tahun<?= $value['id_departemen'] ?>"></label></td>
                                                <td><label id="efisiensi_persentasi<?= $value['id_departemen'] ?>"></label> %</td>
                                                <td><label id="efisiensi_rup<?= $value['id_departemen'] ?>"></label> %</td>
                                                <td><label id="keterangan<?= $value['id_departemen'] ?>"></label> </td>
                                            </tr>
                                        <?php  } ?>
                                        <tr>
                                            <td colspan="2" style="vertical-align: middle;" class="text-center">Total</td>
                                            <td>Rp. <label id="nilai_rup_total"></label></td>
                                            <td>Rp. <label id="hps_juksung_total"></label></td>
                                            <td>Rp. <label id="kontrak_juksung_total"></label></td>
                                            <td>Rp. <label id="hps_terbatas_total"></label></td>
                                            <td>Rp. <label id="kontrak_terbatas_total"></label></td>
                                            <td>Rp. <label id="hps_umum_total"></label></td>
                                            <td>Rp. <label id="kontrak_umum_total"></label></td>
                                            <td>Rp. <label id="hps_keseluruhan_total"></label></td>
                                            <td>Rp. <label id="kontrak_keseluruhan_total"></label></td>
                                            <td>Rp. <label id="efisiensi_tahun_total"></label></td>
                                            <td><label id="efisiensi_persentasi_total"></label> %</td>
                                            <td><label id="efisiensi_rup_total"></label> %</td>
                                            <td><label id="keterangan_total"></label> </td>
                                        </tr>
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
<div class="modal fade" id="tambah_realisasi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Realisasi PIC Pengadaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="javascript:;" id="form_laporan_realisasi">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Tahun Pengadaan</label>
                            <select name="tahun_pengadaan" id="" class="form-control">
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
                        <div class="col-md-6">
                            <label for="">PIC</label>
                            <input type="text" name="nama_pic" class="form-control" placeholder="Nama PIC">
                        </div>

                    </div>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Metode Pengadaan</th>
                                <th>Jan</th>
                                <th>Feb</th>
                                <th>Mar</th>
                                <th>Apr</th>
                                <th>May</th>
                                <th>Jun</th>
                                <th>Jul</th>
                                <th>Aug</th>
                                <th>Sep</th>
                                <th>Oct</th>
                                <th>Nov</th>
                                <th>Dec</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <th>Tender Umum</th>
                                <th><input type="text" name="umum_jan" onkeyup="count_umum()" class="form-control"></th>
                                <th><input type="text" name="umum_feb" onkeyup="count_umum()" class="form-control"></th>
                                <th><input type="text" name="umum_mar" onkeyup="count_umum()" class="form-control"></th>
                                <th><input type="text" name="umum_apr" onkeyup="count_umum()" class="form-control"></th>
                                <th><input type="text" name="umum_may" onkeyup="count_umum()" class="form-control"></th>
                                <th><input type="text" name="umum_jun" onkeyup="count_umum()" class="form-control"></th>
                                <th><input type="text" name="umum_jul" onkeyup="count_umum()" class="form-control"></th>
                                <th><input type="text" name="umum_aug" onkeyup="count_umum()" class="form-control"></th>
                                <th><input type="text" name="umum_sep" onkeyup="count_umum()" class="form-control"></th>
                                <th><input type="text" name="umum_oct" onkeyup="count_umum()" class="form-control"></th>
                                <th><input type="text" name="umum_nov" onkeyup="count_umum()" class="form-control"></th>
                                <th><input type="text" name="umum_dec" onkeyup="count_umum()" class="form-control"></th>
                                <th><input type="text" readonly name="umum_total" class="form-control"></th>
                            </tr>
                            <tr>
                                <th>2</th>
                                <th>Penunjukan Langsung</th>
                                <th><input type="text" name="juksung_jan" onkeyup="count_juksung()" class="form-control"></th>
                                <th><input type="text" name="juksung_feb" onkeyup="count_juksung()" class="form-control"></th>
                                <th><input type="text" name="juksung_mar" onkeyup="count_juksung()" class="form-control"></th>
                                <th><input type="text" name="juksung_apr" onkeyup="count_juksung()" class="form-control"></th>
                                <th><input type="text" name="juksung_may" onkeyup="count_juksung()" class="form-control"></th>
                                <th><input type="text" name="juksung_jun" onkeyup="count_juksung()" class="form-control"></th>
                                <th><input type="text" name="juksung_jul" onkeyup="count_juksung()" class="form-control"></th>
                                <th><input type="text" name="juksung_aug" onkeyup="count_juksung()" class="form-control"></th>
                                <th><input type="text" name="juksung_sep" onkeyup="count_juksung()" class="form-control"></th>
                                <th><input type="text" name="juksung_oct" onkeyup="count_juksung()" class="form-control"></th>
                                <th><input type="text" name="juksung_nov" onkeyup="count_juksung()" class="form-control"></th>
                                <th><input type="text" name="juksung_dec" onkeyup="count_juksung()" class="form-control"></th>
                                <th><input type="text" readonly name="juksung_total" class="form-control"></th>
                            </tr>

                            <tr>
                                <th>3</th>
                                <th>Tender Terbatas</th>
                                <th><input type="text" name="terbatas_jan" onkeyup="count_terbatas()" class="form-control"></th>
                                <th><input type="text" name="terbatas_feb" onkeyup="count_terbatas()" class="form-control"></th>
                                <th><input type="text" name="terbatas_mar" onkeyup="count_terbatas()" class="form-control"></th>
                                <th><input type="text" name="terbatas_apr" onkeyup="count_terbatas()" class="form-control"></th>
                                <th><input type="text" name="terbatas_may" onkeyup="count_terbatas()" class="form-control"></th>
                                <th><input type="text" name="terbatas_jun" onkeyup="count_terbatas()" class="form-control"></th>
                                <th><input type="text" name="terbatas_jul" onkeyup="count_terbatas()" class="form-control"></th>
                                <th><input type="text" name="terbatas_aug" onkeyup="count_terbatas()" class="form-control"></th>
                                <th><input type="text" name="terbatas_sep" onkeyup="count_terbatas()" class="form-control"></th>
                                <th><input type="text" name="terbatas_oct" onkeyup="count_terbatas()" class="form-control"></th>
                                <th><input type="text" name="terbatas_nov" onkeyup="count_terbatas()" class="form-control"></th>
                                <th><input type="text" name="terbatas_dec" onkeyup="count_terbatas()" class="form-control"></th>
                                <th><input type="text" readonly name="terbatas_total" class="form-control"></th>
                            </tr>



                            <tr>
                                <th>4</th>
                                <th>Pengadaan Langsung</th>
                                <th><input type="text" name="langsung_jan" onkeyup="count_langsung()" class="form-control"></th>
                                <th><input type="text" name="langsung_feb" onkeyup="count_langsung()" class="form-control"></th>
                                <th><input type="text" name="langsung_mar" onkeyup="count_langsung()" class="form-control"></th>
                                <th><input type="text" name="langsung_apr" onkeyup="count_langsung()" class="form-control"></th>
                                <th><input type="text" name="langsung_may" onkeyup="count_langsung()" class="form-control"></th>
                                <th><input type="text" name="langsung_jun" onkeyup="count_langsung()" class="form-control"></th>
                                <th><input type="text" name="langsung_jul" onkeyup="count_langsung()" class="form-control"></th>
                                <th><input type="text" name="langsung_aug" onkeyup="count_langsung()" class="form-control"></th>
                                <th><input type="text" name="langsung_sep" onkeyup="count_langsung()" class="form-control"></th>
                                <th><input type="text" name="langsung_oct" onkeyup="count_langsung()" class="form-control"></th>
                                <th><input type="text" name="langsung_nov" onkeyup="count_langsung()" class="form-control"></th>
                                <th><input type="text" name="langsung_dec" onkeyup="count_langsung()" class="form-control"></th>
                                <th><input type="text" readonly name="langsung_total" class="form-control"></th>
                            </tr>
                        </tbody>
                    </table>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn_simpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="tambah_rekap" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Realisasi PIC Pengadaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="javascript:;" id="form_laporan_rekap">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Tahun Pengadaan</label>
                            <select name="tahun_pengadaan1" id="" class="form-control">
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

                    </div>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Metode Pengadaan</th>
                                <th>Jan</th>
                                <th>Feb</th>
                                <th>Mar</th>
                                <th>Apr</th>
                                <th>May</th>
                                <th>Jun</th>
                                <th>Jul</th>
                                <th>Aug</th>
                                <th>Sep</th>
                                <th>Oct</th>
                                <th>Nov</th>
                                <th>Dec</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <th>Tender Umum</th>
                                <th><input type="text" name="umum_jan1" onkeyup="count_umum1()" class="form-control"></th>
                                <th><input type="text" name="umum_feb1" onkeyup="count_umum1()" class="form-control"></th>
                                <th><input type="text" name="umum_mar1" onkeyup="count_umum1()" class="form-control"></th>
                                <th><input type="text" name="umum_apr1" onkeyup="count_umum1()" class="form-control"></th>
                                <th><input type="text" name="umum_may1" onkeyup="count_umum1()" class="form-control"></th>
                                <th><input type="text" name="umum_jun1" onkeyup="count_umum1()" class="form-control"></th>
                                <th><input type="text" name="umum_jul1" onkeyup="count_umum1()" class="form-control"></th>
                                <th><input type="text" name="umum_aug1" onkeyup="count_umum1()" class="form-control"></th>
                                <th><input type="text" name="umum_sep1" onkeyup="count_umum1()" class="form-control"></th>
                                <th><input type="text" name="umum_oct1" onkeyup="count_umum1()" class="form-control"></th>
                                <th><input type="text" name="umum_nov1" onkeyup="count_umum1()" class="form-control"></th>
                                <th><input type="text" name="umum_dec1" onkeyup="count_umum1()" class="form-control"></th>
                                <th><input type="text" readonly name="umum_total1" class="form-control"></th>
                            </tr>
                            <tr>
                                <th>2</th>
                                <th>Penunjukan Langsung</th>
                                <th><input type="text" name="juksung_jan1" onkeyup="count_juksung1()" class="form-control"></th>
                                <th><input type="text" name="juksung_feb1" onkeyup="count_juksung1()" class="form-control"></th>
                                <th><input type="text" name="juksung_mar1" onkeyup="count_juksung1()" class="form-control"></th>
                                <th><input type="text" name="juksung_apr1" onkeyup="count_juksung1()" class="form-control"></th>
                                <th><input type="text" name="juksung_may1" onkeyup="count_juksung1()" class="form-control"></th>
                                <th><input type="text" name="juksung_jun1" onkeyup="count_juksung1()" class="form-control"></th>
                                <th><input type="text" name="juksung_jul1" onkeyup="count_juksung1()" class="form-control"></th>
                                <th><input type="text" name="juksung_aug1" onkeyup="count_juksung1()" class="form-control"></th>
                                <th><input type="text" name="juksung_sep1" onkeyup="count_juksung1()" class="form-control"></th>
                                <th><input type="text" name="juksung_oct1" onkeyup="count_juksung1()" class="form-control"></th>
                                <th><input type="text" name="juksung_nov1" onkeyup="count_juksung1()" class="form-control"></th>
                                <th><input type="text" name="juksung_dec1" onkeyup="count_juksung1()" class="form-control"></th>
                                <th><input type="text" readonly name="juksung_total1" class="form-control"></th>
                            </tr>

                            <tr>
                                <th>3</th>
                                <th>Tender Terbatas</th>
                                <th><input type="text" name="terbatas_jan1" onkeyup="count_terbatas1()" class="form-control"></th>
                                <th><input type="text" name="terbatas_feb1" onkeyup="count_terbatas1()" class="form-control"></th>
                                <th><input type="text" name="terbatas_mar1" onkeyup="count_terbatas1()" class="form-control"></th>
                                <th><input type="text" name="terbatas_apr1" onkeyup="count_terbatas1()" class="form-control"></th>
                                <th><input type="text" name="terbatas_may1" onkeyup="count_terbatas1()" class="form-control"></th>
                                <th><input type="text" name="terbatas_jun1" onkeyup="count_terbatas1()" class="form-control"></th>
                                <th><input type="text" name="terbatas_jul1" onkeyup="count_terbatas1()" class="form-control"></th>
                                <th><input type="text" name="terbatas_aug1" onkeyup="count_terbatas1()" class="form-control"></th>
                                <th><input type="text" name="terbatas_sep1" onkeyup="count_terbatas1()" class="form-control"></th>
                                <th><input type="text" name="terbatas_oct1" onkeyup="count_terbatas1()" class="form-control"></th>
                                <th><input type="text" name="terbatas_nov1" onkeyup="count_terbatas1()" class="form-control"></th>
                                <th><input type="text" name="terbatas_dec1" onkeyup="count_terbatas1()" class="form-control"></th>
                                <th><input type="text" readonly name="terbatas_total1" class="form-control"></th>
                            </tr>



                            <tr>
                                <th>4</th>
                                <th>Pengadaan Langsung</th>
                                <th><input type="text" name="langsung_jan1" onkeyup="count_langsung1()" class="form-control"></th>
                                <th><input type="text" name="langsung_feb1" onkeyup="count_langsung1()" class="form-control"></th>
                                <th><input type="text" name="langsung_mar1" onkeyup="count_langsung1()" class="form-control"></th>
                                <th><input type="text" name="langsung_apr1" onkeyup="count_langsung1()" class="form-control"></th>
                                <th><input type="text" name="langsung_may1" onkeyup="count_langsung1()" class="form-control"></th>
                                <th><input type="text" name="langsung_jun1" onkeyup="count_langsung1()" class="form-control"></th>
                                <th><input type="text" name="langsung_jul1" onkeyup="count_langsung1()" class="form-control"></th>
                                <th><input type="text" name="langsung_aug1" onkeyup="count_langsung1()" class="form-control"></th>
                                <th><input type="text" name="langsung_sep1" onkeyup="count_langsung1()" class="form-control"></th>
                                <th><input type="text" name="langsung_oct1" onkeyup="count_langsung1()" class="form-control"></th>
                                <th><input type="text" name="langsung_nov1" onkeyup="count_langsung1()" class="form-control"></th>
                                <th><input type="text" name="langsung_dec1" onkeyup="count_langsung1()" class="form-control"></th>
                                <th><input type="text" readonly name="langsung_total1" class="form-control"></th>
                            </tr>
                        </tbody>
                    </table>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn_simpan1">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>