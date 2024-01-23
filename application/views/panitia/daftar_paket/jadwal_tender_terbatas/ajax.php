<script>
    $(document).ready(function() {
        $('#rup_penyedia').DataTable({});
    });
    //    $(document).on("click", "ul li", function () {
    // 	$(this).addClass("active").siblings().removeClass("active");
    // });
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $(".select2bs4").select2({
            theme: 'bootstrap4'
        })
    })
</script>
<!-- fade alert -->

<!-- row_1 -->
<script>
    $('#mulai1').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })
    $('#selesai1').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })
    document.getElementById("selesai1").onchange = function() {
        validasi_selesai()
    };


    function validasi_selesai() {
        const mulai1 = new Date($('#mulai1').val());
        const selesai1 = new Date($('#selesai1').val());
        if (mulai1.getTime() > selesai1.getTime()) {
            $('#error-jadwal1').show();
            $("#erorr_jadwal_row1").css("background-color", "red");
            $("#erorr_jadwal_row1").css("color", "white");
        } else {
            $('#error-jadwal1').hide();
            $("#erorr_jadwal_row1").css("background-color", "transparent");
            $("#erorr_jadwal_row1").css("color", "black");
        }
    }
</script>

<!-- row ke 2 -->
<!-- mulai2 -->
<!-- selesai2 -->
<!-- selesai1 -->
<script>
    $('#mulai2').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })

    $('#selesai2').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })
    document.getElementById("selesai2").onchange = function() {
        validasi_selesai2()
    };
    document.getElementById("mulai2").onchange = function() {
        validasi_mulai2()
    };
    // validasi mulai
    function validasi_mulai2() {
        const mulai2 = new Date($('#mulai2').val());
        const selesai1 = new Date($('#selesai1').val());
        if (mulai2.getTime() < selesai1.getTime()) {
            $('#error-jadwal2').show();
            $("#erorr_jadwal_row2").css("background-color", "red");
            $("#erorr_jadwal_row2").css("color", "white");
        } else {
            $('#error-jadwal2').hide();
            $("#erorr_jadwal_row2").css("background-color", "transparent");
            $("#erorr_jadwal_row2").css("color", "black");
        }
    }

    // validasi selesai
    function validasi_selesai2() {
        const mulai2 = new Date($('#mulai2').val());
        const selesai2 = new Date($('#selesai2').val());
        if (mulai2.getTime() > selesai2.getTime()) {
            $('#error-jadwal2').show();
            $("#erorr_jadwal_row2").css("background-color", "red");
            $("#erorr_jadwal_row2").css("color", "white");
        } else {
            $('#error-jadwal2').hide();
            $("#erorr_jadwal_row2").css("background-color", "transparent");
            $("#erorr_jadwal_row2").css("color", "black");
        }
    }
</script>

<!-- row ke 3 -->
<!-- 2 -->
<!-- mulai3 -->
<!-- selesai3 -->
<!-- selesai2 -->
<script>
    $('#mulai3').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })

    $('#selesai3').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })
    document.getElementById("selesai3").onchange = function() {
        validasi_selesai3()
    };
    document.getElementById("mulai3").onchange = function() {
        validasi_mulai3()
    };
    // validasi mulai
    function validasi_mulai3() {
        const mulai3 = new Date($('#mulai3').val());
        const selesai2 = new Date($('#selesai2').val());
        if (mulai3.getTime() < selesai2.getTime()) {
            $('#error-jadwal3').show();
            $("#erorr_jadwal_row3").css("background-color", "red");
            $("#erorr_jadwal_row3").css("color", "white");
        } else {
            $('#error-jadwal3').hide();
            $("#erorr_jadwal_row3").css("background-color", "transparent");
            $("#erorr_jadwal_row3").css("color", "black");
        }
    }

    // validasi selesai
    function validasi_selesai3() {
        const mulai3 = new Date($('#mulai3').val());
        const selesai3 = new Date($('#selesai3').val());
        if (mulai3.getTime() > selesai3.getTime()) {
            $('#error-jadwal3').show();
            $("#erorr_jadwal_row3").css("background-color", "red");
            $("#erorr_jadwal_row3").css("color", "white");
        } else {
            $('#error-jadwal3').hide();
            $("#erorr_jadwal_row3").css("background-color", "transparent");
            $("#erorr_jadwal_row3").css("color", "black");
        }
    }
</script>


<!-- row ke 4 -->
<!-- 3 -->
<!-- mulai4 -->
<!-- selesai4 -->
<!-- selesai3 -->
<script>
    $('#mulai4').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })

    $('#selesai4').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })
    document.getElementById("selesai4").onchange = function() {
        validasi_selesai4()
    };
    document.getElementById("mulai4").onchange = function() {
        validasi_mulai4()
    };
    // validasi mulai
    function validasi_mulai4() {
        const mulai4 = new Date($('#mulai4').val());
        const selesai3 = new Date($('#selesai3').val());
        if (mulai4.getTime() < selesai3.getTime()) {
            $('#error-jadwal4').show();
            $("#erorr_jadwal_row4").css("background-color", "red");
            $("#erorr_jadwal_row4").css("color", "white");
        } else {
            $('#error-jadwal4').hide();
            $("#erorr_jadwal_row4").css("background-color", "transparent");
            $("#erorr_jadwal_row4").css("color", "black");
        }
    }

    // validasi selesai
    function validasi_selesai4() {
        const mulai4 = new Date($('#mulai4').val());
        const selesai4 = new Date($('#selesai4').val());
        if (mulai4.getTime() > selesai4.getTime()) {
            $('#error-jadwal4').show();
            $("#erorr_jadwal_row4").css("background-color", "red");
            $("#erorr_jadwal_row4").css("color", "white");
        } else {
            $('#error-jadwal4').hide();
            $("#erorr_jadwal_row4").css("background-color", "transparent");
            $("#erorr_jadwal_row4").css("color", "black");
        }
    }
</script>


