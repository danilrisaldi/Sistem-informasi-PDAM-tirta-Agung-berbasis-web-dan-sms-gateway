<?php 
 session_start();
  error_reporting(0);
  include "admin/config/koneksi.php";
  include "admin/config/library.php";
  include "admin/config/fungsi_indotgl.php";

if (isset($_POST[login])){
 $data=md5(anti_injection($_POST[b]));
 $pass=hash("sha512",$data);
 $admin = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pegawai WHERE username='".anti_injection($_POST[a])."' AND password='$pass' AND level='admin'" );
 $teknik = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pegawai WHERE username='".anti_injection($_POST[a])."' AND password='$pass' AND level='teknik'");
 $unit = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pegawai WHERE username='".anti_injection($_POST[a])."' AND password='$pass' AND level='unit'");
 $pelanggan = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pelanggan WHERE username='".anti_injection($_POST[a])."' AND password='$pass' ");
 $pimpinan = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pegawai WHERE username='".anti_injection($_POST[a])."' AND password='$pass' AND level='pimpinan'");
 

 $hitungadmin = mysqli_num_rows($admin);
 $hitungteknik = mysqli_num_rows($teknik);
 $hitungunit = mysqli_num_rows($unit);
 $hitungpimpinan = mysqli_num_rows($pimpinan); 
 $hitungpelanggan = mysqli_num_rows($pelanggan);

 if ($hitungadmin >= 1){
  $r = mysqli_fetch_array($admin);
  $_SESSION[id]     = $r[id_pegawai];
  $_SESSION[level]     = $r[level];
     echo "<script>document.location='admin/index.php';</script>";
 }
 elseif ($hitungteknik>=1) {
 	$r = mysqli_fetch_array($teknik);
  $_SESSION[id]     = $r[id_pegawai];
  $_SESSION[level]     = $r[level];
     echo "<script>document.location='teknik/index.php';</script>";
 }
 elseif ($hitungunit>=1) {
 	$r = mysqli_fetch_array($unit);
 	 $_SESSION[id]     = $r[id_pegawai];
   $_SESSION[level]     = $r[level];
     echo "<script>document.location='unit/index.php';</script>";
 }

 elseif ($hitungpimpinan>=1) {
  $r = mysqli_fetch_array($pimpinan);
  $_SESSION[id]     = $r[id_pegawai];
  $_SESSION[level]     = $r[level]; 
     echo "<script>document.location='pimpinan/index.php';</script>";
 }
  elseif ($hitungpelanggan>=1) {
  $rr = mysqli_fetch_array($pelanggan);
  $_SESSION[id]     = $rr[id_pelanggan];
  $_SESSION[level]     = 'pelanggan';
     echo "<script>document.location='pelanggan/home.php';</script>";
 }
 else{
    echo "<script>window.alert('Maaf, Anda Tidak Memiliki akses');
                                  window.location=('login.php')</script>";
 }
}
?>
