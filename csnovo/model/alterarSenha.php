<?php

SESSION_START();

date_default_timezone_set('America/Sao_Paulo');

$senhaAtual = htmlspecialchars($_POST['txtSenhaAtual']);
$novaSenha = htmlspecialchars($_POST['txtNovaSenha']);
$novaSenha2 = htmlspecialchars($_POST['txtNovaSenha2']);

$loginUser = $_SESSION['login'];
$nome_usu = $_SESSION['nome'];
$senha_sess = $_SESSION['senha'];

//$loginUser = strval($loginUser);

if (empty($senhaAtual)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Senha atual em branco!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../perfil');

} else if (empty($novaSenha)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Nova senha em branco!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../perfil');

} else if (empty($novaSenha2)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Digite novamente a sua senha!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../perfil');

} else if ($novaSenha !== $novaSenha2) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'As senhas não são iguais!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../perfil');

	//return false;

} else {

	require '../banco/conexao.php';

	$confere = "SELECT * FROM usuario WHERE login=?";

	if (!$stmt = $conn->prepare($confere)) {
		die("Erro: " . $conn->erro);
	}

	$stmt->bind_param("s", $loginUser);

	$stmt->execute();

	$result = $stmt->get_result();

	if (!$result->num_rows == 0) {

		while ($row = $result->fetch_assoc()) {

			$hash = is_null($hash);

			$hash = $row['senha'];

			$id = $row['id'];

			$opcoes = ['cost' => 8];
			$novaSenha = password_hash($novaSenha, PASSWORD_BCRYPT, $opcoes);

			if (password_verify($senhaAtual, $hash)) {

				if ($senhaAtual === $novaSenha2) {

					$alertA = 'alert-danger bg-danger text-white';
					$bordaA = 'border-danger';
					$textA = 'text-white';
					$iconA = 'far fa-thumbs-down';
					$descA = 'Senha atual é a mesma senha digitada!';

					include '../includes/alerta.php';

					$_SESSION['msg'] = $alertaSess;

					header('location: ../perfil');

					return false;

				} else if (mysqli_query($conn, "UPDATE usuario SET senha='$novaSenha' WHERE id='$id'")) {

					$senhaAtual = "";

					$conn->close();

					/*    salva historico      */

					$acao = 'O usuário ' . $nome_usu . ' alterou sua própria senha';
					$loginAlt = $_SESSION['login'];
					$momento = date('Y-m-d H:i:s');

					include '../includes/salvaHistorico.php';

					header('location: ../sair?sairSenha');

					return false;

				} else {

					$conn->close();

					$alertA = 'alert-danger bg-danger text-white';
					$bordaA = 'border-danger';
					$textA = 'text-danger';
					$iconA = 'far fa-thumbs-down';
					$descA = 'Ocorreu um erro!';

					include '../includes/alerta.php';

					$_SESSION['msg'] = $alertaSess;

					header('location: ../perfil');

					return false;

				}

			} else {

				$conn->close();

				$alertA = 'alert-danger bg-danger text-white';
				$bordaA = 'border-danger';
				$textA = 'text-white';
				$iconA = 'far fa-thumbs-down';
				$descA = 'Senha atual incorreta!';

				include '../includes/alerta.php';

				$_SESSION['msg'] = $alertaSess;

				header('location: ../perfil');

				return false;

			}
		}

	} else {

		$conn->close();

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Erro!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../perfil');

		return false;

	}

}

?>

