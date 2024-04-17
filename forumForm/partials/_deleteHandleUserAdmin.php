
<?php
if (isset($_POST['userDelete'])) {
    include("_dbconnect.php");
    $userId = $_POST['id'];

    $sql = "DELETE FROM `users` WHERE `users`.`sno` = $userId";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location:/forumForm/adminUserlist.php?deleteSuccess=true");
    } else {
        header("Location:/forumForm/adminUserlist.php?deleteSuccess=false");
    }
}
?>