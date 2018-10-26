<?php

//session_start();

if ($nivelUser !== 1) {

	include 'includes/alertaSemPer.php';

	echo $alertaSess;

	include 'pages/inicio.php';

	return false;

} else {

	if (empty($_SESSION['itens'])) {
		$valor_carrinho = 0;
	} else {

		$valor_carrinho = 0;

		$valor_quantidade_unit = 0;

		$valor_carrinho_temp = 0;

		$valor_carrinho_total = 0;

		foreach ($_SESSION['itens'] as $item => $valorI):
			$valorQ = implode(',', $valorI);
			$valorQ = explode(',', $valorQ);

			$valor_unit_car = $valorQ[3] . '.' . $valorQ[4];

			$qtd_unit_car = $valorQ[5];

			$valor_quantidade_unit += $qtd_unit_car;

			$valor_carrinho += $valor_unit_car;

			$valor_carrinho_temp = $qtd_unit_car * $valor_unit_car;

			$valor_carrinho_total += $valor_carrinho_temp;

		endforeach;

		$_SESSION['valor_carrinho'] = $valor_carrinho_total;

	}

	?>

<div class="container-fluid">

<div class="total-carrinho text-right border border-success bg-success text-white pt-3 pb-0 row pl-5 pr-5" style="border-radius: 0px 0px 5px 5px;">

		<p style="font-size: 20px;" class="col-md-6 text-center"><button id="btnFinalVenda" class="btn btn-sm btn-success border-white" type="button" style="font-weight: 700;">FINALIZAR VENDA<i id="iconeBtnVenda" class="fas fa-hand-holding-usd text-white ml-2" style="font-size: 22px;"></i></button></p>
		<p style="font-size: 20px;" class="col-md-6 text-center mt-1"><span class="pr-3"><strong>Valor total:</strong></span> R$ <?php if (!empty($_SESSION['itens'])) {echo number_format($valor_carrinho_total, 2, ',', '');} else {echo 0;}?></p>
</div>

<script type="text/javascript">
	$('#btnFinalVenda').hover(
		function(){$(this).css({'background-color' : '#fff', 'color' : '#28A745', 'transiton' : '0.8s'}); $('#iconeBtnVenda').removeClass('text-white'); $('#iconeBtnVenda').addClass('text-success'); $('#iconeBtnVenda').css('transiton', '0.8s');},
		function(){$(this).css({'background-color' : '#28A745', 'color' : '#fff', 'transiton' : '0.8s'}); $('#iconeBtnVenda').removeClass('text-success'); $('#iconeBtnVenda').addClass('text-white');  $('#iconeBtnVenda').css('transiton', '0.8s');}
	);
</script>

</div>

<?php

} //else nivel

?>
