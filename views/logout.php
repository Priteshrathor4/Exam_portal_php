<?php
include("database.php");
session_start();
// $id = $_SESSION['id'];
$sql2 = $db->query("DELETE FROM public.logininfo");
session_destroy();

header("Location:login.php");
?>