<?php
    include '../Connection/conexao.php';
    include 'funcoes.php';
    $idusuario=$_POST['idusuario'];
    $nome_p=$_POST['nome']; 
    $sql="DELETE FROM  `usuario` WHERE `idusuario`=$idusuario";
    if(mysqli_query($conn,$sql)){
        header('Location: ../listarFuncionario.php');
    }

?>