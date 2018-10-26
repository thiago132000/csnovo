
</head>
<body onload="$(document).ready(function(){$('#setBaixo').click(); $('#hisBaixo').click(); $('#linkInformacoes').click();});" style="background-color: #fff;"><!--EDEDED-->
  <header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top shadow-sm" id="naveB">
      <a data-toggle="tooltip" data-placement="bottom" title="Classe Sport" class="navbar-brand linkLogo" href="../inicio" ><img src="../media/images/logo2.png" class="logo rounded-circle"></a>
      <a class="nav-link active casa" id="inicio" href="../inicio"><i class="fas fa-home mr-2 text-white" style="transform: scale(1.4);"></i><span class="sr-only">(current)</span></a>
      <!--a class="navbar-brand linkClasseSport" href="inicio" >Classe Sport</a-->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">

          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
              Cadastro
            </a>
            <div class="dropdown-menu shadow" aria-labelledby="navbarDropdownMenuLink" style="margin-top: -1px;">
              <a class="dropdown-item" href="../cadastra_cargo"><i class="fas fa-user-md iconesMenu ml-1 mr-3"></i>Cargos</a>
              <a class="dropdown-item" href="../cadastra_func"><i class="fas fa-user-tie iconesMenu mr-3 ml-1"></i>Funcionário</a>
              <a class="dropdown-item" href="../cadastra_dep"><i class="fas fa-chalkboard-teacher iconesMenu mr-3"></i>Departamento</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../cadastra_cliente"><i class="fas fa-user-tag iconesMenu mr-3"></i>Clientes</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../cadastra_forne"><i class="fas fa-building iconesMenu mr-3"></i>Fornecedor</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../cadastra_mtp"><i class="fab fa-creative-commons-remix iconesMenu mr-3"></i>Matéria Prima</a>
              <a class="dropdown-item" href="../cadastra_produto"><i class="fas fa-coins iconesMenu mr-3"></i>Produto</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../cadastra_usuario"><i class="fas fa-users iconesMenu mr-3"></i>Usuário</a>

            </div>
          </li>

          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Estoque
            </a>
            <div class="dropdown-menu shadow" aria-labelledby="navbarDropdownMenuLink" style="margin-top: -1px;">
             <a class="dropdown-item" href="../entrada_material_est"><i class="fas fa-dolly iconesMenu mr-3"></i>Entrada Materia Prima</a>
             <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="../entrada_produto_est"><i class="fas fa-archive iconesMenu mr-3"></i>Entrada Produto Final</a>
           </div>
         </li>

         <li class="nav-item dropdown active">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Venda
          </a>
          <div class="dropdown-menu shadow" aria-labelledby="navbarDropdownMenuLink" style="margin-top: -1px;">
           <a class="dropdown-item" href="#"><i class="fas fa-hand-holding-usd iconesMenu mr-3"></i>Realizar Venda</a>
           <div class="dropdown-divider"></div>
           <a class="dropdown-item" href="#"><i class="fas fa-chart-line iconesMenu mr-3"></i>Listar Vendas</a>

         </div>
       </li>

       <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Configs
        </a>
        <div class="dropdown-menu shadow" aria-labelledby="navbarDropdownMenuLink" style="margin-top: -1px;">
         <a class="dropdown-item" href="../perfil"><i class="fas fa-user-circle iconesMenu mr-3"></i>Perfil</a>
         <div class="dropdown-divider"></div>

         <?php if ($nivelUser !== 1) {

} else {?>
          <a class="dropdown-item" href="../listagem_total_hist"><i class="far fa-clock iconesMenu mr-3"></i>Histórico</a>
          <div class="dropdown-divider"></div>

        <?php } //fim else nivel ?>

        <a class="dropdown-item" href="../sair?sair"><i class="fas fa-sign-out-alt iconesMenu mr-3"></i>Sair</a>
      </div>
    </li>

<?php

if ($nivelUser === 1) {

	if (empty($_SESSION['itens'])) {$atalhoC = 0;} else { $atalhoC = count($_SESSION['itens']);}

	?>

<a class="nav-link active casa" id="carrinho" href="../venda"><i class="fas fa-shopping-cart ml-4 mt-1 text-white" style="transform: scale(1.4);"><span class="ml-2 align-middle" style="font-size: 8px; font-family: 'Monda', sans-serif;"><?php echo $atalhoC; ?> itens</span></i><span class="sr-only">(current)</span></a>

<?php
} //fim nv user

?>

  </ul>
  <form method="post" action="../pages/buscar_resultado.php" style="width: none;" id="buscar" class="form-inline mt-2 mt-md-0">
    <input class="form-control mr-sm-2" id="iBusca" name="buscar" style="border-radius: 30px;" type="text" placeholder="Buscar" aria-label="Search">
    <button data-toggle="tooltip" data-placement="bottom" title="Buscar" id="btnBusca" class="fas fa-search btn btn-outline-light my-2 my-sm-0" type="search" style="border-radius: 30px;"></button>
  </form>
</div>

</nav>