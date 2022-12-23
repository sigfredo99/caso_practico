<?php
session_start();

if (!isset($_SESSION["recharge_deposit_user"])) {
    header("Location: login.php");
}

$id = $_GET['id'];
if (!isset($id)) {
    header("Location: clients.php");
}

include_once 'database/connection.php';
$object = new Connection();
$connection = $object->Connect();
// Get Banks
$query = "SELECT id, name FROM banks";
$result = $connection->prepare($query);
$result->execute();
$banks = $result->fetchAll(PDO::FETCH_ASSOC);

//Get Channels
$query = "SELECT id, name FROM channels";
$result = $connection->prepare($query);
$result->execute();
$channels = $result->fetchAll(PDO::FETCH_ASSOC);

//Get Deposit
$query = "SELECT * FROM deposits WHERE id = " . $id;
$result = $connection->prepare($query);
$result->execute();
$deposit = $result->fetchAll(PDO::FETCH_ASSOC)[0];

//Get Client
$query = "SELECT id, name, phone FROM clients WHERE id = " . $deposit['client_id'];
$result = $connection->prepare($query);
$result->execute();
$client = $result->fetchAll(PDO::FETCH_ASSOC)[0];

$title = 'Editar Deposito';
$childView = 'views/edit_deposits.php';
include('views/layouts/default.php');
