<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tambah Barang Masuk</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
                  
                  
                  <div class="body">
                  
                  <form method="POST" action="" enctype="multipart/form-data">
                  
                  <label for="">Id Transaksi</label>
                  <div class="form-group">
                     <div class="form-line">
                       <input type="text" name="id_transaksi" class="form-control" id="id_transaksi" value="<?php echo $format; ?>" readonly /> 
                  </div>
                  </div>
                  
              
                  
                  <label for="">Tanggal Masuk</label>
                  <div class="form-group">
                     <div class="form-line">
                       <input type="date" name="tanggal_masuk" class="form-control" id="tanggal_masuk" value="<?php echo $tanggal_masuk; ?>" />
                  </div>
                  </div>
                  
          
                  <label for="">Barang</label>
                  <div class="form-group">
                     <div class="form-line">
                      <select name="barang" id="cmb_barang" class="form-control" />
                      <option value="">-- Pilih Barang  --</option>
                      <?php
                      foreach ($gudang as $data) {
                          echo "<option value='$data[kode_barang].$data[nama_barang]'>$data[kode_barang] | $data[nama_barang]</option>";
                      }
                      ?>
                      
                      </select>
                           
                           
                  </div>
                  </div>
                  
                  <div class="tampung"></div>
          
                  <label for="">Jumlah</label>
                  <div class="form-group">
                     <div class="form-line">
                      <input type="text" name="jumlahmasuk" id="jumlahmasuk" onkeyup="sum()" class="form-control" />
                           
                           
                  </div>
                  </div>
                  
                  <label for="jumlah">Total Stok</label>
                  <div class="form-group">
                     <div class="form-line">
                     <input readonly="readonly" name="jumlah" id="jumlah" type="number" class="form-control">
                           
                           
                  </div>
                  </div>
                  
                  <div class="tampung1"></div>
                  
              
                  
                      <label for="">Supplier</label>
                  <div class="form-group">
                     <div class="form-line">
                      <select name="pengirim" class="form-control" />
                      <option value="">-- Pilih Supplier  --</option>
                      <?php
                      foreach ($supplier as $data) {
                      echo "<option value='$data[nama_supplier]'>$data[nama_supplier]</option>";
                      }
                      ?>
                      
                      </select>
                           
                           
                  </div>
                  </div>
              
              
                  
                  <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                  
                  </form>
                  
                  
                  
                  
                      
                              
      