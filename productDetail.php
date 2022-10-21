<?php 
include_once('system/config.php');
session_start();
?>

<?php 
if(isset($_GET['detail'])) {
  $detail_id = $_GET['detail'];



} else {
  header("Location: products.php");
}
?>


<!-- Comment Controller  -->
<?php 
if(isset($_POST['comment_submit'])) {

  $comment = $_POST['comment'];
  $session_userId = $_SESSION['user_id'];
  
  $comment_sql = "INSERT INTO `comments` (`comment_context`, `product_id`, `user_id`) VALUES ('$comment', $detail_id, $session_userId)";
  $comment_query = mysqli_query($conn, $comment_sql);
  if($comment_query) {
    echo "<script>window.location.href = 'productDetail.php?detail=$detail_id'</script>";
  } else {
    echo "<script>alert('กรุณาเข้าสู่ระบบ');window.location.href = 'login.php'</script>";
  }
  

}
?>
<!-- Comment Controller end -->


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

  <!-- collection -->
  <section id="section" class="py-5">
    <div class="container">
      <div class="title text-center">
        <h2 class="position-relative d-inline-block">รายการสินค้า</h2>
      </div>

      
      <div class="col-md-12 mt-5">
        <div class="row">

          <!-- list product cake  -->

          <?php 
          $list_product_sql = "SELECT * FROM `products` INNER JOIN category ON products.cate_id = category.cate_id WHERE `product_id` = $detail_id";
          $list_product_query = mysqli_query($conn, $list_product_sql);
          while($list_product_row = mysqli_fetch_array($list_product_query)) {

          
          ?>

          <div class = "col-md-6 col-lg-6 col-xl-6 p-2">

            <div class = "special-img position-relative overflow-hidden">
                <img src = "img/products/<?= $list_product_row['product_image']; ?>" class = "w-100" width="450" height="400">
                <span class = "position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
                    <i class = "fas fa-heart"></i>
                </span>
            </div>
            
            <div class = "text-center">
            </div>
            
          </div>

          <div class = "col-md-6 ms-auto">
            <h3>รายละเอียดสินค้า</h3>
            <hr>
            <b>ชื่อสินค้า : </b><p style="text-decoration: none; color: #000; display: inline-block;"><?= $list_product_row['product_name']; ?></p><br>
            <b>ประเภทสินค้า : </b><p style="text-decoration: none; color: #000; display: inline-block;"><?= $list_product_row['cate_name']; ?></p><br>
            <b>รายละเอียดสินค้า : </b><p style="text-decoration: none; color: #000; display: inline-block;"><?= $list_product_row['product_detail']; ?></p><br>
            <b>ราคาสินค้า : </b><p style="text-decoration: none; color: #000; display: inline-block;"><?= number_format($list_product_row['product_price']); ?></p>
            <br><br><br><br><br><br><br><br><br>
            <div class="text-center">
              <a href = "cart.php?p_id=<?= $list_product_row['product_id']; ?>&act=add" class = "btn btn-primary mt-3">ตะกร้าสินค้า</a>
              <a href = "products.php" class = "btn btn-primary mt-3">ย้อนกลับ</a>
            </div>
          </div>
          
          <hr class="mt-5">

          <div class="container">
            <h3 class="text-center">ความคิดเห็น</h3>

            <!-- LIST Comment  -->
            <?php 
            $list_comment_sql = "SELECT * FROM `comments` INNER JOIN products ON comments.product_id = products.product_id INNER JOIN users ON comments.user_id = users.user_id ORDER BY `comment_id` DESC";
            $list_comment_query = mysqli_query($conn, $list_comment_sql);
            while($list_comment_row = mysqli_fetch_array($list_comment_query)) {
            ?>
            <figure>
              <blockquote class="blockquote">
                <p><?= $list_comment_row['comment_context']; ?></p>
              </blockquote>
              <figcaption class="blockquote-footer">
                แสดงความคิดเห็นโดย <cite title="Source Title"><?= $list_comment_row['user_fullname']; ?></cite>
              </figcaption>
            </figure>
            <?php } ?>
            <!-- LIST Comment end -->
            
            <!-- Comment  -->
            <!-- <h3>แสดงความคิดเห็น</h3> -->
            
            <form action="#" method="POST">
              <div class="mb-3 mt-5">
                <label for="exampleFormControlTextarea1" class="form-label">แสดงความคิดเห็น</label>
                <textarea class="form-control" name="comment" placeholder="ช่องกรอกแสดงความคิดเห็น" id="exampleFormControlTextarea1" rows="6"></textarea>
              </div>
              <div class="text-end">
                <button class="btn btn-primary" name="comment_submit" type="submit">แสดงความเห็น</button>
              </div>
            </form>

            <!-- Comment end -->  

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