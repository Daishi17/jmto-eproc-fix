<div class="tab-pane fade show active" id="penilaian_1" role="tabpanel" aria-labelledby="home-tab">

    <form action="javascript:;" id="form_pelaksanaan_satgas">
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
                            <th> <input type="text" class="form-control" style="width: 40%;" name="satgas_pelaksanaan_nomor_kontrak" value="<?= $get_pelaksanaan_satgas['nomor_kontrak'] ?>"></th>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Periode Kontrak</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="satgas_pelaksanaan_periode_kontrak" value="<?= $get_pelaksanaan_satgas['periode_kontrak'] ?>"></th>
                        </tr>
                        <tr>
                            <td style=" width: 20%;">Waktu Penilaian</td>
                            <th> <input type="date" class="form-control" style="width: 40%;" name="satgas_pelaksanaan_waktu_penilaian" value="<?= $get_pelaksanaan_satgas['waktu_penilaian'] ?>"></th>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Periode Penilaian</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="satgas_pelaksanaan_periode_penilaian" value="<?= $get_pelaksanaan_satgas['periode_penilaian'] ?>"></th>
                        </tr>
                        <tr>
                            <td style=" width: 20%;">Nama Penilai</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="satgas_pelaksanaan_nama_penilai" value="<?= $get_pelaksanaan_satgas['nama_penilai'] ?>"></th>
                        </tr>
                        <tr>
                            <td style=" width: 20%;">Jabatan</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="satgas_pelaksanaan_jabatan" value="<?= $get_pelaksanaan_satgas['jabatan'] ?>"></th>
                        </tr>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <table class="table table-bordered mt-5">
                            <thead class="text-center" style="vertical-align:middle">
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th colspan="4">Penilaian Kinerja Selama Masa Pelaksanaan</th>
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
                                    <td><input name="satgas_pelaksanaan_nilai1" type="text" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pelaksanaan_satgas['nilai1'] ?>"></td>
                                    <td><input name="satgas_pelaksanaan_nilai_angka1" type="text" class="form-control" onkeyup="hitung_satgas_pelaksanaan()" value="<?= $get_pelaksanaan_satgas['nilai_angka1'] ?>"></td>
                                    <td><textarea name="satgas_pelaksanaan_penjelasan1" id="" class="form-control" value=""><?= $get_pelaksanaan_satgas['penjelasan1'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Kemudahan Komunikasi / Koordinasi</td>
                                    <td><input name="satgas_pelaksanaan_nilai2" type="text" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pelaksanaan_satgas['nilai2'] ?>"></td>
                                    <td><input name="satgas_pelaksanaan_nilai_angka2" type="text" class="form-control" onkeyup="hitung_satgas_pelaksanaan()" value="<?= $get_pelaksanaan_satgas['nilai_angka2'] ?>"></td>
                                    <td><textarea name="satgas_pelaksanaan_penjelasan2" id="" class="form-control" value=""><?= $get_pelaksanaan_satgas['penjelasan2'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Ketepatan Waktu Penyelesaian Pekerjaan</td>
                                    <td><input name="satgas_pelaksanaan_nilai3" type="text" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pelaksanaan_satgas['nilai3'] ?>"></td>
                                    <td><input name="satgas_pelaksanaan_nilai_angka3" type="text" class="form-control" onkeyup="hitung_satgas_pelaksanaan()" value="<?= $get_pelaksanaan_satgas['nilai_angka3'] ?>"></td>
                                    <td><textarea name="satgas_pelaksanaan_penjelasan3" id="" class="form-control" value=""><?= $get_pelaksanaan_satgas['penjelasan3'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Dokumen Administrasi Kontrak</td>
                                    <td><input name="satgas_pelaksanaan_nilai4" type="text" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pelaksanaan_satgas['nilai4'] ?>"></td>
                                    <td><input name="satgas_pelaksanaan_nilai_angka4" type="text" class="form-control" onkeyup="hitung_satgas_pelaksanaan()" value="<?= $get_pelaksanaan_satgas['nilai_angka4'] ?>"></td>
                                    <td><textarea name="satgas_pelaksanaan_penjelasan4" id="" class="form-control" value=""><?= $get_pelaksanaan_satgas['penjelasan4'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Pemenuhan Perysaratan K3</td>
                                    <td><input name="satgas_pelaksanaan_nilai5" type="text" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pelaksanaan_satgas['nilai5'] ?>"></td>
                                    <td><input name="satgas_pelaksanaan_nilai_angka5" type="text" class="form-control" onkeyup="hitung_satgas_pelaksanaan()" value="<?= $get_pelaksanaan_satgas['nilai_angka5'] ?>"></td>
                                    <td><textarea name="satgas_pelaksanaan_penjelasan5" id="" class="form-control" value=""><?= $get_pelaksanaan_satgas['penjelasan5'] ?></textarea></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" class="text-center">Nilai Rata - Rata</td>
                                    <td><input type="text" name="satgas_pelaksanaan_hasil" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pelaksanaan_satgas['hasil_huruf'] ?>"></td>
                                    <td><input type="text" name="satgas_pelaksanaan_hasil_angka" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pelaksanaan_satgas['hasil'] ?>"></td>
                                    <td>
                                        <?php if ($get_pelaksanaan_satgas['hasil'] >= 80) { ?>
                                            <div class="d-flex">
                                                <i class="fa fa-star text-warning" id="star_satgas_pelaksanaan1" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_satgas_pelaksanaan2" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_satgas_pelaksanaan3" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_satgas_pelaksanaan4" style="display:block"></i>
                                            </div>
                                        <?php } else if ($get_pelaksanaan_satgas['hasil'] >= 60) { ?>
                                            <div class="d-flex">
                                                <i class="fa fa-star text-warning" id="star_satgas_pelaksanaan1" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_satgas_pelaksanaan2" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_satgas_pelaksanaan3" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_satgas_pelaksanaan4" style="display:none"></i>
                                            </div>
                                        <?php } else if ($get_pelaksanaan_satgas['hasil'] >= 60) { ?>
                                            <div class="d-flex">
                                                <i class="fa fa-star text-warning" id="star_satgas_pelaksanaan1" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_satgas_pelaksanaan2" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_satgas_pelaksanaan3" style="display:none"></i>
                                                <i class="fa fa-star text-warning" id="star_satgas_pelaksanaan4" style="display:none"></i>
                                            </div>
                                        <?php } else { ?>
                                            <div class="d-flex">
                                                <i class="fa fa-star text-warning" id="star_satgas_pelaksanaan1" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_satgas_pelaksanaan2" style="display:none"></i>
                                                <i class="fa fa-star text-warning" id="star_satgas_pelaksanaan3" style="display:none"></i>
                                                <i class="fa fa-star text-warning" id="star_satgas_pelaksanaan4" style="display:none"></i>
                                            </div>
                                        <?php }  ?>


                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="float-end">
                            <button type="submit" class="btn btn-primary float-end"> Simpan</button>
                            <a href="<?= base_url('administrator/penilaian_kinerja/print_pelaksanaan_satgas/' . $get_pelaksanaan_satgas['id_penilaian_vendor']) ?>" class="btn btn-primary" style="margin-right: 10px;" target="_blank"><i class="fa fa-print"></i> Print</a>
                        </div>

                    </div>
                    <div class="col-md-5">
                        <br>
                        <br>
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

<div class="tab-pane fade" id="penilaian_2" role="tabpanel" aria-labelledby="penilaian_2-tab">
    <form action="javascript:;" id="form_pelaksanaan_manager">
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
                            <th> <input type="text" class="form-control" style="width: 40%;" name="manager_pelaksanaan_nomor_kontrak" value="<?= $get_pelaksanaan_manager['nomor_kontrak'] ?>"></th>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Periode Kontrak</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="manager_pelaksanaan_periode_kontrak" value="<?= $get_pelaksanaan_manager['periode_kontrak'] ?>"></th>
                        </tr>
                        <tr>
                            <td style=" width: 20%;">Waktu Penilaian</td>
                            <th> <input type="date" class="form-control" style="width: 40%;" name="manager_pelaksanaan_waktu_penilaian" value="<?= $get_pelaksanaan_manager['waktu_penilaian'] ?>"></th>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Periode Penilaian</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="manager_pelaksanaan_periode_penilaian" value="<?= $get_pelaksanaan_manager['periode_penilaian'] ?>"></th>
                        </tr>
                        <tr>
                            <td style=" width: 20%;">Nama Penilai</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="manager_pelaksanaan_nama_penilai" value="<?= $get_pelaksanaan_manager['nama_penilai'] ?>"></th>
                        </tr>
                        <tr>
                            <td style=" width: 20%;">Jabatan</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="manager_pelaksanaan_jabatan" value="<?= $get_pelaksanaan_manager['jabatan'] ?>"></th>
                        </tr>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <table class="table table-bordered mt-5">
                            <thead class="text-center" style="vertical-align:middle">
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th colspan="4">Penilaian Kinerja Selama Masa Pelaksanaan</th>
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
                                    <td><input name="manager_pelaksanaan_nilai1" type="text" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pelaksanaan_manager['nilai1'] ?>"></td>
                                    <td><input name="manager_pelaksanaan_nilai_angka1" type="text" class="form-control" onkeyup="hitung_manager_pelaksanaan()" value="<?= $get_pelaksanaan_manager['nilai_angka1'] ?>"></td>
                                    <td><textarea name="manager_pelaksanaan_penjelasan1" id="" class="form-control" value=""><?= $get_pelaksanaan_manager['penjelasan1'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Kemudahan Komunikasi / Koordinasi</td>
                                    <td><input name="manager_pelaksanaan_nilai2" type="text" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pelaksanaan_manager['nilai2'] ?>"></td>
                                    <td><input name="manager_pelaksanaan_nilai_angka2" type="text" class="form-control" onkeyup="hitung_manager_pelaksanaan()" value="<?= $get_pelaksanaan_manager['nilai_angka2'] ?>"></td>
                                    <td><textarea name="manager_pelaksanaan_penjelasan2" id="" class="form-control" value=""><?= $get_pelaksanaan_manager['penjelasan2'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Ketepatan Waktu Penyelesaian Pekerjaan</td>
                                    <td><input name="manager_pelaksanaan_nilai3" type="text" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pelaksanaan_manager['nilai3'] ?>"></td>
                                    <td><input name="manager_pelaksanaan_nilai_angka3" type="text" class="form-control" onkeyup="hitung_manager_pelaksanaan()" value="<?= $get_pelaksanaan_manager['nilai_angka3'] ?>"></td>
                                    <td><textarea name="manager_pelaksanaan_penjelasan3" id="" class="form-control" value=""><?= $get_pelaksanaan_manager['penjelasan3'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Dokumen Administrasi Kontrak</td>
                                    <td><input name="manager_pelaksanaan_nilai4" type="text" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pelaksanaan_manager['nilai4'] ?>"></td>
                                    <td><input name="manager_pelaksanaan_nilai_angka4" type="text" class="form-control" onkeyup="hitung_manager_pelaksanaan()" value="<?= $get_pelaksanaan_manager['nilai_angka4'] ?>"></td>
                                    <td><textarea name="manager_pelaksanaan_penjelasan4" id="" class="form-control" value=""><?= $get_pelaksanaan_manager['penjelasan4'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Pemenuhan Perysaratan K3</td>
                                    <td><input name="manager_pelaksanaan_nilai5" type="text" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pelaksanaan_manager['nilai5'] ?>"></td>
                                    <td><input name="manager_pelaksanaan_nilai_angka5" type="text" class="form-control" onkeyup="hitung_manager_pelaksanaan()" value="<?= $get_pelaksanaan_manager['nilai_angka5'] ?>"></td>
                                    <td><textarea name="manager_pelaksanaan_penjelasan5" id="" class="form-control" value=""><?= $get_pelaksanaan_manager['penjelasan5'] ?></textarea></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" class="text-center">Nilai Rata - Rata</td>
                                    <td><input type="text" name="manager_pelaksanaan_hasil" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pelaksanaan_manager['hasil_huruf'] ?>"></td>
                                    <td><input type="text" name="manager_pelaksanaan_hasil_angka" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pelaksanaan_manager['hasil'] ?>"></td>
                                    <td>
                                        <?php if ($get_pelaksanaan_manager['hasil'] >= 80) { ?>
                                            <div class="d-flex">
                                                <i class="fa fa-star text-warning" id="star_manager_pelaksanaan1" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_manager_pelaksanaan2" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_manager_pelaksanaan3" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_manager_pelaksanaan4" style="display:block"></i>
                                            </div>
                                        <?php } else if ($get_pelaksanaan_manager['hasil'] >= 60) { ?>
                                            <div class="d-flex">
                                                <i class="fa fa-star text-warning" id="star_manager_pelaksanaan1" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_manager_pelaksanaan2" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_manager_pelaksanaan3" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_manager_pelaksanaan4" style="display:none"></i>
                                            </div>
                                        <?php } else if ($get_pelaksanaan_manager['hasil'] >= 60) { ?>
                                            <div class="d-flex">
                                                <i class="fa fa-star text-warning" id="star_manager_pelaksanaan1" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_manager_pelaksanaan2" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_manager_pelaksanaan3" style="display:none"></i>
                                                <i class="fa fa-star text-warning" id="star_manager_pelaksanaan4" style="display:none"></i>
                                            </div>
                                        <?php } else { ?>
                                            <div class="d-flex">
                                                <i class="fa fa-star text-warning" id="star_manager_pelaksanaan1" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_manager_pelaksanaan2" style="display:none"></i>
                                                <i class="fa fa-star text-warning" id="star_manager_pelaksanaan3" style="display:none"></i>
                                                <i class="fa fa-star text-warning" id="star_manager_pelaksanaan4" style="display:none"></i>
                                            </div>
                                        <?php }  ?>


                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="float-end">
                            <button type="submit" class="btn btn-primary float-end"> Simpan</button>
                            <a href="<?= base_url('administrator/penilaian_kinerja/print_pelaksanaan_manager/' . $get_pelaksanaan_manager['id_penilaian_vendor']) ?>" class="btn btn-primary" style="margin-right: 10px;" target="_blank"><i class="fa fa-print"></i> Print</a>
                        </div>

                    </div>
                    <div class="col-md-5">
                        <br>
                        <br>
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

<div class="tab-pane fade" id="penilaian_3" role="tabpanel" aria-labelledby="penilaian_3-tab">
    <form action="javascript:;" id="form_pelaksanaan_depthead">
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
                            <th> <input type="text" class="form-control" style="width: 40%;" name="depthead_pelaksanaan_nomor_kontrak" value="<?= $get_pelaksanaan_depthead['nomor_kontrak'] ?>"></th>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Periode Kontrak</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="depthead_pelaksanaan_periode_kontrak" value="<?= $get_pelaksanaan_depthead['periode_kontrak'] ?>"></th>
                        </tr>
                        <tr>
                            <td style=" width: 20%;">Waktu Penilaian</td>
                            <th> <input type="date" class="form-control" style="width: 40%;" name="depthead_pelaksanaan_waktu_penilaian" value="<?= $get_pelaksanaan_depthead['waktu_penilaian'] ?>"></th>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Periode Penilaian</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="depthead_pelaksanaan_periode_penilaian" value="<?= $get_pelaksanaan_depthead['periode_penilaian'] ?>"></th>
                        </tr>
                        <tr>
                            <td style=" width: 20%;">Nama Penilai</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="depthead_pelaksanaan_nama_penilai" value="<?= $get_pelaksanaan_depthead['nama_penilai'] ?>"></th>
                        </tr>
                        <tr>
                            <td style=" width: 20%;">Jabatan</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="depthead_pelaksanaan_jabatan" value="<?= $get_pelaksanaan_depthead['jabatan'] ?>"></th>
                        </tr>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <table class="table table-bordered mt-5">
                            <thead class="text-center" style="vertical-align:middle">
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th colspan="4">Penilaian Kinerja Selama Masa Pelaksanaan</th>
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
                                    <td><input name="depthead_pelaksanaan_nilai1" type="text" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pelaksanaan_depthead['nilai1'] ?>"></td>
                                    <td><input name="depthead_pelaksanaan_nilai_angka1" type="text" class="form-control" onkeyup="hitung_depthead_pelaksanaan()" value="<?= $get_pelaksanaan_depthead['nilai_angka1'] ?>"></td>
                                    <td><textarea name="depthead_pelaksanaan_penjelasan1" id="" class="form-control" value=""><?= $get_pelaksanaan_depthead['penjelasan1'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Kemudahan Komunikasi / Koordinasi</td>
                                    <td><input name="depthead_pelaksanaan_nilai2" type="text" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pelaksanaan_depthead['nilai2'] ?>"></td>
                                    <td><input name="depthead_pelaksanaan_nilai_angka2" type="text" class="form-control" onkeyup="hitung_depthead_pelaksanaan()" value="<?= $get_pelaksanaan_depthead['nilai_angka2'] ?>"></td>
                                    <td><textarea name="depthead_pelaksanaan_penjelasan2" id="" class="form-control" value=""><?= $get_pelaksanaan_depthead['penjelasan2'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Ketepatan Waktu Penyelesaian Pekerjaan</td>
                                    <td><input name="depthead_pelaksanaan_nilai3" type="text" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pelaksanaan_depthead['nilai3'] ?>"></td>
                                    <td><input name="depthead_pelaksanaan_nilai_angka3" type="text" class="form-control" onkeyup="hitung_depthead_pelaksanaan()" value="<?= $get_pelaksanaan_depthead['nilai_angka3'] ?>"></td>
                                    <td><textarea name="depthead_pelaksanaan_penjelasan3" id="" class="form-control" value=""><?= $get_pelaksanaan_depthead['penjelasan3'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Dokumen Administrasi Kontrak</td>
                                    <td><input name="depthead_pelaksanaan_nilai4" type="text" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pelaksanaan_depthead['nilai4'] ?>"></td>
                                    <td><input name="depthead_pelaksanaan_nilai_angka4" type="text" class="form-control" onkeyup="hitung_depthead_pelaksanaan()" value="<?= $get_pelaksanaan_depthead['nilai_angka4'] ?>"></td>
                                    <td><textarea name="depthead_pelaksanaan_penjelasan4" id="" class="form-control" value=""><?= $get_pelaksanaan_depthead['penjelasan4'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Pemenuhan Perysaratan K3</td>
                                    <td><input name="depthead_pelaksanaan_nilai5" type="text" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pelaksanaan_depthead['nilai5'] ?>"></td>
                                    <td><input name="depthead_pelaksanaan_nilai_angka5" type="text" class="form-control" onkeyup="hitung_depthead_pelaksanaan()" value="<?= $get_pelaksanaan_depthead['nilai_angka5'] ?>"></td>
                                    <td><textarea name="depthead_pelaksanaan_penjelasan5" id="" class="form-control" value=""><?= $get_pelaksanaan_depthead['penjelasan5'] ?></textarea></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" class="text-center">Nilai Rata - Rata</td>
                                    <td><input type="text" name="depthead_pelaksanaan_hasil" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pelaksanaan_depthead['hasil_huruf'] ?>"></td>
                                    <td><input type="text" name="depthead_pelaksanaan_hasil_angka" class="form-control" readonly style="background:#e9e9e9" value="<?= $get_pelaksanaan_depthead['hasil'] ?>"></td>
                                    <td>
                                        <?php if ($get_pelaksanaan_depthead['hasil'] >= 80) { ?>
                                            <div class="d-flex">
                                                <i class="fa fa-star text-warning" id="star_depthead_pelaksanaan1" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_depthead_pelaksanaan2" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_depthead_pelaksanaan3" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_depthead_pelaksanaan4" style="display:block"></i>
                                            </div>
                                        <?php } else if ($get_pelaksanaan_depthead['hasil'] >= 60) { ?>
                                            <div class="d-flex">
                                                <i class="fa fa-star text-warning" id="star_depthead_pelaksanaan1" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_depthead_pelaksanaan2" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_depthead_pelaksanaan3" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_depthead_pelaksanaan4" style="display:none"></i>
                                            </div>
                                        <?php } else if ($get_pelaksanaan_depthead['hasil'] >= 60) { ?>
                                            <div class="d-flex">
                                                <i class="fa fa-star text-warning" id="star_depthead_pelaksanaan1" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_depthead_pelaksanaan2" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_depthead_pelaksanaan3" style="display:none"></i>
                                                <i class="fa fa-star text-warning" id="star_depthead_pelaksanaan4" style="display:none"></i>
                                            </div>
                                        <?php } else { ?>
                                            <div class="d-flex">
                                                <i class="fa fa-star text-warning" id="star_depthead_pelaksanaan1" style="display:block"></i>
                                                <i class="fa fa-star text-warning" id="star_depthead_pelaksanaan2" style="display:none"></i>
                                                <i class="fa fa-star text-warning" id="star_depthead_pelaksanaan3" style="display:none"></i>
                                                <i class="fa fa-star text-warning" id="star_depthead_pelaksanaan4" style="display:none"></i>
                                            </div>
                                        <?php }  ?>


                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="float-end">
                            <button type="submit" class="btn btn-primary float-end"> Simpan</button>
                            <a href="<?= base_url('administrator/penilaian_kinerja/print_pelaksanaan_depthead/' . $get_pelaksanaan_depthead['id_penilaian_vendor']) ?>" class="btn btn-primary" style="margin-right: 10px;" target="_blank"><i class="fa fa-print"></i> Print</a>
                        </div>

                    </div>
                    <div class="col-md-5">
                        <br>
                        <br>
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

<div class="tab-pane fade" id="penilaian_4" role="tabpanel" aria-labelledby="penilaian_4-tab">
    <form action="javascript:;" id="form_pelaksanaan_total">
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
                            <th> <input type="text" class="form-control" style="width: 40%;" name="total_pelaksanaan_nomor_kontrak" value="<?= $get_pelaksanaan_total['nomor_kontrak'] ?>"></th>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Periode Kontrak</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="total_pelaksanaan_periode_kontrak" value="<?= $get_pelaksanaan_total['periode_kontrak'] ?>"></th>
                        </tr>
                        <tr>
                            <td style=" width: 20%;">Waktu Penilaian</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="total_pelaksanaan_waktu_penilaian" value="<?= $get_pelaksanaan_total['waktu_penilaian'] ?>"></th>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Periode Penilaian</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="total_pelaksanaan_periode_penilaian" value="<?= $get_pelaksanaan_total['periode_penilaian'] ?>"></th>
                        </tr>
                        <tr>
                            <td style=" width: 20%;">Nama Penilai</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="total_pelaksanaan_nama_penilai" value="<?= $get_pelaksanaan_total['nama_penilai'] ?>"></th>
                        </tr>

                        <tr>
                            <td style=" width: 20%;">Jabatan</td>
                            <th> <input type="text" class="form-control" style="width: 40%;" name="total_pelaksanaan_jabatan" value="<?= $get_pelaksanaan_total['jabatan'] ?>"></th>
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
                                    <th colspan="5">Penilaian Kinerja Selama Masa Pelaksanaan</th>
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
                                    <td class="text-center"><?= $get_pelaksanaan_satgas['nilai_angka1'] ?></td>
                                    <td class="text-center"><?= $get_pelaksanaan_manager['nilai_angka1'] ?></td>
                                    <td class="text-center"><?= $get_pelaksanaan_depthead['nilai_angka1'] ?></td>
                                    <td class="text-center"><?= $get_pelaksanaan_total['nilai_rata_rata1'] ?></td>
                                    <td class="text-center"><?= $get_pelaksanaan_total['nilai_terbobot1'] ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td>Kemudahan Komunikasi / Koordinasi</td>
                                    <td class="text-center">20%</td>
                                    <td class="text-center"><?= $get_pelaksanaan_satgas['nilai_angka2'] ?></td>
                                    <td class="text-center"><?= $get_pelaksanaan_manager['nilai_angka2'] ?></td>
                                    <td class="text-center"><?= $get_pelaksanaan_depthead['nilai_angka2'] ?></td>
                                    <td class="text-center"><?= $get_pelaksanaan_total['nilai_rata_rata2'] ?></td>
                                    <td class="text-center"><?= $get_pelaksanaan_total['nilai_terbobot2'] ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td>Ketepatan Waktu Penyelesaian Pekerjaan</td>
                                    <td class="text-center">25%</td>
                                    <td class="text-center"><?= $get_pelaksanaan_satgas['nilai_angka3'] ?></td>
                                    <td class="text-center"><?= $get_pelaksanaan_manager['nilai_angka3'] ?></td>
                                    <td class="text-center"><?= $get_pelaksanaan_depthead['nilai_angka3'] ?></td>
                                    <td class="text-center"><?= $get_pelaksanaan_total['nilai_rata_rata3'] ?></td>
                                    <td class="text-center"><?= $get_pelaksanaan_total['nilai_terbobot3'] ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">4</td>
                                    <td>Dokumen Administrasi Kontrak</td>
                                    <td class="text-center">10%</td>
                                    <td class="text-center"><?= $get_pelaksanaan_satgas['nilai_angka4'] ?></td>
                                    <td class="text-center"><?= $get_pelaksanaan_manager['nilai_angka4'] ?></td>
                                    <td class="text-center"><?= $get_pelaksanaan_depthead['nilai_angka4'] ?></td>
                                    <td class="text-center"><?= $get_pelaksanaan_total['nilai_rata_rata4'] ?></td>
                                    <td class="text-center"><?= $get_pelaksanaan_total['nilai_terbobot4'] ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">5</td>
                                    <td>Pemenuhan Perysaratan K3</td>
                                    <td class="text-center">10%</td>
                                    <td class="text-center"><?= $get_pelaksanaan_satgas['nilai_angka5'] ?></td>
                                    <td class="text-center"><?= $get_pelaksanaan_manager['nilai_angka5'] ?></td>
                                    <td class="text-center"><?= $get_pelaksanaan_depthead['nilai_angka5'] ?></td>
                                    <td class="text-center"><?= $get_pelaksanaan_total['nilai_rata_rata5'] ?></td>
                                    <td class="text-center"><?= $get_pelaksanaan_total['nilai_terbobot5'] ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Total</td>
                                    <td>100%</td>
                                    <td colspan="4" style="background:#e9e9e9"></td>
                                    <td class="text-center"><?= $get_pelaksanaan_total['hasil_akhir'] ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Predikat Kinerja Penyedia Barang/Jasa</td>
                                    <td style="background:#e9e9e9"></td>
                                    <td colspan="4" style="background:#e9e9e9"></td>
                                    <td class="text-center"><?= $get_pelaksanaan_total['hasil_predikat'] ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="6" class="text-center">Rating Penilaian</td>
                                    <td>
                                        <?php if ($get_pelaksanaan_total['hasil_akhir'] >= 80) { ?>
                                            <div class="d-flex">
                                                <i class="fa fa-star text-warning" style="display:block"></i>
                                                <i class="fa fa-star text-warning" style="display:block"></i>
                                                <i class="fa fa-star text-warning" style="display:block"></i>
                                                <i class="fa fa-star text-warning" style="display:block"></i>
                                            </div>

                                        <?php } else if ($get_pelaksanaan_total['hasil_akhir'] >= 60) {  ?>
                                            <div class="d-flex">
                                                <i class="fa fa-star text-warning" style="display:block"></i>
                                                <i class="fa fa-star text-warning" style="display:block"></i>
                                                <i class="fa fa-star text-warning" style="display:block"></i>
                                            </div>

                                        <?php } else if ($get_pelaksanaan_total['hasil_akhir'] >= 40) {  ?>
                                            <div class="d-flex">
                                                <i class="fa fa-star text-warning" style="display:block"></i>
                                                <i class="fa fa-star text-warning" style="display:block"></i>
                                                <i class="fa fa-star text-warning" style="display:block"></i>
                                            </div>

                                        <?php } else { ?>
                                            <div class="d-flex">
                                                <i class="fa fa-star text-warning" style="display:block"></i>
                                            </div>

                                        <?php } ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="float-end">
                            <button type="submit" class="btn btn-primary float-end"> Simpan</button>
                            <a href="<?= base_url('administrator/penilaian_kinerja/print_pelaksanaan_total/' . $get_pelaksanaan_total['id_pelaksanaan_total']) ?>" class="btn btn-primary" style="margin-right: 10px;" target="_blank"><i class="fa fa-print"></i> Print</a>
                        </div>
                    </div>
                    <div class="col-md-5 mt-5">
                        <br>
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