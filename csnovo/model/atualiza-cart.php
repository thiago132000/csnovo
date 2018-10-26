<?php

session_start();

$arraySessao = $_SESSION['itens'];

/*print_r($arraySessao);
die;*/

$arrayPosicao = htmlspecialchars($_POST['frodoPosicao']);

$dados = array(
	0 => htmlspecialchars($_POST['frodo']),
);

$qtdNova = floatval($dados[0]);

$idAlteracao = $arraySessao[$arrayPosicao][0];

include '../banco/conexao.php';

$query = "SELECT * FROM estoque_prod WHERE id_est_prod='$idAlteracao'";

//$arraySessao = unserialize($arraySessao);

if (!$stmt = $conn->prepare($query)) {
	die("Erro: " . $conn->erro);
}

$stmt->execute();

$result = $stmt->get_result();

if (!$result->num_rows == 0) {

	$puxaTab = $result->fetch_assoc();

	if ($qtdNova <= $puxaTab['qtd_est_prod']) {

		if (!$qtdNova == '0' && !$qtdNova == '' && $qtdNova > 0 && $_SESSION['itens'][$arrayPosicao][4] != $qtdNova) {

			foreach ($arraySessao as $key => $subarray) {
				$_SESSION['itens'][$arrayPosicao][4] = $qtdNova;
			}

			$alertA = 'alert-success bg-success text-white';
			$bordaA = 'border-success';
			$textA = 'text-white';
			$iconA = 'far fa-thumbs-up';
			$descA = 'Quantidade alterada!';

			include '../includes/alerta.php';

			$_SESSION['msg'] = $alertaSess;

		} else if ($_SESSION['itens'][$arrayPosicao][4] == $qtdNova) {

			$alertA = 'alert-primary bg-iconBlue2 text-white';
			$bordaA = 'border-iconBlue2';
			$textA = 'text-white';
			$iconA = 'fas fa-question-circle';
			$descA = 'Nenhuma alteração!';

			include '../includes/alerta.php';

			$_SESSION['msg'] = $alertaSess;

		} else {

			$alertA = 'alert-danger bg-danger text-white';
			$bordaA = 'border-danger';
			$textA = 'text-white';
			$iconA = 'far fa-thumbs-down';
			$descA = 'Quantidade inválida!';

			include '../includes/alerta.php';

			$_SESSION['msg'] = $alertaSess;

		}

	} else {

		$alertA = 'alert-danger bg-danger text-white';
		$bordaA = 'border-danger';
		$textA = 'text-white';
		$iconA = 'far fa-thumbs-down';
		$descA = 'Quantidade maior que a do estoque!';

		include '../includes/alerta.php';

		$_SESSION['msg'] = $alertaSess;

	}

}

$conn->close();

header("location: ../venda");

?>