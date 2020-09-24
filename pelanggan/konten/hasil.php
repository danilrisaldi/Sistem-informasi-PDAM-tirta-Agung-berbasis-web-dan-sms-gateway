<div class="col-xs-12">
             <div class="box">
                <div class="box-header" align="center">
                  <h2 class="box-title">Hasil Cek Berkala </h2>
                 </div><!-- /.box-header -->
                  <div class="box-body table-responsive no-padding">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:30px'>No</th>
                        <th>No Stand </th>
                        <th>Nama </th>
                        <th>Alamat </th>
                        <th>Stand Meter</th>
                        <th>Stop kran</th>
                        <th>Selang Penghubung</th>
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
                              <td>$r[stand_meter]</td>
                              <td>$r[stop_keran]</td>
                              <td>$r[selang_penghubung]</td>
                              <td>$r[jadwal]</td>
                          </tr>";
                      $no++;
                      }
                  ?>
                    </tbody>
                  </table>
                </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
</div>
 <br>