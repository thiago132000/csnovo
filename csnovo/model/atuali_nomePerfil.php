<?php

SESSION_START();

date_default_timezone_set('America/Sao_Paulo');

$novoNome = htmlspecialchars($_POST['editarnome']);
$nomeAtual = $_SESSION['nome'];

if (empty($novoNome)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Novo nome em branco!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../perfil');

} else if ($novoNome === $nomeAtual) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Nome atual é igual ao nome digitado!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../perfil');

} else {

	require '../banco/conexao.php';

	$loginUser = $_SESSION['login'];

	$confere = "SELECT * FROM usuario WHERE login=?";

	if (!$stmt = $conn->prepare($confere)) {
		die("Erro: " . $conn->erro);
	}

	$stmt->bind_param("s", $loginUser);

	$stmt->execute();

	$result = $stmt->get_result();

	$row = $result->fetch_assoc();

	if (!$result->num_rows > 0) {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Usuário não encontrado!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../perfil');

	} else if (mysqli_query($conn, "UPDATE usuario SET nome='$novoNome' WHERE login='$loginUser'")) {

		$alertA = 'alert-success bg-success text-white';
		$bordaA = 'border-success';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-up';
		$descA = 'Nome alterado com sucesso!';

		unset($_SESSION['nome']);
		$_SESSION['nome'] = $novoNome;

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		$acao = 'O usuário ' . $row['nome'] . ' alterou seu próprio nome para ' . $novoNome;
		$loginAlt = $_SESSION['login'];
		$momento = date('Y-m-d H:i:s');

		include '../includes/salvaHistorico.php';

		header('location: ../perfil');

	}

}

$conn->close();

?>