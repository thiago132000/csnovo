<?php 

require "../banco/conexao.php";

//ATRIBUO VALORES RECEBIDOS EM VARIAVEIS
$id_est			= htmlspecialchars($_POST['txtId']);
$prod_est		= htmlspecialchars($_POST['selProd']);
$qtd_est		= htmlspecialchars($_POST['txtQtdEntradaEstProd']);
$valor_v		= htmlspecialchars($_POST['txtValorVenda']);
$valor_t		= htmlspecialchars($_POST['txtTotal']);

$qtd_est = (float) $qtd_est;
$valor_t = (float) $valor_t;
$valor_v = (float) $valor_v;
$id_est = intval($id_est);
$prod_est = intval($prod_est);

//COMPARA OS CAMPOS PARA VER SE NAO ESTÃO EM BRANCO
if(empty($id_est) || empty($prod_est) || empty($qtd_est) || empty($valor_v) || empty($valor_t) ){

	//SE O ID CONSEGUIR PASSAR EM BRANCO COM CERTEZA TEM UMA FALHA DE SISTEMA
	if(empty($id_est)){
		echo "<script>window.location.href='../home.php?msg=falha-de-sistema';</script>";
	}
	else if(empty($prod_est)){
		echo "<script>window.location.href='../home.php?msg=estoque-produto-campo-vazio';</script>";
	}
	else if(empty($qtd_est) || $qtd_est < 1){
		echo "<script>window.location.href='../home.php?msg=estoque-produto-campo-vazio';</script>";
	}
	else if(empty($valor_v) || $valor_v < 1){
		echo "<script>window.location.href='../home.php?msg=estoque-produto-campo-vazio';</script>";
	}
	else if(empty($valor_t) || $valor_t < 1){
		echo "<script>window.location.href='../home.php?msg=estoque-produto-campo-vazio';</script>";
	}

}
else{	

	//CONFERE SE ALGUM CAMPO REALMENTE FOI ALTERADO
	$confere = "SELECT * FROM estoque_prod WHERE id_est_prod=?";

	if(!$stmt = $conn->prepare($confere)){

		//PARA O PROGRAMA SE DER ERRO ENQUANTO PREPARAVA A CONEXAO
		die("Erro:".$conn->erro);
	}

	$stmt->bind_param("i", $id_est);

	$stmt->execute();

	$result = $stmt->get_result();

	if($result->num_rows > 0){

		$row = $result->fetch_assoc();

		if($row['id_prod'] == $prod_est && $row['qtd_est_prod'] == $qtd_est && $row['valor_venda'] == $valor_v && $row['valor_total'] == $valor_t){

			echo "<script>window.location.href='../home.php?msg=nenhuma-alteracao';</script>";

		}
		//ATUALIZAÇÃO DOS DADOS
		else if(mysqli_query($conn, "UPDATE estoque_prod SET id_prod='$prod_est', qtd_est_prod='$qtd_est', valor_venda='$valor_v', valor_total='$valor_t' WHERE id_est_prod='$id_est'")){

			echo "<script>window.location.href='../home.php?msg=atualizacao-concluida';</script>";

		}else{
			echo "<script>window.location.href='../home.php?msg=falha-de-sistema';</script>";
		}		

		

	}
	else{
		echo "<script>window.location.href='../home.php?msg=sem-estoque';</script>";
	}

}


?>