<?php

//Duas toca

SESSION_START();

date_default_timezone_set('America/Sao_Paulo');

$nome = htmlspecialchars($_POST['txtNomeF']);
$tel = htmlspecialchars($_POST['txtTel']);
$email = htmlspecialchars($_POST['txtEmail']);
$cnpj = htmlspecialchars($_POST['txtCNPJF']);
$data = htmlspecialchars($_POST['txtDataF']);

$nome = str_replace("'", "", $nome);
$tel = str_replace("'", "", $tel);
$email = str_replace("'", "", $email);
$cnpj = str_replace("'", "", $cnpj);

$data = str_replace("'", "", $data);
$data = str_replace(",", "", $data);
$data = str_replace(".", "", $data);

//$data = date_parse($data);

if ($nome == "") {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Nome do fornecedor está em branco!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../cadastra_forne');

} else if ($tel == "") {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Telefone do fornecedor está em branco!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../cadastra_forne');

} else if ($email == "") {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Email do fornecedor está em branco!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../cadastra_forne');

} else if ($cnpj == "") {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Cnpj do fornecedor está em branco!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../cadastra_forne');

} else if ($data == "") {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Data de cadastro do fornecedor está em branco!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../cadastra_forne');

} else {

	require '../banco/conexao.php';

	$stmt = $conn->prepare("INSERT INTO fornecedor (nome_for, tel_for, email_for, cnpj_for, data_cad) VALUES(?, ?, ?, ?, ?)");

	$stmt->bind_param("sssss", $nome, $tel, $email, $cnpj, $data);

	$stmt->execute();

	$conn->close();

	$acao = 'Cadastrou um fornecedor com o nome ' . $nome;
	$loginAlt = $_SESSION['login'];
	$momento = date('Y-m-d H:i:s');

	include '../includes/salvaHistorico.php';

	$alertA = 'alert-success bg-success text-white';
	$bordaA = 'border-success';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-up';
	$descA = 'Fornecedor cadastrado com sucesso!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../cadastra_forne');

}

?>