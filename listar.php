<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/listarStyle.css"/>
    <title>Lista de Contatos</title>
  </head>
  <body class="bg-style">
    <section class="listar-panel">
      <form>
        <table border="1" class="table">
          <thead>
            <th>Nome</th><th>Apelido</th><th>Telefone</th><th>Email</th><th>Opção</th>
          </thead>
          <tbody>
            <?php
            require_once "banco.php";
            $sql = "select id, nome, apelido, telefone, email from contatos order by id";
            foreach(getConnection()->query($sql) as $row) {
              echo "<tr>";
              echo "<td>".$row['nome']."</td>";
              echo "<td>".$row['apelido']."</td>";
              echo "<td>".$row['telefone']."</td>";
              echo "<td>".$row['email']."</td>";
              echo "<td>"."<a style='color:#520909' href='apagar.php?id=".$row['id']."'>Apagar</a>"."</td>";
              echo "</tr>";
            }

            ?>
          </tbody>
        </table>
        <br/>
      </form>
      <div>
        <a href="cadastro.html"><input type="submit" class="btn btnCadastrar" value="Cadastrar" ></a>
      </div>
    </section>
  </body>
</html>
