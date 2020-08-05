<?php
session_start();
$koneksi = mysqli_connect("localhost","root","","xr6_28");
if (isset($_POST["action"])) {
  $id_pelanggan = $_POST["id_pelanggan"];
  $nama_pelanggan = $_POST["nama_pelanggan"];
  $alamat_pelanggan = $_POST["alamat_pelanggan"];
  $kontak = $_POST["kontak"];
  $action = $_POST["action"];

  if ($_POST["action"] == "insert") {
    $sql = "insert into pelanggan values('$id_pelanggan','$nama_pelanggan','$alamat_pelanggan','$kontak')";
    if (mysqli_query($koneksi,$sql)) {
      // eksekusi berhasil
      $_SESSION["message"] = array(
        "type" => "success",
        "message" => "Insert data has been success"
      );
    }else {
      //eksekusi gagal
      $_SESSION["message"] = array(
        "type" => "danger",
        "message" => mysqli_error($koneksi)
      );
    }
    header("location:template.php?page=pelanggan");
  }elseif ($_POST["action"] == "update") {
    //perintah update
    $sql = "select * from pelanggan where id_pelanggan='$id_pelanggan'";
    $sql = "update pelanggan set nama_pelanggan='$nama_pelanggan',alamat_pelanggan='$alamat_pelanggan',kontak='$kontak' where id_pelanggan='$id_pelanggan'";

    if (mysqli_query($koneksi,$sql)) {
      // query sukses
      $_SESSION["message"] = array(
        "type" => "success",
        "message" => "Update data has been success"
      );
    }else {
      // query gagal
      $_SESSION["message"] = array(
        "type" => "danger",
        "message" => mysqli_error($koneksi)
      );
    }
    header("location:template.php?page=pelanggan");
  }
}

if (isset($_GET["hapus"])) {
  $id_pelanggan = $_GET["id_pelanggan"];
  $sql = "select * from pelanggan where id_pelanggan='$id_pelanggan'";
  $result = mysqli_query($koneksi,$sql);
  $hasil = mysqli_fetch_array($result);

  $sql = "delete from pelanggan where id_pelanggan='$id_pelanggan'";
  if (mysqli_query($koneksi,$sql)) {
    //query sukses
    $_SESSION["message"] = array(
      "type" => "success",
      "message" => "Delete data has been success"
    );
  }else {
    //query gagal
    $_SESSION["message"] = array(
      "type" => "danger",
      "message" => mysqli_error($koneksi)
    );
  }
  header("location:template.php?page=pelanggan");
}
 ?>
