<div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Stok</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">

							
							<div class="body">
							
							<form method="POST" action="" enctype="multipart/form-data">
							
							<label for="">Kode Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                  <input type="text" name="kode_barang" class="form-control" id="kode_barang" value="<?php echo $format; ?>" readonly />	 
							</div>
                            </div>
							
						
							
							<label for="">Nama Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="nama_barang" class="form-control" />	 
							</div>
                            </div>
							
						<label for="">Jenis Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <select name="jenis_barang" class="form-control" />
								<option value="">-- Pilih Jenis Barang  --</option>
								<?php
								foreach ($jenis as $data) {
									echo "<option value='$data[jenis_barang]'>$data[jenis_barang]</option>";
								}
								?>
								</select>
                                     
									 
							</div>
                            </div>
							
							
                            <label for="">Jumlah</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="jumlah" class="form-control" id="jumlah" value="<?php echo $jumlah; ?>" readonly />
                                     
									 
							</div>
                            </div>
                                     
						
							
						
                          
                              
				
							<label for="">Satuan Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <select name="satuan" class="form-control" />
								<option value="">-- Pilih Satuan Barang --</option>
								<?php
								foreach ($satuan as $data) {
									echo "<option value='$data[satuan]'>$data[satuan]</option>";
								}
								?>
								</select>
                                     
									 
							</div>
                            </div>
							
							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
							
							</form>
										
										
										
								
								
								
								
								
