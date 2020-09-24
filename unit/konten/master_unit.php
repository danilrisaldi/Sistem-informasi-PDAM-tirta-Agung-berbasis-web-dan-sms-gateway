<?php if ($_GET[act]==''){ ?> 
            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Users </h3>
                  <a class='pull-right btn btn-primary btn-sm' href='index.php?view=admin&act=tambah'>Tambahkan Data Users</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php 
                  if (isset($_GET['sukses'])){
                      echo "<div class='alert alert-success alert-dismissible fade in' role='alert'> 
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>×</span></button> <strong>Sukses!</strong> - Data telah Berhasil Di Proses,..
                          </div>";
                  }elseif(isset($_GET['gagal'])){
                      echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'> 
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>×</span></button> <strong>Gagal!</strong> - Data tidak Di Proses, terjadi kesalahan dengan data..
                          </div>";
                  }
                ?>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
<?php 
}elseif($_GET[act]=='edit'){
    if (isset($_POST[update])){
      $data = md5($_POST[b]);
      $passs=hash("sha512",$data);
      if (trim($_POST[b])==''){
        $query = mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE users SET username = '$_POST[a]',
                                         nama_lengkap = '$_POST[c]',
                                         level='$_POST[e]' where id_user='$_POST[id]'");
      }else{
        $query = mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE users SET username = '$_POST[a]',
                                         password = '$passs',
                                         nama_lengkap = '$_POST[c]',
                                         level='$_POST[e]' where id_user='$_POST[id]'");
      }
      if ($query){
            echo "<script>document.location='index.php?view=dashboard';</script>";
      }else{
            echo "<script>document.location='index.php?view=master_unit&act=edit';</script>";
      }

    }
    $edit = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM users a where a.id_user='$_GET[id]'");
    $s = mysqli_fetch_array($edit);
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data Administrator</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$s[id_user]'>
                    <tr><th width='120px' scope='row'>Username</th> <td><input type='text' class='form-control' name='a' value='$s[username]'> </td></tr>
                    <tr><th scope='row'>Password</th>               <td><input type='text' class='form-control' name='b' placeholder='Kosongkan saja Jika Password tidak diganti,...'></td></tr>
                    <tr><th scope='row'>Nama Lengkap</th>           <td><input type='text' class='form-control' name='c' value='$s[nama_lengkap]'></td></tr>
                      <tr><th scope='row'>level</th>              <td><select class='form-control' name='e' readonly='readonly'><option>unit</option></td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='update' class='btn btn-info'>Update</button>
                    <a href='index.php?view=dashboard'><button class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
              </form>
            </div>";
}
?>