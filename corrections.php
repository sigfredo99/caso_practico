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

//Get Deposit
$query = "SELECT * FROM deposits WHERE id = " . $id;
$result = $connection->prepare($query);
$result->execute();
$deposit = $result->fetchAll(PDO::FETCH_ASSOC)[0];

//Get Corrections
$query = "SELECT * FROM corrections WHERE deposit_id = " . $id;
$result = $connection->prepare($query);
$result->execute();
$corrections = $result->fetchAll(PDO::FETCH_ASSOC);

$title = 'Correcciones Deposito';
$childView = 'views/corrections.php';
include('views/layouts/default.php');
