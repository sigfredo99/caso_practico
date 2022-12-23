<?php
include_once '../../database/connection.php';
$object = new Connection();
$connection = $object->Connect();

$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$clientId = (isset($_POST['client_id'])) ? $_POST['client_id'] : '';
$bankId = (isset($_POST['bank_id'])) ? $_POST['bank_id'] : '';
$channelId = (isset($_POST['channel_id'])) ? $_POST['channel_id'] : '';
$amount = (isset($_POST['amount'])) ? $_POST['amount'] : '';
$channelNumber = (isset($_POST['channel_number'])) ? $_POST['channel_number'] : '';
$reason = (isset($_POST['reason'])) ? $_POST['reason'] : '';
$voucher = null;
if (isset($_FILES["voucher"]['name'])) {
    //Upload Voucher
    $targetDir = "../../public/vouchers/";
    $voucher = $_FILES["voucher"]["name"];
    $targetFile = $targetDir . basename($voucher);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if (!move_uploaded_file($_FILES["voucher"]["tmp_name"], $targetFile)) {
        header('Location: newDeposit.php?id=' . $clientId);
    }
}


$query = "UPDATE deposits SET  bank_id = '$bankId',channel_id = '$channelId' ,amount = '$amount' ,channel_number = '$channelNumber'";

if ($voucher)
    $query .= ",voucher = '$voucher'";
$query .= "  WHERE id='$id' ";
$result = $connection->prepare($query);
$result->execute();
$date = date('Y-m-d H:i:s');
$query = "INSERT INTO corrections (deposit_id, reason, date ) VALUES ('$id','$reason','$date')";
$result = $connection->prepare($query);
$result->execute();
header('Location: ../../deposits.php?id=' . $clientId);
