
<?php
if(isset($_POST['userDelete'])){
    include("_dbconnect.php");
    $userId = $_POST['userDelete'] ;
  
    $sql = "DELETE FROM `users` WHERE `users`.`sno` = $userId";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        session_start();
        session_destroy();
        header("Location:/forumForm/index.php?deleteSuccess=true");
    } else {
        header("Location:/forumForm/index.php?deleteSuccess=false");
        
    }
}
?>