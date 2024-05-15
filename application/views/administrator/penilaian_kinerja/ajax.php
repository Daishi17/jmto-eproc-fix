<script>
    $(document).ready(function() {
        $('#tbl_paket_tender_umum').DataTable({
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
                "url": '<?= base_url('administrator/penilaian_kinerja/get_draft_paket_tender_umum') ?>',
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

    function Reload_table_paket_tender_umum() {
        $('#tbl_paket_tender_umum').DataTable().ajax.reload();
    }

    $(document).ready(function() {
        $('#tbl_paket_tender_terbatas').DataTable({
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
                "url": '<?= base_url('administrator/penilaian_kinerja/get_draft_paket_tender_terbatas') ?>',
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

    function Reload_table_paket_tender_terbatas() {
        $('#tbl_paket_tender_terbatas').DataTable().ajax.reload();
    }

    $(document).ready(function() {
        $('#tbl_paket_tender_juksung').DataTable({
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
                "url": '<?= base_url('administrator/penilaian_kinerja/get_draft_paket_tender_juksung') ?>',
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

    function Reload_table_paket_tender_juksung() {
        $('#tbl_paket_tender_juksung').DataTable().ajax.reload();
    }
</script>


<!-- INI UNTUK VALIDASI ANGKANYA Bagian UPDATE-->
<script>
    $('#penilaian_kontruksi_1').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_1').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_1").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_1 = $('#penilaian_kontruksi_1').val();
                if (penilaian_kontruksi_1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_1').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_1').css('border-color', 'green');
                    $('#penilaian_kontruksi_1').val(penilaian_kontruksi_1);

                }

            };

        }
    });

    $('#penilaian_kontruksi_2').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_2').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_2").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_1 = $('#penilaian_kontruksi_2').val();
                if (penilaian_kontruksi_1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_2').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_2').css('border-color', 'green');
                    $('#penilaian_kontruksi_2').val(penilaian_kontruksi_1);

                }

            };

        }
    });
    $('#penilaian_kontruksi_3').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_3').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_3").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_1 = $('#penilaian_kontruksi_3').val();
                if (penilaian_kontruksi_1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_3').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_3').css('border-color', 'green');
                    $('#penilaian_kontruksi_3').val(penilaian_kontruksi_1);

                }

            };

        }
    });
    $('#penilaian_kontruksi_4').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_4').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_4").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_1 = $('#penilaian_kontruksi_4').val();
                if (penilaian_kontruksi_1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_4').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_4').css('border-color', 'green');
                    $('#penilaian_kontruksi_4').val(penilaian_kontruksi_1);

                }

            };

        }
    });
    $('#penilaian_kontruksi_5').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_5').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_5").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_1 = $('#penilaian_kontruksi_5').val();
                if (penilaian_kontruksi_1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_5').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_5').css('border-color', 'green');
                    $('#penilaian_kontruksi_5').val(penilaian_kontruksi_1);

                }

            };

        }
    });
    $('#penilaian_kontruksi_6').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_6').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_6").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_1 = $('#penilaian_kontruksi_6').val();
                if (penilaian_kontruksi_1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_6').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_6').css('border-color', 'green');
                    $('#penilaian_kontruksi_6').val(penilaian_kontruksi_1);

                }

            };

        }
    });
    $('#penilaian_kontruksi_7').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_7').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_7").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_1 = $('#penilaian_kontruksi_7').val();
                if (penilaian_kontruksi_1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_7').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_7').css('border-color', 'green');
                    $('#penilaian_kontruksi_7').val(penilaian_kontruksi_1);

                }

            };

        }
    });
    $('#penilaian_kontruksi_8').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_8').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_8").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_1 = $('#penilaian_kontruksi_8').val();
                if (penilaian_kontruksi_1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_8').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_8').css('border-color', 'green');
                    $('#penilaian_kontruksi_8').val(penilaian_kontruksi_1);

                }

            };

        }
    });
    $('#penilaian_kontruksi_9').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_9').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_9").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_1 = $('#penilaian_kontruksi_9').val();
                if (penilaian_kontruksi_1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_9').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_9').css('border-color', 'green');
                    $('#penilaian_kontruksi_9').val(penilaian_kontruksi_1);

                }

            };

        }
    });
    $('#penilaian_kontruksi_10').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_10').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_10").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_1 = $('#penilaian_kontruksi_10').val();
                if (penilaian_kontruksi_1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_10').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_10').css('border-color', 'green');
                    $('#penilaian_kontruksi_10').val(penilaian_kontruksi_1);

                }

            };

        }
    });
    $('#penilaian_kontruksi_11').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_11').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_11").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_1 = $('#penilaian_kontruksi_11').val();
                if (penilaian_kontruksi_1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_11').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_11').css('border-color', 'green');
                    $('#penilaian_kontruksi_11').val(penilaian_kontruksi_1);

                }

            };

        }
    });
    $('#penilaian_kontruksi_12').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_12').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_12").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_1 = $('#penilaian_kontruksi_12').val();
                if (penilaian_kontruksi_1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_12').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_12').css('border-color', 'green');
                    $('#penilaian_kontruksi_12').val(penilaian_kontruksi_1);

                }

            };

        }
    });
    $('#penilaian_kontruksi_13').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_13').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_13").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_1 = $('#penilaian_kontruksi_13').val();
                if (penilaian_kontruksi_1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_13').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_13').css('border-color', 'green');
                    $('#penilaian_kontruksi_13').val(penilaian_kontruksi_1);

                }

            };

        }
    });
    $('#penilaian_kontruksi_14').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_14').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_14").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_1 = $('#penilaian_kontruksi_14').val();
                if (penilaian_kontruksi_1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_14').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_14').css('border-color', 'green');
                    $('#penilaian_kontruksi_14').val(penilaian_kontruksi_1);

                }

            };

        }
    });
    $('#penilaian_kontruksi_15').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_15').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_15").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_1 = $('#penilaian_kontruksi_15').val();
                if (penilaian_kontruksi_1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_15').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_15').css('border-color', 'green');
                    $('#penilaian_kontruksi_15').val(penilaian_kontruksi_1);

                }

            };

        }
    });
    $('#penilaian_kontruksi_16').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_16').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_16").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_1 = $('#penilaian_kontruksi_16').val();
                if (penilaian_kontruksi_1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_16').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_16').css('border-color', 'green');
                    $('#penilaian_kontruksi_16').val(penilaian_kontruksi_1);

                }

            };

        }
    });
    $('#penilaian_kontruksi_17').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_17').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_17").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_1 = $('#penilaian_kontruksi_17').val();
                if (penilaian_kontruksi_1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_17').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_17').css('border-color', 'green');
                    $('#penilaian_kontruksi_17').val(penilaian_kontruksi_1);

                }

            };

        }
    });
