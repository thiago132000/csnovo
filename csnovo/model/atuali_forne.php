<?php

//By Duas toca

SESSION_START();

date_default_timezone_set('America/Sao_Paulo');

$id = htmlspecialchars($_POST['txtId']);
$nome = htmlspecialchars($_POST['txtNomeF']);
$tel = htmlspecialchars($_POST['txtTel']);
$email = htmlspecialchars($_POST['txtEmail']);
$cnpj = htmlspecialchars($_POST['txtCNPJF']);
$data = htmlspecialchars($_POST['txtDataF']);

$id = str_replace("'", "", $id);
$nome = str_replace("'", "", $nome);
$tel = str_replace("'", "", $tel);
$email = str_replace("'", "", $email);
$cnpj = str_replace("'", "", $cnpj);

$data = str_replace("'", "", $data);
$data = str_replace(",", "", $data);
$data = str_replace(".", "", $data);

if (empty($id) || empty($nome) || empty($tel) || empty($email) || empty($cnpj) || empty($data)) {

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
		$descA = 'Nome do fornecedor está em branco!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../listagem_total_forne');

	} else if (empty($tel)) {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Telefone do fornecedor está em branco!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../listagem_total_forne');

	} else if (empty($email)) {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Email do fornecedor está em branco!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../listagem_total_forne');

	} else if (empty($cnpj)) {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'CNPJ do fornecedor está em branco!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../listagem_total_forne');

	} else if (empty($data)) {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Data de cadastro está em branco!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../listagem_total_forne');

	}

} else {

	require '../banco/conexao.php';

	$confere = "SELECT * FROM fornecedor WHERE id_for=?";

	if (!$stmt = $conn->prepare($confere)) {
		die("Erro: " . $conn->erro);
	}

	$stmt->bind_param("i", $id);

	$stmt->execute();

	$result = $stmt->get_result();

	if ($result->num_rows > 0) {

		$row = $result->fetch_assoc();

		if ($row['id_for'] == $id && $row['nome_for'] == $nome && $row['tel_for'] == $tel && $row['email_for'] == $email && $row['cnpj_for'] == $cnpj && $row['data_cad'] == $data) {

			$conn->close();

			$alertA = 'alert-primary bg-iconBlue2 text-white';
			$bordaA = 'border-iconBlue2';
			$textA = 'text-white';
			$iconA = 'fas fa-question-circle';
			$descA = 'Nenhuma alteração!';

			include '../includes/alerta.php';

			$_SESSION['msg'] = $alertaSess;

			header('location: ../listagem_total_forne');

		} //fim else que compara se os campos sçao iguais
		else if (mysqli_query($conn, "UPDATE fornecedor SET nome_for='$nome', tel_for='$tel', email_for='$email', cnpj_for='$cnpj', data_cad='$data' WHERE id_for='$id'")) {

			$conn->close();

			/*    salva historico      */

			$acao = 'Alterou o fornecedor ' . $nome . ' - CNPJ: ' . $cnpj;
			$loginAlt = $_SESSION['login'];
			$momento = date('Y-m-d H:i:s');

			include '../includes/salvaHistorico.php';

			/*------------------------*/

			$alertA = 'alert-success bg-success text-white';
			$bordaA = 'border-success';
			$textA = 'text-white';
			$iconA = 'far fa-thumbs-up';
			$descA = 'Fornecedor alterado com sucesso!';

			include '../includes/alerta.php';

			$_SESSION['msg'] = $alertaSess;

			header('location: ../listagem_total_forne');

		} //fim else if que atualiza os dados
		else {

			$conn->close();

			$alertA = 'alert-danger bg-danger text-white';
			$bordaA = 'border-danger';
			$textA = 'text-white';
			$iconA = 'far fa-thumbs-down';
			$descA = 'Carácter inválido!';

			include '../includes/alerta.php';

			$_SESSION['msg'] = $alertaSess;

			header('location: ../listagem_total_forne');

		}

	} //fim if se achar linhas no banco
	else {

		$conn->close();

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Fornecedor não existe!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../listagem_total_forne');

	}

}

?>