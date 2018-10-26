<?php
//a variavel atual, vai receber o que estiver na variável pag
//se não tiver nada, ela recebe o valor: principal“”
$atual = (isset($_GET['pag'])) ? $_GET['pag'] : 'inicio';

//aqui setamos um diretório onde ficarão as páginas internas do site
$pasta = 'pages';

//vamos testar se a variável pag possui alguma “/”
//ou seja, caso a url seja: /noticia/2
if (substr_count($atual, '/') > 0 && $pasta === 'pages') {
	//utilizamos o explode para separar os valores depois de cada “/”
	$atual = explode('./', $atual);
	/*testamos se depois do endereço do site, o valor da página é um arquivo existente
		caso não exista, iremos atribuir o valor “erro” que será uma página de erro
	*/
	$chama = (file_exists("{$pasta}/" . $atual[0] . '.php')) ? $atual[0] : 'error';
	//ao que tiver depois da segunda “/” atribuiremos a variavel $id
	$id = $atual[1];
	//ao que tiver depois da terceira “/” atribuiremos a variavel $busca
	//$busca = @$atual[2];

} else {

	$chama = (file_exists("{$pasta}/" . $atual . '.php')) ? $atual : 'error';
	//$id = 0;
	//$frame = 0;

}

?>