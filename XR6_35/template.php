<?php session_start(); ?>
<?php if (isset($_SESSION["session_karyawan"])): ?>
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Penyewaan Mobil</title>
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/js/bootstrap.js"></script>
    </head>
    <body>
      <nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
        <a href="#" class="text-white">
          <h3>ROUTE 66</h3>
        </a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu">
          <span class="navbar navbar-toggler-icon"></span>
        </button>

        <!--Daftar menu pada navbar-->
        <div class="collapse navbar-collapse" id="menu">
          <ul class="navbar-nav">
            <li class="nav-item"> <a href="template.php?page=pelanggan" class="nav-link">Pelanggan</a> </li>
            <li class="nav-item"> <a href="template.php?page=karyawan" class="nav-link">Karyawan</a> </li>
            <li class="nav-item"> <a href="template.php?page=mobil" class="nav-link">Mobil</a> </li>
            <li class="nav-item"> <a href="template.php?page=list_mobil" class="nav-link">List Mobil</a> </li>
            <li class="nav-item"> <a href="template.php?page=list_sewa" class="nav-link">List Sewa</a> </li>
            <li class="nav-item"> <a href="template.php?page=daftar_penyewaan" class="nav-link">Daftar Penyewaan</a> </li>
            <li class="nav-item"> <a href="proses_login_karyawan.php?logout=true" class="nav-link">Logout</a> </li>
          </ul>
        </div>
        <h5 class="text-white">Hello, <?php echo $_SESSION["session_karyawan"]["nama_karyawan"]; ?></h5>
      </nav>
      <div class="container my-2">
        <?php if(isset($_GET["page"])): ?>
          <?php if((@include $_GET["page"].".php") === true): ?>
          <?php include $_GET["page"].".php"; ?>
        <?php endif; ?>
        <?php endif;?>
      </div>
    </body>
  </html>
  <?php else: ?>
  <?php echo "Silahkan Login Terlebih Dahulu!" ?>
  <br>
  <a href="login_karyawan.php">
  Klik Disini!
  </a>
  <?php endif; ?>
