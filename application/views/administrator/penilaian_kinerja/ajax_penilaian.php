<script>
    // cek form
    cek_form()

    function cek_form() {
        var id_vendor = $('[name="id_vendor"]').val()
        var id_rup = $('[name="id_rup"]').val()
        $.ajax({
            url: "<?php echo base_url(); ?>administrator/penilaian_kinerja/get_penilaian",
            method: "POST",
            data: {
                id_rup: id_rup,
                id_vendor: id_vendor,
            },
            success: function(response) {
                if (response['get_pelaksanaan_satgas']) {
                    $('[name="satgas_pelaksanaan_nilai_angka1"]').attr('disabled', 'disabled');
                    $('[name="satgas_pelaksanaan_nilai_angka2"]').attr('disabled', 'disabled');
                    $('[name="satgas_pelaksanaan_nilai_angka3"]').attr('disabled', 'disabled');
                    $('[name="satgas_pelaksanaan_nilai_angka4"]').attr('disabled', 'disabled');
                    $('[name="satgas_pelaksanaan_nilai_angka5"]').attr('disabled', 'disabled');

                    $('[name="satgas_pelaksanaan_penjelasan1"]').attr('disabled', 'disabled');
                    $('[name="satgas_pelaksanaan_penjelasan2"]').attr('disabled', 'disabled');
                    $('[name="satgas_pelaksanaan_penjelasan3"]').attr('disabled', 'disabled');
                    $('[name="satgas_pelaksanaan_penjelasan4"]').attr('disabled', 'disabled');
                    $('[name="satgas_pelaksanaan_penjelasan5"]').attr('disabled', 'disabled');

                    $('#btn_pelaksanaan_satgas_save').attr('disabled', 'disabled');

                    document.getElementById("btn_pelaksanaan_satgas_edit").style.display = "block";

                }

                if (response['get_pelaksanaan_manager']) {
                    $('[name="manager_pelaksanaan_nilai_angka1"]').attr('disabled', 'disabled');
                    $('[name="manager_pelaksanaan_nilai_angka2"]').attr('disabled', 'disabled');
                    $('[name="manager_pelaksanaan_nilai_angka3"]').attr('disabled', 'disabled');
                    $('[name="manager_pelaksanaan_nilai_angka4"]').attr('disabled', 'disabled');
                    $('[name="manager_pelaksanaan_nilai_angka5"]').attr('disabled', 'disabled');

                    $('[name="manager_pelaksanaan_penjelasan1"]').attr('disabled', 'disabled');
                    $('[name="manager_pelaksanaan_penjelasan2"]').attr('disabled', 'disabled');
                    $('[name="manager_pelaksanaan_penjelasan3"]').attr('disabled', 'disabled');
                    $('[name="manager_pelaksanaan_penjelasan4"]').attr('disabled', 'disabled');
                    $('[name="manager_pelaksanaan_penjelasan5"]').attr('disabled', 'disabled');

                    $('#btn_pelaksanaan_manager_save').attr('disabled', 'disabled');

                    document.getElementById("btn_pelaksanaan_manager_edit").style.display = "block";

                }


                if (response['get_pelaksanaan_depthead']) {
                    $('[name="depthead_pelaksanaan_nilai_angka1"]').attr('disabled', 'disabled');
                    $('[name="depthead_pelaksanaan_nilai_angka2"]').attr('disabled', 'disabled');
                    $('[name="depthead_pelaksanaan_nilai_angka3"]').attr('disabled', 'disabled');
                    $('[name="depthead_pelaksanaan_nilai_angka4"]').attr('disabled', 'disabled');
                    $('[name="depthead_pelaksanaan_nilai_angka5"]').attr('disabled', 'disabled');

                    $('[name="depthead_pelaksanaan_penjelasan1"]').attr('disabled', 'disabled');
                    $('[name="depthead_pelaksanaan_penjelasan2"]').attr('disabled', 'disabled');
                    $('[name="depthead_pelaksanaan_penjelasan3"]').attr('disabled', 'disabled');
                    $('[name="depthead_pelaksanaan_penjelasan4"]').attr('disabled', 'disabled');
                    $('[name="depthead_pelaksanaan_penjelasan5"]').attr('disabled', 'disabled');

                    $('#btn_pelaksanaan_depthead_save').attr('disabled', 'disabled');

                    document.getElementById("btn_pelaksanaan_depthead_edit").style.display = "block";
                }


                if (response['get_pemeliharaan_satgas']) {
                    $('[name="satgas_pemeliharaan_nilai_angka1"]').attr('disabled', 'disabled');
                    $('[name="satgas_pemeliharaan_nilai_angka2"]').attr('disabled', 'disabled');
                    $('[name="satgas_pemeliharaan_nilai_angka3"]').attr('disabled', 'disabled');
                    $('[name="satgas_pemeliharaan_nilai_angka4"]').attr('disabled', 'disabled');
                    $('[name="satgas_pemeliharaan_nilai_angka5"]').attr('disabled', 'disabled');
                    $('[name="satgas_pemeliharaan_nilai_angka6"]').attr('disabled', 'disabled');

                    $('[name="satgas_pemeliharaan_penjelasan1"]').attr('disabled', 'disabled');
                    $('[name="satgas_pemeliharaan_penjelasan2"]').attr('disabled', 'disabled');
                    $('[name="satgas_pemeliharaan_penjelasan3"]').attr('disabled', 'disabled');
                    $('[name="satgas_pemeliharaan_penjelasan4"]').attr('disabled', 'disabled');
                    $('[name="satgas_pemeliharaan_penjelasan5"]').attr('disabled', 'disabled');
                    $('[name="satgas_pemeliharaan_penjelasan6"]').attr('disabled', 'disabled');

                    $('#btn_pemeliharaan_satgas_save').attr('disabled', 'disabled');

                    document.getElementById("btn_pemeliharaan_satgas_edit").style.display = "block";
                }

                if (response['get_pemeliharaan_manager']) {
                    $('[name="manager_pemeliharaan_nilai_angka1"]').attr('disabled', 'disabled');
                    $('[name="manager_pemeliharaan_nilai_angka2"]').attr('disabled', 'disabled');
                    $('[name="manager_pemeliharaan_nilai_angka3"]').attr('disabled', 'disabled');
                    $('[name="manager_pemeliharaan_nilai_angka4"]').attr('disabled', 'disabled');
                    $('[name="manager_pemeliharaan_nilai_angka5"]').attr('disabled', 'disabled');
                    $('[name="manager_pemeliharaan_nilai_angka6"]').attr('disabled', 'disabled');

                    $('[name="manager_pemeliharaan_penjelasan1"]').attr('disabled', 'disabled');
                    $('[name="manager_pemeliharaan_penjelasan2"]').attr('disabled', 'disabled');
                    $('[name="manager_pemeliharaan_penjelasan3"]').attr('disabled', 'disabled');
                    $('[name="manager_pemeliharaan_penjelasan4"]').attr('disabled', 'disabled');
                    $('[name="manager_pemeliharaan_penjelasan5"]').attr('disabled', 'disabled');
                    $('[name="manager_pemeliharaan_penjelasan6"]').attr('disabled', 'disabled');

                    $('#btn_pemeliharaan_manager_save').attr('disabled', 'disabled');

                    document.getElementById("btn_pemeliharaan_manager_edit").style.display = "block";
                }


                if (response['get_pemeliharaan_depthead']) {
                    $('[name="depthead_pemeliharaan_nilai_angka1"]').attr('disabled', 'disabled');
                    $('[name="depthead_pemeliharaan_nilai_angka2"]').attr('disabled', 'disabled');
                    $('[name="depthead_pemeliharaan_nilai_angka3"]').attr('disabled', 'disabled');
                    $('[name="depthead_pemeliharaan_nilai_angka4"]').attr('disabled', 'disabled');
                    $('[name="depthead_pemeliharaan_nilai_angka5"]').attr('disabled', 'disabled');
                    $('[name="depthead_pemeliharaan_nilai_angka6"]').attr('disabled', 'disabled');

                    $('[name="depthead_pemeliharaan_penjelasan1"]').attr('disabled', 'disabled');
                    $('[name="depthead_pemeliharaan_penjelasan2"]').attr('disabled', 'disabled');
                    $('[name="depthead_pemeliharaan_penjelasan3"]').attr('disabled', 'disabled');
                    $('[name="depthead_pemeliharaan_penjelasan4"]').attr('disabled', 'disabled');
                    $('[name="depthead_pemeliharaan_penjelasan5"]').attr('disabled', 'disabled');
                    $('[name="depthead_pemeliharaan_penjelasan6"]').attr('disabled', 'disabled');

                    $('#btn_pemeliharaan_depthead_save').attr('disabled', 'disabled');

                    document.getElementById("btn_pemeliharaan_depthead_edit").style.display = "block";
                }

            }
        })
    }


    function open_form(type) {
        if (type == 'pelaksanaan_satgas') {
            Swal.fire({
                title: "Apakah Anda Yakin?!",
                text: "Ingin Mengubah Data Ini?!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Ubah!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('[name="satgas_pelaksanaan_nilai_angka1"]').removeAttr('disabled', 'disabled');
                    $('[name="satgas_pelaksanaan_nilai_angka2"]').removeAttr('disabled', 'disabled');
                    $('[name="satgas_pelaksanaan_nilai_angka3"]').removeAttr('disabled', 'disabled');
                    $('[name="satgas_pelaksanaan_nilai_angka4"]').removeAttr('disabled', 'disabled');
                    $('[name="satgas_pelaksanaan_nilai_angka5"]').removeAttr('disabled', 'disabled');

                    $('[name="satgas_pelaksanaan_penjelasan1"]').removeAttr('disabled', 'disabled');
                    $('[name="satgas_pelaksanaan_penjelasan2"]').removeAttr('disabled', 'disabled');
                    $('[name="satgas_pelaksanaan_penjelasan3"]').removeAttr('disabled', 'disabled');
                    $('[name="satgas_pelaksanaan_penjelasan4"]').removeAttr('disabled', 'disabled');
                    $('[name="satgas_pelaksanaan_penjelasan5"]').removeAttr('disabled', 'disabled');
                    $('#btn_pelaksanaan_satgas_save').removeAttr('disabled', 'disabled');
                }
            });

        } else if (type == 'pelaksanaan_manager') {
            Swal.fire({
                title: "Apakah Anda Yakin?!",
                text: "Ingin Mengubah Data Ini?!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Ubah!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('[name="manager_pelaksanaan_nilai_angka1"]').removeAttr('disabled', 'disabled');
                    $('[name="manager_pelaksanaan_nilai_angka2"]').removeAttr('disabled', 'disabled');
                    $('[name="manager_pelaksanaan_nilai_angka3"]').removeAttr('disabled', 'disabled');
                    $('[name="manager_pelaksanaan_nilai_angka4"]').removeAttr('disabled', 'disabled');
                    $('[name="manager_pelaksanaan_nilai_angka5"]').removeAttr('disabled', 'disabled');

                    $('[name="manager_pelaksanaan_penjelasan1"]').removeAttr('disabled', 'disabled');
                    $('[name="manager_pelaksanaan_penjelasan2"]').removeAttr('disabled', 'disabled');
                    $('[name="manager_pelaksanaan_penjelasan3"]').removeAttr('disabled', 'disabled');
                    $('[name="manager_pelaksanaan_penjelasan4"]').removeAttr('disabled', 'disabled');
                    $('[name="manager_pelaksanaan_penjelasan5"]').removeAttr('disabled', 'disabled');
                    $('#btn_pelaksanaan_manager_save').removeAttr('disabled', 'disabled');
                }
            });
        } else if (type == 'pelaksanaan_depthead') {
            Swal.fire({
                title: "Apakah Anda Yakin?!",
                text: "Ingin Mengubah Data Ini?!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Ubah!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('[name="depthead_pelaksanaan_nilai_angka1"]').removeAttr('disabled', 'disabled');
                    $('[name="depthead_pelaksanaan_nilai_angka2"]').removeAttr('disabled', 'disabled');
                    $('[name="depthead_pelaksanaan_nilai_angka3"]').removeAttr('disabled', 'disabled');
                    $('[name="depthead_pelaksanaan_nilai_angka4"]').removeAttr('disabled', 'disabled');
                    $('[name="depthead_pelaksanaan_nilai_angka5"]').removeAttr('disabled', 'disabled');

                    $('[name="depthead_pelaksanaan_penjelasan1"]').removeAttr('disabled', 'disabled');
                    $('[name="depthead_pelaksanaan_penjelasan2"]').removeAttr('disabled', 'disabled');
                    $('[name="depthead_pelaksanaan_penjelasan3"]').removeAttr('disabled', 'disabled');
                    $('[name="depthead_pelaksanaan_penjelasan4"]').removeAttr('disabled', 'disabled');
                    $('[name="depthead_pelaksanaan_penjelasan5"]').removeAttr('disabled', 'disabled');
                    $('#btn_pelaksanaan_depthead_save').removeAttr('disabled', 'disabled');
                }
            });
        } else if (type == 'pemeliharaan_satgas') {
            Swal.fire({
                title: "Apakah Anda Yakin?!",
                text: "Ingin Mengubah Data Ini?!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Ubah!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('[name="satgas_pemeliharaan_nilai_angka1"]').removeAttr('disabled', 'disabled');
                    $('[name="satgas_pemeliharaan_nilai_angka2"]').removeAttr('disabled', 'disabled');
                    $('[name="satgas_pemeliharaan_nilai_angka3"]').removeAttr('disabled', 'disabled');
                    $('[name="satgas_pemeliharaan_nilai_angka4"]').removeAttr('disabled', 'disabled');
                    $('[name="satgas_pemeliharaan_nilai_angka5"]').removeAttr('disabled', 'disabled');
                    $('[name="satgas_pemeliharaan_nilai_angka6"]').removeAttr('disabled', 'disabled');

                    $('[name="satgas_pemeliharaan_penjelasan1"]').removeAttr('disabled', 'disabled');
                    $('[name="satgas_pemeliharaan_penjelasan2"]').removeAttr('disabled', 'disabled');
                    $('[name="satgas_pemeliharaan_penjelasan3"]').removeAttr('disabled', 'disabled');
                    $('[name="satgas_pemeliharaan_penjelasan4"]').removeAttr('disabled', 'disabled');
                    $('[name="satgas_pemeliharaan_penjelasan5"]').removeAttr('disabled', 'disabled');
                    $('[name="satgas_pemeliharaan_penjelasan6"]').removeAttr('disabled', 'disabled');
                    $('#btn_pemeliharaan_satgas_save').removeAttr('disabled', 'disabled');
                }
            });
        } else if (type == 'pemeliharaan_manager') {
            Swal.fire({
                title: "Apakah Anda Yakin?!",
                text: "Ingin Mengubah Data Ini?!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Ubah!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('[name="manager_pemeliharaan_nilai_angka1"]').removeAttr('disabled', 'disabled');
                    $('[name="manager_pemeliharaan_nilai_angka2"]').removeAttr('disabled', 'disabled');
                    $('[name="manager_pemeliharaan_nilai_angka3"]').removeAttr('disabled', 'disabled');
                    $('[name="manager_pemeliharaan_nilai_angka4"]').removeAttr('disabled', 'disabled');
                    $('[name="manager_pemeliharaan_nilai_angka5"]').removeAttr('disabled', 'disabled');
                    $('[name="manager_pemeliharaan_nilai_angka6"]').removeAttr('disabled', 'disabled');

                    $('[name="manager_pemeliharaan_penjelasan1"]').removeAttr('disabled', 'disabled');
                    $('[name="manager_pemeliharaan_penjelasan2"]').removeAttr('disabled', 'disabled');
                    $('[name="manager_pemeliharaan_penjelasan3"]').removeAttr('disabled', 'disabled');
                    $('[name="manager_pemeliharaan_penjelasan4"]').removeAttr('disabled', 'disabled');
                    $('[name="manager_pemeliharaan_penjelasan5"]').removeAttr('disabled', 'disabled');
                    $('[name="manager_pemeliharaan_penjelasan6"]').removeAttr('disabled', 'disabled');
                    $('#btn_pemeliharaan_manager_save').removeAttr('disabled', 'disabled');
                }
            });
        } else if (type == 'pemeliharaan_depthead') {
            Swal.fire({
                title: "Apakah Anda Yakin?!",
                text: "Ingin Mengubah Data Ini?!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Ubah!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('[name="depthead_pemeliharaan_nilai_angka1"]').removeAttr('disabled', 'disabled');
                    $('[name="depthead_pemeliharaan_nilai_angka2"]').removeAttr('disabled', 'disabled');
                    $('[name="depthead_pemeliharaan_nilai_angka3"]').removeAttr('disabled', 'disabled');
                    $('[name="depthead_pemeliharaan_nilai_angka4"]').removeAttr('disabled', 'disabled');
                    $('[name="depthead_pemeliharaan_nilai_angka5"]').removeAttr('disabled', 'disabled');
                    $('[name="depthead_pemeliharaan_nilai_angka6"]').removeAttr('disabled', 'disabled');

                    $('[name="depthead_pemeliharaan_penjelasan1"]').removeAttr('disabled', 'disabled');
                    $('[name="depthead_pemeliharaan_penjelasan2"]').removeAttr('disabled', 'disabled');
                    $('[name="depthead_pemeliharaan_penjelasan3"]').removeAttr('disabled', 'disabled');
                    $('[name="depthead_pemeliharaan_penjelasan4"]').removeAttr('disabled', 'disabled');
                    $('[name="depthead_pemeliharaan_penjelasan5"]').removeAttr('disabled', 'disabled');
                    $('[name="depthead_pemeliharaan_penjelasan6"]').removeAttr('disabled', 'disabled');
                    $('#btn_pemeliharaan_depthead_save').removeAttr('disabled', 'disabled');
                }
            });
        }
    }
    // end cek form


    // library nich

    function cek_val(val) {
        if (!val) {
            return 0;
        } else {
            return val
        }
    }

    function cek_nilai_huruf(val) {
        if (!val) {
            return '';
        } else {
            if (val >= 90) {
                if (val > 94) {
                    return 'A+'
                } else {
                    return 'A'
                }
            } else if (val >= 80 && val < 90) {
                if (val >= 86) {
                    return 'B+'
                } else {
                    return 'B'
                }
            } else if (val >= 60 && val < 80) {
                if (val >= 75) {
                    return 'C+'
                } else {
                    return 'C'
                }
            } else if (val <= 60) {
                if (val >= 50) {
                    return 'D+'
                } else {
                    return 'D'
                }
            } else {
                return 'Tidak Diketahui'
            }
        }

    }
    get_total_penilaian_pelaksanaan()

    function get_total_penilaian_pelaksanaan() {
        var id_vendor = $('[name="id_vendor"]').val()
        var id_rup = $('[name="id_rup"]').val()
        $.ajax({
            url: "<?php echo base_url(); ?>administrator/penilaian_kinerja/get_penilaian",
            method: "POST",
            data: {
                id_rup: id_rup,
                id_vendor: id_vendor,
            },
            success: function(response) {
                $('#pelaksanaan_satgas_nilai_angka1').text(response['get_pelaksanaan_satgas'].nilai_angka1)
                $('#pelaksanaan_manager_nilai_angka1').text(response['get_pelaksanaan_manager'].nilai_angka1)
                $('#pelaksanaan_depthead_nilai_angka1').text(response['get_pelaksanaan_depthead'].nilai_angka1)
                $('#pelaksanaan_total1').text(response['get_pelaksanaan_total'].nilai_rata_rata1)
                $('#pelaksanaan_bobot1').text(response['get_pelaksanaan_total'].nilai_terbobot1)

                $('#pelaksanaan_satgas_nilai_angka2').text(response['get_pelaksanaan_satgas'].nilai_angka2)
                $('#pelaksanaan_manager_nilai_angka2').text(response['get_pelaksanaan_manager'].nilai_angka2)
                $('#pelaksanaan_depthead_nilai_angka2').text(response['get_pelaksanaan_depthead'].nilai_angka2)
                $('#pelaksanaan_total2').text(response['get_pelaksanaan_total'].nilai_rata_rata2)
                $('#pelaksanaan_bobot2').text(response['get_pelaksanaan_total'].nilai_terbobot2)

                $('#pelaksanaan_satgas_nilai_angka3').text(response['get_pelaksanaan_satgas'].nilai_angka3)
                $('#pelaksanaan_manager_nilai_angka3').text(response['get_pelaksanaan_manager'].nilai_angka3)
                $('#pelaksanaan_depthead_nilai_angka3').text(response['get_pelaksanaan_depthead'].nilai_angka3)
                $('#pelaksanaan_total3').text(response['get_pelaksanaan_total'].nilai_rata_rata3)
                $('#pelaksanaan_bobot3').text(response['get_pelaksanaan_total'].nilai_terbobot3)

                $('#pelaksanaan_satgas_nilai_angka4').text(response['get_pelaksanaan_satgas'].nilai_angka4)
                $('#pelaksanaan_manager_nilai_angka4').text(response['get_pelaksanaan_manager'].nilai_angka4)
                $('#pelaksanaan_depthead_nilai_angka4').text(response['get_pelaksanaan_depthead'].nilai_angka4)
                $('#pelaksanaan_total4').text(response['get_pelaksanaan_total'].nilai_rata_rata4)
                $('#pelaksanaan_bobot4').text(response['get_pelaksanaan_total'].nilai_terbobot4)

                $('#pelaksanaan_satgas_nilai_angka5').text(response['get_pelaksanaan_satgas'].nilai_angka5)
                $('#pelaksanaan_manager_nilai_angka5').text(response['get_pelaksanaan_manager'].nilai_angka5)
                $('#pelaksanaan_depthead_nilai_angka5').text(response['get_pelaksanaan_depthead'].nilai_angka5)
                $('#pelaksanaan_total5').text(response['get_pelaksanaan_total'].nilai_rata_rata5)
                $('#pelaksanaan_bobot5').text(response['get_pelaksanaan_total'].nilai_terbobot5)

                $('#pelaksanaan_hasil_akhir_angka').text(response['get_pelaksanaan_total'].hasil_akhir)
                $('#pelaksanaan_hasil_akhir').text(response['get_pelaksanaan_total'].hasil_predikat)


                var hasil_akhir = response['get_pelaksanaan_total'].hasil_akhir;
                if (hasil_akhir >= 80) {
                    document.getElementById("star_pemeriksaaan1").style.display = "block";
                    document.getElementById("star_pemeriksaaan2").style.display = "none";
                    document.getElementById("star_pemeriksaaan3").style.display = "none";
                    document.getElementById("star_pemeriksaaan4").style.display = "none";
                } else if (hasil_akhir >= 60) {
                    document.getElementById("star_pemeriksaaan1").style.display = "none";
                    document.getElementById("star_pemeriksaaan2").style.display = "block";
                    document.getElementById("star_pemeriksaaan3").style.display = "none";
                    document.getElementById("star_pemeriksaaan4").style.display = "none";
                } else if (hasil_akhir >= 40) {
                    document.getElementById("star_pemeriksaaan1").style.display = "none";
                    document.getElementById("star_pemeriksaaan2").style.display = "none";
                    document.getElementById("star_pemeriksaaan3").style.display = "block";
                    document.getElementById("star_pemeriksaaan4").style.display = "none";
                } else {
                    document.getElementById("star_pemeriksaaan1").style.display = "none";
                    document.getElementById("star_pemeriksaaan2").style.display = "none";
                    document.getElementById("star_pemeriksaaan3").style.display = "none";
                    document.getElementById("star_pemeriksaaan4").style.display = "block";
                }
            }
        })

    }

    // satgas pelaksana nih
    function hitung_satgas_pelaksanaan() {
        var satgas_nilai_angka1 = $('[name="satgas_pelaksanaan_nilai_angka1"]').val()
        var satgas_nilai_angka2 = $('[name="satgas_pelaksanaan_nilai_angka2"]').val()
        var satgas_nilai_angka3 = $('[name="satgas_pelaksanaan_nilai_angka3"]').val()
        var satgas_nilai_angka4 = $('[name="satgas_pelaksanaan_nilai_angka4"]').val()
        var satgas_nilai_angka5 = $('[name="satgas_pelaksanaan_nilai_angka5"]').val()

        var hasil = parseFloat(cek_val(satgas_nilai_angka1)) + parseFloat(cek_val(satgas_nilai_angka2)) + parseFloat(cek_val(satgas_nilai_angka3)) + parseFloat(cek_val(satgas_nilai_angka4)) + parseFloat(cek_val(satgas_nilai_angka5))
        $('[name="satgas_pelaksanaan_hasil_angka"]').val(hasil / 5)

        $('[name="satgas_pelaksanaan_nilai1"]').val(cek_nilai_huruf(satgas_nilai_angka1))
        $('[name="satgas_pelaksanaan_nilai2"]').val(cek_nilai_huruf(satgas_nilai_angka2))
        $('[name="satgas_pelaksanaan_nilai3"]').val(cek_nilai_huruf(satgas_nilai_angka3))
        $('[name="satgas_pelaksanaan_nilai4"]').val(cek_nilai_huruf(satgas_nilai_angka4))
        $('[name="satgas_pelaksanaan_nilai5"]').val(cek_nilai_huruf(satgas_nilai_angka5))

        $('[name="satgas_pelaksanaan_hasil"]').val(cek_nilai_huruf(hasil / 5))

        var hasil_akhir = $('[name="satgas_pelaksanaan_hasil_angka"]').val()

        if (hasil_akhir >= 80) {
            document.getElementById("star_satgas_pelaksanaan1").style.display = "block";
            document.getElementById("star_satgas_pelaksanaan2").style.display = "block";
            document.getElementById("star_satgas_pelaksanaan3").style.display = "block";
            document.getElementById("star_satgas_pelaksanaan4").style.display = "block";
        } else if (hasil_akhir >= 60) {
            document.getElementById("star_satgas_pelaksanaan1").style.display = "block";
            document.getElementById("star_satgas_pelaksanaan2").style.display = "block";
            document.getElementById("star_satgas_pelaksanaan3").style.display = "block";
            document.getElementById("star_satgas_pelaksanaan4").style.display = "none";
        } else if (hasil_akhir >= 40) {
            document.getElementById("star_satgas_pelaksanaan1").style.display = "block";
            document.getElementById("star_satgas_pelaksanaan2").style.display = "block";
            document.getElementById("star_satgas_pelaksanaan3").style.display = "none";
            document.getElementById("star_satgas_pelaksanaan4").style.display = "none";
        } else {
            document.getElementById("star_satgas_pelaksanaan1").style.display = "block";
            document.getElementById("star_satgas_pelaksanaan2").style.display = "none";
            document.getElementById("star_satgas_pelaksanaan3").style.display = "none";
            document.getElementById("star_satgas_pelaksanaan4").style.display = "none";
        }
    }


    var form_pelaksanaan_satgas = $('#form_pelaksanaan_satgas');
    form_pelaksanaan_satgas.on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo base_url(); ?>administrator/penilaian_kinerja/add_pelaksanaan_satgas",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                Swal.fire('Berhasil!', 'Data Berhasil Disimpan', 'success');
                get_total_penilaian_pelaksanaan()
                cek_form()
            }
        });
    });

    // end satgas pelaksana

    // pelaksanaan manager nih

    function hitung_manager_pelaksanaan() {
        var manager_nilai_angka1 = $('[name="manager_pelaksanaan_nilai_angka1"]').val()
        var manager_nilai_angka2 = $('[name="manager_pelaksanaan_nilai_angka2"]').val()
        var manager_nilai_angka3 = $('[name="manager_pelaksanaan_nilai_angka3"]').val()
        var manager_nilai_angka4 = $('[name="manager_pelaksanaan_nilai_angka4"]').val()
        var manager_nilai_angka5 = $('[name="manager_pelaksanaan_nilai_angka5"]').val()

        var hasil = parseFloat(cek_val(manager_nilai_angka1)) + parseFloat(cek_val(manager_nilai_angka2)) + parseFloat(cek_val(manager_nilai_angka3)) + parseFloat(cek_val(manager_nilai_angka4)) + parseFloat(cek_val(manager_nilai_angka5))
        $('[name="manager_pelaksanaan_hasil_angka"]').val(hasil / 5)

        $('[name="manager_pelaksanaan_nilai1"]').val(cek_nilai_huruf(manager_nilai_angka1))
        $('[name="manager_pelaksanaan_nilai2"]').val(cek_nilai_huruf(manager_nilai_angka2))
        $('[name="manager_pelaksanaan_nilai3"]').val(cek_nilai_huruf(manager_nilai_angka3))
        $('[name="manager_pelaksanaan_nilai4"]').val(cek_nilai_huruf(manager_nilai_angka4))
        $('[name="manager_pelaksanaan_nilai5"]').val(cek_nilai_huruf(manager_nilai_angka5))

        $('[name="manager_pelaksanaan_hasil"]').val(cek_nilai_huruf(hasil / 5))

        var hasil_akhir = $('[name="manager_pelaksanaan_hasil_angka"]').val()

        if (hasil_akhir >= 80) {
            document.getElementById("star_manager_pelaksanaan1").style.display = "block";
            document.getElementById("star_manager_pelaksanaan2").style.display = "block";
            document.getElementById("star_manager_pelaksanaan3").style.display = "block";
            document.getElementById("star_manager_pelaksanaan4").style.display = "block";
        } else if (hasil_akhir >= 60) {
            document.getElementById("star_manager_pelaksanaan1").style.display = "block";
            document.getElementById("star_manager_pelaksanaan2").style.display = "block";
            document.getElementById("star_manager_pelaksanaan3").style.display = "block";
            document.getElementById("star_manager_pelaksanaan4").style.display = "none";
        } else if (hasil_akhir >= 40) {
            document.getElementById("star_manager_pelaksanaan1").style.display = "block";
            document.getElementById("star_manager_pelaksanaan2").style.display = "block";
            document.getElementById("star_manager_pelaksanaan3").style.display = "none";
            document.getElementById("star_manager_pelaksanaan4").style.display = "none";
        } else {
            document.getElementById("star_manager_pelaksanaan1").style.display = "block";
            document.getElementById("star_manager_pelaksanaan2").style.display = "none";
            document.getElementById("star_manager_pelaksanaan3").style.display = "none";
            document.getElementById("star_manager_pelaksanaan4").style.display = "none";
        }
    }

    var form_pelaksanaan_manager = $('#form_pelaksanaan_manager');
    form_pelaksanaan_manager.on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo base_url(); ?>administrator/penilaian_kinerja/add_pelaksanaan_manager",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                Swal.fire('Berhasil!', 'Data Berhasil Disimpan', 'success');
                get_total_penilaian_pelaksanaan()
                cek_form()
            }
        });
    });

    // end pelaksana manager

    // depthead pelaksanaan nih

    function hitung_depthead_pelaksanaan() {
        var depthead_nilai_angka1 = $('[name="depthead_pelaksanaan_nilai_angka1"]').val()
        var depthead_nilai_angka2 = $('[name="depthead_pelaksanaan_nilai_angka2"]').val()
        var depthead_nilai_angka3 = $('[name="depthead_pelaksanaan_nilai_angka3"]').val()
        var depthead_nilai_angka4 = $('[name="depthead_pelaksanaan_nilai_angka4"]').val()
        var depthead_nilai_angka5 = $('[name="depthead_pelaksanaan_nilai_angka5"]').val()

        var hasil = parseFloat(cek_val(depthead_nilai_angka1)) + parseFloat(cek_val(depthead_nilai_angka2)) + parseFloat(cek_val(depthead_nilai_angka3)) + parseFloat(cek_val(depthead_nilai_angka4)) + parseFloat(cek_val(depthead_nilai_angka5))
        $('[name="depthead_pelaksanaan_hasil_angka"]').val(hasil / 5)

        $('[name="depthead_pelaksanaan_nilai1"]').val(cek_nilai_huruf(depthead_nilai_angka1))
        $('[name="depthead_pelaksanaan_nilai2"]').val(cek_nilai_huruf(depthead_nilai_angka2))
        $('[name="depthead_pelaksanaan_nilai3"]').val(cek_nilai_huruf(depthead_nilai_angka3))
        $('[name="depthead_pelaksanaan_nilai4"]').val(cek_nilai_huruf(depthead_nilai_angka4))
        $('[name="depthead_pelaksanaan_nilai5"]').val(cek_nilai_huruf(depthead_nilai_angka5))

        $('[name="depthead_pelaksanaan_hasil"]').val(cek_nilai_huruf(hasil / 5))

        var hasil_akhir = $('[name="depthead_pelaksanaan_hasil_angka"]').val()

        if (hasil_akhir >= 80) {
            document.getElementById("star_depthead_pelaksanaan1").style.display = "block";
            document.getElementById("star_depthead_pelaksanaan2").style.display = "block";
            document.getElementById("star_depthead_pelaksanaan3").style.display = "block";
            document.getElementById("star_depthead_pelaksanaan4").style.display = "block";
        } else if (hasil_akhir >= 60) {
            document.getElementById("star_depthead_pelaksanaan1").style.display = "block";
            document.getElementById("star_depthead_pelaksanaan2").style.display = "block";
            document.getElementById("star_depthead_pelaksanaan3").style.display = "block";
            document.getElementById("star_depthead_pelaksanaan4").style.display = "none";
        } else if (hasil_akhir >= 40) {
            document.getElementById("star_depthead_pelaksanaan1").style.display = "block";
            document.getElementById("star_depthead_pelaksanaan2").style.display = "block";
            document.getElementById("star_depthead_pelaksanaan3").style.display = "none";
            document.getElementById("star_depthead_pelaksanaan4").style.display = "none";
        } else {
            document.getElementById("star_depthead_pelaksanaan1").style.display = "block";
            document.getElementById("star_depthead_pelaksanaan2").style.display = "none";
            document.getElementById("star_depthead_pelaksanaan3").style.display = "none";
            document.getElementById("star_depthead_pelaksanaan4").style.display = "none";
        }
    }

    var form_pelaksanaan_depthead = $('#form_pelaksanaan_depthead');
    form_pelaksanaan_depthead.on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo base_url(); ?>administrator/penilaian_kinerja/add_pelaksanaan_depthead",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                Swal.fire('Berhasil!', 'Data Berhasil Disimpan', 'success');
                get_total_penilaian_pelaksanaan()
                cek_form()
            }
        });
    });

    // end depthead pelaksana


    // hitung total pelaksana

    var form_pelaksanaan_total = $('#form_pelaksanaan_total');
    form_pelaksanaan_total.on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo base_url(); ?>administrator/penilaian_kinerja/add_pelaksanaan_total",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                Swal.fire('Berhasil!', 'Data Berhasil Disimpan', 'success');
                get_total_penilaian_pelaksanaan()
                cek_form()
            }
        });
    });

    update_total_pelaksanaan()

    function update_total_pelaksanaan() {
        var id_rup = $('[name="id_rup"]').val()
        var id_vendor = $('[name="id_vendor"]').val()
        $.ajax({
            url: "<?php echo base_url(); ?>administrator/penilaian_kinerja/update_pelaksanaan_penilaian",
            method: "POST",
            data: {
                id_rup: id_rup,
                id_vendor: id_vendor
            },

        });
    }

    // end total pelaksana


    // satgas pemeliharaan
    get_total_penilaian_pemeliharaan()

    function get_total_penilaian_pemeliharaan() {
        var id_vendor = $('[name="id_vendor"]').val()
        var id_rup = $('[name="id_rup"]').val()
        $.ajax({
            url: "<?php echo base_url(); ?>administrator/penilaian_kinerja/get_penilaian",
            method: "POST",
            data: {
                id_rup: id_rup,
                id_vendor: id_vendor,
            },
            success: function(response) {
                $('#pemeliharaan_satgas_nilai_angka1').text(response['get_pemeliharaan_satgas'].nilai_angka1)
                $('#pemeliharaan_manager_nilai_angka1').text(response['get_pemeliharaan_manager'].nilai_angka1)
                $('#pemeliharaan_depthead_nilai_angka1').text(response['get_pemeliharaan_depthead'].nilai_angka1)
                $('#pemeliharaan_total1').text(response['get_pemeliharaan_total'].nilai_rata_rata1)
                $('#pemeliharaan_bobot1').text(response['get_pemeliharaan_total'].nilai_terbobot1)

                $('#pemeliharaan_satgas_nilai_angka2').text(response['get_pemeliharaan_satgas'].nilai_angka2)
                $('#pemeliharaan_manager_nilai_angka2').text(response['get_pemeliharaan_manager'].nilai_angka2)
                $('#pemeliharaan_depthead_nilai_angka2').text(response['get_pemeliharaan_depthead'].nilai_angka2)
                $('#pemeliharaan_total2').text(response['get_pemeliharaan_total'].nilai_rata_rata2)
                $('#pemeliharaan_bobot2').text(response['get_pemeliharaan_total'].nilai_terbobot2)

                $('#pemeliharaan_satgas_nilai_angka3').text(response['get_pemeliharaan_satgas'].nilai_angka3)
                $('#pemeliharaan_manager_nilai_angka3').text(response['get_pemeliharaan_manager'].nilai_angka3)
                $('#pemeliharaan_depthead_nilai_angka3').text(response['get_pemeliharaan_depthead'].nilai_angka3)
                $('#pemeliharaan_total3').text(response['get_pemeliharaan_total'].nilai_rata_rata3)
                $('#pemeliharaan_bobot3').text(response['get_pemeliharaan_total'].nilai_terbobot3)

                $('#pemeliharaan_satgas_nilai_angka4').text(response['get_pemeliharaan_satgas'].nilai_angka4)
                $('#pemeliharaan_manager_nilai_angka4').text(response['get_pemeliharaan_manager'].nilai_angka4)
                $('#pemeliharaan_depthead_nilai_angka4').text(response['get_pemeliharaan_depthead'].nilai_angka4)
                $('#pemeliharaan_total4').text(response['get_pemeliharaan_total'].nilai_rata_rata4)
                $('#pemeliharaan_bobot4').text(response['get_pemeliharaan_total'].nilai_terbobot4)

                $('#pemeliharaan_satgas_nilai_angka5').text(response['get_pemeliharaan_satgas'].nilai_angka5)
                $('#pemeliharaan_manager_nilai_angka5').text(response['get_pemeliharaan_manager'].nilai_angka5)
                $('#pemeliharaan_depthead_nilai_angka5').text(response['get_pemeliharaan_depthead'].nilai_angka5)
                $('#pemeliharaan_total5').text(response['get_pemeliharaan_total'].nilai_rata_rata5)
                $('#pemeliharaan_bobot5').text(response['get_pemeliharaan_total'].nilai_terbobot5)

                $('#pemeliharaan_satgas_nilai_angka6').text(response['get_pemeliharaan_satgas'].nilai_angka6)
                $('#pemeliharaan_manager_nilai_angka6').text(response['get_pemeliharaan_manager'].nilai_angka6)
                $('#pemeliharaan_depthead_nilai_angka6').text(response['get_pemeliharaan_depthead'].nilai_angka6)
                $('#pemeliharaan_total6').text(response['get_pemeliharaan_total'].nilai_rata_rata6)
                $('#pemeliharaan_bobot6').text(response['get_pemeliharaan_total'].nilai_terbobot6)

                $('#pemeliharaan_hasil_akhir_angka').text(response['get_pemeliharaan_total'].hasil_akhir)
                $('#pemeliharaan_hasil_akhir').text(response['get_pemeliharaan_total'].hasil_predikat)


                var hasil_akhir = response['get_pemeliharaan_total'].hasil_akhir;
                if (hasil_akhir >= 80) {
                    document.getElementById("star_pemeliharaan1").style.display = "block";
                    document.getElementById("star_pemeliharaan2").style.display = "none";
                    document.getElementById("star_pemeliharaan3").style.display = "none";
                    document.getElementById("star_pemeliharaan4").style.display = "none";
                } else if (hasil_akhir >= 60) {
                    document.getElementById("star_pemeliharaan1").style.display = "none";
                    document.getElementById("star_pemeliharaan2").style.display = "block";
                    document.getElementById("star_pemeliharaan3").style.display = "none";
                    document.getElementById("star_pemeliharaan4").style.display = "none";
                } else if (hasil_akhir >= 40) {
                    document.getElementById("star_pemeliharaan1").style.display = "none";
                    document.getElementById("star_pemeliharaan2").style.display = "none";
                    document.getElementById("star_pemeliharaan3").style.display = "block";
                    document.getElementById("star_pemeliharaan4").style.display = "none";
                } else {
                    document.getElementById("star_pemeliharaan1").style.display = "none";
                    document.getElementById("star_pemeliharaan2").style.display = "none";
                    document.getElementById("star_pemeliharaan3").style.display = "none";
                    document.getElementById("star_pemeliharaan4").style.display = "block";
                }
            }
        })

    }

    function hitung_satgas_pemeliharaan() {
        var satgas_nilai_angka1 = $('[name="satgas_pemeliharaan_nilai_angka1"]').val()
        var satgas_nilai_angka2 = $('[name="satgas_pemeliharaan_nilai_angka2"]').val()
        var satgas_nilai_angka3 = $('[name="satgas_pemeliharaan_nilai_angka3"]').val()
        var satgas_nilai_angka4 = $('[name="satgas_pemeliharaan_nilai_angka4"]').val()
        var satgas_nilai_angka5 = $('[name="satgas_pemeliharaan_nilai_angka5"]').val()
        var satgas_nilai_angka6 = $('[name="satgas_pemeliharaan_nilai_angka6"]').val()

        var hasil = parseFloat(cek_val(satgas_nilai_angka1)) + parseFloat(cek_val(satgas_nilai_angka2)) + parseFloat(cek_val(satgas_nilai_angka3)) + parseFloat(cek_val(satgas_nilai_angka4)) + parseFloat(cek_val(satgas_nilai_angka5)) + parseFloat(cek_val(satgas_nilai_angka6))
        $('[name="satgas_pemeliharaan_hasil_angka"]').val(hasil / 6)

        $('[name="satgas_pemeliharaan_nilai1"]').val(cek_nilai_huruf(satgas_nilai_angka1))
        $('[name="satgas_pemeliharaan_nilai2"]').val(cek_nilai_huruf(satgas_nilai_angka2))
        $('[name="satgas_pemeliharaan_nilai3"]').val(cek_nilai_huruf(satgas_nilai_angka3))
        $('[name="satgas_pemeliharaan_nilai4"]').val(cek_nilai_huruf(satgas_nilai_angka4))
        $('[name="satgas_pemeliharaan_nilai5"]').val(cek_nilai_huruf(satgas_nilai_angka5))
        $('[name="satgas_pemeliharaan_nilai6"]').val(cek_nilai_huruf(satgas_nilai_angka6))

        $('[name="satgas_pemeliharaan_hasil"]').val(cek_nilai_huruf(hasil / 6))

        var hasil_akhir = $('[name="satgas_pemeliharaan_hasil_angka"]').val()

        if (hasil_akhir >= 80) {
            document.getElementById("star_satgas_pemeliharaan1").style.display = "block";
            document.getElementById("star_satgas_pemeliharaan2").style.display = "block";
            document.getElementById("star_satgas_pemeliharaan3").style.display = "block";
            document.getElementById("star_satgas_pemeliharaan4").style.display = "block";
        } else if (hasil_akhir >= 60) {
            document.getElementById("star_satgas_pemeliharaan1").style.display = "block";
            document.getElementById("star_satgas_pemeliharaan2").style.display = "block";
            document.getElementById("star_satgas_pemeliharaan3").style.display = "block";
            document.getElementById("star_satgas_pemeliharaan4").style.display = "none";
        } else if (hasil_akhir >= 40) {
            document.getElementById("star_satgas_pemeliharaan1").style.display = "block";
            document.getElementById("star_satgas_pemeliharaan2").style.display = "block";
            document.getElementById("star_satgas_pemeliharaan3").style.display = "none";
            document.getElementById("star_satgas_pemeliharaan4").style.display = "none";
        } else {
            document.getElementById("star_satgas_pemeliharaan1").style.display = "block";
            document.getElementById("star_satgas_pemeliharaan2").style.display = "none";
            document.getElementById("star_satgas_pemeliharaan3").style.display = "none";
            document.getElementById("star_satgas_pemeliharaan4").style.display = "none";
        }
    }


    var form_pemeliharaan_satgas = $('#form_pemeliharaan_satgas');
    form_pemeliharaan_satgas.on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo base_url(); ?>administrator/penilaian_kinerja/add_pemeliharaan_satgas",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                Swal.fire('Berhasil!', 'Data Berhasil Disimpan', 'success');
                get_total_penilaian_pemeliharaan()
            }
        });
    });

    // end satgas pemeliharaan


    // manager pemeliharaan
    function hitung_manager_pemeliharaan() {
        var manager_nilai_angka1 = $('[name="manager_pemeliharaan_nilai_angka1"]').val()
        var manager_nilai_angka2 = $('[name="manager_pemeliharaan_nilai_angka2"]').val()
        var manager_nilai_angka3 = $('[name="manager_pemeliharaan_nilai_angka3"]').val()
        var manager_nilai_angka4 = $('[name="manager_pemeliharaan_nilai_angka4"]').val()
        var manager_nilai_angka5 = $('[name="manager_pemeliharaan_nilai_angka5"]').val()
        var manager_nilai_angka6 = $('[name="manager_pemeliharaan_nilai_angka6"]').val()

        var hasil = parseFloat(cek_val(manager_nilai_angka1)) + parseFloat(cek_val(manager_nilai_angka2)) + parseFloat(cek_val(manager_nilai_angka3)) + parseFloat(cek_val(manager_nilai_angka4)) + parseFloat(cek_val(manager_nilai_angka5)) + parseFloat(cek_val(manager_nilai_angka6))
        $('[name="manager_pemeliharaan_hasil_angka"]').val(hasil / 6)

        $('[name="manager_pemeliharaan_nilai1"]').val(cek_nilai_huruf(manager_nilai_angka1))
        $('[name="manager_pemeliharaan_nilai2"]').val(cek_nilai_huruf(manager_nilai_angka2))
        $('[name="manager_pemeliharaan_nilai3"]').val(cek_nilai_huruf(manager_nilai_angka3))
        $('[name="manager_pemeliharaan_nilai4"]').val(cek_nilai_huruf(manager_nilai_angka4))
        $('[name="manager_pemeliharaan_nilai5"]').val(cek_nilai_huruf(manager_nilai_angka5))
        $('[name="manager_pemeliharaan_nilai6"]').val(cek_nilai_huruf(manager_nilai_angka6))

        $('[name="manager_pemeliharaan_hasil"]').val(cek_nilai_huruf(hasil / 6))

        var hasil_akhir = $('[name="manager_pemeliharaan_hasil_angka"]').val()

        if (hasil_akhir >= 80) {
            document.getElementById("star_manager_pemeliharaan1").style.display = "block";
            document.getElementById("star_manager_pemeliharaan2").style.display = "block";
            document.getElementById("star_manager_pemeliharaan3").style.display = "block";
            document.getElementById("star_manager_pemeliharaan4").style.display = "block";
        } else if (hasil_akhir >= 60) {
            document.getElementById("star_manager_pemeliharaan1").style.display = "block";
            document.getElementById("star_manager_pemeliharaan2").style.display = "block";
            document.getElementById("star_manager_pemeliharaan3").style.display = "block";
            document.getElementById("star_manager_pemeliharaan4").style.display = "none";
        } else if (hasil_akhir >= 40) {
            document.getElementById("star_manager_pemeliharaan1").style.display = "block";
            document.getElementById("star_manager_pemeliharaan2").style.display = "block";
            document.getElementById("star_manager_pemeliharaan3").style.display = "none";
            document.getElementById("star_manager_pemeliharaan4").style.display = "none";
        } else {
            document.getElementById("star_manager_pemeliharaan1").style.display = "block";
            document.getElementById("star_manager_pemeliharaan2").style.display = "none";
            document.getElementById("star_manager_pemeliharaan3").style.display = "none";
            document.getElementById("star_manager_pemeliharaan4").style.display = "none";
        }
    }


    var form_pemeliharaan_manager = $('#form_pemeliharaan_manager');
    form_pemeliharaan_manager.on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo base_url(); ?>administrator/penilaian_kinerja/add_pemeliharaan_manager",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                Swal.fire('Berhasil!', 'Data Berhasil Disimpan', 'success');
                get_total_penilaian_pemeliharaan()
            }
        });
    });
    // end manager pemeliharaan


    // depthead pemeliharaan
    function hitung_depthead_pemeliharaan() {
        var depthead_nilai_angka1 = $('[name="depthead_pemeliharaan_nilai_angka1"]').val()
        var depthead_nilai_angka2 = $('[name="depthead_pemeliharaan_nilai_angka2"]').val()
        var depthead_nilai_angka3 = $('[name="depthead_pemeliharaan_nilai_angka3"]').val()
        var depthead_nilai_angka4 = $('[name="depthead_pemeliharaan_nilai_angka4"]').val()
        var depthead_nilai_angka5 = $('[name="depthead_pemeliharaan_nilai_angka5"]').val()
        var depthead_nilai_angka6 = $('[name="depthead_pemeliharaan_nilai_angka6"]').val()

        var hasil = parseFloat(cek_val(depthead_nilai_angka1)) + parseFloat(cek_val(depthead_nilai_angka2)) + parseFloat(cek_val(depthead_nilai_angka3)) + parseFloat(cek_val(depthead_nilai_angka4)) + parseFloat(cek_val(depthead_nilai_angka5)) + parseFloat(cek_val(depthead_nilai_angka6))
        $('[name="depthead_pemeliharaan_hasil_angka"]').val(hasil / 6)

        $('[name="depthead_pemeliharaan_nilai1"]').val(cek_nilai_huruf(depthead_nilai_angka1))
        $('[name="depthead_pemeliharaan_nilai2"]').val(cek_nilai_huruf(depthead_nilai_angka2))
        $('[name="depthead_pemeliharaan_nilai3"]').val(cek_nilai_huruf(depthead_nilai_angka3))
        $('[name="depthead_pemeliharaan_nilai4"]').val(cek_nilai_huruf(depthead_nilai_angka4))
        $('[name="depthead_pemeliharaan_nilai5"]').val(cek_nilai_huruf(depthead_nilai_angka5))
        $('[name="depthead_pemeliharaan_nilai6"]').val(cek_nilai_huruf(depthead_nilai_angka6))

        $('[name="depthead_pemeliharaan_hasil"]').val(cek_nilai_huruf(hasil / 6))

        var hasil_akhir = $('[name="depthead_pemeliharaan_hasil_angka"]').val()

        if (hasil_akhir >= 80) {
            document.getElementById("star_depthead_pemeliharaan1").style.display = "block";
            document.getElementById("star_depthead_pemeliharaan2").style.display = "block";
            document.getElementById("star_depthead_pemeliharaan3").style.display = "block";
            document.getElementById("star_depthead_pemeliharaan4").style.display = "block";
        } else if (hasil_akhir >= 60) {
            document.getElementById("star_depthead_pemeliharaan1").style.display = "block";
            document.getElementById("star_depthead_pemeliharaan2").style.display = "block";
            document.getElementById("star_depthead_pemeliharaan3").style.display = "block";
            document.getElementById("star_depthead_pemeliharaan4").style.display = "none";
        } else if (hasil_akhir >= 40) {
            document.getElementById("star_depthead_pemeliharaan1").style.display = "block";
            document.getElementById("star_depthead_pemeliharaan2").style.display = "block";
            document.getElementById("star_depthead_pemeliharaan3").style.display = "none";
            document.getElementById("star_depthead_pemeliharaan4").style.display = "none";
        } else {
            document.getElementById("star_depthead_pemeliharaan1").style.display = "block";
            document.getElementById("star_depthead_pemeliharaan2").style.display = "none";
            document.getElementById("star_depthead_pemeliharaan3").style.display = "none";
            document.getElementById("star_depthead_pemeliharaan4").style.display = "none";
        }
    }


    var form_pemeliharaan_depthead = $('#form_pemeliharaan_depthead');
    form_pemeliharaan_depthead.on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo base_url(); ?>administrator/penilaian_kinerja/add_pemeliharaan_depthead",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                Swal.fire('Berhasil!', 'Data Berhasil Disimpan', 'success');
                get_total_penilaian_pemeliharaan()
            }
        });
    });
    // end depthead pemeliharaan

    // total pemeliharaan
    var form_pemeliharaan_total = $('#form_pemeliharaan_total');
    form_pemeliharaan_total.on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo base_url(); ?>administrator/penilaian_kinerja/add_pemeliharaan_total",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                Swal.fire('Berhasil!', 'Data Berhasil Disimpan', 'success');
                get_total_penilaian_pemeliharaan()
            }
        });
    });

    update_total_pemeliharaan()

    function update_total_pemeliharaan() {
        var id_rup = $('[name="id_rup"]').val()
        var id_vendor = $('[name="id_vendor"]').val()
        $.ajax({
            url: "<?php echo base_url(); ?>administrator/penilaian_kinerja/update_pemeliharaan_penilaian",
            method: "POST",
            data: {
                id_rup: id_rup,
                id_vendor: id_vendor
            },

        });
    }
    // end total pemeliharaan



    update_penilaian_vendor()

    function update_penilaian_vendor() {
        var id_rup = $('[name="id_rup"]').val()
        var id_vendor = $('[name="id_vendor"]').val()
        $.ajax({
            url: "<?php echo base_url(); ?>administrator/penilaian_kinerja/update_nilai_vendor",
            method: "POST",
            data: {
                id_rup: id_rup,
                id_vendor: id_vendor
            },

        });
    }


    // disable form
</script>