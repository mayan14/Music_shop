<?php
    session_start();
    $email = $_SESSION['Email'];
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
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner" style="height: 610px;">
          <div class="carousel-item active">
            <img src="../pictures/violin.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block" style="margin-bottom: 240px;">
              <h3>Violin</h3>
              <p>Order Now</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="../pictures/guitarback.jpeg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block" style="margin-bottom: 380px;">
              <h3>Guitar</h3>
              <p>Order Now</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="../pictures/trumpetback.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block" style="margin-bottom: 390px;">
              <h3>Trumpet</h3>
              <p>Order Now</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="section2">
        <h2 class="titleFeatured">Featured Music Instruments</h2>
        <div class="sectionItems">
            <ul class="ulOuter">
            <?php 
                include_once("connection.php");
                $sql = "SELECT * FROM items";
                $result = mysqli_query($conn, $sql);
                $prodArray = array();
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) { 
                      echo '
                      <li class="liInner"><a>
                      <form method="post" action="getDetails.php">
                        <div class="content">
                            <img src="http://localhost/'.$row["ItemPhoto"].'" alt="" class="imgContent">
                            <div class="detContainer">
                                <p class="nameProd">'.$row["ItemName"] .'</p>
                                <p class="priceProd">Ksh '.$row["ItemPrice"] .'</p>
                            </div>
                            <button class="btnDetailsView" type="submit">View Details</button>
                        </div>

                        <input type="hidden" value='.$row["ItemPrice"].' name="PRODUCT_PRICE" id="price"/>
                        <input type="hidden" value='.$row["ID"].' name="PRODUCT_ID" id="idN"/>
                        <input type="hidden" value='. $row["ItemName"] .' name="PRODUCT_NAME" id="name"/>
                        <input type="hidden" value='.$row["ItemQuantity"].' name="PRODUCT_QUANTITY" id="quantity"/>
                        <input type="hidden" value='.$row["ItemPhoto"].' name="PRODUCT_IMAGE" id="photo"/>
                        <input type="hidden" value="1" name="SELECTED_QUANTITY" id="quant"/>
                        </form>
                    </a></li>
                      ';
                    }
                  }
                  ?>
            </ul>
            <div class="moreBtn">
              <a href="http://localhost/music/pages/products.php" class="lnkProds"><button class="btnMore">View More</button></a>
            </div>
            
        </div>
    </div>

    <div class="bottomNaV">
        <p class="botTitle">Copyright &copy 2021</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
</body>
</html>