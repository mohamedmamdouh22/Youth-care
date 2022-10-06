<?php
if (!isset($_POST['form-submit']))
    header("location: ../login-page/index.html");
else
{
    session_start();
    $_SESSION['uname'] = $usname = $_POST['uname'];
    $_SESSION['upwd'] = $uspwd = $_POST['upass'];
    $_SESSION['isadmin'] = false;
    $pdo = new PDO("mysql:host=localhost; dbname=youth_care", "root", "");
    if ($pdo === null)
        echo "Connection Error : An Error Happen Within Connecting DataBase... try another time";
    else 
    {
        $qres = $pdo->query("SELECT userpassword FROM admins WHERE username='$usname'")->fetch();
        if($qres === false || in_array($uspwd, $qres) === false)
        {
            $qres = $pdo->query("SELECT userpassword FROM students WHERE username='$usname'")->fetch();
            if($qres === false || in_array($uspwd, $qres) === false)
                $res = $pdo->exec("INSERT INTO students VALUES('$usname', '$uspwd')");
        }
        else
            $_SESSION['isadmin'] = true;
        header("location: ../admin page/admin.php");
    }
}