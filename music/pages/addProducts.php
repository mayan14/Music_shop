<?php

if (isset($_REQUEST['Email'])) {
    include_once('connection.php');
    $prodId = $_REQUEST['PRODUCT_ID'];
    $prodName = $_REQUEST['PRODUCT_NAME'];
    $prodPrice = $_REQUEST['PRODUCT_PRICE'];
    $prodQuantity = $_REQUEST['PRODUCT_QUANTITY'];
    $userEmail = $_REQUEST['Email'];
    $prodImage = $_REQUEST['PRODUCT_IMAGE'];

    $sql = "INSERT INTO cart (PRODUCT_ID, PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_QUANTITY, PRODUCT_IMAGE, USER_EMAIL) VALUES ('$prodId', '$prodName', '$prodPrice', '$prodQuantity', '$prodImage', '$userEmail')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $sql1 = "SELECT * FROM cart WHERE USER_EMAIL='$userEmail'";
        $result1 = mysqli_query($conn, $sql1);
        if (mysqli_num_rows($result1) > 0) {
            session_start();
            $_SESSION['TOTAL_ITEMS'] = mysqli_num_rows($result1);
            header("Location: http://localhost/music/pages/cart.php");
        }
        
    }
}
else {
    echo "Not Successful";
}

?>