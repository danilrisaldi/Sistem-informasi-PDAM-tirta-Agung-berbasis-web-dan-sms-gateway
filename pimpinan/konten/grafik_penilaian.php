<?php 
if ($_GET[act]==''){
   $total = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM penilaian   "));
   $total_sp = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM penilaian where nilai='5'   ")); 
   $total_p = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM penilaian where nilai='4'   "));
   $total_cp = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM penilaian where nilai='3'   "));  
   $total_kp = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM penilaian where nilai='2'   ")); 
   $total_tp = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM penilaian where nilai='1'   ")); 
 
}elseif($_GET[act]=='grafik'){ 

	$tahunawal=$_POST['tahunawal'];
    $tahunakhir=$_POST['tahunakhir']; 
    
   $total = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM penilaian inner join pengaduan on penilaian.id_pengaduan = pengaduan.id_pengaduan where  year(tgl_pengaduan)>='$tahunawal' AND year(tgl_pengaduan)<='$tahunakhir'"));
   $total_sp = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM penilaian inner join pengaduan on penilaian.id_pengaduan = pengaduan.id_pengaduan where  year(tgl_pengaduan)>='$tahunawal' AND year(tgl_pengaduan)<='$tahunakhir' AND  nilai='5'   ")); 
   $total_p = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM penilaian inner join pengaduan on penilaian.id_pengaduan = pengaduan.id_pengaduan where  year(tgl_pengaduan)>='$tahunawal' AND year(tgl_pengaduan)<='$tahunakhir' AND nilai='4'   "));
   $total_cp = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM penilaian inner join pengaduan on penilaian.id_pengaduan = pengaduan.id_pengaduan where  year(tgl_pengaduan)>='$tahunawal' AND year(tgl_pengaduan)<='$tahunakhir' and nilai='3'   "));  
   $total_kp = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM penilaian inner join pengaduan on penilaian.id_pengaduan = pengaduan.id_pengaduan where  year(tgl_pengaduan)>='$tahunawal' AND year(tgl_pengaduan)<='$tahunakhir' and nilai='2'   ")); 
   $total_tp = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM penilaian inner join pengaduan on penilaian.id_pengaduan = pengaduan.id_pengaduan where  year(tgl_pengaduan)>='$tahunawal' AND year(tgl_pengaduan)<='$tahunakhir' and nilai='1'   ")); 


 }?>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Grafik Penilaian"
	},
	axisY: {
		title: "nilai"
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "total pelanggan = <?php echo $total[total];  ?>",
		dataPoints: [      
			{ y: <?php echo $total_sp[total]; ?>, label: "sangat puas" },
			{ y: <?php echo $total_p[total]; ?>,  label: "puas" },
			{ y: <?php echo $total_cp[total]; ?>,  label: "cukup puas" },
			{ y: <?php echo $total_kp[total]; ?>,  label: "kurang puas" },
			{ y: <?php echo $total_tp[total]; ?>,  label: "tidak puas" }
		]
	}]
});
chart.render();

}
</script>
<form action="index.php?view=penilaian&act=grafik" method="post">
           <select class="btn" name="tahunawal">
          <?php for ($i=2015; $i < 2025 ; $i++) { 
           echo "<option>$i</option>";} ?>
           </select>
           <select class="btn" name="tahunakhir">
          <?php for ($i=2025; $i > 2015 ; $i--) { 
           echo "<option>$i</option>";} ?>
           </select>
             <button class="btn btn-success">pilih</button>
                    <a class="btn " style="background-color: yellow"> <?php echo $tahunawal; ?> ||  <?php echo $tahunakhir; ?></a>
         </form>  <hr>

<div id="chartContainer" style="height: 370px; max-width: 100%; margin: 0px auto;"></div>
