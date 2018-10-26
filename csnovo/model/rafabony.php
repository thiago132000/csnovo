<?php //configurações

SESSION_START();

require '../banco/conexao.php';

$tema = htmlspecialchars($_POST['selTema']);
$paginaOld = htmlspecialchars($_POST['paginaOld']);

if (empty($tema) || $tema == '0') {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Selecione algum tema altes de salvar!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../' . $paginaOld);

	return false;
}

if ($tema === $_SESSION['tema']) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Selecione um tema diferente do atual!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../' . $paginaOld);

	return false;

}

SESSION_START();

$login = $_SESSION['login'];

if (mysqli_query($conn, "UPDATE usuario SET tema='$tema' WHERE login='$login'")) {

	$alertA = 'alert-success bg-success text-white';
	$bordaA = 'border-success';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-up';
	$descA = 'Tema alterado com sucesso!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	unset($_SESSION['tema']);
	$_SESSION['tema'] = $tema;

	header('location: ../' . $paginaOld);

}

?>