<!-- row ke 5 -->
<!-- 4 -->
<!-- mulai5 -->
<!-- selesai5 -->
<!-- selesai4 -->
<script>
    $('#mulai5').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })

    $('#selesai5').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })
    document.getElementById("selesai5").onchange = function() {
        validasi_selesai5()
    };
    document.getElementById("mulai5").onchange = function() {
        validasi_mulai5()
    };
    // validasi mulai
    function validasi_mulai5() {
        const mulai5 = new Date($('#mulai5').val());
        const selesai4 = new Date($('#selesai4').val());
        if (mulai5.getTime() < selesai4.getTime()) {
            $('#error-jadwal5').show();
            $("#erorr_jadwal_row5").css("background-color", "red");
            $("#erorr_jadwal_row5").css("color", "white");
        } else {
            $('#error-jadwal5').hide();
            $("#erorr_jadwal_row5").css("background-color", "transparent");
            $("#erorr_jadwal_row5").css("color", "black");
        }
    }

    // validasi selesai
    function validasi_selesai5() {
        const mulai5 = new Date($('#mulai5').val());
        const selesai5 = new Date($('#selesai5').val());
        if (mulai5.getTime() > selesai5.getTime()) {
            $('#error-jadwal5').show();
            $("#erorr_jadwal_row5").css("background-color", "red");
            $("#erorr_jadwal_row5").css("color", "white");
        } else {
            $('#error-jadwal5').hide();
            $("#erorr_jadwal_row5").css("background-color", "transparent");
            $("#erorr_jadwal_row5").css("color", "black");
        }
    }
</script>

<!-- row ke 6 -->
<!-- 5 -->
<!-- mulai6 -->
<!-- selesai6 -->
<!-- selesai5 -->
<script>
    $('#mulai6').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })

    $('#selesai6').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })
    document.getElementById("selesai6").onchange = function() {
        validasi_selesai6()
    };
    document.getElementById("mulai6").onchange = function() {
        validasi_mulai6()
    };
    // validasi mulai
    function validasi_mulai6() {
        const mulai6 = new Date($('#mulai6').val());
        const selesai5 = new Date($('#selesai5').val());
        if (mulai6.getTime() < selesai5.getTime()) {
            $('#error-jadwal6').show();
            $("#erorr_jadwal_row6").css("background-color", "red");
            $("#erorr_jadwal_row6").css("color", "white");
        } else {
            $('#error-jadwal6').hide();
            $("#erorr_jadwal_row6").css("background-color", "transparent");
            $("#erorr_jadwal_row6").css("color", "black");
        }
    }

    // validasi selesai
    function validasi_selesai6() {
        const mulai6 = new Date($('#mulai6').val());
        const selesai6 = new Date($('#selesai6').val());
        if (mulai6.getTime() > selesai6.getTime()) {
            $('#error-jadwal6').show();
            $("#erorr_jadwal_row6").css("background-color", "red");
            $("#erorr_jadwal_row6").css("color", "white");
        } else {
            $('#error-jadwal6').hide();
            $("#erorr_jadwal_row6").css("background-color", "transparent");
            $("#erorr_jadwal_row6").css("color", "black");
        }
    }
</script>


<!-- row ke 7 -->
<!-- 6 -->
<!-- mulai7 -->
<!-- selesai7 -->
<!-- selesai6 -->
<script>
    $('#mulai7').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })

    $('#selesai7').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })
    document.getElementById("selesai7").onchange = function() {
        validasi_selesai7()
    };
    document.getElementById("mulai7").onchange = function() {
        validasi_mulai7()
    };
    // validasi mulai
    function validasi_mulai7() {
        const mulai7 = new Date($('#mulai7').val());
        const selesai6 = new Date($('#selesai6').val());
        if (mulai7.getTime() < selesai6.getTime()) {
            $('#error-jadwal7').show();
            $("#erorr_jadwal_row7").css("background-color", "red");
            $("#erorr_jadwal_row7").css("color", "white");
        } else {
            $('#error-jadwal7').hide();
            $("#erorr_jadwal_row7").css("background-color", "transparent");
            $("#erorr_jadwal_row7").css("color", "black");
        }
    }

    // validasi selesai
    function validasi_selesai7() {
        const mulai7 = new Date($('#mulai7').val());
        const selesai7 = new Date($('#selesai7').val());
        if (mulai7.getTime() > selesai7.getTime()) {
            $('#error-jadwal7').show();
            $("#erorr_jadwal_row7").css("background-color", "red");
            $("#erorr_jadwal_row7").css("color", "white");
        } else {
            $('#error-jadwal7').hide();
            $("#erorr_jadwal_row7").css("background-color", "transparent");
            $("#erorr_jadwal_row7").css("color", "black");
        }
    }
</script>

<!-- row ke 8 -->
<!-- 7 -->
<!-- mulai8 -->
<!-- selesai8 -->
<!-- selesai7 -->
<script>
    $('#mulai8').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })

    $('#selesai8').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })
    document.getElementById("selesai8").onchange = function() {
        validasi_selesai8()
    };
    document.getElementById("mulai8").onchange = function() {
        validasi_mulai8()
    };
    // validasi mulai
    function validasi_mulai8() {
        const mulai8 = new Date($('#mulai8').val());
        const selesai7 = new Date($('#selesai7').val());
        if (mulai8.getTime() < selesai7.getTime()) {
            $('#error-jadwal8').show();
            $("#erorr_jadwal_row8").css("background-color", "red");
            $("#erorr_jadwal_row8").css("color", "white");
        } else {
            $('#error-jadwal8').hide();
            $("#erorr_jadwal_row8").css("background-color", "transparent");
            $("#erorr_jadwal_row8").css("color", "black");
        }
    }

    // validasi selesai
    function validasi_selesai8() {
        const mulai8 = new Date($('#mulai8').val());
        const selesai8 = new Date($('#selesai8').val());
        if (mulai8.getTime() > selesai8.getTime()) {
            $('#error-jadwal8').show();
            $("#erorr_jadwal_row8").css("background-color", "red");
            $("#erorr_jadwal_row8").css("color", "white");
        } else {
            $('#error-jadwal8').hide();
            $("#erorr_jadwal_row8").css("background-color", "transparent");
            $("#erorr_jadwal_row8").css("color", "black");
        }
    }
</script>

