<main class="container">
    <!-- id rup global -->
    <input type="hidden" name="id_rup" value="<?= $row_rup['id_rup'] ?>">

    <div class="row">
        <div class="col">
            <div class="card border-dark">
                <div class="card-header border-dark bg-white text-black">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" style="margin-left: 5px;" href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/informasi_pengadaan' . '/' . $row_rup['id_url_rup']) ?>"><i class="fa fa-columns" aria-hidden="true"></i> Informasi Pengadaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/aanwijzing' . '/'  . $row_rup['id_url_rup']) ?>"><i class="fa fa-comments" aria-hidden="true"></i> Aanwijzing (PQ)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/aanwijzing_penawaran' . '/'  . $row_rup['id_url_rup']) ?>"><i class="fa fa-comments" aria-hidden="true"></i> Aanwijzing (Penawaran)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/evaluasi' . '/'  . $row_rup['id_url_rup']) ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i> Evaluasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/negosiasi' . '/'  . $row_rup['id_url_rup']) ?>"><i class="fa fa-tags" aria-hidden="true"></i> Negosiasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white " style="margin-left: 5px;" href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/sanggahan_prakualifikasi' . '/'  . $row_rup['id_url_rup']) ?>"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Sanggahan Kualifikasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/sanggahan_akhir' . '/'  . $row_rup['id_url_rup']) ?>"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Sanggahan </a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="card border-dark">
                <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                    <div class="flex-grow-1 bd-highlight">
                        <span class="text-dark">
                            <small class="text-white"><strong><i class="fa-solid fa-table px-1"></i> Data Tabel - Info Pengadaan</strong></small>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th style="width: 300px;">Kode Pengadaan</th>
                            <th> <?= $row_rup['kode_rup'] ?> <a style="float: right;" href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/summary_tender' . '/' . $row_rup['id_url_rup']) ?>" class="btn-sm btn btn-primary text-white"><i class="fas fa fa-file"></i> Summary Tender</a></th>
                        </tr>
                        <tr>
                            <th>Nama Paket</th>
                            <th> <?= $row_rup['nama_rup'] ?></th>
                        </tr>
                        <tr>
                            <th>TKDN</th>
                            <th> <?= $row_rup['status_pencatatan'] ?> (<?= $row_rup['persen_pencatatan'] ?>%)</th>
                        </tr>
                        <tr>
                            <th>Nilai HPS</th>
                            <th>Rp. <?= number_format($row_rup['total_hps_rup'], 2, ",", "."); ?> </th>
                        </tr>
                        <tr>
                            <th>Jadwal Pengadaan</th>
                            <th>
                                <button type="button" class="btn btn-sm btn-primary" onclick="lihat_detail_jadwal('<?= $row_rup['id_url_rup'] ?>')">
                                    <i class="fa fa-calendar" aria-hidden="true"></i> Lihat Jadwal
                                </button>
                            </th>
                        </tr>
                        <tr>
                            <th>Jumlah Peserta</th>
                            <th><button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#lihat_peserta">
                                    <i class="fa fa-users" aria-hidden="true"></i> <?= $hitung_peserta ?> Peserta
                                </button></th>
                        </tr>

                        <?php if (date('Y-m-d H:i', strtotime($jadwal_aanwijzing_pq['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>
                            <!-- belom mulai -->

                        <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_aanwijzing_pq['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_aanwijzing_pq['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                            <tr>
                                <th> Peserta (Aanwijzing PQ)</th>
                                <th><button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#lihat_peserta_aanwijzing_pq" title="Peserta Aanwijzing Prakuakifikasi Yang Aktif">
                                        <i class="fa fa-users" aria-hidden="true"></i> Peserta Aanwijzing Kualifikasi
                                    </button></th>
                            </tr>

                        <?php    } else { ?>
                            <tr>
                                <th> Peserta (Aanwijzing PQ)</th>
                                <th><button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#lihat_peserta_aanwijzing_pq" title="Peserta Aanwijzing Prakuakifikasi Yang Aktif">
                                        <i class="fa fa-users" aria-hidden="true"></i> Peserta Aanwijzing Kualifikasi
                                    </button></th>
                            </tr>
                        <?php    } ?>

                        <?php if (date('Y-m-d H:i', strtotime($jadwal_aanwijzing['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>
                            <!-- belom mulai -->

                        <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_aanwijzing['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_aanwijzing['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                            <tr>
                                <th> Peserta (Aanwijzing Penawaran)</th>
                                <th><button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#lihat_peserta_aanwijzing_penawaran" title="Peserta Aanwijzing Prakuakifikasi Yang Aktif">
                                        <i class="fa fa-users" aria-hidden="true"></i> Peserta Aanwijzing Penawaran
                                    </button></th>
                            </tr>

                        <?php    } else { ?>
                            <tr>
                                <th>Jumlah Peserta (Aanwijzing Penawaran)</th>
                                <th><button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#lihat_peserta_aanwijzing_penawaran" title="Peserta Aanwijzing Prakuakifikasi Yang Aktif">
                                        <i class="fa fa-users" aria-hidden="true"></i> Peserta Aanwijzing Penawaran
                                    </button></th>
                            </tr>
                        <?php    } ?>


                        <tr>
                            <th>Dokumen Pengadaan</th>
                            <th>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header bg-primary text-white">
                                                List Dokumen Pengadaan
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama File</th>
                                                            <th>File</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1;
                                                        foreach ($dok_lelang as $key => $value) { ?>
                                                            <tr>
                                                                <td scope="row"><?= $no++ ?></td>
                                                                <td><?= $value['nama_dok_pengadaan'] ?></td>
                                                                <td>
                                                                    <a style="width: 100%;" target="_blank" href="<?= base_url('file_paket/' . $row_rup['nama_rup'] . '/DOKUMEN_PENGADAAN' . '/' . $value['file_dok_pengadaan']) ?>" class="btn btn-block btn-sm btn-danger"><i class="fas fa fa-file"></i> View</a>
                                                                    <?php if ($value['sts_dokumen_tambahan'] == 1) { ?>
                                                                        <a href="javascript:;" onclick="notifikasi_dokumen(<?= $value['id_dokumen_pengadaan'] ?>)" class="btn btn-block btn-sm btn-warning mt-2"><i class="fas fa fa-file"></i> Kirim Info Ubah Dokumen</a>
                                                                    <?php } else { ?>
                                                                    <?php }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header bg-primary text-white">
                                                List Dokumen Kualifikasi
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama File</th>
                                                            <th>File</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1;
                                                        foreach ($dok_prakualifikasi as $key => $value) { ?>
                                                            <tr>
                                                                <td scope="row"><?= $no++ ?></td>
                                                                <td><?= $value['nama_dok_prakualifikasi'] ?></td>
                                                                <td><a style="width: 100%;" target="_blank" href="<?= base_url('file_paket/' . $row_rup['nama_rup'] . '/DOKUMEN_PRAKUALIFIKASI' . '/' . $value['file_dok_prakualifikasi']) ?>" class="btn btn-sm btn-danger"><i class="fas fa fa-file"></i> View</a>
                                                                    <?php if ($value['sts_dokumen_tambahan'] == 1) { ?>
                                                                        <a href="javascript:;" onclick="notifikasi_dokumen_kualifikasi(<?= $value['id_dokumen_prakualifikasi'] ?>)" class="btn btn-block btn-sm btn-warning mt-2"><i class="fas fa fa-file"></i> Kirim Info Ubah Dokumen</a>
                                                                </td>
                                                            <?php } else { ?>
                                                            <?php }
                                                            ?>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header bg-primary text-white">
                                                Persyaratan Tambahan
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Persyaratan</th>
                                                            <th>File</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1;
                                                        foreach ($dok_tambahan as $key => $value) { ?>
                                                            <tr>
                                                                <td scope="row"><?= $no++ ?></td>
                                                                <td><?= $value['nama_syarat_tambahan'] ?></td>
                                                                <?php if ($value['file_syarat_tambahan']) { ?>
                                                                    <td><a target="_blank" href="<?= base_url('file_paket/' . $row_rup['nama_rup'] . '/DOKUMEN_PRAKUALIFIKASI' . '/' . $value['file_syarat_tambahan']) ?>" class="btn btn-sm btn-danger"><i class="fas fa fa-file"></i> View</a> </td>
                                                                <?php } else { ?>
                                                                    <td><span class="badge bg-danger">Tidak Ada File</span> </td>
                                                                <?php  } ?>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th>Undangan Pembuktian</th>
                            <th>
                                <?php if (date('Y-m-d H:i', strtotime($jadwal_pembuktian_kualifikasi['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>
                                    <!-- belom mulai -->
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#undangan_pembuktian" disabled>
                                        <i class="fa fa-upload" aria-hidden="true"></i> Belum Memasuki Jadwal Ini
                                    </button>
                                <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_pembuktian_kualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_pembuktian_kualifikasi['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#undangan_pembuktian">
                                        <i class="fa fa-upload" aria-hidden="true"></i> Buat Undangan Pembuktian
                                    </button>
                                <?php    } else { ?>
                                    <!-- udah selesai -->
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#undangan_pembuktian">
                                        <i class="fa fa-upload" aria-hidden="true"></i> Buat Undangan Pembuktian
                                    </button>
                                <?php    } ?>
                            </th>
                        </tr>
                        <?php if (date('Y-m-d H:i', strtotime($jadwal_evaluasi_dokumen_kualifikasi['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>
                            <!-- belom mulai -->

                        <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_evaluasi_dokumen_kualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_evaluasi_dokumen_kualifikasi['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                            <tr>
                                <th>Persyaratan Tambahan Penyedia</th>
                                <th>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header bg-primary text-white">
                                                    Persyaratan Tambahan Penyedia
                                                </div>
                                                <div class="card-body">
                                                    <table class="table table-bordered" id="tbl_persyaratan_tambahan_vendor">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Penyedia</th>
                                                                <th>Status</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </th>
                            </tr>

                        <?php    } else { ?>
                            <tr>
                                <th>Persyaratan Tambahan Penyedia</th>
                                <th>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header bg-primary text-white">
                                                    Persyaratan Tambahan Penyedia
                                                </div>
                                                <div class="card-body">
                                                    <table class="table table-bordered" id="tbl_persyaratan_tambahan_vendor">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Penyedia</th>
                                                                <th>Status</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                        <?php    } ?>
                        <?php if (date('Y-m-d H:i', strtotime($jadwal_pembukaan_file1['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>


                        <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_pembukaan_file1['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_pembukaan_file1['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                            <tr>
                                <th>Bobot Teknis</th>
                                <th><?= $row_rup['bobot_teknis'] ?>
                                </th>
                            </tr>
                            <tr>
                                <th>Bobot Biaya</th>
                                <th><?= $row_rup['bobot_biaya'] ?></th>
                            </tr>

                        <?php    } else { ?>
                            <tr>
                                <th>Bobot Teknis</th>
                                <th><?= $row_rup['bobot_teknis'] ?>
                                </th>
                            </tr>
                            <tr>
                                <th>Bobot Biaya</th>
                                <th><?= $row_rup['bobot_biaya'] ?></th>
                            </tr>
                        <?php    } ?>



                        <tr>
                            <th>Hasil Kualifikasi</th>
                            <th>
                                <?php if (date('Y-m-d H:i', strtotime($jadwal_pengumuman_hasil_kualifikasi['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hasil_prakualifikasi" disabled>
                                        <i class="fa fa-upload" aria-hidden="true"></i> Belum Memasuki Tahap Ini
                                    </button>

                                <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_pengumuman_hasil_kualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_pengumuman_hasil_kualifikasi['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hasil_prakualifikasi">
                                        <i class="fa fa-upload" aria-hidden="true"></i> Buat Pengumuman Hasil Kualifikasi
                                    </button>

                                <?php    } else { ?>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hasil_prakualifikasi">
                                        <i class="fa fa-upload" aria-hidden="true"></i> Buat Pengumuman Hasil Kualifikasi
                                    </button>

                                <?php    } ?>

                            </th>
                        </tr>
                        <tr>
                            <th>Undangan Penawaran</th>
                            <th>
                                <?php if (date('Y-m-d H:i', strtotime($jadwal_pengumuman_hasil_kualifikasi['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#undangan_penawaran" disabled>
                                        <i class="fa fa-upload" aria-hidden="true"></i> Belum Memasuki Tahap Ini
                                    </button>

                                <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_pengumuman_hasil_kualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_pengumuman_hasil_kualifikasi['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#undangan_penawaran">
                                        <i class="fa fa-upload" aria-hidden="true"></i> Buat Undangan Penawaran
                                    </button>

                                <?php    } else { ?>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#undangan_penawaran">
                                        <i class="fa fa-upload" aria-hidden="true"></i> Buat Undangan Penawaran
                                    </button>

                                <?php    } ?>

                            </th>
                        </tr>
                        <tr>
                            <th>Pembukaan Penawaran</th>
                            <th>
                                <?php if (date('Y-m-d H:i', strtotime($jadwal_pembukaan_file1['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>
                                    <button type="button" class="btn btn-sm btn-primary" disabled>
                                        <i class="fa fa-folder-open" aria-hidden="true"></i> Belum Memasuki Tahap Ini
                                    </button>

                                <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_pembukaan_file1['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_pembukaan_file1['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#buka_dokumen_penawaran">
                                        <i class="fa fa-folder-open" aria-hidden="true"></i> Buka Dokumen Penawaran
                                    </button>

                                <?php    } else { ?>
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#buka_dokumen_penawaran">
                                        <i class="fa fa-folder-open" aria-hidden="true"></i> Buka Dokumen Penawaran
                                    </button>

                                <?php    } ?>

                            </th>
                        </tr>
                        <tr>
                            <th>Berita Acara dan Pengumuman Pengadaan</th>
                            <th>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div class="card-header bg-primary text-white">
                                                Upload Berita Acara dan Pengumuman Pengadaan
                                                <a href="" style="float: right;" data-bs-toggle="modal" data-bs-target="#upload_berita_acara_tender" class="btn btn-danger btn-sm"> <i class="fas fa fa-upload"></i> Upload</a>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama File</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <?php if ($row_rup['ba_pembuktian_no']) { ?>
                                                                <th>Berita Acara Pembuktian Kualifikasi</th>
                                                                <th><a target="_blank" class="btn btn-sm btn-info text-white" href="<?= base_url() ?>panitia/info_tender/Informasi_tender_terbatas_pra_1_file/ba_pembuktian_kualifikasi/<?= $row_rup['id_url_rup'] ?>"><i class="fa fa-eye"></i> Lihat</a></th>
                                                            <?php } ?>
                                                        </tr>
                                                        <tr>
                                                            <?php if ($row_rup['ba_evaluasi_no']) { ?>
                                                                <th>Berita Acara Hasil Evaluasi</th>
                                                                <th><a target="_blank" class="btn btn-sm btn-info text-white" href="<?= base_url() ?>panitia/info_tender/Informasi_tender_terbatas_pra_1_file/ba_hasil_evaluasi/<?= $row_rup['id_url_rup'] ?>"><i class="fa fa-eye"></i> Lihat</a></th>
                                                            <?php } ?>
                                                        </tr>
                                                        <tr>
                                                            <?php if ($row_rup['ba_sampul1_no']) { ?>
                                                                <th>Berita Acara Pembukaan Dokumen Penawaran Sampul I (Administrasi Dan Teknis)</th>
                                                                <th><a target="_blank" class="btn btn-sm btn-info text-white" href="<?= base_url() ?>panitia/info_tender/Informasi_tender_terbatas_pra_1_file/ba_sampul_I/<?= $row_rup['id_url_rup'] ?>"><i class="fa fa-eye"></i> Lihat</a></th>
                                                            <?php } ?>
                                                        </tr>
                                                        <tr>
                                                            <?php if ($row_rup['undangan_rapat_no']) { ?>
                                                                <th>Undangan Rapat Presentasi Teknis</th>
                                                                <th><a target="_blank" class="btn btn-sm btn-info text-white" href="<?= base_url() ?>panitia/info_tender/Informasi_tender_terbatas_pra_1_file/ba_undangan_rapat/<?= $row_rup['id_url_rup'] ?>"><i class="fa fa-eye"></i> Lihat</a></th>
                                                            <?php } ?>
                                                        </tr>
                                                        <tr>
                                                            <?php if ($row_rup['ba_evaluasi_teknis_no']) { ?>
                                                                <th>Berita Acara Hasil Evaluasi Teknis</th>
                                                                <th><a target="_blank" class="btn btn-sm btn-info text-white" href="<?= base_url() ?>panitia/info_tender/Informasi_tender_terbatas_pra_1_file/ba_hasil_evaluasi_teknis/<?= $row_rup['id_url_rup'] ?>"><i class="fa fa-eye"></i> Lihat</a></th>
                                                            <?php } ?>
                                                        </tr>
                                                        <tr>
                                                            <?php if ($row_rup['ba_sampul2_no']) { ?>
                                                                <th>Berita Acara Pembukaan Dokumen Penawaran Sampul II</th>
                                                                <th><a target="_blank" class="btn btn-sm btn-info text-white" href="<?= base_url() ?>panitia/info_tender/Informasi_tender_terbatas_pra_1_file/ba_sampul_II/<?= $row_rup['id_url_rup'] ?>"><i class="fa fa-eye"></i> Lihat</a></th>
                                                            <?php } ?>
                                                        </tr>
                                                        <tr>
                                                            <?php if ($row_rup['ba_negosiasi_no']) { ?>
                                                                <th>Berita Acara Evaluasi dan Negosiasi</th>
                                                                <th><a target="_blank" class="btn btn-sm btn-info text-white" href="<?= base_url() ?>panitia/info_tender/Informasi_tender_terbatas_pra_1_file/ba_negosiasi/<?= $row_rup['id_url_rup'] ?>"><i class="fa fa-eye"></i> Lihat</a></th>
                                                            <?php } ?>
                                                        </tr>
                                                        <tr>
                                                            <?php if ($row_rup['ba_klarifikasi_no']) { ?>
                                                                <th>Berita Acara Klarifikasi & Penilaian Kewajaran Harga</th>
                                                                <th><a target="_blank" class="btn btn-sm btn-info text-white" href="<?= base_url() ?>panitia/info_tender/Informasi_tender_terbatas_pra_1_file/ba_evaluasinegosiasi/<?= $row_rup['id_url_rup'] ?>"><i class="fa fa-eye"></i> Lihat</a></th>
                                                            <?php } ?>
                                                        </tr>
                                                        <tr>
                                                            <?php if ($row_rup['ba_klarifikasi_no']) { ?>
                                                                <th>Pengumuman Pemenang Pengadaan</th>
                                                                <th><a target="_blank" class="btn btn-sm btn-info text-white" href="<?= base_url() ?>panitia/info_tender/Informasi_tender_terbatas_pra_1_file/ba_pemenang_tender/<?= $row_rup['id_url_rup'] ?>"><i class="fa fa-eye"></i> Lihat</a></th>
                                                            <?php } ?>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th>Pengumuman Pemenang</th>
                            <th>

                                <?php if (date('Y-m-d H:i', strtotime($jadwal_pengumuman_pemenang['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>
                                    <button type="button" class="btn btn-sm btn-warning" disabled>
                                        <i class="fa fa-bullhorn" aria-hidden="true"></i> Belum Memasuki Tahap Ini
                                    </button>

                                <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_pengumuman_pemenang['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_pengumuman_pemenang['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#pengumuman_pemenang">
                                        <i class="fa fa-bullhorn" aria-hidden="true"></i> Pengumuman Pemenang
                                    </button>

                                <?php    } else { ?>
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#pengumuman_pemenang">
                                        <i class="fa fa-bullhorn" aria-hidden="true"></i> Pengumuman Pemenang
                                    </button>

                                <?php    } ?>

                            </th>
                        </tr>
                        <tr>
                            <th>Surat Penunjukan Pemenang Pengadaan</th>
                            <th>
                                <?php if (date('Y-m-d H:i', strtotime($jadwal_upload_surat_penunjukan['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>
                                    <button type="button" class="btn btn-sm btn-danger" disabled>
                                        <i class="fa fa-upload" aria-hidden="true"></i> Belum Memasuki Tahap Ini
                                    </button>

                                <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_upload_surat_penunjukan['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_upload_surat_penunjukan['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#surat_penunjukan">
                                        <i class="fa fa-upload" aria-hidden="true"></i> Upload Surat Penunjukan
                                    </button>

                                <?php    } else { ?>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#surat_penunjukan">
                                        <i class="fa fa-upload" aria-hidden="true"></i> Upload Surat Penunjukan
                                    </button>

                                <?php    } ?>

                            </th>
                        </tr>

                    </table>
                    <button data-bs-toggle="modal" data-bs-target="#mengulang_pengadaan" class="btn btn-warning text-white">Mengulang Pengadaan <i class="fa fa-refresh" aria-hidden="true"></i></button>
                    <button data-bs-toggle="modal" data-bs-target="#batal_pengadaan" class="btn btn-danger text-white">Batal Pengadaan <i class="fa fa-ban" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
</main>

<div class="modal fade" id="buka_dokumen_penawaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-folder-open" aria-hidden="true"></i> Buka Dokumen Penawaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                        <div>
                            <i class="fa fa-info-circle" aria-hidden="true"></i> Silakan Masukan Kodefikasi Paket Yang Dikirim Ke Whatsaap Anda
                        </div>
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                        <center>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"> <i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="token_syalala" placeholder="Masukan Kodefikasi..." aria-describedby="basic-addon1">
                            </div>
                            <br>
                            <a target="_blank" onclick="buka_penawaran('<?= $row_rup['id_url_rup'] ?>')" class="btn btn-warning btn_buka_penawaran" style="width: 300px;"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Akses Dokumen</a>
                        </center>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- modal ba penawaran -->
<div class="modal fade" id="upload_berita_acara_penawaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-upload" aria-hidden="true"></i> Berita Acara dan Pengumuman Pengadaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- <form id="form_upload_berita_acara_tender" action="javascript:;" enctype="multipart/form-data">
                <input type="hidden" name="id_rup_ba_tender" value="<?= $row_rup['id_rup'] ?>">
                <input type="hidden" name="nama_rup_ba_tender" value="<?= $row_rup['nama_rup'] ?>">
                <div class="modal-body">
                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                        <div>
                            <i class="fa fa-info-circle" aria-hidden="true"> </i> Dokumen Umum Untuk Di Upload !!! <br>
                            <ol>
                                <li>Peringkat Teknis</li>
                                <li>Peringkat Penawaran Harga</li>
                                <li>Pengumuman Pemenang</li>
                                <li>Undangan Presentasi</li>
                                <li>Addendum Dokumen Pengadaan</li>
                            </ol>
                        </div>
                    </div>
                    <br>
                    <label>Nama File</label>
                    <input type="text" class="form-control" name="nama_file" placeholder="Nama File">
                    <br>
                    <input type="file" class="form-control" accept=".xlsx, .xls, .pdf" name="file_ba">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-outline-success btn_file_ba" type="submit">Upload</button>
                </div>
            </form> -->

            <div class="modal-body">
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <div>
                        <i class="fa fa-info-circle" aria-hidden="true"> </i> Pilih BA / Pengumuman Yang Ingin Di Buat!!! <br>
                        <select name="" id="" class="form-control form-sm">
                            <option value="1">Berita Acara Pembuktian Kualifikasi</option>
                            <option value="2">Berita Acara Hasil Evaluasi</option>
                            <option value="3">Berita Acara Sampul I</option>
                            <option value="4">Undangan Rapat Presentasi Teknis</option>
                            <option value="5">Berita Acara Hasil Evaluasi Teknis</option>
                            <option value="6">Berita Acara Hasil Evaluasi Teknis</option>
                            <option value="7">Berita Acara Pembukaan Sampul II</option>
                            <option value="8">Berita Acara Evaluasi dan Negosiasi Harga</option>
                            <option value="9">Berita Acara Klarifikasi Harga</option>
                            <option value="10">Berita Acara Presentasi Teknis Tender</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end modal ba penawaran -->

<div class="modal fade" id="pengumuman_pemenang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-bullhorn" aria-hidden="true"></i> Pengumuman Pemenang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <div>
                        <i class="fa fa-info-circle" aria-hidden="true"> </i> Kirim Pengumuman Pemenang Pengadaan !!! <br>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peserta</th>
                            <th>Email</th>
                            <th>Pemenang</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($get_pemenang as $key => $value) { ?>
                            <tr>
                                <td scope="row"><?= $i++ ?></td>
                                <td><?= $value['nama_usaha'] ?></td>
                                <td><?= $value['email'] ?></td>
                                <td>
                                    <?php if ($value['ev_akhir_hea_peringkat'] == 1) { ?>
                                        <i class="fas fa fa-star text-warning"></i>
                                    <?php   } else { ?>
                                        <i class="fas fa fa-times text-danger"></i>
                                    <?php   }  ?>

                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a class="btn btn-success btn_kirim_pengumuman" onclick="Kirim_pengumuman('<?= $row_rup['id_url_rup'] ?>')"><i class="fa fa-paper-plane" aria-hidden="true"></i> Kirim Pengumuman</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="surat_penunjukan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-bullhorn" aria-hidden="true"></i> Surat Penunjukan Pemenang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <div>
                        <i class="fa fa-info-circle" aria-hidden="true"> </i>Upload Surat Penunjukan Pemenang Pengadaan !!! <br>
                    </div>
                </div>
                <form id="form_upload_surat_penunjukan" action="javascript:;" enctype="multipart/form-data">
                    <input type="hidden" name="id_rup_penunjukan" value="<?= $row_rup['id_rup'] ?>">
                    <input type="hidden" name="nama_rup_penunjukan" value="<?= $row_rup['nama_rup'] ?>">
                    <div class="input-group">
                        <input type="file" class="form-control" accept=".xlsx, .xls, .pdf" name="file_surat_penunjukan_pemenang">
                        <button class="btn btn-outline-secondary btn_penunjukan" type="submit">Upload</button>
                    </div>
                </form>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama File</th>
                            <th>File</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_penunjukan_pemenang">

                    </tbody>
                </table>
                <br>
                <hr>
                <center>
                    Vendor Pemenang
                </center>
                <hr>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peserta</th>
                            <th>Email</th>
                            <th>Pemenang</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td><?= $get_rank1['nama_usaha'] ?></td>
                            <td><?= $get_rank1['email'] ?></td>
                            <td><i class="fas fa fa-star text-warning"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_detail_jadwal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-bullhorn" aria-hidden="true"></i> Jadwal Pengadaan Berlangsung</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <div>
                        <i class="fa fa-info-circle" aria-hidden="true"> </i> Jadwal Pengadaan Berlangsung !!! <br>
                    </div>
                </div>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="lihat_peserta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-bullhorn" aria-hidden="true"></i> Peserta Pengadaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <div>
                        <i class="fa fa-info-circle" aria-hidden="true"> </i> Peserta Ini Merupakan Peserta Yang Mengikuti Pengadaan !!! <br>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peserta</th>
                            <th>Email</th>
                            <th>Telepon</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($peserta_tender as $key => $value) { ?>
                            <tr>
                                <td scope="row"><?= $no++ ?></td>
                                <td><?= $value['nama_usaha'] ?></td>
                                <td><?= $value['email'] ?></td>
                                <td><?= $value['no_telpon'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="lihat_syarat_tambahan_vendor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-bullhorn" aria-hidden="true"></i> Syarat Tambahan Penyedia <label for="" id="nama_usaha_tambahan"></label></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <div>
                        <i class="fa fa-info-circle" aria-hidden="true"> </i> Lakukan Validasi Syarat Tambahan Penyedia !!! <br>
                    </div>
                </div>
                <table class="table table-bordered" id="get_dokumen_syarat_tambahan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Persyaratan</th>
                            <th>File</th>
                            <th>Status Evaluasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="evaluasi_syarat_tambahan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-bullhorn" aria-hidden="true"></i> Evaluasi Syarat Tambahan <label for="" class="nama_usaha_evaluasi_tambahan"></label></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="javascript:;" id="form_persyaratan_tambahan">
                <input type="hidden" name="id_vendor_syarat_tambahan">
                <input type="hidden" name="status">
                <div class="modal-body">
                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                        <div>
                            <i class="fa fa-info-circle" aria-hidden="true"> </i> Berikan Evaluasi Dan Validasi Syarat Tambahan Penyedia <label for="" class="nama_persyaratan_tambahan"></label>, <label for="" class="nama_usaha_evaluasi_tambahan"></label>!!! <br>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan Evaluasi Syarat Tambahan</label>
                        <textarea type="text" name="keterangan" id="" class="form-control" placeholder="" aria-describedby="helpId"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Close</button>
                    <button type="submit" onclick="lulus_syarat_tambahan()" class="btn btn-success btn_lulus"> <i class="fas fa fa-check"></i> Lulus Evaluasi</button>
                    <button type="submit" onclick="tidak_lulus_syarat_tambahan()" class="btn btn-danger btn_tidak_lulus"> <i class="fas fa fa-times"></i> Tidak Lulus Evaluasi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="lihat_peserta_aanwijzing_pq" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-bullhorn" aria-hidden="true"></i> Peserta Pengadaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <div>
                        <i class="fa fa-info-circle" aria-hidden="true"> </i> Peserta Ini Merupakan Peserta Yang Mengikuti Pengadaan !!! <br>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peserta</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($peserta_tender as $key => $value) { ?>
                            <tr>
                                <td scope="row"><?= $no++ ?></td>
                                <td><?= $value['nama_usaha'] ?></td>
                                <?php
                                $time = time();
                                $waktu_aanwijzing = strtotime($jadwal_aanwijzing_pq['waktu_mulai']);
                                $waktu_aanwijzing_selesai = strtotime($jadwal_aanwijzing_pq['waktu_selesai']);
                                ?>
                                <?php if (date('Y-m-d H:i', strtotime($jadwal_aanwijzing_pq['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>
                                <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_aanwijzing_pq['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_aanwijzing_pq['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                    <?php if ($value['waktu_login'] >= $waktu_aanwijzing) { ?>
                                        <?php
                                        $where = [
                                            'id_vendor' => $value['id_vendor'],
                                            'id_rup' => $row_rup['id_rup']
                                        ];
                                        $data = [
                                            'sts_aanwijzing_pq' => 1
                                        ];
                                        $this->M_panitia->update_mengikuti($data, $where);
                                        ?>

                                        <?php if ($value['sts_aanwijzing_pq'] == 1) { ?>
                                            <td><span class="badge bg-success">Mengikuti</span></td>
                                        <?php } else { ?>
                                            <td><span class="badge bg-danger">Tidak Mengikuti</span></td>
                                        <?php } ?>

                                    <?php    } else { ?>
                                        <?php if ($value['sts_aanwijzing_pq'] == 1) { ?>
                                            <td><span class="badge bg-success">Mengikuti</span></td>
                                        <?php } else { ?>
                                            <td><span class="badge bg-danger">Tidak Mengikuti</span></td>
                                        <?php } ?>

                                    <?php    } ?>


                                <?php  } else { ?>
                                    <?php if ($value['sts_aanwijzing_pq'] == 1) { ?>
                                        <td><span class="badge bg-success">Mengikuti</span></td>
                                    <?php } else { ?>
                                        <td><span class="badge bg-danger">Tidak Mengikuti</span></td>
                                    <?php } ?>
                                <?php  } ?>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="lihat_peserta_aanwijzing_penawaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-bullhorn" aria-hidden="true"></i> Peserta Pengadaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <div>
                        <i class="fa fa-info-circle" aria-hidden="true"> </i> Peserta Ini Merupakan Peserta Yang Mengikuti Pengadaan !!! <br>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peserta</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($peserta_tender as $key => $value) { ?>
                            <tr>
                                <td scope="row"><?= $no++ ?></td>
                                <td><?= $value['nama_usaha'] ?></td>
                                <?php
                                $time = time();
                                $waktu_aanwijzing_penawaran = strtotime($jadwal_aanwijzing['waktu_mulai']);
                                $waktu_aanwijzing_selesai = strtotime($jadwal_aanwijzing['waktu_selesai']);
                                ?>
                                <?php if (date('Y-m-d H:i', strtotime($jadwal_aanwijzing['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>
                                <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_aanwijzing['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_aanwijzing['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                    <?php if ($value['waktu_login'] >= $waktu_aanwijzing_penawaran) { ?>
                                        <?php
                                        $where = [
                                            'id_vendor' => $value['id_vendor'],
                                            'id_rup' => $row_rup['id_rup']
                                        ];
                                        $data = [
                                            'sts_aanwijzing_penawaran' => 1
                                        ];
                                        $this->M_panitia->update_mengikuti($data, $where);
                                        ?>

                                        <?php if ($value['sts_aanwijzing_penawaran'] == 1) { ?>
                                            <td><span class="badge bg-success">Mengikuti</span></td>
                                        <?php } else { ?>
                                            <td><span class="badge bg-danger">Tidak Mengikuti</span></td>
                                        <?php } ?>

                                    <?php    } else { ?>
                                        <?php if ($value['sts_aanwijzing_penawaran'] == 1) { ?>
                                            <td><span class="badge bg-success">Mengikuti</span></td>
                                        <?php } else { ?>
                                            <td><span class="badge bg-danger">Tidak Mengikuti</span></td>
                                        <?php } ?>

                                    <?php    } ?>


                                <?php  } else { ?>
                                    <?php if ($value['sts_aanwijzing_penawaran'] == 1) { ?>
                                        <td><span class="badge bg-success">Mengikuti</span></td>
                                    <?php } else { ?>
                                        <td><span class="badge bg-danger">Tidak Mengikuti</span></td>
                                    <?php } ?>
                                <?php  } ?>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mengulang_pengadaan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-refresh" aria-hidden="true"></i> Mengulang Pengadaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_mengulang_pengadaan" action="javascript:;" enctype="multipart/form-data">
                <input type="hidden" name="id_rup_ulang" value="<?= $row_rup['id_rup'] ?>">
                <input type="hidden" name="nama_rup_ulang" value="<?= $row_rup['nama_rup'] ?>">
                <div class="modal-body">
                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                        <div>
                            <i class="fa fa-info-circle" aria-hidden="true"> </i> Mengulang Pengadaan !!! <br>
                            <ol>
                                <li>Paket Yang Di Ulang Dapat Di Umumkan Oleh Ketua Panitia / Sekretaris Yang Telah Di Tetapkan</li>
                                <li>Paket Yang Di Ulang Tidak Menghilangkan Peserta Pengadaan Yang Sudah Mengikuti</li>
                                <li>Paket Yang Di Ulang Tidak Menghilangkan Dokumen Peserta Pengadaan Pengadaan Yang Sudah Di Upload</li>
                                <!-- <li>Undangan Presentasi</li>
                                <li>Addendum Dokumen Pengadaan</li> -->
                            </ol>
                        </div>
                    </div>
                    <br>
                    <label>Alasan Mengulang Pengadaan</label>
                    <textarea name="alasan_ulang" class="form-control"></textarea>
                    <br>
                    <label>File Pendukung</label>
                    <input type="file" class="form-control" accept=".pdf" name="file_ulang_paket">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-outline-success btn_file_ba" type="submit">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="batal_pengadaan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-upload" aria-hidden="true"></i> Batal Pengadaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_batal_pengadaan" action="javascript:;" enctype="multipart/form-data">
                <input type="hidden" name="id_rup_batal" value="<?= $row_rup['id_rup'] ?>">
                <input type="hidden" name="nama_rup_batal" value="<?= $row_rup['nama_rup'] ?>">
                <div class="modal-body">
                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                        <div>
                            <i class="fa fa-info-circle" aria-hidden="true"> </i> Batal Pengadaan !!! <br>
                            <ol>
                                <li>Paket Yang Di Batal Tidak Dapat Di Umumkan Oleh Ketua Panitia / Sekretaris Yang Telah Di Tetapkan</li>
                                <li>Paket Yang Di Batal Akan Menghilangkan Peserta Pengadaan Yang Sudah Mengikuti</li>
                                <li>Paket Yang Di Batal Akan Menghilangkan Dokumen Peserta Pengadaan Yang Sudah Di Upload</li>
                                <!-- <li>Undangan Presentasi</li>
                                <li>Addendum Dokumen Pengadaan</li> -->
                            </ol>
                        </div>
                    </div>
                    <br>
                    <label>Alasan Batal Pengadaan</label>
                    <textarea name="alasan_batal" class="form-control"></textarea>
                    <br>
                    <label>File Pendukung</label>
                    <input type="file" class="form-control" accept=".pdf" name="file_batal_paket">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-outline-success btn_file_ba" type="submit">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="undangan_pembuktian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-bullhorn" aria-hidden="true"></i> Undangan Pembuktian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <div>
                        <i class="fa fa-info-circle" aria-hidden="true"> </i> Undangan Pembuktian Pengadaan !!! <br>
                    </div>
                </div>
                <form id="form_upload_undangan_pembuktian" action="javascript:;" enctype="multipart/form-data">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th><input type="text" name="no_undangan" id="value_undangan1" class="form-control" onkeyup="onkeyup_undangan(<?= $row_rup['id_rup'] ?>, 'no_undangan')" placeholder="Nomor Surat" class="form-control" value="<?= $row_rup['no_undangan'] ?>"></th>
                            </tr>
                            <tr>
                                <th>Tanggal Surat</th>
                                <th><input type="text" id="value_undangan2" name="tgl_surat" onkeyup="onkeyup_undangan(<?= $row_rup['id_rup'] ?>, 'tgl_surat')" class=" form-control" placeholder="Tanggal Surat" class="form-control" value="<?= $row_rup['tgl_surat_undangan'] ?>"></th>
                            </tr>
                            <tr>
                                <th>Hari</th>
                                <th><input type=" text" id="value_undangan3" name="hari" onkeyup="onkeyup_undangan(<?= $row_rup['id_rup'] ?>, 'hari')" class=" form-control" placeholder="Hari" class="form-control" value="<?= $row_rup['hari_undangan'] ?>"></th>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <th><input type=" text" id="value_undangan4" name="tanggal" onkeyup="onkeyup_undangan(<?= $row_rup['id_rup'] ?>, 'tanggal')" class=" form-control" placeholder="Tanggal" class="form-control" value="<?= $row_rup['tanggal_undangan'] ?>"></th>
                            </tr>
                            <tr>
                                <th>Waktu</th>
                                <th><input type="text" id="value_undangan5" name="waktu" onkeyup="onkeyup_undangan(<?= $row_rup['id_rup'] ?>, 'waktu')" class=" form-control" placeholder="Waktu" class="form-control" value="<?= $row_rup['waktu_undangan'] ?>"></th>
                            </tr>
                            <!--<tr>-->
                            <!--    <th>Jumlah Halaman Dokumen Kualifikasi</th>-->
                            <!--    <th><input type="text" id="value_undangan6" name="jml_halaman" onkeyup="onkeyup_undangan(<?= $row_rup['id_rup'] ?>, 'jml_halaman')" class=" form-control" placeholder="Jumlah Halaman" class="form-control" value="<?= $row_rup['jml_halaman_undangan'] ?>"></th>-->
                            <!--</tr>-->
                        </thead>
                    </table>
                </form>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Peserta Penawaran</th>
                            <th>Waktu</th>
                            <th>Metode</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($peserta_tender as $key => $value) { ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $value['nama_usaha'] ?></td>
                                <td><input type="text" name="wkt_undang_pembuktian<?= $value['id_vendor_mengikuti_paket'] ?>" class="form-control" onkeyup="onkeyup_undang_penyedia_waktu(<?= $value['id_vendor_mengikuti_paket'] ?>, 'wkt_undang_pembuktian')" value="<?= $value['wkt_undang_pembuktian'] ?>"></td>
                                <td><input type="text" name="metode_pembuktian<?= $value['id_vendor_mengikuti_paket'] ?>" class="form-control" onkeyup="onkeyup_undang_penyedia_metode(<?= $value['id_vendor_mengikuti_paket'] ?>, 'metode_pembuktian')" value="<?= $value['metode_pembuktian'] ?>"></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <br>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="hasil_prakualifikasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-bullhorn" aria-hidden="true"></i> Pengumuman Hasil Kualifikasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <div>
                        <i class="fa fa-info-circle" aria-hidden="true"> </i> Pengumuman Hasil Kualifikasi Pengadaan !!! <br>
                    </div>
                </div>
                <br>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>
                                <input type="text" name="no_pengumuman_hasil_kualifikasi" id="value_undangan1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'no_pengumuman_hasil_kualifikasi')" placeholder="Nomor Surat" class="form-control" value="<?= $row_rup['no_pengumuman_hasil_kualifikasi'] ?>">
                            </th>
                        </tr>
                        <tr>
                            <th>Tanggal Surat</th>
                            <th><input type="text" id="value_undangan2" name="tanggal_pengumuman_hasil_kualifikasi" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'tanggal_pengumuman_hasil_kualifikasi')" class=" form-control" placeholder="Tanggal Surat" class="form-control" value="<?= $row_rup['tanggal_pengumuman_hasil_kualifikasi'] ?>"></th>
                        </tr>
                        <!-- <tr>
                            <th>Hari Mulai</th>
                            <th><input type=" text" id="value_undangan3" name="hari_isi_pengumuman_hasil_kualifikasi_mulai" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'hari_isi_pengumuman_hasil_kualifikasi_mulai')" class=" form-control" placeholder="Hari" class="form-control" value="<?= $row_rup['hari_isi_pengumuman_hasil_kualifikasi_mulai'] ?>"></th>
                        </tr>
                        <tr>
                            <th>Tanggal Mulai</th>
                            <th><input type=" text" id="value_undangan4" name="tanggal_isi_pengumuman_hasil_kualifikasi_mulai" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'tanggal_isi_pengumuman_hasil_kualifikasi_mulai')" class=" form-control" placeholder="Tanggal" class="form-control" value="<?= $row_rup['tanggal_isi_pengumuman_hasil_kualifikasi_mulai'] ?>"></th>
                        </tr>
                        <tr>
                            <th>Waktu Mulai</th>
                            <th><input type="text" id="value_undangan5" name="pukul_isi_pengumuman_hasil_kualifikasi_mulai" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'pukul_isi_pengumuman_hasil_kualifikasi_mulai')" class=" form-control" placeholder="Waktu" class="form-control" value="<?= $row_rup['pukul_isi_pengumuman_hasil_kualifikasi_mulai'] ?>"></th>
                        </tr>

                        <tr>
                            <th>Hari Mulai</th>
                            <th><input type=" text" id="value_undangan3" name="hari_isi_pengumuman_hasil_kualifikasi_selesai" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'hari_isi_pengumuman_hasil_kualifikasi_selesai')" class=" form-control" placeholder="Hari" class="form-control" value="<?= $row_rup['hari_isi_pengumuman_hasil_kualifikasi_selesai'] ?>"></th>
                        </tr>
                        <tr>
                            <th>Tanggal selesai</th>
                            <th><input type=" text" id="value_undangan4" name="tanggal_isi_pengumuman_hasil_kualifikasi_selesai" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'tanggal_isi_pengumuman_hasil_kualifikasi_selesai')" class=" form-control" placeholder="Tanggal" class="form-control" value="<?= $row_rup['tanggal_isi_pengumuman_hasil_kualifikasi_selesai'] ?>"></th>
                        </tr>
                        <tr>
                            <th>Waktu selesai</th>
                            <th><input type="text" id="value_undangan5" name="pukul_isi_pengumuman_hasil_kualifikasi_selesai" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'pukul_isi_pengumuman_hasil_kualifikasi_selesai')" class=" form-control" placeholder="Waktu" class="form-control" value="<?= $row_rup['pukul_isi_pengumuman_hasil_kualifikasi_selesai'] ?>"></th>
                        </tr> -->
                    </thead>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- modal ba tender -->
<div class="modal fade" id="upload_berita_acara_tender" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-upload" aria-hidden="true"></i> Berita Acara dan Pengumuman Pengadaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- <form id="form_upload_berita_acara_tender" action="javascript:;" enctype="multipart/form-data">
                <input type="hidden" name="id_rup_ba_tender" value="<?= $row_rup['id_rup'] ?>">
                <input type="hidden" name="nama_rup_ba_tender" value="<?= $row_rup['nama_rup'] ?>">
                <div class="modal-body">
                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                        <div>
                            <i class="fa fa-info-circle" aria-hidden="true"> </i> Dokumen Umum Untuk Di Upload !!! <br>
                            <ol>
                                <li>Peringkat Teknis</li>
                                <li>Peringkat Penawaran Harga</li>
                                <li>Pengumuman Pemenang</li>
                                <li>Undangan Presentasi</li>
                                <li>Addendum Dokumen Pengadaan</li>
                                <li>Informasi Lainnya</li>
                            </ol>
                        </div>
                    </div>
                    <br>
                    <label>Nama File</label>
                    <input type="text" class="form-control" name="nama_file" placeholder="Nama File">
                    <br>
                    <input type="file" class="form-control" accept=".xlsx, .xls, .pdf" name="file_ba">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-outline-success btn_file_ba" type="submit">Upload</button>
                </div>
            </form> -->

            <div class="modal-body">
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <div>
                        <i class="fa fa-info-circle" aria-hidden="true"> </i> Pilih Berita Acara atau Pengumuman Yang Ingin Di Buat!!!
                    </div>
                </div>
                <select name="jenis_ba" id="jenis_ba" onchange="select_ba()" class="form-control form-sm">
                    <option value="1">Berita Acara Pembuktian Kualifikasi</option>
                    <option value="2">Berita Acara Hasil Evaluasi</option>
                    <option value="3">Berita Acara Sampul I</option>
                    <option value="10">Berita Acara Rapat Penjelasan Dokumen Pengadaan</option>
                    <option value="4">Undangan Rapat Presentasi Teknis</option>
                    <option value="5">Berita Acara Hasil Evaluasi Teknis</option>
                    <option value="6">Berita Acara Pembukaan Sampul II</option>
                    <option value="7">Berita Acara Evaluasi dan Negosiasi Harga</option>
                    <option value="8">Berita Acara Klarifikasi Harga</option>
                    <!-- <option value="9">Berita Acara Presentasi Teknis Tender</option> -->
                </select>
                <div class="row">
                    <div class="col-md-12">
                        <div id="ba_1" style="display: block;" class="mt-3">
                            <a href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/ba_pembuktian_kualifikasi' . '/' . $row_rup['id_url_rup']) ?>" target="_blank" class="btn btn-sm btn-info float-end text-white"><i class="fa fa-eye"></i> Lihat Hasil</a>
                            <br>
                            <br>
                            <form action="javascript:;">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Nomor Berita Acara</th>
                                        <th>
                                            <input type="text" name="ba_pembuktian_no" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_pembuktian_no')" placeholder="Nomor Surat" class="form-control" value="<?= $row_rup['ba_pembuktian_no'] ?>">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Berita Acara</th>
                                        <th>
                                            <input type="date" name="ba_pembuktian_tgl" id="value_ba_kualifikasi1" class="form-control" onchange="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_pembuktian_tgl')" placeholder="Tanggal BA" class="form-control" value="<?= $row_rup['ba_pembuktian_tgl'] ?>">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Hari (Pelaksanaan)</th>
                                        <th>
                                            <input type="text" name="ba_pembuktian_hari" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_pembuktian_hari')" placeholder="Hari Pelaksanaan" class="form-control" value="<?= $row_rup['ba_pembuktian_hari'] ?>">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Tanggal (Pelaksanaan)</th>
                                        <th>
                                            <input type="date" name="ba_pembuktian_tgl_pelaksanaan" id="value_ba_kualifikasi1" class="form-control" onchange="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_pembuktian_tgl_pelaksanaan')" placeholder="Tanggal Pelaksanaan" class="form-control" value="<?= $row_rup['ba_pembuktian_tgl_pelaksanaan'] ?>">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Jam (Pelaksanaan)</th>
                                        <th>
                                            <input type="text" name="ba_pembuktian_jam_pelaksanaan" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_pembuktian_jam_pelaksanaan')" placeholder="Jam Pelaksanaan" class="form-control" value="<?= $row_rup['ba_pembuktian_jam_pelaksanaan'] ?>">
                                        </th>
                                    </tr>
                                </table>
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">Peserta</th>
                                            <th colspan="3">Pembuktian Kualifikasi</th>
                                        </tr>
                                        <tr>
                                            <th>Kehadiran</th>
                                            <th>Dokumen</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($peserta_tender as $key => $value) { ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $value['nama_usaha'] ?></td>
                                                <td>
                                                    <input type="text" name="ba_pembuktian_hadir<?= $value['id_vendor_mengikuti_paket'] ?>" class="form-control" onkeyup="onkeyup_ba_kualifikas_hadir(<?= $value['id_vendor_mengikuti_paket'] ?>, 'ba_pembuktian_hadir')" value="<?= $value['ba_pembuktian_hadir'] ?>">
                                                </td>
                                                <td>
                                                    <input type="text" name="ba_pembuktian_dok<?= $value['id_vendor_mengikuti_paket'] ?>" class="form-control" onkeyup="onkeyup_ba_kualifikas_dok(<?= $value['id_vendor_mengikuti_paket'] ?>, 'ba_pembuktian_dok')" value="<?= $value['ba_pembuktian_dok'] ?>">
                                                </td>
                                                <td>
                                                    <input type="text" name="ba_pembuktian_ket<?= $value['id_vendor_mengikuti_paket'] ?>" class="form-control" onkeyup="onkeyup_ba_kualifikas_ket(<?= $value['id_vendor_mengikuti_paket'] ?>, 'ba_pembuktian_ket')" value="<?= $value['ba_pembuktian_ket'] ?>">
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>

                                </table>
                            </form>
                        </div>
                        <div id="ba_2" style="display: none;" class="mt-3">
                            <a href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/ba_hasil_evaluasi' . '/' . $row_rup['id_url_rup']) ?>" target="_blank" class="btn btn-sm btn-info float-end text-white"><i class="fa fa-eye"></i> Lihat Hasil</a>
                            <br>
                            <br>
                            <form action="javascript:;">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Nomor Berita Acara</th>
                                        <th>
                                            <input type="text" name="ba_evaluasi_no" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_evaluasi_no')" placeholder="Nomor Surat" class="form-control" value="<?= $row_rup['ba_evaluasi_no'] ?>">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Hari Berita Acara</th>
                                        <th>
                                            <input type="text" name="ba_evaluasi_hari" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_evaluasi_hari')" placeholder="Hari" class="form-control" value="<?= $row_rup['ba_evaluasi_hari'] ?>">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Berita Acara</th>
                                        <th>
                                            <input type="date" name="ba_evaluasi_tgl" id="value_ba_kualifikasi1" class="form-control" onchange="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_evaluasi_tgl')" placeholder="Tanggal BA" class="form-control" value="<?= $row_rup['ba_evaluasi_tgl'] ?>">
                                        </th>
                                    </tr>
                                </table>
                            </form>
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <label for="">1. Jumlah Perusahaan yang mendaftar dan mengambil Dokumen Prakualifikasi</label>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <table class="table table-bordered" id="tbl_ba_evaluasi1">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Perusahaan</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </table>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <label for="">2. Perusahaan yang mengembalikan dan memasukan Dokumen Prakualifikasi</label>
                                </div>
                                <div class="card-body">

                                    <table class="table table-bordered">
                                        <table class="table table-bordered" id="tbl_ba_evaluasi2">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Perusahaan</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </table>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <label for="">3. Perusahaan yang memenuhi persyaratan Prakualifikasi</label>
                                </div>
                                <div class="card-body">

                                    <table class="table table-bordered">
                                        <table class="table table-bordered" id="tbl_ba_evaluasi3">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Perusahaan</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </table>
                                </div>
                            </div>



                        </div>
                        <div id="ba_3" style="display: none;" class="mt-3">
                            <a href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/ba_sampul_I' . '/' . $row_rup['id_url_rup']) ?>" target="_blank" class="btn btn-sm btn-info float-end text-white"><i class="fa fa-eye"></i> Lihat Hasil</a>
                            <br>
                            <br>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Nomor Berita Acara</th>
                                    <th>
                                        <input type="text" name="ba_sampul1_no" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_sampul1_no')" placeholder="Nomor Surat" class="form-control" value="<?= $row_rup['ba_sampul1_no'] ?>">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Tanggal Berita Acara</th>
                                    <th>
                                        <input type="date" name="ba_sampul1_tgl" id="value_ba_kualifikasi1" class="form-control" onchange="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_sampul1_tgl')" placeholder="Tanggal BA" class="form-control" value="<?= $row_rup['ba_sampul1_tgl'] ?>">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Hari (Pelaksanaan)</th>
                                    <th>
                                        <input type="text" name="ba_sampul1_hari" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_sampul1_hari')" placeholder="Hari Pelaksanaan" class="form-control" value="<?= $row_rup['ba_sampul1_hari'] ?>">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Tanggal (Pelaksanaan)</th>
                                    <th>
                                        <input type="date" name="ba_sampul1_tgl_pelaksanaan" id="value_ba_kualifikasi1" class="form-control" onchange="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_sampul1_tgl_pelaksanaan')" placeholder="Tanggal Pelaksanaan" class="form-control" value="<?= $row_rup['ba_sampul1_tgl_pelaksanaan'] ?>">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Jam (Pelaksanaan)</th>
                                    <th>
                                        <input type="text" name="ba_sampul1_jam_pelaksanaan" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_sampul1_jam_pelaksanaan')" placeholder="Jam Pelaksanaan" class="form-control" value="<?= $row_rup['ba_sampul1_jam_pelaksanaan'] ?>">
                                    </th>
                                </tr>
                            </table>

                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <label for="">I. PENYEDIA JASA YANG DINYATAKAN LULUS EVALUASI KUALIFIKASI </label>
                                </div>
                                <div class="card-body">

                                    <table class="table table-bordered">
                                        <table class="table table-bordered" id="tbl_ba_sampul11">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Perusahaan</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </table>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <label for="">II.PENYEDIA JASA YANG MEMBELI DAN MENGAMBIL DOKUMEN PENGADAAN </label>
                                </div>
                                <div class="card-body">

                                    <table class="table table-bordered">
                                        <table class="table table-bordered" id="tbl_ba_sampul12">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Perusahaan</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </table>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <label for="">III.PENYEDIA JASA YANG HADIR & MELAKUKAN PEMASUKAN DOKUMEN PENAWARAN </label>
                                </div>
                                <div class="card-body">

                                    <table class="table table-bordered">
                                        <table class="table table-bordered" id="tbl_ba_sampul13">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Perusahaan</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="ba_4" style="display: none;" class="mt-3">
                            <a href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/ba_undangan_rapat' . '/' . $row_rup['id_url_rup']) ?>" target="_blank" class="btn btn-sm btn-info float-end text-white"><i class="fa fa-eye"></i> Lihat Hasil</a>
                            <br>
                            <br>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Nomor Berita Acara</th>
                                    <th>
                                        <input type="text" name="undangan_rapat_no" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'undangan_rapat_no')" placeholder="Nomor Surat" class="form-control" value="<?= $row_rup['undangan_rapat_no'] ?>">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Tanggal Berita Acara</th>
                                    <th>
                                        <input type="date" name="undangan_rapat_tgl" id="value_ba_kualifikasi1" class="form-control" onchange="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'undangan_rapat_tgl')" placeholder="Tanggal BA" class="form-control" value="<?= $row_rup['undangan_rapat_tgl'] ?>">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Tanggal (Pelaksanaan)</th>
                                    <th>
                                        <input type="text" name="undangan_rapat_haritgl" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'undangan_rapat_haritgl')" placeholder="ex. (Rabu, 09 Agustus 2023)" class="form-control" value="<?= $row_rup['undangan_rapat_haritgl'] ?>">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Tempat (Pelaksanaan)</th>
                                    <th>
                                        <input type="text" name="undangan_rapat_tempat" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'undangan_rapat_tempat')" placeholder="Tempat Pelaksanaan" class="form-control" value="<?= $row_rup['undangan_rapat_tempat'] ?>">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Waktu (Pelaksanaan)</th>
                                    <th>
                                        <input type="text" name="undangan_rapat_waktu" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'undangan_rapat_waktu')" placeholder="ex. (Terlampir)" class="form-control" value="<?= $row_rup['undangan_rapat_waktu'] ?>">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Durasi Sesi 1</th>
                                    <th>
                                        <input type="text" name="undangan_rapat_sesi1" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'undangan_rapat_sesi1')" placeholder="ex. (15 menit)" class="form-control" value="<?= $row_rup['undangan_rapat_sesi1'] ?>">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Durasi Sesi 2</th>
                                    <th>
                                        <input type="text" name="undangan_rapat_sesi2" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'undangan_rapat_sesi2')" placeholder="ex. (15 menit)" class="form-control" value="<?= $row_rup['undangan_rapat_sesi2'] ?>">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Durasi Sesi 3</th>
                                    <th>
                                        <input type="text" name="undangan_rapat_sesi3" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'undangan_rapat_sesi3')" placeholder="ex. (15 menit)" class="form-control" value="<?= $row_rup['undangan_rapat_sesi3'] ?>">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Durasi Sesi 4</th>
                                    <th>
                                        <input type="text" name="undangan_rapat_sesi4" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'undangan_rapat_sesi4')" placeholder="ex. (15 menit)" class="form-control" value="<?= $row_rup['undangan_rapat_sesi4'] ?>">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Pengiriman Waktu Materi</th>
                                    <th>
                                        <input type="text" name="undangan_rapat_waktu_materi" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'undangan_rapat_waktu_materi')" placeholder="ex. Senin, 07 Agustus 2023 Pukul 17.00" class="form-control" value="<?= $row_rup['undangan_rapat_waktu_materi'] ?>">
                                    </th>
                                </tr>
                            </table>
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>PESERTA PENAWARAN</th>
                                        <th>PAKET PEKERJAAN</th>
                                        <th>WAKTU</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($peserta_tender_pq_penawaran as $key => $value) { ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $value['nama_usaha'] ?></td>
                                            <td>
                                                <?= $row_rup['nama_rup'] ?>
                                            </td>
                                            <td>
                                                <input type="text" name="waktu_undangan_rapat<?= $value['id_vendor_mengikuti_paket'] ?>" class="form-control" onkeyup="onkeyup_waktu_undangan(<?= $value['id_vendor_mengikuti_paket'] ?>, 'waktu_undangan_rapat')" value="<?= $value['waktu_undangan_rapat'] ?>">
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>

                            </table>
                        </div>
                        <div id="ba_5" style="display: none;" class="mt-3">
                            <a href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/ba_hasil_evaluasi_teknis' . '/' . $row_rup['id_url_rup']) ?>" target="_blank" class="btn btn-sm btn-info float-end text-white"><i class="fa fa-eye"></i> Lihat Hasil</a>
                            <br>
                            <br>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Nomor Berita Acara</th>
                                    <th>
                                        <input type="text" name="ba_evaluasi_teknis_no" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_evaluasi_teknis_no')" placeholder="Nomor Surat" class="form-control" value="<?= $row_rup['ba_evaluasi_teknis_no'] ?>">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Tanggal Berita Acara</th>
                                    <th>
                                        <input type="date" name="ba_evaluasi_teknis_tgl" id="value_ba_kualifikasi1" class="form-control" onchange="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_evaluasi_teknis_tgl')" placeholder="Tanggal BA" class="form-control" value="<?= $row_rup['ba_evaluasi_teknis_tgl'] ?>">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Hari (Pelaksanaan)</th>
                                    <th>
                                        <input type="text" name="ba_evaluasi_teknis_hari" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_evaluasi_teknis_hari')" placeholder="Hari Pelaksanaan" class="form-control" value="<?= $row_rup['ba_evaluasi_teknis_hari'] ?>">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Tanggal (Pelaksanaan)</th>
                                    <th>
                                        <input type="date" name="ba_evaluasi_teknis_tgl2" id="value_ba_kualifikasi1" class="form-control" onchange="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_evaluasi_teknis_tgl2')" placeholder="Tanggal Pelaksanaan" class="form-control" value="<?= $row_rup['ba_evaluasi_teknis_tgl2'] ?>">
                                    </th>
                                </tr>
                            </table>

                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <label for="">Unsur yang dinilai pada tahapan Evaluasi Teknis </label>
                                </div>
                                <div class="card-body">
                                    <a href="javascript:;" class="btn btn-sm btn-success pull-right" onclick="modal_tambah_ba_evaluasi()">+ Tambah Tahapan Evaluasi</a>
                                    <br>
                                    <br>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Tahapan Evaluasi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="load_ba_evaluasi_teknis">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="ba_6" style="display: none;" class="mt-3">
                            <a href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/ba_sampul_II' . '/' . $row_rup['id_url_rup']) ?>" target="_blank" class="btn btn-sm btn-info float-end text-white"><i class="fa fa-eye"></i> Lihat Hasil</a>
                            <br>
                            <br>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Nomor Berita Acara</th>
                                    <th>
                                        <input type="text" name="ba_sampul2_no" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_sampul2_no')" placeholder="Nomor Surat" class="form-control" value="<?= $row_rup['ba_sampul2_no'] ?>">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Tanggal Berita Acara</th>
                                    <th>
                                        <input type="date" name="ba_sampul2_tgl" id="value_ba_kualifikasi1" class="form-control" onchange="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_sampul2_tgl')" placeholder="Tanggal BA" class="form-control" value="<?= $row_rup['ba_sampul2_tgl'] ?>">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Hari (Pelaksanaan)</th>
                                    <th>
                                        <input type="text" name="ba_sampul2_hari" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_sampul2_hari')" placeholder="Hari Pelaksanaan" class="form-control" value="<?= $row_rup['ba_sampul2_hari'] ?>">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Tanggal (Pelaksanaan)</th>
                                    <th>
                                        <input type="date" name="ba_sampul2_tgl_pelaksanaan" id="value_ba_kualifikasi1" class="form-control" onchange="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_sampul2_tgl_pelaksanaan')" placeholder="Tanggal Pelaksanaan" class="form-control" value="<?= $row_rup['ba_sampul2_tgl_pelaksanaan'] ?>">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Jam (Pelaksanaan)</th>
                                    <th>
                                        <input type="text" name="ba_sampul2_jam_pelaksanaan" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_sampul2_jam_pelaksanaan')" placeholder="Jam Pelaksanaan" class="form-control" value="<?= $row_rup['ba_sampul2_jam_pelaksanaan'] ?>">
                                    </th>
                                </tr>
                            </table>
                        </div>
                        <div id="ba_7" style="display: none;" class="mt-3">
                            <a href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/ba_negosiasi' . '/' . $row_rup['id_url_rup']) ?>" target="_blank" class="btn btn-sm btn-info float-end text-white"><i class="fa fa-eye"></i> Lihat Hasil</a>
                            <br>
                            <br>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Nomor Berita Acara</th>
                                    <th>
                                        <input type="text" name="ba_negosiasi_no" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_negosiasi_no')" placeholder="Nomor Surat" class="form-control" value="<?= $row_rup['ba_negosiasi_no'] ?>">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Tanggal Berita Acara</th>
                                    <th>
                                        <input type="date" name="ba_negosiasi_tgl" id="value_ba_kualifikasi1" class="form-control" onchange="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_negosiasi_tgl')" placeholder="Tanggal BA" class="form-control" value="<?= $row_rup['ba_negosiasi_tgl'] ?>">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Hari (Pelaksanaan)</th>
                                    <th>
                                        <input type="text" name="ba_negosiasi_hari" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_negosiasi_hari')" placeholder="Hari Pelaksanaan" class="form-control" value="<?= $row_rup['ba_negosiasi_hari'] ?>">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Jam (Pelaksanaan)</th>
                                    <th>
                                        <input type="text" name="ba_negosiasi_jam" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_negosiasi_jam')" placeholder="Jam Pelaksanaan" class="form-control" value="<?= $row_rup['ba_negosiasi_jam'] ?>">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Nama Perusahaan</th>
                                    <th>
                                        <input type="text" name="ba_negosiasi_vendor" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_negosiasi_vendor')" placeholder="Nama Perusahaan" class="form-control" value="<?= $row_rup['ba_negosiasi_vendor'] ?>">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Harga Penawaran</th>
                                    <th>
                                        <input type="text" name="ba_negosiasi_penawaran" id="value_ba_kualifikasi1" class="form-control number_only" onkeydown="format_rupiah_ba_sampul2()" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_negosiasi_penawaran')" placeholder="Harga Penawaran" class="form-control" value="<?= $row_rup['ba_negosiasi_penawaran'] ?>">
                                        <input type="text" class="form-control" name="ba_negosiasi_penawaran2" value="Rp. <?= number_format($row_rup['ba_negosiasi_penawaran'], 2, ",", ".");  ?>" disabled>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Harga Negosiasi</th>
                                    <th>
                                        <input type="text" name="ba_negosiasi_harga" id="value_ba_kualifikasi1" class="form-control number_only" onkeydown="format_rupiah_ba_sampul3()" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_negosiasi_harga')" placeholder="Harga Negosiasi" class="form-control" value="<?= $row_rup['ba_negosiasi_harga'] ?>">
                                        <input type="text" class="form-control" name="ba_negosiasi_harga2" value="Rp. <?= number_format($row_rup['ba_negosiasi_harga'], 2, ",", ".");  ?>" disabled>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Jabatan Pengajuan Kepada</th>
                                    <th>
                                        <input type="text" name="ba_negosiasi_usulan_jabatan" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_negosiasi_usulan_jabatan')" placeholder="ex. Direktur Utama" class="form-control" value="<?= $row_rup['ba_negosiasi_usulan_jabatan'] ?>">
                                    </th>
                                </tr>

                            </table>
                        </div>
                        <div id="ba_8" style="display: none;" class="mt-3">
                            <a href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/ba_evaluasinegosiasi' . '/' . $row_rup['id_url_rup']) ?>" target="_blank" class="btn btn-sm btn-info float-end text-white"><i class="fa fa-eye"></i> Lihat Hasil</a>
                            <br>
                            <br>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Nomor Berita Acara</th>
                                    <th>
                                        <input type="text" name="ba_klarifikasi_no" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_klarifikasi_no')" placeholder="Nomor Surat" class="form-control" value="<?= $row_rup['ba_klarifikasi_no'] ?>">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Tanggal Berita Acara</th>
                                    <th>
                                        <input type="date" name="ba_klarifikasi_tgl" id="value_ba_kualifikasi1" class="form-control" onchange="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_klarifikasi_tgl')" placeholder="Tanggal BA" class="form-control" value="<?= $row_rup['ba_klarifikasi_tgl'] ?>">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Hari (Pelaksanaan)</th>
                                    <th>
                                        <input type="text" name="ba_klarifikasi_hari" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_klarifikasi_hari')" placeholder="Hari Pelaksanaan" class="form-control" value="<?= $row_rup['ba_klarifikasi_hari'] ?>">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Jam (Pelaksanaan)</th>
                                    <th>
                                        <input type="text" name="ba_klarifikasi_jam" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_klarifikasi_jam')" placeholder="Jam Pelaksanaan" class="form-control" value="<?= $row_rup['ba_klarifikasi_jam'] ?>">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Penilaian Kewajaran Harga terhadap semua Harga Satuan Penawaran</th>
                                    <th>
                                        <input type="text" name="ba_klarifikasi_penilaian" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_klarifikasi_penilaian')" placeholder="ex. (Tidak ditemukan)" class="form-control" value="<?= $row_rup['ba_klarifikasi_penilaian'] ?>">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Harga Satuan Penawaran yang kurang dari 80% terhadap Harga Satuan dalam Harga Perkiraan Sendiri (HPS) </th>
                                    <th>
                                        <input type="text" name="ba_klarifikasi_penilaian2" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_klarifikasi_penilaian2')" placeholder="ex. (Tidak ditemukan)" class="form-control" value="<?= $row_rup['ba_klarifikasi_penilaian2'] ?>">
                                    </th>
                                </tr>
                            </table>
                        </div>
                        <div id="ba_10" style="display: none;" class="mt-3">
                            <a href="<?= base_url('panitia/info_tender/' . $root_jadwal . '/ba_penjelasan_pengadaan' . '/' . $row_rup['id_url_rup']) ?>" target="_blank" class="btn btn-sm btn-info float-end text-white"><i class="fa fa-eye"></i> Lihat Hasil</a>
                            <br>
                            <br>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Nomor Berita Acara</th>
                                    <th>
                                        <input type="text" name="ba_penjelasan_no" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_penjelasan_no')" placeholder="Nomor Surat" class="form-control" value="<?= $row_rup['ba_penjelasan_no'] ?>">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Tanggal Berita Acara</th>
                                    <th>
                                        <input type="date" name="ba_penjelasan_tgl" id="value_ba_kualifikasi1" class="form-control" onchange="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_penjelasan_tgl')" placeholder="Tanggal BA" class="form-control" value="<?= $row_rup['ba_penjelasan_tgl'] ?>">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Hari (Pelaksanaan)</th>
                                    <th>
                                        <input type="text" name="ba_penjelasan_hari" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_penjelasan_hari')" placeholder="Hari" class="form-control" value="<?= $row_rup['ba_penjelasan_hari'] ?>">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Jam (Pelaksanaan)</th>
                                    <th>
                                        <input type="text" name="ba_penjelasan_jam" id="value_ba_kualifikasi1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'ba_penjelasan_jam')" placeholder="Jam Pelaksanaan" class="form-control" value="<?= $row_rup['ba_penjelasan_jam'] ?>">
                                    </th>
                                </tr>
                            </table>
                        </div>
                        <!-- <div id="ba_9" style="display: none;" class="mt-3">

                        </div> -->
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_tambah_ba_evaluasi_teknis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-bullhorn" aria-hidden="true"></i> Tambah Unsur yang dinilai pada tahapan Evaluasi Teknis</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="javascript:;" id="form_ba_evaluasi_teknis">
                <input type="hidden" name="id_rup" value="<?= $row_rup['id_rup'] ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Unsur Evaluasi Teknis</label>
                        <textarea type="text" name="nama_evaluasi" id="" class="form-control" placeholder="ex. Personil(Koordinator Lapangan)" aria-describedby="helpId"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Close</button>
                    <button type="submit" class="btn btn-success "> <i class="fas fa fa-plus"></i> Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal ba tender -->

<div class="modal fade" id="undangan_penawaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-bullhorn" aria-hidden="true"></i> Undangan Penawaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <div>
                        <i class="fa fa-info-circle" aria-hidden="true"> </i> Undangan Penawaran !!! <br>
                    </div>
                </div>
                <br>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>
                                <input type="text" name="no_undangan_penawaran" id="value_undangan1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'no_undangan_penawaran')" placeholder="Nomor Surat" class="form-control" value="<?= $row_rup['no_undangan_penawaran'] ?>">
                            </th>
                        </tr>
                        <tr>
                            <th>Tanggal Surat</th>
                            <th><input type="text" id="value_undangan2" name="no_undangan_tgl" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'no_undangan_tgl')" class=" form-control" placeholder="Tanggal Surat" class="form-control" value="<?= $row_rup['no_undangan_tgl'] ?>"></th>
                        </tr>
                        <tr>
                            <th>Nilai Jaminan Penawaran</th>
                            <th>
                                <input type="text" name="nilai_jaminan_penawaran" id="value_undangan1" class="form-control" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'nilai_jaminan_penawaran')" placeholder="Nomor Surat" class="form-control" value="<?= $row_rup['nilai_jaminan_penawaran'] ?>">
                            </th>
                        </tr>
                        <tr>
                            <th>Masa Berlaku Penawaran</th>
                            <th><input type="text" id="value_undangan2" name="masa_berlaku_penawaran" onkeyup="onkeyup_global_rup(<?= $row_rup['id_rup'] ?>, 'masa_berlaku_penawaran')" class=" form-control" placeholder="Tanggal Surat" class="form-control" value="<?= $row_rup['masa_berlaku_penawaran'] ?>"></th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>