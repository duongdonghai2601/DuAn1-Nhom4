<?php
session_start();
include('./connect.php');
// $user=[];
//giải thích nếu có $_SESSION['user'] thì sẽ gán $user = $_SESSION['user'] còn không có thì bằng rỗng
$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
// $user = $_SESSION['user'];
$sql1 = "SELECT * FROM blogs";
$data = mysqli_query($mysqli, $sql1);

$sqlCate = "SELECT * FROM blog_categories";
$queryCate = mysqli_query($mysqli, $sqlCate);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/91ad5c6d6a.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />


  <title>H2T SHOP</title>
  <link rel="stylesheet" href="index.css" />
  <style>
    h2.title-banner {
      font-size: 1.7rem;
      font-weight: bold;
      position: absolute;
      top: 150px;
      left: 80px;
      margin-bottom: 20px;
      color: var(--primary-color);
    }
  </style>
</head>

<body onclick="loadAnh()">
  <header id="header">
    <nav class="menu">
      <ul class="nav-bar">
        <li><a href="index2.php">Trang chủ</a></li>
        <!-- <li>
            <a href="#forman">Đồ nam</a>
            <ul class="sub-menu">
              <li><a href="#">Áo sơ mi</a></li>
              <li><a href="#">Quần jean</a></li>
              <li><a href="#">Giày da</a></li>
            </ul>
          </li>  -->
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
            <a href="#">
              <?php echo "Hello " . $user['username']; ?>
            </a>
            <ul class="sub-menu">
              <?php if ($user['role'] == 1) { ?>
                <li><a class="dropdown-item"
                    href="./material-dashboard-master/material-dashboard-master/pages/users.php">Dashboard</a></li>
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
    <form method="POST" action="index2.php">
      <div class="search">
        <input type="text" name="searchSanPham" id="search" class="search-input" placeholder="Bạn tìm gì hôm nay ?"
          spellcheck="false" />
        <button class="btn-search" type="submit" name="search">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </div>
    </form>
    <div class="icon">
      <li class="list-icon">
        <i class="fa-solid fa-bag-shopping"></i> <a href="#">Giỏ hàng</a>
      </li>
      <li class="list-icon">
        <i class="fa-solid fa-phone"></i> + 84 306 6845
      </li>
    </div>
  </header>

  <a href="#header" class="btn-go"><i class="fa-solid fa-arrow-up" style="margin-top:15px"></i></a>







  <!--CATEGORIES-->
  <br>
  <br>
  <!-- Hiển thị load category -->
  


  <!-- Hien thi search san pham -->

  



  <h2 class="new-product-title">Bài viết mới</h2>

  <!-- DESIGN SECTION FOR MAN -->
  <div class="product-container">
    <?php
    foreach ($data as $key => $value):
      ?>
      <div class="product-card product">
        <a href="chitietblog.php">
          <?php echo "<img src='./uploads/" . $value['blog_image'] . "'width='100%';height:400px;>"; ?>
        </a>
        <h3>
          <?php echo $value['blog_title'] ?>
        </h3>
        <p>
          <?php echo $value['blog_created_at'] ?> 
        </p>
        <a class="button" href="chitietblog.php?id=<?php echo $value['blog_id'] ?>">Xem thêm</a>
        <!-- <button type="submit" class="button">Xem thêm</button> -->
      </div>
    <?php endforeach ?>
  </div>





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
<script src="slideshow.js"></script>
<script>
  var myIndex = 0;
  carousel();

  function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {
      myIndex = 1;
    }
    x[myIndex - 1].style.display = "block";
    setTimeout(carousel, 4000); // thay doi anh moi 4s
  }
</script>

</html>