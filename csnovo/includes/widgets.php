<?php

require 'banco/conexao.php';

//W Estoque Produtos
$qtdEstoqueProd = mysqli_query($conn, "SELECT * FROM estoque_prod");
$widEstProd = mysqli_num_rows($qtdEstoqueProd);

//W Estoque Material
$qtdEstMate = mysqli_query($conn, "SELECT * FROM estoque_mtp");
$widEstMate = mysqli_num_rows($qtdEstMate);

//W Usuarios
$qtdUsuario = mysqli_query($conn, "SELECT * FROM usuario");
$widUsuario = mysqli_num_rows($qtdUsuario);

//W Produtos
$qtdProd = mysqli_query($conn, "SELECT * FROM produto");
$widProd = mysqli_num_rows($qtdProd);

//W Funcionarios
$qtdFunc = mysqli_query($conn, "SELECT * FROM funcionario");
$widFunc = mysqli_num_rows($qtdFunc);

//W Fornecedores
$qtdForn = mysqli_query($conn, "SELECT * FROM fornecedor");
$widForn = mysqli_num_rows($qtdForn);

//W Clientes
$qtdCli = mysqli_query($conn, "SELECT * FROM cliente");
$widCli = mysqli_num_rows($qtdCli);

//W Materiais
$qtdMtp = mysqli_query($conn, "SELECT * FROM mtp");
$widMtp = mysqli_num_rows($qtdMtp);

//W Vendas
$qtdVen = mysqli_query($conn, "SELECT * FROM venda");
$widVen = mysqli_num_rows($qtdVen);

//W Cargos
$qtdCargo = mysqli_query($conn, "SELECT * FROM cargo");
$widCargo = mysqli_num_rows($qtdCargo);

//W Departamentos
$qtdDep = mysqli_query($conn, "SELECT * FROM departamento");
$widDep = mysqli_num_rows($qtdDep);

