<?php


if (isset($_POST['adminEditSave'])) {
    include("_dbconnect.php");
    $adminId = $_POST['adminEditSave'];
    $newEmail = $_POST['adminEditEmail'];
    $newName = $_POST['adminEditName'];
    $newAbout = $_POST['adminEditAbout'];
    $newLang = $_POST['adminEditLang'];
    $newCountry = $_POST['adminEditCountry'];

    $sql = "UPDATE `adminrequest` SET `adminName` = '{$newName}', `adminLanguage` = '{$newLang}', `adminFrom` = '{$newCountry}', `adminAbout` = '{$newAbout}', `adminEmail` = '{$newEmail}' WHERE `adminrequest`.`adminNo` = $adminId";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location:/forumForm/adminprofile.php?adminEditSuccess=true");
    } else {
        header("Location:/forumForm/adminprofile.php?adminEditSuccess=false");
    }
}