<!-- row ke 9 -->
<!-- 8 -->
<!-- mulai9 -->
<!-- selesai9 -->
<!-- selesai8 -->
<script>
    $('#mulai9').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })

    $('#selesai9').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })
    document.getElementById("selesai9").onchange = function() {
        validasi_selesai9()
    };
    document.getElementById("mulai9").onchange = function() {
        validasi_mulai9()
    };
    // validasi mulai
    function validasi_mulai9() {
        const mulai9 = new Date($('#mulai9').val());
        const selesai8 = new Date($('#selesai8').val());
        if (mulai9.getTime() < selesai8.getTime()) {
            $('#error-jadwal9').show();
            $("#erorr_jadwal_row9").css("background-color", "red");
            $("#erorr_jadwal_row9").css("color", "white");
        } else {
            $('#error-jadwal9').hide();
            $("#erorr_jadwal_row9").css("background-color", "transparent");
            $("#erorr_jadwal_row9").css("color", "black");
        }
    }

    // validasi selesai
    function validasi_selesai9() {
        const mulai9 = new Date($('#mulai9').val());
        const selesai9 = new Date($('#selesai9').val());
        if (mulai9.getTime() > selesai9.getTime()) {
            $('#error-jadwal9').show();
            $("#erorr_jadwal_row9").css("background-color", "red");
            $("#erorr_jadwal_row9").css("color", "white");
        } else {
            $('#error-jadwal9').hide();
            $("#erorr_jadwal_row9").css("background-color", "transparent");
            $("#erorr_jadwal_row9").css("color", "black");
        }
    }
</script>

<!-- row ke 10 -->
<!-- 9 -->
<!-- mulai10 -->
<!-- selesai10 -->
<!-- selesai9 -->
<script>
    $('#mulai10').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })

    $('#selesai10').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })
    document.getElementById("selesai10").onchange = function() {
        validasi_selesai10()
    };
    document.getElementById("mulai10").onchange = function() {
        validasi_mulai10()
    };
    // validasi mulai
    function validasi_mulai10() {
        const mulai10 = new Date($('#mulai10').val());
        const selesai9 = new Date($('#selesai9').val());
        if (mulai10.getTime() < selesai9.getTime()) {
            $('#error-jadwal10').show();
            $("#erorr_jadwal_row10").css("background-color", "red");
            $("#erorr_jadwal_row10").css("color", "white");
        } else {
            $('#error-jadwal10').hide();
            $("#erorr_jadwal_row10").css("background-color", "transparent");
            $("#erorr_jadwal_row10").css("color", "black");
        }
    }

    // validasi selesai
    function validasi_selesai10() {
        const mulai10 = new Date($('#mulai10').val());
        const selesai10 = new Date($('#selesai10').val());
        if (mulai10.getTime() > selesai10.getTime()) {
            $('#error-jadwal10').show();
            $("#erorr_jadwal_row10").css("background-color", "red");
            $("#erorr_jadwal_row10").css("color", "white");
        } else {
            $('#error-jadwal10').hide();
            $("#erorr_jadwal_row10").css("background-color", "transparent");
            $("#erorr_jadwal_row10").css("color", "black");
        }
    }
</script>


<!-- row ke 11 -->
<!-- 10 -->
<!-- mulai11 -->
<!-- selesai11 -->
<!-- selesai10 -->
<script>
    $('#mulai11').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })

    $('#selesai11').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })
    document.getElementById("selesai11").onchange = function() {
        validasi_selesai11()
    };
    document.getElementById("mulai11").onchange = function() {
        validasi_mulai11()
    };
    // validasi mulai
    function validasi_mulai11() {
        const mulai11 = new Date($('#mulai11').val());
        const selesai10 = new Date($('#selesai10').val());
        if (mulai11.getTime() < selesai10.getTime()) {
            $('#error-jadwal11').show();
            $("#erorr_jadwal_row11").css("background-color", "red");
            $("#erorr_jadwal_row11").css("color", "white");
        } else {
            $('#error-jadwal11').hide();
            $("#erorr_jadwal_row11").css("background-color", "transparent");
            $("#erorr_jadwal_row11").css("color", "black");
        }
    }

    // validasi selesai
    function validasi_selesai11() {
        const mulai11 = new Date($('#mulai11').val());
        const selesai11 = new Date($('#selesai11').val());
        if (mulai11.getTime() > selesai11.getTime()) {
            $('#error-jadwal11').show();
            $("#erorr_jadwal_row11").css("background-color", "red");
            $("#erorr_jadwal_row11").css("color", "white");
        } else {
            $('#error-jadwal11').hide();
            $("#erorr_jadwal_row11").css("background-color", "transparent");
            $("#erorr_jadwal_row11").css("color", "black");
        }
    }
</script>

<!-- row ke 12 -->
<!-- 11 -->
<!-- mulai12 -->
<!-- selesai12 -->
<!-- selesai11 -->
<script>
    $('#mulai12').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })

    $('#selesai12').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })
    document.getElementById("selesai12").onchange = function() {
        validasi_selesai12()
    };
    document.getElementById("mulai12").onchange = function() {
        validasi_mulai12()
    };
    // validasi mulai
    function validasi_mulai12() {
        const mulai12 = new Date($('#mulai12').val());
        const selesai11 = new Date($('#selesai11').val());
        if (mulai12.getTime() < selesai11.getTime()) {
            $('#error-jadwal12').show();
            $("#erorr_jadwal_row12").css("background-color", "red");
            $("#erorr_jadwal_row12").css("color", "white");
        } else {
            $('#error-jadwal12').hide();
            $("#erorr_jadwal_row12").css("background-color", "transparent");
            $("#erorr_jadwal_row12").css("color", "black");
        }
    }

    // validasi selesai
    function validasi_selesai12() {
        const mulai12 = new Date($('#mulai12').val());
        const selesai12 = new Date($('#selesai12').val());
        if (mulai12.getTime() > selesai12.getTime()) {
            $('#error-jadwal12').show();
            $("#erorr_jadwal_row12").css("background-color", "red");
            $("#erorr_jadwal_row12").css("color", "white");
        } else {
            $('#error-jadwal12').hide();
            $("#erorr_jadwal_row12").css("background-color", "transparent");
            $("#erorr_jadwal_row12").css("color", "black");
        }
    }
</script>