?>
<section id="secW" class="d-flex justify-content-center m-auto" style="max-width: 710px;">

	<div class="row text-center" style="margin: auto; padding: auto;">

		<!-- Widget estoque de produtos -->
		<div class="col-xs-4 w-auto p-3" style="width: auto; margin: auto;">
			<div class="card shadow bg-white rounded">
				<i class="card-img-top fas fa-archive text-center iconCard" alt="Card image cap"></i><span class="badge badge-pill qtdIconAtalho"><?php if ($widEstProd < 1) {echo 'vazio';} else {echo $widEstProd . ' itens';}?></span>
				<div class="card-body text-center">
					<p class="card-title">Est. produtos</p>
					<p class="card-text"></p>
					<a href="entrada_produto_est" data-toggle="tooltip" data-placement="top" title="Novo" class="btn btn-success rounded-circle"><i class="fas fa-plus-square" style="color: #fff;"></i></a>
					<a href="listagem_total_estProd" data-toggle="tooltip" data-placement="top" title="Listar todos" class="btn btn-info rounded-circle"><i class="fas fa-list-ol" style="color: #fff;"></i></a>
				</div>
			</div>
		</div><!-- FIM Widget estoque de produtos -->

		<!-- Widget estoque de material -->
		<div class="col-xs-4 w-auto p-3" style="width: auto; margin: auto;">
			<div class="card shadow bg-white rounded">
				<i class="card-img-top fas fa-dolly iconCard" alt="Card image cap"></i><span class="badge badge-pill qtdIconAtalho"><?php if ($widEstMate < 1) {echo 'vazio';} else {echo $widEstMate . ' itens';}?></span>
				<div class="card-body text-center">
					<p class="card-title">Est. materiais</p>
					<p class="card-text"></p>
					<a href="entrada_material_est" data-toggle="tooltip" data-placement="top" title="Novo" class="btn btn-success rounded-circle"><i class="fas fa-plus-square" style="color: #fff;"></i></a>
					<a href="listagem_total_estMtp" data-toggle="tooltip" data-placement="top" title="Listar todos" class="btn btn-info rounded-circle"><i class="fas fa-list-ol" style="color: #fff;"></i></a>
				</div>
			</div>
		</div><!-- fim Widget estoque de produtos -->

		<!-- Widget Usuarios -->
		<div class="col-xs-4 w-auto p-3" style="width: auto; margin: auto;">
			<div class="card shadow bg-white rounded">
				<i class="card-img-top fas fa-users text-center iconCard" alt="Card image cap"></i><span class="badge badge-pill qtdIconAtalho"><?php if ($widUsuario < 1) {echo 'vazio';} else {echo $widUsuario . ' itens';}?></span>
				<div class="card-body text-center">
					<p class="card-title">Usuários</p>
					<p class="card-text"></p>
					<a href="cadastra_usuario" data-toggle="tooltip" data-placement="top" title="Novo" class="btn btn-success rounded-circle"><i class="fas fa-plus-square" style="color: #fff;"></i></a>
					<a href="listagem_total_usu" data-toggle="tooltip" data-placement="top" title="Listar todos" class="btn btn-info rounded-circle"><i class="fas fa-list-ol" style="color: #fff;"></i></a>
				</div>
			</div>
		</div><!-- fim Widget Usuarios -->

		<!-- Widget Produtos -->
		<div class="col-xs-4 w-auto p-3" style="width: auto; margin: auto;">
			<div class="card shadow bg-white rounded">
				<i class="card-img-top fas fa-coins text-center iconCard" alt="Card image cap"></i><span class="badge badge-pill qtdIconAtalho" ><?php if ($widProd < 1) {echo 'vazio';} else {echo $widProd . ' itens';}?></span>
				<div class="card-body text-center">
					<p class="card-title">Produtos</p>
					<p class="card-text"></p>
					<a href="cadastra_produto" data-toggle="tooltip" data-placement="top" title="Novo" class="btn btn-success rounded-circle"><i class="fas fa-plus-square" style="color: #fff;"></i></a>
					<a href="listagem_total_prod" data-toggle="tooltip" data-placement="top" title="Listar todos" class="btn btn-info rounded-circle"><i class="fas fa-list-ol" style="color: #fff;"></i></a>
				</div>
			</div>
		</div><!-- fim Widget Produtos -->

		<!-- Widget Funcionarios -->
		<div class="col-xs-4 w-auto p-3" style="width: auto; margin: auto;">
			<div class="card shadow bg-white rounded" >
				<i class="card-img-top fas fa-user-tie text-center iconCard" alt="Card image cap"></i><span class="badge badge-pill qtdIconAtalho" ><?php if ($widFunc < 1) {echo 'vazio';} else {echo $widFunc . ' itens';}?></span>
				<div class="card-body text-center">
					<p class="card-title">Funcionários</p>
					<p class="card-text"></p>
					<a href="cadastra_func" data-toggle="tooltip" data-placement="top" title="Novo" class="btn btn-success rounded-circle"><i class="fas fa-plus-square" style="color: #fff;"></i></a>
					<a href="listagem_total_func" data-toggle="tooltip" data-placement="top" title="Listar todos" class="btn btn-info rounded-circle"><i class="fas fa-list-ol" style="color: #fff;"></i></a>
				</div>
			</div>
		</div><!-- fim Widget Funcionarios -->

		<!-- Widget Fornecedores -->
		<div class="col-xs-4 w-auto p-3" style="width: auto; margin: auto;">
			<div class="card shadow bg-white rounded">
				<i class="card-img-top fas fa-building text-center iconCard" alt="Card image cap"></i><span class="badge badge-pill qtdIconAtalho"><?php if ($widForn < 1) {echo 'vazio';} else {echo $widForn . ' itens';}?></span>
				<div class="card-body text-center">
					<p class="card-title">Fornecedores</p>
					<p class="card-text"></p>
					<a href="cadastra_forne" data-toggle="tooltip" data-placement="top" title="Novo" class="btn btn-success rounded-circle"><i class="fas fa-plus-square" style="color: #fff;"></i></a>
					<a href="listagem_total_forne" data-toggle="tooltip" data-placement="top" title="Listar todos" class="btn btn-info rounded-circle"><i class="fas fa-list-ol" style="color: #fff;"></i></a>
				</div>
			</div>
		</div><!-- fim Widget Fornecedores -->

	<div class="row text-center content" id="mAt" style="margin: 5px auto auto auto; display: none; padding: auto;">

		<!-- Widget Clientes -->
		<div class="col-xs-4 w-auto p-3" style="width: auto; margin: auto;">
			<div class="card shadow bg-white rounded">
				<i class="card-img-top fas fa-user-tag text-center iconCard" alt="Card image cap"></i><span class="badge badge-pill qtdIconAtalho"><?php if ($widCli < 1) {echo 'vazio';} else {echo $widCli . ' itens';}?></span>
				<div class="card-body text-center">
					<p class="card-title">Clientes</p>
					<p class="card-text"></p>
					<a href="cadastra_cliente" data-toggle="tooltip" data-placement="top" title="Novo" class="btn btn-success rounded-circle"><i class="fas fa-plus-square" style="color: #fff;"></i></a>
					<a href="listagem_total_cliente" data-toggle="tooltip" data-placement="top" title="Listar todos" class="btn btn-info rounded-circle"><i class="fas fa-list-ol" style="color: #fff;"></i></a>
				</div>
			</div>
		</div><!-- fim Widget Clientes -->

		<!-- Widget Materiais -->
		<div class="col-xs-4 w-auto p-3" style="width: auto; margin: auto;">
			<div class="card shadow bg-white rounded">
				<i class="card-img-top fab fa-creative-commons-remix text-center iconCard" alt="Card image cap"></i><span class="badge badge-pill qtdIconAtalho"><?php if ($widMtp < 1) {echo 'vazio';} else {echo $widMtp . ' itens';}?></span>
				<div class="card-body text-center">
					<p class="card-title">Materiais</p>
					<p class="card-text"></p>
					<a href="cadastra_mtp" data-toggle="tooltip" data-placement="top" title="Novo" class="btn btn-success rounded-circle"><i class="fas fa-plus-square" style="color: #fff;"></i></a>
					<a href="listagem_total_mtp" data-toggle="tooltip" data-placement="top" title="Listar todos" class="btn btn-info rounded-circle"><i class="fas fa-list-ol" style="color: #fff;"></i></a>
				</div>
			</div>
		</div><!-- fim Widget Materiais -->

		<!-- Widget Vendas -->
		<div class="col-xs-4 w-auto p-3" style="width: auto; margin: auto;">
			<div class="card shadow bg-white rounded">
				<i class="card-img-top fas fa-donate iconCard" alt="Card image cap"></i><span class="badge badge-pill qtdIconAtalho"><?php if ($widVen < 1) {echo 'vazio';} else {echo $widVen . ' itens';}?></span>
				<div class="card-body text-center">
					<p class="card-title">Vendas</p>
					<p class="card-text"></p>
					<a href="venda" data-toggle="tooltip" data-placement="top" title="Novo" class="btn btn-success rounded-circle"><i class="fas fa-plus-square" style="color: #fff;"></i></a>
					<a href="listagem_total_venda" data-toggle="tooltip" data-placement="top" title="Listar todos" class="btn btn-info rounded-circle"><i class="fas fa-list-ol" style="color: #fff;"></i></a>
				</div>
			</div>
		</div><!-- fim Widget Vendas -->

		<!-- Widget Cargos -->
		<div class="col-xs-4 w-auto p-3" style="width: auto; margin: auto;">
			<div class="card shadow bg-white rounded">
				<i class="card-img-top fas fa-user-md iconCard" alt="Card image cap"></i><span class="badge badge-pill qtdIconAtalho"><?php if ($widCargo < 1) {echo 'vazio';} else {echo $widCargo . ' itens';}?></span>
				<div class="card-body text-center">
					<p class="card-title">Cargos</p>
					<p class="card-text"></p>
					<a href="cadastra_cargo" data-toggle="tooltip" data-placement="top" title="Novo" class="btn btn-success rounded-circle"><i class="fas fa-plus-square" style="color: #fff;"></i></a>
					<a href="listagem_total_cargo" data-toggle="tooltip" data-placement="top" title="Listar todos" class="btn btn-info rounded-circle"><i class="fas fa-list-ol" style="color: #fff;"></i></a>
				</div>
			</div>
		</div><!-- fim Widget Cargos -->

		<!-- Widget Departamento -->
		<div class="col-xs-4 w-auto p-3" style="width: auto; margin: auto;">
			<div class="card shadow bg-white rounded">
				<i class="card-img-top fas fa-chalkboard-teacher iconCard" alt="Card image cap"></i><span class="badge badge-pill qtdIconAtalho"><?php if ($widDep < 1) {echo 'vazio';} else {echo $widDep . ' itens';}?></span>
				<div class="card-body text-center">
					<p class="card-title" style="font-size: 0.9em;">Departamentos</p>
					<p class="card-text"></p>
					<a href="cadastra_dep" data-toggle="tooltip" data-placement="top" title="Novo" class="btn btn-success rounded-circle"><i class="fas fa-plus-square" style="color: #fff;"></i></a>
					<a href="listagem_total_dep" data-toggle="tooltip" data-placement="top" title="Listar todos" class="btn btn-info rounded-circle"><i class="fas fa-list-ol" style="color: #fff;"></i></a>
				</div>
			</div>
		</div><!-- fim Widget Departamento -->

		<!-- Widget Perfil -->
		<div class="col-xs-4 w-auto p-3" style="width: auto; margin: auto;">
			<div class="card shadow bg-white rounded">
				<i class="card-img-top fas fa-user-circle iconCard" alt="Card image cap"></i><span class="badge badge-pill qtdIconAtalho" style="width: 100px;"><?php $nomeU = $_SESSION['nome'];
$nomeU = explode(" ", $nomeU);
echo $nomeU[0];?></span>
				<div class="card-body text-center">
					<p class="card-title">Meu Perfil</p>
					<p class="card-text"></p>
					<a href="perfil" data-toggle="tooltip" data-placement="top" title="Editar Perfil" class="btn btn-success fas fa-user-edit text-white rounded-circle" style="width: 40px; height: 40px; padding-top: 10px;"></a>
				</div>
			</div>
		</div><!-- fim Widget Perfil -->

	</div>

	</div><!-- row-->

</section>

<ul class="pagination justify-content-center" style="margin: auto;">
		<label id="verMais" class="text-center shadow p-1 mb-3 rounded text-white">Ver mais <i class="fontVer fas fa-chevron-circle-down text-white"></i></label>

		<label id="verMenos" class="text-center shadow p-1 mb-3 rounded text-white">Ver menos <i class="fontVer fas fa-chevron-circle-up text-white"></i></label>
	</ul>

<!--<p class="lead" style="margin-left: 30px; margin-right: 30px;">Funções em desenvolvimento, aguarde...</p>-->

<?php $conn->close();?>