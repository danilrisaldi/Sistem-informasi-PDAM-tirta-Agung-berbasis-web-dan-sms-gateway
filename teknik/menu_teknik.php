        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../images/<?php echo $foto; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $nama; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header" style='color:#fff; text-transform:uppercase; border-bottom:2px solid #00c0ef'>MENU <?php echo $level; ?></li>
            <li><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li><a href="index.php?view=pengaduan_masuk"><i class="fa fa-comment"></i> <span>pengaduan masuk</span></a></li>
            <li class="treeview">
              <a href="#"><i class="fa  fa-calendar-times-o"></i> <span> jadwal</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                 <li><a href="index.php?view=input_jadwal"><i class="fa fa-calendar-plus-o"></i> input jadwal <span class="badge"><?php echo $input_jadwal[total]; ?></span></a></li>
                 <li><a href="index.php?view=lihat_jadwal"><i class="fa fa-calendar-check-o"></i> lihat jadwal<span class="badge"><?php echo $lihat_jadwal[total]; ?></span></a></li>
              </ul>
            </li>
             <li class="treeview">
              <a href="#"><i class="fa fa-th-list"></i> <span> Survei</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                 <li><a href="index.php?view=input_note"><i class="fa fa-pencil"></i>input Note survei <span class="badge"><?php echo $input_note[total]; ?></span></a></li>
                 <li><a href="index.php?view=lihat_note"><i class="fa fa-search"></i>lihat note survei<span class="badge"><?php echo $lihat_note[total]; ?></span></a></li>
              </ul>
            </li>
            <li><a href="index.php?view=perbaikan_selesai"><i class="fa fa-wrench"></i>  <span>Perbaikan Selesai <?php echo $perbaikan_selesai[total]; ?></span></a></li>
            <li><a href="index.php?view=riwayat"><i class="fa  fa-history"></i><span>riwayat</span></a></li>
          </ul>
        </section>