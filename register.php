<?php 
include_once('system/config.php');

if(isset($_POST['register'])) {
  $username = $_POST['username'];
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $lineid = $_POST['lineid'];
  $password = $_POST['password'];
  $confirmpassword = $_POST['confirmpassword'];

  if($password != $confirmpassword) {
    echo "<script>alert('รหัสผ่านไม่ตรงกัน')</script>";
  } else {
    $sql = "INSERT INTO `users` (`user_name`, `user_pass`, `user_email`, `user_lineid`, `user_phone`) VALUES ('$username', '$password', '$email', '$lineid', '$phone')";
    $query = mysqli_query($conn, $sql);
    if($query) {
      echo "<script>alert('สมัครสมาชิกสำเร็จ')</script>";
    } else {
      echo "<script>('สมัครสมาชิกล้มเหลว')</script>";
    }
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
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/fontawesome.min.css">
  <link rel="stylesheet" href="css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
  
  <!-- navbar start  -->
  <?php include('includes/navbar.inc.php'); ?>
  <!-- navbar end  -->

  <!-- Login Section -->
  <section id="section" class="py-5">
    <div class="container">
      <div class="title text-center">
        <h2 class="position-relative d-inline-block">ลงทะเบียนสมาชิก</h2>
      </div>

      <!-- login form  -->

      <form action="register.php" method="POST">

        <div class="col-md-5 mx-auto">
          <div class="mb-3">
            <label class="form-label">ชื่อผู้ใช้</label>
            <input type="text" name="username" class="form-control" placeholder="กรุณากรอกชื่อผู้ใช้" required>
          </div>
          <div class="mb-3">
            <label class="form-label">ชื่อ-นามสกุล</label>
            <input type="text" name="fullname" class="form-control" placeholder="กรุณากรอกชื่อ-นามสกุล" required>
          </div>
          <div class="mb-3">
            <label class="form-label">อีเมล์</label>
            <input type="email" name="email" class="form-control" placeholder="กรุณากรอกอีเมล์" required>
          </div>
          <div class="mb-3">
            <label class="form-label">เบอร์โทร</label>
            <input type="number" name="phone" class="form-control" placeholder="กรุณากรอกเบอร์โทร" maxlength="10" required>
          </div>
          <div class="mb-3">
            <label class="form-label">ไอดีไลน์</label>
            <input type="text" name="lineid" class="form-control" placeholder="กรุณากรอกไอดีไลน์" required>
          </div>
          <div class="mb-3">
            <label class="form-label">รหัสผ่าน</label>
            <input type="text" name="password" class="form-control" placeholder="กรุณากรอกรหัสผ่าน">
          </div>
          <div class="mb-3">
            <label class="form-label">ยืนยันรหัสผ่าน</label>
            <input type="text" name="confirmpassword" class="form-control" placeholder="กรุณากรอกยืนยันรหัสผ่าน">
          </div>

          <div class="d-grid gap-2">
            <button class="btn btn-primary" name="register" type="submit"><i class="fa-solid fa-right-to-bracket"></i> ลงทะเบียน</button>
          </div>

        </div>

      </form>
      
      <div class="col-md-5 mx-auto">
        <br>
        <p class="text-end">มีรหัสผ่านใช่หรือไม่ ? <a href="login.php">คลิกที่นี่</a></p>
      </div>

      <!-- login form end  -->

    </div>

    </div>
  </section>
  <!-- Login Section end -->


  


  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/sweetalert2@11.js"></script>
</body>
</html>