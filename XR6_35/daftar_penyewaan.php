<script type="text/javascript">
  function Print() {
    var printDocument = document.getElementById("report").innerHTML;
    var originalDocument = document.body.innerHTML;
    document.body.innerHTML = printDocument;
    window.print();
    document.body.innerHTML = printDocument;
  }
</script>
<div id="report" class="card col-sm-12">
  <div class="card-header">
    <h3>Struk Penyewaan</h3>
  </div>
  <div class="card-body">
    <?php
    $koneksi = mysqli_connect("localhost","root","","xr6_28");
    $sql = "select t.*, p.nama_pelanggan
    from sewa t inner join pelanggan p
    on t.id_pelanggan = p.id_pelanggan";
    $result = mysqli_query($koneksi,$sql);
     ?>
     <table class="table">
       <thead>
         <tr>
           <th>Tanggal Sewa</th>
           <th>Tanggal Kembali</th>
           <th>ID Sewa</th>
           <th>ID Mobil</th>
           <th>Nama Pelanggan</th>
           <th>Option</th>
         </tr>
       </thead>
       <tbody>
         <?php foreach ($result as $hasil): ?>
           <tr>
            <td><?php echo $hasil["tgl_sewa"]; ?></td>
            <td><?php echo $hasil["tgl_kembali"]; ?></td>
            <td><?php echo $hasil["id_sewa"]; ?></td>
            <td><?php echo $hasil["id_mobil"]; ?></td>
            <td><?php echo $hasil["nama_pelanggan"]; ?></td>
            <td>
              <a href="template.php?page=nota&id_sewa=<?php echo $hasil["id_sewa"]; ?>"></a>
              <button type="button" class="btn btn-warning">
                Detail
              </button>
            </td>
           </tr>
         <?php endforeach; ?>
       </tbody>
     </table>

     <button onclick="Print()" type="button" class="btn btn-warning">
       Print
     </button>
  </div>
</div>
