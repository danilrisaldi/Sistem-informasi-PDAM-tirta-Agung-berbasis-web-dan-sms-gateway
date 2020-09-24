        <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data pelanggan </h3><br>
                   <small>cabang <?php echo $cabang; ?> </small>
                    <form action="konten/print_pelanggan.php">
                    <button class='pull-right btn btn-success fa fa-print'> cetak</button>
                    <input type="hidden" name="cabang" value="<?php echo $cabang; ?>">
                   </form>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:30px'>No</th>
                        <th>No sambungan </th>
                        <th>Nama </th>
                        <th>Alamat </th>
                        <th>No HP </th>
                        <th>Tanggal </th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pelanggan where cabang ='$cabang' ORDER BY tgl_pelanggan DESC");
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    echo "<tr><td>$no</td>
                              <td>$r[no_sambungan]</td>
                              <td>$r[nama]</td>
                              <td>$r[alamat]</td>
                              <td>$r[nohp]</td>
                              <td>$r[tgl_pelanggan]</td>
                          </tr>";
                      $no++;
                      }
                  ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
