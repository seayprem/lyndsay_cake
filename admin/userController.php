<?php 
include_once('../system/config.php');
session_start();
if(empty($_SESSION['admin'])) {
  header("Location: login.php");
}
?>

<!-- ADD USER  -->
<?php 
if(isset($_POST['addUser'])) {
  $username = $_POST['username'];
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $lineid = $_POST['lineid'];
  $password = $_POST['password'];

  $check_user_sql = "SELECT * FROM `users` WHERE `user_name` = '$username' LIMIT 1";
  $check_user_query = mysqli_query($conn, $check_user_sql);
  $check_user_row = mysqli_fetch_array($check_user_query);

  $usernameCopy = $check_user_row['user_name'];

  if($username == $usernameCopy) {
    echo "<script>alert('Username ซ้ำกับผู้อื่น')</script>";
  } else {
    $sql = "INSERT INTO `users` (`user_name`, `user_pass`, `user_fullname`, `user_email`, `user_lineid`, `user_phone`) VALUES ('$username', '$password', '$fullname', '$email', '$lineid', '$phone')";
    $query = mysqli_query($conn, $sql);
    if($query) {
      echo "<script>alert('เพิ่มข้อมูลผู้ใช้สำเร็จ')</script>";
    } else {
      echo "<script>('เพิ่มข้อมูลผู้ใช้ล้มเหลว')</script>";
    }
  }

}
?>
<!-- ADD USER END -->


<!-- UPDATE USER  -->
<?php 
if(isset($_POST['editUser'])) {
  $user_id = $_GET['edit_id'];
  $username = $_POST['username'];
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $lineid = $_POST['lineid'];
  $password = $_POST['password'];


  $update_sql = "UPDATE `users` SET `user_name`='$username',`user_pass`='$password',`user_fullname`='$fullname',`user_email`='$email',`user_lineid`='$lineid',`user_phone`='$phone' WHERE `user_id` = $user_id";
  $update_query = mysqli_query($conn, $update_sql);
  if($update_query) {
    echo "success";
  } else {
    echo "failed";
  }

}
?>
<!-- UPDATE USER END -->


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>จัดการผู้ใช้ | Lyndsay Cake</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/all.min.css">
  <link rel="stylesheet" href="../css/fontawesome.min.css">
  <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="../css/main.css">
