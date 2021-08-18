<?php
    session_start();
    $email = $_SESSION['Email'];
    $totItems = $_SESSION['TOTAL_ITEMS'];

    $productId = $_SESSION['PRODUCT_ID']; 
    $productName = $_SESSION['PRODUCT_NAME'];
    $productPrice = $_SESSION['PRODUCT_PRICE'];
    $productQuantity = $_SESSION['PRODUCT_QUANTITY'];
    $productImage = $_SESSION['PRODUCT_IMAGE'];
    $selectedQuantity = $_SESSION['SELECTED_QUANTITY'];    

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/home.css">
    <title>Home</title>
    <style>
        body{
            background-color: brown;
        }
    </style>
</head>
<body>
    <div class="navTop">
        <div class="right">
            <h1><a href="http://localhost/music/pages/home.php" class="name">FLEX MUSIC SHOP</a></h1>
        </div>
        <div class="left">
        <?php echo'<a href="http://localhost/music/pages/cart.php" class="lnkBadge"><i class="fa fa-shopping-cart navPic" aria-hidden="true"></i><span class="badge badge-pill badge-danger budgeTop">'.htmlspecialchars($totItems) .'</span></a>' ?>
            <div class="dropdown">
            <?php  echo '<a class="nav-link dropdown-toggle linkProf" href="#" id="dropdownMenuButton1" role="button" data-bs-toggle="dropdown" aria-expanded="false">' .htmlspecialchars($email) . '</a>';  ?>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="http://localhost/music/pages/orders.php">My Orders</a></li>
                    <li><a class="dropdown-item" href="http://localhost/music/pages/login.php">Log Out</a></li>
                  </ul>
              </div>
        </div>
    </div>

    <div class="viewProdSection">
        <h2 class="titleFeatured">My Orders</h2>
        <div class="ordersTable">
            <table class="table table-light tableOrders">
                <thead>
                    <tr>
                    <th scope="col">Order Id</th>
                    <th scope="col">Order Price</th>
                    <th scope="col">Order Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    include_once("connection.php");
                    $sql = "SELECT * FROM orders WHERE USER_EMAIL='$email'";
                    $result = mysqli_query($conn, $sql);
                    $cartArray = array();
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) { 
                            echo '
                            <tr>
                                <td>'.$row["ORDER_ID"].'</td>
                                <td>'.$row["ORDER_PRICE"].'</td>
                                <td>'.$row["ORDER_STATUS"].'</td>
                            </tr>
                            ';
                        }
                    }
                    else {
                        echo '<p style="color: white" class="noData">No Data</p>';
                    }
                    ?>
                </tbody>
                </table>
        </div>
       
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
</body>
</html>