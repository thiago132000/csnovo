<?php

require '../banco/conexao.php';

$stmt = $conn->prepare("INSERT INTO hist (acao_h, login_alt, data_hora) VALUES (?, ?, ?)");

$stmt->bind_param("sss", $acao, $loginAlt, $momento);

$stmt->execute();

$conn->close();

?>