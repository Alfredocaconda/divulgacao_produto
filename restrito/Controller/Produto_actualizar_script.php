<?php
include '../Connection/conexao.php';
include 'funcoes.php';

if (empty($_POST['nome']) && empty($_POST['categoria']) && empty($_POST['descricao'] && empty($_POST['imagem']))) {
  # code...
  mensagem("$nome NÃO FOI ACTUALIZADO",'danger');
} else {
  //declaramos uma variavel que recebe os valores vindo da tabela listagem para poder editar os dados do usuario
  $idproduto=$_POST['idproduto'];
  $idusuario=$_POST['idusuario'];
  $nome=$_POST['nome'];
  $categoria=$_POST['categoria'];
  $descricao=$_POST['descricao'];
  // codigo de foto
  $foto=$_FILES['imagem'];
  $nome_foto=mover_foto($foto);
    if ($nome_foto== 0) {
    # code...
    $nome_foto= null;
    } 
    # code...
    $sql="UPDATE `produto` SET 
    `nome`='$nome',`descricao`='$descricao',`categoria`='$categoria',`idusuario`='$idusuario' 
  ,`imagem`='$nome_foto' WHERE `idproduto`='$idproduto'";
    if (mysqli_query($conn, $sql)) {
      # code...
          mensagem("$nome Actualizado com sucesso!",'success');
    }
    header('Location: ../listarProduto.php');
}
?>