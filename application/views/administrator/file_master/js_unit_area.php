<script>
    function select_departemen() {
        var id_departemen = $('[name="id_departemen"]').val()
        var url_get_byid_kerja = $('[name="url_get_byid_kerja"]').val()
        $.ajax({
            type: "GET",
            url: url_get_byid_kerja + id_departemen,
            dataType: "JSON",
            success: function(response) {
                var kode_section = $('[name="kode_section_manipulation"]').val()
                $('[name="kode_section"]').val(kode_section + response.kode_departemen)
            }
        })
    }

    function select_departemen_edit() {
        var id_departemen = $('[name="id_departemen_edit"]').val()
        var url_get_byid_kerja = $('[name="url_get_byid_kerja"]').val()
        $.ajax({
            type: "GET",
            url: url_get_byid_kerja + id_departemen,
            dataType: "JSON",
            success: function(response) {
                var kode_section = $('[name="kode_section_edit"]').val()
                var kode_section2 = kode_section.substring(0, 4);
                $('[name="kode_section_edit"]').val(kode_section2 + response.kode_departemen)
            }
        })
    }

    $(document).ready(function() {
        var url_get_unit_area = $('[name="url_get_unit_area"').val()
        $('#tbl_section').DataTable({
            "responsive": false,
            "ordering": true,
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            // "dom": 'Bfrtip',
            // "buttons": ["excel", "pdf", "print", "colvis"],
            "order": [],
            "ajax": {
                "url": url_get_unit_area,
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
        $('#tbl_section').DataTable().ajax.reload();
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
                    $('[name="kode_section_edit"]').val(response.kode_section);
                    $('[name="nama_section_edit"]').val(response.nama_section);
                    $('[name="id_departemen_edit"]').val(response.id_departemen);
                    $('[name="id_section"]').val(response.id_section)
                    $('#modal-xl-edit').modal('show')
                } else if (type == 'aktif') {
                    Question_aktifkan(response.id_section, response.nama_section);
                } else if (type == 'nonaktif') {
                    Question_nonaktifkan(response.id_section, response.nama_section);
                }
                // else {
                // 	deleteQuestion(response.kd_lokasi, response.nm_lokasi);
                // }
            }
        })
    }

    function Question_aktifkan(id, nama_section) {
        var url_aktifkan_area = $('[name="url_aktifkan_area"]').val()
        Swal.fire({
            title: 'Apakah Anda Yakin Ingin Aktifkan Data ? ',
            text: nama_section,
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
                    url: url_aktifkan_area,
                    data: {
                        id_section: id,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response == 'success') {
                            Swal.fire(
                                'Berhasil!',
                                'Section ' + nama_section + ' Berhasil Di Aktifkan!',
                                'success'
                            )
                            reload_table();
                        }
                    }
                })

            }
        })
    }

    function Question_nonaktifkan(id, nama_section) {
        var url_nonaktifkan_area = $('[name="url_nonaktifkan_area"]').val()
        Swal.fire({
            title: 'Apakah Anda Yakin Ingin Non-Aktifkan Data ? ',
            text: nama_section,
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
                    url: url_nonaktifkan_area,
                    data: {
                        id_section: id,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response == 'success') {
                            Swal.fire(
                                'Berhasil!',
                                'Section ' + nama_section + ' Berhasil Di Non-Aktifkan!',
                                'success'
                            )
                            reload_table();
                        }
                    }
                })

            }
        })
    }

    var form_unit_area = $('#form_unit_area');
    var url_post = $('[name="url_post"]').val()
    form_unit_area.on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: url_post,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                if (response['error']) {
                    $(".nama_section").html(response['error']['nama_section']);
                    $(".id_departemen").html(response['error']['id_departemen']);
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

                            form_unit_area[0].reset();
                            $('[name="kode_section"]').val(response.kode);
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

    var form_unit_area_edit = $('#form_unit_area_edit');
    var url_post = $('[name="url_post"]').val()
    form_unit_area_edit.on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: url_post,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                if (response['error']) {
                    $(".nama_section").html(response['error']['nama_section']);
                    $(".id_departemen").html(response['error']['id_departemen']);
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
                            form_unit_area_edit[0].reset();
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
</script>