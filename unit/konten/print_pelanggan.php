<?php
// Tentukan path yang tepat ke mPDF
$nama_dokumen='Daftar_seleksi_calon_siswa'; //Beri nama file PDF hasil.
define('_MPDF_PATH','./../../plugins/MPDF57/'); // Tentukan folder dimana anda menyimpan folder mpdf
include(_MPDF_PATH . "mpdf.php"); // Arahkan ke file mpdf.php didalam folder mpdf
$mpdf=new mPDF('utf-8', 'A4', 10.5, 'arial'); // Membuat file mpdf baru
 
//Memulai proses untuk menyimpan variabel php dan html
ob_start();
?>
<html>
<head>
  <title>Cetak  || Pelanggan PDAM Tirta Agung</title>
    
   <style>
   table {border-collapse:collapse; table-layout:fixed;width: 630px; }
   table td {word-wrap:break-word; padding: 10px;}
    table th {word-wrap:break-word; padding: 10px;}
   </style>
</head>
<body>
<table border="0" width="100%" align="center">
<tr> 
  <th align="center"><img src="../../images/ka.PNG" width="13%"></th>
  <th align="center">PEMERINTAH KABUPATEN OGAN KOMERING ILIR<h5>PERUSAHAAN DAERAH AIR MINUM TIRTA AGUNG</h5>
    <small>jl.Demang Hamid Kel.Paku Kayuagung Telp.0712321350 Kayuagung</small></th>
  <th align="center"><img src="../../images/pdam.PNG" width="15%"> </th>

</tr>
</table>
<hr >
<h4 align="center"><b>Data </b></h4> <h6 align="center">Pelanggan PDAM Tirta Agung</h6>

<table border="1" width="80%" align="center">
<tr> 
  <th style='width:30px'>No</th>
                        <th>No sambungan</th>
                        <th>Nama </th>
                        <th>Alamat </th>
                        <th>Cabang </th>
                        <th>no handphone</th>

</tr>
<?php
// Load file koneksi.php
include "../../admin/config/koneksi.php";
$cabang=$_GET['cabang'];
$n=1;
$tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pelanggan where cabang='$cabang' order by tgl_pelanggan ");

   while($r=mysqli_fetch_array($tampil)){
   // Ambil semua data dari hasil eksekusi $sql
       echo "<tr>             <td>$n</td>
                              <td>$r[no_sambungan]</td>
                              <td>$r[nama]</td>
                              <td>$r[alamat]</td>
                              <td>$r[cabang]</td>
                              <td>$r[nohp]</td>
                          </tr>";
    $n++;  
}
?>
</table >
<br>
<h8>
  <br>
<p align="right " >kayuagung, .. , ........... , .......</p>
<p align="right">   </p>
<p align="right">(...............................)</p>
</h8>
</body>

</html>
<?php
 
$mpdf->setFooter('{PAGENO}');
//penulisan output selesai, sekarang menutup mpdf dan generate kedalam format pdf
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Disini dimulai proses convert UTF-8, kalau ingin ISO-8859-1 cukup dengan mengganti $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>