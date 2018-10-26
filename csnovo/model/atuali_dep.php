<?php

require '../banco/conexao.php';

SESSION_START();

date_default_timezone_set('America/Sao_Paulo');

$id = htmlspecialchars($_POST['txtId']);
$nome = htmlspecialchars($_POST['txtNome']);

//COMPARA OS CAMPOS PARA VER SE NAO ESTÃO EM BRANCO
if (empty($id) || empty($nome)) {

	//SE O ID CONSEGUIR PASSAR EM BRANCO COM CERTEZA TEM UMA FALHA DE SISTEMA
	if (empty($id)) {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Falha de sistema!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../inicio');

	} else if (empty($nome)) {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Descrição está em branco!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../listagem_total_dep');

	}

} else {

	$confere = "SELECT * FROM departamento WHERE id=?";

	if (!$stmt = $conn->prepare($confere)) {
		die("Erro: " . $conn->erro);
	}

	$stmt->bind_param("i", $id);

	$stmt->execute();

	$result = $stmt->get_result();

	if ($result->num_rows > 0) {

		$row = $result->fetch_assoc();

		if ($row['id'] == $id && $row['nome_dep'] == $nome) {

			$conn->close();

			$alertA = 'alert-primary bg-iconBlue2 text-white';
			$bordaA = 'border-iconBlue2';
			$textA = 'text-white';
			$iconA = 'fas fa-question-circle';
			$descA = 'Nenhuma alteração!';

			include '../includes/alerta.php';

			$_SESSION['msg'] = $alertaSess;

			header('location: ../listagem_total_dep');

		} else if (mysqli_query($conn, "UPDATE departamento SET nome_dep='$nome' WHERE id='$id'")) {

			$conn->close();

			/*    salva historico      */

			$acao = 'Alterou a descrição do departamento ' . $row['nome_dep'] . ' para ' . $nome;
			$loginAlt = $_SESSION['login'];
			$momento = date('Y-m-d H:i:s');

			include '../includes/salvaHistorico.php';

			/*------------------------*/

			$alertA = 'alert-success bg-success text-white';
			$bordaA = 'border-success';
			$textA = 'text-white';
			$iconA = 'far fa-thumbs-up';
			$descA = 'Departamento atualizado!';

			include '../includes/alerta.php';

			$_SESSION['msg'] = $alertaSess;

			header('location: ../listagem_total_dep');

		} else {
			$conn->close();
//ele entra aki se tem caracteres especiais

			$alertA = 'alert-danger bg-danger text-white';
			$bordaA = 'border-danger';
			$textA = 'text-white';
			$iconA = 'far fa-thumbs-down';
			$descA = 'Carácter Inválido!';

			include '../includes/alerta.php';

			$_SESSION['msg'] = $alertaSess;

			header('location: ../listagem_total_dep');

		}

	} else {
		$conn->close();

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Departamento não existe!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../listagem_total_dep');

	}

}

?>
