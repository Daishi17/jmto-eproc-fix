<!DOCTYPE html>
<html lang="en">

<head>
    <title>BERITA ACARA
        PEMBUKAAN DOKUMEN PENAWARAN
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
                <h4 class="text-uppercase font-weight-bold" style="line-height: 1;">PEMBUKAAN DOKUMEN PENAWARAN FILE I (ADMINISTRASI DAN TEKNIS)</h4>
                <h5 class="text-uppercase font-weight-bold" style="line-height: 1;"><?= $row_rup['nama_rup'] ?> </h5>
            </center>
            <hr size="5">
            <center>
                <div>
                    <label class=" font-weight-bold">Nomor : <?= $row_rup['ba_sampul1_no_2'] ?></label>
                    <br>
                    <label class="font-weight-bold">Tanggal : <?= tgl_indo($row_rup['ba_sampul1_tgl_2']) ?></label>
                </div>
            </center>
            <div class="container">
                <p style="text-align:justify;">
                    Pada Hari ini <b><?= $row_rup['ba_sampul1_hari_2'] ?></b>,
                    Tanggal <b class="text-capitalize"><?= terbilang(date('d', strtotime($row_rup['ba_sampul1_tgl_2']))) ?></b>,
                    Bulan <b class="text-capitalize"> <?= bln_indo(date('m', strtotime($row_rup['ba_sampul1_tgl_2']))) ?></b>,
                    Tahun <b> <?= terbilang(date('Y', strtotime($row_rup['ba_sampul1_tgl_2']))) ?> (<?= date('d-m-Y', strtotime($row_rup['ba_sampul1_tgl_2'])) ?>)</b>, pukul <?= $row_rup['ba_sampul1_jam_pelaksanaan_2'] ?> WIB , Panitia Pengadaan Barang dan Jasa yang dibentuk melalui Keputusan Direksi PT Jasamarga Tollroad Operator Nomor : <?= $row_rup['ba_sk_panitia'] ?>, <?= $row_rup['tgl_ba_sk_panitia'] ?> serta berdasarkan dan dengan mempertimbangkan Keputusan Direksi PT Jasamarga Tollroad Operator Nomor : <?= $row_rup['ba_sk_direksi'] ?>, <?= $row_rup['tgl_ba_sk_direksi'] ?> tentang Pedoman Pelaksanaan Pengadaan Barang/Jasa Di Lingkungan PT Jasamarga Tollroad Operator;
                </p>

                <p style="text-align:justify;">
                    telah menerima Dokumen Penawaran dari para calon penyedia jasa dan dilakukan Pembukaan Dokumen Penawaran untuk Pekerjaan Pengadaan Pekerjaan <?= $row_rup['nama_rup'] ?> dengan rincian sebagai berikut:
                </p>

                <ol type="I">
                    <li>
                        <p><b> PENYEDIA JASA YANG DINYATAKAN LULUS EVALUASI KUALIFIKASI SEBANYAK <?= count($peserta_tender_pq_penawaran) ?> (<?= terbilang(count($peserta_tender_pq_penawaran)) ?>) PESERTA</b></p>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Peserta</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($peserta_tender_pq_penawaran as $key => $value2) { ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td class="text-uppercase"><?= $value2['nama_usaha'] ?></td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>

                    </li>
                    <li class="mt-3">
                        <p><b>PENYEDIA JASA YANG MENYAMPAIKAN ATAU MENGUPLOAD DOKUMEN PENGADAAN SEBANYAK <?= count($peserta_tender_pq_penawaran) ?> (<?= terbilang(count($peserta_tender_pq_penawaran)) ?>) PESERTA</b></p>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Peserta</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($peserta_tender_pq_penawaran as $key => $value3) { ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td class="text-uppercase"><?= $value3['nama_usaha'] ?></td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </li>
                    <li class="mt-3">
                        <p><b>JALANNYA ACARA PEMASUKAN DOKUMEN PENAWARAN : </b></p>
                        <ol type="a">
                            <li>Panitia menerima pemasukan Dokumen Penawaran dilanjutkan dengan pembukaan penawaran terhadap dokumen penawaran yang disampaikan serta memeriksa syarat Dokumen Penawaran.</li>
                            <li>Setelah memeriksa Dokumen Penawaran, Panitia menetapkan kesesuaian Dokumen calon Penyedia Jasa yang memasukan dokumen penawaran.</li>
                            <li>Hasil Pemeriksaan Dokumen Penawaran dengan rincian pengecekan sebagaimana Lampiran Berita Acara Pembukaan Penawaran sebagai berikut :</li>
                        </ol>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Peserta</th>
                                    <th>Kelengkapan Dokumen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($row_rup['id_jadwal_tender'] == 1) { ?>
                                    <?php $i = 1;
                                    foreach ($peserta_tender_pq_penawaran as $key => $value) { ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td class="text-uppercase"><?= $value['nama_usaha'] ?></td>
                                            <td>
                                                <?php


                                                $sts_valid_0 = $value['file1_administrasi_sts'] == 0 || $value['file1_teknis_sts'] == 0 || $value['file2_penawaran_sts'] == 0 || $value['file2_dkh_sts'] == 0;

                                                $sts_valid = $value['file1_administrasi_sts'] == 1 && $value['file1_teknis_sts'] == 1 && $value['file2_penawaran_sts'] == 1 && $value['file2_dkh_sts'] == 1 || $value['file1_administrasi_sts'] == 3 && $value['file1_teknis_sts'] == 3 && $value['file2_penawaran_sts'] == 3 && $value['file2_dkh_sts'] == 3;

                                                $sts_tdk_valid = $value['file1_administrasi_sts'] == 2 || $value['file1_teknis_sts'] == 2 || $value['file2_penawaran_sts'] == 2 || $value['file2_dkh_sts'] == 2;

                                                if ($sts_valid_0) { ?>
                                                    <span class="badge bg-warning text-white">Belum Diperiksa</span>

                                                <?php } else if ($sts_valid) { ?>
                                                    <span class="badge bg-success text-white">Lengkap</span>
                                                <?php } else if ($sts_tdk_valid) { ?>
                                                    <span class="badge bg-danger text-white">Tidak Lengkap</span>
                                                <?php } else {   ?>
                                                    <span class="badge bg-success text-white">Lengkap</span>
                                                <?php } ?>



                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } else { ?>
                                    <?php $i = 1;
                                    foreach ($peserta_tender_pq_penawaran as $key => $value) { ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td class="text-uppercase"><?= $value['nama_usaha'] ?></td>
                                            <td>
                                                <?php


                                                $sts_valid_0 = $value['file1_administrasi_sts'] == 0 || $value['file1_organisasi_sts'] == 0 || $value['file1_pabrikan_sts'] == 0 || $value['file1_peralatan_sts'] == 0 || $value['file1_personil_sts'] == 0 || $value['file1_makalah_teknis_sts'] == 0 || $value['file1_pra_rk3_sts'] == 0 || $value['file1_spek_sts'] == 0;

                                                $sts_valid = $value['file1_administrasi_sts'] == 1 && $value['file1_organisasi_sts'] == 1 && $value['file1_pabrikan_sts'] == 1 && $value['file1_peralatan_sts'] == 1 && $value['file1_personil_sts'] == 1 && $value['file1_makalah_teknis_sts'] == 1 && $value['file1_pra_rk3_sts'] == 1 && $value['file1_spek_sts'] == 1 || $value['file1_administrasi_sts'] == 3 && $value['file1_organisasi_sts'] == 3 && $value['file1_pabrikan_sts'] == 3 && $value['file1_peralatan_sts'] == 3 && $value['file1_personil_sts'] == 3 && $value['file1_makalah_teknis_sts'] == 3 && $value['file1_pra_rk3_sts'] == 3 && $value['file1_spek_sts'] == 3;

                                                $sts_tdk_valid = $value['file1_administrasi_sts'] == 2 || $value['file1_organisasi_sts'] == 2 || $value['file1_pabrikan_sts'] == 2 || $value['file1_peralatan_sts'] == 2 || $value['file1_personil_sts'] == 2 || $value['file1_makalah_teknis_sts'] == 2 || $value['file1_pra_rk3_sts'] == 2 || $value['file1_spek_sts'] == 2;

                                                if ($sts_valid_0) { ?>
                                                    <span class="badge bg-warning text-white">Belum Diperiksa</span>

                                                <?php } else if ($sts_valid) { ?>
                                                    <span class="badge bg-success text-white">Lengkap</span>
                                                <?php } else if ($sts_tdk_valid) { ?>
                                                    <span class="badge bg-danger text-white">Tidak Lengkap</span>
                                                <?php } else {   ?>
                                                    <span class="badge bg-success text-white">Lengkap</span>
                                                <?php } ?>



                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php  }  ?>


                            </tbody>
                        </table>
                    </li>

                    <li class="mt-3">
                        <p><b>DAFTAR LAMPIRAN YANG MENGIKAT BERITA ACARA INI : </b></p>
                        <table>
                            <tr>
                                <td>Lampiran A</td>
                                <td>&ensp;&ensp;Dokumen Pengadaan Pekerjaan <?= $row_rup['nama_rup'] ?> dan Addendumnya</td>
                            </tr>
                            <tr>
                                <td>Lampiran B</td>
                                <td>&ensp;&ensp;Keputusan Direksi Nomor : 81/KPTS-JMTO/2023 tanggal 01 agustus 2022 tentang Panitia Pengadaan Barang/Jasa </td>
                            </tr>
                            <tr>
                                <td>Lampiran C</td>
                                <td>&ensp;&ensp;Dokumen Penawaran dari penyedia jasa</td>
                            </tr>
                        </table>
                    </li>
                </ol>
                <p>Demikian Berita Acara ini dibuat dan ditandatangani sebagaimana tanggal tersebut di atas.</p>
                <center>
                    <b class="text-uppercase">PANITIA <?= $row_rup['nama_rup'] ?> </b>
                </center>
                <br>
                <table class="table table-bordered">
                    <tbody>
                        <?php $i = 1;
                        foreach ($panitia_tender as $key => $value) { ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $value['nama_pegawai'] ?></td>
                                <td>
                                    <?php if ($value['role_panitia'] == 1) { ?>
                                        Ketua merangkap Anggota
                                    <?php  } else if ($value['role_panitia'] == 2) { ?>
                                        Sekretaris merangkap Anggota
                                    <?php  } else if ($value['role_panitia'] == 3) { ?>
                                        Anggota
                                    <?php  }  ?>

                                </td>
                                <td class="text-center">
                                    <?php if ($value['sts_ba_sampul1_2'] == 1) { ?>
                                        <span class="badge bg-success text-white">Setuju</span>
                                    <?php  } else if ($value['sts_ba_sampul1_2'] == 2) { ?>
                                        <span class="badge bg-danger text-white">Tidak Setuju</span>
                                    <?php  } else { ?>
                                        <span class="badge bg-success">Belum Di Ceklist</span>
                                    <?php  }  ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <br><br>
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