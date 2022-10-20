<nav class = "navbar navbar-expand-lg navbar-light bg-white py-4">
    <div class = "container">
        <a class = "navbar-brand d-flex justify-content-between align-items-center order-lg-0" href = "index.html">
            <img src = "img/content/shopping-bag-icon.png" alt = "site icon">
            <span class = "text-uppercase fw-lighter ms-2">Lyndsay Cake</span>
        </a>

        <div class = "order-lg-2 nav-btns">
            <?php 
            if(!empty($_SESSION['user'])) {

            
            ?>
            <a href="#" class="btn position-relative">
              <i class="fa-solid fa-user"></i> <?= $_SESSION['user']; ?>
            </a>
            <a href="logout.php" class="btn position-relative">
              <i class="fa-solid fa-user"></i> ออกจากระบบ
            </a>
            <?php } else { ?>
            <a href="login.php" class="btn position-relative">
              <i class="fa-solid fa-user"></i> เข้าสู่ระบบ
            </a>
            <?php } ?>
            <a href="cart.php" class="btn position-relative">
              <i class = "fa fa-shopping-cart"></i> ตะกร้าสินค้า <span class="badge bg-primary"> 
                <?php if(empty($_SESSION['cart'])) 
                { echo '0'; 
                } else { echo count($_SESSION['cart']); }    ?> </span> </span>
            </a>
        </div>

        <button class = "navbar-toggler border-0" type = "button" data-bs-toggle = "collapse" data-bs-target = "#navMenu">
            <span class = "navbar-toggler-icon"></span>
        </button>

        <div class = "collapse navbar-collapse order-lg-1" id = "navMenu">
            <ul class = "navbar-nav mx-auto text-center">
                <li class = "nav-item px-2 py-2">
                    <a class = "nav-link text-uppercase text-dark" href = "index.php">หน้าหลัก</a>
                </li>
                <li class = "nav-item px-2 py-2">
                    <a class = "nav-link text-uppercase text-dark" href = "products.php">เค้ก</a>
                </li>
                <li class = "nav-item px-2 py-2">
                    <a class = "nav-link text-uppercase text-dark" href = "orders.php">รายการสั่งซื้อ</a>
                </li>
                <li class = "nav-item px-2 py-2">
                    <a class = "nav-link text-uppercase text-dark" href = "about.php">เกี่ยวกับเรา</a>
                </li>
                <li class = "nav-item px-2 py-2">
                    <a class = "nav-link text-uppercase text-dark" href = "contact.php">ติดต่อเรา</a>
                </li>
            </ul>
        </div>
    </div>
  </nav>