
<?php
if (isset($_POST['userDelete'])) {
    include("_dbconnect.php");
    $catId = $_POST['id'];

    $sql = "DELETE FROM `categories` WHERE `categories`.`category_id` = $catId";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location:/forumForm/adminCatlist.php?deleteCatSuccess=true");
    } else {
        header("Location:/forumForm/adminCatlist.php?deleteSuccess=false");
    }
}
?>