<!-- row ke 13 -->
<!-- 12 -->
<!-- mulai13 -->
<!-- selesai13 -->
<!-- selesai12 -->
<script>
    $('#mulai13').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })

    $('#selesai13').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })
    document.getElementById("selesai13").onchange = function() {
        validasi_selesai13()
    };
    document.getElementById("mulai13").onchange = function() {
        validasi_mulai13()
    };
    // validasi mulai
    function validasi_mulai13() {
        const mulai13 = new Date($('#mulai13').val());
        const selesai12 = new Date($('#selesai12').val());
        if (mulai13.getTime() < selesai12.getTime()) {
            $('#error-jadwal13').show();
            $("#erorr_jadwal_row13").css("background-color", "red");
            $("#erorr_jadwal_row13").css("color", "white");
        } else {
            $('#error-jadwal13').hide();
            $("#erorr_jadwal_row13").css("background-color", "transparent");
            $("#erorr_jadwal_row13").css("color", "black");
        }
    }

    // validasi selesai
    function validasi_selesai13() {
        const mulai13 = new Date($('#mulai13').val());
        const selesai13 = new Date($('#selesai13').val());
        if (mulai13.getTime() > selesai13.getTime()) {
            $('#error-jadwal13').show();
            $("#erorr_jadwal_row13").css("background-color", "red");
            $("#erorr_jadwal_row13").css("color", "white");
        } else {
            $('#error-jadwal13').hide();
            $("#erorr_jadwal_row13").css("background-color", "transparent");
            $("#erorr_jadwal_row13").css("color", "black");
        }
    }
</script>

<!-- row ke 14 -->
<!-- 13 -->
<!-- mulai14 -->
<!-- selesai14 -->
<!-- selesai13 -->
<script>
    $('#mulai14').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })

    $('#selesai14').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })
    document.getElementById("selesai14").onchange = function() {
        validasi_selesai14()
    };
    document.getElementById("mulai14").onchange = function() {
        validasi_mulai14()
    };
    // validasi mulai
    function validasi_mulai14() {
        const mulai14 = new Date($('#mulai14').val());
        const selesai13 = new Date($('#selesai13').val());
        if (mulai14.getTime() < selesai13.getTime()) {
            $('#error-jadwal14').show();
            $("#erorr_jadwal_row14").css("background-color", "red");
            $("#erorr_jadwal_row14").css("color", "white");
        } else {
            $('#error-jadwal14').hide();
            $("#erorr_jadwal_row14").css("background-color", "transparent");
            $("#erorr_jadwal_row14").css("color", "black");
        }
    }

    // validasi selesai
    function validasi_selesai14() {
        const mulai14 = new Date($('#mulai14').val());
        const selesai14 = new Date($('#selesai14').val());
        if (mulai14.getTime() > selesai14.getTime()) {
            $('#error-jadwal14').show();
            $("#erorr_jadwal_row14").css("background-color", "red");
            $("#erorr_jadwal_row14").css("color", "white");
        } else {
            $('#error-jadwal14').hide();
            $("#erorr_jadwal_row14").css("background-color", "transparent");
            $("#erorr_jadwal_row14").css("color", "black");
        }
    }
</script>

<!-- row ke 15 -->
<!-- 14 -->
<!-- mulai15 -->
<!-- selesai15 -->
<!-- selesai14 -->
<script>
    $('#mulai15').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })

    $('#selesai15').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })
    document.getElementById("selesai15").onchange = function() {
        validasi_selesai15()
    };
    document.getElementById("mulai15").onchange = function() {
        validasi_mulai15()
    };
    // validasi mulai
    function validasi_mulai15() {
        const mulai15 = new Date($('#mulai15').val());
        const selesai14 = new Date($('#selesai14').val());
        if (mulai15.getTime() < selesai14.getTime()) {
            $('#error-jadwal15').show();
            $("#erorr_jadwal_row15").css("background-color", "red");
            $("#erorr_jadwal_row15").css("color", "white");
        } else {
            $('#error-jadwal15').hide();
            $("#erorr_jadwal_row15").css("background-color", "transparent");
            $("#erorr_jadwal_row15").css("color", "black");
        }
    }

    // validasi selesai
    function validasi_selesai15() {
        const mulai15 = new Date($('#mulai15').val());
        const selesai15 = new Date($('#selesai15').val());
        if (mulai15.getTime() > selesai15.getTime()) {
            $('#error-jadwal15').show();
            $("#erorr_jadwal_row15").css("background-color", "red");
            $("#erorr_jadwal_row15").css("color", "white");
        } else {
            $('#error-jadwal15').hide();
            $("#erorr_jadwal_row15").css("background-color", "transparent");
            $("#erorr_jadwal_row15").css("color", "black");
        }
    }
</script>

<!-- row ke 16 -->
<!-- 15 -->
<!-- mulai16 -->
<!-- selesai16 -->
<!-- selesai15 -->
<script>
    $('#mulai16').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })

    $('#selesai16').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })
    document.getElementById("selesai16").onchange = function() {
        validasi_selesai16()
    };
    document.getElementById("mulai16").onchange = function() {
        validasi_mulai16()
    };
    // validasi mulai
    function validasi_mulai16() {
        const mulai16 = new Date($('#mulai16').val());
        const selesai15 = new Date($('#selesai15').val());
        if (mulai16.getTime() < selesai15.getTime()) {
            $('#error-jadwal16').show();
            $("#erorr_jadwal_row16").css("background-color", "red");
            $("#erorr_jadwal_row16").css("color", "white");
        } else {
            $('#error-jadwal16').hide();
            $("#erorr_jadwal_row16").css("background-color", "transparent");
            $("#erorr_jadwal_row16").css("color", "black");
        }
    }

    // validasi selesai
    function validasi_selesai16() {
        const mulai16 = new Date($('#mulai16').val());
        const selesai16 = new Date($('#selesai16').val());
        if (mulai16.getTime() > selesai16.getTime()) {
            $('#error-jadwal16').show();
            $("#erorr_jadwal_row16").css("background-color", "red");
            $("#erorr_jadwal_row16").css("color", "white");
        } else {
            $('#error-jadwal16').hide();
            $("#erorr_jadwal_row16").css("background-color", "transparent");
            $("#erorr_jadwal_row16").css("color", "black");
        }
    }
</script>

