<?php

session_start();

require '../banco/conexao.php';

$excluirVenda = htmlspecialchars($_GET['excluirVenda']);
$paginaR = htmlspecialchars($_GET['paginaR']);

mysqli_query($conn, "DELETE FROM venda WHERE id_venda =" . $excluirVenda);

$conn->close();

$alertA = 'alert-success bg-success text-white';
$bordaA = 'border-success';
$textA = 'text-white';
$iconA = 'far fa-thumbs-up';
$descA = 'Venda excluída com sucesso!';

include '../includes/alerta.php';

$_SESSION['msg'] = $alertaSess;

header("location: ../listagem_total_venda&pagina=" . $paginaR);

?>

<!--script type="text/javascript">

	window.location.href = "../listagem_total_venda&pagina=" . $paginaR;

</script-->