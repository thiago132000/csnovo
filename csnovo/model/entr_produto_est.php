<?php

SESSION_START();

date_default_timezone_set('America/Sao_Paulo');

//as linhas abaixo são as variaveis que resgatam as informações recebidas do usuario.
$produto = htmlspecialchars($_POST['selProd']);
$qtdEst = htmlspecialchars($_POST['txtQtdEntradaEstProd']);
$valorVenda = htmlspecialchars($_POST['txtValorVenda']);
$valorTotal = htmlspecialchars($_POST['total']);

// a linha abaixo converte a variavel para numero
$valorVenda = (float) $valorVenda;
$qtdEst = (float) $qtdEst;
$valorTotal = (float) $valorTotal;

if (empty($valorVenda) || $produto === "0" || empty($qtdEst) || empty($valorTotal)) {

	if (empty($valorVenda)) {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Valor de venda do produto está em branco!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../entrada_produto_est');

	} else if ($produto === "0" || empty($produto)) {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Selecione o produto!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../entrada_produto_est');

	} else if (empty($qtdEst)) {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Quantidade de entrada do produto está em branco!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../entrada_produto_est');

	} else if (empty($valorTotal)) {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Valor total do produto está em branco!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../entrada_produto_est');

	}

} else {

	require '../banco/conexao.php';

	// STMT passa as informações para o banco sem passar diretamente a váriavel
	// a linha abaixo prepara uma inserção para o cadastro no Banco.
	$stmt = $conn->prepare("INSERT INTO estoque_prod(id_prod, qtd_est_prod, qtd_entrada, valor_venda, valor_total) VALUES (?, ?, ?, ?, ?)");

	// a linha abaixo prepara o tipo e as variaveis que serão inseridas no banco
	$stmt->bind_param("idddd", $produto, $qtdEst, $qtdEst, $valorVenda, $valorTotal);

	// a linha abaixo executa todos os processos acima
	$stmt->execute();

	$conn->close();

	require '../banco/conexao.php';

	//busca nome do produto antes de excluir
	$confere = "SELECT * FROM produto WHERE id_prod=?";

	if (!$stmt = $conn->prepare($confere)) {
		die("Erro: " . $conn->erro);
	}

	$stmt->bind_param("i", $produto);

	$stmt->execute();

	$result = $stmt->get_result();

	$busca = $result->fetch_assoc();

	$nomeProd = $busca['nome_prod'];

	$conn->close();
	//fim da busca de nome

	$acao = 'Adicionou o produto ' . $nomeProd . ' no estoque';
	$loginAlt = $_SESSION['login'];
	$momento = date('Y-m-d H:i:s');

	include '../includes/salvaHistorico.php';

	$alertA = 'alert-success bg-success text-white';
	$bordaA = 'border-success';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-up';
	$descA = 'Entrada de produto concluída!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

	header('location: ../entrada_produto_est');

}

?>