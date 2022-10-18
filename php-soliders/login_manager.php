<?php
if(isset($_POST['try-submit']))
    header("location: ../login-page/login.php?logst=fail");
else if (!isset($_POST['login-submit']))
    header("location: ../news-page/index.php");
else
{
    $usname = $_POST['uname'];
    $uspwd = $_POST['upass'];
    try
    {
        include "./dbconfig.php";
        $qres = $pdo->query("SELECT userpassword FROM admins WHERE username='$usname'")->fetch();
        if($qres === false || in_array($uspwd, $qres) === false)
            header("location: ../login-page/login.php?logst=fail");
        else 
            header("location: ../news-page/index.php?logst=success&adminlogin=yes");
    }
    catch(PDOException $ex)
    {
        echo $ex->getMessage();
    }
}