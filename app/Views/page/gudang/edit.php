<div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ubah User</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							
							
							<div class="body">

							<form method="POST" action="edit-gudang" enctype="multipart/form-data">
							<input type="hidden" name="_method" value="PUT" />
							<label for="">Kode Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                    <input type="hidden" name="id" value="<?= $tampil['id'] ?>" />
                                  <input type="text" name="kode_barang" class="form-control" id="kode_barang" value="<?php echo $tampil['kode_barang']; ?>" readonly />	 
							</div>
                            </div>
							
								
							<label for="">Nama Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="nama_barang" value="<?php echo $tampil['nama_barang']; ?>" class="form-control" /> 	 
							</div>
                            </div>
				
							
							
						<label for="">Jenis Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <select name="jenis_barang" value="<?php echo $tampil['jenis_barang'];?>" class="form-control" />
								
								<?php
								foreach ($jenis as $data) {
									echo "<option value='$data[id].$data[jenis_barang]'>$data[jenis_barang]</option>";
								}
								?>
								</select>
                                     
									 
							</div>
                            </div>
							
							
                          
                                     
			
							<label for="">Satuan Barang</label>
                            <div class="form-group">
                               <div class="form-line">
                                <select name="satuan" value="<?php echo $tampil['satuan'];?>" class="form-control" />
								
								<?php
								foreach ($satuan as $data) {
									echo "<option value='$data[id].$data[satuan]'>$data[satuan]</option>";
								}
								?>
								</select>
                                     
									 
							</div>
                            </div>
							
						
							
						
							
							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
							
							</form>