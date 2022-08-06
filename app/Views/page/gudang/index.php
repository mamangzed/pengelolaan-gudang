




 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Stok Gudang <?php if($laporan == true) :  ?> <a href="<?= route_to('exportGudang') ?>"  class="btn btn-primary float-right" style="margin-top:8 px"><i class="fa fa-print"></i>ExportToExcel</a> <?php endif; ?></h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Kode Barang</th>
                                  <th>Nama Barang</th>											
                                  <th>Jenis Barang</th>
                                  
                                  <th>Jumlah Barang</th>
                                  <th>Satuan</th>
                                  <th>Pengaturan</th>
                               
                              </tr>
                              </thead>
                              
     
        <tbody>
          <?php 
                          
                          $no = 1;
                          foreach ($gudang as $data) {
                              
                          ?>
                          
                              <tr>
                                  <td><?php echo $no++; ?></td>
                                  <td><?php echo $data['kode_barang'] ?></td>
                                  <td><?php echo $data['nama_barang'] ?></td>
                                  <td><?php echo $data['jenis_barang'] ?></td>
                                  
                                  <td><?php echo $data['jumlah'] ?></td>
                                  <td><?php echo $data['satuan'] ?></td>
                      

                                  <td>
                                  <a href="./gudang/edit/<?php echo $data['id'] ?>" class="btn btn-success" >Ubah</a>
                                  <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="./gudang/hapus/<?php echo $data['id'] ?>" class="btn btn-danger" >Hapus</a>
                                  </td>
                              </tr>
                          <?php }?>

                                 </tbody>
                      </table>
                      <?php if($laporan == false) : ?>
                      <a href="<?= route_to('tambahGudang') ?>" class="btn btn-primary" >Tambah Data Barang</a>
                      <?php endif ?>
        </tbody>    
      </table>
    </div>
  </div>
</div>

</div>












