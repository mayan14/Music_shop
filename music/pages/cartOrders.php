<?php

include_once('connection.php');
$email = $_REQUEST['Email'];
$orderId = random_int(1000, 1000000);
$orderPrice = $_REQUEST['ORDER_PRICE'];
$orderStatus = "Pending";

$sql = "INSERT INTO orders (ORDER_ID, ORDER_PRICE, ORDER_STATUS, USER_EMAIL) VALUES ( '$orderId', '$orderPrice', '$orderStatus', '$email')";
$result = mysqli_query($conn, $sql);
if ($result) {
    header("Location: http://localhost/music/pages/orderspage.php");
}


?>