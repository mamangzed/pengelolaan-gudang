




 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
                              <tr>
                                  <th>No</th>
                                  <th>NIK</th>
                                  <th>Nama</th>
                                  
                                  <th>Telepon</th>
                                  <th>Username</th>
                                  <th>Password</th>
                                  <th>Level</th>
                                  <th>Foto</th>
                              
                                  
                              </tr>
                              </thead>
                              
     
        <tbody>
          <?php 
                          
                          $no = 1;
                          foreach($pengguna as $data) :
                              
                          ?>
                          
                              <tr>
                                  <td><?php echo $no++; ?></td>
                                  <td><?php echo $data['nik'] ?></td>
                                  <td><?php echo $data['nama'] ?></td>
                                  
                                  <td><?php echo $data['telepon'] ?></td>
                                  <td><?php echo $data['username'] ?></td>
                      
                                  <td><?php echo $data['password'] ?></td>
                                  <td><?php echo $data['level'] ?></td>
                                  <td><img src="<?= WRITEPATH.'uploads/img/'.$data['foto'] ?>" width="50" height="50" alt=""> </td>
                              
                              </tr>
                          <?php endforeach;?>

                                 </tbody>
                      </table>
                      <a href="<?= route_to('tambahPengguna') ?>" class="btn btn-primary" >Tambah</a>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>












