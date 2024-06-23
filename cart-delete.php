<?php
include "./connect.php";
session_start();
if (!isset($_SESSION["user_name"])) {
    header("location:./index.php");
}
$product_id = $_GET["product_id"];
mysqli_query($conn, "delete FROM `cart` where ID = '$product_id' ") or die('query failed');
header("location:cart.php?itemid=1");
?>