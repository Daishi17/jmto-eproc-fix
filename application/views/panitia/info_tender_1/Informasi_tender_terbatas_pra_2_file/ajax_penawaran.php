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
                    $(document).ready(function() {
                        $('#table_dokumen_penawaran_file_I_vendor').DataTable({
                            "responsive": false,
                            "ordering": true,
                            "processing": true,
                            "serverSide": true,
                            "autoWidth": false,
                            "bDestroy": true,
                            initComplete: function() {
                                this.api().buttons().container().appendTo($('.col-md-6:eq(0)', this.api().table().container()));
                            },
                            "order": [],
                            "ajax": {
                                "url": '<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_dokumen_penawaran_file_I_vendor') ?>',
                                "type": "POST",
                                data: {
                                    id_vendor: response['row_vendor_mengikuti'].id_vendor,
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
                } else {
                    $('#buka_penawaran2').modal('show')
                    $('.nama_usaha_vendor').text(response['row_vendor_mengikuti'].nama_usaha)
                    $(document).ready(function() {
                        $('#table_dokumen_penawaran_file_II_vendor').DataTable({
                            "responsive": false,
                            "ordering": true,
                            "processing": true,
                            "serverSide": true,
                            "autoWidth": false,
                            "bDestroy": true,
                            initComplete: function() {
                                this.api().buttons().container().appendTo($('.col-md-6:eq(0)', this.api().table().container()));
                            },
                            "order": [],
                            "ajax": {
                                "url": '<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_dokumen_penawaran_file_II_vendor') ?>',
                                "type": "POST",
                                data: {
                                    id_vendor: response['row_vendor_mengikuti'].id_vendor,
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
                }

            }
        })
    }
</script>