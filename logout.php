<?php
// xóa session theo key
session_start();
include('./connect.php');
unset($_SESSION['user']);
header('location:http://localhost/Du_An_Mau/index.php');

//hàm xóa toàn bộ session
// session_destroy();
?>