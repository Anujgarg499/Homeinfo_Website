<?php
session_start();
session_destroy();
unset($_SESSION["validuser"]);
header("location:ocheck.php");
?>