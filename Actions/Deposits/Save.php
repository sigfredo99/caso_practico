<?php
include_once '../../database/connection.php';
$object = new Connection();
$connection = $object->Connect();

$clientId = (isset($_POST['client_id'])) ? $_POST['client_id'] : '';
$bankId = (isset($_POST['bank_id'])) ? $_POST['bank_id'] : '';
$channelId = (isset($_POST['channel_id'])) ? $_POST['channel_id'] : '';
$amount = (isset($_POST['amount'])) ? $_POST['amount'] : '';
$channelNumber = (isset($_POST['channel_number'])) ? $_POST['channel_number'] : '';

//Upload Voucher
$targetDir = "../../public/vouchers/";
$voucher = $_FILES["voucher"]["name"];
$targetFile = $targetDir . basename($voucher);
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
if (!move_uploaded_file($_FILES["voucher"]["tmp_name"], $targetFile)) {
    header('Location: newDeposit.php?id=' . $clientId);
}

$query = "INSERT INTO deposits (client_id, bank_id,channel_id,amount,channel_number,voucher) VALUES('$clientId', '$bankId', '$channelId', '$amount','$channelNumber','$voucher') ";
$result = $connection->prepare($query);
$result->execute();

header('Location: ../../deposits.php?id=' . $clientId);
