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
            $departments = array(
                "math&phys" => "الرياضيات والفيزيقا",
                "electric" => "الهندسة الكهربية",
                "mechanics" => "الهندسة الميكانيكية",
                "civil" => "الهندسة المدنية",
                "archticture" => "الهندسة المعمارية",
                "geomatics" => "هندسة المساحة"
            );
            $classification = array(
                "prep" => "الأعدادية",
				"first" => "الأولي",
                "second" => "الثانية",
                "third" => "الثالثة",
                "fourth" => "الرابعة"
            );
            $insert_command = "INSERT INTO requests VALUES (NULL, '$fname', '$natId', '$phone', '$email', '$departments[$dep]', '$classification[$year]')";
            $insert_response = $pdo->exec($insert_command);
        } 
        header("location: ../news-page/index.php?request=success&adminlogin=yes&logst=success");
    }
    catch(PDOException $ex)
    {
        echo $ex->getMessage();
    }
}