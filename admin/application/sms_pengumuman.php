<div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Pengumuman </h3>
                </div><!-- /.box-header -->
                <div class="box-body">               
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style='width:30px'>No</th>
                        <th>Judul </th>
                        <th>Isi </th>
                        <th>Foto </th>
                        <th>Tanggal </th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pengumuman ORDER BY id_pengumuman ASC limit 2");
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    echo "<tr><td>$no</td>
                              <td>$r[judul]</td>
                              <td>$r[isi]</td>
                              <td><img src='../images/$r[foto]' width='40'></td>
                              <td>$r[tanggal]</td>                             
                          </tr>";
                      $no++;
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
                      $sms = $_POST['sms'];
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