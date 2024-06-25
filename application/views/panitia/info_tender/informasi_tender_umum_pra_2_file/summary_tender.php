<!DOCTYPE html>
<html lang="en">

<head>
    <title>Summary PENGADAAN : <?= $row_rup['kode_rup'] ?></title>
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
    <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=PrD0EhmdGBnsLoK_C0halmof3SESaCjCohcNzZSMPfvaG9Bwi_JpaN_DkQzKmoURxcAXOivaLSpjHeoi0l0qAHeFhHW-4Hy8SYz2tMViOuS6V4DyE59APgMyv09VIMbC" charset="UTF-8"></script>
    <script src="https://eproc.jmtm.co.id/assets/js/sweetalert.min.js" media="all"></script>

    <script type="text/javascript" src="https://eproc.jmtm.co.id/assets/boostrapnew/dist/js/jquery.min.js" media="all"></script>
    <style>
        @page {
            size: landscape;
        }

        .btn-grad100 {
            background-image: linear-gradient(to right, #ee0979 0%, #ff6a00 51%, #ee0979 100%)
        }

        .btn-grad100 {
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;
            box-shadow: 0 0 20px #eee;
        }

        .btn-grad100:hover {
            background-position: right center;
            color: #fff;
            box-shadow: 0 0 30px #ee0979;
            text-decoration: none;
        }

        .btn-grad101 {
            background-image: linear-gradient(to right, #ee0979 0%, #ff6a00 51%, #ee0979 100%)
        }

        .btn-grad7 {
            background-image: linear-gradient(to right, #00d2ff 0%, #3a7bd5 51%, #00d2ff 100%)
        }

        .btn-grad7 {
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;
            box-shadow: 0 0 20px #eee;
        }

        .btn-grad7:hover {
            background-position: right center;
            /* change tde direction of tde change here */
            color: #00d2ff;
            text-decoration: none;
            box-shadow: 0 0 40px #00d2ff;
        }


        .btn-grad101 {
            width: 30px;
            height: 30px;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;
            box-shadow: 0 0 20px #eee;
            border-radius: 5px;
            display: block;
            border: none;
        }

        .btn-grad101:hover {
            background-position: right center;
            color: #fff;
            box-shadow: 0 0 30px #ee0979;
            text-decoration: none;
        }

        .user_img_msg {
            height: 100% !important;
            width: 100% !important;
            /* border: 1.5px solid #f5f6fa; */
        }

        #textnya {
            font-size: large;
            font: message-box;
            font-weight: bolder;
        }

        .profileku {
            width: 100% !important;
            height: 65%;
            border-radius: 10px;
            background: rgb(7, 6, 18);
            background: linear-gradient(90deg, rgba(30, 90, 40, 1) 0%, rgba(42, 41, 100, 1) 100%);
        }

        .user_img_ku {
            height: 40px;
            width: 40px;
            border: 1.5px solid #f5f6fa;
        }


        .chat {
            margin-top: auto;
            margin-bottom: auto;
        }

        .card {

            height: 500px;
            border-radius: 15px !important;

        }

        .contacts_body {
            padding: 0.75rem 0 !important;
            overflow-y: auto;
            white-space: nowrap;
        }

        .msg_card_body {
            overflow-y: auto;
        }

        .card-header {
            border-radius: 15px 15px 0 0 !important;
            border-bottom: 0 !important;
        }

        .card-footer {
            border-radius: 0 0 15px 15px !important;
            border-top: 0 !important;
        }

        .container {
            align-content: center;
        }

        .search {
            border-radius: 15px 0 0 15px !important;
            background: rgb(209, 226, 227);
            background: linear-gradient(90deg, rgba(209, 226, 227, 1) 5%, rgba(255, 209, 0, 0.30015756302521013) 86%);
            border: 0 !important;
            color: black !important;
        }

        .search:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }

        .type_msg {
            background: rgb(7, 6, 18);
            background: linear-gradient(90deg, rgba(30, 90, 40, 1) 0%, rgba(42, 41, 100, 1) 100%);
            border: 0 !important;
            color: white !important;
            height: 60px !important;
            overflow-y: auto;
        }

        .type_msg:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }

        .attach_btn {
            border-radius: 15px 0 0 15px !important;
            background: rgb(7, 6, 18);
            background: linear-gradient(90deg, rgba(30, 90, 40, 1) 0%, rgba(42, 41, 100, 1) 100%);
            border: 0 !important;
            color: white !important;
            cursor: pointer;
        }

        .send_btn {
            border-radius: 0 15px 15px 0 !important;
            background: rgb(7, 6, 18);
            background: linear-gradient(90deg, rgba(30, 90, 40, 1) 0%, rgba(42, 41, 100, 1) 100%);
            border: 0 !important;
            color: white !important;
            cursor: pointer;
        }

        .search_btn {
            border-radius: 0 15px 15px 0 !important;
            background: rgb(7, 6, 18);
            background: linear-gradient(90deg, rgba(30, 90, 40, 1) 0%, rgba(42, 41, 100, 1) 100%);
            border: 0 !important;
            color: white !important;
            cursor: pointer;
        }

        .contacts {
            list-style: none;
            padding: 0;
        }

        .contacts li {
            width: 100% !important;
            padding: 5px 10px;
            margin-bottom: 15px !important;
        }

        .active-angga {
            background: rgb(7, 6, 18);
            background: linear-gradient(90deg, rgba(30, 90, 40, 1) 0%, rgba(42, 41, 100, 1) 100%);
        }

        .active-anggi {
            background-color: #c23616 !important;
        }

        .user_img {
            height: 70px;
            width: 70px;
            border: 1.5px solid #f5f6fa;

        }

        .user_img_msg {
            height: 40px;
            width: 40px;
            border: 1.5px solid #f5f6fa;

        }

        .img_cont {
            position: relative;
            height: 70px;
            width: 70px;
        }

        .img_cont_msg {
            height: 40px;
            width: 40px;
        }

        .online_icon {
            position: absolute;
            height: 15px;
            width: 15px;
            background-color: #4cd137;
            border-radius: 50%;
            bottom: 0.2em;
            right: 0.4em;
            border: 1.5px solid white;
        }

        .offline {
            background-color: #c23616 !important;
        }

        .user_info {
            margin-top: auto;
            margin-bottom: auto;
            margin-left: 15px;
        }

        .user_info_ku {
            /* margin-top: auto; */
            margin-bottom: auto;
            margin-left: 15px;
        }

        .user_info_ku span {
            font-size: 20px;
            color: white;
        }


        .user_info span {
            font-size: 20px;
            color: white;
        }

        .user_info_ku p {
            font-size: 10px;
            color: rgba(255, 255, 255, 0.6);
        }

        .user_info p {
            font-size: 10px;
            color: rgba(255, 255, 255, 0.6);
        }

        .video_cam {
            margin-left: 50px;
            margin-top: 5px;
        }

        .video_cam span {
            color: white;
            font-size: 20px;
            cursor: pointer;
            margin-right: 20px;
        }

        .msg_cotainer {
            margin-top: auto;
            margin-bottom: auto;
            margin-left: 10px;
            border-radius: 25px;
            background-color: #82ccdd;
            padding: 10px;
            position: relative;
        }

        .msg_cotainer_send {
            margin-top: auto;
            margin-bottom: auto;
            margin-right: 10px;
            border-radius: 25px;
            background-color: #78e08f;
            padding: 10px;
            position: relative;
        }

        .msg_time {
            position: absolute;
            left: 0;
            bottom: -17px;
            color: rgba(255, 255, 255, 0.5);
            font-size: 10px;
        }

        .msg_time_send {
            position: absolute;
            right: 0;
            bottom: -15px;
            color: rgba(255, 255, 255, 0.5);
            font-size: 10px;
        }

        .msg_head {
            position: relative;
        }

        #action_menu_btn {
            position: absolute;
            right: 10px;
            top: 10px;
            color: white;
            cursor: pointer;
            font-size: 20px;
        }

        .action_menu {
            z-index: 1;
            position: absolute;
            padding: 15px 0;
            background: white;
            color: white;
            border-radius: 15px;
            top: 30px;
            right: 15px;
            display: none;
        }

        .action_menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .action_menu ul li {
            width: 100%;
            padding: 10px 15px;
            margin-bottom: 5px;
        }

        .action_menu ul li i {
            padding-right: 10px;

        }

        .action_menu ul li:hover {
            cursor: pointer;
            background: white;
        }
    </style>
</head>

