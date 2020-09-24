<?php if ($_GET[act]==''){

 $total_pengaduan = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pengaduan  where status_pengaduan='selesai' "));
 $total_ATM = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pengaduan  where status_pengaduan='selesai' AND jenis='air tidak mengalir' "));
 $total_KBC = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pengaduan  where status_pengaduan='selesai' AND jenis='kebocoran' "));
 $total_SBS = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pengaduan  where status_pengaduan='selesai' AND jenis='salah baca stand'"));
 $total_KA = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pengaduan  where status_pengaduan='selesai' AND jenis='kualitas air' "));
 $total_PLG = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pengaduan  where status_pengaduan='selesai' AND jenis='pelanggaran' "));
}elseif($_GET[act]=='grafik'){

	$tahun=$_POST['tahun'];
$cabang=$_POST['cabang']; 



if ($tahun=='semua tahun' && $cabang =='semua cabang') {

 $total_pengaduan = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' "));

 $total_ATM = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' AND jenis='air tidak mengalir' "));
 $total_KBC = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' AND jenis='kebocoran' "));

 $total_SBS = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' AND jenis='salah baca stand'"));
 $total_KA = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' AND jenis='kualitas air' "));
 $total_PLG = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' AND jenis='pelanggaran' "));
  
 


}elseif ($cabang=='semua cabang') {
  $total_pengaduan = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' AND year(tgl_pengaduan)='$tahun'  "));
 $total_ATM = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' AND jenis='air tidak mengalir' AND year(tgl_pengaduan)='$tahun'"));
 $total_KBC = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' AND jenis='kebocoran' AND year(tgl_pengaduan)='$tahun' "));
 $total_SBS = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' AND jenis='salah baca stand' AND year(tgl_pengaduan)='$tahun' "));
 $total_KA = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' AND jenis='kualitas air' AND year(tgl_pengaduan)='$tahun' "));
 $total_PLG = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' AND jenis='pelanggaran' AND year(tgl_pengaduan)='$tahun' "));
}elseif ($tahun=='semua tahun') {
$total_pengaduan = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' AND cabang='$cabang'  "));
 $total_ATM = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' AND jenis='air tidak mengalir' AND cabang='$cabang'"));
 $total_KBC = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' AND jenis='kebocoran' AND cabang='$cabang' "));
 $total_SBS = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' AND jenis='salah baca stand' AND cabang='$cabang' "));
 $total_KA = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' AND jenis='kualitas air' AND cabang='$cabang' "));
 $total_PLG = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' AND jenis='pelanggaran' AND cabang='$cabang' "));
}else{
 $total_pengaduan = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' AND cabang='$cabang' AND year(tgl_pengaduan)='$tahun' "));
 $total_ATM = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' AND jenis='air tidak mengalir' AND cabang='$cabang' AND year(tgl_pengaduan)='$tahun'"));
 $total_KBC = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' AND jenis='kebocoran' AND cabang='$cabang' AND year(tgl_pengaduan)='$tahun' "));
 $total_SBS = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' AND jenis='salah baca stand' AND cabang='$cabang' AND year(tgl_pengaduan)='$tahun' "));
 $total_KA = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' AND jenis='kualitas air' AND cabang='$cabang' AND year(tgl_pengaduan)='$tahun' "));
 $total_PLG = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' AND jenis='pelanggaran' AND cabang='$cabang' AND year(tgl_pengaduan)='$tahun' "));
}

 }?>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Grafik Pengaduan"
	},
	axisY: {
		title: "jumlah "
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "total Pengaduan = <?php echo $total_pengaduan[total];  ?>",
		dataPoints: [      
			{ y: <?php echo $total_ATM[total]; ?>, label: "AIR TIDAK MENGALIR" },
			{ y: <?php echo $total_KBC[total]; ?>,  label: "KEBOCORAN" },
			{ y: <?php echo $total_SBS[total]; ?>,  label: "SALAH BACA STAND" },
			{ y: <?php echo $total_KA[total]; ?>,  label: "KUALITAS AIR" },
			{ y: <?php echo $total_PLG[total]; ?>,  label: "PELANGGARAN" }
		]
	}]
});
chart.render();

}
</script>
  		<form action="index.php?view=pengaduan&act=grafik" method="post">
           <select class="btn" name="tahun">
          <option>semua tahun</option>
          <?php for ($i=2015; $i < 2025 ; $i++) { 
           echo "<option>$i</option>";} ?>
           </select>
           <select class=" btn" name="cabang">
                        <option>semua cabang</option>
                        <option >sp padang</option>
                        <option>tanjung lubuk</option> 
                        <option>pedamaran</option>
                        <option>pampangan</option>
                        <option>pangarayan</option>
                        <option>tulung selapan</option> 
                        <option>mesuji</option>
                        <option>serinanti</option>
                        <option>pk lampam</option>
                        <option>tugumulyo</option>
                        <option>jejawi</option>
                        <option>kandis</option>
                        <option>bungin tinggi</option>
                      </select>
                       <button class="btn btn-success">pilih</button>
                         <a class="btn " style="background-color: yellow"> <?php echo $tahun; ?> ||  <?php echo $cabang; ?></a>
         </form>
                       <hr>
<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;">
</div>
