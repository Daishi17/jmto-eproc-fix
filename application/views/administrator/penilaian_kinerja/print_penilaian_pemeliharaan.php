<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hasil Penilaian
    </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="print.css" type="text/css" media="print" />
    <link rel="Shortcut Icon" href="https://eproc.jmtm.co.id/assets/img/unnamed.png" type="image/x-icon" sizes="96x96" />
    <link rel="stylesheet" href="https://eproc.jmtm.co.id/assets/boostrapnew/dist/css/bootstrap.min.css" type="text/css" media="all" />
    <!-- dataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://eproc.jmtm.co.id/assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css" media="all">

    <!-- select2 -->
    <link rel="stylesheet" href="https://eproc.jmtm.co.id/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="https://eproc.jmtm.co.id/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css" media="all">
    <!-- custom -->
    <!-- Sweetalert-->
    <link href="https://eproc.jmtm.co.id/assets/sweetalert2/sweetalert2.min.css" rel="stylesheet" media="all">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css"> -->
    <link href="https://eproc.jmtm.co.id/assets/datetimepicekernew/plugins/jquery.datetimepicker.min.css" rel="stylesheet" media="all">
    <script src="https://eproc.jmtm.co.id/assets/js/sweetalert.min.js" media="all"></script>

    <script type="text/javascript" src="https://eproc.jmtm.co.id/assets/boostrapnew/dist/js/jquery.min.js" media="all"></script>

</head>

<?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
} ?>
<?php
function bln_indo($bulan)
{
    if ($bulan == '01') {
        echo 'Januari';
    } else if ($bulan == '02') {
        echo 'Februari';
    } else if ($bulan == '03') {
        echo 'Maret';
    } else if ($bulan == '04') {
        echo 'April';
    } else if ($bulan == '05') {
        echo 'Mei';
    } else if ($bulan == '06') {
        echo 'Juni';
    } else if ($bulan == '07') {
        echo 'Juli';
    } else if ($bulan == '08') {
        echo 'Agustus';
    } else if ($bulan == '09') {
        echo 'September';
    } else if ($bulan == '11') {
        echo 'November';
    } else if ($bulan == '12') {
        echo 'Desember';
    }
}

function penyebut($nilai)
{
    $nilai = abs($nilai);
    $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " " . $huruf[$nilai];
    } else if ($nilai < 20) {
        $temp = penyebut($nilai - 10) . " Belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai / 10) . " Puluh" . penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai / 100) . " Ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " Seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai / 1000) . " Ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai / 1000000) . " Juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai / 1000000000) . " Milyar" . penyebut(fmod($nilai, 1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai / 1000000000000) . " Trilyun" . penyebut(fmod($nilai, 1000000000000));
    }
    return $temp;
}

function terbilang($nilai)
{
    if ($nilai < 0) {
        $hasil = "minus " . trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }
    return $hasil;
}
?>

