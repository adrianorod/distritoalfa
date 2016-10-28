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
    $frm['passagemDeSom'] = $_POST['passagemDeSom'];
    $frm['tempoDeApresentacao'] = $_POST['tempoDeApresentacao'];
    $frm['cronograma'] = $_POST['cronograma'];
    $frm['estrutura'] = $_POST['estrutura'];

    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers .= "From: $frm[emailResponsavel]<$frm[nomeResponsavel]>";
    $BODY['EMAIL'] = "<b>Nome do evento: </b>$frm[nomeEvento]<br/>
        <b>Endereco: </b>$frm[endereco]<br/>
        <b>Data do evento: </b>$frm[data]<br/>
        <b>Horario previsto de inicio: </b>$frm[horaInicio]<br/>
        <b>Horario previsto de termino: </b>$frm[horaTermino]<br/>
        <b>Endereco eletronico do evento: </b>$frm[enderecoEletronico]<br/>
        <b>Nome do responsavel: </b>$frm[nomeResponsavel]<br/>
        <b>Telefone do responsavel: </b>$frm[telResponsavel]<br/>
        <b>E-mail do responsavel: </b>$frm[emailResponsavel]<br/>
        <b>Objetivo do evento: </b>$frm[objetivo]<br/>
        <b>Passagem de som: </b>$frm[passagemDeSom]<br/>
        <b>Quantidade de m&uacute;sicas (ou tempo dispon&iacute;vel): </b>$frm[tempoDeApresentacao]<br/>
        <b>Cronograma e onde a banda estara encaixada: </b>$frm[cronograma]<br/>
        <b>Estrutura disponivel no local: </b>$frm[estrutura]";
    $m['Titulo_do_Email'] = "Convite - Distrito Alfa";
    $m['Email_Destino'] = "adrianoazevedo.r@gmail.com";
    mail($m['Email_Destino'],$m['Titulo_do_Email'],$BODY['EMAIL'],"$headers");
    echo "<!DOCTYPE html>
        <html lang=\"pt-BR\">
			<head>
			</head>
			<body>
				<script>
					alert(\"Agradecemos desde ja pelo convite! Sua mensagem foi enviada com sucesso, brevemente retornaremos o contato.\");
					window.location=\"../index.html\";
				</script>
			</body>
        </html>";
?>