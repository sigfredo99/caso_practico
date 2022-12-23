<?php
session_start();

if (!isset($_SESSION["recharge_deposit_user"])) {
    header("Location: login.php");
}

include_once 'database/connection.php';
$object = new Connection();
$connection = $object->Connect();

$query = "SELECT id, name FROM channels";
$result = $connection->prepare($query);
$result->execute();
$channels = $result->fetchAll(PDO::FETCH_ASSOC);

$title = 'Canales';
$childView = 'views/channels.php';
include('views/layouts/default.php');
