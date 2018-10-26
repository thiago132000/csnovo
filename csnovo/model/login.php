<?php

header('Content-Type:' . "text/plain");

require '../banco/conexao.php';

if (strcasecmp('formulario-ajax', $_POST['metodo']) == 0) {

	$user = htmlspecialchars($_POST['login']);
	$passwd = htmlspecialchars($_POST['senha']);

	if (empty($user) && empty($passwd)) {

		echo "2";

		return false;
	}

	$entrar = "SELECT * FROM usuario WHERE login=?";

	if (!$stmt = $conn->prepare($entrar)) {

		//para o programa
		die("Erro: " . $conn->erro);

	}

	$stmt->bind_param("s", $user);

	$stmt->execute();

// a linha abaixo busca o usuario e retorna pelo campo login
	$result = $stmt->get_result();

	if (!$result->num_rows == 0) {

		while ($row = $result->fetch_assoc()) {

			$hash = $row['senha'];

			$nameUser = $row['nome'];

			$temaUser = $row['tema'];

			$userNv = $row['nivel'];

			if (password_verify($passwd, $hash) && $row['deletado'] !== '1') {

				session_cache_limiter('private');

				session_cache_expire(10);

				SESSION_START();

				$_SESSION['login'] = $user;
				$_SESSION['senha'] = $passwd;
				$_SESSION['nome'] = $nameUser;
				$_SESSION['tema'] = $temaUser;
				$_SESSION['nivel'] = $userNv;
				$_SESSION['donoDaSessao'] = md5('seg' . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);

				$alertA = 'alert-success bg-success text-white';
				$bordaA = 'border-success';
				$textA = 'text-white';
				$iconA = 'far fa-thumbs-up';
				$descA = $nameUser . ', seja bem-vindo(a)!';

				include '../includes/alerta.php';

				$_SESSION['msg'] = $alertaSess;

				//header('location: menu.php');

				echo "1";

			} else {

				//echo "<script>alert('Senha inválida!!!');window.location.href='index.php';</script>";

				return false;

			}

		}

	} else {

		//echo "<script>alert('Verifique se o usuário está correto!');window.location.href='index.php';</script>";
		echo "3";
		return false;

	}

}

?>