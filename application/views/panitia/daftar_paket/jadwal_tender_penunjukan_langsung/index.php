<main class="container-fluid">
    <input type="hidden" name="id_rup_global" value="<?= $row_rup['id_rup'] ?>">
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <form action="javascript:;" id="form_jadwal_tender_penunjukan_langsung">
                            <div class="card" style="position: fixed; top:100px;z-index:999;width:95%;">
                                <div class="card border-dark">
                                    <div class="card-header border-dark bg-primary">
                                        <h6 class="card-title">
                                            <span class="text-white">
                                                <i class="fa-solid fa-business-time"></i>
                                                <small><strong>Jadwal <?= $row_rup['nama_jadwal_pengadaan'] ?></strong></small>
                                            </span>
                                        </h6>
                                    </div>
                                </div>
                                <style>
                                    #header-fixed {
                                        position: fixed;
                                        top: 0px;
                                        display: none;
                                        background-color: white;
                                    }
                                </style>
                                <center>
                                    <a style="margin-top: -20;" href="<?= base_url('panitia/daftar_paket/daftar_paket/form_daftar_paket/') . $row_rup['id_url_rup'] ?>" class="btn btn-danger mb-2"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali</a>

                                    <?php if ($row_rup['status_paket_diumumkan'] == 1) { ?>
                                        <?php if ($cek_ada_prubahan_jadwal) { ?>
                                            <button style="margin-top: -20;" type="submit" class="btnSave mb-2 btn btn-success">Update Jadwal</button>
                                        <?php } else { ?>
                                            <button style="margin-top: -20;" disabled type="submit" class="mb-2 btn btn-success">Update Jadwal</button>
                                        <?php  } ?>
                                    <?php  } else { ?>
                                        <button style="margin-top: -20;" type="submit" class="btnSave mb-2 btn btn-success">Update Jadwal</button>
                                        <button style="margin-top: -20;" type="button" class="mb-2 btn btn-warning" title="Ambil Jadwal Dari Paket Yang Lain" data-bs-toggle="modal" data-bs-target="#modal_copy_jadwal">Ambil Jadwal</button>
                                    <?php  } ?>
                                </center>
                            </div>
                            <input type="hidden" name="id_url_rup" id="id_url_rup" value="<?= $row_rup['id_url_rup'] ?>">

                            <table id="table_jadwal" class="table table-hover">
                                <thead>
                                    <tr class="btn-grad100">
                                        <th>No</th>
                                        <th>Nama Jadwal</th>
                                        <th>Tanggal & Jam Mulai</th>
                                        <th>Tanggal & Jam Selesai</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    $mulai_detail = 1;
                                    $selesai_detail = 1;
                                    $erorr_detail = 1;
                                    $bener_detail = 1;
                                    $erorrtext_detail = 1;
                                    $benertext_detail = 1;
                                    $erorr_row_detail = 1;
                                    $name_jadwal_detail = 1;
                                    $i = 1;
                                    foreach ($jadwal as  $value2) { ?>
                                        <tr id="erorr_jadwal_row<?= $erorr_row_detail++ ?>">
                                            <td><?= $no++ ?><input type="hidden" name="id_jadwal_rup[<?= $i ?>]" value="<?= $value2['id_jadwal_rup'] ?>"> </td>
                                            <td><?= $value2['nama_jadwal_rup'] ?></td>
                                            <div class="alert alert-danger" style="display: none;" role="alert">
                                                Jadwal <?= $value2['nama_jadwal_rup'] ?> Belum Benar Mengisinya
                                            </div>
                                            <div class="alert alert-success" style="display: none;" role="alert">
                                                Jadwal <?= $value2['nama_jadwal_rup'] ?> Sudah Benar
                                            </div>
                                            <?php if ($row_rup['status_paket_diumumkan'] == 1) { ?>
                                                <?php if ($value2['sts_perubahan_jadwal'] == 1) { ?>
                                                    <td><input class="form-control form-control-sm" name="waktu_mulai[<?= $i ?>]" id="mulai<?= $mulai_detail++ ?>" value="<?= date('Y-m-d H:i', strtotime($value2['waktu_mulai'])) ?>" type="text"></td>
                                                    <td><input class="form-control form-control-sm" name="waktu_selesai[<?= $i ?>]" id="selesai<?= $selesai_detail++ ?>" value="<?= $value2['waktu_selesai']  ?>" type="text"></td>
                                                <?php } else { ?>
                                                    <td><input class="form-control form-control-sm" name="waktu_mulai[<?= $i ?>]" value="<?= $value2['waktu_mulai'] ?>" type="text" style="background-color: #e9e9e9;" readonly></td>
                                                    <td><input class="form-control form-control-sm" name="waktu_selesai[<?= $i ?>]" value="<?= $value2['waktu_selesai']  ?>" type="text" style="background-color: #e9e9e9;" readonly></td>
                                                <?php  } ?>

                                                <td>
                                                    <?php if ($value2['waktu_mulai'] == '' && $value2['waktu_selesai'] == '') { ?>
                                                        <?php if ($i == 1) { ?>
                                                            <a href="javascript:;" title="Tambah Waktu +1 Hari" onclick="plus_jadwal_22_baris(<?= $value2['id_jadwal_rup'] ?>)" class="btn btn-sm btn-primary">+</a>
                                                        <?php  } else { ?>
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <?php if ($i == 1) { ?>
                                                            <button title="Sedang Berlangsung" disabled class="btn btn-sm btn-primary">+</button>
                                                        <?php  } else { ?>
                                                            <button title="Sedang Berlangsung" disabled class="btn btn-sm btn-primary">+</button>
                                                            <button title="Sedang Berlangsung" disabled class="btn btn-sm btn-primary">-</button>
                                                        <?php } ?>
                                                    <?php   } ?>

                                                    <?php if ($role_panitia['role_panitia'] == 1 || $role_panitia['role_panitia'] == 2) { ?>
                                                        <a href="javascript:;" title="Edit Jadwal" onclick="edit_jadwal(<?= $value2['id_jadwal_rup'] ?>)" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                        <?php if ($value2['sts_perubahan_jadwal'] == 2) { ?>
                                                            <a href="javascript:;" title="Acc Permintaan Ubah Jadwal" onclick="acc_jadwal(<?= $value2['id_jadwal_rup'] ?>)" class="btn btn-success"><i class="fa fa-check"></i></a>
                                                        <?php }  ?>
                                                    <?php  } else { ?>
                                                        <?php if ($value2['sts_perubahan_jadwal'] == 2) { ?>
                                                            <a href="javascript:;" title="Menunggu Perubahan" onclick="edit_jadwal(<?= $value2['id_jadwal_rup'] ?>)" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                        <?php } else { ?>
                                                            <a href="javascript:;" title="Edit Jadwal" onclick="edit_jadwal(<?= $value2['id_jadwal_rup'] ?>)" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                        <?php } ?>
                                                    <?php   }  ?>


                                                </td>

                                            <?php } else { ?>
                                                <td><input class="form-control form-control-sm" name="waktu_mulai[<?= $i ?>]" id="mulai<?= $mulai_detail++ ?>" value="<?= $value2['waktu_mulai'] ?>" type="text"></td>
                                                <td><input class="form-control form-control-sm" name="waktu_selesai[<?= $i ?>]" id="selesai<?= $selesai_detail++ ?>" value="<?= $value2['waktu_selesai']  ?>" type="text"></td>
                                                <td>
                                                    <?php if ($value2['waktu_mulai'] == '' && $value2['waktu_selesai'] == '') { ?>
                                                        <?php if ($i == 1) { ?>
                                                            <a href="javascript:;" title="Tambah Waktu +1 Hari" onclick="plus_jadwal_22_baris(<?= $value2['id_jadwal_rup'] ?>)" class="btn btn-sm btn-primary">+</a>
                                                        <?php  } else { ?>
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <?php if ($i == 1) { ?>
                                                            <a href="javascript:;" title="Tambah Waktu +1 Hari" onclick="plus_jadwal_22_baris(<?= $value2['id_jadwal_rup'] ?>)" class="btn btn-sm btn-primary">+</a>
                                                        <?php  } else { ?>
                                                            <a href="javascript:;" title="Tambah Waktu +1 Hari" onclick="plus_jadwal_22_baris(<?= $value2['id_jadwal_rup'] ?>)" class="btn btn-sm btn-primary">+</a>
                                                            <a href="javascript:;" title="Kurang Waktu -1 Hari" onclick="min_jadwal_22_baris(<?= $value2['id_jadwal_rup'] ?>)" class="btn btn-sm btn-primary">-</a>
                                                        <?php } ?>
                                                    <?php   } ?>
                                                </td>
                                            <?php } ?>



                                        </tr>
                                        <?php $i++ ?>
                                    <?php  } ?>
                                </tbody>
                            </table>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <div class="modal fade" id="modal_ubah_jadwal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="navbar-brand">
                        <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
                        <b><span class="text-primary">Jasamarga Tollroad Operator</span></b>
                    </a>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <input type="hidden" name="url_ubah_jadwal" value="<?= base_url('post_jadwal/post_jadwal/ubah_jadwal') ?>">

                <form id="form_ubah_jadwal" action="javascript:;">
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                                <div class="flex-grow-1 bd-highlight">
                                    <span class="text-dark">
                                        <small class="text-white">
                                            <strong><i class="fa-solid fa-edit px-1"></i>
                                                Form Ubah Jadwal
                                            </strong>
                                        </small>
                                    </span>
                                </div>
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="id_jadwal_rup">
                                <input type="hidden" name="id_rup_cek" value="<?= $row_rup['id_rup'] ?>">
                                <div class=" mb-3" style="margin-top: -10px;">
                                    <label for="" class="form-label">Alasan Mengubah Jadwal</label>
                                    <br>
                                    <textarea name="alasan" cols="10" rows="3" class="form-control"></textarea>
                                    <label for="" id="alasan" class="text-danger"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success" id="btn_save_jadwal">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modal_acc_jadwal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="navbar-brand">
                        <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
                        <b><span class="text-primary">Jasamarga Tollroad Operator</span></b>
                    </a>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <input type="hidden" name="url_acc_jadwal" value="<?= base_url('post_jadwal/post_jadwal/acc_jadwal') ?>">

                <form id="form_acc_jadwal" action="javascript:;">
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                                <div class="flex-grow-1 bd-highlight">
                                    <span class="text-dark">
                                        <small class="text-white">
                                            <strong><i class="fa-solid fa-edit px-1"></i>
                                                Form Ubah Jadwal
                                            </strong>
                                        </small>
                                    </span>
                                </div>
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="id_jadwal_rup">
                                <input type="hidden" name="id_rup_cek" value="<?= $row_rup['id_rup'] ?>">
                                <div class=" mb-3" style="margin-top: -10px;">
                                    <label for="" class="form-label">Alasan Mengubah Jadwal</label>
                                    <br>
                                    <textarea name="alasan_ubah" cols="10" rows="3" class="form-control" disabled></textarea>
                                    <label for="" id="alasan" class="text-danger"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success" id="btn_save_jadwal">Terima</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_copy_jadwal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="navbar-brand">
                        <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
                        <b><span class="text-primary">Jasamarga Tollroad Operator</span></b>
                    </a>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <input type="hidden" name="url_copy_jadwal" value="<?= base_url('post_jadwal/post_jadwal/copy_jadwal') ?>">

                <form id="form_ambil_jadwal_jadwal" action="javascript:;">
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                                <div class="flex-grow-1 bd-highlight">
                                    <span class="text-dark">
                                        <small class="text-white">
                                            <strong><i class="fa-solid fa-edit px-1"></i>
                                                Form Copy Jadwal
                                            </strong>
                                        </small>
                                    </span>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- <input type="hidden" name="id_jadwal_rup"> -->
                                <input type="hidden" name="id_rup_cek_copy" value="<?= $row_rup['id_rup'] ?>">
                                <h6 for="">Silahkan Pilih Nama Paket Yang Ingin Di Copy Jadwal</h6>
                                <br>
                                <select name="id_rup_copy_jawdal" class="form-control">
                                    <?php foreach ($paket_juksung as $key => $value) { ?>
                                        <option value="<?= $value['id_rup'] ?>"><?= $value['nama_rup'] ?></option>
                                    <?php } ?>
                                </select>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success" id="btn_save_jadwal">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>