<?php
session_start();

if (isset($_SESSION["recharge_deposit_user"])) {
    header("Location: clients.php");
} else {
    header("Location: login.php");
}
