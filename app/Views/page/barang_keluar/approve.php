




 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Barang Keluar </h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
                              <tr>
                                  <th>No</th>
                                  <th>NIK pegawai</th>
                                  <th>Id Transaksi</th>
                                  <th>Tanggal Keluar</th>
                                  <th>Kode Barang</th>
                                  <th>Nama Barang</th>
                                  <th>Jumlah Keluar</th>
                                  <th>Satuan</th>
                                  <th>Tujuan</th>
                                  
                                  <th>Pengaturan</th>
                               
                              </tr>
                              </thead>
                              
     
        <tbody>
          <?php 
                          
                          $no = 1;
                          foreach ($barang as $data) :
                              
                          ?>
                          
                              <tr>
                                  <td><?php echo $no++; ?></td>
                                  <td><?= $data['user_nik'] ?></td>
                                  <td><?php echo $data['id_transaksi'] ?></td>
                                  <td><?php echo $data['tanggal'] ?></td>
                                  <td><?php echo $data['kode_barang'] ?></td>
                                  <td><?php echo $data['nama_barang'] ?></td>
                                  <td><?php echo $data['jumlah'] ?></td>
                                  <td><?php echo $data['satuan'] ?></td>
                                  <td><?php echo $data['tujuan'] ?></td>
                      

                                  <td>
                                  
                                  <a onclick="return confirm('Apakah anda yakin ingin menerima <?= $data['nama_barang'] ?> di tanggal <?= $data['tanggal'] ?> ini?')" href="<?= base_url('/barang/keluar/approve/'.$data['id'])  ?>" class="btn btn-success" >Approve</a>
                                  </td>
                              </tr>
                          <?php endforeach; ?>

                                 </tbody>
                      </table>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>












