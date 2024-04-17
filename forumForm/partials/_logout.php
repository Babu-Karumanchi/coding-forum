<?php
if (isset($_POST['logout'])) {
session_start();
echo "Logging you out. Please wait...";
session_destroy();
header("Location: /forumForm/index.php");
}
?>