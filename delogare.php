<?php
session_start(); 
$_SESSION['log_in'] = false;
session_destroy(); 
header("Location: index.php");
exit();
?>