<!-- row ke 17 -->
<!-- 16 -->
<!-- mulai17 -->
<!-- selesai17 -->
<!-- selesai16 -->
<script>
    $('#mulai17').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })

    $('#selesai17').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })
    document.getElementById("selesai17").onchange = function() {
        validasi_selesai17()
    };
    document.getElementById("mulai17").onchange = function() {
        validasi_mulai17()
    };
    // validasi mulai
    function validasi_mulai17() {
        const mulai17 = new Date($('#mulai17').val());
        const selesai16 = new Date($('#selesai16').val());
        if (mulai17.getTime() < selesai16.getTime()) {
            $('#error-jadwal17').show();
            $("#erorr_jadwal_row17").css("background-color", "red");
            $("#erorr_jadwal_row17").css("color", "white");
        } else {
            $('#error-jadwal17').hide();
            $("#erorr_jadwal_row17").css("background-color", "transparent");
            $("#erorr_jadwal_row17").css("color", "black");
        }
    }

    // validasi selesai
    function validasi_selesai17() {
        const mulai17 = new Date($('#mulai17').val());
        const selesai17 = new Date($('#selesai17').val());
        if (mulai17.getTime() > selesai17.getTime()) {
            $('#error-jadwal17').show();
            $("#erorr_jadwal_row17").css("background-color", "red");
            $("#erorr_jadwal_row17").css("color", "white");
        } else {
            $('#error-jadwal17').hide();
            $("#erorr_jadwal_row17").css("background-color", "transparent");
            $("#erorr_jadwal_row17").css("color", "black");
        }
    }
</script>

<!-- row ke 18 -->
<!-- 17 -->
<!-- mulai18 -->
<!-- selesai18 -->
<!-- selesai17 -->
<script>
    $('#mulai18').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })

    $('#selesai18').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })
    document.getElementById("selesai18").onchange = function() {
        validasi_selesai18()
    };
    document.getElementById("mulai18").onchange = function() {
        validasi_mulai18()
    };

    // validasi mulai
    function validasi_mulai18() {
        const mulai18 = new Date($('#mulai18').val());
        const selesai17 = new Date($('#selesai17').val());
        if (mulai18.getTime() < selesai17.getTime()) {
            $('#error-jadwal18').show();
            $("#erorr_jadwal_row18").css("background-color", "red");
            $("#erorr_jadwal_row18").css("color", "white");
        } else {
            $('#error-jadwal18').hide();
            $("#erorr_jadwal_row18").css("background-color", "transparent");
            $("#erorr_jadwal_row18").css("color", "black");
        }
    }

    // validasi selesai
    function validasi_selesai18() {
        const mulai18 = new Date($('#mulai18').val());
        const selesai18 = new Date($('#selesai18').val());
        if (mulai18.getTime() > selesai18.getTime()) {
            $('#error-jadwal18').show();
            $("#erorr_jadwal_row18").css("background-color", "red");
            $("#erorr_jadwal_row18").css("color", "white");
        } else {
            $('#error-jadwal18').hide();
            $("#erorr_jadwal_row18").css("background-color", "transparent");
            $("#erorr_jadwal_row18").css("color", "black");
        }
    }
</script>

<!-- row ke 19 -->
<!-- 18 -->
<!-- mulai19 -->
<!-- selesai19 -->
<!-- selesai18 -->
<script>
    $('#mulai19').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })

    $('#selesai19').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })
    document.getElementById("selesai19").onchange = function() {
        validasi_selesai19()
    };
    document.getElementById("mulai19").onchange = function() {
        validasi_mulai19()
    };

    // validasi mulai
    function validasi_mulai19() {
        const mulai19 = new Date($('#mulai19').val());
        const selesai18 = new Date($('#selesai18').val());
        if (mulai19.getTime() < selesai18.getTime()) {
            $('#error-jadwal19').show();
            $("#erorr_jadwal_row19").css("background-color", "red");
            $("#erorr_jadwal_row19").css("color", "white");
        } else {
            $('#error-jadwal19').hide();
            $("#erorr_jadwal_row19").css("background-color", "transparent");
            $("#erorr_jadwal_row19").css("color", "black");
        }
    }

    // validasi selesai
    function validasi_selesai19() {
        const mulai19 = new Date($('#mulai19').val());
        const selesai19 = new Date($('#selesai19').val());
        if (mulai19.getTime() > selesai19.getTime()) {
            $('#error-jadwal19').show();
            $("#erorr_jadwal_row19").css("background-color", "red");
            $("#erorr_jadwal_row19").css("color", "white");
        } else {
            $('#error-jadwal19').hide();
            $("#erorr_jadwal_row19").css("background-color", "transparent");
            $("#erorr_jadwal_row19").css("color", "black");
        }
    }
</script>

<!-- row ke 20 -->
<!-- 19 -->
<!-- mulai20 -->
<!-- selesai20 -->
<!-- selesai19 -->
<script>
    $('#mulai20').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })

    $('#selesai20').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })
    document.getElementById("selesai20").onchange = function() {
        validasi_selesai20()
    };
    document.getElementById("mulai20").onchange = function() {
        validasi_mulai20()
    };

    // validasi mulai
    function validasi_mulai20() {
        const mulai20 = new Date($('#mulai20').val());
        const selesai19 = new Date($('#selesai19').val());
        if (mulai20.getTime() < selesai19.getTime()) {
            $('#error-jadwal20').show();
            $("#erorr_jadwal_row20").css("background-color", "red");
            $("#erorr_jadwal_row20").css("color", "white");
        } else {
            $('#error-jadwal20').hide();
            $("#erorr_jadwal_row20").css("background-color", "transparent");
            $("#erorr_jadwal_row20").css("color", "black");
        }
    }

    // validasi selesai
    function validasi_selesai20() {
        const mulai20 = new Date($('#mulai20').val());
        const selesai20 = new Date($('#selesai20').val());
        if (mulai20.getTime() > selesai20.getTime()) {
            $('#error-jadwal20').show();
            $("#erorr_jadwal_row20").css("background-color", "red");
            $("#erorr_jadwal_row20").css("color", "white");
        } else {
            $('#error-jadwal20').hide();
            $("#erorr_jadwal_row20").css("background-color", "transparent");
            $("#erorr_jadwal_row20").css("color", "black");
        }
    }
</script>

