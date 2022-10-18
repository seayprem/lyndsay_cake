<?php 
include_once('../system/config.php');
?>

<!-- ADD PRODUCT CONTROLLER INSERT ON MYSQL  -->
<?php 
if(isset($_POST['addProduct'])) {

  $name = $_POST['name'];
  $category = $_POST['category'];
  $detail = $_POST['detail'];
  $price = $_POST['price'];

  // UPLOAD FILE
  $filename = $_FILES['files']['name'];
  $extension = pathinfo($filename, PATHINFO_EXTENSION);

  $checkImage = pathinfo($filename);

  $random = rand(0, 999999999);
  $rename = 'product'.date('ymdhis').$random;
  $newname = $rename . '.' . $extension;

  if(empty($_FILES['files']['name'])) {
    echo "failed";
  } else {
    if($checkImage['extension'] == "jpg" || $checkImage['extension'] == "png") {
      move_uploaded_file($_FILES['files']['tmp_name'], "../img/products/" . $newname);
  
      $addProduct_sql = "INSERT INTO `products`(`product_name`, `product_detail`, `product_price`, `product_image`, `cate_id`) VALUES ('$name', '$detail', $price, '$newname', $category)";
      $addProduct_query = mysqli_query($conn, $addProduct_sql);
      if($addProduct_query) {
        echo "success";
      } else {
        echo "failed";
      }
  
    }
  }

  

}
?>
<!-- ADD PRODUCT CONTROLLER INSERT ON MYSQL END  -->


