<?php
	if(empty($_REQUEST['name']) || empty($_REQUEST['email']) || empty($_REQUEST['subject']) || empty($_REQUEST['message']))
	{
		header('Location: index.html');
		exit();
	}

	
	$to = "salatielgui93@gmail.com, nortsol@hotmail.com"; //e-mail de destino da mensagem
	
    $from = "Pedido de Orçamento - NortSol <contato@portalnortsol.com.br>"; //e-mail que vai enviar a mensagem
	
	//salvando entrada em variaveis
	$email = $_REQUEST['email'];
	$name = $_REQUEST['name'];
    $subject = $_REQUEST['subject'];
    $message = $_REQUEST['message'];

	//cabeçalho do email
    $headers = "From: $from";
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=utf-8\r\n";

	$body = "<!DOCTYPE html>
			<html lang='pt-br'>
			<head>
				<meta charset='UTF-8'>
			</head>
			<body>
				<table style='width: 100%;'>
						<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>
							<a href=''><img src='' alt=''></a><br><br>
					</td></tr></thead>
					<tbody>
						<tr>
							<td style='border:none;'><strong>Name:</strong>{$name}</td>
							<td style='border:none;'><strong>Email:</strong>{$email}</td>	
						</tr>
						<tr>
							<td></td>
						</tr>
						<tr>
							<td colspan='2' style='border:none;'>{$message}</td>
						</tr>
					</tbody>
				</table>
			</body>
			</html>";

	$send = mail($to, $subject, $body, $headers);
	
	header('Location: index.html');
	exit();

?>