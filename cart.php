<?php 
error_reporting(0);
include_once('system/config.php');
session_start();
?>

<!-- LOGIC CART  -->
<?php 

 $p_id = $_GET['p_id']; 
 $act = $_GET['act'];

 if($act=='add' && !empty($p_id))
 {
   if(isset($_SESSION['cart'][$p_id]))
   {
     $_SESSION['cart'][$p_id]++;
    header("Location: cart.php");
   }
   else
   {
     $_SESSION['cart'][$p_id]=1;
   }
 }

 if($act=='remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
 {
   unset($_SESSION['cart'][$p_id]);
 }

 if($act=='update')
 {
   $amount_array = $_POST['amount'];
   foreach($amount_array as $p_id=>$amount)
   {
     $_SESSION['cart'][$p_id]=$amount;
   }
 }
?>
<!-- LOGIC CART END -->


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

  <!-- handle cart  -->
  <h3 class="text-center mt-5">ตะกร้าสินค้า</h3>
  <div class="container">
   
    <hr>
    <form id="frmcart" name="frmcart" method="post" action="?act=update">
  <table class="table" align="center" class="square">
    <tr>
      <td colspan="5" bgcolor="#CCCCCC">
      <b>ตะกร้าสินค้า</span></td>
    </tr>
    <tr>
      <td bgcolor="#EAEAEA"  class='text-center'>ภาพสินค้า</td>
      <td align="center" bgcolor="#EAEAEA">สินค้า</td>
      <td align="center" bgcolor="#EAEAEA">ประเภทสินค้า</td>
      <td align="center" bgcolor="#EAEAEA">ราคา</td>
      <td align="center" bgcolor="#EAEAEA">จำนวน (ปอนด์)</td>
      <td align="center" bgcolor="#EAEAEA">รวม(บาท)</td>
      <td align="center" bgcolor="#EAEAEA">ลบ</td>
    </tr>
    
<?php

$total=0;
if(!empty($_SESSION['cart']))
{
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql = "select * from products inner join category on products.cate_id = category.cate_id where product_id=$p_id";
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($query);
		$sum = $row['product_price'] * $qty;
    $imgs = $row['product_image'];
		$total += $sum;
		echo "<tr>";
		echo "<td class='text-center'><img src='img/products/".$row['product_image']."' width='150' height='150'></td>";
		echo "<td class='text-center'>" . $row["product_name"] . "</td>";
		echo "<td class='text-center'>" . $row["cate_name"] . "</td>";
		echo "<td align='center'>" .number_format($row["product_price"],2) . "</td>";
		echo "<td align='center'>";  
		echo "<input type='number' name='amount[$p_id]' value='$qty' size='2' style='width: 60px;'/></td>";
		echo "<td width='93' align='center'>".number_format($sum,2)."</td>";
		//remove product
		echo "<td align='center'><a href='cart.php?p_id=$p_id&act=remove' class='btn btn-primary'>ลบ</a></td>";
		echo "</tr>";
	}
	echo "<tr>";
  	echo "<td colspan='3' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
    echo "<td></td>";
    echo "<td></td>";
  	echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
  	echo "<td align='left' bgcolor='#CEE7FF'></td>";
    echo "<td></td>";
    echo "<td></td>";

	echo "</tr>";
} else {
  echo '<script>alert("กรุณาเลือกสินค้าก่อน")</script>';
  // echo '<script>history.back()</script>';
  echo '<script>window.location.href = "products.php"</script>';
}
?>
<tr>
<td><a href="product.php" class="btn btn-primary">กลับหน้ารายการสินค้า</a></td>
<td></td>
<td></td>
<td colspan="4" align="right">
    <!-- <input type='text' name='write' placeholder='เขียนหน้าเค้กที่ต้องการ...' class='form-control' required> -->
    <input type="submit" name="button" id="button" class="btn btn-primary" value="ปรับปรุง" />
    <input type="button" name="Submit2" value="สั่งซื้อ" class="btn btn-primary" onclick="window.location='confirm.php';" />
</td>
</tr>
</table>
</form>
  </div>
 
  <!-- handle cart end -->


  


  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/sweetalert2@11.js"></script>
</body>
</html>