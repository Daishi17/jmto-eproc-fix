$(function () {
    $("#example1").DataTable({
    "responsive": false, "ordering": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $('#example2').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": false,
    "autoWidth": false,
    "responsive": false,
    });
});
