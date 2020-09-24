<div class="col-md-12" align="center">
<p><h2>Pengumuman</h2></p>
        <table id="example1" class="table table-bordered table-striped">
                  <?php 
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pengumuman ORDER BY id_pengumuman DESC");
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    echo "<tr><td><b>$no</b></td>
                              <td align='right'><img src='../images/$r[foto]' width='100'></td>
                              <td><h4><b>$r[judul] </b></h4><br> $r[isi]<br>$r[tanggal]</td>
                          </tr>";
                      $no++;
                      }?>
           </tbody>
       </table>
</div>
