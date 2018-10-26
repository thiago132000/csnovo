<?php

session_start();

if (empty($_SESSION['itens'])) {
	$_SESSION['itens'] = [];
}

$dados = array(
	0 => htmlspecialchars($_POST['idProdEstoque']),
	1 => htmlspecialchars($_POST['nomeProdEstoque']),
	2 => htmlspecialchars($_POST['qtdProdEstoque']),
	3 => htmlspecialchars($_POST['valorProdEstoque']),
	4 => htmlspecialchars($_POST['qtdSelecProdEstoque']),
);

$arraySessao = $_SESSION['itens'];

$idSetado = ($dados[0]);
$qtdEstSetada = number_format($dados[2]);
$valorEstSetado = number_format($dados[3]);
$qtdSetada = floatval($dados[4]);

$confirmar = false;

$subarrayC = 0;

include '../banco/conexao.php';

$query = "SELECT * FROM estoque_prod WHERE id_est_prod='$idSetado'";

//$arraySessao = unserialize($arraySessao);

if (!$stmt = $conn->prepare($query)) {
	die("Erro: " . $conn->erro);
}

$stmt->execute();

$result = $stmt->get_result();

if (!$result->num_rows == 0) {

	$puxaTab = $result->fetch_assoc();

	$idBusca = number_format($idSetado);

	$quantidadeBanco = $puxaTab['qtd_est_prod'];

	if ($qtdSetada > 0) {

		if ($qtdSetada <= $quantidadeBanco) {

			foreach ($arraySessao as $keyIdV => $subarray):
				if ($subarray[0] == $idSetado) {

					$subarrayA = implode(',', $subarray);
					$subarrayA = explode(',', $subarrayA);

					$valorVindo = $subarrayA[5];

					//print_r($_SESSION['itens'][$keyIdV][4]);
					//die;

					$valorAtualizado = number_format($_SESSION['itens'][$keyIdV][4] + $qtdSetada);

					if ($valorAtualizado <= $quantidadeBanco) {

						$_SESSION['itens'][$keyIdV][4] += $qtdSetada;

						$confirmar = true;

						$alertA = 'alert-success bg-success text-white';
						$bordaA = 'border-success';
						$textA = 'text-white';
						$iconA = 'far fa-thumbs-up';
						$descA = 'Quantidade do produto alterada!';

						include '../includes/alerta.php';

						$_SESSION['msg'] = $alertaSess;

					} else {

						$alertA = 'alert-danger bg-danger text-white';
						$bordaA = 'border-danger';
						$textA = 'text-white';
						$iconA = 'far fa-thumbs-down';
						$descA = 'Quantidade maior que a do estoque!';

						include '../includes/alerta.php';

						$_SESSION['msg'] = $alertaSess;

						$confirmar = true;

					}

				}

			endforeach;

		} else {

			$alertA = 'alert-danger bg-danger text-white';
			$bordaA = 'border-danger';
			$textA = 'text-white';
			$iconA = 'far fa-thumbs-down';
			$descA = 'Quantidade maior que a do estoque!';

			include '../includes/alerta.php';

			$_SESSION['msg'] = $alertaSess;

			$confirmar = true;

		}

	} else {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Quantidade não pode ser menor que 1!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		$confirmar = true;

	}

}

$conn->close();

if (!$confirmar == true) {

	if ($qtdSetada > 0 && $idSetado > 0 && $qtdEstSetada > 0 && $valorEstSetado > 0 && !empty($dados[1])) {

		array_push($_SESSION['itens'], $dados);

		$alertA = 'alert-success bg-success text-white';
		$bordaA = 'border-success';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-up';
		$descA = 'Produto adicionado com sucesso!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

	} else {
		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Quantidade invalida!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;
	}

}

header("location: ../venda");

?>
