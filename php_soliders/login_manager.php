<?php
if (!isset($_POST['form-submit']))
    header("location: ../login-page/index.html");
else
{
    session_start();
    $_SESSION['uname'] = $usname = $_POST['uname'];
    $_SESSION['upwd'] = $uspwd = $_POST['upass'];
    $_SESSION['isadmin'] = false;
    try
    {
        include "./dbconfig.php";
        $qres = $pdo->query("SELECT userpassword FROM admins WHERE username='$usname'")->fetch();
        if($qres === false || in_array($uspwd, $qres) === false)
        {
            $qres = $pdo->query("SELECT userpassword FROM students WHERE username='$usname'")->fetch();
            if($qres === false || in_array($uspwd, $qres) === false)
                $res = $pdo->exec("INSERT INTO students VALUES('$usname', '$uspwd')");
        }
        else
            $_SESSION['isadmin'] = true;
        header("location: ../admin page/admin.php?login=success");
    }
    catch(PDOException $ex)
    {
        echo $ex->getMessage();
    }
}