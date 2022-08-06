<!-- Begin Page Content -->
 <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Barang Masuk <?php if($laporan == true) :  ?> <a href="<?= route_to('exportBarangMasuk') ?>"  class="btn btn-primary float-right" style="margin-top:8 px"><i class="fa fa-print"></i>ExportToExcel</a> <?php endif; ?></h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Id Transaksi</th>
                                  <th>Tanggal Masuk</th>
                                  <th>Kode Barang</th>
                                  <th>Nama Barang</th>
                              
                                  <th>Pengirim</th>
                                  
                              
                              
                                  
                                  <th>Jumlah Masuk</th>
                                  <th>Satuan Barang</th>
                                  <th>Pengaturan</th>
                               
                              </tr>
                              </thead>
                              
     
        <tbody>
          <?php 
                          
                          $no = 1;
                          foreach($barang as $data) :    
                          ?>
                          
                              <tr>
                                  <td><?php echo $no++; ?></td>
                                  <td><?php echo $data['id_transaksi'] ?></td>
                                  <td><?php echo $data['tanggal'] ?></td>
                                  <td><?php echo $data['kode_barang'] ?></td>
                                  <td><?php echo $data['nama_barang'] ?></td>
                                  
                                  <td><?php echo $data['pengirim'] ?></td>
                          
                               
                                  <td><?php echo $data['jumlah'] ?></td>
                                  <td><?php echo $data['satuan'] ?></td>
                                  
                      

                                  <td>
                                  
                                  <a onclick="return confirm('Apakah anda yakin akan menghapus data dengan no transaksi <?php echo $data['id_transaksi'] ?> dengan nama barang <?php echo $data['nama_barang'] ?> ??')" href="<?= base_url('barang/masuk/hapus').'/'.$data['id'] ?>" class="btn btn-danger" >Hapus</a>
                                  </td>
                              </tr>
                          <?php endforeach; ?>

                                 </tbody>
                      </table>
                      <?php if($laporan == false) : ?>
                      <a href="<?= route_to('tambahBarangMasuk') ?>" class="btn btn-primary" >Tambah</a>
                      <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>












