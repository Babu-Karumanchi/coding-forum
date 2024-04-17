<?php

$showError = "false";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('_dbconnect.php');
    $User = $_POST['loginUsername'];
    $pass = $_POST['loginPass'];


    $sql = "SELECT * FROM `users` WHERE user_username = '$User'";


    $result = mysqli_query($conn, $sql);

    $numRows = mysqli_num_rows($result);


    
    // echo $numRows;
    
    if ($numRows == 1) {
        $row = mysqli_fetch_assoc($result);
        $a=$row['user_pass']; 
        // echo "pass:".$a;

        if(password_verify($pass, $a)) {
            // echo "hi";
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['admin'] = false;
            $_SESSION['sno'] = $row['sno'];
            $_SESSION['user_username'] = $User;
            // echo "logged in ". $User;
            header("Location: /forumForm/index.php");  
        }else{
            $pass= "Password not match try again";
            header("Location: /forumForm/_loginModal.php?loginError=false&error=$pass");  
        }
    }else{
        $username = 'Username not found try again  Click to <a href="/forumForm/_signupModal.php"  class="fw-bold text-decoration-none ">   Signup  </a>';
        header("Location: /forumForm/_loginModal.php?loginError=false&error=$username");  
    }
    
}
?>

