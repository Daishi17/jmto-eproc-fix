<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pengumuman Pemenang Tender
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

    return $pecahkan[0] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' .  $pecahkan[2];
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

<body style="font-size: 18px; text-align:justify">
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
                        <td><?= $row_rup['ba_pemenang_no'] ?></td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td width="100px">Lampiran</td>
                        <th>&ensp;&ensp;:&ensp;&ensp;</th>
                        <td> 1 (satu) Lembar</td>
                    </tr>
                </table>
            </div>
            <div class="float-right">
                Jakarta, <?= date('d', strtotime($row_rup['ba_pemenang_tgl'])) ?> <?= bln_indo(date('m', strtotime($row_rup['ba_pemenang_tgl']))) ?> <?= date('Y', strtotime($row_rup['ba_pemenang_tgl'])) ?>
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
                        Di Tempat
                    </p>
                </div>
            </div>

            <div class="row mt-2">
                <div class="container">
                    Perihal : <b><u>Pengumuman Pemenang</u></b>
                </div>
            </div>

            <br>
            Dengan hormat,
            <br>


            <div class="row mt-2">
                <div class="container">

                </div>
            </div>
            <p>Sehubungan dengan Surat Permohonan Penetapan/Pengesahan Pemenang Nomor : <?= $row_rup['ba_pemenang_no'] ?> tanggal <?= date('d', strtotime($row_rup['ba_pemenang_tgl'])) ?> <?= bln_indo(date('m', strtotime($row_rup['ba_pemenang_tgl']))) ?> <?= date('Y', strtotime($row_rup['ba_pemenang_tgl'])) ?> telah mendapatkan Persetujuan <?= $row_rup['ba_pemenang_barang_jasa'] ?> PT Jasamarga Tollroad Operator, dengan ini kami sampaikan <b>PEMENANG</b> untuk <b> <?= $row_rup['nama_rup'] ?> </b> adalah sebagai berikut :</p>

            <div class="card">
                <div class="card-header">
                    <center>
                        <b>PEMENANG</b>
                    </center>
                </div>
                <div class="card-body">
                    <table>
                        <tr>
                            <td>Nama Perusahaan</td>
                            <td><label for="" style="margin-left:150px;margin-right:20px">:</label></td>
                            <td><?= $get_mengikuti['nama_usaha'] ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><label for="" style="margin-left:150px;margin-right:20px">:</label></td>
                            <td><?= $get_mengikuti['alamat'] ?></td>
                        </tr>

                        <?php if ($get_mengikuti_deal_nego['ev_terendah_harga']) { ?>
                            <?php if ($get_mengikuti_deal_nego['sts_deal_negosiasi'] == 'deal') { ?>
                                <tr>
                                    <td>Harga Pemenang</td>
                                    <td><label for="" style="margin-left:150px;margin-right:20px">:</label></td>
                                    <td>Rp. <?= number_format($get_mengikuti_deal_nego['total_hasil_negosiasi'], 2, ",", "."); ?> (<?= penyebut($get_mengikuti_deal_nego['total_hasil_negosiasi']) ?> Rupiah)</td>
                                </tr>
                            <?php } else { ?>
                                <tr>
                                    <td>Harga Pemenang</td>
                                    <td><label for="" style="margin-left:150px;margin-right:20px">:</label></td>
                                    <td>Rp. <?= number_format($get_mengikuti_deal_nego['ev_terendah_harga'], 2, ",", "."); ?> (<?= penyebut($get_mengikuti_deal_nego['ev_terendah_harga']) ?> Rupiah)</td>
                                </tr>
                            <?php } ?>

                        <?php } else { ?>

                            <?php if ($get_mengikuti_deal_nego['sts_deal_negosiasi'] == 'deal') { ?>
                                <tr>
                                    <td>Harga Pemenang</td>
                                    <td><label for="" style="margin-left:150px;margin-right:20px">:</label></td>
                                    <td>Rp. <?= number_format($get_mengikuti_deal_nego['total_hasil_negosiasi'], 2, ",", "."); ?> (<?= penyebut($get_mengikuti_deal_nego['total_hasil_negosiasi']) ?> Rupiah)</td>
                                </tr>
                            <?php } else { ?>
                                <tr>
                                    <td>Harga Pemenang</td>
                                    <td><label for="" style="margin-left:150px;margin-right:20px">:</label></td>
                                    <td>Rp. <?= number_format($get_mengikuti['nilai_penawaran'], 2, ",", "."); ?> (<?= penyebut($get_mengikuti['nilai_penawaran']) ?> Rupiah)</td>
                                </tr>
                            <?php } ?>

                        <?php } ?>



                        <tr>
                            <td>Jangka Waktu<br> Pelaksanaan</td>
                            <td><label for="" style="margin-left:150px;margin-right:20px">:</label></td>
                            <td><?= $row_rup['jangka_waktu_hari_pelaksanaan'] ?> (<?= penyebut($row_rup['jangka_waktu_hari_pelaksanaan']) ?>) Bulan</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>Atas perhatian Saudara, kami mengucapkan terima kasih.</p>

            <label for=""><b>Hormat kami,</b></label>
            <br>
            <br>
            <br>
            &ensp;&ensp;&ensp;TTD
            <br>
            <br>
            <br>
            <label for=""><b>Panitia Pengadaan</b></label>
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
            <!-- <br>
            <br>
            <br>
            <br>
            <br>
            <center><b><?= $row_rup['nama_rup'] ?></b></center>
            <label for=""><b></b> Peserta Penawaran </label>
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
            </table> -->

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