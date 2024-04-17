
<?php
if (isset($_POST['userDelete'])) {
    include("_dbconnect.php");
    $feedId = $_POST['id'];

    $sql = "DELETE FROM `contactus` WHERE `contactus`.`cSno` = $feedId";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location:/forumForm/adminFeedbacklist.php?deleteSuccessFeedback=true");
    } else {
        header("Location:/forumForm/adminFeedbacklist.php?deleteSuccess=false");
    }
}
?>