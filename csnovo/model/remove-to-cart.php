<?php

session_start();

$idExc = htmlspecialchars($_POST['troll']);

unset($_SESSION['itens'][$idExc]);

$alertA = 'alert-success bg-success text-white';
$bordaA = 'border-success';
$textA = 'text-white';
$iconA = 'far fa-thumbs-up';
$descA = 'Produto removido com sucesso!';

include '../includes/alerta.php';

$_SESSION['msg'] = $alertaSess;

header("location: ../venda");

?>