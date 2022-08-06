 <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Supplier</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
							
							
							<div class="body">
							
							<form method="POST" action="" enctype="multipart/form-data">
							
							<label for="">Kode Supplier</label>
                            <div class="form-group">
                               <div class="form-line">
                             <input type="text" name="kode_supplier" class="form-control" id="kode_supplier" value="<?php echo $format; ?>" readonly />
							</div>
                            </div>
							
						
							
							<label for="">Nama Supplier</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="nama_supplier" class="form-control" />	 
							</div>
                            </div>
							
					
							<label for="">Alamat</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="text" name="alamat" class="form-control" />
                          	 
								</div>
                            </div>
					
							
							<label for="">Telepon</label>
                            <div class="form-group">
                               <div class="form-line">
                                <input type="number" name="telepon" class="form-control" />	 
							</div>
                            </div>
							
							
						
								<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
							
							</form>	
										
								
								
								
								
								