<!-- row ke 21 -->
<!-- 20 -->
<!-- mulai21 -->
<!-- selesai21 -->
<!-- selesai20 -->
<script>
    $('#mulai21').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })

    $('#selesai21').datetimepicker({
        timepicker: true,
        datetimepicker: true,
        format: 'Y-m-d H:i',
    })
    document.getElementById("selesai21").onchange = function() {
        validasi_selesai21()
    };
    document.getElementById("mulai21").onchange = function() {
        validasi_mulai21()
    };

    // validasi mulai
    function validasi_mulai21() {
        const mulai21 = new Date($('#mulai21').val());
        const selesai20 = new Date($('#selesai20').val());
        if (mulai21.getTime() < selesai20.getTime()) {
            $('#error-jadwal21').show();
            $("#erorr_jadwal_row21").css("background-color", "red");
            $("#erorr_jadwal_row21").css("color", "white");
        } else {
            $('#error-jadwal21').hide();
            $("#erorr_jadwal_row21").css("background-color", "transparent");
            $("#erorr_jadwal_row21").css("color", "black");
        }
    }

    // validasi selesai
    function validasi_selesai21() {
        const mulai21 = new Date($('#mulai21').val());
        const selesai21 = new Date($('#selesai21').val());
        if (mulai21.getTime() > selesai21.getTime()) {
            $('#error-jadwal21').show();
            $("#erorr_jadwal_row21").css("background-color", "red");
            $("#erorr_jadwal_row21").css("color", "white");
        } else {
            $('#error-jadwal21').hide();
            $("#erorr_jadwal_row21").css("background-color", "transparent");
            $("#erorr_jadwal_row21").css("color", "black");
        }
    }
</script>

