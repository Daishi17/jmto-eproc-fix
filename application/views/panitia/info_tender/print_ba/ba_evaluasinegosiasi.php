<!DOCTYPE html>
<html lang="en">

<head>
    <title>KLARIFIKASI & PENILAIAN KEWAJARAN HARGA
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

<body style="font-size: 18px;">
    <div class="container">
        <form action="javascript:;" method="POST" id="form_ba_pasca1">
            <div class="container-fluid">
                <img class="pull-right" alt="LOGO" src="<?= base_url() ?>assets/logo_ba/logo_ba.png" width="50%" style="opacity: 0.5;" />
            </div>
            <center>
                <h4 class="text-uppercase font-weight-bold" style="line-height: 1;">BERITA ACARA</h4>
                <h4 class="text-uppercase font-weight-bold" style="line-height: 1;">KLARIFIKASI & PENILAIAN KEWAJARAN HARGA</h4>
                <h5 class="text-uppercase font-weight-bold" style="line-height: 1;"><?= $row_rup['nama_rup'] ?></h5>
            </center>
            <hr size="5">
            <center>
                <div style="font-size:18px">
                    <label class="font-weight-bold">Nomor : <?= $row_rup['ba_klarifikasi_no'] ?></label>
                    <br>
                    <label class="font-weight-bold">Tanggal : <?= tgl_indo($row_rup['ba_klarifikasi_tgl']) ?></label>
                </div>
            </center>
            <div class="container">
                <p style="text-align:justify; font-size:18px">
                    Pada Hari ini <b><?= $row_rup['ba_klarifikasi_hari'] ?></b>,
                    Tanggal <b class="text-capitalize"><?= terbilang(date('d', strtotime($row_rup['ba_klarifikasi_tgl']))) ?></b>,
                    Bulan <b class="text-capitalize"> <?= bln_indo(date('m', strtotime($row_rup['ba_klarifikasi_tgl']))) ?></b>,
                    Tahun <b> <?= terbilang(date('Y', strtotime($row_rup['ba_klarifikasi_tgl']))) ?> (<?= date('d-m-Y', strtotime($row_rup['ba_klarifikasi_tgl'])) ?>)</b>, Panitia Pengadaan Barang dan Jasa yang dibentuk melalui Keputusan Direksi PT Jasamarga Tollroad Operator Nomor 81/KPTS-JMTO/2022 tanggal 01 Agustus 2022 serta berdasarkan Keputusan Direksi PT Jasamarga Tollroad Operator Nomor 39/KPTS-JMTO/2022 tanggal 28 April 2022 tentang Pedoman Pelaksanaan Pengadaan Barang/Jasa di Lingkungan PT Jasamarga Tollroad Operator, telah melaksanakan Penilaian Kewajaran Harga untuk <?= $row_rup['nama_rup'] ?> PT Jasamarga Tollroad Operator
                </p>

                <p style="text-align:justify; font-size:18px">
                    Penilaian Kewajaran Harga dan Klarifikasi dimulai pukul <?= $row_rup['ba_klarifikasi_jam'] ?> WIB melalui Virtual Meeting terhadap Peserta Penawaran Peringkat I yaitu <b><?= $row_rup['ba_negosiasi_vendor'] ?></b>
                </p>

                <p style="text-align:justify; font-size:18px">
                    Panitia Pengadaan melakukan Penilaian Kewajaran Harga terhadap semua Harga Satuan Penawaran. <?= $row_rup['ba_klarifikasi_penilaian'] ?> Harga Satuan Penawaran yang lebih dari 110% terhadap Harga Satuan dalam Harga Perkiraan Sendiri (HPS) yang dinyatakan sebagai Harga Satuan Timpang.
                </p>

                <p style="text-align:justify; font-size:18px">
                    Harga Satuan Timpang dimaksud hanya berlaku untuk Kuantitas Awal sebagaimana dimaksud dalam Daftar Kuantitas dan Harga. Selanjutnya, jika dalam pelaksanaan Kontrak terjadi penambahan Kuantitas terhadap Kuantitas Awal dimaksud, maka akan diberlakukan Harga Satuan yang baru sesuai kesepakatan dan akan dinegosiasi dengan Para Pihak sebagaimana dimaksud dalam Kontrak.
                </p>
                <p style="text-align:justify; font-size:18px">
                    <?= $row_rup['ba_klarifikasi_penilaian2'] ?> Harga Satuan Penawaran yang kurang dari 80% terhadap Harga Satuan dalam Harga Perkiraan Sendiri (HPS) yang dinyatakan sebagai Harga Satuan Rendah dengan rincian sebagaimana terlampir.
                </p>
                <p style="text-align:justify; font-size:18px">
                    Penyedia Jasa berkomitmen untuk melaksanakan pekerjaan sesuai dengan ketentuan dalam Dokumen Kontrak beserta lampirannya.
                </p>
                <p style="text-align:justify; font-size:18px">
                    Telah dilakukan juga konfirmasi mengenai Teknis Pekerjaan sebagaimana tertuang dalam lampiran Berita Acara ini.
                </p>
                <p style="text-align:justify; font-size:18px">
                    Demikian Berita Acara ini dibuat dengan sebenarnya, ditandatangani oleh Panitia Pengadaan dan Peserta Penawaran
                </p>

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
                            <th class="text-center">TANDA TANGAN</th>
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
                                    <?php if ($value['sts_ba_klarifikasi_harga'] == 1) { ?>
                                        <span class="badge bg-success text-white">Setuju</span>
                                    <?php  } else if ($value['sts_ba_klarifikasi_harga'] == 2) { ?>
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
                            <th class="text-center">TANDA TANGAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($peserta_tender_pq_penawaran as $key => $value) { ?>
                            <tr>
                                <td class="text-center"><?= $i++ ?></td>
                                <td><?= $value['nama_usaha'] ?></td>
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