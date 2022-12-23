<?php
session_start();
unset($_SESSION["recharge_deposit_user"]);
session_destroy();
header("Location: ../../login.php");
