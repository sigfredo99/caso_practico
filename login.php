<?php
session_start();

if (isset($_SESSION["recharge_deposit_user"])) {
    header("Location: clients.php");
}

$title = 'Login';
$childView = 'views/login.php';
include('views/layouts/auth.php');
