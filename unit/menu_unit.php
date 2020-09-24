        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../images/<?php echo $foto; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $nama; ?><br>
              <small><?php echo $cabang; ?></small></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header" style='color:#fff; text-transform:uppercase; border-bottom:2px solid #00c0ef'>MENU <?php echo $level; ?></li>
            <li><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li><a href="index.php?view=data_pelanggan"><i class="fa fa-th-list"></i> <span>data pelanggan</span></a></li>
             <li class="treeview">
              <a href="#"><i class="fa fa-th-list"></i> <span> Cek Berkala</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                 <li><a href="index.php?view=jadwal"><i class="fa fa-pencil"></i>Jadwal <span class="badge"><?php echo $input_note[total]; ?></span></a></li>
                 <li><a href="index.php?view=hasil"><i class="fa fa-search"></i>Hasil<span class="badge"><?php echo $lihat_note[total]; ?></span></a></li>
              </ul>
            </li>
          </ul>
        </section>