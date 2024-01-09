<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
     $(document).ready(function() {
        $('#tbl_total_tender').DataTable({
            "responsive": false,
            "ordering": true,
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            // "dom": 'Bfrtip',
            // "buttons": ["excel", "pdf", "print", "colvis"],
            "order": [],
            "ajax": {
                "url": '<?= base_url('administrator/laporan_total/datatable_total') ?>',
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
</script>
<script>
	$(document).ready(function() {
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'doughnut',
			data: {
				labels: ["Barang", "Jasa Pemborongan", "Jasa Konsultansi", "Jasa Lain"],
				datasets: [{
					label: '# of Votes',
					data: [<?= $total_barang_semua_paket ?>, <?= $total_pemborongan_semua_paket ?>, <?= $total_konsultansi_semua_paket ?>, <?= $total_lain_semua_paket ?>],
					backgroundColor: [
						'rgba(54, 162, 235, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)'
					],
					hoverOffset: 4
				}]
			},
		});
	});
</script>

<script>
	$(document).ready(function() {
		var ctx = document.getElementById("myChart2").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'polarArea',
			data: {
				labels: ["Barang", "Jasa Pemborongan", "Jasa Konsultansi", "Jasa Lain"],
				datasets: [{
					label: '# of Votes',
					data: [<?= $total_barang_semua_paket ?>, <?= $total_pemborongan_semua_paket ?>, <?= $total_konsultansi_semua_paket ?>, <?= $total_lain_semua_paket ?>],
					backgroundColor: [
						'rgba(54, 162, 235, 0.5)',
						'rgba(75, 192, 192, 0.5)',
						'rgba(153, 102, 255, 0.5)',
						'rgba(255, 159, 64, 0.5)'
					],
					hoverOffset: 4
				}]
			},
		});
	});
</script>

<script>
	$(document).ready(function() {
		var ctx = document.getElementById("myChart3").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: ["Barang", "Jasa Pemborongan", "Jasa Konsultansi", "Jasa Lain"],
				datasets: [{
					data: [<?= $total_barang_semua_paket ?>, <?= $total_pemborongan_semua_paket ?>, <?= $total_konsultansi_semua_paket ?>, <?= $total_lain_semua_paket ?>],
					backgroundColor: [
						'rgba(54, 162, 235, 0.5)',
						'rgba(75, 192, 192, 0.5)',
						'rgba(153, 102, 255, 0.5)',
						'rgba(255, 159, 64, 0.5)'
					],
					hoverOffset: 4
				}]
			},
		});
	});
</script>

<script>
	$(document).ready(function() {
		var ctx2 = document.getElementById("myChart4").getContext('2d');
		var myChart2 = new Chart(ctx2, {
			type: 'bar',
			data: {
				labels: ["Barang", "Jasa Pemborongan", "Jasa Konsultansi", "Jasa Lain"],
				datasets: [{
					label: '# of Votes',
					data: [<?= $total_barang_semua_paket ?>, <?= $total_pemborongan_semua_paket ?>, <?= $total_konsultansi_semua_paket ?>, <?= $total_lain_semua_paket ?>],
					backgroundColor: [
						'rgba(54, 162, 235, 0.2)',
						'rgba(75, 192, 192, 0.2)',
						'rgba(153, 102, 255, 0.2)',
						'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
						'rgba(54, 162, 235, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
		});
	});
</script>


