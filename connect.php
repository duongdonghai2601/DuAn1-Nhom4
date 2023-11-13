<?php
$mysqli = new mysqli("localhost","root","","duan1");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}


// Hien thi ten cua database dang ket noi
// if ($result = $mysqli -> query("SELECT DATABASE()")) {
//   $row = $result -> fetch_row();
//   echo "Default database is " . $row[0];
//   $result -> close();
// }

?>