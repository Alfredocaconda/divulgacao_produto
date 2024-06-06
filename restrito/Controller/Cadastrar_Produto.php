<?php
  //incluimos as conexoes e funcoes
  include '../Connection/conexao.php';
  include 'funcoes.php';

    $nome= $conn->real_escape_string($_POST['nome']);
    $descricao= $conn->real_escape_string($_POST['descricao']);

    $sql = "SELECT idproduto FROM produto WHERE nome='$nome' and descricao='$descricao'";

    $result = $conn->query($sql);
    
      if ($result->num_rows > 0) {
      $mensagem = "Produto já existe!";
      // Redirecionar de volta para a página de origem com a mensagem
      header("Location: ../cadastrar_produto.php?mensagem=" . urlencode($mensagem));
      exit();
      } else{
          //declaramos uma variavel que ira receber todos os atributos digitados no formulario de cadastro
          $nome=$_POST['nome'];
          $descricao=$_POST['descricao'];
          $categoria=$_POST['categoria'];
          $idusuario = $_POST['idusuario'];
          // codigo de foto
          $foto=$_FILES['foto'];
          $nome_foto=mover_foto($foto);
            if ($nome_foto== 0) {
            # code...
            $nome_foto= null;
            } 
              #codigo para inserir os valores na base de dados
              $sql="INSERT INTO `produto`(`nome`, `categoria`, `descricao`, `imagem`, `idusuario`) VALUES
              ('$nome','$categoria','$descricao','$nome_foto','$idusuario')";
              mysqli_query($conn,$sql);
              header('Location: ../cadastrar_produto.php');
        }
?>