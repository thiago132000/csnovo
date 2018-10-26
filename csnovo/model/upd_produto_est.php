<?php

SESSION_START();

require "../banco/conexao.php";

//defina o fuso horario
date_default_timezone_set('America/Sao_Paulo');

//ATRIBUO VALORES RECEBIDOS EM VARIAVEIS
$id_est = htmlspecialchars($_POST['txtId']);
$prod_est = htmlspecialchars($_POST['selProd']);
$qtd_est = htmlspecialchars($_POST['txtQtdEstProd']);
$qtdEntrada = htmlspecialchars($_POST['txtQtdEntradaEstProd']);
$valor_v = htmlspecialchars($_POST['txtValorVenda']);
$valor_t = htmlspecialchars($_POST['txtTotal']);

$valor_t = str_replace(",", ".", $valor_t);
$valor_v = str_replace(",", ".", $valor_v);
$qtd_est = str_replace(",", ".", $qtd_est);

$qtd_est = (float) $qtd_est;
$valor_t = (float) $valor_t;
$valor_v = (float) $valor_v;
$id_est = intval($id_est);
$prod_est = intval($prod_est);

//COMPARA OS CAMPOS PARA VER SE NAO ESTÃO EM BRANCO
if (empty($id_est) || empty($prod_est) || empty($qtd_est) || empty($valor_v) || empty($valor_t)) {

	//SE O ID CONSEGUIR PASSAR EM BRANCO COM CERTEZA TEM UMA FALHA DE SISTEMA
	if (empty($id_est)) {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Falha de sistema!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../inicio');

	} else if (empty($prod_est)) {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Selecione algum produto!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../listagem_total_estProd');

	} else if (empty($qtd_est) || $qtd_est < 1) {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Quantidade de entrada está em branco!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../listagem_total_estProd');

	} else if (empty($valor_v) || $valor_v < 1) {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Valor de venda está em branco!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../listagem_total_estProd');

	} else if (empty($valor_t) || $valor_t < 1) {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Valor total está em branco!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../listagem_total_estProd');

	} else if (empty($qtdEntrada)) {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Valor de entrada está em branco!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../listagem_total_estProd');

	}

} else {

	//CONFERE SE ALGUM CAMPO REALMENTE FOI ALTERADO
	$confere = "SELECT * FROM estoque_prod WHERE id_est_prod=?";

	if (!$stmt = $conn->prepare($confere)) {

		//PARA O PROGRAMA SE DER ERRO ENQUANTO PREPARAVA A CONEXAO
		die("Erro:" . $conn->erro);
	}

	$stmt->bind_param("i", $id_est);

	$stmt->execute();

	$result = $stmt->get_result();

	if ($result->num_rows > 0) {

		$row = $result->fetch_assoc();

		if ($row['id_prod'] == $prod_est && $row['qtd_est_prod'] == $qtd_est && $row['valor_venda'] == $valor_v && $row['valor_total'] == $valor_t && $row['qtd_entrada'] == $qtdEntrada) {

			$alertA = 'alert-primary bg-iconBlue2 text-white';
			$bordaA = 'border-iconBlue2';
			$textA = 'text-white';
			$iconA = 'fas fa-question-circle';
			$descA = 'Nenhuma alteração!';

			include '../includes/alerta.php';

			$_SESSION['msg'] = $alertaSess;

			header('location: ../listagem_total_estProd');

		}
		//ATUALIZAÇÃO DOS DADOS
		else if (mysqli_query($conn, "UPDATE estoque_prod SET id_prod='$prod_est', qtd_est_prod='$qtd_est', qtd_entrada='$qtdEntrada', valor_venda='$valor_v', valor_total='$valor_t' WHERE id_est_prod='$id_est'")) {

			$conn->close();

			$ref = str_pad($id_est, 9, "0", STR_PAD_LEFT);

			SESSION_START();

			$acao = 'Alterou a referência ' . $ref . ' no estoque de produtos';
			$loginAlt = $_SESSION['login'];
			$momento = date('Y-m-d H:i:s');

			include '../includes/salvaHistorico.php';

			$alertA = 'alert-success bg-success text-white';
			$bordaA = 'border-success';
			$textA = 'text-white';
			$iconA = 'far fa-thumbs-up';
			$descA = 'Atualização de estoque concluída!';

			include '../includes/alerta.php';

			$_SESSION['msg'] = $alertaSess;

			header('location: ../listagem_total_estProd');

		} else {

			$conn->close();

			$alertA = 'alert-danger bg-danger text-white';
			$bordaA = 'border-danger';
			$textA = 'text-white';
			$iconA = 'far fa-thumbs-down';
			$descA = 'Falha de sistema!';

			include '../includes/alerta.php';

			$_SESSION['msg'] = $alertaSess;

			header('location: ../inicio');
		}

	} else {
		$conn->close();

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Sem estoque!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../listagem_total_estProd');
	}

}

?>