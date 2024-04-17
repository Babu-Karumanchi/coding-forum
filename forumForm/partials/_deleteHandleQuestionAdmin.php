
<?php
if (isset($_POST['questionDelete'])) {
    include("_dbconnect.php");
    $questionId = $_POST['id'];

    $sql = "DELETE FROM `threads` WHERE `threads`.`thread_id` = $questionId";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location:/forumForm/adminQuestionAnswerList.php?deleteSuccessQuestion=true");
    } else {
        header("Location:/forumForm/adminQuestionAnswerList.php?deleteSuccess=false");
    }
}
?>