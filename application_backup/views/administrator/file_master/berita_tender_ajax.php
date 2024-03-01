<script>
    $(document).ready(function() {
        $('#tbl_berita_tender').DataTable({
            "responsive": false,
            "ordering": true,
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            // "dom": 'Bfrtip',
            // "buttons": ["excel", "pdf", "print", "colvis"],
            "order": [],
            "ajax": {
                "url": '<?= base_url('administrator/berita_tender/datatable_berita_tender') ?>',
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
        $('#tbl_berita_tender').DataTable().ajax.reload();
    }

    var form_upload_berita = $('#form_upload_berita')
    form_upload_berita.on('submit', function(e) {
        var file_berita = $('[name="file_berita"]').val();
        if (file_berita == '') {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Dokumen Wajib Di Isi!',
            })
        } else {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url('administrator/berita_tender/upload_berita_tender') ?>',
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#btn_simpan').attr("disabled", true);
                },
                success: function(response) {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Menyimpan Data!',
                        html: 'Membuat Data <b></b>',
                        timer: 3000,
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
                            Swal.fire('Data Berhasil Di Simpan!', '', 'success')
                            form_upload_berita[0].reset();
                            reload_table()
                            $('#modal-xl-tambah').modal('hide');
                            $('#btn_simpan').attr("disabled", false);
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }
            })
        }
    })

    function byid_berita(id, type) {
        $.ajax({
            type: "GET",
            url: '<?= base_url('administrator/berita_tender/by_id_berita/')?>' + id,
            dataType: "JSON",
            success: function(response) {
                Hapus(response.id_berita, response.nama_berita);
            }
        })
    }

    function Hapus(id_berita, nama_berita) {
        Swal.fire({
            title: 'Apakah Anda Yakin Ingin Menghapus Data ? ',
            text: nama_berita,
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
                    url: '<?= base_url('administrator/berita_tender/hapus_berita_tender')?>',
                    data: {
                        id_berita: id_berita,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response == 'success') {
                            Swal.fire(
                                'Berhasil!',
                                'Nama Berita ' + nama_berita + ' Berhasil Di Hapus!',
                                'success'
                            )
                            reload_table();
                        }
                    }
                })

            }
        })
    }
</script>