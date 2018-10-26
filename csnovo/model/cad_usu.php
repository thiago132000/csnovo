<?php

SESSION_START();

date_default_timezone_set('America/Sao_Paulo');

$nome_usu = htmlspecialchars($_POST['txtNome']);
$nivel_usu = htmlspecialchars($_POST['selNivel']);
$login_usu = htmlspecialchars($_POST['txtLogin']);
$senha_usu = htmlspecialchars($_POST['txtSenha']);

$nivel_usu = (float) $nivel_usu;

if (empty($nome_usu)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Nome do usuário está em branco!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../cadastra_usuario');

} else if ($nivel_usu == 0 || empty($nivel_usu)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Selecione o nível do usuário!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../cadastra_usuario');

} else if (empty($login_usu)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Login do usuário está em branco!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../cadastra_usuario');

} else if (empty($senha_usu)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Senha do usuário está em branco!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../cadastra_usuario');

} else {

	require '../banco/conexao.php';

	//buscar para ver se ja existe o login

	$buscaLog = "SELECT * FROM usuario WHERE login=?";

	if (!$stmt = $conn->prepare($buscaLog)) {

		die("Erro: " . $conn->error);

	}

	$stmt->bind_param("s", $login_usu);

	$stmt->execute();

	$result = $stmt->get_result();

	if ($result->num_rows < 1) {

		$conn->close();

		//fim buscar login

		require '../banco/conexao.php';

		//criptografia da senha
		$opcoes = ['cost' => 8];
		$senha_usu = password_hash($senha_usu, PASSWORD_BCRYPT, $opcoes);

		$inserir = ("INSERT INTO usuario (nome, login, senha, nivel) VALUES(?, ?, ?, ?)");

		if (!$stmt = $conn->prepare($inserir)) {

			die("Erro de inserção: " . $conn->error);

		}

		$stmt->bind_param("sssi", $nome_usu, $login_usu, $senha_usu, $nivel_usu);

		$stmt->execute();

		$conn->close();

		$acao = 'Cadastrou um usuário com o nome ' . $nome_usu;
		$loginAlt = $_SESSION['login'];
		$momento = date('Y-m-d H:i:s');

		include '../includes/salvaHistorico.php';

		$alertA = 'alert-success bg-success text-white';
		$bordaA = 'border-success';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-up';
		$descA = 'Usuário cadastrado com sucesso!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../cadastra_usuario');

	} else {

		$conn->close();

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Login digitado já existe!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../cadastra_usuario');

	}

}

?>
