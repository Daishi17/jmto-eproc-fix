<script>
    var tbl_rekanan_terundang = $('#tbl_rekanan_terundang')
    var url_get_rekanan_terundang = $('[name="url_get_rekanan_terundang"').val()
    $(document).ready(function() {
        fill_datatable();

        function fill_datatable(sts_upload_dokumen = '', sts_dokumen_cek = '') {
            tbl_rekanan_terundang.DataTable({
                "responsive": false,
                "ordering": true,
                "processing": true,
                "serverSide": true,
                lengthMenu: [
                    [10, 25, 50, 100, 200, -1],
                    ['10 Rows', '25 Rows', '50 Rows', '100 Rows', '200 Rows', 'Back']
                ],
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'pdf',
                    text: ' PDF'
                }, {
                    extend: 'print',
                    text: ' Print'
                }, {
                    extend: 'excel',
                    exportOption: {
                        columns: [0, 1, 2, 3]
                    },
                    text: ' EXCEL'
                }, 'pageLength', 'colvis'],
                "order": [],
                "ajax": {
                    "url": url_get_rekanan_terundang,
                    "type": "POST",
                    data: {
                        sts_upload_dokumen: sts_upload_dokumen,
                        sts_dokumen_cek: sts_dokumen_cek
                    },
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
            }).buttons().container().appendTo('#tbl_rekanan_terundang .col-md-6:eq(0)');
        }
        // filtering select data per divisi dan per jenis pengadaan
        $('#filter').click(function() {
            var sts_upload_dokumen = $('#sts_upload_dokumen').val();
            var sts_dokumen_cek = $('#sts_dokumen_cek').val();
            if (sts_upload_dokumen != '' && sts_dokumen_cek != '') {
                tbl_rekanan_terundang.DataTable().destroy();
                fill_datatable(sts_upload_dokumen, sts_dokumen_cek);
            } else {
                Swal.fire('Kesalahan Filter!', '', 'warning')
                tbl_rekanan_terundang.DataTable().destroy();
                fill_datatable();
            }
        })
    });

    function Reload_table_rekanan_baru() {
        tbl_rekanan_terundang.DataTable().ajax.reload();
    }

    function byid_vendor(id_vendor, type) {
        if (type == 'lihat') {
            saveData = 'lihat';
        }
        if (type == 'undang') {
            saveData = 'undang';
        }
        if (type == 'pesan') {
            saveData = 'pesan';
        }
        var url_get_rekanan_terundang_by_id = $('[name="url_get_rekanan_terundang_by_id"]').val();
        var modal_pesan = $('#modal_pesan')
        var modal_undang = $('#modal_undang')
        var modal_daftar_hitam = $('#modal_daftar_hitam')
        $.ajax({
            type: "GET",
            url: url_get_rekanan_terundang_by_id + id_vendor,
            dataType: "JSON",
            success: function(response) {
                if (type == 'pesan') {
                    $('[name="id_url_vendor"]').val(id_vendor)
                    $('#nama_usaha_pesan').text(response['row_vendor'].nama_usaha)
                    modal_pesan.modal('show')
                } else if (type == 'undang') {
                    modal_undang.modal('show')
                    $('[name="id_url_vendor"]').val(id_vendor)
                    $('#nama_usaha').text(response['row_vendor'].nama_usaha)
                } else if (type == 'daftar_hitam') {
                    modal_daftar_hitam.modal('show')
                    $('[name="id_url_vendor"]').val(id_vendor)
                    $('#nama_usaha').text(response['row_vendor'].nama_usaha)
                } else {

                }
            }
        })
    }

    var form_pesan = $('#form_pesan');
    form_pesan.on('submit', function(e) {
        var pesan = $('[name="pesan"]').val()
        e.preventDefault();
        if (pesan == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Isi Pesan Terlebih Dahulu Ya!'
            })
        } else {
            var url_post = $('[name="url_kirim_pesan"]').val()
            $.ajax({
                url: url_post,
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Mengirim Pesan!',
                        html: 'Harap Tunggu <b></b>',
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                // b.textContent = Swal.getTimerRight()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                            $('#modal_pesan').modal('hide')
                            Swal.fire('Pesan Berhasil Terkirim!', '', 'success')
                            Reload_table_rekanan_baru()
                            form_pesan[0].reset();
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }
            })
        }

    })

    var form_undang = $('#form_undang')
    form_undang.on('submit', function(e) {
        e.preventDefault();
        var post = $('[name="url_kirim_undangan"]').val()
        $.ajax({
            url: post,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                let timerInterval
                Swal.fire({
                    title: 'Sedang Proses Mengirim Undangan!',
                    html: 'Harap Tunggu <b></b>',
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            // b.textContent = Swal.getTimerRight()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                        $('#modal_undang').modal('hide')
                        Swal.fire('Undangan Berhasil Terkirim!', '', 'success')
                        Reload_table_rekanan_baru()
                        form_undang[0].reset();
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {

                    }
                })
            }
        })
    })

    function Question_kbli_nib(id_vendor, nm_vendor) {
        var url_terima_rekanan_baru = $('[name="url_terima_rekanan_baru"]').val()
        Swal.fire({
            title: 'Apakah Anda Yakin Terima Penyedia? ' + nm_vendor,
            text: "Penyedia Yang Sudah Di Terima Tidak Bisa Di Tolak Kembali!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Terima!',
            cancelButtonText: 'Batal!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: url_terima_rekanan_baru,
                    data: {
                        id_vendor: id_vendor,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response['message'] == 'success') {
                            Swal.fire(
                                'Berhasil!',
                                'Penyedia ' + nm_vendor + ' Berhasil Di Terima!',
                                'success'
                            )
                            Reload_table_rekanan_baru();
                        }
                    }
                })

            }
        })
    }
