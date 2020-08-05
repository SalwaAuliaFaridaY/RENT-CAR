<div class="card col-sm-12">
  <div class="card-header">
    <h3>Nota Transaksi</h3>
  </div>
  <div class="card-body">
    <?php
    $koneksi = mysqli_connect("localhost","root","","xr6_28");
    $id_sewa = $_GET["id_sewa"];
    // data sewa
    $sql = "select t.id_sewa, p.nama_pelanggan, t.tgl_beli
    from sewa t inner join pembeli p
    on t.id_pelanggan = p.id_pelanggan
    where t.id_sewa='$id_sewa'";
    $result = mysqli_query($koneksi,$sql);
    $hasil = mysqli_fetch_array($result);

    //data barang
    $sql2 = "select b.*, dt.jumlah, dt.total_bayar
    from mobil b inner join sewa dt on b.id_mobil=dt.id_mobil
    where dt.id_sewa='$id_sewa'";
    $result2 = mysqli_query($koneksi,$sql2);
     ?>

     <h4>ID. Sewa: <?php echo $hasil["id_sewa"]; ?></h4>
     <h4>Nama Pelanggan: <?php echo $hasil["nama_pelanggan"]; ?></h4>
     <h4>Tgl. Sewa: <?php echo $hasil["tgl_sewa"]; ?></h4>

     <table class="table">
       <thead>
         <tr>
           <th>ID Mobil</th>
           <th>Merk</th>
           <th>Tanggal Kembali</th>
           <th>Biaya Sewa Per Hari</th>
           <th>Total Bayar</th>
         </tr>
       </thead>
       <tbody>
         <?php $total_bayar = 0; foreach($result2 as $mobil): ?>
           <tr>
             <td><?php echo $mobil["id_mobil"]; ?></td>
             <td><?php echo $mobil["nama_pelanggan"]; ?></td>
             <td><?php echo $mobil["tgl_kembali"]; ?></td>
             <td><?php echo "Rp ".number_format($mobil["biaya_sewa_per_hari"]); ?></td>
             <td><?php echo "Rp ".number_format($mobil["biaya_sewa_per_hari"]*($mobil["tgl_kembali"]-$mobil["tgl_sewa"])); ?></td>
           </tr>
           <?php
           $total_bayar += ($mobil["tgl_kembali"]-$mobil["tgl_sewa"])*$mobil["biaya_sewa_per_hari"];
         endforeach;
            ?>
       </tbody>
     </table>
     <h2 class="text-right text-success">
       <?php echo "Rp ".number_format($total_bayar); ?>
     </h2>
  </div>
</div>
