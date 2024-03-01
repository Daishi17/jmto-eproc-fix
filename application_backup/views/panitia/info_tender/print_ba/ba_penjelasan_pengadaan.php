<!DOCTYPE html>
<html lang="en">

<head>
    <title>BERITA ACARA RAPAT PENJELASAN
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
                <h4 class="text-uppercase font-weight-bold" style="line-height: 1;">BERITA ACARA RAPAT PENJELASAN DOKUMEN <?= $row_rup['nama_rup'] ?></h4>
            </center>
            <hr size="5">
            <center>
                <div style="font-size:18px">
                    <label class="font-weight-bold">Nomor : <?= $row_rup['ba_penjelasan_no'] ?></label>
                    <br>
                    <label class="font-weight-bold">Tanggal : <?= tgl_indo($row_rup['ba_penjelasan_tgl']) ?></label>
                </div>
            </center>
            <div class="container">
                <p style="text-align:justify; font-size:18px">
                    Pada Hari ini <b><?= $row_rup['ba_penjelasan_hari'] ?></b>,
                    Tanggal <b class="text-capitalize"><?= terbilang(date('d', strtotime($row_rup['ba_penjelasan_tgl']))) ?></b>,
                    Bulan <b class="text-capitalize"> <?= bln_indo(date('m', strtotime($row_rup['ba_penjelasan_tgl']))) ?></b>,
                    Tahun <b class="text-capitalize"> <?= terbilang(date('Y', strtotime($row_rup['ba_penjelasan_tgl']))) ?> (<?= date('d-m-Y', strtotime($row_rup['ba_penjelasan_tgl'])) ?>)</b>, Panitia Pengadaan Barang dan Jasa yang dibentuk melalui Keputusan Direksi PT Jasamarga Tollroad Operator Nomor : <?= $row_rup['ba_sk_panitia'] ?> Tanggal <?= $row_rup['tgl_ba_sk_panitia'] ?>, serta berdasarkan dan dengan mempertimbangkan Keputusan Direksi PT Jasamarga Tollroad Operator Nomor : <?= $row_rup['ba_sk_direksi'] ?>, Tanggal <?= $row_rup['tgl_ba_sk_direksi'] ?> tentang Pedoman Pelaksanaan Pengadaan Barang/Jasa Di Lingkungan PT Jasamarga Tollroad Operator;
                </p>

                <p style="text-align:justify; font-size:18px">
                    Telah melaksanakan Rapat Penjelasan Dokumen Pengadaan <?= $row_rup['nama_metode_pengadaan'] ?> secara virtual untuk Pekerjaan:
                </p>

                <p style="text-align:justify; font-size:18px">
                    <b><?= $row_rup['nama_rup'] ?> </b>
                </p>

                <p style="text-align:justify; font-size:18px">
                    dengan hasil dan jalannya rapat sebagai berikut :
                </p>

                <br>
                <ol>
                    <li>
                        Rapat Penjelasan dimulai pada pukul <?= $row_rup['ba_penjelasan_jam'] ?> WIB yang dihadiri oleh Panitia Pengadaan dan Peserta Penawaran / <?= $row_rup['nama_metode_pengadaan'] ?> secara virtual sebagaimana dimaksud pada Daftar Hadir dan Dokumentasi (terlampir).
                    </li>
                    <br>
                    <li>
                        Hal-hal yang disampaikan pada Rapat Penjelasan ini adalah :
                        <ol type="a">
                            <li>Pekerjaan dan Informasi Umum</li>
                            <li>Informasi Jadwal Kegiatan</li>
                            <li>Metode Evaluasi Penawaran</li>
                            <li>Ketentuan - ketentuan sesuai dokumen Pengadaan <?= $row_rup['nama_metode_pengadaan'] ?></li>
                            <li>Dokumen Pengadaan <?= $row_rup['nama_metode_pengadaan'] ?> </li>
                        </ol>
                    </li>
                    <br>
                    <li>Segala sesuatu perubahan yang secara subtansi berpengaruh terhadap Dokumen Pengadaan dinyatakan dalam Addendum Dokumen Pengadaan yang diterbitkan secara resmi oleh Panitia Pengadaan dan disampaikan kepada Peserta Penawaran melalui notifikasi E-mail dan WhatsApp pada Hari <?= $row_rup['ba_penjelasan_hari'] ?>, <?= tgl_indo($row_rup['ba_penjelasan_tgl']) ?>.</li>
                    <br>
                    <li>Addendum Dokumen Pengadaan dimaksud merupakan satu kesatuan dan bagian yang tidak terpisahkan dengan Dokumen Pengadaan sebagaimana terlampir</li>
                    <br>
                    <li>Hal - hal yang tercantum dalam Notulen Rapat Penjelasan <?= $row_rup['nama_metode_pengadaan'] ?> merupakan Lampiran dan bagian yang tidak terpisahkan dari Berita Acara Rapat Penjelasan ini.</li>
                    <br>
                    <li>Peserta yang tidak hadir pada Rapat Penjelasan <?= $row_rup['nama_metode_pengadaan'] ?> ini dianggap sudah memahami, mengerti, dan menerima semua ketentuan dalam Dokumen Pengadaan untuk kegiatan Pengadaan pekerjaan tersebut.</li>
                </ol>
                <br>
                <p>Demikian Berita Acara Rapat Penjelasan Dokumen Pengadaan <?= $row_rup['nama_metode_pengadaan'] ?> ini dibuat dengan sebenarnya, disetujui oleh Panitia Pengadaan dan wakil dari Peserta.</p>
                <br>
                <br><br>
                <br>
                <br>
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
                    <b><?= $row_rup['nama_rup'] ?></b>
                </center>
                <b class="text-uppercase">Panitia Pengadaan </b>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">NO</th>
                            <th class="text-center">NAMA</th>
                            <th class="text-center">KEDUDUKAN DALAM PANITIA</th>
                            <th class="text-center">PERSETUJUAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($panitia_tender as $key => $value) { ?>
                            <tr>
                                <td class="text-center"><?= $i++ ?></td>
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
                                    <?php if ($value['sts_ba_penjelasan'] == 1) { ?>
                                        <span class="badge bg-success text-white">Setuju</span>
                                    <?php  } else if ($value['sts_ba_penjelasan'] == 2) { ?>
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
                <b class="text-uppercase">Peserta Penawaran </b>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">NO</th>
                            <th class="text-center">NAMA PERUSAHAAN</th>
                            <th class="text-center">PERSETUJUAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($peserta_tender_pq_penawaran as $key => $value) { ?>
                            <?php
                            $subs_string = substr($value['nama_usaha'], 0, 2);
                            if ($subs_string == 'PT') {
                                $nama_perusahaan =  $value['nama_usaha'];
                            } else {
                                $nama_perusahaan = 'PT ' .  $value['nama_usaha'];
                            }
                            ?>
                            <tr>
                                <td class="text-center"><?= $i++ ?></td>
                                <td><?= $nama_perusahaan ?></td>
                                <td class="text-center"><span class="badge bg-success">Setuju</span></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </form>
    </div>




</body>
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

</html>
<script>
    window.print();
</script>