<?php

include_once('connection.php');
$email = $_REQUEST['Email'];

$sql = "DELETE FROM cart WHERE USER_EMAIL='$email'";
$result = mysqli_query($conn, $sql);
if ($result) {
    $_SESSION['TOTAL_ITEMS'] = mysqli_num_rows($result1);
    header("Location: http://localhost/music/pages/cart.php");
}


?>