<!-- EDIT UPDATE PRODUCT CONTROLLER INSERT ON MYSQL  -->
<?php 
if(isset($_POST['editProduct'])) {
  $name = $_POST['name'];
  $category = $_POST['category'];
  $detail = $_POST['detail'];
  $price = $_POST['price'];

  // UPLOAD FILE
  $filename = $_FILES['files']['name'];
  $extension = pathinfo($filename, PATHINFO_EXTENSION);

  $checkImage = pathinfo($filename);

  $random = rand(0, 999999999);
  $rename = 'product'.date('ymdhis').$random;
  $newname = $rename . '.' . $extension;
}
?>
<!-- EDIT UPDATE PRODUCT CONTROLLER INSERT ON MYSQL END  -->


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>จัดการสินค้า | Lyndsay Cake</title>
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
        <h2 class="position-relative d-inline-block">จัดการสินค้า</h2>
      </div>

      <div class="text-end">
        <a href="productController.php?btnAddProduct=btnAddProduct" class="btn btn-success">เพิ่มสินค้า</a>
      </div>

      <!-- get add product  -->
      <?php 
        if(isset($_GET['btnAddProduct']) == "btnAddProduct") {
          
        
      ?>

      <form action="#" method="POST" enctype="multipart/form-data">
        <div class="col-md-5 mx-auto">
          <div class="mb-3">
            <label class="form-label">ชื่อสินค้า</label>
            <input type="text" name="name" class="form-control" placeholder="กรุณากรอกชื่อผู้ใช้" required>
          </div>
          <div class="mb-3">
            <label class="form-label">ประเภทสินค้า</label>
            <select class="form-select" name="category">
              <option selected disabled>กรุณาเลือกสินค้า</option>
              <?php 
              $category_sql = "SELECT * FROM `category` ORDER BY `cate_id` DESC";
              $category_query = mysqli_query($conn, $category_sql);
              while($category_row = mysqli_fetch_array($category_query)) {
              ?>

              <option value="<?= $category_row['cate_id']; ?>"><?= $category_row['cate_name']; ?></option>

              <?php } ?>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">รายละเอียด</label>
            <textarea name="detail" rows="5" class="form-control" placeholder="กรุณากรอกรายละเอียด" required></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">ราคาสินค้า</label>
            <input type="number" name="price" class="form-control" placeholder="กรุณากรอกราคาสินค้า" required>
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">รูปภาพสินค้า</label>
            <input class="form-control" type="file" name="files" id="formFile">
          </div>

          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit" name="addProduct">เพิ่มสินค้า</button>
            <a href="productController.php" class="btn btn-primary">ยกเลิก</a>            
          </div>

        </div>
      </form>

      <?php 
      }
      ?>
      <!-- get add product end -->

      <!-- edit & update product  -->
      <?php 
        if(isset($_GET['editUpdate'])) {
      ?>
      <?php 
      $edit_id = $_GET['editUpdate'];
      $edit_sql = "SELECT * FROM `products` INNER JOIN category ON category.cate_id = products.cate_id WHERE `product_id` = $edit_id";
      $edit_query = mysqli_query($conn, $edit_sql);
      $edit_row = mysqli_fetch_array($edit_query);
      ?>
      <form action="#" method="POST" enctype="multipart/form-data">
        <div class="col-md-5 mx-auto">
          <div class="mb-3">
            <label class="form-label">ชื่อสินค้า</label>
            <input type="text" name="name" class="form-control" placeholder="กรุณากรอกชื่อผู้ใช้" value="<?= $edit_row['product_name']; ?>" required>
          </div>
          <div class="mb-3">
            <label class="form-label">ประเภทสินค้า</label>
            <select class="form-select" name="category">
              <option value="<?= $edit_row['cate_id']; ?>" selected><?= $edit_row['cate_name']; ?></option>
              <option disabled>กรุณาเลือกสินค้า</option>
              <?php 
              $category_sql = "SELECT * FROM `category` ORDER BY `cate_id` DESC";
              $category_query = mysqli_query($conn, $category_sql);
              while($category_row = mysqli_fetch_array($category_query)) {
              ?>

              <option value="<?= $category_row['cate_id']; ?>"><?= $category_row['cate_name']; ?></option>

              <?php } ?>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">รายละเอียด</label>
            <textarea name="detail" rows="5" class="form-control" placeholder="กรุณากรอกรายละเอียด" required><?= $edit_row['product_detail']; ?></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">ราคาสินค้า</label>
            <input type="number" name="price" class="form-control" placeholder="กรุณากรอกราคาสินค้า" value="<?= $edit_row['product_price']; ?>" required>
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">รูปภาพสินค้า</label>
            <input class="form-control" type="file" name="files" id="formFile">
          </div>

          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit" name="editProduct">แก้ไขสินค้า</button>
            <a href="productController.php" class="btn btn-primary">ยกเลิก</a>            
          </div>

        </div>
      </form>


      <?php } ?>
      <!-- edit & update product end -->

    </div>
  </section>
  <!-- add Product end -->

  <div class="container">
    <h3>สินค้าทั้งหมด</h3>
    <table class="table table-hover" id="myTable">
      <thead>
        <tr>
          <th class="text-center">รูปภาพสินค้า</th>
          <th class="text-center">ชื่อสินค้า</th>
          <th class="text-center">ประเภทสินค้า</th>
          <th class="text-center">ราคาสินค้า</th>
          <th class="text-center">จัดการ</th>
        </tr>
      </thead>
      <tbody>
        <!-- list product -->
        <?php 
        $list_product_sql = "SELECT * FROM `products` INNER JOIN category ON category.cate_id = products.cate_id ORDER BY `product_id` DESC";
        $list_product_query = mysqli_query($conn, $list_product_sql);
        while($list_product_row = mysqli_fetch_array($list_product_query)) {
        ?>
        <tr class="text-center">
          <td><img src="../img/products/<?= $list_product_row['product_image']; ?>" width="150" height="100"></td>
          <td><?= $list_product_row['product_name']; ?></td>
          <td><?= $list_product_row['cate_name']; ?></td>
          <td><?= $list_product_row['product_price']; ?></td>
          <td>
            <a href="productController.php?editUpdate=<?=$list_product_row['product_id']; ?>" class="btn btn-primary">แก้ไข</a>
            <a href="productController.php?delete=<?=$list_product_row['product_id']; ?>" class="btn btn-primary" onclick="return confirm('แน่ใจใช่หรือไม่?')">ลบ</a>
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