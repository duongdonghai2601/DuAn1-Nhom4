<?php
session_start();
include('./connect.php');
// $user=[];
//giải thích nếu có $_SESSION['user'] thì sẽ gán $user = $_SESSION['user'] còn không có thì bằng rỗng
$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
// $user = $_SESSION['user'];


?>
<?php
// Kiểm tra xem form đã được gửi đi hay chưa
if (isset($_POST['load']) && isset($_POST["category"])) {
    // Lấy giá trị category được chọn từ form
    $category = $_POST["category"];
    if(!($category)){
      echo"Vui lòng chọn doanh mục";
    }
    // Truy vấn cơ sở dữ liệu để lấy danh sách sản phẩm trong category
    $sql2 = "SELECT * FROM products INNER JOIN categories ON products.category_id = categories.category_id WHERE products.category_id = '{$category}'";
    // Thực thi truy vấn
    $data1 = mysqli_query($mysqli, $sql2);

}

//search php
if (isset($_POST['search'])) {
  $search = $_POST['searchSanPham'];
  if ($search == "") {
      echo "Vui lòng nhập tên sản phẩm cần tìm";
      return;
  } else {
      $sql3 = "SELECT * FROM products WHERE product_name LIKE '%$search%'";
      $query3 = mysqli_query($mysqli, $sql3);
  }
}
$sql1 = "SELECT * FROM products";
$data = mysqli_query($mysqli, $sql1);

$sqlCate = "SELECT * FROM categories";
$queryCate = mysqli_query($mysqli, $sqlCate);
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
 

    <title>H2T SHOP</title>
    <link rel="stylesheet" href="index2.css" />
    <link rel="stylesheet" href="sanpham.css" />

    <style>
    </style>
  </head >
  <body onclick="loadAnh()">
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
      <form method="POST" action="index.php">
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
      </div>
    </header>

    <a href="#header" class="btn-go"><i class="fa-solid fa-arrow-up" style="margin-top:15px"></i></a>
    
    

<!--CATEGORIES-->
<form method="post" action="">
    <div class="container-categories">
    <div class="categories-design load">
<h2 class="new-product-title">Doanh mục sản phẩm </h2>


  <label class="form-control">
  <? foreach ($queryCate as $key => $value) { ?>
    <input type="checkbox" name="category"  value="<? echo $value['category_id']; ?>"><? echo $value['category_name']; ?>
    <? } ?>

  </label>


<button type="submit" class="button-load" name="load" style="margin-top:30px;">Load</button>
</div>

</form>
<!-- Hiển thị load category -->
<div class="product-categories">
<?php
    if (isset($_POST['load']) && isset($_POST['category'])) { //Kiểm tra xem nếu chưa nhấn thì ko chạy foreach
        foreach ($data1 as $key => $value) {
    ?>
      <div class="product-categories-card product1">
    <a href="chitietsanpham.php"> <?php echo "<img src='./material-dashboard-master/material-dashboard-master/pages/uploads/" . $value['product_image_main'] . "'width='100%';height:400px;>"; ?></a>
          <h3><?php echo $value['product_name'] ?></h3>
          <p>$ <?php echo $value['product_price'] ?> VND</p>
          <a class="button" href="chitietsanpham.php?id=<?php echo $value['product_id'] ?>">Xem thêm</a>
      </div>
      <?php }
    } ?>
</div>
</div>


<!-- Hien thi search san pham -->

<div class="product-container">
<?php
    if (isset($_POST['search'])) { //Kiểm tra xem nếu chưa nhấn thì ko chạy foreach
        foreach ($query3 as $key => $value) {
    ?>
      <div class="product-card product">
    <a href="chitietsanpham.php"> <?php echo "<img src='./material-dashboard-master/material-dashboard-master/pages/uploads/" . $value['product_image_main'] . "'width='100%';height:400px;>"; ?></a>
          <h3><?php echo $value['product_name'] ?></h3>
          <p>$ <?php echo $value['product_price'] ?> VND</p>
          <a class="button" href="chitietsanpham.php?id=<?php echo $value['product_id'] ?>">Xem thêm</a>
      </div>
      <?php }
    } ?>
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
