




 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Jenis Barang</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
                              <tr>
                                  <th width="10px">No</th>
                                  <th>Jenis Barang</th>
                              </tr>
                              </thead>
                              
     
        <tbody>
          <?php 
                          
                          $no = 1;
                          foreach ($jenis as $data) {
                              
                          ?>
                          
                              <tr>
                                  <td><?php echo $no++; ?></td>
                                  <td><?php echo $data['jenis_barang'] ?></td>
                              </tr>
                          <?php }?>

                                 </tbody>
                      </table>
                      <a href="<?= route_to('tambahJenisBarang') ?>" class="btn btn-primary" >Tambah Jenis Barang</a>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>












