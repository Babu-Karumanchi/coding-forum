<?php


if (isset($_POST['CSave'])) {
    include("_dbconnect.php");
    $newDec = $_POST['dec'];
    $newName = $_POST['cName'];

    $sql = "INSERT INTO `categories` (`category_name`, `category_discreption`, `created`) VALUES ('{$newName}', '{$newDec}', current_timestamp())";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location:/forumForm/adminCatlist.php?create=true");
    } else {
        header("Location:/forumForm/adminCatlist.php?create=false");
    }
}

