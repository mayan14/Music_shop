<?php
    session_start();
    $email = $_SESSION['Email'];
    $tot = 0;
    //echo '<h2>Number is ' .htmlspecialchars($number) . '</h2>';
    $totItems = $_SESSION['TOTAL_ITEMS'];
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
    <title>Cart</title>
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

    <div class="cartTitle">
        <h3 class="titleCart">My Cart</h3>
    </div>

    <div class="cartContainer">
        <ul class="ulCartOuter">
        <?php 
            include_once("connection.php");
            $sql = "SELECT * FROM cart WHERE USER_EMAIL='$email'";
            $result = mysqli_query($conn, $sql);
            $cartArray = array();
            $_SESSION['TOTAL_ITEMS'] = mysqli_num_rows($result);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) { 
                    $tot = $tot + $row['PRODUCT_PRICE'];
                    echo '
                    <li class="liCartInner">
                        <div class="divCart">
                            <img src="http://localhost/'.$row["PRODUCT_IMAGE"].'" alt="" class="imgCart">
                            <p class="nameCart">'.$row["PRODUCT_NAME"].'</p>
                            <p class="priceCart" id="price">'.$row["PRODUCT_PRICE"].'</p>
                            
                            <form method="post" action="deletecartitem.php" class="frmDel">
                                <input type="hidden" value='.$row["PRODUCT_ID"].' name="PRODUCT_ID"/>
                                <input type="hidden" value=' .htmlspecialchars($totItems) . ' name="TOTAL_ITEMS"/>
                                <div>
                                <button class="btn btn-success remOne" type="submit">Remove</button>
                                </div>
                                
                            </form>
                        </div>
                    </li>
                    ';
                }
            }
            else {
                echo '<p style="color: white" class="noData">No Data</p>';
            }

            ?>
            
        </ul>
    </div>

    <div class="totCont">
        <div class="TotalContainer">
            <p class="titleTotal">Total</p>
            <?php echo '<p class="totalAmount">Ksh '.htmlspecialchars($tot) . '</p>' ?>
        </div>
        <div class="orderContainer">
            <form method="post" action="delete.php">
                <?php echo '<input type="hidden" value='.htmlspecialchars($email) .' name="Email"/>' ?>
                <button class="btn btn-danger remAll" type="submit">Remove All</button>
            </form>
            <form method="post" action="cartOrders.php">
                <?php echo '<input type="hidden" value='.htmlspecialchars($email) .' name="Email"/>' ?>
                <?php echo '<input type="hidden" value='.htmlspecialchars($tot) .' name="ORDER_PRICE"/>' ?>
                <button class="btn btn-success ordr" type="submit">Order</button>
            </form>
        </div>

    </div>

    <script>
        let sub = document.querySelector('#sub');
        let add = document.querySelector('#add');
        let out = document.querySelector('#out');
        let price = document.querySelector('#price');

        add.addEventListener('click', () => {
            let sm = out.innerText;
            let ot = parseInt(sm);
            out.innerText = ot + 1;
            price.innerText = parseInt(out.innerText) * parseInt(price.innerText);
        });

        sub.addEventListener('click', () => {
            let sm = out.innerText;
            let ot = parseInt(sm);
            out.innerText = ot - 1;
            if (ot == 1) {
                out.innerText = sm;
                
            }
            else{
                out.innerText = ot - 1;
            }
            price.innerText = parseInt(out.innerText) * parseInt(price.innerText);
            
        });
      
    </script>
    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
</body>
</html>