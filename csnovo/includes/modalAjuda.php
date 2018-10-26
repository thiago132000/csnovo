
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="min-width: 500px; border-radius: 10px;">
      <div class="modal-header rounded-top" style="border-radius: 15px 15px 10px 10px">
        <h5 class="modal-title text-white" id="exampleModalCenterTitle"><i class="far fa-question-circle text-white mr-3 ml-4" style="transform: scale(1.2);"></i><?php echo $tituloModal; ?></h5>
        <a class="close col-1 active" data-dismiss="modal" aria-label="Close" style="transform: scale(1.5); margin-right: 3px; z-index: 999; color: #FF0000;">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <div class="modal-body text-dark text-left" style="transform: scale(1.3); <?php echo $padding; ?>">
    	<?php echo $textoModal; ?>
      </div>
      <div class="modal-footer">
        <a class="btn btn-primary rounded shadow-lg m-auto text-white" data-dismiss="modal" style="z-index: 999;">Ok</a>
      </div>
    </div>
  </div>
</div>

