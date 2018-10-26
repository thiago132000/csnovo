<?php
if (isset($_GET['codEdProdEst'])) {

	$codE = htmlspecialchars($_GET['codEdProdEst']);

	include 'editar_produto_est.php';

	return false;

} else if (isset($_GET['codEdProd'])) {

	$codE = htmlspecialchars($_GET['codEdProd']);

	include 'editar_produto.php';

	return false;

} else if (isset($_GET['codEdCli'])) {

	$codE = htmlspecialchars($_GET['codEdCli']);

	include 'editar_cliente.php';

	return false;

} else if (isset($_GET['codEdFor'])) {

	$codE = htmlspecialchars($_GET['codEdFor']);

	include 'editar_forne.php';

	return false;

} else if (isset($_GET['codEdFunc'])) {

	$codE = htmlspecialchars($_GET['codEdFunc']);

	include 'editar_func.php';

	return false;

} else if (isset($_GET['codEdMtp'])) {

	$codE = htmlspecialchars($_GET['codEdMtp']);

	include 'editar_mtp.php';

	return false;

} else if (isset($_GET['codEdUsu'])) {

	$codE = htmlspecialchars($_GET['codEdUsu']);

	include 'editar_usu.php';

	return false;

} else if (isset($_GET['codEdCar'])) {

	$codE = htmlspecialchars($_GET['codEdCar']);

	include 'editar_cargo.php';

	return false;

} else if (isset($_GET['codEdDep'])) {

	$codE = htmlspecialchars($_GET['codEdDep']);

	include 'editar_dep.php';

	return false;

} else if (isset($_GET['codEdMtpEst'])) {

	$codE = htmlspecialchars($_GET['codEdMtpEst']);

	include 'editar_material_est.php';

	return false;

} else {

	header("location: ../home.php");

	return false;
}

?>