<h2>Laporan Gudang</h2>

<table border="1">
<tr>
                                  <th>No</th>
                                  <th>Kode Barang</th>
                                  <th>Nama Barang</th>											
                                  <th>Jenis Barang</th>
                                  
                                  <th>Jumlah Barang</th>
                                  <th>Satuan</th>
                               
                              </tr>
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
                              </tr>




<?php

}

?>

</table>