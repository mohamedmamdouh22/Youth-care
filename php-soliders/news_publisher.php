<?php
if (!isset($_POST['btn-submit']) || !isset($_FILES['image']))
    header("location: ../news-page/add_new.html");
else
{
    $ntitle = $_POST['headtitle'];
    $ncontent = $_POST['descrption'];
    $ndate = date("Y-m-d H:i:s");

    $imgName = $_FILES['image']['name'];    
    $imgTmpName = $_FILES['image']['tmp_name'];  
    $imgError = $_FILES['image']['error'];
    $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
    $allowedExt = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imgExt, $allowedExt)) 
        echo "Extension Error : Only Allowed File Extensions are jpg , png , jpeg , gif !";
    else 
    {
        if (!is_dir('uploads')) mkdir('uploads');
        $img_new_name = uniqid("IMG-", true) . "." . $imgExt;
        $imgdest = 'uploads/' . $img_new_name;
        $upload_response  = move_uploaded_file($imgTmpName, $imgdest);
        if(!$upload_response || $imgError !== 0) 
            echo  "Uploading Error : There An Error Happen Within Uploading your file ... try another time!";
        else
        {
            try
            {
                include "./dbconfig.php";
                $qres = $pdo->exec("INSERT INTO news VALUES('$ntitle', '$ndate', '$ncontent', '$img_new_name')");
            }
            catch(PDOException $ex)
            {
                echo $ex->getMessage();
            }
            header("location: ../news-page/index.php?upload=success&adminlogin=yes&logst=success");
        }
    }
}