<body style="font-size: 13px;">
    <div class="container">
        <br>
        <input type="hidden" value="<?= $row_rup['id_url_rup'] ?>" name="id_url_rup">
        <input type="hidden" value="<?= $row_rup['id_rup'] ?>" name="id_rup">

        <input type="hidden" name="url_upload_sanggahan_pra" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'upload_sanggahan_pra/') ?>">
        <input type="hidden" name="url_hapus_sanggahan_pra" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'hapus_sanggahan_pra/') ?>">
        <input type="hidden" name="url_get_sanggahan_pra" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_sanggahan_pra') ?>">
        <input type="hidden" name="url_open_sanggahan_pra" value="https://drtproc.jmto.co.id/file_paket/<?= $row_rup['nama_rup'] ?>/">
        <input type="hidden" name="url_open_sanggahan_pra_panitia" value="<?= base_url('file_paket/' . $row_rup['nama_rup'] . '/SANGGAHAN_PRAKUALIFIKASI' . '/') ?>">

        <input type="hidden" name="url_upload_sanggahan_akhir" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'upload_sanggahan_akhir/') ?>">
        <input type="hidden" name="url_hapus_sanggahan_akhir" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'hapus_sanggahan_akhir/') ?>">
        <input type="hidden" name="url_get_sanggahan_akhir" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_sanggahan_akhir') ?>">
        <input type="hidden" name="url_open_sanggahan_akhir" value="https://drtproc.jmto.co.id/file_paket/<?= $row_rup['nama_rup'] ?>/">
        <input type="hidden" name="url_open_sanggahan_akhir_panitia" value="<?= base_url('file_paket/' . $row_rup['nama_rup'] . '/SANGGAHAN_AKHIR' . '/') ?>">

        <input type="hidden" name="url_get_vendor_negosiasi" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_vendor_negosiasi') ?>">
        <input type="hidden" name="id_rup" value="<?= $row_rup['id_rup'] ?>">
        <input type="hidden" name="url_simpan_link_negosiasi" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'simpan_link_negosiasi') ?>">
        <input type="hidden" name="url_post_hasil_negosiasi" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'buat_hasil_negosiasi') ?>">
        <input type="hidden" name="url_get_vendor_row" value="<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_row_vendor_negosiasi') ?>">

        <form action="" id="form_data_PENGADAAN">
            <div class="content">
                <div class="container-fluid">
                    <img class="pull-right" alt="LPSE" src="<?= base_url('assets/img/logo_asli.png') ?>" width="15%" />
                    <img class="pull-left" alt="LPSE" src="https://eproc.jmtm.co.id/assets/img/bumn.png" width="15%" style="margin-left: 69%;" />
                </div>
                <div class="content tab-content">
                    <table class="table table-bordered">
                        <h4 class="text-center">INFORMASI PENGADAAN</h4>
                        <tr>
                            <th>Kode PENGADAAN</th>
                            <td><?= $row_rup['kode_rup'] ?></td>
                        </tr>
                        <tr>
                            <th>Nama RUP</th>
                            <td><?= $row_rup['nama_rup'] ?></td>
                        </tr>
                        <tr>
                            <th>Persyaratan Kualifikasi Pengadaan</th>
                            <td>
                                <center>
                                    <h6 for="">Izin Usaha</h6>
                                </center>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Keterangan Jenis Izin Usaha</th>
                                            <th>Tahun Berlaku</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($persyaratan_izin_usaha['sts_checked_siup'] == 1) { ?>
                                            <tr>
                                                <td>Surat Izin Usaha Perdagangan (SIUP)</td>
                                                <?php if ($persyaratan_izin_usaha['sts_masa_berlaku_siup'] == 1) { ?>
                                                    <td><?= date('d-m-Y', strtotime($persyaratan_izin_usaha['tgl_berlaku_siup'])) ?></td>
                                                <?php } else { ?>
                                                    <td>Seumur Hidup</td>
                                                <?php } ?>

                                            </tr>
                                        <?php } ?>


                                        <?php if ($persyaratan_izin_usaha['sts_checked_nib'] == 1) { ?>
                                            <tr>
                                                <td>Nomor Induk Berusaha (NIB/TDP)</td>
                                                <?php if ($persyaratan_izin_usaha['sts_masa_berlaku_nib'] == 1) { ?>
                                                    <td><?= date('d-m-Y', strtotime($persyaratan_izin_usaha['tgl_berlaku_nib'])) ?></td>
                                                <?php } else { ?>
                                                    <td>Seumur Hidup</td>
                                                <?php } ?>

                                            </tr>
                                        <?php } ?>

                                        <?php if ($persyaratan_izin_usaha['sts_checked_sbu'] == 1) { ?>
                                            <tr>
                                                <td>Sertifikat Badan Usaha (SBU)</td>
                                                <?php if ($persyaratan_izin_usaha['sts_masa_berlaku_sbu'] == 1) { ?>
                                                    <td><?= date('d-m-Y', strtotime($persyaratan_izin_usaha['tgl_berlaku_sbu'])) ?></td>
                                                <?php } else { ?>
                                                    <td>Seumur Hidup</td>
                                                <?php } ?>

                                            </tr>
                                        <?php } ?>


                                        <?php if ($persyaratan_izin_usaha['sts_checked_siujk'] == 1) { ?>
                                            <tr>
                                                <td>Surat Izin Jasa Konstruksi (SIUJK)</td>
                                                <?php if ($persyaratan_izin_usaha['sts_masa_berlaku_siujk'] == 1) { ?>
                                                    <td><?= date('d-m-Y', strtotime($persyaratan_izin_usaha['tgl_berlaku_siujk'])) ?></td>
                                                <?php } else { ?>
                                                    <td>Seumur Hidup</td>
                                                <?php } ?>

                                            </tr>
                                        <?php } ?>

                                        <?php if ($persyaratan_izin_usaha['sts_checked_skdp'] == 1) { ?>
                                            <tr>
                                                <td>Surat Keterangan Domisili Perusahaan (SKDP)</td>
                                                <?php if ($persyaratan_izin_usaha['sts_masa_berlaku_skdp'] == 1) { ?>
                                                    <td><?= date('d-m-Y', strtotime($persyaratan_izin_usaha['tgl_berlaku_skdp'])) ?></td>
                                                <?php } else { ?>
                                                    <td>Seumur Hidup</td>
                                                <?php } ?>

                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                                <center>
                                    <h6 for="">Klasifikasi Buku Lapang Usaha Indonesia (KBLI)</h6>
                                </center>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Kode KBLI</th>
                                            <th>Keterangan Jenis KBLI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($persyaratan_kbli as $key => $value) { ?>
                                            <tr>
                                                <td><?= $value['kode_kbli'] ?></td>
                                                <td><?= $value['nama_kbli'] ?></td>
                                            </tr>
                                        <?php   } ?>
                                    </tbody>
                                </table>

                                <?php if ($persyaratan_sbu) { ?>
                                    <center>
                                        <h6 for="">Sertifikat Badan Usaha (SBU)</h6>
                                    </center>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Kode SBU</th>
                                                <th>Keterangan Jenis SBU</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($persyaratan_sbu as $key => $value) { ?>
                                                <tr>
                                                    <td><?= $value['kode_sbu'] ?></td>
                                                    <td><?= $value['nama_sbu'] ?></td>
                                                </tr>
                                            <?php   } ?>
                                        </tbody>
                                    </table>
                                <?php } ?>

                                <center>
                                    <h6 for="">Persyaratan Kualifikasi Pengalaman dan Keuangan</h6>
                                </center>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama Persyaratan</th>
                                            <th colspan="2">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($persyaratan_keuangan['sts_checked_pengalaman_pekerjaan'] == 1) { ?>
                                            <tr>
                                                <td colspan="3">Pengalaman Pekerjaan Perusahaan</td>
                                            </tr>
                                        <?php } ?>

                                        <?php if ($persyaratan_keuangan['sts_checked_spt'] == 1) { ?>
                                            <tr>
                                                <td>Surat Pemberitahuan Tahunan (SPT) Badan</td>
                                                <td colspan="2"><?= $persyaratan_keuangan['tahun_lapor_spt'] ?></td>
                                            </tr>
                                        <?php } ?>


                                        <?php if ($persyaratan_keuangan['sts_checked_laporan_keuangan'] == 1) { ?>
                                            <tr>
                                                <td>Laporan Keuangan</td>
                                                <td><?= $persyaratan_keuangan['tahun_awal_laporan_keuangan'] ?> dan <?= $persyaratan_keuangan['tahun_akhir_laporan_keuangan'] ?></td>
                                                <td><?= $persyaratan_keuangan['sts_audit_laporan_keuangan'] ?></td>
                                            </tr>
                                        <?php } ?>

                                        <?php if ($persyaratan_keuangan['sts_checked_neraca_keuangan'] == 1) { ?>
                                            <tr>
                                                <td>Laporan Keuangan</td>
                                                <td colspan="2"><?= $persyaratan_keuangan['tahun_awal_neraca_keuangan'] ?> dan <?= $persyaratan_keuangan['tahun_akhir_neraca_keuangan'] ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                                <center>
                                    <h6 for="">Persyaratan Tambahan Kualifikasi</h6>
                                </center>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama Syarat Tambahan</th>
                                            <th>File Syarat Tambahan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($persyaratan_tambahan as $key => $value) { ?>
                                            <tr>
                                                <td><?= $value['nama_syarat_tambahan'] ?></td>
                                                <?php if ($value['file_syarat_tambahan']) {  ?>
                                                    <td><?= $value['file_syarat_tambahan'] ?></td>
                                                <?php  } else {  ?>
                                                    <td>Tidak Ada File</td>
                                                <?php  }  ?>

                                            </tr>
                                        <?php   } ?>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <th>Penyedia Terundang dan Terverifikasi</th>
                            <td>
                                <table style="width: 100%;">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Penyedia</th>
                                        <th>Email Penyedia</th>
                                    </tr>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($result_vendor_terundang as $key => $value) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $value['nama_usaha'] ?></td>
                                                <td><?= $value['email'] ?></td>
                                            </tr>
                                        <?php   } ?>
                                    </tbody>
                                </table>

                            </td>
                        </tr>


                        <tr>
                            <th>Departemen</th>
                            <td><?= $row_rup['nama_departemen'] ?></td>
                        </tr>
                        <tr>
                            <th>Section</th>
                            <td><?= $row_rup['nama_section'] ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Pengadaan</th>
                            <td><?= $row_rup['nama_jenis_pengadaan'] ?></td>
                        </tr>
                        <tr>
                            <th>Metode Pemilihan</th>
                            <td><?= $row_rup['nama_metode_pengadaan'] ?></td>
                        </tr>
                        <tr>
                            <th>Nilai Pagu RUP</th>
                            <td><?= "Rp " . number_format($row_rup['total_pagu_rup'], 2, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <th>Nilai Hps RUP</th>
                            <td><?= "Rp " . number_format($row_rup['total_hps_rup'], 2, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Kontrak</th>
                            <td>
                                <table style="width: 100%;">
                                    <tr>
                                        <th>Cara Pembayaran</th>
                                        <?php if ($row_rup['jenis_kontrak'] == 1) { ?>
                                            <td>Lump Sum</td>
                                        <?php } else if ($row_rup['jenis_kontrak'] == 2) { ?>
                                            <td>Harga Satuan</td>
                                        <?php } else if ($row_rup['jenis_kontrak'] == 3) { ?>
                                            <td>Gabungan Lump Sum dan Harga Satuan</td>
                                        <?php } else if ($row_rup['jenis_kontrak'] == 4) { ?>
                                            <td>Terima Jadi (Turnkey)</td>
                                        <?php } else if ($row_rup['jenis_kontrak'] == 5) { ?>
                                            <td>Persentase (%)</td>
                                        <?php } else { ?>
                                            <td></td>
                                        <?php } ?>
                                    </tr>
                                    <tr>
                                        <th>Pembebanan Tahun Anggaran</th>
                                        <?php
                                        if ($row_rup['beban_tahun_anggaran'] == 1) { ?>
                                            <td>Tahun Tunggal</td>
                                        <?php } else if ($row_rup['beban_tahun_anggaran'] == 2) { ?>
                                            <td>Tahun Jamak</td>
                                        <?php } else { ?>
                                            <td></td>
                                        <?php  } ?>

                                    </tr>
                                    <tr>
                                        <th>Sumber Pendanaan</th>
                                        <td>BUMN</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <th>Anggaran</th>
                            <td>
                                <?= $row_rup['tahun_rup'] ?> - BUMN - <?= $row_rup['nama_jenis_anggaran'] ?> <br>
                            </td>
                        </tr>
                        <tr>
                            <th>Lokasi Pekerjaan</th>
                            <td>
                                <table style="width: 100%;">
                                    <tr>
                                        <th>Provinsi</th>
                                        <th>Kabupaten</th>
                                        <th>Detail Lokasi</th>
                                    </tr>

                                    <tr>
                                        <td><?= $row_rup['nama_provinsi'] ?></td>
                                        <td><?= $row_rup['nama_kabupaten'] ?></td>
                                        <td><?= $row_rup['kualifikasi_usaha'] ?></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <th>Nilai Teknis</th>
                            <?php if ($row_rup['bobot_nilai'] == 1) { ?>
                                <td>Kombinasi</td>
                            <?php } else { ?>
                                <td>Biaya Terendah</td>
                            <?php }  ?>
                        </tr>
                        <tr>
                            <th>Kualifikasi Usaha</th>
                            <td><?= $row_rup['kualifikasi_usaha'] ?></td>
                        </tr>
                        <tr>
                            <th>Bobot Teknis</th>
                            <td><?= $row_rup['bobot_teknis'] ?></td>
                        </tr>
                        <tr>
                            <th>Bobot Biaya</th>
                            <td><?= $row_rup['bobot_biaya'] ?></td>
                        </tr>
                        <tr>

                        </tr>
                        <tr>
                            <th>Tanggal Pembuatan</th>
                            <td><?= $row_rup['jangka_waktu_mulai_pelaksanaan'] ?></td>
                        </tr>

                        <tr>
                            <th>Alasan Pembatalan</th>
                            <td></td>
                        </tr>
                    </table>
                    <br>
                    <h4 class="text-center">DOKUMEN KUALIFIKASI</h4>
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Dokumen</th>
                            <th>Tanggal Upload</th>
                            <th>Pengirim</th>
                        </tr>
                        <?php foreach ($dok_prakualifikasi as $key => $value) { ?>
                            <tr>
                                <td><a target="_blank" href="<?= base_url('file_paket/' . $row_rup['nama_rup'] . '/' . 'DOKUMEN_PRAKUALIFIKASI/' . $value['file_dok_prakualifikasi']) ?>"><?= $value['file_dok_prakualifikasi'] ?></a> </td>
                                <td><?= $value['tgl_upload'] ?></td>
                                <td>Panitia</td>
                            </tr>
                        <?php  } ?>
                    </table>
                    <br>
                    <h4 class="text-center">DOKUMEN PENGADAAN</h4>
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Dokumen</th>
                            <th>Tanggal Upload</th>
                            <th>Pengirim</th>
                        </tr>
                        <?php foreach ($dok_lelang as $key => $value) { ?>
                            <tr>
                                <td><a target="_blank" href="<?= base_url('file_paket/' . $row_rup['nama_rup'] . '/' . 'DOKUMEN_PENGADAAN/' . $value['file_dok_pengadaan']) ?>"><?= $value['file_dok_pengadaan'] ?></a> </td>
                                <td><?= $value['tgl_upload'] ?></td>
                                <td>Panitia</td>
                            </tr>
                        <?php  } ?>
                    </table>
                    <br>
                    <br>
                    <h4 class="text-center">JADWAL PENGADAAN</h4>
                    <table class="table table-bordered">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th><small>No</small></th>
                                <th><small>Nama Jadwal</small></th>
                                <th><small>Waktu Mulai</small></th>
                                <th><small>Waktu Selesai</small></th>
                                <th><small>Status Tahap</small></th>
                                <th><small>Dibuat Oleh</small></th>
                                <th><small>Alasan Perubahan</small></th>
                            </tr>
                        </thead>
                        <tbody id="load_jadwal">

                        </tbody>
                    </table>
                    <br>
                    <h4 class="text-center">PESERTA PENGADAAN</h4>
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Nama Peserta</th>
                            <th>Tanggal Daftar</th>
                        </tr>
                        <?php $no = 1;
                        foreach ($peserta_tender as $key => $value) { ?>
                            <tr>
                                <td scope="row"><?= $no++ ?></td>
                                <td><?= $value['nama_usaha'] ?></td>
                                <td><?= $value['tgl_daftar'] ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                    <h4 class="text-center">KEPANITIAAN</h4>
                    <!-- <table class="table table-bordered">
                        <tr>
                            <th>Nama Kepanitiaan</th>
                            <th>Jasa Pemborongan Pembangunan Gerbang Tol Darangdan KM 99 Ramp 1 dan Ramp 4 Pada Ruas Jalan Tol Cipularang Tahun 2023</th>
                        </tr>
                        <tr>
                            <th>No. SK</th>
                            <td>01/SK.GM.PROCUREMENT/JMTM/VIII/2021</td>
                        </tr>
                    </table> -->
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Jabatan</th>
                        </tr>

                        <?php $no = 1;
                        foreach ($data_panitia as $key => $value) { ?>
                            <tr>
                                <td scope="row"><?= $no++ ?></td>
                                <td><?= $value['nama_pegawai'] ?></td>
                                <td><?= $value['nip'] ?></td>
                                <?php if ($value['role_panitia'] == 1) { ?>
                                    <td>Ketua</td>
                                <?php } else if ($value['role_panitia'] == 2) { ?>
                                    <td>Sekertaris</td>
                                <?php } else { ?>
                                    <td>Anggota</td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </table>


                    <h4 class="text-center">HASIL EVALUASI PQ</h4>
                    <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                        <div class="flex-grow-1 bd-highlight">
                            <span class="text-dark">
                                <small class="text-white"><strong>Evalusi Akhir Kualifikasi</strong></small>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="tbl_evaluasi_kualifikasi" aria-describedby="tbl_evaluasi_info">
                            <thead style="text-align: center;">
                                <tr>
                                    <th rowspan="3">No</th>
                                    <th rowspan="3">Perusahaan</th>
                                    <th rowspan="3">Evaluasi Administrasi</th>
                                    <th colspan="2">Evaluasi Keuangan</th>
                                    <th colspan="2">Evaluasi Teknis</th>
                                    <th colspan="2">Evaluasi Akhir</th>
                                </tr>
                                <tr>
                                    <th colspan="2">50%</th>
                                    <th colspan="2">50%</th>
                                    <th colspan="2">100%</th>
                                </tr>
                                <tr>
                                    <th>Nilai</th>
                                    <th>Keterangan</th>
                                    <th>Nilai</th>
                                    <th>Keterangan</th>
                                    <th>Nilai</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">

                            </tbody>
                        </table>
                    </div>

                    <br>
                    <h4 class="text-center">SANGGAHAN KUALIFIKASI</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NAMA PESERTA</th>
                                <th>KETERANGAN PENYEDIA</th>
                                <th>FILE SANGGAHAN PESERTA</th>
                                <th>FILE BALASAN PANITIA</th>
                                <th>KETERANGAN PANITIA</th>
                            </tr>
                        </thead>
                        <tbody id="tbl_sanggah_pra">


                        </tbody>
                    </table>
                    <br>

                    <h4 class="text-center">HASIL EVALUASI PENAWARAN</h4>
                    <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                        <div class="flex-grow-1 bd-highlight">
                            <span class="text-dark">
                                <small class="text-white"><strong> Evalusi Akhir Penawaran</strong></small>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="tbl_evaluasi_penawaran">
                            <thead style="text-align: center;">
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Nama Perusahaan</th>
                                    <th rowspan="2">Harga Penawaran <br> (Setelah Koreksi Aritmatika)</th>
                                    <th>Nilai Teknis</th>
                                    <th rowspan="2">% Terhadap HPS</th>
                                    <th>Nilai Usulan Biaya</th>
                                    <th rowspan="2">Nilai Akhir</th>
                                    <th rowspan="2">Peringkat Akhir</th>
                                    <th rowspan="2">Keterangan</th>
                                </tr>
                                <tr>
                                    <th><?= $row_rup['bobot_teknis'] ?>%</th>
                                    <th><?= $row_rup['bobot_biaya'] ?>%</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                    <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                        <div class="flex-grow-1 bd-highlight">
                            <span class="text-dark">
                                <small class="text-white"><strong> Evalusi HEA TKDN</strong></small>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h5 for=""> Nilai TKDN Minimum : <?= $row_rup['persen_pencatatan'] ?>%</h5>
                            </div>
                            <div class="col-md-4">
                                <h5 for="">Preferensi Maksimum : 25.00%</h5>
                                <h5 for="">Preferensi Minimum : 00.00%</h5>
                            </div>
                            <div class="col-md-4">
                                <h5 for="">Jika TKDN Penawaran >= 25%</h5>
                                <h5 for="">Jika TKDN Penawaran < 25%</h5> <br>
                            </div>
                        </div>
                        <table class="table table-bordered" id="tbl_hea_tkdn" aria-describedby="tbl_evaluasi_info">
                            <thead style="text-align: center;">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Harga Penawaran <br> (Setelah Koreksi Aritmatika)</th>
                                    <th>Nilai TKDN Penawaran</th>
                                    <th>Harga Evaluasi Akhir (HEA)<br>(Setelah Koreksi Aritmatika)</th>
                                    <th>Peringkat Sementara HEA</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                    <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                        <div class="flex-grow-1 bd-highlight">
                            <span class="text-dark">
                                <small class="text-white"><strong> Peringkat Akhir HEA</strong></small>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="tbl_akhir_hea">
                            <thead style="text-align: center;">
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Nama Perusahaan</th>
                                    <th rowspan="2">Harga Penawaran (HEA) <br> (Setelah Koreksi Aritmatika)</th>
                                    <th>Nilai Teknis</th>
                                    <th rowspan="2">%HEA Terhadap HPS</th>
                                    <th>Nilai HEA</th>
                                    <th rowspan="2">Nilai Akhir</th>
                                    <th rowspan="2">Peringkat Akhir</th>
                                    <th rowspan="2">Keterangan</th>

                                </tr>
                                <tr>
                                    <th><?= $row_rup['bobot_teknis'] ?>%</th>
                                    <th><?= $row_rup['bobot_biaya'] ?>%</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>


                    <br>
                    <h4 class="text-center">HASIL NEGOSIASI</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NAMA PESERTA</th>
                                <th>TANGGAL NEGOSIASI</th>
                                <th>LINK MEET (JIKA DARING)</th>
                                <th>TOTAL NEGOSIASI</th>
                                <th>KETERANGAN</th>
                            </tr>
                        </thead>
                        <tbody id="tbl_vendor_negosiasi">


                        </tbody>
                    </table>
                    <br>

                    <h4 class="text-center">PERINGKAT PEMENANG</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Peserta</th>
                                <th>Email</th>
                                <th>Pemenang</th>
                                <th>Peringkat Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($peserta_tender2 as $key => $value) { ?>
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
                                    <td scope="row"><?= $i++ ?></td>
                                    <td><?= $nama_perusahaan  ?></td>
                                    <td><?= $value['email'] ?></td>
                                    <td>
                                        <?php if ($value['sts_deal_negosiasi'] == 'deal') { ?>
                                            <i class="fas fa fa-star text-warning"></i>
                                        <?php   } else { ?>
                                            <?php if ($value['ev_penawaran_peringkat'] == 1) { ?>
                                                <i class="fas fa fa-star text-warning"></i>
                                            <?php   } else { ?>
                                                <i class="fas fa fa-times text-danger"></i>
                                            <?php   }  ?>
                                        <?php   }  ?>
                                    </td>
                                    <td><?= $value['ev_penawaran_peringkat']  ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <br>

                    <h4 class="text-center">SANGGAHAN PEMENANG</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NAMA PESERTA</th>
                                <th>KETERANGAN PENYEDIA</th>
                                <th>FILE SANGGAHAN PESERTA</th>
                                <th>FILE BALASAN PANITIA</th>
                                <th>KETERANGAN PANITIA</th>
                            </tr>
                        </thead>
                        <tbody id="tbl_sanggah_akhir">


                        </tbody>
                    </table>
                    <br>

                    <h4 class="text-center">AANWIJZING PQ</h4>
                    <div class="card card_chat" style="background-image: linear-gradient(180deg, #b2eaff 0, #5389f2 50%, #003265 100%);">
                        <div class="card-header card-chat" style="background-image: linear-gradient(90deg, hsla(206, 98%, 48%, 1) 3%, hsla(60, 100%, 50%, 1) 70%);">
                            <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                    <img src="<?= base_url('assets/chat_logo.png') ?>" class="rounded-circle user_img">
                                    <span class="online_icon"></span>
                                </div>
                                <div class="user_info">
                                    <span style="font-size: 13px;">Forum Chat Paket <?= $row_rup['nama_rup'] ?></span>
                                    <p>Kode Tender : <?= $row_rup['kode_rup'] ?></p>
                                </div>
                            </div>
                            <span id="action_menu_btn"><img src="<?= base_url('assets/img/logo_asli.png') ?>" width="250px" alt=""></span>
                        </div>
                        <div class="card-body msg_card_body" id="letakpesan">

                        </div>
                        <div class="card-footer card-footer_chat" style="background-image: radial-gradient(circle at 50% -20.71%, #cfa8ff 0, #9d8bff 25%, #6c6cd8 50%, #3f4ea4 75%, #153375 100%);">
                        </div>
                    </div>
                    <br>
                    <h4 class="text-center">AANWIJZING PENAWARAN</h4>
                    <br>
                    <div class="card card_chat" style="background-image: linear-gradient(180deg, #b2eaff 0, #5389f2 50%, #003265 100%);">
                        <div class="card-header card-chat" style="background-image: linear-gradient(90deg, hsla(206, 98%, 48%, 1) 3%, hsla(60, 100%, 50%, 1) 70%);">
                            <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                    <img src="<?= base_url('assets/chat_logo.png') ?>" class="rounded-circle user_img">
                                    <span class="online_icon"></span>
                                </div>
                                <div class="user_info">
                                    <span style="font-size: 13px;">Forum Chat Paket <?= $row_rup['nama_rup'] ?></span>
                                    <p>Kode Tender : <?= $row_rup['kode_rup'] ?></p>
                                </div>
                            </div>
                            <span id="action_menu_btn"><img src="<?= base_url('assets/img/logo_asli.png') ?>" width="250px" alt=""></span>
                        </div>
                        <div class="card-body msg_card_body" id="letakpesan2">

                        </div>
                        <div class="card-footer card-footer_chat" style="background-image: radial-gradient(circle at 50% -20.71%, #cfa8ff 0, #9d8bff 25%, #6c6cd8 50%, #3f4ea4 75%, #153375 100%);">

                        </div>
                    </div>
                    <br>
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
    <script>
        $(document).ready(function() {
            var id_rup = $('[name="id_rup"]').val()
            $('#tbl_evaluasi_penawaran').DataTable({
                "responsive": false,
                "ordering": true,
                "processing": false,
                "serverSide": true,
                "autoWidth": false,
                "bDestroy": true,
                // "buttons": ["excel", "pdf", "print", "colvis"],
                initComplete: function() {
                    this.api().buttons().container().appendTo($('.col-md-6:eq(0)', this.api().table().container()));
                },
                "order": [],
                "ajax": {
                    "url": '<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_evaluasi_penawaran/') ?>' + id_rup,
                    "type": "POST",
                },
                "columnDefs": [{
                    "target": [-1],
                    "orderable": false
                }],
                "oLanguage": {
                    "sSearch": "Pencarian : ",
                    "sEmptyTable": "Data Tidak Tersedia",
                    "sLoadingRecords": "Silahkan Tunggu - loading...",
                    "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
                    "sZeroRecords": "Tidak Ada Data Yang Di Cari",
                    "sProcessing": "Memuat Data...."
                }
            }).buttons().container().appendTo('#tbl_rup .col-md-6:eq(0)');
        });

        $(document).ready(function() {
            var id_rup = $('[name="id_rup"]').val()
            $('#tbl_evaluasi_kualifikasi').DataTable({
                "ordering": true,
                "serverSide": true,
                "searching": false,
                "ordering": false,
                "bDestroy": true,
                // "buttons": ["excel", "pdf", "print", "colvis"],
                initComplete: function() {
                    this.api().buttons().container().appendTo($('.col-md-6:eq(0)', this.api().table().container()));
                },
                "order": [],
                "ajax": {
                    "url": '<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_evaluasi_kualifikasi/') ?>' + id_rup,
                    "type": "POST",
                },
                "columnDefs": [{
                    "target": [-1],
                    "orderable": false
                }],
                "oLanguage": {
                    "sSearch": "Pencarian : ",
                    "sEmptyTable": "Data Tidak Tersedia",
                    "sLoadingRecords": "Silahkan Tunggu - loading...",
                    "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
                    "sZeroRecords": "Tidak Ada Data Yang Di Cari",
                    "sProcessing": "Memuat Data...."
                }
            }).buttons().container().appendTo('#tbl_evaluasi_kualifikasi .col-md-6:eq(0)');
        });



        $(document).ready(function() {
            var id_rup = $('[name="id_rup"]').val()
            $('#tbl_hea_tkdn').DataTable({
                "ordering": true,
                "serverSide": true,
                "searching": false,
                "ordering": false,
                "bDestroy": true,
                // "buttons": ["excel", "pdf", "print", "colvis"],
                initComplete: function() {
                    this.api().buttons().container().appendTo($('.col-md-6:eq(0)', this.api().table().container()));
                },
                "order": [],
                "ajax": {
                    "url": '<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_evaluasi_hea_tkdn/') ?>' + id_rup,
                    "type": "POST",
                },
                "columnDefs": [{
                    "target": [-1],
                    "orderable": false
                }],
                "oLanguage": {
                    "sSearch": "Pencarian : ",
                    "sEmptyTable": "Data Tidak Tersedia",
                    "sLoadingRecords": "Silahkan Tunggu - loading...",
                    "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
                    "sZeroRecords": "Tidak Ada Data Yang Di Cari",
                    "sProcessing": "Memuat Data...."
                }
            }).buttons().container().appendTo('#tbl_hea_tkdn .col-md-6:eq(0)');
        });

        $(document).ready(function() {
            var id_rup = $('[name="id_rup"]').val()
            $('#tbl_akhir_hea').DataTable({
                "ordering": true,
                "serverSide": true,
                "searching": false,
                "ordering": false,
                "bDestroy": true,
                // "buttons": ["excel", "pdf", "print", "colvis"],
                initComplete: function() {
                    this.api().buttons().container().appendTo($('.col-md-6:eq(0)', this.api().table().container()));
                },
                "order": [],
                "ajax": {
                    "url": '<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_evaluasi_akhir_hea/') ?>' + id_rup,
                    "type": "POST",
                },
                "columnDefs": [{
                    "target": [-1],
                    "orderable": false
                }],
                "oLanguage": {
                    "sSearch": "Pencarian : ",
                    "sEmptyTable": "Data Tidak Tersedia",
                    "sLoadingRecords": "Silahkan Tunggu - loading...",
                    "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
                    "sZeroRecords": "Tidak Ada Data Yang Di Cari",
                    "sProcessing": "Memuat Data...."
                }
            }).buttons().container().appendTo('#tbl_akhir_hea .col-md-6:eq(0)');
        });

        $(document).ready(function() {
            var id_rup = $('[name="id_rup"]').val()
            $('#tbl_peringkat_akhir_terendah').DataTable({
                "ordering": true,
                "serverSide": true,
                "searching": false,
                "ordering": false,
                "bDestroy": true,
                // "buttons": ["excel", "pdf", "print", "colvis"],
                initComplete: function() {
                    this.api().buttons().container().appendTo($('.col-md-6:eq(0)', this.api().table().container()));
                },
                "order": [],
                "ajax": {
                    "url": '<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_evaluasi_akhir_harga_terendah/') ?>' + id_rup,
                    "type": "POST",
                },
                "columnDefs": [{
                    "target": [-1],
                    "orderable": false
                }],
                "oLanguage": {
                    "sSearch": "Pencarian : ",
                    "sEmptyTable": "Data Tidak Tersedia",
                    "sLoadingRecords": "Silahkan Tunggu - loading...",
                    "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
                    "sZeroRecords": "Tidak Ada Data Yang Di Cari",
                    "sProcessing": "Memuat Data...."
                }
            }).buttons().container().appendTo('#tbl_peringkat_akhir_terendah .col-md-6:eq(0)');
        });
    </script>

    <script>
        var id_url_rup = $('[name="id_url_rup"]').val()
        $.ajax({
            type: "GET",
            url: '<?= base_url('panitia/daftar_paket/daftar_paket/by_id_rup/') ?>' + id_url_rup,
            dataType: "JSON",
            success: function(response) {
                var html = '';
                var i;
                var no = 1;
                for (i = 0; i < response['jadwal'].length; i++) {
                    var waktu_mulai = new Date(response['jadwal'][i].waktu_mulai);
                    var waktu_selesai = new Date(response['jadwal'][i].waktu_selesai);
                    var sekarang = new Date();
                    // kondisi jadwal
                    if (sekarang < waktu_mulai) {
                        var check = '';
                        var status_waktu = '<small><span class="badge text-white bg-danger"><i class="fa fa-clock" aria-hidden="true"></i> Tahap Belum Mulai </span></small>';
                    } else if (sekarang >= waktu_mulai && sekarang <= waktu_selesai) {
                        var check = '';
                        var status_waktu = '<small><span class="badge text-white bg-warning"><i class="fa fa-clock" aria-hidden="true"></i> Tahap Sedang Di Mulai </span></small>';
                    } else if (sekarang > waktu_selesai && sekarang <= waktu_selesai) {
                        var check = '<i class="fa fa-check text-success" aria-hidden="true"></i>';
                        var status_waktu = '<small><span class="badge text-white bg-success"><i class="fa fa-clock" aria-hidden="true"></i> Tahap Sudah Selesai </span></small>';
                    } else {
                        var check = '<i class="fa fa-check text-success" aria-hidden="true"></i>';
                        var status_waktu = '<small><span class="badge text-white bg-success"><i class="fa fa-clock" aria-hidden="true"></i> Tahap Sudah Selesai </span></small>';
                    }

                    if (response['jadwal'][i].alasan) {
                        var alasan = response['jadwal'][i].alasan
                    } else {
                        var alasan = ''
                    }
                    html += '<tr>' +
                        '<td><small>' + no++ + '</small></td>' +
                        '<td><small>' + response['jadwal'][i].nama_jadwal_rup + ' ' + check + '</small></td>' +
                        '<td><small>' + response['jadwal'][i].waktu_mulai + '</small></td>' +
                        '<td><small>' + response['jadwal'][i].waktu_selesai + '</small></td>' +
                        '<td>' + status_waktu + '</td>' +
                        '<td>Panitia</td>' +
                        '<td><small>' + alasan + '</small></td>' +
                        '</tr>';
                }
                $('#load_jadwal').html(html);
            }
        })
    </script>

    <script>
        pesan()

        function pesan() {
            var id_penerima = $('#id_penerima').val();
            var id_rup = $('[name="id_rup"]').val();
            var id_pengirim = '<?= $this->session->userdata('id_pegawai') ?>';
            $.ajax({
                type: "post",
                url: "<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'ngeload_chatnya/') ?>" + id_rup,
                data: {
                    id_pengirim: id_pengirim,
                    id_penerima: id_penerima,
                },
                dataType: "json",
                success: function(r) {
                    var html = "";
                    var d = r.data;
                    id_pengirim = '<?= $this->session->userdata('id_pegawai') ?>';
                    d.forEach(d => {

                        var today = new Date();
                        var dd = String(today.getDate()).padStart(2, '0');
                        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                        var yyyy = today.getFullYear();

                        today = dd + '-' + mm + '-' + yyyy;
                        // console.log(today);

                        var times = new Date(d.waktu)
                        var time = times.toLocaleTimeString()
                        var tanggal = String(times.getDate()).padStart(2, '0');
                        var bulan = String(times.getMonth() + 1).padStart(2, '0');
                        var tahun = times.getFullYear()
                        var lengkapDB = tanggal + '-' + bulan + '-' + tahun
                        // console.log(lengkapDB == today)
                        var kapan = "Today"
                        var tanggal_bulan = tanggal + "-" + bulan
                        if (lengkapDB != today) {
                            kapan = tanggal_bulan
                        }
                        // console.log(kapan)
                        if (parseInt(d.id_pengirim) == id_pengirim) {
                            if (d.dokumen_chat == '') {
                                html += '<div class="d-flex justify-content-end mb-4">' +
                                    '<div class="msg_cotainer_send">' +
                                    '' + d.isi + '' +
                                    '<span class="msg_time">' + kapan + ',' + time + '</span>' +
                                    '</div>' +
                                    '</div>';
                            } else if (d.dokumen_chat) {
                                html += '<div class="d-flex justify-content-end mb-4">' +
                                    '<div class="msg_cotainer_send">' +
                                    '<a  class="text-primary" target="_blank" href="<?= base_url('file_chat/') ?>' + d.dokumen_chat + '">' + d.dokumen_chat + '</a>' +
                                    '<br>' + d.isi + '' +
                                    '<span class="msg_time">' + kapan + ',' + time + '</span>' +
                                    '</div>' +
                                    '</div>';

                            } else if (d.img_chat) {
                                html += '<div class="d-flex justify-content-end mb-4">' +
                                    '<div class="msg_cotainer_send">' +
                                    '<a  class="text-primary" target="_blank" href="<?= base_url('file_chat/') ?>' + d.img_chat + '"><img width="100%" src="<?= base_url('file_chat/') ?>' + d.img_chat + '"></a>' +
                                    '<br>' + d.isi + '' +
                                    '<span class="msg_time">' + kapan + ',' + time + '</span>' +
                                    '</div>' +
                                    '</div>';

                            } else if (d.replay_tujuan) {
                                if (d.dokumen_chat == '') {
                                    html += '<div class="d-flex justify-content-end mb-4">' +
                                        '<div class="msg_cotainer_send">' +
                                        '<div class="bs-callout bs-callout-info">' +
                                        'Membalas Chat : ' +
                                        '' + d.replay_isi + '' +
                                        '</div>' +
                                        '<br>' + d.isi + '' +
                                        '<span class="msg_time">' + kapan + ',' + time + '</span>' +
                                        '</div>' +
                                        '</div>';
                                } else if (d.dokumen_chat) {
                                    html += '<div class="d-flex justify-content-end mb-4">' +
                                        '<div class="msg_cotainer_send">' +
                                        '<div class="bs-callout bs-callout-info">' +
                                        'Membalas Chat : ' +
                                        '' + d.replay_isi + '' +
                                        '</div>' +
                                        '<a  class="text-primary" target="_blank" href="<?= base_url('file_chat/') ?>' + d.dokumen_chat + '">' + d.dokumen_chat + '</a>' +
                                        '<br>' + d.isi + '' +
                                        '<span class="msg_time">' + kapan + ',' + time + '</span>' +
                                        '</div>' +
                                        '</div>';
                                } else if (d.img_chat) {
                                    html += '<div class="d-flex justify-content-end mb-4">' +
                                        '<div class="msg_cotainer_send">' +
                                        '<div class="bs-callout bs-callout-info">' +
                                        'Membalas Chat : ' +
                                        '' + d.replay_isi + '' +
                                        '</div>' +
                                        '<a  class="text-primary" target="_blank" href="<?= base_url('file_chat/') ?>' + d.img_chat + '"><img width="100%" src="<?= base_url('file_chat/') ?>' + d.img_chat + '"></a>' +
                                        '<br>' + d.isi + '' +
                                        '<span class="msg_time">' + kapan + ',' + time + '</span>' +
                                        '</div>' +
                                        '</div>';
                                } else {
                                    html += '<div class="d-flex justify-content-end mb-4">' +
                                        '<div class="msg_cotainer_send">' +
                                        '<div class="bs-callout bs-callout-info">' +
                                        'Membalas Chat : ' +
                                        '' + d.replay_isi + '' +
                                        '</div>' +
                                        '<br>' + d.isi + '' +
                                        '<span class="msg_time">' + kapan + ',' + time + '</span>' +
                                        '</div>' +
                                        '</div>';
                                }

                            } else {
                                html += '<div class="d-flex justify-content-end mb-4">' +
                                    '<div class="msg_cotainer_send">' +
                                    '' + d.isi + '' +
                                    '<span class="msg_time">' + kapan + ',' + time + '</span>' +
                                    '</div>' +
                                    '</div>';
                            }
                        } else if (parseInt(d.id_pengirim) == id_pengirim) {
                            if (d.dokumen_chat == null) {
                                html += `<label class="badge badge-primary ml-5" >Panitia</label><div class="d-flex justify-content-start mb-4">
                <div class="img_cont_msg">
                <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                </div>
                <div class="msg_cotainer">
                   ${d.isi}								
                   <span class="msg_time">${kapan}, ${time}  	</span>
                </div> </div>`;
                            } else if (d.dokumen_chat) {
                                html += `<label class="badge badge-primary ml-5" >Panitia</label><div class="d-flex justify-content-start mb-4">
                <div class="img_cont_msg">
                <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                </div>
                <div class="msg_cotainer">
                <a href="<?= base_url('/file_chat/') ?>${d.dokumen_chat}"> ${d.dokumen_chat}</a> <br>
                   ${d.isi}								
                   <span class="msg_time">${kapan}, ${time}  	</span>
                </div>
             </div>`;
                            } else if (d.img_chat) {
                                html += `<label class="badge badge-primary ml-5" >Panitia</label><div class="d-flex justify-content-start mb-4">
                <div class="img_cont_msg">
                <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                </div>
                <div class="msg_cotainer">
                        <img width="100%" src="<?= base_url('file_chat/') ?>${d.img_chat}"> <br>
                   ${d.isi}								
                   <span class="msg_time">${kapan}, ${time}  	</span>
                </div>
              
             </div>`;
                            } else {
                                html += `<label class="badge badge-primary ml-5" >Panitia</label><div class="d-flex justify-content-start mb-4">
                <div class="img_cont_msg">
                <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                </div>
                <div class="msg_cotainer">
                   ${d.isi}								
                   <span class="msg_time">${kapan}, ${time}	</span>
                </div>
              
             </div>`;
                            }
                        } else {
                            if (d.nama_pegawai) {
                                if (d.dokumen_chat == null) {
                                    html += `<label class="badge badge-danger ml-5" >Panitia</label><div class="d-flex justify-content-start mb-4">
                <div class="img_cont_msg">
                <img src="<?= base_url('assets/img/proc.png') ?>" alt="" class="rounded-circle user_img_msg">
                </div>
                <div class="msg_cotainer">
                   ${d.isi}								
                   <span class="msg_time">${kapan}, ${time}  	</span>
                </div> </div>`;
                                } else if (d.dokumen_chat) {
                                    html += `<label class="badge badge-danger ml-5" >Panitia</label><div class="d-flex justify-content-start mb-4">
                <div class="img_cont_msg">
                <img src="<?= base_url('assets/img/proc.png') ?>" alt="" class="rounded-circle user_img_msg">
                </div>
                <div class="msg_cotainer">
                <a href="https://vms.jmtm.co.id/file_chat/${d.dokumen_chat}"> ${d.dokumen_chat}</a> <br>
                   ${d.isi}								
                   <span class="msg_time">${kapan}, ${time}  	</span>
                </div>
             </div>`;
                                } else if (d.img_chat) {
                                    html += `<label class="badge badge-danger ml-5" >Panitia</label><div class="d-flex justify-content-start mb-4">
                <div class="img_cont_msg">
                <img src="<?= base_url('assets/img/proc.png') ?>" alt="" class="rounded-circle user_img_msg">
                </div>
                <div class="msg_cotainer">
                        <img width="100%" src="https://vms.jmtm.co.id/file_chat/${d.img_chat}"> <br>
                   ${d.isi}								
                   <span class="msg_time">${kapan}, ${time}  	</span>
                </div>
              
             </div>`;
                                } else {
                                    html += '<label class="badge badge-danger ml-5" >' + d.nama_usaha + '</label><div class="d-flex justify-content-start mb-4">' +
                                        '<div class="img_cont_msg">' +
                                        '<img src="<?= base_url('assets/img/proc.png') ?>" alt="" class="rounded-circle user_img_msg">' +
                                        '</div>' +
                                        '<div class="msg_cotainer">' +
                                        '' + d.isi + '' +
                                        '<span class="msg_time">' +
                                        '' + kapan + '' +
                                        '' + time + '' +
                                        '<a onclick="Replay(' + "'" + d.id_pengirim + "','" + d.isi + "','" + d.nama_usaha + "'" + ')" href="javascript:;" class="badge badge-sm badge-warning">replay</a>	</span>' +
                                        '</div>' +
                                        '</div>';
                                }
                            } else {
                                if (d.dokumen_chat == null) {
                                    html += '<label class="badge badge-danger ml-5" >' + d.nama_usaha + '</label><div class="d-flex justify-content-start mb-4">' +
                                        '<div class="img_cont_msg">' +
                                        '<img src="<?= base_url('assets/vendor.png') ?>" alt="" class="rounded-circle user_img_msg">' +
                                        '</div>' +
                                        '<div class="msg_cotainer">' +
                                        '' + d.isi + '' +
                                        '<span class="msg_time">' +
                                        '' + kapan + '' +
                                        '' + time + '' +
                                        '<a onclick="Replay(' + "'" + d.id_pengirim + "','" + d.isi + "','" + d.nama_usaha + "'" + ')" href="javascript:;" class="badge badge-sm badge-warning">replay</a>	</span>' +
                                        '</div>' +
                                        '</div>';
                                } else if (d.dokumen_chat) {
                                    html += `<label class="badge badge-danger ml-5" >${d.nama_usaha}</label><div class="d-flex justify-content-start mb-4">
                <div class="img_cont_msg">
                <img src="<?= base_url('assets/vendor.png') ?>" alt="" class="rounded-circle user_img_msg">
                </div>
                <div class="msg_cotainer">
                <a href="https://vms.jmtm.co.id/file_chat/${d.dokumen_chat}"> ${d.dokumen_chat}</a> <br>
                   ${d.isi}								
                   <span class="msg_time">${kapan}, ${time}  	</span>
                </div>
             </div>`;
                                } else if (d.img_chat) {
                                    html += `<label class="badge badge-danger ml-5" >${d.nama_usaha}</label><div class="d-flex justify-content-start mb-4">
                <div class="img_cont_msg">
                <img src="<?= base_url('assets/vendor.png') ?>" alt="" class="rounded-circle user_img_msg">
                </div>
                <div class="msg_cotainer">
                        <img width="100%" src="https://vms.jmtm.co.id/file_chat/${d.img_chat}"> <br>
                   ${d.isi}								
                   <span class="msg_time">${kapan}, ${time}  	</span>
                </div>
              
             </div>`;
                                } else {
                                    html += '<label class="badge badge-danger ml-5" >' + d.nama_usaha + '</label><div class="d-flex justify-content-start mb-4">' +
                                        '<div class="img_cont_msg">' +
                                        '<img src="<?= base_url('assets/vendor.png') ?>" alt="" class="rounded-circle user_img_msg">' +
                                        '</div>' +
                                        '<div class="msg_cotainer">' +
                                        '' + d.isi + '' +
                                        '<span class="msg_time">' +
                                        '' + kapan + '' +
                                        '' + time + '' +
                                        '<a onclick="Replay(' + "'" + d.id_pengirim + "','" + d.isi + "','" + d.nama_usaha + "'" + ')" href="javascript:;" class="badge badge-sm badge-warning">replay</a>	</span>' +
                                        '</div>' +
                                        '</div>';
                                }
                            }

                        }
                        // notifikasis
                    });
                    // console.log(html)
                    $('#letakpesan').html(html);

                }
            });

        }
    </script>

    <script>
        pesan2()

        function pesan2() {
            var id_penerima = $('#id_penerima').val();
            var id_rup = $('[name="id_rup"]').val();
            var id_pengirim = '<?= $this->session->userdata('id_pegawai') ?>';
            $.ajax({
                type: "post",
                url: "<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'ngeload_chatnya_penawaran/') ?>" + id_rup,
                data: {
                    id_pengirim: id_pengirim,
                    id_penerima: id_penerima,
                },
                dataType: "json",
                success: function(r) {
                    var html = "";
                    var d = r.data;
                    id_pengirim = '<?= $this->session->userdata('id_pegawai') ?>';
                    d.forEach(d => {

                        var today = new Date();
                        var dd = String(today.getDate()).padStart(2, '0');
                        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                        var yyyy = today.getFullYear();

                        today = dd + '-' + mm + '-' + yyyy;
                        // console.log(today);

                        var times = new Date(d.waktu)
                        var time = times.toLocaleTimeString()
                        var tanggal = String(times.getDate()).padStart(2, '0');
                        var bulan = String(times.getMonth() + 1).padStart(2, '0');
                        var tahun = times.getFullYear()
                        var lengkapDB = tanggal + '-' + bulan + '-' + tahun
                        // console.log(lengkapDB == today)
                        var kapan = "Today"
                        var tanggal_bulan = tanggal + "-" + bulan
                        if (lengkapDB != today) {
                            kapan = tanggal_bulan
                        }
                        // console.log(kapan)
                        if (parseInt(d.id_pengirim) == id_pengirim) {
                            if (d.dokumen_chat == '') {
                                html += '<div class="d-flex justify-content-end mb-4">' +
                                    '<div class="msg_cotainer_send">' +
                                    '' + d.isi + '' +
                                    '<span class="msg_time">' + kapan + ',' + time + '</span>' +
                                    '</div>' +
                                    '</div>';
                            } else if (d.dokumen_chat) {
                                html += '<div class="d-flex justify-content-end mb-4">' +
                                    '<div class="msg_cotainer_send">' +
                                    '<a  class="text-primary" target="_blank" href="<?= base_url('file_chat/') ?>' + d.dokumen_chat + '">' + d.dokumen_chat + '</a>' +
                                    '<br>' + d.isi + '' +
                                    '<span class="msg_time">' + kapan + ',' + time + '</span>' +
                                    '</div>' +
                                    '</div>';

                            } else if (d.img_chat) {
                                html += '<div class="d-flex justify-content-end mb-4">' +
                                    '<div class="msg_cotainer_send">' +
                                    '<a  class="text-primary" target="_blank" href="<?= base_url('file_chat/') ?>' + d.img_chat + '"><img width="100%" src="<?= base_url('file_chat/') ?>' + d.img_chat + '"></a>' +
                                    '<br>' + d.isi + '' +
                                    '<span class="msg_time">' + kapan + ',' + time + '</span>' +
                                    '</div>' +
                                    '</div>';

                            } else if (d.replay_tujuan) {
                                if (d.dokumen_chat == '') {
                                    html += '<div class="d-flex justify-content-end mb-4">' +
                                        '<div class="msg_cotainer_send">' +
                                        '<div class="bs-callout bs-callout-info">' +
                                        'Membalas Chat :' +
                                        '' + d.replay_isi + '' +
                                        '</div>' +
                                        '<br>' + d.isi + '' +
                                        '<span class="msg_time">' + kapan + ',' + time + '</span>' +
                                        '</div>' +
                                        '</div>';
                                } else if (d.dokumen_chat) {
                                    html += '<div class="d-flex justify-content-end mb-4">' +
                                        '<div class="msg_cotainer_send">' +
                                        '<div class="bs-callout bs-callout-info">' +
                                        'Membalas Chat :' +
                                        '' + d.replay_isi + '' +
                                        '</div>' +
                                        '<a  class="text-primary" target="_blank" href="<?= base_url('file_chat/') ?>' + d.dokumen_chat + '">' + d.dokumen_chat + '</a>' +
                                        '<br>' + d.isi + '' +
                                        '<span class="msg_time">' + kapan + ',' + time + '</span>' +
                                        '</div>' +
                                        '</div>';
                                } else if (d.img_chat) {
                                    html += '<div class="d-flex justify-content-end mb-4">' +
                                        '<div class="msg_cotainer_send">' +
                                        '<div class="bs-callout bs-callout-info">' +
                                        'Membalas Chat :' +
                                        '' + d.replay_isi + '' +
                                        '</div>' +
                                        '<a  class="text-primary" target="_blank" href="<?= base_url('file_chat/') ?>' + d.img_chat + '"><img width="100%" src="<?= base_url('file_chat/') ?>' + d.img_chat + '"></a>' +
                                        '<br>' + d.isi + '' +
                                        '<span class="msg_time">' + kapan + ',' + time + '</span>' +
                                        '</div>' +
                                        '</div>';
                                } else {
                                    html += '<div class="d-flex justify-content-end mb-4">' +
                                        '<div class="msg_cotainer_send">' +
                                        '<div class="bs-callout bs-callout-info">' +
                                        'Membalas Chat :' +
                                        '' + d.replay_isi + '' +
                                        '</div>' +
                                        '<br>' + d.isi + '' +
                                        '<span class="msg_time">' + kapan + ',' + time + '</span>' +
                                        '</div>' +
                                        '</div>';
                                }

                            } else {
                                html += '<div class="d-flex justify-content-end mb-4">' +
                                    '<div class="msg_cotainer_send">' +
                                    '' + d.isi + '' +
                                    '<span class="msg_time">' + kapan + ',' + time + '</span>' +
                                    '</div>' +
                                    '</div>';
                            }
                        } else if (parseInt(d.id_pengirim) == id_pengirim) {
                            if (d.dokumen_chat == null) {
                                html += `<label class="badge badge-primary ml-5" >Panitia</label><div class="d-flex justify-content-start mb-4">
                <div class="img_cont_msg">
                <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                </div>
                <div class="msg_cotainer">
                   ${d.isi}								
                   <span class="msg_time">${kapan}, ${time}  	</span>
                </div> </div>`;
                            } else if (d.dokumen_chat) {
                                html += `<label class="badge badge-primary ml-5" >Panitia</label><div class="d-flex justify-content-start mb-4">
                <div class="img_cont_msg">
                <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                </div>
                <div class="msg_cotainer">
                <a href="<?= base_url('/file_chat/') ?>${d.dokumen_chat}"> ${d.dokumen_chat}</a> <br>
                   ${d.isi}								
                   <span class="msg_time">${kapan}, ${time}  	</span>
                </div>
             </div>`;
                            } else if (d.img_chat) {
                                html += `<label class="badge badge-primary ml-5" >Panitia</label><div class="d-flex justify-content-start mb-4">
                <div class="img_cont_msg">
                <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                </div>
                <div class="msg_cotainer">
                        <img width="100%" src="<?= base_url('file_chat/') ?>${d.img_chat}"> <br>
                   ${d.isi}								
                   <span class="msg_time">${kapan}, ${time}  	</span>
                </div>
              
             </div>`;
                            } else {
                                html += `<label class="badge badge-primary ml-5" >Panitia</label><div class="d-flex justify-content-start mb-4">
                <div class="img_cont_msg">
                <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                </div>
                <div class="msg_cotainer">
                   ${d.isi}								
                   <span class="msg_time">${kapan}, ${time}	</span>
                </div>
              
             </div>`;
                            }
                        } else {
                            if (d.nama_pegawai) {
                                if (d.dokumen_chat == null) {
                                    html += `<label class="badge badge-danger ml-5" >Panitia</label><div class="d-flex justify-content-start mb-4">
                <div class="img_cont_msg">
                <img src="<?= base_url('assets/img/proc.png') ?>" alt="" class="rounded-circle user_img_msg">
                </div>
                <div class="msg_cotainer">
                   ${d.isi}								
                   <span class="msg_time">${kapan}, ${time}  	</span>
                </div> </div>`;
                                } else if (d.dokumen_chat) {
                                    html += `<label class="badge badge-danger ml-5" >Panitia</label><div class="d-flex justify-content-start mb-4">
                <div class="img_cont_msg">
                <img src="<?= base_url('assets/img/proc.png') ?>" alt="" class="rounded-circle user_img_msg">
                </div>
                <div class="msg_cotainer">
                <a href="https://vms.jmtm.co.id/file_chat/${d.dokumen_chat}"> ${d.dokumen_chat}</a> <br>
                   ${d.isi}								
                   <span class="msg_time">${kapan}, ${time}  	</span>
                </div>
             </div>`;
                                } else if (d.img_chat) {
                                    html += `<label class="badge badge-danger ml-5" >Panitia</label><div class="d-flex justify-content-start mb-4">
                <div class="img_cont_msg">
                <img src="<?= base_url('assets/img/proc.png') ?>" alt="" class="rounded-circle user_img_msg">
                </div>
                <div class="msg_cotainer">
                        <img width="100%" src="https://vms.jmtm.co.id/file_chat/${d.img_chat}"> <br>
                   ${d.isi}								
                   <span class="msg_time">${kapan}, ${time}  	</span>
                </div>
              
             </div>`;
                                } else {
                                    html += '<label class="badge badge-danger ml-5" >' + d.nama_usaha + '</label><div class="d-flex justify-content-start mb-4">' +
                                        '<div class="img_cont_msg">' +
                                        '<img src="<?= base_url('assets/img/proc.png') ?>" alt="" class="rounded-circle user_img_msg">' +
                                        '</div>' +
                                        '<div class="msg_cotainer">' +
                                        '' + d.isi + '' +
                                        '<span class="msg_time">' +
                                        '' + kapan + '' +
                                        '' + time + '' +
                                        '<a onclick="Replay(' + "'" + d.id_pengirim + "','" + d.isi + "','" + d.nama_usaha + "'" + ')" href="javascript:;" class="badge badge-sm badge-warning">replay</a>	</span>' +
                                        '</div>' +
                                        '</div>';
                                }
                            } else {
                                if (d.dokumen_chat == null) {
                                    html += '<label class="badge badge-danger ml-5" >' + d.nama_usaha + '</label><div class="d-flex justify-content-start mb-4">' +
                                        '<div class="img_cont_msg">' +
                                        '<img src="<?= base_url('assets/vendor.png') ?>" alt="" class="rounded-circle user_img_msg">' +
                                        '</div>' +
                                        '<div class="msg_cotainer">' +
                                        '' + d.isi + '' +
                                        '<span class="msg_time">' +
                                        '' + kapan + '' +
                                        '' + time + '' +
                                        '<a onclick="Replay(' + "'" + d.id_pengirim + "','" + d.isi + "','" + d.nama_usaha + "'" + ')" href="javascript:;" class="badge badge-sm badge-warning">replay</a>	</span>' +
                                        '</div>' +
                                        '</div>';
                                } else if (d.dokumen_chat) {
                                    html += `<label class="badge badge-danger ml-5" >${d.nama_usaha}</label><div class="d-flex justify-content-start mb-4">
                <div class="img_cont_msg">
                <img src="<?= base_url('assets/vendor.png') ?>" alt="" class="rounded-circle user_img_msg">
                </div>
                <div class="msg_cotainer">
                <a href="https://vms.jmtm.co.id/file_chat/${d.dokumen_chat}"> ${d.dokumen_chat}</a> <br>
                   ${d.isi}								
                   <span class="msg_time">${kapan}, ${time}  	</span>
                </div>
             </div>`;
                                } else if (d.img_chat) {
                                    html += `<label class="badge badge-danger ml-5" >${d.nama_usaha}</label><div class="d-flex justify-content-start mb-4">
                <div class="img_cont_msg">
                <img src="<?= base_url('assets/vendor.png') ?>" alt="" class="rounded-circle user_img_msg">
                </div>
                <div class="msg_cotainer">
                        <img width="100%" src="https://vms.jmtm.co.id/file_chat/${d.img_chat}"> <br>
                   ${d.isi}								
                   <span class="msg_time">${kapan}, ${time}  	</span>
                </div>
              
             </div>`;
                                } else {
                                    html += '<label class="badge badge-danger ml-5" >' + d.nama_usaha + '</label><div class="d-flex justify-content-start mb-4">' +
                                        '<div class="img_cont_msg">' +
                                        '<img src="<?= base_url('assets/vendor.png') ?>" alt="" class="rounded-circle user_img_msg">' +
                                        '</div>' +
                                        '<div class="msg_cotainer">' +
                                        '' + d.isi + '' +
                                        '<span class="msg_time">' +
                                        '' + kapan + '' +
                                        '' + time + '' +
                                        '<a onclick="Replay(' + "'" + d.id_pengirim + "','" + d.isi + "','" + d.nama_usaha + "'" + ')" href="javascript:;" class="badge badge-sm badge-warning">replay</a>	</span>' +
                                        '</div>' +
                                        '</div>';
                                }
                            }

                        }
                        // notifikasis
                    });
                    // console.log(html)
                    $('#letakpesan2').html(html);

                }
            });

        }

        load_dok_sanggahan_pra()

        function load_dok_sanggahan_pra() {
            var id_rup = $('[name="id_rup"]').val()
            var url_get_sanggahan_pra = $('[name="url_get_sanggahan_pra"]').val()
            var url_open_sanggahan_pra = $('[name="url_open_sanggahan_pra"]').val()
            var url_open_sanggahan_pra_panitia = $('[name="url_open_sanggahan_pra_panitia"]').val()
            $.ajax({
                type: "POST",
                url: url_get_sanggahan_pra,
                data: {
                    id_rup: id_rup,
                },
                dataType: "JSON",
                success: function(response) {
                    var html = '';
                    var i;
                    var no = 1;
                    for (i = 0; i < response['result_sanggahan_pra'].length; i++) {
                        if (response['result_sanggahan_pra'][i].ket_sanggah_pra) {
                            var ket_sanggah_pra = response['result_sanggahan_pra'][i].ket_sanggah_pra
                        } else {
                            var ket_sanggah_pra = '-'
                        }

                        if (response['result_sanggahan_pra'][i].file_sanggah_pra) {
                            var file_sanggah_pra = '<a target="_blank" href="' + url_open_sanggahan_pra + response['result_sanggahan_pra'][i].nama_usaha + '/SANGGAHAN_PRAKUALIFIKASI/' + response['result_sanggahan_pra'][i].file_sanggah_pra + '"><img src="<?= base_url('assets/img/pdf.png') ?>" alt="File Sanggah" width="30px"></a>'
                        } else {
                            var file_sanggah_pra = '<span class="badge bg-secondary">Tidak Ada File</span>'
                        }

                        if (response['result_sanggahan_pra'][i].ket_sanggah_pra_panitia) {
                            var ket_sanggah_pra_panitia = response['result_sanggahan_pra'][i].ket_sanggah_pra_panitia
                        } else {
                            var ket_sanggah_pra_panitia = '-'
                        }

                        if (response['result_sanggahan_pra'][i].file_sanggah_pra) {
                            if (response['result_sanggahan_pra'][i].file_sanggah_pra_panitia) {
                                var file_sanggah_pra_panitia = '<a target="_blank" href="' + url_open_sanggahan_pra_panitia + response['result_sanggahan_pra'][i].file_sanggah_pra_panitia + '"><img src="<?= base_url('assets/img/pdf.png') ?>" alt="File Sanggah" width="30px"></a>'
                                var balas = '<a href="javascript:;"  onclick="balas_sanggahan_pra(\'' + response['result_sanggahan_pra'][i].id_sanggah_pra_detail + '\'' + ',' + '\'' + response['result_sanggahan_pra'][i].nama_usaha + '\')" class="btn btn-sm btn-success"><i class="fas fa fa-edit"></i> Balas </a>'
                            } else {
                                var file_sanggah_pra_panitia = '-'
                                var balas = '<a href="javascript:;"  onclick="balas_sanggahan_pra(\'' + response['result_sanggahan_pra'][i].id_sanggah_pra_detail + '\'' + ',' + '\'' + response['result_sanggahan_pra'][i].nama_usaha + '\')" class="btn btn-sm btn-success"><i class="fas fa fa-edit"></i> Balas </a>'
                            }

                        } else {
                            var file_sanggah_pra_panitia = '<span class="badge bg-secondary">Tidak Ada File</span>'
                            var balas = '-'
                        }
                        html += '<tr>' +
                            '<td><small>' + no++ + '</small></td>' +
                            '<td><small>' + response['result_sanggahan_pra'][i].nama_usaha + '</small></td>' +
                            '<td><small>' + ket_sanggah_pra + '</small></td>' +
                            '<td><small>' + file_sanggah_pra + '</small></td>' +
                            '<td><small>' + file_sanggah_pra_panitia + '</small></td>' +
                            '<td><small>' + ket_sanggah_pra_panitia + '</small></td>' +
                            '</tr>';
                        '</tr>';

                    }
                    $('#tbl_sanggah_pra').html(html);
                }
            })
        }

        load_vendor_negosiasi()

        function load_vendor_negosiasi() {
            var id_rup = $('[name="id_rup"]').val()
            var url_get_vendor_negosiasi = $('[name="url_get_vendor_negosiasi"]').val()
            $.ajax({
                type: "POST",
                url: url_get_vendor_negosiasi,
                data: {
                    id_rup: id_rup,
                },
                dataType: "JSON",
                success: function(response) {
                    var html = '';
                    var i;
                    var no = 1;
                    for (i = 0; i < response['result_vendor_negosiasi'].length; i++) {
                        if (response['result_vendor_negosiasi'][i].tanggal_negosiasi == null) {
                            var tanggal_negoasiasi = '<small class="badge bg-warning">Belum Ada Tanggal Negosiasi</small>'
                        } else {
                            var tanggal_negoasiasi = '<small>' + response['result_vendor_negosiasi'][i].tanggal_negosiasi + '</small>'
                        }
                        if (response['result_vendor_negosiasi'][i].link_negosiasi == null) {
                            var lin_nego = '<small class="badge bg-warning">Belum Ada Link Negosiasi</small>'
                        } else {
                            var lin_nego = '<small>' + response['result_vendor_negosiasi'][i].link_negosiasi + '</small>'
                        }
                        if (response['result_vendor_negosiasi'][i].sts_deal_negosiasi == null) {
                            var kesepakatan = '<small class="badge bg-warning">Belum Ada Kesepakatan</small>'
                        } else if (response['result_vendor_negosiasi'][i].sts_deal_negosiasi == 'deal') {
                            var kesepakatan = '<small class="badge bg-success">Deal</small>'
                        } else if (response['result_vendor_negosiasi'][i].sts_deal_negosiasi == 'tidak_deal') {
                            var kesepakatan = '<small class="badge bg-danger">Tidak Deal</small>'
                        }
                        var text = response['result_vendor_negosiasi'][i].nama_usaha
                        var sub_string = text.substring(2, 0)
                        if (sub_string == 'PT' || sub_string == 'CV' || sub_string == 'Koperasi') {
                            var nama_perusahaan = response['result_vendor_negosiasi'][i].nama_usaha
                        } else {
                            if (response['result_vendor_negosiasi'][i].bentuk_usaha == 'Perseroan Terbatas (PT)') {
                                var nama_perusahaan = 'PT ' + response['result_vendor_negosiasi'][i].nama_usaha
                            } else if (response['result_vendor_negosiasi'][i].bentuk_usaha == 'Commanditaire Vennootschap (CV)') {
                                var nama_perusahaan = 'CV ' + response['result_vendor_negosiasi'][i].nama_usaha
                            } else if (response['result_vendor_negosiasi'][i].bentuk_usaha == 'Koperasi') {
                                var nama_perusahaan = response['result_vendor_negosiasi'][i].nama_usaha
                            }
                        }
                        if (response['result_vendor_negosiasi'][i].total_hasil_negosiasi) {
                            var total_nego = response['result_vendor_negosiasi'][i].total_hasil_negosiasi.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')
                        } else {
                            var total_nego = '-'
                        }
                        html += '<tr>' +
                            '<td><small>' + no++ + '</small></td>' +
                            '<td><small>' + nama_perusahaan + '</small></td>' +
                            '<td>' + tanggal_negoasiasi + '</td>' +
                            '<td>' + lin_nego + '</td>' +
                            '<td>' + total_nego + '</td>' +
                            '<td>' + kesepakatan + '</td>' +
                            '</tr>';
                        '</tr>';

                    }
                    $('#tbl_vendor_negosiasi').html(html);
                }
            })
        }

        load_dok_sanggahan_akhir()

        function load_dok_sanggahan_akhir() {
            var id_rup = $('[name="id_rup"]').val()
            var url_get_sanggahan_akhir = $('[name="url_get_sanggahan_akhir"]').val()
            var url_open_sanggahan_akhir = $('[name="url_open_sanggahan_akhir"]').val()
            var url_open_sanggahan_akhir_panitia = $('[name="url_open_sanggahan_akhir_panitia"]').val()
            $.ajax({
                type: "POST",
                url: url_get_sanggahan_akhir,
                data: {
                    id_rup: id_rup,
                },
                dataType: "JSON",
                success: function(response) {
                    var html = '';
                    var i;
                    var no = 1;
                    for (i = 0; i < response['result_sanggahan_akhir'].length; i++) {
                        if (response['result_sanggahan_akhir'][i].ket_sanggah_akhir) {
                            var ket_sanggah_akhir = response['result_sanggahan_akhir'][i].ket_sanggah_akhir
                        } else {
                            var ket_sanggah_akhir = '-'
                        }

                        if (response['result_sanggahan_akhir'][i].file_sanggah_akhir) {
                            var file_sanggah_akhir = '<a target="_blank" href="' + url_open_sanggahan_akhir + response['result_sanggahan_akhir'][i].nama_usaha + '/SANGGAHAN_AKHIR/' + response['result_sanggahan_akhir'][i].file_sanggah_akhir + '"><img src="<?= base_url('assets/img/pdf.png') ?>" alt="File Sanggah" width="30px"></a>'
                        } else {
                            var file_sanggah_akhir = '<span class="badge bg-secondary">Tidak Ada File</span>'
                        }

                        if (response['result_sanggahan_akhir'][i].ket_sanggah_akhir_panitia) {
                            var ket_sanggah_akhir_panitia = response['result_sanggahan_akhir'][i].ket_sanggah_akhir_panitia
                        } else {
                            var ket_sanggah_akhir_panitia = '-'
                        }

                        if (response['result_sanggahan_akhir'][i].file_sanggah_akhir_panitia) {
                            if (response['result_sanggahan_akhir'][i].file_sanggah_akhir_panitia) {
                                var file_sanggah_akhir_panitia = '<a target="_blank" href="' + url_open_sanggahan_akhir_panitia + response['result_sanggahan_akhir'][i].file_sanggah_akhir_panitia + '"><img src="<?= base_url('assets/img/pdf.png') ?>" alt="File Sanggah" width="30px"></a>'
                                var balas = '<a href="javascript:;"  onclick="balas_sanggahan_akhir(\'' + response['result_sanggahan_akhir'][i].id_sanggah_akhir_detail + '\'' + ',' + '\'' + response['result_sanggahan_akhir'][i].nama_usaha + '\')" class="btn btn-sm btn-success"><i class="fas fa fa-edit"></i> Balas </a>'
                            } else {
                                var file_sanggah_akhir_panitia = '-'
                                var balas = '<a href="javascript:;"  onclick="balas_sanggahan_akhir(\'' + response['result_sanggahan_akhir'][i].id_sanggah_akhir_detail + '\'' + ',' + '\'' + response['result_sanggahan_akhir'][i].nama_usaha + '\')" class="btn btn-sm btn-success"><i class="fas fa fa-edit"></i> Balas </a>'
                            }

                        } else {
                            var file_sanggah_akhir_panitia = '<span class="badge bg-secondary">Tidak Ada File</span>'
                            var balas = '<a href="javascript:;"  onclick="balas_sanggahan_akhir(\'' + response['result_sanggahan_akhir'][i].id_sanggah_akhir_detail + '\'' + ',' + '\'' + response['result_sanggahan_akhir'][i].nama_usaha + '\')" class="btn btn-sm btn-success"><i class="fas fa fa-edit"></i> Balas </a>'
                        }
                        html += '<tr>' +
                            '<td><small>' + no++ + '</small></td>' +
                            '<td><small>' + response['result_sanggahan_akhir'][i].nama_usaha + '</small></td>' +
                            '<td><small>' + ket_sanggah_akhir + '</small></td>' +
                            '<td><small>' + file_sanggah_akhir + '</small></td>' +
                            '<td><small>' + file_sanggah_akhir_panitia + '</small></td>' +
                            '<td><small>' + ket_sanggah_akhir_panitia + '</small></td>' +
                            '<td>' + balas + '</td>' +
                            '</tr>';
                        '</tr>';

                    }
                    $('#tbl_sanggah_akhir').html(html);
                }
            })
        }
    </script>
</body>

</html>
<script>
    setTimeout(function() {
        window.print();
    }, 7000);
</script>