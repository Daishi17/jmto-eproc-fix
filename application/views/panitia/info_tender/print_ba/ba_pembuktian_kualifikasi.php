<!DOCTYPE html>
<html lang="en">

<head>
    <title>Berita Acara Pembuktian Kualifikasi</title>
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
                <h4 class="text-uppercase font-weight-bold" style="line-height: 1;">Berita Acara Pembuktian Kualifikasi</h4>
                <h5 class="text-uppercase font-weight-bold" style="line-height: 1;"><?= $row_rup['nama_rup'] ?></h5>
                <h5 class="text-uppercase font-weight-bold" style="line-height: 1;">PT JASA MARGA TOLLROAD Operator</h5>
            </center>
            <hr size="5">
            <center>
                <div style="font-size:18px">
                    <label class="font-weight-bold">Nomor : <?= $row_rup['ba_pembuktian_no'] ?></label>
                    <br>
                    <label class="font-weight-bold">Tanggal : <?= tgl_indo($row_rup['ba_pembuktian_tgl']) ?></label>
                </div>
            </center>
            <div class="container">
                <p style="text-align:justify; font-size:18px">
                    Pada Hari ini <b><?= $row_rup['ba_pembuktian_hari'] ?></b>,
                    Tanggal <b class="text-capitalize"><?= terbilang(date('d', strtotime($row_rup['ba_pembuktian_tgl']))) ?></b>,
                    Bulan <b class="text-capitalize"> <?= bln_indo(date('m', strtotime($row_rup['ba_pembuktian_tgl']))) ?></b>,
                    Tahun <b> <?= terbilang(date('Y', strtotime($row_rup['ba_pembuktian_tgl']))) ?> (<?= date('d-m-Y', strtotime($row_rup['ba_pembuktian_tgl'])) ?>)</b>, pukul <?= $row_rup['ba_pembuktian_jam_pelaksanaan'] ?> WIB bertempat di ruang rapat PT Jasamarga Tollroad Operator atau virtual meeting, kami yang bertanda tangan di bawah ini selaku Panitia Pengadaan Barang / Jasa tersebut di atas yang dibentuk berdasarkan Surat Keputusan Direksi PT Jasamarga Tollroad Operator Nomor : <?= $row_rup['ba_sk_direksi'] ?> tanggal <?= $row_rup['tgl_ba_sk_direksi'] ?> tentang Pembentukan Panitia Pengadaan Barang dan Jasa telah mengadakan Rapat Pembuktian Kualifikasi terhadap Peserta yang telah menyampaikan isian Kualifikasi untuk :
                </p>

                <p style="text-align:justify; font-size:18px"><b> <?= $row_rup['nama_rup'] ?> </b></p>

                <p style="text-align:justify; font-size:18px">Dalam kegiatan Pembuktian Kualifikasi dimaksud, maka Panitia Pengadaan melakukan pemeriksaan kebenaran terhadap semua Dokumen-Dokumen ASLI yang terkait dengan data-data yang telah disampaikan oleh Peserta dalam Formulir Isian Kualifikasi, dengan hasil sebagai berikut :</p>

                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th rowspan="2" class="text-center"><b>No</b></th>
                            <th rowspan="2" class="text-center"><b>Peserta</b></th>
                            <th colspan="3" class="text-center"><b>Pembuktian Kualifikasi</b></th>
                        </tr>
                        <tr>
                            <th class="text-center"><b>Kehadiran</b></th>
                            <th class="text-center"><b>Dokumen</b></th>
                            <th class="text-center"><b>Keterangan</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($peserta_tender as $key => $value) { ?>
                            <tr>
                                <td class="text-center"><?= $i++ ?></td>
                                <td><b class="text-uppercase"><?= $value['nama_usaha'] ?></b></td>
                                <td class="text-center">
                                    <b><?= $value['ba_pembuktian_hadir'] ?></b>
                                </td>
                                <td class="text-center">
                                    <b><?= $value['ba_pembuktian_dok'] ?></b>
                                </td>
                                <td class="text-center">
                                    <b><?= $value['ba_pembuktian_ket'] ?></b>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <p style="text-align:justify; font-size:18px">Daftar Pemeriksaan Pembuktian Kualifikasi dimaksud merupakan satu kesatuan dan bagian yang tidak terpisahkan dari Berita Acara ini.</p>

                <p style="text-align:justify; font-size:18px">Demikian Berita Acara ini dibuat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya.</p>
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
                <center><b class="text-uppercase"><?= $row_rup['nama_rup'] ?> </b> </center>
                <br>
                <b>PANITIA : </b>
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
                                    <?php if ($value['sts_ba_pembuktian_kualifikasi'] == 1) { ?>
                                        <span class="badge bg-success text-white">Setuju</span>
                                    <?php  } else if ($value['sts_ba_pembuktian_kualifikasi'] == 2) { ?>
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
                DAFTAR PEMERIKSAAN PEMBUKTIAN SYARAT TAMBAHAN KUALIFIKASI <label for="" class="text-uppercase"></label>(<?= $row_rup['nama_rup']  ?>)
                <br>
                <br>
                <ol>
                    <?php $i = 1;
                    foreach ($peserta_tender as $key => $value) { ?>
                        <li><?= $value['nama_usaha'] ?></li>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Syarat Tambahan</th>
                                    <th>Status</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php $o = 1;
                                foreach ($get_syarat_tambahan as $key => $value2) { ?>
                                    <?php
                                    $this->db->select('*');
                                    $this->db->from('tbl_vendor_syarat_tambahan');
                                    $this->db->where('id_vendor', $value['id_vendor']);
                                    $this->db->where('id_rup', $row_rup['id_rup']);
                                    $this->db->where('nama_syarat_tambahan', $value2['nama_syarat_tambahan']);
                                    $query = $this->db->get()->row_array();

                                    ?>
                                    <tr>
                                        <td><?= $o++ ?></td>
                                        <td><?= $value2['nama_syarat_tambahan'] ?></td>
                                        <td>
                                            <?php if ($query['nama_syarat_tambahan']) { ?>
                                                <?php if ($query['status'] == 0) { ?>
                                                    <span class="badge bg-secondary">Belum Di Periksa</span>
                                                <?php } else if ($query['status'] == 1) { ?>
                                                    <span class="badge bg-success">Lulus</span>
                                                <?php } else if ($query['status'] == 2) { ?>
                                                    <span class="badge bg-danger">Gugur</span>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <span class="badge bg-danger">Belum Upload</span>
                                            <?php  }   ?>

                                        </td>
                                    </tr>
                                <?php  } ?>

                            </tbody>
                            <tbody>

                            </tbody>
                        </table>
                    <?php } ?>
                </ol>
                <!-- <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th class="text-center"><b>NO</b></th>
                            <th class="text-center"><b>NAMA</b></th>
                            <th class="text-center"><b>PERUSAHAAN</b></th>
                            <th class="text-center"><b>TANDA TANGAN</b></th>
                        </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                </table> -->
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