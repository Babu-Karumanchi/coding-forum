
<?php
if (isset($_POST['userAnsDelete'])) {
    include("_dbconnect.php");
    $userAnsId = $_POST['id'];

    $sql = "DELETE FROM `comments` WHERE `comments`.`comment_id` = $userAnsId";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location:/forumForm/adminQuestionAnswerList.php?AnsDeleteSuccess=true");
    } else {
        header("Location:/forumForm/adminAnswerList.php?deleteSuccess=false");
    }
}
?>