<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <form action="../php_soliders/login_manager.php" id="register" method="POST"> 
        <header >Login
        <span><img src="logo.jpg" width="90px" height="50px" alt="شعار جامعة بنها" ></span>
        </header>
        <label for="name">User Name</label>
        <span>*</span>
        <input type="text" id="name" name="uname" required onblur="userValidation()">
        <p class="help"id="pl">At least 6 letters , use upper, lowercase letters and numbers</p>

        <label for="pass">Password</label>
        <span id="span">*</span>
        <input type="password" id="pass" name="upass" onblur="passValidation()" required>
        <p class="help" id="passv">Use upper and lowercase letters as well</p>
        <button name="form-submit" onclick="unCorrect()">Login</button>

        <?php
            if(isset($_GET['logstatus']) && $_GET['logstatus'] === 'fail')
            {
                /*
                    فى حالة انه فى اى غلطة ف تسجيل الدخول 
                    1- ادمن نسى الباسوورد
                    2- طالب مغفل
                    لازم يظهر يقول :
                    حدث خطأ فى تسجيل الدخول
                    لازم يظهر اتنين ازرار
                    1- العودة الى صفحة الاخبار
                    2- اعادة تسجيل الدخول
                */
            }
        ?>
    </form>
    <script src="main.js"></script>
</body>
</html>