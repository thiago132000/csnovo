  </header>
  <footer id="rodape" class="footer footer-busca">
    <div class="container">
      <span class="text-white lh-100">&copy; 2018. Classe Sport - Colchonetes Esportivos</span>
    </div>
  </footer>

  <script src="../node_modules/popper.js/dist/umd/popper.js"></script>

  <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>

  <script src="../scripts/js/somatotal.js"></script>

  <script src="../scripts/js/sair.js"></script>

  <!-- Muda o titulo conforme a página solicitada -->
  <script type="text/javascript">
    $('#nomePag').html("<?php echo $titulo; ?> | Classe Sport");
  </script><!-- FIM Muda o titulo conforme a página solicitada -->

  <!-- Ação down/up Lista de Estoque de Produtos -->
  <script src="../scripts/js/down-up-lista.js"></script><!-- Fim Ação down/up Lista de Estoque de Produtos -->

  <script src="../scripts/js/down-up-his.js"></script>

  <script src="../scripts/js/down-up-maisAtalhos.js"></script>

  <script src="../scripts/js/fecharMensagens.js"></script><!-- mensagens de delete -->

  <script src="../scripts/js/open_hide_acoes.js"></script>

  <!-- Habilita ToolTip do Bootstrap -->
  <script>

    $(function () {

      $('[data-toggle="tooltip"]').mouseenter(function(){

        $(this).tooltip('toggle');

      });

      $('[data-toggle="tooltip"]').click(function(){

        $(this).tooltip('hide');

      });

      $('[data-toggle="tooltip"]').mouseleave(function(){

        $(this).tooltip('hide');

      });

    });
  </script>