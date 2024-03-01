<!DOCTYPE html>
<html lang="en">

<head>
    <title>Undangan Presentasi
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
            <div class="float-left">
                <table>
                    <tr>
                        <td width="100px">Nomor</td>
                        <th>&ensp;&ensp;:&ensp;&ensp;</th>
                        <td><?= $row_rup['undangan_rapat_no'] ?></td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td width="100px">Hal</td>
                        <th>&ensp;&ensp;:&ensp;&ensp;</th>
                        <td>Undangan Presentasi</td>
                    </tr>
                </table>
            </div>
            <div class="float-right">
                Jakarta, <?= tgl_indo($row_rup['undangan_rapat_tgl']) ?>
            </div>
            <br>
            <br>
            <div class="row mt-3">
                <div class="container">
                    <p>
                        <b>Kepada Yth.</b>
                        <br>
                        <b>Peserta Penawran <?= $row_rup['nama_metode_pengadaan'] ?></b>
                        <br>
                        <b><?= $row_rup['nama_rup'] ?></b>
                        <br>
                        Di <b>Tempat</b>
                    </p>
                </div>
            </div>

            <p>Sehubungan dengan kegiatan <?= $row_rup['nama_jadwal_pengadaan'] ?> <b><?= $row_rup['nama_rup'] ?> PT Jasamarga Tollroad Operator</b>, dengan ini kami mengundang Saudara untuk menyampaikan Presentasi Teknis pada :</p>

            <table>
                <tr>
                    <td>Hari / Tanggal</td>
                    <td> : <?= $row_rup['undangan_rapat_haritgl'] ?></td>
                </tr>
                <tr>
                    <td>Tempat </td>
                    <td> : <b> <?= $row_rup['undangan_rapat_tempat'] ?></b></td>
                </tr>
                <tr>
                    <td>Waktu</td>
                    <td> : <?= $row_rup['undangan_rapat_waktu'] ?></td>
                </tr>
            </table>
            <br>
            <p><b>Ketentuan : </b></p>
            <ol>
                <li>Perwakilan Management dan Personil yang <b>WAJIB</b> hadir, terdiri dari :</li>
                <ol type="a">
                    <li>Perwakilan Management yang dapat memberikan Keputusan strategis setingkat Direksi.</li>
                    <li>Personil/PIC/Project Manager/Kepala Pelaksana yang ditugaskan pada saat Proses Pengadaan atau Pelaksanaan Kontrak Pekerjaan</li>
                </ol>
                <li>
                    Apabila Perwakilan Management dan Personil/PIC sesuai tersebut di atas <b>TIDAK HADIR</b>, maka akan berpengaruh terhadap hasil penilaian Presentasi Teknis.
                </li>
                <li>
                    Mohon agar mempersiapkan segala kebutuhannya 30 menit sebelum jadwal presentasi dimulai.
                </li>
                <li>
                    Aplikasi yang digunakan untuk <b>Virtual Meeting/Video Conference</b> menggunakan <b>Aplikasi Zoom</b>
                </li>
                <li>
                    Segmen Acara Presentasi Teknis :
                    <ol type="a">
                        <li>Sesi 1 : Pengisian Kuisioner oleh Calon Rekanan : <?= $row_rup['undangan_rapat_sesi1'] ?></li>
                        <li>Sesi 2 : Waktu Persiapan (Persiapan Jaringan Internet, Audio dan Screen Presentasi Laptop) & Absensi kehadiran Perwakilan Perusahaan : <?= $row_rup['undangan_rapat_sesi2'] ?> (Dilakukan bersamaan saat pengisian kuesioner)</li>
                        <li>Sesi 3 : Presentasi Teknis Profil Perusahaan dan Metode Pelaksanaan : <?= $row_rup['undangan_rapat_sesi3'] ?> </li>
                        <li>Sesi 4 : Klarifikasi Jawaban dari Kuisioner : <?= $row_rup['undangan_rapat_sesi4'] ?> </li>
                        <li>Tidak ada penambahan waktu jika ada kendala dari Penyedia Jasa</li>
                    </ol>
                </li>
            </ol>
            <p><b>Demikian kami sampaikan, atas perhatian Saudara, diucapkan terima kasih.</b></p>

            <label for="">PT Jasamarga Tollroad Operator</label>
            <br>
            <br>
            <br>
            TTD
            <br>
            <br>
            <br>
            <label for="">Panitia Pengadaan</label>

            <br>
            <br>
            Tembusan :
            <ul>
                <li><i>Panitia Pengadaan</i></li>
                <li><i>Tim Evaluator</i></li>
            </ul>
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
            <b>Hari / Tanggal : <?= $row_rup['undangan_rapat_haritgl'] ?></b>
            <br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Peserta Penawaran</th>
                        <th>Paket Pekerjaan</th>
                        <th>Waktu</th>
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
                            <td><?= $i++ ?></td>
                            <td><?= $nama_perusahaan ?></td>
                            <td><?= $row_rup['nama_rup'] ?></td>
                            <td><?= $value['waktu_undangan_rapat'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <td colspan="4">
                        Keterangan : <br>
                        <ol type="a">
                            <li>Materi Presentasi dikirimkan selambatnya <?= $row_rup['undangan_rapat_waktu_materi'] ?></li>
                            <li>Penyedia WAJIB mengirimkan butir a di atas melalui email generalaffairdept.jmto@gmail.com</li>
                            <li>Apabila ada perubahan jadwal akan diberitahukan kemudian.</li>
                        </ol>

                    </td>
                </tfoot>
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