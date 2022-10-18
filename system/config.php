<?php 

$DB_SERVER = "localhost";
$DB_USER = "root";
$DB_PASS = "";
$DB_NAME = "lyndsay";

$conn = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASS, $DB_NAME);

$conn->set_charset("utf8");

if(!$conn) {
  echo "error";
}

?>