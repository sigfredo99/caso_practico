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

$query = "SELECT deposits.id, deposits.amount, deposits.channel_number, deposits.voucher, channels.name AS channel_name, banks.name AS bank_name, clients.name AS client_name FROM deposits INNER JOIN channels ON deposits.channel_id=channels.id INNER JOIN banks ON deposits.bank_id=banks.id INNER JOIN clients ON deposits.client_id=clients.id WHERE deposits.client_id=" . $id . ';';
$result = $connection->prepare($query);
$result->execute();
$deposits = $result->fetchAll(PDO::FETCH_ASSOC);
$query = "SELECT id,name FROM clients WHERE id=" . $id . ';';
$result = $connection->prepare($query);
$result->execute();
$client = $result->fetchAll(PDO::FETCH_ASSOC)[0];
$query = "SELECT SUM(amount) as balance FROM deposits WHERE client_id='$id'";
$result = $connection->prepare($query);
$result->execute();
$balance = $result->fetchAll(PDO::FETCH_ASSOC)[0]['balance'] ?? 0;
$title = 'Depositos';
$query = "SELECT deposits.bank_id, banks.name AS name, COUNT(*) FROM deposits INNER JOIN banks ON deposits.bank_id = banks.id WHERE deposits.client_id = '$id' GROUP BY bank_id ORDER BY COUNT(*) DESC LIMIT 1";
$result = $connection->prepare($query);
$result->execute();
$arrayResults = $result->fetchAll(PDO::FETCH_ASSOC);
$mostUsedBank = isset($arrayResults[0]) ? $arrayResults[0]['name'] : 'Sin Datos';
$query = "SELECT deposits.bank_id, channels.name AS name, COUNT(*) FROM deposits INNER JOIN channels ON deposits.channel_id = channels.id WHERE deposits.client_id = '$id' GROUP BY channel_id ORDER BY COUNT(*) DESC LIMIT 1";
$result = $connection->prepare($query);
$result->execute();
$arrayResults = $result->fetchAll(PDO::FETCH_ASSOC);
$mostUsedChannel = isset($arrayResults[0]) ? $arrayResults[0]['name'] : 'Sin Datos';
$childView = 'views/deposits.php';
include('views/layouts/default.php');
