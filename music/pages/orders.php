<?php

include_once('connection.php');
$email = $_REQUEST['Email'];
$orderId = random_int(1000, 1000000);
$orderPrice = $_REQUEST['ORDER_PRICE'];
$product_id = $_REQUEST['PRODUCT_ID'];
$product_quantity = $_REQUEST['PRODUCT_QUANTITY'];
$orderStatus = "Pending";

$sql = "INSERT INTO orders (ORDER_ID, ORDER_PRICE, ORDER_STATUS, USER_EMAIL) VALUES ('$orderId', '$orderPrice', '$orderStatus', '$email')";
$result = mysqli_query($conn, $sql);
if ($result) {
    $sql1 = "UPDATE items SET ItemQuantity='$product_quantity' WHERE ID='$product_id'";
    $result1 = mysqli_query($conn, $sql1);
    if ($result1) {
        header("Location: http://localhost/music/pages/orderspage.php");
    }
}
?>