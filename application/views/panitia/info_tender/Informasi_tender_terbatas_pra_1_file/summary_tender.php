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
                    <h4 class="text-center">DOKUMEN PENGADAAN</h4>
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Dokumen</th>
                            <th>Tanggal Upload</th>
                            <th>Pengirim</th>
                        </tr>
                        <?php foreach ($dok_lelang as $key => $value) { ?>
                            <tr>
                                <td><?= $value['file_dok_pengadaan'] ?></td>
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
                    <h4 class="text-center">HASIL EVALUASI</h4>
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
                    <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                        <div class="flex-grow-1 bd-highlight">
                            <span class="text-dark">
                                <small class="text-white"><strong><i class="fa-solid fa-table px-1"></i> Data Tabel - Evalusi HEA TKDN</strong></small>
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
                                <small class="text-white"><strong><i class="fa-solid fa-table px-1"></i> Data Tabel - Peringkat Akhir HEA</strong></small>
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
                    <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                        <div class="flex-grow-1 bd-highlight">
                            <span class="text-dark">
                                <small class="text-white"><strong><i class="fa-solid fa-table px-1"></i> Data Tabel - Peringkat Akhir Harga Terendah</strong></small>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="tbl_peringkat_akhir_terendah">
                            <thead style="text-align: center;">
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Nama Perusahaan</th>
                                    <th rowspan="2">Kelengkapan Dokumen Administrasi dan Teknis </th>
                                    <th rowspan="2">Harga Penawaran <br> (Setelah Koreksi Aritmatika)</th>
                                    <th rowspan="2">% Penawaran Terhadap HPS</th>
                                    <th>Nilai Biaya</th>
                                    <th rowspan="2">Peringkat Akhir</th>
                                    <th rowspan="2">Keterangan</th>

                                </tr>
                                <tr>
                                    <th>100%</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                    </div>

                    <h4 class="text-center">SANGGAHAN</h4>
                    <table class="table table-bordered">
                        <tr>
                            <th>SANGGAHAN</th>
                            <th>PENGIRIM</th>
                        </tr>
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
                    "url": '<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_evaluasi_hea_tkdn_harga_terendah/') ?>' + id_rup,
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
                    "url": '<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_evaluasi_pringkat_akhir_harga_terendah_hea/') ?>' + id_rup,
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
    </script>
</body>

</html>
<script>
    setTimeout(function() {
        window.print();
    }, 7000);
</script>