<!DOCTYPE html>
<html lang="en">

<head>
    <title>UNDANGAN PENAWARAN TENDER
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

<body style="font-size: 13px;">
    <div class="container">
        <form action="javascript:;" method="POST" id="form_ba_pasca1">
            <div class="container-fluid">
                <img class="pull-right" alt="LOGO" src="<?= base_url() ?>assets/img/logo_asli.png" width="30%" />
            </div>
            <br><br>
            <div class="float-left">
                Nomor : <?= $row_rup['no_undangan_penawaran'] ?>
                <br>
                Hal : <b>Undangan Presentasi</b>
            </div>
            <div class="float-right">
                Jakarta, <?= tgl_indo($row_rup['no_undangan_tgl']) ?>
            </div>
            <br>
            <br>
            <div class="row mt-3">
                <div class="container">
                    <p>
                        <b>Kepada Yth.</b>
                        <br>
                        <b>Peserta Penawran Tender Umum/Terbatas</b>
                        <br>
                        <b><?= $row_rup['nama_rup'] ?></b>
                        <br>
                        Di <b>Tempat</b>
                    </p>
                </div>
            </div>

            <p>Berdasarkan Pengumuman Hasil Kualifikasi Nomor <?= $row_rup['no_undangan_penawaran'] ?> tanggal 25 Juli 2023 untuk Tender Umum dengan Pra Kualifikasi Pengadaan Pekerjaan Jasa Pengemudi Shuttle Ruas Jabotabekdung, Jawa Tengah dan Jawa Timur PT Jasamarga Tollroad Operator dengan ini kami mengundang Saudara untuk mengikuti kegiatan Penawaran dengan jadwal sebagai berikut:</p>

            <ol>
                <li>
                    <b>Download Dokumen Pengadaan</b><br>
                    <table>
                        <tr>
                            <th>Tanggal </th>
                            <th>: <?= date('d-m-Y', strtotime($jadwal_download_dokumen_pengadaan['waktu_mulai'])) ?> </th>
                        </tr>

                        <tr>
                            <th>Waktu</th>
                            <th>: <?= date('H:i', strtotime($jadwal_download_dokumen_pengadaan['waktu_mulai'])) ?> - <?= date('H:i', strtotime($jadwal_download_dokumen_pengadaan['waktu_selesai'])) ?> WIB</th>
                        </tr>

                        <tr>
                            <th>Tempat </th>
                            <th>: Melalui Aplikasi E-Tender </th>
                        </tr>
                    </table>
                </li>
                <br>
                <li>
                    <b>Rapat Penjelasan (Aanwijzing)</b><br>
                    <table>
                        <tr>
                            <th>Tanggal </th>
                            <th>: <?= date('d-m-Y', strtotime($jadwal_aanwijzing['waktu_mulai'])) ?> </th>
                        </tr>

                        <tr>
                            <th>Waktu</th>
                            <th>: <?= date('H:i', strtotime($jadwal_aanwijzing['waktu_mulai'])) ?> - <?= date('H:i', strtotime($jadwal_aanwijzing['waktu_selesai'])) ?> WIB</th>
                        </tr>

                        <tr>
                            <th>Tempat </th>
                            <th>: Melalui Aplikasi E-Tender </th>
                        </tr>
                    </table>
                </li>
                <br>
                <li>
                    <b>Pemasukan dan Pembukaan Penawaran Sampul I (Administrasi dan Teknis)</b><br>
                    <table>
                        <tr>
                            <th>Nilai Jaminan </th>
                            <th>: <?= $row_rup['nilai_jaminan_penawaran'] ?></th>
                        </tr>

                        <tr>
                            <th>Masa Berlaku </th>
                            <th>: <?= $row_rup['masa_berlaku_penawaran'] ?></th>
                        </tr>

                        <tr>
                            <th>Tempat </th>
                            <th>: Melalui Aplikasi E-Tender </th>
                        </tr>
                    </table>
                </li>
                <br>
                <li>
                    <b>Pemasukan dan Pembukaan Penawaran Sampul I (Administrasi dan Teknis)</b><br>
                    <table>
                        <tr>
                            <th>Tanggal </th>
                            <th>: <?= date('d-m-y', strtotime($jadwal_upload_dokumen_penawaran['waktu_mulai'])) ?> </th>
                        </tr>

                        <tr>
                            <th>Waktu</th>
                            <th>: <?= date('H:i', strtotime($jadwal_upload_dokumen_penawaran['waktu_mulai'])) ?> - <?= date('H:i', strtotime($jadwal_upload_dokumen_penawaran['waktu_selesai'])) ?> WIB</th>
                        </tr>


                        <tr>
                            <th>Produk </th>
                            <th>: Bank Garansi sebagaimana yang ditetapkan oleh Menteri Keuangan tentang Bank-Bank yang mengatur penerbitan Bank Garansi </th>
                        </tr>
                    </table>
                </li>
            </ol>

            <p>Demikian kami sampaikan, atas perhatian Saudara, diucapkan terima kasih.</p>

            <label for=""><b>PT Jasamarga Tollroad Operator</b></label>
            <br>
            <br>
            <br>
            TTD
            <br>
            <br>
            <br>
            <label for=""><b></b>Daftar Peserta Penawaran <?= $row_rup['nama_rup'] ?></label>

            <br>
            <br>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">NO</th>
                        <th class="text-center">PERUSAHAAN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($peserta_tender_pq as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><?= $i++ ?></td>
                            <td><?= $value['nama_usaha'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

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