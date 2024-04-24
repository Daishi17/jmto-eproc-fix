<script>
    $(document).ready(function() {
        var url_get_manajemen_user = $('[name="url_get_manajemen_user"').val()
        $('#tbl_manajemen_user').DataTable({
            "responsive": false,
            "ordering": true,
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            // "dom": 'Bfrtip',
            // "buttons": ["excel", "pdf", "print", "colvis"],
            "order": [],
            "ajax": {
                "url": url_get_manajemen_user,
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
        $('#tbl_manajemen_user').DataTable().ajax.reload();
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
        if (type == 'ubah_pw') {
            saveData = 'ubah_pw';
        }
        var url_get_byid = $('[name="url_get_byid"]').val()
        $.ajax({
            type: "GET",
            url: url_get_byid + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'edit') {
                    $('[name="id_manajemen_user"]').val(response.id_manajemen_user);
                    $('[name="kode_mjm_user_edit"]').val(response.kode_mjm_user);
                    $('[name="id_pegawai_edit"]').val(response.id_pegawai);

                    $('[name="id_pegawai_edit"]').append('<option selected value=' + response.id_pegawai + '>' + response.nama_pegawai + '</option>');

                    $('[name="nama_departemen_edit"]').val(response.nama_departemen);
                    $('[name="username_edit"]').val(response.username);
                    $('[name="id_role_edit"]').val(response.role)
                    $('#modal-xl-edit').modal('show')
                } else if (type == 'aktif') {
                    Question_aktifkan(response.id_manajemen_user, response.username);
                } else if (type == 'nonaktif') {
                    Question_nonaktifkan(response.id_manajemen_user, response.username);
                } else if (type == 'ubah_pw') {
                    $('[name="username_ubah_pw"]').val(response.username);
                    $('[name="id_manajemen_user_ubah"]').val(response.id_manajemen_user);

                    $('#ubah_pw').modal('show')
                }
                // else {
                // 	deleteQuestion(response.kd_lokasi, response.nm_lokasi);
                // }
            }
        })
    }

    function get_pegawai() {
        var url_get_bynip = $('[name="url_get_bynip"]').val()
        var id_pegawai = $('[name="id_pegawai"]').val()

        $.ajax({
            type: "GET",
            url: url_get_bynip + id_pegawai,
            dataType: "JSON",
            success: function(response) {
                $('[name="nama_departemen"]').val(response.nama_departemen)
            }
        })
    }


    function get_pegawai_edit() {
        var url_get_bynip = $('[name="url_get_bynip"]').val()
        var id_pegawai = $('[name="id_pegawai_edit"]').val()

        $.ajax({
            type: "GET",
            url: url_get_bynip + id_pegawai,
            dataType: "JSON",
            success: function(response) {
                $('[name="nama_departemen_edit"]').val(response.nama_departemen)
            }
        })
    }

    var form_mjm_user = $('#form_mjm_user');
    var url_post = $('[name="url_post"]').val()
    form_mjm_user.on('submit', function(e) {
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
                    $(".password").css('display', 'block');
                    $(".password2").css('display', 'block');
                    $(".id_pegawai").css('display', 'block');
                    $(".role").css('display', 'block');
                    $(".username").css('display', 'block');
                    $(".id_pegawai").html(response['error']['id_pegawai']);
                    $(".role").html(response['error']['id_role']);
                    $(".username").html(response['error']['username']);
                    $(".password").html(response['error']['password']);
                    $(".password2").html(response['error']['password2']);
                } else if (response['error2']) {
                    $(".role").html(response['error2']['id_role']);
                    $(".password").css('display', 'none');
                    $(".password2").css('display', 'none');
                    $(".id_pegawai").css('display', 'none');
                    $(".username").css('display', 'none');
                    $(".role").css('display', 'block');
                } else {
                    $(".role").css('display', 'none');
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

                            form_mjm_user[0].reset();
                            $('[name="kode_mjm_user"]').val(response.kode);
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

    var form_mjm_user_edit = $('#form_mjm_user_edit');
    var url_post_edit = $('[name="url_post_edit"]').val()
    form_mjm_user_edit.on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: url_post_edit,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                if (response['error']) {
                    $(".role").css('display', 'block');
                    $(".role").html(response['error']['id_role']);
                } else if (response['error2']) {
                    $(".role").html(response['error2']['id_role']);
                    $(".role").css('display', 'block');
                } else {
                    $(".role").css('display', 'none');
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

                            form_mjm_user_edit[0].reset();
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


    var form_ubah_password = $('#form_ubah_password');
    var url_ubah_password = $('[name="url_ubah_password"]').val()
    form_ubah_password.on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: url_ubah_password,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                if (response['error']) {
                    $(".password").css('display', 'block');
                    $(".password").html(response['error']['password']);
                    $(".password2").css('display', 'block');
                    $(".password2").html(response['error']['password2']);
                } else {
                    $(".role").css('display', 'none');
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
                            $('#ubah_pw').modal('hide')

                            form_ubah_password[0].reset();
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

    function Question_aktifkan(id, username) {
        var url_aktifkan_user = $('[name="url_aktifkan_user"]').val()
        Swal.fire({
            title: 'Apakah Anda Yakin Ingin Aktifkan Data User? ',
            text: username,
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
                    url: url_aktifkan_user,
                    data: {
                        id_mjm_user: id,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response == 'success') {
                            Swal.fire(
                                'Berhasil!',
                                'Section ' + username + ' Berhasil Di Aktifkan!',
                                'success'
                            )
                            reload_table();
                        }
                    }
                })

            }
        })
    }

    function Question_nonaktifkan(id, username) {
        var url_nonaktifkan_user = $('[name="url_nonaktifkan_user"]').val()
        Swal.fire({
            title: 'Apakah Anda Yakin Ingin Non-Aktifkan Data ? ',
            text: username,
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
                    url: url_nonaktifkan_user,
                    data: {
                        id_mjm_user: id,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response == 'success') {
                            Swal.fire(
                                'Berhasil!',
                                'Section ' + username + ' Berhasil Di Non-Aktifkan!',
                                'success'
                            )
                            reload_table();
                        }
                    }
                })

            }
        })
    }

    function myFunction1() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function myFunction2() {
        var x = document.getElementById("confirmPassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function myFunction3() {
        var x = document.getElementById("password_baru");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function myFunction4() {
        var x = document.getElementById("confirmPassword_baru");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>