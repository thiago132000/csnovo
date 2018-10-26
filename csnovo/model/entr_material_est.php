<?php

SESSION_START();

date_default_timezone_set('America/Sao_Paulo');

//as linhas abaixo são as variaveis que resgatam as informações recebidas do usuario.
$material = htmlspecialchars($_POST['selMat']);
$fornecedor = htmlspecialchars($_POST['selFor']);
$qtdEst = htmlspecialchars($_POST['txtQtdEntradaEstMat']);
$valorCompra = htmlspecialchars($_POST['txtValorCompra']);
$valorTotal = htmlspecialchars($_POST['total']);

// a linha abaixo converte a variavel para numero
$valorCompra = (float) $valorCompra;
$qtdEst = (float) $qtdEst;
$valorTotal = (float) $valorTotal;

if (empty($valorCompra) || $material === "0" || empty($material) || empty($qtdEst) || empty($valorTotal) || empty($fornecedor)) {

	if (empty($valorCompra)) {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Valor de compra do material está em branco!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../entrada_material_est');

	} else if ($material === "0" || empty($material)) {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Selecione o material!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../entrada_material_est');

	} else if (empty($qtdEst)) {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Quantidade de entrada do material está em branco!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../entrada_material_est');

	} else if (empty($valorTotal)) {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Valor total do material está em branco!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../entrada_material_est');

	} else if (empty($fornecedor)) {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Selecione o fornecedor!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../entrada_material_est');

	}

} else {

	require '../banco/conexao.php';

	// STMT passa as informações para o banco sem passar diretamente a váriavel
	// a linha abaixo prepara uma inserção para o cadastro no Banco.
	$stmt = $conn->prepare("INSERT INTO estoque_mtp(id_mtp, valor_compra_mtp, id_for, qtd_est_mtp, qtd_entrada, valor_total) VALUES (?, ?, ?, ?, ?, ?)");

	// a linha abaixo prepara o tipo e as variaveis que serão inseridas no banco
	$stmt->bind_param("iddddd", $material, $valorCompra, $fornecedor, $qtdEst, $qtdEst, $valorTotal);

	// a linha abaixo executa todos os processos acima
	$stmt->execute();

	$conn->close();

	require '../banco/conexao.php';

	//busca nome do produto antes de excluir
	$confere = "SELECT * FROM mtp WHERE id_mtp=?";

	if (!$stmt = $conn->prepare($confere)) {
		die("Erro: " . $conn->erro);
	}

	$stmt->bind_param("i", $material);

	$stmt->execute();

	$result = $stmt->get_result();

	$busca = $result->fetch_assoc();

	$nomeMat = $busca['desc_mtp'];

	$conn->close();
	//fim da busca de nome

	$acao = 'Adicionou o material ' . $nomeMat . ' no estoque';
	$loginAlt = $_SESSION['login'];
	$momento = date('Y-m-d H:i:s');

	include '../includes/salvaHistorico.php';

	$alertA = 'alert-success bg-success text-white';
	$bordaA = 'border-success';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-up';
	$descA = 'Entrada de material concluída!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../entrada_material_est');

}

?>