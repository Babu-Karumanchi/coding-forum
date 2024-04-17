<?php


if(isset($_POST['editSave'])){
    include("_dbconnect.php");
    $userId = $_POST['editSave'] ;
    $newEmail = $_POST['editEmail'];
    $newUsername = $_POST['editUsername'];
    $newName = $_POST['editName'];
  
    $sql = "UPDATE `users` SET `user_email` = '{$newEmail}', `user_username` = '{$newUsername}', `user_name` = '{$newName}' WHERE `users`.`sno` = $userId";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        session_start();
        session_destroy();
        header("Location:/forumForm/index.php?editSuccess=true");
    } else {
        header("Location:/forumForm/profile.php?editSuccess=false");
    }
}
?>