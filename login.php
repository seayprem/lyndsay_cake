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
        <h2 class="position-relative d-inline-block">เข้าสู่ระบบ</h2>
      </div>

      <!-- login form  -->

      <form action="">

        <div class="col-md-5 mx-auto">
          <div class="mb-3">
            <label class="form-label">ชื่อผู้ใช้</label>
            <input type="text" class="form-control" placeholder="กรุณากรอกชื่อผู้ใช้">
          </div>
          <div class="mb-3">
            <label class="form-label">รหัสผ่าน</label>
            <input type="text" class="form-control" placeholder="กรุณากรอกรหัสผ่าน">
          </div>

          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit"><i class="fa-solid fa-right-to-bracket"></i> เข้าสู่ระบบ</button>
          </div>

        </div>

      </form>
      
      <div class="col-md-5 mx-auto">
        <br>
        <p class="text-end">คุณไม่มีหรัสผ่านใช่หรือไม่ ? <a href="register.php">คลิกที่นี่</a></p>
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