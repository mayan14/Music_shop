<?php

if (isset($_REQUEST["EMAIL_ADDRESS"]) && isset($_REQUEST["PASSWORD"])) {
    include_once("connection.php");
    $name = $_REQUEST["NAME"];
    $email = $_REQUEST["EMAIL_ADDRESS"];
    $telephone = $_REQUEST["CONTACT_NUMBER"];
    $password = $_REQUEST["PASSWORD"];

    $sql = "INSERT INTO new_user (Name, Email, Telephone_no, Password) VALUES ( '$name', '$email','$telephone','$password')";
    $result = mysqli_query($conn,$sql);

    if ($result) {
        $sql1 = "SELECT * FROM cart WHERE USER_EMAIL='$email'";
        $result1 = mysqli_query($conn, $sql);
        session_start();
        $_SESSION['TOTAL_ITEMS'] = mysqli_num_rows($result1);
        $_SESSION['Email'] = $email;
        $_SESSION['Password'] = $password;
        header("Location: http://localhost/music/pages/login.php");
    }
    else{
        echo "Not Successfull";
    }
}
else {
    echo "Parameter Missing";
}


?>