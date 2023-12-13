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