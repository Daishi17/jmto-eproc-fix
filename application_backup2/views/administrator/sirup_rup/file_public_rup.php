<script>
    // akta_pendirian
    $('.file_rkap').change(function(e) {
        var geekss = e.target.files[0].name;
        $('[name="file_rkap_manipulasi"]').val(geekss);
    });
    var tbl_rkap = $('#tbl_rkap')
    var url_get_rkap = $('[name="url_get_rkap"').val()
    $(document).ready(function() {
        tbl_rkap.DataTable({
            "responsive": false,
            "ordering": true,
            "processing": true,
            "serverSide": true,
            "autoWidth": false,
            "bDestroy": true,

            "buttons": ["excel", "pdf", "print", "colvis"],
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

    function by_id_buat_rup(id_url_rkap, type) {
        var url_by_id_buat_rup = $('[name="url_by_id_buat_rup"]').val();
        var url_buat_rup = $('[name="url_buat_rup"]').val();
        if (type == 'edit') {
            saveData = 'edit';
        }
        if (type == 'finalisasi') {
            saveData = 'finalisasi';
        }
        $.ajax({
            type: "GET",
            url: url_by_id_buat_rup + id_url_rkap,
            dataType: "JSON",
            success: function(response) {
                location.replace(url_buat_rup);
            }
        })
    }
    $(".total_pagu_rup").keyup(function() {
        var harga = $(".total_pagu_rup").val();
        var tanpa_rupiah = document.getElementById('rupiah_total_pagu_rup');
        tanpa_rupiah.value = formatRupiah(this.value, 'Rp. ');
        var persen_pencatatan = $('[name="persen_pencatatan"]').val()
        var nilai_pencatatan = ((harga * persen_pencatatan) / 100);
        $('[name="nilai_pencatatan"]').val(nilai_pencatatan);
        $.ajax({
            type: "GET",
            url: '<?= base_url('get_rupiah/ambil_rupiah/') ?>' + nilai_pencatatan,
            dataType: "JSON",
            success: function(response) {
                $('#nilai_pencatatan2').val(response['rupiah_nilai_pencatatan'])
            }
        })
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

    $(".persen_pencatatan").keyup(function() {
        var harga = $(".total_pagu_rup").val();
        var persen_pencatatan = $('[name="persen_pencatatan"]').val()
        var nilai_pencatatan = (harga * persen_pencatatan) / 100 / 1.11;
        $('[name="nilai_pencatatan"]').val(nilai_pencatatan);
        $.ajax({
            type: "GET",
            url: '<?= base_url('get_rupiah/ambil_rupiah/') ?>' + nilai_pencatatan,
            dataType: "JSON",
            success: function(response) {
                $('#nilai_pencatatan2').val(response['rupiah_nilai_pencatatan'])
            }
        })
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

    // Get_kode_rup()
    // function Get_kode_rup() {
    //     var url_get_kode_rup = $('[name="url_get_kode_rup"]').val();
    //     $.ajax({
    //         method: "GET",
    //         url: url_get_kode_rup,
    //         dataType: "JSON",
    //         success: function(response) {
    //             $('[name="kode_urut_rup"').val(response['kode_urut_rup'])
    //             $('[name="kode_urut_manipulasi"').val(response['get_row_departemen']['kode_departemen'] + '.' + response['kode_urut_rup'])
    //         }
    //     })
    // }

    $('#select_departemen').change(function() {
        var url_get_section_by_departemen = $('[name="url_get_section_by_departemen"]').val();
        var id_departemen = $('#select_departemen').val();
        $.ajax({
            type: 'GET',
            url: url_get_section_by_departemen + id_departemen,
            success: function(html) {
                $('#section_data').html(html);
            }
        });
    })

    function pilih_jenis_anggaran() {
        var url_get_kode_jenis_anggaran = $('[name="url_get_kode_jenis_anggaran"]').val();
        var id_departemen = $('[name="id_departemen"]').val();
        var id_section = $('[name="id_section"]').val();
        var id_jenis_anggaran = $('[name="id_jenis_anggaran"]').val();
        if (id_departemen == '') {
            Swal.fire('Maaf Pilih Departement Dahulu!', '', 'warning');
        } else if (id_section == '') {
            Swal.fire('Maaf Pilih Section Dahulu!', '', 'warning');
        } else if (id_jenis_anggaran == '') {
            Swal.fire('Maaf Pilih Jenis Anggaran Dahulu!', '', 'warning');
        } else {
            $.ajax({
                method: "POST",
                url: url_get_kode_jenis_anggaran,
                data: {
                    id_departemen: id_departemen,
                    id_section: id_section,
                    id_jenis_anggaran: id_jenis_anggaran
                },
                dataType: "JSON",
                success: function(response) {
                    $('[name="kode_urut_rup"').val(response['kode_urut_rup'])
                    $('[name="sumber_dana_anggaran"').val(response['get_row_departemen']['nama_departemen']);
                    $('[name="kode_urut_manipulasi"').val(response['get_row_jenis_anggaran']['kode_string'] + '.' + response['get_row_departemen']['kode_departemen'] + '.' + response['kode_urut_rup'])
                }
            })
        }
    }

    function Simpan_rup() {
        var url_post_rup = $('[name="url_post_rup"]').val();
        var url_back_rup = $('[name="url_back_rup"]').val();
        var form_rup = $('#form_rup');
        $.ajax({
            method: "POST",
            url: url_post_rup,
            dataType: "JSON",
            data: form_rup.serialize(),
            // beforeSend: function() {
            //     $('#button_dekrip_generate').css('display', 'none');
            //     $('#button_dekrip_generate_manipulasi').css('display', 'block');
            // },
            success: function(response) {
                if (response['error']) {
                    // ruas_lokasi
                    $('.ruas_lokasi_validation').html(response['error']['id_ruas']);
                    // tahun_rup
                    $('.tahun_rup_validation').html(response['error']['tahun_rup']);
                    // id_departemen
                    $('.id_departemen_validation').html(response['error']['id_departemen']);
                    // id_section
                    $('.id_section_validation').html(response['error']['id_section']);
                    // nama_rup
                    $('.nama_rup_validation').html(response['error']['nama_rup']);
                    // deskripsi_rup
                    $('.deskripsi_rup_validation').html(response['error']['deskripsi_rup']);
                    // id_provinsi
                    $('.id_provinsi_validation').html(response['error']['id_provinsi']);
                    // id_kabupaten
                    $('.id_kabupaten_validation').html(response['error']['id_kabupaten']);
                    // id_jenis_pengadaan
                    $('.id_jenis_pengadaan_validation').html(response['error']['id_jenis_pengadaan']);
                    // id_metode_pengadaan
                    $('.id_metode_pengadaan_validation').html(response['error']['id_metode_pengadaan']);
                    // id_jenis_anggaran
                    $('.id_jenis_anggaran_validation').html(response['error']['id_jenis_anggaran']);
                    // kualifikasi_usaha
                    $('.kualifikasi_usaha_validation').html(response['error']['kualifikasi_usaha']);
                    // jenis_produk
                    $('.jenis_produk_validation').html(response['error']['jenis_produk']);
                    // status_pencatatan
                    $('.status_pencatatan_validation').html(response['error']['status_pencatatan']);
                    // persen_pencatatan
                    $('.persen_pencatatan_validation').html(response['error']['persen_pencatatan']);
                    // jangka_waktu_mulai_pelaksanaan
                    $('.jangka_waktu_mulai_pelaksanaan_validation').html(response['error']['jangka_waktu_mulai_pelaksanaan']);
                    // jangka_waktu_selesai_pelaksanaan
                    $('.jangka_waktu_selesai_pelaksanaan_validation').html(response['error']['jangka_waktu_selesai_pelaksanaan']);
                    // jangka_waktu_hari_pelaksanaan
                    $('.jangka_waktu_hari_pelaksanaan_validation').html(response['error']['jangka_waktu_hari_pelaksanaan']);
                    // total_pagu_rup
                    $('.total_pagu_rup_validation').html(response['error']['total_pagu_rup']);
                    //  detail_lokasi_rup
                    $('.detail_lokasi_rup_validation').html(response['error']['detail_lokasi_rup']);
                } else {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Menyimpan Rup!',
                        html: 'Proses Penyimpanan Rup <b></b>',
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
                            // tahun_rup
                            $('.tahun_rup_validation').html('');
                            // id_departemen
                            $('.id_departemen_validation').html('');
                            // id_section
                            $('.id_section_validation').html('');
                            // nama_rup
                            $('.nama_rup_validation').html('');
                            // deskripsi_rup
                            $('.deskripsi_rup_validation').html('');
                            // id_provinsi
                            $('.id_provinsi_validation').html('');
                            // id_kabupaten
                            $('.id_kabupaten_validation').html('');
                            // id_jenis_pengadaan
                            $('.id_jenis_pengadaan_validation').html('');
                            // id_metode_pengadaan
                            $('.id_metode_pengadaan_validation').html('');
                            // id_jenis_anggaran
                            $('.id_jenis_anggaran_validation').html('');
                            // kualifikasi_usaha
                            $('.kualifikasi_usaha_validation').html('');
                            // jenis_produk
                            $('.jenis_produk_validation').html('');
                            // status_pencatatan
                            $('.status_pencatatan_validation').html('');
                            // persen_pencatatan
                            $('.persen_pencatatan_validation').html('');
                            // jangka_waktu_mulai_pelaksanaan
                            $('.jangka_waktu_mulai_pelaksanaan_validation').html('');
                            // jangka_waktu_selesai_pelaksanaan
                            $('.jangka_waktu_selesai_pelaksanaan_validation').html('');
                            // jangka_waktu_hari_pelaksanaan
                            $('.jangka_waktu_hari_pelaksanaan_validation').html('');
                            // total_pagu_rup
                            $('.total_pagu_rup_validation').html('');
                            // ruas_lokasi
                            $('.ruas_lokasi_validation').html('');
                            //  detail_lokasi_rup
                            $('.detail_lokasi_rup_validation').html('');
                            Swal.fire('Rup Berhasil Di Buat!', '', 'success')
                            form_rup[0].reset();
                            setTimeout(() => {
                                location.replace('<?= base_url('administrator/Sirup_rup') ?>');
                            }, 3000);
                            Get_kode_rup();
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }
            }
        })
    }


    var tbl_rup = $('#tbl_rup')
    var url_get_rup = $('[name="url_get_rup"').val()
    $(document).ready(function() {
        tbl_rup.DataTable({
            "responsive": false,
            "ordering": true,
            "processing": true,
            "serverSide": true,
            "autoWidth": false,
            "bDestroy": true,
            "buttons": ["excel", "pdf", "print", "colvis"],
            initComplete: function() {
                this.api().buttons().container()
                    .appendTo($('.col-md-6:eq(0)', this.api().table().container()));

            },
            "order": [],
            "ajax": {
                "url": url_get_rup,
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

    function Reload_table_rup() {
        tbl_rup.DataTable().ajax.reload();
    }

    function by_id_rup(id_url_rup, type) {
        var url_by_id_rup = $('[name="url_by_id_rup"]').val();
        var modal_detail = $('#modal-xl-detail');
        if (type == 'detail') {
            saveData = 'detail';
        }
        if (type == 'finalisasi') {
            saveData = 'finalisasi';
        }
        $.ajax({
            type: "GET",
            url: url_by_id_rup + id_url_rup,
            dataType: "JSON",
            success: function(response) {
                modal_detail.modal('show');
                $('[name="random_kode"]').val(response['row_rup']['id_url_rup']);
                $('#kode_rup').text(response['row_rup']['kode_rup']);
                $('#tahun_rup').text(response['row_rup']['tahun_rup']);
                $('#nama_departemen').text(response['row_rup']['nama_departemen']);
                $('#nama_section').text(response['row_rup']['nama_section']);
                $('#nama_rup').text(response['row_rup']['nama_rup']);
                $('#detail_lokasi_rup').text(response['row_rup']['detail_lokasi_rup']);
                $('#nama_jenis_pengadaan').text(response['row_rup']['nama_jenis_pengadaan']);
                $('#nama_metode_pengadaan').text(response['row_rup']['nama_metode_pengadaan']);
                $('#nama_jenis_anggaran').text(response['row_rup']['nama_jenis_anggaran']);
                $('#total_pagu_rup').text(formatRupiah(response['row_rup']['total_pagu_rup'], 'Rp.'));
                var jangkaWaktuMulai = response['row_rup'].jangka_waktu_mulai_pelaksanaan;
                var formattedDate_mulai = formatDateIndo(jangkaWaktuMulai);
                var jangkaWaktuselesai = response['row_rup'].jangka_waktu_selesai_pelaksanaan;
                var formattedDate_selesai = formatDateIndo(jangkaWaktuselesai);
                $('#waktu_pelakasanaan').text(formattedDate_mulai + ' s/d ' + formattedDate_selesai);
                $('#hari_pelaksanaan').text(response['row_rup']['jangka_waktu_hari_pelaksanaan']);
                $('#status_pencatatan').text(response['row_rup']['status_pencatatan']);
                $('#persen_pencatatan').text(response['row_rup']['persen_pencatatan'] + '%');
                $('#nilai_pencatatan').text('Rp. ' + response['row_rup']['nilai_pencatatan'].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',00');
                if (response['row_rup']['sts_rup'] == 1) {
                    $('.btn-finalisasi').hide()
                    $('.btn-rup').hide()
                } else {
                    $('.btn-finalisasi').show()
                    $('.btn-rup').show()
                }
            }
        })
    }


    function ubah_rup() {
        var url_ubah_rup = $('[name="url_ubah_rup"]').val();
        var url_by_id_rup = $('[name="url_by_id_rup"]').val();
        var random_kode = $('[name="random_kode"]').val();
        $.ajax({
            type: "POST",
            url: url_by_id_rup + random_kode,
            data: {
                random_kode: random_kode
            },
            dataType: "JSON",
            success: function(response) {
                location.replace(url_ubah_rup + random_kode)
            }
        })
    }



    function finalisasi_rup() {
        var random_kode = $('[name="random_kode"]').val();
        var nama_rup = $('#nama_rup').text();
        var url_finaliasi_rup = $('[name="url_finaliasi_rup"]').val()
        var modal_detail = $('#modal-xl-detail');

        Swal.fire({
            title: 'Apakah Anda Yakin Ingin Memfinalisasi ? ',
            text: nama_rup,
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
                    url: url_finaliasi_rup,
                    data: {
                        random_kode: random_kode,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        modal_detail.modal('hide');
                        Swal.fire('Rup Berhasil Di Finalisasi!', '', 'success')
                        location.reload()
                        Reload_table_rup();
                        Reload_table_rup_final();
                    }
                })

            }
        })
    }

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
</script>

<script>
    // a and b are javascript Date objects
    function dateDiffInDays(a, b) {
        const _MS_PER_DAY = 1000 * 60 * 60 * 24;
        // Discard the time and time-zone information.
        const utc1 = Date.UTC(a.getFullYear(), a.getMonth(), a.getDate());
        const utc2 = Date.UTC(b.getFullYear(), b.getMonth(), b.getDate());

        return Math.floor((utc2 - utc1) / _MS_PER_DAY);
    }

    // test it

    function hitung_hari() {
        var date_1 = $('[name="jangka_waktu_mulai_pelaksanaan"]').val();
        var date_2 = $('[name="jangka_waktu_selesai_pelaksanaan"]').val();
        var a = new Date(date_1);
        var b = new Date(date_2);
        var difference = dateDiffInDays(a, b);
        $('[name="jangka_waktu_hari_pelaksanaan"]').val(difference);
    }

    var i = 1;
    $('#add').click(function() {
        var url_get_all_ruas = $('[name="url_get_all_ruas"]').val();
        $.ajax({
            type: "GET",
            url: url_get_all_ruas,
            success: function(response) {
                var html = '';
                var j;
                for (j = 0; j < response['ruas_lokasi'].length; j++) {
                    html += '<option value="' + response['ruas_lokasi'][j].id_ruas + '">' + response['ruas_lokasi'][j].nama_ruas + '</option>';
                }
                i++;
                $('#dynamic_field').append('<tr id="row' + i + '">' +
                    '<td colspan="3"><div class="input-group mb-2">' +
                    '<span class="input-group-text"><i class="fa-solid fa-road"></i></span>' +
                    '<select name="id_ruas[]" id="id_ruas' + i + '"  class="form-control select2bs4' + i + '">' + html + '</select>' +
                    '</div></td>' +
                    '<td class="text-center"><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove"><i class="fas fa-trash-alt"></i></button></td>' +
                    '</tr>');
            }
        })
    });
    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });
    $('#provinsitambah').change(function() {
        var url_provinsi = $('[name="url_provinsi"]').val();
        var id_provinsi = $('#provinsitambah').val();
        $.ajax({
            type: 'GET',
            url: url_provinsi + id_provinsi,
            success: function(html) {
                $('#kabupatentambah').html(html);
            }
        });
    })
</script>

<script>
    var form_import_rup = $('#form_import_rup');
    form_import_rup.on('submit', function(e) {
        console.log('berhasil');
        e.preventDefault();
        $.ajax({
            url: "<?php echo base_url(); ?>administrator/Sirup_rup/import_rup",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('.btn_simpan').attr('disabled', 'disabled');
            },
            success: function(response) {
                $('.btn_simpan').attr('disabled', false);
                if (response['success']) {
                    Swal.fire('Good job!', 'Berhasil Import Excel', 'success');
                    Reload_table_rup()
                    form_import_rup[0].reset();
                } else {
                    Swal.fire('Maaf!', 'Kesalahan', 'warning');
                    form_import_rup[0].reset();
                }
            }
        });
    });
</script>

<script>
    function formatDateIndo(dateString) {
        // Array untuk nama bulan Indonesia
        var months = [
            "Januari", "Februari", "Maret",
            "April", "Mei", "Juni", "Juli",
            "Agustus", "September", "Oktober",
            "November", "Desember"
        ];

        var parts = dateString.split("-");
        var day = parts[2];
        var monthIndex = parseInt(parts[1]) - 1;
        var year = parts[0];

        var formattedDate = months[monthIndex] + " " + year;
        return formattedDate;
    }
</script>