<?php require_once 'includes/url.php';?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Sistema de Gerenciamento">
  <meta name="author" content="Alunos do Senac São Bernardo do Campo">
  <link rel="icon" href="media/icon/logo.ico">

  <title id="nomePag">Construindo...</title>

  <link rel="stylesheet" href="scripts/css/style.min.css">

  <link href="https://fonts.googleapis.com/css?family=Monda" rel="stylesheet">

  <!--link rel="stylesheet" href="scripts/css/bootstrap.min.css"-->

  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="scripts/css/sticky-footer-navbar.css">

  <link rel="stylesheet" href="scripts/css/removersetanumber.css">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

  <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->

  <script src="node_modules/jquery/dist/jquery.js"></script>

  <script src="scripts/js/funcaoEstilo.js"></script>

  <script src="./node_modules/popper.js/dist/umd/popper.js"></script>

  <script src="./node_modules/bootstrap/dist/js/bootstrap.js"></script>

  <script>

    function limitarT(telefone){

      telefone.value = telefone.value.substring(0,11);

    }

  </script>

  <!-- O script abaixo serve para limitar todos os campos do CNPJ-->
  <script>

    function limitarCnpj(cnpj){

      cnpj.value = cnpj.value.substring(0,14);

    }

  </script>

  <?php

require 'banco/conexao.php';

SESSION_START();

//gera um token com criptografia md5
$tokenUsuario = md5('seg' . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);

if ($_SESSION['donoDaSessao'] != $tokenUsuario && !isset($_SESSION['login']) && !isset($_SESSION['senha'])) {

	header("location: home.php");

	exit;

} else {
//fechamento do else é la em baixo, depois do html

	// pega o nome do usuario para mandar na mensagem
	$nameUser = $_SESSION['nome'];

	$loginUser = $_SESSION['login'];

	$nivelUser = $_SESSION['nivel'];

	?>

   <!-- NAVBAR -->
   <?php include 'includes/header.php';?>

   <!-- Telinha dos temas -->
   <?php include 'pages/configs.php';?>

   <a href="JavaScript:history.back();" id="btnVoltaHistorico" style="position: absolute; bottom: 0; right: 0; z-index: 999; margin-bottom: 85px; margin-right: 20px; font-size: 35px;"><i class="fas fa-arrow-circle-left text-primary"></i></a>

   <!-- Conteudo da página -->
   <main id="pagina" role="main" class="container" style="">

    <?php if (isset($_SESSION['msg'])) {

		echo $alertaSess = $_SESSION['msg'];

		include 'includes/alerta-sessao.php';

	}?>

    <!-- ROTAS
      <?php //include 'includes/rotas.php';?> -->
      <br>

      <?php include $pasta . '/' . $chama . '.php';?>

    </main><!-- fim conteudo da página -->

    <?php

	$temaUser = $_SESSION['tema'];

	include 'includes/validacaoTema.php';

	?>

<!--
  <div class="fixed-bottom text-right justify-content-right" style="width: 80%;">
    <a href="home.php?pag=perfil" data-toggle="tooltip" data-placement="top" title="Ir para perfil" class="badge badge-tema3 fixed-left mb-5 w-auto col-6 col-md-4 mr-4" style="opacity: 0.8;">Usuário logado - <?php echo $nameUser; ?></a>
  </div> -->

  <br><br>

  <!-- Fim do conteúdo da pagina -->

  <!-- RODAPÉ -->
  <?php include 'includes/footer.php';?>

</body>
</html>


<?php

} //fechamento do else la de cima

?>

