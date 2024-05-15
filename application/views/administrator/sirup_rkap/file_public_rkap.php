<script>
    // akta_pendirian
    $('.file_rkap').change(function(e) {
        var geekss = e.target.files[0].name;
        $('[name="file_rkap_manipulasi"]').val(geekss);
    });
    var tbl_rkap = $('#tbl_rkap')
    var url_get_rkap = $('[name="url_get_rkap"').val()

    // $("#tbl_rkap").DataTable({
    //     "responsive": false,
    //     "ordering": true,
    //     "lengthChange": false,
    //     "serverSide": true,
    //     "autoWidth": false,
    //     "buttons": ["excel", "pdf", "print", "colvis"],
    //     "ajax": {
    //         "url": url_get_rkap,
    //         "type": "POST",
    //     },
    // }).buttons().container().appendTo('#tbl_rkap .col-md-6:eq(0)');

    // $(document).ready(function() {
    //     var table = $('#table_id').DataTable({
    //         buttons: ['copy', 'excel', 'pdf', 'colvis'],
    //         initComplete: function() {
    //             this.api().buttons().container()
    //                 //.appendTo( $ ('#table_id_wrapper .col-md-6:eq(0)', this.api().table (). container ()));
    //                 //.appendTo( $('#table_id_wrapper .col-md-6:eq(0)' ) );
    //                 .appendTo($('.col-md-6:eq(0)', this.api().table().container()));

    //         }
    //     });
    // });


    $(document).ready(function() {
        tbl_rkap.DataTable({
            "responsive": false,
            "ordering": true,
            "processing": true,
            "serverSide": true,
            "lengthChange": false,
            buttons: ['copy', 'excel', 'pdf', 'colvis'],
            initComplete: function() {
                this.api().buttons().container()
                    .appendTo($('.col-md-6:eq(0)', this.api().table().container()));

            },
            "order": [],
            "ajax": {
                "url": url_get_rkap,
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
        }).buttons().container().appendTo('#tbl_rkap .col-md-6:eq(0)');
    });

    function Reload_table_rkap() {
        tbl_rkap.DataTable().ajax.reload();
    }


    function by_id_rkap(id_url_rkap, type) {
        var form_rkap = $('#form_rkap');
        var modal_edit_excel_pengurus_manajerial = $('#modal_edit_excel_pengurus_manajerial');
        var url_by_id_rkap = $('[name="url_by_id_rkap"]').val();
        if (type == 'edit') {
            saveData = 'edit';
        }
        if (type == 'finalisasi') {
            saveData = 'finalisasi';
        }
        $.ajax({
            type: "GET",
            url: url_by_id_rkap + id_url_rkap,
            dataType: "JSON",
            success: function(response) {
                if (type == 'edit') {
                    form_rkap[0].reset();
                    $('#modal-xl-tambah').modal('show')
                    $('[name="type_modal"]').val('edit');
                    $('[name="kode_rkap"]').val(response['row_rkap'].kode_rkap);
                    $('[name="id_post_form"]').val(response['row_rkap'].id_url_rkap);
                    $('[name="tahun_rkap"]').val(response['row_rkap'].tahun_rkap);
                    $('[name="nama_program_rkap"]').val(response['row_rkap'].nama_program_rkap);
                    $('[name="id_departemen"]').val(response['row_rkap'].id_departemen);
                    $('[name="total_pagu_rkap"]').val(response['row_rkap'].total_pagu_rkap);
                    $('[name="rupiah_rkap"]').val(formatRupiah(response['row_rkap'].total_pagu_rkap, 'Rp. '));
                    $('[name="file_rkap_manipulasi"]').val(response['row_rkap'].file_rkap);
                    // tahun_rkap
                    $('.label_tahun_rkap_validasi').html('');
                    // nama_program_rkap
                    $('.label_nama_program_rkap_validasi').html('');
                    // id_departemen
                    $('.label_id_departemen_validasi').html('');
                    // total_pagu_rkap
                    $('.label_total_pagu_rkap_validasi').html('');
                } else {
                    Question_finalisasi_rkap(response['row_rkap'].id_url_rkap, response['row_rkap'].nama_program_rkap);
                }
            }
        })
    }

    function Question_finalisasi_rkap(id_post_form, nama_program_rkap) {
        var url_finalisasi_rkap = $('[name="url_finalisasi_rkap"]').val();
        var type_modal = 'finalisasi';


        Swal.fire({
            title: "Yakin !!",
            text: 'Data ' + nama_program_rkap + ' Ini Mau Di Finalisasi?',
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yakin!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: url_finalisasi_rkap + id_post_form,
                    dataType: "JSON",
                    success: function(response) {
                        let timerInterval
                        Swal.fire({
                            title: 'Sedang Proses Memfinalisasi Data!',
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
                                Reload_table_rkap()
                                Swal.fire('Data Berhasil Di Finalisasi!', '', 'success')
                            }
                        }).then((result) => {
                            if (result.dismiss === Swal.DismissReason.timer) {

                            }
                        })
                    }
                })
            }
        });
    }



    function Tambah_rkap() {
        var url_get_kode_rkap = $('[name="url_get_kode_rkap"]').val();
        var form_rkap = $('#form_rkap');
        $.ajax({
            method: "GET",
            url: url_get_kode_rkap,
            dataType: "JSON",
            success: function(response) {
                form_rkap[0].reset();
                $('[name="type_modal"').val('tambah');
                $('#type_modal').css('display', 'block');
                $('#modal-xl-tambah').modal('show')
                $('[name="kode_rkap"').val(response['kode_rkap'])
            }
        })
    }

    var form_rkap = $('#form_rkap');
    var url_form_rkap = $('[name="url_form_rkap"]').val()
    form_rkap.on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: url_form_rkap,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                if (response['error_upload']) {
                    Swal.fire('Maaf!', 'Dokumen Tidak Dapat Kosong!', 'warning');
                } else if (response['error']) {
                    // tahun_rkap
                    $('.label_tahun_rkap_validasi').html(response['error']['tahun_rkap']);
                    // nama_program_rkap
                    $('.label_nama_program_rkap_validasi').html(response['error']['nama_program_rkap']);
                    // id_departemen
                    $('.label_id_departemen_validasi').html(response['error']['id_departemen']);
                    // total_pagu_rkap
                    $('.label_total_pagu_rkap_validasi').html(response['error']['total_pagu_rkap']);
                } else {
                    // tahun_rkap
                    $('.label_tahun_rkap_validasi').html('');
                    // nama_program_rkap
                    $('.label_nama_program_rkap_validasi').html('');
                    // id_departemen
                    $('.label_id_departemen_validasi').html('');
                    // total_pagu_rkap
                    $('.label_total_pagu_rkap_validasi').html('');
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Menyimpan Data!',
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
                            $('#modal-xl-tambah').modal('hide')
                            form_rkap[0].reset();
                            Reload_table_rkap()
                            var type_model = $('[name="type_modal"').val('tambah');
                            if (type_model == 'tambah') {
                                Swal.fire('Data Berhasil Di Tambah!', '', 'success')
                            } else {
                                Swal.fire('Data Berhasil Di Update!', '', 'success')
                            }
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }
            }
        })

    });

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
    $(".total_pagu_rkap").keyup(function() {
        var harga = $(".total_pagu_rkap").val();
        var tanpa_rupiah = document.getElementById('tanpa_rupiah_rkap');
        tanpa_rupiah.value = formatRupiah(this.value, 'Rp. ');
        /* Fungsi */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    });

    var form_import_rkap = $('#form_import_rkap');
    form_import_rkap.on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo base_url(); ?>administrator/sirup_rka/import_rkap",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('.btn_simpan').attr('disabled', 'disabled');
            },
            success: function(response) {
                if (response['success']) {
                    Swal.fire('Good job!', 'Berhasil Import Excel', 'success');
                    Reload_table_rkap()
                    form_import_rkap[0].reset();
                } else {
                    Swal.fire('Maaf!', 'Kesalahan', 'warning');
                    form_import_rkap[0].reset();
                }
            }
        });
    });
</script>