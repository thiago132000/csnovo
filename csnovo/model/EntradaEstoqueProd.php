<?php 

	//as linhas abaixo são as variaveis que resgatam as informações recebidas do usuario.		
	$produto	  = htmlspecialchars($_POST['selProd']);	
	$qtdEntrada   = htmlspecialchars($_POST['txtQtdEntradaEstProd']);
	$valorVenda	  = htmlspecialchars($_POST['txtValorVenda']);
	$valorTotal	  = htmlspecialchars($_POST['total']);

	// a linha abaixo converte a variavel para numero
	$valorVenda   = (float) $valorVenda;	
	$qtdEntrada   = (float) $qtdEntrada;
	$valorTotal	  = (float) $valorTotal;		

	if(empty($valorVenda) || $produto === "0" || empty($qtdEntrada) || empty($valorTotal)){

		if(empty($valorVenda)){

			echo "<script>window.location.href='../home.php?msg=estoque-produto-campo-vazio';</script>";

		}
		else if($produto === "0"){

			echo "<script>window.location.href='../home.php?msg=estoque-produto-campo-vazio';</script>";

		}
		else if(empty($qtdEntrada)){

			echo "<script>window.location.href='../home.php?msg=estoque-produto-campo-vazio';</script>";

		}
		else if(empty($valorTotal)){

			echo "<script>window.location.href='../home.php?msg=valor-total-incorreto';</script>";

		}
		
	}
	else{

		require '../banco/conexao.php';

		// STMT passa as informações para o banco sem passar diretamente a váriavel

		// a linha abaixo prepara uma inserção para o cadastro no Banco.
		$stmt = $conn->prepare("INSERT INTO estoque_prod(id_prod, qtd_est_prod, valor_venda, valor_total) VALUES (?, ?, ?, ?)");

		// a linha abaixo prepara o tipo e as variaveis que serão inseridas no banco
		$stmt->bind_param("iddd", $produto, $qtdEntrada, $valorVenda, $valorTotal);

		// a linha abaixo executa todos os processos acima
		$stmt->execute();

		echo "<script>window.location.href='../home.php?msg=entrada-produto-concluida';</script>";			

		$conn->close();

		

	}

 ?>