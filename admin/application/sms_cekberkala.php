<div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Jadwal Cek Berkala </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table  table-responsive">
                    <thead>
                      <tr>
                        <th style='width:30px'>No</th>
                        <th>Jadwal </th>
                        <th>pesan</th>
                        <th>kirim sms jadwal</th>
                        <th>kirim sms hasil</th>
                      </tr>

                    </thead>
                    <tbody>
                  <?php 
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM cek_berkala ORDER BY id_cek DESC");
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    echo "<tr><td>$no</td>
                              <td>$r[jadwal]</td>
                              <td>$r[pesan]</td>  
                              <td><a href='index.php?view=sms_cekberkala&smsjadwal=$r[jadwal]' class='fa fa-send'></a></td>
                              <td><a href='index.php?view=sms_cekberkala&smshasil=$r[jadwal]' class='fa fa-send'></a></td>                           
                          </tr>";
                      $no++;
                      }
                      if (isset($_GET[smsjadwal])){
                        $jadwal=$_GET['smsjadwal'];
                        $sms="INFORMASI                              pada tgl ".$jadwal." akan dilaksanakan cek berkala";
                         $query = "SELECT * FROM pelanggan";
                         $hasil = mysqli_query($GLOBALS["___mysqli_ston"], $query);
                          while ($data = mysqli_fetch_array($hasil)){
                          $nohp = $data['nohp']; 
                         sendsms($nohp, $sms, '');   
                       }
                       if ($hasil){
                          echo "<div class='alert alert-success alert-dismissible fade in' role='alert'> 
                              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>×</span></button> <strong>Success!</strong> - ".mysqli_num_rows($hasil)." Pesan SMS dikirim,...
                              </div>";
                       }else{
                          echo "<center style='color:red; padding:15px 0px'>Pengiriman SMS gagal,...</center>";
                        } 
                      }

                      if (isset($_GET[smshasil])){
                         $query = "SELECT * from hasil_cek inner join cek_berkala on hasil_cek.id_cek = cek_berkala.id_cek inner join pelanggan on hasil_cek.id_pelanggan = pelanggan.id_pelanggan ORDER BY id_hasil DESC";
                         $hasil = mysqli_query($GLOBALS["___mysqli_ston"], $query);
                          while ($data = mysqli_fetch_array($hasil)){
                          $nohp = $data['nohp'];
                          $stand_meter= $data['stand_meter'];
                          $stop_keran= $data['stop_keran'];
                          $selang_penghubung= $data['selang_penghubung']; 
                          $jadwal=$data['jadwal'];
                        $sms="INFORMASI cek berkala pada tgl ".$jadwal." stand meter ".$stand_meter.", stop kran ".$stop_keran.", selang penghubung ".$selang_penghubung;
                         sendsms($nohp, $sms, '');   
                       }
                       if ($hasil){
                          echo "<div class='alert alert-success alert-dismissible fade in' role='alert'> 
                              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>×</span></button> <strong>Success!</strong> - ".mysqli_num_rows($hasil)." Pesan SMS dikirim,...
                              </div>";
                       }else{
                          echo "<center style='color:red; padding:15px 0px'>Pengiriman SMS gagal,...</center>";
                        } 
                      }
                     
                  ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>

<?php
    echo "<form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
            <div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Kirimkan Banyak Pesan Singkat (SMS)</h3>
                </div>
              <div class='box-body'>";
                  if (isset($_POST['submit2'])){
                      $tambahan = $_POST['sms'];
                      $cabang = $_POST['cabang'];                  
                      if ($cabang == "Semua"){
                          $query = "SELECT * FROM pelanggan";
                      }else{
                          $query = "SELECT * from  pelanggan  where cabang='$cabang'";
                      }                      
                      $hasil = mysqli_query($GLOBALS["___mysqli_ston"], $query);
                      while ($data = mysqli_fetch_array($hasil)){
                      $nohp = $data['nohp']; 
                        sendsms($nohp, $sms, '');   
                      }
                        if ($hasil){
                          echo "<div class='alert alert-success alert-dismissible fade in' role='alert'> 
                              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>×</span></button> <strong>Success!</strong> - ".mysqli_num_rows($hasil)." Pesan SMS dikirim,...
                              </div>";
                       }else{
                          echo "<center style='color:red; padding:15px 0px'>Pengiriman SMS gagal,...</center>";
                        } 
                  }

                echo "<table class='table table-condensed table-bordered'>
                  <tbody>
                  	<tr><th width=120px scope='row'>Cabang</th>  <td>
                        <select class='form-control' name='cabang'>
                        <option>Semua</option>
                        <option >sp padang</option>
                        <option>tanjung lubuk</option> 
                        <option>pedamaran</option>
                        <option>pampangan</option>
                        <option>pangarayan</option>
                        <option>tulung selapan</option> 
                        <option>mesuji</option>
                        <option>serinanti</option>
                        <option>pk lampam</option>
                        <option>tugumulyo</option>
                        <option>jejawi</option>
                        <option>kandis</option>
                        <option>bungin tinggi</option>";
                     
                    echo "</select></td></tr>
                    <tr><th scope='row'>Isi Pesan</th>           	<td><textarea rows='6' class='form-control' name='sms' placeholder='Tuliskan Pesan anda (Max 160 Karakter)...' onKeyDown=\"textCounter(this.form.pesan,this.form.countDisplay);\" onKeyUp=\"textCounter(this.form.pesan,this.form.countDisplay);\" required></textarea>
                    													<input type='number' name='countDisplay' size='3' maxlength='3' value='160' style='width:10%; text-align:center; border:1px solid #cecece; margin-top:4px' readonly> Sisa Karakter</td></tr>
                  </tbody>
                  </table>
              </div>

              <div class='box-footer'>
                    <button type='submit' name='submit2' class='btn btn-info'>Kirimkan Pesan</button>
                    <button type='reset' class='btn btn-default pull-right'>Reset</button>
              </div>
            </div>
          </form>";