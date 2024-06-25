<script>
    function count_umum() {
        var umum_jan = $('[name="umum_jan"]').val() || 0;
        var umum_feb = $('[name="umum_feb"]').val() || 0;
        var umum_mar = $('[name="umum_mar"]').val() || 0;
        var umum_apr = $('[name="umum_apr"]').val() || 0;
        var umum_may = $('[name="umum_may"]').val() || 0;
        var umum_jun = $('[name="umum_jun"]').val() || 0;
        var umum_jul = $('[name="umum_jul"]').val() || 0;
        var umum_aug = $('[name="umum_aug"]').val() || 0;
        var umum_sep = $('[name="umum_sep"]').val() || 0;
        var umum_oct = $('[name="umum_oct"]').val() || 0;
        var umum_nov = $('[name="umum_nov"]').val() || 0;
        var umum_dec = $('[name="umum_dec"]').val() || 0;

        var grand_total = parseInt(umum_jan) + parseInt(umum_feb) + parseInt(umum_mar) + parseInt(umum_apr) + parseInt(umum_may) + parseInt(umum_jun) + parseInt(umum_jul) + parseInt(umum_aug) + parseInt(umum_sep) + parseInt(umum_oct) + parseInt(umum_nov) + parseInt(umum_dec);


        var total_umum = $('[name="umum_total"]').val(grand_total)
    }


    function count_juksung() {
        var juksung_jan = $('[name="juksung_jan"]').val() || 0;
        var juksung_feb = $('[name="juksung_feb"]').val() || 0;
        var juksung_mar = $('[name="juksung_mar"]').val() || 0;
        var juksung_apr = $('[name="juksung_apr"]').val() || 0;
        var juksung_may = $('[name="juksung_may"]').val() || 0;
        var juksung_jun = $('[name="juksung_jun"]').val() || 0;
        var juksung_jul = $('[name="juksung_jul"]').val() || 0;
        var juksung_aug = $('[name="juksung_aug"]').val() || 0;
        var juksung_sep = $('[name="juksung_sep"]').val() || 0;
        var juksung_oct = $('[name="juksung_oct"]').val() || 0;
        var juksung_nov = $('[name="juksung_nov"]').val() || 0;
        var juksung_dec = $('[name="juksung_dec"]').val() || 0;

        var grand_total = parseInt(juksung_jan) + parseInt(juksung_feb) + parseInt(juksung_mar) + parseInt(juksung_apr) + parseInt(juksung_may) + parseInt(juksung_jun) + parseInt(juksung_jul) + parseInt(juksung_aug) + parseInt(juksung_sep) + parseInt(juksung_oct) + parseInt(juksung_nov) + parseInt(juksung_dec);


        var total_juksung = $('[name="juksung_total"]').val(grand_total)
    }


    function count_terbatas() {
        var terbatas_jan = $('[name="terbatas_jan"]').val() || 0;
        var terbatas_feb = $('[name="terbatas_feb"]').val() || 0;
        var terbatas_mar = $('[name="terbatas_mar"]').val() || 0;
        var terbatas_apr = $('[name="terbatas_apr"]').val() || 0;
        var terbatas_may = $('[name="terbatas_may"]').val() || 0;
        var terbatas_jun = $('[name="terbatas_jun"]').val() || 0;
        var terbatas_jul = $('[name="terbatas_jul"]').val() || 0;
        var terbatas_aug = $('[name="terbatas_aug"]').val() || 0;
        var terbatas_sep = $('[name="terbatas_sep"]').val() || 0;
        var terbatas_oct = $('[name="terbatas_oct"]').val() || 0;
        var terbatas_nov = $('[name="terbatas_nov"]').val() || 0;
        var terbatas_dec = $('[name="terbatas_dec"]').val() || 0;

        var grand_total = parseInt(terbatas_jan) + parseInt(terbatas_feb) + parseInt(terbatas_mar) + parseInt(terbatas_apr) + parseInt(terbatas_may) + parseInt(terbatas_jun) + parseInt(terbatas_jul) + parseInt(terbatas_aug) + parseInt(terbatas_sep) + parseInt(terbatas_oct) + parseInt(terbatas_nov) + parseInt(terbatas_dec);


        var total_terbatas = $('[name="terbatas_total"]').val(grand_total)
    }


    function count_langsung() {
        var langsung_jan = $('[name="langsung_jan"]').val() || 0;
        var langsung_feb = $('[name="langsung_feb"]').val() || 0;
        var langsung_mar = $('[name="langsung_mar"]').val() || 0;
        var langsung_apr = $('[name="langsung_apr"]').val() || 0;
        var langsung_may = $('[name="langsung_may"]').val() || 0;
        var langsung_jun = $('[name="langsung_jun"]').val() || 0;
        var langsung_jul = $('[name="langsung_jul"]').val() || 0;
        var langsung_aug = $('[name="langsung_aug"]').val() || 0;
        var langsung_sep = $('[name="langsung_sep"]').val() || 0;
        var langsung_oct = $('[name="langsung_oct"]').val() || 0;
        var langsung_nov = $('[name="langsung_nov"]').val() || 0;
        var langsung_dec = $('[name="langsung_dec"]').val() || 0;

        var grand_total = parseInt(langsung_jan) + parseInt(langsung_feb) + parseInt(langsung_mar) + parseInt(langsung_apr) + parseInt(langsung_may) + parseInt(langsung_jun) + parseInt(langsung_jul) + parseInt(langsung_aug) + parseInt(langsung_sep) + parseInt(langsung_oct) + parseInt(langsung_nov) + parseInt(langsung_dec);


        var total_langsung = $('[name="langsung_total"]').val(grand_total)
    }


    var form_laporan_realisasi = $('#form_laporan_realisasi');
    form_laporan_realisasi.on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo base_url(); ?>administrator/laporan_efisiensi/simpan_realisasi",
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
                Swal.fire('Berhasil!', 'Data Berhasil Disimpan', 'success');
                $('#tambah_realisasi').modal('hide')
                $('#form_laporan_realisasi')[0].reset();
                load_realisasi()
            }
        });
    });

    load_realisasi()

    function load_realisasi() {
        $.ajax({
            type: "GET",
            url: '<?= base_url('administrator/laporan_efisiensi/get_data') ?>',
            dataType: "JSON",
            success: function(response) {
                var html = '';
                var i;
                for (i = 0; i < response.length; i++) {

                    html += `
                    <h6>REALISASI PENGADAAN TAHUN ${response[i].tahun_pengadaan} ( ${response[i].nama_pic} )</h6>
                    <table class="table table-bordered">
                        <thead class="text-center bg-info text-white">
                            <tr>
                                <th>No</th>
                                <th>Metode Pengadaan</th>
                                <th>Jan</th>
                                <th>Feb</th>
                                <th>Mar</th>
                                <th>Apr</th>
                                <th>May</th>
                                <th>Jun</th>
                                <th>Jul</th>
                                <th>Aug</th>
                                <th>Sep</th>
                                <th>Oct</th>
                                <th>Nov</th>
                                <th>Dec</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <th>1</th>
                                <th>Tender Umum</th>
                                <th>${response[i].umum_jan}</th>
                                <th>${response[i].umum_feb}</th>
                                <th>${response[i].umum_mar}</th>
                                <th>${response[i].umum_apr}</th>
                                <th>${response[i].umum_may}</th>
                                <th>${response[i].umum_jun}</th>
                                <th>${response[i].umum_jul}</th>
                                <th>${response[i].umum_aug}</th>
                                <th>${response[i].umum_sep}</th>
                                <th>${response[i].umum_oct}</th>
                                <th>${response[i].umum_nov}</th>
                                <th>${response[i].umum_dec}</th>
                                <th>${response[i].umum_total}</th>
                            </tr>
                            <tr>
                                <th>2</th>
                                <th>Penunjukan Langsung</th>
                                <th>${response[i].juksung_jan}</th>
                                <th>${response[i].juksung_feb}</th>
                                <th>${response[i].juksung_mar}</th>
                                <th>${response[i].juksung_apr}</th>
                                <th>${response[i].juksung_may}</th>
                                <th>${response[i].juksung_jun}</th>
                                <th>${response[i].juksung_jul}</th>
                                <th>${response[i].juksung_aug}</th>
                                <th>${response[i].juksung_sep}</th>
                                <th>${response[i].juksung_oct}</th>
                                <th>${response[i].juksung_nov}</th>
                                <th>${response[i].juksung_dec}</th>
                                <th>${response[i].juksung_total}</th>
                            </tr>

                            <tr>
                                <th>3</th>
                                <th>Tender Terbatas</th>
                                <th>${response[i].terbatas_jan}</th>
                                <th>${response[i].terbatas_feb}</th>
                                <th>${response[i].terbatas_mar}</th>
                                <th>${response[i].terbatas_apr}</th>
                                <th>${response[i].terbatas_may}</th>
                                <th>${response[i].terbatas_jun}</th>
                                <th>${response[i].terbatas_jul}</th>
                                <th>${response[i].terbatas_aug}</th>
                                <th>${response[i].terbatas_sep}</th>
                                <th>${response[i].terbatas_oct}</th>
                                <th>${response[i].terbatas_nov}</th>
                                <th>${response[i].terbatas_dec}</th>
                                <th>${response[i].terbatas_total}</th>
                            </tr>



                            <tr>
                                <th>4</th>
                                <th>Pengadaan Langsung</th>
                                <th>${response[i].langsung_jan}</th>
                                <th>${response[i].langsung_feb}</th>
                                <th>${response[i].langsung_mar}</th>
                                <th>${response[i].langsung_apr}</th>
                                <th>${response[i].langsung_may}</th>
                                <th>${response[i].langsung_jun}</th>
                                <th>${response[i].langsung_jul}</th>
                                <th>${response[i].langsung_aug}</th>
                                <th>${response[i].langsung_sep}</th>
                                <th>${response[i].langsung_oct}</th>
                                <th>${response[i].langsung_nov}</th>
                                <th>${response[i].langsung_dec}</th>
                                <th>${response[i].langsung_total}</th>
                            </tr>
                        </tbody>
                    </table>`
                }
                $('#load_realisasi').html(html);
            }
        })
    }



    var form_filter_resume = $('#form_filter_resume');
    form_filter_resume.on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo base_url(); ?>administrator/laporan_efisiensi/get_resume",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {

                $('#langsung_resume_pagu').text('-')
                $('#langsung_resume_hps').text('-')
                $('#langsung_resume_nilai_kontrak').text('-')
                $('#langsung_resume_efisiensi').text('-')
                $('#langsung_resume_presentase').text('-')

                $('#juksung_resume_pagu').text(response['juksung_resume_pagu'])
                $('#juksung_resume_hps').text(response['juksung_resume_hps'])
                $('#juksung_resume_nilai_kontrak').text(response['juksung_kontrak'])
                $('#juksung_resume_efisiensi').text(response['juksung_efisiensi'])
                $('#juksung_resume_presentase').text(response['juksung_persentase'])

                $('#terbatas_resume_pagu').text(response['terbatas_resume_pagu'])
                $('#terbatas_resume_hps').text(response['terbatas_resume_hps'])
                $('#terbatas_resume_nilai_kontrak').text(response['terbatas_kontrak'])
                $('#terbatas_resume_efisiensi').text(response['terbatas_efisiensi'])
                $('#terbatas_resume_presentase').text(response['terbatas_persentase'])

                $('#umum_resume_pagu').text(response['umum_resume_pagu'])
                $('#umum_resume_hps').text(response['umum_resume_hps'])
                $('#umum_resume_nilai_kontrak').text(response['umum_kontrak'])
                $('#umum_resume_efisiensi').text(response['umum_efisiensi'])
                $('#umum_resume_presentase').text(response['umum_persentase'])


                $('#total_resume_pagu').text(response['total_resume_pagu'])
                $('#total_resume_hps').text(response['total_resume_hps'])
                $('#total_resume_nilai_kontrak').text(response['total_kontrak'])
                $('#total_resume_efisiensi').text(response['total_efisiensi'])
                $('#total_resume_presentase').text(response['total_persentase'])

                $('#total_persentasi_selisih').text(response['total_persentase_selisih'])

                $('#total_persentase_efisiensi').text(response['total_persentase_efisiensi'])

                $('.tahun').text(response['tahun'])
            }
        });
    });


    function count_umum1() {
        var umum_jan1 = $('[name="umum_jan1"]').val() || 0;
        var umum_feb1 = $('[name="umum_feb1"]').val() || 0;
        var umum_mar1 = $('[name="umum_mar1"]').val() || 0;
        var umum_apr1 = $('[name="umum_apr1"]').val() || 0;
        var umum_may1 = $('[name="umum_may1"]').val() || 0;
        var umum_jun1 = $('[name="umum_jun1"]').val() || 0;
        var umum_jul1 = $('[name="umum_jul1"]').val() || 0;
        var umum_aug1 = $('[name="umum_aug1"]').val() || 0;
        var umum_sep1 = $('[name="umum_sep1"]').val() || 0;
        var umum_oct1 = $('[name="umum_oct1"]').val() || 0;
        var umum_nov1 = $('[name="umum_nov1"]').val() || 0;
        var umum_dec1 = $('[name="umum_dec1"]').val() || 0;

        var grand_total = parseInt(umum_jan1) + parseInt(umum_feb1) + parseInt(umum_mar1) + parseInt(umum_apr1) + parseInt(umum_may1) + parseInt(umum_jun1) + parseInt(umum_jul1) + parseInt(umum_aug1) + parseInt(umum_sep1) + parseInt(umum_oct1) + parseInt(umum_nov1) + parseInt(umum_dec1);


        var total_umum1 = $('[name="umum_total1"]').val(grand_total)
    }


    function count_juksung1() {
        var juksung_jan1 = $('[name="juksung_jan1"]').val() || 0;
        var juksung_feb1 = $('[name="juksung_feb1"]').val() || 0;
        var juksung_mar1 = $('[name="juksung_mar1"]').val() || 0;
        var juksung_apr1 = $('[name="juksung_apr1"]').val() || 0;
        var juksung_may1 = $('[name="juksung_may1"]').val() || 0;
        var juksung_jun1 = $('[name="juksung_jun1"]').val() || 0;
        var juksung_jul1 = $('[name="juksung_jul1"]').val() || 0;
        var juksung_aug1 = $('[name="juksung_aug1"]').val() || 0;
        var juksung_sep1 = $('[name="juksung_sep1"]').val() || 0;
        var juksung_oct1 = $('[name="juksung_oct1"]').val() || 0;
        var juksung_nov1 = $('[name="juksung_nov1"]').val() || 0;
        var juksung_dec1 = $('[name="juksung_dec1"]').val() || 0;

        var grand_total1 = parseInt(juksung_jan1) + parseInt(juksung_feb1) + parseInt(juksung_mar1) + parseInt(juksung_apr1) + parseInt(juksung_may1) + parseInt(juksung_jun1) + parseInt(juksung_jul1) + parseInt(juksung_aug1) + parseInt(juksung_sep1) + parseInt(juksung_oct1) + parseInt(juksung_nov1) + parseInt(juksung_dec1);


        var total_juksung1 = $('[name="juksung_total1"]').val(grand_total1)
    }


    function count_terbatas1() {
        var terbatas_jan1 = $('[name="terbatas_jan1"]').val() || 0;
        var terbatas_feb1 = $('[name="terbatas_feb1"]').val() || 0;
        var terbatas_mar1 = $('[name="terbatas_mar1"]').val() || 0;
        var terbatas_apr1 = $('[name="terbatas_apr1"]').val() || 0;
        var terbatas_may1 = $('[name="terbatas_may1"]').val() || 0;
        var terbatas_jun1 = $('[name="terbatas_jun1"]').val() || 0;
        var terbatas_jul1 = $('[name="terbatas_jul1"]').val() || 0;
        var terbatas_aug1 = $('[name="terbatas_aug1"]').val() || 0;
        var terbatas_sep1 = $('[name="terbatas_sep1"]').val() || 0;
        var terbatas_oct1 = $('[name="terbatas_oct1"]').val() || 0;
        var terbatas_nov1 = $('[name="terbatas_nov1"]').val() || 0;
        var terbatas_dec1 = $('[name="terbatas_dec1"]').val() || 0;

        var grand_total1 = parseInt(terbatas_jan1) + parseInt(terbatas_feb1) + parseInt(terbatas_mar1) + parseInt(terbatas_apr1) + parseInt(terbatas_may1) + parseInt(terbatas_jun1) + parseInt(terbatas_jul1) + parseInt(terbatas_aug1) + parseInt(terbatas_sep1) + parseInt(terbatas_oct1) + parseInt(terbatas_nov1) + parseInt(terbatas_dec1);


        var total_terbatas1 = $('[name="terbatas_total1"]').val(grand_total1)
    }


    function count_langsung1() {
        var langsung_jan1 = $('[name="langsung_jan1"]').val() || 0;
        var langsung_feb1 = $('[name="langsung_feb1"]').val() || 0;
        var langsung_mar1 = $('[name="langsung_mar1"]').val() || 0;
        var langsung_apr1 = $('[name="langsung_apr1"]').val() || 0;
        var langsung_may1 = $('[name="langsung_may1"]').val() || 0;
        var langsung_jun1 = $('[name="langsung_jun1"]').val() || 0;
        var langsung_jul1 = $('[name="langsung_jul1"]').val() || 0;
        var langsung_aug1 = $('[name="langsung_aug1"]').val() || 0;
        var langsung_sep1 = $('[name="langsung_sep1"]').val() || 0;
        var langsung_oct1 = $('[name="langsung_oct1"]').val() || 0;
        var langsung_nov1 = $('[name="langsung_nov1"]').val() || 0;
        var langsung_dec1 = $('[name="langsung_dec1"]').val() || 0;

        var grand_total1 = parseInt(langsung_jan1) + parseInt(langsung_feb1) + parseInt(langsung_mar1) + parseInt(langsung_apr1) + parseInt(langsung_may1) + parseInt(langsung_jun1) + parseInt(langsung_jul1) + parseInt(langsung_aug1) + parseInt(langsung_sep1) + parseInt(langsung_oct1) + parseInt(langsung_nov1) + parseInt(langsung_dec1);


        var total_langsung1 = $('[name="langsung_total1"]').val(grand_total1)
    }


    var form_laporan_rekap = $('#form_laporan_rekap');
    form_laporan_rekap.on('submit', function(e) {
        console.log('berhasil');
        e.preventDefault();
        $.ajax({
            url: "<?php echo base_url(); ?>administrator/laporan_efisiensi/simpan_rekap",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('.btn_simpan1').attr('disabled', 'disabled');
            },
            success: function(response) {
                $('.btn_simpan1').attr('disabled', false);
                Swal.fire('Berhasil!', 'Data Berhasil Disimpan', 'success');
                $('#tambah_rekap').modal('hide')
                $('#form_laporan_rekap')[0].reset();
                load_rekap()
            }
        });
    });


    load_rekap()

    function load_rekap() {
        $.ajax({
            type: "GET",
            url: '<?= base_url('administrator/laporan_efisiensi/get_data_rekap') ?>',
            dataType: "JSON",
            success: function(response) {
                var html = '';
                var i;
                for (i = 0; i < response.length; i++) {

                    html += `
                <h6>REKAPITULASI REALISASI PENGADAAN TAHUN ${response[i].tahun_pengadaan}</h6>
                <table class="table table-bordered">
                    <thead class="text-center bg-info text-white">
                        <tr>
                            <th>No</th>
                            <th>Metode Pengadaan</th>
                            <th>Jan</th>
                            <th>Feb</th>
                            <th>Mar</th>
                            <th>Apr</th>
                            <th>May</th>
                            <th>Jun</th>
                            <th>Jul</th>
                            <th>Aug</th>
                            <th>Sep</th>
                            <th>Oct</th>
                            <th>Nov</th>
                            <th>Dec</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <th>1</th>
                            <th>Tender Umum</th>
                            <th>${response[i].umum_jan}</th>
                            <th>${response[i].umum_feb}</th>
                            <th>${response[i].umum_mar}</th>
                            <th>${response[i].umum_apr}</th>
                            <th>${response[i].umum_may}</th>
                            <th>${response[i].umum_jun}</th>
                            <th>${response[i].umum_jul}</th>
                            <th>${response[i].umum_aug}</th>
                            <th>${response[i].umum_sep}</th>
                            <th>${response[i].umum_oct}</th>
                            <th>${response[i].umum_nov}</th>
                            <th>${response[i].umum_dec}</th>
                            <th>${response[i].umum_total}</th>
                        </tr>
                        <tr>
                            <th>2</th>
                            <th>Penunjukan Langsung</th>
                            <th>${response[i].juksung_jan}</th>
                            <th>${response[i].juksung_feb}</th>
                            <th>${response[i].juksung_mar}</th>
                            <th>${response[i].juksung_apr}</th>
                            <th>${response[i].juksung_may}</th>
                            <th>${response[i].juksung_jun}</th>
                            <th>${response[i].juksung_jul}</th>
                            <th>${response[i].juksung_aug}</th>
                            <th>${response[i].juksung_sep}</th>
                            <th>${response[i].juksung_oct}</th>
                            <th>${response[i].juksung_nov}</th>
                            <th>${response[i].juksung_dec}</th>
                            <th>${response[i].juksung_total}</th>
                        </tr>

                        <tr>
                            <th>3</th>
                            <th>Tender Terbatas</th>
                            <th>${response[i].terbatas_jan}</th>
                            <th>${response[i].terbatas_feb}</th>
                            <th>${response[i].terbatas_mar}</th>
                            <th>${response[i].terbatas_apr}</th>
                            <th>${response[i].terbatas_may}</th>
                            <th>${response[i].terbatas_jun}</th>
                            <th>${response[i].terbatas_jul}</th>
                            <th>${response[i].terbatas_aug}</th>
                            <th>${response[i].terbatas_sep}</th>
                            <th>${response[i].terbatas_oct}</th>
                            <th>${response[i].terbatas_nov}</th>
                            <th>${response[i].terbatas_dec}</th>
                            <th>${response[i].terbatas_total}</th>
                        </tr>



                        <tr>
                            <th>4</th>
                            <th>Pengadaan Langsung</th>
                            <th>${response[i].langsung_jan}</th>
                            <th>${response[i].langsung_feb}</th>
                            <th>${response[i].langsung_mar}</th>
                            <th>${response[i].langsung_apr}</th>
                            <th>${response[i].langsung_may}</th>
                            <th>${response[i].langsung_jun}</th>
                            <th>${response[i].langsung_jul}</th>
                            <th>${response[i].langsung_aug}</th>
                            <th>${response[i].langsung_sep}</th>
                            <th>${response[i].langsung_oct}</th>
                            <th>${response[i].langsung_nov}</th>
                            <th>${response[i].langsung_dec}</th>
                            <th>${response[i].langsung_total}</th>
                        </tr>
                    </tbody>
                </table>`
                }
                $('#load_rekap').html(html);
            }
        })
    }




    $(document).ready(function() {
        fill_datatable_efisiensi_juksung()

        function fill_datatable_efisiensi_juksung(tahun_juksung_val = '') {
            $(document).ready(function() {
                $('#tbl_efisiensi_juksung').DataTable({
                    "responsive": false,
                    "ordering": true,
                    "processing": true,
                    "serverSide": true,
                    "bDestroy": true,
                    "autoWidth": false,
                    // "dom": 'Bfrtip',
                    // "buttons": ["excel", "pdf", "print", "colvis"],
                    "order": [],
                    "ajax": {
                        "url": '<?= base_url('administrator/laporan_efisiensi/datatable_juksung') ?>',
                        "type": "POST",
                        data: {
                            tahun_juksung_val: tahun_juksung_val
                        }
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
                })
            });
        }
        $('#filter_juksung').click(function() {
            var tahun_juksung_val = $('#tahun_juksung_val').val();
            $('#tahun_juksung').text(tahun_juksung_val)
            if (tahun_juksung_val != '') {
                $('#tbl_efisiensi_juksung').DataTable().destroy();
                fill_datatable_efisiensi_juksung(tahun_juksung_val);
            } else {
                $('#tbl_efisiensi_juksung').DataTable().destroy();
                fill_datatable_efisiensi_juksung();
            }
        })

    });


    $(document).ready(function() {
        fill_datatable_efisiensi_terbatas()

        function fill_datatable_efisiensi_terbatas(tahun_terbatas_val = '') {
            $(document).ready(function() {
                $('#tbl_efisiensi_terbatas').DataTable({
                    "responsive": false,
                    "ordering": true,
                    "processing": true,
                    "serverSide": true,
                    "bDestroy": true,
                    "autoWidth": false,
                    // "dom": 'Bfrtip',
                    // "buttons": ["excel", "pdf", "print", "colvis"],
                    "order": [],
                    "ajax": {
                        "url": '<?= base_url('administrator/laporan_efisiensi/datatable_terbatas') ?>',
                        "type": "POST",
                        data: {
                            tahun_terbatas_val: tahun_terbatas_val
                        }
                    },
                    "columnDefs": [{
                        "target": [-1],
                        "orderable": false
                    }],
                    "oLanguage": {
                        "sSearch": "Pencarian : ",
                        "sEmptyTable": "Data Tidak Tersedia",
                        "sLoadingRecords": "Silahkan Tunggu - loading...",
                        "sLengthMenu": "Menampilkan &nbsp; _MENU_ &nbsp; Data",
                        "sZeroRecords": "Tidak Ada Data Yang Di Cari",
                        "sProcessing": "Memuat Data...."
                    }
                })
            });
        }
        $('#filter_terbatas').click(function() {
            var tahun_terbatas_val = $('#tahun_terbatas_val').val();
            $('#tahun_terbatas').text(tahun_terbatas_val)
            if (tahun_terbatas_val != '') {
                $('#tbl_efisiensi_terbatas').DataTable().destroy();
                fill_datatable_efisiensi_terbatas(tahun_terbatas_val);
            } else {
                $('#tbl_efisiensi_terbatas').DataTable().destroy();
                fill_datatable_efisiensi_terbatas();
            }
        })

    });

    $(document).ready(function() {
        fill_datatable_efisiensi_umum()

        function fill_datatable_efisiensi_umum(tahun_umum_val = '') {
            $(document).ready(function() {
                $('#tbl_efisiensi_umum').DataTable({
                    "responsive": false,
                    "ordering": true,
                    "processing": true,
                    "serverSide": true,
                    "bDestroy": true,
                    "autoWidth": false,
                    // "dom": 'Bfrtip',
                    // "buttons": ["excel", "pdf", "print", "colvis"],
                    "order": [],
                    "ajax": {
                        "url": '<?= base_url('administrator/laporan_efisiensi/datatable_umum') ?>',
                        "type": "POST",
                        data: {
                            tahun_umum_val: tahun_umum_val
                        }
                    },
                    "columnDefs": [{
                        "target": [-1],
                        "orderable": false
                    }],
                    "oLanguage": {
                        "sSearch": "Pencarian : ",
                        "sEmptyTable": "Data Tidak Tersedia",
                        "sLoadingRecords": "Silahkan Tunggu - loading...",
                        "sLengthMenu": "Menampilkan &nbsp; _MENU_ &nbsp; Data",
                        "sZeroRecords": "Tidak Ada Data Yang Di Cari",
                        "sProcessing": "Memuat Data...."
                    }
                })
            });
        }
        $('#filter_umum').click(function() {
            var tahun_umum_val = $('#tahun_umum_val').val();
            $('#tahun_umum').text(tahun_umum_val)
            if (tahun_umum_val != '') {
                $('#tbl_efisiensi_umum').DataTable().destroy();
                fill_datatable_efisiensi_umum(tahun_umum_val);
            } else {
                $('#tbl_efisiensi_umum').DataTable().destroy();
                fill_datatable_efisiensi_umum();
            }
        })

    });


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
    load_data_perunit()

    function load_data_perunit() {

        var tahun_unit = $('#tahun_unit').val()
        $.ajax({
            type: "POST",
            url: '<?= base_url('administrator/laporan_efisiensi/get_data_perunit') ?>',
            dataType: "JSON",
            data: {
                tahun: tahun_unit
            },
            success: function(response) {
                $('.tahun_unit_label').text(tahun_unit)
                $('#nilai_rup1').text(convertToRupiah(response['total_rup_cs']['total_pagu_rup']))
                $('#nilai_rup2').text(convertToRupiah(response['total_rup_om']['total_pagu_rup']))
                $('#nilai_rup3').text(convertToRupiah(response['total_rup_cc']['total_pagu_rup']))
                $('#nilai_rup20').text(convertToRupiah(response['total_rup_pm']['total_pagu_rup']))
                $('#nilai_rup21').text(convertToRupiah(response['total_rup_itd']['total_pagu_rup']))
                $('#nilai_rup22').text(convertToRupiah(response['total_rup_its']['total_pagu_rup']))
                $('#nilai_rup23').text(convertToRupiah(response['total_rup_hcpe']['total_pagu_rup']))
                $('#nilai_rup24').text(convertToRupiah(response['total_rup_hcs']['total_pagu_rup']))
                $('#nilai_rup25').text(convertToRupiah(response['total_rup_ga']['total_pagu_rup']))
                $('#nilai_rup26').text(convertToRupiah(response['total_rup_fa']['total_pagu_rup']))
                $('#nilai_rup27').text(convertToRupiah(response['total_rup_spgrc']['total_pagu_rup']))
                $('#nilai_rup28').text(convertToRupiah(response['total_rup_bpd']['total_pagu_rup']))
                $('#nilai_rup29').text(convertToRupiah(response['total_rup_pmo']['total_pagu_rup']))

                $('#hps_juksung1').text(convertToRupiah(response['total_hps_cs']['total_hps_rup']))
                $('#hps_juksung2').text(convertToRupiah(response['total_hps_om']['total_hps_rup']))
                $('#hps_juksung3').text(convertToRupiah(response['total_hps_cc']['total_hps_rup']))
                $('#hps_juksung20').text(convertToRupiah(response['total_hps_pm']['total_hps_rup']))
                $('#hps_juksung21').text(convertToRupiah(response['total_hps_itd']['total_hps_rup']))
                $('#hps_juksung22').text(convertToRupiah(response['total_hps_its']['total_hps_rup']))
                $('#hps_juksung23').text(convertToRupiah(response['total_hps_hcpe']['total_hps_rup']))
                $('#hps_juksung24').text(convertToRupiah(response['total_hps_hcs']['total_hps_rup']))
                $('#hps_juksung25').text(convertToRupiah(response['total_hps_ga']['total_hps_rup']))
                $('#hps_juksung26').text(convertToRupiah(response['total_hps_fa']['total_hps_rup']))
                $('#hps_juksung27').text(convertToRupiah(response['total_hps_spgrc']['total_hps_rup']))
                $('#hps_juksung28').text(convertToRupiah(response['total_hps_bpd']['total_hps_rup']))
                $('#hps_juksung29').text(convertToRupiah(response['total_hps_pmo']['total_hps_rup']))


                $('#kontrak_juksung1').text(convertToRupiah(response['total_kontrak_cs']['total_hasil_negosiasi']))
                $('#kontrak_juksung2').text(convertToRupiah(response['total_kontrak_om']['total_hasil_negosiasi']))
                $('#kontrak_juksung3').text(convertToRupiah(response['total_kontrak_cc']['total_hasil_negosiasi']))
                $('#kontrak_juksung20').text(convertToRupiah(response['total_kontrak_pm']['total_hasil_negosiasi']))
                $('#kontrak_juksung21').text(convertToRupiah(response['total_kontrak_itd']['total_hasil_negosiasi']))
                $('#kontrak_juksung22').text(convertToRupiah(response['total_kontrak_its']['total_hasil_negosiasi']))
                $('#kontrak_juksung23').text(convertToRupiah(response['total_kontrak_hcpe']['total_hasil_negosiasi']))
                $('#kontrak_juksung24').text(convertToRupiah(response['total_kontrak_hcs']['total_hasil_negosiasi']))
                $('#kontrak_juksung25').text(convertToRupiah(response['total_kontrak_ga']['total_hasil_negosiasi']))
                $('#kontrak_juksung26').text(convertToRupiah(response['total_kontrak_fa']['total_hasil_negosiasi']))
                $('#kontrak_juksung27').text(convertToRupiah(response['total_kontrak_spgrc']['total_hasil_negosiasi']))
                $('#kontrak_juksung28').text(convertToRupiah(response['total_kontrak_bpd']['total_hasil_negosiasi']))
                $('#kontrak_juksung29').text(convertToRupiah(response['total_kontrak_pmo']['total_hasil_negosiasi']))


                $('#nilai_rup1').text(convertToRupiah(response['total_terbatas_rup_cs']['total_pagu_rup']))
                $('#nilai_rup2').text(convertToRupiah(response['total_terbatas_rup_om']['total_pagu_rup']))
                $('#nilai_rup3').text(convertToRupiah(response['total_terbatas_rup_cc']['total_pagu_rup']))
                $('#nilai_rup20').text(convertToRupiah(response['total_terbatas_rup_pm']['total_pagu_rup']))
                $('#nilai_rup21').text(convertToRupiah(response['total_terbatas_rup_itd']['total_pagu_rup']))
                $('#nilai_rup22').text(convertToRupiah(response['total_terbatas_rup_its']['total_pagu_rup']))
                $('#nilai_rup23').text(convertToRupiah(response['total_terbatas_rup_hcpe']['total_pagu_rup']))
                $('#nilai_rup24').text(convertToRupiah(response['total_terbatas_rup_hcs']['total_pagu_rup']))
                $('#nilai_rup25').text(convertToRupiah(response['total_terbatas_rup_ga']['total_pagu_rup']))
                $('#nilai_rup26').text(convertToRupiah(response['total_terbatas_rup_fa']['total_pagu_rup']))
                $('#nilai_rup27').text(convertToRupiah(response['total_terbatas_rup_spgrc']['total_pagu_rup']))
                $('#nilai_rup28').text(convertToRupiah(response['total_terbatas_rup_bpd']['total_pagu_rup']))
                $('#nilai_rup29').text(convertToRupiah(response['total_terbatas_rup_pmo']['total_pagu_rup']))

                $('#hps_terbatas1').text(convertToRupiah(response['total_terbatas_hps_cs']['total_hps_rup']))
                $('#hps_terbatas2').text(convertToRupiah(response['total_terbatas_hps_om']['total_hps_rup']))
                $('#hps_terbatas3').text(convertToRupiah(response['total_terbatas_hps_cc']['total_hps_rup']))
                $('#hps_terbatas20').text(convertToRupiah(response['total_terbatas_hps_pm']['total_hps_rup']))
                $('#hps_terbatas21').text(convertToRupiah(response['total_terbatas_hps_itd']['total_hps_rup']))
                $('#hps_terbatas22').text(convertToRupiah(response['total_terbatas_hps_its']['total_hps_rup']))
                $('#hps_terbatas23').text(convertToRupiah(response['total_terbatas_hps_hcpe']['total_hps_rup']))
                $('#hps_terbatas24').text(convertToRupiah(response['total_terbatas_hps_hcs']['total_hps_rup']))
                $('#hps_terbatas25').text(convertToRupiah(response['total_terbatas_hps_ga']['total_hps_rup']))
                $('#hps_terbatas26').text(convertToRupiah(response['total_terbatas_hps_fa']['total_hps_rup']))
                $('#hps_terbatas27').text(convertToRupiah(response['total_terbatas_hps_spgrc']['total_hps_rup']))
                $('#hps_terbatas28').text(convertToRupiah(response['total_terbatas_hps_bpd']['total_hps_rup']))
                $('#hps_terbatas29').text(convertToRupiah(response['total_terbatas_hps_pmo']['total_hps_rup']))


                $('#kontrak_terbatas1').text(convertToRupiah(response['total_terbatas_kontrak_cs']['total_hasil_negosiasi']))
                $('#kontrak_terbatas2').text(convertToRupiah(response['total_terbatas_kontrak_om']['total_hasil_negosiasi']))
                $('#kontrak_terbatas3').text(convertToRupiah(response['total_terbatas_kontrak_cc']['total_hasil_negosiasi']))
                $('#kontrak_terbatas20').text(convertToRupiah(response['total_terbatas_kontrak_pm']['total_hasil_negosiasi']))
                $('#kontrak_terbatas21').text(convertToRupiah(response['total_terbatas_kontrak_itd']['total_hasil_negosiasi']))
                $('#kontrak_terbatas22').text(convertToRupiah(response['total_terbatas_kontrak_its']['total_hasil_negosiasi']))
                $('#kontrak_terbatas23').text(convertToRupiah(response['total_terbatas_kontrak_hcpe']['total_hasil_negosiasi']))
                $('#kontrak_terbatas24').text(convertToRupiah(response['total_terbatas_kontrak_hcs']['total_hasil_negosiasi']))
                $('#kontrak_terbatas25').text(convertToRupiah(response['total_terbatas_kontrak_ga']['total_hasil_negosiasi']))
                $('#kontrak_terbatas26').text(convertToRupiah(response['total_terbatas_kontrak_fa']['total_hasil_negosiasi']))
                $('#kontrak_terbatas27').text(convertToRupiah(response['total_terbatas_kontrak_spgrc']['total_hasil_negosiasi']))
                $('#kontrak_terbatas28').text(convertToRupiah(response['total_terbatas_kontrak_bpd']['total_hasil_negosiasi']))
                $('#kontrak_terbatas29').text(convertToRupiah(response['total_terbatas_kontrak_pmo']['total_hasil_negosiasi']))

                $('#hps_umum1').text(convertToRupiah(response['total_umum_hps_cs']['total_hps_rup']))
                $('#hps_umum2').text(convertToRupiah(response['total_umum_hps_om']['total_hps_rup']))
                $('#hps_umum3').text(convertToRupiah(response['total_umum_hps_cc']['total_hps_rup']))
                $('#hps_umum20').text(convertToRupiah(response['total_umum_hps_pm']['total_hps_rup']))
                $('#hps_umum21').text(convertToRupiah(response['total_umum_hps_itd']['total_hps_rup']))
                $('#hps_umum22').text(convertToRupiah(response['total_umum_hps_its']['total_hps_rup']))
                $('#hps_umum23').text(convertToRupiah(response['total_umum_hps_hcpe']['total_hps_rup']))
                $('#hps_umum24').text(convertToRupiah(response['total_umum_hps_hcs']['total_hps_rup']))
                $('#hps_umum25').text(convertToRupiah(response['total_umum_hps_ga']['total_hps_rup']))
                $('#hps_umum26').text(convertToRupiah(response['total_umum_hps_fa']['total_hps_rup']))
                $('#hps_umum27').text(convertToRupiah(response['total_umum_hps_spgrc']['total_hps_rup']))
                $('#hps_umum28').text(convertToRupiah(response['total_umum_hps_bpd']['total_hps_rup']))
                $('#hps_umum29').text(convertToRupiah(response['total_umum_hps_pmo']['total_hps_rup']))


                $('#kontrak_umum1').text(convertToRupiah(response['total_umum_kontrak_cs']['total_hasil_negosiasi']))
                $('#kontrak_umum2').text(convertToRupiah(response['total_umum_kontrak_om']['total_hasil_negosiasi']))
                $('#kontrak_umum3').text(convertToRupiah(response['total_umum_kontrak_cc']['total_hasil_negosiasi']))
                $('#kontrak_umum20').text(convertToRupiah(response['total_umum_kontrak_pm']['total_hasil_negosiasi']))
                $('#kontrak_umum21').text(convertToRupiah(response['total_umum_kontrak_itd']['total_hasil_negosiasi']))
                $('#kontrak_umum22').text(convertToRupiah(response['total_umum_kontrak_its']['total_hasil_negosiasi']))
                $('#kontrak_umum23').text(convertToRupiah(response['total_umum_kontrak_hcpe']['total_hasil_negosiasi']))
                $('#kontrak_umum24').text(convertToRupiah(response['total_umum_kontrak_hcs']['total_hasil_negosiasi']))
                $('#kontrak_umum25').text(convertToRupiah(response['total_umum_kontrak_ga']['total_hasil_negosiasi']))
                $('#kontrak_umum26').text(convertToRupiah(response['total_umum_kontrak_fa']['total_hasil_negosiasi']))
                $('#kontrak_umum27').text(convertToRupiah(response['total_umum_kontrak_spgrc']['total_hasil_negosiasi']))
                $('#kontrak_umum28').text(convertToRupiah(response['total_umum_kontrak_bpd']['total_hasil_negosiasi']))
                $('#kontrak_umum29').text(convertToRupiah(response['total_umum_kontrak_pmo']['total_hasil_negosiasi']))

                $('#hps_keseluruhan1').text(convertToRupiah(response['total_keseluruhan_hps_cs']['total_hps_rup']))
                $('#hps_keseluruhan2').text(convertToRupiah(response['total_keseluruhan_hps_om']['total_hps_rup']))
                $('#hps_keseluruhan3').text(convertToRupiah(response['total_keseluruhan_hps_cc']['total_hps_rup']))
                $('#hps_keseluruhan20').text(convertToRupiah(response['total_keseluruhan_hps_pm']['total_hps_rup']))
                $('#hps_keseluruhan21').text(convertToRupiah(response['total_keseluruhan_hps_itd']['total_hps_rup']))
                $('#hps_keseluruhan22').text(convertToRupiah(response['total_keseluruhan_hps_its']['total_hps_rup']))
                $('#hps_keseluruhan23').text(convertToRupiah(response['total_keseluruhan_hps_hcpe']['total_hps_rup']))
                $('#hps_keseluruhan24').text(convertToRupiah(response['total_keseluruhan_hps_hcs']['total_hps_rup']))
                $('#hps_keseluruhan25').text(convertToRupiah(response['total_keseluruhan_hps_ga']['total_hps_rup']))
                $('#hps_keseluruhan26').text(convertToRupiah(response['total_keseluruhan_hps_fa']['total_hps_rup']))
                $('#hps_keseluruhan27').text(convertToRupiah(response['total_keseluruhan_hps_spgrc']['total_hps_rup']))
                $('#hps_keseluruhan28').text(convertToRupiah(response['total_keseluruhan_hps_bpd']['total_hps_rup']))
                $('#hps_keseluruhan29').text(convertToRupiah(response['total_keseluruhan_hps_pmo']['total_hps_rup']))


                $('#kontrak_keseluruhan1').text(convertToRupiah(response['total_keseluruhan_kontrak_cs']['total_hasil_negosiasi']))
                $('#kontrak_keseluruhan2').text(convertToRupiah(response['total_keseluruhan_kontrak_om']['total_hasil_negosiasi']))
                $('#kontrak_keseluruhan3').text(convertToRupiah(response['total_keseluruhan_kontrak_cc']['total_hasil_negosiasi']))
                $('#kontrak_keseluruhan20').text(convertToRupiah(response['total_keseluruhan_kontrak_pm']['total_hasil_negosiasi']))
                $('#kontrak_keseluruhan21').text(convertToRupiah(response['total_keseluruhan_kontrak_itd']['total_hasil_negosiasi']))
                $('#kontrak_keseluruhan22').text(convertToRupiah(response['total_keseluruhan_kontrak_its']['total_hasil_negosiasi']))
                $('#kontrak_keseluruhan23').text(convertToRupiah(response['total_keseluruhan_kontrak_hcpe']['total_hasil_negosiasi']))
                $('#kontrak_keseluruhan24').text(convertToRupiah(response['total_keseluruhan_kontrak_hcs']['total_hasil_negosiasi']))
                $('#kontrak_keseluruhan25').text(convertToRupiah(response['total_keseluruhan_kontrak_ga']['total_hasil_negosiasi']))
                $('#kontrak_keseluruhan26').text(convertToRupiah(response['total_keseluruhan_kontrak_fa']['total_hasil_negosiasi']))
                $('#kontrak_keseluruhan27').text(convertToRupiah(response['total_keseluruhan_kontrak_spgrc']['total_hasil_negosiasi']))
                $('#kontrak_keseluruhan28').text(convertToRupiah(response['total_keseluruhan_kontrak_bpd']['total_hasil_negosiasi']))
                $('#kontrak_keseluruhan29').text(convertToRupiah(response['total_keseluruhan_kontrak_pmo']['total_hasil_negosiasi']))


                $('#efisiensi_tahun1').text(convertToRupiah(response['total_keseluruhan_hps_cs']['total_hps_rup'] - response['total_keseluruhan_kontrak_cs']['total_hasil_negosiasi']))
                $('#efisiensi_tahun2').text(convertToRupiah(response['total_keseluruhan_hps_om']['total_hps_rup'] - response['total_keseluruhan_kontrak_om']['total_hasil_negosiasi']))
                $('#efisiensi_tahun3').text(convertToRupiah(response['total_keseluruhan_hps_cc']['total_hps_rup'] - response['total_keseluruhan_kontrak_cc']['total_hasil_negosiasi']))
                $('#efisiensi_tahun20').text(convertToRupiah(response['total_keseluruhan_hps_pm']['total_hps_rup'] - response['total_keseluruhan_kontrak_pm']['total_hasil_negosiasi']))
                $('#efisiensi_tahun21').text(convertToRupiah(response['total_keseluruhan_hps_itd']['total_hps_rup'] - response['total_keseluruhan_kontrak_itd']['total_hasil_negosiasi']))
                $('#efisiensi_tahun22').text(convertToRupiah(response['total_keseluruhan_hps_its']['total_hps_rup'] - response['total_keseluruhan_kontrak_its']['total_hasil_negosiasi']))
                $('#efisiensi_tahun23').text(convertToRupiah(response['total_keseluruhan_hps_hcpe']['total_hps_rup'] - response['total_keseluruhan_kontrak_hcpe']['total_hasil_negosiasi']))
                $('#efisiensi_tahun24').text(convertToRupiah(response['total_keseluruhan_hps_hcs']['total_hps_rup'] - response['total_keseluruhan_kontrak_hcs']['total_hasil_negosiasi']))
                $('#efisiensi_tahun25').text(convertToRupiah(response['total_keseluruhan_hps_ga']['total_hps_rup'] - response['total_keseluruhan_kontrak_ga']['total_hasil_negosiasi']))
                $('#efisiensi_tahun26').text(convertToRupiah(response['total_keseluruhan_hps_fa']['total_hps_rup'] - response['total_keseluruhan_kontrak_fa']['total_hasil_negosiasi']))
                $('#efisiensi_tahun27').text(convertToRupiah(response['total_keseluruhan_hps_spgrc']['total_hps_rup'] - response['total_keseluruhan_kontrak_spgrc']['total_hasil_negosiasi']))
                $('#efisiensi_tahun28').text(convertToRupiah(response['total_keseluruhan_hps_bpd']['total_hps_rup'] - response['total_keseluruhan_kontrak_bpd']['total_hasil_negosiasi']))
                $('#efisiensi_tahun29').text(convertToRupiah(response['total_keseluruhan_hps_pmo']['total_hps_rup'] - response['total_keseluruhan_kontrak_pmo']['total_hasil_negosiasi']))


                var efisiensi_persentasi1 = (response['total_keseluruhan_hps_cs']['total_hps_rup'] - response['total_keseluruhan_kontrak_cs']['total_hasil_negosiasi']) / response['total_keseluruhan_hps_cs']['total_hps_rup'] * 100
                $('#efisiensi_persentasi1').text(cek_nan(efisiensi_persentasi1).toFixed(2))

                var efisiensi_persentasi2 = (response['total_keseluruhan_hps_om']['total_hps_rup'] - response['total_keseluruhan_kontrak_om']['total_hasil_negosiasi']) / response['total_keseluruhan_hps_om']['total_hps_rup'] * 100
                $('#efisiensi_persentasi2').text(cek_nan(efisiensi_persentasi2).toFixed(2))

                var efisiensi_persentasi3 = (response['total_keseluruhan_hps_cc']['total_hps_rup'] - response['total_keseluruhan_kontrak_cc']['total_hasil_negosiasi']) / response['total_keseluruhan_hps_cc']['total_hps_rup'] * 100
                $('#efisiensi_persentasi3').text(cek_nan(efisiensi_persentasi3).toFixed(2))

                var efisiensi_persentasi20 = (response['total_keseluruhan_hps_pm']['total_hps_rup'] - response['total_keseluruhan_kontrak_pm']['total_hasil_negosiasi']) / response['total_keseluruhan_hps_pm']['total_hps_rup'] * 100
                $('#efisiensi_persentasi20').text(cek_nan(efisiensi_persentasi20).toFixed(2))

                var efisiensi_persentasi21 = (response['total_keseluruhan_hps_itd']['total_hps_rup'] - response['total_keseluruhan_kontrak_itd']['total_hasil_negosiasi']) / response['total_keseluruhan_hps_itd']['total_hps_rup'] * 100
                $('#efisiensi_persentasi21').text(cek_nan(efisiensi_persentasi21).toFixed(2))

                var efisiensi_persentasi22 = (response['total_keseluruhan_hps_its']['total_hps_rup'] - response['total_keseluruhan_kontrak_its']['total_hasil_negosiasi']) / response['total_keseluruhan_hps_its']['total_hps_rup'] * 100
                $('#efisiensi_persentasi22').text(cek_nan(efisiensi_persentasi22).toFixed(2))


                var efisiensi_persentasi23 = (response['total_keseluruhan_hps_hcpe']['total_hps_rup'] - response['total_keseluruhan_kontrak_hcpe']['total_hasil_negosiasi']) / response['total_keseluruhan_hps_hcpe']['total_hps_rup'] * 100
                $('#efisiensi_persentasi23').text(cek_nan(efisiensi_persentasi23).toFixed(2))

                var efisiensi_persentasi24 = (response['total_keseluruhan_hps_hcs']['total_hps_rup'] - response['total_keseluruhan_kontrak_hcs']['total_hasil_negosiasi']) / response['total_keseluruhan_hps_hcs']['total_hps_rup'] * 100
                $('#efisiensi_persentasi24').text(cek_nan(efisiensi_persentasi24).toFixed(2))

                var efisiensi_persentasi25 = (response['total_keseluruhan_hps_ga']['total_hps_rup'] - response['total_keseluruhan_kontrak_ga']['total_hasil_negosiasi']) / response['total_keseluruhan_hps_ga']['total_hps_rup'] * 100
                $('#efisiensi_persentasi25').text(cek_nan(efisiensi_persentasi25).toFixed(2))

                var efisiensi_persentasi26 = (response['total_keseluruhan_hps_fa']['total_hps_rup'] - response['total_keseluruhan_kontrak_fa']['total_hasil_negosiasi']) / response['total_keseluruhan_hps_fa']['total_hps_rup'] * 100
                $('#efisiensi_persentasi26').text(cek_nan(efisiensi_persentasi26).toFixed(2))

                var efisiensi_persentasi27 = (response['total_keseluruhan_hps_spgrc']['total_hps_rup'] - response['total_keseluruhan_kontrak_spgrc']['total_hasil_negosiasi']) / response['total_keseluruhan_hps_spgrc']['total_hps_rup'] * 100
                $('#efisiensi_persentasi27').text(cek_nan(efisiensi_persentasi27).toFixed(2))

                var efisiensi_persentasi28 = (response['total_keseluruhan_hps_bpd']['total_hps_rup'] - response['total_keseluruhan_kontrak_bpd']['total_hasil_negosiasi']) / response['total_keseluruhan_hps_bpd']['total_hps_rup'] * 100
                $('#efisiensi_persentasi28').text(cek_nan(efisiensi_persentasi28).toFixed(2))

                var efisiensi_persentasi29 = (response['total_keseluruhan_hps_pmo']['total_hps_rup'] - response['total_keseluruhan_kontrak_pmo']['total_hasil_negosiasi']) / response['total_keseluruhan_hps_pmo']['total_hps_rup'] * 100
                $('#efisiensi_persentasi29').text(cek_nan(efisiensi_persentasi29).toFixed(2))


                var efisiensi_rup1 = response['total_keseluruhan_hps_cs']['total_hps_rup'] / response['total_rup_cs']['total_pagu_rup']
                $('#efisiensi_rup1').text(cek_nan(efisiensi_rup1).toFixed(2))

                var efisiensi_rup2 = response['total_keseluruhan_hps_om']['total_hps_rup'] / response['total_rup_om']['total_pagu_rup']
                $('#efisiensi_rup2').text(cek_nan(efisiensi_rup2).toFixed(2))

                var efisiensi_rup3 = response['total_keseluruhan_hps_cc']['total_hps_rup'] / response['total_rup_cc']['total_pagu_rup']
                $('#efisiensi_rup3').text(cek_nan(efisiensi_rup3).toFixed(2))

                var efisiensi_rup20 = response['total_keseluruhan_hps_pm']['total_hps_rup'] / response['total_rup_pm']['total_pagu_rup']
                $('#efisiensi_rup20').text(cek_nan(efisiensi_rup20).toFixed(2))

                var efisiensi_rup21 = response['total_keseluruhan_hps_itd']['total_hps_rup'] / response['total_rup_itd']['total_pagu_rup']
                $('#efisiensi_rup21').text(cek_nan(efisiensi_rup21).toFixed(2))

                var efisiensi_rup22 = response['total_keseluruhan_hps_its']['total_hps_rup'] / response['total_rup_its']['total_pagu_rup']
                $('#efisiensi_rup22').text(cek_nan(efisiensi_rup22).toFixed(2))

                var efisiensi_rup23 = response['total_keseluruhan_hps_itd']['total_hps_rup'] / response['total_rup_itd']['total_pagu_rup']
                $('#efisiensi_rup23').text(cek_nan(efisiensi_rup23).toFixed(2))

                var efisiensi_rup24 = response['total_keseluruhan_hps_hcs']['total_hps_rup'] / response['total_rup_hcs']['total_pagu_rup']
                $('#efisiensi_rup24').text(cek_nan(efisiensi_rup24).toFixed(2))

                var efisiensi_rup25 = response['total_keseluruhan_hps_ga']['total_hps_rup'] / response['total_rup_ga']['total_pagu_rup']
                $('#efisiensi_rup25').text(cek_nan(efisiensi_rup25).toFixed(2))

                var efisiensi_rup26 = response['total_keseluruhan_hps_fa']['total_hps_rup'] / response['total_rup_fa']['total_pagu_rup']
                $('#efisiensi_rup26').text(cek_nan(efisiensi_rup26).toFixed(2))

                var efisiensi_rup27 = response['total_keseluruhan_hps_spgrc']['total_hps_rup'] / response['total_rup_spgrc']['total_pagu_rup']
                $('#efisiensi_rup27').text(cek_nan(efisiensi_rup27).toFixed(2))

                var efisiensi_rup28 = response['total_keseluruhan_hps_bpd']['total_hps_rup'] / response['total_rup_bpd']['total_pagu_rup']
                $('#efisiensi_rup28').text(cek_nan(efisiensi_rup28).toFixed(2))

                var efisiensi_rup29 = response['total_keseluruhan_hps_pmo']['total_hps_rup'] / response['total_rup_pmo']['total_pagu_rup']
                $('#efisiensi_rup29').text(cek_nan(efisiensi_rup29).toFixed(2))

                $('#nilai_rup_total').text(convertToRupiah(response['total_rup']['total_pagu_rup']))
                $('#hps_juksung_total').text(convertToRupiah(response['total_hps_juksung']['total_hps_rup']))
                $('#kontrak_juksung_total').text(convertToRupiah(response['total_kontrak_juksung']['total_hasil_negosiasi']))

                $('#hps_terbatas_total').text(convertToRupiah(response['total_hps_terbatas']['total_hps_rup']))
                $('#kontrak_terbatas_total').text(convertToRupiah(response['total_kontrak_terbatas']['total_hasil_negosiasi']))

                $('#hps_umum_total').text(convertToRupiah(response['total_hps_umum']['total_hps_rup']))
                $('#kontrak_umum_total').text(convertToRupiah(response['total_kontrak_umum']['total_hasil_negosiasi']))

                $('#hps_keseluruhan_total').text(convertToRupiah(response['total_hps_keseluruhan']['total_hps_rup']))
                $('#kontrak_keseluruhan_total').text(convertToRupiah(response['total_kontrak_keseluruhan']['total_hasil_negosiasi']))

                $('#efisiensi_tahun_total').text(convertToRupiah(response['total_hps_keseluruhan']['total_hps_rup'] - response['total_kontrak_keseluruhan']['total_hasil_negosiasi']))

                var peresentasi_efisiensi = response['total_hps_keseluruhan']['total_hps_rup'] - response['total_kontrak_keseluruhan']['total_hasil_negosiasi']
                var peresentasi_efisiensi_final = peresentasi_efisiensi / response['total_hps_keseluruhan']['total_hps_rup'] * 100
                $('#efisiensi_persentasi_total').text(cek_nan(peresentasi_efisiensi_final).toFixed(2))

                var peresentasi_thdp_pagu = response['total_hps_keseluruhan']['total_hps_rup'] / response['total_rup']['total_pagu_rup']
                $('#efisiensi_rup_total').text(cek_nan(peresentasi_thdp_pagu).toFixed(2))
            }
        })
    }

    function cek_nan(val) {

        if (!val) {
            return 0;
        } else {
            return val
        }
    }
</script>