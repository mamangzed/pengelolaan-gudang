   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= route_to('dashboard') ?>">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-building"></i>
  </div>
  <div class="sidebar-brand-text mx-2"><?= getenv('NAME') ?></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">






<!--sidebar start-->

<li class="d-flex align-items-center justify-content-center">
  <a class="nav-link">
   <img src="https://cdn.icon-icons.com/icons2/2468/PNG/512/user_kids_avatar_user_profile_icon_149314.png" style="border-radius: 50%;" class="img-circle" width="80" alt="User"/></a>
    <li class="d-flex align-items-center justify-content-center">
    </li>
</li>
   <li class="nav-item ">
  <a class="nav-link">
       <div class="d-flex align-items-center justify-content-center" class="name">  <?= $user->nama ?></div>
      <div class="d-flex align-items-center justify-content-center" class="email"><strong> <?= $user->level ?></strong></div>
   </a>
</li>




<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="<?= route_to('dashboard') ?>">
    <i class="fas fa-fw fa-home"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Pilih Menu
</div>

<!-- Nav Item - Pages Collapse Menu -->


  <li class="nav-item active">
  <a class="nav-link" href="<?=route_to('pengguna') ?>">
    <i class="fas fa-fw fa-home"></i>
    <span>Data Pengguna</span></a>
</li>


 <li class="nav-item active">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseData" aria-expanded="true" aria-controls="collapseData">
    <i class="fas fa-fw fa-folder"></i>
    <span>Data Master</span>
  </a>
  <div id="collapseData" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Menu:</h6>
      <a class="collapse-item" href="<?= route_to('gudang') ?>">Data Barang</a>
      <a class="collapse-item" href="<?= route_to('jenisBarang') ?>">Jenis Barang</a>
      <a class="collapse-item" href="<?= route_to('satuanBarang') ?>">Satuan Barang</a>
       <a class="collapse-item" href="<?= route_to('supplier') ?>">Data Supplier</a>
     
    </div>
  </div>
</li>



  <li class="nav-item active">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-folder"></i>
    <span>Transaksi</span>
  </a>
  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Menu:</h6>
      <a class="collapse-item" href="<?= route_to('barangMasuk') ?>">Barang Masuk</a>
      <a class="collapse-item" href="<?= route_to('barangKeluar') ?>">Barang Keluar</a>
      <?php if($user->level == 'admin' || $user->level == 'superadmin') : ?>
      <h6 class="collapse-header">Approve:</h6>
      <a class="collapse-item" href="<?= route_to('approveKeluar') ?>">Approve barang Keluar</a>
      <?php endif; ?>
    </div>
  </div>
</li>



    <!-- Heading -->
<div class="sidebar-heading">
  Laporan
</div>



   <li class="nav-item active">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan" aria-expanded="true" aria-controls="collapseLaporan">
    <i class="fas fa-fw fa-folder"></i>
    <span>Laporan</span>
  </a>
  <div id="collapseLaporan" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Menu Laporan:</h6>
      <a class="collapse-item" href="<?= route_to('laporanSupplier') ?>">Laporan Supplier</a>
      <a class="collapse-item" href="<?= route_to('laporanGudang') ?>">Laporan Stok Gudang</a>
       <a class="collapse-item" href="<?= route_to('laporanBarangMasuk') ?>">Laporan Barang Masuk</a>
      <a class="collapse-item" href="<?= route_to('laporanBarangKeluar') ?>">Laporan Barang Keluar</a> 
    </div>
  </div>
</li>



<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->