<?php
include_once '../../database/connection.php';
$object = new Connection();
$connection = $object->Connect();

$name = (isset($_POST['name'])) ? $_POST['name'] : '';

$query = "INSERT INTO channels (name) VALUES('$name') ";
$result = $connection->prepare($query);
$result->execute();

$query = "SELECT id, name FROM channels ORDER BY id DESC LIMIT 1";
$result = $connection->prepare($query);
$result->execute();
$data = $result->fetchAll(PDO::FETCH_ASSOC);


print json_encode($data, JSON_UNESCAPED_UNICODE);
$connection = NULL;
