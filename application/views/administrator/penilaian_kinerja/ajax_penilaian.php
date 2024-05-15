<script>
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
            } else if (val >= 80 && val <= 89) {
                if (val >= 86) {
                    return 'B+'
                } else {
                    return 'B'
                }
            } else if (val >= 60 && val <= 79) {
                if (val >= 70) {
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
</script>