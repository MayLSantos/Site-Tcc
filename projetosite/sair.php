<?php
  session_start();
  unset ($_SESSION['id_usuario']); //destruir sessão
  header("location:login.php");

 ?>
