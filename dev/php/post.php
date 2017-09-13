<?php

  require_once("db.php");

  $data = json_decode(file_get_contents('php://input'), true);

  $instituicao = array(':instituicao' => $data['instituicao'], ':telInstituicao' => $data['telInstituicao'], ':emailInstituicao' => $data['emailInstituicao']);

  $stmt = $db->prepare('INSERT INTO INSTITUICAO(instituicao, telInstituicao, emailInstituicao) VALUES(:instituicao, :telInstituicao, :emailInstituicao)');
  $stmt->execute($instituicao);

  $stmt = $db->prepare('SELECT instituicao_id FROM INSTITUICAO WHERE INSTITUICAO.instituicao = :instituicao AND INSTITUICAO.telInstituicao = :telInstituicao AND INSTITUICAO.emailInstituicao = :emailInstituicao');
  $stmt->bindParam(':instituicao', $data['instituicao']);
  $stmt->bindParam(':telInstituicao', $data['telInstituicao']);
  $stmt->bindParam(':emailInstituicao', $data['emailInstituicao']);
  $stmt->execute();
  $instituicao_id = $stmt->fetch(PDO::FETCH_ASSOC);

  $stmt = $db->prepare('INSERT INTO RESPONSAVEL_INSTITUICAO(nomeResponsavel, telResponsavel, emailResponsavel, instituicao_id) VALUES(:nomeResponsavel, :telResponsavel, :emailResponsavel, :instituicao_id)');
  $stmt->bindParam(':nomeResponsavel', $data['nomeResponsavel']);
  $stmt->bindParam(':telResponsavel', $data['telResponsavel']);
  $stmt->bindParam(':emailResponsavel', $data['emailResponsavel']);
  $stmt->bindParam(':instituicao_id', $instituicao_id);
  $stmt->execute();

  $stmt = $db->prepare('INSERT INTO EVENTO(nomeEvento, endereco, data, horaInicio, horaTermino, enderecoEletronico, objetivo, tempoDeApresentacao, passagemDeSom, cronograma) VALUES(:nomeEvento, :endereco, :data, :horaInicio, :horaTermino, :enderecoEletronico, :objetivo, :tempoDeApresentacao, :passagemDeSom, :cronograma)');
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

  $stmt = $db->prepare('INSERT INTO ESTRUTURA_EVENTO(microfonesQtd, pedestaisQtd, ampBaixo, ampGuitarra, canalTeclado, canalViolao, bateria, pratosBateria, caixaBateria, obsEstrutura) VALUES(:microfonesQtd, :pedestaisQtd, :ampBaixo, :ampGuitarra, :canalTeclado, :canalViolao, :bateria, :pratosBateria, :caixaBateria, :obsEstrutura)');
  $stmt->bindParam(':microfonesQtd', $data['microfonesQtd']);
  $stmt->bindParam(':pedestaisQtd', $data['pedestaisQtd']);
  $stmt->bindParam(':ampBaixo', $data['ampBaixo']);
  $stmt->bindParam(':ampGuitarra', $data['ampGuitarra']);
  $stmt->bindParam(':canalTeclado', $data['canalTeclado']);
  $stmt->bindParam(':canalViolao', $data['canalViolao']);
  $stmt->bindParam(':bateria', $data['bateria']);
  $stmt->bindParam(':pratosBateria', $data['pratosBateria']);
  $stmt->bindParam(':caixaBateria', $data['caixaBateria']);
  $stmt->bindParam(':obsEstrutura', $data['obsEstrutura']);
  $stmt->execute();

?>
