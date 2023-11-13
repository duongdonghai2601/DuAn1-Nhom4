<?php
session_start();
include('./connect.php');
// $user=[];
//giải thích nếu có $_SESSION['user'] thì sẽ gán $user = $_SESSION['user'] còn không có thì bằng rỗng
$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
// $user = $_SESSION['user'];
?>



<?php
include('./connect.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE product_id = $id";

    $query = mysqli_query($mysqli, $sql);

    $data = mysqli_fetch_array($query);

    $sql1 = "SELECT * FROM products WHERE category_id = '$data[category_id]'";
    $data1 = mysqli_query($mysqli, $sql1);
}


if(isset($_POST['binhluan'])) {
  if($_SESSION['user'] == ""){
    header('location:login.php');
  }
  $noidung = $_POST['content'];
  $username = $_SESSION['user']['username'];
  if(!$noidung ){
    echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
  }

  $insert = "INSERT INTO feedbacks (product_id,name,fb_content) VALUES ('$id','$username','$noidung')";
  $result = mysqli_query($mysqli,$insert);





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
 

    <title>H2T SHOP</title>
    <link rel="stylesheet" href="./css/head-foot.css" />
    <link rel="stylesheet" href="sp.css" />
<style>
  .noidung{
    border: 3px aqua solid;
    border-radius: 10px;
    padding: 5px 20px;
    margin-bottom: 30px;
    outline-color: #687EFF;
  }


  .button1 {
  appearance: button;
  background-color: #1899d6;
  border: solid transparent;
  border-radius: 16px;
  border-width: 0 0 4px;
  box-sizing: border-box;
  color: #ffffff;
  cursor: pointer;
  display: inline-block;
  font-size: 15px;
  font-weight: 700;
  letter-spacing: 0.8px;
  line-height: 20px;
  margin: 0;
  outline: none;
  overflow: visible;
  padding: 13px 19px;
  text-align: center;
  text-transform: uppercase;
  touch-action: manipulation;
  transform: translateZ(0);
  transition: filter 0.2s;
  user-select: none;
  -webkit-user-select: none;
  vertical-align: middle;
  white-space: nowrap;
}

.button1:after {
  background-clip: padding-box;
  background-color: #1cb0f6;
  border: solid transparent;
  border-radius: 16px;
  border-width: 0 0 4px;
  bottom: -4px;
  content: "";
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  z-index: -1;
}

.button1:main,
.button1:focus {
  user-select: auto;
}

.button1:hover:not(:disabled) {
  filter: brightness(1.1);
}

.button1:disabled {
  cursor: auto;
}

.button1:active:after {
  border-width: 0 0 0px;
}

.button1:active {
  padding-bottom: 10px;
}

.button1{
  text-decoration: none;
}

.hienthifeedback{
  padding: 0px 180px;
  line-height: 2;
}
.hienthifeedback h2{
  font-size: 1.3rem;
}

.hienthifeedback p{
  width: 40%;
  color: #838383;
  font-size: 0.9rem;
  text-align: justify;
  margin-bottom: 50px;
  letter-spacing: 1px;
  line-height: 2;
}
.star{
  display: flex;
  justify-content: left;
  width: 50%;
  margin-bottom: 20px;
}

.rating {
  display: flex;
  flex-direction: row-reverse;
  gap: 0.3rem;
  --stroke: #666;
  --fill: #ffc73a;


}

.rating input {
  appearance: unset;
}

.rating label {
  cursor: pointer;
}

.rating svg {
  width: 2rem;
  height: 2rem;
  overflow: visible;
  fill: transparent;
  stroke: var(--stroke);
  stroke-linejoin: bevel;
  stroke-dasharray: 12;
  animation: idle 4s linear infinite;
  transition: stroke 0.2s, fill 0.5s;
}

@keyframes idle {
  from {
    stroke-dashoffset: 24;
  }
}

.rating label:hover svg {
  stroke: var(--fill);
}

.rating input:checked ~ label svg {
  transition: 0s;
  animation: idle 4s linear infinite, yippee 0.75s backwards;
  fill: var(--fill);
  stroke: var(--fill);
  stroke-opacity: 0;
  stroke-dasharray: 0;
  stroke-linejoin: miter;
  stroke-width: 8px;
}

@keyframes yippee {
  0% {
    transform: scale(1);
    fill: var(--fill);
    fill-opacity: 0;
    stroke-opacity: 1;
    stroke: var(--stroke);
    stroke-dasharray: 10;
    stroke-width: 1px;
    stroke-linejoin: bevel;
  }

  30% {
    transform: scale(0);
    fill: var(--fill);
    fill-opacity: 0;
    stroke-opacity: 1;
    stroke: var(--stroke);
    stroke-dasharray: 10;
    stroke-width: 1px;
    stroke-linejoin: bevel;
  }

  30.1% {
    stroke: var(--fill);
    stroke-dasharray: 0;
    stroke-linejoin: miter;
    stroke-width: 8px;
  }

  60% {
    transform: scale(1.2);
    fill: var(--fill);
  }
}

</style>
  </head >
  <body>
    <header id="header">
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
        <a href="viewcart.php"><i class="fa-solid fa-bag-shopping"></i>Giỏ hàng</a>
        </li>
        <li class="list-icon">
          <i class="fa-solid fa-phone"></i> + 84 306 6845
        </li>
      </div>
    </header>
    <form action="cart.php" method="post">
    <div class="product-container" style="  margin-bottom: 300px; margin-top:100px;">
      <div class="product-card product sp">
          <input type="hidden" name="product_id" value="<?php echo $data['product_id']; ?>">
          <input type="hidden" name="product_name"  value="<?php echo $data['product_name']; ?>">
          <input type="hidden" name="image" value="<?php echo $data['product_image_main']; ?>">
          <input type="hidden" name="product_price" value="<?php echo $data['product_price']; ?>">
            <?php echo "<img src='./material-dashboard-master/material-dashboard-master/pages/uploads/" . $data['product_image_main'] . "'width='100%';height:400px;>"; ?>
            <?php echo "<img src='./material-dashboard-master/material-dashboard-master/pages/uploads/" . $data['product_image_first'] . "'width='100%';height:400px;>"; ?>
            <?php echo "<img src='./material-dashboard-master/material-dashboard-master/pages/uploads/" . $data['product_image_second'] . "'width='100%';height:400px;>"; ?>
            <?php echo "<img src='./material-dashboard-master/material-dashboard-master/pages/uploads/" . $data['product_image_third'] . "'width='100%';height:400px;>"; ?>
        </div>
        <div class="product-card product info">
            <h3><?php echo $data['product_name'] ?></h3>
            <p>$ <?php echo $data['product_price'] ?> VND</p>
            <p><?php echo $data['product_status'] ?></p>
            <p>Số lượng kho: <?php echo $data['product_quantity'] ?></p>
            <p>Số lượng mua: <input type="number" name="soluongmua" max="100" min="1" value="1"></p>
            <!-- <p>Color: 
              <button type="submit" class="btn-color">Đen</button>
              <button type="submit" class="btn-color">Trắng</button>
            </p> -->
          <div class="button-1line">
            <button type="submit" class="button" style="text-align: center;" name="addCart">Thêm vào giỏ hàng </button>
            <!-- <i class="fa-solid fa-cart-plus"></i> -->
            <!-- <button type="submit" class="button">Mua ngay</button> -->
          </div>
        </div>



      </div>
    </form>
      <!-- Mo ta san pham -->

          <div class="motasanpham">
            <h2>Mô tả sản phẩm</h2>
            <p> <?php echo $data['product_description'] ?> </p>
          </div>

      <!-- san pham lien quan -->

          <div class="sanphamlienquan">
            <h2>Sản phẩm liên quan</h2>
          </div>
          <div class="product-container">
        <?php
        foreach ($data1 as $key => $value) :
        ?>
      <div class="product-second">
    <a href="chitietsanpham.php?id=<?php echo $value['product_id'] ?>"> <?php echo "<img src='./material-dashboard-master/material-dashboard-master/pages/uploads/" . $value['product_image_main'] . "'width='100%';height:400px;>"; ?></a>
          <h3><?php echo $value['product_name'] ?></h3>
          <p>$ <?php echo $value['product_price'] ?> VND</p>
          <a class="button" href="chitietsanpham.php?id=<?php echo $value['product_id'] ?>">Xem thêm</a>
          <!-- <button type="submit" class="button">Xem thêm</button> -->
      </div>
        <?php endforeach ?>
</div>



<div class="motasanpham">
          <form action="" method="POST">
          <h2>Đánh giá của bạn</h2>
          <div class="star">
            <div class="rating">
              <input type="radio" id="star-1" name="star-radio" value="star-1">
              <label for="star-1">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path pathLength="360" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path></svg>
              </label>
              <input type="radio" id="star-2" name="star-radio" value="star-1">
              <label for="star-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path pathLength="360" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path></svg>
              </label>
              <input type="radio" id="star-3" name="star-radio" value="star-1">
              <label for="star-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path pathLength="360" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path></svg>
              </label>
              <input type="radio" id="star-4" name="star-radio" value="star-1">
              <label for="star-4">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path pathLength="360" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path></svg>
              </label>
              <input type="radio" id="star-5" name="star-radio" value="star-1">
              <label for="star-5">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path pathLength="360" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path></svg>
              </label>
            </div>
          </div>
          <textarea class="noidung"
          rows="10" cols="100" name="content">
          </textarea><br>
          <button type="submit" class="button1" name="binhluan">GỬI</button>
          </form>
</div>
<!-- hien thi binh luan -->

<div class="hienthifeedback">
<?php
  $select = "SELECT * FROM feedbacks WHERE product_id = '$id'";
  $query2 = mysqli_query($mysqli,$select);
    foreach ($query2 as $key => $value){
?>
          <h2><?php echo $value['name'] ?></h2>
          <p><?php echo $value['fb_content'] ?></p>

<?php } ?>
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
</html>

