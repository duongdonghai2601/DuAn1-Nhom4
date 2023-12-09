<?php
session_start();
$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
// $customerid = $_SESSION['user']["user_id"];
include('./connect.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "sendmail/phpmailer/src/Exception.php";
require "sendmail/phpmailer/src/PHPMailer.php";
require "sendmail/phpmailer/src/SMTP.php";

$mail = new PHPMailer(true);

//Truong hop chua dang nhap
// if(isset($_POST['muahang'])){
      
//       $name = $_POST['hoten'];
//       $phone = $_POST['sodienthoai'];
//       $address = $_POST['diachi'];
//       $pttt = $_POST['pttt'];
//       if(!$name || !$phone || !$address ||!$pttt){
//         echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
//         exit();
//     }
//     if (is_numeric($phone)) {
//         // Kiểm tra xem chuỗi đầu vào có đúng 10 kí tự
//         if (strlen($phone) === 10 && substr($phone, 0, 1) === '0') {
//         } else {
//             echo "Số điện thoại hợp lệ. <a href='javascript: history.go(-1)'>Trở lại</a>";
//         exit();
//         }
//     } else {
//         echo "Số điện thoại không hợp lệ. <a href='javascript: history.go(-1)'>Trở lại</a>";
//         exit();
//     }
//       $total = 0;
//       $sql = "INSERT INTO customers (customer_name,customer_phonenumber,customer_address,customer_payment) VALUES('$name','$phone','$address','$pttt')"  ; 
//       $query = mysqli_query($mysqli,$sql);
//       if ($query) {
//         $last_id = mysqli_insert_id($mysqli);
//         // echo "New record created successfully. Last inserted ID is: " . $last_id;
        
//       } else {
//         echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
//       }

//       for ($i=0; $i < sizeof($_SESSION['cart']); $i++) { 
//         $tensp = $_SESSION['cart'][$i]['name'];
//         $hinhsp = $_SESSION['cart'][$i]['image'];
//         $dongia = $_SESSION['cart'][$i]['price'];
//         $soluong = $_SESSION['cart'][$i]['quantity'];
//         $thanhtien = $soluong *$dongia;
        

         
//         $sql1 = "INSERT INTO cart (tensp ,hinhsp, dongia, soluong, thanhtien ) 
//         VALUES('$tensp','$hinhsp','$dongia','$soluong','$thanhtien')" ; 
//         $query1 = mysqli_query($mysqli,$sql1);
//         $last_id_cart = mysqli_insert_id($mysqli);

//         // $sql1 = "INSERT INTO cart (tensp ,hinhsp, dongia, soluong, thanhtien, customer_id) 
//         // VALUES('$tensp','$hinhsp','$dongia','$soluong','$thanhtien','$customerid')" ; 
//         // $query1 = mysqli_query($mysqli,$sql1);
//         // $last_id_cart = mysqli_insert_id($mysqli);
//       }
//       $sql2 = "INSERT INTO order_details (cart_id) VALUES ('$last_id_cart')";
//       $query2 = mysqli_query($mysqli,$sql2);




//       //show giỏ hàng
//       $ttkh = ' <h2>Bạn đã đặt hàng thành công !</h2> <br>
//       <h2>ID đơn hàng là: '.$last_id.'</h2> <br>
//       </div>
//         <span class="modal__title">Thông tin đơn hàng</span>
//       </div>
//       <div class="modal__body">
//       <div class="input">
//           <label class="input__label">Name:</label>
//           <input class="input__field" type="text" placeholder="Họ và tên của bạn..." name="hoten" value="'.$name.'">
//           <p class="input__description">Không quá 100 kí tự</p>
//       </div>
//       <div class="input">
//           <label class="input__label">Phone:</label>
//           <input class="input__field" type="text" placeholder="Số điện thoại của bạn..." name="sodienthoai"  value="'.$phone.'"> 
//       </div>
//       <div class="input">
//           <label class="input__label">Address:</label>
//           <input class="input__field" type="text" placeholder="Địa chỉ của bạn..." name="diachi"  value="'.$address.'">
//       </div>';

// }
//Neu chua dang nhap
if(!$user){
if(isset($_POST['muahang'])){
    $name = $_POST['hoten'];
    $phone = $_POST['sodienthoai'];
    $address = $_POST['diachi'];
    $pttt = $_POST['pttt'];
    if(!$name || !$phone || !$address ||!$pttt){
      echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
      exit();
  }
  if (is_numeric($phone)) {
      // Kiểm tra xem chuỗi đầu vào có đúng 10 kí tự
      if (strlen($phone) === 10 && substr($phone, 0, 1) === '0') {
      } else {
          echo "Số điện thoại hợp lệ. <a href='javascript: history.go(-1)'>Trở lại</a>";
      exit();
      }
  } else {
      echo "Số điện thoại không hợp lệ. <a href='javascript: history.go(-1)'>Trở lại</a>";
      exit();
  }
    $total = 0;

    for ($i=0; $i < sizeof($_SESSION['cart']); $i++) { 
      $tensp = $_SESSION['cart'][$i]['name'];
      $hinhsp = $_SESSION['cart'][$i]['image'];
      $dongia = $_SESSION['cart'][$i]['price'];
      $soluong = $_SESSION['cart'][$i]['quantity'];
      $thanhtien = $soluong *$dongia;
      

       
      // $sql1 = "INSERT INTO cart (tensp ,hinhsp, dongia, soluong, thanhtien ) 
      // VALUES('$tensp','$hinhsp','$dongia','$soluong','$thanhtien')" ; 
      // $query1 = mysqli_query($mysqli,$sql1);
      // // $last_id_cart = mysqli_insert_id($mysqli);
      
      $sql2 = "INSERT INTO customers 
      (customer_name,customer_phonenumber,customer_address,customer_payment,tensp ,hinhsp, dongia, soluong, thanhtien) 
      VALUES 
      ('$name','$phone','$address','$pttt','$tensp','$hinhsp','$dongia','$soluong','$thanhtien')";
      $query2 = mysqli_query($mysqli,$sql2);
      if ($query2) {
        $last_id = mysqli_insert_id($mysqli);
        // echo "New record created successfully. Last inserted ID is: " . $last_id;
        
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
      }

      // $sql1 = "INSERT INTO cart (tensp ,hinhsp, dongia, soluong, thanhtien, customer_id) 
      // VALUES('$tensp','$hinhsp','$dongia','$soluong','$thanhtien','$customerid')" ; 
      // $query1 = mysqli_query($mysqli,$sql1);
      // $last_id_cart = mysqli_insert_id($mysqli);


    }





    //show giỏ hàng
    $ttkh = ' <h2>Bạn đã đặt hàng thành công !</h2> <br>
    <h2>ID đơn hàng là: '.$last_id.'</h2> <br>
    </div>
      <span class="modal__title">Thông tin đơn hàng</span>
    </div>
    <div class="modal__body">
    <div class="input">
        <label class="input__label">Name:</label>
        <input class="input__field" type="text" placeholder="Họ và tên của bạn..." name="hoten" value="'.$name.'">
        <p class="input__description">Không quá 100 kí tự</p>
    </div>
    <div class="input">
        <label class="input__label">Phone:</label>
        <input class="input__field" type="text" placeholder="Số điện thoại của bạn..." name="sodienthoai"  value="'.$phone.'"> 
    </div>
    <div class="input">
        <label class="input__label">Address:</label>
        <input class="input__field" type="text" placeholder="Địa chỉ của bạn..." name="diachi"  value="'.$address.'">
    </div>';

}
$sql1 = "UPDATE products SET product_quantity = product_quantity - '$soluong', products_soluongban = products_soluongban + '$soluong' where product_name ='$tensp'";
$resufl1 = mysqli_query($mysqli,$sql1);



if (isset($_POST['magiamgia']) && $_POST['magiamgia'] == 'checked'){
  $discount_amount = 0;
  $discount_amount = $total * 0.1;
  $final_amount = $total - $discount_amount;
}
else{
  // Kiểm tra mã giảm giá và tính toán giảm giá

}
 

}
//Da dang nhap va co tai khoan se them duoc customerid
else{
  if(isset($_POST['muahang'])){
    $customerid = $_SESSION['user']["user_id"];
    $name = $_POST['hoten'];
    $phone = $_POST['sodienthoai'];
    $address = $_POST['diachi'];
    $pttt = $_POST['pttt'];
    if(!$name || !$phone || !$address ||!$pttt){
      echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
      exit();
  }
  if (is_numeric($phone)) {
      // Kiểm tra xem chuỗi đầu vào có đúng 10 kí tự
      if (strlen($phone) === 10 && substr($phone, 0, 1) === '0') {
      } else {
          echo "Số điện thoại hợp lệ. <a href='javascript: history.go(-1)'>Trở lại</a>";
      exit();
      }
  } else {
      echo "Số điện thoại không hợp lệ. <a href='javascript: history.go(-1)'>Trở lại</a>";
      exit();
  }
    $total = 0;


    for ($i=0; $i < sizeof($_SESSION['cart']); $i++) { 
      $tensp = $_SESSION['cart'][$i]['name'];
      $hinhsp = $_SESSION['cart'][$i]['image'];
      $dongia = $_SESSION['cart'][$i]['price'];
      $soluong = $_SESSION['cart'][$i]['quantity'];
      $thanhtien = $soluong *$dongia;
      

       
      // $sql1 = "INSERT INTO cart (tensp ,hinhsp, dongia, soluong, thanhtien,customerid ) 
      // VALUES('$tensp','$hinhsp','$dongia','$soluong','$thanhtien','$cuss')" ; 
      // $query1 = mysqli_query($mysqli,$sql1);
      // $last_id_cart = mysqli_insert_id($mysqli);

      // $sql1 = "INSERT INTO cart (tensp ,hinhsp, dongia, soluong, thanhtien, customer_id) 
      // VALUES('$tensp','$hinhsp','$dongia','$soluong','$thanhtien','$customerid')" ; 
      // $query1 = mysqli_query($mysqli,$sql1);
      // // $last_id_cart = mysqli_insert_id($mysqli);

      $sql2 = "INSERT INTO customers 
      (customer_name,customer_phonenumber,customer_address,customer_payment,tensp ,hinhsp, dongia, soluong, thanhtien,customer_idkhach) 
      VALUES 
      ('$name','$phone','$address','$pttt','$tensp','$hinhsp','$dongia','$soluong','$thanhtien','$customerid')";
      $query2 = mysqli_query($mysqli,$sql2);
      if ($query2) {
        $last_id = mysqli_insert_id($mysqli);
        // echo "New record created successfully. Last inserted ID is: " . $last_id;
        
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
      }


    }





    //show giỏ hàng
    $ttkh = ' <h2>Bạn đã đặt hàng thành công !</h2> <br>
    <h2>ID đơn hàng là: '.$last_id.'</h2> <br>
    </div>
      <span class="modal__title">Thông tin đơn hàng</span>
    </div>
    <div class="modal__body">
    <div class="input">
        <label class="input__label">Name:</label>
        <input class="input__field" type="text" placeholder="Họ và tên của bạn..." name="hoten" value="'.$name.'">
        <p class="input__description">Không quá 100 kí tự</p>
    </div>
    <div class="input">
        <label class="input__label">Phone:</label>
        <input class="input__field" type="text" placeholder="Số điện thoại của bạn..." name="sodienthoai"  value="'.$phone.'"> 
    </div>
    <div class="input">
        <label class="input__label">Address:</label>
        <input class="input__field" type="text" placeholder="Địa chỉ của bạn..." name="diachi"  value="'.$address.'">
    </div>';


}

//Tru so luong kho khi mua xong
$sql1 = "UPDATE products SET product_quantity = product_quantity - '$soluong', products_soluongban = products_soluongban + '$soluong' where product_name ='$tensp'";
$resufl1 = mysqli_query($mysqli,$sql1);
}



if(isset($_POST['xacnhan'])){
    // Cấu hình SMTP để gửi email
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'haibanh2004@gmail.com';
    $mail->Password = 'ntyhzlpytepozgyi';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Thiết lập thông tin người gửi và người nhận
    $mail->setFrom('haibanh2004@gmail.com', 'H2T SHOP');
    $mail->addAddress($_SESSION['user']['gmail'], $_SESSION['user']['username']);

    // Thiết lập tiêu đề email và nội dung
    $mail->Subject = 'CONGRATULATIONS CUSTOMERS';
    $mail->Body    = 'Chúng tôi, H2T Store, muốn gửi lời cảm ơn sâu sắc đến quý khách hàng đã tin tưởng và mua sắm tại cửa hàng của chúng tôi.

    Sự ủng hộ và lòng tin tưởng của quý khách hàng đã mang lại niềm vui và động lực lớn cho chúng tôi. Chúng tôi luôn nỗ lực hàng ngày để mang đến những sản phẩm và dịch vụ tốt nhất, đáp ứng các yêu cầu và mong đợi của quý khách. 
    
    Chúng tôi trân trọng sự lựa chọn của quý khách hàng và cam kết tiếp tục cải thiện để mang lại trải nghiệm mua sắm tốt hơn cho quý khách hàng. Nếu có bất kỳ góp ý, ý kiến hoặc câu hỏi nào, vui lòng liên hệ với chúng tôi. Chúng tôi luôn sẵn lòng giúp đỡ. 
    
    Một lần nữa, xin chân thành cảm ơn quý khách hàng đã ủng hộ H2T Store. Chúc quý khách có những trải nghiệm mua sắm thú vị và hài lòng với sản phẩm của chúng tôi.
    
    Trân trọng,
    
    H2T Store
    <img src="./image/logoh2t.png">
    ';

    // Gửi email
    $mail->send();

    echo 'Email đã được gửi thành công!';

  unset($_SESSION['cart']);
  header('location:thankyou.php');

}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/91ad5c6d6a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Thông tin đơn hàng</title>
    <link rel="stylesheet" href="index2.css">
    <link rel="stylesheet" href="./css/info.css">
    <style>

.radio-group {
  display: flex;
  flex-direction: column;
}

.radio-label {
  display: flex;
  align-items: center;
  padding: 0.5em;
  margin-bottom: 0.5em;
  background-color: #fff;
  border: 1px solid #ccc;
  border-radius: 4px;
  transition: background-color 0.2s, border-color 0.2s;
}

.radio-label:hover {
  background-color: #e6e6e6;
}

.radio-input {
  position: absolute;
  opacity: 0;
}

.radio-input:checked + .radio-label {
  background-color: #ffc3c3;
  border-color: #ff1111;
}

.radio-input:focus + .radio-label {
  outline: 2px solid #ff1111;
}

.radio-inner-circle {
  display: inline-block;
  width: 1em;
  height: 1em;
  border: 2px solid #888;
  border-radius: 50%;
  margin-right: 0.5em;
  transition: border-color 0.2s;
  position: relative;
}

.radio-label:hover .radio-inner-circle {
  border-color: #555;
}

.radio-input:checked + .radio-label .radio-inner-circle {
  border-color: #ff1111;
}

.radio-input:checked + .radio-label .radio-inner-circle::after {
  content: '';
  display: block;
  width: 0.5em;
  height: 0.5em;
  background-color: #ff1111;
  border-radius: 50%;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.parent .cart {
  background-color: #b3b3b3;
  height: fit-content;
  padding: 0 20px;
  margin-right: 30px;

}
.oneline{
  display: flex;
  justify-content: space-between;
  margin-bottom: 50px;
}
.oneline h2{
  margin-top: 10px;
}
.button{
  font-size: 1.1rem;
  border-radius: 15px;
  font-weight: 700;
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

    <section class="info-details">
        <div class="parent">
            <div class="info">
                <div class="info-user">
                    <form action="bill.php" method="post">
                        <div class="container-form">
                            <div class="modal">
                                <div class="modal__header">
                                <div class="logo">
                                    <img src="./image/logoh2t.png" alt=""> <br>
                                  <?php echo $ttkh ?>
                                
                                    <div class="input">
                                        <!-- <label class="input__label">Email</label>
                                        <input class="input__field" type="email" placeholder="Email của bạn..." name="email"> -->
                                        <p class="input__description">Sau khi hoàn tất đơn hàng khoảng 60-90 phút (trong giờ hành chính), H2T sẽ nhanh chóng gọi điện xác nhận lại thời gian giao hàng với bạn. H2T xin cảm ơn!</p>
                                    </div>
                                </div>
                                <div class="modal__footer">

                                </div>
                            </div>
                        </div>


                </div>
            </div>
            <div class="cart">
                <h2 class="cart-title">Đơn hàng của bạn</h2><br>
                <?php 
                // $ttgh = "";
                    $total = 0;
                    $i=0;
                    foreach ($_SESSION['cart'] as $items) {
                        extract($items);
                        $linkdelete ="deletecart.php?i=" .$i;
                        $total += $price * $quantity;
                       echo'                
                         <div class="container-product">
                         <img class="image-product" src="./material-dashboard-master/material-dashboard-master/pages/uploads/'.$image.'">
                         <p style="font-weight:700; font-size:1.1rem;">'.$name.'</p><br>
                         <p>'.$price.' VND</p>
                         <p>'.$quantity.'</p>
                         <a href="'.$linkdelete.'"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></a>
                     </div>
                     <br>';
                    }
                    $i++;
                ?>


                <h2 class="cart-title"> Phương thức thanh toán</h2><br>
                <div class="container-product">
                <div class="radio-group">
                    <input class="radio-input" name="pttt" id="radio1" type="radio" value="1" checked>
                    <label class="radio-label" for="radio1">
                    <span class="radio-inner-circle"></span>
                    Thanh toán khi nhận hàng
                    </label>
                    
                    <input class="radio-input" name="pttt" id="radio2" type="radio" value="2">
                    <label class="radio-label" for="radio2">
                    <span class="radio-inner-circle"></span>
                    QR CODE
                    </label>
                    
                </div>
                </div>
                <br>
                <div class="container-total">
                    <!-- <img class="image-product" src="./image/anh5.png">
                    <p style="font-weight:700; font-size:1.1rem;">Tên sản phẩm 01</p><br>
                    <p  class="">Color/Size</p>
                    <p>399.00 VND</p> -->
                    <div class="oneline">
                    <h2>Tổng:<?php echo $total ;?> VND</h2>
                    <button class="button button--primary" name="xacnhan">Xác nhận</button>
                    </div>

                </div>
            </div>
            </form>
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