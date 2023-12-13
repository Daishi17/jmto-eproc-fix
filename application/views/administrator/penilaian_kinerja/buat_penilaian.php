<main class="container-fluid">
    <input type="hidden" name="url_cek_dokumen_hps" value="<?= base_url('file_paket/') ?>">
    <input type="hidden" name="url_by_id_rup" value="<?= base_url('panitia/daftar_paket/daftar_paket/by_id_rup/') ?>">
    <input type="hidden" name="url_download_syarat_tambahan" value="<?= base_url('panitia/daftar_paket/daftar_paket/url_download_syarat_tambahan') ?>">
    <div class="row">
        <div class="col">
            <div class="card border-dark">
                <div class="card-header border-dark bg-gradient-color2">
                    <h6 class="card-title">
                        <span class="text-white">
                            <i class="fa-solid fa-circle-info"></i>
                            <small><strong>FORM PENILAIAN KINERJA VENDOR</strong></small>
                        </span>
                    </h6>
                </div>
            </div>
            <hr>
            <div class="card border-dark ">
                <div class="card-header border-dark bg-warning d-flex justify-content-between align-items-center">
                    <div class="flex-grow-1 bd-highlight">
                        <span class="text-dark">
                            <i class="fa-solid fa-table px-1"></i>
                            <small><strong>Data Tabel - FORM PENILAIAN KINERJA VENDOR</strong></small>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="penilaian_1-tab" data-bs-toggle="tab" data-bs-target="#penilaian_1" type="button" role="tab" aria-controls="penilaian_1" aria-selected="true">Kinerja Pekerjaan Konstruksi</button>
                        </li>
                        <!-- <li class="nav-item" role="presentation">
                            <button class="nav-link" id="penilaian_2-tab" data-bs-toggle="tab" data-bs-target="#penilaian_2" type="button" role="tab" aria-controls="penilaian_2" aria-selected="false">Kinerja Konsultan Perencana Konstruksi</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="penilaian_3-tab" data-bs-toggle="tab" data-bs-target="#penilaian_3" type="button" role="tab" aria-controls="penilaian_3" aria-selected="false">Kinerja Konsultan Kajian/Studi/Sistem Informatika</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="penilaian_4-tab" data-bs-toggle="tab" data-bs-target="#penilaian_4" type="button" role="tab" aria-controls="penilaian_4" aria-selected="false">Kinerja Konsultan Pengawas Konstruksi</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="penilaian_5-tab" data-bs-toggle="tab" data-bs-target="#penilaian_5" type="button" role="tab" aria-controls="penilaian_5" aria-selected="false">Kinerja Jasa Lainya</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="penilaian_6-tab" data-bs-toggle="tab" data-bs-target="#penilaian_6" type="button" role="tab" aria-controls="penilaian_6" aria-selected="false">Kinerja Penyedia Barang</button>
                        </li> -->
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <br>
                        <div class="tab-pane fade show active" id="penilaian_1" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card" style="box-shadow: 2px 2px 10px 2px black;">
                                <div class="card-header bg-warning text-white">
                                    <i class="fas fa-chart-line"></i> Penilaian Kinerja Pekerjaan Konstruksi
                                </div>
                                <div class="card-body">
                                    <div style="overflow-x: auto;">
                                        <table class="table" style="font-size: 12px;">
                                            <tr>
                                                <th>Kode Tender</th>
                                                <th>: <?= $row_mengikuti_paket['kode_rup'] ?></th>
                                            </tr>
                                            <tr>
                                                <th>Nama Paket</th>
                                                <th>: <?= $row_mengikuti_paket['nama_rup'] ?></th>
                                            </tr>
                                            <tr>
                                                <th>Departemen</th>
                                                <th>: <?= $row_mengikuti_paket['nama_departemen'] ?></th>
                                            </tr>
                                            <tr>
                                                <th>Section</th>
                                                <th>: <?= $row_mengikuti_paket['nama_section'] ?></th>
                                            </tr>
                                            <tr>
                                                <th>Nama Penyedia</th>
                                                <th>: <?= $row_mengikuti_paket['nama_usaha'] ?></th>
                                            </tr>
                                            <tr>
                                                <th>Alamat Perusahaan</th>
                                                <th>: <?= $row_mengikuti_paket['alamat'] ?></th>
                                            </tr>
                                            <tr>
                                                <th>Lokasi Pekerjaan</th>
                                                <th>: Provinsi : <?= $row_mengikuti_paket['nama_provinsi'] ?> <br> : Kabupaten : <?= $row_mengikuti_paket['nama_kabupaten'] ?> <br> : Alamat : <?= $row_mengikuti_paket['detail_lokasi_rup'] ?> </th>
                                            </tr>
                                            <tr>
                                                <th>Nilai Kontrak</th>
                                                <th>:
                                                    <?= "Rp " . number_format($row_mengikuti_paket['total_pagu_rup'], 2, ',', '.'); ?> </th>
                                            </tr>
                                            <tr>
                                                <th>Metode Pemilihan</th>
                                                <th>: <?= $row_mengikuti_paket['nama_metode_pengadaan'] ?></th>
                                            </tr>
                                        </table><br>
                                        <?php if ($row_mengikuti_paket['status_warning_vendor'] == 1) { ?>
                                            <div class="alert alert-warning" role="alert">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <img src="https://eproc.jmtm.co.id/assets/img/warning.png" width="70px" alt="">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <label for="">Vendor Telah Memiliki 1 Kali Warning Maka Jika Vendor Mendapatkan Warning ke-2 Vendor Akan Di Blacklist Otomatis Oleh Sistem Selama 2 Tahun !!!</label>
                                                    </div>
                                                </div>

                                            </div>
                                        <?php } else if ($row_mengikuti_paket['status_warning_vendor'] == 2) { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <img src="https://eproc.jmtm.co.id/assets/img/blacklist.png" width="70px" alt="">
                                                <label for="">Vendor Telah TerBlacklist Oleh Sistem Selama 2 Tahun !!!</label>
                                            </div>
                                        <?php   } else { ?>
                                            <div class="alert alert-success" role="alert">
                                                <img src="https://eproc.jmtm.co.id/assets/img/aman2.png" width="70px" alt="">
                                                    <label for="">Vendor Ini Aman / Tiadak Memiliki Warning !!!</label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="card" style="box-shadow: 2px 2px 10px 2px black;">
                                <div class="card-header bg-warning text-white">
                                    <i class="fas fa-chart-line"></i> Table Penilaian Kinerja Pekerjaan Konstruksi
                                </div>
                                <div class="card-body">
                                    <div style="overflow-x: auto;">
                                        <form action="" id="form_tambah_pekerjaan_kontruksi">
                                            <input type="hidden" name="id_rup" value="<?= $row_mengikuti_paket['id_rup'] ?>">
                                            <input type="hidden" name="id_vendor" value="<?= $row_mengikuti_paket['id_vendor'] ?>">
                                            <input type="hidden" name="id_vendor_mengikuti_paket" value="<?= $row_mengikuti_paket['id_vendor_mengikuti_paket'] ?>">
                                            <table id="nilai_tbl" class="table table-bordered">
                                                <tr class="bg-warning text-white">
                                                    <th>No</th>
                                                    <th>Aspek Kerja</th>
                                                    <th>Indikator</th>
                                                    <th>Bobot(%)</th>
                                                    <th>Penilaian</th>
                                                    <th>Nilai Akhir</th>
                                                </tr>
                                                <tr>
                                                    <td rowspan="3">1</td>
                                                    <td rowspan="3">Administrasi
                                                        (20%)</td>
                                                    <!-- ketika update  -->
                                                    <!-- kontruksi_1 -->
                                                    <?php if ($cek_jika_ada_kontruksi_1) { ?>
                                                        <td>
                                                            <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $cek_jika_ada_kontruksi_1['indikator_detail_pekerjaan'] ?></textarea>
                                                            <label for=""><?= $cek_jika_ada_kontruksi_1['indikator_detail_pekerjaan'] ?></label>

                                                        </td>
                                                        <td><?= $cek_jika_ada_kontruksi_1['bobot_detail_pekerjaan'] ?>
                                                            <input type="hidden" id="bobot_pekerjaan_kontruksi_1" name="bobot_pekerjaan_kontruksi[]" value="<?= $cek_jika_ada_kontruksi_1['bobot_detail_pekerjaan'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="penilaian_kontruksi_1" value="<?= $cek_jika_ada_kontruksi_1['penilaian_detail'] ?>" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                        </td>
                                                        <td><input type="text" value="<?= $cek_jika_ada_kontruksi_1['nilai_akhir_detail_pekerjaan'] ?>" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_1" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                    <?php   } else { ?>
                                                        <td>
                                                            <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $kontruksi_1['indikator_pekerjaan'] ?></textarea>
                                                            <label for=""><?= $kontruksi_1['indikator_pekerjaan'] ?></label>

                                                        </td>
                                                        <td><?= $kontruksi_1['bobot_pekerjaan'] ?>
                                                            <input type="hidden" id="bobot_pekerjaan_kontruksi_1" name="bobot_pekerjaan_kontruksi[]" value="<?= $kontruksi_1['bobot_pekerjaan'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="penilaian_kontruksi_1" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                        </td>
                                                        <td><input type="text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_1" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                    <?php  }
                                                    ?>

                                                </tr>
                                                <tr>
                                                    <!-- kontruksi_2 -->
                                                    <?php if ($cek_jika_ada_kontruksi_2) { ?>
                                                        <td>
                                                            <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $cek_jika_ada_kontruksi_2['indikator_detail_pekerjaan'] ?></textarea>
                                                            <label for=""><?= $cek_jika_ada_kontruksi_2['indikator_detail_pekerjaan'] ?></label>

                                                        </td>
                                                        <td><?= $cek_jika_ada_kontruksi_2['bobot_detail_pekerjaan'] ?>
                                                            <input type="hidden" id="bobot_pekerjaan_kontruksi_2" name="bobot_pekerjaan_kontruksi[]" value="<?= $cek_jika_ada_kontruksi_2['bobot_detail_pekerjaan'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="penilaian_kontruksi_2" value="<?= $cek_jika_ada_kontruksi_2['penilaian_detail'] ?>" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                        </td>
                                                        <td><input type="text" value="<?= $cek_jika_ada_kontruksi_2['nilai_akhir_detail_pekerjaan'] ?>" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_2" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                    <?php   } else { ?>
                                                        <td>
                                                            <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $kontruksi_2['indikator_pekerjaan'] ?></textarea>
                                                            <label for=""><?= $kontruksi_2['indikator_pekerjaan'] ?></label>

                                                        </td>
                                                        <td><?= $kontruksi_2['bobot_pekerjaan'] ?>
                                                            <input type="hidden" id="bobot_pekerjaan_kontruksi_2" name="bobot_pekerjaan_kontruksi[]" value="<?= $kontruksi_2['bobot_pekerjaan'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="penilaian_kontruksi_2" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                        </td>
                                                        <td><input type="text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_2" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                    <?php  }
                                                    ?>
                                                </tr>
                                                <tr>
                                                    <!-- kontruksi_3 -->
                                                    <?php if ($cek_jika_ada_kontruksi_3) { ?>
                                                        <td>
                                                            <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $cek_jika_ada_kontruksi_3['indikator_detail_pekerjaan'] ?></textarea>
                                                            <label for=""><?= $cek_jika_ada_kontruksi_3['indikator_detail_pekerjaan'] ?></label>

                                                        </td>
                                                        <td><?= $cek_jika_ada_kontruksi_3['bobot_detail_pekerjaan'] ?>
                                                            <input type="hidden" id="bobot_pekerjaan_kontruksi_3" name="bobot_pekerjaan_kontruksi[]" value="<?= $cek_jika_ada_kontruksi_3['bobot_detail_pekerjaan'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="penilaian_kontruksi_3" value="<?= $cek_jika_ada_kontruksi_3['penilaian_detail'] ?>" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                        </td>
                                                        <td><input type="text" value="<?= $cek_jika_ada_kontruksi_3['nilai_akhir_detail_pekerjaan'] ?>" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_3" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                    <?php   } else { ?>
                                                        <td>
                                                            <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $kontruksi_3['indikator_pekerjaan'] ?></textarea>
                                                            <label for=""><?= $kontruksi_3['indikator_pekerjaan'] ?></label>

                                                        </td>
                                                        <td><?= $kontruksi_3['bobot_pekerjaan'] ?>
                                                            <input type="hidden" id="bobot_pekerjaan_kontruksi_3" name="bobot_pekerjaan_kontruksi[]" value="<?= $kontruksi_3['bobot_pekerjaan'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="penilaian_kontruksi_3" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                        </td>
                                                        <td><input type="text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_3" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                    <?php  }
                                                    ?>
                                                </tr>
                                                <!-- Kedua -->
                                                <tr>

                                                    <td rowspan="2">2</td>
                                                    <td rowspan="2">Jadwal Dan
                                                        Waktu (10%)</td>
                                                    <!-- kontruksi_4 -->
                                                    <?php if ($cek_jika_ada_kontruksi_4) { ?>
                                                        <td>
                                                            <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $cek_jika_ada_kontruksi_4['indikator_detail_pekerjaan'] ?></textarea>
                                                            <label for=""><?= $cek_jika_ada_kontruksi_4['indikator_detail_pekerjaan'] ?></label>

                                                        </td>
                                                        <td><?= $cek_jika_ada_kontruksi_4['bobot_detail_pekerjaan'] ?>
                                                            <input type="hidden" id="bobot_pekerjaan_kontruksi_4" name="bobot_pekerjaan_kontruksi[]" value="<?= $cek_jika_ada_kontruksi_4['bobot_detail_pekerjaan'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="penilaian_kontruksi_4" value="<?= $cek_jika_ada_kontruksi_4['penilaian_detail'] ?>" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                        </td>
                                                        <td><input type="text" value="<?= $cek_jika_ada_kontruksi_4['nilai_akhir_detail_pekerjaan'] ?>" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_4" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                    <?php   } else { ?>
                                                        <td>
                                                            <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $kontruksi_4['indikator_pekerjaan'] ?></textarea>
                                                            <label for=""><?= $kontruksi_4['indikator_pekerjaan'] ?></label>

                                                        </td>
                                                        <td><?= $kontruksi_4['bobot_pekerjaan'] ?>
                                                            <input type="hidden" id="bobot_pekerjaan_kontruksi_4" name="bobot_pekerjaan_kontruksi[]" value="<?= $kontruksi_4['bobot_pekerjaan'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="penilaian_kontruksi_4" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                        </td>
                                                        <td><input type="text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_4" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                    <?php  }
                                                    ?>
                                                </tr>
                                                <tr>
                                                    <!-- kontruksi_5 -->
                                                    <?php if ($cek_jika_ada_kontruksi_5) { ?>
                                                        <td>
                                                            <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $cek_jika_ada_kontruksi_5['indikator_detail_pekerjaan'] ?></textarea>
                                                            <label for=""><?= $cek_jika_ada_kontruksi_5['indikator_detail_pekerjaan'] ?></label>

                                                        </td>
                                                        <td><?= $cek_jika_ada_kontruksi_5['bobot_detail_pekerjaan'] ?>
                                                            <input type="hidden" id="bobot_pekerjaan_kontruksi_5" name="bobot_pekerjaan_kontruksi[]" value="<?= $cek_jika_ada_kontruksi_5['bobot_detail_pekerjaan'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="penilaian_kontruksi_5" value="<?= $cek_jika_ada_kontruksi_5['penilaian_detail'] ?>" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                        </td>
                                                        <td><input type="text" value="<?= $cek_jika_ada_kontruksi_5['nilai_akhir_detail_pekerjaan'] ?>" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_5" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                    <?php   } else { ?>
                                                        <td>
                                                            <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $kontruksi_5['indikator_pekerjaan'] ?></textarea>
                                                            <label for=""><?= $kontruksi_5['indikator_pekerjaan'] ?></label>

                                                        </td>
                                                        <td><?= $kontruksi_5['bobot_pekerjaan'] ?>
                                                            <input type="hidden" id="bobot_pekerjaan_kontruksi_5" name="bobot_pekerjaan_kontruksi[]" value="<?= $kontruksi_5['bobot_pekerjaan'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="penilaian_kontruksi_5" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                        </td>
                                                        <td><input type="text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_5" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                    <?php  }
                                                    ?>

                                                </tr>
                                                <!-- Ketiga -->
                                                <tr>

                                                    <td rowspan="3">3</td>
                                                    <td rowspan="3">Kualitas Dan Kuantitas
                                                        (25%)
                                                    </td>
                                                    <!-- kontruksi_6 -->
                                                    <!-- kontruksi_6 -->
                                                    <?php if ($cek_jika_ada_kontruksi_6) { ?>
                                                        <td>
                                                            <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $cek_jika_ada_kontruksi_6['indikator_detail_pekerjaan'] ?></textarea>
                                                            <label for=""><?= $cek_jika_ada_kontruksi_6['indikator_detail_pekerjaan'] ?></label>

                                                        </td>
                                                        <td><?= $cek_jika_ada_kontruksi_6['bobot_detail_pekerjaan'] ?>
                                                            <input type="hidden" id="bobot_pekerjaan_kontruksi_6" name="bobot_pekerjaan_kontruksi[]" value="<?= $cek_jika_ada_kontruksi_6['bobot_detail_pekerjaan'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="penilaian_kontruksi_6" value="<?= $cek_jika_ada_kontruksi_6['penilaian_detail'] ?>" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                        </td>
                                                        <td><input type="text" value="<?= $cek_jika_ada_kontruksi_6['nilai_akhir_detail_pekerjaan'] ?>" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_6" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                    <?php   } else { ?>
                                                        <td>
                                                            <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $kontruksi_6['indikator_pekerjaan'] ?></textarea>
                                                            <label for=""><?= $kontruksi_6['indikator_pekerjaan'] ?></label>

                                                        </td>
                                                        <td><?= $kontruksi_6['bobot_pekerjaan'] ?>
                                                            <input type="hidden" id="bobot_pekerjaan_kontruksi_6" name="bobot_pekerjaan_kontruksi[]" value="<?= $kontruksi_6['bobot_pekerjaan'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="penilaian_kontruksi_6" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                        </td>
                                                        <td><input type="text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_6" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                    <?php  }
                                                    ?>

                                                </tr>
                                                <tr>
                                                    <!-- kontruksi_7 -->
                                                    <?php if ($cek_jika_ada_kontruksi_7) { ?>
                                                        <td>
                                                            <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $cek_jika_ada_kontruksi_7['indikator_detail_pekerjaan'] ?></textarea>
                                                            <label for=""><?= $cek_jika_ada_kontruksi_7['indikator_detail_pekerjaan'] ?></label>

                                                        </td>
                                                        <td><?= $cek_jika_ada_kontruksi_7['bobot_detail_pekerjaan'] ?>
                                                            <input type="hidden" id="bobot_pekerjaan_kontruksi_7" name="bobot_pekerjaan_kontruksi[]" value="<?= $cek_jika_ada_kontruksi_7['bobot_detail_pekerjaan'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="penilaian_kontruksi_7" value="<?= $cek_jika_ada_kontruksi_7['penilaian_detail'] ?>" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                        </td>
                                                        <td><input type="text" value="<?= $cek_jika_ada_kontruksi_7['nilai_akhir_detail_pekerjaan'] ?>" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_7" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                    <?php   } else { ?>
                                                        <td>
                                                            <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $kontruksi_7['indikator_pekerjaan'] ?></textarea>
                                                            <label for=""><?= $kontruksi_7['indikator_pekerjaan'] ?></label>

                                                        </td>
                                                        <td><?= $kontruksi_7['bobot_pekerjaan'] ?>
                                                            <input type="hidden" id="bobot_pekerjaan_kontruksi_7" name="bobot_pekerjaan_kontruksi[]" value="<?= $kontruksi_7['bobot_pekerjaan'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="penilaian_kontruksi_7" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                        </td>
                                                        <td><input type="text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_7" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                    <?php  }
                                                    ?>
                                                </tr>
                                                <tr>
                                                    <!-- kontruksi_8 -->
                                                    <?php if ($cek_jika_ada_kontruksi_8) { ?>
                                                        <td>
                                                            <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $cek_jika_ada_kontruksi_8['indikator_detail_pekerjaan'] ?></textarea>
                                                            <label for=""><?= $cek_jika_ada_kontruksi_8['indikator_detail_pekerjaan'] ?></label>

                                                        </td>
                                                        <td><?= $cek_jika_ada_kontruksi_8['bobot_detail_pekerjaan'] ?>
                                                            <input type="hidden" id="bobot_pekerjaan_kontruksi_8" name="bobot_pekerjaan_kontruksi[]" value="<?= $cek_jika_ada_kontruksi_8['bobot_detail_pekerjaan'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="penilaian_kontruksi_8" value="<?= $cek_jika_ada_kontruksi_8['penilaian_detail'] ?>" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                        </td>
                                                        <td><input type="text" value="<?= $cek_jika_ada_kontruksi_8['nilai_akhir_detail_pekerjaan'] ?>" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_8" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                    <?php   } else { ?>
                                                        <td>
                                                            <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $kontruksi_8['indikator_pekerjaan'] ?></textarea>
                                                            <label for=""><?= $kontruksi_8['indikator_pekerjaan'] ?></label>

                                                        </td>
                                                        <td><?= $kontruksi_8['bobot_pekerjaan'] ?>
                                                            <input type="hidden" id="bobot_pekerjaan_kontruksi_8" name="bobot_pekerjaan_kontruksi[]" value="<?= $kontruksi_8['bobot_pekerjaan'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="penilaian_kontruksi_8" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                        </td>
                                                        <td><input type="text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_8" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                    <?php  }
                                                    ?>
                                                </tr>
                                                <!-- Ke empat -->
                                                <tr>

                                                    <td rowspan="2">4</td>
                                                    <td rowspan="2">Material
                                                        (10%)
                                                    </td>
                                                    <!-- kontruksi_9 -->
                                                    <?php if ($cek_jika_ada_kontruksi_9) { ?>
                                                        <td>
                                                            <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $cek_jika_ada_kontruksi_9['indikator_detail_pekerjaan'] ?></textarea>
                                                            <label for=""><?= $cek_jika_ada_kontruksi_9['indikator_detail_pekerjaan'] ?></label>

                                                        </td>
                                                        <td><?= $cek_jika_ada_kontruksi_9['bobot_detail_pekerjaan'] ?>
                                                            <input type="hidden" id="bobot_pekerjaan_kontruksi_9" name="bobot_pekerjaan_kontruksi[]" value="<?= $cek_jika_ada_kontruksi_9['bobot_detail_pekerjaan'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="penilaian_kontruksi_9" value="<?= $cek_jika_ada_kontruksi_9['penilaian_detail'] ?>" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                        </td>
                                                        <td><input type="text" value="<?= $cek_jika_ada_kontruksi_9['nilai_akhir_detail_pekerjaan'] ?>" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_9" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                    <?php   } else { ?>
                                                        <td>
                                                            <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $kontruksi_9['indikator_pekerjaan'] ?></textarea>
                                                            <label for=""><?= $kontruksi_9['indikator_pekerjaan'] ?></label>

                                                        </td>
                                                        <td><?= $kontruksi_9['bobot_pekerjaan'] ?>
                                                            <input type="hidden" id="bobot_pekerjaan_kontruksi_9" name="bobot_pekerjaan_kontruksi[]" value="<?= $kontruksi_9['bobot_pekerjaan'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="penilaian_kontruksi_9" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                        </td>
                                                        <td><input type="text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_9" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                    <?php  }
                                                    ?>
                                                </tr>
                                                <tr>
                                                    <!-- kontruksi_10 -->
                                                    <?php if ($cek_jika_ada_kontruksi_10) { ?>
                                                        <td>
                                                            <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $cek_jika_ada_kontruksi_10['indikator_detail_pekerjaan'] ?></textarea>
                                                            <label for=""><?= $cek_jika_ada_kontruksi_10['indikator_detail_pekerjaan'] ?></label>

                                                        </td>
                                                        <td><?= $cek_jika_ada_kontruksi_10['bobot_detail_pekerjaan'] ?>
                                                            <input type="hidden" id="bobot_pekerjaan_kontruksi_10" name="bobot_pekerjaan_kontruksi[]" value="<?= $cek_jika_ada_kontruksi_10['bobot_detail_pekerjaan'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="penilaian_kontruksi_10" value="<?= $cek_jika_ada_kontruksi_10['penilaian_detail'] ?>" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                        </td>
                                                        <td><input type="text" value="<?= $cek_jika_ada_kontruksi_10['nilai_akhir_detail_pekerjaan'] ?>" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_10" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                    <?php   } else { ?>
                                                        <td>
                                                            <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $kontruksi_10['indikator_pekerjaan'] ?></textarea>
                                                            <label for=""><?= $kontruksi_10['indikator_pekerjaan'] ?></label>

                                                        </td>
                                                        <td><?= $kontruksi_10['bobot_pekerjaan'] ?>
                                                            <input type="hidden" id="bobot_pekerjaan_kontruksi_10" name="bobot_pekerjaan_kontruksi[]" value="<?= $kontruksi_10['bobot_pekerjaan'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="penilaian_kontruksi_10" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                        </td>
                                                        <td><input type="text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_10" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                    <?php  }
                                                    ?>
                                                </tr>

                                                <!-- Ke lima -->
                                                <tr>

                                                    <td rowspan="3">5</td>
                                                    <td rowspan="3">Tenaga Kerja dan Peralatan (15%)
                                                        <!-- kontruksi_11 -->
                                                        <?php if ($cek_jika_ada_kontruksi_11) { ?>
                                                    <td>
                                                        <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $cek_jika_ada_kontruksi_11['indikator_detail_pekerjaan'] ?></textarea>
                                                        <label for=""><?= $cek_jika_ada_kontruksi_11['indikator_detail_pekerjaan'] ?></label>

                                                    </td>
                                                    <td><?= $cek_jika_ada_kontruksi_11['bobot_detail_pekerjaan'] ?>
                                                        <input type="hidden" id="bobot_pekerjaan_kontruksi_11" name="bobot_pekerjaan_kontruksi[]" value="<?= $cek_jika_ada_kontruksi_11['bobot_detail_pekerjaan'] ?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" id="penilaian_kontruksi_11" value="<?= $cek_jika_ada_kontruksi_11['penilaian_detail'] ?>" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                    </td>
                                                    <td><input type="text" value="<?= $cek_jika_ada_kontruksi_11['nilai_akhir_detail_pekerjaan'] ?>" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_11" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                <?php   } else { ?>
                                                    <td>
                                                        <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $kontruksi_11['indikator_pekerjaan'] ?></textarea>
                                                        <label for=""><?= $kontruksi_11['indikator_pekerjaan'] ?></label>

                                                    </td>
                                                    <td><?= $kontruksi_11['bobot_pekerjaan'] ?>
                                                        <input type="hidden" id="bobot_pekerjaan_kontruksi_11" name="bobot_pekerjaan_kontruksi[]" value="<?= $kontruksi_11['bobot_pekerjaan'] ?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" id="penilaian_kontruksi_11" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                    </td>
                                                    <td><input type="text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_11" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                <?php  }
                                                ?>

                                                </tr>
                                                <tr>
                                                    <!-- kontruksi_12 -->
                                                    <?php if ($cek_jika_ada_kontruksi_12) { ?>
                                                        <td>
                                                            <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $cek_jika_ada_kontruksi_12['indikator_detail_pekerjaan'] ?></textarea>
                                                            <label for=""><?= $cek_jika_ada_kontruksi_12['indikator_detail_pekerjaan'] ?></label>

                                                        </td>
                                                        <td><?= $cek_jika_ada_kontruksi_12['bobot_detail_pekerjaan'] ?>
                                                            <input type="hidden" id="bobot_pekerjaan_kontruksi_12" name="bobot_pekerjaan_kontruksi[]" value="<?= $cek_jika_ada_kontruksi_12['bobot_detail_pekerjaan'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="penilaian_kontruksi_12" value="<?= $cek_jika_ada_kontruksi_12['penilaian_detail'] ?>" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                        </td>
                                                        <td><input type="text" value="<?= $cek_jika_ada_kontruksi_12['nilai_akhir_detail_pekerjaan'] ?>" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_12" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                    <?php   } else { ?>
                                                        <td>
                                                            <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $kontruksi_12['indikator_pekerjaan'] ?></textarea>
                                                            <label for=""><?= $kontruksi_12['indikator_pekerjaan'] ?></label>

                                                        </td>
                                                        <td><?= $kontruksi_12['bobot_pekerjaan'] ?>
                                                            <input type="hidden" id="bobot_pekerjaan_kontruksi_12" name="bobot_pekerjaan_kontruksi[]" value="<?= $kontruksi_12['bobot_pekerjaan'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="penilaian_kontruksi_12" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                        </td>
                                                        <td><input type="text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_12" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                    <?php  }
                                                    ?>
                                                </tr>
                                                <tr>
                                                    <!-- kontruksi_13 -->
                                                    <?php if ($cek_jika_ada_kontruksi_13) { ?>
                                                        <td>
                                                            <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $cek_jika_ada_kontruksi_13['indikator_detail_pekerjaan'] ?></textarea>
                                                            <label for=""><?= $cek_jika_ada_kontruksi_13['indikator_detail_pekerjaan'] ?></label>

                                                        </td>
                                                        <td><?= $cek_jika_ada_kontruksi_13['bobot_detail_pekerjaan'] ?>
                                                            <input type="hidden" id="bobot_pekerjaan_kontruksi_13" name="bobot_pekerjaan_kontruksi[]" value="<?= $cek_jika_ada_kontruksi_13['bobot_detail_pekerjaan'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="penilaian_kontruksi_13" value="<?= $cek_jika_ada_kontruksi_13['penilaian_detail'] ?>" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                        </td>
                                                        <td><input type="text" value="<?= $cek_jika_ada_kontruksi_13['nilai_akhir_detail_pekerjaan'] ?>" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_13" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                    <?php   } else { ?>
                                                        <td>
                                                            <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $kontruksi_13['indikator_pekerjaan'] ?></textarea>
                                                            <label for=""><?= $kontruksi_13['indikator_pekerjaan'] ?></label>

                                                        </td>
                                                        <td><?= $kontruksi_13['bobot_pekerjaan'] ?>
                                                            <input type="hidden" id="bobot_pekerjaan_kontruksi_13" name="bobot_pekerjaan_kontruksi[]" value="<?= $kontruksi_13['bobot_pekerjaan'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="penilaian_kontruksi_13" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                        </td>
                                                        <td><input type="text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_13" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                    <?php  }
                                                    ?>
                                                </tr>

                                                <!-- Ke enam -->
                                                <tr>

                                                    <td rowspan="2">4</td>
                                                    <td rowspan="2">Keselamatan dan Kesehatan Kerja (10%)
                                                    </td>
                                                    <!-- kontruksi_14 -->
                                                    <?php if ($cek_jika_ada_kontruksi_14) { ?>
                                                        <td>
                                                            <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $cek_jika_ada_kontruksi_14['indikator_detail_pekerjaan'] ?></textarea>
                                                            <label for=""><?= $cek_jika_ada_kontruksi_14['indikator_detail_pekerjaan'] ?></label>

                                                        </td>
                                                        <td><?= $cek_jika_ada_kontruksi_14['bobot_detail_pekerjaan'] ?>
                                                            <input type="hidden" id="bobot_pekerjaan_kontruksi_14" name="bobot_pekerjaan_kontruksi[]" value="<?= $cek_jika_ada_kontruksi_14['bobot_detail_pekerjaan'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="penilaian_kontruksi_14" value="<?= $cek_jika_ada_kontruksi_14['penilaian_detail'] ?>" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                        </td>
                                                        <td><input type="text" value="<?= $cek_jika_ada_kontruksi_14['nilai_akhir_detail_pekerjaan'] ?>" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_14" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                    <?php   } else { ?>
                                                        <td>
                                                            <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $kontruksi_14['indikator_pekerjaan'] ?></textarea>
                                                            <label for=""><?= $kontruksi_14['indikator_pekerjaan'] ?></label>

                                                        </td>
                                                        <td><?= $kontruksi_14['bobot_pekerjaan'] ?>
                                                            <input type="hidden" id="bobot_pekerjaan_kontruksi_14" name="bobot_pekerjaan_kontruksi[]" value="<?= $kontruksi_14['bobot_pekerjaan'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="penilaian_kontruksi_14" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                        </td>
                                                        <td><input type="text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_14" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                    <?php  }
                                                    ?>
                                                </tr>
                                                <tr>
                                                    <!-- kontruksi_15 -->
                                                    <?php if ($cek_jika_ada_kontruksi_15) { ?>
                                                        <td>
                                                            <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $cek_jika_ada_kontruksi_15['indikator_detail_pekerjaan'] ?></textarea>
                                                            <label for=""><?= $cek_jika_ada_kontruksi_15['indikator_detail_pekerjaan'] ?></label>

                                                        </td>
                                                        <td><?= $cek_jika_ada_kontruksi_15['bobot_detail_pekerjaan'] ?>
                                                            <input type="hidden" id="bobot_pekerjaan_kontruksi_15" name="bobot_pekerjaan_kontruksi[]" value="<?= $cek_jika_ada_kontruksi_15['bobot_detail_pekerjaan'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="penilaian_kontruksi_15" value="<?= $cek_jika_ada_kontruksi_15['penilaian_detail'] ?>" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                        </td>
                                                        <td><input type="text" value="<?= $cek_jika_ada_kontruksi_15['nilai_akhir_detail_pekerjaan'] ?>" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_15" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                    <?php   } else { ?>
                                                        <td>
                                                            <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $kontruksi_15['indikator_pekerjaan'] ?></textarea>
                                                            <label for=""><?= $kontruksi_15['indikator_pekerjaan'] ?></label>

                                                        </td>
                                                        <td><?= $kontruksi_15['bobot_pekerjaan'] ?>
                                                            <input type="hidden" id="bobot_pekerjaan_kontruksi_15" name="bobot_pekerjaan_kontruksi[]" value="<?= $kontruksi_15['bobot_pekerjaan'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="penilaian_kontruksi_15" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                        </td>
                                                        <td><input type="text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_15" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                    <?php  }
                                                    ?>

                                                </tr>
                                                <!-- Ke tuju -->
                                                <tr>

                                                    <td rowspan="2">7</td>
                                                    <td rowspan="2">Lingkungan
                                                        (10%)
                                                    </td>
                                                    <!-- kontruksi_16 -->
                                                    <?php if ($cek_jika_ada_kontruksi_16) { ?>
                                                        <td>
                                                            <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $cek_jika_ada_kontruksi_16['indikator_detail_pekerjaan'] ?></textarea>
                                                            <label for=""><?= $cek_jika_ada_kontruksi_16['indikator_detail_pekerjaan'] ?></label>

                                                        </td>
                                                        <td><?= $cek_jika_ada_kontruksi_16['bobot_detail_pekerjaan'] ?>
                                                            <input type="hidden" id="bobot_pekerjaan_kontruksi_16" name="bobot_pekerjaan_kontruksi[]" value="<?= $cek_jika_ada_kontruksi_16['bobot_detail_pekerjaan'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="penilaian_kontruksi_16" value="<?= $cek_jika_ada_kontruksi_16['penilaian_detail'] ?>" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                        </td>
                                                        <td><input type="text" value="<?= $cek_jika_ada_kontruksi_16['nilai_akhir_detail_pekerjaan'] ?>" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_16" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                    <?php   } else { ?>
                                                        <td>
                                                            <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $kontruksi_16['indikator_pekerjaan'] ?></textarea>
                                                            <label for=""><?= $kontruksi_16['indikator_pekerjaan'] ?></label>

                                                        </td>
                                                        <td><?= $kontruksi_16['bobot_pekerjaan'] ?>
                                                            <input type="hidden" id="bobot_pekerjaan_kontruksi_16" name="bobot_pekerjaan_kontruksi[]" value="<?= $kontruksi_16['bobot_pekerjaan'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="penilaian_kontruksi_16" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                        </td>
                                                        <td><input type="text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_16" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                    <?php  }
                                                    ?>
                                                </tr>
                                                <tr>
                                                    <!-- kontruksi_17 -->
                                                    <?php if ($cek_jika_ada_kontruksi_17) { ?>
                                                        <td>
                                                            <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $cek_jika_ada_kontruksi_17['indikator_detail_pekerjaan'] ?></textarea>
                                                            <label for=""><?= $cek_jika_ada_kontruksi_17['indikator_detail_pekerjaan'] ?></label>

                                                        </td>
                                                        <td><?= $cek_jika_ada_kontruksi_17['bobot_detail_pekerjaan'] ?>
                                                            <input type="hidden" id="bobot_pekerjaan_kontruksi_17" name="bobot_pekerjaan_kontruksi[]" value="<?= $cek_jika_ada_kontruksi_17['bobot_detail_pekerjaan'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="penilaian_kontruksi_17" value="<?= $cek_jika_ada_kontruksi_17['penilaian_detail'] ?>" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                        </td>
                                                        <td><input type="text" value="<?= $cek_jika_ada_kontruksi_17['nilai_akhir_detail_pekerjaan'] ?>" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_17" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                    <?php   } else { ?>
                                                        <td>
                                                            <textarea hidden name="indikator_pekerjaan_kontruksi[]"><?= $kontruksi_17['indikator_pekerjaan'] ?></textarea>
                                                            <label for=""><?= $kontruksi_17['indikator_pekerjaan'] ?></label>

                                                        </td>
                                                        <td><?= $kontruksi_17['bobot_pekerjaan'] ?>
                                                            <input type="hidden" id="bobot_pekerjaan_kontruksi_17" name="bobot_pekerjaan_kontruksi[]" value="<?= $kontruksi_17['bobot_pekerjaan'] ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="penilaian_kontruksi_17" name="penilaian_kontruksi[]" class="form-control form-control-sm" style="width: 60px;">
                                                        </td>
                                                        <td><input type="text" name="nilai_akhir_pekerjaan_kontruksi[]" id="nilai_akhir_kontruksi_17" class="form-control form-control-sm" readonly style="width: 60px;"></td>
                                                    <?php  }
                                                    ?>
                                                </tr>
                                                <?php if ($jika_sudah_di_tambah_pekerjaan_kontruksi) { ?>
                                                    <?php foreach ($jika_sudah_di_tambah_pekerjaan_kontruksi as $key => $value) { ?>
                                                        <input type="hidden" name="id_detail_penilaian_pekerjaan[]" value="<?= $value['id_detail_penilaian_pekerjaan'] ?>">
                                                    <?php } ?>
                                                    <tfoot>
                                                        <tr class="text-center">
                                                            <td></td>
                                                            <td><b> RATING </b></td>
                                                            <td>
                                                                <div id="status_pekerjaan_kontruksi_update">
                                                                    <?php if ($row_mengikuti_paket['rating_nilai_akhir'] <= 51) { ?>
                                                                        <label for="" class="badge bg-danger">kurang Baik</label>
                                                                    <?php   } else if ($row_mengikuti_paket['rating_nilai_akhir'] <= 70) { ?>
                                                                        <label for="" class="badge bg-warning">cukup Baik</label>
                                                                    <?php } else if ($row_mengikuti_paket['rating_nilai_akhir'] <= 80) { ?>
                                                                        <label for="" class="badge bg-warning">Baik</label>
                                                                    <?php  } else { ?>
                                                                        <label for="" class="badge bg-success">Sangat Baik</label>
                                                                    <?php   } ?>

                                                                </div>
                                                            </td>
                                                            <td colspan="3">
                                                                <div id="bintang_pekerjaan_kontruksi_update">
                                                                    <?php if ($row_mengikuti_paket['rating_nilai_akhir'] <= 51) { ?>
                                                                        ''
                                                                    <?php   } else if ($row_mengikuti_paket['rating_nilai_akhir'] <= 70) { ?>
                                                                        <i class="fas fa fa-star text-warning"></i>
                                                                    <?php } else if ($row_mengikuti_paket['rating_nilai_akhir'] <= 80) { ?>
                                                                        <i class="fas fa fa-star text-warning"></i><i class="fas fa fa-star text-warning"></i>
                                                                    <?php  } else { ?>
                                                                        <i class="fas fa fa-star text-warning"></i> <i class="fas fa fa-star text-warning"></i> <i class="fas fa fa-star text-warning"></i>
                                                                    <?php   } ?>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                    <tfoot>
                                                        <tr class="text-center">
                                                            <td></td>
                                                            <td colspan="2"><b> TOTAL NILAI AKHIR </b></td>
                                                            <td><b>100</b></td>
                                                            <td></td>
                                                            <td><input type="number" style="width: 80px;" class="form-control form-control-sm" readonly value="<?= $row_mengikuti_paket['rating_nilai_akhir'] ?>" id="total_nilai_pekerjaan_kontruksi_update"></td>
                                                        </tr>
                                                    </tfoot>

                                                    <br>
                                            </table>
                                        </form>
                                    </div><br>
                                    <center>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a class="btn btn-primary text-white btn-sm btn-block" style="width:100%" href="<?= base_url('administrator/penilaian_kinerja') ?>"><i class="fas fa fa-arrow-left"></i> Kembali</a>
                                            </div>
                                            <div class="col-md-4">
                                                <div> <button style="width: 100%;" type="button" onclick="Reset_nilai_pekerjaan_kontruksi()" class="btn btn-danger text-white btn-sm btn-block"> <i class="fas fa fa-ban"></i> Reset Penilaian</button></div>
                                            </div>
                                        </div>
                                    </center>
                                <?php    } else { ?>
                                    <input type="hidden" name="rating_penilaian_vendor_pekerjaan_kontruksi">
                                    <input type="hidden" name="status_rating_pekerjaan_kontruksi">
                                    <input type="hidden" name="status_nilai_akhir_pekerjaan_kontruksi">
                                    <tfoot>
                                        <tr class="text-center">
                                            <td></td>
                                            <td><b> RATING </b></td>
                                            <td>
                                                <div id="status_pekerjaan_kontruksi">

                                                </div>
                                            </td>
                                            <td colspan="3">
                                                <div id="bintang_pekerjaan_kontruksi"></div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                    <tfoot>
                                        <tr class="text-center">
                                            <td></td>
                                            <td colspan="2"><b> TOTAL NILAI AKHIR </b></td>
                                            <td><b>100</b></td>
                                            <td></td>
                                            <td><input type="number" style="width: 80px;" class="form-control form-control-sm" readonly id="total_nilai_pekerjaan_kontruksi"></td>
                                        </tr>
                                    </tfoot>

                                    <br>
                                    </table>
                                    </form>
                                </div><br>
                                <center>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a class="btn btn-primary text-white btn-sm btn-block" style="width:100%" href="<?= base_url('administrator/penilaian_kinerja') ?>"><i class="fas fa fa-arrow-left"></i> Kembali</a>
                                        </div>
                                        <div class="col-md-4">
                                            <div id="save_button" style="display: none;"> <button style="width: 100%;" type="button" onclick="Simpan_pekerjaan_kontruksi()" class="btn btn-success text-white btn-sm btn-block"><i class="fas fa fa-save"></i> Simpan Penilaian</button></div>
                                            <div id="warning_button" style="display: none;"> <button style="width: 100%;" type="button" onclick="Simpan_Warning_pekerjaan_kontruksi_warning()" class="btn btn-warning text-white btn-sm btn-block"><i class="fas fa fa-save"></i> Warning Penilaian</button></div>
                                        </div>
                                    </div>
                                </center>
                            <?php   } ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="penilaian_2" role="tabpanel" aria-labelledby="penilaian_2-tab">...</div>
                    <div class="tab-pane fade" id="penilaian_3" role="tabpanel" aria-labelledby="penilaian_3-tab">...</div>
                    <div class="tab-pane fade" id="penilaian_4" role="tabpanel" aria-labelledby="penilaian_4-tab">...</div>
                    <div class="tab-pane fade" id="penilaian_5" role="tabpanel" aria-labelledby="penilaian_5-tab">...</div>
                    <div class="tab-pane fade" id="penilaian_6" role="tabpanel" aria-labelledby="penilaian_6-tab">...</div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>