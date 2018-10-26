<?php

//By Thiago.F :)

SESSION_START();

date_default_timezone_set('America/Sao_Paulo');

$cliente = htmlspecialchars($_POST['txtCliente']);
$telefone = htmlspecialchars($_POST['txtTelefone']);
$email = htmlspecialchars($_POST['txtEmail']);
$cpf = htmlspecialchars($_POST['txtCPF']);
@$cnpj = htmlspecialchars($_POST['txtCNPJ']);

$cliente = str_replace("'", "", $cliente);

if (empty($cliente)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Nome do cliente está em branco!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../cadastra_cliente');

} else if (empty($telefone)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Telefone do cliente está em branco!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../cadastra_cliente');

} else if (empty($email)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Email do cliente está em branco!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../cadastra_cliente');

}else {

	require '../banco/conexao.php';

	$stmt = $conn->prepare("INSERT INTO cliente (nome_cli, tel_cli, email_cli, cpf_cli, cnpj_cli) VALUES(?, ?, ?, ?, ?)");

	$stmt->bind_param("sssss", $cliente, $telefone, $email, $cpf, $cnpj);

	$stmt->execute();

	$conn->close();

	/*    salva historico      */

	$acao = 'Cadastrou um cliente com o nome ' . $cliente;
	$loginAlt = $_SESSION['login'];
	$momento = date('Y-m-d H:i:s');

	include '../includes/salvaHistorico.php';

	/*------------------------*/

	$alertA = 'alert-success bg-success text-white';
	$bordaA = 'border-success';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-up';
	$descA = 'Cliente cadastrado com sucesso!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../cadastra_cliente');

}

?>

