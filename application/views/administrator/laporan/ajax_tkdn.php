<script>
    $(document).ready(function() {
        fill_datatable_efisiensi_terbatas()

        function fill_datatable_efisiensi_terbatas(tahun_pengadaan = '') {
            $(document).ready(function() {
                $('#tbl_pengadaan_tkdn').DataTable({
                    "responsive": false,
                    "ordering": true,
                    "processing": true,
                    "serverSide": true,
                    "bDestroy": true,
                    // "dom": 'Bfrtip',
                    // "buttons": ["excel", "pdf", "print", "colvis"],
                    "order": [],
                    "ajax": {
                        "url": '<?= base_url('administrator/laporan_tkdn/datatable') ?>',
                        "type": "POST",
                        data: {
                            tahun_pengadaan: tahun_pengadaan
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
        $('#filter').click(function() {
            var tahun_pengadaan = $('#tahun_pengadaan').val();
            $('.tahun_pengadaan_label').text(tahun_pengadaan)
            if (tahun_pengadaan != '') {
                $('#tbl_pengadaan_tkdn').DataTable().destroy();
                fill_datatable_efisiensi_terbatas(tahun_pengadaan);
            } else {
                $('#tbl_pengadaan_tkdn').DataTable().destroy();
                fill_datatable_efisiensi_terbatas();
            }
        })

    });


    function byid(id_rup, type) {
        var modal_detail = $('#modal-xl');
        $.ajax({
            type: "GET",
            url: '<?= base_url('administrator/laporan_tkdn/get_rup/') ?>' + id_rup,
            dataType: "JSON",
            success: function(response) {
                modal_detail.modal('show');
                $('[name="nama_rup"]').val(response.nama_rup)
                $('[name="id_rup"]').val(response.id_rup)
            }
        })
    }

    function reload_table() {
        $('#tbl_pengadaan_tkdn').DataTable().ajax.reload();
    }

    var form_laporan_rup = $('#form_laporan_rup');
    form_laporan_rup.on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo base_url(); ?>administrator/laporan_tkdn/edit_keterangan",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                Swal.fire('Berhasil!', 'Data Berhasil Disimpan', 'success');
                reload_table()
                $('#modal-xl').model('hide');
            }
        });
    });
</script>