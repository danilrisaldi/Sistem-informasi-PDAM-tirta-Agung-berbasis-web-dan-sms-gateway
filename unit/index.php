<?php 
  session_start();
  error_reporting(0);
  include "../admin/config/koneksi.php";
  include "../admin/config/config/library.php";
  include "../admin/config/config/fungsi_indotgl.php";
   if (isset($_SESSION[id])){          
       $profil = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pegawai where id_pegawai='$_SESSION[id]'"));
      $nama= $profil[nama];    
      $foto = $profil[foto];
      $level = 'unit';      
      $cabang = $profil[cabang]; 

      $jadwal = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM cek_berkala"));
      $hasil = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM hasil_cek inner join cek_berkala on hasil_cek.id_cek = cek_berkala.id_cek inner join pelanggan on hasil_cek.id_pelanggan = pelanggan.id_pelanggan where cabang ='$cabang'"));
     
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>unit || PDAM Tirta Agung</title>
    <meta name="author" content="phpmu.com">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="../plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <style type="text/css"> .files{ position:absolute; z-index:2; top:0; left:0; filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; opacity:0; background-color:transparent; color:transparent; } </style>
    <script type="text/javascript" src="../plugins/jQuery/jquery-1.12.3.min.js"></script>
    <script language="javascript" type="text/javascript"> 
      var maxAmount = 160;
      function textCounter(textField, showCountField) {
        if (textField.value.length > maxAmount) {
          textField.value = textField.value.substring(0, maxAmount);
        } else { 
          showCountField.value = maxAmount - textField.value.length;
        }
      }
    </script>
  </head>

  <body onload="ajaxrunning()" class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
          <?php include "header_unit.php"; ?>
      </header>

      <aside class="main-sidebar">
          <?php include "menu_unit.php"; ?>
      </aside>

      <div class="content-wrapper">
        <section class="content-header">
          <h1> Dashboard <small>Control panel</small> </h1>
        </section>

        <section class="content">
           <?php 
          if ($_GET[view]=='dashboard' OR $_GET[view]==''){
                  echo "<div class='row'>";
                          include "konten/dashboard.php";                
                  echo "</div>";
          } elseif ($_GET[view]=='data_pelanggan'){
            cek_session_unit();
            echo "<div class='row'>";
                    include "konten/data_pelanggan.php";
            echo "</div>"; 
          } elseif ($_GET[view]=='jadwal'){
            cek_session_unit();
            echo "<div class='row'>";
                    include "konten/jadwal.php";
            echo "</div>"; 
          }elseif ($_GET[view]=='hasil'){
            cek_session_unit();
            echo "<div class='row'>";
                    include "konten/hasil.php";
            echo "</div>"; 
          }elseif ($_GET[view]=='formdatapelanggan'){
            cek_session_unit();
            echo "<div class='row'>";
                    include "konten/formdatapelanggan.php";
            echo "</div>"; 
          }elseif ($_GET[view]=='master_unit'){
            cek_session_unit();
            echo "<div class='row'>";
                    include "konten/master_unit.php";
            echo "</div>"; 
          }




           ?>
      
        </section>
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
          <?php include "footer_unit.php"; ?>
      </footer>
    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
    <script src="../plugins/highchart/js/highcharts.js"></script>
    <script src="../plugins/highchart/js/modules/data.js"></script>
    <script src="../plugins/highchart/js/modules/exporting.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="../plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>

    <script>
      $(function () { 
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>

<?php 
  }else{
    header("../login.php");
  }
?>
