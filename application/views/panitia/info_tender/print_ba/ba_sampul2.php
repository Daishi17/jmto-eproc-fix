<!DOCTYPE html>
<html lang="en">

<head>
    <title>BERITA ACARA
        PEMBUKAAN DOKUMEN PENAWARAN FILE II (PENAWARAN HARGA)
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
        <form action="javascript:;" method="POST" id="form_ba_pasca1">
            <div class="container-fluid">
                <img class="pull-right" alt="LOGO" src="<?= base_url() ?>assets/logo_ba/logo_ba.png" width="50%" style="opacity: 0.5;" />
            </div>
            <center>
                <h4 class="text-uppercase font-weight-bold" style="line-height: 1;">BERITA ACARA</h4>
                <h4 class="text-uppercase font-weight-bold" style="line-height: 1;">PEMBUKAAN DOKUMEN PENAWARAN HARGA (FILE II) <?= $row_rup['nama_metode_pengadaan'] ?></h4>
                <h5 class="text-uppercase font-weight-bold" style="line-height: 1;"><?= $row_rup['nama_rup'] ?> </h5>
            </center>
            <hr size="5">
            <center>
                <div style="font-size:18px">
                    <label class="font-weight-bold">Nomor : <?= $row_rup['ba_sampul2_no'] ?></label>
                    <br>
                    <label class="font-weight-bold">Tanggal : <?= tgl_indo($row_rup['ba_sampul2_tgl']) ?></label>
                </div>
            </center>
            <div class="container">
                <p style="text-align:justify; font-size:18px">
                    Pada Hari ini <b><?= $row_rup['ba_sampul2_hari'] ?></b>,
                    Tanggal <b class="text-capitalize"><?= terbilang(date('d', strtotime($row_rup['ba_sampul2_tgl_pelaksanaan']))) ?></b>,
                    Bulan <b class="text-capitalize"> <?= bln_indo(date('m', strtotime($row_rup['ba_sampul2_tgl_pelaksanaan']))) ?></b>,
                    Tahun <b> <?= terbilang(date('Y', strtotime($row_rup['ba_sampul2_tgl_pelaksanaan']))) ?> (<?= date('d-m-Y', strtotime($row_rup['ba_sampul2_tgl_pelaksanaan'])) ?>)</b>, panitia Pengadaan Barang dan Jasa yang dibentuk melalui keputusan Direksi PT Jasamarga Tollroad Operator nomor: <?= $row_rup['ba_sk_panitia'] ?> tanggal <?= $row_rup['tgl_ba_sk_panitia'] ?> serta berdasarkan keputusan Direksi PT Jasamarga Tollroad Operator nomor: <?= $row_rup['ba_sk_direksi'] ?> tanggal <?= $row_rup['tgl_ba_sk_direksi'] ?> tentang standar prosedur pelaksanaan pengadaan barang/jasa di lingkungan perusahaan telah melaksanakan pembukaan penawaran harga (File II) <?= $row_rup['nama_metode_pengadaan'] ?> <b><?= $row_rup['nama_rup'] ?></b>.
                </p>

                <p style="text-align:justify; font-size:18px">
                    Pembukaan dokumen penawaran harga dimulai pukul <?= $row_rup['ba_sampul2_jam_pelaksanaan'] ?> WIB di ruang rapat kantor pusat PT Jasamarga Tollroad Operator terhadap <?= count($peserta_tender_pq_penawaran) ?> (<label for="" class="text-uppercase"><?= terbilang(count($peserta_tender_pq_penawaran)) ?></label>) peserta penawaran, dengan hasil sebagai berikut:
                </p>

                <table class="table table-bordered">
                    <thead>

                        <tr>
                            <th rowspan="3" class="text-center">NO</th>
                            <th rowspan="3" class="text-center">PESERTA PENAWARAN</th>
                            <th colspan="6" class="text-center">File II</th>
                            <th colspan="2" rowspan="2" class="text-center">HARGA PENAWARAN <br> (Sebelum Koreksi Aritmatika)</th>
                            <th rowspan="2" class="text-center">Keterangan</th>
                        </tr>
                        <tr>
                            <th colspan="6" class="text-center">DOKUMEN PENAWARAN HARGA</th>
                        </tr>
                        <tr>
                            <th class="text-center">1</th>
                            <th class="text-center">2</th>
                            <th class="text-center">3</th>
                            <th class="text-center">4</th>
                            <th class="text-center">5</th>
                            <th class="text-center">6</th>
                            <th class="text-center">Rp.</th>
                            <th class="text-center">% HPS</th>
                            <th class="text-center">SAH / GUGUR</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($peserta_tender_pq_penawaran as $key => $value) { ?>
                            <?php
                            $subs_string = substr($value['nama_usaha'], 0, 2);
                            if ($subs_string == 'PT' || $subs_string == 'CV' || $subs_string == 'Koperasi') {
                                $nama_perusahaan = $value['nama_usaha'];
                            } else {
                                if ($value['bentuk_usaha'] == 'Perseroan Terbatas (PT)') {
                                    $nama_perusahaan = 'PT ' . $value['nama_usaha'];
                                } else if ($value['bentuk_usaha']  == 'Commanditaire Vennootschap (CV)') {
                                    $nama_perusahaan = 'CV ' . $value['nama_usaha'];
                                } else if ($value['bentuk_usaha']  == 'Koperasi') {
                                    $nama_perusahaan = $value['nama_usaha'];
                                }
                            }
                            ?>
                            <tr>
                                <td class="text-center"><?= $i++ ?></td>
                                <td class="text-uppercase"><?= $nama_perusahaan ?></td>
                                <td class="text-center">
                                    <?php if ($value['kelengkapan_file2_1'] == 1) { ?>
                                        v
                                    <?php } else if ($value['kelengkapan_file2_1'] == 2) { ?>
                                        x
                                    <?php } else { ?>
                                        -
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($value['kelengkapan_file2_2'] == 1) { ?>
                                        v
                                    <?php } else if ($value['kelengkapan_file2_2'] == 2) { ?>
                                        x
                                    <?php } else { ?>
                                        -
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($value['kelengkapan_file2_3'] == 1) { ?>
                                        v
                                    <?php } else if ($value['kelengkapan_file2_3'] == 2) { ?>
                                        x
                                    <?php } else { ?>
                                        -
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($value['kelengkapan_file2_4'] == 1) { ?>
                                        v
                                    <?php } else if ($value['kelengkapan_file2_4'] == 2) { ?>
                                        x
                                    <?php } else { ?>
                                        -
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($value['kelengkapan_file2_5'] == 1) { ?>
                                        v
                                    <?php } else if ($value['kelengkapan_file2_5'] == 2) { ?>
                                        x
                                    <?php } else { ?>
                                        -
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($value['kelengkapan_file2_6'] == 1) { ?>
                                        v
                                    <?php } else if ($value['kelengkapan_file2_6'] == 2) { ?>
                                        x
                                    <?php } else { ?>
                                        -
                                    <?php } ?>
                                </td>
                                <?php $sts_valid_0 = $value['kelengkapan_file2_1'] == 0 && $value['kelengkapan_file2_2'] == 0 && $value['kelengkapan_file2_3'] == 0 && $value['kelengkapan_file2_5'] == 0;

                                $sts_valid = $value['kelengkapan_file2_1'] == 1 && $value['kelengkapan_file2_2'] == 1 && $value['kelengkapan_file2_3'] == 1 && $value['kelengkapan_file2_5'] == 1;

                                $sts_tdk_valid = $value['kelengkapan_file2_1'] == 2 && $value['kelengkapan_file2_2'] == 2 && $value['kelengkapan_file2_3'] == 2 && $value['kelengkapan_file2_5'] == 2;
                                ?>
                                <?php
                                if ($sts_valid_0) { ?>
                                    <td class="text-center"> <span class="badge bg-warning text-white">0</span></td>
                                    <td class="text-center"> <span class="badge bg-warning text-white">0</span></td>
                                <?php } else if ($sts_valid) { ?>
                                    <td class="text-center">Rp. <?= number_format($value['nilai_penawaran'], 2, ",", "."); ?></td>
                                    <td class="text-center"><?= number_format($value['ev_penawaran_hps'], 2, ",", "."); ?> %</td>
                                <?php } else if ($sts_tdk_valid) { ?>
                                    <td class="text-center"> <span class="badge bg-danger text-white">-</span></td>
                                    <td class="text-center"> <span class="badge bg-danger text-white">-</span></td>
                                <?php } else {   ?>
                                    <td class="text-center"> <span class="badge bg-danger text-white">-</span></td>
                                    <td class="text-center"> <span class="badge bg-danger text-white">-</span></td>
                                <?php } ?>


                                <td class="text-center">
                                    <?php
                                    if ($sts_valid_0) { ?>
                                        <span class="badge bg-warning text-white">Belum Diperiksa</span>
                                    <?php } else if ($sts_valid) { ?>
                                        <span class="badge bg-success text-white">SAH</span>
                                    <?php } else if ($sts_tdk_valid) { ?>
                                        <span class="badge bg-danger text-white">GUGUR</span>
                                    <?php } else {   ?>
                                        <span class="badge bg-danger text-white">GUGUR</span>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
                <br>
                <p style="text-align:justify; font-size:18px">
                    Nilai akhir didapat dengan mengkombinasikan Hasil Evaluasi Teknis dengan Harga Penawaran, sehingga didapatkan peringkat (setelah koreksi aritmatik) sebagaimana berikut:
                </p>
                <br>
                <table class="table table-bordered">

                    <thead style="text-align: center;">
                        <tr>
                            <th rowspan="2">No </th>
                            <th rowspan="2">Nama Perusahaan</th>

                            <?php if ($row_rup['bobot_nilai'] == 2) { ?>
                                <th rowspan="2">Harga Penawaran <br> (Setelah Koreksi Aritmatika HEA)</th>
                            <?php } else { ?>
                                <th rowspan="2">Harga Penawaran <br> (Setelah Koreksi Aritmatika)</th>
                                <th>Nilai Teknis</th>
                            <?php } ?>
                            <th rowspan="2">% Terhadap HPS</th>
                            <th>Nilai Usulan Biaya</th>
                            <th rowspan="2">Nilai Akhir</th>
                            <th rowspan="2">Peringkat Akhir</th>
                            <th rowspan="2">Keterangan</th>
                        </tr>
                        <tr>
                            <?php if ($row_rup['bobot_nilai'] == 2) { ?>
                                <th><?= $row_rup['bobot_biaya'] ?>%</th>
                            <?php } else { ?>
                                <th><?= $row_rup['bobot_teknis'] ?>%</th>
                                <th><?= $row_rup['bobot_biaya'] ?>%</th>
                            <?php } ?>

                        </tr>
                    </thead>

                    <?php if ($row_rup['bobot_nilai'] == 2) { ?>
                        <tbody>
                            <?php $i = 1;
                            foreach ($peserta_tender_pq_penawaran as $key => $value) { ?>
                                <?php
                                $subs_string = substr($value['nama_usaha'], 0, 2);
                                if ($subs_string == 'PT' || $subs_string == 'CV' || $subs_string == 'Koperasi') {
                                    $nama_perusahaan = $value['nama_usaha'];
                                } else {
                                    if ($value['bentuk_usaha'] == 'Perseroan Terbatas (PT)') {
                                        $nama_perusahaan = 'PT ' . $value['nama_usaha'];
                                    } else if ($value['bentuk_usaha']  == 'Commanditaire Vennootschap (CV)') {
                                        $nama_perusahaan = 'CV ' . $value['nama_usaha'];
                                    } else if ($value['bentuk_usaha']  == 'Koperasi') {
                                        $nama_perusahaan = $value['nama_usaha'];
                                    }
                                }
                                ?>
                                <tr>
                                    <td class="text-center"><?= $i++ ?></td>
                                    <td class="text-uppercase"><?= $nama_perusahaan ?></td>
                                    <td class="text-center">Rp. <?= number_format($value['ev_hea_harga_hea_terendah'], 2, ",", "."); ?></td>


                                    <?php if ($value['ev_penawaran_teknis'] >= 60) { ?>
                                        <td class="text-center"><?= number_format($value['ev_terendah_hps_pringkat_akhir_hea'], 2, ",", "."); ?> </td>
                                    <?php } else { ?>
                                        <td class="text-center">-</td>
                                    <?php }
                                    ?>

                                    <?php if ($value['ev_penawaran_teknis'] >= 60) { ?>
                                        <td class="text-center"><?= number_format($value['ev_terendah_bobot_pringkat_akhir_hea'], 2, ",", "."); ?> </td>
                                    <?php } else { ?>
                                        <td class="text-center">-</td>
                                    <?php }
                                    ?>

                                    <?php if ($value['ev_penawaran_teknis'] >= 60) { ?>
                                        <td class="text-center"><?= number_format($value['ev_terendah_nilai_akhir_pringkat_akhir_hea'], 2, ",", "."); ?> </td>
                                    <?php } else { ?>
                                        <td class="text-center">-</td>
                                    <?php }
                                    ?>

                                    <?php if ($value['ev_terendah_hps_pringkat_akhir_hea'] >= 60) { ?>
                                        <td class="text-center"><?= $value['ev_terendah_peringkat_akhir_hea'] ?></td>
                                    <?php } else { ?>
                                        <td class="text-center">-</td>
                                    <?php }
                                    ?>

                                    <td>
                                        <?php if ($value['ev_terendah_hps_pringkat_akhir_hea'] >= 60) { ?>
                                            Sah
                                        <?php } else { ?>
                                            Gugur
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    <?php } else { ?>
                        <tbody>
                            <?php $i = 1;
                            foreach ($peserta_tender_pq_penawaran as $key => $value) { ?>
                                <?php $sts_valid_0 = $value['kelengkapan_file2_1'] == 0 && $value['kelengkapan_file2_2'] == 0 && $value['kelengkapan_file2_3'] == 0 && $value['kelengkapan_file2_5'] == 0;

                                $sts_valid = $value['kelengkapan_file2_1'] == 1 && $value['kelengkapan_file2_2'] == 1 && $value['kelengkapan_file2_3'] == 1 && $value['kelengkapan_file2_5'] == 1;

                                $sts_tdk_valid = $value['kelengkapan_file2_1'] == 2 && $value['kelengkapan_file2_2'] == 2 && $value['kelengkapan_file2_3'] == 2 && $value['kelengkapan_file2_5'] == 2;
                                ?>
                                <?php
                                $subs_string = substr($value['nama_usaha'], 0, 2);
                                if ($subs_string == 'PT' || $subs_string == 'CV' || $subs_string == 'Koperasi') {
                                    $nama_perusahaan = $value['nama_usaha'];
                                } else {
                                    if ($value['bentuk_usaha'] == 'Perseroan Terbatas (PT)') {
                                        $nama_perusahaan = 'PT ' . $value['nama_usaha'];
                                    } else if ($value['bentuk_usaha']  == 'Commanditaire Vennootschap (CV)') {
                                        $nama_perusahaan = 'CV ' . $value['nama_usaha'];
                                    } else if ($value['bentuk_usaha']  == 'Koperasi') {
                                        $nama_perusahaan = $value['nama_usaha'];
                                    }
                                }
                                ?>
                                <tr>
                                    <td class="text-center"><?= $i++ ?></td>
                                    <td class="text-uppercase"><?= $nama_perusahaan ?></td>

                                    <?php
                                    if ($sts_valid_0) { ?>
                                        <td class="text-center">Rp. <?= number_format($value['nilai_penawaran'], 2, ",", "."); ?></td>
                                    <?php } else if ($sts_valid) { ?>
                                        <td class="text-center">Rp. <?= number_format($value['nilai_penawaran'], 2, ",", "."); ?></td>
                                    <?php } else if ($sts_tdk_valid) { ?>
                                        <td class="text-center">-</td>
                                    <?php } else {   ?>
                                        <td class="text-center">-</td>
                                    <?php } ?>



                                    <?php
                                    if ($sts_valid_0) { ?>
                                        <td class="text-center"><?= number_format($value['ev_penawaran_teknis'], 2, ",", "."); ?></td>
                                    <?php } else if ($sts_valid) { ?>
                                        <?php if ($value['ev_penawaran_teknis'] >= 60) { ?>
                                            <td class="text-center"><?= number_format($value['ev_penawaran_teknis'], 2, ",", "."); ?></td>
                                        <?php } else { ?>
                                            <td class="text-center">-</td>
                                        <?php }
                                        ?>
                                    <?php } else if ($sts_tdk_valid) { ?>
                                        <td class="text-center">-</span></td>
                                    <?php } else {   ?>
                                        <td class="text-center">-</span></td>
                                    <?php } ?>



                                    <?php
                                    if ($sts_valid_0) { ?>
                                        <td class="text-center"><?= number_format($value['ev_penawaran_hps'], 2, ",", "."); ?></td>
                                    <?php } else if ($sts_valid) { ?>
                                        <?php if ($value['ev_penawaran_hps'] >= 60) { ?>
                                            <td class="text-center"><?= number_format($value['ev_penawaran_hps'], 2, ",", "."); ?> </td>
                                        <?php } else { ?>
                                            <td class="text-center">-</td>
                                        <?php }
                                        ?>
                                    <?php } else if ($sts_tdk_valid) { ?>
                                        <td class="text-center">-</span></td>
                                    <?php } else {   ?>
                                        <td class="text-center">-</span></td>
                                    <?php } ?>


                                    <?php
                                    if ($sts_valid_0) { ?>
                                        <td class="text-center"><?= number_format($value['ev_penawaran_biaya'], 2, ",", "."); ?></td>
                                    <?php } else if ($sts_valid) { ?>
                                        <?php if ($value['ev_penawaran_biaya'] >= 60) { ?>
                                            <td class="text-center"><?= number_format($value['ev_penawaran_biaya'], 2, ",", "."); ?> </td>
                                        <?php } else { ?>
                                            <td class="text-center">-</td>
                                        <?php }
                                        ?>
                                    <?php } else if ($sts_tdk_valid) { ?>
                                        <td class="text-center">-</span></td>
                                    <?php } else {   ?>
                                        <td class="text-center">-</span></td>
                                    <?php } ?>



                                    <?php
                                    if ($sts_valid_0) { ?>
                                        <td class="text-center"><?= number_format($value['ev_penawaran_akhir'], 2, ",", "."); ?></td>
                                    <?php } else if ($sts_valid) { ?>
                                        <?php if ($value['ev_penawaran_akhir'] >= 60) { ?>
                                            <td class="text-center"><?= number_format($value['ev_penawaran_akhir'], 2, ",", "."); ?> </td>
                                        <?php } else { ?>
                                            <td class="text-center">-</td>
                                        <?php }
                                        ?>
                                    <?php } else if ($sts_tdk_valid) { ?>
                                        <td class="text-center">-</span></td>
                                    <?php } else {   ?>
                                        <td class="text-center">-</span></td>
                                    <?php } ?>


                                    <?php
                                    if ($sts_valid_0) { ?>
                                        <td class="text-center"><?= number_format($value['ev_penawaran_peringkat'], 2, ",", "."); ?></td>
                                    <?php } else if ($sts_valid) { ?>
                                        <td class="text-center"><?= $value['ev_penawaran_peringkat'] ?></td>
                                    <?php } else if ($sts_tdk_valid) { ?>
                                        <td class="text-center">-</span></td>
                                    <?php } else {   ?>
                                        <td class="text-center">-</span></td>
                                    <?php } ?>


                                    <?php
                                    if ($sts_valid_0) { ?>
                                        <td class="text-center">Belum Diperiksa</span></td>
                                    <?php } else if ($sts_valid) { ?>
                                        <td class="text-center">

                                            <?php if ($value['ev_penawaran_akhir'] >= 60) { ?>
                                                Sah
                                            <?php } else { ?>
                                                Gugur
                                            <?php } ?>
                                        </td>
                                    <?php } else if ($sts_tdk_valid) { ?>
                                        <td class="text-center">Gugur</span></td>
                                    <?php } else {   ?>
                                        <td class="text-center">Gugur</span></td>
                                    <?php } ?>

                                </tr>
                            <?php } ?>
                        </tbody>
                    <?php  } ?>

                </table>
                <br>
                <p>Demikian Berita Acara ini dibuat dan ditandatangani sebagaimana tanggal tersebut di atas.</p>
                <br>
                <br>
                <br>
                <div class="float-left">
                    <img src="<?= base_url('assets/logo_ba/logo_ba2.png') ?>" alt="logo" width="30%" style="opacity: 0.5;">
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <center>
                    <b class="text-uppercase">Tender Umum</b>
                    <br>
                    <b class="text-uppercase"><?= $row_rup['nama_rup'] ?> </b>
                </center>
                <br>
                <b>Panitia Pengadaan</b>
                <br>
                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>KEDUDUKAN DALAM PANITIA</th>
                            <th>TANDA TANGAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($panitia_tender as $key => $value) { ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $value['nama_pegawai'] ?></td>
                                <td class="text-center">
                                    <?php if ($value['role_panitia'] == 1) { ?>
                                        Ketua merangkap Anggota
                                    <?php  } else if ($value['role_panitia'] == 2) { ?>
                                        Sekretaris merangkap Anggota
                                    <?php  } else if ($value['role_panitia'] == 3) { ?>
                                        Anggota
                                    <?php  }  ?>

                                </td>
                                <td class="text-center">
                                    <?php if ($value['sts_ba_sampul2'] == 1) { ?>
                                        <span class="badge bg-success text-white">Setuju</span>
                                    <?php  } else if ($value['sts_ba_sampul2'] == 2) { ?>
                                        <span class="badge bg-danger text-white">Tidak Setuju</span>
                                    <?php  } else { ?>
                                        <span class="badge bg-success">Belum Di Ceklist</span>
                                    <?php  }  ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </form>
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