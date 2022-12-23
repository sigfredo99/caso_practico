<?php
session_start();

if (!isset($_SESSION["recharge_deposit_user"])) {
    header("Location: login.php");
}

include_once 'database/connection.php';
$object = new Connection();
$connection = $object->Connect();

$query = "SELECT id, name FROM banks";
$result = $connection->prepare($query);
$result->execute();
$banks = $result->fetchAll(PDO::FETCH_ASSOC);


$title = 'Bancos';
$childView = 'views/banks.php';
include('views/layouts/default.php');
