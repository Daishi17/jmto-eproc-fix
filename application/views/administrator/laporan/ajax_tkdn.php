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
</script>