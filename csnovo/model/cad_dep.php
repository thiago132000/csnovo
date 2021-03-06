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
	$descA = 'Descrição do departamento está em branco!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../cadastra_dep');

} else {

	require '../banco/conexao.php';

	$stmt = $conn->prepare("INSERT INTO departamento (nome_dep) VALUES(?)");

	$stmt->bind_param("s", $nome);

	$stmt->execute();

	$conn->close();

	$acao = 'Cadastrou um departamento com a descrição ' . $nome;
	$loginAlt = $_SESSION['login'];
	$momento = date('Y-m-d H:i:s');

	include '../includes/salvaHistorico.php';

	$alertA = 'alert-success bg-success text-white';
	$bordaA = 'border-success';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-up';
	$descA = 'Departamento cadastrado com sucesso!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../cadastra_dep');

}

?>