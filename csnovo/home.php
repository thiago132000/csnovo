<?php

require 'banco/conexao.php';

SESSION_START();

if (!isset($_SESSION['donoDaSessao']) && !isset($_SESSION['login']) && !isset($_SESSION['senha'])) {

	?>
	<!DOCTYPE html>
	<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Login - Classe Sport</title>
		<meta name="description" content="Sistema de Gerenciamento">
		<meta name="author" content="Alunos do Senac São Bernardo do Campo">
		<link rel="icon" href="media/icon/logo.ico">

		<link rel="stylesheet" href="scripts/css/style.min.css">

		<link href="https://fonts.googleapis.com/css?family=Monda" rel="stylesheet">

		<!-- Baixar depois os scripts com links e colocar na pasta dos scripts -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

		<!-- jQuery library -->
		<script src="node_modules/jquery/dist/jquery.js"></script>

	</head>
	<body style="background-color: #AAAAAA;">

		<div class="container-fluid">

			<?php if (isset($_SESSION['msgSenha'])) {

		?>

				<script src="scripts/js/senhaAlterada.js"></script>

				<?php

		unset($_SESSION['msgSenha']);
	}?>

			<!-- div Box Login -->
			<div id="boxlogin" class="text-center">

				<!-- Box de Mensagem -->
				<div id="mensagem" class="text-center">Esta é uma mensagem teste</div><!-- fim Box de Mensagem -->

				<label id="titulo" class="text-primary">Faça seu login</label>

				<!-- div Logo Classe Sport -->
				<div id="image" class="thumbnail text-center">
					<img src="media/images/logo.png" alt="Logo Classe Sport" tittle="Classe Sport">
				</div><!-- fim div Logo Classe Sport -->

				<!-- Formulario -->
				<form action="model/login.php" id="form">

					<!-- div inputs -->
					<div id="inputs" class="content">

						<!-- div txtLogin-->
						<div class="form-group">
							<div class="input-group mb-2 mr-sm-2">
								<div class="input-group-prepend">
									<div class="input-group-text"><i class="fas fa-user"></i></div>
								</div>
								<input type="text" name="txtLogin" id="txtLogin" class="form-control">
							</div>
						</div><!-- fim div txtLogin-->

						<!-- div txtSenha-->
						<div class="form-group">
							<div class="input-group mb-2 mr-sm-2">
								<div class="input-group-prepend">
									<div class="input-group-text"><i class="fas fa-key"></i></div>
								</div>
								<input type="password" name="txtSenha" id="txtSenha" class="form-control">
							</div>
						</div><!-- fim div txtSenha-->

						<!-- caixa de botões -->
						<div class="col-auto my-1">
							<button type="submit" class="btn btn-primary" id="enviar" name="enviar">Entrar<i class="fas fa-sign-in-alt ml-2" style="color: #fff;"></i></button>
						</div><!-- fim caixa de botões -->

					</div><!-- fim div inputs -->

				</form><!-- fim Formulario -->

				<input type="hidden" id="metodo" value="formulario-ajax">

				<script src="scripts/js/login.js"></script>

			</div><!-- fim div Box Login -->

			<?php

	if (isset($_GET['deslogado'])) {

		$deslogado = $_GET['deslogado'];

		if ($deslogado == 'true') {

			?>

					<script src="scripts/js/deslogado.js"></script>

					<?php

		}

	} else if (isset($_GET['senhaAlterada'])) {

		$senhaAlterada = $_GET['senhaAlterada'];

		if ($senhaAlterada == true) {

			?>

					<script src="scripts/js/senhaAlterada.js"></script>

					<?php
}

	}

	?>

		</body>

		</html>

		<?php

} //fechamento if
else {

	header("location: ./inicio");

	exit;

}

?>