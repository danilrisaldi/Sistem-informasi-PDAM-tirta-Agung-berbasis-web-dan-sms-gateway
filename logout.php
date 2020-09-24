<?php
  session_start();
  session_destroy();
  echo "<script>window.alert('Berhasil Logout,..');
				window.location='login.php'</script>";
	die();
		

?>