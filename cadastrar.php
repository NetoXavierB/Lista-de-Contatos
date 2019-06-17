<?php
    require_once "banco.php";

    $email = $_POST['email'];
    $nome = $_POST['nome'];
    $apelido = $_POST['apelido'];
    $telefone = $_POST['telefone'];


    //verificação
    //NOME
    if(empty($nome)){
      die("Nome obrigatório!");
    }
    $tamNome = strlen($nome);
    if($tamNome > 20){
      die("Insera um nome menor que 20 caracteres.");
    }
    //APELIDO
    $tamApelido = strlen($apelido);
    if($tamApelido > 20){
      die("Insera um apelido menor que 20 caracteres.");
    }
    //EMAIL
    if(empty($email)){
      die("Email obrigatório!");
    }
    $tamEmail = strlen($email);
    if($tamEmail > 30){
      die("Insera um email menor que 30 caracteres.");
    }
    //TELEFONE
    if(empty($telefone)){
      die("Telefone obrigatório!");
    }
    $tamTel = strlen($telefone);
    if($tamTel > 14){
      die("Insera um telefone menor que 14 caracteres.");
    }

    $username = 'root';
    $password = '';

    try{

      $sql = 'INSERT INTO contatos (nome,apelido,telefone,email) VALUES (:nome, :apelido, :telefone, :email)';
      $stmt = getConnection()->prepare($sql);
      $stmt->bindParam(':nome', $nome);
      $stmt->bindParam(':apelido', $apelido);
      $stmt->bindParam(':telefone', $telefone);
      $stmt->bindParam(':email', $email);

      if($stmt->execute()){
        echo "Cadastro realizado com sucesso!!";
      }else{
        echo "Falha ao cadastrar, verifique seus dados.";
      }
    }catch(PDOException $e){
      echo 'Erro: '.$e->getMessage();
    }
?>
