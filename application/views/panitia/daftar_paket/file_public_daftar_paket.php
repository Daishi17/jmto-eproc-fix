<script>
    var tbl_rup_finalisasi = $('#tbl_rup_finalisasi')
    var url_get_rup_finalisasi = $('[name="url_get_rup_finalisasi"').val()
    $(document).ready(function() {
        tbl_rup_finalisasi.DataTable({
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
                "url": url_get_rup_finalisasi,
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
        tbl_rup_finalisasi.DataTable().ajax.reload();
    }

    function by_id_rup(id_url_rup, type) {
        var url_by_id_rup = $('[name="url_by_id_rup"]').val();
        var url_buat_paket_penyedia = $('[name="url_buat_paket_penyedia"]').val();
        $.ajax({
            type: "GET",
            url: url_by_id_rup + id_url_rup,
            dataType: "JSON",
            success: function(response) {
                window.location.href = url_buat_paket_penyedia + id_url_rup;
            }
        })
    }

    $(".total_hps").keyup(function() {
        var harga = $(".total_hps").val();
        var tanpa_rupiah = document.getElementById('rupiah_total_hps');
        tanpa_rupiah.value = formatRupiah(this.value, 'Rp. ');

        var persen_pencatatan = $('[name="persen_pencatatan"]').val()
        var nilai_pencatatan = harga * persen_pencatatan / 100;

        $('[name="nilai_pencatatan"]').val(nilai_pencatatan);
        $('#nilai_pencatatan2').val(nilai_pencatatan)
        var tanpa_rupiah2 = $('[name="nilai_pencatatan2"]').val(nilai_pencatatan);
        tanpa_rupiah2.value2 = formatRupiah(this.value2, 'Rp. ');

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


    function total_hps_validasi(id_url_rup) {
        var total_hps_rup = $('[name="total_hps_rup"]').val();
        var total_pagu_rup = $('[name="total_pagu_rup"]').val();
        if (parseInt(total_hps_rup) > parseInt(total_pagu_rup)) {
            Swal.fire('Maaf Nilai Hps Hanya Boleh Sama Dengan Atau Kurang Dari Total Pagu!', '', 'warning');
            $('[name="total_hps_rup"]').val('');
        } else {
            var url_update_rup_hps = $('[name="url_update_rup_hps"]').val()
            var id_rup = $('[name="id_rup"]').val()
            $.ajax({
                type: "POST",
                url: url_update_rup_hps,
                data: {
                    total_hps_rup: total_hps_rup,
                    id_rup: id_rup
                },
                dataType: "JSON",
                success: function(response) {
                    load_dok_hps()
                }
            })
        }
    }

    var form_dokumen_izin_prinsip = $('#form_dokumen_izin_prinsip')
    form_dokumen_izin_prinsip.on('submit', function(e) {
        var url_dok_izin_prinsip = $('[name="url_dok_izin_prinsip"]').val();
        var file_dokumen = $('[name="file_dokumen"]').val();
        if (file_dokumen == '') {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Dokumen Wajib Di Isi!',
            })
        } else {
            e.preventDefault();
            $.ajax({
                url: url_dok_izin_prinsip,
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.btn_dok_izin_prinsip').attr("disabled", true);
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
                            form_dokumen_izin_prinsip[0].reset();
                            load_dok_izin_prinsip()
                            $('.btn_dok_izin_prinsip').attr("disabled", false);
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
    load_dok_hps()
    load_dok_izin_prinsip()

    function load_dok_izin_prinsip() {

        var url_get_dok_izin_prinsip = $('[name="url_get_dok_izin_prinsip"]').val()
        var id_rup_global = $('[name="id_rup_global"]').val()
        var open_dokumen_izin_prinsip = $('[name="open_dokumen_izin_prinsip"]').val()
        $.ajax({
            type: "GET",
            url: url_get_dok_izin_prinsip + id_rup_global,
            dataType: "JSON",
            success: function(response) {
                var html = '';
                var i;
                for (i = 0; i < response['dok_izin_prinsip'].length; i++) {
                    html += '<tr>' +
                        '<td>' + response['dok_izin_prinsip'][i].nama_file + '</td>' +
                        '<td>' + '  <a target="_blank" href="' + open_dokumen_izin_prinsip + response['dok_izin_prinsip'][i].file_dokumen + '" class="btn btn-sm btn-danger">' +
                        '<i class="fa-solid fa-folder-open"></i>' +
                        ' File Dokumen' +
                        '</a>' + '</td>' +
                        '<td style="text-align:center;">' +
                        '<a href="javascript:;" onclick="hapus_dok_izin_prinsip(' + response['dok_izin_prinsip'][i].id_izin_prinsip + ')" class="btn btn-danger btn-sm" > <i class="fa-solid fa-trash"></i></a>' +
                        '</td>' +
                        '</tr>';
                }
                $('#tbl_dok_izin_prinsip').html(html)
            }
        })
    }

    function hapus_dok_izin_prinsip(id_izin_prinsip) {
        var url_hapus_izin_prinsip = $('[name="url_hapus_izin_prinsip"]').val()
        Swal.fire({
            title: 'Apakah Anda Yakin Ingin Menghapus',
            text: 'Dokumen Ini ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: url_hapus_izin_prinsip,
                    data: {
                        id_izin_prinsip: id_izin_prinsip,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        Swal.fire('Data Berhasil Di Hapus!', '', 'success')
                        load_dok_izin_prinsip()
                    }
                })

            }
        })
    }

    function load_dok_hps() {

        var url_by_id_rup = $('[name="url_by_id_rup"]').val();
        var id_url_rup = $('[name="id_url_rup"]').val()
        var url_cek_dokumen_hps = $('[name="url_cek_dokumen_hps"]').val()
        var nama_rup = $('[name="nama_rup"]').val()
        var date_y = $('[name="date_y"]').val()
        $.ajax({
            type: "GET",
            url: url_by_id_rup + id_url_rup,
            dataType: "JSON",
            success: function(response) {
                $('.total_hps').val("Rp " + response['row_rup'].total_hps_rup.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',00');
                var html = ''
            }
        })
    }

    var form_jadwal = $('#form_jadwal')
    var url_update_jadwal = $('[name="url_update_jadwal"]').val()
    form_jadwal.on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: url_update_jadwal,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            // beforeSend: function() {
            //     $('.btn_jadwal').attr("disabled", true);
            // },
            success: function(response) {
                if (response == 'gagal1') {
                    $("#validasi_jadwal1").css({
                        "background-color": "red",
                    });
                } else if (response == 'gagal2') {
                    $("#validasi_jadwal2").css({
                        "background-color": "red",
                    });
                } else if (response == 'gagal3') {
                    $("#validasi_jadwal3").css({
                        "background-color": "red",
                    });
                } else if (response == 'gagal4') {
                    $("#validasi_jadwal4").css({
                        "background-color": "red",
                    });
                } else if (response == 'gagal5') {
                    $("#validasi_jadwal5").css({
                        "background-color": "red",
                    });
                } else if (response == 'gagal6') {
                    $("#validasi_jadwal6").css({
                        "background-color": "red",
                    });
                } else {
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
                            $('.btn_jadwal').attr("disabled", false);
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
</script>

<!-- jenis kontrak, pembebanan tahun anggaran, bobot penilaian -->
<script>
    function jenis_kontrak(type) {
        var jenis_kontrak = $('[name="jenis_kontrak"]').val();
        var url_update_rup2 = $('[name="url_update_rup2"]').val();
        var id_rup_global = $('[name="id_rup_global"]').val();
        $.ajax({
            type: "POST",
            url: url_update_rup2,
            data: {
                id_rup: id_rup_global,
                type: type,
                jenis_kontrak: jenis_kontrak
            },
            dataType: "JSON",
            success: function(response) {

            }
        })
    }
    function beban_anggaran(type) {
        var beban_tahun_anggaran = $('[name="beban_tahun_anggaran"]').val();
        var url_update_rup2 = $('[name="url_update_rup2"]').val();
        var id_rup_global = $('[name="id_rup_global"]').val();
        $.ajax({
            type: "POST",
            url: url_update_rup2,
            data: {
                id_rup: id_rup_global,
                type: type,
                beban_tahun_anggaran: beban_tahun_anggaran
            },
            dataType: "JSON",
            success: function(response) {

            }
        })
    }

    function penilaian() {
        var bobot_nilai = $('[name="bobot_nilai"]').val();
        var url_update_live_rup = $('[name="url_update_live_rup"]').val();
        var id_rup_global = $('[name="id_rup_global"]').val();

        if (bobot_nilai == 1) {
            $('[name="bobot_teknis"]').attr("readonly", false);
            $('[name="bobot_biaya"]').attr("readonly", false);
            $('[name="bobot_teknis"]').removeClass("bg-light");
            $('[name="bobot_biaya"]').removeClass("bg-light");
            $('[name="bobot_biaya"]').val(0);
            $('[name="bobot_teknis"]').val(0);
            $.ajax({
                type: "POST",
                url: url_update_live_rup,
                data: {
                    id_rup: id_rup_global,
                    bobot_nilai: bobot_nilai,
                    bobot_biaya: 0,
                    bobot_teknis: 0
                },
                dataType: "JSON",
                success: function(response) {

                }
            })
        } else if (bobot_nilai == 2) {
            $('[name="bobot_teknis"]').attr("readonly", true);
            $('[name="bobot_biaya"]').addClass("bg-light");
            $('[name="bobot_teknis"]').addClass("bg-light");
            $('[name="bobot_biaya"]').attr("readonly", true);
            $('[name="bobot_biaya"]').val(100);
            $('[name="bobot_teknis"]').val(0);
            $.ajax({
                type: "POST",
                url: url_update_live_rup,
                data: {
                    id_rup: id_rup_global,
                    bobot_nilai: bobot_nilai,
                    bobot_biaya: 100,
                    bobot_teknis: 0
                },
                dataType: "JSON",
                success: function(response) {

                }
            })
        }

        location.reload()

    }

    function bobot_biaya() {
        var bobot_biaya = $('[name="bobot_biaya"]').val();
        var url_update_live_rup = $('[name="url_update_live_rup"]').val();
        var id_rup_global = $('[name="id_rup_global"]').val();
        var bobot_teknis = $('[name="bobot_teknis"]').val();
        var total = parseFloat(bobot_biaya) + parseFloat(bobot_teknis);
        if (total > 100) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Total Bobot Tidak Boleh Melebihi 100!',
            })
            $('[name="bobot_biaya"]').val('');
        } else {
            $.ajax({
                type: "POST",
                url: url_update_live_rup,
                data: {
                    id_rup: id_rup_global,
                    bobot_biaya: bobot_biaya
                },
                dataType: "JSON",
                success: function(response) {

                }
            })
        }

    }

    function bobot_teknis() {
        var bobot_teknis = $('[name="bobot_teknis"]').val();
        var url_update_live_rup = $('[name="url_update_live_rup"]').val();
        var id_rup_global = $('[name="id_rup_global"]').val();
        var bobot_biaya = $('[name="bobot_biaya"]').val();
        var total = parseFloat(bobot_biaya) + parseFloat(bobot_teknis);
        if (total > 100) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Total Bobot Tidak Boleh Melebihi 100!',
            })
            $('[name="bobot_teknis"]').val('');
        } else {
            $.ajax({
                type: "POST",
                url: url_update_live_rup,
                data: {
                    id_rup: id_rup_global,
                    bobot_teknis: bobot_teknis
                },
                dataType: "JSON",
                success: function(response) {

                }
            })
        }

    }
</script>

<!-- INI UNTUK BAGIAN ADMINISTRASI PERSYARATAN SCRIPTNYA -->
<script>
    function kualifikasi_syart_tender() {
        var url_update_syarat_klasifikasi = $('[name="url_update_syarat_klasifikasi"]').val();
        var id_url_rup = $('[name="id_url_rup"]').val();
        var syarat_tender_kualifikasi = $('[name="syarat_tender_kualifikasi"]').val();
        $.ajax({
            type: "POST",
            url: url_update_syarat_klasifikasi,
            data: {
                id_url_rup: id_url_rup,
                syarat_tender_kualifikasi: syarat_tender_kualifikasi
            },
            dataType: "JSON",
            success: function(response) {
                $('[name="syarat_tender_kualifikasi"]').val(response['row_rup']['syarat_tender_kualifikasi']);
            }
        })
    }


    // SIUP
    $("#cek_siup").change(function() {
        var type_izin = 'siup';
        if (this.checked) {
            var url_update_syarat_izin_usaha_tender = $('[name="url_update_syarat_izin_usaha_tender"]').val();
            var id_url_rup = $('[name="id_url_rup"]').val();
            var sts_checked_siup = 1;
            var type = 'sts_checked_siup';
            $.ajax({
                type: "POST",
                url: url_update_syarat_izin_usaha_tender,
                data: {
                    id_url_rup: id_url_rup,
                    sts_checked_siup: sts_checked_siup,
                    type: type,
                    type_izin: type_izin
                },
                dataType: "JSON",
                success: function(response) {
                    $('[name="sts_checked_siup"]').val(response['row_syarat_izin_usah_tender']['sts_checked_siup']);
                }
            })
        } else {
            var url_update_syarat_izin_usaha_tender = $('[name="url_update_syarat_izin_usaha_tender"]').val();
            var id_url_rup = $('[name="id_url_rup"]').val();
            var sts_checked_siup = 0;
            var type = 'sts_checked_siup';
            $.ajax({
                type: "POST",
                url: url_update_syarat_izin_usaha_tender,
                data: {
                    id_url_rup: id_url_rup,
                    sts_checked_siup: sts_checked_siup,
                    type: type,
                    type_izin: type_izin
                },
                dataType: "JSON",
                success: function(response) {
                    $('[name="sts_checked_siup"]').val(response['row_syarat_izin_usah_tender']['sts_checked_siup']);
                    $('[name="sts_masa_berlaku_siup"]').val(response['row_syarat_izin_usah_tender']['sts_masa_berlaku_siup']);
                }
            })
        }
    });

    function pilih_syarat_izin_usaha_tender_siup() {
        var type_izin = 'siup';
        var url_update_syarat_izin_usaha_tender = $('[name="url_update_syarat_izin_usaha_tender"]').val();
        var id_url_rup = $('[name="id_url_rup"]').val();
        var sts_masa_berlaku_siup = $('[name="sts_masa_berlaku_siup"]').val();
        var tgl_berlaku_siup = $('[name="tgl_berlaku_siup"]').val();
        var type = 'sts_masa_berlaku_siup';
        $.ajax({
            type: "POST",
            url: url_update_syarat_izin_usaha_tender,
            data: {
                id_url_rup: id_url_rup,
                sts_masa_berlaku_siup: sts_masa_berlaku_siup,
                tgl_berlaku_siup: tgl_berlaku_siup,
                type: type,
                type_izin: type_izin
            },
            dataType: "JSON",
            success: function(response) {
                $('[name="sts_masa_berlaku_siup"]').val(response['row_syarat_izin_usah_tender']['sts_masa_berlaku_siup']);
                if (response['row_syarat_izin_usah_tender']['sts_masa_berlaku_siup'] == 1) {
                    $('[name="tgl_berlaku_siup"]').css('display', 'block');
                } else {
                    $('[name="tgl_berlaku_siup"]').css('display', 'none');
                }
            }
        })
    }

    function pilih_syarat_tanggal_izin_usaha_tender_siup() {
        var type_izin = 'siup';
        var url_update_syarat_izin_usaha_tender = $('[name="url_update_syarat_izin_usaha_tender"]').val();
        var id_url_rup = $('[name="id_url_rup"]').val();
        var tgl_berlaku_siup = $('[name="tgl_berlaku_siup"]').val();
        var type = 'tanggal_masa_berlaku_siup';
        $.ajax({
            type: "POST",
            url: url_update_syarat_izin_usaha_tender,
            data: {
                id_url_rup: id_url_rup,
                tgl_berlaku_siup: tgl_berlaku_siup,
                type: type,
                type_izin: type_izin
            },
            dataType: "JSON",
            success: function(response) {

            }
        })
    }


    // nib
    $("#cek_nib").change(function() {
        var type_izin = 'nib';
        if (this.checked) {
            var url_update_syarat_izin_usaha_tender = $('[name="url_update_syarat_izin_usaha_tender"]').val();
            var id_url_rup = $('[name="id_url_rup"]').val();
            var sts_checked_nib = 1;
            var type = 'sts_checked_nib';
            $.ajax({
                type: "POST",
                url: url_update_syarat_izin_usaha_tender,
                data: {
                    id_url_rup: id_url_rup,
                    sts_checked_nib: sts_checked_nib,
                    type: type,
                    type_izin: type_izin
                },
                dataType: "JSON",
                success: function(response) {
                    $('[name="sts_checked_nib"]').val(response['row_syarat_izin_usah_tender']['sts_checked_nib']);
                }
            })
        } else {
            var url_update_syarat_izin_usaha_tender = $('[name="url_update_syarat_izin_usaha_tender"]').val();
            var id_url_rup = $('[name="id_url_rup"]').val();
            var sts_checked_nib = 0;
            var type = 'sts_checked_nib';
            $.ajax({
                type: "POST",
                url: url_update_syarat_izin_usaha_tender,
                data: {
                    id_url_rup: id_url_rup,
                    sts_checked_nib: sts_checked_nib,
                    type: type,
                    type_izin: type_izin
                },
                dataType: "JSON",
                success: function(response) {
                    $('[name="sts_checked_nib"]').val(response['row_syarat_izin_usah_tender']['sts_checked_nib']);
                    $('[name="sts_masa_berlaku_nib"]').val(response['row_syarat_izin_usah_tender']['sts_masa_berlaku_nib']);
                }
            })
        }
    });

    function pilih_syarat_izin_usaha_tender_nib() {
        var type_izin = 'nib';
        var url_update_syarat_izin_usaha_tender = $('[name="url_update_syarat_izin_usaha_tender"]').val();
        var id_url_rup = $('[name="id_url_rup"]').val();
        var sts_masa_berlaku_nib = $('[name="sts_masa_berlaku_nib"]').val();
        var tgl_berlaku_nib = $('[name="tgl_berlaku_nib"]').val();
        var type = 'sts_masa_berlaku_nib';
        $.ajax({
            type: "POST",
            url: url_update_syarat_izin_usaha_tender,
            data: {
                id_url_rup: id_url_rup,
                sts_masa_berlaku_nib: sts_masa_berlaku_nib,
                tgl_berlaku_nib: tgl_berlaku_nib,
                type: type,
                type_izin: type_izin
            },
            dataType: "JSON",
            success: function(response) {
                $('[name="sts_masa_berlaku_nib"]').val(response['row_syarat_izin_usah_tender']['sts_masa_berlaku_nib']);
                if (response['row_syarat_izin_usah_tender']['sts_masa_berlaku_nib'] == 1) {
                    $('[name="tgl_berlaku_nib"]').css('display', 'block');
                } else {
                    $('[name="tgl_berlaku_nib"]').css('display', 'none');
                }
            }
        })
    }
    // nib
    function pilih_syarat_tanggal_izin_usaha_tender_nib() {
        var type_izin = 'nib';
        var url_update_syarat_izin_usaha_tender = $('[name="url_update_syarat_izin_usaha_tender"]').val();
        var id_url_rup = $('[name="id_url_rup"]').val();
        var tgl_berlaku_nib = $('[name="tgl_berlaku_nib"]').val();
        var type = 'tanggal_masa_berlaku_nib';
        $.ajax({
            type: "POST",
            url: url_update_syarat_izin_usaha_tender,
            data: {
                id_url_rup: id_url_rup,
                tgl_berlaku_nib: tgl_berlaku_nib,
                type: type,
                type_izin: type_izin
            },
            dataType: "JSON",
            success: function(response) {}
        })
    }



    // sbu
    $("#cek_sbu").change(function() {
        var type_izin = 'sbu';
        if (this.checked) {
            var url_update_syarat_izin_usaha_tender = $('[name="url_update_syarat_izin_usaha_tender"]').val();
            var id_url_rup = $('[name="id_url_rup"]').val();
            var sts_checked_sbu = 1;
            var type = 'sts_checked_sbu';
            $.ajax({
                type: "POST",
                url: url_update_syarat_izin_usaha_tender,
                data: {
                    id_url_rup: id_url_rup,
                    sts_checked_sbu: sts_checked_sbu,
                    type: type,
                    type_izin: type_izin
                },
                dataType: "JSON",
                success: function(response) {
                    $('[name="sts_checked_sbu"]').val(response['row_syarat_izin_usah_tender']['sts_checked_sbu']);
                }
            })
        } else {
            var url_update_syarat_izin_usaha_tender = $('[name="url_update_syarat_izin_usaha_tender"]').val();
            var id_url_rup = $('[name="id_url_rup"]').val();
            var sts_checked_sbu = 0;
            var type = 'sts_checked_sbu';
            $.ajax({
                type: "POST",
                url: url_update_syarat_izin_usaha_tender,
                data: {
                    id_url_rup: id_url_rup,
                    sts_checked_sbu: sts_checked_sbu,
                    type: type,
                    type_izin: type_izin
                },
                dataType: "JSON",
                success: function(response) {
                    $('[name="sts_checked_sbu"]').val(response['row_syarat_izin_usah_tender']['sts_checked_sbu']);
                    $('[name="sts_masa_berlaku_sbu"]').val(response['row_syarat_izin_usah_tender']['sts_masa_berlaku_sbu']);
                }
            })
        }
    });

    function pilih_syarat_izin_usaha_tender_sbu() {
        var type_izin = 'sbu';
        var url_update_syarat_izin_usaha_tender = $('[name="url_update_syarat_izin_usaha_tender"]').val();
        var id_url_rup = $('[name="id_url_rup"]').val();
        var sts_masa_berlaku_sbu = $('[name="sts_masa_berlaku_sbu"]').val();
        var tgl_berlaku_sbu = $('[name="tgl_berlaku_sbu"]').val();
        var type = 'sts_masa_berlaku_sbu';
        $.ajax({
            type: "POST",
            url: url_update_syarat_izin_usaha_tender,
            data: {
                id_url_rup: id_url_rup,
                sts_masa_berlaku_sbu: sts_masa_berlaku_sbu,
                tgl_berlaku_sbu: tgl_berlaku_sbu,
                type: type,
                type_izin: type_izin
            },
            dataType: "JSON",
            success: function(response) {
                $('[name="sts_masa_berlaku_sbu"]').val(response['row_syarat_izin_usah_tender']['sts_masa_berlaku_sbu']);
                if (response['row_syarat_izin_usah_tender']['sts_masa_berlaku_sbu'] == 1) {
                    $('[name="tgl_berlaku_sbu"]').css('display', 'block');
                } else {
                    $('[name="tgl_berlaku_sbu"]').css('display', 'none');
                }
            }
        })
    }

    // sbu
    function pilih_syarat_tanggal_izin_usaha_tender_sbu() {
        var type_izin = 'sbu';
        var url_update_syarat_izin_usaha_tender = $('[name="url_update_syarat_izin_usaha_tender"]').val();
        var id_url_rup = $('[name="id_url_rup"]').val();
        var tgl_berlaku_sbu = $('[name="tgl_berlaku_sbu"]').val();
        var type = 'tanggal_masa_berlaku_sbu';
        $.ajax({
            type: "POST",
            url: url_update_syarat_izin_usaha_tender,
            data: {
                id_url_rup: id_url_rup,
                tgl_berlaku_sbu: tgl_berlaku_sbu,
                type: type,
                type_izin: type_izin
            },
            dataType: "JSON",
            success: function(response) {}
        })
    }


    // siujk
    $("#cek_siujk").change(function() {
        var type_izin = 'siujk';
        if (this.checked) {
            var url_update_syarat_izin_usaha_tender = $('[name="url_update_syarat_izin_usaha_tender"]').val();
            var id_url_rup = $('[name="id_url_rup"]').val();
            var sts_checked_siujk = 1;
            var type = 'sts_checked_siujk';
            $.ajax({
                type: "POST",
                url: url_update_syarat_izin_usaha_tender,
                data: {
                    id_url_rup: id_url_rup,
                    sts_checked_siujk: sts_checked_siujk,
                    type: type,
                    type_izin: type_izin
                },
                dataType: "JSON",
                success: function(response) {
                    $('[name="sts_checked_siujk"]').val(response['row_syarat_izin_usah_tender']['sts_checked_siujk']);
                }
            })
        } else {
            var url_update_syarat_izin_usaha_tender = $('[name="url_update_syarat_izin_usaha_tender"]').val();
            var id_url_rup = $('[name="id_url_rup"]').val();
            var sts_checked_siujk = 0;
            var type = 'sts_checked_siujk';
            $.ajax({
                type: "POST",
                url: url_update_syarat_izin_usaha_tender,
                data: {
                    id_url_rup: id_url_rup,
                    sts_checked_siujk: sts_checked_siujk,
                    type: type,
                    type_izin: type_izin
                },
                dataType: "JSON",
                success: function(response) {
                    $('[name="sts_checked_siujk"]').val(response['row_syarat_izin_usah_tender']['sts_checked_siujk']);
                    $('[name="sts_masa_berlaku_siujk"]').val(response['row_syarat_izin_usah_tender']['sts_masa_berlaku_siujk']);
                }
            })
        }
    });

    function pilih_syarat_izin_usaha_tender_siujk() {
        var type_izin = 'siujk';
        var url_update_syarat_izin_usaha_tender = $('[name="url_update_syarat_izin_usaha_tender"]').val();
        var id_url_rup = $('[name="id_url_rup"]').val();
        var sts_masa_berlaku_siujk = $('[name="sts_masa_berlaku_siujk"]').val();
        var tgl_berlaku_siujk = $('[name="tgl_berlaku_siujk"]').val();
        var type = 'sts_masa_berlaku_siujk';
        $.ajax({
            type: "POST",
            url: url_update_syarat_izin_usaha_tender,
            data: {
                id_url_rup: id_url_rup,
                sts_masa_berlaku_siujk: sts_masa_berlaku_siujk,
                tgl_berlaku_siujk: tgl_berlaku_siujk,
                type: type,
                type_izin: type_izin
            },
            dataType: "JSON",
            success: function(response) {
                $('[name="sts_masa_berlaku_siujk"]').val(response['row_syarat_izin_usah_tender']['sts_masa_berlaku_siujk']);
                if (response['row_syarat_izin_usah_tender']['sts_masa_berlaku_siujk'] == 1) {
                    $('[name="tgl_berlaku_siujk"]').css('display', 'block');
                } else {
                    $('[name="tgl_berlaku_siujk"]').css('display', 'none');
                }
            }
        })
    }


    // siujk
    function pilih_syarat_tanggal_izin_usaha_tender_siujk() {
        var type_izin = 'siujk';
        var url_update_syarat_izin_usaha_tender = $('[name="url_update_syarat_izin_usaha_tender"]').val();
        var id_url_rup = $('[name="id_url_rup"]').val();
        var tgl_berlaku_siujk = $('[name="tgl_berlaku_siujk"]').val();
        var type = 'tanggal_masa_berlaku_siujk';
        $.ajax({
            type: "POST",
            url: url_update_syarat_izin_usaha_tender,
            data: {
                id_url_rup: id_url_rup,
                tgl_berlaku_siujk: tgl_berlaku_siujk,
                type: type,
                type_izin: type_izin
            },
            dataType: "JSON",
            success: function(response) {}
        })
    }


    // skdp
    $("#cek_skdp").change(function() {
        var type_izin = 'skdp';
        if (this.checked) {
            var url_update_syarat_izin_usaha_tender = $('[name="url_update_syarat_izin_usaha_tender"]').val();
            var id_url_rup = $('[name="id_url_rup"]').val();
            var sts_checked_skdp = 1;
            var type = 'sts_checked_skdp';
            $.ajax({
                type: "POST",
                url: url_update_syarat_izin_usaha_tender,
                data: {
                    id_url_rup: id_url_rup,
                    sts_checked_skdp: sts_checked_skdp,
                    type: type,
                    type_izin: type_izin
                },
                dataType: "JSON",
                success: function(response) {
                    $('[name="sts_checked_skdp"]').val(response['row_syarat_izin_usah_tender']['sts_checked_skdp']);
                }
            })
        } else {
            var url_update_syarat_izin_usaha_tender = $('[name="url_update_syarat_izin_usaha_tender"]').val();
            var id_url_rup = $('[name="id_url_rup"]').val();
            var sts_checked_skdp = 0;
            var type = 'sts_checked_skdp';
            $.ajax({
                type: "POST",
                url: url_update_syarat_izin_usaha_tender,
                data: {
                    id_url_rup: id_url_rup,
                    sts_checked_skdp: sts_checked_skdp,
                    type: type,
                    type_izin: type_izin
                },
                dataType: "JSON",
                success: function(response) {
                    $('[name="sts_checked_skdp"]').val(response['row_syarat_izin_usah_tender']['sts_checked_skdp']);
                    $('[name="sts_masa_berlaku_skdp"]').val(response['row_syarat_izin_usah_tender']['sts_masa_berlaku_skdp']);
                }
            })
        }
    });

    function pilih_syarat_izin_usaha_tender_skdp() {
        var type_izin = 'skdp';
        var url_update_syarat_izin_usaha_tender = $('[name="url_update_syarat_izin_usaha_tender"]').val();
        var id_url_rup = $('[name="id_url_rup"]').val();
        var sts_masa_berlaku_skdp = $('[name="sts_masa_berlaku_skdp"]').val();
        var tgl_berlaku_skdp = $('[name="tgl_berlaku_skdp"]').val();
        var type = 'sts_masa_berlaku_skdp';
        $.ajax({
            type: "POST",
            url: url_update_syarat_izin_usaha_tender,
            data: {
                id_url_rup: id_url_rup,
                sts_masa_berlaku_skdp: sts_masa_berlaku_skdp,
                tgl_berlaku_skdp: tgl_berlaku_skdp,
                type: type,
                type_izin: type_izin
            },
            dataType: "JSON",
            success: function(response) {
                $('[name="sts_masa_berlaku_skdp"]').val(response['row_syarat_izin_usah_tender']['sts_masa_berlaku_skdp']);
                if (response['row_syarat_izin_usah_tender']['sts_masa_berlaku_skdp'] == 1) {
                    $('[name="tgl_berlaku_skdp"]').css('display', 'block');
                } else {
                    $('[name="tgl_berlaku_skdp"]').css('display', 'none');
                }
            }
        })
    }


    // skdp
    function pilih_syarat_tanggal_izin_usaha_tender_skdp() {
        var type_izin = 'skdp';
        var url_update_syarat_izin_usaha_tender = $('[name="url_update_syarat_izin_usaha_tender"]').val();
        var id_url_rup = $('[name="id_url_rup"]').val();
        var tgl_berlaku_skdp = $('[name="tgl_berlaku_skdp"]').val();
        var type = 'tanggal_masa_berlaku_skdp';
        $.ajax({
            type: "POST",
            url: url_update_syarat_izin_usaha_tender,
            data: {
                id_url_rup: id_url_rup,
                tgl_berlaku_skdp: tgl_berlaku_skdp,
                type: type,
                type_izin: type_izin
            },
            dataType: "JSON",
            success: function(response) {}
        })
    }

    // INI UNTUK SYARAT KBLI
    $(document).ready(function() {
        $('#table_kbli_syarat_tender').DataTable({
            info: true,
            ordering: true,
            paging: true
        });
    });

    function simpan_syarat_kbli() {
        var url_get_tambah_syarat_kbli = $('[name="url_get_tambah_syarat_kbli"]').val();
        var id_url_rup = $('[name="id_url_rup"]').val();
        var nama_kbli = $('[name="nama_kbli"]').val();
        if (nama_kbli == 0) {
            Swal.fire('Anda Belum Memilih Kbli!', '', 'warning')
        } else if (nama_kbli == '') {
            Swal.fire('Anda Belum Memilih Kbli!', '', 'warning')
        } else {
            $.ajax({
                type: "POST",
                url: url_get_tambah_syarat_kbli,
                data: {
                    id_url_rup: id_url_rup,
                    nama_kbli: nama_kbli,
                },
                dataType: "JSON",
                success: function(response) {
                    if (response['error']) {
                        var responkbli = '' + response['error']['id_kbli'] + '';
                        Swal.fire(responkbli, '', 'warning')
                        get_syarat_kbli()
                        $('[name="nama_kbli"]').val(0);
                    } else {
                        Swal.fire('Data Berhasil Di Tambah!', '', 'success')
                        get_syarat_kbli()
                        $('[name="nama_kbli"]').val(0);
                    }
                }
            })
        }
    }
    get_syarat_kbli()

    function get_syarat_kbli() {
        var url_get_syarat_kbli_tender = $('[name="url_get_syarat_kbli_tender"]').val();
        var id_url_rup = $('[name="id_url_rup"]').val();
        var id_kbli = $('[name="id_kbli"]').val();
        $.ajax({
            type: "POST",
            url: url_get_syarat_kbli_tender,
            data: {
                id_url_rup: id_url_rup,
                id_kbli: id_kbli,
            },
            dataType: "JSON",
            success: function(response) {
                // get sumber dana
                var html = '';
                var i;
                for (i = 0; i < response['result_syarat_tender_kbli'].length; i++) {
                    html += '<tr>' +
                        '<td>' + response['result_syarat_tender_kbli'][i].nama_kbli + '</td>' +
                        '<td><a href="javascript:;" onclick="hapus_kbli_syarat(' + response['result_syarat_tender_kbli'][i].id_syarat_kbli_tender + ')" class="btn btn-sm btn-danger"><i class="fas fa fa-trash"></i> Hapus</a></td>' +
                        '</tr>'
                }
                $('#result_tbl_kbli_syarat_tender').html(html);
            }
        })
    }

    function hapus_kbli_syarat(id_syarat_kbli_tender) {
        var url_hapus_syarat_kbli = $('[name="url_hapus_syarat_kbli"]').val()
        Swal.fire({
            title: 'Apakah Anda Yakin Ingin Menghapus',
            text: 'Syarat Kbli Ini ??',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Jangan Hapus!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: url_hapus_syarat_kbli,
                    data: {
                        id_syarat_kbli_tender: id_syarat_kbli_tender,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        Swal.fire('Data Berhasil Di Hapus!', '', 'success')
                        get_syarat_kbli()
                    }
                })

            }
        })
    }

    // INI UNTUK SYARAT SBU
    $(document).ready(function() {
        $('#table_sbu_syarat_tender').DataTable({
            info: true,
            ordering: true,
            paging: true
        });
    });

    function simpan_syarat_sbu() {
        var url_get_tambah_syarat_sbu = $('[name="url_get_tambah_syarat_sbu"]').val();
        var id_url_rup = $('[name="id_url_rup"]').val();
        var nama_sbu = $('[name="nama_sbu"]').val();
        if (nama_sbu == '') {
            Swal.fire('Anda Belum Memilih Sbu!', '', 'warning')
        } else if (nama_sbu == 0) {
            Swal.fire('Anda Belum Memilih Sbu!', '', 'warning')
        } else {
            $.ajax({
                type: "POST",
                url: url_get_tambah_syarat_sbu,
                data: {
                    id_url_rup: id_url_rup,
                    nama_sbu: nama_sbu,
                },
                dataType: "JSON",
                success: function(response) {
                    if (response['error']) {
                        var responsbu = '' + response['error']['id_sbu'] + '';
                        Swal.fire(responsbu, '', 'warning')
                        get_syarat_sbu()
                        var nama_sbu = $('[name="nama_sbu"]').val('');
                    } else {
                        Swal.fire('Data Berhasil Di Tambah!', '', 'success')
                        get_syarat_sbu()
                        var nama_sbu = $('[name="nama_sbu"]').val('');
                    }
                }
            })
        }
    }
    get_syarat_sbu()

    function get_syarat_sbu() {
        var url_get_syarat_sbu_tender = $('[name="url_get_syarat_sbu_tender"]').val();
        var id_url_rup = $('[name="id_url_rup"]').val();
        var id_sbu = $('[name="id_sbu"]').val();
        $.ajax({
            type: "POST",
            url: url_get_syarat_sbu_tender,
            data: {
                id_url_rup: id_url_rup,
                id_sbu: id_sbu,
            },
            dataType: "JSON",
            success: function(response) {
                // get sumber dana
                var html = '';
                var i;
                for (i = 0; i < response['result_syarat_tender_sbu'].length; i++) {
                    html += '<tr>' +
                        '<td>' + response['result_syarat_tender_sbu'][i].nama_sbu + '</td>' +
                        '<td><a href="javascript:;" onclick="hapus_sbu_syarat(' + response['result_syarat_tender_sbu'][i].id_syarat_sbu_tender + ')" class="btn btn-sm btn-danger"><i class="fas fa fa-trash"></i> Hapus</a></td>' +
                        '</tr>'
                }
                $('#result_tbl_sbu_syarat_tender').html(html);
            }
        })
    }

    function hapus_sbu_syarat(id_syarat_sbu_tender) {
        var url_hapus_syarat_sbu = $('[name="url_hapus_syarat_sbu"]').val()
        Swal.fire({
            title: 'Apakah Anda Yakin Ingin Menghapus',
            text: 'Syarat sbu Ini ??',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Jangan Hapus!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: url_hapus_syarat_sbu,
                    data: {
                        id_syarat_sbu_tender: id_syarat_sbu_tender,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        Swal.fire('Data Berhasil Di Hapus!', '', 'success')
                        get_syarat_sbu()
                    }
                })

            }
        })
    }

    // INI UNTUK SYARAT TEKNIS ADMINISTRASI
    // pengalaman pekerjaan
    $("#sts_checked_pengalaman_pekerjaan").change(function() {
        if (this.checked) {
            var url_update_syarat_izin_teknis_tender = $('[name="url_update_syarat_izin_teknis_tender"]').val();
            var id_url_rup = $('[name="id_url_rup"]').val();
            var sts_checked_pengalaman_pekerjaan = 1;
            var type = 'sts_checked_pengalaman_pekerjaan';
            $.ajax({
                type: "POST",
                url: url_update_syarat_izin_teknis_tender,
                data: {
                    id_url_rup: id_url_rup,
                    sts_checked_pengalaman_pekerjaan: sts_checked_pengalaman_pekerjaan,
                    type: type
                },
                dataType: "JSON",
                success: function(response) {
                    $('[name="sts_checked_pengalaman_pekerjaan"]').val(response['row_syarat_izin_teknis_tender']['sts_checked_pengalaman_pekerjaan']);
                }
            })
        } else {
            var url_update_syarat_izin_teknis_tender = $('[name="url_update_syarat_izin_teknis_tender"]').val();
            var id_url_rup = $('[name="id_url_rup"]').val();
            var sts_checked_pengalaman_pekerjaan = 0;
            var type = 'sts_checked_pengalaman_pekerjaan';
            $.ajax({
                type: "POST",
                url: url_update_syarat_izin_teknis_tender,
                data: {
                    id_url_rup: id_url_rup,
                    sts_checked_pengalaman_pekerjaan: sts_checked_pengalaman_pekerjaan,
                    type: type
                },
                dataType: "JSON",
                success: function(response) {
                    $('[name="sts_checked_pengalaman_pekerjaan"]').val(response['row_syarat_izin_teknis_tender']['sts_checked_pengalaman_pekerjaan']);
                }
            })
        }
    });
    // spt
    $("#sts_checked_spt").change(function() {
        if (this.checked) {
            var url_update_syarat_izin_teknis_tender = $('[name="url_update_syarat_izin_teknis_tender"]').val();
            var id_url_rup = $('[name="id_url_rup"]').val();
            var sts_checked_spt = 1;
            var type = 'sts_checked_spt';
            $.ajax({
                type: "POST",
                url: url_update_syarat_izin_teknis_tender,
                data: {
                    id_url_rup: id_url_rup,
                    sts_checked_spt: sts_checked_spt,
                    type: type
                },
                dataType: "JSON",
                success: function(response) {
                    $('[name="sts_checked_spt"]').val(response['row_syarat_izin_teknis_tender']['sts_checked_spt']);
                    $('[name="tahun_lapor_spt"]').val(response['row_syarat_izin_teknis_tender']['tahun_lapor_spt']);
                }
            })
        } else {
            var url_update_syarat_izin_teknis_tender = $('[name="url_update_syarat_izin_teknis_tender"]').val();
            var id_url_rup = $('[name="id_url_rup"]').val();
            var sts_checked_spt = 0;
            var type = 'sts_checked_spt';
            $.ajax({
                type: "POST",
                url: url_update_syarat_izin_teknis_tender,
                data: {
                    id_url_rup: id_url_rup,
                    sts_checked_spt: sts_checked_spt,
                    type: type
                },
                dataType: "JSON",
                success: function(response) {
                    $('[name="sts_checked_spt"]').val(response['row_syarat_izin_teknis_tender']['sts_checked_spt']);
                    $('[name="tahun_lapor_spt"]').val(2020);
                }
            })
        }
    });

    function pilih_tahun_lapor_spt() {
        var url_update_syarat_izin_teknis_tender = $('[name="url_update_syarat_izin_teknis_tender"]').val();
        var id_url_rup = $('[name="id_url_rup"]').val();
        var tahun_lapor_spt = $('[name="tahun_lapor_spt"]').val();
        var type = 'tahun_lapor_spt';
        $.ajax({
            type: "POST",
            url: url_update_syarat_izin_teknis_tender,
            data: {
                id_url_rup: id_url_rup,
                tahun_lapor_spt: tahun_lapor_spt,
                type: type
            },
            dataType: "JSON",
            success: function(response) {
                $('[name="tahun_lapor_spt"]').val(response['row_syarat_izin_teknis_tender']['tahun_lapor_spt']);
            }
        })
    }

    // Laporan Keuangan
    $("#sts_checked_laporan_keuangan").change(function() {
        if (this.checked) {
            var url_update_syarat_izin_teknis_tender = $('[name="url_update_syarat_izin_teknis_tender"]').val();
            var id_url_rup = $('[name="id_url_rup"]').val();
            var sts_checked_laporan_keuangan = 1;
            var type = 'sts_checked_laporan_keuangan';
            $.ajax({
                type: "POST",
                url: url_update_syarat_izin_teknis_tender,
                data: {
                    id_url_rup: id_url_rup,
                    sts_checked_laporan_keuangan: sts_checked_laporan_keuangan,
                    type: type
                },
                dataType: "JSON",
                success: function(response) {
                    $('[name="sts_checked_laporan_keuangan"]').val(response['row_syarat_izin_teknis_tender']['sts_checked_laporan_keuangan']);
                }
            })
        } else {
            var url_update_syarat_izin_teknis_tender = $('[name="url_update_syarat_izin_teknis_tender"]').val();
            var id_url_rup = $('[name="id_url_rup"]').val();
            var sts_checked_laporan_keuangan = 0;
            var type = 'sts_checked_laporan_keuangan';
            $.ajax({
                type: "POST",
                url: url_update_syarat_izin_teknis_tender,
                data: {
                    id_url_rup: id_url_rup,
                    sts_checked_laporan_keuangan: sts_checked_laporan_keuangan,
                    type: type
                },
                dataType: "JSON",
                success: function(response) {
                    $('[name="sts_checked_laporan_keuangan"]').val(response['row_syarat_izin_teknis_tender']['sts_checked_laporan_keuangan']);
                }
            })
        }
    });

    function pilih_sts_audit_laporan_keuangan() {
        var url_update_syarat_izin_teknis_tender = $('[name="url_update_syarat_izin_teknis_tender"]').val();
        var id_url_rup = $('[name="id_url_rup"]').val();
        var sts_audit_laporan_keuangan = $('[name="sts_audit_laporan_keuangan"]').val();
        var type = 'sts_audit_laporan_keuangan';
        $.ajax({
            type: "POST",
            url: url_update_syarat_izin_teknis_tender,
            data: {
                id_url_rup: id_url_rup,
                sts_audit_laporan_keuangan: sts_audit_laporan_keuangan,
                type: type
            },
            dataType: "JSON",
            success: function(response) {
                $('[name="sts_audit_laporan_keuangan"]').val(response['row_syarat_izin_teknis_tender']['sts_audit_laporan_keuangan']);
            }
        })
    }

    function pilih_tahun_awal_laporan_keuangan() {
        var url_update_syarat_izin_teknis_tender = $('[name="url_update_syarat_izin_teknis_tender"]').val();
        var id_url_rup = $('[name="id_url_rup"]').val();
        var tahun_awal_laporan_keuangan = $('[name="tahun_awal_laporan_keuangan"]').val();
        var type = 'tahun_awal_laporan_keuangan';
        $.ajax({
            type: "POST",
            url: url_update_syarat_izin_teknis_tender,
            data: {
                id_url_rup: id_url_rup,
                tahun_awal_laporan_keuangan: tahun_awal_laporan_keuangan,
                type: type
            },
            dataType: "JSON",
            success: function(response) {
                $('[name="tahun_awal_laporan_keuangan"]').val(response['row_syarat_izin_teknis_tender']['tahun_awal_laporan_keuangan']);
            }
        })
    }

    function pilih_tahun_akhir_laporan_keuangan() {
        var url_update_syarat_izin_teknis_tender = $('[name="url_update_syarat_izin_teknis_tender"]').val();
        var id_url_rup = $('[name="id_url_rup"]').val();
        var tahun_akhir_laporan_keuangan = $('[name="tahun_akhir_laporan_keuangan"]').val();
        var type = 'tahun_akhir_laporan_keuangan';
        $.ajax({
            type: "POST",
            url: url_update_syarat_izin_teknis_tender,
            data: {
                id_url_rup: id_url_rup,
                tahun_akhir_laporan_keuangan: tahun_akhir_laporan_keuangan,
                type: type
            },
            dataType: "JSON",
            success: function(response) {
                $('[name="tahun_akhir_laporan_keuangan"]').val(response['row_syarat_izin_teknis_tender']['tahun_akhir_laporan_keuangan']);
            }
        })
    }

    // Neraca Keuangan
    $("#sts_checked_neraca_keuangan").change(function() {
        if (this.checked) {
            var url_update_syarat_izin_teknis_tender = $('[name="url_update_syarat_izin_teknis_tender"]').val();
            var id_url_rup = $('[name="id_url_rup"]').val();
            var sts_checked_neraca_keuangan = 1;
            var type = 'sts_checked_neraca_keuangan';
            $.ajax({
                type: "POST",
                url: url_update_syarat_izin_teknis_tender,
                data: {
                    id_url_rup: id_url_rup,
                    sts_checked_neraca_keuangan: sts_checked_neraca_keuangan,
                    type: type
                },
                dataType: "JSON",
                success: function(response) {
                    $('[name="sts_checked_neraca_keuangan"]').val(response['row_syarat_izin_teknis_tender']['sts_checked_neraca_keuangan']);
                }
            })
        } else {
            var url_update_syarat_izin_teknis_tender = $('[name="url_update_syarat_izin_teknis_tender"]').val();
            var id_url_rup = $('[name="id_url_rup"]').val();
            var sts_checked_neraca_keuangan = 0;
            var type = 'sts_checked_neraca_keuangan';
            $.ajax({
                type: "POST",
                url: url_update_syarat_izin_teknis_tender,
                data: {
                    id_url_rup: id_url_rup,
                    sts_checked_neraca_keuangan: sts_checked_neraca_keuangan,
                    type: type
                },
                dataType: "JSON",
                success: function(response) {
                    $('[name="sts_checked_neraca_keuangan"]').val(response['row_syarat_izin_teknis_tender']['sts_checked_neraca_keuangan']);
                }
            })
        }
    });

    function pilih_tahun_awal_neraca_keuangan() {
        var url_update_syarat_izin_teknis_tender = $('[name="url_update_syarat_izin_teknis_tender"]').val();
        var id_url_rup = $('[name="id_url_rup"]').val();
        var tahun_awal_neraca_keuangan = $('[name="tahun_awal_neraca_keuangan"]').val();
        var type = 'tahun_awal_neraca_keuangan';
        $.ajax({
            type: "POST",
            url: url_update_syarat_izin_teknis_tender,
            data: {
                id_url_rup: id_url_rup,
                tahun_awal_neraca_keuangan: tahun_awal_neraca_keuangan,
                type: type
            },
            dataType: "JSON",
            success: function(response) {
                $('[name="tahun_awal_neraca_keuangan"]').val(response['row_syarat_izin_teknis_tender']['tahun_awal_neraca_keuangan']);
            }
        })
    }

    function pilih_tahun_akhir_neraca_keuangan() {
        var url_update_syarat_izin_teknis_tender = $('[name="url_update_syarat_izin_teknis_tender"]').val();
        var id_url_rup = $('[name="id_url_rup"]').val();
        var tahun_akhir_neraca_keuangan = $('[name="tahun_akhir_neraca_keuangan"]').val();
        var type = 'tahun_akhir_neraca_keuangan';
        $.ajax({
            type: "POST",
            url: url_update_syarat_izin_teknis_tender,
            data: {
                id_url_rup: id_url_rup,
                tahun_akhir_neraca_keuangan: tahun_akhir_neraca_keuangan,
                type: type
            },
            dataType: "JSON",
            success: function(response) {
                $('[name="tahun_akhir_neraca_keuangan"]').val(response['row_syarat_izin_teknis_tender']['tahun_akhir_neraca_keuangan']);
            }
        })
    }

    // DOKUMEN PENGADAAAN
    load_dok_pengadaan()

    function load_dok_pengadaan() {
        var url_get_dok_pengadaan = $('[name="url_get_dok_pengadaan"]').val()
        var id_rup_global = $('[name="id_rup_global"]').val()
        var open_dokumen_pengadaan = $('[name="open_dokumen_pengadaan"]').val()
        $.ajax({
            type: "GET",
            url: url_get_dok_pengadaan + id_rup_global,
            dataType: "JSON",
            success: function(response) {
                var html = '';
                var i;
                for (i = 0; i < response['dok_pengadaan'].length; i++) {
                    html += '<tr>' +
                        '<td>' + response['dok_pengadaan'][i].nama_dok_pengadaan + '</td>' +
                        '<td>' + '  <a target="_blank" href="' + open_dokumen_pengadaan + response['dok_pengadaan'][i].file_dok_pengadaan + '" class="btn btn-sm btn-danger">' +
                        '<i class="fa-solid fa-folder-open"></i>' +
                        ' File Dokumen' +
                        '</a>' + '</td>' +
                        '<td style="text-align:center;">' +
                        '<a href="javascript:;" onclick="hapus_dok_pengadaan(' + response['dok_pengadaan'][i].id_dokumen_pengadaan + ')" class="btn btn-danger btn-sm" > <i class="fa-solid fa-trash"></i></a>' +
                        '</td>' +
                        '</tr>';
                }
                $('#tbl_dok_pengadaan').html(html)
            }
        })
    }

    function hapus_dok_pengadaan(id_dokumen_pengadaan) {
        var url_hapus_dok_pengadaan = $('[name="url_hapus_dok_pengadaan"]').val()
        Swal.fire({
            title: 'Apakah Anda Yakin Ingin Menghapus',
            text: 'Dokumen Pengadaaan Ini ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: url_hapus_dok_pengadaan,
                    data: {
                        id_dokumen_pengadaan: id_dokumen_pengadaan,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        Swal.fire('Data Berhasil Di Hapus!', '', 'success')
                        load_dok_pengadaan()
                    }
                })

            }
        })
    }

    load_dok_prakualifikasi()

    function load_dok_prakualifikasi() {
        var url_get_dok_prakualifikasi = $('[name="url_get_dok_prakualifikasi"]').val()
        var id_rup_global = $('[name="id_rup_global"]').val()
        var open_dokumen_prakualifikasi = $('[name="open_dokumen_prakualifikasi"]').val()
        $.ajax({
            type: "GET",
            url: url_get_dok_prakualifikasi + id_rup_global,
            dataType: "JSON",
            success: function(response) {
                var html = '';
                var i;
                for (i = 0; i < response['dok_prakualifikasi'].length; i++) {
                    html += '<tr>' +
                        '<td>' + response['dok_prakualifikasi'][i].nama_dok_prakualifikasi + '</td>' +
                        '<td>' + '<a target="_blank" href="' + open_dokumen_prakualifikasi + response['dok_prakualifikasi'][i].file_dok_prakualifikasi + '" class="btn btn-sm btn-danger">' +
                        '<i class="fa-solid fa-folder-open"></i>' +
                        ' File Dokumen' +
                        '</a>' + '</td>' +
                        '<td style="text-align:center;">' +
                        '<a href="javascript:;" onclick="hapus_dok_prakualifikasi(' + response['dok_prakualifikasi'][i].id_dokumen_prakualifikasi + ')" class="btn btn-danger btn-sm" > <i class="fa-solid fa-trash"></i></a>' +
                        '</td>' +
                        '</tr>';
                }
                $('#tbl_prakualifikasi').html(html)
            }
        })
    }

    function hapus_dok_prakualifikasi(id_dokumen_prakualifikasi) {
        var url_hapus_dok_prakualifikasi = $('[name="url_hapus_dok_prakualifikasi"]').val()
        Swal.fire({
            title: 'Apakah Anda Yakin Ingin Menghapus',
            text: 'Dokumen Pengadaaan Ini ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: url_hapus_dok_prakualifikasi,
                    data: {
                        id_dokumen_prakualifikasi: id_dokumen_prakualifikasi,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        Swal.fire('Data Berhasil Di Hapus!', '', 'success')
                        load_dok_prakualifikasi()
                    }
                })

            }
        })
    }

    var form_dokumen_pengadaan = $('#form_dokumen_pengadaan')
    form_dokumen_pengadaan.on('submit', function(e) {
        var url_dokumen_pengadaan = $('[name="url_dokumen_pengadaan"]').val();
        var file_dok_pengadaan = $('[name="file_dok_pengadaan"]').val();
        if (file_dok_pengadaan == '') {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Dokumen Pengadaan Wajib Di Isi!',
            })
        } else {
            e.preventDefault();
            $.ajax({
                url: url_dokumen_pengadaan,
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.btn_dok_pengadaan').attr("disabled", true);
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
                            load_dok_pengadaan()
                            Swal.fire('Data Berhasil Di Simpan!', '', 'success')
                            $('.btn_dok_pengadaan').attr("disabled", false);
                            form_dokumen_pengadaan[0].reset();

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


    // DOKUMEN prakualifikasi
    var form_dokumen_prakualifikasi = $('#form_dokumen_prakualifikasi')
    form_dokumen_prakualifikasi.on('submit', function(e) {
        var url_dokumen_prakualifikasi = $('[name="url_dokumen_prakualifikasi"]').val();
        var file_dok_prakualifikasi = $('[name="file_dok_prakualifikasi"]').val();
        if (file_dok_prakualifikasi == '') {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Dokumen prakualifikasi Wajib Di Isi!',
            })
        } else {
            e.preventDefault();
            $.ajax({
                url: url_dokumen_prakualifikasi,
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.btn_dok_prakualifikasi').attr("disabled", true);
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
                            load_dok_prakualifikasi()
                            Swal.fire('Data Berhasil Di Simpan!', '', 'success')
                            $('.btn_dok_prakualifikasi').attr("disabled", false);
                            form_dokumen_prakualifikasi[0].reset();
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
<!-- umumkan paket -->
<script>
    var form_simpan_paket = $('#form_simpan_paket')
    form_simpan_paket.on('submit', function(e) {
        var url_update_rup = $('[name="url_update_rup"]').val();
        var id_rup = $('[name="id_rup"]').val();
        var status_paket_panitia = $('[name="status_paket_panitia"]').val();
        var redirect_daftar_paket = $('[name="redirect_daftar_paket"]').val()
        e.preventDefault();
        $.ajax({
            url: url_update_rup,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('.btn_simpan_paket').attr("disabled", true);
            },
            success: function(response) {
                if (response == 'jadwal_validasi') {
                    Swal.fire('Buat Jadwal Dahulu!', '', 'warning')
                    $('.btn_simpan_paket').attr("disabled", false);
                } else if (response == 'dok_izin_validasi') {
                    Swal.fire('Dokumen Izin Prinsip Belum Di Isi!', '', 'warning')
                    $('.btn_simpan_paket').attr("disabled", false);
                } else if (response == 'hps_validasi') {
                    Swal.fire('Hps Belum Di Isi!', '', 'warning')
                    $('.btn_simpan_paket').attr("disabled", false);
                } else if (response == 'jenis_kontrak_validasi') {
                    Swal.fire('Jenis Kontrak Belum Di Isi!', '', 'warning')
                    $('.btn_simpan_paket').attr("disabled", false);
                } else if (response == 'beban_tahun_anggaran_validasi') {
                    Swal.fire('Beban Tahun Anggaran Belum Di Isi!', '', 'warning')
                    $('.btn_simpan_paket').attr("disabled", false);
                } else if (response == 'bobot_nilai_validasi') {
                    Swal.fire('Bobot Nilai Belum Di Isi!', '', 'warning')
                    $('.btn_simpan_paket').attr("disabled", false);
                } else if (response == 'bobot_teknis_validasi') {
                    Swal.fire('Bobot Teknis Belum Di Isi!', '', 'warning')
                    $('.btn_simpan_paket').attr("disabled", false);
                } else if (response == 'bobot_biaya_validasi') {
                    Swal.fire('Bobot Biaya Belum Di Isi!', '', 'warning')
                    $('.btn_simpan_paket').attr("disabled", false);
                } else if (response == 'syarat_tender_kualifikasi_validasi') {
                    Swal.fire('Dokumen Persyaratan Pengadaan Belum Di Isi!', '', 'warning')
                    $('.btn_simpan_paket').attr("disabled", false);
                } else {
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
                            $('.btn_simpan_paket').attr("disabled", false);
                            setTimeout(() => {
                                window.location.href = redirect_daftar_paket
                            }, "2000");

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


    $(document).ready(function() {
        var url_daftar_paket = $('[name="url_daftar_paket"]').val()
        $('#tbl_daftar_paket').DataTable({
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
                "url": url_daftar_paket,
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

    function Reload_table_daftar_paket() {
        $('#tbl_daftar_paket').DataTable().ajax.reload();
    }

    function byid_paket(id_url_rup) {
        var url_cek_dokumen_hps = $('[name="url_cek_dokumen_hps"]').val()
        var url_by_id_rup = $('[name="url_by_id_rup"]').val()
        $.ajax({
            type: "GET",
            url: url_by_id_rup + id_url_rup,
            dataType: "JSON",
            success: function(response) {
                $('#modal-xl-detail').modal('show')
                $('[name="id_url_rup"]').val(id_url_rup)
                $('[name="nama_rup"]').val(response['row_rup'].nama_rup)

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
                $('#kode_rup').text(response['row_rup'].kode_rup)
                $('#tahun_rup').text(response['row_rup'].tahun_rup)
                $('#nama_departemen').text(response['row_rup'].nama_departemen)
                $('#nama_section').text(response['row_rup'].nama_section)
                $('#nama_rup').text(response['row_rup'].nama_rup)
                $('#jangka_waktu_mulai_pelaksanaan').text(response['row_rup'].jangka_waktu_mulai_pelaksanaan)
                $('#jangka_waktu_selesai_pelaksanaan').text(response['row_rup'].jangka_waktu_selesai_pelaksanaan)
                $('#jangka_waktu_hari_pelaksanaan').text(response['row_rup'].jangka_waktu_hari_pelaksanaan)
                $('#nama_jenis_anggaran').text(response['row_rup'].nama_jenis_anggaran)
                $('#nama_jenis_pengadaan').text(response['row_rup'].nama_jenis_pengadaan)
                if (response['row_rup'].id_jadwal_tender == 9) {
                    $('#nama_metode_pengadaan').text(response['row_rup'].nama_metode_pengadaan)
                    $('#kualifikasi_usaha').text(response['row_rup'].kualifikasi_usaha)
                    $('#metode_kualifikasi').text('-')
                    $('#metode_dokumen').text('-')
                } else {
                    $('#nama_metode_pengadaan').text(response['row_rup'].nama_metode_pengadaan)
                    $('#kualifikasi_usaha').text(response['row_rup'].kualifikasi_usaha)
                    $('#metode_kualifikasi').text(response['row_rup'].metode_kualifikasi)
                    $('#metode_dokumen').text(response['row_rup'].metode_dokumen)
                }
                if (response['row_rup'].jenis_kontrak == 1) {
                    var jenis_kontrak = 'Lump Sum'
                } else if (response['row_rup'].jenis_kontrak == 2) {
                    var jenis_kontrak = 'Harga Satuan'
                } else if (response['row_rup'].jenis_kontrak == 3) {
                    var jenis_kontrak = 'Gabungan Lump Sum dan Harga Satuan'
                } else if (response['row_rup'].jenis_kontrak == 4) {
                    var jenis_kontrak = 'Terima Jadi(Turnkey)'
                } else if (response['row_rup'].jenis_kontrak == 5) {
                    var jenis_kontrak = 'Persentase( % )'
                }
                $('#jenis_kontrak').text(jenis_kontrak)
                $('#bobot_teknis').text(response['row_rup'].bobot_teknis)
                $('#bobot_biaya').text(response['row_rup'].bobot_biaya)
                $('#sumber_dana').text(response['row_rup'].nama_departemen)
                $('#total_pagu_rup').text('Rp. ' + formatRupiah(response['row_rup'].total_pagu_rup))
                $('#total_hps_rup').text('Rp. ' + formatRupiah(response['row_rup'].total_hps_rup))
                $('#detail_jadwal').html('<a href="javascript:;" onclick="lihat_detail_jadwal(\'' + response['row_rup'].id_url_rup + '\')" class="btn btn-sm btn-primary"><i class="fa-solid fa-calendar-days px-1"></i>Detail Jadwal Pengadaan</a>')
                // detail jadwal
                var open_dokumen_izin_prinsip = 'https://jmto-eproc.kintekindo.net/' + 'file_paket/' + response['row_rup'].nama_rup + '/DOKUMEN_IZIN_PRINSIP_DAN_HPS' + '/';
                var html_dok_izin_prinsip = '';
                var i_i;
                for (i_i = 0; i_i < response['dok_izin_prinsip'].length; i_i++) {
                    html_dok_izin_prinsip += '<tr>' +
                        '<td>' + response['dok_izin_prinsip'][i_i].nama_file + '</td>' +
                        '<td>' + '  <a target="_blank" href="' + open_dokumen_izin_prinsip + response['dok_izin_prinsip'][i_i].file_dokumen + '" class="btn btn-sm btn-danger">' +
                        '<i class="fa-solid fa-folder-open"></i>' +
                        ' File Dokumen' +
                        '</a>' + '</td>' +
                        '</tr>';
                }
                $('.tbl_dok_izin_prinsip_detail').html(html_dok_izin_prinsip);



                var html = '';
                var i;
                for (i = 0; i < response['panitia'].length; i++) {
                    if (response['panitia'][i].role_panitia == 1) {
                        var role_panitia = 'Ketua Panitia'
                    } else if (response['panitia'][i].role_panitia == 2) {
                        var role_panitia = 'Sekretaris Panitia'
                    } else if (response['panitia'][i].role_panitia == 3) {
                        var role_panitia = 'Anggota Panitia'
                    }
                    html += '<tr>' +
                        '<td><small>' + response['panitia'][i].nama_pegawai + '</small></td>' +
                        '<td><small>' + role_panitia + '</small></td>' +
                        '</tr>';
                }
                $('#load_panitia').html(html);
                var html_status_paket = '';
                if (response['row_rup'].status_paket_panitia == 1) {
                    if (response['row_rup'].sts_ulang == 1) {
                        html_status_paket += '<small><span class="badge bg-warning text-dark">Draft Paket (Sedang Mengulang)</span></small>';
                        $('.load_status_paket').html(html_status_paket);
                    } else {
                        html_status_paket += '<small><span class="badge bg-warning text-dark">Draft Paket</span></small>';
                        $('.load_status_paket').html(html_status_paket);
                    }

                } else {
                    if (response['row_rup'].sts_ulang == 1) {
                        html_status_paket += '<small><span class="badge bg-warning text-dark">Draft Paket (Sedang Mengulang)</span></small>';
                        $('.load_status_paket').html(html_status_paket);
                    } else {
                        html_status_paket += '<small><span class="badge bg-danger text-white">Tender Sedang Berlangsung</span></small>';
                        $('.load_status_paket').html(html_status_paket);
                    }
                }

                if (response['row_rup'].status_paket_panitia == 1) {
                    if (response['hak_mengumumkan'].role_panitia == 1 || response['hak_mengumumkan'].role_panitia == 2) {
                        $('.status_dimumkan').attr("disabled", false);
                    } else {
                        $('.status_dimumkan').attr("disabled", true);
                    }
                } else {
                    $('.status_dimumkan').attr("disabled", true);
                }
                // bagian ini khusus untuk umumkan paket
            }
        })
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
                    var times_mulai = new Date(response['jadwal'][i].waktu_mulai)
                    var times_selesai = new Date(response['jadwal'][i].waktu_selesai)

                    var month_mulai = times_mulai.getMonth();
                    var month_selesai = times_selesai.getMonth();
                    var m = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];


                    // mulai
                    var time_mulai = times_mulai.toLocaleTimeString()
                    var tanggal_mulai = String(times_mulai.getDate()).padStart(2, '0');
                    var bulan_mulai = String(times_mulai.getMonth() + 1).padStart(2, '0');
                    var tahun_mulai = times_mulai.getFullYear()
                    var data_mulai = tanggal_mulai + ' ' + m[month_mulai] + ' ' + tahun_mulai + ' ' + time_mulai

                    // selesai
                    var time_selesai = times_selesai.toLocaleTimeString()
                    var tanggal_selesai = String(times_selesai.getDate()).padStart(2, '0');
                    var bulan_selesai = String(times_selesai.getMonth() + 1).padStart(2, '0');
                    var tahun_selesai = times_selesai.getFullYear()
                    var data_selesai = tanggal_selesai + ' ' + m[month_selesai] + ' ' + tahun_selesai + ' ' + time_selesai

                    var waktu_mulai = new Date();
                    var waktu_selesai = new Date(response['jadwal'][i].waktu_selesai);
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
                        '<td><small>' + data_mulai + '</small></td>' +
                        '<td><small>' + data_selesai + '</small></td>' +
                        '<td>' + status_waktu + '</td>' +
                        '</tr>';
                }
                $('#load_jadwal').html(html);
            }
        })
    }

    var form_simpan_syarat_tambahan = $('#form_simpan_syarat_tambahan')
    form_simpan_syarat_tambahan.on('submit', function(e) {
        var url_simpan_syarat_tambahan = $('[name="url_simpan_syarat_tambahan"]').val();
        var file_syarat_tambahan = $('[name="file_syarat_tambahan"]').val();
        e.preventDefault();
        $.ajax({
            url: url_simpan_syarat_tambahan,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('.file_syarat_tambahan_btn').attr("disabled", true);
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
                        $('.file_syarat_tambahan_btn').attr("disabled", false);
                        get_syarat_tambahan()
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {

                    }
                })
            }
        })
    })

    get_syarat_tambahan()

    function get_syarat_tambahan() {
        var url_get_syarat_tambahan_tender = $('[name="url_get_syarat_tambahan_tender"]').val();
        var id_url_rup = $('[name="id_url_rup"]').val();
        $.ajax({
            type: "POST",
            url: url_get_syarat_tambahan_tender,
            data: {
                id_url_rup: id_url_rup,
            },
            dataType: "JSON",
            success: function(response) {
                // get sumber dana
                var html = '';
                var i;
                for (i = 0; i < response['result_syarat_tender_tambahan'].length; i++) {
                    if (response['result_syarat_tender_tambahan'][i].file_syarat_tambahan) {
                        var dok = '<a href="javascript:;" onclick="download_file_syarat_tambahan(' + response['result_syarat_tender_tambahan'][i].id_syarat_tambahan + ')" class="btn btn-sm btn-warning"><i class="fas fa fa-file"></i> Download File</a>'
                    } else {
                        var dok = '<span class="badge bg-danger">Tidak Ada Lampiran</span>'
                    }
                    html += '<tr>' +
                        '<td>' + response['result_syarat_tender_tambahan'][i].nama_syarat_tambahan + '</td>' +
                        '<td>' + dok + '</td>' +
                        '<td><a href="javascript:;" onclick="hapus_tambahan_syarat(' + response['result_syarat_tender_tambahan'][i].id_syarat_tambahan + ')" class="btn btn-sm btn-danger"><i class="fas fa fa-trash"></i> Hapus</a></td>' +
                        '</tr>'
                }
                $('#result_tbl_tambahan_syarat_tender').html(html);
            }
        })
    }

    function download_file_syarat_tambahan(id_syarat_tambahan) {
        var url_download_syarat_tambahan = $('[name="url_download_syarat_tambahan"]').val()
        location.href = url_download_syarat_tambahan + id_syarat_tambahan;
    }

    function hapus_tambahan_syarat(id_syarat_tambahan) {
        var url_hapus_syarat_tambahan = $('[name="url_hapus_syarat_tambahan"]').val()
        Swal.fire({
            title: 'Apakah Anda Yakin Ingin Menghapus',
            text: 'Syarat Kbli Ini ??',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Jangan Hapus!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: url_hapus_syarat_tambahan,
                    data: {
                        id_syarat_tambahan: id_syarat_tambahan,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        Swal.fire('Data Berhasil Di Hapus!', '', 'success')
                        get_syarat_tambahan()
                    }
                })

            }
        })
    }
</script>

<!-- umumkan paket funtion -->
<script>
    function Umumkan_paket() {
        var id_url_rup = $('[name="id_url_rup"]').val()
        var nama_rup = $('[name="nama_rup"]').val()
        Swal.fire({
            title: 'Apakah Anda Yakin Ingin Mengumumkan',
            text: 'Paket ' + nama_rup + ' ??',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Umumkan!',
            cancelButtonText: 'Jangan Umumkan Dulu!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: '<?= base_url('panitia/daftar_paket/daftar_paket/umumkan_paket') ?>',
                    data: {
                        id_url_rup: id_url_rup,
                    },
                    beforeSend: function() {
                        $('.btn_umumkan_paket').attr("disabled", true);
                    },
                    dataType: "JSON",
                    success: function(response) {
                        Swal.fire('Paket Berhasil Di Umumkan!', '', 'success')
                        Reload_table_daftar_paket()
                        $('#modal-xl-detail').modal('hide')
                        $('.btn_umumkan_paket').attr("disabled", false);
                    }
                })
            }
        })
    }

    function Edit_paket() {
        var id_url_rup = $('[name="id_url_rup"]').val()
        location.replace('<?= base_url('panitia/daftar_paket/daftar_paket/form_daftar_paket/') ?>' + id_url_rup);
    }
    vendor_terpilih()

    function vendor_terpilih() {
        var id_rup_global = $('[name="id_rup_global"]').val();
        var url_get_rekanan_terpilih = $('[name="url_get_rekanan_terpilih"]').val()
        var status_paket_diumumkan = $('[name="status_paket_diumumkan"]').val()
        $.ajax({
            type: "POST",
            url: url_get_rekanan_terpilih,
            data: {
                id_rup_global: id_rup_global,
            },
            dataType: "JSON",
            success: function(response) {
                var html = '';
                var i;
                var o = 0;
                for (i = 0; i < response.length; i++) {
                    if (response[i].status_paket_diumumkan) {
                        var field = '<td><a href="javascript:;" onclick="pilih_vendor(\'' + response[i].id_vendor + '\'' + ',' + '\'' + id_rup_global + '\'' + ',' + '\'' + response[i].nama_usaha + '\')" class="btn btn-sm btn-warning"><i class="fas fa fa-edit"></i> Pilih</a></td>'
                    } else {
                        var field = '<td><button disabled class="btn btn-sm btn-warning"><i class="fas fa fa-edit"></i> Tender Sedang Berlangsung</button></td>'
                    }
                    html += '<tr>' +
                        '<td>' + ++o + '</td>' +
                        '<td>' + response[i].nama_usaha + '</td>' +
                        '<td>' + response[i].email + '</td>' +
                        '<td>' + response[i].kualifikasi_usaha + '</td>' +
                        '<td>' + '80' + '</td>' +
                        '<td>' + ' <center><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small> <small> <span class="text-warning"><i class="fas fa fa-star"></i></span></small><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small></center>' + '</td>' +
                        field + '</tr>'

                }
                $('#load_terpilih').html(html);
            }
        })
    }


    function get_terekomendasi() {
        var modal = $('#modal-xl-rekomendasi2')
        var id_rup_global = $('[name="id_rup_global"]').val();
        var id_url_rup = $('[name="id_url_rup"]').val();
        var url_get_rekanan_terekomendasi = $('[name="url_get_rekanan_terekomendasi"]').val()
        $.ajax({
            type: "POST",
            url: url_get_rekanan_terekomendasi,
            data: {
                id_rup_global: id_rup_global,
                id_url_rup: id_url_rup
            },
            dataType: "JSON",
            success: function(response) {
                modal.modal('show')
                var html = '';
                var i;
                var o = 0;
                for (i = 0; i < response.length; i++) {
                    if (response[i].status_paket_diumumkan) {
                        var field = '<td><a href="javascript:;" onclick="pilih_vendor(\'' + response[i].id_vendor + '\'' + ',' + '\'' + id_rup_global + '\'' + ',' + '\'' + response[i].nama_usaha + '\')" class="btn btn-sm btn-warning"><i class="fas fa fa-edit"></i> Pilih</a></td>'
                    } else {
                        var field = '<td><button disabled class="btn btn-sm btn-warning"><i class="fas fa fa-edit"></i> Tender Sedang Berlangsung</button></td>'
                    }
                    html += '<tr>' +
                        '<td>' + ++o + '</td>' +
                        '<td>' + response[i].nama_usaha + '</td>' +
                        '<td>' + response[i].email + '</td>' +
                        '<td>' + response[i].kualifikasi_usaha + '</td>' +
                        '<td>' + '80' + '</td>' +
                        '<td>' + ' <center><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small> <small> <span class="text-warning"><i class="fas fa fa-star"></i></span></small><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small></center>' + '</td>' +
                        field +
                        '</tr>'
                }
                $('#load_rekomendasi').html(html);
            }
        })
    }

    function get_terekomendasi_umum() {
        var modal = $('#modal-xl-rekomendasi')
        var id_rup_global = $('[name="id_rup_global"]').val();
        var id_url_rup = $('[name="id_url_rup"]').val();
        var url_get_rekanan_terekomendasi_umum = $('[name="url_get_rekanan_terekomendasi_umum"]').val()
        $.ajax({
            type: "POST",
            url: url_get_rekanan_terekomendasi_umum,
            data: {
                id_rup_global: id_rup_global,
                id_url_rup: id_url_rup
            },
            dataType: "JSON",
            success: function(response) {

                modal.modal('show')
                var html = '';
                var i;
                var o = 0;
                for (i = 0; i < response.length; i++) {
                    html += '<tr>' +
                        '<td>' + ++o + '</td>' +
                        '<td>' + response[i].nama_usaha + '</td>' +
                        '<td>' + response[i].email + '</td>' +
                        '<td>' + response[i].kualifikasi_usaha + '</td>' +
                        '<td>' + '80' + '</td>' +
                        '<td>' + ' <center><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small> <small> <span class="text-warning"><i class="fas fa fa-star"></i></span></small><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small></center>' + '</td>' +
                        '</tr>';
                }
                $('#load_rekomendasi_umum').html(html);
            }
        })
    }


    function pilih_vendor(id_vendor, id_rup_global, nama_usaha) {
        var url_invite_rekanan = $('[name="url_invite_rekanan"]').val()
        Swal.fire({
            title: 'Apakah Anda Yakin Ingin Memilih Penyedia',
            text: nama_usaha,
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
                    url: url_invite_rekanan,
                    data: {
                        id_vendor: id_vendor,
                        id_rup_global: id_rup_global
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response == 'gagal') {
                            Swal.fire('Oops, Penyedia Sudah Ada Di Dalam Pengadaan Ini, Silahkan Pilih Penyedia Yang Lain!', '', 'warning')
                        } else if (response == 'sudah_ada') {
                            Swal.fire('Oops, Penyedia Penunjukan Langsung Hanya Satu Saja!', '', 'warning')
                        } else {
                            Swal.fire('Penyedia Berhasil Di Pilih!', '', 'success')
                            vendor_terpilih()
                        }


                    }
                })

            }
        })
    }

    function batal_pilih(id_vendor, id_rup_global, nama_usaha) {
        var url_batal_pilih_rekanan = $('[name="url_batal_pilih_rekanan"]').val()
        Swal.fire({
            title: 'Apakah Anda Yakin Ingin Hapus Penyedia Dari Pengadaan Ini!?',
            text: nama_usaha,
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
                    url: url_batal_pilih_rekanan,
                    data: {
                        id_vendor: id_vendor,
                        id_rup_global: id_rup_global
                    },
                    dataType: "JSON",
                    success: function(response) {
                        vendor_terpilih()
                        Swal.fire('Penyedia Berhasil Di Di Hapus Dari Pengadaan Ini!', '', 'success')
                    }
                })

            }
        })
    }
</script>

<script>
    $("#cek_fakta_integritas").change(function() {
        if (this.checked) {
            $('.btn_simpan_paket').attr("disabled", false);
        } else {
            $('.btn_simpan_paket').attr("disabled", true);
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('.table_terekomendasi').DataTable({
            "ordering": true,
        });
    });

    $(document).ready(function() {
        $('.table_rekomendasi_1').DataTable({
            "ordering": true,
        });
    });
</script>

<script>
    function setujui_pakta_integritas() {
        var id_manajemen_user = $('[name="id_manajemen_user"]').val()
        var id_rup_global = $('[name="id_rup_global"]').val()
        $.ajax({
            type: "POST",
            url: '<?= base_url('panitia/daftar_paket/daftar_paket/setujui_pakta_integritas') ?>',
            data: {
                id_manajemen_user: id_manajemen_user,
                id_rup_global: id_rup_global
            },
            dataType: "JSON",
            success: function(response) {
                $('#modal-xl-pakta').modal('hide')
                Swal.fire('Pakta Integritas Berhasil Di Setujui!', '', 'success')
                setTimeout(() => {
                    window.location.href = ''
                }, 1500);
            }
        })
    }
</script>