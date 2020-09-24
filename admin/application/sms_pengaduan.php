<div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Pengaduan Terjadwal</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-striped">
                    <thead>
                       <tr>
                        <th style='width:30px'>No</th>
                        <th>No sambungan </th>
                        <th>Cabang </th>
                        <th>No Telepon </th>
                        <th>Jenis </th>
                        <th>Tanggal pengaduan </th>
                        <th>Tanggal survei</th>
                        <th style='width:40px'>Status</th>
                        <th style="text-align: center;">kirim sms</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='terjadwal' AND status_sms=' '  ");
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    
                    echo "<tr><td>$no</td>
                              <td>$r[no_sambungan]</td>
                              <td>$r[cabang]</td>
                              <td>$r[nohp]</td>
                              <td>$r[jenis]</td>
                              <td bgcolor='bluesoft'>$r[tgl_pengaduan] </td>
                               <td bgcolor='greensoft'>$r[tgl_survei]</td>
                              <td bgcolor='yellow'>$r[status_pengaduan]</td>                             
                              <td align='center'><a href='index.php?view=sms_pengaduan&id_pengaduan=$r[id_pengaduan]&tgl=$r[tgl_survei]&jenis=$r[jenis]' class='fa fa-send'></a></td>
                          </tr>";
                      $no++;
                      }if (isset($_GET[id_pengaduan])) {
                         mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE pengaduan SET status_sms='smsselesai' where id_pengaduan='$_GET[id_pengaduan]'");
                           $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' AND id_pengaduan='$_GET[id_pengaduan]' ");
                           $no = 1;
                           $r=mysqli_fetch_array($tampil);
                           $jenis=$_GET['jenis'];
                           $tgl=$_GET['tgl'];                      
                           $pesan="pengaduan ".$jenis." akan di survei pada tgl ".$tgl;
                          $m = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT ID FROM phones ORDER BY ID DESC LIMIT 1"));
                        $hasil = mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO outbox (DestinationNumber, SenderID, TextDecoded, CreatorID) VALUES ('$r[nohp]', '$m[ID]', '$pesan', 'Gammu 1.28.90')");
                       if ($hasil){

                          echo "<script>document.location='index.php?view=sms_pengaduan';</script>";
                        }
                  }
                  ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
</div>s

<div class="col-xs-12">  
              <div class="box table-responsive">
                <div class="box-header">
                  <h3 class="box-title">Data Pengaduan Selesai</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table class="table table-responsive ">
                    <thead>
                       <tr>
                        <th style='width:30px'>No</th>
                        <th>No sambungan </th>
                        <th>Cabang </th>
                        <th>No Telepon </th>
                        <th>Jenis </th>
                        <th>Tanggal pengaduan </th>
                        <th>Tanggal survei</th>
                        <th style='width:40px'>Status</th>
                        <th style="text-align: center;">kirim sms</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' AND status_sms!='smsselesai'  ");
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    
                    echo "<tr><td>$no</td>
                              <td>$r[no_sambungan]</td>
                              <td>$r[cabang]</td>
                              <td>$r[nohp]</td>
                              <td>$r[jenis]</td>
                               <td bgcolor='bluesoft'>$r[tgl_pengaduan] </td>
                               <td bgcolor='greensoft'>$r[tgl_survei]</td>
                              <td bgcolor='yellow'>$r[status_pengaduan]</td>    
                              <td align='center'><a href='index.php?view=sms_pengaduan&id_pengaduan=$r[id_pengaduan]&jenis=$r[jenis]&tgl=$r[tgl_pengaduan]' class='fa fa-send'></a></td>
                          </tr>";
                      $no++;
                      }if (isset($_GET[id_pengaduan])) {
                         mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE pengaduan SET status_sms='smsselesai' where id_pengaduan='$_GET[id_pengaduan]'");
                           $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' AND id_pengaduan='$_GET[id_pengaduan]' ");
                           $no = 1;
                           $r=mysqli_fetch_array($tampil);
                           $jenis=$_GET['jenis'];
                           $tgl=$_GET['tgl'];
                            $isi='telah selesai diperbaiki info lanjut kunjungi website';
                           $pesan="pengaduan ".$jenis." pada tgl ".$tgl." ".$isi;
                          $m = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT ID FROM phones ORDER BY ID DESC LIMIT 1"));
                        $hasil = mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO outbox (DestinationNumber, SenderID, TextDecoded, CreatorID) VALUES ('$r[nohp]', '$m[ID]', '$pesan', 'Gammu 1.28.90')");
                       if ($hasil){

                          echo "<script>document.location='index.php?view=sms_pengaduan';</script>";
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
                  <h3 class='box-title'>Kirimkan SMS Pengaduan Selesai</h3>
                </div>
              <div class='box-body'>";
                  if (isset($_POST['submit2'])){
                      $sms = $_POST['sms'];
                      $query = "SELECT * from pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai'";                                          
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
                    <tr><th scope='row'>Isi Pesan</th>            <td><textarea rows='6' class='form-control' name='sms' placeholder='Tuliskan Pesan anda (Max 160 Karakter)...' onKeyDown=\"textCounter(this.form.pesan,this.form.countDisplay);\" onKeyUp=\"textCounter(this.form.pesan,this.form.countDisplay);\" required> </textarea>
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