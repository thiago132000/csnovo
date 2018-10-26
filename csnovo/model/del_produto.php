<?php

require "../banco/conexao.php";

SESSION_START();

$codEx = htmlspecialchars($_GET['codEx']);
$paginaR = htmlspecialchars($_GET['paginaR']);

//gera um token com criptografia md5
$tokenUsuario = md5('seg' . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);

$nivelUser = $_SESSION['nivel'];

if ($_SESSION['donoDaSessao'] != $tokenUsuario && !isset($_SESSION['login']) && !isset($_SESSION['senha'])) {

	header("location: ../home.php");

	exit;

} else if ($nivelUser != 1) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Você não tem permissao para essa ação!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header("location: ../inicio");

} else {

	date_default_timezone_set('America/Sao_Paulo');

//busca nome do produto antes de excluir
	$confere = "SELECT * FROM produto WHERE id_prod=?";

	if (!$stmt = $conn->prepare($confere)) {
		die("Erro: " . $conn->erro);
	}

	$stmt->bind_param("i", $codEx);

	$stmt->execute();

	$result = $stmt->get_result();

	$busca = $result->fetch_assoc();

	$nomeProd = $busca['nome_prod'];

	$conn->close();
//fim da busca de nome

	require "../banco/conexao.php";

	$buscarEst = "SELECT * FROM estoque_prod WHERE id_prod=?";

	if (!$stmt = $conn->prepare($buscarEst)) {
		die("Erro: " . $conn->erro);
	}

	$stmt->bind_param("i", $codEx);

	$stmt->execute();

	$result = $stmt->get_result();

	if ($result->num_rows == 0) {

		mysqli_query($conn, "DELETE FROM produto WHERE id_prod='$codEx'");

		$conn->close();

		$acao = 'Deletou o produto ' . $nomeProd;
		$loginAlt = $_SESSION['login'];
		$momento = date('Y-m-d H:i:s');

		include '../includes/salvaHistorico.php';

		$alertA = 'alert-success bg-success text-white';
		$bordaA = 'border-success';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-up';
		$descA = 'Produto excluído com sucesso!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header("location: ../listagem_total_prod&pagina=" . $paginaR);

	} else {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Produto ainda consta em estoque!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header("location: ../listagem_total_prod&pagina=" . $paginaR);

	}

} //fim else sessao

?>



