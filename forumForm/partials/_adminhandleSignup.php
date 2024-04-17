<?php
$showError = false;
error_reporting(0);

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("_dbconnect.php");
    $adminName = $_POST['adminSignupName'];
    $adminUsername = $_POST['adminSignupUsername'];
    $adminEmail = $_POST['adminSignupEmail'];
    $adminType = $_POST['adminTypeSignup'];
    $adminLang = $_POST['adminLangSignup'];
    $adminExp = $_POST['adminExpSignup'];
    $adminCountry = $_POST['adminFromSignup'];
    $adminAbout = $_POST['adminAbout'];
    $filename = $_FILES['uploadfile']['name'];
    $tempname = $_FILES['uploadfile']['tmp_name'];


    $existSql = "SELECT * FROM `adminrequest` WHERE `adminUsername` = '{$adminUsername}'";

    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {
        header("Location: /forumForm/index.php?signupErrorUsername=true");
    } else {
        $up = move_uploaded_file($tempname, "../image/" . $filename);
        if ($up) {

            $sql = "INSERT INTO `users` (`user_email`, `user_username`, `user_pass`, `timestamp`, `user_name`, `user_img`) VALUES ('$user_email', '$User','$hash', current_timestamp(), '$Name', '$filename')";

            $sql = "INSERT INTO `adminrequest` (`adminName`, `adminType`, `adminLanguage`, `adminExprience`, `adminFrom`, `adminAbout`, `adminEmail`, `adminTime`, `adminUsername`, `adminPfp`) VALUES ('{$adminName}', '{$adminExp}', '{$adminLang}', '{$adminExp}', '{$adminCountry}', '{$adminAbout}', '{$adminEmail}', current_timestamp(), '{$adminUsername}', '$filename')";


            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location:/forumForm/index.php?adminsignupsuccess=true");
                exit();
            }else{
                header("Location: /forumForm/index.php?adminsignupsuccess=false");
            }
        } 
    }
}
