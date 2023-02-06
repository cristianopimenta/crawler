<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $github = $_POST['github'];

  // Conecte-se ao banco de dados MySQL
  $host = "host_do_seu_banco_de_dados";
  $user = "usuario_do_seu_banco_de_dados";
  $password = "senha_do_seu_banco_de_dados";
  $dbname = "nome_do_seu_banco_de_dados";

  $conn = mysqli_connect($host, $user, $password, $dbname);
  if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
  }

  // Prepare a query de inserção
  $sql = "INSERT INTO cadastros (nome, github) VALUES (?, ?)";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "ss", $name, $github);

  // Execute a query
  if (mysqli_stmt_execute($stmt)) {
    echo "Dados cadastrados com sucesso.";
  } else {
    echo "Erro ao cadastrar dados: " . mysqli_error($conn);
  }

  // Fecha a conexão com o banco de dados
  mysqli_close($conn);
}

?>
