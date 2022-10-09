<?php
if (!isset($_POST['form-submit']))
    header("location: ../login-page/login.php");
else
{
    session_start();
    $_SESSION['uname'] = $usname = $_POST['uname'];
    $_SESSION['upwd'] = $uspwd = $_POST['upass'];
    try
    {
        include "./dbconfig.php";
        $qres = $pdo->query("SELECT userpassword FROM admins WHERE username='$usname'")->fetch();
        if($qres === false || in_array($uspwd, $qres) === false)
            header("location: ../login-page/login.php?logstatus=fail");
        else 
            header("location: ../news-page/index.php?logstatus=success&adminlogin=yes");
    }
    catch(PDOException $ex)
    {
        echo $ex->getMessage();
    }
}