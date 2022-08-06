<?= $this->include('layout/head.php') ?>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?= $this->include('layout/sidebar.php') ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

		<?= $this->include('layout/topbar.php') ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
		
		 <section class="content">
	
            <?= $this->include('alert/alert.php') ?>
            <?= $this->renderSection('content') ?>
    

    </section>

 
</div>
      <!-- End of Main Content -->
  
    <?= $this->include('layout/footer.php') ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
  </div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->

 <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url() ?>/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url() ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url() ?>/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url() ?>/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url() ?>/js/demo/datatables-demo.js"></script>
  
    <!--script for this page-->

  <?= $this->renderSection('addJs') ?>

</body>

</html>