</script>


<!-- INI UNTUK VALIDASI ANGKANYA Bagian tambah-->
<script>
    function message(icon, text) {
        swal({
            title: "Maaf Tidak Boleh Huruf Yaa !!!",
            text: text,
            icon: icon,
        });
    }

    function message_gak_boleh_lebih_angkanya(icon, text) {
        swal({
            title: "Maaf Angka Penilaian Tidak Boleh Lebih Dari 100 Yaa !!!",
            text: text,
            icon: icon,
        });
    }
    $('#penilaian_kontruksi_1').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_1').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_1").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_1 = $('#penilaian_kontruksi_1').val();
                if (penilaian_kontruksi_1.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_1').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_1').css('border-color', 'green');
                    $('#penilaian_kontruksi_1').val(penilaian_kontruksi_1);

                }

            };

        }
    });
    $('#penilaian_kontruksi_2').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_2').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_2").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_2 = $('#penilaian_kontruksi_2').val();
                if (penilaian_kontruksi_2.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_2').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_2').css('border-color', 'green');
                    $('#penilaian_kontruksi_2').val(penilaian_kontruksi_2);

                }

            };

        }
    });
    $('#penilaian_kontruksi_2').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_2').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_2").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_2 = $('#penilaian_kontruksi_2').val();
                if (penilaian_kontruksi_2.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_2').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_2').css('border-color', 'green');
                    $('#penilaian_kontruksi_2').val(penilaian_kontruksi_2);

                }

            };

        }
    });
    $('#penilaian_kontruksi_3').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_3').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_3").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_3 = $('#penilaian_kontruksi_3').val();
                if (penilaian_kontruksi_3.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_3').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_3').css('border-color', 'green');
                    $('#penilaian_kontruksi_3').val(penilaian_kontruksi_3);

                }

            };

        }
    });
    $('#penilaian_kontruksi_4').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_4').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_4").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_4 = $('#penilaian_kontruksi_2').val();
                if (penilaian_kontruksi_4.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_4').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_4').css('border-color', 'green');
                    $('#penilaian_kontruksi_4').val(penilaian_kontruksi_4);

                }

            };

        }
    });
    $('#penilaian_kontruksi_5').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_5').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_5").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_5 = $('#penilaian_kontruksi_2').val();
                if (penilaian_kontruksi_5.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_5').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_5').css('border-color', 'green');
                    $('#penilaian_kontruksi_5').val(penilaian_kontruksi_5);

                }

            };

        }
    });
    $('#penilaian_kontruksi_6').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_6').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_6").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_6 = $('#penilaian_kontruksi_6').val();
                if (penilaian_kontruksi_6.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_6').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_6').css('border-color', 'green');
                    $('#penilaian_kontruksi_6').val(penilaian_kontruksi_6);

                }

            };

        }
    });
    $('#penilaian_kontruksi_7').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_7').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_7").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_7 = $('#penilaian_kontruksi_7').val();
                if (penilaian_kontruksi_7.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_7').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_7').css('border-color', 'green');
                    $('#penilaian_kontruksi_7').val(penilaian_kontruksi_7);

                }

            };

        }
    });
    $('#penilaian_kontruksi_8').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_8').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_8").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_8 = $('#penilaian_kontruksi_8').val();
                if (penilaian_kontruksi_8.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_8').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_8').css('border-color', 'green');
                    $('#penilaian_kontruksi_8').val(penilaian_kontruksi_8);

                }

            };

        }
    });
    $('#penilaian_kontruksi_9').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_9').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_9").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_9 = $('#penilaian_kontruksi_9').val();
                if (penilaian_kontruksi_9.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_9').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_9').css('border-color', 'green');
                    $('#penilaian_kontruksi_9').val(penilaian_kontruksi_9);

                }

            };

        }
    });
    $('#penilaian_kontruksi_10').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_10').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_10").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_10 = $('#penilaian_kontruksi_10').val();
                if (penilaian_kontruksi_10.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_10').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_10').css('border-color', 'green');
                    $('#penilaian_kontruksi_10').val(penilaian_kontruksi_10);

                }

            };

        }
    });
    $('#penilaian_kontruksi_11').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_11').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_11").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_11 = $('#penilaian_kontruksi_11').val();
                if (penilaian_kontruksi_11.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_11').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_11').css('border-color', 'green');
                    $('#penilaian_kontruksi_11').val(penilaian_kontruksi_11);

                }

            };

        }
    });
    $('#penilaian_kontruksi_12').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_12').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_12").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_12 = $('#penilaian_kontruksi_12').val();
                if (penilaian_kontruksi_12.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_12').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_12').css('border-color', 'green');
                    $('#penilaian_kontruksi_12').val(penilaian_kontruksi_12);

                }

            };

        }
    });
    $('#penilaian_kontruksi_13').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_13').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_13").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_13 = $('#penilaian_kontruksi_13').val();
                if (penilaian_kontruksi_13.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_13').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_13').css('border-color', 'green');
                    $('#penilaian_kontruksi_13').val(penilaian_kontruksi_13);

                }

            };

        }
    });
    $('#penilaian_kontruksi_14').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_14').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_14").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_14 = $('#penilaian_kontruksi_14').val();
                if (penilaian_kontruksi_14.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_14').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_14').css('border-color', 'green');
                    $('#penilaian_kontruksi_14').val(penilaian_kontruksi_14);

                }

            };

        }
    });
    $('#penilaian_kontruksi_15').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_15').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_15").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_15 = $('#penilaian_kontruksi_15').val();
                if (penilaian_kontruksi_15.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_15').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_15').css('border-color', 'green');
                    $('#penilaian_kontruksi_15').val(penilaian_kontruksi_15);

                }

            };

        }
    });
    $('#penilaian_kontruksi_16').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_16').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_16").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_16 = $('#penilaian_kontruksi_16').val();
                if (penilaian_kontruksi_16.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_16').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_16').css('border-color', 'green');
                    $('#penilaian_kontruksi_16').val(penilaian_kontruksi_16);

                }

            };

        }
    });
    $('#penilaian_kontruksi_17').keyup(function() {
        if ($(this).val() > 100) {
            $('#penilaian_kontruksi_17').css('border-color', 'red');
            Swal.fire('Beri Penilaian 1 => 100!!!', '', 'warning')
            $(this).val('100');
        } else {
            document.getElementById("penilaian_kontruksi_17").onkeyup = function() {
                var validasiHuruf = /^[a-zA-Z ]+$/;
                var penilaian_kontruksi_17 = $('#penilaian_kontruksi_17').val();
                if (penilaian_kontruksi_17.match(validasiHuruf)) {
                    $('#penilaian_kontruksi_17').css('border-color', 'red');
                    Swal.fire('Beri Penilaian Dengan Angka Yaa!!!', '', 'warning')
                } else {
                    $('#penilaian_kontruksi_17').css('border-color', 'green');
                    $('#penilaian_kontruksi_17').val(penilaian_kontruksi_17);

                }

            };

        }
    });
