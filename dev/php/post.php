<?php

  require_once("db.php");

  $data = json_decode(file_get_contents('php://input'), true);

  $stmt = $db->prepare('INSERT INTO Instituicao(NomeInstituicao, TelefoneInstituicao, EmailInstituicao) VALUES(:instituicao, :telInstituicao, :emailInstituicao)');
  $stmt->bindParam(':instituicao', $data['instituicao']);
  $stmt->bindParam(':telInstituicao', $data['telInstituicao']);
  $stmt->bindParam(':emailInstituicao', $data['emailInstituicao']);
  $stmt->execute();

  $stmt = $db->prepare('INSERT INTO Responsavel(NomeResponsavel, TelefoneResponsavel, EmailResponsavel) VALUES(:nomeResponsavel, :telResponsavel, :emailResponsavel)');
  $stmt->bindParam(':nomeResponsavel', $data['nomeResponsavel']);
  $stmt->bindParam(':telResponsavel', $data['telResponsavel']);
  $stmt->bindParam(':emailResponsavel', $data['emailResponsavel']);
  $stmt->execute();

  $stmt = $db->prepare('INSERT INTO Evento(NomeEvento, EnderecoEvento, Data, HoraInicio, HoraTermino, SiteEvento, ObjetivoEvento, TempoApresentacao, PassagemDeSom, Cronograma) VALUES(:nomeEvento, :endereco, :data, :horaInicio, :horaTermino, :enderecoEletronico, :objetivo, :tempoDeApresentacao, :passagemDeSom, :cronograma)');
  $stmt->bindParam(':nomeEvento', $data['nomeEvento']);
  $stmt->bindParam(':endereco', $data['endereco']);
  $stmt->bindParam(':data', $data['data']);
  $stmt->bindParam(':horaInicio', $data['horaInicio']);
  $stmt->bindParam(':horaTermino', $data['horaTermino']);
  $stmt->bindParam(':enderecoEletronico', $data['enderecoEletronico']);
  $stmt->bindParam(':objetivo', $data['objetivo']);
  $stmt->bindParam(':tempoDeApresentacao', $data['tempoDeApresentacao']);
  $stmt->bindParam(':passagemDeSom', $data['passagemDeSom']);
  $stmt->bindParam(':cronograma', $data['cronograma']);
  $stmt->execute();

?>
