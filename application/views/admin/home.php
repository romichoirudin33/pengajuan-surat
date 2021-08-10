<div
	class="
		d-flex
		justify-content-between
		flex-wrap flex-md-nowrap
		align-items-center
		pt-3
		pb-2
		mb-3
		border-bottom
	"
>
	<h1 class="h2">Dashboard</h1>
</div>
<div class="row">
	<div class="col">
		<center>Pengajuan surat 3 bulan terakhir </center>
		<canvas
			class="my-4 w-100"
			id="statusKawinChart"
			width="900"
			height="500"
		></canvas>
	</div>
	<div class="col">
		<center>Presentase baru dan selesai pengajuan surat</center>
		<canvas
			class="my-4 w-100"
			id="statusJenisKelamin"
			width="900"
			height="500"
		></canvas>
	</div>
	<div class="col">
		<center>Seluruh status proses pengajuan</center>
		<canvas
			class="my-4 w-100"
			id="agamaChart"
			width="900"
			height="500"
		></canvas>
	</div>
</div>

<script src="<?= base_url('assets/plugins/jquery.min.js'); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

<script>
	$(document).ready(function () {
		feather.replace();

		// Graphs
		var statusKawinChart = document.getElementById("statusKawinChart");
		// eslint-disable-next-line no-unused-vars
		var myChart = new Chart(statusKawinChart, {
			type: "line",
			data: {
				labels: ["2 bln kemarin", "1 bln kemarin", "bln ini"],
				datasets: [
					{
						data: [
							<?= $twobln .','. $onebln .','. $bln ?>
						],
						lineTension: 0,
						backgroundColor: "transparent",
						borderColor: "#007bff",
						borderWidth: 2,
						pointBackgroundColor: "#007bff",
					},
				],
			},
			options: {
				scales: {
					yAxes: [
						{
							ticks: {
								beginAtZero: false,
							},
						},
					],
				},
				legend: {
					display: false,
				},
			},
		});

		// Graphs jenis kelamin
		var statusKawinChart = document.getElementById("statusJenisKelamin");
		// eslint-disable-next-line no-unused-vars
		var myChart = new Chart(statusKawinChart, {
			type: "pie",
			data: {
				labels: ["Baru", "Selesai"],
				datasets: [
					{
						data: [<?= $presentase_baru .','. $presentase_selesai ?>],
						backgroundColor: ["rgb(52, 152, 219)", "rgb(231, 76, 60)"],
						hoverOffset: 4,
					},
				],
			},
		});

		// Graphs agama
		var agamaChart = document.getElementById("agamaChart");
		// eslint-disable-next-line no-unused-vars
		var myChart = new Chart(agamaChart, {
			type: "bar",
			data: {
				labels: ["Baru", "Dikonfirmasi", "Ditolak", "Diproses", "Selesai"],
				datasets: [
					{
						data: [
							<?= $baru ?>,
							<?= $dikonfirmasi ?>,
							<?= $ditolak ?>,
							<?= $diproses ?>,
							<?= $selesai ?>,
						],
						backgroundColor: [
							"rgb(231, 76, 60)",
							"rgb(52, 152, 219)",
							"rgb(26, 188, 156)",
							"rgb(241, 196, 15)",
							"rgb(155, 89, 182)",
						],
						lineTension: 0,
						pointBackgroundColor: "#007bff",
					},
				],
			},
			options: {
				scales: {
					yAxes: [
						{
							ticks: {
								beginAtZero: true,
							},
						},
					],
				},
				legend: {
					display: false,
				},
			},
		});
	});
</script>
