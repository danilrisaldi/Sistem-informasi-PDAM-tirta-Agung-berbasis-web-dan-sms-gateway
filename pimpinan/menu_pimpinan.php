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
            <li><a href="index.php?view=pelanggan"><i class="fa fa-user-circle"></i> <span>Pelanggan</span></a></li>
            <li><a href="index.php?view=cek_berkala"><i class="fa fa-calendar-plus-o"></i> <span>Cek Berkala</span></a></li>
            <li><a href="index.php?view=pengaduan"><i class="fa fa-bullhorn"></i> <span>Pengaduan</span></a></li>
             <li><a href="index.php?view=penilaian"><i class="fa fa-star"></i> <span>Penilaian</span></a></li>
          </ul>
        </section>