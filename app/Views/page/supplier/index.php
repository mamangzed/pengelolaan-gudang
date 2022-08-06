<!-- Begin Page Content -->
 <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Supplier <?php if($laporan == true) :  ?> <a href="<?= route_to('exportSupplier') ?>"  class="btn btn-primary float-right" style="margin-top:8 px"><i class="fa fa-print"></i>ExportToExcel</a> <?php endif; ?></h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Kode Supplier</th>
                                  <th>Nama Supplier</th>
                                  <th>Alamat</th>
                                  <th>Telepon</th>
                                  <th>Pengaturan</th>
                               
                              </tr>
                              </thead>
                              
     
        <tbody>
          <?php 
                          
                          $no = 1;
                          foreach ($supplier as $data) {
                              
                          ?>
                          
                              <tr>
                                  <td><?php echo $no++; ?></td>
                                  <td><?php echo $data['kode_supplier'] ?></td>
                                  <td><?php echo $data['nama_supplier'] ?></td>
                                  <td><?php echo $data['alamat'] ?></td>
                                  <td><?php echo $data['telepon'] ?></td>
                               

                                  <td>
                                  <a href="/supplier/edit/<?php echo $data['id'] ?>" class="btn btn-success" >Ubah</a>
                                  <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="/supplier/hapus/<?php echo $data['id'] ?>" class="btn btn-danger" >Hapus</a>
                                  </td>
                              </tr>
                          <?php }?>

                                 </tbody>
                      </table>
                      <?php if($laporan == false || $laporan != true) : ?>
                      <a href="?page=supplier&aksi=tambahsupplier" class="btn btn-primary" >Tambah Data Supplier</a>
                      <?php endif ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
