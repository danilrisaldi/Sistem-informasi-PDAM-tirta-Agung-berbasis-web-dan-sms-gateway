        <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Jadwal </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table  table-striped">
                    <thead>
                     <tr>
                        <th style='width:30px'>No</th>
                        <th width="100">jadwal</th>
                        <th>pesan</th>
                        <th style='width:100px'>hasil cek</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from cek_berkala");
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    echo "<tr><td>$no</td>
                              <td>$r[jadwal]</td>
                              <td>$r[pesan]</td>
                              <td><center>
                                <a class='btn btn-primary btn-xs' title='Masukan Jadwal' href='index.php?view=formdatapelanggan&id_cek=$r[id_cek]&jadwal=$r[jadwal]'><span class='glyphicon glyphicon-pencil'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                      }

                  ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
  </div>