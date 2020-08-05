<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Karyawan</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </head>
  <body>
    <div class="container my-5">
      <div class="row justify-content-center align-items-center">
        <div class="col-sm-6 card">
          <div class="card-header">
            <h3>LOGIN FORM</h3>
          </div>
          <div class="card-body">
            <?php if(isset($_SESSION["message"])): ?>
              <div class="alert alert-<?=($_SESSION["message"]["type"])?>">
                <?php echo $_SESSION["message"]["message"]; ?>
                <?php unset($_SESSION["message"]); ?>
              </div>
            <?php endif; ?>
            <form action="proses_login_karyawan.php" method="post">
              <input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
              <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
              <button type="submit" class="btn btn-warning btn-block">
                LOGIN!
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
