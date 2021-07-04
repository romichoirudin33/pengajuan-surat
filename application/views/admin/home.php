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
		<center>Status Kawin</center>
		<canvas
			class="my-4 w-100"
			id="statusKawinChart"
			width="900"
			height="500"
		></canvas>
	</div>
	<div class="col">
		<center>Jenis Kelamin</center>
		<canvas
			class="my-4 w-100"
			id="statusJenisKelamin"
			width="900"
			height="500"
		></canvas>
	</div>
	<div class="col">
		<center>Agama</center>
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
				labels: ["Belum Kawin", "Kawin", "Cerai Hidup", "Cerai Mati"],
				datasets: [
					{
						data: [
							<?= $belumKawin .','. $kawin .','. $ceraiHidup .','. $ceraiMati ?>
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
				labels: ["Laki-laki", "Perempuan"],
				datasets: [
					{
						data: [<?= $lakiLaki .','. $perempuan ?>],
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
				labels: ["Islam", "Hindu", "Kristen", "Katholik", "Budha"],
				datasets: [
					{
						data: [
							<?= $islam ?>,
							<?= $hindu ?>,
							<?= $kristen ?>,
							<?= $katholik ?>,
							<?= $budha ?>,
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
	});
</script>
