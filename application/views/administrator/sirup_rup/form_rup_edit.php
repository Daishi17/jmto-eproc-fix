<main class="container-fluid">
    <input type="hidden" name="kode_urut_rup_detail" value="<?= $row_rup['kode_departemen'] ?>">
    <input type="hidden" name="tahun_detail" value="<?= date('Y') ?>">
    <div class="row">
        <div class="col">
            <div class="card border-dark">
                <div class="card-header border-dark bg-danger">
                    <h6 class="card-title">
                        <span class="text-white">
                            <i class="fa-solid fa-cash-register"></i>
                            <small><strong>Sistem Informasi Rencana Umum Pengadaan (SI-RUP)</strong></small>
                        </span>
                    </h6>
                </div>
            </div>
            <hr>
            <div class="card border-dark">
                <div class="card-header border-dark bg-warning d-flex justify-content-between align-items-center">
                    <div class="flex-grow-1 bd-highlight">
                        <span class="text-dark">
                            <i class="fa-solid fa-money-check px-1"></i>
                            <small><strong>Form - Rencana Umum Pengadaan (RUP)</strong></small>
                        </span>
                    </div>
                    <div class="bd-highlight">
                        <a href="<?= base_url() ?>administrator/Sirup_rup">
                            <button type="button" class="btn btn-primary btn-sm shadow-lg">
                                <i class="fa-solid fa-angles-left px-1"></i>
                                Kembali Kemenu Tabel RUP
                            </button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form id="form_rup" action="javascript:;" method="post">
                        <input type="hidden" name="random_kode" value="<?= $row_rup['id_url_rup'] ?>">
                        <input type="hidden" name="type_button" value="edit">
                        <table class="table table-bordered table-sm shadow-lg">
                            <?php if ($get_row_rkap) { ?>
                                <input type="hidden" value="<?= $get_row_rkap['id_rkap'] ?>" name="id_rkap" readonly style="background-color: #ffffe0;" class="form-control">
                            <?php  } else { ?>

                            <?php }
                            ?>
                            <tr>
                                <th class="bg-light">
                                    <small>Kode & Tahun</small>
                                </th>
                                <td>
                                    <small>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                            <input type="hidden" class="form-control" value="<?= $row_rup['kode_urut_rup'] ?>" name="kode_urut_rup" placeholder="Kode RUP <Auto Number>" readonly style="background-color: #ffffe0;">
                                            <?php if ($get_row_rkap) { ?>
                                                <input type="text" class="form-control" value="<?= $row_rup['kode_rup'] ?>" name="kode_urut_manipulasi" readonly style="background-color: #ffffe0;">
                                            <?php  } else { ?>
                                                <input type="text" class="form-control" value="<?= $row_rup['kode_rup'] ?>" name="kode_urut_manipulasi" readonly style="background-color: #ffffe0;">
                                            <?php }
                                            ?>

                                        </div>
                                    </small>
                                </td>
                                <td>
                                    <small>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                            <?php if ($get_row_rkap) { ?>
                                                <input type="number" value="<?= $get_row_rkap['tahun_rkap'] ?>" name="tahun_rup" readonly style="background-color: #ffffe0;" class="form-control">
                                            <?php  } else { ?>
                                                <input type="number" name="tahun_rup" value="<?= $row_rup['tahun_rup'] ?>" onkeyup="Tahun_change()" maxlength="4" class="form-control" placeholder="Tahun">
                                            <?php }
                                            ?>
                                        </div>
                                        <small class="text-danger tahun_rup_validation"></small>
                                    </small>
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <small>Departemen & Sections</small>
                                </th>
                                <td>
                                    <?php if ($get_row_rkap) { ?>
                                        <small>
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-building-columns"></i></span>
                                                <select name="id_departemen" onchange="pilih_departemen()" id="select_departemen" class="form-control select2bs4">
                                                    <option selected value="<?= $row_rup_edit['id_departemen'] ?>"><?= $row_rup_edit['nama_departemen'] ?></option>
                                                    <?php foreach ($result_departemen as $key => $value) { ?>
                                                        <option value="<?= $value['id_departemen'] ?>"><?= $value['nama_departemen'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <small class="text-danger id_departemen_validation"></small>
                                        </small>
                                    <?php  } else { ?>
                                        <small>
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-building-columns"></i></span>
                                                <select name="id_departemen" onchange="pilih_departemen()" id="select_departemen" class="form-control select2bs4">
                                                    <option selected value="<?= $row_rup_edit['id_departemen'] ?>"><?= $row_rup_edit['nama_departemen'] ?></option>
                                                    <?php foreach ($result_departemen as $key => $value) { ?>
                                                        <option value="<?= $value['id_departemen'] ?>"><?= $value['nama_departemen'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <small class="text-danger id_departemen_validation"></small>
                                        </small>
                                    <?php }
                                    ?>
                                </td>
                                <?php if ($get_row_rkap) { ?>
                                    <td>
                                        <small>
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-map"></i></span>
                                                <select name="id_section" id="section_data" class="form-control select2bs4">
                                                    <option value="<?= $row_rup['id_section'] ?>"><?= $row_rup['nama_section'] ?></option>
                                                    <?php foreach ($result_ruas_by_departemnt as $key => $value) { ?>
                                                        <option value="<?= $value['id_section'] ?>"><?= $value['nama_section'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <!-- id_section -->
                                            <small class="text-danger id_section_validation"></small>
                                        </small>
                                    </td>
                                <?php  } else { ?>
                                    <td>
                                        <small>
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-map"></i></span>
                                                <select name="id_section" id="section_data" class="form-control select2bs4">
                                                    <option value="<?= $row_rup['id_section'] ?>"><?= $row_rup['nama_section'] ?></option>
                                                    <?php foreach ($result_ruas_by_departemnt as $key => $value) { ?>
                                                        <option value="<?= $value['id_section'] ?>"><?= $value['nama_section'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <!-- id_section -->
                                            <small class="text-danger id_section_validation"></small>
                                        </small>
                                    </td>
                                <?php }
                                ?>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <small>Nama Program RKA</small>
                                </th>
                                <td colspan="2">
                                    <small>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text"><i class="fa-solid fa-keyboard"></i></span>
                                            <?php if ($get_row_rkap) { ?>
                                                <input type="text" class="form-control" value="<?= $get_row_rkap['nama_program_rkap'] ?>" placeholder="Nama Program RKAP" readonly style="background-color: #ffffe0;">
                                            <?php  } else { ?>
                                                <input type="text" class="form-control" value="-" placeholder="Nama Program RKAP" readonly style="background-color: #ffffe0;">
                                            <?php }
                                            ?>
                                        </div>
                                    </small>
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <small>Nama Paket & Deskripsi Pekerjaan</small>
                                </th>
                                <td>
                                    <small>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text"><i class="fa-solid fa-keyboard"></i></span>
                                            <textarea class="form-control" name="nama_rup" placeholder=" Nama Paket Pengadaan" rows="2"><?= $row_rup['nama_rup'] ?></textarea>
                                        </div>
                                        <!-- nama_rup -->
                                        <small class="text-danger nama_rup_validation"></small>
                                    </small>
                                </td>
                                <td>
                                    <small>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text"><i class="fa-solid fa-keyboard"></i></span>
                                            <textarea class="form-control" name="deskripsi_rup" placeholder="Deskripsi Pekerjaan Pengadaan" rows="2"><?= $row_rup['deskripsi_rup'] ?></textarea>
                                        </div>
                                        <!-- deskripsi_rup -->
                                        <small class="text-danger deskripsi_rup_validation"></small>
                                    </small>
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <small>Proses Pengadaan</small>
                                </th>
                                <td colspan="3">
                                    <table class="table table-bordered table-sm shadow-lg">
                                        <thead>
                                            <tr>
                                                <th class="bg-primary text-white text-center" colspan="3">
                                                    <small>Deskripsi Proses Pengadaan</small>
                                                </th>
                                            </tr>
                                        </thead>
                                        <thead>
                                            <tr>
                                                <th class="text-center bg-secondary text-white" scope="col">
                                                    <small>Jenis Pengadaan</small>
                                                </th>
                                                <th class="text-center bg-secondary text-white" scope="col">
                                                    <small>Metode Pengadaan</small>
                                                </th>
                                                <th class="text-center bg-secondary text-white" scope="col">
                                                    <small>Jenis Anggaran</small>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <small>
                                                        <div class="input-group mb-2">
                                                            <span class="input-group-text"><i class="fa-solid fa-briefcase"></i></span>
                                                            <select name="id_jenis_pengadaan" class="form-control select2bs4">
                                                                <option value="<?= $row_rup['id_jenis_pengadaan'] ?>"><?= $row_rup['nama_jenis_pengadaan'] ?></option>
                                                                <?php foreach ($result_jenis_pengadaan as $key => $value) { ?>
                                                                    <option value="<?= $value['id_jenis_pengadaan'] ?>"><?= $value['nama_jenis_pengadaan'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <!-- id_jenis_pengadaan -->
                                                        <small class="text-danger id_jenis_pengadaan_validation"></small>
                                                        <small>
                                                </td>
                                                <td>
                                                    <small>
                                                        <div class="input-group mb-2">
                                                            <span class="input-group-text"><i class="fa-solid fa-business-time"></i></span>
                                                            <select name="id_metode_pengadaan" class="form-control select2bs4">
                                                                <option value="<?= $row_rup['id_metode_pengadaan'] ?>"><?= $row_rup['nama_metode_pengadaan'] ?></option>
                                                                <?php foreach ($result_metode_pengadaan as $key => $value) { ?>
                                                                    <option value="<?= $value['id_metode_pengadaan'] ?>"><?= $value['nama_metode_pengadaan'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <!-- id_metode_pengadaan -->
                                                        <small class="text-danger id_metode_pengadaan_validation"></small>
                                                        <small>
                                                </td>
                                                <td>
                                                    <small>
                                                        <div class="input-group mb-2">
                                                            <span class="input-group-text"><i class="fa-solid fa-money-bill-transfer"></i></span>
                                                            <select name="id_jenis_anggaran" onchange="pilih_jenis_anggaran()" class="form-control select2bs4">
                                                                <option value="<?= $row_rup['id_jenis_anggaran'] ?>"><?= $row_rup['nama_jenis_anggaran'] ?></option>
                                                                <?php foreach ($result_jenis_anggaran as $key => $value) { ?>
                                                                    <option value="<?= $value['id_jenis_anggaran'] ?>"><?= $value['nama_jenis_anggaran'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <!-- id_jenis_anggaran -->
                                                        <small class="text-danger id_jenis_anggaran_validation"></small>
                                                        <small>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <small>Lokasi Pekerjaan</small>
                                </th>
                                <td colspan="3">
                                    <table class="table table-bordered table-sm shadow-lg">
                                        <thead>
                                            <tr>
                                                <th class="bg-primary text-white text-center" colspan="4">
                                                    <small>Deskripsi Lokasi Pekerjaan</small>
                                                </th>
                                            </tr>
                                        </thead>
                                        <thead>
                                            <tr>
                                                <th class="text-center bg-secondary text-white" scope="col">
                                                    <small>Provinsi</small>
                                                </th>
                                                <th class="text-center bg-secondary text-white" scope="col">
                                                    <small>Kabupaten / Kota</small>
                                                </th>
                                                <th class="text-center bg-secondary text-white" scope="col">
                                                    <small>Detail Lokasi</small>
                                                </th>
                                                <th class="text-center bg-secondary text-white" scope="col">
                                                    <small> Ruas</small>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="dynamic_field">
                                            <tr>
                                                <td>
                                                    <small>
                                                        <select name="id_provinsi" id="provinsitambah" class="form-control select2bs4" style="width: 100%;">
                                                            <option value="<?= $row_rup['id_provinsi'] ?>"><?= $row_rup['nama_provinsi'] ?></option>
                                                            <?php foreach ($provinsi as $key => $value) { ?>
                                                                <option value="<?= $value['id_provinsi'] ?>"><?= $value['nama_provinsi'] ?></option>
                                                            <?php  } ?>
                                                        </select>
                                                        <!-- id_provinsi -->
                                                        <small class="text-danger id_provinsi_validation"></small>
                                                        <small>
                                                </td>
                                                <td>
                                                    <small>
                                                        <select name="id_kabupaten" required id="kabupatentambah" class="form-control select2bs4">
                                                            <option value="<?= $row_rup['id_kabupaten'] ?>"><?= $row_rup['nama_kabupaten'] ?></option>
                                                        </select>
                                                        <!-- id_kabupaten -->
                                                        <small class="text-danger id_kabupaten_validation"></small>
                                                        <small>
                                                </td>
                                                <td>
                                                    <small>
                                                        <div class="input-group mb-2">
                                                            <span class="input-group-text"><i class="fa-solid fa-map-location-dot"></i></span>
                                                            <input type="text" name="detail_lokasi_rup" value="<?= $row_rup['detail_lokasi_rup'] ?>" class="form-control" placeholder="Detail Lokasi">
                                                        </div>
                                                        <!-- detail_lokasi_rup -->
                                                        <small class="text-danger detail_lokasi_rup_validation"></small>
                                                        <small>
                                                </td>
                                                <td class="text-center">
                                                    <button type="button" name="add" id="add" class="btn btn-success"><i class="fas fa-plus-square"></i></button> <br>
                                                    <!-- ruas_lokasi -->
                                                    <small class="text-danger ruas_lokasi_validation"></small>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot id="detail_ruas_rup">

                                        </tfoot>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <small>Kualifikasi Usaha & Jenis Produk </small>
                                </th>
                                <td>
                                    <small>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text"><i class="fa-solid fa-business-time"></i></span>
                                            <select name="kualifikasi_usaha" class="form-control select2bs4">
                                                <option value="<?= $row_rup['kualifikasi_usaha'] ?>"><?= $row_rup['kualifikasi_usaha'] ?></option>
                                                <option value="Besar">Besar</option>
                                                <option value="Menengah">Menengah</option>
                                                <option value="Kecil">Kecil</option>
                                            </select>
                                        </div>
                                        <!-- kualifikasi_usaha -->
                                        <small class="text-danger kualifikasi_usaha_validation"></small>
                                    </small>
                                </td>
                                <td>
                                    <small>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text"><i class="fa-solid fa-recycle"></i></span>
                                            <select name="jenis_produk" class="form-control select2bs4">
                                                <option value="<?= $row_rup['jenis_produk'] ?>"><?= $row_rup['jenis_produk'] ?></option>
                                                <option value="Menggunakan Produk Dalam Negri">Menggunakan Produk Dalam Negri</option>
                                                <option value="Menggunakan Produk Luar Negri"> Menggunakan Produk Luar Negri</option>
                                            </select>
                                        </div>
                                        <!-- jenis_produk -->
                                        <small class="text-danger jenis_produk_validation"></small>
                                    </small>
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <small>Status Pencatatan (TKDN/PDN/Import) </small>
                                </th>
                                <td>
                                    <small>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text"><i class="fa-solid fa-right-left"></i></span>
                                            <select name="status_pencatatan" class="form-control select2bs4">
                                                <option value="<?= $row_rup['status_pencatatan'] ?>"><?= $row_rup['status_pencatatan'] ?></option>
                                                <option value="TKDN">TKDN</option>
                                                <option value="PDN">PDN</option>
                                                <option value="IMPORT">IMPORT</option>
                                            </select>
                                        </div>
                                        <!-- status_pencatatan -->
                                        <small class="text-danger status_pencatatan_validation"></small>
                                    </small>
                                </td>
                                <td>
                                    <small>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text">%</span>
                                            <input name="persen_pencatatan" type="number" value="<?= $row_rup['persen_pencatatan'] ?>" class="form-control persen_pencatatan" placeholder="Persentase">
                                        </div>
                                        <!-- persen_pencatatan -->
                                        <small class="text-danger persen_pencatatan_validation"></small>
                                    </small>
                                    <small>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text">Rp.</span>
                                            <input id="nilai_pencatatan2" type="text" value="<?= "Rp " . number_format($row_rup['nilai_pencatatan']) ?>" class="form-control" placeholder="Nilai Pencatatan" readonly style="background-color: #ffffe0;">
                                            <input type="hidden" name="nilai_pencatatan">
                                        </div>
                                        <!-- persen_pencatatan -->
                                        <small class="text-danger persen_pencatatan_validation"></small>
                                    </small>
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <small>Jangka Waktu Pelaksanaan</small>
                                </th>
                                <td colspan="3">
                                    <table class="table table-bordered table-sm shadow-lg">
                                        <thead>
                                            <tr>
                                                <th class="bg-primary text-white text-center" colspan="3">
                                                    <small>Deskripsi Jangka Waktu Pelaksanaan</small>
                                                </th>
                                            </tr>
                                        </thead>
                                        <thead>
                                            <tr>
                                                <th class="text-center bg-secondary text-white" colspan="2">
                                                    <small>Tahun Jamak</small>
                                                </th>
                                                <th class="text-center bg-secondary text-white" scope="col">
                                                    <small>Jangka Waktu</small>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <small>
                                                        <div class="input-group mb-2">
                                                            <span class="input-group-text"><i class="fa-regular fa-calendar-days"></i></span>
                                                            <input onchange="hitung_hari()" value="<?= $row_rup['jangka_waktu_mulai_pelaksanaan'] ?>" name="jangka_waktu_mulai_pelaksanaan" type="date" class="form-control">
                                                        </div>
                                                        <!-- jangka_waktu_mulai_pelaksanaan -->
                                                        <small class="text-danger jangka_waktu_mulai_pelaksanaan_validation"></small>
                                                        <small>
                                                </td>
                                                <td>
                                                    <small>
                                                        <div class="input-group mb-2">
                                                            <span class="input-group-text"><i class="fa-regular fa-calendar-days"></i></span>
                                                            <input onchange="hitung_hari()" value="<?= $row_rup['jangka_waktu_selesai_pelaksanaan'] ?>" name="jangka_waktu_selesai_pelaksanaan" type="date" class="form-control">
                                                        </div>
                                                        <!-- jangka_waktu_selesai_pelaksanaan -->
                                                        <small class="text-danger jangka_waktu_selesai_pelaksanaan_validation"></small>
                                                        <small>
                                                </td>
                                                <td>
                                                    <small>
                                                        <div class="input-group mb-2">
                                                            <span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
                                                            <input type="number" value="<?= $row_rup['jangka_waktu_hari_pelaksanaan'] ?>" name="jangka_waktu_hari_pelaksanaan" class="form-control" placeholder="360">
                                                            <span class="input-group-text">Hari</span>
                                                        </div>
                                                        <!-- jangka_waktu_hari_pelaksanaan -->
                                                        <small class="text-danger jangka_waktu_hari_pelaksanaan_validation"></small>
                                                        <small>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">
                                    <small>Sumber Dana</small>
                                </th>
                                <td colspan="3">
                                    <table class="table table-bordered table-sm shadow-lg">
                                        <thead>
                                            <tr>
                                                <th class="bg-primary text-white text-center" colspan="3">
                                                    <small>Deskripsi Sumber Dana</small>
                                                </th>
                                            </tr>
                                        </thead>
                                        <thead>
                                            <tr>
                                                <th class="text-center bg-secondary text-white" scope="col">
                                                    <small>Departemen</small>
                                                </th>
                                                <th class="text-center bg-secondary text-white" scope="col">
                                                    <small>Total Pagu RKAP</small>
                                                </th>
                                                <th class="text-center bg-secondary text-white" scope="col">
                                                    <small>Total Pagu RUP</small>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php if ($get_row_rkap) { ?>
                                                    <td>
                                                        <small>
                                                            <div class="input-group mb-2">
                                                                <span class="input-group-text"><i class="fa-solid fa-building-columns"></i></span>
                                                                <input type="text" name="sumber_dana_anggaran" value="<?= $get_row_rkap['nama_departemen'] ?>" class="form-control" placeholder="Departemen" readonly style="background-color: #ffffe0;">
                                                            </div>
                                                            <small>
                                                    </td>
                                                    <td>
                                                        <small>
                                                            <div class="input-group mb-2">
                                                                <span class="input-group-text">Rp.</span>
                                                                <input type="text" value="<?= "Rp " . number_format($get_row_rkap['total_pagu_rkap']) ?>" class="form-control" placeholder="0" readonly style="background-color: #ffffe0;">
                                                            </div>
                                                            <small>
                                                    </td>
                                                <?php  } else { ?>
                                                    <td>
                                                        <small>
                                                            <div class="input-group mb-2">
                                                                <span class="input-group-text"><i class="fa-solid fa-building-columns"></i></span>
                                                                <input type="text" class="form-control" value="<?= $row_rup['nama_departemen'] ?>" name="sumber_dana_anggaran" placeholder="Departemen" readonly style="background-color: #ffffe0;">
                                                            </div>
                                                            <!-- sumber_dana_anggaran -->
                                                            <small class="text-danger sumber_dana_anggaran_validation"></small>
                                                            <small>
                                                    </td>
                                                    <td>
                                                        <small>
                                                            <div class="input-group mb-2">
                                                                <span class="input-group-text">Rp.</span>
                                                                <input type="text" class="form-control" placeholder="0" readonly style="background-color: #ffffe0;">
                                                            </div>
                                                            <small>
                                                    </td>
                                                <?php }
                                                ?>
                                                <td>
                                                    <small>
                                                        <div class="input-group mb-2">
                                                            <span class="input-group-text">Rp.</span>
                                                            <input type="number" value="<?= $row_rup['total_pagu_rup'] ?>" name="total_pagu_rup" class="form-control total_pagu_rup">
                                                            <span class="input-group-text"><i class="fa-solid fa-money-bill"></i></span>
                                                            <input type="text" value="<?= "Rp " . number_format($row_rup['total_pagu_rup']); ?>" id="rupiah_total_pagu_rup" class="form-control" readonly style="background-color: #ffffe0;">
                                                        </div>
                                                        <!-- total_pagu_rup -->
                                                        <small class="text-danger total_pagu_rup_validation"></small>
                                                        <small>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="card-footer bg-transparent border-dark">
                    <a href="javascript:;" onclick="Simpan_rup()" class="btn btn-default btn-success">
                        <i class="fa-solid fa-floppy-disk px-1"></i>
                        Simpan Data RUP
                    </a>
                    <a href="<?= base_url('administrator/Sirup_rup') ?>" class="btn btn-default btn-warning" onclick="history.back()">
                        <i class="fa-solid fa-angles-left px-1"></i>
                        Kembali Kemenu Sebelumnya
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modal_update_ruas" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">EDIT RUAS</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">UBAH RUAS</label><br>
                        <input type="text" class="form-control" readonly id="nama_ruas_manipulasi"><br>
                        <input type="hidden" name="id_ruas_rup_manipulasi" class="form-control" id="id_ruas_rup_manipulasi"><br>
                        <select name="id_ruas_manipulasi" class="form-control">
                            <option>-- Ubah Ruas --</option>
                            <?php foreach ($ruas_lokasi as $key => $value) { ?>
                                <option value="<?= $value['id_ruas'] ?>"><?= $value['nama_ruas'] ?></option>
                            <?php  } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="javascript:;" onclick="update_ruas()" class="btn btn-primary">Save</a>
                </div>
            </div>
        </div>
    </div>
</main>