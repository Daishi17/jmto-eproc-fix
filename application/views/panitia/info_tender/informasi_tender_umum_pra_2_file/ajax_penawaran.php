<script>
    $(document).ready(function() {
        var id_rup = $('[name="id_rup"]').val()
        $('#table_vendor_mengikuti_paket').DataTable({
            "responsive": false,
            "ordering": true,
            "processing": true,
            "serverSide": true,
            "autoWidth": false,
            "bDestroy": true,
            "buttons": ["excel", "pdf", "print", "colvis"],
            initComplete: function() {
                this.api().buttons().container().appendTo($('.col-md-6:eq(0)', this.api().table().container()));
            },
            "order": [],
            "ajax": {
                "url": '<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_vendor_mengikuti_paket_penawaran') ?>',
                "type": "POST",
                data: {
                    id_rup: id_rup
                }
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

    function reload_table_vendor_mengikuti_paket() {
        $('#table_vendor_mengikuti_paket').DataTable().ajax.reload();
    }



    $(document).ready(function() {
        var id_rup = $('[name="id_rup"]').val()
        $('#table_vendor_mengikuti_paket_penawaran_II').DataTable({
            "responsive": false,
            "ordering": true,
            "processing": true,
            "serverSide": true,
            "autoWidth": false,
            "bDestroy": true,
            "buttons": ["excel", "pdf", "print", "colvis"],
            initComplete: function() {
                this.api().buttons().container().appendTo($('.col-md-6:eq(0)', this.api().table().container()));
            },
            "order": [],
            "ajax": {
                "url": '<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_vendor_mengikuti_paket_penawaran_file_II') ?>',
                "type": "POST",
                data: {
                    id_rup: id_rup
                }
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

    function reload_table_vendor_mengikuti_paket_penawaran_II() {
        $('#table_vendor_mengikuti_paket_penawaran_II').DataTable().ajax.reload();
    }



    function byid_mengikuti(id_vendor_mengikuti_paket, type) {
        var url_byid_mengikuti = $('[name="url_byid_mengikuti"]').val()
        var id_rup = $('[name="id_rup"]').val()
        $.ajax({
            type: "GET",
            url: url_byid_mengikuti + id_vendor_mengikuti_paket,
            dataType: "JSON",
            success: function(response) {
                if (type == 'lihat_dokumen_penawaran_1') {
                    $('#buka_penawaran1').modal('show')
                    $('.nama_usaha_vendor').text(response['row_vendor_mengikuti'].nama_usaha)
                    var html = '';
                    if (response['row_vendor_mengikuti']['file1_administrasi']) {

                        var file1_administrasi = `<a target="_blank" href="${response.link_vendor + 'file_paket/' + response['rup'].nama_rup + '/' + response['row_vendor_mengikuti'].nama_usaha + '/' + 'DOKUMEN_PENGADAAN_FILE_I' + '/' + response['row_vendor_mengikuti'].file1_administrasi}" class="btn btn-sm btn-success text-white"><i class="fa fa-file"></i> Buka</a>`
                        var btn_file1_administrasi = `<a href="javascript:;" onclick="upload_file1(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_administrasi')" class="btn btn-sm btn-warning text-white"><i class="fa fa-upload"></i> Ubah</a>`
                        var file1_administrasi_sts_validasi = `<select name="file1_administrasi_sts" onchange="validasi(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_administrasi_sts')" class="form-control">
                                <option value="">--Pilih--</option>
                                <option value="3">Tidak Diperlukan</option>
                                <option value="1">Sesuai</option>
                                <option value="2">Tidak Sesuai</option>
                            </select>`
                    } else {
                        var file1_administrasi = `<span class="badge bg-danger">Tidak Di Upload</span>`
                        var btn_file1_administrasi = `<a href="javascript:;" onclick="upload_file1(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_administrasi')" class="btn btn-sm btn-danger"><i class="fa fa-upload"></i> Upload</a>`
                        var file1_administrasi_sts_validasi = `<select name="file1_administrasi_sts" onchange="validasi(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_administrasi_sts')" class="form-control">
                                <option value="">--Pilih--</option>
                                <option value="3">Tidak Diperlukan</option>
                                <option value="1">Sesuai</option>
                                <option value="2">Tidak Sesuai</option>
                            </select>`
                    }

                    if (response['row_vendor_mengikuti']['file1_organisasi']) {
                        var file1_organisasi = `<a target="_blank" href="${response.link_vendor + 'file_paket/' + response['rup'].nama_rup + '/' + response['row_vendor_mengikuti'].nama_usaha + '/' + 'DOKUMEN_PENGADAAN_FILE_I' + '/' + response['row_vendor_mengikuti'].file1_organisasi}" class="btn btn-sm btn-success text-white"><i class="fa fa-file"></i> Buka</a>`
                        var btn_file1_organisasi = `<a href="javascript:;" onclick="upload_file1(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_organisasi')" class="btn btn-sm btn-warning text-white"><i class="fa fa-upload"></i> Ubah</a>`

                        var file1_organisasi_sts_validasi = `<select name="file1_organisasi_sts" onchange="validasi(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_organisasi_sts')" class="form-control">
                                <option value="">--Pilih--</option>
                                <option value="3">Tidak Diperlukan</option>
                                <option value="1">Sesuai</option>
                                <option value="2">Tidak Sesuai</option>
                            </select>`
                    } else {
                        var file1_organisasi = `<span class="badge bg-danger">Tidak Di Upload</span>`
                        var btn_file1_organisasi = `<a href="javascript:;" onclick="upload_file1(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_organisasi')" class="btn btn-sm btn-danger"><i class="fa fa-upload"></i> Upload</a>`

                        var file1_organisasi_sts_validasi = `<select name="file1_organisasi_sts" onchange="validasi(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_organisasi_sts')" class="form-control">
                                <option value="">--Pilih--</option>
                                <option value="3">Tidak Diperlukan</option>
                                <option value="1">Sesuai</option>
                                <option value="2">Tidak Sesuai</option>
                            </select>`
                    }

                    if (response['row_vendor_mengikuti']['file1_pabrikan']) {
                        var file1_pabrikan = `<a target="_blank" href="${response.link_vendor + 'file_paket/' + response['rup'].nama_rup + '/' + response['row_vendor_mengikuti'].nama_usaha + '/' + 'DOKUMEN_PENGADAAN_FILE_I' + '/' + response['row_vendor_mengikuti'].file1_pabrikan}"  class="btn btn-sm btn-success text-white"><i class="fa fa-file"></i> Buka</a>`
                        var btn_file1_pabrikan = `<a href="javascript:;" onclick="upload_file1(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_pabrikan')" class="btn btn-sm btn-warning text-white"><i class="fa fa-upload"></i> Ubah</a>`


                        var file1_pabrikan_sts_validasi = `<select name="file1_pabrikan_sts" onchange="validasi(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_pabrikan_sts')" class="form-control">
                                <option value="">--Pilih--</option>
                                <option value="3">Tidak Diperlukan</option>
                                <option value="1">Sesuai</option>
                                <option value="2">Tidak Sesuai</option>
                            </select>`
                    } else {
                        var file1_pabrikan = `<span class="badge bg-danger">Tidak Di Upload</span>`
                        var btn_file1_pabrikan = `<a href="javascript:;" onclick="upload_file1(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_pabrikan')" class="btn btn-sm btn-danger"><i class="fa fa-upload"></i> Upload</a>`

                        var file1_pabrikan_sts_validasi = `<select name="file1_pabrikan_sts" onchange="validasi(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_pabrikan_sts')" class="form-control">
                                <option value="">--Pilih--</option>
                                <option value="3">Tidak Diperlukan</option>
                                <option value="1">Sesuai</option>
                                <option value="2">Tidak Sesuai</option>
                            </select>`
                    }

                    if (response['row_vendor_mengikuti']['file1_peralatan']) {
                        var file1_peralatan = `<a target="_blank" href="${response.link_vendor + 'file_paket/' + response['rup'].nama_rup + '/' + response['row_vendor_mengikuti'].nama_usaha + '/' + 'DOKUMEN_PENGADAAN_FILE_I' + '/' + response['row_vendor_mengikuti'].file1_peralatan}" class="btn btn-sm btn-success text-white"><i class="fa fa-file"></i> Buka</a>`
                        var btn_file1_peralatan = `<a href="javascript:;" onclick="upload_file1(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_peralatan')" class="btn btn-sm btn-warning text-white"><i class="fa fa-upload"></i> Ubah</a>`

                        var file1_peralatan_sts_validasi = `<select name="file1_peralatan_sts" onchange="validasi(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_peralatan_sts')" class="form-control">
                                <option value="">--Pilih--</option>
                                <option value="3">Tidak Diperlukan</option>
                                <option value="1">Sesuai</option>
                                <option value="2">Tidak Sesuai</option>
                            </select>`
                    } else {
                        var file1_peralatan = `<span class="badge bg-danger">Tidak Di Upload</span>`
                        var btn_file1_peralatan = `<a href="javascript:;" onclick="upload_file1(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_peralatan')" class="btn btn-sm btn-danger"><i class="fa fa-upload"></i> Upload</a>`

                        var file1_peralatan_sts_validasi = `<select name="file1_peralatan_sts" onchange="validasi(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_peralatan_sts')" class="form-control">
                                <option value="">--Pilih--</option>
                                <option value="3">Tidak Diperlukan</option>
                                <option value="1">Sesuai</option>
                                <option value="2">Tidak Sesuai</option>
                            </select>`
                    }

                    if (response['row_vendor_mengikuti']['file1_personil']) {
                        var file1_personil = `<a target="_blank" href="${response.link_vendor + 'file_paket/' + response['rup'].nama_rup + '/' + response['row_vendor_mengikuti'].nama_usaha + '/' + 'DOKUMEN_PENGADAAN_FILE_I' + '/' + response['row_vendor_mengikuti'].file1_personil}" class="btn btn-sm btn-success text-white"><i class="fa fa-file"></i> Buka</a>`
                        var btn_file1_personil = `<a href="javascript:;" onclick="upload_file1(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_personil')" class="btn btn-sm btn-warning text-white"><i class="fa fa-upload"></i> Ubah</a>`

                        var file1_personil_sts_validasi = `<select name="file1_personil_sts" onchange="validasi(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_personil_sts')" class="form-control">
                                <option value="">--Pilih--</option>
                                <option value="3">Tidak Diperlukan</option>
                                <option value="1">Sesuai</option>
                                <option value="2">Tidak Sesuai</option>
                            </select>`
                    } else {
                        var file1_personil = `<span class="badge bg-danger">Tidak Di Upload</span>`
                        var btn_file1_personil = `<a href="javascript:;" onclick="upload_file1(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_personil')" class="btn btn-sm btn-danger"><i class="fa fa-upload"></i> Upload</a>`

                        var file1_personil_sts_validasi = `<select name="file1_personil_sts" onchange="validasi(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_personil_sts')" class="form-control">
                                <option value="">--Pilih--</option>
                                <option value="3">Tidak Diperlukan</option>
                                <option value="1">Sesuai</option>
                                <option value="2">Tidak Sesuai</option>
                            </select>`
                    }

                    if (response['row_vendor_mengikuti']['file1_makalah_teknis']) {
                        var file1_makalah_teknis = `<a target="_blank" href="${response.link_vendor + 'file_paket/' + response['rup'].nama_rup + '/' + response['row_vendor_mengikuti'].nama_usaha + '/' + 'DOKUMEN_PENGADAAN_FILE_I' + '/' + response['row_vendor_mengikuti'].file1_makalah_teknis}" class="btn btn-sm btn-success text-white"><i class="fa fa-file"></i> Buka</a>`
                        var btn_file1_makalah_teknis = `<a href="javascript:;" onclick="upload_file1(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_makalah_teknis')" class="btn btn-sm btn-warning text-white"><i class="fa fa-upload"></i> Ubah</a>`

                        var file1_makalah_teknis_sts_validasi = `<select name="file1_makalah_teknis_sts" onchange="validasi(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_makalah_teknis_sts')" class="form-control">
                                <option value="">--Pilih--</option>
                                <option value="3">Tidak Diperlukan</option>
                                <option value="1">Sesuai</option>
                                <option value="2">Tidak Sesuai</option>
                            </select>`
                    } else {
                        var file1_makalah_teknis = `<span class="badge bg-danger">Tidak Di Upload</span>`
                        var btn_file1_makalah_teknis = `<a href="javascript:;" onclick="upload_file1(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_makalah_teknis')" class="btn btn-sm btn-danger"><i class="fa fa-upload"></i> Upload</a>`

                        var file1_makalah_teknis_sts_validasi = `<select name="file1_makalah_teknis_sts" onchange="validasi(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_makalah_teknis_sts')" class="form-control">
                                <option value="">--Pilih--</option>
                                <option value="3">Tidak Diperlukan</option>
                                <option value="1">Sesuai</option>
                                <option value="2">Tidak Sesuai</option>
                            </select>`
                    }

                    if (response['row_vendor_mengikuti']['file1_pra_rk3']) {
                        var file1_pra_rk3 = `<a target="_blank" href="${response.link_vendor + 'file_paket/' + response['rup'].nama_rup + '/' + response['row_vendor_mengikuti'].nama_usaha + '/' + 'DOKUMEN_PENGADAAN_FILE_I' + '/' + response['row_vendor_mengikuti'].file1_pra_rk3}" class="btn btn-sm btn-success text-white"><i class="fa fa-file"></i> Buka</a>`
                        var btn_file1_pra_rk3 = `<a href="javascript:;" onclick="upload_file1(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_pra_rk3')" class="btn btn-sm btn-warning text-white"><i class="fa fa-upload"></i> Ubah</a>`

                        var file1_pra_rk3_sts_validasi = `<select name="file1_pra_rk3_sts" onchange="validasi(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_pra_rk3_sts')" class="form-control">
                                <option value="">--Pilih--</option>
                                <option value="3">Tidak Diperlukan</option>
                                <option value="1">Sesuai</option>
                                <option value="2">Tidak Sesuai</option>
                            </select>`
                    } else {
                        var file1_pra_rk3 = `<span class="badge bg-danger">Tidak Di Upload</span>`
                        var btn_file1_pra_rk3 = `<a href="javascript:;" onclick="upload_file1(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_pra_rk3')" class="btn btn-sm btn-danger"><i class="fa fa-upload"></i> Upload</a>`

                        var file1_pra_rk3_sts_validasi = `<select name="file1_pra_rk3_sts" onchange="validasi(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_pra_rk3_sts')" class="form-control">
                                <option value="">--Pilih--</option>
                                <option value="3">Tidak Diperlukan</option>
                                <option value="1">Sesuai</option>
                                <option value="2">Tidak Sesuai</option>
                            </select>`
                    }

                    if (response['row_vendor_mengikuti']['file1_spek']) {
                        var file1_spek = `<a target="_blank" href="${response.link_vendor + 'file_paket/' + response['rup'].nama_rup + '/' + response['row_vendor_mengikuti'].nama_usaha + '/' + 'DOKUMEN_PENGADAAN_FILE_I' + '/' + response['row_vendor_mengikuti'].file1_spek}" class="btn btn-sm btn-success text-white"><i class="fa fa-file"></i> Buka</a>`
                        var btn_file1_spek = `<a href="javascript:;" onclick="upload_file1(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_spek')" class="btn btn-sm btn-warning text-white"><i class="fa fa-upload"></i> Ubah</a>`

                        var file1_spek_sts_validasi = `<select name="file1_spek_sts" onchange="validasi(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_spek_sts')" class="form-control">
                                <option value="">--Pilih--</option>
                                <option value="3">Tidak Diperlukan</option>
                                <option value="1">Sesuai</option>
                                <option value="2">Tidak Sesuai</option>
                            </select>`
                    } else {
                        var file1_spek = `<span class="badge bg-danger">Tidak Di Upload</span>`
                        var btn_file1_spek = `<a href="javascript:;" onclick="upload_file1(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_spek')" class="btn btn-sm btn-danger"><i class="fa fa-upload"></i> Upload</a>`


                        var file1_spek_sts_validasi = `<select name="file1_spek_sts" onchange="validasi(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_spek_sts')" class="form-control">
                                <option value="">--Pilih--</option>
                                <option value="3">Tidak Diperlukan</option>
                                <option value="1">Sesuai</option>
                                <option value="2">Tidak Sesuai</option>
                            </select>`
                    }

                    html += `<tr>
                                <td>1.&ensp;File Penawaran Administrasi</td>
                                <td>${file1_administrasi}</td>
                                <td>${file1_administrasi_sts_validasi}</td>
                            </tr>
                            <tr>
                                <td>2.&ensp;File Penawaran Teknis</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>&ensp;&ensp; a. Struktur Organisasi</td>
                                <td>${file1_organisasi}</td>
                                <td>${file1_organisasi_sts_validasi}</td>
                            </tr>
                            <tr>
                                <td>&ensp;&ensp; b. Surat Dukungan Pabrikan / Dealer</td>
                                <td>${file1_pabrikan}</td>
                                <td>${file1_pabrikan_sts_validasi}</td>
                            </tr>
                            <tr>
                                <td>&ensp;&ensp; c. Data Peralatan Pendukung Pekerjaan</td>
                                <td>${file1_peralatan}</td>
                                <td>${file1_peralatan_sts_validasi}</td>
                            </tr>
                            <tr>
                                <td>&ensp;&ensp; d. CV Personil</td>
                                <td>${file1_personil}</td>
                                <td>${file1_personil_sts_validasi}</td>
                            </tr>
                            <tr>
                                <td>&ensp;&ensp; e. Makalah Teknis Pekerjaan</td>
                                <td>${file1_makalah_teknis}</td>
                                <td>${file1_makalah_teknis_sts_validasi}</td>
                            </tr>
                            <tr>
                                <td>&ensp;&ensp; f. Dokumen Pra RK3-K dan HIRADC</td>
                                <td>${file1_pra_rk3}</td>
                                <td>${file1_pra_rk3_sts_validasi}</td>
                            </tr>
                            <tr>
                                <td>&ensp;&ensp; g. Dokumen Spesifikasi Perangkat (Khusus IT)</td>
                                <td>${file1_spek}</td>
                                <td>${file1_spek_sts_validasi}</td>
                            </tr>`
                    $('#load_detail_file1').html(html)
                    $('[name="file1_administrasi_sts"]').val(response['row_vendor_mengikuti'].file1_administrasi_sts)
                    $('[name="file1_organisasi_sts"]').val(response['row_vendor_mengikuti'].file1_organisasi_sts)
                    $('[name="file1_pabrikan_sts"]').val(response['row_vendor_mengikuti'].file1_pabrikan_sts)
                    $('[name="file1_peralatan_sts"]').val(response['row_vendor_mengikuti'].file1_peralatan_sts)
                    $('[name="file1_personil_sts"]').val(response['row_vendor_mengikuti'].file1_personil_sts)
                    $('[name="file1_makalah_teknis_sts"]').val(response['row_vendor_mengikuti'].file1_makalah_teknis_sts)
                    $('[name="file1_pra_rk3_sts"]').val(response['row_vendor_mengikuti'].file1_pra_rk3_sts)
                    $('[name="file1_spek_sts"]').val(response['row_vendor_mengikuti'].file1_spek_sts)
                } else {
                    $('#buka_penawaran2').modal('show')
                    $('.nama_usaha_vendor').text(response['row_vendor_mengikuti'].nama_usaha)
                    if (response['row_vendor_mengikuti']['file2_penawaran']) {
                        var file2_penawaran = `<a target="_blank" href="${response.link_vendor + 'file_paket/' + response['rup'].nama_rup + '/' + response['row_vendor_mengikuti'].nama_usaha + '/' + 'DOKUMEN_PENGADAAN_FILE_II' + '/' + response['row_vendor_mengikuti'].file2_penawaran}" class="btn btn-sm btn-success text-white"><i class="fa fa-file"></i> Buka</a>`
                        var btn_file2_penawaran = `<a href="javascript:;" onclick="upload_file2(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file2_penawaran')" class="btn btn-sm btn-warning text-white"><i class="fa fa-upload"></i> Ubah</a>`
                    } else {
                        var file2_penawaran = `<span class="badge bg-danger">Tidak Di Upload</span>`
                        var btn_file2_penawaran = `<a href="javascript:;" onclick="upload_file2(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file2_penawaran')" class="btn btn-sm btn-danger"><i class="fa fa-upload"></i> Upload</a>`
                    }

                    if (response['row_vendor_mengikuti']['file2_dkh']) {
                        var file2_dkh = `<a target="_blank" href="${response.link_vendor + 'file_paket/' + response['rup'].nama_rup + '/' + response['row_vendor_mengikuti'].nama_usaha + '/' + 'DOKUMEN_PENGADAAN_FILE_II' + '/' + response['row_vendor_mengikuti'].file2_dkh}" class="btn btn-sm btn-success text-white"><i class="fa fa-file"></i> Buka</a>`
                        var btn_file2_dkh = `<a target="_blank" href="javascript:;" onclick="upload_file2(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file2_dkh')" class="btn btn-sm btn-warning text-white"><i class="fa fa-upload"></i> Ubah</a>`
                    } else {
                        var file2_dkh = `<span class="badge bg-danger">Tidak Di Upload</span>`
                        var btn_file2_dkh = `<a href="javascript:;" onclick="upload_file2(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file2_dkh')" class="btn btn-sm btn-danger"><i class="fa fa-upload"></i> Upload</a>`
                    }

                    var html2 = '';
                    html2 += `<tr>
                                  <td>1. Dokumen Penawaran Harga</td>
                                  <td>${file2_penawaran}</td>
                                 
                              </tr>
                              <tr>
                                  <td>2. File DKH</td>
                                  <td>${file2_dkh}</td>
                                 
                              </tr>`
                    $('#load_dok_file2').html(html2)
                }

            }
        })
    }

    function validasi(id_vendor_mengikuti_paket, name) {
        if (name == 'file1_administrasi_sts') {
            var value_name = $('[name="file1_administrasi_sts"]').val()
        } else if (name == 'file1_organisasi_sts') {
            var value_name = $('[name="file1_organisasi_sts"]').val()
        } else if (name == 'file1_pabrikan_sts') {
            var value_name = $('[name="file1_pabrikan_sts"]').val()
        } else if (name == 'file1_peralatan_sts') {
            var value_name = $('[name="file1_peralatan_sts"]').val()
        } else if (name == 'file1_personil_sts') {
            var value_name = $('[name="file1_personil_sts"]').val()
        } else if (name == 'file1_makalah_teknis_sts') {
            var value_name = $('[name="file1_makalah_teknis_sts"]').val()
        } else if (name == 'file1_pra_rk3_sts') {
            var value_name = $('[name="file1_pra_rk3_sts"]').val()
        } else if (name == 'file1_spek_sts') {
            var value_name = $('[name="file1_spek_sts"]').val()
        }

        var url_simpan_status_file1 = $('[name="url_simpan_status_file1"]').val()
        $.ajax({
            type: "POST",
            url: url_simpan_status_file1,
            dataType: "JSON",
            data: {
                id_vendor_mengikuti_paket: id_vendor_mengikuti_paket,
                name: name,
                value_name: value_name
            },
            success: function(response) {
                Swal.fire('Data Berhasil Disimpan!', '', 'success')
            }
        })
    }
</script>