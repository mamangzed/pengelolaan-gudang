<h2>Laporan Barang Keluar</h2>

<table border="1">
<tr>
                                  <th>No</th>
                                  <th>Id Transaksi</th>
                                  <th>Tanggal Masuk</th>
                                  <th>Kode Barang</th>
                                  <th>Nama Barang</th>
                              
                                  <th>Pengirim</th>
                                  
                              
                              
                                  
                                  <th>Jumlah Masuk</th>
                                  <th>Satuan Barang</th>
                               
                              </tr>
<?php
    $no = 1;
    foreach ($barang as $data) {	

    



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
                              </tr>




<?php

}

?>

</table>