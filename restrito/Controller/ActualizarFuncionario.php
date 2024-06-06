<?php
include '../Connection/conexao.php';
//declaramos uma variavel que recebe os valores vindo da tabela listagem para poder editar os dados do usuario
$idusuario=$_POST['idf'];
$nome=$_POST['nome'];
$genero=$_POST['genero'];
$telefone=$_POST['telefone'];
$data_nascimento=$_POST['data_nascimento'];
$morada=$_POST['endereco'];
$funcao=$_POST['funcao'];
$senha=$_POST['senha'];

if (empty($_POST['nome']) && empty($_POST['genero']) && empty($_POST['telefone']) 
&& empty($_POST['data_nascimento']) && empty($_POST['endereco'])
&& empty($_POST['funcao']) && empty($_POST['senha'])) {
  # code...
  mensagem("$nome NÃO FOI ACTUALIZADO",'danger');
} else {
  # code...
  $sql="UPDATE `usuario` SET `nome`='$nome',`genero`='$genero',`telefone`='$telefone',
`data_nascimento`='$data_nascimento',`endereco`='$morada', `funcao`='$funcao',`senha`='$senha'
 WHERE idusuario=$idusuario";
if (mysqli_query($conn, $sql)) {
  # code...
  header('Location: ../listarFuncionario.php');
}
}
?>