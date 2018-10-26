<?php

SESSION_START();

date_default_timezone_set('America/Sao_Paulo');

$nome_func = htmlspecialchars($_POST['txtNome']);
$end_func = htmlspecialchars($_POST['txtEnd']);
$tel_func = htmlspecialchars($_POST['txtTel']);
$email_func = htmlspecialchars($_POST['txtEmail']);
$id_cargo = htmlspecialchars($_POST['selCargo']);
$salario = htmlspecialchars($_POST['txtSal']);
$data_entrada = htmlspecialchars($_POST['txtdataEn']);
$escala = htmlspecialchars($_POST['selEs']);
$id_login = htmlspecialchars($_POST['selLogin']);
$cpf_func = htmlspecialchars($_POST['txtcpf']);
$turno = htmlspecialchars($_POST['selT']);
$departamento = htmlspecialchars($_POST['selDep']);

$salario = number_format($salario, 2, ',', '');

if (empty($nome_func)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Nome do funcionário está em branco!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../cadastra_func');

} else if (empty($end_func)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Endereço do funcionário está em branco!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../cadastra_func');

} else if (empty($tel_func)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Telefone do funcionário está em branco!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../cadastra_func');

} else if (empty($email_func)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Email do funcionário está em branco!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../cadastra_func');

} else if (empty($id_cargo)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Selecione o cargo do funcionário!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../cadastra_func');

} else if (empty($salario)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Salário do funcionário está em branco!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../cadastra_func');

} else if (empty($data_entrada)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Data de entrada do funcionário está em branco!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../cadastra_func');

} else if (empty($escala)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Escala do funcionário está em branco!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../cadastra_func');

} else if (empty($id_login)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Selecione o login do funcionário!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../cadastra_func');

} else if (empty($cpf_func)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Cpf do funcionário está em branco!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../cadastra_func');

} else if (empty($turno)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Selecione o turno do funcionário!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../cadastra_func');

} else if (empty($departamento)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Selecione o departamento do funcionário!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../cadastra_func');

} else {
	require '../banco/conexao.php';

	$stmt = $conn->prepare("INSERT INTO funcionario(nome_func, end_func, tel_func, email_func, id_cargo, salario, data_entrada ,escala ,id_login, turno, cpf_func, departamento) VALUES(?, ?, ?, ?, ?, ?, ?,?,?,?,?,?)");

	$stmt->bind_param("ssssidsiiisi", $nome_func, $end_func, $tel_func, $email_func, $id_cargo, $salario, $data_entrada, $escala, $id_login, $turno, $cpf_func, $departamento);

	$stmt->execute();

	$conn->close();

	$acao = 'Cadastrou um funcionário com o nome ' . $nome_func;
	$loginAlt = $_SESSION['login'];
	$momento = date('Y-m-d H:i:s');

	include '../includes/salvaHistorico.php';

	$alertA = 'alert-success bg-success text-white';
	$bordaA = 'border-success';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-up';
	$descA = 'Funcionário cadastrado com sucesso!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../cadastra_func');

}

?>
