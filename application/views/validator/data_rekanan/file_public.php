<script>
    var tbl_rekanan_baru = $('#tbl_rekanan_baru')
    var url_get_rekanan_baru = $('[name="url_get_rekanan_baru"').val()
    $(document).ready(function() {
        tbl_rekanan_baru.DataTable({
            "responsive": false,
            "ordering": true,
            "processing": true,
            "serverSide": true,
            "dom": 'Bfrtip',
            "buttons": ["excel", "pdf", "print", "colvis"],
            "order": [],
            "ajax": {
                "url": url_get_rekanan_baru,
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
        }).buttons().container().appendTo('#tbl_rekanan_baru .col-md-6:eq(0)');
    });

    function Reload_table_rekanan_baru() {
        tbl_rekanan_baru.DataTable().ajax.reload();
    }

    function byid_vendor(id_vendor, type) {
        if (type == 'lihat') {
            saveData = 'lihat';
        }
        if (type == 'terima') {
            saveData = 'terima';
        }
        if (type == 'tolak') {
            saveData = 'tolak';
        }
        var url_get_rekanan_baru_by_id = $('[name="url_get_rekanan_baru_by_id"]').val();
        var modal_rekanan_baru = $('#modal-xl-view')
        $.ajax({
            type: "GET",
            url: url_get_rekanan_baru_by_id + id_vendor,
            dataType: "JSON",
            success: function(response) {
                if (type == 'lihat') {
                    modal_rekanan_baru.modal('show')
                    $('#nama_usaha').text(response['row_vendor'].nama_usaha)
                    $('#id_jenis_usaha').text(response['jenis_izin'])
                    $('#kualifikasi_usaha').text(response['row_vendor'].kualifikasi_usaha)
                    $('#npwp').text(response['row_vendor'].npwp)
                    $('#email').text(response['row_vendor'].email)
                    $('#bentuk_usaha').text(response['row_vendor'].bentuk_usaha)
                    $('#alamat').text(response['row_vendor'].alamat)
                    $('#nama_provinsi').text(response['row_vendor'].nama_provinsi)
                    $('[name="id_vendor"]').val(response['row_vendor'].id_url_vendor)
                    $('[name="nama_usaha"]').val(response['row_vendor'].nama_usaha)
                } else if (type == 'terima') {
                    Question_terima(id_vendor, response['row_vendor'].nama_usaha)
                } else if (type == 'tolak') {
                    $('#nama_usaha_tolak').text(response['row_vendor'].nama_usaha)
                    $('[name="id_vendor"]').val(response['row_vendor'].id_url_vendor)
                    $('#modal_tolak').modal('show')
                } else {

                }
            }
        })

    }

    function Question_terima_modal() {
        var id_vendor = $('[name="id_vendor"]').val()
        var url_terima_rekanan_baru = $('[name="url_terima_rekanan_baru"]').val()
        var nama_usaha = $('[name="nama_usaha"]').val()
        Swal.fire({
            title: 'Apakah Anda Yakin Terima Penyedia? ' + nama_usaha,
            text: "Penyedia Yang Sudah Di Terima Tidak Bisa Di Tolak Kembali!",
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
                    url: url_terima_rekanan_baru,
                    data: {
                        id_vendor: id_vendor,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response['message'] == 'success') {
                            Swal.fire(
                                'Berhasil!',
                                'Penyedia ' + nama_usaha + ' Berhasil Di Terima!',
                                'success'
                            )
                            Reload_table_rekanan_baru();
                            $('#modal-xl-view').modal('hide')
                        }
                    }
                })

            }
        })
    }

    function Question_tolak_modal() {
        var id_vendor = $('[name="id_vendor"]').val()
        var url_terima_rekanan_baru = $('[name="url_terima_rekanan_baru"]').val()
        var nama_usaha = $('[name="nama_usaha"]').val()
        $('#modal_tolak').modal('show')
        $('#nama_usaha_tolak').text(nama_usaha)
        $('[name="id_vendor"]').val(id_vendor)
    }

    function Question_terima(id_vendor, nm_vendor) {
        var url_terima_rekanan_baru = $('[name="url_terima_rekanan_baru"]').val()
        Swal.fire({
            title: 'Apakah Anda Yakin Terima Penyedia? ' + nm_vendor,
            text: "Penyedia Yang Sudah Di Terima Tidak Bisa Di Tolak Kembali!",
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
                    url: url_terima_rekanan_baru,
                    data: {
                        id_vendor: id_vendor,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response['message'] == 'success') {
                            Swal.fire(
                                'Berhasil!',
                                'Penyedia ' + nm_vendor + ' Berhasil Di Terima!',
                                'success'
                            )
                            Reload_table_rekanan_baru();
                        }
                    }
                })

            }
        })
    }

    function Question_tolak(id_vendor, nm_vendor) {
        var url_tolak_rekanan_baru = $('[name="url_tolak_rekanan_baru"]').val()
        Swal.fire({
            title: 'Apakah Anda Yakin Tolak Penyedia? ' + nm_vendor,
            text: "Penyedia Yang Sudah Di Tolak Tidak Bisa Daftar Ulang Menggunakan Email Yang Sama!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Tolak!',
            cancelButtonText: 'Batal!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: url_terima_rekanan_baru,
                    data: {
                        id_vendor: id_vendor,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response['message'] == 'success') {
                            Swal.fire(
                                'Berhasil!',
                                'Penyedia ' + nm_vendor + ' Berhasil Di Tolak!',
                                'success'
                            )
                            Reload_table_rekanan_baru();
                        }
                    }
                })

            }
        })
    }

    var form_tolak = $('#form_tolak')
    form_tolak.on('submit', function(e) {
        e.preventDefault();
        var url_tolak_rekanan_baru = $('[name="url_tolak_rekanan_baru"]').val()
        $.ajax({
            url: url_tolak_rekanan_baru,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                let timerInterval
                Swal.fire({
                    title: 'Sedang Proses Mengirim Pesan!',
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
                        $('#modal_tolak').modal('hide')
                        Swal.fire('Pesan Berhasil Terkirim!', '', 'success')
                        Reload_table_rekanan_baru()
                        form_tolak[0].reset();
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {

                    }
                })
            }
        })
    })
</script>