<body style="font-size: 18px;">
    <div class="container">
        <img class="pull-right" alt="LOGO" src="<?= base_url() ?>assets/logo_ba/logo_ba.png" width="30%" />
        <center>
            <b>
                <h5>PENILAIAN KINERJA PENYEDIA BARANG/JASA</h5>
            </b>
        </center>
        <br>
        <table>
            <thead>
                <tr>
                    <td style="width: 50%;">Nama Pekerjaan</td>
                    <th> : <?= $get_penilaian['nama_rup'] ?></th>
                </tr>
                <tr>
                    <td style="width: 50%;">Nama Perusahaan</td>
                    <th> : <?= $get_penilaian['nama_usaha'] ?></th>
                </tr>
                <tr>
                    <td style="width: 50%;">Unit Kerja / Section</td>
                    <th> : <?= $get_penilaian['nama_departemen'] ?></th>
                </tr>
                <tr>
                    <td style="width: 50%;">Nomor Kontrak</td>
                    <th> : <?= $get_penilaian['nomor_kontrak'] ?></th>
                </tr>
                <tr>
                    <td style="width: 50%;">Periode Kontrak</td>
                    <th> : <?= $get_penilaian['periode_kontrak'] ?></th>
                </tr>
                <tr>
                    <td style=" width: 20%;">Waktu Penilaian</td>
                    <th> : <?= tgl_indo($get_penilaian['waktu_penilaian']) ?></th>
                </tr>
                <tr>
                    <td style="width: 50%;">Periode Penilaian</td>
                    <th> : <?= $get_penilaian['periode_penilaian'] ?></th>
                </tr>
                <tr>
                    <td style="width: 50%;">Nama Penilai</td>
                    <th> : <?= $get_penilaian['nama_penilai'] ?></th>
                </tr>
                <tr>
                    <td style="width: 50%;">Jabatan</td>
                    <th> : <?= $get_penilaian['jabatan'] ?></th>
                </tr>
            </thead>

        </table>

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
                            <td class="text-center"><?= $get_penilaian['nilai1'] ?></td>
                            <td class="text-center"><?= $get_penilaian['nilai_angka1'] ?></td>
                            <td class="text-center"><?= $get_penilaian['penjelasan1'] ?></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Kemudahan Komunikasi / Koordinasi</td>
                            <td class="text-center"><?= $get_penilaian['nilai2'] ?></td>
                            <td class="text-center"><?= $get_penilaian['nilai_angka2'] ?></td>
                            <td class="text-center"><?= $get_penilaian['penjelasan2'] ?></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Metode Pelaksanaan Pemeliharaan</td>
                            <td class="text-center"><?= $get_penilaian['nilai3'] ?></td>
                            <td class="text-center"><?= $get_penilaian['nilai_angka3'] ?></td>
                            <td class="text-center"><?= $get_penilaian['penjelasan3'] ?></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Ketepatan Waktu Penyelesaian Pekerjaan</td>
                            <td class="text-center"><?= $get_penilaian['nilai4'] ?></td>
                            <td class="text-center"><?= $get_penilaian['nilai_angka4'] ?></td>
                            <td class="text-center"><?= $get_penilaian['penjelasan4'] ?></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Dokumen Administrasi Kontrak</td>
                            <td class="text-center"><?= $get_penilaian['nilai5'] ?></td>
                            <td class="text-center"><?= $get_penilaian['nilai_angka5'] ?></td>
                            <td class="text-center"><?= $get_penilaian['penjelasan5'] ?></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Pemenuhan Perysaratan K3</td>
                            <td class="text-center"><?= $get_penilaian['nilai6'] ?></td>
                            <td class="text-center"><?= $get_penilaian['nilai_angka6'] ?></td>
                            <td class="text-center"><?= $get_penilaian['penjelasan6'] ?></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" class="text-center">Nilai Rata - Rata</td>
                            <td class="text-center"><?= $get_penilaian['hasil_huruf'] ?></td>
                            <td class="text-center"><?= $get_penilaian['hasil'] ?></td>
                            <td>
                                <?php if ($get_penilaian['hasil'] >= 80) { ?>
                                    <div class="d-flex">
                                        <i class="fa fa-star text-warning" id="star_satgas_pelaksanaan1" style="display:block"></i>
                                        <i class="fa fa-star text-warning" id="star_satgas_pelaksanaan2" style="display:block"></i>
                                        <i class="fa fa-star text-warning" id="star_satgas_pelaksanaan3" style="display:block"></i>
                                        <i class="fa fa-star text-warning" id="star_satgas_pelaksanaan4" style="display:block"></i>
                                    </div>
                                <?php } else if ($get_penilaian['hasil'] >= 60) { ?>
                                    <div class="d-flex">
                                        <i class="fa fa-star text-warning" id="star_satgas_pelaksanaan1" style="display:block"></i>
                                        <i class="fa fa-star text-warning" id="star_satgas_pelaksanaan2" style="display:block"></i>
                                        <i class="fa fa-star text-warning" id="star_satgas_pelaksanaan3" style="display:block"></i>
                                        <i class="fa fa-star text-warning" id="star_satgas_pelaksanaan4" style="display:none"></i>
                                    </div>
                                <?php } else if ($get_penilaian['hasil'] >= 60) { ?>
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

            </div>
            <div class="col-md-5">
                <br>
                <br>
                Keterangan :
                <br>

                <ol>
                    <li>Kolom bertanda * merupakan kolom yang wajib diisi(Mandatory) </li>
                    <li><b>Kolom Penjelasan</b> diisi sesuai dengan penilaian dari Pengguna Barang/Jasa</li>
                    <li>Kolom Nilai dan Nilai Angka diisi berdasarkan ketentuan dibawah ini : </li>
                    <li>Jika Sudah Selesai Tekan Tombol Simpan Diatas ini</li>
                </ol>
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

        <br>
        <div class="row float-right">
            <center>
                <b>
                    <label>Dinilai Oleh : </label>
                    <br>
                    <label>PT. Jasamarga Tollroad Operator </label>
                    <br>
                    <br>
                    <br>
                    <u> <?= $get_penilaian['nama_penilai'] ?></u>
                    <br>
                    <label for=""> <?= $get_penilaian['jabatan'] ?></label>
                </b>
            </center>
        </div>




    </div>


    <!-- Jquery -->
    <!-- Bootstrap -->
    <script type="text/javascript" src="https://eproc.jmtm.co.id/assets/boostrapnew/dist/js/bootstrap.min.js" media="all"></script>
    <!-- dataTables -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" media="all"></script>
    <!-- select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" media="all"></script>

    <!-- custom js -->
    <script type="text/javascript" src="https://eproc.jmtm.co.id/assets/kintek.js" media="all"></script>

    <!-- datepicker -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js" integrity="sha512-ZrigzIl5MysuwHc2LaGI+uOLnLDdyYUth+pA5OuJC++WEleiYrztIc7nU/iBRWeP+ufmSGepuJULdgh/K0rIAA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <script media="all" type="text/javascript" src="https://eproc.jmtm.co.id/assets/datetimepicekernew/plugins/jquery.datetimepicker.full.min.js"></script>


</body>

</html>
<script>
    window.print();
</script>