</script>


<!-- ININ UNTUK VALIDASI BUTTON dan nilaik akhir TAMBAH -->
<!-- keyup nilai pekerjaan kontruksi -->

<script>
    $(document).ready(function() {
        $("#penilaian_kontruksi_1, #penilaian_kontruksi_2, #penilaian_kontruksi_3, #penilaian_kontruksi_4,#penilaian_kontruksi_5,#penilaian_kontruksi_6,#penilaian_kontruksi_7,#penilaian_kontruksi_8,#penilaian_kontruksi_9,#penilaian_kontruksi_10,#penilaian_kontruksi_11,#penilaian_kontruksi_12,#penilaian_kontruksi_13,#penilaian_kontruksi_14,#penilaian_kontruksi_15,#penilaian_kontruksi_16,#penilaian_kontruksi_17").keyup(function() {
            // 1
            var bobot_pekerjaan_kontruksi_1 = $('#bobot_pekerjaan_kontruksi_1').val();
            var penilaian_kontruksi_1 = $('#penilaian_kontruksi_1').val();
            var nilai_akhir_kontruksi_1 = bobot_pekerjaan_kontruksi_1 * penilaian_kontruksi_1 / 100;
            $('#nilai_akhir_kontruksi_1').val(parseFloat(nilai_akhir_kontruksi_1));
            // 2
            var bobot_pekerjaan_kontruksi_2 = $('#bobot_pekerjaan_kontruksi_2').val();
            var penilaian_kontruksi_2 = $('#penilaian_kontruksi_2').val();
            var nilai_akhir_kontruksi_2 = bobot_pekerjaan_kontruksi_2 * penilaian_kontruksi_2 / 100;
            $('#nilai_akhir_kontruksi_2').val(parseFloat(nilai_akhir_kontruksi_2));
            // 3
            var bobot_pekerjaan_kontruksi_3 = $('#bobot_pekerjaan_kontruksi_3').val();
            var penilaian_kontruksi_3 = $('#penilaian_kontruksi_3').val();
            var nilai_akhir_kontruksi_3 = bobot_pekerjaan_kontruksi_3 * penilaian_kontruksi_3 / 100;
            $('#nilai_akhir_kontruksi_3').val(parseFloat(nilai_akhir_kontruksi_3));
            // 4
            var bobot_pekerjaan_kontruksi_4 = $('#bobot_pekerjaan_kontruksi_4').val();
            var penilaian_kontruksi_4 = $('#penilaian_kontruksi_4').val();
            var nilai_akhir_kontruksi_4 = bobot_pekerjaan_kontruksi_4 * penilaian_kontruksi_4 / 100;
            $('#nilai_akhir_kontruksi_4').val(parseFloat(nilai_akhir_kontruksi_4));
            // 5
            var bobot_pekerjaan_kontruksi_5 = $('#bobot_pekerjaan_kontruksi_5').val();
            var penilaian_kontruksi_5 = $('#penilaian_kontruksi_5').val();
            var nilai_akhir_kontruksi_5 = bobot_pekerjaan_kontruksi_5 * penilaian_kontruksi_5 / 100;
            $('#nilai_akhir_kontruksi_5').val(parseFloat(nilai_akhir_kontruksi_5));
            // 6
            var bobot_pekerjaan_kontruksi_6 = $('#bobot_pekerjaan_kontruksi_6').val();
            var penilaian_kontruksi_6 = $('#penilaian_kontruksi_6').val();
            var nilai_akhir_kontruksi_6 = bobot_pekerjaan_kontruksi_6 * penilaian_kontruksi_6 / 100;
            $('#nilai_akhir_kontruksi_6').val(parseFloat(nilai_akhir_kontruksi_6));
            // 7
            var bobot_pekerjaan_kontruksi_7 = $('#bobot_pekerjaan_kontruksi_7').val();
            var penilaian_kontruksi_7 = $('#penilaian_kontruksi_7').val();
            var nilai_akhir_kontruksi_7 = bobot_pekerjaan_kontruksi_7 * penilaian_kontruksi_7 / 100;
            $('#nilai_akhir_kontruksi_7').val(parseFloat(nilai_akhir_kontruksi_7));
            // 8
            var bobot_pekerjaan_kontruksi_8 = $('#bobot_pekerjaan_kontruksi_8').val();
            var penilaian_kontruksi_8 = $('#penilaian_kontruksi_8').val();
            var nilai_akhir_kontruksi_8 = bobot_pekerjaan_kontruksi_8 * penilaian_kontruksi_8 / 100;
            $('#nilai_akhir_kontruksi_8').val(parseFloat(nilai_akhir_kontruksi_8));
            // 9
            var bobot_pekerjaan_kontruksi_9 = $('#bobot_pekerjaan_kontruksi_9').val();
            var penilaian_kontruksi_9 = $('#penilaian_kontruksi_9').val();
            var nilai_akhir_kontruksi_9 = bobot_pekerjaan_kontruksi_9 * penilaian_kontruksi_9 / 100;
            $('#nilai_akhir_kontruksi_9').val(parseFloat(nilai_akhir_kontruksi_9));
            // 10
            var bobot_pekerjaan_kontruksi_10 = $('#bobot_pekerjaan_kontruksi_10').val();
            var penilaian_kontruksi_10 = $('#penilaian_kontruksi_10').val();
            var nilai_akhir_kontruksi_10 = bobot_pekerjaan_kontruksi_10 * penilaian_kontruksi_10 / 100;
            $('#nilai_akhir_kontruksi_10').val(parseFloat(nilai_akhir_kontruksi_10));
            // 11
            var bobot_pekerjaan_kontruksi_11 = $('#bobot_pekerjaan_kontruksi_11').val();
            var penilaian_kontruksi_11 = $('#penilaian_kontruksi_11').val();
            var nilai_akhir_kontruksi_11 = bobot_pekerjaan_kontruksi_11 * penilaian_kontruksi_11 / 100;
            $('#nilai_akhir_kontruksi_11').val(parseFloat(nilai_akhir_kontruksi_11));
            // 12
            var bobot_pekerjaan_kontruksi_12 = $('#bobot_pekerjaan_kontruksi_12').val();
            var penilaian_kontruksi_12 = $('#penilaian_kontruksi_12').val();
            var nilai_akhir_kontruksi_12 = bobot_pekerjaan_kontruksi_12 * penilaian_kontruksi_12 / 100;
            $('#nilai_akhir_kontruksi_12').val(parseFloat(nilai_akhir_kontruksi_12));
            // 13
            var bobot_pekerjaan_kontruksi_13 = $('#bobot_pekerjaan_kontruksi_13').val();
            var penilaian_kontruksi_13 = $('#penilaian_kontruksi_13').val();
            var nilai_akhir_kontruksi_13 = bobot_pekerjaan_kontruksi_13 * penilaian_kontruksi_13 / 100;
            $('#nilai_akhir_kontruksi_13').val(parseFloat(nilai_akhir_kontruksi_13));
            // 14
            var bobot_pekerjaan_kontruksi_14 = $('#bobot_pekerjaan_kontruksi_14').val();
            var penilaian_kontruksi_14 = $('#penilaian_kontruksi_14').val();
            var nilai_akhir_kontruksi_14 = bobot_pekerjaan_kontruksi_14 * penilaian_kontruksi_14 / 100;
            $('#nilai_akhir_kontruksi_14').val(parseFloat(nilai_akhir_kontruksi_14));
            // 15
            var bobot_pekerjaan_kontruksi_15 = $('#bobot_pekerjaan_kontruksi_15').val();
            var penilaian_kontruksi_15 = $('#penilaian_kontruksi_15').val();
            var nilai_akhir_kontruksi_15 = bobot_pekerjaan_kontruksi_15 * penilaian_kontruksi_15 / 100;
            $('#nilai_akhir_kontruksi_15').val(parseFloat(nilai_akhir_kontruksi_15));
            // 16
            var bobot_pekerjaan_kontruksi_16 = $('#bobot_pekerjaan_kontruksi_16').val();
            var penilaian_kontruksi_16 = $('#penilaian_kontruksi_16').val();
            var nilai_akhir_kontruksi_16 = bobot_pekerjaan_kontruksi_16 * penilaian_kontruksi_16 / 100;
            $('#nilai_akhir_kontruksi_16').val(parseFloat(nilai_akhir_kontruksi_16));
            // 17
            var bobot_pekerjaan_kontruksi_17 = $('#bobot_pekerjaan_kontruksi_17').val();
            var penilaian_kontruksi_17 = $('#penilaian_kontruksi_17').val();
            var nilai_akhir_kontruksi_17 = bobot_pekerjaan_kontruksi_17 * penilaian_kontruksi_17 / 100;
            $('#nilai_akhir_kontruksi_17').val(parseFloat(nilai_akhir_kontruksi_17));

            var total = parseFloat(nilai_akhir_kontruksi_1) + parseFloat(nilai_akhir_kontruksi_2) + parseFloat(nilai_akhir_kontruksi_3) + parseFloat(nilai_akhir_kontruksi_4) + parseFloat(nilai_akhir_kontruksi_5) + parseFloat(nilai_akhir_kontruksi_6) + parseFloat(nilai_akhir_kontruksi_7) + parseFloat(nilai_akhir_kontruksi_8) + parseFloat(nilai_akhir_kontruksi_9) + parseFloat(nilai_akhir_kontruksi_10) + parseFloat(nilai_akhir_kontruksi_11) + parseFloat(nilai_akhir_kontruksi_12) + parseFloat(nilai_akhir_kontruksi_13) + parseFloat(nilai_akhir_kontruksi_14) + parseFloat(nilai_akhir_kontruksi_15) + parseFloat(nilai_akhir_kontruksi_16) + parseFloat(nilai_akhir_kontruksi_17);
            var total_button = $("#total_nilai_pekerjaan_kontruksi").val(total);
            if (total <= 50) {
                $('[name="rating_penilaian_vendor_pekerjaan_kontruksi"]').val(4);
                $('[name="status_rating_pekerjaan_kontruksi"]').val('sangat kurang');
                $('[name="status_nilai_akhir_pekerjaan_kontruksi"]').val(total);
                $('#status_pekerjaan_kontruksi').html('<label for="" class="badge bg-danger">Kurang Baik</label>');
                $('#warning_button').show();
                $('#save_button').hide();
                $('#bintang_pekerjaan_kontruksi').html('');
            } else if (total <= 70) {
                $('[name="rating_penilaian_vendor_pekerjaan_kontruksi"]').val(1);
                $('[name="status_rating_pekerjaan_kontruksi"]').val('cukup baik');
                $('[name="status_nilai_akhir_pekerjaan_kontruksi"]').val(total);
                $('#save_button').show();
                $('#warning_button').hide();
                $('#status_pekerjaan_kontruksi').html('<label for="" class="badge bg-warning">Cukup Baik</label>');
                $('#bintang_pekerjaan_kontruksi').html('<i class="fas fa fa-star text-warning"></i>');
            } else if (total <= 80) {
                $('[name="rating_penilaian_vendor_pekerjaan_kontruksi"]').val(2);
                $('[name="status_rating_pekerjaan_kontruksi"]').val('baik');
                $('[name="status_nilai_akhir_pekerjaan_kontruksi"]').val(total);
                $('#save_button').show();
                $('#warning_button').hide();
                $('#status_pekerjaan_kontruksi').html('<label for="" class="badge bg-warning">Baik</label>');
                $('#bintang_pekerjaan_kontruksi').html('<i class="fas fa fa-star text-warning"></i><i class="fas fa fa-star text-warning"></i>');
            } else {
                $('[name="rating_penilaian_vendor_pekerjaan_kontruksi"]').val(3);
                $('[name="status_rating_pekerjaan_kontruksi"]').val('sangat baik');
                $('[name="status_nilai_akhir_pekerjaan_kontruksi"]').val(total);
                $('#save_button').show();
                $('#warning_button').hide();
                $('#status_pekerjaan_kontruksi').html('<label for="" class="badge bg-success">Sangat Baik</label>');
                $('#bintang_pekerjaan_kontruksi').html('<i class="fas fa fa-star text-warning"></i><i class="fas fa fa-star text-warning"></i><i class="fas fa fa-star text-warning"></i>');
            }

        });
    });
