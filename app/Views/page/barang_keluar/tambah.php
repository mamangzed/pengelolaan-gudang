  
   <script>
 function sum() {
	 var stok = document.getElementById('stok').value;
	 var jumlahkeluar = document.getElementById('jumlahkeluar').value;
	 var result = parseInt(stok) - parseInt(jumlahkeluar);
	 if (!isNaN(result)) {
		 document.getElementById('total').value = result;
	 }
 }
 </script>
  
  <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Barang Keluar</h6>
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
							
						
							
							<label for="">Tanggal Keluar</label>
                            <div class="form-group">
                               <div class="form-line">
                                 <input type="date" name="tanggal_keluar" class="form-control" id="tanggal_kelauar" value="<?php echo $tanggal_keluar; ?>" />
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
                                <input type="text" name="jumlahkeluar" id="jumlahkeluar" onkeyup="sum()" class="form-control" />
							
                                     
									 
							</div>
                            </div>
							
							<label for="total">Total Stok</label>
                            <div class="form-group">
                               <div class="form-line">
                               <input readonly="readonly" name="total" id="total" type="number" class="form-control">
                            

							</div>
                            </div>
							
							<div class="tampung1"></div>
							
							<label for="">Tujuan</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="tujuan" class="form-control" />	 
							</div>
                            </div>
						
						
							
							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
							
							</form>
							