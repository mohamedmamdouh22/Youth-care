<?php
if (!isset($_POST['req_submit']))
    header("location: ../takaful-Page/takaful_Form.html");
else
{
    $email = $_POST['email'];
    $natId = $_POST['nat_id'];
    $fname = $_POST['fullname'];
    $phone = $_POST['ph_num'];
    $dep = $_POST['dep'];
    $year = $_POST['year'];
    try
    {
        include "./dbconfig.php";
        $natid_request = "SELECT nath_id FROM requests WHERE nath_id = $natId";
        $req_response = $pdo->query($natid_request)->fetch();
        if ($req_response === false) 
        {
            $insert_command = "INSERT INTO requests VALUES (NULL, '$fname', '$natId', '$phone', '$email', '$dep', '$year')";
            $insert_response = $pdo->exec($insert_command);
        } 
        else
        {
            echo "<script>";
            echo "alert('هذا المستخدم موجود بالفعل يا فتى');";
            echo "</script>";
        }
        header("location: ../news-page/index.php?request=success&logstatus=success");
    }
    catch(PDOException $ex)
    {
        echo $ex->getMessage();
    }
}