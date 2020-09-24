<?php
date_default_timezone_set('Asia/Jakarta');
$server = "localhost";
$username = "root";
$password = "";
$database = "sms";

($GLOBALS["___mysqli_ston"] = mysqli_connect($server, $username, $password));
mysqli_select_db($GLOBALS["___mysqli_ston"], $database);

function anti_injection($data){
  $filter = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

function cek_session_admin(){
	$level = $_SESSION[level];
	if ($level != 'admin'){
		echo "<script>document.location='../login.php';</script>";
	}
}
function cek_session_teknik(){
	$level = $_SESSION[level];
	if ($level != 'teknik'){
		echo "<script>document.location='../login.php';</script>";
	}
}
function cek_session_unit(){
	$level = $_SESSION[level];
	if ($level != 'unit'){
		echo "<script>document.location='../login.php';</script>";
	}
}
function cek_session_pelanggan(){
	$level = $_SESSION[level];
	if ($level != 'pelanggan'){
		echo "<script>document.location='../login.php';</script>";
	}
}
function cek_session_pimpinan(){
	$level = $_SESSION[level];
	if ($level != 'pimpinan'){
		echo "<script>document.location='../login.php';</script>";
	}
}
?>
