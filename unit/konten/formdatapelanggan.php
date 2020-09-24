<?php if ($_GET[act]==''){ ?> 
            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Input Hasil Cek </h3>
                 
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
                        <th>Cabang </th>                        
                        <th style='width:40px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                  $jadwal=$_GET['jadwal'];
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  pelanggan  where cabang='$cabang' ORDER BY tgl_pelanggan DESC");
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    echo "<tr><td>$no</td>
                              <td>$r[no_sambungan]</td>
                              <td>$r[nama]</td>
                              <td>$r[alamat]</td>
                              <td>$r[cabang]</td>
                              <td><center>
                                <a class='btn btn-success btn-xs' title='input hasil' href='index.php?view=formdatapelanggan&act=input&id_pelanggan=$r[id_pelanggan]&id_cek=$_GET[id_cek]'><span class='glyphicon glyphicon-pencil'></span></a>
                               
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
<?php 
}elseif($_GET[act]=='input'){
    if (isset($_POST[simpan])){
       
        $query = mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO hasil_cek VALUES('','$_POST[stand_meter]','$_POST[stop_kran]','$_POST[selang_penghubung]','$_POST[stand]','$_POST[id_cek]','$_POST[id_pelanggan]')");

        if ($query){
            echo "<script>document.location='index.php?view=formdatapelanggan&id=$_GET[id_cek]&sukses';</script>";
        }else{
            echo "<script>document.location='index.php?view=formdatapelanggan&gagal';</script>";
        }
    }
    $hasil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pelanggan where id_pelanggan='$_GET[id_pelanggan]'");
    $s = mysqli_fetch_array($hasil);
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Input hasil</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                   <tbody>
                        <tr><th width='120px' scope='row'>id pelanggan</th> <td><input type='text' class='form-control' name='id_pel' value='$s[id_pelanggan]' readonly='readonly'> </td></tr>
                     <tr><th width='120px' scope='row'>no sambungan</th> <td><input type='text' class='form-control' name='no_sambungan' value='$s[no_sambungan]' readonly='readonly'> </td></tr>
                    <tr><th width='120px' scope='row'>Nama </th> <td><input type='text' class='form-control' name='nama' value='$s[nama]' readonly='readonly'> </td></tr>
                    <tr><th width='120px' scope='row'>Alamat </th> <td><input type='text' class='form-control' name='alamat' value='$s[alamat]' readonly='readonly'> </td></tr>

                    <tr><th width='200px' scope='row'>stan meter</th> 
                        <td> <input type='radio' name='stand_meter' value='normal' checked='checked'> normal 
                             <input type='radio' name='stand_meter' value='bermasalah' >  bermasalah 
                             <input type='radio' name='stand_meter' value='rusak' >   rusak
                        </td></tr>

                     <tr><th width='200px' scope='row'>stop kran</th>
                     <td><input type='radio' name='stop_kran' value='normal' checked='checked'> normal 
                         <input type='radio' name='stop_kran' value='bermasalah' >  bermasalah 
                         <input type='radio' name='stop_kran' value='rusak' >  rusak
                     </td></tr>
                    <tr><th width='200px' scope='row'>selang penghubung </th>
                    <td>
                   <input type='radio' name='selang_penghubung' value='normal' checked=''> normal 
                   <input type='radio' name='selang_penghubung' value='bermasalah' >  bermasalah 
                   <input type='radio' name='selang_penghubung' value='rusak'>  rusak
                    </td></tr>
                    <tr><th width='120px' scope='row'>stand </th> <td><input type='text' class='form-control' name='stand' > </td></tr>
                   <input type='hidden' class='form-control' name='id_cek' value='$_GET[id_cek]'>
                   <input type='hidden' class='form-control' name='id_pelanggan' value='$_GET[id_pelanggan]'>
 
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='simpan' class='btn btn-info'>Simpan</button>
                   <button type='reset' class='btn btn-default pull-right'>Batal</button>
                    
                  </div>
              </form>
            </div>";
}
?>