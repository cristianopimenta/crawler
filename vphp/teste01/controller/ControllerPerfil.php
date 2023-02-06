<?php
    // controller.php
    
    // Conectar ao banco de dados
    $conn = new mysqli("localhost", "root", "111417", "otimize");
    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
      $nome = $_POST["nome"];
      $perfil = $_POST["prefil"];
      
    
      $sql = "INSERT INTO cadastro (nome, link) VALUES ('$name', '$perfil')";
      
      
      if ($conn->query($sql) === TRUE) {
        echo "Registro salvo com sucesso";
      } else {
        echo "Erro: " . $conn->error;
      }
    }
    
    // Fechar conexão com o banco de dados
    $conn->close();
    ?>
    