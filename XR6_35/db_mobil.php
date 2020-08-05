<?php
session_start();
$koneksi = mysqli_connect("localhost","root","","xr6_28");
if (isset($_POST["action"])) {
  $id_mobil = $_POST["id_mobil"];
  $nomor_mobil = $_POST["nomor_mobil"];
  $merk = $_POST["merk"];
  $jenis = $_POST["jenis"];
  $warna = $_POST["warna"];
  $tahun_pembuatan = $_POST["tahun_pembuatan"];
  $biaya_sewa_per_hari = $_POST["biaya_sewa_per_hari"];
  $action = $_POST["action"];

  if ($_POST["action"] == "insert") {
    $path = pathinfo($_FILES["image"]["name"]);
    $extensi = $path["extension"];
    $filename = $id_mobil."-".rand(1,1000).".".$extensi;
    $sql = "insert into mobil values('$id_mobil','$nomor_mobil','$merk','$jenis','$warna','$tahun_pembuatan','$filename','$biaya_sewa_per_hari')";

    if (mysqli_query($koneksi,$sql)) {
      // jika eksekusi berhasil
      move_uploaded_file($_FILES["image"]["tmp_name"],"img_mobil/$filename");
      $_SESSION["message"] = array(
        "type" => "success",
        "message" => "Insert data has been success"
      );
    } else {
      //jika eksekusi gagal
      $_SESSION["message"] = array(
        "type" => "danger",
        "message" => mysqli_error($koneksi)
      );
    }
    header("location:template.php?page=mobil");
  }elseif ($_POST["action"] == "update") {
    if (!empty($_FILES["image"]["name"])) {
      // jika gambar diedit
      $sql = "select * from mobil where id_mobil='$id_mobil'";
      $result = mysqli_query($koneksi,$sql);
      $hasil = mysqli_fetch_array($result);
      if (file_exists("img_mobil/".$hasil["image"])) {
        unlink("img_mobil/".$hasil["image"]);
      }

      // membuat nama file yang baru
      $path = pathinfo($_FILES["image"]["name"]);
      $extensi = $path["extension"];
      $filename = $id_mobil.".".rand(1,1000).".".$extensi;

      // membuat perintah update
      $sql = "update mobil set nomor_mobil='$nomor_mobil',merk='$merk',jenis='$jenis',warna='$warna',tahun_pembuatan='$tahun_pembuatan',image='$filename',biaya_sewa_per_hari='$biaya_sewa_per_hari' where id_mobil='$id_mobil'";
      if (mysqli_query($koneksi,$sql)) {
        // jika query sukses
        move_uploaded_file($_FILES["image"]["tmp_name"],"img_mobil/$filename");
        $_SESSION["message"] = array(
          "type" => "success",
          "message" => "Update data has been success"
        );
      }else {
        //jika query gagal
        $_SESSION["message"] = array(
          "type" => "danger",
          "message" => mysqli_error($koneksi)
        );
      }
    }else {
        // jika gambar tidak diedit
        $sql = "update mobil set nomor_mobil='$nomor_mobil',merk='$merk',jenis='$jenis',warna='$warna',tahun_pembuatan='$tahun_pembuatan',biaya_sewa_per_hari='$biaya_sewa_per_hari' where id_mobil='$id_mobil'";
        if (mysqli_query($koneksi,$sql)){
          // jika query sukses
          move_uploaded_file($_FILES["image"]["tmp_name"],"img_mobil/$filename");
          $_SESSION["message"] = array(
            "type" => "success",
            "message" => "Update data has been success"
          );
        }else {
          // jika query gagal
          $_SESSION["message"] = array(
            "type" => "danger",
            "message" => mysqli_error($koneksi)
          );
        }
      }


    header("location:template.php?page=mobil");
  }
}

if (isset($_GET["hapus"])) {
  $id_mobil = $_GET["id_mobil"];
  $sql = "select * from mobil where id_mobil='$id_mobil'";
  $result = mysqli_query($koneksi,$sql);
  $hasil = mysqli_fetch_array($result);
  if (file_exists("img_mobil/".$hasil["image"])) {
    unlink("img_mobil/".$hasil["image"]);
  }

  $sql = "delete from mobil where id_mobil='$id_mobil'";
  if (mysqli_query($koneksi,$sql)) {
    // query sukses
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
  header("location:template.php?page=mobil");
}
 ?>
