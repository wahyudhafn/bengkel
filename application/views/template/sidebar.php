<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="<?php echo site_url('servis'); ?>" class="brand-link">
    <i class="fas fa-car-crash fa-2x"></i>
    <span class="brand-text font-weight-light">Bengkel</span>
  </a>
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <a href="#" class="d-block"><?php echo $this->session->userdata('nama_lengkap'); ?></a>
      </div>
    </div>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="<?php echo site_url('servis'); ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-header">MASTER DATA</li>
        <li class="nav-item">
          <a href="<?php echo site_url('pelanggan'); ?>" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>Data Pelanggan</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo site_url('montir'); ?>" class="nav-link">
            <i class="nav-icon fas fa-user-cog"></i>
            <p>Data Montir</p>
          </a>
        </li>
        <li class="nav-header">TRANSAKSI</li>
        <li class="nav-item">
          <a href="<?php echo site_url('servis'); ?>" class="nav-link">
            <i class="nav-icon fas fa-tools"></i>
            <p>Order Servis</p>
          </a>
        </li>
        <li class="nav-item mt-2">
          <a href="<?php echo site_url('auth/logout'); ?>" class="nav-link bg-danger">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Logout</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>