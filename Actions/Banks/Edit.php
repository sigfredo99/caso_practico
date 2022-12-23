<?php
include_once '../../database/connection.php';
$object = new Connection();
$connection = $object->Connect();
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$name = (isset($_POST['name'])) ? $_POST['name'] : '';

$query = "UPDATE banks SET name='$name' WHERE id='$id' ";
$result = $connection->prepare($query);
$result->execute();

$query = "SELECT id, name FROM banks WHERE id='$id'";
$result = $connection->prepare($query);
$result->execute();
$data = $result->fetchAll(PDO::FETCH_ASSOC);

print json_encode($data, JSON_UNESCAPED_UNICODE);
$connection = NULL;
