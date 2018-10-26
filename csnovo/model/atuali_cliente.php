<?php

//By Thiago.F :)

SESSION_START();

require '../banco/conexao.php';

date_default_timezone_set('America/Sao_Paulo');

$id = htmlspecialchars($_POST['txtId']);
$nome = htmlspecialchars($_POST['txtCliente']);
$telefone = htmlspecialchars($_POST['txtTelefone']);
$email = htmlspecialchars($_POST['txtEmail']);
$cpf = htmlspecialchars($_POST['txtCPF']);
$cnpj = htmlspecialchars($_POST['txtCNPJ']);

$nome = str_replace("'", "", $nome);

if (empty($id) || empty($nome) || empty($telefone) || empty($email) || empty($cpf)) {

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
		$descA = 'Nome do cliente está em branco!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../listagem_total_cliente');

	} else if (empty($telefone)) {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Telefone do cliente está em branco!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../listagem_total_cliente');

	} else if (empty($email)) {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Email do cliente está em branco!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../listagem_total_cliente');

	} else if (empty($cpf)) {

		$alertA = 'alert-danger bg-danger text-danger';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Cpf do cliente está em branco!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../listagem_total_cliente');

	}

} else {

	$confere = "SELECT * FROM cliente WHERE id_cli=?";

	if (!$stmt = $conn->prepare($confere)) {
		die("Erro: " . $conn->erro);
	}

	$stmt->bind_param("i", $id);

	$stmt->execute();

	$result = $stmt->get_result();

	if ($result->num_rows > 0) {

		$row = $result->fetch_assoc();

		if ($row['id_cli'] == $id && $row['nome_cli'] == $nome && $row['tel_cli'] == $telefone && $row['email_cli'] == $email && $row['cpf_cli'] == $cpf && $row['cnpj_cli'] == $cnpj) {

			$conn->close();

			$alertA = 'alert-primary bg-iconBlue2 text-white';
			$bordaA = 'border-iconBlue2';
			$textA = 'text-white';
			$iconA = 'fas fa-question-circle';
			$descA = 'Nenhuma alteração!';

			include '../includes/alerta.php';

			$_SESSION['msg'] = $alertaSess;

			header('location: ../listagem_total_cliente');

		} else if (mysqli_query($conn, "UPDATE cliente SET nome_cli='$nome', tel_cli='$telefone', email_cli='$email', cpf_cli='$cpf', cnpj_cli='$cnpj' WHERE id_cli='$id'")) {

			$conn->close();

			/*    salva historico      */

			$acao = 'Alterou o cliente ' . $nome . ' - CPF: ' . $cpf;
			$loginAlt = $_SESSION['login'];
			$momento = date('Y-m-d H:i:s');

			include '../includes/salvaHistorico.php';

			$alertA = 'alert-success bg-success text-white';
			$bordaA = 'border-success';
			$textA = 'text-white';
			$iconA = 'far fa-thumbs-up';
			$descA = 'Cliente alterado com sucesso!';

			include '../includes/alerta.php';

			$_SESSION['msg'] = $alertaSess;

			header('location: ../listagem_total_cliente');

		} else {

			$conn->close();

			$alertA = 'alert-danger bg-danger text-white';
			$bordaA = 'border-danger';
			$textA = 'text-white';
			$iconA = 'far fa-thumbs-down';
			$descA = 'Carácter inválido!';

			include '../includes/alerta.php';

			$_SESSION['msg'] = $alertaSess;

			header('location: ../listagem_total_cliente');

		}

	} else {

		$conn->close();

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Cliente não existe!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../listagem_total_cliente');

	}

}

?>
