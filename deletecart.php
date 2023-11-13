<?php 
session_start();
if(isset($_GET['i']) && ($_GET['i'])>=0){
    array_splice($_SESSION['cart'],$_GET['i'],1);
    header('location:viewcart.php');
}
?>