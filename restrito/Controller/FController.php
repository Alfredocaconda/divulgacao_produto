<?php
  include '../Connection/conexao.php';
    $telefone = $conn->real_escape_string($_POST['telefone']);
    // Verificar se o produto já existe
    $sql = "SELECT idusuario FROM usuario WHERE telefone='$telefone'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $mensagem = "Usuário já existe!";
      // Redirecionar de volta para a página de origem com a mensagem
header("Location: ../cadastrarUsuario.php?mensagem=" . urlencode($mensagem));
exit();
    } else {
      // Inserir o novo produto
      $nome=$_POST['nome'];
      $genero=$_POST['genero'];
      $telefone=$_POST['telefone'];
      $data_nascimento=$_POST['data_nascimento'];
      $morada=$_POST['endereco'];
      $funcao=$_POST['cargo'];
      $bi=$_POST['bilhete'];
      $senha=$_POST['senha'];

      $sql="INSERT INTO `usuario`(`nome`, `genero`, `telefone`, `funcao`,
      `endereco`, `bi`, `data_nascimento`, `senha`) 
      VALUES ('$nome','$genero','$telefone','$funcao','$morada','$bi','$data_nascimento','$senha')";
      if ($conn->query($sql) === TRUE) {
        header("Location: ../../index.php");
      } 
}
?>