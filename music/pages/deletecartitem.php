<?php

include_once('connection.php');
$prodId = $_REQUEST['PRODUCT_ID'];
$totalItems = $_REQUEST['TOTAL_ITEMS'];

$sql = "DELETE FROM cart WHERE PRODUCT_ID='$prodId'";
$result = mysqli_query($conn, $sql);
if ($result) {
    $_SESSION['TOTAL_ITEMS'] = $totalItems - 1;
    header("Location: http://localhost/music/pages/cart.php");
    
}


?>