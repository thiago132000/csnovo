<?php

session_start();

date_default_timezone_set('America/Sao_Paulo');

$selCliente = htmlspecialchars($_POST['selCliente']);
$selFp = htmlspecialchars($_POST['selFP']);

if (empty($selCliente) || empty($selFp)) {

	$alertA = 'alert-danger bg-danger text-white';
	$bordaA = 'border-danger';
	$textA = 'text-white';
	$iconA = 'far fa-thumbs-down';
	$descA = 'Preencha todos os dados antes de prosseguir!';

	include '../includes/alerta.php';

	$_SESSION['msg'] = $alertaSess;

} else {

	$arraySessao = $_SESSION['itens'];

	include '../banco/conexao.php';

	if (!empty($_SESSION['itens'])) {

		$totalVenda = $_SESSION['valor_carrinho'];

		$dataHora = date('Y-m-d H:i:s');

		$cont = 0;

		$novoArray = [];

		$arrayBanco = [];

		$arrayBanco2 = '';

		$loginUser = $_SESSION['login'];

//pega o id do funcionário

		$confere = "SELECT * FROM usuario WHERE login=?";

		if (!$stmt = $conn->prepare($confere)) {
			die("Erro: " . $conn->erro);
		}

		$stmt->bind_param("s", $loginUser);

		$stmt->execute();

		$result = $stmt->get_result();

		if (!$result->num_rows == 0) {

			$row = $result->fetch_assoc();

			$idLogin = $row['id'];

		}

		/*print_r('total venda '.$totalVenda);
			print_r('data e hora '.$dataHora);
			print_r('login usuario '.$idLogin);
		*/

		foreach ($arraySessao as $keyIdV => $subarray) {

			array_push($novoArray, $subarray);

			$novoArray[$keyIdV] = implode(',', $subarray);

			if ($keyIdV == 0) {

				$arrayBanco = $novoArray[$cont];

			} else {
				$arrayBanco = '-' . $novoArray[$cont];
			}

			$arrayBanco2 .= $arrayBanco;

			$cont++;

		}

		$stmt = $conn->prepare("INSERT INTO venda(id_cli, array, valor_total, id_fp, id_usu, data_venda) VALUES(?,?,?,?,?,?)");

		$stmt->bind_param("isdiis", $selCliente, $arrayBanco2, $totalVenda, $selFp, $idLogin, $dataHora);

		$stmt->execute();

		$conn->close();

		//atualiza quantidades

		foreach ($arraySessao as $keyIdV => $subarray):

			include '../banco/conexao.php';

			$query = "SELECT * FROM estoque_prod WHERE id_est_prod='$subarray[0]'";

			if (!$stmt = $conn->prepare($query)) {
				die("Erro: " . $conn->erro);
			}

			$stmt->execute();

			$result = $stmt->get_result();

			if (!$result->num_rows == 0) {

				$puxaTab = $result->fetch_assoc();

				$novaQtde = $puxaTab['qtd_est_prod'] - $subarray[4];

				$quantidadeVendido = $puxaTab['qtd_vendido_prod'] + $subarray[4];

				if (mysqli_query($conn, "UPDATE estoque_prod SET qtd_est_prod='$novaQtde' WHERE id_est_prod='$subarray[0]'")) {

					mysqli_query($conn, "UPDATE estoque_prod SET qtd_vendido_prod='$quantidadeVendido' WHERE id_est_prod='$subarray[0]'");

					$conn->close();

				}

			}

		endforeach;

		unset($_SESSION['itens']);

		$_SESSION['itens'] = [];

		$alertA = 'alert-success bg-success text-white';
		$bordaA = 'border-success';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-up';
		$descA = 'Venda realizada com sucesso!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

		header("location: ../listagem_total_venda");

		exit;

/*print_r($selCliente);
print_r($arrayBanco2);
print_r($totalVenda);
print_r($selFp);
print_r($loginUser);
print_r($dataHora);
die;*/

	} else {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Carrinho vazio, cadastre 1 ou mais produtos!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

	}

}

header("location: ../venda");

//$arraySessao = unserialize($arraySessao);

/*$arrayBanco2 = explode('-', $arrayBanco2);
$arrayBanco2 = explode(',', $arrayBanco2[0]);

print_r($arrayBanco2[0]);
die;*/

//print_r($_SESSION['valor_carrinho']);
//die;

?>