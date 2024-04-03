<!DOCTYPE html>
<html lang="en">

<head>
    <title>BERITA ACARA
        EVALUASI DAN NEGOSIASI HARGA

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

<?php function bln_indo($bulan)
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
} ?>
<?php


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
                <h4 class="text-uppercase font-weight-bold" style="line-height: 1;">PANITIA PENGADAAN</h4>
                <h5 class="text-uppercase font-weight-bold" style="line-height: 1;"><?= $row_rup['nama_rup'] ?> PT JASA MARGA TOLLROAD OPERATOR</h5>
            </center>
            <hr style="height: 1px; color: #333; background-color: #333;">
            <center>
                <div style="font-size:18px">
                    <label class="font-weight-bold">BERITA ACARA</label>
                    <br>
                    <label class="font-weight-bold">KLARIFIKASI, EVALUASI DAN NEGOSIASI HARGA</label>
                    <br>
                    <label class="font-weight-bold">Nomor : <?= $row_rup['ba_negosiasi_no'] ?></label>

                </div>
            </center>
            <div class="container">
                <p style="text-align:justify; font-size:18px">
                    Pada Hari ini <b><?= $row_rup['ba_negosiasi_hari'] ?></b>,
                    Tanggal <b class="text-capitalize"><?= terbilang(date('d', strtotime($row_rup['ba_negosiasi_tgl']))) ?></b>,
                    Bulan <b class="text-capitalize"> <?= bln_indo(date('m', strtotime($row_rup['ba_negosiasi_tgl']))) ?></b>,
                    Tahun <b> <?= terbilang(date('Y', strtotime($row_rup['ba_negosiasi_tgl']))) ?> (<?= date('d-m-Y', strtotime($row_rup['ba_negosiasi_tgl'])) ?>)</b>, pukul <?= $row_rup['ba_negosiasi_jam'] ?> WIB bertempat di PT. Jasamarga Tollroad Operator di Gedung Cabang Jagorawi Lt. 4, Plaza Tol Taman Mini Indonesia Indah, kami yang bertandatangan di bawah ini selaku Panitia Pengadaan Barang dan Jasa yang dibentuk berdasarkan Surat Keputusan Direksi Nomor : <?= $row_rup['ba_sk_panitia'] ?> tanggal <?= $row_rup['tgl_ba_sk_panitia'] ?>, selanjutnya Panitia melakukan Evaluasi dan negosiasi harga <?= $row_rup['nama_rup'] ?> PT Jasamarga Tollroad Operator dengan hasil sebagai berikut :
                </p>
                <p style="text-align:justify; font-size:18px">
                    telah menerima Dokumen Penawaran dari para calon penyedia jasa dan dilakukan Rapat Pembukaan Dokumen Penawaran <?php if ($row_rup['id_jadwal_tender'] == 1 || $row_rup['id_jadwal_tender'] == 9) { ?>
                    <?php } else { ?>
                        Administrasi dan Teknis (File I)
                    <?php }
                    ?> untuk Pekerjaan <?= $row_rup['nama_rup'] ?> PT Jasamarga Tollroad Operator di Ruang Rapat PT Jasamarga Tollroad Operator dengan rincian sebagai berikut:
                </p>

                <ol type="I">
                    <li>
                        <p><b> PESERTA PENAWARAN </b></p>
                        <table>
                            <tr>

                                <?php
                                $subs_string = substr($deal_nego['nama_usaha'], 0, 2);
                                if ($subs_string == 'PT' || $subs_string == 'CV' || $subs_string == 'Koperasi') {
                                    $nama_perusahaan = $deal_nego['nama_usaha'];
                                } else {
                                    if ($deal_nego['bentuk_usaha'] == 'Perseroan Terbatas (PT)') {
                                        $nama_perusahaan = 'PT ' . $deal_nego['nama_usaha'];
                                    } else if ($deal_nego['bentuk_usaha']  == 'Commanditaire Vennootschap (CV)') {
                                        $nama_perusahaan = 'CV ' . $deal_nego['nama_usaha'];
                                    } else if ($deal_nego['bentuk_usaha']  == 'Koperasi') {
                                        $nama_perusahaan = $deal_nego['nama_usaha'];
                                    }
                                }
                                ?>
                                <td>Nama Perusahaan</td>
                                <th>: <?= $nama_perusahaan ?></th>
                            </tr>
                            <tr>
                                <td>Harga Penawaran</td>
                                <?php if ($row_rup['id_jadwal_tender'] == 1 || $row_rup['id_jadwal_tender'] == 9) { ?>
                                    <th>: Rp. <?= number_format($deal_nego['ev_terendah_harga'], 2, ",", ".") ?> (<i><?= terbilang($deal_nego['ev_terendah_harga']) ?> Rupiah</i>)</th>
                                <?php } else { ?>
                                    <th>: Rp. <?= number_format($deal_nego['nilai_penawaran'], 2, ",", ".") ?> (<i><?= terbilang($deal_nego['nilai_penawaran']) ?> Rupiah</i>)</th>
                                <?php } ?>

                            </tr>
                        </table>
                    </li>
                    <br>
                    <li>
                        <p><b>Penetapan Hasil Evaluasi dan Negosiasi Harga : </b></p>
                        <ol>
                            <li>
                                Berdasarkan hasil penetapan harga penawar, Panitia melakukan Evaluasi dan Negosiasi Harga penawaran dari <?= $row_rup['ba_negosiasi_vendor'] ?> dengan nilai
                                <?php if ($row_rup['id_jadwal_tender'] == 1 || $row_rup['id_jadwal_tender'] == 9) { ?>
                                    <b>Rp. <?= number_format($deal_nego['ev_terendah_harga'], 2, ",", ".") ?></b>
                                    (<i><?= terbilang($deal_nego['ev_terendah_harga']) ?> Rupiah</i>)
                                <?php } else { ?>
                                    <b>Rp. <?= number_format($deal_nego['nilai_penawaran'], 2, ",", ".") ?></b>
                                    (<i><?= terbilang($deal_nego['nilai_penawaran']) ?> Rupiah</i>)
                                <?php } ?>

                                sudah termasuk PPn 11%, serta berdasarkan harga perkiraan sendiri, maka Panitia dan <?= $row_rup['ba_negosiasi_vendor'] ?> telah melakukan kesepakatan bersama dengan menetapkan harga <?= $row_rup['nama_rup'] ?> adalah <b>Rp. <?= number_format($deal_nego['total_hasil_negosiasi'], 2, ",", ".") ?></b> (<i><?= terbilang($deal_nego['total_hasil_negosiasi']) ?> Rupiah</i>)
                            </li>
                            <li>
                                Dengan demikian Panitia mengusulkan kepada <?= $row_rup['ba_negosiasi_usulan_jabatan'] ?> Selaku Pengguna Jasa PT Jasamarga Tollroad Operator bahwa <?= $row_rup['ba_negosiasi_vendor'] ?> berhak untuk melaksanakan <?= $row_rup['nama_rup'] ?> PT Jasamarga Tollroad Operator.
                            </li>
                            <li>
                                Untuk selanjutnya apabila disetujui oleh <?= $row_rup['ba_negosiasi_usulan_jabatan'] ?> Selaku Pengguna Jasa PT Jasamarga Tollroad Operator dapat ditindak lanjuti dengan pembuatan perjanjian kerja sama <?= $row_rup['nama_rup'] ?> PT Jasamarga Tollroad Operator.
                            </li>
                        </ol>
                    </li>
                </ol>
                <p>Demikian Berita Acara Evaluasi dan Negosiasi Harga ini dibuat dan ditandatangani sebagaimana tanggal tersebut diatas, dan akan disampaikan kepada <?= $row_rup['ba_negosiasi_usulan_jabatan'] ?> Selaku Pengguna Jasa PT Jasamarga Tollroad Operator untuk pengesahannya.</p>
                <!-- <div class="float-right" style="margin-left:800px">
                    <img width="500px" src="<?= base_url('assets/logo_ba/footer.png') ?>" alt="logo" style="opacity: 0.5;">
                </div> -->
                <br>
                <br>
                <!-- <br> -->
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
                    <b> <?= $row_rup['nama_rup'] ?></b>
                </center>
                <br>
                <b>Panitia Pengadaan</b>
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
                                    <?php if ($value['sts_ba_negosiasi'] == 1) { ?>
                                        <span class="badge bg-success text-white">Setuju</span>
                                    <?php  } else if ($value['sts_ba_negosiasi'] == 2) { ?>
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
                            <th>No</th>
                            <th>Perusahaan</th>
                            <th>Jabatan</th>
                            <th>TTD</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($deal as $key => $value) { ?>
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
                                <td><?= $i++ ?></td>
                                <td><?= $nama_perusahaan  ?></td>
                                <td><?= $value['nama_jabatan_ba_nego'] ?></td>
                                <?php if ($value['persetujuan_ba_nego']) { ?>
                                    <td class="text-center"><span class="badge bg-success">Setuju</span></td>
                                <?php } else { ?>
                                    <td class="text-center"><span class="badge bg-danger">Belum Di Checklist</span></td>
                                <?php }  ?>
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