<script>
    var tbl_rup = $('#tbl_rup')
    var url_get_rup_buat_paket = $('[name="url_get_rup_buat_paket"').val()
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
                "url": url_get_rup_buat_paket,
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

    function by_id_rup(id_url_rup) {
        var url_by_id_rup_paket = $('[name="url_by_id_rup_paket"]').val();
        var modal_paket = $('#modal-xl-paket');
        var tbl_panitia = $('#tbl_panitia')
        var url_get_panitia_buat_paket = $('[name="url_get_panitia_buat_paket"').val()
        $.ajax({
            type: "GET",
            url: url_by_id_rup_paket + id_url_rup,
            dataType: "JSON",
            success: function(response) {
                modal_paket.modal('show');
                var html_ruas = '';
                if (response['row_rup']['id_metode_pengadaan'] == 3) {
                    // $('[name="metode_kualifikasi"]').attr('disabled', true);
                    // $('[name="metode_dokumen"]').attr('disabled', true);
                    $.ajax({
                        type: 'GET',
                        url: '<?= base_url('administrator/sirup_buat_paket/get_jenis_jadwal_juksung/') ?>' + response['row_rup']['id_url_rup'],
                        success: function(html) {
                            $('#jenis_jadwal').html(html);
                        }
                    });
                } else {

                }
                $('[name="random_kode"]').val(response['row_rup']['id_url_rup']);
                $('#kode_rup').text(response['row_rup']['kode_rup']);
                $('#tahun_rup').text(response['row_rup']['tahun_rup']);
                $('#nama_departemen').text(response['row_rup']['nama_departemen']);
                // add to paket
                $('#nama_departemen2').text(response['row_rup']['nama_departemen']);
                // end add
                $('#nama_section').text(response['row_rup']['nama_section']);
                $('#nama_rup').text(response['row_rup']['nama_rup']);
                $('#detail_lokasi_rup').text(response['row_rup']['detail_lokasi_rup']);
                $('#deskripsi_rup').text(response['row_rup']['deskripsi_rup']);
                $('#nama_provinsi').text(response['row_rup']['nama_provinsi']);
                $('#nama_kabupaten').text(response['row_rup']['nama_kabupaten']);
                $('#nama_jenis_pengadaan').text(response['row_rup']['nama_jenis_pengadaan']);
                $('#nama_metode_pengadaan').text(response['row_rup']['nama_metode_pengadaan']);
                $('#nama_jenis_anggaran').text(response['row_rup']['nama_jenis_anggaran']);
                $('#total_pagu_rup').text(formatRupiah(response['row_rup']['total_pagu_rup'], 'Rp.'));
                var jangkaWaktuMulai = response['row_rup'].jangka_waktu_mulai_pelaksanaan;
                var formattedDate_mulai = formatDateIndo(jangkaWaktuMulai);
                var jangkaWaktuselesai = response['row_rup'].jangka_waktu_selesai_pelaksanaan;
                var formattedDate_selesai = formatDateIndo(jangkaWaktuselesai);

                $('#waktu_pelakasanaan').text(formattedDate_mulai +
                    ' s/d ' + formattedDate_selesai);
                $('#hari_pelaksanaan').text(response['row_rup']['jangka_waktu_hari_pelaksanaan']);
                $('#status_pencatatan').text(response['row_rup']['status_pencatatan']);
                $('#persen_pencatatan').text(response['row_rup']['persen_pencatatan']);
                $('#jenis_produk').text(response['row_rup']['jenis_produk']);
                $('#kualifikasi_usaha').text(response['row_rup']['kualifikasi_usaha']);
                $('#detail_ruas_rup').text(response['row_rup']['nama_ruas']);
                $('[name="metode_kualifikasi"]').val(response['metode']['metode_kualifikasi']);
                $('[name="metode_dokumen"]').val(response['metode']['metode_dokumen']);
                $('[name="id_jadwal_tender"]').val(response['row_rup']['id_jadwal_tender']);
                var i = 0;
                for (i = 0; i < response['result_ruas_rup'].length; i++) {
                    html_ruas += `${response['result_ruas_rup'][i].nama_ruas}, `
                }
                $('#detail_ruas_rup').html(html_ruas)

                $(document).ready(function() {
                    tbl_panitia.DataTable({
                        "responsive": false,
                        "ordering": true,
                        "paging": false,
                        "info": false,
                        "processing": true,
                        "serverSide": true,
                        "autoWidth": false,
                        "bDestroy": true,
                        "order": [],
                        "ajax": {
                            "url": url_get_panitia_buat_paket,
                            "type": "POST",
                            data: {
                                random_kode: response['row_rup']['id_url_rup']
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
                    });
                });

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



    function by_id_panitia(id_url_panitia) {
        var url_by_id_url_panitia = $('[name="url_by_id_url_panitia"]').val();
        var modal_paket = $('#modal-xl-paket');
        var tbl_panitia = $('#tbl_panitia')
        var url_get_panitia_buat_paket = $('[name="url_get_panitia_buat_paket"').val()
        $.ajax({
            type: "GET",
            url: url_by_id_url_panitia + id_url_panitia,
            dataType: "JSON",
            success: function(response) {
                hapus_panitia(response['row_panitia']['id_url_panitia'], response['row_panitia']['nama_pegawai'])
            }
        })
    }

    function hapus_panitia(id_url_panitia, nama_pegawai) {
        var url_hapus_panitia = $('[name="url_hapus_panitia"]').val()
        var random_kode = $('[name="random_kode"]').val();
        Swal.fire({
            title: 'Apakah Anda Yakin Ingin Menghapus User Panitia ? ',
            text: nama_pegawai,
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
                    url: url_hapus_panitia + id_url_panitia,
                    dataType: "JSON",
                    success: function(response) {
                        Swal.fire('User Panitia Berhasil Di Hapus!', '', 'success')
                        by_id_rup(random_kode)
                    }
                })

            }
        })
    }

    function Buat_rup() {
        var url_buat_rup_panitia = $('[name="url_buat_rup_panitia"]').val()
        var random_kode = $('[name="random_kode"]').val();
        var metode_kualifikasi = $('[name="metode_kualifikasi"]').val();
        var metode_dokumen = $('[name="metode_dokumen"]').val();
        var id_jadwal_tender = $('[name="id_jadwal_tender"]').val();
        var url_back_rup = $('[name="url_back_rup"]').val();
        if (id_jadwal_tender == '') {
            Swal.fire('Harap isi Jenis Jadwal Pengadaan Dengan Benar!', '', 'warning')
        } else {
            Swal.fire({
                title: 'Apakah Paket Yang Anda Buat Sudah Benar ? ',
                text: '',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Sudah!',
                cancelButtonText: 'Batal!',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: url_buat_rup_panitia,
                        data: {
                            random_kode: random_kode,
                            id_jadwal_tender: id_jadwal_tender,
                            metode_kualifikasi: metode_kualifikasi,
                            metode_dokumen: metode_dokumen
                        },
                        dataType: "JSON",
                        success: function(response) {
                            if (response['success']) {
                                $('#modal-xl-paket').modal('hide');
                                $('#modal-xl-tambah').modal('hide');
                                Swal.fire('Paket Berhasil Dibuat!', '', 'success');
                                Reload_table_rup_final();
                                Reload_table_rup();
                            } else {
                                Swal.fire(response['validasi'], '', 'warning');
                                Reload_table_rup_final();
                                Reload_table_rup();
                            }
                            // location.replace('<?= base_url('administrator/Sirup_buat_paket') ?>');
                        }
                    })

                }
            })
        }
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
                        Reload_table_rup();
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

    function Simpan_panitia() {
        var url_tambah_panitia = $('[name="url_tambah_panitia"]').val();
        var random_kode = $('[name="random_kode"]').val();
        var nama_panitia = $('[name="nama_panitia"]').val();
        var role_panitia = $('[name="role_panitia"]').val();
        $.ajax({
            type: "POST",
            url: url_tambah_panitia,
            data: {
                random_kode: random_kode,
                nama_panitia: nama_panitia,
                role_panitia: role_panitia
            },
            dataType: "JSON",
            success: function(response) {
                if (response['error']) {
                    Swal.fire('Maaf!', response['error'], 'warning')
                } else {
                    if (role_panitia == 1) {
                        Swal.fire('Ketua Merangkap Anggota Berhasil Di Tambah!', '', 'success')
                    } else if (role_panitia == 2) {
                        Swal.fire('Sekertaris Merangkap Anggota Berhasil Di Tambah!', '', 'success')
                    } else {
                        Swal.fire('Panitia Berhasil Di Tambah!', '', 'success')
                    }
                    by_id_rup(random_kode)
                    var nama_panitia = $('[name="nama_panitia"]').val('');
                }
            }
        })
    }
    $('#metode_kualifikasi_tambah').change(function() {
        var id_provinsi = $('#metode_kualifikasi_tambah').val();
        $.ajax({
            type: 'GET',
            url: url_provinsi + id_provinsi,
            success: function(html) {
                $('#kabupatentambah').html(html);
            }
        });
    })


    var tbl_rup_final = $('#tbl_rup_final')
    var url_get_rup_final = $('[name="url_get_rup_final"').val()
    $(document).ready(function() {
        tbl_rup_final.DataTable({
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
                "url": url_get_rup_final,
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
        }).buttons().container().appendTo('#tbl_rup_final .col-md-6:eq(0)');
    });

    function Reload_table_rup_final() {
        tbl_rup_final.DataTable().ajax.reload();
    }

    function finalisasi_final_rup(id_url_rup) {
        var url_finaliasai_paket_final_rup = $('[name="url_finaliasai_paket_final_rup"]').val()
        Swal.fire({
            title: 'Apakah Anda Yakin Ingin Memfinalisasi Paket Ini ?? ? ',
            text: '',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Sudah!',
            cancelButtonText: 'Batal!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: url_finaliasai_paket_final_rup + id_url_rup,
                    dataType: "JSON",
                    success: function(response) {
                        Swal.fire('Paket Berhasil Dibuat!', '', 'success');
                        Reload_table_rup_final()
                    }
                })

            }
        })
    }



    $('#metode_kualifikasi').change(function() {
        var url_get_jenis_dokumen_jadwal = $('[name="url_get_jenis_dokumen_jadwal"]').val();
        var metode_kualifikasi = $('[name="metode_kualifikasi"]').val();
        var id_url_rup = $('[name="random_kode"]').val();
        $.ajax({
            type: 'POST',
            url: url_get_jenis_dokumen_jadwal,
            data: {
                metode_kualifikasi: metode_kualifikasi,
                id_url_rup: id_url_rup
            },
            success: function(html) {
                $('#metode_dokumen').html(html);
            }
        });
    })

    $('#metode_dokumen').change(function() {
        var url_get_jenis_jadwal = $('[name="url_get_jenis_jadwal"]').val();
        var metode_kualifikasi = $('[name="metode_kualifikasi"]').val();
        var metode_dokumen = $('[name="metode_dokumen"]').val();
        var id_url_rup = $('[name="random_kode"]').val();
        $.ajax({
            type: 'POST',
            url: url_get_jenis_jadwal,
            data: {
                metode_dokumen: metode_dokumen,
                metode_kualifikasi: metode_kualifikasi,
                id_url_rup: id_url_rup
            },
            success: function(html) {
                $('#jenis_jadwal').html(html);
            }
        });
    })
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