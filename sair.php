<?php

 if(isset($_REQUEST['sair'])){

	SESSION_DESTROY();

	session_unset(['donoDaSessao']);
	session_unset(['login']);
	session_unset(['senha']);
	session_unset(['nome']);

	echo "<script type='text/javascript'>window.location.replace('index.php?deslogado=true');</script>";

}

 ?>


