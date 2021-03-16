<!--bloquear acesso para url-->

<?php

  session_start ();
  if (!isset ($_SESSION ['id_usuario'])){
    header ("location: login.php")
    exit; //não executar nada que estiver posterior
  }


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Perfil </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!---CSS--->
    <link rel ="stylesheet" type="text/css" href="style.css">

    <!--JS-->
    <link rel="stylesheet" type="text/js" href="funcao.js">

    <!--- Bootstrap -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>

    <header>
      <div class="menu">
        <!--LOGO ou Nome-->
        <img src="tcclogo.png" id="Icon" width= 6%>
        <!--Menu-->
        <nav>
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="#">Projeto</a></li>
            <li><a href="#">Sobre</a></li>


          </ul>
        </nav>
        <div class="pesquisa">
          <input type="text" id="busca" placeholder="Pesquise aqui">
          <button type="button" name="busque">Buscar</button>
        </div>
        <ul>
            <li><a id="Sair" href="sair.php">Sair</a></li>
        </ul>

      </div>
    </header>

    <main>

        <!--Ambiente do peril-->
        <div class="parte1">

          <label> Dados pessoais </label>

        </div>

        <button type="button" name="tccPublic" id="publiTcc">
           <a href="formulario.html" id="publiTcc"> Publicar um Tcc  </a>
         </button>

        <div class="parte2">

        </div>


    </main>

  </body>
</html>
