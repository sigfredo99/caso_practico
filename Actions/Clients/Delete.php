<?php
include_once '../../database/connection.php';
$object = new Connection();
$connection = $object->Connect();

$id = (isset($_POST['id'])) ? $_POST['id'] : '';

$query = "DELETE FROM clients WHERE id='$id' ";
$result = $connection->prepare($query);
$result->execute();

print json_encode('Borrado', JSON_UNESCAPED_UNICODE);
$connection = NULL;
