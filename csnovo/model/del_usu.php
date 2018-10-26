<?php

require "../banco/conexao.php";

SESSION_START();

$excluir = htmlspecialchars($_GET['codEx']);
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

//busca nome do usuario antes de excluir
	$confere = "SELECT * FROM usuario WHERE id=?";

	if (!$stmt = $conn->prepare($confere)) {
		die("Erro: " . $conn->erro);
	}

	$stmt->bind_param("i", $excluir);

	$stmt->execute();

	$result = $stmt->get_result();

	$busca = $result->fetch_assoc();

	$nomeUsu = $busca['nome'];

	$conn->close();
//fim da busca de nome

	require "../banco/conexao.php";

	mysqli_query($conn, "DELETE FROM usuario WHERE id='$excluir'");

	$conn->close();

	$acao = 'Deletou o usuário ' . $nomeUsu;
	$loginAlt = $_SESSION['login'];
	$momento = date('Y-m-d H:i:s');

	include '../includes/salvaHistorico.php';

	if ($_SESSION['nome'] === $nomeUsu) {

		SESSION_DESTROY();

		echo "<script type='text/javascript'>window.location.replace('../home.php');</script>";

	}

	$alertA = 'alert-success bg-success text-white';
	$bordaA = 'border-success';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-up';
	$descA = 'Usuário excluído com sucesso!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header("location: ../listagem_total_usu&pagina=" . $paginaR);

} //fim else sessao

?>
