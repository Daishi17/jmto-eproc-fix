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

<body style="font-size: 17px;">
    <div class="container">
        <img class="pull-right" alt="LOGO" src="<?= base_url() ?>assets/logo_ba/logo_ba.png" width="30%" />
        <center>
            <b>
                <h5>PENILAIAN KINERJA PENYEDIA BARANG/JASA</h5>
                <br>
            </b>
        </center>
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

        <div class="row" style="font-size:text-small">
            <div class="col-md-12">
                <table class="table table-bordered mt-3">
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
                            <td class="text-center"><?= $get_pemeliharaan_satgas['nilai_angka1'] ?></td>
                            <td class="text-center"><?= $get_pemeliharaan_manager['nilai_angka1'] ?></td>
                            <td class="text-center"><?= $get_pemeliharaan_depthead['nilai_angka1'] ?></td>
                            <td class="text-center"><?= $get_penilaian['nilai_rata_rata1'] ?></td>
                            <td class="text-center"><?= $get_penilaian['nilai_terbobot1'] ?></td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>Kemudahan Komunikasi / Koordinasi</td>
                            <td class="text-center">15%</td>
                            <td class="text-center"><?= $get_pemeliharaan_satgas['nilai_angka2'] ?></td>
                            <td class="text-center"><?= $get_pemeliharaan_manager['nilai_angka2'] ?></td>
                            <td class="text-center"><?= $get_pemeliharaan_depthead['nilai_angka2'] ?></td>
                            <td class="text-center"><?= $get_penilaian['nilai_rata_rata2'] ?></td>
                            <td class="text-center"><?= $get_penilaian['nilai_terbobot2'] ?></td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>Metode Pelaksanaan Pemeliharaan</td>
                            <td class="text-center">20%</td>
                            <td class="text-center"><?= $get_pemeliharaan_satgas['nilai_angka3'] ?></td>
                            <td class="text-center"><?= $get_pemeliharaan_manager['nilai_angka3'] ?></td>
                            <td class="text-center"><?= $get_pemeliharaan_depthead['nilai_angka3'] ?></td>
                            <td class="text-center"><?= $get_penilaian['nilai_rata_rata3'] ?></td>
                            <td class="text-center"><?= $get_penilaian['nilai_terbobot3'] ?></td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td>Ketepatan Waktu Penyelesaian Komplain</td>
                            <td class="text-center">10%</td>
                            <td class="text-center"><?= $get_pemeliharaan_satgas['nilai_angka4'] ?></td>
                            <td class="text-center"><?= $get_pemeliharaan_manager['nilai_angka4'] ?></td>
                            <td class="text-center"><?= $get_pemeliharaan_depthead['nilai_angka4'] ?></td>
                            <td class="text-center"><?= $get_penilaian['nilai_rata_rata4'] ?></td>
                            <td class="text-center"><?= $get_penilaian['nilai_terbobot4'] ?></td>
                        </tr>
                        <tr>
                            <td class="text-center">5</td>
                            <td>Dokumen Administrasi Kontrak</td>
                            <td class="text-center">10%</td>
                            <td class="text-center"><?= $get_pemeliharaan_satgas['nilai_angka5'] ?></td>
                            <td class="text-center"><?= $get_pemeliharaan_manager['nilai_angka5'] ?></td>
                            <td class="text-center"><?= $get_pemeliharaan_depthead['nilai_angka5'] ?></td>
                            <td class="text-center"><?= $get_penilaian['nilai_rata_rata5'] ?></td>
                            <td class="text-center"><?= $get_penilaian['nilai_terbobot5'] ?></td>
                        </tr>
                        <tr>
                            <td class="text-center">6</td>
                            <td>Pemenuhan Perysaratan K3</td>
                            <td class="text-center">10%</td>
                            <td class="text-center"><?= $get_pemeliharaan_satgas['nilai_angka6'] ?></td>
                            <td class="text-center"><?= $get_pemeliharaan_manager['nilai_angka6'] ?></td>
                            <td class="text-center"><?= $get_pemeliharaan_depthead['nilai_angka6'] ?></td>
                            <td class="text-center"><?= $get_penilaian['nilai_rata_rata6'] ?></td>
                            <td class="text-center"><?= $get_penilaian['nilai_terbobot6'] ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Total</td>
                            <td>100%</td>
                            <td colspan="4" style="background:#e9e9e9"></td>
                            <td class="text-center"><?= $get_penilaian['hasil_akhir'] ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Predikat Kinerja Penyedia Barang/Jasa</td>
                            <td style="background:#e9e9e9"></td>
                            <td colspan="4" style="background:#e9e9e9"></td>
                            <td class="text-center"><?= $get_penilaian['hasil_predikat'] ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="6" class="text-center">Rating Penilaian</td>
                            <td>
                                <?php if ($get_penilaian['hasil_akhir'] >= 80) { ?>
                                    <div class="d-flex">
                                        <i class="fa fa-star text-warning" style="display:block"></i>
                                        <i class="fa fa-star text-warning" style="display:block"></i>
                                        <i class="fa fa-star text-warning" style="display:block"></i>
                                        <i class="fa fa-star text-warning" style="display:block"></i>
                                    </div>

                                <?php } else if ($get_penilaian['hasil_akhir'] >= 60) {  ?>
                                    <div class="d-flex">
                                        <i class="fa fa-star text-warning" style="display:block"></i>
                                        <i class="fa fa-star text-warning" style="display:block"></i>
                                        <i class="fa fa-star text-warning" style="display:block"></i>
                                    </div>

                                <?php } else if ($get_penilaian['hasil_akhir'] >= 40) {  ?>
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

            </div>
            <!-- <div class="col-md-5 mt-5">
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
            </div> -->

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