<script>
    live_jadwal()

    function live_jadwal() {
        const mulai1 = new Date($('#mulai1').val());
        const selesai1 = new Date($('#selesai1').val());

        const mulai2 = new Date($('#mulai2').val());
        const selesai2 = new Date($('#selesai2').val());

        const mulai3 = new Date($('#mulai3').val());
        const selesai3 = new Date($('#selesai3').val());

        const mulai4 = new Date($('#mulai4').val());
        const selesai4 = new Date($('#selesai4').val());

        const mulai5 = new Date($('#mulai5').val());
        const selesai5 = new Date($('#selesai5').val());

        const mulai6 = new Date($('#mulai6').val());
        const selesai6 = new Date($('#selesai6').val());

        const mulai7 = new Date($('#mulai7').val());
        const selesai7 = new Date($('#selesai7').val());

        const mulai8 = new Date($('#mulai8').val());
        const selesai8 = new Date($('#selesai8').val());
        // 9
        const mulai9 = new Date($('#mulai9').val());
        const selesai9 = new Date($('#selesai9').val());
        // 10
        const mulai10 = new Date($('#mulai10').val());
        const selesai10 = new Date($('#selesai10').val());
        // 11
        const mulai11 = new Date($('#mulai11').val());
        const selesai11 = new Date($('#selesai11').val());
        // 12
        const mulai12 = new Date($('#mulai12').val());
        const selesai12 = new Date($('#selesai12').val());
        // 13
        const mulai13 = new Date($('#mulai13').val());
        const selesai13 = new Date($('#selesai13').val());
        // 14
        const mulai14 = new Date($('#mulai14').val());
        const selesai14 = new Date($('#selesai14').val());
        // 15
        const mulai15 = new Date($('#mulai15').val());
        const selesai15 = new Date($('#selesai15').val());
        // 16
        const mulai16 = new Date($('#mulai16').val());
        const selesai16 = new Date($('#selesai16').val());
        // 17
        const mulai17 = new Date($('#mulai17').val());
        const selesai17 = new Date($('#selesai17').val());
        // 18
        const mulai18 = new Date($('#mulai18').val());
        const selesai18 = new Date($('#selesai18').val());
        // 19
        const mulai19 = new Date($('#mulai19').val());
        const selesai19 = new Date($('#selesai19').val());
        // 20
        const mulai20 = new Date($('#mulai20').val());
        const selesai20 = new Date($('#selesai20').val());
        // 21
        const mulai21 = new Date($('#mulai21').val());
        const selesai21 = new Date($('#selesai21').val());
        // 22
        const mulai22 = new Date($('#mulai22').val());
        const selesai22 = new Date($('#selesai22').val());
        // if (selesai2.getTime() < mulai2.getTime()) {
        //     $('#error-jadwal2').show();
        //     $("#erorr_jadwal_row2").css("background-color", "red");
        //     $("#erorr_jadwal_row2").css("color", "white");
        //     $('.btnSave').attr('disabled', 'disabled');
        // } else if (mulai2.getTime() < selesai1.getTime()) {
        //     $('#error-jadwal2').show();
        //     $("#erorr_jadwal_row2").css("background-color", "red");
        //     $("#erorr_jadwal_row2").css("color", "white");
        //     $('.btnSave').attr('disabled', 'disabled');
        // } else if (selesai3.getTime() < mulai3.getTime()) {
        //     $('#error-jadwal3').show();
        //     $("#erorr_jadwal_row3").css("background-color", "red");
        //     $("#erorr_jadwal_row3").css("color", "white");
        //     $('.btnSave').attr('disabled', 'disabled');
        // } else if (mulai3.getTime() < selesai2.getTime()) {
        //     $('#error-jadwal3').show();
        //     $("#erorr_jadwal_row3").css("background-color", "red");
        //     $("#erorr_jadwal_row3").css("color", "white");
        //     $('.btnSave').attr('disabled', 'disabled');
        // } else
        if (selesai4.getTime() < mulai4.getTime()) {
            $('#error-jadwal4').show();
            $("#erorr_jadwal_row4").css("background-color", "red");
            $("#erorr_jadwal_row4").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
        } else if (mulai4.getTime() < selesai3.getTime()) {
            $('#error-jadwal4').show();
            $("#erorr_jadwal_row4").css("background-color", "red");
            $("#erorr_jadwal_row4").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
        } else if (selesai5.getTime() < mulai5.getTime()) {
            $('#error-jadwal5').show();
            $("#erorr_jadwal_row5").css("background-color", "red");
            $("#erorr_jadwal_row5").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
        } else if (mulai5.getTime() < selesai4.getTime()) {
            $('#error-jadwal5').show();
            $("#erorr_jadwal_row5").css("background-color", "red");
            $("#erorr_jadwal_row5").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
        } else if (selesai6.getTime() < mulai6.getTime()) {
            $('#error-jadwal6').show();
            $("#erorr_jadwal_row6").css("background-color", "red");
            $("#erorr_jadwal_row6").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
        } else if (mulai6.getTime() < selesai5.getTime()) {
            $('#error-jadwal6').show();
            $("#erorr_jadwal_row6").css("background-color", "red");
            $("#erorr_jadwal_row6").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
        } else if (selesai7.getTime() < mulai7.getTime()) {
            $('#error-jadwal7').show();
            $("#erorr_jadwal_row7").css("background-color", "red");
            $("#erorr_jadwal_row7").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
        } else if (mulai7.getTime() < selesai6.getTime()) {
            $('#error-jadwal7').show();
            $("#erorr_jadwal_row7").css("background-color", "red");
            $("#erorr_jadwal_row7").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
        } else if (selesai8.getTime() < mulai8.getTime()) {
            $('#error-jadwal8').show();
            $("#erorr_jadwal_row8").css("background-color", "red");
            $("#erorr_jadwal_row8").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
        } else if (mulai8.getTime() < selesai7.getTime()) {
            $('#error-jadwal8').show();
            $("#erorr_jadwal_row8").css("background-color", "red");
            $("#erorr_jadwal_row8").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
            // 9
            // 8
        } else if (selesai9.getTime() < mulai9.getTime()) {
            $('#error-jadwal9').show();
            $("#erorr_jadwal_row9").css("background-color", "red");
            $("#erorr_jadwal_row9").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
        } else if (mulai9.getTime() < selesai8.getTime()) {
            $('#error-jadwal9').show();
            $("#erorr_jadwal_row9").css("background-color", "red");
            $("#erorr_jadwal_row9").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
            // 10
            // 9
        } else if (selesai10.getTime() < mulai10.getTime()) {
            $('#error-jadwal10').show();
            $("#erorr_jadwal_row10").css("background-color", "red");
            $("#erorr_jadwal_row10").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
        } else if (mulai10.getTime() < selesai9.getTime()) {
            $('#error-jadwal10').show();
            $("#erorr_jadwal_row10").css("background-color", "red");
            $("#erorr_jadwal_row10").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
            // 11
            // 10
        } else if (selesai11.getTime() < mulai11.getTime()) {
            $('#error-jadwal11').show();
            $("#erorr_jadwal_row11").css("background-color", "red");
            $("#erorr_jadwal_row11").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
        } else if (mulai11.getTime() < selesai10.getTime()) {
            $('#error-jadwal11').show();
            $("#erorr_jadwal_row11").css("background-color", "red");
            $("#erorr_jadwal_row11").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
            // 12
            // 11
        } else if (selesai12.getTime() < mulai12.getTime()) {
            $('#error-jadwal12').show();
            $("#erorr_jadwal_row12").css("background-color", "red");
            $("#erorr_jadwal_row12").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
        } else if (mulai12.getTime() < selesai11.getTime()) {
            $('#error-jadwal12').show();
            $("#erorr_jadwal_row12").css("background-color", "red");
            $("#erorr_jadwal_row12").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
            // 13
            // 12
        } else if (selesai13.getTime() < mulai13.getTime()) {
            $('#error-jadwal13').show();
            $("#erorr_jadwal_row13").css("background-color", "red");
            $("#erorr_jadwal_row13").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
        } else if (mulai13.getTime() < selesai12.getTime()) {
            $('#error-jadwal13').show();
            $("#erorr_jadwal_row13").css("background-color", "red");
            $("#erorr_jadwal_row13").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
            // 14
            // 13
        } else if (selesai14.getTime() < mulai14.getTime()) {
            $('#error-jadwal14').show();
            $("#erorr_jadwal_row14").css("background-color", "red");
            $("#erorr_jadwal_row14").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
        } else if (mulai14.getTime() < selesai13.getTime()) {
            $('#error-jadwal14').show();
            $("#erorr_jadwal_row14").css("background-color", "red");
            $("#erorr_jadwal_row14").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
            // 15
            // 14
        } else if (selesai15.getTime() < mulai15.getTime()) {
            $('#error-jadwal15').show();
            $("#erorr_jadwal_row15").css("background-color", "red");
            $("#erorr_jadwal_row15").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
        } else if (mulai15.getTime() < selesai14.getTime()) {
            $('#error-jadwal15').show();
            $("#erorr_jadwal_row15").css("background-color", "red");
            $("#erorr_jadwal_row15").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
            // 16
            // 15
        } else if (selesai16.getTime() < mulai16.getTime()) {
            $('#error-jadwal16').show();
            $("#erorr_jadwal_row16").css("background-color", "red");
            $("#erorr_jadwal_row16").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
        } else if (mulai16.getTime() < selesai15.getTime()) {
            $('#error-jadwal16').show();
            $("#erorr_jadwal_row16").css("background-color", "red");
            $("#erorr_jadwal_row16").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
            // 17
            // 16
        } else if (selesai17.getTime() < mulai17.getTime()) {
            $('#error-jadwal17').show();
            $("#erorr_jadwal_row17").css("background-color", "red");
            $("#erorr_jadwal_row17").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
        } else if (mulai17.getTime() < selesai16.getTime()) {
            $('#error-jadwal17').show();
            $("#erorr_jadwal_row17").css("background-color", "red");
            $("#erorr_jadwal_row17").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
            // 18
            // 17
        } else if (selesai18.getTime() < mulai18.getTime()) {
            $('#error-jadwal18').show();
            $("#erorr_jadwal_row18").css("background-color", "red");
            $("#erorr_jadwal_row18").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
        } else if (mulai18.getTime() < selesai17.getTime()) {
            $('#error-jadwal18').show();
            $("#erorr_jadwal_row18").css("background-color", "red");
            $("#erorr_jadwal_row18").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
            // 19
            // 18
        } else if (selesai19.getTime() < mulai19.getTime()) {
            $('#error-jadwal19').show();
            $("#erorr_jadwal_row19").css("background-color", "red");
            $("#erorr_jadwal_row19").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');

        } else if (mulai19.getTime() < selesai18.getTime()) {
            $('#error-jadwal19').show();
            $("#erorr_jadwal_row19").css("background-color", "red");
            $("#erorr_jadwal_row19").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
            // 20
            // 19
        } else if (selesai20.getTime() < mulai20.getTime()) {
            $('#error-jadwal20').show();
            $("#erorr_jadwal_row20").css("background-color", "red");
            $("#erorr_jadwal_row20").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
        } else if (mulai20.getTime() < selesai19.getTime()) {
            $('#error-jadwal20').show();
            $("#erorr_jadwal_row20").css("background-color", "red");
            $("#erorr_jadwal_row20").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
            // 21
            // 20
        } else if (selesai21.getTime() < mulai21.getTime()) {
            $('#error-jadwal21').show();
            $("#erorr_jadwal_row21").css("background-color", "red");
            $("#erorr_jadwal_row21").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
        } else if (mulai21.getTime() < selesai20.getTime()) {
            $('#error-jadwal21').show();
            $("#erorr_jadwal_row21").css("background-color", "red");
            $("#erorr_jadwal_row21").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
            // 22
            // 21
        } else if (selesai22.getTime() < mulai22.getTime()) {
            $('#error-jadwal22').show();
            $("#erorr_jadwal_row22").css("background-color", "red");
            $("#erorr_jadwal_row22").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
        } else if (mulai22.getTime() < selesai21.getTime()) {
            $('#error-jadwal22').show();
            $("#erorr_jadwal_row22").css("background-color", "red");
            $("#erorr_jadwal_row22").css("color", "white");
            $('.btnSave').attr('disabled', 'disabled');
        } else {
            $('.btnSave').attr('disabled', false);
        }
    }
    setInterval(() => {
        live_jadwal()
    }, 1000);
