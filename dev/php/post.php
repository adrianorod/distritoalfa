<?php

  $db = new PDO('mysql:host=localhost;dbname=distrit1_teste','distrit1_admin','afdk79plw85w');

  $data = json_decode(file_get_contents('php://input'), true);

  $stmt = $db->prepare('INSERT INTO Instituicao(Nome, Telefone, Email) VALUES(:instituicao, :telInstituicao, :emailInstituicao)');
  $stmt->bindParam(':instituicao', $data['instituicao']);
  $stmt->bindParam(':telInstituicao', $data['telInstituicao']);
  $stmt->bindParam(':emailInstituicao', $data['emailInstituicao']);
  $stmt->execute();

  $stmt = $db->prepare('INSERT INTO Responsavel(Nome, Telefone, Email) VALUES(:nomeResponsavel, :telResponsavel, :emailResponsavel)');
  $stmt->bindParam(':nomeResponsavel', $data['nomeResponsavel']);
  $stmt->bindParam(':telResponsavel', $data['telResponsavel']);
  $stmt->bindParam(':emailResponsavel', $data['emailResponsavel']);
  $stmt->execute();

  $stmt = $db->prepare('INSERT INTO
    Evento(Nome, Endereco, Data, HoraInicio, HoraTermino, Site, Objetivo, TempoApresentacao, PassagemDeSom, Cronograma)
    VALUES(:nomeEvento, :endereco, :data, :horaInicio, :horaTermino, :enderecoEletronico, :tempoDeApresentacao, :passagemDeSom, :cronograma)');
  $stmt->bindParam(':nomeEvento', $data['nomeEvento']);
  $stmt->bindParam(':endereco', $data['endereco']);
  $stmt->bindParam(':data', $data['data']);
  $stmt->bindParam(':horaInicio', $data['horaInicio']);
  $stmt->bindParam(':horaTermino', $data['horaTermino']);
  $stmt->bindParam(':enderecoEletronico', $data['enderecoEletronico']);
  $stmt->bindParam(':tempoDeApresentacao', $data['tempoDeApresentacao']);
  $stmt->bindParam(':passagemDeSom', $data['passagemDeSom']);
  $stmt->bindParam(':cronograma', $data['cronograma']);
  $stmt->execute();

?>
