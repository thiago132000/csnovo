<?php

$alertaSess = '<div style="margin-top: 40px; margin-left: -15px; margin-bottom: -30px; position: fixed; top: 20px; width: 100%; z-index: 995;" class="alert alert-danger bg-danger text-white border border-danger alert-dismissible fade show text-center shadow container" role="alert">
	<small class="text-center" style="font-size: 1.03em;"><span class="far fa-thumbs-down mr-2 text-white"></span>Você não tem permissao para essa ação!</small><button type="button" class="close text-white" data-dismiss="alert" aria-label="Close" style="transform: scale(1.5); margin-top: -3px;" id="closeAlerta">
	<span aria-hidden="true">&times;</span>
	</button>
	</div>' . '<script type="text/javascript">
        setTimeout(function(){

          $(".alert").slideToggle(700);

        }, 4000);
      </script>' . '<script type="text/javascript">
        setTimeout(function(){

          $("#closeAlerta").click();

          }, 4050);
      </script>';

?>