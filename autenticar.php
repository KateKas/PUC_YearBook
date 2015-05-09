<?php
session_start();
if(empty($_SESSION['autenticado'])||($_SESSION['autenticado']!=true)){
  header("Location:./acessoNegado.php");
  die();
  }
?>