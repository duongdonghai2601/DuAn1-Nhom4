<?php 
session_start();
include('./connect.php');
// $user=[];
//giải thích nếu có $_SESSION['user'] thì sẽ gán $user = $_SESSION['user'] còn không có thì bằng rỗng
$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];

$sql1 = "SELECT * FROM cart INNER JOIN order_details ON cart.cart_id = order_details.cart_id";
// Thực thi truy vấn
$idcart = [];
$data1 = mysqli_query($mysqli, $sql1);
foreach ($data1 as $value) {
    // echo $value['cart_id']."<br>";
    array_push($idcart,$value['cart_id']) ;
}
$last_id = end($idcart);

$sql2 = "SELECT * FROM cart INNER JOIN order_details ON cart.cart_id = order_details.cart_id where order_details.cart_id = $last_id";
$data2 = mysqli_query($mysqli,$sql2);

// if(!$_SESSION['user']){
   
// }

?>

<!DOCTYPE html>
<html lang="en">
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
    <link rel="stylesheet" href="edit.css" />
    <style>
    </style>
  </head >
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
            <li><a href="edittt.php">Sửa thông tin</a></li>
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
    
    <div class="container-edit">
        <div class="col1">
            <h1 style="  margin-bottom: 30px;">Dành cho bạn</h1>
            <div class="link">
            <a class="btn-donate" href="editthongtin.php" >
                CẬP NHẬP THÔNG TIN
            </a><br><br><br>
            <a class="btn-donate" href="#">
                LỊCH SỬ MUA HÀNG
            </a>
            </div>
        </div>
        <div class="col2">
        <h1>Thông tin đơn hàng</h1>
        <form action="" method="post" enctype="multipart/form-data">
        <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                        <th scope="col">Ảnh sản phẩm</th>
                        <th scope="col">Name</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data2 as $key => $value) :
                        $total =  $value['soluong'] * $value['dongia'];
                    ?>
                        <tr class="justify-content-center">
                            <td><?php echo $value['cart_id'] ?></td>
                            <td><?php echo "<img src='./uploads/" . $value['hinhsp'] . "'width='100'>"; ?></td>
                            <td><?php echo $value['tensp'] ?></td>
                          
                            <td><?php echo $value['soluong'] ?></td>
                            <td><?php echo $value['dongia'] ?></td>
                            <td><?php echo $total ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <a href="#header" class="btn-go"><i class="fa-solid fa-arrow-up" style="margin-top:15px"></i></a>

        </div>
        </form>
        </div>
    </div>



</body>
</html>