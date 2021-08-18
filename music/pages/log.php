<?php

if (isset($_REQUEST["EMAIL_ADDRESS"]) && isset($_REQUEST["PASSWORD"])) {
    include_once("connection.php");
    $email = $_REQUEST["EMAIL_ADDRESS"];
    $password = $_REQUEST["PASSWORD"];

    $sql = "SELECT * FROM new_user WHERE Email='$email' AND Password= '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $sql1 = "SELECT * FROM cart WHERE USER_EMAIL='$email'";
        $result1 = mysqli_query($conn, $sql);
        session_start();
        $_SESSION['TOTAL_ITEMS'] = mysqli_num_rows($result1);
        $_SESSION['Email'] = $email;
        header("Location: http://localhost/music/pages/home.php");
    }
    else{
        header("Location: http://localhost/music/pages/login.php");
    }
}
else {
    echo "Parameter Missing";
}


?>