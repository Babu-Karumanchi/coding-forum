<?php
$showError = false;
error_reporting(0);

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("_dbconnect.php");
    $user_email = $_POST['signupEmail'];
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupCPassword'];
    $User = $_POST['signupUsername'];
    $Name = $_POST['signupName'];
    $filename = $_FILES['uploadfile']['name'];
    $tempname = $_FILES['uploadfile']['tmp_name'];


    //Check whether this email exists
    $TrueName = false;
    $TrueUserName = false;
    if (!preg_match("/^[a-zA-z]*$/", $name)) {
        $TrueName = true;
    } else {
        $TrueName = false;
        if (!preg_match("/^[a-zA-z0-9]*$/", $username)) {
            $TrueUserName = true;
        } else {
            $TrueUserName = false;
            $existSql = "SELECT * FROM `users` WHERE user_username = '$User'";

            $result = mysqli_query($conn, $existSql);
            $numRows = mysqli_num_rows($result);
            if ($numRows > 0) {
                $showError = "Username already in use";
            } else {
                if ($pass == $cpass) {
                    $hash = password_hash($pass, PASSWORD_DEFAULT);
                    $up = move_uploaded_file($tempname, "../image/" . $filename);
                    if ($up) {

                        // $sql = "INSERT INTO `users` ( `user_email`,`user_username`, `user_pass`, `timestamp`,`user_name`,`user_img`) VALUES ( '$user_email', '$User','$hash', current_timestamp(),'$Name','$filename')";
                        $sql = "INSERT INTO `users` (`user_email`, `user_username`, `user_pass`, `timestamp`, `user_name`, `user_img`) VALUES ('$user_email', '$User','$hash', current_timestamp(), '$Name', '$filename')";


                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                            $showAlert = true;
                            header("Location:/forumForm/_loginModal.php?signupsuccess=true");
                            exit();
                        }
                    }else{
                        header("Location: /forumForm/_signupModal.php?signupsuccess=false&error=pass");
                    }
                } else {
                    header("Location: /forumForm/_signupModal.php?signupsuccess=false&error=pass");
                    // $showError = "Passwords do not match";
                }
            }
        }
    }
    header("Location: /forumForm/_signupModal.php?signupsuccess=false&error=username");
}