</script>


<script>
    var id_url_rup = $('#id_url_rup').val();
    var form_jadwal_tender_terbatas = $('#form_jadwal_tender_terbatas');
    form_jadwal_tender_terbatas.on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '<?= base_url('post_jadwal/post_jadwal/update_jadwal_22_tender_terbatas/') ?>' + id_url_rup,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('.btnSave').attr('disabled', 'disabled');
            },
            success: function(response) {
                if (response == 'success') {
                     update_batas_tender()
                    Swal.fire('Jadwal Berhasil Di Update!', '', 'success')
                    form_jadwal_tender_terbatas[0].reset();
                    $('.btnSave').attr('disabled', false);
                    setTimeout(() => {
                        window.location.href = ''
                    }, "1500");
                    update_batas_tender()
                }
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#table_jadwal').DataTable({
            "searching": false,
            "paging": false,
            "info": false,
            "ordering": false,
            fixedHeader: {
                header: true,
            },
        });
    });

    var tableOffset = $("#table_jadwal").offset().top;
    var $header = $("#table_jadwal > thead").clone();
    var $fixedHeader = $("#header-fixed").append($header);

    $(window).bind("scroll", function() {
        var offset = $(this).scrollTop();

        if (offset >= tableOffset && $fixedHeader.is(":hidden")) {
            $fixedHeader.show();
        } else if (offset < tableOffset) {
            $fixedHeader.hide();
        }
    });

    function plus_jadwal_22_baris(id_jadwal_rup) {
        var id_rup_global = $('[name="id_rup_global"]').val()
        $.ajax({
            type: "POST",
            url: '<?= base_url('post_jadwal/post_jadwal/genrate_jadwal_22_baris_plus/') ?>' + id_rup_global,
            data: {
                id_jadwal_rup: id_jadwal_rup
            },
            dataType: "JSON",
            success: function(response) {
                 update_batas_tender()
                Swal.fire('Jadwal Berhasil Di Update!', '', 'success')
                update_batas_tender()
                window.location.href = '';
            }
        });
    }

    function min_jadwal_22_baris(id_jadwal_rup) {
        var id_rup_global = $('[name="id_rup_global"]').val()
        $.ajax({
            type: "POST",
            url: '<?= base_url('post_jadwal/post_jadwal/genrate_jadwal_22_baris_min/') ?>' + id_rup_global,
            data: {
                id_jadwal_rup: id_jadwal_rup
            },
            dataType: "JSON",
            success: function(response) {
                 update_batas_tender()
                Swal.fire('Jadwal Berhasil Di Update!', '', 'success')
                window.location.href = '';
            }
        });
    }


    function edit_jadwal(id_jadwal_rup) {

        var id_rup_global = $('[name="id_rup_global"]').val()
        $('#modal_ubah_jadwal').modal('show')
        $('[name="id_jadwal_rup"]').val(id_jadwal_rup)
        $('[name="id_rup"]').val(id_rup_global)
    }

    function acc_jadwal(id_jadwal_rup) {
        var id_rup_global = $('[name="id_rup_global"]').val()
        $('#modal_acc_jadwal').modal('show')
        $('[name="id_jadwal_rup"]').val(id_jadwal_rup)
        $('[name="id_rup"]').val(id_rup_global)

        $.ajax({
            type: "GET",
            url: '<?= base_url('post_jadwal/post_jadwal/get_row_jadwal/') ?>' + id_jadwal_rup,
            dataType: "JSON",
            success: function(response) {
                $('[name="alasan_ubah"]').val(response.alasan)
            }
        });
    }

    var form_ubah_jadwal = $('#form_ubah_jadwal')
    form_ubah_jadwal.on('submit', function(e) {
        var url_ubah_jadwal = $('[name="url_ubah_jadwal"]').val()
        $.ajax({
            url: url_ubah_jadwal,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('.btn_save_jadwal').attr("disabled", true);
            },
            success: function(response) {
                if (response['error']) {
                    $("#alasan").html(response['error']['alasan']);
                } else {
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
                             update_batas_tender()
                            Swal.fire('Data Berhasil Di Simpan!', '', 'success')
                            form_ubah_jadwal[0].reset();
                            $('.btn_save_jadwal').attr("disabled", false)
                            $('#modal_ubah_jadwal').modal('hide');

                            setTimeout(() => {
                                window.location.href = ''
                            }, "1500");
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

    var form_acc_jadwal = $('#form_acc_jadwal')
    form_acc_jadwal.on('submit', function(e) {
        var url_acc_jadwal = $('[name="url_acc_jadwal"]').val()
        $.ajax({
            url: url_acc_jadwal,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                if (response['error']) {
                     update_batas_tender()
                    Swal.fire('Maaf Jadwal Udah Ada Yang Acc Nih!', '', 'warning')
                    // $("#alasan").html(response['error']['alasan']);
                } else {
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
                             update_batas_tender()
                            Swal.fire('Data Berhasil Di Simpan!', '', 'success')
                            form_acc_jadwal[0].reset();
                            $('#modal_acc_jadwal').modal('hide');

                            setTimeout(() => {
                                window.location.href = ''
                            }, "1500");
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

    function update_batas_tender() {
        var id_rup_global = $('[name="id_rup_global"]').val()
        $.ajax({
            type: "POST",
            url: '<?= base_url('post_jadwal/post_jadwal/batas_akhir_pendaftaran/') ?>' + id_rup_global,
            dataType: "JSON",
            success: function(response) {}
        });
    }
</script>