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

    //echo '<h2>Number is ' .htmlspecialchars($number) . '</h2>';
    if (isset($_REQUEST['SELECTED_QUANTITY'])) {
        if ($selectedQuantity <= $productQuantity) {
            $_SESSION['SELECTED_QUANTITY'] = $selectedQuantity + $_REQUEST['SELECTED_QUANTITY'];
        }
        else {
            $_SESSION['SELECTED_QUANTITY'] = $productQuantity;
            $selectedQuantity = $productQuantity;
        }
        
    }

    if (isset($_REQUEST['SELECTED_QUANTITY_SUB'])) {
        if ($selectedQuantity >= 1) {
            $_SESSION['SELECTED_QUANTITY'] = $selectedQuantity - $_REQUEST['SELECTED_QUANTITY_SUB'];
        }
        elseif ($selectedQuantity == 0) {
            $_SESSION['SELECTED_QUANTITY'] = 1;
        }
        else {
            $_SESSION['SELECTED_QUANTITY'] = 1;
        }
        
    }


    

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
        <?php echo'<h2 class="titleFeatured">' .htmlspecialchars($productName) . '</h2>' ?>
        <div class="detDiv">
            <div class="detDivInner">
                <?php echo'<img src="http://localhost/' .htmlspecialchars($productImage) . '" alt="" class="detImage">' ?>
                <div class="detContentDiv">
                    <?php echo'<p class="detPrice">Ksh ' .htmlspecialchars($productPrice * $selectedQuantity) . '</p>' ?>
                    <?php echo'<p class="detQuantity">' .htmlspecialchars($productQuantity) . ' available</p>' ?>
                    <div class="detItemTot">
                        <form method="post">
                            <?php echo '<input type="hidden" value='.htmlspecialchars(1) .' name="SELECTED_QUANTITY_SUB"/>' ?>
                            <button class="detSub" id="sub" type="submit">-</button>
                        </form>
                        <?php echo'<p class="detTot" id="out">' .htmlspecialchars($selectedQuantity) . '</p>' ?>
                        <form method="post">
                            <?php echo '<input type="hidden" value='.htmlspecialchars(1) .' name="SELECTED_QUANTITY"/>' ?>
                            <?php echo'<button class="detAdd" id="add" type="submit">+</button>' ?>
                        </form>
                    </div>
                    <div class="detItemOrder">
                    <form method="post" action="addProducts.php">
                        <?php echo '<input type="hidden" value='.htmlspecialchars($email) .' name="Email"/>' ?>
                        <?php echo '<input type="hidden" value='.htmlspecialchars($productPrice * $selectedQuantity) .' name="PRODUCT_PRICE"/>' ?>
                        <?php echo '<input type="hidden" value='.htmlspecialchars($productId) .' name="PRODUCT_ID"/>' ?>
                        <?php echo '<input type="hidden" value='.htmlspecialchars($productName) .' name="PRODUCT_NAME"/>' ?>
                        <?php echo '<input type="hidden" value='.htmlspecialchars($selectedQuantity) .' name="PRODUCT_QUANTITY"/>' ?>
                        <?php echo '<input type="hidden" value='.htmlspecialchars($productImage) .' name="PRODUCT_IMAGE"/>' ?>
                        <button class="detCart" id="detCart" type="submit" >Add To Cart</button>
                        </form>
                        <form method="post" action="orders.php">
                            <?php echo '<input type="hidden" value='.htmlspecialchars($email) .' name="Email"/>' ?>
                            <?php echo '<input type="hidden" value='.htmlspecialchars($productPrice * $selectedQuantity) .' name="ORDER_PRICE"/>' ?>
                            <?php echo '<input type="hidden" value='.htmlspecialchars($productId) .' name="PRODUCT_ID"/>' ?>
                            <?php echo '<input type="hidden" value='.htmlspecialchars($productQuantity - $selectedQuantity) .' name="PRODUCT_QUANTITY"/>' ?>
                            <button class="detOrder" id="detOrder" type="submit" data-toggle="modal" data-target="#exampleModalCenter">Order Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            ...
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"></button>
            <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
</body>
</html>