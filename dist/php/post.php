<?php

  $db = new PDO('mysql:host=localhost;dbname=distrit1_teste','distrit1_admin','afdk79plw85w');

  $data = json_decode(file_get_contents("php://input"));

  $stmt = $db->prepare();

?>
