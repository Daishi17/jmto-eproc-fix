<script>
    function zeros(i) {
        if (i < 10) {
            return "0" + i;
        } else {
            return i;
        }
    }

    function lihat_detail_jadwal(id_url_rup) {
        var url_by_id_rup = $('[name="url_by_id_rup"]').val()
        var modal_detail_jadwal = $('#modal_detail_jadwal')
        $.ajax({
            type: "GET",
            url: url_by_id_rup + id_url_rup,
            dataType: "JSON",
            success: function(response) {
                modal_detail_jadwal.modal('show');
                var html = '';
                var i;
                var no = 1;
                for (i = 0; i < response['jadwal'].length; i++) {
                    var waktu_mulai = new Date(response['jadwal'][i].waktu_mulai);
                    var waktu_selesai = new Date(response['jadwal'][i].waktu_selesai);
                    const months = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];
                    var sekarang = new Date();
                    // kondisi jadwal
                    if (sekarang < waktu_mulai) {
                        var check = '';
                        var status_waktu = '<small><span class="badge bg-danger"><i class="fa fa-clock" aria-hidden="true"></i> Tahap Belum Mulai </span></small>';
                    } else if (sekarang >= waktu_mulai && sekarang <= waktu_selesai) {
                        var check = '';
                        var status_waktu = '<small><span class="badge bg-warning"><i class="fa fa-clock" aria-hidden="true"></i> Tahap Sedang Di Mulai </span></small>';
                    } else if (sekarang > waktu_selesai && sekarang <= waktu_selesai) {
                        var check = '<i class="fa fa-check text-success" aria-hidden="true"></i>';
                        var status_waktu = '<small><span class="badge bg-success"><i class="fa fa-clock" aria-hidden="true"></i> Tahap Sudah Selesai </span></small>';
                    } else {
                        var check = '<i class="fa fa-check text-success" aria-hidden="true"></i>';
                        var status_waktu = '<small><span class="badge bg-success"><i class="fa fa-clock" aria-hidden="true"></i> Tahap Sudah Selesai </span></small>';
                    }

                    if (response['jadwal'][i].alasan) {
                        var alasan = response['jadwal'][i].alasan
                    } else {
                        var alasan = ''
                    }
                    html += '<tr>' +
                        '<td><small>' + no++ + '</small></td>' +
                        '<td><small>' + response['jadwal'][i].nama_jadwal_rup + ' ' + check + '</small></td>' +
                        `<td><small>${waktu_mulai.getDate()}-${months[waktu_mulai.getMonth()]}-${waktu_mulai.getFullYear()} ${zeros(waktu_mulai.getHours())}:${zeros(waktu_mulai.getMinutes())}</small></td>` +
                        `<td><small>${waktu_selesai.getDate()}-${months[waktu_selesai.getMonth()]}-${waktu_selesai.getFullYear()} ${waktu_selesai.getHours()}:${waktu_mulai.getMinutes()}</small></td>` +
                        '<td>' + status_waktu + '</td>' +
                        '<td>' + 'Panitia' + '</td>' +
                        '<td><small>' + alasan + '</small></td>' +
                        '</tr>';
                }
                $('#load_jadwal').html(html);
            }
        })
    }
