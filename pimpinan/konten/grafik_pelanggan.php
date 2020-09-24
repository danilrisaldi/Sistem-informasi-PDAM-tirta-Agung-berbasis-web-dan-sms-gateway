<?php 


if ($_GET[act]==''){
 $total = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pelanggan   "));
 $total_sppadang = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pelanggan where cabang='sp padang' "));
 $total_tanjunglubuk = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pelanggan where cabang='tanjung lubuk' "));
 $total_pedamaran = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pelanggan where cabang='pedamaran' "));
 $total_pampangan = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pelanggan where cabang='pampangan' "));
 $total_pangarayan = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pelanggan where cabang='pangarayan' "));
 $total_tulungselapan = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pelanggan where cabang='tulung selapan' "));
 $total_mesuji = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pelanggan where cabang='mesuji' "));
 $total_serinanti = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pelanggan where cabang='serinanti' "));
 $total_pklampam = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pelanggan where cabang='pk lampam' "));
 $total_tugumulyo = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pelanggan where cabang='tugumulyo' "));
 $total_jejawi = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pelanggan where cabang='jejawi' "));
  $total_kandis = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pelanggan where cabang='kandis' "));
  $total_bungintinggi = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pelanggan where cabang='bungin tinggi' "));

}elseif($_GET[act]=='grafik'){ 

	$tahunawal=$_POST['tahunawal'];
    $tahunakhir=$_POST['tahunakhir']; 
    $tahunsebelum=($tahunakhir-1);
    $totaltahunsebelumnya = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pelanggan where  year(tgl_pelanggan)>='$tahunawal' AND year(tgl_pelanggan)<='$tahunsebelum'  "));
        
  $total = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pelanggan where  year(tgl_pelanggan)>='$tahunawal' AND year(tgl_pelanggan)<='$tahunakhir'  "));



 $total_sppadang = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pelanggan where cabang='sp padang'  AND year(tgl_pelanggan)>='$tahunawal' AND year(tgl_pelanggan)<='$tahunakhir'  "));
 $total_tanjunglubuk = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pelanggan where cabang='tanjung lubuk'  AND year(tgl_pelanggan)>='$tahunawal' AND year(tgl_pelanggan)<='$tahunakhir' "));
 $total_pedamaran = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pelanggan where cabang='pedamaran'  AND year(tgl_pelanggan)>='$tahunawal' AND year(tgl_pelanggan)<='$tahunakhir' "));
 $total_pampangan = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pelanggan where cabang='pampangan'  AND year(tgl_pelanggan)>='$tahunawal' AND year(tgl_pelanggan)<='$tahunakhir' "));
 $total_pangarayan = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pelanggan where cabang='pangarayan'  AND year(tgl_pelanggan)>='$tahunawal' AND year(tgl_pelanggan)<='$tahunakhir' "));
 $total_tulungselapan = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pelanggan where cabang='tulung selapan'  AND year(tgl_pelanggan)>='$tahunawal' AND year(tgl_pelanggan)<='$tahunakhir' "));
 $total_mesuji = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pelanggan where cabang='mesuji'  AND year(tgl_pelanggan)>='$tahunawal' AND year(tgl_pelanggan)<='$tahunakhir' "));
 $total_serinanti = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pelanggan where cabang='serinanti'  AND year(tgl_pelanggan)>='$tahunawal' AND year(tgl_pelanggan)<='$tahunakhir' "));
 $total_pklampam = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pelanggan where cabang='pk lampam'  AND year(tgl_pelanggan)>='$tahunawal' AND year(tgl_pelanggan)<='$tahunakhir' "));
 $total_tugumulyo = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pelanggan where cabang='tugumulyo'  AND year(tgl_pelanggan)>='$tahunawal' AND year(tgl_pelanggan)<='$tahunakhir' "));
 $total_jejawi = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pelanggan where cabang='jejawi'  AND year(tgl_pelanggan)>='$tahunawal' AND year(tgl_pelanggan)<='$tahunakhir' "));
  $total_kandis = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pelanggan where cabang='kandis'  AND year(tgl_pelanggan)>='$tahunawal' AND year(tgl_pelanggan)<='$tahunakhir' "));
  $total_bungintinggi = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pelanggan where cabang='bungin tinggi'  AND year(tgl_pelanggan)>='$tahunawal' AND year(tgl_pelanggan)<='$tahunakhir' "));	


 }?>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Grafik Pelanggan"
	},
	axisY: {
		title: "jumlah pelanggan"
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "total pelanggan = <?php echo $total[total];  ?>",
		dataPoints: [      
			{ y: <?php echo $total_sppadang[total]; ?>, label: "sp padang" },
			{ y: <?php echo $total_tanjunglubuk[total]; ?>,  label: "tanjung lubuk" },
			{ y: <?php echo $total_pedamaran[total]; ?>,  label: "pedamaran" },
			{ y: <?php echo $total_pampangan[total]; ?>,  label: "pampangan" },
			{ y: <?php echo $total_pangarayan[total]; ?>,  label: "pangarayan" },
			{ y: <?php echo $total_tulungselapan[total]; ?>, label: "tulung selapan" },
			{ y: <?php echo $total_mesuji[total]; ?>,  label: "mesuji" },
			{ y: <?php echo $total_serinanti[total]; ?>,  label: "serinanti" },
			{ y: <?php echo $total_pklampam[total]; ?>,  label: "pk lampam" },
			{ y: <?php echo $total_tugumulyo[total]; ?>,  label: "tugumulyo" },
			{ y: <?php echo $total_jejawi[total]; ?>,  label: "jejawi" },
			{ y: <?php echo $total_kandis[total]; ?>,  label: "kandis" },
			{ y: <?php echo $total_bungintinggi[total]; ?>,  label: "bungin tinggi" }
		]
	}]
});
chart.render();

}
</script>
<form action="index.php?view=pelanggan&act=grafik" method="post">
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
