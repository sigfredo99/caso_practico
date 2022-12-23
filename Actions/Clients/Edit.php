<?php
include_once '../../database/connection.php';
$object = new Connection();
$connection = $object->Connect();
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$name = (isset($_POST['name'])) ? $_POST['name'] : '';
$phone = (isset($_POST['phone'])) ? $_POST['phone'] : '';

$query = "UPDATE clients SET name='$name', phone='$phone' WHERE id='$id' ";
$result = $connection->prepare($query);
$result->execute();

$query = "SELECT id, name, phone FROM clients WHERE id='$id'";
$result = $connection->prepare($query);
$result->execute();
$data = $result->fetchAll(PDO::FETCH_ASSOC);

print json_encode($data, JSON_UNESCAPED_UNICODE);
$connection = NULL;
