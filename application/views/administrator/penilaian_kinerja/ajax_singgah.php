<script>
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
</script>