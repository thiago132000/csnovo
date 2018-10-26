<?php

SESSION_START();

require "../banco/conexao.php";

date_default_timezone_set('America/Sao_Paulo');

//ATRIBUO VALORES RECEBIDOS EM VARIAVEIS
$id_est = htmlspecialchars($_POST['txtId']);
$mtp_est = htmlspecialchars($_POST['selMtp']);
$qtd_est = htmlspecialchars($_POST['txtQtdEstMtp']);
$qtdEntrada = htmlspecialchars($_POST['txtQtdEntradaEstMtp']);
$valor_c = htmlspecialchars($_POST['txtValorCompra']);
$valor_t = htmlspecialchars($_POST['txtTotal']);
$fornecedor = htmlspecialchars($_POST['selFor']);

$valor_t = str_replace(",", ".", $valor_t);
$valor_c = str_replace(",", ".", $valor_c);
$qtd_est = str_replace(",", ".", $qtd_est);

$qtd_est = (float) $qtd_est;
$valor_t = (float) $valor_t;
$valor_c = (float) $valor_c;
$id_est = intval($id_est);
$fornecedor = intval($fornecedor);
$mtp_est = intval($mtp_est);

//COMPARA OS CAMPOS PARA VER SE NAO ESTÃO EM BRANCO
if (empty($id_est) || empty($mtp_est) || empty($qtd_est) || empty($valor_c) || empty($valor_t) || empty($qtdEntrada) || empty($fornecedor)) {

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

	} else if (empty($mtp_est)) {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Selecione algum material!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../listagem_total_estMtp');

	} else if (empty($qtd_est) || $qtd_est < 1) {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Quantidade em estoque está em branco!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../listagem_total_estMtp');

	} else if (empty($valor_c) || $valor_c < 1) {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Valor de compra está em branco!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../listagem_total_estMtp');

	} else if (empty($valor_t) || $valor_t < 1) {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Valor total está em branco!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../listagem_total_estMtp');

	} else if (empty($qtdEntrada)) {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Valor de entrada está em branco!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../listagem_total_estMtp');

	} else if (empty($fornecedor)) {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Selecione o fornecedor!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header('location: ../listagem_total_estMtp');

	}

} else {

	//CONFERE SE ALGUM CAMPO REALMENTE FOI ALTERADO
	$confere = "SELECT * FROM estoque_mtp WHERE id_est_mtp=?";

	if (!$stmt = $conn->prepare($confere)) {

		//PARA O PROGRAMA SE DER ERRO ENQUANTO PREPARAVA A CONEXAO
		die("Erro:" . $conn->erro);
	}

	$stmt->bind_param("i", $id_est);

	$stmt->execute();

	$result = $stmt->get_result();

	if ($result->num_rows > 0) {

		$row = $result->fetch_assoc();

		if ($row['id_mtp'] == $mtp_est && $row['qtd_est_mtp'] == $qtd_est && $row['valor_compra_mtp'] == $valor_c && $row['valor_total'] == $valor_t && $row['qtd_entrada'] == $qtdEntrada && $row['id_for'] == $fornecedor) {

			$alertA = 'alert-primary bg-iconBlue2 text-white';
			$bordaA = 'border-iconBlue2';
			$textA = 'text-white';
			$iconA = 'fas fa-question-circle';
			$descA = 'Nenhuma alteração!';

			include '../includes/alerta.php';

			$_SESSION['msg'] = $alertaSess;

			header('location: ../listagem_total_estMtp');

		}
		//ATUALIZAÇÃO DOS DADOS
		else if (mysqli_query($conn, "UPDATE estoque_mtp SET id_mtp='$mtp_est', valor_compra_mtp='$valor_c', id_for='$fornecedor', qtd_est_mtp='$qtd_est', qtd_entrada='$qtdEntrada', valor_total='$valor_t' WHERE id_est_mtp='$id_est'")) {

			$conn->close();

			$ref = str_pad($id_est, 9, "0", STR_PAD_LEFT);

			SESSION_START();

			$acao = 'Alterou a referência ' . $ref . ' no estoque de materiais';
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

			header('location: ../listagem_total_estMtp');

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

		header('location: ../listagem_total_estMtp');
	}

}

?>