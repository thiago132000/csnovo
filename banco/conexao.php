<?php 

	// as váriaveis abaixo fazem a chamada das ações
	// que serão necessárias para a conexão com o banco
	$servidor = "localhost";
	$login	  = "root";
	$senha	  = "";
	$dbname	  = "dbclassesport";

	// a linha abaixo instancia uma nova conexão
	$conn = new mysqli($servidor, $login, $senha, $dbname);

	// a linha abaixo pega a poisicao do erro no vetor, mostra quem esta errado
	if($conn->connect_error){

		// a linha abaixo para no erro mostrando o motivo
		die("Falha na conexão: ".$conn ->connect_error);
	}

	//echo "<script>alert('Banco_Conectado')</script>";

	// a linha abaixo prossegue o sistema 
	echo("". nl2br(PHP_EOL));

 ?>