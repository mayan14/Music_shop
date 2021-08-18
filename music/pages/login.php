<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/login.css">
    <title>log in</title>

    <style>
        body{
            background-image:url("http://localhost/music/pictures/background.jpg")  ;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <div class="ContHeading" style="margin-top: 100px">
        <h1 class="headingName" style="color: white; text-align: center; margin-top: 20px;">FLEX MUSIC SHOP</h1>
    </div>
    <div class="container">
        <div class="innerContainer" style="margin-top: 40px">
            <form action="log.php" method="POST" class="form">
                <div class="title">
                    <h1>LOGIN</h1>
                </div>
                <div>
                    <input type="email" name="EMAIL_ADDRESS" placeholder="Enter your email adress" class="form_input">
                </div>
                <br>
                <div>
                    <input type="password" name="PASSWORD" placeholder="Enter your password" class="form_input">
                </div>
                <br>
                    <input type="submit" name="LOG IN" value="SUBMIT" class="btn_submit" style="color: white; background-color: brown">
                    <br>
                    <br>
                    <a href ="login.php" style="color: brown; text-decoration: none"> Forgotten Email addreess or Password?</a>
                    <h4>Click to create a new account</h4>
                    <a href ="signup.php" style="color: brown; text-decoration: none">SIGN UP</a>
            </form>
        </div>
    </div>
</body>
</html>