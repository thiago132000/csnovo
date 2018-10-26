<?php

if ($temaUser == 1) {

	?>

  <script type="text/javascript">
    var div = document.querySelector('#naveB');

    div.classList.remove('bg-dark');

    div.classList.remove('bg-iconPink');

    div.classList.add('bg-iconBlue2');

    $('.iconCard, .iconesMenu').css('color',"#007BFF");

    $('#verMais').css("background-color", "#007BFF");

    $('#verMenos').css("background-color", "#007BFF");

    $('.textos').css('color',"#007BFF");

    $('#tituloLista').css('background-color',"#007BFF");

    $('.qtdIconAtalho').css("background-color", "#DD2A28");

    $('.ativo').css("background-color", "#007BFF");

    //cores dos links da paginação
    $('.naoAtivo').css("color", "#007BFF");

    $('.tituloBackColor').removeClass('bg-iconBlack');
    $('.tituloBackColor').removeClass('bg-tema3');

    $('.tituloBackColor').addClass('bg-primary');

    $(document).ready(function(){

      $('#rodape').removeClass('bg-dark');
      $('#rodape').removeClass('bg-iconPink');
      $('#rodape').addClass('bg-iconBlue2');

    });

    $(document).ready(function(){
      $('.modal-header').removeClass('bg-dark');
      $('.modal-header').removeClass('bg-iconPink');
      $('.modal-header').addClass('bg-iconBlue2');
    });

    $(document).ready(function(){

      $('.listagemLimit').removeClass('bg-iconBlack2');
      $('.listagemLimit').removeClass('bg-iconPink2');
      $('.listagemLimit').addClass('bg-iconBlue');

    });

    $(document).ready(function(){
      $(".icEditar").removeClass("text-primary");
      $(".icEditar").addClass("naoAtivo");
    });

    $(document).ready(function(){
      $('.card').hover(
        function(){$(this).addClass("border-primary"); $(this).css("transform", "scale(1.1)");},
        function(){$(this).removeClass("border-primary"); $(this).css("transform", "scale(1)");})
    });

    $(document).ready(function(){

      $('#fundoTabCinza').css("background-color", "#E9ECEF");
      $('.fundoTabCinza').css("background-color", "#E9ECEF");

      $('table').removeClass("table-dark");
      $('#tabelas').removeClass("thead-dark");
      $('table').addClass("table-light");
      $('#tabelas').addClass("thead-light");

    });

    $(document).ready(function(){
      $('.theadBusca').removeClass('bg-tema3');
      $('.theadBusca').removeClass('bg-dark');
      $('.theadBusca').addClass('bg-primary');
    });

    $(document).ready(function(){
      $('.inputQtdPVenda').css({'border-bottom' : '1px solid #000', 'color' : '#000'});
      $('.inputDestravar').css({'border-color' : 'solid #000', 'color' : '#000'});
      $('.inputDestravarButton i').css({'font-size' : '20px', 'color' : '#000'});
      $('.inputDestravarButton2 i').css({'font-size' : '20px', 'color' : '#28A745'});
    });

    $(document).ready(function(){
      $('.theadProdVenda').addClass('bg-iconBlue2');
      $('.theadProdVenda').removeClass('bg-dark');
      $('.theadProdVenda').removeClass('bg-iconPink');
    });

  </script>

  <?php

} else if ($temaUser == 2) {

	?>

  <script type="text/javascript">

        //tira a classe e troca do navbar
        var div = document.querySelector('#naveB');

        div.classList.remove('bg-iconBlue2');

        div.classList.remove('bg-iconPink');

        div.classList.add('bg-dark');

        $('#verMais').css("background-color", "#343A40");

        $('#verMenos').css("background-color", "#343A40");

        $('.iconCard, .iconesMenu').css('color',"#343A40");
        $('.textos').css('color',"#343A40");
        $('#tituloLista').css('background-color',"#343A40");

        $('.qtdIconAtalho').css("background-color", "#DD2A28");

        $('.ativo').css("background-color", "#343A40");

        //cores dos links da paginação
        $('.naoAtivo').css("color", "#343A40");

        $('.tituloBackColor').removeClass('bg-tema3');
        $('.tituloBackColor').removeClass('bg-primary');

        $('.tituloBackColor').addClass('bg-iconBlack');

        $(document).ready(function(){

          $('#rodape').removeClass('bg-iconBlue2');
          $('#rodape').removeClass('bg-iconPink');
          $('#rodape').addClass('bg-dark');

        });

        $(document).ready(function(){
          $('.modal-header').removeClass('bg-iconBlue2');
          $('.modal-header').removeClass('bg-iconPink');
          $('.modal-header').addClass('bg-dark');
        });

        $(document).ready(function(){

          $('.listagemLimit').removeClass('bg-iconBlue');
          $('.listagemLimit').removeClass('bg-iconPink2');
          $('.listagemLimit').addClass('bg-iconBlack2');

        });

        $(document).ready(function(){

          $(".icEditar").removeClass("naoAtivo");
          $(".icEditar").addClass("text-primary");
        });

        $(document).ready(function(){
          $('.card').hover(
            function(){$(this).addClass("border-dark"); $(this).css("transform", "scale(1.1)");},
            function(){$(this).removeClass("border-dark"); $(this).css("transform", "scale(1)");})
        });

        $(document).ready(function(){

          $('#fundoTabCinza').css("background-color", "#212529");
          $('.fundoTabCinza').css("background-color", "#212529");

          $('table').removeClass("table-light");
          $('#tabelas').removeClass("thead-light");
          $('table').addClass("table-dark");
          $('#tabelas').addClass("thead-dark");

        });

        $(document).ready(function(){
          $('.theadBusca').removeClass('bg-tema3');
          $('.theadBusca').removeClass('bg-primary');
          $('.theadBusca').addClass('bg-dark');
        });

        $(document).ready(function(){
          $('.inputQtdPVenda').css({'border-bottom' : '1px solid #fff', 'color' : '#fff'});
          $('.inputDestravar').css({'border-color' : 'solid #fff', 'color' : '#fff'});
          $('.inputDestravarButton i').css({'font-size' : '20px', 'color' : '#fff'});
          $('.inputDestravarButton2 i').css({'font-size' : '20px', 'color' : '#28A745'});
        });

        $(document).ready(function(){
          $('.theadProdVenda').addClass('bg-dark');
          $('.theadProdVenda').removeClass('bg-iconBlue2');
          $('.theadProdVenda').removeClass('bg-iconPink');
        });

      </script>

      <?php

} //fim else

