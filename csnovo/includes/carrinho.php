<?php

SESSION_START();

if (!isset($_SESSION['itens'])) {

	$_SESSION['itens'] = array();

}

if (isset($_GET['add']) && $_GET['add'] == "carrinho") {

	$idProduto = htmlspecialchars($_GET['id']);
	if (!isset($_SESSION['itens'][$idProduto])) {
		$_SESSION['itens'][$idProduto] = 1;
	} else {
		$_SESSION['itens'][$idProduto] += 1;
	}

}

header('location: ../venda');

?>