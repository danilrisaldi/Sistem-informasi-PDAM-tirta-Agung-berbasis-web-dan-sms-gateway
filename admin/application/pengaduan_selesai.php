        <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Pengaduan Selesai</h3>
                  <form  action="print_pengaduan.php">
                  <p class="pull-right">
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
                       <select class=" btn-sm" name="tahun">
                            <option>--all--</option>
                        <?php for ($i=2010; $i <2021; $i++) { 
                           echo "<option>$i</option>";
                        } ?>
                      </select>
                      <select class=" btn-sm" name="bulan">
                            <option>--all--</option>
                        <?php for ($ii=1; $ii <13 ; $ii++) {
                            echo "<option>$ii</option>";
                        } ?>
                      </select>
                    </p>
                    </form>
                </div><!-- /.box-header -->
                <div class="box-body">
                   <div class="table-responsive ">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                       <tr>
                        <th style='width:30px'>No</th>
                        <th>No sambungan </th>
                        <th>Nama </th>
                        <th>Alamat </th>
                        <th>Cabang </th>
                        <th>No Telepon </th>
                        <th>Jenis </th>
                        <th>Deskripsi </th>
                        <th>Foto pengaduan </th>
                        <th>Tanggal pengaduan </th>
                        <th style='width:40px'>Status</th>
                        <th >Nama survei</th>
                        <th >Note survei</th>
                        <th>foto survei</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from pengaduan inner join pelanggan on pengaduan.id_pelanggan = pelanggan.id_pelanggan where status_pengaduan='selesai' ");
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    
                    echo "<tr><td>$no</td>
                              <td>$r[no_sambungan]</td>
                              <td>$r[nama]</td>
                              <td>$r[alamat]</td>
                              <td>$r[cabang]</td>
                              <td>$r[nohp]</td>
                              <td>$r[jenis]</td>
                              <td>$r[deskripsi]</td>
                              <td><img src='../images/$r[foto_pengaduan]' width='200' height='100'></td>
                              <td>$r[tgl_pengaduan] </td>
                              <td bgcolor='yellow'>$r[status_pengaduan]</td>
                              <td>-$r[nama_survei]</td>
                              <td>-$r[note_survei]</td>
                              <td><img src='../images/$r[foto_survei]' width='200' height='100'></td>
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
