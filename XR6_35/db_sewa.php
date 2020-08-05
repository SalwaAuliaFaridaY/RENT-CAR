<?php
  session_start();
  $koneksi = mysqli_connect("localhost","root","","xr6_28");
  if (isset($_GET["id_mobil"])) {
    $id_mobil = $_GET["id_mobil"];
    $sql = "select * from mobil where id_mobil='$id_mobil'";
    $result = mysqli_query($koneksi,$sql);
    $hasil = mysqli_fetch_array($result);

    if (!in_array($hasil, $_SESSION["session_sewa"])) {
      array_push($_SESSION["session_sewa"],$hasil);
    }
    header("location:template.php?page=list_mobil");
  }

  if (isset($_GET["checkout"])) {
      $koneksi = mysqli_connect("localhost","root","","xr6_28");
      foreach ($_SESSION["session_sewa"] as $hasil) {
      $biaya += $hasil["biaya_sewa_per_hari"];
      }
      $id_sewa = rand(1,1000000);
      $id_mobil = $hasil["id_mobil"];
      $id_karyawan = $_SESSION["session_karyawan"]["id_karyawan"];
      if(isset($_POST['id_pelanggan'])) $id_pelanggan=$_POST['id_pelanggan'];
      if(isset($_POST['tgl_sewa'])) $tgl_sewa=$_POST['tgl_sewa'];
      if(isset($_POST['tgl_kembali'])) $tgl_kembali=$_POST['tgl_kembali'];
      $diff = abs(strtotime($tgl_kembali) - strtotime($tgl_sewa));
      $years = floor($diff / (365*60*60*24));
      $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
      $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

      $total_bayar = $days*$biaya;
      $sql = "insert into sewa values('$id_sewa','$id_mobil','$id_karyawan','$id_pelanggan','$tgl_sewa','$tgl_kembali','$total_bayar')";

      if (!mysqli_query($koneksi,$sql)) echo mysqli_error($koneksi);
      $_SESSION["session_sewa"] = array();
      header("location:template.php?page=nota&id_sewa=$id_sewa");
    }

  if (isset($_GET["hapus"])) {
    $id_mobil= $_GET["id_mobil"];
    $index = array_search($id_mobil, array_column($_SESSION["session_sewa"],"id_mobil"));
    array_splice($_SESSION["session_sewa"],$index,1);
    header("location:template.php?page=list_sewa");
  }
 ?>
