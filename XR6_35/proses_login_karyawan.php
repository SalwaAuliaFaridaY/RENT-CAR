<?php
session_start();
$username = $_POST["username"];
$password = $_POST["password"];

$koneksi = mysqli_connect("localhost","root","","xr6_28");
$sql = "select * from karyawan where username='$username' and password='$password'";
$result = mysqli_query($koneksi,$sql);
$jumlah = mysqli_num_rows($result);

if ($jumlah == 0) {
  $_SESSION["message"] = array(
    "type" => "danger",
    "message" => "Username/Password Salah"
  );
  header("location:login_karyawan.php");
} else {
  $_SESSION["session_karyawan"] = mysqli_fetch_array($result);
  $_SESSION["session_sewa"] = array();
  header("location:template.php");
}

if (isset($_GET["logout"])) {
  session_destroy();
  header("location:login_karyawan.php");
}
 ?>
