          
            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Hasil cek </h3> 
                  <div class="pull-right">
                   <form  action="print_cekberkala.php">
                  <button class='btn btn-success fa fa-print'> cetak</button>                  
                   <select class="  btn-sm" name="cabang">
                        <option>--all--</option>
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
                        <option>bungin tinggi</option>
                      </select>
                   <select class=' btn-sm' name="tgl">
                        <option>--all--</option>

                   <?php 
                      $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from cek_berkala ORDER BY id_cek DESC");
                       while($r=mysqli_fetch_array($tampil)){
                   ?>
                     <option><?php echo $r[jadwal];?> </option>
                    <?php } ?>

                   </select>
                 </form>
                 </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php 
                  if (isset($_GET['sukses'])){
                      echo "<div class='alert alert-success alert-dismissible fade in' role='alert'> 
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>×</span></button> <strong>Sukses!</strong> - Data telah Berhasil Di simpan,..
                          </div>";
                  }elseif(isset($_GET['gagal'])){
                      echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'> 
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>×</span></button> <strong>Gagal!</strong> - Data gagal disimpan,..
                          </div>";
                  }
                ?>

            
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:30px'>No</th>
                        <th>No sambungan </th>
                        <th>Nama </th>
                        <th>Alamat </th>
                        <th>Cabang</th>
                        <th>Stand Meter</th>
                        <th>Stop kran</th>
                        <th>Selang Penghubung</th>
                        <th>stand</th>
                        <th>jadwal</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from hasil_cek inner join cek_berkala on hasil_cek.id_cek = cek_berkala.id_cek inner join pelanggan on hasil_cek.id_pelanggan = pelanggan.id_pelanggan ORDER BY id_hasil DESC");
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    echo "<tr><td>$no</td>
                              <td>$r[no_sambungan]</td>
                              <td>$r[nama]</td>
                              <td>$r[alamat]</td>
                              <td>$r[cabang]</td>
                              <td>$r[stand_meter]</td>
                              <td>$r[stop_keran]</td>
                              <td>$r[selang_penghubung]</td>
                              <td>$r[stand]</td>
                              <td>$r[jadwal]</td>
                          </tr>";
                      $no++;
                      }
                  ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
