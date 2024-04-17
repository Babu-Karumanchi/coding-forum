<?php

if (isset($_POST['eSave'])) {
    include("_dbconnect.php");
    $snoEdit = $_POST['snoEdit'];
    $newAns = $_POST['answer'];
    $newRating = $_POST['rating'];

    $sql = "UPDATE `comments` SET `comment_content` = '{$newAns}', `comment_rating` = '{$newRating}' WHERE `comments`.`comment_id` = $snoEdit";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        $sql2 = "SELECT * FROM `comments` WHERE `comment_id` =$snoEdit";
        $result2 = mysqli_query($conn, $sql2);
        $row = mysqli_fetch_assoc($result2);
        $thread_id = $row['thread_id'];
        header("Location:/forumForm/adminAnswerList.php?threadid= $thread_id &ansEdit=true");
    } else {
        $sql2 = "SELECT * FROM `comments` WHERE `comment_id` =$snoEdit";
        $result2 = mysqli_query($conn, $sql2);
        $row = mysqli_fetch_assoc($result2);
        $thread_id = $row['thread_id'];
        header("Location:/forumForm/adminAnswerList.php?threadid= $thread_id & ansEdit=false");
    }
}
