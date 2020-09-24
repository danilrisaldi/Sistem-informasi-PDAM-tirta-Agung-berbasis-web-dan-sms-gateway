
<?php
// sesuai kan root file mPDF anda
$nama_dokumen='Pegawai Pdam Tirta Agung'; //Beri nama file PDF hasil.
define('_MPDF_PATH','./../plugins/MPDF57/'); //sesuaikan dengan root folder anda
include(_MPDF_PATH . "mpdf.php"); //includekan ke file mpdf
$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document
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
  <th align="center"><img src="../images/ka.PNG" width="13%"></th>
  <th align="center">PEMERINTAH KABUPATEN OGAN KOMERING ILIR<h5>PERUSAHAAN DAERAH AIR MINUM TIRTA AGUNG</h5>
    <small>jl.Demang Hamid Kel.Paku Kayuagung Telp.0712321350 Kayuagung</small></th>
  <th align="center"><img src="../images/pdam.PNG" width="15%"> </th>

</tr>
</table>
<hr >
<h4 align="center"><b>LAPORAN </b></h4> <h6 align="center">Pegawai PDAM Tirta Agung</h6>

<table border="1" width="80%" align="center">
<tr> 
  <th style='width:30px'>No</th>
                        <th>Nama </th>
                        <th>Alamat </th>
                        <th>Jenis kelamin </th>
                        <th>Agama </th>                     
                        <th>Cabang </th>s
  
</tr>
<?php

// Load file koneksi.php
include "config/koneksi.php";
include "config/library.php";
include "config/fungsi_indotgl.php";


 $n=0;
 $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pegawai ");
  $no = 1;
   while($r=mysqli_fetch_array($tampil)){
   // Ambil semua data dari hasil eksekusi $sql
       echo "<tr>             <td>$no</td>
                              <td>$r[nama]</td>
                              <td>$r[alamat]</td>
                              <td>$r[jk]</td>
                              <td>$r[agama]</td>                             
                              <td>$r[cabang]</td>
                          </tr>";
    $no++;  
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