</script>
<script>
    // jadwal
    // end jadwal

    // evaluasi kualifikasi
    $(document).ready(function() {
        var id_rup = $('[name="id_rup"]').val()
        $('#tbl_evaluasi_kualifikasi').DataTable({
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
                "url": '<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_evaluasi_kualifikasi/') ?>' + id_rup,
                "type": "POST",
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

    function reload_evaluasi_kualifikasi() {
        $('#tbl_evaluasi_kualifikasi').DataTable().ajax.reload();
    }

    $(document).ready(function() {
        var id_rup = $('[name="id_rup"]').val()
        $('#tbl_evaluasi_penawaran').DataTable({
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
                "url": '<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_evaluasi_penawaran/') ?>' + id_rup,
                "type": "POST",
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

    function reload_evaluasi_penawaran() {
        $('#tbl_evaluasi_penawaran').DataTable().ajax.reload();
    }

    $(document).ready(function() {
        var id_rup = $('[name="id_rup"]').val()
        $('#tbl_hea_tkdn').DataTable({
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
                "url": '<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_evaluasi_hea_tkdn/') ?>' + id_rup,
                "type": "POST",
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

    function reload_evaluasi_hea_tkdn() {
        $('#tbl_hea_tkdn').DataTable().ajax.reload();
    }


    $(document).ready(function() {
        var id_rup = $('[name="id_rup"]').val()
        $('#tbl_akhir_hea').DataTable({
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
                "url": '<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_evaluasi_akhir_hea/') ?>' + id_rup,
                "type": "POST",
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

    function reload_evaluasi_hea_akhir() {
        $('#tbl_akhir_hea').DataTable().ajax.reload();
    }

    $(document).ready(function() {
        var id_rup = $('[name="id_rup"]').val()
        $('#tbl_peringkat_akhir_terendah').DataTable({
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
                "url": '<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_evaluasi_akhir_harga_terendah/') ?>' + id_rup,
                "type": "POST",
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


    function reload_evaluasi_harga_terendah() {
        $('#tbl_peringkat_akhir_terendah').DataTable().ajax.reload();
    }

    $(document).ready(function() {
        $('#tbl_file_1').DataTable({

        }).buttons().container().appendTo('#tbl_rkap .col-md-6:eq(0)');
    });

    $(document).ready(function() {
        $('#tbl_file_2').DataTable({

        }).buttons().container().appendTo('#tbl_rkap .col-md-6:eq(0)');
    });

    function byid_mengikuti(id_vendor_mengikuti_paket, type) {
        var url_byid_mengikuti = $('[name="url_byid_mengikuti"]').val()
        var modal_evaluasi_kualifikasi = $('#modal_evaluasi_kualifikasi')
        var modal_evaluasi_penawaran = $('#modal_evaluasi_penawaran')
        var modal_evaluasi_hea_tkdn = $('#modal_evaluasi_hea_tkdn')
        var modal_evaluasi_akhir_hea = $('#modal_evaluasi_akhir_hea')
        var modal_evaluasi_harga_terendah = $('#modal_evaluasi_harga_terendah')
        var id_rup = $('[name="id_rup"]').val()
        $.ajax({
            type: "GET",
            url: url_byid_mengikuti + id_vendor_mengikuti_paket,
            dataType: "JSON",
            success: function(response) {
                if (type == 'kualifikasi') {
                    modal_evaluasi_kualifikasi.modal('show')
                    $('.nama_usaha').text(response['row_vendor_mengikuti'].nama_usaha)
                    $('[name="id_vendor_mengikuti_paket"]').val(id_vendor_mengikuti_paket)
                } else if (type == 'penawaran') {
                    modal_evaluasi_penawaran.modal('show')
                    $('.nama_usaha').text(response['row_vendor_mengikuti'].nama_usaha)
                    $('[name="id_vendor_mengikuti_paket"]').val(id_vendor_mengikuti_paket)
                } else if (type == 'hea_tkdn') {
                    modal_evaluasi_hea_tkdn.modal('show')
                    $('.nama_usaha').text(response['row_vendor_mengikuti'].nama_usaha)
                    $('[name="id_vendor_mengikuti_paket"]').val(id_vendor_mengikuti_paket)
                } else if (type == 'akhir_hea') {
                    modal_evaluasi_akhir_hea.modal('show')
                    $('.nama_usaha').text(response['row_vendor_mengikuti'].nama_usaha)
                    $('[name="ev_hea_harga"]').val(response['row_vendor_mengikuti'].ev_hea_harga)
                    $('[name="id_vendor_mengikuti_paket"]').val(id_vendor_mengikuti_paket)
                } else if (type == 'harga_terendah') {
                    modal_evaluasi_harga_terendah.modal('show')
                    $('.nama_usaha').text(response['row_vendor_mengikuti'].nama_usaha)
                    $('[name="ev_hea_harga"]').val(response['row_vendor_mengikuti'].ev_hea_harga)
                    $('[name="id_vendor_mengikuti_paket"]').val(id_vendor_mengikuti_paket)
                } else if (type == 'syarat_tambahan') {
                    $('#lihat_syarat_tambahan_vendor').modal('show')
                    $('#nama_usaha_tambahan').text(response['row_vendor_mengikuti'].nama_usaha)
                    $(document).ready(function() {
                        $('#get_dokumen_syarat_tambahan').DataTable({
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
                                "url": '<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_dokumen_syarat_tambahan/') ?>' + response['row_vendor_mengikuti'].id_vendor + '/' + id_rup,
                                "type": "POST",
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

                }

            }
        })
    }

    function format_rupiah2() {
        var ev_hea_penawaran = $('[name="ev_hea_penawaran"]').val()
        var rupiahFormat = ev_hea_penawaran.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        $('[name="penawaran_rp2"]').val('Rp. ' + rupiahFormat)
    }

    function format_rupiah() {
        var nilai_penawaran = $('[name="nilai_penawaran"]').val()
        var rupiahFormat = nilai_penawaran.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        $('[name="penawaran_rp"]').val('Rp. ' + rupiahFormat)
    }


    function format_rupiah3() {
        var nilai_penawaran = $('[name="ev_terendah_harga"]').val()
        var rupiahFormat = nilai_penawaran.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        $('[name="penawaran_rp_terendah"]').val('Rp. ' + rupiahFormat)
    }


    $(document).on('keyup', '.number_only', function(e) {

        var regex = /[^\d.]|\.(?=.*\.)/g;
        var subst = "";

        var str = $(this).val();
        var result = str.replace(regex, subst);
        $(this).val(result);

    });

    var form_evaluasi_kualifikasi = $('#form_evaluasi_kualifikasi')
    form_evaluasi_kualifikasi.on('submit', function(e) {
        var url_simpan_evaluasi_kualifikasi = $('[name="url_simpan_evaluasi_kualifikasi"]').val();
        e.preventDefault();
        $.ajax({
            url: url_simpan_evaluasi_kualifikasi,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#btn_ev_kualifikasi').attr("disabled", true);
            },
            success: function(response) {
                if (response['error']) {
                    $("#error_ev_keuangan").html(response['error']['ev_keuangan']);
                    $("#error_ev_teknis").html(response['error']['ev_teknis']);
                    $('#btn_ev_kualifikasi').attr("disabled", false);
                } else {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Menyimpan Data!',
                        html: 'Proses Data <b></b>',
                        timer: 1000,
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
                            $('#btn_ev_kualifikasi').attr("disabled", false);
                            $('#modal_evaluasi_kualifikasi').modal('hide')
                            form_evaluasi_kualifikasi[0].reset();
                            reload_evaluasi_kualifikasi()
                            reload_evaluasi_penawaran()
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }

            }
        })
    })

    var form_evaluasi_penawaran = $('#form_evaluasi_penawaran')
    form_evaluasi_penawaran.on('submit', function(e) {
        var url_simpan_evaluasi_penawaran = $('[name="url_simpan_evaluasi_penawaran"]').val();
        e.preventDefault();
        $.ajax({
            url: url_simpan_evaluasi_penawaran,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#btn_ev_penawaran').attr("disabled", true);
            },
            success: function(response) {
                if (response['error']) {
                    // $("#error_ev_keuangan").html(response['error']['ev_keuangan']);
                    // $("#error_ev_teknis").html(response['error']['ev_teknis']);
                    // 
                    $('#btn_ev_penawaran').attr("disabled", false);
                } else {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Menyimpan Data!',
                        html: 'Proses Data <b></b>',
                        timer: 1000,
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
                            $('#btn_ev_penawaran').attr("disabled", false);
                            $('#modal_evaluasi_penawaran').modal('hide')
                            form_evaluasi_penawaran[0].reset();
                            reload_evaluasi_penawaran()
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }

            }
        })
    })

    var form_evaluasi_hea_tkdn = $('#form_evaluasi_hea_tkdn')
    form_evaluasi_hea_tkdn.on('submit', function(e) {
        var url_simpan_evaluasi_hea_tkdn = $('[name="url_simpan_evaluasi_hea_tkdn"]').val();
        e.preventDefault();
        $.ajax({
            url: url_simpan_evaluasi_hea_tkdn,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#btn_ev_penawaran').attr("disabled", true);
            },
            success: function(response) {
                if (response['error']) {
                    // $("#error_ev_keuangan").html(response['error']['ev_keuangan']);
                    // $("#error_ev_teknis").html(response['error']['ev_teknis']);
                    $('#btn_ev_tkdn').attr("disabled", false);
                } else {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Menyimpan Data!',
                        html: 'Proses Data <b></b>',
                        timer: 1000,
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
                            $('#btn_ev_tkdn').attr("disabled", false);
                            $('#modal_evaluasi_hea_tkdn').modal('hide')
                            form_evaluasi_hea_tkdn[0].reset();
                            reload_evaluasi_hea_tkdn()
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }

            }
        })
    })

    var form_evaluasi_akhir_hea = $('#form_evaluasi_akhir_hea')
    form_evaluasi_akhir_hea.on('submit', function(e) {
        var url_simpan_evaluasi_akhir_hea = $('[name="url_simpan_evaluasi_akhir_hea"]').val();
        e.preventDefault();
        $.ajax({
            url: url_simpan_evaluasi_akhir_hea,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#btn_ev_hea_akhir').attr("disabled", true);
            },
            success: function(response) {
                if (response['error']) {
                    // $("#error_ev_keuangan").html(response['error']['ev_keuangan']);
                    // $("#error_ev_teknis").html(response['error']['ev_teknis']);
                    $('#btn_ev_tkdn').attr("disabled", false);
                } else {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Menyimpan Data!',
                        html: 'Proses Data <b></b>',
                        timer: 1000,
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
                            $('#btn_ev_hea_akhir').attr("disabled", false);
                            $('#modal_evaluasi_akhir_hea').modal('hide')
                            form_evaluasi_akhir_hea[0].reset();
                            reload_evaluasi_hea_akhir()
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }

            }
        })
    })

    var form_evaluasi_harga_terendah = $('#form_evaluasi_harga_terendah')
    form_evaluasi_harga_terendah.on('submit', function(e) {
        var url_simpan_evaluasi_harga_terendah = $('[name="url_simpan_evaluasi_harga_terendah"]').val();
        e.preventDefault();
        $.ajax({
            url: url_simpan_evaluasi_harga_terendah,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#btn_ev_hea_akhir').attr("disabled", true);
            },
            success: function(response) {
                let timerInterval
                Swal.fire({
                    title: 'Sedang Proses Menyimpan Data!',
                    html: 'Proses Data <b></b>',
                    timer: 1000,
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
                        $('#modal_evaluasi_harga_terendah').modal('hide')
                        form_evaluasi_harga_terendah[0].reset();
                        reload_evaluasi_harga_terendah()
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {

                    }
                })

            }
        })
    })
    // end evaluasi kualifikasi

    // persyaratan tambahan
    $(document).ready(function() {
        var id_rup = $('[name="id_rup"]').val()
        $('#tbl_persyaratan_tambahan_vendor').DataTable({
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
                "url": '<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_syarat_tambahan/') ?>' + id_rup,
                "type": "POST",
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

    function reload_table_dokumen_syarat_tambahan() {
        $('#get_dokumen_syarat_tambahan').DataTable().ajax.reload();
    }

    function reload_table_syarat_tambahan() {
        $('#tbl_persyaratan_tambahan_vendor').DataTable().ajax.reload();
    }

    function byid_syarat_tambahan(id_vendor_mengikuti_paket, type) {
        var url_byid_syarat_tambahan = $('[name="url_byid_syarat_tambahan"]').val()
        $.ajax({
            type: "GET",
            url: url_byid_syarat_tambahan + id_vendor_mengikuti_paket,
            dataType: "JSON",
            success: function(response) {
                if (type == 'evaluasi_syarat_tambah') {
                    $('#evaluasi_syarat_tambahan').modal('show')
                    $('.nama_usaha_evaluasi_tambahan').text(response['row_vendor_tambahan'].nama_usaha)
                    $('.nama_persyaratan_tambahan').text(response['row_vendor_tambahan'].nama_syarat_tambahan)
                    $('[name="id_vendor_mengikuti_paket"]').val(id_vendor_mengikuti_paket)
                    $('[name="id_vendor_syarat_tambahan"]').val(response['row_vendor_tambahan'].id_vendor_syarat_tambahan)
                } else {

                }

            }
        })
    }

    var form_persyaratan_tambahan = $('#form_persyaratan_tambahan')
    form_persyaratan_tambahan.on('submit', function(e) {
        var url_simpan_evaluasi_syarat_tambahan = $('[name="url_simpan_evaluasi_syarat_tambahan"]').val();
        e.preventDefault();
        $.ajax({
            url: url_simpan_evaluasi_syarat_tambahan,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#btn_lulus').attr("disabled", true);
                $('#btn_tidak_lulus').attr("disabled", true);
            },
            success: function(response) {
                Swal.fire({
                    title: 'Sedang Proses Menyimpan Data!',
                    html: 'Proses Data <b></b>',
                    timer: 1000,
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
                        $('#btn_lulus').attr("disabled", false);
                        $('#btn_tidak_lulus').attr("disabled", false);
                        $('#evaluasi_syarat_tambahan').modal('hide')
                        form_persyaratan_tambahan[0].reset();
                        reload_table_dokumen_syarat_tambahan()
                        reload_table_syarat_tambahan()
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {

                    }
                })

            }
        })
    })

    function lulus_syarat_tambahan() {
        $('[name="status"]').val(1)
    }

    function tidak_lulus_syarat_tambahan() {
        $('[name="status"]').val(2)
    }
    // end persyaratan tambahan

    // berita acara pengadaan
    var form_upload_berita_acara_tender = $('#form_upload_berita_acara_tender')
    form_upload_berita_acara_tender.on('submit', function(e) {
        var url_simpan_berita_acara_tender = $('[name="url_simpan_berita_acara_tender"]').val();
        e.preventDefault();
        var file_ba = $('[name="file_ba"]').val()
        if (file_ba == '') {
            Swal.fire({
                title: "Gagal!",
                text: "File Masih Kosong!",
                icon: "warning"
            });
        } else {
            $.ajax({
                url: url_simpan_berita_acara_tender,
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#btn_file_ba').attr("disabled", true);
                },
                success: function(response) {

                    Swal.fire({
                        title: 'Sedang Proses Menyimpan Data!',
                        html: 'Proses Data <b></b>',
                        timer: 1000,
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
                            $('#btn_file_ba').attr("disabled", false);
                            $('#upload_berita_acara_tender').modal('hide')
                            load_dok_ba_tender()
                            form_upload_berita_acara_tender[0].reset();
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
    load_dok_ba_tender()

    function load_dok_ba_tender() {
        var id_rup = $('[name="id_rup"]').val()
        var url_get_berita_acara_tender = $('[name="url_get_berita_acara_tender"]').val()
        var url_open_berita_acara_tender = $('[name="url_open_berita_acara_tender"]').val()
        $.ajax({
            type: "GET",
            url: url_get_berita_acara_tender + id_rup,
            dataType: "JSON",
            success: function(response) {
                var html = '';
                var i;
                var no = 1;
                for (i = 0; i < response.length; i++) {
                    html += '<tr>' +
                        '<td><small>' + no++ + '</small></td>' +
                        '<td><small>' + response[i].nama_file + '</small></td>' +
                        '<td><small>' + '<a target="_blank" href="' + url_open_berita_acara_tender + response[i].file_ba + '" class="btn btn-sm btn-warning"><i class="fas fa fa-file"></i> </a>' + '</small></td>' +
                        '<td><small>' + '<a href="javascript:;" onclick="delete_ba(\'' + response[i].id_berita_acara_tender + '\'' + ',' + '\'' + response[i].nama_file + '\')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>' + '</small></td>' +
                        '</tr>';

                }
                $('#tbl_ba_tender').html(html)
            }
        })
    }

    function delete_ba(id_berita_acara_tender, nama_file) {
        var url_hapus_berita_acara_tender = $('[name="url_hapus_berita_acara_tender"]').val()
        Swal.fire({
            title: 'Apakah Anda Yakin Ingin Menghapus Berita Acara ? ',
            text: nama_file,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: url_hapus_berita_acara_tender,
                    data: {
                        id_berita_acara_tender: id_berita_acara_tender,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response == 'success') {
                            Swal.fire(
                                'Berhasil!',
                                'File Berita Acara ' + nama_file + ' Berhasil Di Hapus!',
                                'success'
                            )
                            load_dok_ba_tender()
                        }
                    }
                })

            }
        })
    }
    // end berita acara

    // upload undangan pembuktian
    var form_upload_undangan_pembuktian = $('#form_upload_undangan_pembuktian')
    form_upload_undangan_pembuktian.on('submit', function(e) {
        var url_simpan_undangan_pembuktian = $('[name="url_simpan_undangan_pembuktian"]').val();
        e.preventDefault();
        var file_undangan_pembuktian = $('[name="file_undangan_pembuktian"]').val()
        if (file_undangan_pembuktian == '') {
            Swal.fire({
                title: "Gagal!",
                text: "File Masih Kosong!",
                icon: "warning"
            });
        } else {
            $.ajax({
                url: url_simpan_undangan_pembuktian,
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.btn_undangan').attr("disabled", true);
                },
                success: function(response) {

                    Swal.fire({
                        title: 'Sedang Proses Menyimpan Data!',
                        html: 'Proses Data <b></b>',
                        timer: 1000,
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
                            $('.btn_undangan').attr("disabled", false);
                            $('#upload_berita_acara_tender').modal('hide')
                            load_dok_undangan_pembuktian()
                            form_upload_undangan_pembuktian[0].reset();

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

    load_dok_undangan_pembuktian()

    function load_dok_undangan_pembuktian() {
        var id_rup = $('[name="id_rup"]').val()
        var url_row_rup = $('[name="url_row_rup"]').val()
        var url_open_undangan = $('[name="url_open_undangan"]').val()
        $.ajax({
            type: "GET",
            url: url_row_rup + id_rup,
            dataType: "JSON",
            success: function(response) {
                var html = '';
                if (response.file_undangan_pembuktian) {
                    var file = '<a target="_blank" href="' + url_open_undangan + response.file_undangan_pembuktian + '" class="btn btn-sm btn-warning"><i class="fas fa fa-file"></i> Lihat Undangan</a>'
                } else {
                    var file = '<span class="badge bg-danger">Belum Upload Undangan</span>'
                }
                html += '<tr>' +
                    '<td><small>' + '1' + '</small></td>' +
                    '<td><small>' + 'Undangan Pembuktian' + '</small></td>' +
                    '<td><small>' + file + '</small></td>' +
                    '</tr>';


                $('#tbl_undangan_pembuktian').html(html)
            }
        })
    }
    // end upload undangan pembuktian

    // upload hasil prakualifikasi
    var form_upload_hasil_prakualifikasi = $('#form_upload_hasil_prakualifikasi')
    form_upload_hasil_prakualifikasi.on('submit', function(e) {
        var url_simpan_hasil_prakualifikasi = $('[name="url_simpan_hasil_prakualifikasi"]').val();
        e.preventDefault();
        var file_pengumuman_prakualifikasi = $('[name="file_pengumuman_prakualifikasi"]').val()
        if (file_pengumuman_prakualifikasi == '') {
            Swal.fire({
                title: "Gagal!",
                text: "File Masih Kosong!",
                icon: "warning"
            });
        } else {
            $.ajax({
                url: url_simpan_hasil_prakualifikasi,
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.btn_hasil_pra').attr("disabled", true);
                },
                success: function(response) {

                    Swal.fire({
                        title: 'Sedang Proses Menyimpan Data!',
                        html: 'Proses Data <b></b>',
                        timer: 1000,
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
                            $('.btn_hasil_pra').attr("disabled", false);
                            load_dok_hasil_prakualifikasi()
                            form_upload_hasil_prakualifikasi[0].reset();

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
    load_dok_hasil_prakualifikasi()

    function load_dok_hasil_prakualifikasi() {
        var id_rup = $('[name="id_rup"]').val()
        var url_row_rup = $('[name="url_row_rup"]').val()
        var url_open_hasil_prakualifikasi = $('[name="url_open_hasil_prakualifikasi"]').val()
        $.ajax({
            type: "GET",
            url: url_row_rup + id_rup,
            dataType: "JSON",
            success: function(response) {
                var html = '';
                if (response.file_pengumuman_prakualifikasi) {
                    var file = '<a target="_blank" href="' + url_open_hasil_prakualifikasi + response.file_pengumuman_prakualifikasi + '" class="btn btn-sm btn-warning"><i class="fas fa fa-file"></i> Lihat File</a>'
                } else {
                    var file = '<span class="badge bg-danger">Belum Upload Hasil Prakualifikasi</span>'
                }
                html += '<tr>' +
                    '<td><small>' + '1' + '</small></td>' +
                    '<td><small>' + 'Undangan Prakualifikasi' + '</small></td>' +
                    '<td><small>' + file + '</small></td>' +
                    '</tr>';


                $('#tbl_hasil_prakualifikasi').html(html)
            }
        })
    }
    // end upload hasil prakualifikasi

    // upload penunjukan pemenang
    var form_upload_surat_penunjukan = $('#form_upload_surat_penunjukan')
    form_upload_surat_penunjukan.on('submit', function(e) {
        var url_simpan_penunjukan_pemenang = $('[name="url_simpan_penunjukan_pemenang"]').val();
        e.preventDefault();
        var file_surat_penunjukan_pemenang = $('[name="file_surat_penunjukan_pemenang"]').val()
        if (file_surat_penunjukan_pemenang == '') {
            Swal.fire({
                title: "Gagal!",
                text: "File Masih Kosong!",
                icon: "warning"
            });
        } else {
            $.ajax({
                url: url_simpan_penunjukan_pemenang,
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.btn_penunjukan').attr("disabled", true);
                },
                success: function(response) {

                    Swal.fire({
                        title: 'Sedang Proses Menyimpan Data!',
                        html: 'Proses Data <b></b>',
                        timer: 1000,
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
                            $('.btn_penunjukan').attr("disabled", false);
                            load_dok_surat_penunjukan()
                            form_upload_surat_penunjukan[0].reset();

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
    load_dok_surat_penunjukan()

    function load_dok_surat_penunjukan() {
        var id_rup = $('[name="id_rup"]').val()
        var url_row_rup = $('[name="url_row_rup"]').val()
        var url_open_penunjukan_pemenang = $('[name="url_open_penunjukan_pemenang"]').val()
        $.ajax({
            type: "GET",
            url: url_row_rup + id_rup,
            dataType: "JSON",
            success: function(response) {
                var html = '';
                if (response.file_surat_penunjukan_pemenang) {
                    var file = '<a target="_blank" href="' + url_open_penunjukan_pemenang + response.file_surat_penunjukan_pemenang + '" class="btn btn-sm btn-warning"><i class="fas fa fa-file"></i> Lihat File</a>'
                } else {
                    var file = '<span class="badge bg-danger">Belum Upload Surat Penunjukan Pemenang</span>'
                }
                html += '<tr>' +
                    '<td><small>' + '1' + '</small></td>' +
                    '<td><small>' + 'Surat Penunjukan Pemenang' + '</small></td>' +
                    '<td><small>' + file + '</small></td>' +
                    '</tr>';


                $('#tbl_penunjukan_pemenang').html(html)
            }
        })
    }
    // end upload penjukan pemenang
</script>

<script>
    function buka_penawaran(id_url_rup) {
        var token_syalala = $('[name="token_syalala"]').val()
        var url_buka_penawaran = $('[name="url_buka_penawaran"]').val()
        var url_buka_penawaran_token = $('[name="url_buka_penawaran_token"]').val()
        if (token_syalala == '') {
            Swal.fire('Harap Isi Token Anda!', '', 'warning')
        } else {
            $.ajax({
                type: "POST",
                url: url_buka_penawaran,
                data: {
                    id_url_rup: id_url_rup,
                    token_syalala: token_syalala,
                },
                dataType: "JSON",
                beforeSend: function() {
                    $('.btn_buka_penawaran').attr("disabled", true);
                },
                success: function(response) {
                    if (response == 'success') {
                        Swal.fire('Token Valid!', '', 'success')
                        setTimeout(() => {
                            $('.btn_buka_penawaran').attr("disabled", false);
                            window.open(url_buka_penawaran_token + id_url_rup, '_blank');
                        }, 2000);
                    } else {
                        Swal.fire('Token Anda Tidak Valid!', '', 'warning')
                        $('.btn_buka_penawaran').attr("disabled", false);
                    }
                }
            })
        }
    }

    function Kirim_pengumuman(id_url_rup) {
        var token_syalala = $('[name="token_syalala"]').val()
        var url_kirim_pengumuman = $('[name="url_kirim_pengumuman"]').val()
        $.ajax({
            type: "POST",
            url: url_kirim_pengumuman,
            data: {
                id_url_rup: id_url_rup,
            },
            dataType: "JSON",
            beforeSend: function() {
                $('.btn_kirim_pengumuman').attr("disabled", true);
            },
            success: function(response) {
                if (response == 'success') {
                    Swal.fire({
                        title: 'Sedang Proses Menyimpan Data!',
                        html: 'Proses Data <b></b>',
                        timer: 1000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                // b.textContent = Swal.getTimerRight()
                            }, 100)
                        },
                        willClose: () => {
                            Swal.fire('Berhasil Diumumkan!', '', 'success')
                            setTimeout(() => {
                                $('.btn_kirim_pengumuman').attr("disabled", false);
                            }, 2000);

                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                } else {
                    $('.btn_kirim_pengumuman').attr("disabled", false);
                }
            }
        })
    }
</script>

<script>
    // upload sanggahan prakualifikasi
    var form_sanggahan_prakualifikasi = $('#form_sanggahan_prakualifikasi')
    form_sanggahan_prakualifikasi.on('submit', function(e) {
        var url_upload_sanggahan_pra = $('[name="url_upload_sanggahan_pra"]').val();
        var file_sanggah_pra_panitia = $('[name="file_sanggah_pra_panitia"]').val();
        if (file_sanggah_pra_panitia == '') {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Dokumen Wajib Di Isi!',
            })
        } else {
            e.preventDefault();
            $.ajax({
                url: url_upload_sanggahan_pra,
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.btn-sanggah').attr("disabled", true);
                },
                success: function(response) {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Menyimpan Data!',
                        html: 'Membuat Data <b></b>',
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
                            Swal.fire('Data Berhasil Di Simpan!', '', 'success')
                            $('#modal_balas_sanggahan_pra').modal('hide')
                            form_sanggahan_prakualifikasi[0].reset()
                            load_dok_sanggahan_pra()
                            $('.btn-sanggah').attr("disabled", false);
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
    load_dok_sanggahan_pra()

    function load_dok_sanggahan_pra() {
        var id_rup = $('[name="id_rup"]').val()
        var url_get_sanggahan_pra = $('[name="url_get_sanggahan_pra"]').val()
        var url_open_sanggahan_pra = $('[name="url_open_sanggahan_pra"]').val()
        var url_open_sanggahan_pra_panitia = $('[name="url_open_sanggahan_pra_panitia"]').val()
        $.ajax({
            type: "POST",
            url: url_get_sanggahan_pra,
            data: {
                id_rup: id_rup,
            },
            dataType: "JSON",
            success: function(response) {
                var html = '';
                var i;
                var no = 1;
                for (i = 0; i < response['result_sanggahan_pra'].length; i++) {
                    if (response['result_sanggahan_pra'][i].ket_sanggah_pra) {
                        var ket_sanggah_pra = response['result_sanggahan_pra'][i].ket_sanggah_pra
                    } else {
                        var ket_sanggah_pra = '-'
                    }

                    if (response['result_sanggahan_pra'][i].file_sanggah_pra) {
                        var file_sanggah_pra = '<a target="_blank" href="' + url_open_sanggahan_pra + response['result_sanggahan_pra'][i].nama_usaha + '/SANGGAHAN_PRAKUALIFIKASI/' + response['result_sanggahan_pra'][i].file_sanggah_pra + '"><img src="<?= base_url('assets/img/pdf.png') ?>" alt="File Sanggah" width="30px"></a>'
                    } else {
                        var file_sanggah_pra = '<span class="badge bg-secondary">Tidak Ada File</span>'
                    }

                    if (response['result_sanggahan_pra'][i].ket_sanggah_pra_panitia) {
                        var ket_sanggah_pra_panitia = response['result_sanggahan_pra'][i].ket_sanggah_pra_panitia
                    } else {
                        var ket_sanggah_pra_panitia = '-'
                    }

                    if (response['result_sanggahan_pra'][i].file_sanggah_pra) {
                        if (response['result_sanggahan_pra'][i].file_sanggah_pra_panitia) {
                            var file_sanggah_pra_panitia = '<a target="_blank" href="' + url_open_sanggahan_pra_panitia + response['result_sanggahan_pra'][i].file_sanggah_pra_panitia + '"><img src="<?= base_url('assets/img/pdf.png') ?>" alt="File Sanggah" width="30px"></a>'
                            var balas = '<a href="javascript:;"  onclick="balas_sanggahan_pra(\'' + response['result_sanggahan_pra'][i].id_vendor_mengikuti_paket + '\'' + ',' + '\'' + response['result_sanggahan_pra'][i].nama_usaha + '\')" class="btn btn-sm btn-success"><i class="fas fa fa-edit"></i> Balas </a>'
                        } else {
                            var file_sanggah_pra_panitia = '-'
                            var balas = '<a href="javascript:;"  onclick="balas_sanggahan_pra(\'' + response['result_sanggahan_pra'][i].id_vendor_mengikuti_paket + '\'' + ',' + '\'' + response['result_sanggahan_pra'][i].nama_usaha + '\')" class="btn btn-sm btn-success"><i class="fas fa fa-edit"></i> Balas </a>'
                        }

                    } else {
                        var file_sanggah_pra_panitia = '<span class="badge bg-secondary">Tidak Ada File</span>'
                        var balas = '-'
                    }
                    html += '<tr>' +
                        '<td><small>' + no++ + '</small></td>' +
                        '<td><small>' + response['result_sanggahan_pra'][i].nama_usaha + '</small></td>' +
                        '<td><small>' + ket_sanggah_pra + '</small></td>' +
                        '<td><small>' + file_sanggah_pra + '</small></td>' +
                        '<td><small>' + file_sanggah_pra_panitia + '</small></td>' +
                        '<td><small>' + ket_sanggah_pra_panitia + '</small></td>' +
                        '<td>' + balas + '</td>' +
                        '</tr>';
                    '</tr>';

                }
                $('#tbl_sanggah_pra').html(html);
            }
        })
    }

    function balas_sanggahan_pra(id_vendor_mengikuti_paket, nama_usaha) {
        var modal_balas_sanggahan_pra = $('#modal_balas_sanggahan_pra');
        $('[name="id_vendor_mengikuti_paket"]').val(id_vendor_mengikuti_paket)
        $('#nama_penyedia').text(nama_usaha)
        modal_balas_sanggahan_pra.modal('show');

    }

    function delete_sanggah_pra(id_vendor_mengikuti_paket) {
        var url_hapus_sanggahan_pra = $('[name="url_hapus_sanggahan_pra"]').val()
        Swal.fire({
            title: 'Apakah Anda Yakin Ingin Batalkan Sanggahan Prakualifikasi?',
            text: 'Peringatan! Data Yang Sudah Di Hapus Tidak Dapat Di Kembalikan Lagi! ',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Yakin!',
            cancelButtonText: 'Batal!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: url_hapus_sanggahan_pra,
                    data: {
                        id_vendor_mengikuti_paket: id_vendor_mengikuti_paket,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response == 'success') {
                            Swal.fire(
                                'Berhasil!',
                                'Sanggahan Prakualifikasi Berhasil Di Batalkan!',
                                'success'
                            )
                            load_dok_sanggahan_pra()
                        }
                    }
                })

            }
        })
    }

    // upload sanggahan akhir
    var form_sanggahan_akhir = $('#form_sanggahan_akhir')
    form_sanggahan_akhir.on('submit', function(e) {
        var url_upload_sanggahan_akhir = $('[name="url_upload_sanggahan_akhir"]').val();
        var file_sanggah_akhir = $('[name="file_sanggah_akhir"]').val();
        if (file_sanggah_akhir == '') {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Dokumen Wajib Di Isi!',
            })
        } else {
            e.preventDefault();
            $.ajax({
                url: url_upload_sanggahan_akhir,
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.btn-sanggah-akhir').attr("disabled", true);
                },
                success: function(response) {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Menyimpan Data!',
                        html: 'Membuat Data <b></b>',
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
                            Swal.fire('Data Berhasil Di Simpan!', '', 'success')
                            $('#modal_balas_sanggahan_akhir').modal('hide')
                            form_sanggahan_akhir[0].reset()
                            load_dok_sanggahan_akhir()
                            $('.btn-sanggah-akhir').attr("disabled", false);
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

    load_dok_sanggahan_akhir()

    function load_dok_sanggahan_akhir() {
        var id_rup = $('[name="id_rup"]').val()
        var url_get_sanggahan_akhir = $('[name="url_get_sanggahan_akhir"]').val()
        var url_open_sanggahan_akhir = $('[name="url_open_sanggahan_akhir"]').val()
        var url_open_sanggahan_akhir_panitia = $('[name="url_open_sanggahan_akhir_panitia"]').val()
        $.ajax({
            type: "POST",
            url: url_get_sanggahan_akhir,
            data: {
                id_rup: id_rup,
            },
            dataType: "JSON",
            success: function(response) {
                var html = '';
                var i;
                var no = 1;
                for (i = 0; i < response['result_sanggahan_akhir'].length; i++) {
                    if (response['result_sanggahan_akhir'][i].ket_sanggah_akhir) {
                        var ket_sanggah_akhir = response['result_sanggahan_akhir'][i].ket_sanggah_akhir
                    } else {
                        var ket_sanggah_akhir = '-'
                    }

                    if (response['result_sanggahan_akhir'][i].file_sanggah_akhir) {
                        var file_sanggah_akhir = '<a target="_blank" href="' + url_open_sanggahan_akhir + response['result_sanggahan_akhir'][i].nama_usaha + '/SANGGAHAN_AKHIR/' + response['result_sanggahan_akhir'][i].file_sanggah_akhir + '"><img src="<?= base_url('assets/img/pdf.png') ?>" alt="File Sanggah" width="30px"></a>'
                    } else {
                        var file_sanggah_akhir = '<span class="badge bg-secondary">Tidak Ada File</span>'
                    }

                    if (response['result_sanggahan_akhir'][i].ket_sanggah_akhir_panitia) {
                        var ket_sanggah_akhir_panitia = response['result_sanggahan_akhir'][i].ket_sanggah_akhir_panitia
                    } else {
                        var ket_sanggah_akhir_panitia = '-'
                    }

                    if (response['result_sanggahan_akhir'][i].file_sanggah_akhir) {
                        if (response['result_sanggahan_akhir'][i].file_sanggah_akhir_panitia) {
                            var file_sanggah_akhir_panitia = '<a target="_blank" href="' + url_open_sanggahan_akhir_panitia + response['result_sanggahan_akhir'][i].file_sanggah_akhir_panitia + '"><img src="<?= base_url('assets/img/pdf.png') ?>" alt="File Sanggah" width="30px"></a>'
                            var balas = '<a href="javascript:;"  onclick="balas_sanggahan_akhir(\'' + response['result_sanggahan_akhir'][i].id_vendor_mengikuti_paket + '\'' + ',' + '\'' + response['result_sanggahan_akhir'][i].nama_usaha + '\')" class="btn btn-sm btn-success"><i class="fas fa fa-edit"></i> Balas </a>'
                        } else {
                            var file_sanggah_akhir_panitia = '-'
                            var balas = '<a href="javascript:;"  onclick="balas_sanggahan_akhir(\'' + response['result_sanggahan_akhir'][i].id_vendor_mengikuti_paket + '\'' + ',' + '\'' + response['result_sanggahan_akhir'][i].nama_usaha + '\')" class="btn btn-sm btn-success"><i class="fas fa fa-edit"></i> Balas </a>'
                        }

                    } else {
                        var file_sanggah_akhir_panitia = '<span class="badge bg-secondary">Tidak Ada File</span>'
                        var balas = '-'
                    }
                    html += '<tr>' +
                        '<td><small>' + no++ + '</small></td>' +
                        '<td><small>' + response['result_sanggahan_akhir'][i].nama_usaha + '</small></td>' +
                        '<td><small>' + ket_sanggah_akhir + '</small></td>' +
                        '<td><small>' + file_sanggah_akhir + '</small></td>' +
                        '<td><small>' + file_sanggah_akhir_panitia + '</small></td>' +
                        '<td><small>' + ket_sanggah_akhir_panitia + '</small></td>' +
                        '<td>' + balas + '</td>' +
                        '</tr>';
                    '</tr>';

                }
                $('#tbl_sanggah_akhir').html(html);
            }
        })
    }

    function balas_sanggahan_akhir(id_vendor_mengikuti_paket, nama_usaha) {
        var modal_balas_sanggahan_akhir = $('#modal_balas_sanggahan_akhir');
        $('[name="id_vendor_mengikuti_paket"]').val(id_vendor_mengikuti_paket)
        $('#nama_penyedia').text(nama_usaha)
        modal_balas_sanggahan_akhir.modal('show');

    }

    function delete_sanggah_akhir(id_vendor_mengikuti_paket) {
        var url_hapus_sanggahan_akhir = $('[name="url_hapus_sanggahan_akhir"]').val()
        Swal.fire({
            title: 'Apakah Anda Yakin Ingin Batalkan Sanggahan akhir?',
            text: 'Peringatan! Data Yang Sudah Di Hapus Tidak Dapat Di Kembalikan Lagi! ',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Yakin!',
            cancelButtonText: 'Batal!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: url_hapus_sanggahan_akhir,
                    data: {
                        id_vendor_mengikuti_paket: id_vendor_mengikuti_paket,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response == 'success') {
                            Swal.fire(
                                'Berhasil!',
                                'Sanggahan akhir Berhasil Di Batalkan!',
                                'success'
                            )
                            load_dok_sanggahan_akhir()
                        }
                    }
                })

            }
        })
    }
</script>

<script>
    load_vendor_negosiasi()

    function load_vendor_negosiasi() {
        var id_rup = $('[name="id_rup"]').val()
        var url_get_vendor_negosiasi = $('[name="url_get_vendor_negosiasi"]').val()
        $.ajax({
            type: "POST",
            url: url_get_vendor_negosiasi,
            data: {
                id_rup: id_rup,
            },
            dataType: "JSON",
            success: function(response) {
                var html = '';
                var i;
                var no = 1;
                for (i = 0; i < response['result_vendor_negosiasi'].length; i++) {
                    if (response['result_vendor_negosiasi'][i].tanggal_negosiasi == null) {
                        var tanggal_negoasiasi = '<small class="badge bg-warning">Belum Ada Tanggal Negosiasi</small>'
                    } else {
                        var tanggal_negoasiasi = '<small>' + response['result_vendor_negosiasi'][i].tanggal_negosiasi + '</small>'
                    }
                    if (response['result_vendor_negosiasi'][i].link_negosiasi == null) {
                        var lin_nego = '<small class="badge bg-warning">Belum Ada Link Negosiasi</small>'
                    } else {
                        var lin_nego = '<small>' + response['result_vendor_negosiasi'][i].link_negosiasi + '</small>'
                    }
                    html += '<tr>' +
                        '<td><small>' + no++ + '</small></td>' +
                        '<td><small>' + response['result_vendor_negosiasi'][i].nama_usaha + '</small></td>' +
                        '<td>' + tanggal_negoasiasi + '</td>' +
                        '<td>' + lin_nego + '</td>' +
                        '<td><a href="javascript:;"  onclick="upload_link_negoasiasi(\'' + response['result_vendor_negosiasi'][i].id_vendor_mengikuti_paket + '\'' + ',' + '\'' + response['result_vendor_negosiasi'][i].nama_usaha + '\')" class="btn btn-sm btn-success"><i class="fas fa fa-edit"></i> Kirim Undangan </a> <a href="javascript:;"  onclick="upload_hasil_negoasiasi(\'' + response['result_vendor_negosiasi'][i].id_vendor_mengikuti_paket + '\'' + ',' + '\'' + response['result_vendor_negosiasi'][i].nama_usaha + '\')" class="btn btn-sm btn-success"><i class="fas fa fa-edit"></i> Hasil Negosiasi </a></td>' +
                        '</tr>';
                    '</tr>';

                }
                $('#tbl_vendor_negosiasi').html(html);
            }
        })
    }

    function upload_link_negoasiasi(id_vendor_mengikuti_paket, nama_usaha) {
        var modal_negosiasi = $('#modal_negosiasi');
        $('[name="id_vendor_mengikuti_paket"]').val(id_vendor_mengikuti_paket)
        $('[name="nama_penyedia"]').val(nama_usaha)
        modal_negosiasi.modal('show');
    }


    function upload_hasil_negoasiasi(id_vendor_mengikuti_paket, nama_usaha) {
        var modal_hasil_negosiasi = $('#modal_hasil_negosiasi');
        var url_get_vendor_row = $('[name="url_get_vendor_row"]').val()
        $('[name="id_vendor_mengikuti_paket"]').val(id_vendor_mengikuti_paket)
        $('[name="nama_penyedia"]').val(nama_usaha)
        modal_hasil_negosiasi.modal('show');
        $.ajax({
            type: "POST",
            url: url_get_vendor_row,
            data: {
                id_vendor_mengikuti_paket: id_vendor_mengikuti_paket,
            },
            dataType: "JSON",
            success: function(response) {
                console.log(response);
                $('[name="total_hasil_negosiasi"]').val(response['row_vendor'].total_hasil_negosiasi)
                $('[name="keterangan_negosiasi"]').val(response['row_vendor'].keterangan_negosiasi)
            }
        })

    }


    function deal_negosiasi(type_deal) {
        var url_post_hasil_negosiasi = $('[name="url_post_hasil_negosiasi"]').val()
        var id_vendor_mengikuti_paket = $('[name="id_vendor_mengikuti_paket"]').val()
        var id_rup = $('[name="id_rup"]').val()
        var nama_penyedia = $('[name="nama_penyedia"]').val()
        var total_hasil_negosiasi = $('[name="total_hasil_negosiasi"]').val()
        var keterangan_negosiasi = $('[name="keterangan_negosiasi"]').val()
        var modal_hasil_negosiasi = $('#modal_hasil_negosiasi');

        $.ajax({
            type: "POST",
            url: url_post_hasil_negosiasi,
            dataType: "JSON",
            data: {
                id_vendor_mengikuti_paket: id_vendor_mengikuti_paket,
                total_hasil_negosiasi: total_hasil_negosiasi,
                keterangan_negosiasi: keterangan_negosiasi,
                nama_penyedia: nama_penyedia,
                type_deal: type_deal,
                id_rup: id_rup
            },
            // beforeSend: function() {
            //     $('.btn_dapatkan_token').attr("disabled", true);
            // },
            success: function(response) {
                if (response == 'success') {
                    Swal.fire('Berhasil Buat hasil negosiasi!', '', 'success')
                    modal_hasil_negosiasi.modal('hide');
                    load_vendor_negosiasi()
                } else {
                    Swal.fire('Negosiasi !', '', 'warning')
                    load_vendor_negosiasi()
                    // $('.btn_dapatkan_token').attr("disabled", false);
                }
            }
        })
    }
    var form_upload_link_negosiasi = $('#form_upload_link_negosiasi')
    form_upload_link_negosiasi.on('submit', function(e) {
        var url_simpan_link_negosiasi = $('[name="url_simpan_link_negosiasi"]').val();
        e.preventDefault();
        var tanggal_negosiasi = $('[name="tanggal_negosiasi"]').val()
        var link_negosiasi = $('[name="link_negosiasi"]').val()
        if (tanggal_negosiasi == '') {
            Swal.fire({
                title: "Gagal!",
                text: "Tanggal Negosiasi Masih Kosong!",
                icon: "warning"
            });
        } else if (link_negosiasi == '') {
            Swal.fire({
                title: "Gagal!",
                text: "Link Negosiasi Masih Kosong!",
                icon: "warning"
            });
        } else {
            $.ajax({
                url: url_simpan_link_negosiasi,
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.btn_simpan_negosiasi').attr("disabled", true);
                },
                success: function(response) {
                    Swal.fire({
                        title: 'Sedang Proses Menyimpan Data!',
                        html: 'Proses Data <b></b>',
                        timer: 1000,
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
                            $('.btn_simpan_negosiasi').attr("disabled", false);
                            $('#modal_negosiasi').modal('hide')
                            load_vendor_negosiasi()
                            form_upload_link_negosiasi[0].reset();

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
<script>
    function Cek_token() {
        var token_syalala = $('[name="token_syalala"]').val()
        if (token_syalala == '') {
            $('.btn_buka_penawaran').css('display', 'none');
            $('.btn_dapatkan_token').css('display', 'block');
        } else {
            $('.btn_buka_penawaran').css('display', 'block');
            $('.btn_dapatkan_token').css('display', 'none');
        }
    }

    function kirim_token_ke_wa(id_url_rup) {
        var url_dapatkan_token_penawaran = $('[name="url_dapatkan_token_penawaran"]').val()
        $.ajax({
            type: "POST",
            url: url_dapatkan_token_penawaran,
            dataType: "JSON",
            data: {
                id_url_rup: id_url_rup
            },
            beforeSend: function() {
                $('.btn_dapatkan_token').attr("disabled", true);
            },
            success: function(response) {
                if (response == 'success') {
                    Swal.fire('Token Berhasil Dikirim Ke Whatsapp Anda!', '', 'success')
                } else {
                    Swal.fire('Token Gagal Dikirim Ke Whatsapp Anda!', '', 'warning')
                    $('.btn_dapatkan_token').attr("disabled", false);
                }
            }
        })
    }
</script>

<!-- ulang dan batal tender -->
<script>
    var form_mengulang_pengadaan = $('#form_mengulang_pengadaan')
    form_mengulang_pengadaan.on('submit', function(e) {
        e.preventDefault();
        var alasan_ulang = $('[name="alasan_ulang"]').val()
        var file_ulang_paket = $('[name="file_ulang_paket"]').val()
        var url_ulang_pengadaan = $('[name="url_ulang_pengadaan"]').val()
        if (alasan_ulang == '') {
            Swal.fire({
                title: "Gagal!",
                text: "Alasan Harus Di Isi!",
                icon: "warning"
            });
        } else if (file_ulang_paket == '') {
            Swal.fire({
                title: "Gagal!",
                text: "File Pendukung Harus Di Upload!",
                icon: "warning"
            });
        } else {
            $.ajax({
                url: url_ulang_pengadaan,
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.btn_simpan_negosiasi').attr("disabled", true);
                },
                success: function(response) {
                    Swal.fire({
                        title: 'Sedang Proses Menyimpan Data!',
                        html: 'Proses Data <b></b>',
                        timer: 1000,
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
                            form_mengulang_pengadaan[0].reset();
                            setTimeout(() => {
                                window.location.href = $('[name="redirect"]').val()
                            }, 2000);
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

    var form_batal_pengadaan = $('#form_batal_pengadaan')
    form_batal_pengadaan.on('submit', function(e) {
        e.preventDefault();
        var alasan_batal = $('[name="alasan_batal"]').val()
        var file_batal_paket = $('[name="file_batal_paket"]').val()
        var url_batal_pengadaan = $('[name="url_batal_pengadaan"]').val()
        if (alasan_batal == '') {
            Swal.fire({
                title: "Gagal!",
                text: "Alasan Harus Di Isi!",
                icon: "warning"
            });
        } else if (file_batal_paket == '') {
            Swal.fire({
                title: "Gagal!",
                text: "File Pendukung Harus Di Upload!",
                icon: "warning"
            });
        } else {
            $.ajax({
                url: url_batal_pengadaan,
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.btn_simpan_negosiasi').attr("disabled", true);
                },
                success: function(response) {
                    Swal.fire({
                        title: 'Sedang Proses Menyimpan Data!',
                        html: 'Proses Data <b></b>',
                        timer: 1000,
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
                            form_batal_pengadaan[0].reset();
                            setTimeout(() => {
                                window.location.href = $('[name="redirect"]').val()
                            }, 2000);
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

    function onkeyup_undangan(id_rup, post_type) {
        if (post_type == 'no_undangan') {
            var value = $('#value_undangan1').val()
        } else if (post_type == 'tgl_surat') {
            var value = $('#value_undangan2').val()
        } else if (post_type == 'hari') {
            var value = $('#value_undangan3').val()
        } else if (post_type == 'tanggal') {
            var value = $('#value_undangan4').val()
        } else if (post_type == 'waktu') {
            var value = $('#value_undangan5').val()
        } else if (post_type == 'jml_halaman') {
            var value = $('#value_undangan6').val()
        }

        var url_post_undangan_pembuktian = $('[name="url_post_undangan_pembuktian"]').val()
        $.ajax({
            url: url_post_undangan_pembuktian,
            type: 'post',
            data: {
                value: value,
                post_type: post_type,
                id_rup: id_rup
            },
            success: () => {

            }
        })
    }

    function onkeyup_undang_penyedia_waktu(id_vendor_mengikuti_paket, post_type) {
        var value = $(`[name="wkt_undang_pembuktian${id_vendor_mengikuti_paket}"]`).val()
        var url_post_undangan_pembuktian_vendor_waktu = $('[name="url_post_undangan_pembuktian_vendor_waktu"]').val()
        $.ajax({
            url: url_post_undangan_pembuktian_vendor_waktu,
            type: 'post',
            data: {
                value: value,
                post_type: post_type,
                id_vendor_mengikuti_paket: id_vendor_mengikuti_paket
            },
            success: () => {

            }
        })
    }


    function onkeyup_undang_penyedia_metode(id_vendor_mengikuti_paket, post_type) {
        var value2 = $(`[name="metode_pembuktian${id_vendor_mengikuti_paket}"]`).val()
        var url_post_undangan_pembuktian_vendor_metode = $('[name="url_post_undangan_pembuktian_vendor_metode"]').val()

        $.ajax({
            url: url_post_undangan_pembuktian_vendor_metode,
            type: 'post',
            data: {
                value: value2,
                post_type: post_type,
                id_vendor_mengikuti_paket: id_vendor_mengikuti_paket
            },
            success: () => {

            }
        })
    }

    function onkeyup_global_rup(id_rup, post_type) {
        var url_post_pengumuman_hasil_kualifikasi = $('[name="url_post_pengumuman_hasil_kualifikasi"]').val()
        var value = $('[name="' + post_type + '"]').val()
        $.ajax({
            url: url_post_pengumuman_hasil_kualifikasi,
            type: 'post',
            data: {
                post_type: post_type,
                value: value,
                id_rup: id_rup
            },
            success: () => {

            }
        })
    }

    function select_ba() {
        var jenis_ba = $('#jenis_ba').val();
        if (jenis_ba == 1) {
            $('#ba_1').show();
            $('#ba_2').hide();
            $('#ba_3').hide();
            $('#ba_4').hide();
            $('#ba_5').hide();
            $('#ba_6').hide();
            $('#ba_7').hide();
            $('#ba_8').hide();
            $('#ba_9').hide();
            $('#ba_10').hide();
            $('#ba_11').hide();
        } else if (jenis_ba == 2) {
            $('#ba_1').hide();
            $('#ba_2').show();
            $('#ba_3').hide();
            $('#ba_4').hide();
            $('#ba_5').hide();
            $('#ba_6').hide();
            $('#ba_7').hide();
            $('#ba_8').hide();
            $('#ba_9').hide();
            $('#ba_10').hide();
            $('#ba_11').hide();
        } else if (jenis_ba == 3) {
            $('#ba_1').hide();
            $('#ba_2').hide();
            $('#ba_3').show();
            $('#ba_4').hide();
            $('#ba_5').hide();
            $('#ba_6').hide();
            $('#ba_7').hide();
            $('#ba_8').hide();
            $('#ba_9').hide();
            $('#ba_10').hide();
            $('#ba_11').hide();
        } else if (jenis_ba == 4) {
            $('#ba_1').hide();
            $('#ba_2').hide();
            $('#ba_3').hide();
            $('#ba_4').show();
            $('#ba_5').hide();
            $('#ba_6').hide();
            $('#ba_7').hide();
            $('#ba_8').hide();
            $('#ba_9').hide();
            $('#ba_10').hide();
            $('#ba_11').hide();
        } else if (jenis_ba == 5) {
            $('#ba_1').hide();
            $('#ba_2').hide();
            $('#ba_3').hide();
            $('#ba_4').hide();
            $('#ba_5').show();
            $('#ba_6').hide();
            $('#ba_7').hide();
            $('#ba_8').hide();
            $('#ba_9').hide();
            $('#ba_10').hide();
            $('#ba_11').hide();
        } else if (jenis_ba == 6) {
            $('#ba_1').hide();
            $('#ba_2').hide();
            $('#ba_3').hide();
            $('#ba_4').hide();
            $('#ba_5').hide();
            $('#ba_6').show();
            $('#ba_7').hide();
            $('#ba_8').hide();
            $('#ba_9').hide();
            $('#ba_10').hide();
            $('#ba_11').hide();
        } else if (jenis_ba == 7) {
            $('#ba_1').hide();
            $('#ba_2').hide();
            $('#ba_3').hide();
            $('#ba_4').hide();
            $('#ba_5').hide();
            $('#ba_6').hide();
            $('#ba_7').show();
            $('#ba_8').hide();
            $('#ba_9').hide();
            $('#ba_10').hide();
            $('#ba_11').hide();
        } else if (jenis_ba == 8) {
            $('#ba_1').hide();
            $('#ba_2').hide();
            $('#ba_3').hide();
            $('#ba_4').hide();
            $('#ba_5').hide();
            $('#ba_6').hide();
            $('#ba_7').hide();
            $('#ba_8').show();
            $('#ba_9').hide();
            $('#ba_10').hide();
            $('#ba_11').hide();
        } else if (jenis_ba == 9) {
            $('#ba_1').hide();
            $('#ba_2').hide();
            $('#ba_3').hide();
            $('#ba_4').hide();
            $('#ba_5').hide();
            $('#ba_6').hide();
            $('#ba_7').hide();
            $('#ba_8').hide();
            $('#ba_9').show();
            $('#ba_10').hide();
            $('#ba_11').hide();
        } else if (jenis_ba == 10) {
            $('#ba_1').hide();
            $('#ba_2').hide();
            $('#ba_3').hide();
            $('#ba_4').hide();
            $('#ba_5').hide();
            $('#ba_6').hide();
            $('#ba_7').hide();
            $('#ba_8').hide();
            $('#ba_9').hide();
            $('#ba_10').show();
            $('#ba_11').hide();
        } else if (jenis_ba == 11) {
            $('#ba_1').hide();
            $('#ba_2').hide();
            $('#ba_3').hide();
            $('#ba_4').hide();
            $('#ba_5').hide();
            $('#ba_6').hide();
            $('#ba_7').hide();
            $('#ba_8').hide();
            $('#ba_9').hide();
            $('#ba_10').hide();
            $('#ba_11').show();
        }
    }


    function onkeyup_ba_kualifikas_hadir(id_vendor_mengikuti_paket, post_type) {
        var value = $(`[name="ba_pembuktian_hadir${id_vendor_mengikuti_paket}"]`).val()
        var url_post_ba_kualifikasi_hadir = $('[name="url_post_ba_kualifikasi_hadir"]').val()
        $.ajax({
            url: url_post_ba_kualifikasi_hadir,
            type: 'post',
            data: {
                value: value,
                post_type: post_type,
                id_vendor_mengikuti_paket: id_vendor_mengikuti_paket
            },
            success: () => {

            }
        })
    }

    function onkeyup_ba_kualifikas_dok(id_vendor_mengikuti_paket, post_type) {
        var value = $(`[name="ba_pembuktian_dok${id_vendor_mengikuti_paket}"]`).val()
        var url_post_ba_kualifikasi_dok = $('[name="url_post_ba_kualifikasi_dok"]').val()
        $.ajax({
            url: url_post_ba_kualifikasi_dok,
            type: 'post',
            data: {
                value: value,
                post_type: post_type,
                id_vendor_mengikuti_paket: id_vendor_mengikuti_paket
            },
            success: () => {

            }
        })
    }


    function onkeyup_ba_kualifikas_ket(id_vendor_mengikuti_paket, post_type) {
        var value = $(`[name="ba_pembuktian_ket${id_vendor_mengikuti_paket}"]`).val()
        var url_post_ba_kualifikasi_ket = $('[name="url_post_ba_kualifikasi_ket"]').val()
        $.ajax({
            url: url_post_ba_kualifikasi_ket,
            type: 'post',
            data: {
                value: value,
                post_type: post_type,
                id_vendor_mengikuti_paket: id_vendor_mengikuti_paket
            },
            success: () => {

            }
        })
    }

    function onkeyup_waktu_undangan(id_vendor_mengikuti_paket, post_type) {
        var value = $(`[name="waktu_undangan_rapat${id_vendor_mengikuti_paket}"]`).val()
        var url_post_waktu_undangan = $('[name="url_post_waktu_undangan"]').val()
        $.ajax({
            url: url_post_waktu_undangan,
            type: 'post',
            data: {
                value: value,
                post_type: post_type,
                id_vendor_mengikuti_paket: id_vendor_mengikuti_paket
            },
            success: () => {

            }
        })
    }

    function byid_mengikuti_ba(id_vendor_mengikuti_paket, type) {
        var url_byid_mengikuti = $('[name="url_byid_mengikuti"]').val()
        var id_rup = $('[name="id_rup"]').val()
        $.ajax({
            type: "GET",
            url: url_byid_mengikuti + id_vendor_mengikuti_paket,
            dataType: "JSON",
            success: function(response) {
                if (type == 'check_evaluasi1') {
                    update_check_ba(id_vendor_mengikuti_paket, 'ba_check_ev1', '1')
                } else if (type == 'uncheck_evaluasi1') {
                    update_check_ba(id_vendor_mengikuti_paket, 'ba_check_ev1', '2')
                } else if (type == 'check_evaluasi2') {
                    update_check_ba(id_vendor_mengikuti_paket, 'ba_check_ev2', '1')
                } else if (type == 'uncheck_evaluasi2') {
                    update_check_ba(id_vendor_mengikuti_paket, 'ba_check_ev2', '2')
                } else if (type == 'check_evaluasi3') {
                    update_check_ba(id_vendor_mengikuti_paket, 'ba_check_ev3', '1')
                } else if (type == 'uncheck_evaluasi3') {
                    update_check_ba(id_vendor_mengikuti_paket, 'ba_check_ev3', '2')
                }

            }
        })
    }

    function onkeyup_ba_kualifikas_ket(id_vendor_mengikuti_paket, post_type) {
        var value = $(`[name="ba_pembuktian_ket${id_vendor_mengikuti_paket}"]`).val()
        var url_post_ba_kualifikasi_ket = $('[name="url_post_ba_kualifikasi_ket"]').val()
        $.ajax({
            url: url_post_ba_kualifikasi_ket,
            type: 'post',
            data: {
                value: value,
                post_type: post_type,
                id_vendor_mengikuti_paket: id_vendor_mengikuti_paket
            },
            success: () => {

            }
        })
    }

    function update_check_ba(id_vendor_mengikuti_paket, name, type) {
        $.ajax({
            type: "POST",
            url: '<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'check_ba_evaluasi1/') ?>' + id_vendor_mengikuti_paket,
            dataType: "JSON",
            data: {
                name: name,
                id_vendor_mengikuti_paket: id_vendor_mengikuti_paket,
                type: type
            },
            success: function(response) {
                $('#tbl_ba_evaluasi1').DataTable().ajax.reload();
                $('#tbl_ba_evaluasi2').DataTable().ajax.reload();
                $('#tbl_ba_evaluasi3').DataTable().ajax.reload();

            }
        })
    }



    $(document).ready(function() {
        var id_rup = $('[name="id_rup"]').val()
        $('#tbl_ba_evaluasi1').DataTable({
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
                "url": '<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_vendor_mengikuti_ba1/') ?>' + id_rup,
                "type": "POST",
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

    $(document).ready(function() {
        var id_rup = $('[name="id_rup"]').val()
        $('#tbl_ba_evaluasi2').DataTable({
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
                "url": '<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_vendor_mengikuti_ba2/') ?>' + id_rup,
                "type": "POST",
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

    $(document).ready(function() {
        var id_rup = $('[name="id_rup"]').val()
        $('#tbl_ba_evaluasi3').DataTable({
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
                "url": '<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_vendor_mengikuti_ba3/') ?>' + id_rup,
                "type": "POST",
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

    // ba sampul 1
    $(document).ready(function() {
        var id_rup = $('[name="id_rup"]').val()
        $('#tbl_ba_sampul11').DataTable({
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
                "url": '<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_vendor_mengikuti_ba_sampul1/') ?>' + id_rup,
                "type": "POST",
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

    $(document).ready(function() {
        var id_rup = $('[name="id_rup"]').val()
        $('#tbl_ba_sampul12').DataTable({
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
                "url": '<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_vendor_mengikuti_ba_sampul1/') ?>' + id_rup,
                "type": "POST",
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

    $(document).ready(function() {
        var id_rup = $('[name="id_rup"]').val()
        $('#tbl_ba_sampul13').DataTable({
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
                "url": '<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_vendor_mengikuti_ba_sampul1_1/') ?>' + id_rup,
                "type": "POST",
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
    load_ba_evaluasi_teknis()

    function load_ba_evaluasi_teknis() {
        var id_rup = $('[name="id_rup"]').val()
        $.ajax({
            type: "POST",
            url: '<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'get_tahapan_ba_evaluasi_teknis/') ?>' + id_rup,
            dataType: "JSON",
            success: function(response) {
                var html = ''
                var i = 0;
                for (i = 0; i < response['ba_teknis'].length; i++) {
                    html += `<tr>
                                <td>${i+1}</td>
                                <td>${response['ba_teknis'][i].nama_evaluasi}</td>
                                <td><a href="javascript:;" onclick="delete_ba_evaluasi(${response['ba_teknis'][i].id_ba_teknis_detail})" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
                             </tr>`
                }
                $('#load_ba_evaluasi_teknis').html(html)

            }
        })
    }

    function delete_ba_evaluasi(id_ba_teknis_detail) {
        Swal.fire({
            title: "Hapus Data?",
            text: "Yakin Ingin Menghapus Data Unsur Evalusi Teknis Ini?!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: '<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'hapus_tahapan_ba_evaluasi/') ?>' + id_ba_teknis_detail,
                    dataType: "JSON",
                    success: function(response) {
                        load_ba_evaluasi_teknis()
                        Swal.fire({
                            title: "Berhasil!",
                            text: "Data Berhasil Di Hapus.",
                            icon: "success"
                        });

                    }
                })

            }
        });
    }

    function modal_tambah_ba_evaluasi() {
        $('#modal_tambah_ba_evaluasi_teknis').modal('show')
    }

    var form_ba_evaluasi_teknis = $('#form_ba_evaluasi_teknis')
    form_ba_evaluasi_teknis.on('submit', function(e) {
        var id_rup = $('[name="id_rup"]').val()
        e.preventDefault();
        $.ajax({
            url: '<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'tambah_evaluasi_ba_teknis/') ?>' + id_rup,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#btn_ev_kualifikasi').attr("disabled", true);
            },
            success: function(response) {
                let timerInterval
                Swal.fire({
                    title: 'Sedang Proses Menyimpan Data!',
                    html: 'Proses Data <b></b>',
                    timer: 1000,
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
                        $('#modal_tambah_ba_evaluasi_teknis').modal('hide')
                        form_ba_evaluasi_teknis[0].reset();
                        load_ba_evaluasi_teknis()
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {

                    }
                })

            }
        })
    })

    function format_rupiah_ba_sampul2() {
        var ba_negosiasi_penawaran = $('[name="ba_negosiasi_penawaran"]').val()
        var rupiahFormat = ba_negosiasi_penawaran.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        $('[name="ba_negosiasi_penawaran2"]').val('Rp. ' + rupiahFormat)
    }

    function format_rupiah_ba_sampul3() {
        var ba_negosiasi_harga = $('[name="ba_negosiasi_harga"]').val()
        var rupiahFormat = ba_negosiasi_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        $('[name="ba_negosiasi_harga2"]').val('Rp. ' + rupiahFormat)
    }

    function dibawah_60() {
        var ev_keuangan = $('[name="ev_keuangan"]').val()

        if (ev_keuangan < 60) {
            $('[name="ev_teknis"]').prop('disabled', true);
            $('[name="ev_teknis"]').val(0);
        } else {
            $('[name="ev_teknis"]').prop('disabled', false);
        }
    }
</script>

<script>
    // INI UNTUK KIRIM NOTIFIKASI DOKUMEN PERUBAHAN
    function notifikasi_dokumen(id_dokumen_pengadaan) {
        $('[name="id_dokumen_pengadaan"]').val(id_dokumen_pengadaan)
        var modal_notifikasi_dokumen = $('#modal_notifikasi_dokumen');
        $('[name="type_notif_dokumen"]').val('dok_pengadaan')
        modal_notifikasi_dokumen.modal('show');
    }

    function notifikasi_dokumen_kualifikasi(id_dokumen_prakualifikasi) {
        $('[name="id_dokumen_prakualifikasi"]').val(id_dokumen_prakualifikasi)
        var modal_notifikasi_dokumen_prakualifikasi = $('#modal_notifikasi_dokumen_prakualifikasi');
        $('[name="type_notif_dokumen"]').val('dok_pra')
        modal_notifikasi_dokumen_prakualifikasi.modal('show');
    }

    function kirim_perubahan_dokumen() {
        var url_kirim_notif_perubahan_dokumen = $('[name="url_kirim_notif_perubahan_dokumen"]').val()
        var id_dokumen_pengadaan = $('[name="id_dokumen_pengadaan"]').val()
        var id_rup = $('[name="id_rup"]').val()
        var keterangan_dokumen = $('[name="keterangan_dokumen"]').val()
        var keterangan_dokumen_pra = $('[name="keterangan_dokumen_pra"]').val()
        var modal_notifikasi_dokumen = $('#modal_notifikasi_dokumen');
        var modal_notifikasi_dokumen_prakualifikasi = $('#modal_notifikasi_dokumen_prakualifikasi');
        var type_notif_dokumen = $('[name="type_notif_dokumen"]').val()
        var id_dokumen_prakualifikasi = $('[name="id_dokumen_prakualifikasi"]').val()
        $.ajax({
            type: "POST",
            url: url_kirim_notif_perubahan_dokumen,
            dataType: "JSON",
            data: {
                id_dokumen_pengadaan: id_dokumen_pengadaan,
                id_dokumen_prakualifikasi: id_dokumen_prakualifikasi,
                keterangan_dokumen: keterangan_dokumen,
                keterangan_dokumen_pra: keterangan_dokumen_pra,
                id_rup: id_rup,
                type_notif_dokumen: type_notif_dokumen
            },
            // beforeSend: function() {
            //     $('.btn_dapatkan_token').attr("disabled", true);
            // },
            success: function(response) {
                if (response == 'success') {
                    Swal.fire('Berhasil Mengirim Perubahan Dokumen!', '', 'success')
                    modal_notifikasi_dokumen.modal('hide');
                    modal_notifikasi_dokumen_prakualifikasi.modal('hide');
                    $('[name="keterangan_dokumen"]').val('')
                } else {
                    Swal.fire('Negosiasi !', '', 'warning')
                }
            }
        })
    }

    function setujui_ba(value, type) {
        var url_post_status_ba = $('[name="url_post_status_ba"]').val()
        var id_rup = $('[name="id_rup"]').val()
        if (type == 'setuju') {
            var sts = 1;
        } else {
            var sts = 2;
        }
        $.ajax({
            type: "POST",
            url: url_post_status_ba,
            dataType: "JSON",
            data: {
                post: value,
                type: sts,
                id_rup: id_rup
            },
            success: function(response) {
                Swal.fire('Data Berhasil Di Simpan!', '', 'success')
            }
        })
    }
</script>