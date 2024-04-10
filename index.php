<?php
session_start();

if(!isset($_SESSION['user_type']))
header("location: ./common/home.html");
if($_SESSION['user_type'] == 1)
header("location: ./admin/dashboard.php");
if($_SESSION['user_type'] == 2)
header("location: ./user");
?>