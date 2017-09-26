<?php

  function salvarTxt($arg) {
    $salvando = json_encode($arg);
    $fp = fopen("log_convites_error.txt", "a");
    $escreve = fwrite($fp, $salvando);
    fclose($fp);
  }

  function enviarEmail($data) {
    $emailDestino = "distritoalfa01@gmail.com";
    $assunto = "Convite - Distrito Alfa";
    $emailCorpoHTML = "<b>Institui&ccedil;&atilde;o: </b>$data[instituicao]<br/>
    <b>Telefone: </b>$data[telInstituicao]<br/>
    <b>E-mail: </b>$data[emailInstituicao]<br/>
    <b>Respons&aacute;vel: </b>$data[nomeResponsavel]<br/>
    <b>Telefone (respons&aacute;vel): </b>$data[telResponsavel]<br/>
    <b>E-mail (respons&aacute;vel): </b>$data[emailResponsavel]<br/>
    -------------<br/><br/>
    <b>Nome do evento: </b>$data[nomeEvento]<br/>
    <b>Endere&ccedil;o: </b>$data[endereco]<br/>
    <b>Data do evento: </b>$data[data]<br/>
    <b>Hor&aacute;rio previsto de in&iacute;cio: </b>$data[horaInicio]<br/>
    <b>Hor&aacute;rio previsto de t&eacute;rmino: </b>$data[horaTermino]<br/>
    <b>Endere&ccedil;o eletr&ocirc;nico do evento: </b>$data[enderecoEletronico]<br/>
    <b>Objetivo do evento: </b>$data[objetivo]<br/>
    -------------<br/><br/>
    <b>Quantidade de m&uacute;sicas (ou tempo dispon&iacute;vel): </b>$data[tempoDeApresentacao]<br/>
    <b>Passagem de som: </b>$data[passagemDeSom]<br/>
    <b>Cronograma e onde a banda estar&aacute; encaixada: </b>$data[cronograma]<br/>
    -------------<br/><br/>
    <b>Estrutura dispon&iacute;vel no local</b><br/>
    Microfones? $data[microfonesQtd]<br/>
    Pedestais? $data[pedestaisQtd]<br/>
    Amplificador para baixo? $data[ampBaixo]<br/>
    Amplificador para guitarra? $data[ampGuitarra]<br/>
    Canal para teclado? $data[canalTeclado]<br/>
    Canal para viol&atilde;o? $data[canalViolao]<br/>
    Bateria (bumbo, tambores e estantes para pratos)? $data[bateria]<br/>
    Pratos para bateria? $data[pratosBateria]<br/>
    Caixa / tarol para bateria? $data[caixaBateria]<br/>
    Observa&ccedil;&otilde;es a respeito da estrutura de som? $data[obsEstrutura]";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers .= "From: $data[emailResponsavel]";
    mail($emailDestino, $assunto, $emailCorpoHTML, $headers);
  }

 ?>
