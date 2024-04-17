<?php

if (isset($_POST['eSave'])) {
    include("_dbconnect.php");
    $snoEdit = $_POST['snoEdit'];
    $newName = $_POST['eName'];
    $newDesc = $_POST['edesc'];

    $sql = "UPDATE `categories` SET `category_name` = '{$newName}', `category_discreption` = '{$newDesc}' WHERE `categories`.`category_id` = $snoEdit";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location:/forumForm/adminCatlist.php?edit=true");
    } else {
        header("Location:/forumForm/adminCatlist.php?edit=false");
    }
}
