<?php
  //onde está o arquivo e a class
  require_once 'conexao_bd.php'
  //instanciar uma classe
  $u = new Usuario; //chamar a classe
?>

<html>

  <head>
    <meta charset="utf-8">
    <title> Login </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!---CSS -->
    <link rel ="stylesheet" type="text/css" href="style.css">

    <!--JS-->
    <link rel="stylesheet" type="text/js" href="funcao.js">

    <!--- Bootstrap -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>

  <body class="fundo">
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
            <li><a id="entrar" href="login.html">Entrar</a></li>
          </ul>

        </nav>
        <div class="pesquisa">
          <input type="text" id="busca" placeholder="Pesquise aqui">
          <button type="button" name="busque">Buscar</button>
        </div>
      </div>
    </header>

    <main>
      <div class="entrada">
        <form method="POST" class="login" action="conexao_bd" name ="login">

          <h2 id="tituloform">Login</h2>
          <div class="entradaform">
            <label>Email</label>
            <input type="email" name="email" placeholder="Digite o seu email" required = "required">
          </div>
          <div class="entradaform">
            <label>Senha</label>
            <input type="password" name="senha" placeholder="Digite a sua senha" required = "required">
          </div>

          <div class="entradaform-check">
            <input type="checkbox" checked="checked" name="lembrar" class="checklogin">
            <label class="checklogin">Lembre-me da senha </label>
          </div>

          <div class="entradaform">
            <button type="button" id="botão" >
              <a href="perfil.html"> Acessar </a> </button>
            <div id="click"> Ainda não tem conta? <a href="cadastro.php"> Se cadastrar </a> </div>
          </div>

        </form>
      </div>
    </main>
    <!--<div class="card">
      <form method="POST" class="login" action="#">
        <div class="card-top">
            <h2 class="titlogin">Login</h2>
          </div>
          <div class="card-group">
            <label> EMAIL</label>
            <input type="email" name="email" placeholder="Digite seu email" required />
          </div>
          <div class="card-group">
            <label>SENHA</label>
            <input type="password" name="senha" placeholder="Digite sua senha" required />
          </div>
          <div class="card-group">
            <label> <input type="checkbox"> Lembre-me  </label>
          </div>
          <div class="card-group">
            <button type="submit"> Acessar</button>
          </div>
      </form>
      <div class="entrada">
        <form method="post" class="login" action="#">
          <div>
          </div>
          Email: <input type="text" name="usuário" required>
          Senha: <input type="password" name="senha" required>
          <button type="submit" id="botão"> Entrar</button>
          <a href="cadastro.html" id="click" > Se cadastrar </a>
        </form>
      </div>
    </div>-->

    <?php

      if (isset ($_POST ['login'])){ //addslashes = protege de codigos maliciosos
        $email = addslashes $_POST ['email'];
        $senha = addslashes $_POST ['senha'];

        //verificar se não está vazio
        if(!empty($email) && !empty($senha)) {
          //conecta com o banco
            $u -> conectar ("tcc_login", "localhost", "root", "" ); //o ultimo é senha
            if ($u ->msgErro == "") { //msgErro esta na classe
              if($us -> logar($emal, $senha)){
                header ("location: perfil.php") //encaminhar para a area do perfil (area privada)
              }else{ ?>

                <div class="msg"> "Email ou senha incorretos" </div>

              <?php
              }

            }else{ ?>
              <div class="msg"> ?><?php "Erro: ".$u ->msgErro; ?> </div>
            <?php
            }

        }else { ?>

          <div class="msg"> "Preencha tudo corretamente" </div>

        <?php
        }


     ?>




  </body>
</html>
