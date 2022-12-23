<?php
session_start();

if (!isset($_SESSION["recharge_deposit_user"])) {
    header("Location: login.php");
}

include_once 'database/connection.php';
$object = new Connection();
$connection = $object->Connect();

$query = "SELECT id, name, phone FROM clients";
$result = $connection->prepare($query);
$result->execute();
$clients = $result->fetchAll(PDO::FETCH_ASSOC);


$title = 'Cliente';
$childView = 'views/clients.php';
include('views/layouts/default.php');
