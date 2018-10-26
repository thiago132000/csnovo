<?php

SESSION_START();

date_default_timezone_set('America/Sao_Paulo');

$nome = htmlspecialchars($_POST['txtNome']);

$nome = str_replace("'", "", $nome);

if (empty($nome)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Descrição do cargo está em branco!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../cadastra_mtp');

} else {

	require '../banco/conexao.php';

	$stmt = $conn->prepare("INSERT INTO cargo (desc_cargo) VALUES(?)");

	$stmt->bind_param("s", $nome);

	$stmt->execute();

	$conn->close();

	$acao = 'Cadastrou um cargo com a descrição ' . $nome;
	$loginAlt = $_SESSION['login'];
	$momento = date('Y-m-d H:i:s');

	include '../includes/salvaHistorico.php';

	$alertA = 'alert-success bg-success text-white';
	$bordaA = 'border-success';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-up';
	$descA = 'Cargo cadastrado com sucesso!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../cadastra_cargo');

}

?>