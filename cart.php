<?php
session_start();
if(!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
if(isset($_POST['addCart'])){
    $id = $_POST['product_id'];
    $name = $_POST['product_name'];
    $image = $_POST['image'];
    $price = $_POST['product_price'];
    $quantity = $_POST['soluongmua'];

    $flash=0; //kiểm tra sản phẩm có trùng trong giỏ hàng hay không, nếu không trùng thì thêm mới
    //Kiểm tra sản phẩm có trong giỏ hàng hay không
    for ($i=0; $i < sizeof($_SESSION['cart']); $i++) { 

        if($_SESSION['cart'][$i]['id'] == $id){
            $flash = 1;
            $quantitynew = (int)$quantity + (int)$_SESSION['cart'][$i]['quantity'];
            $_SESSION['cart'][$i]['quantity'] = $quantitynew;
            break;
        }
    }

    if($flash==0){
    // Thêm mới sản phẩm vào giỏ hàng
    $products=["id"=>$id,"name"=>$name,"image"=>$image,"price"=>$price,"quantity" => $quantity];
    $_SESSION['cart'][]=$products;
}
header('location:viewcart.php');
    

}


?>

