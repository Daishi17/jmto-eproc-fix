<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#7952b3">

    <title>E-Tender || JMTO</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/fontawesome-free/css/all.min.css">
    <link href="<?php echo base_url(); ?>/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/brand/jm1.png" />
    <link href="<?php echo base_url(); ?>/assets/css///bs5-style.css" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins-lte/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins-lte/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins-lte/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins-lte/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins-lte/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="<?php echo base_url(); ?>/assets/css/bs5-style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/css/bs4-card.css" rel="stylesheet">

    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins-lte/select2/css/select2.css">
</head>
<main class="container">
    <style>
        .btn-grad5 {
            width: 100%;
            background-image: linear-gradient(to right, #000046 0%, #1CB5E0 51%, #000046 100%);
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;

            border-radius: 10px;
        }

        .btn-grad5:hover {
            background-position: right center;
            /* change the direction of the change here */
            color: #fff;
            box-shadow: 0 0 40px #1CB5E0;
            text-decoration: none;
        }

        .btn-grad6 {
            width: 100%;
            background-image: linear-gradient(to right, #000046 0%, #1CB5E0 51%, #000046 100%);
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;

            border-radius: 10px;
        }

        .btn-grad6:hover {
            background-position: right center;
            /* change the direction of the change here */
            color: #fff;
            box-shadow: 0 0 40px #1CB5E0;
            text-decoration: none;
        }

        .btn-grad15 {
            background-image: linear-gradient(to right, #fc00ff 0%, #00dbde 51%, #fc00ff 100%)
        }

        .btn-grad15 {
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;
            box-shadow: 0 0 20px #eee;

        }

        .btn-grad15:hover {
            background-position: right center;
            /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
            box-shadow: 0 0 40px #fc00ff;
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

        .card_chat {

            height: 500px;
            border-radius: 15px !important;
            background-image: linear-gradient(to right, #000046 0%, #1CB5E0 51%, #000046 100%);
        }

        .card_chat:hover {
            box-shadow: 0 0 40px #1CB5E0;
        }

        .contacts_body {
            padding: 0.75rem 0 !important;
            overflow-y: auto;
            white-space: nowrap;
        }

        .msg_card_body {
            overflow-y: auto;
        }

        .card-header_chat {
            border-radius: 15px 15px 0 0 !important;
            border-bottom: 0 !important;
        }

        .card-footer_chat {
            border-radius: 0 0 15px 15px !important;
            border-top: 0 !important;
        }

        .container_chat {
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
            height: 50px !important;
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
            height: 50px !important;
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
            width: 500px;
        }

        .msg_cotainer_send {
            width: 500px;
            margin-top: auto;
            margin-bottom: auto;
            margin-right: 10px;
            border-radius: 25px;
            background-color: #78e08f;
            padding: 10px;
            position: relative;
        }

        .msg_cotainer_send2 {
            margin-top: auto;
            margin-bottom: auto;
            margin-right: 10px;
            border-radius: 25px;
            background-color: #BDB76B;
            padding: 10px;
            position: relative;
            width: 500px;
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

        @media(max-width: 576px) {
            .contacts_card {
                margin-bottom: 15px !important;
            }
        }
    </style>
    <div class="row">
        <div class="img_cont">
            <img src="<?= base_url('assets/chat_logo.png') ?>" class="rounded-circle user_img">
            <span class="online_icon"></span>
        </div>
        <div class="col">
            <div class="card-header card-chat">
                <div class="d-flex bd-highlight">

                    <div class="user_info">
                        <span style="font-size: 13px;color:#000046">Forum Chat Paket <?= $row_rup['nama_rup'] ?></span>
                        <p style="font-size: 13px;color:#000046">Kode Tender : <?= $row_rup['kode_rup'] ?></p>
                    </div>
                </div>
                <span id="action_menu_btn"><img src="<?= base_url('assets/img/logo_asli.png') ?>" style="margin-right: 100px;" width="250px" alt=""></span>
            </div>
            <input type="hidden" name="id_pengirim" id="id_pengirim" value="<?= $this->session->userdata('id_pegawai'); ?>">
            <input type="hidden" name="id_rup" value="<?= $row_rup['id_rup'] ?>">
            <div class="card-body msg_card_body" id="letakpesan">

            </div>
        </div>
    </div>
</main>

<!-- BS5 Style-->
<script src="<?php echo base_url(); ?>/assets/dist/js/bootstrap.bundle.min.js"></script>
<!-- Tanggal & Jam-->
<script src="<?php echo base_url(); ?>/assets/js/jam_tgl.min.js"></script>
<!-- JQUERY-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>/assets/plugins-lte/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js//chart_validator.js"></script> <!-- DataTables  & Plugins -->
<script src="<?php echo base_url(); ?>/assets/plugins-lte/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins-lte/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins-lte/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins-lte/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins-lte/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins-lte/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins-lte/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins-lte/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins-lte/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins-lte/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins-lte/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins-lte/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- <script src="<?php echo base_url(); ?>/assets/js/datatable_master.js"></script> -->
<!-- <script src="<?= base_url('js_folder/data_rekanan.min.js') ?>"></script> -->
<script>
    let log_off = new Date();
    log_off.setHours(log_off.getHours() + 2);
    log_off = new Date(log_off);
    let int_logoff = setInterval(() => {
        let now = new Date();
        if (now > log_off) {
            window.location.assign("<?= base_url('auth/logout') ?>");
            clearInterval(int_logoff);
        }
    }, 5000);

    $('body').on('click', function() {
        let log_off = new Date();
        log_off.setHours(log_off.getHours() + 2);
        log_off = new Date(log_off);
    })

    setTimeout(() => {
        window.print()
    }, 2000);
</script>
</body>

</html>