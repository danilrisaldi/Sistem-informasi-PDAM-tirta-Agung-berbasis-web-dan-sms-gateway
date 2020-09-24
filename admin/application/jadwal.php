<?php if ($_GET[act]==''){ ?> 
            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Jadwal Cek Berkala </h3>
                  <a class='pull-right btn btn-primary btn-sm' href='index.php?view=jadwal&act=tambah'>Tambahkan Data</a>
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
                        <th>Jadwal </th>
                        <th>pesan</th>
                        <th style='width:40px'>Action</th>
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
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Edit Data jadwal' href='index.php?view=jadwal&act=edit&id_cek=$r[id_cek]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='index.php?view=jadwal&hapus=$r[id_cek]'><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                      }
                      if (isset($_GET[hapus])){
                          mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM cek_berkala where id_cek='$_GET[hapus]'"); echo "<script>document.location='index.php?view=jadwal';</script>";
                      }

                  ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
<?php 
}elseif($_GET[act]=='edit'){
    if (isset($_POST[update])){
  
        $query = mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE cek_berkala SET jadwal='$_POST[jadwal]',pesan = '$_POST[pesan]' where id_cek='$_POST[id_cek]'");
        if ($query){
            echo "<script>document.location='index.php?view=jadwal&sukses';</script>";
        }else{
            echo "<script>document.location='index.php?view=jadwal&gagal';</script>";
        }
    }
    $edit = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM cek_berkala where id_cek='$_GET[id_cek]'");
    $s = mysqli_fetch_array($edit);
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data Jadwal</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                   <tbody>
                        <input type='hidden' class='form-control' name='id_cek' value='$s[id_cek]' >
                     <tr><th width='120px' scope='row'>jadwal</th> <td><input type='date' class='form-control' name='jadwal' value='$s[jadwal]'> </td></tr>
                    <tr><th width='120px' scope='row'>pesan </th> <td><textarea  class='form-control' name='pesan'>$s[pesan] </textarea </td></tr>
                  
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='update' class='btn btn-info'>Update</button>
                   <button type='reset' class='btn btn-default pull-right'>Cancel</button>
                    
                  </div>
              </form>
            </div>";
}elseif($_GET[act]=='tambah'){
    if (isset($_POST[tambah])){
      $query = mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO cek_berkala VALUES('','$_POST[jadwal]','$_POST[pesan]')");
      if ($query){
            echo "<script>document.location='index.php?view=jadwal&sukses';</script>";
      }else{
            echo "<script>document.location='index.php?view=jadwal&gagal';</script>";
      }
    }

    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Data Jadwal</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                     <input type='hidden' class='form-control' name='id_cek'  >
                     <tr><th width='120px' scope='row'>jadwal</th> <td><input type='date' class='form-control' name='jadwal'> </td></tr>
                    <tr><th width='120px' scope='row'>pesan </th> <td><textarea  class='form-control' name='pesan'> </textarea </td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='tambah' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php?view=guru'><button class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
              </form>
            </div>";
}
?>