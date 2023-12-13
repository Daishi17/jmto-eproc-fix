        <div class="container-fluid">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <div class="col-md-4 d-flex align-items-center">
                    <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                        <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="29" height="24" class="d-inline-block align-text-top">
                    </a>
                    <span class="mb-3 mb-md-0 text-muted">Copy Right &copy; 2023 <b>Procurement, JMTO</b></span>
                </div>

                <div class="nav col-md-4 justify-content-end list-unstyled d-flex">
                    <span class="mb-3 mb-md-0 text-muted">[ Version. 1.0.0 ]<b> E-TenderJMTO</b></span>
                </div>
            </footer>
        </div>

        <!-- BS5 Style-->
        <script src="<?php echo base_url(); ?>/assets/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Tanggal & Jam-->
        <script src="<?php echo base_url(); ?>/assets/js/jam_tgl.min.js"></script>
        <!-- JQUERY-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/plugins-lte/jquery/jquery.min.js"></script>
        <!-- DataTables  & Plugins -->
        <script src="<?php echo base_url(); ?>/assets/plugins-lte/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/plugins-lte/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/plugins-lte/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/plugins-lte/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/plugins-lte/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/plugins-lte/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/plugins-lte/jszip/jszip.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/plugins-lte/pdfmake/pdfmake.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/plugins-lte/pdfmake/vfs_fonts.js"></script>
        <script src="<?php echo base_url(); ?>/assets/plugins-lte/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/plugins-lte/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/plugins-lte/datatables-buttons/js/buttons.colVis.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/datatable_master.js"></script>
        <!-- Select2 -->
        <script src="<?php echo base_url(); ?>/assets/plugins-lte/select2/js/select2.full.min.js"></script>
        <!-- <script src="<?php echo base_url(); ?>/assets/js/select2_style.js"></script> -->

        <script src="<?php echo base_url(); ?>/assets/plugins-lte/chart.js/Chart.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/chart_admin.js"></script>
        <script type="text/javascript" src="<?= base_url('assets/datetimepicekernew/plugins/'); ?>jquery.datetimepicker.full.min.js"></script>
        <!-- Select2 -->
        <script src="<?php echo base_url(); ?>assets/plugins-lte/select2/js/select2.full.min.js"></script>

        <script>
            $('.select2').select2()
            $(function() {
                //Initialize Select2 Elements
                $.fn.select2.defaults.set("theme", "bootstrap");
                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                });
            })
        </script>

        </body>

        </html>