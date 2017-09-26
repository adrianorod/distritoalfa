<?php

  require_once("db.php");
  require_once("phpmailer/PHPMailer.php");

  function salvarTxt($arg) {
    $salvando = json_encode($arg);
    $fp = fopen("log_convites_error.txt", "a");
    $escreve = fwrite($fp, $salvando);
    fclose($fp);
  }

  function enviarEmail($arg1, $arg2, $arg3) {
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'mail.distritoalfa.com.br';
    $mail->Port = 465;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "contato@distritoalfa.com.br";
    $mail->Password = "afdk79plw85w";

    $mail->setFrom("contato@distritoalfa.com.br", "Distrito Alfa");
    $mail->addAddress($arg1);
    $mail->Subject = "Convite - Distrito Alfa";
    $mail->msgHTML($arg2);
    $mail->AltBody = $arg3;

    die();
  }

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
    $emailCorpoHTML = "<b>Nome do evento: </b>$frm[nomeEvento]<br/>
      <b>Endere&ccedil;o: </b>$frm[endereco]<br/>
      <b>Data do evento: </b>$frm[data]<br/>
      <b>Hor&aacute;rio previsto de in&iacute;cio: </b>$frm[horaInicio]<br/>
      <b>Hor&aacute;rio previsto de t&eacute;rmino: </b>$frm[horaTermino]<br/>
      <b>Endere&ccedil;o eletr&ocirc;nico do evento: </b>$frm[enderecoEletronico]<br/>
      -------------<br/><br/>
      <b>Nome do respons&aacute;vel: </b>$frm[nomeResponsavel]<br/>
      <b>Telefone do respons&aacute;vel: </b>$frm[telResponsavel]<br/>
      <b>E-mail do respons&aacute;vel: </b>$frm[emailResponsavel]<br/>
      -------------<br/><br/>
      <b>Objetivo do evento: </b>$frm[objetivo]<br/>
      <b>Quantidade de m&uacute;sicas (ou tempo dispon&iacute;vel): </b>$frm[tempoDeApresentacao]<br/>
      <b>Passagem de som: </b>$frm[passagemDeSom]<br/>
      <b>Cronograma e onde a banda estar&aacute; encaixada: </b>$frm[cronograma]<br/>
      -------------<br/><br/>
      <b>Estrutura dispon&iacute;vel no local</b><br/>
      Microfones? $frm[microfonesQtd]<br/>
      Pedestais? $frm[pedestaisQtd]<br/>
      Amplificador para baixo? $frm[ampBaixo]<br/>
      Amplificador para guitarra? $frm[ampGuitarra]<br/>
      Canal para teclado? $frm[canalTeclado]<br/>
      Canal para viol&atilde;o? $frm[canalViolao]<br/>
      Bateria (bumbo, tambores e estantes para pratos)? $frm[bateria]<br/>
      Pratos para bateria? $frm[pratosBateria]<br/>
      Caixa / tarol para bateria? $frm[caixaBateria]<br/>
      Observa&ccedil;&otilde;es a respeito da estrutura de som? $frm[obsEstrutura]";
  }

?>
