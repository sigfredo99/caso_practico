<?php
session_start();

include_once '../../database/connection.php';
$objeto = new Connection();
$connection = $objeto->Connect();

$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

$pass = md5($password);

$query = "SELECT * FROM users WHERE email='$email' AND password='$pass' ";
$result = $connection->prepare($query);
$result->execute();
if ($result->rowCount() >= 1) {
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["recharge_deposit_user"] = $data[0];
} else {
    $_SESSION["recharge_deposit_user"] = null;
    $data = null;
}

print json_encode($data);
$connection = null;
