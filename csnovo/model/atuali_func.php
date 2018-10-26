<?php

SESSION_START();

date_default_timezone_set('America/Sao_Paulo');

$id = htmlspecialchars($_POST['txtId']);
$nome = htmlspecialchars($_POST['txtNome']);
$end = htmlspecialchars($_POST['txtEnd']);
$tel = htmlspecialchars($_POST['txtTel']);
$email = htmlspecialchars($_POST['txtEmail']);
$id_cargo = htmlspecialchars($_POST['selCargo']);
$salario = htmlspecialchars($_POST['txtSal']);
$data_entrada = htmlspecialchars($_POST['txtdataEn']);
$escala = htmlspecialchars($_POST['selEs']);
$id_login = htmlspecialchars($_POST['selLogin']);
$turno = htmlspecialchars($_POST['selT']);
$cpf = htmlspecialchars($_POST['txtcpf']);
$dep = htmlspecialchars($_POST['selDep']);

$id = str_replace("'", "", $id);
$nome = str_replace("'", "", $nome);
$end = str_replace("'", "", $end);
$tel = str_replace("'", "", $tel);
$email = str_replace("'", "", $email);
$id_cargo = str_replace("'", "", $id_cargo);
$salario = str_replace("'", "", $salario);
$data_entrada = str_replace("'", "", $data_entrada);
$escala = str_replace("'", "", $escala);
$id_login = str_replace("'", "", $id_login);
$turno = str_replace("'", "", $turno);
$cpf = str_replace("'", "", $cpf);
$dep = str_replace("'", "", $dep);

$salario = (float) $salario;

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
	$descA = 'Nome do funcionário está em branco!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../listagem_total_func');

} else if (empty($end)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Endereço do funcionário está em branco!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../listagem_total_func');

} else if (empty($tel)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Telefone do funcionário está em branco!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../listagem_total_func');

} else if (empty($email)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Email do funcionário está em branco!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../listagem_total_func');

} else if (empty($id_cargo)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Selecione o cargo do funcionário!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../listagem_total_func');

} else if (empty($salario)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Salário do funcionário está em branco!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../listagem_total_func');

} else if (empty($data_entrada)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Data de entrada está em branco!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../listagem_total_func');

} else if (empty($escala)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Escala do funcionário está em branco!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../listagem_total_func');

} else if (empty($id_login)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Selecione o login do funcionário!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../listagem_total_func');

} else if (empty($cpf)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'CPF do funcionário está em branco!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../listagem_total_func');

} else if (empty($turno)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Selecione o turno do funcionário!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../listagem_total_func');

} else if (empty($dep)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Selecione o departamento do funcionário!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../listagem_total_func');

} else {

	require '../banco/conexao.php';

	$confere = "SELECT * FROM funcionario WHERE id_func=?";

	if (!$stmt = $conn->prepare($confere)) {
		die("Erro: " . $conn->erro);
	}

	$stmt->bind_param("i", $id);

	$stmt->execute();

	$result = $stmt->get_result();

	if ($result->num_rows > 0) {

		$row = $result->fetch_assoc();

		if ($row['id_func'] == $id && $row['nome_func'] == $nome && $row['end_func'] == $end && $row['tel_func'] == $tel && $row['email_func'] == $email && $row['id_cargo'] == $id_cargo && $row['salario'] == $salario && $row['data_entrada'] == $data_entrada && $row['turno'] == $turno && $row['escala'] == $escala && $row['id_login'] == $id_login && $row['cpf_func'] == $cpf && $row['departamento'] == $dep) {

			$conn->close();

			$alertA = 'alert-primary bg-iconBlue2 text-white';
			$bordaA = 'border-iconBlue2';
			$textA = 'text-white';
			$iconA = 'fas fa-question-circle';
			$descA = 'Nenhuma alteração!';

			include '../includes/alerta.php';

			$_SESSION['msg'] = $alertaSess;

			header('location: ../listagem_total_func');

		} else if (mysqli_query($conn, "UPDATE funcionario SET nome_func='$nome', end_func='$end', tel_func='$tel', email_func='$email', id_cargo='$id_cargo', salario='$salario', data_entrada='$data_entrada', turno='$turno', escala='$escala', id_login='$id_login',  cpf_func='$cpf', departamento='$dep' WHERE id_func='$id'")) {

			$conn->close();

			/*    salva historico      */

			$acao = 'Alterou o funcionário ' . $nome . ' - CPF: ' . $cpf;
			$loginAlt = $_SESSION['login'];
			$momento = date('Y-m-d H:i:s');

			include '../includes/salvaHistorico.php';

			/*------------------------*/

			$alertA = 'alert-success bg-success text-white';
			$bordaA = 'border-success';
			$textA = 'text-white';
			$iconA = 'far fa-thumbs-up';
			$descA = 'Funcionário atualizado com sucesso!';

			include '../includes/alerta.php';

			$_SESSION['msg'] = $alertaSess;

			header('location: ../listagem_total_func');

		} else {

			$conn->close();

			$alertA = 'alert-danger bg-danger text-white';
			$bordaA = 'border-danger';
			$textA = 'text-white';
			$iconA = 'far fa-thumbs-down';
			$descA = 'Carácter inválido!';

			include '../includes/alerta.php';

			$_SESSION['msg'] = $alertaSess;

			header('location: ../listagem_total_func');

		}

	} //fim else row
	else {

		$conn->close();

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Funcionário não existe!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../listagem_total_func');

	}

}

?>