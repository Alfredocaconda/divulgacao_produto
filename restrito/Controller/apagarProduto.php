<?php
    include '../Connection/conexao.php';
    $id_produto=$_POST['idproduto'];
    $sql="DELETE FROM  `produto` WHERE `idproduto`='$id_produto'";
    mysqli_query($conn,$sql);
    header("Location: ../listarProduto.php");
?>