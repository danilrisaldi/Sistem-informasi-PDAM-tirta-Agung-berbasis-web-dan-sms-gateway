<?php 
$total = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pegawai   "));
 $total_admin = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pegawai where level='admin' "));
 $total_pimpinan = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pegawai where level='pimpinan' "));
 $total_teknik = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pegawai where level='teknik' "));
 $total_unit = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pegawai where level='unit' "));
?>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Grafik pegawai"
	},
	axisY: {
		title: "jumlah pegawai"
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "total pegawai = <?php echo $total[total];  ?>",
		dataPoints: [      
			{ y: <?php echo $total_admin[total]; ?>, label: "admin" },
			{ y: <?php echo $total_pimpinan[total]; ?>,  label: "pimpinan" },
			{ y: <?php echo $total_teknik[total]; ?>,  label: "teknik" },
			{ y: <?php echo $total_unit[total]; ?>,  label: "unit" }
			
		]
	}]
});
chart.render();

}
</script>

<div id="chartContainer" style="height: 370px; max-width: 100%; margin: 0px auto;"></div>
