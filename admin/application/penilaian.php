        <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Penilaian </h3>
                  <form  action="print_penilaian.php">
                  <p class="pull-right">
                   <button class='btn btn-success fa fa-print'> cetak</button> 
                    <select class="  btn-sm" name="tahun">
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
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                       <tr>
                        <th style='width:30px'>No</th>
                        <th>Tanggal pengaduan </th>
                        <th>Jenis </th>
                        <th >Nilai</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from penilaian inner join pengaduan on penilaian.id_pengaduan = pengaduan.id_pengaduan where status_pengaduan='selesai' ");
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    
                    echo "<tr><td>$no</td>
                              <td>$r[tgl_pengaduan] </td>
                              <td>$r[jenis]</td>
                              <td>$r[nilai]</td>
                              
                          </tr>";
                      $no++;
                      }
                      
                  ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
