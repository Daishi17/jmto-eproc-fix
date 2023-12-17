<main class="container-fluid">
    <input type="hidden" name="id_url_rup" value="<?= $row_rup['id_url_rup'] ?>">
    <input type="hidden" name="id_rup_global" value="<?= $row_rup['id_rup'] ?>">

    <div class="row">
        <div class="col">
            <div class="card border-dark">
                <div class="card-header border-dark bg-gradient-color1">
                    <h6 class="card-title">
                        <span class="text-white">
                            <i class="fa-solid fa-business-time"></i>
                            <small><strong>Transaksi Tender / Pengadaan</strong></small>
                        </span>
                    </h6>
                </div>
            </div>
            <hr>
            <div class="card border-dark">
                <div class="card-header border-dark bg-gradient-yellow d-flex justify-content-between align-items-center">
                    <div class="flex-grow-1 bd-highlight">
                        <span class="text-dark">
                            <i class="fa-solid fa-table px-1"></i>
                            <small><strong>Form Isian - Paket Penyedia</strong></small>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <from>
                                <table class="table table-bordered table-sm shadow-lg">
                                    <tr>
                                        <th class="bg-light">
                                            <small>Kode</small>
                                        </th>
                                        <td>
                                            <i class="fa-solid fa-barcode px-2"></i>
                                            <small><?= $row_rup['kode_rup'] ?></small>
                                        </td>
                                        <th class="bg-light">
                                            <small>Tahun</small>
                                        </th>
                                        <td>
                                            <i class="fa-solid fa-calendar-days px-2"></i>
                                            <small><?= $row_rup['tahun_rup'] ?></small>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">
                                            <small>Departemen</small>
                                        </th>
                                        <td>
                                            <i class="fa-solid fa-building-columns px-2"></i>
                                            <small><?= $row_rup['nama_departemen'] ?></small>
                                        </td>
                                        <th class="bg-light">
                                            <small>Sections</small>
                                        </th>
                                        <td>
                                            <i class="fa-solid fa-map px-2"></i>
                                            <small><?= $row_rup['nama_section'] ?></small>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">
                                            <small>Nama Paket</small>
                                        </th>
                                        <td colspan="3">
                                            <i class="fa-solid fa-gift px-2"></i>
                                            <small><?= $row_rup['nama_rup'] ?></small>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">
                                            <small>Lokasi Ruas Toll</small>
                                        </th>
                                        <td colspan="3">
                                            <i class="fa-solid fa-road px-2"></i>
                                            <small>
                                                <?php foreach ($ruas as $key => $value) { ?>
                                                    | <?= $value['nama_ruas'] ?>
                                                <?php  } ?>
                                            </small>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">
                                            <small>Waktu Pelaksanaan</small>
                                        </th>
                                        <td>
                                            <i class="fa-regular fa-calendar-days px-2"></i>
                                            <small><?= $row_rup['jangka_waktu_mulai_pelaksanaan'] ?></small> - <small><?= $row_rup['jangka_waktu_selesai_pelaksanaan'] ?></small>&nbsp;&amp;
                                            <i class="fa-solid fa-clock px-1"></i>
                                            <small><?= $row_rup['jangka_waktu_hari_pelaksanaan'] ?></small>&nbsp; Hari
                                        </td>
                                        <th class="bg-light">
                                            <small>Kualifikasi Usaha</small>
                                        </th>
                                        <td>
                                            <i class="fa-solid fa-building-circle-check px-1"></i>
                                            <small><?= $row_rup['kualifikasi_usaha'] ?></small>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">
                                            <small><?= $row_rup['status_pencatatan'] ?></small>
                                        </th>
                                        <td>
                                            <i class="fa-solid fa-pen-to-square px-2"></i>
                                            <small>TKDN</small>
                                        </td>
                                        <th class="bg-light">
                                            <small>( % ) Pencatatan </small>
                                        </th>
                                        <td>
                                            <i class="fa-solid fa-chart-simple px-2"></i>
                                            <small><?= $row_rup['persen_pencatatan'] ?></small>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="4">
                                            <div class="card border-dark shadow-lg">
                                                <div class="card-header border-dark bg-gradient-color2 d-flex justify-content-between align-items-center">
                                                    <div class="flex-grow-1 bd-highlight text-center">
                                                        <span class="text-dark">
                                                            <i class="fa-solid fa-business-time px-1"></i>
                                                            <small>Deskripsi Jenis & Metode Pengadaan</small>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <table class="table table-bordered border-dark table-sm shadow-lg">
                                                        <thead class="bg-secondary text-white">
                                                            <tr>
                                                                <th><small>Jenis Anggaran</small></th>
                                                                <th><small>Jenis Pengadaan</small></th>
                                                                <th><small>Metode Pengadaan</small></th>
                                                                <th><small>Metode Kualifikasi</small></th>
                                                                <th><small>Dokumen Pemilihan</small></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <i class="fa-solid fa-money-bill px-1"></i>
                                                                    <small><?= $row_rup['nama_jenis_anggaran'] ?></small>
                                                                </td>
                                                                <td>
                                                                    <i class="fa-solid fa-briefcase px-1"></i>
                                                                    <small><?= $row_rup['nama_jenis_pengadaan'] ?></small>
                                                                </td>
                                                                <td>
                                                                    <i class="fa-solid fa-business-time px-1"></i>
                                                                    <small><?= $row_rup['nama_metode_pengadaan'] ?></small>
                                                                </td>
                                                                <td>
                                                                    <i class="fa-solid fa-bars-progress px-1"></i>
                                                                    <small><?= $row_rup['metode_kualifikasi'] ?></small>
                                                                </td>
                                                                <td>
                                                                    <i class="fa-solid fa-folder-tree px-1"></i>
                                                                    <small><?= $row_rup['metode_dokumen'] ?></small>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="4">
                                            <input type="hidden" name="open_dokumen_izin_prinsip" value="<?= base_url('file_paket/' . $row_rup['nama_rup'] . '/DOKUMEN_IZIN_PRINSIP_DAN_HPS' . '/') ?>">
                                            <div class="card border-dark shadow-lg">
                                                <div class="card-header border-dark bg-gradient-color2 d-flex justify-content-between align-items-center">
                                                    <div class="flex-grow-1 bd-highlight text-center">
                                                        <span class="text-dark">
                                                            <i class="fa-solid fa-money-bill-wave px-1"></i>
                                                            <small>DOKUMEN PERSETUJUAN DAN PENETAPAN</small>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">

                                                            <table class="table table-bordered border-dark table-sm shadow-lg">
                                                                <thead class="bg-secondary text-white">
                                                                    <tr>
                                                                        <th>
                                                                            <div class="text-center">
                                                                                <small>DOKUMEN PERSETUJUAN DAN PENETAPAN</small>
                                                                            </div>
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <form action="javascript:;" id="form_dokumen_izin_prinsip">
                                                                                <input type="hidden" name="id_rup" value="<?= $row_rup['id_rup'] ?>">
                                                                                <input type="hidden" name="nama_rup" value="<?= $row_rup['nama_rup'] ?>">
                                                                                <div class="input-group mb-2">
                                                                                    <span class="input-group-text"><i class="fa-solid fa-keyboard"></i></span>
                                                                                    <input type="text" class="form-control" placeholder="Nama Dokumen" name="nama_file">
                                                                                </div>
                                                                                <div class="input-group mb-2">
                                                                                    <input type="file" class="form-control" id="file" accept=".pdf,.xlsx" name="file_dokumen">
                                                                                </div>

                                                                                <?php if ($row_rup['status_paket_diumumkan'] == 1) { ?>
                                                                                    <?php if (date('Y-m-d H:i', strtotime($jadwal_download_dokumen_pengadaan['waktu_mulai']))  <= date('Y-m-d H:i')) { ?>
                                                                                    <?php    } else { ?>
                                                                                        <button type="submit" class="btn btn-sm btn-success btn_dok_izin_prinsip">
                                                                                            <i class="fa-solid fa-square-plus"></i>
                                                                                            Tambah Dokumen
                                                                                        </button>
                                                                                    <?php    } ?>

                                                                                <?php  } else { ?>
                                                                                    <button type="submit" class="btn btn-sm btn-success btn_dok_izin_prinsip">
                                                                                        <i class="fa-solid fa-square-plus"></i>
                                                                                        Tambah Dokumen
                                                                                    </button>
                                                                                <?php  }
                                                                                ?>

                                                                            </form>
                                                                        </td>

                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <table class="table table-bordered border-dark table-sm shadow-lg">
                                                                <thead class="bg-secondary text-white">
                                                                    <tr>
                                                                        <th><small>Total Pagu Paket</small></th>
                                                                        <th><small>Total HPS </small></th>
                                                                    </tr>
                                                                </thead>
                                                                <!-- commit -->
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="vertical-align: middle;">
                                                                            <i class="fa-solid fa-rupiah-sign px-1"></i>
                                                                            <input type="hidden" name="total_pagu_rup" value="<?= $row_rup['total_pagu_rup'] ?>" class="form-control" placeholder="Total HPS">
                                                                            <small><?= number_format($row_rup['total_pagu_rup'], 2, ',', '.') ?></small>
                                                                        </td>
                                                                        <td>
                                                                            <div class="col-sm-12">
                                                                                <div class="input-group">
                                                                                    <span class="input-group-text">Rp.</span>
                                                                                    <?php if ($row_rup['status_paket_diumumkan'] == 1) { ?>
                                                                                        <?php if (date('Y-m-d H:i', strtotime($jadwal_download_dokumen_pengadaan['waktu_mulai']))  <= date('Y-m-d H:i')) { ?>
                                                                                            <input type="number" name="total_hps_rup" onkeyup="total_hps_validasi('<?= $row_rup['id_url_rup'] ?>')" class="form-control " placeholder="Total HPS" value="<?= $row_rup['total_hps_rup'] ?>">
                                                                                        <?php    } else { ?>
                                                                                            <input type="number" name="total_hps_rup" readonly class="form-control bg-light" placeholder="Total HPS" value="<?= $row_rup['total_hps_rup'] ?>">
                                                                                        <?php    } ?>
                                                                                    <?php  } else { ?>
                                                                                        <input type="number" name="total_hps_rup" onkeyup="total_hps_validasi('<?= $row_rup['id_url_rup'] ?>')" class="form-control " placeholder="Total HPS" value="<?= $row_rup['total_hps_rup'] ?>">
                                                                                    <?php  }
                                                                                    ?>
                                                                                    <input type="text" id="rupiah_total_hps" class="form-control total_hps bg-light" readonly value="<?= "Rp " . number_format($row_rup['total_hps_rup'], 2, ',', '.') ?>">
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <table class="table table-bordered border-dark table-sm shadow-lg">
                                                                <thead class="bg-info text-dark">
                                                                    <tr>
                                                                        <th>
                                                                            <small>Nama Dokumen</small>
                                                                        </th>
                                                                        <th>
                                                                            <small>File Dokumen</small>
                                                                        </th>
                                                                        <th>
                                                                            <div class="text-center">
                                                                                <small>Aksi</small>
                                                                            </div>
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="tbl_dok_izin_prinsip">

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">
                                            <small>Jadwal Pengadaan</small>
                                        </th>
                                        <td class="bg-default" colspan="3">
                                            <a href="<?= base_url('panitia/daftar_paket/daftar_paket/buat_jadwal/') . $row_rup['id_url_rup'] ?>" class="btn btn-sm btn-primary">
                                                <i class="fa-solid fa-calendar-days px-1"></i>
                                                Buat Jadwal Pengadaan
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">
                                            <small>Jenis Kontrak</small>
                                        </th>
                                        <td>
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-square-pen px-1"></i></span>
                                                <?php if ($row_rup['status_paket_diumumkan'] == 1) { ?>
                                                    <select class="form-select" name="jenis_kontrak" aria-label="Default select example" onchange="jenis_kontrak()" disabled>
                                                    <?php } else { ?>
                                                        <select class="form-select" name="jenis_kontrak" aria-label="Default select example" onchange="jenis_kontrak()">
                                                        <?php   } ?>

                                                        <?php if (!$row_rup['jenis_kontrak']) { ?>
                                                            <option value="">Pilih Jenis Kontrak..</option>
                                                            <option value="1">Lump Sum</option>
                                                            <option value="2">Harga Satuan</option>
                                                            <option value="3">Gabungan Lump Sum dan Harga Satuan</option>
                                                            <option value="4">Terima Jadi (Turnkey)</option>
                                                            <option value="5">Persentase (%)</option>
                                                        <?php } else if ($row_rup['jenis_kontrak'] == 1) { ?>
                                                            <option value="1" selected>Lump Sum</option>
                                                            <option value="2">Harga Satuan</option>
                                                            <option value="3">Gabungan Lump Sum dan Harga Satuan</option>
                                                            <option value="4">Terima Jadi (Turnkey)</option>
                                                            <option value="5">Persentase (%)</option>
                                                        <?php } else if ($row_rup['jenis_kontrak'] == 2) { ?>
                                                            <option value="1">Lump Sum</option>
                                                            <option value="2" selected>Harga Satuan</option>
                                                            <option value="3">Gabungan Lump Sum dan Harga Satuan</option>
                                                            <option value="4">Terima Jadi (Turnkey)</option>
                                                            <option value="5">Persentase (%)</option>
                                                        <?php } else if ($row_rup['jenis_kontrak'] == 3) { ?>
                                                            <option value="1">Lump Sum</option>
                                                            <option value="2">Harga Satuan</option>
                                                            <option value="3" selected>Gabungan Lump Sum dan Harga Satuan</option>
                                                            <option value="4">Terima Jadi (Turnkey)</option>
                                                            <option value="5">Persentase (%)</option>
                                                        <?php } else if ($row_rup['jenis_kontrak'] == 4) { ?>
                                                            <option value="1">Lump Sum</option>
                                                            <option value="2">Harga Satuan</option>
                                                            <option value="3">Gabungan Lump Sum dan Harga Satuan</option>
                                                            <option value="4" selected>Terima Jadi (Turnkey)</option>
                                                            <option value="5">Persentase (%)</option>
                                                        <?php } else if ($row_rup['jenis_kontrak'] == 5) { ?>
                                                            <option value="1">Lump Sum</option>
                                                            <option value="2">Harga Satuan</option>
                                                            <option value="3">Gabungan Lump Sum dan Harga Satuan</option>
                                                            <option value="4">Terima Jadi (Turnkey)</option>
                                                            <option value="5" selected>Persentase (%)</option>
                                                        <?php } ?>

                                                        </select>
                                            </div>
                                        </td>
                                        <th class="bg-light">
                                            <small>Pembebanan Tahun Anggaran</small>
                                        </th>
                                        <td>
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-calendar-plus"></i></span>

                                                <?php if ($row_rup['status_paket_diumumkan'] == 1) { ?>
                                                    <input type="text" class="form-control" name="beban_tahun_anggaran" readonly value="<?= $row_rup['beban_tahun_anggaran'] ?>">
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" name="beban_tahun_anggaran" onkeyup="beban_anggaran()" value="<?= $row_rup['beban_tahun_anggaran'] ?>">
                                                        <!-- <select class="form-select" name="beban_tahun_anggaran" aria-label="Default select example" onchange="beban_anggaran()">
                                                        <?php } ?>

                                                        <?php if (!$row_rup['beban_tahun_anggaran']) { ?>
                                                            <option value="">Pilih...</option>
                                                            <option value="1">Tahun Tunggal</option>
                                                            <option value="2">Tahun Jamak</option>
                                                        <?php } else if ($row_rup['beban_tahun_anggaran'] == 1) { ?>
                                                            <option value="">Pilih...</option>
                                                            <option value="1" selected>Tahun Tunggal</option>
                                                            <option value="2">Tahun Jamak</option>
                                                        <?php } else if ($row_rup['beban_tahun_anggaran'] == 2) { ?>
                                                            <option value="">Pilih...</option>
                                                            <option value="1">Tahun Tunggal</option>
                                                            <option value="2" selected>Tahun Jamak</option>
                                                        <?php } ?>

                                                        </select> -->
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">
                                            <small>Bobot Penilaian</small>
                                        </th>
                                        <td>
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-gear"></i></span>
                                                <?php if ($row_rup['status_paket_diumumkan'] == 1) { ?>
                                                    <select class="form-select" aria-label="Default select example" name="bobot_nilai" onchange="penilaian()" disabled>
                                                    <?php } else { ?>
                                                        <select class="form-select" aria-label="Default select example" name="bobot_nilai" onchange="penilaian()">
                                                        <?php  } ?>

                                                        <?php if (!$row_rup['bobot_nilai']) { ?>
                                                            <option value="">Pilih...</option>
                                                            <option value="1">Kombinasi</option>
                                                            <option value="2">Biaya Terendah</option>
                                                        <?php } else if ($row_rup['bobot_nilai'] == 1) { ?>
                                                            <option value="">Pilih...</option>
                                                            <option value="1" selected>Kombinasi</option>
                                                            <option value="2">Biaya Terendah</option>
                                                        <?php } else if ($row_rup['bobot_nilai'] == 2) { ?>
                                                            <option value="">Pilih...</option>
                                                            <option value="1">Kombinasi</option>
                                                            <option value="2" selected>Biaya Terendah</option>
                                                        <?php } else if ($row_rup['bobot_nilai'] == 3) { ?>
                                                            <option value="">Pilih...</option>
                                                            <option value="1">Kombinasi</option>
                                                            <option value="2">Biaya Terendah</option>
                                                        <?php }  ?>

                                                        </select>
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <div class="input-group mb-2">
                                                <?php if ($row_rup['status_paket_diumumkan'] == 1) { ?>
                                                    <span class="input-group-text"><i class="fa-solid fa-money-bill"></i>&ensp; Bobot Teknis</span>
                                                    <input type="number" class="form-control " pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==3) return false;" placeholder="Bobot Teknis" name="bobot_teknis" onkeyup="bobot_teknis()" value="<?= $row_rup['bobot_teknis'] ?>" disabled>

                                                    <span class="input-group-text"><i class="fa-solid fa-percent"></i></span>
                                                    <span class="input-group-text"><i class="fa-solid fa-money-bill"></i>&ensp; Bobot Biaya</span>
                                                    <input type="number" class="form-control " pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==3) return false;" placeholder="Bobot Biaya" name="bobot_biaya" onkeyup="bobot_biaya()" value="<?= $row_rup['bobot_biaya'] ?>" disabled>
                                                <?php  } else { ?>
                                                    <?php if (!$row_rup['bobot_nilai']) { ?>

                                                        <span class="input-group-text"><i class="fa-solid fa-money-bill"></i>&ensp; Bobot Teknis</span>
                                                        <input type="number" class="form-control " pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==3) return false;" placeholder="Bobot Teknis" name="bobot_teknis" readonly value="<?= $row_rup['bobot_teknis'] ?>" onkeyup="bobot_teknis()">

                                                        <span class="input-group-text"><i class="fa-solid fa-percent"></i> &ensp; Bobot Biaya</span>
                                                        <span class="input-group-text"><i class="fa-solid fa-money-bill"></i></span>
                                                        <input type="number" class="form-control" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==3) return false;" placeholder="Bobot Biaya" name="bobot_biaya" readonly value="<?= $row_rup['bobot_biaya'] ?>" onkeyup="bobot_teknis()">
                                                        <span class=" input-group-text"><i class="fa-solid fa-percent"></i></span>
                                                    <?php } else if ($row_rup['bobot_nilai'] == 1) { ?>
                                                        <span class="input-group-text"><i class="fa-solid fa-money-bill"></i>&ensp; Bobot Teknis</span>
                                                        <input type="number" class="form-control " pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==3) return false;" placeholder="Bobot Teknis" name="bobot_teknis" onkeyup="bobot_teknis()" value="<?= $row_rup['bobot_teknis'] ?>">

                                                        <span class="input-group-text"><i class="fa-solid fa-percent"></i></span>
                                                        <span class="input-group-text"><i class="fa-solid fa-money-bill"></i>&ensp; Bobot Biaya</span>
                                                        <input type="number" class="form-control " pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==3) return false;" placeholder="Bobot Biaya" name="bobot_biaya" onkeyup="bobot_biaya()" value="<?= $row_rup['bobot_biaya'] ?>">

                                                        <span class="input-group-text"><i class="fa-solid fa-percent"></i></span>
                                                    <?php } else if ($row_rup['bobot_nilai'] == 2) { ?>
                                                        <span class="input-group-text"><i class="fa-solid fa-money-bill"></i>&ensp;Bobot Teknis</span>
                                                        <input type="number" class="form-control bg-light" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==3) return false;" placeholder="Bobot Teknis" name="bobot_teknis" onkeyup="bobot_teknis()" onkeyup="bobot_biaya()" value="<?= $row_rup['bobot_teknis'] ?>" readonly>
                                                        <span class="input-group-text"><i class="fa-solid fa-percent"></i></span>

                                                        <span class="input-group-text"><i class="fa-solid fa-money-bill"></i>&ensp;Bobot Biaya</span>
                                                        <input type="number" class="form-control bg-light" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==3) return false;" placeholder="Bobot Biaya" name="bobot_biaya" onkeyup="bobot_biaya()" readonly value="<?= $row_rup['bobot_biaya'] ?>">
                                                        <span class="input-group-text"><i class="fa-solid fa-percent"></i></span>

                                                    <?php } else if ($row_rup['bobot_nilai'] == 3) { ?>

                                                        <span class="input-group-text"><i class="fa-solid fa-money-bill"></i></span>
                                                        <input type="number" class="form-control  bg-light" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==3) return false;" placeholder="Bobot Teknis" name="bobot_teknis" readonly value="<?= $row_rup['bobot_teknis'] ?>">
                                                        <span class="input-group-text"><i class="fa-solid fa-percent"></i></span>
                                                        <span class="input-group-text"><i class="fa-solid fa-money-bill"></i></span>

                                                        <input type="number" class="form-control " pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==3) return false;" placeholder="Bobot Biaya" name="bobot_biaya" onkeyup="bobot_biaya()" value="<?= $row_rup['bobot_biaya'] ?>">
                                                        <span class="input-group-text"><i class="fa-solid fa-percent"></i></span>

                                                    <?php }  ?>
                                                <?php } ?>


                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">
                                            <small>Dokumen Persyaratan Pengadaan</small>
                                        </th>
                                        <td class="bg-default" colspan="3">
                                            <?php if ($row_rup['status_paket_diumumkan'] == 1) { ?>
                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal-xl-syarat" disabled>
                                                    <i class="fa-regular fa-folder-open px-1"></i>
                                                    Setting Dokumen Persyaratan
                                                </button>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal-xl-syarat">
                                                    <i class="fa-regular fa-folder-open px-1"></i>
                                                    Setting Dokumen Persyaratan
                                                </button>
                                            <?php } ?>


                                            <?php if ($row_rup['id_jadwal_tender'] == 2 || $row_rup['id_jadwal_tender'] == 1 || $row_rup['id_jadwal_tender'] == 3 || $row_rup['id_jadwal_tender'] == 6) { ?>
                                                <button type="button" class="btn btn-sm btn-warning text-white" onclick="get_terekomendasi()">
                                                    <i class="fa-solid fa-building-user px-1"></i>
                                                    Undang Rekanan Terekomendasi
                                                </button>
                                            <?php } else if ($row_rup['id_jadwal_tender'] == 9) { ?>
                                                <button type="button" class="btn btn-sm btn-warning text-white" onclick="get_terekomendasi()">
                                                    <i class="fa-solid fa-building-user px-1"></i>
                                                    Pilih Penyedia
                                                </button>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-sm btn-info text-white" data-bs-toggle="modal" onclick="get_terekomendasi_umum()">
                                                    <i class="fa-solid fa-building-user px-1"></i>
                                                    Lihat Rekanan Terekomendasi
                                                </button>
                                            <?php }  ?>

                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <?php if ($row_rup['id_metode_pengadaan'] == 3 || $row_rup['id_metode_pengadaan'] == 4 || $row_rup['id_metode_pengadaan'] == 5 || $row_rup['id_metode_pengadaan'] == 6) { ?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <th class="bg-light">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <small>Daftar Rekanan Tervalidasi (DRT)</small>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </th>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <td class="bg-default" colspan="3">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modal-xl-rekanan">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <i class="fa-solid fa-building-user px-1"></i>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            Pilih Rekanan Tervalidasi
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <span class="text-danger"><small>* Khusus Jenis Tender Terbatas, Seleksi Terbatas, Pengadaan Langsung & Penunjukan Langsung</small></span>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </td>
                                        <?php  } else { ?>

                                        <?php  }   ?>
                                    </tr> -->
                                    <tr>
                                        <th colspan="4">
                                            <div class="card border-dark shadow-lg">
                                                <div class="card-header border-dark bg-gradient-color2 d-flex justify-content-between align-items-center">
                                                    <div class="flex-grow-1 bd-highlight text-center">
                                                        <span class="text-dark">
                                                            <i class="fa-regular fa-folder-open px-1"></i>
                                                            <small>Form Isian Dokumen Pengadaan & Prakualifikasi</small>
                                                        </span>
                                                    </div>
                                                </div>
                                                <!-- download dokumen pengadaan dan prakualifikasi -->
                                                <input type="hidden" name="open_dokumen_pengadaan" value="<?= base_url('file_paket/' . $row_rup['nama_rup'] . '/DOKUMEN_PENGADAAN' . '/') ?>">
                                                <input type="hidden" name="open_dokumen_prakualifikasi" value="<?= base_url('file_paket/' . $row_rup['nama_rup'] . '/DOKUMEN_PRAKUALIFIKASI' . '/') ?>">
                                                <!-- end download dokumen pengadaan dan prakualifikasi -->
                                                <div class="card-body">
                                                    <table class="table table-bordered border-dark table-sm shadow-lg">
                                                        <thead class="bg-secondary text-white">
                                                            <tr>
                                                                <th>
                                                                    <div class="text-center">
                                                                        <small>Dokumen Pengadaan</small>
                                                                    </div>
                                                                </th>
                                                                <th>
                                                                    <div class="text-center">
                                                                        <small>Dokumen Prakualifikasi </small>
                                                                    </div>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <form action="javascript:;" id="form_dokumen_pengadaan">
                                                                    <input type="hidden" name="id_rup" value="<?= $row_rup['id_rup'] ?>">
                                                                    <input type="hidden" name="nama_rup" value="<?= $row_rup['nama_rup'] ?>">
                                                                    <td>
                                                                        <div class="input-group mb-2">
                                                                            <span class="input-group-text"><i class="fa-solid fa-keyboard"></i></span>
                                                                            <input type="text" class="form-control" placeholder="Nama Dokumen Pengadaan" name="nama_dok_pengadaan">
                                                                        </div>
                                                                        <div class="input-group mb-2">
                                                                            <input type="file" class="form-control" id="file" accept=".pdf,.xlsx" name="file_dok_pengadaan">
                                                                        </div>
                                                                        <button type="submit" class="btn btn-sm btn-success btn_dok_pengadaan">
                                                                            <i class="fa-solid fa-square-plus"></i>
                                                                            Tambah Dokumen Pengadaan
                                                                        </button>
                                                                    </td>
                                                                </form>
                                                                <td>

                                                                    <form action="javascript:;" id="form_dokumen_prakualifikasi">
                                                                        <input type="hidden" name="id_rup" value="<?= $row_rup['id_rup'] ?>">
                                                                        <input type="hidden" name="nama_rup" value="<?= $row_rup['nama_rup'] ?>">
                                                                        <div class="input-group mb-2">
                                                                            <span class="input-group-text"><i class="fa-solid fa-keyboard"></i></span>
                                                                            <input type="text" class="form-control" placeholder="Nama Dokumen Prakualifikasi" name="nama_dok_prakualifikasi">
                                                                        </div>
                                                                        <div class="input-group mb-2">
                                                                            <input type="file" class="form-control" id="file" accept=".pdf,.xlsx" name="file_dok_prakualifikasi">
                                                                        </div>
                                                                        <button type="sbumit" class="btn btn-sm btn-success btn_dok_prakualifikasi">
                                                                            <i class="fa-solid fa-square-plus"></i>
                                                                            Tambah Dokumen Prakualifikasi
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <table class="table table-bordered border-dark table-sm shadow-lg">
                                                                        <thead class="bg-info text-dark">
                                                                            <tr>
                                                                                <th>
                                                                                    <small>Nama Dokumen Pengadaan</small>
                                                                                </th>
                                                                                <th>
                                                                                    <small>File Dokumen</small>
                                                                                </th>
                                                                                <th>
                                                                                    <div class="text-center">
                                                                                        <small>Aksi</small>
                                                                                    </div>
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="tbl_dok_pengadaan">

                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                                <td>
                                                                    <table class="table table-bordered border-dark table-sm shadow-lg">
                                                                        <thead class="bg-info text-dark">
                                                                            <tr>
                                                                                <th>
                                                                                    <small>Nama Dokumen Prakualifikasi</small>
                                                                                </th>
                                                                                <th>
                                                                                    <small>File Dokumen</small>
                                                                                </th>
                                                                                <th>
                                                                                    <div class="text-center">
                                                                                        <small>Aksi</small>
                                                                                    </div>
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="tbl_prakualifikasi">
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="4">
                                            <div class="card border-dark shadow-lg">
                                                <div class="card-header border-dark bg-gradient-color2 d-flex justify-content-between align-items-center">
                                                    <div class="flex-grow-1 bd-highlight text-center">
                                                        <span class="text-dark">
                                                            <i class="fa-solid fa-users px-1"></i>
                                                            <small>Panitia Pelaksana Pengadaan</small>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <table class="table table-bordered border-dark table-sm shadow-lg">
                                                        <thead class="bg-secondary text-white">
                                                            <tr>
                                                                <th>
                                                                    <small>Nama Panitia Pelaksana Pengadaan</small>
                                                                </th>
                                                                <th>
                                                                    <small>Jabatan Panitia</small>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($panitia as $key => $value) { ?>
                                                                <tr>
                                                                    <td>
                                                                        <small><?= $value['nama_pegawai'] ?></small>
                                                                    </td>
                                                                    <td>
                                                                        <small>
                                                                            <?php if ($value['role_panitia'] == 1) { ?>
                                                                                Ketua Panitia
                                                                            <?php } else if ($value['role_panitia'] == 2) { ?>
                                                                                Sekretaris Panitia
                                                                            <?php } else { ?>
                                                                                Anggota Panitia
                                                                            <?php } ?>
                                                                        </small>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>

                                                        </tbody>
                                                    </table>
                                                    <table class="table table-bordered border-dark table-sm shadow-lg">
                                                        <tr>
                                                            <th><small>Peryataan Pakta Integritas</small></th>
                                                            <td>
                                                                <div class="input-group">
                                                                    <div class="input-group-text">
                                                                        <?php if ($row_rup['status_paket_diumumkan'] == 1) { ?>
                                                                            <input id="cek_fakta_integritas" class="form-check-input mt-0" type="checkbox" checked>
                                                                        <?php } else { ?>
                                                                            <input id="cek_fakta_integritas" class="form-check-input mt-0" type="checkbox">
                                                                        <?php   } ?>

                                                                    </div>
                                                                    <input type="text" class="form-control" placeholder="Kami setuju dengan pakta integritas yang berlaku" readonly>
                                                                    <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#modal-xl-pakta">
                                                                        <i class="fa-solid fa-file"></i>
                                                                        Lihat Pakta Integritas
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                </table>
                            </from>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-dark">
                    <form action="javascript:;" id="form_simpan_paket">
                        <input type="hidden" name="id_rup" value="<?= $row_rup['id_rup'] ?>">
                        <input type="hidden" name="id_url_rup" value="<?= $row_rup['id_url_rup'] ?>">
                        <input type="hidden" name="status_paket_panitia" value="1">
                        <?php if ($row_rup['status_paket_panitia'] == 1 || $row_rup['status_paket_panitia'] == NULL) { ?>
                            <?php if ($diumumkan_oleh['role_panitia'] == 1 || $diumumkan_oleh['role_panitia'] == 2) { ?>
                                <button disabled type="submit" class="btn btn-default btn-success btn_simpan_paket">
                                    <i class="fa-solid fa-floppy-disk px-1"></i>
                                    Simpan Data Paket
                                </button>
                            <?php  } else { ?>

                            <?php }
                            ?>
                        <?php } else { ?>

                        <?php  }  ?>
                        <button type="button" class="btn btn-default btn-warning" onclick="history.back()">
                            <i class="fa-solid fa-angles-left px-1"></i>
                            Kembali Kemenu Sebelumnya
                        </button>
                    </form>
                </div>
            </div>
            <!-- modal buat jadwal -->
            <div class="modal fade" id="modal-xl-jadwal" data-bs-keyboard="false" tabindex="-1">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <a class="navbar-brand">
                                <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="27" height="27" class="d-inline-block align-text-top">
                                <b><span class="text-primary">Jasamarga Tollroad Operator</span></b>
                            </a>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="javascript:;" id="form_jadwal">
                            <input type="hidden" value="<?= $row_rup['id_rup'] ?>" name="id_rup">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="card border-dark shadow-lg">
                                            <div class="card-header border-dark bd-blue-700 d-flex justify-content-between align-items-center">
                                                <div class="flex-grow-1 bd-highlight">
                                                    <span class="text-white">
                                                        <i class="fa-regular fa-rectangle-list px-1"></i>
                                                        <small><strong>Form Data - Jadwal Pengadaan/Tender</strong></small>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="card-body">

                                                <table class="table table-bordered table-sm shadow-lg">
                                                    <thead class="bg-secondary text-white">
                                                        <tr>
                                                            <th><small>No</small></th>
                                                            <th><small>Keterangan Jadwal Tender</small></th>
                                                            <th><small>Tanggal Awal</small></th>
                                                            <th><small>Tanggal Akhir</small></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $i = 1;
                                                        $j = 1;
                                                        $k = 1;
                                                        $l = 1;
                                                        foreach ($jadwal as $key => $value) { ?>
                                                            <input type="hidden" name="id_jadwal_rup[<?= $j ?>]" value="<?= $value['id_jadwal_rup'] ?>">
                                                            <tr id="validasi_jadwal<?= $l ?>">
                                                                <td><small><?= $i++ ?></small></td>
                                                                <td><small><?= $value['nama_jadwal_rup'] ?></small></td>
                                                                <td>
                                                                    <small>
                                                                        <div class="input-group mb-2">
                                                                            <span class="input-group-text"><i class="fa-regular fa-calendar-days"></i></span>
                                                                            <input type="datetime-local" class="form-control" name="waktu_mulai[<?= $k ?>]" value="<?= $value['waktu_mulai'] ?>">
                                                                        </div>
                                                                    </small>
                                                                </td>
                                                                <td>
                                                                    <small>
                                                                        <div class="input-group mb-2">
                                                                            <span class="input-group-text"><i class="fa-regular fa-calendar-days"></i></span>
                                                                            <input type="datetime-local" class="form-control" name="waktu_selesai[<?= $k ?>]" value="<?= $value['waktu_selesai'] ?>">
                                                                        </div>
                                                                    </small>
                                                                </td>
                                                            </tr>
                                                            <?php $j++ ?>
                                                            <?php $k++ ?>
                                                            <?php $l++ ?>
                                                        <?php  } ?>

                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-start">
                                <div class="container-fluid">
                                    <button type="submit" class="btn btn-success btn_jadwal">
                                        <i class="fa-solid fa-hard-drive"></i>
                                        Simpan Data
                                    </button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                        <i class="fa-solid fa-angles-left"></i>
                                        Kembali
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal buat syarat administrasi dan teknis -->
        <div class="modal fade" id="modal-xl-syarat" data-bs-keyboard="false" tabindex="-1">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <a class="navbar-brand">
                            <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="27" height="27" class="d-inline-block align-text-top">
                            <b><span class="text-primary">Jasamarga Tollroad Operator</span></b>
                        </a>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="card border-dark shadow-lg">
                                    <div class="card-header border-dark bd-blue-700 d-flex justify-content-between align-items-center">
                                        <div class="flex-grow-1 bd-highlight">
                                            <span class="text-white">
                                                <i class="fa-regular fa-rectangle-list px-1"></i>
                                                <small><strong>Form Data - Persyaratan Administrasi & Teknis Pengadaan</strong></small>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered table-sm shadow-lg">
                                            <tr>
                                                <th><small>Kualifikasi Usaha</small></th>
                                                <td>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="fa-solid fa-gear"></i></span>
                                                        <select name="syarat_tender_kualifikasi" class="form-select form-select-sm" onchange="kualifikasi_syart_tender()" aria-label="Default select example">
                                                            <?php if ($row_rup['syarat_tender_kualifikasi']) { ?>
                                                                <option value="<?= $row_rup['syarat_tender_kualifikasi'] ?>"><?= $row_rup['syarat_tender_kualifikasi'] ?></option>
                                                            <?php } else { ?>
                                                                <option selected disabled value="">Pilih Kualifikasi...</option>
                                                            <?php } ?>

                                                            <option value="Besar">Besar</option>
                                                            <option value="Menengah Besar">Menengah - Besar</option>
                                                            <option value="Menengah">Menengah</option>
                                                            <option value="Kecil Menengah">Kecil - Menengah</option>
                                                            <option value="Kecil">Kecil</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="card border-dark shadow-lg">
                                                        <div class="card-header border-dark bg-warning d-flex justify-content-between align-items-center">
                                                            <div class="flex-grow-1 text-center bd-highlight">
                                                                <span class="text-dark">
                                                                    <i class="fa-regular fa-rectangle-list px-1"></i>
                                                                    <small><strong>Persyaratan Administrasi / Legalitas</strong></small>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <table class="table table-sm table-bordered table-sm shadow-lg">
                                                                <thead class="bg-secondary text-white text-center">
                                                                    <tr>
                                                                        <th colspan="2"><small>Izin Usaha</small></th>
                                                                    </tr>
                                                                </thead>
                                                                <thead class="bg-light text-center">
                                                                    <tr>
                                                                        <th><small>Keterangan Jenis Izin Usaha</small></th>
                                                                        <th><small>Tahun Berlaku / Seumur Hidup</small></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="input-group mb-1">
                                                                                <div class="input-group-text">
                                                                                    <?php if ($syarat_izin_usaha_tender['sts_checked_siup'] == 1) { ?>
                                                                                        <input id="cek_siup" checked class="form-check-input mt-0" value="<?= $syarat_izin_usaha_tender['sts_checked_siup'] ?>" name="sts_checked_siup" type="checkbox">
                                                                                    <?php } else { ?>
                                                                                        <input id="cek_siup" name="sts_checked_siup" class="form-check-input mt-0" type="checkbox">
                                                                                    <?php  }  ?>
                                                                                </div>
                                                                                <input type="text" class="form-control form-control-sm" value="Surat Izin Usaha Perdagangan (SIUP)" readonly>
                                                                            </div>
                                                                            <div class="input-group mb-1">
                                                                                <div class="input-group-text">
                                                                                    <?php if ($syarat_izin_usaha_tender['sts_checked_nib'] == 1) { ?>
                                                                                        <input id="cek_nib" checked class="form-check-input mt-0" value="<?= $syarat_izin_usaha_tender['sts_checked_nib'] ?>" name="sts_checked_nib" type="checkbox">
                                                                                    <?php } else { ?>
                                                                                        <input id="cek_nib" name="sts_checked_nib" class="form-check-input mt-0" type="checkbox">
                                                                                    <?php  }  ?>
                                                                                </div>
                                                                                <input type="text" class="form-control form-control-sm" value="Nomor Induk Berusaha (NIB/TDP)" readonly>
                                                                            </div>
                                                                            <div class="input-group mb-1">
                                                                                <div class="input-group-text">
                                                                                    <?php if ($syarat_izin_usaha_tender['sts_checked_sbu'] == 1) { ?>
                                                                                        <input id="cek_sbu" checked class="form-check-input mt-0" value="<?= $syarat_izin_usaha_tender['sts_checked_sbu'] ?>" name="sts_checked_sbu" type="checkbox">
                                                                                    <?php } else { ?>
                                                                                        <input id="cek_sbu" name="sts_checked_sbu" class="form-check-input mt-0" type="checkbox">
                                                                                    <?php  }  ?>
                                                                                </div>
                                                                                <input type="text" class="form-control form-control-sm" value="Sertifikat Badan Usaha (SBU)" readonly>
                                                                            </div>
                                                                            <div class="input-group mb-1">
                                                                                <div class="input-group-text">
                                                                                    <?php if ($syarat_izin_usaha_tender['sts_checked_siujk'] == 1) { ?>
                                                                                        <input id="cek_siujk" checked class="form-check-input mt-0" value="<?= $syarat_izin_usaha_tender['sts_checked_siujk'] ?>" name="sts_checked_siujk" type="checkbox">
                                                                                    <?php } else { ?>
                                                                                        <input id="cek_siujk" name="sts_checked_siujk" class="form-check-input mt-0" type="checkbox">
                                                                                    <?php  }  ?>
                                                                                </div>
                                                                                <input type="text" class="form-control form-control-sm" value="Surat Izin Jasa Konstruksi (SIUJK)" readonly>
                                                                            </div>
                                                                            <div class="input-group mb-1">
                                                                                <div class="input-group-text">
                                                                                    <?php if ($syarat_izin_usaha_tender['sts_checked_skdp'] == 1) { ?>
                                                                                        <input id="cek_skdp" checked class="form-check-input mt-0" value="<?= $syarat_izin_usaha_tender['sts_checked_skdp'] ?>" name="sts_checked_skdp" type="checkbox">
                                                                                    <?php } else { ?>
                                                                                        <input id="cek_skdp" name="sts_checked_skdp" class="form-check-input mt-0" type="checkbox">
                                                                                    <?php  }  ?>
                                                                                </div>
                                                                                <input type="text" class="form-control form-control-sm" value="Surat Keterangan Domisili Perusahan (SKDP)" readonly>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="input-group mb-1">
                                                                                <span class="input-group-text"><i class="fa-regular fa-calendar-days"></i></span>
                                                                                <select onchange="pilih_syarat_izin_usaha_tender_siup()" name="sts_masa_berlaku_siup" class="form-select form-select-sm" aria-label="Default select example">
                                                                                    <?php if ($syarat_izin_usaha_tender['sts_masa_berlaku_siup']) { ?>
                                                                                        <option value="<?= $syarat_izin_usaha_tender['sts_masa_berlaku_siup'] ?>">
                                                                                            <?php if ($syarat_izin_usaha_tender['sts_masa_berlaku_siup'] == 1) { ?>
                                                                                                Tanggal
                                                                                            <?php } else { ?>
                                                                                                Seumur Hidup
                                                                                            <?php } ?>
                                                                                        </option>
                                                                                    <?php } else { ?>
                                                                                        <option selected disabled value="">Pilih...</option>
                                                                                    <?php } ?>
                                                                                    <option value="2">Seumur Hidup</option>
                                                                                    <option value="1">Tanggal</option>
                                                                                </select>
                                                                                <?php if ($syarat_izin_usaha_tender['sts_masa_berlaku_siup'] == 1) { ?>
                                                                                    <input type="date" value="<?= $syarat_izin_usaha_tender['tgl_berlaku_siup'] ?>" onchange="pilih_syarat_tanggal_izin_usaha_tender_siup()" name="tgl_berlaku_siup" class="form-control form-control-sm">
                                                                                <?php } else { ?>
                                                                                    <input type="date" style="display: none;" name="tgl_berlaku_siup" class="form-control form-control-sm">
                                                                                <?php } ?>
                                                                            </div>
                                                                            <div class="input-group mb-1">
                                                                                <span class="input-group-text"><i class="fa-regular fa-calendar-days"></i></span>
                                                                                <select onchange="pilih_syarat_izin_usaha_tender_nib()" name="sts_masa_berlaku_nib" class="form-select form-select-sm" aria-label="Default select example">
                                                                                    <?php if ($syarat_izin_usaha_tender['sts_masa_berlaku_nib']) { ?>
                                                                                        <option value="<?= $syarat_izin_usaha_tender['sts_masa_berlaku_nib'] ?>">
                                                                                            <?php if ($syarat_izin_usaha_tender['sts_masa_berlaku_nib'] == 1) { ?>
                                                                                                Tanggal
                                                                                            <?php } else { ?>
                                                                                                Seumur Hidup
                                                                                            <?php } ?>
                                                                                        </option>
                                                                                    <?php } else { ?>
                                                                                        <option selected disabled value="">Pilih...</option>
                                                                                    <?php } ?>
                                                                                    <option value="2">Seumur Hidup</option>
                                                                                    <option value="1">Tanggal</option>
                                                                                </select>
                                                                                <?php if ($syarat_izin_usaha_tender['sts_masa_berlaku_nib'] == 1) { ?>
                                                                                    <input type="date" value="<?= $syarat_izin_usaha_tender['tgl_berlaku_nib'] ?>" onchange="pilih_syarat_tanggal_izin_usaha_tender_nib()" name="tgl_berlaku_nib" class="form-control form-control-sm">
                                                                                <?php } else { ?>
                                                                                    <input type="date" style="display: none;" name="tgl_berlaku_nib" class="form-control form-control-sm">
                                                                                <?php } ?>
                                                                            </div>
                                                                            <div class="input-group mb-1">
                                                                                <span class="input-group-text"><i class="fa-regular fa-calendar-days"></i></span>
                                                                                <select onchange="pilih_syarat_izin_usaha_tender_sbu()" name="sts_masa_berlaku_sbu" class="form-select form-select-sm" aria-label="Default select example">
                                                                                    <?php if ($syarat_izin_usaha_tender['sts_masa_berlaku_sbu']) { ?>
                                                                                        <option value="<?= $syarat_izin_usaha_tender['sts_masa_berlaku_sbu'] ?>">
                                                                                            <?php if ($syarat_izin_usaha_tender['sts_masa_berlaku_sbu'] == 1) { ?>
                                                                                                Tanggal
                                                                                            <?php } else { ?>
                                                                                                Seumur Hidup
                                                                                            <?php } ?>
                                                                                        </option>
                                                                                    <?php } else { ?>
                                                                                        <option selected disabled value="">Pilih...</option>
                                                                                    <?php } ?>
                                                                                    <option value="2">Seumur Hidup</option>
                                                                                    <option value="1">Tanggal</option>
                                                                                </select>
                                                                                <?php if ($syarat_izin_usaha_tender['sts_masa_berlaku_sbu'] == 1) { ?>
                                                                                    <input type="date" value="<?= $syarat_izin_usaha_tender['tgl_berlaku_sbu'] ?>" onchange="pilih_syarat_tanggal_izin_usaha_tender_sbu()" name="tgl_berlaku_sbu" class="form-control form-control-sm">
                                                                                <?php } else { ?>
                                                                                    <input type="date" style="display: none;" name="tgl_berlaku_sbu" class="form-control form-control-sm">
                                                                                <?php } ?>
                                                                            </div>
                                                                            <div class="input-group mb-1">
                                                                                <span class="input-group-text"><i class="fa-regular fa-calendar-days"></i></span>
                                                                                <select onchange="pilih_syarat_izin_usaha_tender_siujk()" name="sts_masa_berlaku_siujk" class="form-select form-select-sm" aria-label="Default select example">
                                                                                    <?php if ($syarat_izin_usaha_tender['sts_masa_berlaku_siujk']) { ?>
                                                                                        <option value="<?= $syarat_izin_usaha_tender['sts_masa_berlaku_siujk'] ?>">
                                                                                            <?php if ($syarat_izin_usaha_tender['sts_masa_berlaku_siujk'] == 1) { ?>
                                                                                                Tanggal
                                                                                            <?php } else { ?>
                                                                                                Seumur Hidup
                                                                                            <?php } ?>
                                                                                        </option>
                                                                                    <?php } else { ?>
                                                                                        <option selected disabled value="">Pilih...</option>
                                                                                    <?php } ?>
                                                                                    <option value="2">Seumur Hidup</option>
                                                                                    <option value="1">Tanggal</option>
                                                                                </select>
                                                                                <?php if ($syarat_izin_usaha_tender['sts_masa_berlaku_siujk'] == 1) { ?>
                                                                                    <input type="date" value="<?= $syarat_izin_usaha_tender['tgl_berlaku_siujk'] ?>" onchange="pilih_syarat_tanggal_izin_usaha_tender_siujk()" name="tgl_berlaku_siujk" class="form-control form-control-sm">
                                                                                <?php } else { ?>
                                                                                    <input type="date" style="display: none;" name="tgl_berlaku_siujk" class="form-control form-control-sm">
                                                                                <?php } ?>
                                                                            </div>
                                                                            <div class="input-group mb-1">
                                                                                <span class="input-group-text"><i class="fa-regular fa-calendar-days"></i></span>
                                                                                <select onchange="pilih_syarat_izin_usaha_tender_skdp()" name="sts_masa_berlaku_skdp" class="form-select form-select-sm" aria-label="Default select example">
                                                                                    <?php if ($syarat_izin_usaha_tender['sts_masa_berlaku_skdp']) { ?>
                                                                                        <option value="<?= $syarat_izin_usaha_tender['sts_masa_berlaku_skdp'] ?>">
                                                                                            <?php if ($syarat_izin_usaha_tender['sts_masa_berlaku_skdp'] == 1) { ?>
                                                                                                Tanggal
                                                                                            <?php } else { ?>
                                                                                                Seumur Hidup
                                                                                            <?php } ?>
                                                                                        </option>
                                                                                    <?php } else { ?>
                                                                                        <option selected disabled value="">Pilih...</option>
                                                                                    <?php } ?>
                                                                                    <option value="2">Seumur Hidup</option>
                                                                                    <option value="1">Tanggal</option>
                                                                                </select>
                                                                                <?php if ($syarat_izin_usaha_tender['sts_masa_berlaku_skdp'] == 1) { ?>
                                                                                    <input type="date" value="<?= $syarat_izin_usaha_tender['tgl_berlaku_skdp'] ?>" name="tgl_berlaku_skdp" onchange="pilih_syarat_tanggal_izin_usaha_tender_skdp()" class="form-control form-control-sm">
                                                                                <?php } else { ?>
                                                                                    <input type="date" style="display: none;" name="tgl_berlaku_skdp" class="form-control form-control-sm">
                                                                                <?php } ?>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <table class="table table-sm table-bordered table-sm shadow-lg">
                                                                <thead class="bg-secondary text-white text-center">
                                                                    <tr>
                                                                        <th colspan="3"><small>Klasifikasi Buku Lapang Usaha Indonesia (KBLI)</small></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="col-sm-10">
                                                                            <div class="input-group">
                                                                                <span class="input-group-text"><small>Jenis KBLI</small></span>
                                                                                <span class="input-group-text"><i class="fa-solid fa-list"></i></span>
                                                                                <select name="nama_kbli" class="form-select single-select-field">
                                                                                    <option value="0">-- Pilih Jenis KBLI --</option>
                                                                                    <?php foreach ($result_kbli as $key => $value) { ?>
                                                                                        <option value="<?= $value['id_kbli'] ?>"><?= $value['kode_kbli'] ?> | <?= $value['nama_kbli'] ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                                <!-- <input class="form-control form-control-sm" name="nama_kbli" list="datalistOptions" placeholder="Pilih...">
                                                                                    
                                                                                <datalist id="datalistOptions">
                                                                                
                                                                                </datalist> -->
                                                                            </div>
                                                                        </td>
                                                                        <td class="col-sm-2 text-center">
                                                                            <a onclick="simpan_syarat_kbli()" href="javascript:;" class="btn btn-sm btn-primary">
                                                                                <i class="fa-solid fa-square-plus"></i>
                                                                                Tambah KBLI
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="3">
                                                                            <div style="margin: 10px;">
                                                                                <table id="table_kbli_syarat_tender" class="table table-bordered table-sm shadow-lg">
                                                                                    <thead class="bg-info">
                                                                                        <tr>
                                                                                            <th><small>Keterangan Jenis KBLI</small></th>
                                                                                            <th>
                                                                                                <div class="text-center">
                                                                                                    <small>Aksi</small>
                                                                                                </div>
                                                                                            </th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody id="result_tbl_kbli_syarat_tender">

                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <table class="table table-sm table-bordered table-sm shadow-lg">
                                                                <thead class="bg-secondary text-white text-center">
                                                                    <tr>
                                                                        <th colspan="3"><small>Sertifikat Badan Usaha (SBU)</small></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="col-sm-10">
                                                                            <div class="input-group">
                                                                                <span class="input-group-text"><small>Jenis SBU</small></span>
                                                                                <span class="input-group-text"><i class="fa-solid fa-list"></i></span>
                                                                                <select name="nama_sbu" class="form-control single-select-field">
                                                                                    <option value="0">-- Pilih Jenis SBU --</option>
                                                                                    <?php foreach ($result_sbu as $key => $value) { ?>
                                                                                        <option value="<?= $value['id_sbu'] ?>"><?= $value['kode_sbu'] ?> | <?= $value['nama_sbu'] ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                                <!-- <input class="form-control form-control-sm" name="nama_sbu" list="datalistOptionsSbu" placeholder="Pilih..."> -->
                                                                                <!-- <datalist id="datalistOptionsSbu">
                                                                                   
                                                                                </datalist> -->
                                                                            </div>
                                                                        </td>
                                                                        <td class="col-sm-2 text-center">
                                                                            <a onclick="simpan_syarat_sbu()" href="javascript:;" class="btn btn-sm btn-primary">
                                                                                <i class="fa-solid fa-square-plus"></i>
                                                                                Tambah SBU
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="3">
                                                                            <div style="margin: 10px;">
                                                                                <table id="table_sbu_syarat_tender" class="table table-bordered table-sm shadow-lg">
                                                                                    <thead class="bg-info">
                                                                                        <tr>
                                                                                            <th><small>Keterangan Jenis SBU</small></th>
                                                                                            <th>
                                                                                                <div class="text-center">
                                                                                                    <small>Aksi</small>
                                                                                                </div>
                                                                                            </th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody id="result_tbl_sbu_syarat_tender">

                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="card border-dark shadow-lg">
                                                        <div class="card-header border-dark bg-warning d-flex justify-content-between align-items-center">
                                                            <div class="flex-grow-1 text-center bd-highlight">
                                                                <span class="text-dark">
                                                                    <i class="fa-regular fa-rectangle-list px-1"></i>
                                                                    <small><strong>Persyaratan Kualifikasi</strong></small>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <table class="table table-sm table-bordered table-sm shadow-lg">
                                                                <tr>
                                                                    <td colspan="3">
                                                                        <div class="input-group">
                                                                            <div class="input-group-text">
                                                                                <?php if ($syarat_izin_teknis_tender['sts_checked_pengalaman_pekerjaan'] == 1) { ?>
                                                                                    <input id="sts_checked_pengalaman_pekerjaan" checked class="form-check-input mt-0" value="<?= $syarat_izin_teknis_tender['sts_checked_pengalaman_pekerjaan'] ?>" name="sts_checked_pengalaman_pekerjaan" type="checkbox">
                                                                                <?php } else { ?>
                                                                                    <input id="sts_checked_pengalaman_pekerjaan" name="sts_checked_pengalaman_pekerjaan" class="form-check-input mt-0" type="checkbox">
                                                                                <?php  }  ?>
                                                                            </div>
                                                                            <input type="text" class="form-control form-control-sm" value="Pengalaman Pekerjaan Perusahaan" readonly>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-sm-8" colspan=2>
                                                                        <div class="input-group">
                                                                            <div class="input-group-text">
                                                                                <?php if ($syarat_izin_teknis_tender['sts_checked_spt'] == 1) { ?>
                                                                                    <input id="sts_checked_spt" checked class="form-check-input mt-0" value="<?= $syarat_izin_teknis_tender['sts_checked_spt'] ?>" name="sts_checked_spt" type="checkbox">
                                                                                <?php } else { ?>
                                                                                    <input id="sts_checked_spt" name="sts_checked_spt" class="form-check-input mt-0" type="checkbox">
                                                                                <?php  }  ?>
                                                                            </div>
                                                                            <input type="text" class="form-control form-control-sm" value="Surat Pemberitahuan Tahunan (SPT) Badan" readonly>
                                                                        </div>
                                                                    </td>
                                                                    <td class="col-sm-4">
                                                                        <div class="input-group">
                                                                            <span class="input-group-text"><small>Tahun Lapor</small></span>
                                                                            <span class="input-group-text"><i class="fa-regular fa-calendar-days"></i></span>
                                                                            <select onchange="pilih_tahun_lapor_spt()" name="tahun_lapor_spt" class="form-select form-select-sm" aria-label="Default select example">
                                                                                <?php if ($syarat_izin_teknis_tender['tahun_lapor_spt']) { ?>
                                                                                    <option value="<?= $syarat_izin_teknis_tender['tahun_lapor_spt'] ?>">
                                                                                        <?= $syarat_izin_teknis_tender['tahun_lapor_spt'] ?>
                                                                                    </option>
                                                                                    <?php $i = 0;
                                                                                    for ($i = 20; $i <= 30; $i++) {  ?>
                                                                                        <option value="20<?= $i ?>">20<?= $i ?></option>
                                                                                    <?php  } ?>
                                                                                <?php } else { ?>
                                                                                    <option selected value="2020">2020</option>
                                                                                    <?php $i = 0;
                                                                                    for ($i = 20; $i <= 30; $i++) {  ?>
                                                                                        <option value="20<?= $i ?>">20<?= $i ?></option>
                                                                                    <?php  } ?>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-sm-8" colspan="2">
                                                                        <div class="input-group">
                                                                            <div class="input-group-text">
                                                                                <?php if ($syarat_izin_teknis_tender['sts_checked_laporan_keuangan'] == 1) { ?>
                                                                                    <input id="sts_checked_laporan_keuangan" checked class="form-check-input mt-0" value="<?= $syarat_izin_teknis_tender['sts_checked_laporan_keuangan'] ?>" name="sts_checked_laporan_keuangan" type="checkbox">
                                                                                <?php } else { ?>
                                                                                    <input id="sts_checked_laporan_keuangan" name="sts_checked_laporan_keuangan" class="form-check-input mt-0" type="checkbox">
                                                                                <?php  }  ?>
                                                                            </div>
                                                                            <input type="text" class="form-control form-control-sm" value="Laporan Keuangan" readonly>
                                                                            <span class="input-group-text"><i class="fa-solid fa-gear"></i></span>
                                                                            <select onchange="pilih_sts_audit_laporan_keuangan()" name="sts_audit_laporan_keuangan" class="form-select form-select-sm" aria-label="Default select example">
                                                                                <?php if ($syarat_izin_teknis_tender['sts_audit_laporan_keuangan']) { ?>
                                                                                    <option value="<?= $syarat_izin_teknis_tender['sts_audit_laporan_keuangan'] ?>">
                                                                                        <?= $syarat_izin_teknis_tender['sts_audit_laporan_keuangan'] ?>
                                                                                    </option>
                                                                                    <option value="Audit">Audit</option>
                                                                                    <option value="Tidak Audit">Tidak Audit</option>
                                                                                <?php } else { ?>
                                                                                    <option value="">--Pilih--</option>
                                                                                    <option value="Audit">Audit</option>
                                                                                    <option value="Tidak Audit">Tidak Audit</option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                    </td>

                                                                    <td class="col-sm-4">
                                                                        <div class="input-group">
                                                                            <span class="input-group-text"><small>Awal</small></span>
                                                                            <select onchange="pilih_tahun_awal_laporan_keuangan()" name="tahun_awal_laporan_keuangan" class="form-select form-select-sm" aria-label="Default select example">
                                                                                <?php if ($syarat_izin_teknis_tender['tahun_awal_laporan_keuangan']) { ?>
                                                                                    <option value="<?= $syarat_izin_teknis_tender['tahun_awal_laporan_keuangan'] ?>">
                                                                                        <?= $syarat_izin_teknis_tender['tahun_awal_laporan_keuangan'] ?>
                                                                                    </option>
                                                                                    <?php $i = 0;
                                                                                    for ($i = 20; $i <= 30; $i++) {  ?>
                                                                                        <option value="20<?= $i ?>">20<?= $i ?></option>
                                                                                    <?php  } ?>
                                                                                <?php } else { ?>
                                                                                    <option selected value="2020">2020</option>
                                                                                    <?php $i = 0;
                                                                                    for ($i = 20; $i <= 30; $i++) {  ?>
                                                                                        <option value="20<?= $i ?>">20<?= $i ?></option>
                                                                                    <?php  } ?>
                                                                                <?php } ?>
                                                                            </select>

                                                                            <span class="input-group-text"><small>Akhir</small></span>
                                                                            <select onchange="pilih_tahun_akhir_laporan_keuangan()" name="tahun_akhir_laporan_keuangan" class="form-select form-select-sm" aria-label="Default select example">
                                                                                <?php if ($syarat_izin_teknis_tender['tahun_akhir_laporan_keuangan']) { ?>
                                                                                    <option value="<?= $syarat_izin_teknis_tender['tahun_akhir_laporan_keuangan'] ?>">
                                                                                        <?= $syarat_izin_teknis_tender['tahun_akhir_laporan_keuangan'] ?>
                                                                                    </option>
                                                                                    <?php $i = 0;
                                                                                    for ($i = 20; $i <= 30; $i++) {  ?>
                                                                                        <option value="20<?= $i ?>">20<?= $i ?></option>
                                                                                    <?php  } ?>
                                                                                <?php } else { ?>
                                                                                    <option selected value="2020">2020</option>
                                                                                    <?php $i = 0;
                                                                                    for ($i = 20; $i <= 30; $i++) {  ?>
                                                                                        <option value="20<?= $i ?>">20<?= $i ?></option>
                                                                                    <?php  } ?>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-sm-8">
                                                                        <div class="input-group">
                                                                            <div class="input-group-text">
                                                                                <?php if ($syarat_izin_teknis_tender['sts_checked_neraca_keuangan'] == 1) { ?>
                                                                                    <input id="sts_checked_neraca_keuangan" checked class="form-check-input mt-0" value="<?= $syarat_izin_teknis_tender['sts_checked_neraca_keuangan'] ?>" name="sts_checked_neraca_keuangan" type="checkbox">
                                                                                <?php } else { ?>
                                                                                    <input id="sts_checked_neraca_keuangan" name="sts_checked_neraca_keuangan" class="form-check-input mt-0" type="checkbox">
                                                                                <?php  }  ?>
                                                                            </div>
                                                                            <input type="text" class="form-control form-control-sm" value="Neraca Keuangan" readonly>
                                                                        </div>
                                                                    </td>
                                                                    <td class="col-sm-4" colspan="2">
                                                                        <div class="input-group">
                                                                            <span class="input-group-text"><small>Awal</small></span>
                                                                            <select onchange="pilih_tahun_awal_neraca_keuangan()" name="tahun_awal_neraca_keuangan" class="form-select form-select-sm" aria-label="Default select example">
                                                                                <?php if ($syarat_izin_teknis_tender['tahun_awal_neraca_keuangan']) { ?>
                                                                                    <option value="<?= $syarat_izin_teknis_tender['tahun_awal_neraca_keuangan'] ?>">
                                                                                        <?= $syarat_izin_teknis_tender['tahun_awal_neraca_keuangan'] ?>
                                                                                    </option>
                                                                                    <?php $i = 0;
                                                                                    for ($i = 20; $i <= 30; $i++) {  ?>
                                                                                        <option value="20<?= $i ?>">20<?= $i ?></option>
                                                                                    <?php  } ?>
                                                                                <?php } else { ?>
                                                                                    <option selected value="2020">2020</option>
                                                                                    <?php $i = 0;
                                                                                    for ($i = 20; $i <= 30; $i++) {  ?>
                                                                                        <option value="20<?= $i ?>">20<?= $i ?></option>
                                                                                    <?php  } ?>
                                                                                <?php } ?>
                                                                            </select>

                                                                            <span class="input-group-text"><small>Akhir</small></span>
                                                                            <select onchange="pilih_tahun_akhir_neraca_keuangan()" name="tahun_akhir_neraca_keuangan" class="form-select form-select-sm" aria-label="Default select example">
                                                                                <?php if ($syarat_izin_teknis_tender['tahun_akhir_neraca_keuangan']) { ?>
                                                                                    <option value="<?= $syarat_izin_teknis_tender['tahun_akhir_neraca_keuangan'] ?>">
                                                                                        <?= $syarat_izin_teknis_tender['tahun_akhir_neraca_keuangan'] ?>
                                                                                    </option>
                                                                                    <?php $i = 0;
                                                                                    for ($i = 20; $i <= 30; $i++) {  ?>
                                                                                        <option value="20<?= $i ?>">20<?= $i ?></option>
                                                                                    <?php  } ?>
                                                                                <?php } else { ?>
                                                                                    <option selected value="2020">2020</option>
                                                                                    <?php $i = 0;
                                                                                    for ($i = 20; $i <= 30; $i++) {  ?>
                                                                                        <option value="20<?= $i ?>">20<?= $i ?></option>
                                                                                    <?php  } ?>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="card border-dark shadow-lg">
                                                        <div class="card-header border-dark bg-warning d-flex justify-content-between align-items-center">
                                                            <div class="flex-grow-1 text-center bd-highlight">
                                                                <span class="text-dark">
                                                                    <i class="fa-regular fa-rectangle-list px-1"></i>
                                                                    <small><strong>Persyaratan Tambahan Kualifikasi</strong></small>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <table class="table table-sm table-bordered table-sm shadow-lg">
                                                                <thead class="bg-secondary text-white text-center">
                                                                    <tr>
                                                                        <th class="col-sm-8"><small>Keterangan Persyaratan</small></th>
                                                                        <th class="col-sm-4"><small>Upload Contoh Format File Excel</small></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <form action="javascript:;" enctype="multipart/form-data" id="form_simpan_syarat_tambahan" method="post">
                                                                        <input type="hidden" name="id_url_rup" value="<?= $row_rup['id_url_rup'] ?>">
                                                                        <tr>
                                                                            <td>
                                                                                <div class="input-group">
                                                                                    <span class="input-group-text"><i class="fa-solid fa-keyboard"></i></span>
                                                                                    <input name="nama_syarat_tambahan" type="text" class="form-control form-control-sm">
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="input-group">
                                                                                    <span class="input-group-text"><i class="fa-solid fa-cloud-arrow-up"></i></span>
                                                                                    <input type="file" name="file_syarat_tambahan" class="form-control form-control-sm" accept=".xlsx, .xls, .pdf">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">
                                                                                <button type="submit" class="btn btn-sm btn-primary file_syarat_tambahan_btn">
                                                                                    <i class="fa-solid fa-square-plus"></i>
                                                                                    Persyaratan Tambahan
                                                                                </button>
                                                                            </td>
                                                                        </tr>
                                                                    </form>
                                                                    <tr>
                                                                        <td colspan="2">
                                                                            <table class="table table-sm table-bordered table-sm shadow-lg">
                                                                                <thead class="bg-info">
                                                                                    <tr>
                                                                                        <th class="col-sm-9"><small>Keterangan Persyaratan</small></th>
                                                                                        <th class="col-sm-2">
                                                                                            <div class="text-center">
                                                                                                <small>Contoh Format File</small>
                                                                                            </div>
                                                                                        </th>
                                                                                        <th class="col-sm-1">
                                                                                            <div class="text-center">
                                                                                                <small>Aksi</small>
                                                                                            </div>
                                                                                        </th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id="result_tbl_tambahan_syarat_tender">

                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-start">
                        <div class="container">
                            <!-- <button type="submit" class="btn btn-success">
                                <i class="fa-solid fa-hard-drive"></i>
                                Simpan Data
                            </button> -->
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                <i class="fa-solid fa-angles-left"></i>
                                Kembali
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal Cek Rekanan Terrekomendasi -->
        <div class="modal fade" id="modal-xl-rekomendasi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <a class="navbar-brand">
                            <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="27" height="27" class="d-inline-block align-text-top">
                            <b><span class="text-primary">Jasamarga Tollroad Operator</span></b>
                        </a>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="card border-dark shadow-lg">
                                    <div class="card-header border-dark bd-blue-700 d-flex justify-content-between align-items-center">
                                        <div class="flex-grow-1 bd-highlight">
                                            <span class="text-white">
                                                <i class="fa-regular fa-rectangle-list px-1"></i>
                                                <small><strong>List Data - Rekanan Ter-Rekomendasi Sesuai Persyaratan Pengadaan</strong></small>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table_rekomendasi_1 table table-sm table-bordered border-dark table-sm shadow-lg">
                                            <thead class="bg-secondary text-white text-center">
                                                <tr>
                                                    <th class="col-sm-1"><small>No</small></th>
                                                    <th class="col-sm-4"><small>Nama Perusahaan</small></th>
                                                    <th class="col-sm-2"><small>Email</small></th>
                                                    <th class="col-sm-2"><small>Kualifikasi Usaha</small></th>
                                                    <th class="col-sm-2"><small>Rating</small></th>
                                                    <th class="col-sm-2"><small>Penilaian Kinerja</small></th>
                                                    <!-- <th class="col-sm-2"><small>Aksi</small></th> -->
                                                </tr>
                                            </thead>
                                            <tbody id="load_rekomendasi_umum">
                                                <!-- <?php foreach ($result_vendor_terundang as $key => $value) { ?>
                                                    <tr>
                                                        <td>
                                                            <small>
                                                                <span><?= $value['nama_usaha'] ?></span>
                                                            </small>
                                                        </td>
                                                        <td>
                                                            <small>
                                                                <span><?= $value['email'] ?></span>
                                                            </small>
                                                        </td>
                                                        <td>
                                                            <small>
                                                                <span><?= $value['kualifikasi_usaha'] ?></span>
                                                            </small>
                                                        </td>
                                                        <td>
                                                            <center>
                                                                <small>
                                                                    <span class="text-warning"><i class="fas fa fa-star"></i></span>
                                                                </small>
                                                                <small>
                                                                    <span class="text-warning"><i class="fas fa fa-star"></i></span>
                                                                </small>
                                                                <small>
                                                                    <span class="text-warning"><i class="fas fa fa-star"></i></span>
                                                                </small>
                                                                <small>
                                                                    <span class="text-warning"><i class="fas fa fa-star"></i></span>
                                                                </small>
                                                                <small>
                                                                    <span class="text-warning"><i class="fas fa fa-star"></i></span>
                                                                </small>
                                                            </center>
                                                        </td>
                                                        <td>
                                                            <center>
                                                                <small>
                                                                    <span>80</span>
                                                                </small>
                                                            </center>
                                                        </td>
                                                    </tr>
                                                <?php   } ?> -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-start">
                        <div class="container-fluid">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                <i class="fa-solid fa-angles-left"></i>
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="modal-xl-rekomendasi2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <a class="navbar-brand">
                            <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="27" height="27" class="d-inline-block align-text-top">
                            <b><span class="text-primary">Jasamarga Tollroad Operator</span></b>
                        </a>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="card border-dark shadow-lg">
                                    <?php if ($row_rup['id_jadwal_tender'] == 2 || $row_rup['id_jadwal_tender'] == 1) { ?>
                                        <div class="card-header border-dark bd-blue-700 d-flex justify-content-between align-items-center">
                                        <?php } else { ?>
                                            <div class="card-header border-dark bd-yellow-700 d-flex justify-content-between align-items-center">
                                            <?php }  ?>
                                            <div class="flex-grow-1 bd-highlight">
                                                <span class="text-white">
                                                    <i class="fa-regular fa-rectangle-list px-1"></i>
                                                    <?php if ($row_rup['id_jadwal_tender'] == 2 || $row_rup['id_jadwal_tender'] == 1) { ?>
                                                        <small><strong>List Data - Rekanan Ter-Rekomendasi Sesuai Persyaratan Pengadaan</strong></small>
                                                    <?php } else { ?>
                                                        <small><strong>Pilih - Rekanan Ter-Rekomendasi Sesuai Persyaratan Pengadaan</strong></small>
                                                    <?php }  ?>
                                                </span>
                                            </div>
                                            </div>
                                            <div class="card-body">
                                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <?php if ($row_rup['id_jadwal_tender'] == 2 || $row_rup['id_jadwal_tender'] == 1) { ?>
                                                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Rekanan Terekomendasi</button>
                                                        <?php } else { ?>
                                                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Pilih Rekanan Penunjukan Langsung</button>
                                                        <?php }  ?>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Rekanan Terpilih</button>
                                                    </li>
                                                </ul>
                                                <div class="tab-content" id="pills-tabContent">
                                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                        <table class="table_terekomendasi table table-sm table-bordered border-dark table-sm shadow-lg">
                                                            <thead class="bg-secondary text-white text-center">
                                                                <tr>
                                                                    <th class="col-sm-1"><small>No</small></th>
                                                                    <th class="col-sm-4"><small>Nama Perusahaan</small></th>
                                                                    <th class="col-sm-2"><small>Email</small></th>
                                                                    <th class="col-sm-2"><small>Kualifikasi Usaha</small></th>
                                                                    <th class="col-sm-2"><small>Rating</small></th>
                                                                    <th class="col-sm-2"><small>Penilaian Kinerja</small></th>
                                                                    <th class="col-sm-2"><small>Aksi</small></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="load_rekomendasi">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                        <table class="table_terpilih table table-sm table-bordered border-dark table-sm shadow-lg">
                                                            <thead class="bg-secondary text-white text-center">
                                                                <tr>
                                                                    <th class="col-sm-1"><small>No</small></th>
                                                                    <th class="col-sm-4"><small>Nama Perusahaan</small></th>
                                                                    <th class="col-sm-2"><small>Email</small></th>
                                                                    <th class="col-sm-2"><small>Kualifikasi Usaha</small></th>
                                                                    <th class="col-sm-2"><small>Rating</small></th>
                                                                    <th class="col-sm-2"><small>Penilaian Kinerja</small></th>
                                                                    <th class="col-sm-2"><small>Aksi</small></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="load_terpilih">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-start">
                            <div class="container-fluid">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                    <i class="fa-solid fa-angles-left"></i>
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>