</head>
<body>
  
  <!-- navbar start  -->
  <?php include('includes/navbar.inc.php'); ?>
  <!-- navbar end  -->

  <!-- add Product -->
  <section id="section" class="py-5">
    <div class="container">
      <div class="title text-center">
        <h2 class="position-relative d-inline-block">จัดการผู้ใช้</h2>
      </div>

      <div class="text-end">
        <a href="userController.php?btnAddUser=btnAddUser" class="btn btn-success">เพิ่มผู้ใช้</a>
      </div>

      <!-- get add user  -->
      <?php 
        if(isset($_GET['btnAddUser']) == "btnAddUser") {
          
        
      ?>

      <form action="#" method="POST">
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
            <input type="password" name="password" class="form-control" placeholder="กรุณากรอกรหัสผ่าน">
          </div>

          <div class="d-grid gap-2">
            <button class="btn btn-primary" name="addUser" type="submit"><i class="fa-solid fa-user-plus"></i> เพิ่มผู้ใช้</button>
            <a href="userController.php" class="btn btn-primary">ยกเลิก</a>            
          </div>

        </div>
      </form>

      <?php 
      }
      ?>
      <!-- get add user end -->

      <!-- edit & update user  -->
      <?php
      if(isset($_GET['edit'])) {
        $edit_id = $_GET['edit'];

        $edit_sql = "SELECT * FROM `users` WHERE `user_id` = $edit_id";
        $edit_query = mysqli_query($conn, $edit_sql);
        $edit_row = mysqli_fetch_array($edit_query);

      ?>
      <form action="userController.php?edit_id=<?= $edit_row['user_id']; ?>" method="POST">
        <div class="col-md-5 mx-auto">
          <div class="mb-3">
            <label class="form-label">ชื่อผู้ใช้</label>
            <input type="text" name="username" class="form-control" value="<?= $edit_row['user_name']; ?>" placeholder="กรุณากรอกชื่อผู้ใช้" required>
          </div>
          <div class="mb-3">
            <label class="form-label">ชื่อ-นามสกุล</label>
            <input type="text" name="fullname" class="form-control" value="<?= $edit_row['user_fullname']; ?>" placeholder="กรุณากรอกชื่อ-นามสกุล" required>
          </div>
          <div class="mb-3">
            <label class="form-label">อีเมล์</label>
            <input type="email" name="email" class="form-control" value="<?= $edit_row['user_email']; ?>" placeholder="กรุณากรอกอีเมล์" required>
          </div>
          <div class="mb-3">
            <label class="form-label">เบอร์โทร</label>
            <input type="number" name="phone" class="form-control" value="<?= $edit_row['user_phone']; ?>" placeholder="กรุณากรอกเบอร์โทร" maxlength="10" required>
          </div>
          <div class="mb-3">
            <label class="form-label">ไอดีไลน์</label>
            <input type="text" name="lineid" class="form-control" value="<?= $edit_row['user_lineid']; ?>" placeholder="กรุณากรอกไอดีไลน์" required>
          </div>
          <div class="mb-3">
            <label class="form-label">รหัสผ่าน</label>
            <input type="password" name="password" class="form-control" value="<?= $edit_row['user_pass']; ?>" placeholder="กรุณากรอกรหัสผ่าน">
          </div>

          <div class="d-grid gap-2">
            <button class="btn btn-primary" name="editUser" type="submit"><i class="fa-solid fa-user-plus"></i> แก้ไขผู้ใช้</button>
            <a href="userController.php" class="btn btn-primary">ยกเลิก</a>            
          </div>

        </div>
      </form>
      <?php 
      }
      ?>
      <!-- edit & update user end -->

      <!-- detail user params id -->
      <?php 
      if(isset($_GET['detail'])) {
        $detail_id = $_GET['detail'];
        $detail_user_sql = "SELECT * FROM `users` WHERE `user_id` = $detail_id";
        $detail_user_query = mysqli_query($conn, $detail_user_sql);
        $detail_user_row = mysqli_fetch_array($detail_user_query);
      ?>

        <h4 class="text-center">รายละเอียด</h4>
        <div class="col-md-6 mx-auto">
          <hr>
          
          <b>ชื่อผู้ใช้: </b><a><?= $detail_user_row['user_name']; ?></a><br>
          <b>รหัสผ่าน: </b><a><?= $detail_user_row['user_pass']; ?></a><br>
          <b>ชื่อ-สกุล: </b><a><?= $detail_user_row['user_fullname']; ?></a><br>
          <b>อีเมล์: </b><a><?= $detail_user_row['user_email']; ?></a><br>
          <b>ไอดีไลน์: </b><a><?= $detail_user_row['user_lineid']; ?></a><br>
          <b>เบอร์โทร: </b><a><?= $detail_user_row['user_phone']; ?></a><br>
        </div>
        
        <div class="text-center">
          <a href="userController.php" class="btn btn-primary">ย้อนกลับ</a>
        </div>

      <?php } ?>
      <!-- detail user params id end -->


    </div>
  </section>
  <!-- add Product end -->

  <div class="container">
    <h3>ผู้ใช้ทั้งหมด</h3>
    <table class="table table-hover" id="myTable">
      <thead>
        <tr>
          <th class="text-center">ชื่อจริง-นามสกุล</th>
          <th class="text-center">อีเมล์</th>
          <th class="text-center">เบอร์โทร</th>
          <th class="text-center">ไอดีไลน์</th>
          <th class="text-center">จัดการ</th>
        </tr>
      </thead>
      <tbody>
        <!-- list product -->
        <?php 
        $list_user_sql = "SELECT * FROM `users` ORDER BY `user_id` DESC";
        $list_user_query = mysqli_query($conn, $list_user_sql);
        while($list_user_row = mysqli_fetch_array($list_user_query)) {
        ?>
        <tr class="text-center">
          <td><?= $list_user_row['user_fullname']; ?></td>
          <td><?= $list_user_row['user_email']; ?></td>
          <td><?= $list_user_row['user_phone']; ?></td>
          <td><?= $list_user_row['user_lineid']; ?></td>
          <td>
            <a href="userController.php?detail=<?= $list_user_row['user_id']; ?>" class="btn btn-primary">รายละเอียด</a>
            <a href="userController.php?edit=<?= $list_user_row['user_id']; ?>" class="btn btn-primary">แก้ไข</a>
            <a href="#" class="btn btn-primary">ลบ</a>
          </td>
        </tr>
        <?php } ?>
        <!-- list product end -->

      </tbody>
    </table>
  </div>


  


  <script src="../js/jquery-3.6.0.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="../js/sweetalert2@11.js"></script>

  <script>
    $(document).ready( function () {
      $('#myTable').DataTable();
    } );
  </script>

</body>
</html>