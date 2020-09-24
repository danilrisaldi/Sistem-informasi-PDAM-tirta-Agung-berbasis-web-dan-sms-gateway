<?php
/*
* Author: Rohit Kumar
* Website: iamrohit.in
* Date: 09-03-2016
* App Name: Star rating system
* Description: Star rating demo using Jquery, PHP and Mysql
*/
function connect() {
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "sms";
  $con = mysqli_connect($hostname, $username, $password, $dbname);	
  return $con;
}

function getRatingByProductId($con, $id_pengaduan) {
	$query = "SELECT SUM(nilai) as nilai, COUNT(nilai) as count from penilaian WHERE id_pengaduan = $id_pengaduan";

      $result = mysqli_query($con, $query);
      $resultSet = mysqli_fetch_assoc($result);
      if($resultSet['count']>0) {
      	return ($resultSet['nilai']/$resultSet['count']);
      } else {
      	return 0;
      }
	
}
if(isset($_REQUEST['type'])) {
	if($_REQUEST['type'] == 'save') {
		$nilai = $_REQUEST['nilai'];
		$id_pengaduan = $_REQUEST['id_pengaduan'];

	      $query = "INSERT INTO penilaian (id_pengaduan, nilai) VALUES ('$id_pengaduan', '$nilai')";
	      // get connection
	      $con = connect();
	      $result = mysqli_query($con, $query);

	      $query2 = ("UPDATE pengaduan SET status_nilai='sudah' WHERE id_pengaduan = '$id_pengaduan'");
	       $con = connect();
	      $result2 = mysqli_query($con, $query2);
	      echo 1; exit;

	} 
}

?>
