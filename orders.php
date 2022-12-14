<?php 
include_once('system/config.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>จัดการผู้ใช้ | Lyndsay Cake</title>
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

  <!-- add Product -->
  <section id="section" class="py-5">
    <div class="container">
      <div class="title text-center">
        <h2 class="position-relative d-inline-block">รายการสั่งซื้อ</h2>
      </div>
    </div>
  </section>

  <!-- DETAIL  -->
  <?php 
  if(isset($_GET['detail_order'])) {
    $detail_order_id = $_GET['detail_order'];
    
  
  ?>

  <div class="container">
    <table class="table">
      <thead>
        <tr class="text-center">
          <th>รูปภาพสินค้า</th>
          <th>ชื่อสินค้า</th>
          <th>ประเภทสินค้า</th>
          <th>จำนวนที่สั่งซื้อ (ปอนด์)</th>
          <th>ราคารวม</th>
        </tr>
      </thead>
      <tbody>
        <!-- List order join order detail  -->
        <!-- // SELECT * FROM order_head INNER JOIN order_detail ON order_head.o_id = order_detail.o_id WHERE order_head.o_id = 1 -->

        <!-- SELECT * FROM order_head INNER JOIN order_detail ON order_head.o_id = order_detail.o_id INNER JOIN products ON order_detail.product_id = products.product_id WHERE order_head.o_id = 1 -->

        <?php 
          $list_order_detail_sql = "SELECT * FROM order_head INNER JOIN order_detail ON order_head.o_id = order_detail.o_id INNER JOIN products ON order_detail.product_id = products.product_id INNER JOIN category ON products.cate_id = category.cate_id WHERE order_head.o_id = $detail_order_id";
          $list_order_detail_query = mysqli_query($conn, $list_order_detail_sql);
          while($list_order_detail_row = mysqli_fetch_array($list_order_detail_query)) {
        ?>
        
        <tr class="text-center">
          <td><img src="img/products/<?= $list_order_detail_row['product_image']; ?>" alt="" width="100" height="100"></td>
          <td><?= $list_order_detail_row['product_name']; ?></td>
          <td><?= $list_order_detail_row['cate_name']; ?></td>
          <td><?= $list_order_detail_row['d_qty']; ?></td>
          <td><?= number_format($list_order_detail_row['d_subtotal']); ?></td>
        </tr>
        <?php } ?>
        <!-- List order join order detail end -->

      </tbody>
    </table>
    <hr>
    <div class="text-center">
      <a href="orders.php" class="btn btn-primary mb-5">ย้อนกลับ</a>
    </div>
  </div>

  <?php } ?>
  <!-- DETAIL END -->



  <div class="container">
    <h3>คำสั่งซื้อทั้งหมด</h3>
    <table class="table table-hover" id="myTable">
      <thead>
        <tr>
          <th class="text-center">ลำดับ</th>
          <th class="text-center">หลักฐานการโอน</th>
          <th class="text-center">เขียนหน้าเค้ก</th>
          <th class="text-center">ราคาที่สั่งหมด</th>
          <th class="text-center">วันที่สั่ง</th>
          <th class="text-center">วันที่นัดรับ</th>
          <th class="text-center">สถานะ</th>
          <th class="text-center">รายละเอียด</th>
        </tr>
      </thead>
      <tbody>
        <!-- list order management -->
        <?php 
        if(empty($_SESSION['user_id'])) {
          echo '<script>alert("กรุณาเข้าสู่ระบบก่อน");window.location.href = "login.php"</script>';
        }
        $userid = $_SESSION['user_id'];
        
        $sql = "SELECT * FROM `order_head` WHERE user_id = $userid ORDER BY `o_id` DESC";
        $query = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($query)) {

        
        ?>
        <tr class="text-center">
          <td><?= $row['o_id']; ?></td>
          <td><a href="img/products/<?= $row['o_prove']; ?>" target="_blank"><img src="img/products/<?= $row['o_prove']; ?>" alt="" width="100" height="100"></a></td>
          <td><?= $row['o_special']; ?></td>
          <td><?= number_format($row['o_total']); ?></td>
          <td><?= $row['o_dttm']; ?></td>
          <td><?= $row['o_datemeet']; ?></td>
          <td>
            <?php 
            if($row['o_status'] == 1) {
              echo "เสร็จสิ้นแล้ว";
            } else {
              echo "กำลังดำเนินงาน";
            }
            ?>
          </td>
          <td>
            <a href="orders.php?detail_order=<?= $row['o_id']; ?>" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
          </td>
        </tr>
        <?php } ?>
        <!-- list order management end -->

      </tbody>
    </table>
  </div>



  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/sweetalert2@11.js"></script>

  <script>
    $(document).ready( function () {
      $('#myTable').DataTable();
    } );
  </script>

</body>
</html>