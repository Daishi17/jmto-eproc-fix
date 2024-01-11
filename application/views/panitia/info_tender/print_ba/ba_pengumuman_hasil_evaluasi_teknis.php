<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pengumuman Hasil Evaluasi Teknis
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
<style>
    /* General styles */

    table,
    figure {
        page-break-inside: avoid;
    }
</style>

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

    return  $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
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
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " " . $huruf[$nilai];
    } else if ($nilai < 20) {
        $temp = penyebut($nilai - 10) . " belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
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

<body style="font-size: 18px; text-align:justify">
    <div class="container">
        <table>
            <thead>
                <tr>
                    <td>
                        <!-- Header -->
                        <div class="float-left">
                            <img src="<?= base_url() ?>assets/logo_ba/logo_ba.png" width="500px" style="margin-left: -90px;" alt="Header" class="headeraing">
                        </div>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="page">
                            <form action="javascript:;" method="POST" id="form_ba_pasca1">
                                <div class="page">
                                    <div class="float-left">
                                        <table>
                                            <tr>
                                                <td width="100px">Nomor</td>
                                                <th>&ensp;&ensp;:&ensp;&ensp;</th>
                                                <td><?= $row_rup['ba_pengumuman_hasil_evaluasi_teknis_no'] ?></td>
                                            </tr>
                                        </table>
                                        <table>
                                            <tr>
                                                <td width="100px">Lampiran</td>
                                                <th>&ensp;&ensp;:&ensp;&ensp;</th>
                                                <td> 1 (satu) Lembar</td>
                                            </tr>
                                        </table>
                                        <table>
                                            <tr>
                                                <td width="100px">Hal</td>
                                                <th>&ensp;&ensp;:&ensp;&ensp;</th>
                                                <td> <b>Pengumuman Hasil Evaluasi Teknis</b></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="float-right">
                                        Jakarta, <?= tgl_indo($row_rup['ba_pengumuman_hasil_evaluasi_teknis_tgl']) ?>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="row mt-3">
                                        <div class="container">
                                            <p>
                                                <b>Kepada Yth.</b>
                                                <br>
                                                <b>Peserta Penawaran <?= $row_rup['nama_metode_pengadaan'] ?></b>
                                                <br>
                                                <b><?= $row_rup['nama_rup'] ?></b>
                                                <br>
                                                Di <br> Tempat
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="container">

                                        </div>
                                    </div>
                                    <p>Sehubungan dengan kegiatan <?= $row_rup['nama_metode_pengadaan'] ?> <?= $row_rup['nama_rup'] ?>, dengan ini kami menyampaikan Hasil Evaluasi Teknis sebagai berikut :</p>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Peserta Penawaran </th>
                                                <th>Nilai Teknis</th>
                                                <th>Penawaran</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($peserta_tender as $key => $value) { ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td><?= $value['nama_usaha'] ?></td>
                                                    <td><?= $value['ev_teknis'] ?></td>
                                                    <td><?= "Rp " . number_format($value['nilai_penawaran'], 2, ',', '.'); ?></td>
                                                    <?php if ($value['ev_teknis'] < 60) { ?>
                                                        <?php if ($value['nilai_penawaran'] == 0) { ?>
                                                            <td> <label for="" class="badge btn-danger text-white">Gugur</label></td>
                                                        <?php } else { ?>
                                                            <td><label for="" class="badge btn-success text-white"> Lulus </label></td>
                                                        <?php }
                                                        ?>
                                                    <?php } else { ?>
                                                        <?php if ($value['nilai_penawaran'] == 0) { ?>
                                                            <td> <label for="" class="badge btn-danger text-white">Gugur</label></td>
                                                        <?php } else { ?>
                                                            <td><label for="" class="badge btn-success text-white"> Lulus </label></td>
                                                        <?php }
                                                        ?>
                                                    <?php }
                                                    ?>
                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                    <p>Ketentuan : </p>
                                    <ul>
                                        <li>Sesuai Dokumen IKP <?= $row_rup['ba_pengumuman_hasil_evaluasi_ikp'] ?> <b> Tahap 3 : Evaluasi Harga</b> “Evaluasi Harga dilakukan terhadap Penawaran yang <b> LULUS </b>Evaluasi Administrasi dan Evaluasi Teknis”.</li>
                                        <li> Pembukaan Penawaran File II (Harga) dan Koreksi Aritmatika dilakukan oleh Panitia Pengadaan.</li>
                                    </ul>
                                    <div class="row">
                                        <p>Demikian disampaikan, atas perhatian dan kehadirannya, diucapkan terima kasih.</p>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <b> <label for="">PT Jasamarga Tollroad Operator</label></b>
                                        <br><br>
                                    </div>
                                    <br>
                                    TTD
                                    <br><br>
                                    <br>
                                    <label for=""><b>Panitia Pengadaan</b></label>
                                </div>
                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td>
                        <div class="float-right">
                            <img src="<?= base_url('assets/logo_ba/footer.png') ?>" alt="logo" style="margin-lef:-300px;opacity: 0.5;width:400px;position:absoluter;z-index: -1">
                        </div>
                    </td>
                </tr>
                </tfoat>
        </table>
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