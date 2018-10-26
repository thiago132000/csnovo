<?php require 'banco/conexao.php';?>

<section id="historicoW">

		<div class="shadow">
		<a class="list-group-item list-group-item-action flex-column shadow-sm box-shadow listagemLimit align-items-start rounded" style="font-size: 1.1em;"><h5 class="mb-1 ml-4 text-white">Ultimas alterações</h5> <small style="position: absolute; right: 0; margin-top: -27px;"><i id="hisBaixo" class="fas fa-chevron-circle-down iIcone rounded-circle"></i>

			<i id="hisAlto" class="fas fa-chevron-circle-up iIcone rounded-circle"></i></small>
		</a>

		<section class="historico" style="display: none;">
			<?php

//terminar
$buscar = ("SELECT * FROM hist ORDER BY id_h DESC LIMIT 5");

if (!$stmt = $conn->prepare($buscar)) {
	die("Erro : " . $conn->erro);
}

$stmt->execute();

$result = $stmt->get_result();

if (!$result->num_rows == 0) {

	while ($linha = $result->fetch_assoc()) {

		?>

			<li class="list-group-item text-center linhaHist border border-plus"><h5 style="font-size: 1.3em;" data-toggle="tooltip" data-placement="top" title="Login que fez a ação!"><?php echo $linha['login_alt']; ?></h5> <small style="font-size: 1em;"><a data-toggle="tooltip" data-placement="top" title="Descrição" style="color: red;">Ação:</a> <?php echo $linha['acao_h']; ?> | <a data-toggle="tooltip" data-placement="top" title="Momento da ação!" style="color: red;">Data/Hora:</a> <?php $dataBanco = date("d/m/Y" . " - " . "H:i:s", strtotime($linha['data_hora']));
		echo $dataBanco;?></small></li>

		<?php

	}

	?>

	<li class="list-group-item text-center border border-plus">
				 <div class="w-100 ">
                <a href="listagem_total_hist"><h5 class="text-center linkVerTodos naoAtivo" style="font-size: 1.1em; margin-top: 3px;">Ver todo o histórico...</h5></a>

              	</div>
			</li>

	<?php

} else {

	?>

<li class="list-group-item text-center border border-plus" style="font-size: 1em; color: #9B9D9F;">Histórico vazio</li>

<?php

}

?>

		</section>

	</div>

</section>

<?php $conn->close();?>