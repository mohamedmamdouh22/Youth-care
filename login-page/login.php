<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="logerrorstyle.css">
</head>
<body>
    <form id="register" action="../php-soliders/login_manager.php" method="POST"> 
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
        <button name="login-submit" onclick="unCorrect()" class="button">Login</button>
        <?php
            if(isset($_GET['logst']) && $_GET['logst'] === "fail")
            {
                echo "<br>";
                echo '<p class="p1" id="pr">something is wrong with data entered</p>';
                echo '<button id="t" class="tr" onclick="unDisplay()">try again</button>';
                echo '<button class="retern" id="go"><a href="../news-page/index.php">return to news page</a></button>';
            }
        ?>
    </form>
    <script src="main.js"></script>
</body>
</html>