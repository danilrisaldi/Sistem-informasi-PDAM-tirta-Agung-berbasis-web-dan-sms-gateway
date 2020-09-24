
<?php
// sesuai kan root file mPDF anda
$nama_dokumen='Pengaduan Pdam Tirta Agung'; //Beri nama file PDF hasil.
define('_MPDF_PATH','./../plugins/MPDF57/'); //sesuaikan dengan root folder anda
include(_MPDF_PATH . "mpdf.php"); //includekan ke file mpdf
$mpdf=new mPDF('utf-8', 'A4-L'); // Create new mPDF Document


//Beginning Buffer to save PHP variables and HTML tags
ob_start();
//Tuliskan file HTML di bawah sini , sesuai File anda .
?>
<html>
<head>
  <title>Cetak  || Pegawai PDAM Tirta Agung</title>
    
   <style>
   table {border-collapse:collapse; table-layout:fixed;width: 630px; }
   table td {word-wrap:break-word; padding: 10px;}
    table th {word-wrap:break-word; padding: 10px;}
   </style>
</head>
<body>
<table border="0" width="100%" align="center">
<tr> 
  <th align="center"><img src="../images/ka.PNG" width="8%"></th>
  <th align="center">PEMERINTAH KABUPATEN OGAN KOMERING ILIR<h5>PERUSAHAAN DAERAH AIR MINUM TIRTA AGUNG</h5>
    <small>jl.Demang Hamid Kel.Paku Kayuagung Telp.0712321350 Kayuagung</small></th>
  <th align="center"><img src="../images/pdam.PNG" width="10%"> </th>

</tr>
</table>
<hr >
<h4 align="center"><b>LAPORAN </b></h4> <h6 align="center">Pengaduan PDAM Tirta Agung</h6>

<table border="1" width="80%" align="center">
<tr> 
  <th style='width:30px'>No</th>
                         <th>No Sambungan </th>
                        <th>Nama </th>
                        <th>Alamat </th>
                        <th>Cabang </th>
                        <th>No Telepon </th>
                        <th>Jenis </th>
                        <th>Deskripsi </th>
                        <th>Foto pengaduan </th>
                        <th>Tanggal pengaduan </th>
                        <th style='width:40px'>Status</th>
                        <th >Nama penyurvei</th>
                        <th >Note survei</th>
                        <th>foto survei</th>

</tr>
<?php
// Load file koneksi.php
include "config/koneksi.php";
include "config/library.php";
include "config/fungsi_indotgl.php";

$cabang=$_GET['cabang'];
$tahun=$_GET['tahun'];
$bulan=$_GET['bulan'];
 $n=1;

 if ($cabang=='--all--' && $tahun=='--all--' && $bulan=='--all--') {
     $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' ");
 }elseif ($cabang=='--all--' && $tahun=='--all--') {
     $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' AND month(tgl_pengaduan)='$bulan' ");
 }elseif ($cabang=='--all--' && $bulan=='--all--') {
    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' AND year(tgl_pengaduan)='$tahun' ");
 }elseif ($tahun=='--all--' && $bulan=='--all--') {
     $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' AND cabang='$cabang' ");
 }elseif ($cabang=='--all--') {
     $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' AND year(tgl_pengaduan)='$tahun' AND month(tgl_pengaduan)='$bulan' ");
 }elseif ($tahun=='--all--') {
    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' AND cabang='$cabang' AND month(tgl_pengaduan)='$bulan' ");
 }elseif ($bulan=='--all--') {
     $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' AND cabang='$cabang' AND year(tgl_pengaduan)='$tahun' ");
 }else{
     $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' AND cabang='$cabang' AND year(tgl_pengaduan)='$tahun' AND month(tgl_pengaduan)='$bulan' ");}

   while($r=mysqli_fetch_array($tampil)){
   // Ambil semua data dari hasil eksekusi $sql
       echo "<tr>             <td>$n</td>
                              <td>$r[no_sambungan]</td>
                              <td>$r[nama]</td>
                              <td>$r[alamat]</td>
                              <td>$r[cabang]</td>
                              <td>$r[nohp]</td>
                              <td>$r[jenis]</td>
                              <td>$r[deskripsi]</td>
                              <td><img src='../images/$r[foto_pengaduan]' width='200' height='100'></td>
                              <td>$r[tgl_pengaduan] </td>
                              <td bgcolor='yellow'>$r[status_pengaduan]</td>
                               <td>- $r[nama_survei]</td>
                              <td>- $r[note_survei]</td>
                              <td><img src='../images/$r[foto_survei]' width='200' height='100'></td>
                          </tr>";
    $n++;  
}
?>
</table >
<br>
<h8>
<p align="right" >kayuagung, .. , ........... , .......</p>
<p align="right">   </p>
</h8>
</body>

</html>
<?php
//Batas file sampe sini
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
$stylesheet = file_get_contents('../bootstrap/css/bootstrap.min.css');
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>