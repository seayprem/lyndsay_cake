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
  <style>

    .nav-tab {
      color: black;
    }

    .nav-tab:hover {
      background-color: #e5345b;
      color: white !important;
    }

    .active {
      background-color: #e5345b !important;
    }
  </style>
</head>
<body>
  
  <!-- navbar start  -->
  <?php include('includes/navbar.inc.php'); ?>
  <!-- navbar end  -->

  

  <!-- collection -->
  <section id="section" class="py-5">
    <div class="container">
      <div class="title text-center">
        <h2 class="position-relative d-inline-block">เค้ก</h2>
      </div>


      <div class="col-md-12">
        <div class="row">

          <div class="col-md-3">
            <nav class="nav nav-pills flex-column flex-sm-column">
              <a class="flex-sm-fill text-sm-center nav-link nav-tab <?php if(empty($_GET['cate'])) { echo 'active'; } ?>" href="products.php">ทั้งหมด</a>
              <!-- LIST CATE  -->
              <?php 
              $list_cate_sql = "SELECT * FROM `category` ORDER BY cate_id DESC";
              $list_cate_query = mysqli_query($conn, $list_cate_sql);
              while($list_cate_row = mysqli_fetch_array($list_cate_query)) {

              
              ?>
              <a class="flex-sm-fill nav-link nav-tab " href="products.php?cate=<?= $list_cate_row['cate_name']; ?>"><?= $list_cate_row['cate_name']; ?></a>
              <?php } ?>
              <!-- LIST CATE  -->

            </nav>

          </div>

          <div class="col-md-9">
            <div class="row">
              <!-- list product cake  -->

                <?php 
                if(!isset($_GET['cate'])) {
                  $list_product_sql = "SELECT * FROM `products` INNER JOIN category ON products.cate_id = category.cate_id WHERE category.cate_name != '' ORDER BY `product_id` DESC";

                } else {
                  $cate_nam = $_GET['cate'];
                  $list_product_sql = "SELECT * FROM `products` INNER JOIN category ON products.cate_id = category.cate_id WHERE category.cate_name = '$cate_nam' ORDER BY `product_id` DESC";
                }
                $list_product_query = mysqli_query($conn, $list_product_sql);
                while($list_product_row = mysqli_fetch_array($list_product_query)) {

                
                ?>

              

                <div class = "col-md-6 col-lg-6 col-xl-4 p-2">

                  <div class = "special-img position-relative overflow-hidden">
                      <a href="productDetail.php?detail=<?= $list_product_row['product_id']; ?>"><img src = "img/products/<?= $list_product_row['product_image']; ?>" class = "w-100" height="300" height="100"></a>
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
                <?php } 
                
                ?>

          <!-- list product cake end -->
            </div>
          </div>

          


          

        </div>
      </div>

     

      

      

      
      

    </div>
  </section>
  <!-- collection end -->


   <!-- collection -->
 

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
  <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>

</body>
</html>