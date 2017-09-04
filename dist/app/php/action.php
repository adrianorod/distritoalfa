<?php

include 'db.php';
$db = new DB();
$tblName = 'users';

$data = json_decode(file_get_contents("php://input"));
$nomeEvento = $data->nomeEvento;

$userData = "'".$nomeEvento."'";
$insert = $db->insert($tblName,$userData);

?>
