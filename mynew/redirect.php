<?php
session_start();
?>
<?php
session_unset();

// destroy the session
session_destroy(); 
$_SESSION["title"]="logout";
header('location:logout.html');
?>