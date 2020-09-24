       <?php 
  session_start();
  error_reporting(0);
  include "admin/config/koneksi.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> PDAM Tirta Agung</title>
    <meta name="author" content="phpmu.com">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
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
    <header class="main-header">
     <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="index.php" class="navbar-brand"><b><span><img src="images/pdam_icon.png" height="30"> Tirta Agung</span></b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>        
        <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="login.php" class="fa fa-sign-in btn btn-success"> <b>Masuk</b></a></li>
          </ul>
        </div>
      </div>
     </nav>
     </header>
  


      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Carousel Indikator -->
        <ol class="carousel-indicators">
          <li data-target="carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="carousel-example-generic" data-slide-to="1"></li>
        </ol>
        
        <!-- Wrapper for Slide -->
        <div class="carousel-inner" align="center">
          <div class="item active" align="center">
              <img src="images/banner1.jpg" alt="Slide 1" width="100%">
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
              <img src="images/banner2.png" alt="Slide 2" width="100%">
                <div class="carousel-caption">
                </div>
            </div>
             <div class="item">
              <img src="images/banner3.png" alt="Slide 3" width="100%">
                <div class="carousel-caption">
                </div>
            </div>
        </div>
        
        <!-- Control -->
        <a href="#carousel-example-generic" class="carousel-control left" data-slide="prev" role="button">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a href="#carousel-example-generic" class="carousel-control right" data-slide="next" role="button">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div>


              <div class="box-body">
               <div class="box-header" align="center">
                  <h2 ><b><a >Pengumuman</a></b></h2> 
                </div><!-- /.box-header -->
              <div class="box box-solid">
               <table class="table" ><br>
                  <?php 
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pengumuman ORDER BY id_pengumuman DESC Limit 3");
                    while($r=mysqli_fetch_array($tampil)){
                    echo "<tr>
                              <td align='left' width='200'><img src='images/$r[foto]' width='200'></td>
                              <td><h4><b>$r[judul] </b></h4><br> $r[isi]<br>$r[tanggal]</td>
                          </tr>";
                      $no++;
                      }?>
                 </tbody>
               </table>
              </div >
             </div>
            </div>

      <footer class="main-footer">
          <div class="row">
            <div class="col-md-12">
              <div class="col-md-4" align="center"><h4>
                 <b>PDAM TIRTA AGUNG</b> </h4><br>
                <p align="justify">
                <b>Alamat:</b> JL. Demang Hamid, Kayu Agung, Kota Kayu Agung, Kabupaten Ogan Komering Ilir, Sumatera Selatan 30613, Indonesia<br><br>
               <b>Provinsi:</b> Sumatera Selatan<br>
               <b>Telepon:</b> +62 712 321350</p>
              </div>
              <div class="col-md-4" align="center"><p align="justify">
                <h4><b>Jam buka</b></h4><br>
                Jumat 08.00–14.00<br>
                Sabtu Tutup<br>
                Minggu  Tutup<br>
                Senin 08.00–14.00<br>
                Selasa  08.00–14.00<br>
                Rabu  08.00–14.00<br>
                Kamis 08.00–14.00<br></p>
              </div>
              <div class="col-md-4" align="center">
                <p ><h4><b>Maps</b></h4></p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15931.47669522639!2d104.8329763!3d-3.3821266!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x233e5be7a39c3cbe!2sPDAM+Kab.Ogan+Komering+Ilir+%22Tirta+Agung%22!5e0!3m2!1sid!2s!4v1548362226902" width="300" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
              </div>
            </div>
          </div>
      </footer>
    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
    <script src="plugins/highchart/js/highcharts.js"></script>
    <script src="plugins/highchart/js/modules/data.js"></script>
    <script src="plugins/highchart/js/modules/exporting.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>

    <script src="dist/js/pages/demo.js"></script>

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

