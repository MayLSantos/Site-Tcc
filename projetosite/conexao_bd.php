<?php

  class Usuario {

    private $pdo;

    public function conectar ($nome, $host, $usuario, $senha){

      global $pdo;
      try{
        $pdo = new PDO ("mysql:dbname=".$nome.";host=".$host, $usuario, $senha);
      } catch (PDOException $e){
        $msgErro = $e -> getMessage(); //caso há erro, armazena na variável
      }

    }

    public function cadastrar ($nome, $email, $senha){

      global $pdo;
      //verificar se já existe o email cadastrado
      $sql = $pdo -> prepare ("SELECT id_usuario FROM usuarios WHERE email =:e");
      //vincular :e á email
      $sql ->bindValue(":e", $email);
      $sql -> execute();

      if ($sql -> rowCount() > 0)
      {
          return false; //já está cadastrado

      } else {
          $sql  = $pdo -> prepare(" INSERT INTO usuarios (nome, email, senha) VALUES (:n, :e, :s)") //especificar qual coluna inserir
          //colocar cada coluna
          $sql ->bindValue(":n", $nome);
          $sql ->bindValue(":e", $email);
          $sql ->bindValue(":s", md5($senha)); //md5 = criptografar
          $sql -> execute();
          return true; //cadastrado com sucesso
      }

    }

    public function logar ($nome, $senha){

      global $pdo;
      //verificar se está cadastrado
      $sql = $pdo -> prepare ("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
      $sql -> bindValue(":e", $email);
      $sql -> bindValue(":s", md5($senha));
      $sql -> execute();
      //condição pelo id_usuario (se o id for maior que 0)
      if ($sql -> rowCount() > 0) {

        //transformar a infomações do bd em Array (dado =variavel)
        $dado = $sql -> fetch(); // função que transforma
        session_start(); //iniciar uma sessão
        $_SESSION ['id_usuario'] =  $dado ['id_usuario'];
        //ninguém mais vai acessar apenas o usuario
        return true;

      } else {
        return false;
        //echo "Se cadastre, por favor"
      }


    }

  }


 ?>
