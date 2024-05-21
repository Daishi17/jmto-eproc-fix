<div class="tab-pane fade show active" id="penilaian_5" role="tabpanel" aria-labelledby="penilaian_5-tab">
    <form action="javascript:;" id="form_pemeliharaan_satgas">
        <input type="hidden" name="id_vendor" value="<?= $row_mengikuti_paket['id_vendor'] ?>">
        <input type="hidden" name="id_rup" value="<?= $row_rup['id_rup'] ?>">
        <div class="card">
            <div class="card-header bg-info text-white">Penilaian Kinerja Penyedia Barang/Jasa</div>
            <div class="card-body" style="margin: 15px;">
                <div class="row">
                    <center>
                        <h4>Penilaian Kinerja Penyedia Barang/Jasa</h4>
                    </center>
                    <table>
                        <tr>
                            <td style="width: 20%;">Nama Pekerjaan</td>
                            <th> : <?= $row_rup['nama_rup'] ?></th>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Nama Perusahaan</td>
                            <th> : <?= $row_mengikuti_paket['nama_usaha'] ?></th>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Unit Kerja / Section</td>
                            <th> : <?= $row_rup['nama_departemen'] ?></th>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Nomor Kontrak</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="satgas_pemeliharaan_nomor_kontrak" value="<?= $get_pemeliharaan_satgas['nomor_kontrak'] ?>"></th>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Periode Kontrak</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="satgas_pemeliharaan_periode_kontrak" value="<?= $get_pemeliharaan_satgas['periode_kontrak'] ?>"></th>
                        </tr>
                        <tr>
                            <td style=" width: 20%;">Waktu Penilaian</td>
                            <th> <input type="date" class="form-control" style="width: 40%;" name="satgas_pemeliharaan_waktu_penilaian" value="<?= $get_pemeliharaan_satgas['waktu_penilaian'] ?>"></th>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Periode Penilaian</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="satgas_pemeliharaan_periode_penilaian" value="<?= $get_pemeliharaan_satgas['periode_penilaian'] ?>"></th>
                        </tr>
                        <tr>
                            <td style=" width: 20%;">Nama Penilai</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="satgas_pemeliharaan_nama_penilai" value="<?= $get_pemeliharaan_satgas['nama_penilai'] ?>"></th>
                        </tr>
                        <tr>
                            <td style=" width: 20%;">Jabatan</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="satgas_pemeliharaan_jabatan" value="<?= $get_pemeliharaan_satgas['jabatan'] ?>"></th>
                        </tr>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <table class="table table-bordered mt-5">
                            <thead class="text-center" style="vertical-align:middle">
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th colspan="4">Penilaian Kinerja Selama Masa pemeliharaan</th>
                                </tr>
                                <tr>
                                    <th>Aspek Penilaian</th>
                                    <th>Nilai*</th>
                                    <th>Nilai Angka*</th>
                                    <th>Penjelasan*</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Kualitas Pekerjaan</td>
                                    <td><input name="satgas_pemeliharaan_nilai1" type="text" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pemeliharaan_satgas['nilai1'] ?>"></td>
                                    <td><input name="satgas_pemeliharaan_nilai_angka1" type="text" class="form-control" onkeyup="hitung_satgas_pemeliharaan()" value="<?= $get_pemeliharaan_satgas['nilai_angka1'] ?>"></td>
                                    <td><textarea name="satgas_pemeliharaan_penjelasan1" id="" class="form-control" value=""><?= $get_pemeliharaan_satgas['penjelasan1'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Kemudahan Komunikasi / Koordinasi</td>
                                    <td><input name="satgas_pemeliharaan_nilai2" type="text" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pemeliharaan_satgas['nilai2'] ?>"></td>
                                    <td><input name="satgas_pemeliharaan_nilai_angka2" type="text" class="form-control" onkeyup="hitung_satgas_pemeliharaan()" value="<?= $get_pemeliharaan_satgas['nilai_angka2'] ?>"></td>
                                    <td><textarea name="satgas_pemeliharaan_penjelasan2" id="" class="form-control" value=""><?= $get_pemeliharaan_satgas['penjelasan2'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Metode Pelaksanaan Pemeliharaan</td>
                                    <td><input name="satgas_pemeliharaan_nilai3" type="text" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pemeliharaan_satgas['nilai3'] ?>"></td>
                                    <td><input name="satgas_pemeliharaan_nilai_angka3" type="text" class="form-control" onkeyup="hitung_satgas_pemeliharaan()" value="<?= $get_pemeliharaan_satgas['nilai_angka3'] ?>"></td>
                                    <td><textarea name="satgas_pemeliharaan_penjelasan3" id="" class="form-control" value=""><?= $get_pemeliharaan_satgas['penjelasan3'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Ketepatan Waktu Penyelesaian Pekerjaan</td>
                                    <td><input name="satgas_pemeliharaan_nilai4" type="text" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pemeliharaan_satgas['nilai4'] ?>"></td>
                                    <td><input name="satgas_pemeliharaan_nilai_angka4" type="text" class="form-control" onkeyup="hitung_satgas_pemeliharaan()" value="<?= $get_pemeliharaan_satgas['nilai_angka4'] ?>"></td>
                                    <td><textarea name="satgas_pemeliharaan_penjelasan4" id="" class="form-control" value=""><?= $get_pemeliharaan_satgas['penjelasan4'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Dokumen Administrasi Kontrak</td>
                                    <td><input name="satgas_pemeliharaan_nilai5" type="text" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pemeliharaan_satgas['nilai5'] ?>"></td>
                                    <td><input name="satgas_pemeliharaan_nilai_angka5" type="text" class="form-control" onkeyup="hitung_satgas_pemeliharaan()" value="<?= $get_pemeliharaan_satgas['nilai_angka5'] ?>"></td>
                                    <td><textarea name="satgas_pemeliharaan_penjelasan5" id="" class="form-control" value=""><?= $get_pemeliharaan_satgas['penjelasan5'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Pemenuhan Perysaratan K3</td>
                                    <td><input name="satgas_pemeliharaan_nilai6" type="text" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pemeliharaan_satgas['nilai6'] ?>"></td>
                                    <td><input name="satgas_pemeliharaan_nilai_angka6" type="text" class="form-control" onkeyup="hitung_satgas_pemeliharaan()" value="<?= $get_pemeliharaan_satgas['nilai_angka6'] ?>"></td>
                                    <td><textarea name="satgas_pemeliharaan_penjelasan6" id="" class="form-control" value=""><?= $get_pemeliharaan_satgas['penjelasan6'] ?></textarea></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" class="text-center">Nilai Rata - Rata</td>
                                    <td><input type="text" name="satgas_pemeliharaan_hasil" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pemeliharaan_satgas['hasil_huruf'] ?>"></td>
                                    <td><input type="text" name="satgas_pemeliharaan_hasil_angka" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pemeliharaan_satgas['hasil'] ?>"></td>
                                    <td>
                                        <?php if ($get_pemeliharaan_satgas['hasil'] >= 80) { ?>
                                            <div class="d-flex">
                                                <i class="fa fa-star text-warning" id="star_satgas_pemeliharaan1" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_satgas_pemeliharaan2" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_satgas_pemeliharaan3" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_satgas_pemeliharaan4" style="display:block"></i>
                                            </div>
                                        <?php } else if ($get_pemeliharaan_satgas['hasil'] >= 60) { ?>
                                            <div class="d-flex">
                                                <i class="fa fa-star text-warning" id="star_satgas_pemeliharaan1" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_satgas_pemeliharaan2" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_satgas_pemeliharaan3" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_satgas_pemeliharaan4" style="display:none"></i>
                                            </div>
                                        <?php } else if ($get_pemeliharaan_satgas['hasil'] >= 60) { ?>
                                            <div class="d-flex">
                                                <i class="fa fa-star text-warning" id="star_satgas_pemeliharaan1" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_satgas_pemeliharaan2" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_satgas_pemeliharaan3" style="display:none"></i>
                                                <i class="fa fa-star text-warning" id="star_satgas_pemeliharaan4" style="display:none"></i>
                                            </div>
                                        <?php } else { ?>
                                            <div class="d-flex">
                                                <i class="fa fa-star text-warning" id="star_satgas_pemeliharaan1" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_satgas_pemeliharaan2" style="display:none"></i>
                                                <i class="fa fa-star text-warning" id="star_satgas_pemeliharaan3" style="display:none"></i>
                                                <i class="fa fa-star text-warning" id="star_satgas_pemeliharaan4" style="display:none"></i>
                                            </div>
                                        <?php }  ?>


                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="float-end">
                            <button type="button" class="btn btn-primary float-end" onclick="open_form('pemeliharaan_satgas')" id="btn_pemeliharaan_satgas_edit" style="display: none;"> Edit</button>
                            <button type="submit" class="btn btn-primary float-end" style="margin-right: 10px;" id="btn_pemeliharaan_satgas_save"> Simpan</button>
                            <a href="<?= base_url('administrator/penilaian_kinerja/print_pemeliharaan_satgas/' . $get_pemeliharaan_satgas['id_penilaian_vendor']) ?>" class="btn btn-primary" style="margin-right: 10px;" target="_blank"><i class="fa fa-print"></i> Print</a>
                        </div>
                    </div>
                    <div class="col-md-5 mt-5">
                        <div class="card">
                            <div class="card-header bg-primary text-white"> Keterangan :</div>
                            <div class="card-body">
                                <ol>
                                    <li>Kolom bertanda * merupakan kolom yang wajib diisi(Mandatory) </li>
                                    <li><b>Kolom Penjelasan</b> diisi sesuai dengan penilaian dari Pengguna Barang/Jasa</li>
                                    <li>Kolom Nilai dan Nilai Angka diisi berdasarkan ketentuan dibawah ini : </li>
                                    <li>Jika Sudah Selesai Tekan Tombol Simpan Diatas ini</li>
                                </ol>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Kategori</td>
                                    <td>Koridor Nilai</td>
                                    <td>Nilai</td>
                                    <td>Nilai Angka</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">SANGAT BAIK</td>
                                    <td rowspan="2">90-100</td>
                                    <td>A+</td>
                                    <td>95</td>
                                </tr>
                                <tr>
                                    <td>A</td>
                                    <td>90</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">BAIK</td>
                                    <td rowspan="2">80-89</td>
                                    <td>B+</td>
                                    <td>85</td>
                                </tr>
                                <tr>
                                    <td>B</td>
                                    <td>80</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">CUKUP</td>
                                    <td rowspan="2">60-79</td>
                                    <td>C+</td>
                                    <td>70</td>
                                </tr>
                                <tr>
                                    <td>C</td>
                                    <td>60</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">KURANG</td>
                                    <td rowspan="2">
                                        < 60</td> <td>D+
                                    </td>
                                    <td>50</td>
                                </tr>
                                <tr>
                                    <td>D</td>
                                    <td>40</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="tab-pane fade" id="penilaian_6" role="tabpanel" aria-labelledby="penilaian_6-tab">
    <form action="javascript:;" id="form_pemeliharaan_manager">
        <input type="hidden" name="id_vendor" value="<?= $row_mengikuti_paket['id_vendor'] ?>">
        <input type="hidden" name="id_rup" value="<?= $row_rup['id_rup'] ?>">
        <div class="card">
            <div class="card-header bg-info text-white">Penilaian Kinerja Penyedia Barang/Jasa</div>
            <div class="card-body" style="margin: 15px;">
                <div class="row">
                    <center>
                        <h4>Penilaian Kinerja Penyedia Barang/Jasa</h4>
                    </center>
                    <table>
                        <tr>
                            <td style="width: 20%;">Nama Pekerjaan</td>
                            <th> : <?= $row_rup['nama_rup'] ?></th>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Nama Perusahaan</td>
                            <th> : <?= $row_mengikuti_paket['nama_usaha'] ?></th>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Unit Kerja / Section</td>
                            <th> : <?= $row_rup['nama_departemen'] ?></th>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Nomor Kontrak</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="manager_pemeliharaan_nomor_kontrak" value="<?= $get_pemeliharaan_manager['nomor_kontrak'] ?>"></th>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Periode Kontrak</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="manager_pemeliharaan_periode_kontrak" value="<?= $get_pemeliharaan_manager['periode_kontrak'] ?>"></th>
                        </tr>
                        <tr>
                            <td style=" width: 20%;">Waktu Penilaian</td>
                            <th> <input type="date" class="form-control" style="width: 40%;" name="manager_pemeliharaan_waktu_penilaian" value="<?= $get_pemeliharaan_manager['waktu_penilaian'] ?>"></th>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Periode Penilaian</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="manager_pemeliharaan_periode_penilaian" value="<?= $get_pemeliharaan_manager['periode_penilaian'] ?>"></th>
                        </tr>
                        <tr>
                            <td style=" width: 20%;">Nama Penilai</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="manager_pemeliharaan_nama_penilai" value="<?= $get_pemeliharaan_manager['nama_penilai'] ?>"></th>
                        </tr>
                        <tr>
                            <td style=" width: 20%;">Jabatan</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="manager_pemeliharaan_jabatan" value="<?= $get_pemeliharaan_manager['jabatan'] ?>"></th>
                        </tr>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <table class="table table-bordered mt-5">
                            <thead class="text-center" style="vertical-align:middle">
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th colspan="4">Penilaian Kinerja Selama Masa pemeliharaan</th>
                                </tr>
                                <tr>
                                    <th>Aspek Penilaian</th>
                                    <th>Nilai*</th>
                                    <th>Nilai Angka*</th>
                                    <th>Penjelasan*</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Kualitas Pekerjaan</td>
                                    <td><input name="manager_pemeliharaan_nilai1" type="text" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pemeliharaan_manager['nilai1'] ?>"></td>
                                    <td><input name="manager_pemeliharaan_nilai_angka1" type="text" class="form-control" onkeyup="hitung_manager_pemeliharaan()" value="<?= $get_pemeliharaan_manager['nilai_angka1'] ?>"></td>
                                    <td><textarea name="manager_pemeliharaan_penjelasan1" id="" class="form-control" value=""><?= $get_pemeliharaan_manager['penjelasan1'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Kemudahan Komunikasi / Koordinasi</td>
                                    <td><input name="manager_pemeliharaan_nilai2" type="text" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pemeliharaan_manager['nilai2'] ?>"></td>
                                    <td><input name="manager_pemeliharaan_nilai_angka2" type="text" class="form-control" onkeyup="hitung_manager_pemeliharaan()" value="<?= $get_pemeliharaan_manager['nilai_angka2'] ?>"></td>
                                    <td><textarea name="manager_pemeliharaan_penjelasan2" id="" class="form-control" value=""><?= $get_pemeliharaan_manager['penjelasan2'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Metode Pelaksanaan Pemeliharaan</td>
                                    <td><input name="manager_pemeliharaan_nilai3" type="text" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pemeliharaan_manager['nilai3'] ?>"></td>
                                    <td><input name="manager_pemeliharaan_nilai_angka3" type="text" class="form-control" onkeyup="hitung_manager_pemeliharaan()" value="<?= $get_pemeliharaan_manager['nilai_angka3'] ?>"></td>
                                    <td><textarea name="manager_pemeliharaan_penjelasan3" id="" class="form-control" value=""><?= $get_pemeliharaan_manager['penjelasan3'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Ketepatan Waktu Penyelesaian Pekerjaan</td>
                                    <td><input name="manager_pemeliharaan_nilai4" type="text" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pemeliharaan_manager['nilai4'] ?>"></td>
                                    <td><input name="manager_pemeliharaan_nilai_angka4" type="text" class="form-control" onkeyup="hitung_manager_pemeliharaan()" value="<?= $get_pemeliharaan_manager['nilai_angka4'] ?>"></td>
                                    <td><textarea name="manager_pemeliharaan_penjelasan4" id="" class="form-control" value=""><?= $get_pemeliharaan_manager['penjelasan4'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Dokumen Administrasi Kontrak</td>
                                    <td><input name="manager_pemeliharaan_nilai5" type="text" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pemeliharaan_manager['nilai5'] ?>"></td>
                                    <td><input name="manager_pemeliharaan_nilai_angka5" type="text" class="form-control" onkeyup="hitung_manager_pemeliharaan()" value="<?= $get_pemeliharaan_manager['nilai_angka5'] ?>"></td>
                                    <td><textarea name="manager_pemeliharaan_penjelasan5" id="" class="form-control" value=""><?= $get_pemeliharaan_manager['penjelasan5'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Pemenuhan Perysaratan K3</td>
                                    <td><input name="manager_pemeliharaan_nilai6" type="text" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pemeliharaan_manager['nilai6'] ?>"></td>
                                    <td><input name="manager_pemeliharaan_nilai_angka6" type="text" class="form-control" onkeyup="hitung_manager_pemeliharaan()" value="<?= $get_pemeliharaan_manager['nilai_angka6'] ?>"></td>
                                    <td><textarea name="manager_pemeliharaan_penjelasan6" id="" class="form-control" value=""><?= $get_pemeliharaan_manager['penjelasan6'] ?></textarea></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" class="text-center">Nilai Rata - Rata</td>
                                    <td><input type="text" name="manager_pemeliharaan_hasil" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pemeliharaan_manager['hasil_huruf'] ?>"></td>
                                    <td><input type="text" name="manager_pemeliharaan_hasil_angka" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pemeliharaan_manager['hasil'] ?>"></td>
                                    <td>
                                        <?php if ($get_pemeliharaan_manager['hasil'] >= 80) { ?>
                                            <div class="d-flex">
                                                <i class="fa fa-star text-warning" id="star_manager_pemeliharaan1" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_manager_pemeliharaan2" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_manager_pemeliharaan3" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_manager_pemeliharaan4" style="display:block"></i>
                                            </div>
                                        <?php } else if ($get_pemeliharaan_manager['hasil'] >= 60) { ?>
                                            <div class="d-flex">
                                                <i class="fa fa-star text-warning" id="star_manager_pemeliharaan1" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_manager_pemeliharaan2" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_manager_pemeliharaan3" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_manager_pemeliharaan4" style="display:none"></i>
                                            </div>
                                        <?php } else if ($get_pemeliharaan_manager['hasil'] >= 60) { ?>
                                            <div class="d-flex">
                                                <i class="fa fa-star text-warning" id="star_manager_pemeliharaan1" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_manager_pemeliharaan2" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_manager_pemeliharaan3" style="display:none"></i>
                                                <i class="fa fa-star text-warning" id="star_manager_pemeliharaan4" style="display:none"></i>
                                            </div>
                                        <?php } else { ?>
                                            <div class="d-flex">
                                                <i class="fa fa-star text-warning" id="star_manager_pemeliharaan1" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_manager_pemeliharaan2" style="display:none"></i>
                                                <i class="fa fa-star text-warning" id="star_manager_pemeliharaan3" style="display:none"></i>
                                                <i class="fa fa-star text-warning" id="star_manager_pemeliharaan4" style="display:none"></i>
                                            </div>
                                        <?php }  ?>


                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="float-end">
                            <button type="button" class="btn btn-primary float-end" onclick="open_form('pemeliharaan_manager')" id="btn_pemeliharaan_satgas_edit" style="display: none;"> Edit</button>
                            <button type="submit" class="btn btn-primary float-end" style="margin-right: 10px;" id="btn_pemeliharaan_satgas_save"> Simpan</button>
                            <a href="<?= base_url('administrator/penilaian_kinerja/print_pemeliharaan_manager/' . $get_pelaksanaan_manager['id_penilaian_vendor']) ?>" class="btn btn-primary" style="margin-right: 10px;" target="_blank"><i class="fa fa-print"></i> Print</a>
                        </div>
                    </div>
                    <div class="col-md-5 mt-5">
                        <div class="card">
                            <div class="card-header bg-primary text-white"> Keterangan :</div>
                            <div class="card-body">
                                <ol>
                                    <li>Kolom bertanda * merupakan kolom yang wajib diisi(Mandatory) </li>
                                    <li><b>Kolom Penjelasan</b> diisi sesuai dengan penilaian dari Pengguna Barang/Jasa</li>
                                    <li>Kolom Nilai dan Nilai Angka diisi berdasarkan ketentuan dibawah ini : </li>
                                    <li>Jika Sudah Selesai Tekan Tombol Simpan Diatas ini</li>
                                </ol>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Kategori</td>
                                    <td>Koridor Nilai</td>
                                    <td>Nilai</td>
                                    <td>Nilai Angka</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">SANGAT BAIK</td>
                                    <td rowspan="2">90-100</td>
                                    <td>A+</td>
                                    <td>95</td>
                                </tr>
                                <tr>
                                    <td>A</td>
                                    <td>90</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">BAIK</td>
                                    <td rowspan="2">80-89</td>
                                    <td>B+</td>
                                    <td>85</td>
                                </tr>
                                <tr>
                                    <td>B</td>
                                    <td>80</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">CUKUP</td>
                                    <td rowspan="2">60-79</td>
                                    <td>C+</td>
                                    <td>70</td>
                                </tr>
                                <tr>
                                    <td>C</td>
                                    <td>60</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">KURANG</td>
                                    <td rowspan="2">
                                        < 60</td> <td>D+
                                    </td>
                                    <td>50</td>
                                </tr>
                                <tr>
                                    <td>D</td>
                                    <td>40</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="tab-pane fade" id="penilaian_7" role="tabpanel" aria-labelledby="penilaian_6-tab">
    <form action="javascript:;" id="form_pemeliharaan_depthead">
        <input type="hidden" name="id_vendor" value="<?= $row_mengikuti_paket['id_vendor'] ?>">
        <input type="hidden" name="id_rup" value="<?= $row_rup['id_rup'] ?>">
        <div class="card">
            <div class="card-header bg-info text-white">Penilaian Kinerja Penyedia Barang/Jasa</div>
            <div class="card-body" style="margin: 15px;">
                <div class="row">
                    <center>
                        <h4>Penilaian Kinerja Penyedia Barang/Jasa</h4>
                    </center>
                    <table>
                        <tr>
                            <td style="width: 20%;">Nama Pekerjaan</td>
                            <th> : <?= $row_rup['nama_rup'] ?></th>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Nama Perusahaan</td>
                            <th> : <?= $row_mengikuti_paket['nama_usaha'] ?></th>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Unit Kerja / Section</td>
                            <th> : <?= $row_rup['nama_departemen'] ?></th>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Nomor Kontrak</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="depthead_pemeliharaan_nomor_kontrak" value="<?= $get_pemeliharaan_depthead['nomor_kontrak'] ?>"></th>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Periode Kontrak</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="depthead_pemeliharaan_periode_kontrak" value="<?= $get_pemeliharaan_depthead['periode_kontrak'] ?>"></th>
                        </tr>
                        <tr>
                            <td style=" width: 20%;">Waktu Penilaian</td>
                            <th> <input type="date" class="form-control" style="width: 40%;" name="depthead_pemeliharaan_waktu_penilaian" value="<?= $get_pemeliharaan_depthead['waktu_penilaian'] ?>"></th>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Periode Penilaian</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="depthead_pemeliharaan_periode_penilaian" value="<?= $get_pemeliharaan_depthead['periode_penilaian'] ?>"></th>
                        </tr>
                        <tr>
                            <td style=" width: 20%;">Nama Penilai</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="depthead_pemeliharaan_nama_penilai" value="<?= $get_pemeliharaan_depthead['nama_penilai'] ?>"></th>
                        </tr>
                        <tr>
                            <td style=" width: 20%;">Jabatan</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="depthead_pemeliharaan_jabatan" value="<?= $get_pemeliharaan_depthead['jabatan'] ?>"></th>
                        </tr>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <table class="table table-bordered mt-5">
                            <thead class="text-center" style="vertical-align:middle">
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th colspan="4">Penilaian Kinerja Selama Masa pemeliharaan</th>
                                </tr>
                                <tr>
                                    <th>Aspek Penilaian</th>
                                    <th>Nilai*</th>
                                    <th>Nilai Angka*</th>
                                    <th>Penjelasan*</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Kualitas Pekerjaan</td>
                                    <td><input name="depthead_pemeliharaan_nilai1" type="text" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pemeliharaan_depthead['nilai1'] ?>"></td>
                                    <td><input name="depthead_pemeliharaan_nilai_angka1" type="text" class="form-control" onkeyup="hitung_depthead_pemeliharaan()" value="<?= $get_pemeliharaan_depthead['nilai_angka1'] ?>"></td>
                                    <td><textarea name="depthead_pemeliharaan_penjelasan1" id="" class="form-control" value=""><?= $get_pemeliharaan_depthead['penjelasan1'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Kemudahan Komunikasi / Koordinasi</td>
                                    <td><input name="depthead_pemeliharaan_nilai2" type="text" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pemeliharaan_depthead['nilai2'] ?>"></td>
                                    <td><input name="depthead_pemeliharaan_nilai_angka2" type="text" class="form-control" onkeyup="hitung_depthead_pemeliharaan()" value="<?= $get_pemeliharaan_depthead['nilai_angka2'] ?>"></td>
                                    <td><textarea name="depthead_pemeliharaan_penjelasan2" id="" class="form-control" value=""><?= $get_pemeliharaan_depthead['penjelasan2'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Metode Pelaksanaan Pemeliharaan</td>
                                    <td><input name="depthead_pemeliharaan_nilai3" type="text" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pemeliharaan_depthead['nilai3'] ?>"></td>
                                    <td><input name="depthead_pemeliharaan_nilai_angka3" type="text" class="form-control" onkeyup="hitung_depthead_pemeliharaan()" value="<?= $get_pemeliharaan_depthead['nilai_angka3'] ?>"></td>
                                    <td><textarea name="depthead_pemeliharaan_penjelasan3" id="" class="form-control" value=""><?= $get_pemeliharaan_depthead['penjelasan3'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Ketepatan Waktu Penyelesaian Pekerjaan</td>
                                    <td><input name="depthead_pemeliharaan_nilai4" type="text" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pemeliharaan_depthead['nilai4'] ?>"></td>
                                    <td><input name="depthead_pemeliharaan_nilai_angka4" type="text" class="form-control" onkeyup="hitung_depthead_pemeliharaan()" value="<?= $get_pemeliharaan_depthead['nilai_angka4'] ?>"></td>
                                    <td><textarea name="depthead_pemeliharaan_penjelasan4" id="" class="form-control" value=""><?= $get_pemeliharaan_depthead['penjelasan4'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Dokumen Administrasi Kontrak</td>
                                    <td><input name="depthead_pemeliharaan_nilai5" type="text" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pemeliharaan_depthead['nilai5'] ?>"></td>
                                    <td><input name="depthead_pemeliharaan_nilai_angka5" type="text" class="form-control" onkeyup="hitung_depthead_pemeliharaan()" value="<?= $get_pemeliharaan_depthead['nilai_angka5'] ?>"></td>
                                    <td><textarea name="depthead_pemeliharaan_penjelasan5" id="" class="form-control" value=""><?= $get_pemeliharaan_depthead['penjelasan5'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Pemenuhan Perysaratan K3</td>
                                    <td><input name="depthead_pemeliharaan_nilai6" type="text" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pemeliharaan_depthead['nilai6'] ?>"></td>
                                    <td><input name="depthead_pemeliharaan_nilai_angka6" type="text" class="form-control" onkeyup="hitung_depthead_pemeliharaan()" value="<?= $get_pemeliharaan_depthead['nilai_angka6'] ?>"></td>
                                    <td><textarea name="depthead_pemeliharaan_penjelasan6" id="" class="form-control" value=""><?= $get_pemeliharaan_depthead['penjelasan6'] ?></textarea></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" class="text-center">Nilai Rata - Rata</td>
                                    <td><input type="text" name="depthead_pemeliharaan_hasil" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pemeliharaan_depthead['hasil_huruf'] ?>"></td>
                                    <td><input type="text" name="depthead_pemeliharaan_hasil_angka" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pemeliharaan_depthead['hasil'] ?>"></td>
                                    <td>
                                        <?php if ($get_pemeliharaan_depthead['hasil'] >= 80) { ?>
                                            <div class="d-flex">
                                                <i class="fa fa-star text-warning" id="star_depthead_pemeliharaan1" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_depthead_pemeliharaan2" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_depthead_pemeliharaan3" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_depthead_pemeliharaan4" style="display:block"></i>
                                            </div>
                                        <?php } else if ($get_pemeliharaan_depthead['hasil'] >= 60) { ?>
                                            <div class="d-flex">
                                                <i class="fa fa-star text-warning" id="star_depthead_pemeliharaan1" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_depthead_pemeliharaan2" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_depthead_pemeliharaan3" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_depthead_pemeliharaan4" style="display:none"></i>
                                            </div>
                                        <?php } else if ($get_pemeliharaan_depthead['hasil'] >= 60) { ?>
                                            <div class="d-flex">
                                                <i class="fa fa-star text-warning" id="star_depthead_pemeliharaan1" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_depthead_pemeliharaan2" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_depthead_pemeliharaan3" style="display:none"></i>
                                                <i class="fa fa-star text-warning" id="star_depthead_pemeliharaan4" style="display:none"></i>
                                            </div>
                                        <?php } else { ?>
                                            <div class="d-flex">
                                                <i class="fa fa-star text-warning" id="star_depthead_pemeliharaan1" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_depthead_pemeliharaan2" style="display:none"></i>
                                                <i class="fa fa-star text-warning" id="star_depthead_pemeliharaan3" style="display:none"></i>
                                                <i class="fa fa-star text-warning" id="star_depthead_pemeliharaan4" style="display:none"></i>
                                            </div>
                                        <?php }  ?>


                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="float-end">
                            <button type="button" class="btn btn-primary float-end" onclick="open_form('pemeliharaan_depthead')" id="btn_pemeliharaan_depthead_edit" style="display: none;"> Edit</button>
                            <button type="submit" class="btn btn-primary float-end" style="margin-right: 10px;" id="btn_pemeliharaan_depthead_save"> Simpan</button>
                            <a href="<?= base_url('administrator/penilaian_kinerja/print_pemeliharaan_depthead/' . $get_pelaksanaan_depthead['id_penilaian_vendor']) ?>" class="btn btn-primary" style="margin-right: 10px;" target="_blank"><i class="fa fa-print"></i> Print</a>
                        </div>
                    </div>
                    <div class="col-md-5 mt-5">
                        <div class="card">
                            <div class="card-header bg-primary text-white"> Keterangan :</div>
                            <div class="card-body">
                                <ol>
                                    <li>Kolom bertanda * merupakan kolom yang wajib diisi(Mandatory) </li>
                                    <li><b>Kolom Penjelasan</b> diisi sesuai dengan penilaian dari Pengguna Barang/Jasa</li>
                                    <li>Kolom Nilai dan Nilai Angka diisi berdasarkan ketentuan dibawah ini : </li>
                                    <li>Jika Sudah Selesai Tekan Tombol Simpan Diatas ini</li>
                                </ol>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Kategori</td>
                                    <td>Koridor Nilai</td>
                                    <td>Nilai</td>
                                    <td>Nilai Angka</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">SANGAT BAIK</td>
                                    <td rowspan="2">90-100</td>
                                    <td>A+</td>
                                    <td>95</td>
                                </tr>
                                <tr>
                                    <td>A</td>
                                    <td>90</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">BAIK</td>
                                    <td rowspan="2">80-89</td>
                                    <td>B+</td>
                                    <td>85</td>
                                </tr>
                                <tr>
                                    <td>B</td>
                                    <td>80</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">CUKUP</td>
                                    <td rowspan="2">60-79</td>
                                    <td>C+</td>
                                    <td>70</td>
                                </tr>
                                <tr>
                                    <td>C</td>
                                    <td>60</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">KURANG</td>
                                    <td rowspan="2">
                                        < 60</td> <td>D+
                                    </td>
                                    <td>50</td>
                                </tr>
                                <tr>
                                    <td>D</td>
                                    <td>40</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="tab-pane fade" id="penilaian_8" role="tabpanel" aria-labelledby="penilaian_6-tab">
    <form action="javascript:;" id="form_pemeliharaan_total">
        <input type="hidden" name="id_vendor" value="<?= $row_mengikuti_paket['id_vendor'] ?>">
        <input type="hidden" name="id_rup" value="<?= $row_rup['id_rup'] ?>">
        <div class="card">
            <div class="card-header bg-info text-white">Penilaian Kinerja Penyedia Barang/Jasa</div>
            <div class="card-body" style="margin: 15px;">
                <div class="row">
                    <center>
                        <h4>Penilaian Kinerja Penyedia Barang/Jasa</h4>
                    </center>
                    <table>
                        <tr>
                            <td style="width: 20%;">Nama Pekerjaan</td>
                            <th> : <?= $row_rup['nama_rup'] ?></th>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Nama Perusahaan</td>
                            <th> : <?= $row_mengikuti_paket['nama_usaha'] ?></th>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Unit Kerja / Section</td>
                            <th> : <?= $row_rup['nama_departemen'] ?></th>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Nomor Kontrak</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="total_pemeliharaan_nomor_kontrak" value="<?= $get_pemeliharaan_total['nomor_kontrak'] ?>"></th>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Periode Kontrak</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="total_pemeliharaan_periode_kontrak" value="<?= $get_pemeliharaan_total['periode_kontrak'] ?>"></th>
                        </tr>
                        <tr>
                            <td style=" width: 20%;">Waktu Penilaian</td>
                            <th> <input type="date" class="form-control" style="width: 40%;" name="total_pemeliharaan_waktu_penilaian" value="<?= $get_pemeliharaan_total['waktu_penilaian'] ?>"></th>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Periode Penilaian</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="total_pemeliharaan_periode_penilaian" value="<?= $get_pemeliharaan_total['periode_penilaian'] ?>"></th>
                        </tr>
                        <tr>
                            <td style=" width: 20%;">Nama Penilai</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="total_pemeliharaan_nama_penilai" value="<?= $get_pemeliharaan_total['nama_penilai'] ?>"></th>
                        </tr>
                        <tr>
                            <td style=" width: 20%;">Jabatan</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="total_pemeliharaan_jabatan" value="<?= $get_pemeliharaan_total['jabatan'] ?>"></th>
                        </tr>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <br>
                        <table class="table table-bordered">
                            <thead class="text-center" style="vertical-align: middle;">
                                <tr>
                                    <th rowspan="3">No</th>
                                    <th rowspan="3">Aspek Penilaian</th>
                                    <th rowspan="2">Bobot</th>
                                    <th colspan="5">Penilaian Kinerja Selama Masa pemeliharaan</th>
                                </tr>
                                <tr>
                                    <th>Kepala Satgas <br> (Pengendali <br> Pekerjaan)</th>
                                    <th>Manager <br> (Unit Kerja Pemilik <br> Program )</th>
                                    <th>Dept. Head (Unit Kerja Pemilik <br> Program )</th>
                                    <th>Nilai <br> Rata-Rata</th>
                                    <th>Nilai Rata-Rata <br> Terbobot</th>
                                </tr>
                                <tr>
                                    <th>(a)</th>
                                    <th>(b)</th>
                                    <th>(c)</th>
                                    <th>(d)</th>
                                    <th>(e)</th>
                                    <th>(f) = (a) x (e)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>Kualitas Pekerjaan</td>
                                    <td class="text-center">35%</td>
                                    <td class="text-center" id="pemeliharaan_satgas_nilai_angka1"></td>
                                    <td class="text-center" id="pemeliharaan_manager_nilai_angka1"></td>
                                    <td class="text-center" id="pemeliharaan_depthead_nilai_angka1"></td>
                                    <td class="text-center" id="pemeliharaan_total1"></td>
                                    <td class="text-center" id="pemeliharaan_bobot1"></td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td>Kemudahan Komunikasi / Koordinasi</td>
                                    <td class="text-center">15%</td>
                                    <td class="text-center" id="pemeliharaan_satgas_nilai_angka2"></td>
                                    <td class="text-center" id="pemeliharaan_manager_nilai_angka2"></td>
                                    <td class="text-center" id="pemeliharaan_depthead_nilai_angka2"></td>
                                    <td class="text-center" id="pemeliharaan_total2"></td>
                                    <td class="text-center" id="pemeliharaan_bobot2"></td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td>Metode Pelaksanaan Pemeliharaan</td>
                                    <td class="text-center">20%</td>
                                    <td class="text-center" id="pemeliharaan_satgas_nilai_angka3"></td>
                                    <td class="text-center" id="pemeliharaan_manager_nilai_angka3"></td>
                                    <td class="text-center" id="pemeliharaan_depthead_nilai_angka3"></td>
                                    <td class="text-center" id="pemeliharaan_total3"></td>
                                    <td class="text-center" id="pemeliharaan_bobot3"></td>
                                </tr>
                                <tr>
                                    <td class="text-center">4</td>
                                    <td>Ketepatan Waktu Penyelesaian Komplain</td>
                                    <td class="text-center">10%</td>
                                    <td class="text-center" id="pemeliharaan_satgas_nilai_angka4"></td>
                                    <td class="text-center" id="pemeliharaan_manager_nilai_angka4"></td>
                                    <td class="text-center" id="pemeliharaan_depthead_nilai_angka4"></td>
                                    <td class="text-center" id="pemeliharaan_total4"></td>
                                    <td class="text-center" id="pemeliharaan_bobot4"></td>
                                </tr>
                                <tr>
                                    <td class="text-center">5</td>
                                    <td>Dokumen Administrasi Kontrak</td>
                                    <td class="text-center">15%</td>
                                    <td class="text-center" id="pemeliharaan_satgas_nilai_angka5"></td>
                                    <td class="text-center" id="pemeliharaan_manager_nilai_angka5"></td>
                                    <td class="text-center" id="pemeliharaan_depthead_nilai_angka5"></td>
                                    <td class="text-center" id="pemeliharaan_total5"></td>
                                    <td class="text-center" id="pemeliharaan_bobot5"></td>
                                </tr>
                                <tr>
                                    <td class="text-center">6</td>
                                    <td>Pemenuhan Perysaratan K3</td>
                                    <td class="text-center">5%</td>
                                    <td class="text-center" id="pemeliharaan_satgas_nilai_angka6"></td>
                                    <td class="text-center" id="pemeliharaan_manager_nilai_angka6"></td>
                                    <td class="text-center" id="pemeliharaan_depthead_nilai_angka6"></td>
                                    <td class="text-center" id="pemeliharaan_total6"></td>
                                    <td class="text-center" id="pemeliharaan_bobot6"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Total</td>
                                    <td>100%</td>
                                    <td colspan="4" style="background:#e9e9e9"></td>
                                    <td class="text-center" id="pemeliharaan_hasil_akhir_angka"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Predikat Kinerja Penyedia Barang/Jasa</td>
                                    <td style="background:#e9e9e9"></td>
                                    <td colspan="4" style="background:#e9e9e9"></td>
                                    <td class="text-center" id="pemeliharaan_hasil_akhir"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="6" class="text-center">Rating Penilaian</td>
                                    <td>
                                        <div class="d-flex">
                                            <div style="display: none;" id="star_pemeliharaan1">
                                                <i class="fa fa-star text-warning"></i>
                                                <i class="fa fa-star text-warning"></i>
                                                <i class="fa fa-star text-warning"></i>
                                                <i class="fa fa-star text-warning"></i>
                                            </div>

                                        </div>
                                        <div class="d-flex">
                                            <div style="display: none;" id="star_pemeliharaan2">
                                                <i class="fa fa-star text-warning"></i>
                                                <i class="fa fa-star text-warning"></i>
                                                <i class="fa fa-star text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div style="display: none;" id="star_pemeliharaan3">
                                                <i class="fa fa-star text-warning"></i>
                                                <i class="fa fa-star text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div style="display: none;" id="star_pemeliharaan4">
                                                <i class="fa fa-star text-warning"></i>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="float-end">
                            <button type="submit" class="btn btn-primary float-end"> Simpan</button>
                            <a href="<?= base_url('administrator/penilaian_kinerja/print_pemeliharaan_total/' . $get_pemeliharaan_total['id_pemeliharaan_total']) ?>" class="btn btn-primary" style="margin-right: 10px;" target="_blank"><i class="fa fa-print"></i> Print</a>
                        </div>
                    </div>
                    <div class="col-md-5 mt-5">
                        <div class="card">
                            <div class="card-header bg-primary text-white"> </div>
                            <div class="card-body">
                                <table class="table table-bordered text-center" style="vertical-align: middle;">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">Kategori Predikat <br> Penyedia Jasa</th>
                                            <th colspan="2">Koridor Nilai</th>
                                        </tr>
                                        <tr>
                                            <th>Minimal </th>
                                            <th>Maksimal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Sangat Baik</td>
                                            <td>90 </td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <td>Baik</td>
                                            <td>80 </td>
                                            <td>89,99</td>
                                        </tr>
                                        <tr>
                                            <td>Cukup</td>
                                            <td>60 </td>
                                            <td>79,99</td>
                                        </tr>
                                        <tr>
                                            <td>Kurang</td>
                                            <td>0 </td>
                                            <td>59,99</td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>