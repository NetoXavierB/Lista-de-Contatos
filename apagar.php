<?php
require_once "banco.php";
session_start();
$id = filter_input(INPUT_GET , 'id', FILTER_SANITIZE_NUMBER_INT);
$sql = "delete FROM contatos WHERE id=$id";
$result = getConnection()->query($sql);
if($result->execute()){
  $_SESSION['msg'] = "Contato apagado com sucesso!</p>";
  header("Location: listar.php");
}else{
  echo "Falha ao apagar!";
}
