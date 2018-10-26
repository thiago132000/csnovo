<?php 

require "../banco/conexao.php";

$codEx = $_GET['codEx'];

if(!mysqli_query($conn, "DELETE FROM estoque_prod WHERE id_est_prod='$codEx'")){

	echo '
	<script type="text/javascript">	
	window.location.href="../home.php?msg=estoque-produto-erro-excluir"; 		
	</script>';

}else{	

	echo'
	<script type="text/javascript">window.location.href="../home.php?msg=estoque-produto-excluido"; 		
	</script>';

} 

?>