</script>

<script>
    function Lihat_pengajuan_dokumen(id_vendor) {
        var modal_pengajuan_dokumen = $('#modal_pengajuan_dokumen');
        modal_pengajuan_dokumen.modal('show')
        $(document).ready(function() {
            $('#datatable_pengajuan_dokumen').DataTable({
                "responsive": false,
                "ordering": true,
                "processing": true,
                "serverSide": true,
                "autoWidth": false,
                "bDestroy": true,
                // "buttons": ["excel", "pdf", "print", "colvis"],
                initComplete: function() {
                    this.api().buttons().container().appendTo($('.col-md-6:eq(0)', this.api().table().container()));
                },
                "order": [],
                "ajax": {
                    "url": '<?= base_url('validator/rekanan_terundang/get_datatable_pengajuan_perubahan_dokumen') ?>',
                    "type": "POST",
                    data: {
                        id_vendor: id_vendor
                    }
                },
                "columnDefs": [{
                    "target": [-1],
                    "orderable": false
                }],
                "oLanguage": {
                    "sSearch": "Pencarian : ",
                    "sEmptyTable": "Tidak Ada Pengajuan Dokume Baru",
                    "sLoadingRecords": "Silahkan Tunggu - loading...",
                    "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
                    "sZeroRecords": "Tidak Ada Data Yang Di Cari",
                    "sProcessing": "Memuat Data...."
                }
            }).buttons().container().appendTo('#tbl_rup .col-md-6:eq(0)');
        });
    }

    function Setujui_pengajuan(id_dokumen_perubahan) {
        Swal.fire({
            title: "Yakin Mau Menyetujui",
            text: 'Data Ini Mau Di Setujui?',
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: '<?= base_url('validator/rekanan_terundang/setujui_dokumen_pengajuan') ?>',
                    data: {
                        id_dokumen_perubahan: id_dokumen_perubahan
                    },
                    dataType: "JSON",
                    success: function(response) {
                        Reload_table_rekanan_baru()
                        Swal.fire('Good job!', 'Data Berhasil Setujui!', 'success');
                        $('#datatable_pengajuan_dokumen').DataTable({
                            "responsive": false,
                            "ordering": true,
                            "processing": true,
                            "serverSide": true,
                            "autoWidth": false,
                            "bDestroy": true,
                            // "buttons": ["excel", "pdf", "print", "colvis"],
                            initComplete: function() {
                                this.api().buttons().container().appendTo($('.col-md-6:eq(0)', this.api().table().container()));
                            },
                            "order": [],
                            "ajax": {
                                "url": '<?= base_url('validator/rekanan_terundang/get_datatable_pengajuan_perubahan_dokumen') ?>',
                                "type": "POST",
                                data: {
                                    id_vendor: response['id_vendor']['id_vendor']
                                }
                            },
                            "columnDefs": [{
                                "target": [-1],
                                "orderable": false
                            }],
                            "oLanguage": {
                                "sSearch": "Pencarian : ",
                                "sEmptyTable": "Tidak Ada Pengajuan Dokume Baru",
                                "sLoadingRecords": "Silahkan Tunggu - loading...",
                                "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
                                "sZeroRecords": "Tidak Ada Data Yang Di Cari",
                                "sProcessing": "Memuat Data...."
                            }
                        }).buttons().container().appendTo('#tbl_rup .col-md-6:eq(0)');
                    }
                })
            }
        });
    }

    function Tolak_pengajuan(id_dokumen_perubahan) {
        Swal.fire({
            title: "Yakin Mau Tolak Pengajuanya",
            text: 'Data Ini Mau Di Tolak Pengajuanya?',
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: '<?= base_url('validator/rekanan_terundang/tolak_dokumen_pengajuan') ?>',
                    data: {
                        id_dokumen_perubahan: id_dokumen_perubahan
                    },
                    dataType: "JSON",
                    success: function(response) {
                        Swal.fire('Good job!', 'Data Berhasil Tolak!', 'success');
                        $('#datatable_pengajuan_dokumen').DataTable({
                            "responsive": false,
                            "ordering": true,
                            "processing": true,
                            "serverSide": true,
                            "autoWidth": false,
                            "bDestroy": true,
                            // "buttons": ["excel", "pdf", "print", "colvis"],
                            initComplete: function() {
                                this.api().buttons().container().appendTo($('.col-md-6:eq(0)', this.api().table().container()));
                            },
                            "order": [],
                            "ajax": {
                                "url": '<?= base_url('validator/rekanan_terundang/get_datatable_pengajuan_perubahan_dokumen') ?>',
                                "type": "POST",
                                data: {
                                    id_vendor: response['id_vendor']['id_vendor']
                                }
                            },
                            "columnDefs": [{
                                "target": [-1],
                                "orderable": false
                            }],
                            "oLanguage": {
                                "sSearch": "Pencarian : ",
                                "sEmptyTable": "Tidak Ada Pengajuan Dokume Baru",
                                "sLoadingRecords": "Silahkan Tunggu - loading...",
                                "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
                                "sZeroRecords": "Tidak Ada Data Yang Di Cari",
                                "sProcessing": "Memuat Data...."
                            }
                        }).buttons().container().appendTo('#tbl_rup .col-md-6:eq(0)');
                    }
                })
            }
        });
    }
</script>

<script>
    var form_daftar_hitam = $('#form_daftar_hitam')
    form_daftar_hitam.on('submit', function(e) {
        var file_dok_daftar_hitam = $('[name="file_dok_daftar_hitam"]').val();
        if (file_dok_daftar_hitam == '') {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Dokumen Wajib Di Isi!',
            })
        } else {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url('validator/rekanan_terundang/upload_dafatar_hitam') ?>',
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.btn_daftar_hitam').attr("disabled", true);
                },
                success: function(response) {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Menyimpan Data!',
                        html: 'Membuat Data <b></b>',
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                // b.textContent = Swal.getTimerRight()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                            Swal.fire('Data Berhasil Di Simpan!', '', 'success')
                            form_daftar_hitam[0].reset();
                            reload_table()
                            $('#modal_daftar_hitam').modal('hide');
                            $('.btn_daftar_hitam').attr("disabled", false);
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }
            })
        }
    })
</script>