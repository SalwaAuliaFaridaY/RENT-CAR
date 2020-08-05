<?php
$koneksi = mysqli_connect("localhost","root","","xr6_28");
$sql = "select * from mobil";
$result = mysqli_query($koneksi,$sql);
 ?>

 <div class="row">
   <?php foreach ($result as $hasil): ?>
     <div class="card col-sm-4">
       <div class="card-body">
         <img src="img_mobil/<?php echo $hasil["image"]; ?>" class="img" width="100%">
       </div>
       <div class="card-footer">
         <h5 class="text-center"><?php echo $hasil["merk"]; ?></h5>
         <h6 class="text-center">Jenis: <?php echo $hasil["jenis"]; ?></h6>
         <h6 class="text-center">Warna: <?php echo $hasil["warna"]; ?></h6>
         <h6 class="text-center">Tahun Pembuatan: <?php echo $hasil["tahun_pembuatan"]; ?></h6>
         <h6 class="text-center">Biaya Sewa Per Hari: <?php echo $hasil["biaya_sewa_per_hari"]; ?></h6>
         <a href="db_sewa.php?id_mobil=true&id_mobil=<?php echo $hasil["id_mobil"]; ?>">
           <button type="button" class="btn btn-warning btn-block">
             Tekan Ini Ketika Mau Sewa!
           </button>
         </a>
       </div>
     </div>
   <?php endforeach; ?>
 </div>
