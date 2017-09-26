<?php

  require_once("db.php");
  require_once("functions.php");

  $data = json_decode(file_get_contents('php://input'), true);

  try {
    $instituicao = array(':instituicao' => $data['instituicao'], ':telInstituicao' => $data['telInstituicao'], ':emailInstituicao' => $data['emailInstituicao']);
    $stmt = $db->prepare('INSERT INTO INSTITUICAO(instituicao, telInstituicao, emailInstituicao) VALUES(:instituicao, :telInstituicao, :emailInstituicao)');
    $stmt->execute($instituicao);

    $responsavelInstituicao = array(':nomeResponsavel' => $data['nomeResponsavel'], ':telResponsavel' => $data['telResponsavel'], ':emailResponsavel' => $data['emailResponsavel']);
    $stmt = $db->prepare('INSERT INTO RESPONSAVEL_INSTITUICAO(nomeResponsavel, telResponsavel, emailResponsavel) VALUES(:nomeResponsavel, :telResponsavel, :emailResponsavel)');
    $stmt->execute($responsavelInstituicao);

    $evento = array(':nomeEvento' => $data['nomeEvento'], ':endereco' => $data['endereco'], ':data' => $data['data'], ':horaInicio' => $data['horaInicio'], ':horaTermino' => $data['horaTermino'], ':enderecoEletronico' => $data['enderecoEletronico'], ':objetivo' => $data['objetivo'], ':tempoDeApresentacao' => $data['tempoDeApresentacao'], ':passagemDeSom' => $data['passagemDeSom'], ':cronograma' => $data['cronograma'], ':microfonesQtd' => $data['microfonesQtd'], ':pedestaisQtd' => $data['pedestaisQtd'], ':ampBaixo' => $data['ampBaixo'], ':ampGuitarra' => $data['ampGuitarra'], ':canalTeclado' => $data['canalTeclado'], ':canalViolao' => $data['canalViolao'], ':bateria' => $data['bateria'], ':pratosBateria' => $data['pratosBateria'], ':caixaBateria' => $data['caixaBateria'], ':obsEstrutura' => $data['obsEstrutura']);
    $stmt = $db->prepare('INSERT INTO EVENTO(nomeEvento, endereco, data, horaInicio, horaTermino, enderecoEletronico, objetivo, tempoDeApresentacao, passagemDeSom, cronograma, microfonesQtd, pedestaisQtd, ampBaixo, ampGuitarra, canalTeclado, canalViolao, bateria, pratosBateria, caixaBateria, obsEstrutura) VALUES(:nomeEvento, :endereco, :data, :horaInicio, :horaTermino, :enderecoEletronico, :objetivo, :tempoDeApresentacao, :passagemDeSom, :cronograma, :microfonesQtd, :pedestaisQtd, :ampBaixo, :ampGuitarra, :canalTeclado, :canalViolao, :bateria, :pratosBateria, :caixaBateria, :obsEstrutura)');
    $stmt->execute($evento);
    /*
    $instituicao = array(':instituicao' => 'instituicao teste', ':telInstituicao' => 'telefone institut teste', ':emailInstituicao' => 'imeil@inst');
    $stmt = $db->prepare('SELECT instituicao_id FROM INSTITUICAO WHERE INSTITUICAO.instituicao = :instituicao AND INSTITUICAO.telInstituicao = :telInstituicao AND INSTITUICAO.emailInstituicao = :emailInstituicao');
    $stmt->execute($instituicao);
    $instituicao_id = $stmt->fetch(PDO::FETCH_ASSOC);
    echo $instituicao_id['instituicao_id'];
    */
  } catch(Exception $e) {
    log_exception($e);
    salvarTxt($data);
  } finally {
    enviarEmail($data);
  }

?>
