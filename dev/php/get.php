<?php

  require_once("db.php");

  $stmt = $db->prepare('SELECT Instituicao.*, Responsavel.*, Evento.* FROM Instituicao INNER JOIN Evento ON Instituicao.ID = Evento.ID INNER JOIN Responsavel ON Instituicao.ID = Responsavel.ID');
  $stmt->execute();

  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

  header('Content-Type: application/json');
  echo json_encode($data);

?>
