<?php

// $showError = "false";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('_dbconnect.php');
    $User = $_POST['loginUsernameAdmin'];
    $pass = $_POST['loginPassAdmin'];


    $sql = "SELECT * FROM `adminaccept` WHERE adminUsername = '$User'";


    $result = mysqli_query($conn, $sql);

    $numRows = mysqli_num_rows($result);



    // echo $numRows;

    if ($numRows == 1) {
        $row = mysqli_fetch_assoc($result);
        $a = $row['adminPass'];
        if ($pass== $a) {
            // echo "hi";
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['admin'] = true;
            $_SESSION['sno'] = $row['sno'];
            $_SESSION['admin_username'] = $User;
            // echo "logged in " . $User;
            header("Location: /forumForm/admindashboard.php");
        }else{
            $pass = "Password not match try again";
            header("Location: /forumForm/_adminLogin.php?loginError=false&error=$pass");
        }
    }else{
        $username="you can't login";
        header("Location: /forumForm/_adminLogin.php?loginError=false&error=$username");
    }
}
