<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('_dbconnect.php');
    $name = $_POST['fName'];
    $email = $_POST['fEmail'];
    $subject = $_POST['fSubject'];
    $message = $_POST['fmessage'];

    $sql = "INSERT INTO `contactus` (`cName`, `cEmail`, `cSubject`, `cMessage`) VALUES ('{$name}', '{$email}', '{$subject}', '{$message}')";


    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location:/forumForm/index.php?contactsuccess=true");
        exit();
    }else{
        $showError = "Your report has not been submitted yet !! try again";
        header("Location: /forumForm/index.php?contactsuccess=false&error=$showError");
    }
}
?>

