<?php 
include_once('system/config.php');
session_start();
if(empty($_SESSION['user'])) {
  echo '<script>alert("กรุณาเข้าสู่ระบบก่อนสั่งซื้อสินค้า")</script>';
  echo '<script>window.location.href="login.php"</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="widtd=device-width, initial-scale=1.0">
  <title>หน้าหลัก | Lyndsay Cake</title>
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
  <div class="container">

  
  <form id="frmcart" name="frmcart" method="post" action="saveorder.php" enctype="multipart/form-data">
    <table class="text-center mt-5 table">
      <tr>
        <td colspan="5"><strong><h3>สั่งซื้อสินค้า</h3></strong></td>
      </tr>
      <tr>
        <td>รูปภาพสินค้า</td>
        <td>เขียนหน้าเค้ก</td>
        <td>สินค้า</td>
        <td align="center">ราคา</td>
        <td align="center">จำนวน</td>
        <td align="center">รวม/รายการ</td>
      </tr>
      <?php
        $total=0;
        foreach($_SESSION['cart'] as $p_id=>$qty)
        {
          $sql	= "select * from products where product_id=$p_id";
          $query	= mysqli_query($conn, $sql);
          $row	= mysqli_fetch_array($query);
          $sum	= $row['product_price']*$qty;
          $total	+= $sum;
          echo "<tr>";
          echo "<td><img src='img/products/".$row['product_image']."' width='150' height='150'></td>";
          echo "<td>" . $_POST['write'] . "</td>";
          echo "<td>" . $row["product_name"] . "</td>";
          echo "<td align='center'>" .number_format($row['product_price'],2) ."</td>";
          echo "<td align='center'>$qty</td>";
          echo "<td align='center'>".number_format($sum,2)."</td>";
          echo "</tr>";
        }
        echo "<tr>";
          echo "<td  align='center' colspan='3' bgcolor='#F9D5E3'><b>รวม</b></td>";
          echo "<td></td>";
          echo "<td align='center' bgcolor='#F9D5E3'>"."<b>".number_format($total,2)."</b>"."</td>";
          echo "</tr>";
      ?>


      <!-- list user  -->
      <?php 
        $userId = $_SESSION['user_id'];
        $list_user_sql = "SELECT * FROM `users` WHERE `user_id` = $userId";
        $list_user_query = mysqli_query($conn, $list_user_sql);
        $list_user_row = mysqli_fetch_array($list_user_query);
      ?>
      <!-- list user end -->

      </table>
      <p>    
      <table class="table" border="0" cellspacing="0" align="center">
      <tr>
        <td colspan="2" bgcolor="#CCCCCC">รายละเอียดในการติดต่อ</td>
      </tr>
      <tr>
          <td bgcolor="#EEEEEE">ชื่อ</td>
          <td><input name="name" type="text" id="name" class="form-control" value="<?= $list_user_row['user_fullname']; ?>" required/></td>
      </tr>
      <tr>
          <td bgcolor="#EEEEEE">อีเมล</td>
          <td><input name="email" type="email" id="email" class="form-control" value="<?= $list_user_row['user_email']; ?>"  required/></td>
      </tr>
      <tr>
          <td bgcolor="#EEEEEE">เบอร์ติดต่อ</td>
          <td><input name="phone" type="text" id="phone" class="form-control"  value="<?= $list_user_row['user_phone']; ?>" required /></td>
      </tr>
      <tr>
          <td bgcolor="#EEEEEE">ไอดีไลน์</td>
          <td><input name="lineid" type="text" id="phone" class="form-control"  value="<?= $list_user_row['user_lineid']; ?>" required /></td>
      </tr>
      <tr>
          <td bgcolor="#EEEEEE">วันที่นัดรับ</td>
          <td><input name="date_meet" type="date" id="phone" class="form-control" required /></td>
      </tr>
      <tr>
          <td bgcolor="#EEEEEE">QR CODE</td>
          <td><img src="" width="150" height="150"></td>
      </tr>
      <tr>
        <td></td>
        <td>เลขบัญชี: xxx-xxxxx-x</td>
      </tr>
      <tr>
        <td></td>
        <td>ชื่อบัญชีผู้รับโอน: xxx-xxxxx-x</td>
      </tr>
      <tr>
          <td bgcolor="#EEEEEE">แนบหลักฐานการโอนเงิน</td>
          <td><input name="files" type="file" class="form-control" required /></td>
      </tr>
      <input type="hidden" name="total_qty" value="<?= $qty ?>">
      <input type="hidden" name="total" value="<?= $total ?>">
      <input type="hidden" name="userid" value="<?= $_SESSION['user_id']; ?>">
      <input type="hidden" name="write" value="ยังทำไม่ได้">
      <tr>
        <td colspan="2" align="center" bgcolor="#CCCCCC">
        <input type="submit" name="Submit2" class="btn btn-primary" value="สั่งซื้อ" />
      </td>
      </tr>
      </table>
      </form>
    </div>


  


  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/sweetalert2@11.js"></script>
  </body>
</html>