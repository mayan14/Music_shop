<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://localhost/music/css/login.css">
    <title>sign up</title>

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
            <form name="signform" action="sign.php" onsubmit="return validate()" method="POST" class="form">
                <div class="title">
                    <h1>SIGN UP</h1>
                </div>
                <div>
                    <input type="text" name="NAME" placeholder="Enter your full" class="form_input">
                </div>
                <br>
                <div>
                    <input type="email" name="EMAIL_ADDRESS" placeholder="Enter your email adress" class="form_input">
                </div>
                <br>
                <div>
                    <input type="number" name="CONTACT_NUMBER" placeholder="Enter your telephone number" class="form_input">
                </div>
                <br>
                <div>
                    <input type="password" name="PASSWORD" placeholder="Enter your password" class="form_input">
                </div>
                <br>
                    <input type="submit" name="CREATE ACCOUNT" value="SUBMIT" class="btn_submit" style="color: white; background-color: brown">
                    <br>
            </form>
        </div>
    </div>
    <script>
        function validate(){
            var name= document.forms["signform"]["NAME"];
            var email= document.forms["signform"]["EMAIL_ADDRESS"];
            var telephone= document.forms["signform"]["CONTACT_NUMBER"];
            var password= document.forms["signform"]["PASSWORD"];

            if (name.value == "") {
                window.alert("Please Enter your name.");
                name.focus();
                return false;

            }
            
            if (email.value == "") {
                window.alert("Please Enter your Email Address.");
                email.focus();
                return false;

            }
            
            if (telephone.value == "") {
                window.alert("Please Enter your Telephone Number.");
                telephone.focus();
                return false;

            }
            
            if (password.value == "") {
                window.alert("Please Enter your Password.");
                password.focus();
                return false;

            }
            return true;
        }
    </script>
</body>
</html>