$(function () {
    //Initialize Select2 Elements
    $.fn.select2.defaults.set( "theme", "bootstrap" );
    $('.select2bs4').select2({
        placeholder: 'Pillih Data…',
        width: null,
        theme: 'bootstrap4'
    });
    $('#select2bs4').select2({
        dropdownParent: $('#modal-xl-paket')
    });
    // $( ".modal-xl-paket" ).modal();
})