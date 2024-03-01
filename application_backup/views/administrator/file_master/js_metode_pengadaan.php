<script>
    var form_metode_pengadaan = $('#form_metode_pengadaan');
    var url_post = $('[name="url_post"]').val()
    form_metode_pengadaan.on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: url_post,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                if (response == 'failed') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Isi Nama Metode Pengadaan Terlebih Dahulu Ya!',
                    })
                } else {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Menyimpan Data!',
                        html: 'Harap Tunggu <b></b>',
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
                            $('#modal-xl-tambah').modal('hide')

                            form_metode_pengadaan[0].reset();
                            $('[name="kode_metode_pengadaan"]').val(response.kode);
                            reload_table()
                            Swal.fire('Data Berhasil Di Masukkan!', '', 'success')
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

    var form_metode_pengadaan_edit = $('#form_metode_pengadaan_edit');
    form_metode_pengadaan_edit.on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: url_post,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                if (response == 'failed') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Isi Nama metode Pengadaan Terlebih Dahulu Ya!',
                    })
                } else {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Menyimpan Data!',
                        html: 'Harap Tunggu <b></b>',
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
                            $('#modal-xl-edit').modal('hide')

                            form_metode_pengadaan_edit[0].reset();
                            $('[name="kode_metode_pengadaan"]').val(response.kode);
                            reload_table()
                            Swal.fire('Data Berhasil Di Ubah!', '', 'success')
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
        var url_get_metode_pengadaan = $('[name="url_get_metode_pengadaan"').val()
        $('#tbl_metode_pengadaan').DataTable({
            "responsive": false,
            "ordering": true,
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            // "dom": 'Bfrtip',
            // "buttons": ["excel", "pdf", "print", "colvis"],
            "order": [],
            "ajax": {
                "url": url_get_metode_pengadaan,
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

    function reload_table() {
        $('#tbl_metode_pengadaan').DataTable().ajax.reload();
    }

    function Question_aktifkan(id, nama_metode_pengadaan) {
        var url_aktifkan_metode_pengadaan = $('[name="url_aktifkan_metode_pengadaan"]').val()
        Swal.fire({
            title: 'Apakah Anda Yakin Ingin Aktifkan Data ? ',
            text: nama_metode_pengadaan,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: url_aktifkan_metode_pengadaan,
                    data: {
                        id_metode_pengadaan: id,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response == 'success') {
                            Swal.fire(
                                'Berhasil!',
                                'metode_pengadaan ' + nama_metode_pengadaan + ' Berhasil Di Aktifkan!',
                                'success'
                            )
                            reload_table();
                        }
                    }
                })

            }
        })
    }

    function Question_nonaktifkan(id, nama_metode_pengadaan) {
        var url_nonaktifkan_metode_pengadaan = $('[name="url_nonaktifkan_metode_pengadaan"]').val()
        Swal.fire({
            title: 'Apakah Anda Yakin Ingin Non-Aktifkan Data ? ',
            text: nama_metode_pengadaan,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: url_nonaktifkan_metode_pengadaan,
                    data: {
                        id_metode_pengadaan: id,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response == 'success') {
                            Swal.fire(
                                'Berhasil!',
                                'metode_pengadaan ' + nama_metode_pengadaan + ' Berhasil Di Non-Aktifkan!',
                                'success'
                            )
                            reload_table();
                        }
                    }
                })

            }
        })
    }


    function byid(id, type) {
        if (type == 'edit') {
            saveData = 'edit';
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
                if (type == 'edit') {
                    $('[name="kode_metode_pengadaan"]').val(response.kode_metode_pengadaan);
                    $('[name="nama_metode_pengadaan"]').val(response.nama_metode_pengadaan);
                    $('[name="id_metode_pengadaan"]').val(response.id_metode_pengadaan);

                    $('#modal-xl-edit').modal('show')
                } else if (type == 'aktif') {
                    Question_aktifkan(response.kode_metode_pengadaan, response.nama_metode_pengadaan);
                } else if (type == 'nonaktif') {
                    Question_nonaktifkan(response.kode_metode_pengadaan, response.nama_metode_pengadaan);
                }
                // else {
                // 	deleteQuestion(response.kd_lokasi, response.nm_lokasi);
                // }
            }
        })
    }

    function tambah_data() {
        $('#modal-xl-tambah').modal('show')
        $('#form_metode_pengadaan')[0].reset()
    }
</script>