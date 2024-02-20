<!DOCTYPE html>
<html lang="en">

<head>
    <title>Berita Acara Penjelasan Kualifikasi</title>
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
                <h4 class="text-uppercase font-weight-bold" style="line-height: 1;">Berita Acara Rapat Penjelasan Kualifikasi</h4>
                <h5 class="text-uppercase font-weight-bold" style="line-height: 1;"><?= $row_rup['nama_rup'] ?></h5>
            </center>
            <hr size="5">
            <center>
                <div style="font-size:18px">
                    <label class="font-weight-bold">Nomor : <?= $row_rup['ba_penjelasan_kualifikasi_no'] ?></label>
                    <br>
                    <label class="font-weight-bold">Tanggal : <?= tgl_indo($row_rup['ba_penjelasan_kualifikasi_tgl']) ?></label>
                </div>
            </center>
            <div class="container">
                <p style="text-align:justify; font-size:18px">
                    Pada Hari ini <b><?= $row_rup['ba_penjelasan_kualifikasi_hari'] ?></b>,
                    Tanggal <b class="text-capitalize"><?= terbilang(date('d', strtotime($row_rup['ba_penjelasan_kualifikasi_tgl']))) ?></b>,
                    Bulan <b class="text-capitalize"> <?= bln_indo(date('m', strtotime($row_rup['ba_penjelasan_kualifikasi_tgl']))) ?></b>,
                    Tahun <b> <?= terbilang(date('Y', strtotime($row_rup['ba_penjelasan_kualifikasi_tgl_pelaksanaan']))) ?> (<?= date('d-m-Y', strtotime($row_rup['ba_penjelasan_kualifikasi_tgl_pelaksanaan'])) ?>)</b>,Panitia Pengadaan Barang dan Jasa yang dibentuk melalui Keputusan Direksi PT Jasamarga Tollroad Operator Nomor : <?= $row_rup['ba_sk_panitia'] ?>, Tanggal <?= $row_rup['tgl_ba_sk_panitia'] ?>, serta berdasarkan dan dengan mempertimbangkan Keputusan Direksi PT Jasamarga Tollroad Operator Nomor : <?= $row_rup['ba_sk_direksi'] ?>, Tanggal <?= $row_rup['tgl_ba_sk_direksi'] ?> tentang Standar Prosedur Pelaksanaan Pengadaan Barang/Jasa Di Lingkungan Perusahaan; <br>
                    telah melaksanakan Rapat Penjelasan Kualifikasi melalui Aplikasi E-Procurement untuk Pekerjaan :
                </p>

                <p style="text-align:justify; font-size:18px"><b> <?= $row_rup['nama_rup'] ?> </b></p>

                <p style="text-align:justify; font-size:18px">dengan hasil dan jalannya rapat sebagai berikut :</p>


                <ol>
                    <li> Rapat Penjelasan Kualifikasi dimulai pada pukul <?= $row_rup['ba_penjelasan_kualifikasi_jam'] ?> WIB dan dilaksanakan melalui Aplikasi E-Procurement yang dihadiri oleh Panitia Pengadaan dan Peserta Kualifikasi <?= $row_rup['nama_metode_pengadaan'] ?> .</li>
                    <li>
                        Hal-hal yang disampaikan pada Rapat Penjelasan Kualifikasi ini adalah :
                        <ol type="a">
                            <li>Pekerjaan dan Informasi Umum</li>
                            <li>Jadwal Kegiatan</li>
                            <li>Metode Evaluasi Kualifikasi</li>
                            <li>Ketentuan – ketentuan sesuai dokumen kualifikasi</li>
                            <li>Formulir Isian Kualifikasi</li>
                        </ol>
                    </li>
                    <li>
                        Hal – hal yang tercantum dalam Notulen Rapat Penjelasan Kualifikasi merupakan Lampiran dan bagian yang tidak terpisahkan dari Berita Acara Rapat Penjelasan Kualifikasi.
                    </li>
                    <li>
                        Peserta yang tidak hadir pada Rapat Penjelasan Kualifikasi ini dianggap sudah memahami, mengerti, dan menerima semua ketentuan dalam Dokumen Kualifikasi Pengadaan untuk kegiatan Pengadaan pekerjaan tersebut
                    </li>
                </ol>



                <p style="text-align:justify; font-size:18px">Demikian Berita Acara Penjelasan Kualifikasi ini dibuat dengan sebenarnya dan disetujui oleh Panitia Pengadaan.</p>
                <br>
                <br>
                <br>
                <div class="float-right" style="margin-left:800px">
                    <img width="500px" src="<?= base_url('assets/logo_ba/footer.png') ?>" alt="logo" style="opacity: 0.5;">
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
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
                <center><b class="text-uppercase">Panitia <?= $row_rup['nama_rup'] ?> </b> </center>
                <br>
                <b></b>
                <br>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center"><b>NO</b></th>
                            <th class="text-center"><b>NAMA</b></th>
                            <th class="text-center"><b>KEDUDUKAN DALAM PANITIA</b></th>
                            <th class="text-center"><b>TANDA TANGAN</b></th>
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
                                    <?php if ($value['sts_ba_penjelasan_kualifikasi'] == 1) { ?>
                                        <span class="badge bg-success text-white">Setuju</span>
                                    <?php  } else if ($value['sts_ba_penjelasan_kualifikasi'] == 2) { ?>
                                        <span class="badge bg-danger text-white">Tidak Setuju</span>
                                    <?php  } else { ?>
                                        <span class="badge bg-success">Belum Di Ceklist</span>
                                    <?php  }  ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <br>
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