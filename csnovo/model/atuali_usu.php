<?php

SESSION_START();

date_default_timezone_set('America/Sao_Paulo');

$id = htmlspecialchars($_POST['txtId']);
$nome_usu = htmlspecialchars($_POST['txtNome']);
$nivel_usu = htmlspecialchars($_POST['selNivel']);

$nivel_usu = (float) $nivel_usu;

if (empty($id)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Falha de sistema!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../inicio');

} else if (empty($nome_usu)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Nome do usuário está em branco!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../listagem_total_usu');

} else if ($nivel_usu == 0 || empty($nivel_usu)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Nível de usuário inválido!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../listagem_total_usu');

} else {

	require '../banco/conexao.php';

	$confere = "SELECT * FROM usuario WHERE id=?";

	if (!$stmt = $conn->prepare($confere)) {
		die("Erro: " . $conn->erro);
	}

	$stmt->bind_param("i", $id);

	$stmt->execute();

	$result = $stmt->get_result();

	if ($result->num_rows > 0) {

		$row = $result->fetch_assoc();

		if ($row['id'] == $id && $row['nome'] == $nome_usu && $row['nivel'] == $nivel_usu) {

			$conn->close();

			$alertA = 'alert-primary bg-iconBlue2 text-white';
			$bordaA = 'border-iconBlue2';
			$textA = 'text-white';
			$iconA = 'fas fa-question-circle';
			$descA = 'Nenhuma alteração!';

			include '../includes/alerta.php';

			$_SESSION['msg'] = $alertaSess;

			header('location: ../listagem_total_usu');

		} else if (mysqli_query($conn, "UPDATE usuario SET nome='$nome_usu', nivel='$nivel_usu' WHERE id='$id'")) {

			if ($row['login'] == $_SESSION['login']) {

				$_SESSION['nivel'] = $nivel_usu;

				$acao = 'Alterou o próprio login';
				$loginAlt = $_SESSION['login'];
				$momento = date('Y-m-d H:i:s');

				include '../includes/salvaHistorico.php';

				header('location: ../sair?sair');

				return false;

			}

			$conn->close();

			/*    salva historico      */

			$acao = 'Alterou o usuario ' . $nome_usu;
			$loginAlt = $_SESSION['login'];
			$momento = date('Y-m-d H:i:s');

			include '../includes/salvaHistorico.php';

			/*------------------------*/

			$alertA = 'alert-success bg-success text-white';
			$bordaA = 'border-success';
			$textA = 'text-white';
			$iconA = 'far fa-thumbs-up';
			$descA = 'Usuário alterado com sucesso!';

			include '../includes/alerta.php';

			$_SESSION['msg'] = $alertaSess;

			header('location: ../listagem_total_usu');

		} else {

			$conn->close();

			$alertA = 'alert-danger bg-danger text-white';
			$bordaA = 'border-danger';
			$textA = 'text-white';
			$iconA = 'far fa-thumbs-down';
			$descA = 'Carácter inválido!';

			include '../includes/alerta.php';

			$_SESSION['msg'] = $alertaSess;

			header('location: ../listagem_total_usu');

		}

	} else {

		$conn->close();

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Usuário não existe!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../listagem_total_usu');

	}

}

?>