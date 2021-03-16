<?php
  //onde está o arquivo e a class
  require_once 'conexao_bd.php'
  //instanciar uma classe
  $u = new Usuario;
?>


<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title> Armanezamento de TCCs/login </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!---CSS -->
    <link rel="stylesheet" type="text/css" href="style.css">

    <!--JS-->
    <link rel="stylesheet" type="text/js" href="funcao.js">

    <!--- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--JS-->
    <script src="arquivo.js"></script>


  </head>

  <body>
    <header>
      <div class="menu">
        <!--LOGO ou Nome-->
        <img src="tcclogo.png" id="Icon" width=6%>
        <!--Menu-->
        <nav>
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="#">Sobre</a></li>
            <li><a href="#">Cursos</a></li>
            <li><a id="entrar" href="login.php">Entrar</a></li>
          </ul>
        </nav>
        <div class="pesquisa">
          <input type="text" id="busca" placeholder="Pesquise aqui">
          <button type="button" name="busque">Buscar</button>
        </div>
      </div>
    </header>

    <main class="fundo">

      <h1 id="titulo"> Cadastro</h1>
      <p id="subtitulo">Preencha com as suas informações</p>
      <!--Formulário-->
      <form name="cadastrar_user" method="POST" action="conexao_bd.php" onsubmit="return validaForm(this);">
        <fieldset class="grupo">
          <div class="cadastro">
            <div class="form-group">
              <!--Nome -->
              <label for="NomeUsuario"><strong>Nome:</strong></label>
              <input type="text" name="nome" id="name " class="form-control" placeholder="Digite seu nome completo" maxlength="30">
              <small class="form-text text-muted"> Digite seu nome completo.</small>
            </div>

            <div class="check">
              <p>Sexo:
                <label><input type="radio" name="sexo" value="M" id="masc" /> Masculino</label>
                <label><input type="radio" name="sexo" value="F" id="masc" /> Feminino</label>
              </p>
            </div>

            <div class="form-group" >
              <!--CPF -->
              <label for="CPF"> CPF:</label>
              <input type="text" class="form-control cpf-mask" placeholder="Ex.: 000.000.000-00" maxlength="14">
              <small class="form-text text-muted"> Digite seu o seu CPF.</small>
            </div>

            <div class="form-group">
              <!--Data de Nascimento -->
              <label for="DataDeNascimento"> Data de Nascimento:</label>
              <input type="date" name="DataDeNascimento" class="form-control" >
              <small class="form-text text-muted"> Digite sua a data de nascimento.</small>
            </div>

            <div class="form-group">
              <!--telefone-->
              <label for="Telefone"> Telefone:</label>
              <input type="text" class="form-control phone-ddd-mask" placeholder="Ex.: (00) 0000-0000" />
              <small class="form-text text-muted"> Digite seu telefone.</small>
            </div>


            <div class="check">
              <!--Turma -->
              <label for="Turma"> Turma:</label>
              <select name:"Turma">
                <option valeu="">Selecione uma turma</option>
                <option value="1">1° ano</option>
                <option value="2">2° ano</option>
                <option value="3">3° ano</option>
                <option value="4">4° ano</option>
              </select>
            </div>

            <div class="check">

              <!--Curso -->
              <label for="Curso"> Curso:</label>
              <select name:"Curso">
                <option valeu="">Selecione um Curso</option>
                <option value="inf">Informática</option>
                <option value="cont">Contabilidade</option>
                <option value="edif">Edificações</option>
                <option value="gestao">Gestão Comercial</option>
                <option value="sistema">Sistemas de Internet </option>
              </select>
            </div>

            <div class="form-group">
              <!--Instituição -->
              <label for="Instituição"> Instituição:</label>
              <input type="text" name="Instituição" class="form-control">
              <small class="form-text text-muted"> Digite a Instituição que frequenta.</small>
            </div>


            <div class="form-group">
              <!--Email  -->
              <label for="E-mail"> E-mail:</label>
              <input type="text" name="email" id="email" class="form-control"maxlength="40">
              <small class="form-text text-muted"> Digite seu nome e-mail.</small>
            </div>

            <div class="form-group">
              <!--Senha -->
              <label for="senha"> Senha:</label>
              <input type="password" name="senha" id="senha" class="form-control" maxlength="32">
              <small class="form-text text-muted"> Digite sua senha.</small>
            </div>

            <!--Digite a senha novamente-->
            <div class="form-group">
              <!--Senha -->
              <label for="senha"> Confirme sua senha:</label>
              <input type="password" name="confsenha" id="confsenha" class="form-control" onblur="validarSenha('senha','confsenha')" maxlength="32">
              <small class="form-text text-muted"> Digite novamente sua senha</small>
            </div>
            </p><label><input type="submit" name="sbt" value="Prosseguir" /></label></p>


          </div>
        </fieldset>

      </form>

      <?php
        //chamar o método post com os 'name' do formulario
        if (isset ($_POST ['cadastrar_user'])){ //addslashes = protege de codigos maliciosos
          $nome = addslashes $_POST ['nome'];
          $email = addslashes $_POST ['email'];
          $senha = addslashes $_POST ['senha'];

          //verificar se não está vazio
          if(!empty($nome) && !empty($email) && !empty($senha)) {
            //conecta com o banco
            $u -> conectar ("tcc_login", "localhost", "root", "" ); //o ultimo é senha
            if ($u ->msgErro == "") {
              //se não tiver erro, pode cadastrar
              if ($senha == $confimarSenha){
                  if ($u -> cadastrar ($nome, $email, $senha)){
                    ?>
                    <div class="msg"> "Cadastrado com sucesso! Logue para acessar."</div>
                <?php
                  } else{
                  ?>
                    <div class="msg"> "Email já cadastrado"<div>
                  <?php
                  }
              }else{
                ?>
                  <div class="msg"> "Senha e confimar Senha estão diferentes." </div>
              <?php
              }

            }else{
            ?>
                <div class="msg"> ?><?php "Erro: ".$u ->msgErro; ?> </div>
            }
            <?php
          } else {
            ?>
            <div class="msg"> "Preencha todos os campos, por favor!"
          <?php
          }

        }
      ?>


    </main>

  </body>

</html>
