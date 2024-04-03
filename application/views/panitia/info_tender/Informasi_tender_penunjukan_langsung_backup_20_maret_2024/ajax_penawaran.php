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

                    if (response['row_vendor_mengikuti']['file1_teknis']) {
                        var file1_teknis = `<a target="_blank" href="${response.link_vendor + 'file_paket/' + response['rup'].nama_rup + '/' + response['row_vendor_mengikuti'].nama_usaha + '/' + 'DOKUMEN_PENGADAAN_FILE_I' + '/' + response['row_vendor_mengikuti'].file1_teknis}" class="btn btn-sm btn-success text-white"><i class="fa fa-file"></i> Buka</a>`
                        var btn_file1_teknis = `<a href="javascript:;" onclick="upload_file1(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_teknis')" class="btn btn-sm btn-warning text-white"><i class="fa fa-upload"></i> Ubah</a>`
                        var file1_teknis_sts_validasi = `<select name="file1_teknis_sts" onchange="validasi(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_teknis_sts')" class="form-control">
                                <option value="">--Pilih--</option>
                                <option value="3">Tidak Diperlukan</option>
                                <option value="1">Sesuai</option>
                                <option value="2">Tidak Sesuai</option>
                            </select>`
                    } else {
                        var file1_teknis = `<span class="badge bg-danger">Tidak Di Upload</span>`
                        var btn_file1_teknis = `<a href="javascript:;" onclick="upload_file1(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_teknis')" class="btn btn-sm btn-danger"><i class="fa fa-upload"></i> Upload</a>`
                        var file1_teknis_sts_validasi = `<select name="file1_teknis_sts" onchange="validasi(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file1_teknis_sts')" class="form-control">
                                <option value="">--Pilih--</option>
                                <option value="3">Tidak Diperlukan</option>
                                <option value="1">Sesuai</option>
                                <option value="2">Tidak Sesuai</option>
                            </select>`
                    }

                    if (response['row_vendor_mengikuti']['file2_penawaran']) {
                        var file2_penawaran = `<a target="_blank" href="${response.link_vendor + 'file_paket/' + response['rup'].nama_rup + '/' + response['row_vendor_mengikuti'].nama_usaha + '/' + 'DOKUMEN_PENGADAAN_FILE_II' + '/' + response['row_vendor_mengikuti'].file2_penawaran}" class="btn btn-sm btn-success text-white"><i class="fa fa-file"></i> Buka</a>`
                        var btn_file2_penawaran = `<a href="javascript:;" onclick="upload_file2(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file2_penawaran')" class="btn btn-sm btn-warning text-white"><i class="fa fa-upload"></i> Ubah</a>`
                        var file2_penawaran_sts_validasi = `<select name="file2_penawaran_sts" onchange="validasi(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file2_penawaran_sts')" class="form-control">
                                <option value="">--Pilih--</option>
                                <option value="3">Tidak Diperlukan</option>
                                <option value="1">Sesuai</option>
                                <option value="2">Tidak Sesuai</option>
                            </select>`
                    } else {
                        var file2_penawaran = `<span class="badge bg-danger">Tidak Di Upload</span>`
                        var btn_file2_penawaran = `<a href="javascript:;" onclick="upload_file2(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file2_penawaran')" class="btn btn-sm btn-danger"><i class="fa fa-upload"></i> Upload</a>`
                        var file2_penawaran_sts_validasi = `<select name="file2_penawaran_sts" onchange="validasi(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file2_penawaran_sts')" class="form-control">
                                <option value="">--Pilih--</option>
                                <option value="3">Tidak Diperlukan</option>
                                <option value="1">Sesuai</option>
                                <option value="2">Tidak Sesuai</option>
                            </select>`
                    }

                    if (response['row_vendor_mengikuti']['file2_dkh']) {
                        var file2_dkh = `<a target="_blank" href="${response.link_vendor + 'file_paket/' + response['rup'].nama_rup + '/' + response['row_vendor_mengikuti'].nama_usaha + '/' + 'DOKUMEN_PENGADAAN_FILE_II' + '/' + response['row_vendor_mengikuti'].file2_dkh}" class="btn btn-sm btn-success text-white"><i class="fa fa-file"></i> Buka</a>`
                        var btn_file2_dkh = `<a target="_blank" href="javascript:;" onclick="upload_file2(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file2_dkh')" class="btn btn-sm btn-warning text-white"><i class="fa fa-upload"></i> Ubah</a>`
                        var file2_dkh_sts_validasi = `<select name="file2_dkh_sts" onchange="validasi(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file2_dkh_sts')" class="form-control">
                                <option value="">--Pilih--</option>
                                <option value="3">Tidak Diperlukan</option>
                                <option value="1">Sesuai</option>
                                <option value="2">Tidak Sesuai</option>
                            </select>`
                    } else {
                        var file2_dkh = `<span class="badge bg-danger">Tidak Di Upload</span>`
                        var btn_file2_dkh = `<a href="javascript:;" onclick="upload_file2(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file2_dkh')" class="btn btn-sm btn-danger"><i class="fa fa-upload"></i> Upload</a>`
                        var file2_dkh_sts_validasi = `<select name="file2_dkh_sts" onchange="validasi(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file2_dkh_sts')" class="form-control">
                                <option value="">--Pilih--</option>
                                <option value="3">Tidak Diperlukan</option>
                                <option value="1">Sesuai</option>
                                <option value="2">Tidak Sesuai</option>
                            </select>`
                    }

                    if (response['row_vendor_mengikuti']['file2_tkdn']) {
                        var file2_tkdn = `<a target="_blank" href="${response.link_vendor + 'file_paket/' + response['rup'].nama_rup + '/' + response['row_vendor_mengikuti'].nama_usaha + '/' + 'DOKUMEN_PENGADAAN_FILE_II' + '/' + response['row_vendor_mengikuti'].file2_tkdn}" class="btn btn-sm btn-success text-white"><i class="fa fa-file"></i> Buka</a>`
                        var btn_file2_tkdn = `<a target="_blank" href="javascript:;" onclick="upload_file2(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file2_tkdn')" class="btn btn-sm btn-warning text-white"><i class="fa fa-upload"></i> Ubah</a>`
                        var file2_tkdn_sts_validasi = `<select name="file2_tkdn_sts" onchange="validasi(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file2_tkdn_sts')" class="form-control">
                            <option value="">--Pilih--</option>
                            <option value="3">Tidak Diperlukan</option>
                            <option value="1">Sesuai</option>
                            <option value="2">Tidak Sesuai</option>
                        </select>`
                    } else {
                        var file2_tkdn = `<span class="badge bg-danger">Tidak Di Upload</span>`
                        var btn_file2_tkdn = `<a href="javascript:;" onclick="upload_file2(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file2_tkdn')" class="btn btn-sm btn-danger"><i class="fa fa-upload"></i> Upload</a>`
                        var file2_tkdn_sts_validasi = `<select name="file2_tkdn_sts" onchange="validasi(${response['row_vendor_mengikuti']['id_vendor_mengikuti_paket']},'file2_tkdn_sts')" class="form-control">
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
                                <td>${file1_teknis}</td>
                                <td>${file1_teknis_sts_validasi}</td>
                            </tr>
                            <tr>
                                <td>3. Dokumen Penawaran Harga</td>
                                <td>${file2_penawaran}</td>
                                <td>${file2_penawaran_sts_validasi}</td>
                              </tr>
                              <tr>
                                <td>4. File DKH</td>
                                <td>${file2_dkh}</td>
                                <td>${file2_dkh_sts_validasi}</td>
                              </tr>
                              <tr>
                                <td>5. File TKDN</td>
                                <td>${file2_tkdn}</td>
                                <td>${file2_tkdn_sts_validasi}</td>
                              </tr>`
                    $('#load_detail_file1').html(html)
                    $('[name="file1_administrasi_sts"]').val(response['row_vendor_mengikuti'].file1_administrasi_sts)
                    $('[name="file1_teknis_sts"]').val(response['row_vendor_mengikuti'].file1_teknis_sts)
                    $('[name="file2_penawaran_sts"]').val(response['row_vendor_mengikuti'].file2_penawaran_sts)
                    $('[name="file2_dkh_sts"]').val(response['row_vendor_mengikuti'].file2_dkh_sts)
                    $('[name="file2_tkdn_sts"]').val(response['row_vendor_mengikuti'].file2_tkdn_sts)
                }

            }
        })
    }

    function validasi(id_vendor_mengikuti_paket, name) {
        if (name == 'file1_administrasi_sts') {
            var value_name = $('[name="file1_administrasi_sts"]').val()
        } else if (name == 'file1_teknis_sts') {
            var value_name = $('[name="file1_teknis_sts"]').val()
        } else if (name == 'file2_penawaran_sts') {
            var value_name = $('[name="file2_penawaran_sts"]').val()
        } else if (name == 'file2_dkh_sts') {
            var value_name = $('[name="file2_dkh_sts"]').val()
        } else if (name == 'file2_tkdn_sts') {
            var value_name = $('[name="file2_tkdn_sts"]').val()
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