<?php
session_start();
include('./connect.php');
// $user=[];
//giải thích nếu có $_SESSION['user'] thì sẽ gán $user = $_SESSION['user'] còn không có thì bằng rỗng
$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
// $user = $_SESSION['user'];


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script
      src="https://kit.fontawesome.com/91ad5c6d6a.js"
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 

    <title>H2T SHOP</title>
    <link rel="stylesheet" href="./css/head-foot.css" />
    <link rel="stylesheet" href="sp.css" />

  </head >
  <body>
    <header id="header" style="margin-bottom:100px">
      <nav class="menu">
        <ul class="nav-bar">
          <li><a href="index.php">Trang chủ</a></li>

          <li><a href="about.html">Về H2T</a></li>

          <li><a href="blog.php">Blog</a></li>
          <li>
          <?php if (isset($user['username'])) { ?>
            <a href="#"><?php echo "Hello " . $user['username']; ?></a>
            <ul class="sub-menu">
            <?php if ($user['role'] == 1) { ?>
              <li><a class="dropdown-item" href="dashboard.php">Dashboard</a></li>
            <?php } ?>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            <li><a href="#">Sửa thông tin</a></li>
            </ul>
            <?php } else { ?>
            <a href="#">Tài khoản</a>
            <ul class="sub-menu">
              <li><a href="login.php">Đăng Nhập</a></li>
              <li><a href="sign_up.php">Đăng Ký</a></li>

            </ul>
            <?php } ?>
          </li>
        </ul>
      </nav>
      <!-- <li><a href="#"><img src="./image/logoh2t.png" class="logo"></a></li> -->
      <div class="search">
        <input
          type="text"
          id="text"
          class="search-input"
          placeholder="Bạn tìm gì hôm nay ?"
          spellcheck="false"
        />
        <button class="btn-search" type="submit">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </div>
      <div class="icon">
        <li class="list-icon">
          <i class="fa-solid fa-bag-shopping"></i> <a href="#">Giỏ hàng</a>
        </li>
        <li class="list-icon">
          <i class="fa-solid fa-phone"></i> + 84 306 6845
        </li>
      </div>
    </header>
    
    <table class="table" style="margin-bottom: 250px;">
  <thead>
    <tr>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Ảnh sản phẩm</th>
      <th scope="col">Giá</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Tổng tiền</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    if(isset($_SESSION['cart'])){
        $i=0;

        foreach ($_SESSION['cart'] as $key => $items) {
            extract($items);
            $total = (int)$quantity * (int)$price;
            $linkdelete ="deletecart.php?i=" .$i;
            echo'<tr>
                    <td>
                    '.$name.'
                    </td>
                    <td>
                    <img style="width:100px;" src="./material-dashboard-master/material-dashboard-master/pages/uploads/'.$image.'">
                    </td>
                    <td>
                    '. $price .' VND
                    </td>
                    <td>
                    '. $quantity .'
                    </td>
                    <td>
                    '. $total .' VND
                    </td>
                    <td>
                    <a class="btn" href="'.$linkdelete.'"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
            </tr>';           
          }
        $i++;

    }
    ?>
        <td>
        <?php 
        if (isset($_SESSION['cart']) && count(($_SESSION['cart'])) > 0) {
          echo'<a class="btn " href="info.php" style="position:absolute;right:50px;background-color:#765827;color:white;">Tiếp tục đặt hàng</a>';
         }
         else{
           echo"Bạn chưa thêm sản phẩm nào !";
         }
?>
        </td>
  </tbody>

</table>


    <footer class="footer" style="margin-top:100px;">
    <div class="container">
      <div class="row">
        <div class="footer-col">
          <h4>company</h4>
          <ul>
            <li><a href="#">about us</a></li>
            <li><a href="#">our services</a></li>
            <li><a href="#">privacy policy</a></li>
            <li><a href="#">affiliate program</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>get help</h4>
          <ul>
            <li><a href="#">FAQ</a></li>
            <li><a href="#">shipping</a></li>
            <li><a href="#">returns</a></li>
            <li><a href="#">order status</a></li>
            <li><a href="#">payment options</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>online shop</h4>
          <ul>
            <li><a href="#">watch</a></li>
            <li><a href="#">bag</a></li>
            <li><a href="#">shoes</a></li>
            <li><a href="#">dress</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>follow us</h4>
          <div class="social-links">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
</body>
</html>