<?
    $frm['nomeEvento'] = $_POST['nomeEvento'];
    $frm['endereco'] = $_POST['endereco'];
    $frm['data'] = $_POST['data'];
    $frm['horaInicio'] = $_POST['horaInicio'];
    $frm['horaTermino'] = $_POST['horaTermino'];
    $frm['enderecoEletronico'] = $_POST['enderecoEletronico'];
    $frm['nomeResponsavel'] = $_POST['nomeResponsavel'];
    $frm['telResponsavel'] = $_POST['telResponsavel'];
    $frm['emailResponsavel'] = $_POST['emailResponsavel'];
    $frm['objetivo'] = $_POST['objetivo'];
    $frm['tempoDeApresentacao'] = $_POST['tempoDeApresentacao'];
    $frm['passagemDeSom'] = $_POST['passagemDeSom'];
    $frm['cronograma'] = $_POST['cronograma'];
    $frm['microfonesQtd'] = $_POST['microfonesQtd'];
    $frm['pedestaisQtd'] = $_POST['pedestaisQtd'];
    $frm['ampBaixo'] = $_POST['ampBaixo'];
    $frm['ampGuitarra'] = $_POST['ampGuitarra'];
    $frm['canalTeclado'] = $_POST['canalTeclado'];
    $frm['canalViolao'] = $_POST['canalViolao'];
    $frm['bateria'] = $_POST['bateria'];
    $frm['pratosBateria'] = $_POST['pratosBateria'];
    $frm['caixaBateria'] = $_POST['caixaBateria'];
    $frm['obsEstrutura'] = $_POST['obsEstrutura'];

    foreach ($frm as &$value) {
        if (empty($value) || is_null($value)) {
            $value = "N&atilde;o informado";
        }
    }

    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers .= "From: $frm[nomeResponsavel]<$frm[emailResponsavel]>";
    $BODY['EMAIL'] = "<b>Nome do evento: </b>$frm[nomeEvento]<br/>
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
    $m['Titulo_do_Email'] = "Convite - Distrito Alfa";
    $m['Email_Destino'] = "distritoalfa01@gmail.com";
    mail($m['Email_Destino'],$m['Titulo_do_Email'],$BODY['EMAIL'],"$headers");
    echo "<!DOCTYPE html>
      <html lang=\"pt-BR\">
			<head>
			</head>
			<body>
				<script>
					location.href=\"../../index.html#/agradecimentos\"
				</script>
			</body>
      </html>";
?>
