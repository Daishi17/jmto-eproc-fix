<script>
    $(document).ready(function() {
        $('#tbl_daftar_hitam').DataTable({
            "responsive": false,
            "ordering": true,
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            "order": [],
            "ajax": {
                "url": '<?= base_url('validator/daftar_hitam/datatable_daftar_hitam') ?>',
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
        $('#tbl_daftar_hitam').DataTable().ajax.reload();
    }

    function byid_rekanan(id, type) {
        $.ajax({
            type: "GET",
            url: '<?= base_url('validator/daftar_hitam/byid_rekanan/') ?>' + id,
            dataType: "JSON",
            success: function(response) {
                Hapus(response.id_url_vendor, response.nama_usaha);
            }
        })
    }

    function Hapus(id_url_vendor, nama_usaha) {
        Swal.fire({
            title: 'Apakah Anda Yakin Ingin Menghapus Dari Daftar Hitam ? ',
            text: nama_usaha,
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
                    url: '<?= base_url('validator/daftar_hitam/non_daftar_hitam') ?>',
                    data: {
                        id_url_vendor: id_url_vendor,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response == 'success') {
                            Swal.fire(
                                'Berhasil!',
                                'Daftar Hitam ' + nama_usaha + ' Berhasil Di Hapus!',
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