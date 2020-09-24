<div class="col-xs-12">
             <div class="box">
                <div class="box-header" align="center">
                  <h2 >Jadwal Cek Berkala </h2>
                 </div><!-- /.box-header -->
                <div class="box-body">
                  <table   id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:30px'>No</th>
                        <th>Jadwal </th>
                        <th>pesan</th>
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
                          </tr>";
                      $no++;
                      }
                  ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
 </div>