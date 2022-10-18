<?php 
include_once('../system/config.php');
session_start();
if(empty($_SESSION['admin'])) {
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>หน้าหลัก (แอดมิน) | Lyndsay Cake</title>
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

  <!-- collection -->
  <section id="section" class="py-5">
    <div class="container">
      <div class="title text-center">
        <h2 class="position-relative d-inline-block">รายการสินค้า</h2>
      </div>


      <div class="col-md-12">
        <div class="row">

          <!-- list product cake  -->

          <?php 
          $list_product_sql = "SELECT * FROM `products` ORDER BY `product_id` DESC";
          $list_product_query = mysqli_query($conn, $list_product_sql);
          while($list_product_row = mysqli_fetch_array($list_product_query)) {

          
          ?>

          <div class = "col-md-6 col-lg-4 col-xl-3 p-2">

            <div class = "special-img position-relative overflow-hidden">
                <img src = "../img/products/<?= $list_product_row['product_image']; ?>" class = "w-100">
                <span class = "position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
                    <i class = "fas fa-heart"></i>
                </span>
            </div>
            
            <div class = "text-center">
                <p class = "text-capitalize mt-3 mb-1"><?= $list_product_row['product_name']; ?></p>
                <span class = "fw-bold d-block">฿ <?= $list_product_row['product_price']; ?></span>
            </div>
            
          </div>
          <?php } ?>

          <!-- list product cake end -->


          

        </div>
      </div>

     

      

      

      
      

    </div>
  </section>
  <!-- collection end -->


  


  <script src="../js/jquery-3.6.0.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="../js/sweetalert2@11.js"></script>
</body>
</html>