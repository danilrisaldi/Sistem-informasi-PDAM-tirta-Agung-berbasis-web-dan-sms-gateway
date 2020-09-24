<?php 
  session_start();
  error_reporting(0);
  include "../admin/config/koneksi.php";
  include "../admin/config/config/library.php";
  include "../admin/config/config/fungsi_indotgl.php";
  if (isset($_SESSION[id])){          
       $profil = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pelanggan where id_pelanggan='$_SESSION[id]'"));
       $id_pelanggan=$_SESSION[id];
      $nama= $profil[nama];    
      $alamat = $profil[alamat];
      $level = 'pelanggan';      
      $cabang = $profil[cabang]; 
    

      $pengaduan_masuk = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total from pengaduan where  id_pelanggan='$id_pelanggan' AND status_pengaduan='diproses' || status_pengaduan='dikirim' || status_pengaduan='terjadwal' || status_pengaduan='disurvei' || status_pengaduan='selesai' AND status_nilai=''"));
      $penilaian = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pengaduan where  id_pelanggan='$id_pelanggan' AND status_pengaduan='selesai' AND status_nilai=''"));
      $riwayat = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM pengaduan where  id_pelanggan='$id_pelanggan'  AND status_nilai='sudah' || status_pengaduan='ditolak'"));

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>pelanggan || PDAM Tirta Agung</title>
    <meta name="author" content="phpmu.com">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

     <link href="../plugins/rating/css/bootstrap.css" rel="stylesheet">
    <link href="../plugins/rating/css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />
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

   <body onload='ajaxrunning()' class="hold-transition skin-blue  layout-top-nav">
    <div class='wrapper'>
       <header class="main-header">
     <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="home.php" class="navbar-brand"><span class="logo-mini"> <img src="../images/pdam_icon.png" height="25"></span><b>Tirta Agung</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li ><a href="#"><span class="sr-only">(current)</span></a></li>
            <li><a href="index.php?view=pengumuman"><i class="fa fa-bullhorn"></i> Pengumuman</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa  fa-calendar-times-o"></i> <span> Cek Berkala</span><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                  <li><a href="index.php?view=jadwal"><i class="fa fa-calendar-plus-o"></i> jadwal </span></a></li>
                 <li><a href="index.php?view=hasil"><i class="fa fa-calendar-check-o"></i> hasil </a></li>
              </ul>
            </li>
             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-th-list"></i> <span> Pengaduan</span><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                   <li><a href="index.php?view=pengaduan"><i class="fa fa-pencil"></i>Pengaduan </a></li>
                 <li><a href="index.php?view=status"><i class="fa fa-search"></i>Status<span class="badge"><?php echo $pengaduan_masuk[total]; ?></span></a></li>
                 <li><a href="index.php?view=penilaian"><i class="fa fa-star"></i>Penilaian<span class="badge"><?php echo $penilaian[total]; ?></span></a></li>
                 <li><a href="index.php?view=riwayat"><i class="fa fa-history"></i>Riwayat<span class="badge"><?php echo $riwayat[total]; ?></span></a></li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
           <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs"><?php echo $nama; ?></span> <span class='caret'></span>
                </a>
                <ul class="dropdown-menu">                 
                  <li class="user-header">
                      <h1> <?php echo $nama; ?><br></h1>
                        <?php echo $alamat; ?><br>
                      <small><?php echo $level; ?></small>
                    </li>
                   <li class="user-footer">   
                    <div class="pull-right">
                    <a href="../logout.php" class="btn btn-primary">Logout</a>
                    </div>
                  </li>
                </ul>
              </li>
          </ul>
        </div>
      </div>
     </nav>
     </header>
  
 <!-- Full Width Column -->
  <div class="content-wrapper">  
        <section class="content">
          
          <?php
          if ($_GET[view]=='home' OR $_GET[view]==''){
                  echo "<div class='row'>"; 
                  header('home.php');  

                  echo "</div>";
          } elseif ($_GET[view]=='pengumuman'){
            cek_session_pelanggan();
            echo "<div class='row'>";
                    include "konten/pengumuman.php";
            echo "</div>";
          }elseif ($_GET[view]=='jadwal'){
            cek_session_pelanggan();
            echo "<div class='row'>";
                    include "konten/jadwal.php";
            echo "</div>";
           }elseif ($_GET[view]=='hasil'){
            cek_session_pelanggan();
            echo "<div class='row'>";
                    include "konten/hasil.php";
            echo "</div>";
          }elseif ($_GET[view]=='pengaduan'){
            cek_session_pelanggan();
            echo "<div class='row'>";
                    include "konten/pengaduan.php";
            echo "</div>";
          }elseif ($_GET[view]=='status'){
            cek_session_pelanggan();
            echo "<div class='row'>";
                    include "konten/status.php";
            echo "</div>";
          }elseif ($_GET[view]=='penilaian'){
            cek_session_pelanggan();
            echo "<div class='row'>";
                    include "konten/penilaian.php";
            echo "</div>";
          }elseif ($_GET[view]=='formnilai'){
            cek_session_pelanggan();
            echo "<div class='row'>";
                    include "konten/formnilai.php";
            echo "</div>";
          }elseif ($_GET[view]=='riwayat'){
            cek_session_pelanggan();
            echo "<div class='row'>";
                    include "konten/riwayat.php";
            echo "</div>";
          }

          
           ?>
        </section>
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
          <?php include "footer_pelanggan.php"; ?>
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

    <script src="../dist/js/pages/demo.js"></script>

   <script src="../plugins/rating/js/star-rating.min.js"></script> 

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
     <script type="text/javascript">
        $(function(){
               $('.rating').on('rating.change', function(event, value, caption) {
               id_pengaduan = $(this).attr('id_pengaduan');
                $.ajax({
                  url: "rating.php",
                  dataType: "json",
                  data: {nilai:value, id_pengaduan:id_pengaduan, type:'save'},
                  success: function( data ) {
                     alert("berhasil dinilai");
                     window.location.href="index.php?view=penilaian";
                    

                  },
              error: function(e) {
                // Handle error here
                console.log(e);
              },
              timeout: 30000  
            });
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
