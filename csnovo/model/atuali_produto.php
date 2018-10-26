<?php

//By Thiago.F :)

SESSION_START();

require '../banco/conexao.php';

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
		$descA = 'Falha de sistema!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../listagem_total_prod');

	}

} else {

	$confere = "SELECT * FROM produto WHERE id_prod=?";

	if (!$stmt = $conn->prepare($confere)) {
		die("Erro: " . $conn->erro);
	}

	$stmt->bind_param("i", $id);

	$stmt->execute();

	$result = $stmt->get_result();

	if ($result->num_rows > 0) {

		$row = $result->fetch_assoc();

		if ($row['id_prod'] == $id && $row['nome_prod'] == $nome) {

			$conn->close();

			$alertA = 'alert-primary bg-iconBlue2 text-white';
			$bordaA = 'border-iconBlue2';
			$textA = 'text-white';
			$iconA = 'fas fa-question-circle';
			$descA = 'Nenhuma alteração!';

			include '../includes/alerta.php';

			$_SESSION['msg'] = $alertaSess;

			header('location: ../listagem_total_prod');

		} else if (mysqli_query($conn, "UPDATE produto SET nome_prod='$nome' WHERE id_prod='$id'")) {

			$conn->close();

			/*    salva historico      */

			$acao = 'Alterou o nome do produto ' . $row['nome_prod'] . ' para ' . $nome;
			$loginAlt = $_SESSION['login'];
			$momento = date('Y-m-d H:i:s');

			include '../includes/salvaHistorico.php';

			/*------------------------*/

			$alertA = 'alert-success bg-success text-white';
			$bordaA = 'border-success';
			$textA = 'text-white';
			$iconA = 'far fa-thumbs-up';
			$descA = 'Produto alterado com sucesso!';

			include '../includes/alerta.php';

			$_SESSION['msg'] = $alertaSess;

			header('location: ../listagem_total_prod');

		} else {
			$conn->close();
//ele entra aki se tem caracteres especiais

			$alertA = 'alert-danger bg-danger text-white';
			$bordaA = 'border-danger';
			$textA = 'text-white';
			$iconA = 'far fa-thumbs-down';
			$descA = 'Carácter inválido!';

			include '../includes/alerta.php';

			$_SESSION['msg'] = $alertaSess;

			header('location: ../listagem_total_prod');

		}

	} else {

		$conn->close();

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Produto não existe!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../listagem_total_prod');

	}

}

?>
