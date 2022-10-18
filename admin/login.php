<?php 
include_once('../system/config.php');
session_start();
?>

<?php 
if(isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM `admin` WHERE `admin_user` = '$username' AND `admin_pass` = '$password'";
  $query = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($query);
  if(mysqli_num_rows($query) > 0) {
    $_SESSION['admin'] = $row['admin_user'];
    header("Location: index.php");
  } else {
    header("Location: login.php");
  }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>เข้าสู่ระบบ | Lyndsay Cake</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/all.min.css">
  <link rel="stylesheet" href="../css/fontawesome.min.css">
  <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="../css/main.css">
</head>
<body>
  
  <!-- Login Section -->
  <section id="section" class="py-5">
    <div class="container">
      <div class="title text-center">
        <h2 class="position-relative d-inline-block">เข้าสู่ระบบ (แอดมิน)</h2>
      </div>

      <!-- login form  -->

      <form action="login.php" method="POST">

        <div class="col-md-5 mx-auto">
          <div class="mb-3">
            <label class="form-label">ชื่อผู้ใช้</label>
            <input type="text" class="form-control" name="username" placeholder="กรุณากรอกชื่อผู้ใช้" required>
          </div>
          <div class="mb-3">
            <label class="form-label">รหัสผ่าน</label>
            <input type="password" class="form-control" name="password" placeholder="กรุณากรอกรหัสผ่าน" required>
          </div>

          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit" name="login"><i class="fa-solid fa-right-to-bracket"></i> เข้าสู่ระบบ</button>
          </div>
          <div class="text-end">
            <br>
            <a href="../index.php">กลับไปหน้าหลัก</a>
          </div>
        </div>

      </form>
      
      

      <!-- login form end  -->

    </div>

    </div>
  </section>
  <!-- Login Section end -->


  


  <script src="../js/jquery-3.6.0.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="../js/sweetalert2@11.js"></script>
</body>
</html>