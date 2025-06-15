<!-- logout.php -->
<?php
session_start();

session_unset();
session_destroy();

header("Location: signup.php");
exit();
?>