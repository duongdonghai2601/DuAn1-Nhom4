<?php
session_start();
include('./connect.php');
// $user=[];
//giải thích nếu có $_SESSION['user'] thì sẽ gán $user = $_SESSION['user'] còn không có thì bằng rỗng
$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];




if(isset($_POST['xacnhan'])){
 header('location:index.php');

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/91ad5c6d6a.js"
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <title>Về chúng tôi</title>
    <link rel="stylesheet" href="index2.css" />
    <link rel="stylesheet" href="./css/about.css" />
    <style>
      .content .button {
        position: absolute;
        right: 50%;
        width: 30%;
      }
    </style>
  </head>
  <body>
  <header id="header">
      <nav class="menu">
        <ul class="nav-bar">
          <li><a href="index.php">Trang chủ</a></li>
           <!-- <li>
            <a href="#forman">Đồ nam</a>
            <ul class="sub-menu">
              <li><a href="#">Áo sơ mi</a></li>
              <li><a href="#">Quần jean</a></li>
              <li><a href="#">Giày da</a></li>
            </ul>
          </li>  -->
          <li><a href="sanpham.php">Sản phẩm</a></li>
          <li><a href="about.html">Về H2T</a></li>
          <!-- <li>
            <a href="#forher">Đồ nữ</a>
            <ul class="sub-menu">
              <li><a href=#">Áo croptop</a></li>
              <li><a href="#">Đầm nữ</a></li>
              <li><a href="#">Váy nữ</a></li>
            </ul>
          </li> -->
          <li><a href="blog.php">Blog</a></li>
          <li>
          <?php if (isset($user['username'])) { ?>
            <a href="#"><?php echo "Hello " . $user['username']; ?></a>
            <ul class="sub-menu">
            <?php if ($user['role'] == 1) { ?>
              <li><a class="dropdown-item" href="./material-dashboard-master/material-dashboard-master/pages/users.php">Dashboard</a></li>
            <?php } ?>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            <li><a href="thongtin.php">Thông tin</a></li>
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
      <!-- <form method="POST" action="index.php">
      <div class="search">
        <input
          type="text"
          name="searchSanPham" id="search"
          class="search-input"
          placeholder="Bạn tìm gì hôm nay ?"
          spellcheck="false"
        />
        <button class="btn-search" type="submit" name="search">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </div>
      </form>
      <div class="icon">
        <li class="list-icon">
        <a href="viewcart.php"><i class="fa-solid fa-bag-shopping"></i>Giỏ hàng</a>
        </li>
        <li class="list-icon">
          <i class="fa-solid fa-phone"></i> + 84 306 6845
        </li>
      </div> -->
    </header>
    <form action="" method="post">
    <section id="Review" class="Review">
      <div class="parent">
        <div class="info">
          <div class="content">
            <h1>H2T - Cảm ơn quý khách đã ủng hộ</h1>
            <p>
              H2T xin chân thành cảm ơn bạn đã tin tưởng và ủng hộ shop. Chúng
              tớ mong rằng bạn sẽ hài lòng với những sản phẩm của chúng tớ. Nếu
              gặp bất cứ vấn đề gì về sản phẩm, bạn hãy liên hộ với chúng tớ
              ngay để đợi hỗ trợ tận tình nhé !
            </p>
            <button
              class="button"
              type="submit"
              style="margin-top: 50px; width: 30%"
              name="xacnhan">
              Tiếp tục mua sắm
              </button>
          </div>
        </div>
        <div class="image-h2t">
          <img src="./image/logoh2t.png" />
        </div>
      </div>
    </section>
    </form>
    <section id="work" class="work">
      <h2>Worked With</h2>
      <div class="container">
        <div class="row work-section">
          <div class="col-md-2 center">
            <img src="image/logo1.png" alt="" style="width: 200px" />
          </div>
          <div class="col-md-2 center">
            <img src="image/logo2.png" alt="" style="width: 200px" />
          </div>
          <div class="col-md-2 center">
            <img src="image/logo3.png" alt="" style="width: 200px" />
          </div>
          <div class="col-md-2 center">
            <img src="image/logo4.png" alt="" style="width: 200px" />
          </div>
          <div class="col-md-2 center">
            <img src="image/logo5.png" alt="" style="width: 200px" />
          </div>
        </div>
      </div>
    </section>

    <footer class="footer">
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
