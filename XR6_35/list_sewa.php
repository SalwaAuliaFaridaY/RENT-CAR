<div class="card col-sm-12">
  <div class="card-header">
    <h4>Mobil Yang Akan Disewa</h4>
  </div>
  <div class="card-body">
    <form action="db_sewa.php?checkout=true" method="post"
    onsubmit="return confirm('apakah anda yakin dengan pesanan ini?')">
    <table class="table">
      <thead>
        <tr>
          <th>Merk</th>
          <th>Biaya Sewa Per Hari</th>
          <th>Tanggal Sewa</th>
          <th>Tanggal Kembali</th>
          <th>Image</th>
          <th>Opsi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($_SESSION["session_sewa"] as $hasil): ?>
            <tr>
              <td><?php echo $hasil["merk"]; ?></td>
              <td><?php echo "Rp ".number_format($hasil["biaya_sewa_per_hari"]); ?></td>
              <td>
                <input type="date" name="tgl_sewa" value='<?php echo "$tgl_sewa";?>'>
              </td>
              <td>
                <input type="date" name="tgl_kembali" value='<?php echo "$tgl_kembali";?>'>
              </td>
              <td>
                <img src="img_mobil/<?php echo $hasil["image"]; ?>" width="100" class="img">
              </td>
              <td>
                <a href="db_sewa.php?hapus=true&id_mobil=<?php echo $hasil["id_mobil"];?>">
                  <button type="button" class="btn btn-danger">Hapus</button>
                </a>
              </td>
              </tr>
                <div class="form-group">
                  Nama Pelanggan :
                <?php
                    $koneksi = mysqli_connect("localhost","root","","xr6_28");
                    $sql = "select * from pelanggan";
                    $result = mysqli_query($koneksi,$sql);
                    //digunakan untuk eksekusi sintak sql
                    $count = mysqli_num_rows($result);
                    //digunakan unruk menampilkan jumlah data
                ?>
                    <select name="id_pelanggan" class="form-control">
                        <?php foreach ($result as $a):?>
                            <option value="<?php echo "$id_pelanggan"; ?>"><?= $a['nama_pelanggan'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

        <?php endforeach; ?>
      </tbody>
    </table>
      <button type="submit" class="btn btn-block btn-warning">Checkout</button>
    </form>
  </div>
</div>