else if ($temaUser == 3) {

	?>

  <script type="text/javascript">

        //tira a classe e troca do navbar
        var div = document.querySelector('#naveB');

        div.classList.remove('bg-iconBlue2');

        div.classList.remove('bg-dark');

        div.classList.add('bg-iconPink');

      //$('#naveB').css("background-color","#2A2C71");

      $('#verMais').css("background-color", "#84043A");

      $('#verMenos').css("background-color", "#2A2C71");

      $('.qtdIconAtalho').css("background-color", "#878785");

      $('.iconCard, .iconesMenu').css('color',"#84043A");
      $('.textos').css('color',"#2A2C71");
      $('#tituloLista').css('background-color',"#2A2C71");

      $('.ativo').css("background-color", "#2A2C71");

      //cores dos links da paginação
      $('.naoAtivo').css("color", "#2A2C71");

      $('.tituloBackColor').removeClass('bg-iconBlack');
      $('.tituloBackColor').removeClass('bg-primary');

      $('.tituloBackColor').addClass('bg-tema3');

      $(document).ready(function(){

        $('#rodape').removeClass('bg-iconBlue2');
        $('#rodape').removeClass('bg-dark');
        $('#rodape').addClass('bg-iconPink');

      });

      $(document).ready(function(){
        $('.modal-header').removeClass('bg-iconBlue2');
        $('.modal-header').removeClass('bg-dark');
        $('.modal-header').addClass('bg-iconPink');
      });

      $(document).ready(function(){

        $('.listagemLimit').removeClass('bg-iconBlue');
        $('.listagemLimit').removeClass('bg-iconBlack2');
        $('.listagemLimit').addClass('bg-iconPink2');

      });

      $(document).ready(function(){

        $(".icEditar").removeClass("text-primary");
        $(".icEditar").addClass("naoAtivo");
      });

      $(document).ready(function(){
        $('.card').hover(
          function(){$(this).addClass("border-iconPink"); $(this).css("transform", "scale(1.1)");},
          function(){$(this).removeClass("border-iconPink"); $(this).css("transform", "scale(1)");})
      });

      $(document).ready(function(){

        $('#fundoTabCinza').css("background-color", "#E9ECEF");
        $('.fundoTabCinza').css("background-color", "#E9ECEF");

        $('table').removeClass("table-dark");
        $('#tabelas').removeClass("thead-dark");
        $('table').addClass("table-light");
        $('#tabelas').addClass("thead-light");

      });

      $(document).ready(function(){
        $('.theadBusca').removeClass('bg-dark');
        $('.theadBusca').removeClass('bg-primary');
        $('.theadBusca').addClass('bg-tema3');
      });

      $(document).ready(function(){
        $('.inputQtdPVenda').css({'border-bottom' : '1px solid #000', 'color' : '#000'});
        $('.inputDestravar').css({'border-color' : 'solid #000', 'color' : '#000'});
        $('.inputDestravarButton i').css({'font-size' : '20px', 'color' : '#000'});
        $('.inputDestravarButton2 i').css({'font-size' : '20px', 'color' : '#28A745'});
      });

      $(document).ready(function(){
          $('.theadProdVenda').addClass('bg-iconPink');
          $('.theadProdVenda').removeClass('bg-iconBlue2');
          $('.theadProdVenda').removeClass('bg-dark');
      });

    </script>

    <?php

} //fim else

?>