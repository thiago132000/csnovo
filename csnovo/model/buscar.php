<?php

$puxaPesquisa = htmlspecialchars($_POST['buscar']);

if($puxaPesquisa == "' or 1=1" || $puxaPesquisa == "' or 1=1--" || $puxaPesquisa == "' or 1=1 --" || $puxaPesquisa == "'or 1=1"){

	?>

	<script type="text/javascript">

	alert("Ta achando que é STF fdp!!!");
	window.location.href='../inicio';

</script>

<?php

}else if($puxaPesquisa != ""){	 
	
	$puxaBancoCar = mysqli_query($conn, "SELECT * FROM cargo WHERE cargo.desc_cargo LIKE '%".$puxaPesquisa."%'");

	$puxaBancoCli = mysqli_query($conn, "select * from cliente where cliente.nome_cli like  '%".$puxaPesquisa."%' OR cliente.tel_cli like '%".$puxaPesquisa."%' OR cliente.email_cli like '%".$puxaPesquisa."%' OR cliente.cpf_cli like '%".$puxaPesquisa."%' OR cliente.cnpj_cli like '%".$puxaPesquisa."%'");

	$puxaBancoDer = mysqli_query($conn, "SELECT * FROM departamento WHERE departamento.nome_dep LIKE '%".$puxaPesquisa."%'");

	$puxaBancoEsM = mysqli_query($conn, "select   estoque_mtp.*, mtp.* from   estoque_mtp inner Join mtp ON estoque_mtp = mtp.id_mtp where estoque_mtp.qtd_est_mtp like '%".$puxaPesquisa."%' OR estoque_mtp.qtd_est_mtp like '%".$puxaPesquisa."%' OR estoque_mtp.valor_total like '%".$puxaPesquisa."%' OR mtp.desc_mtp like  '%".$puxaPesquisa."%'");


	$puxaBancoEsP = mysqli_query($conn, "select estoque_prod.*, produto.* from estoque_prod inner JOIN produto ON estoque_prod.id_prod = produto.id_prod where estoque_prod.qtd_est_prod like '%".$puxaPesquisa."%' OR estoque_prod.qtd_entrada like '%".$puxaPesquisa."%' OR estoque_prod.valor_venda like '%".$puxaPesquisa."%' OR estoque_prod.valor_venda like '%".$puxaPesquisa."%' OR estoque_prod.valor_total like '%".$puxaPesquisa."%' OR produto.nome_prod like '%".$puxaPesquisa."%'");

	$puxaBancoFor = mysqli_query($conn, "select * from fornecedor where fornecedor.nome_for like '%".$puxaPesquisa."%' OR fornecedor.tel_for like '%".$puxaPesquisa."%' OR fornecedor.email_for like '%".$puxaPesquisa."%' OR fornecedor.cnpj_for like '%".$puxaPesquisa."%'");

	$puxaBancoFu = mysqli_query($conn, "select funcionario.*, turno.*, cargo.*, escala.*, departamento.* from funcionario inner join turno ON funcionario.turno = turno.id_turno inner join cargo ON cargo.id_cargo = funcionario.id_cargo inner join escala ON escala.id_esc = funcionario.escala inner join departamento ON departamento.id = funcionario.departamento where funcionario.nome_func like '%".$puxaPesquisa."%' OR funcionario.end_func like '%".$puxaPesquisa."%' OR funcionario.tel_func like '%".$puxaPesquisa."%' OR funcionario.email_func like '%".$puxaPesquisa."%' OR funcionario.salario like '%".$puxaPesquisa."%' OR funcionario.cpf_func like '%".$puxaPesquisa."%' OR turno.desc_turno like '%".$puxaPesquisa."%' OR cargo.desc_cargo like '%".$puxaPesquisa."%' OR escala.desc_esc like '%".$puxaPesquisa."%' OR departamento.nome_dep like '%".$puxaPesquisa."%'");

	$puxaBancoMtp = mysqli_query($conn, "SELECT * FROM mtp WHERE mtp.desc_mtp LIKE '%".$puxaPesquisa."%'");

	$puxaBancoPro = mysqli_query($conn, "SELECT * FROM produto WHERE produto.nome_prod LIKE '%".$puxaPesquisa."%'");
	
	
	
	
	@$resultadosCar = mysqli_num_rows($puxaBancoCar);

	@$resultadosCli = mysqli_num_rows($puxaBancoCli);

	@$resultadosDer = mysqli_num_rows($puxaBancoDer);

	@$resultadosEsM = mysqli_num_rows($puxaBancoEsM);
	
	@$resultadosEsP = mysqli_num_rows($puxaBancoEsP);	

	@$resultadosFor = mysqli_num_rows($puxaBancoFor);

	@$resultadosFu = mysqli_num_rows($puxaBancoFu);

	@$resultadosMtp = mysqli_num_rows($puxaBancoMtp);

	@$resultadosPro = mysqli_num_rows($puxaBancoPro);

	?>	

<?php }else{ 
	?>

 	<script type="text/javascript">

	alert("Digite Algo!!!");
	window.location.href='../inicio';

</script>

<?php } ?>