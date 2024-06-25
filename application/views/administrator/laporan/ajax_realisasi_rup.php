<script>
    function filter_tahun_realisasi() {
        var tahun_pengadaan = $('#tahun_pengadaan').val()

        $.ajax({
            type: "POST",
            url: '<?= base_url('administrator/laporan_realisasi_rup/get_departemen') ?>',
            dataType: "JSON",
            data: {
                tahun_pengadaan: tahun_pengadaan
            },
            success: function(response) {
                var html = ''
                var i;
                var num = 1;
                for (i = 0; i < response.length; i++) {
                    get_data_realisasi(response[i].id_departemen, tahun_pengadaan)
                    html += `<tr>
                            <td>${num++}</td>
                            <td>${response[i].nama_departemen}</td>
                            <td><label id="id_departemen_total${response[i].id_departemen}"></label></td>
                            <td><label id="id_departemen_rup${response[i].id_departemen}"></label></td>
                            <td><label id="id_departemen_negosiasi${response[i].id_departemen}"></label></td>
                            <td><label id="id_departemen_persen${response[i].id_departemen}"></label></td>
                        </tr>`
                }
                $('#table_departemen').html(html)
                $('.tahun_anggaran').text(tahun_pengadaan)
            }
        })
    }



    function get_data_realisasi(id_departemen, tahun_pengadaan) {
        $.ajax({
            type: "POST",
            url: '<?= base_url('administrator/laporan_realisasi_rup/get_data_rekapitulasi_rup') ?>',
            dataType: "JSON",
            data: {
                id_departemen: id_departemen,
                tahun_pengadaan: tahun_pengadaan
            },
            success: function(response) {
                var total_persen = response.jumlah_rup_pemenang / response.jumlah_rup
                $('#id_departemen_total' + id_departemen).text(response.jumlah_pengadaan)
                $('#id_departemen_rup' + id_departemen).text(convertToRupiah(response.jumlah_rup))
                $('#id_departemen_negosiasi' + id_departemen).text(convertToRupiah(response.jumlah_rup_pemenang))
                if (!response.jumlah_rup && !response.jumlah_rup_pemenang) {
                    $('#id_departemen_persen' + id_departemen).text('0')
                } else {
                    $('#id_departemen_persen' + id_departemen).text(Math.round(total_persen * 100) + ' %')
                }

            }
        })
    }

    function convertToRupiah(angka) {
        if (!angka) {
            return '0.00';
        } else {
            var rupiah = '';
            var angkarev = angka.toString().split('').reverse().join('');
            for (var i = 0; i < angkarev.length; i++)
                if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
            return rupiah.split('', rupiah.length - 1).reverse().join('');
        }

    }



    // capex oopex
    function filter_capex_opex() {
        var tahun_pengadaan_opex_capex = $('#tahun_pengadaan_opex_capex').val()
        $.ajax({
            type: "POST",
            url: '<?= base_url('administrator/laporan_realisasi_rup/get_departemen') ?>',
            dataType: "JSON",
            data: {
                tahun_pengadaan_opex_capex: tahun_pengadaan_opex_capex
            },
            success: function(response) {
                var html = ''
                var i;
                var num = 1;
                for (i = 0; i < response.length; i++) {
                    get_data_capex_opex(response[i].id_departemen, tahun_pengadaan_opex_capex)
                    html += `<tr>
                            <td>${num++}</td>
                            <td>${response[i].nama_departemen}</td>
                            <td><label id="id_departemen_opex${response[i].id_departemen}"></label></td>
                            <td><label id="id_departemen_rup_opex${response[i].id_departemen}"></label></td>
                            <td><label id="id_departemen_capex${response[i].id_departemen}"></label></td>
                            <td><label id="id_departemen_rup_capex${response[i].id_departemen}"></label></td>

                            <td><label id="id_departemen_realisasi_opex${response[i].id_departemen}"></label></td>
                            <td><label id="id_departemen_realisasi_rup_opex${response[i].id_departemen}"></label></td>
                            <td><label id="id_departemen_realisasi_capex${response[i].id_departemen}"></label></td>
                            <td><label id="id_departemen_realisasi_rup_capex${response[i].id_departemen}"></label></td>
                        </tr>`
                }
                $('#tbl_capex_opex').html(html)
                $('.tahun_anggaran_opex_capex').text(tahun_pengadaan_opex_capex)
            }
        })
    }



    function get_data_capex_opex(id_departemen, tahun_pengadaan_opex_capex) {
        $.ajax({
            type: "POST",
            url: '<?= base_url('administrator/laporan_realisasi_rup/get_data_opex_capex') ?>',
            dataType: "JSON",
            data: {
                id_departemen: id_departemen,
                tahun_pengadaan_opex_capex: tahun_pengadaan_opex_capex
            },
            success: function(response) {
                $('#id_departemen_opex' + id_departemen).text(response.jumlah_pengadaan_rencana)
                $('#id_departemen_rup_opex' + id_departemen).text(convertToRupiah(response.jumlah_rup_rencana))
                $('#id_departemen_capex' + id_departemen).text(response.jumlah_pengadaan_rencana_capex)
                $('#id_departemen_rup_capex' + id_departemen).text(convertToRupiah(response.jumlah_rup_rencana_capex))

                $('#id_departemen_realisasi_opex' + id_departemen).text(response.jumlah_pengadaan_realisasi)
                $('#id_departemen_realisasi_rup_opex' + id_departemen).text(convertToRupiah(response.jumlah_rup_realisasi))
                $('#id_departemen_realisasi_capex' + id_departemen).text(response.jumlah_pengadaan_realisasi_capex)
                $('#id_departemen_realisasi_rup_capex' + id_departemen).text(convertToRupiah(response.jumlah_rup_realisasi_capex))
            }
        })
    }


    // jumlah paket

    function filter_jml_paket() {
        var tahun_pengadaan_jml_paket = $('#tahun_pengadaan_jml_paket').val()
        $.ajax({
            type: "POST",
            url: '<?= base_url('administrator/laporan_realisasi_rup/get_departemen') ?>',
            dataType: "JSON",
            data: {
                tahun_pengadaan_jml_paket: tahun_pengadaan_jml_paket
            },
            success: function(response) {
                var html = ''
                var i;
                var num = 1;
                for (i = 0; i < response.length; i++) {
                    get_data_jml_paket(response[i].id_departemen, tahun_pengadaan_jml_paket)
                    html += `<tr>
                            <td class="text-center">${num++}</td>
                            <td>${response[i].nama_departemen}</td>
                            <td class="text-center"><label id="id_departemen_jml_pengadaan${response[i].id_departemen}"></label></td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>

                            <td class="text-center"><label id="jml_pengadaan_juksung_tw1${response[i].id_departemen}"></label></td>
                            <td class="text-center"><label id="jml_pengadaan_juksung_tw2${response[i].id_departemen}"></label></td>
                            <td class="text-center"><label id="jml_pengadaan_juksung_tw3${response[i].id_departemen}"></label></td>
                            <td class="text-center"><label id="jml_pengadaan_juksung_tw4${response[i].id_departemen}"></label></td>

                            <td class="text-center"><label id="jml_pengadaan_terbatas_tw1${response[i].id_departemen}"></label></td>
                            <td class="text-center"><label id="jml_pengadaan_terbatas_tw2${response[i].id_departemen}"></label></td>
                            <td class="text-center"><label id="jml_pengadaan_terbatas_tw3${response[i].id_departemen}"></label></td>
                            <td class="text-center"><label id="jml_pengadaan_terbatas_tw4${response[i].id_departemen}"></label></td>
                            
                            <td class="text-center"><label id="jml_pengadaan_umum_tw1${response[i].id_departemen}"></label></td>
                            <td class="text-center"><label id="jml_pengadaan_umum_tw2${response[i].id_departemen}"></label></td>
                            <td class="text-center"><label id="jml_pengadaan_umum_tw3${response[i].id_departemen}"></label></td>
                            <td class="text-center"><label id="jml_pengadaan_umum_tw4${response[i].id_departemen}"></label></td>
                        </tr>`
                }
                $('#tbl_jml_paket').html(html)
                $('.tahun_anggaran_jml_paket').text(tahun_pengadaan_jml_paket)
            }
        })
    }



    function get_data_jml_paket(id_departemen, tahun_pengadaan_jml_paket) {
        $.ajax({
            type: "POST",
            url: '<?= base_url('administrator/laporan_realisasi_rup/get_data_jml_paket') ?>',
            dataType: "JSON",
            data: {
                id_departemen: id_departemen,
                tahun_pengadaan_jml_paket: tahun_pengadaan_jml_paket
            },
            success: function(response) {
                $('#id_departemen_jml_pengadaan' + id_departemen).text(response.jumlah_pengadaan_jml_paket)

                $('#jml_pengadaan_juksung_tw1' + id_departemen).text(response.jml_pengadaan_juksung_tw1)
                $('#jml_pengadaan_juksung_tw2' + id_departemen).text(response.jml_pengadaan_juksung_tw2)
                $('#jml_pengadaan_juksung_tw3' + id_departemen).text(response.jml_pengadaan_juksung_tw3)
                $('#jml_pengadaan_juksung_tw4' + id_departemen).text(response.jml_pengadaan_juksung_tw4)


                $('#jml_pengadaan_terbatas_tw1' + id_departemen).text(response.jml_pengadaan_terbatas_tw1)
                $('#jml_pengadaan_terbatas_tw2' + id_departemen).text(response.jml_pengadaan_terbatas_tw2)
                $('#jml_pengadaan_terbatas_tw3' + id_departemen).text(response.jml_pengadaan_terbatas_tw3)
                $('#jml_pengadaan_terbatas_tw4' + id_departemen).text(response.jml_pengadaan_terbatas_tw4)


                $('#jml_pengadaan_umum_tw1' + id_departemen).text(response.jml_pengadaan_umum_tw1)
                $('#jml_pengadaan_umum_tw2' + id_departemen).text(response.jml_pengadaan_umum_tw2)
                $('#jml_pengadaan_umum_tw3' + id_departemen).text(response.jml_pengadaan_umum_tw3)
                $('#jml_pengadaan_umum_tw4' + id_departemen).text(response.jml_pengadaan_umum_tw4)
            }
        })
    }

    // realisasi

    function filter_realisasi_pengadaan() {
        var tahun_pengadaan_realisasi_pengadaan1 = $('#tahun_pengadaan_realisasi_pengadaan').val()
        $.ajax({
            type: "POST",
            url: '<?= base_url('administrator/laporan_realisasi_rup/get_departemen') ?>',
            dataType: "JSON",
            data: {
                tahun_pengadaan_realisasi_pengadaan1: tahun_pengadaan_realisasi_pengadaan1
            },
            success: function(response) {
                var html = ''
                var html2 = ''
                var i;
                var j;
                var num = 1;
                var num2 = 1;
                for (i = 0; i < response.length; i++) {
                    get_data_realisasi_pengadaan_(response[i].id_departemen, tahun_pengadaan_realisasi_pengadaan1)
                    html += `<tr>
                    <td class="text-center">${num++}</td>
                    <td>${response[i].nama_departemen}</td>
                    
                    <td class="text-center"><label id="id_departemen_jml_realisasi${response[i].id_departemen}"></label></td>
                    <td class="text-center">0</td>

                    <td class="text-center">0</td>
                    <td class="text-center">0</td>
                    <td class="text-center">0</td>
                    <td class="text-center">0</td>

                    <td class="text-center"><label id="jml_realisasi_juksung_tw1${response[i].id_departemen}"></label></td>
                    <td class="text-center"><label id="jml_realisasi_juksung_tw2${response[i].id_departemen}"></label></td>
                    <td class="text-center"><label id="jml_realisasi_juksung_tw3${response[i].id_departemen}"></label></td>
                    <td class="text-center"><label id="jml_realisasi_juksung_tw4${response[i].id_departemen}"></label></td>

                    <td class="text-center"><label id="jml_realisasi_terbatas_tw1${response[i].id_departemen}"></label></td>
                    <td class="text-center"><label id="jml_realisasi_terbatas_tw2${response[i].id_departemen}"></label></td>
                    <td class="text-center"><label id="jml_realisasi_terbatas_tw3${response[i].id_departemen}"></label></td>
                    <td class="text-center"><label id="jml_realisasi_terbatas_tw4${response[i].id_departemen}"></label></td>

                    <td class="text-center"><label id="jml_realisasi_umum_tw1${response[i].id_departemen}"></label></td>
                    <td class="text-center"><label id="jml_realisasi_umum_tw2${response[i].id_departemen}"></label></td>
                    <td class="text-center"><label id="jml_realisasi_umum_tw3${response[i].id_departemen}"></label></td>
                    <td class="text-center"><label id="jml_realisasi_umum_tw4${response[i].id_departemen}"></label></td>
                    </tr>`
                }
                $('#tbl_realisasi_pengadaan').html(html)

                for (j = 0; j < response.length; j++) {
                    get_data_realisasi_pengadaan_(response[j].id_departemen, tahun_pengadaan_realisasi_pengadaan1)
                    html2 += `<tr>
                    <td class="text-center">${num2++}</td>
                    <td>${response[j].nama_departemen}</td>
                    
                    <td class="text-center"><label id="id_departemen_jml_realisasii${response[j].id_departemen}"></label></td>
                    <td class="text-center"><label id="id_departemen_buku_rup${response[j].id_departemen}"></label></td>
                    <td class="text-center"><label id="id_departemen_persentase${response[j].id_departemen}"></label></td>

                    </tr>`
                }
                $('#tbl_realisasi_pengadaan2').html(html2)
                $('.tahun_anggaran_realisasi_pengadaan').text(tahun_pengadaan_realisasi_pengadaan1)
            }
        })
    }



    function get_data_realisasi_pengadaan_(id_departemen, tahun_pengadaan_realisasi_pengadaan) {
        $.ajax({
            type: "POST",
            url: '<?= base_url('administrator/laporan_realisasi_rup/get_data_jml_paket') ?>',
            dataType: "JSON",
            data: {
                id_departemen: id_departemen,
                tahun_pengadaan_jml_paket: tahun_pengadaan_realisasi_pengadaan
            },
            success: function(response) {
                $('#id_departemen_jml_realisasi' + id_departemen).text(response.jumlah_pengadaan_jml_paket)
                $('#id_departemen_jml_realisasii' + id_departemen).text(response.jumlah_pengadaan_jml_paket)
                $('#id_departemen_buku_rup' + id_departemen).text(response.jml_buku_rup)
                $('#id_departemen_persentase' + id_departemen).text(response.jml_persentase + ' %')


                $('#jml_realisasi_juksung_tw1' + id_departemen).text(response.jml_pengadaan_juksung_tw1)
                $('#jml_realisasi_juksung_tw2' + id_departemen).text(response.jml_pengadaan_juksung_tw2)
                $('#jml_realisasi_juksung_tw3' + id_departemen).text(response.jml_pengadaan_juksung_tw3)
                $('#jml_realisasi_juksung_tw4' + id_departemen).text(response.jml_pengadaan_juksung_tw4)


                $('#jml_realisasi_terbatas_tw1' + id_departemen).text(response.jml_pengadaan_terbatas_tw1)
                $('#jml_realisasi_terbatas_tw2' + id_departemen).text(response.jml_pengadaan_terbatas_tw2)
                $('#jml_realisasi_terbatas_tw3' + id_departemen).text(response.jml_pengadaan_terbatas_tw3)
                $('#jml_realisasi_terbatas_tw4' + id_departemen).text(response.jml_pengadaan_terbatas_tw4)


                $('#jml_realisasi_umum_tw1' + id_departemen).text(response.jml_pengadaan_umum_tw1)
                $('#jml_realisasi_umum_tw2' + id_departemen).text(response.jml_pengadaan_umum_tw2)
                $('#jml_realisasi_umum_tw3' + id_departemen).text(response.jml_pengadaan_umum_tw3)
                $('#jml_realisasi_umum_tw4' + id_departemen).text(response.jml_pengadaan_umum_tw4)



            }
        })
    }



    function filter_perbandingan_rup() {
        var tahun_pengadaan_perbandingan_rup1 = $('#tahun_pengadaan_perbandingan_rup').val()
        $.ajax({
            type: "POST",
            url: '<?= base_url('administrator/laporan_realisasi_rup/get_departemen') ?>',
            dataType: "JSON",
            data: {
                tahun_pengadaan_perbandingan_rup1: tahun_pengadaan_perbandingan_rup1
            },
            success: function(response) {
                var html2 = ''
                var j;
                var num2 = 1;


                for (j = 0; j < response.length; j++) {
                    get_data_perbandingan_rup_(response[j].id_departemen, tahun_pengadaan_perbandingan_rup1)
                    html2 += `<tr>
                    <td class="text-center">${num2++}</td>
                    <td>${response[j].nama_departemen}</td>

                    <td class="text-center"><label id="id_departemen_jml_realisasii${response[j].id_departemen}"></label></td>
                    <td class="text-center"><label id="id_departemen_buku_rup${response[j].id_departemen}"></label></td>
                    <td class="text-center"><label id="id_departemen_persentase${response[j].id_departemen}"></label></td>

                    </tr>`
                }
                $('#tbl_perbandingan_rup2').html(html2)
                $('.tahun_anggaran_perbandingan_rup').text(tahun_pengadaan_perbandingan_rup1)
            }
        })
    }



    function get_data_perbandingan_rup_(id_departemen, tahun_pengadaan_perbandingan_rup) {
        $.ajax({
            type: "POST",
            url: '<?= base_url('administrator/laporan_realisasi_rup/get_data_jml_paket') ?>',
            dataType: "JSON",
            data: {
                id_departemen: id_departemen,
                tahun_pengadaan_jml_paket: tahun_pengadaan_perbandingan_rup
            },
            success: function(response) {
                $('#id_departemen_jml_realisasi' + id_departemen).text(response.jumlah_pengadaan_jml_paket)
                $('#id_departemen_jml_realisasii' + id_departemen).text(response.jumlah_pengadaan_jml_paket)
                $('#id_departemen_buku_rup' + id_departemen).text(response.jml_buku_rup)
                $('#id_departemen_persentase' + id_departemen).text(response.jml_persentase + ' %')


            }
        })
    }
</script>