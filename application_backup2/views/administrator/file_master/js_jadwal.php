<script>
    $(document).ready(function() {
        var url_get_jadwal = $('[name="url_get_jadwal"').val()
        $('#tbl_jadwal').DataTable({
            "responsive": false,
            "ordering": true,
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            // "dom": 'Bfrtip',
            // "buttons": ["excel", "pdf", "print", "colvis"],
            "order": [],
            "ajax": {
                "url": url_get_jadwal,
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
        })
    });

    function byid(id, type) {
        if (type == 'detail') {
            saveData = 'detail';
        }
        if (type == 'aktifkan') {
            saveData = 'aktifkan';
        }
        if (type == 'nonaktifkan') {
            saveData = 'nonaktifkan';
        }
        var url_get_byid = $('[name="url_get_byid"]').val()
        $.ajax({
            type: "GET",
            url: url_get_byid + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'detail') {
                    $('#modal-detail').modal('show')
                    $('[name="kode_jadwal"]').val(response.kode_jadwal);
                    $('[name="nama_jadwal_pengadaan"]').val(response.nama_jadwal_pengadaan);
                    $('[name="nama_jenis_pengadaan"]').val(response.nama_jenis_pengadaan);
                    $('[name="nama_metode_pengadaan"]').val(response.nama_metode_pengadaan);
                    $('[name="metode_kualifikasi"]').val(response.metode_kualifikasi);
                    $('[name="metode_dokumen"]').val(response.metode_dokumen);


                    var url_get_jadwal2 = $('[name="url_get_jadwal2"').val()

                    $('#tbl_jadwal2').DataTable({
                        "responsive": false,
                        "ordering": true,
                        "processing": true,
                        "serverSide": true,
                        "bDestroy": true,
                        "pageLength": 25,
                        // "dom": 'Bfrtip',
                        // "buttons": ["excel", "pdf", "print", "colvis"],
                        "order": [],
                        "ajax": {
                            "url": url_get_jadwal2,
                            "type": "POST",
                            "data": {
                                id: id
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
                } else if (type == 'aktif') {
                    Question_aktifkan(response.kode_jenis_pengadaan, response.nama_jenis_pengadaan);
                } else if (type == 'nonaktif') {
                    Question_nonaktifkan(response.kode_jenis_pengadaan, response.nama_jenis_pengadaan);
                }
                // else {
                // 	deleteQuestion(response.kd_lokasi, response.nm_lokasi);
                // }
            }
        })
    }
</script>