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

      <div class = "col-md-6 col-lg-4 col-xl-3 p-2">
        <div class = "special-img position-relative overflow-hidden">
            <img src = "../img/products/c_formal_gray_shirt.png" class = "w-100">
            <span class = "position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
                <i class = "fas fa-heart"></i>
            </span>
        </div>
        <div class = "text-center">
            <p class = "text-capitalize mt-3 mb-1">เค้กส้ม</p>
            <span class = "fw-bold d-block">฿ 45.50</span>
            <a href = "#" class = "btn btn-primary mt-3">ตะกร้าสินค้า</a>
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