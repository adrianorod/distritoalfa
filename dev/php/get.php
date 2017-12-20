<?php

  require_once("db.php");

  $stmt = $db->prepare('SELECT I.*, R.*, E.* FROM INSTITUICAO AS I INNER JOIN EVENTO AS E ON I.instituicao_id = E.evento_id INNER JOIN RESPONSAVEL_INSTITUICAO AS R ON I.instituicao_id = R.responsavel_instituicao_id');
  $stmt->execute();

  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

  header('Content-Type: application/json');
  echo json_encode($data);

?>
