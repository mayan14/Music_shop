<?php

if (isset($_REQUEST['PRODUCT_ID'])) {
    $prodId = $_REQUEST['PRODUCT_ID'];
    $prodName = $_REQUEST['PRODUCT_NAME'];
    $prodPrice = $_REQUEST['PRODUCT_PRICE'];
    $prodQuantity = $_REQUEST['PRODUCT_QUANTITY'];
    $prodImage = $_REQUEST['PRODUCT_IMAGE'];
    $selectedQuantity = $_REQUEST['SELECTED_QUANTITY'];
    $total = $prodPrice * $selectedQuantity;


    session_start();
    $_SESSION['PRODUCT_ID'] = $prodId;
    $_SESSION['PRODUCT_NAME'] = $prodName;
    $_SESSION['PRODUCT_PRICE'] = $total;
    $_SESSION['PRODUCT_QUANTITY'] = $prodQuantity;
    $_SESSION['SELECTED_QUANTITY'] = $selectedQuantity;
    $_SESSION['PRODUCT_IMAGE'] = $prodImage;
    header("Location: http://localhost/music/pages/details.php");

}
else {
    echo "Not Successful";
}

?>