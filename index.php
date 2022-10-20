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

  <!-- header -->
  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="..." class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="..." class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="..." class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
    </div>
    <!-- end of header -->

  <!-- collection -->
  <section id="section" class="py-5">
    <div class="container">
      <div class="title text-center">
        <h2 class="position-relative d-inline-block">รายการสินค้าทั้งหมด</h2>
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
                <img src = "img/products/<?= $list_product_row['product_image']; ?>" class = "w-100" height="300" height="100">
                <span class = "position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
                    <i class = "fas fa-heart"></i>
                </span>
            </div>
            
            <div class = "text-center">
                <p class = "text-capitalize mt-3 mb-1"><?= $list_product_row['product_name']; ?></p>
                <span class = "fw-bold d-block">฿ <?= $list_product_row['product_price']; ?></span>
                <a href = "cart.php?p_id=<?= $list_product_row['product_id']; ?>&act=add" class = "btn btn-primary mt-3">ตะกร้าสินค้า</a>
            </div>
            
          </div>
          <?php } ?>

          <!-- list product cake end -->


          

        </div>
      </div>

     

      

      

      
      

    </div>
  </section>
  <!-- collection end -->


  


  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/sweetalert2@11.js"></script>
</body>
</html>