</script>
<script>
    function message2(icon, text) {
        swal({
            title: "Good Jobs!!!",
            text: text,
            icon: icon,
        });
    }

    function message5(icon, text) {
        swal({
            title: "Anda Berhasil Mereset Nilai!!!",
            text: text,
            icon: icon,
        });
    }
    var form_tambah_pekerjaan_kontruksi = $('#form_tambah_pekerjaan_kontruksi');

    function Simpan_pekerjaan_kontruksi() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('administrator/penilaian_kinerja/tambah_pekerjaan_kontruksisaya') ?>',
            data: form_tambah_pekerjaan_kontruksi.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    Swal.fire('Penilaian Berhasil Dibuat!!!', '', 'success')
                    location.reload();
                }
            },
        })
    }

    var form_tambah_pekerjaan_kontruksi = $('#form_tambah_pekerjaan_kontruksi');

    function Simpan_Warning_pekerjaan_kontruksi_warning() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('administrator/penilaian_kinerja/tambah_warning_pekerjaan_kontruksisaya') ?>',
            data: form_tambah_pekerjaan_kontruksi.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $("#kirim_ke_vendor").css('display', 'block');
            },
            success: function(response) {
                Swal.fire('Penilaian Berhasil Dibuat!!!', '', 'success')
                location.reload();
            },
        })
    }

    var form_tambah_pekerjaan_kontruksi_reset = $('#form_tambah_pekerjaan_kontruksi');

    function Reset_nilai_pekerjaan_kontruksi() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('administrator/penilaian_kinerja/reset_penilaian_performance_pekerjaan_kontruksi') ?>',
            data: form_tambah_pekerjaan_kontruksi_reset.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $("#kirim_ke_vendor").css('display', 'block');
            },
            success: function(response) {
                Swal.fire('Penilaian Berhasil Direset!!!', '', 'success')
                location.reload();
            },
        })
    }
</script>