<?php

  $db = new PDO('mysql:host=localhost;dbname=distrit1_teste','distrit1_admin','afdk79plw85w');

  $data = json_decode(file_get_contents("php://input"));

  $stmt = $db->prepare('INSERT INTO Instituicao(Nome, Telefone, Email) VALUES(:instituicao, :telInstituicao, :emailInstituicao)');

  $stmt->bindParam(":instituicao", $data["instituicao"]);
  $stmt->bindParam(":telInstituicao", $data["telInstituicao"]);
  $stmt->bindParam(":emailInstituicao", $data["emailInstituicao"]);

  $stmt->execute();

?>
