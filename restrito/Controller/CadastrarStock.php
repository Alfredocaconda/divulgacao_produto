<?php
        //incluimos as conexoes e funcoes
            include '../Connection/conexao.php';
            include 'funcoes.php';
           
            //declaramos uma variavel que ira receber todos os atributos digitados no formulario de cadastro
            $idusuario=$_POST['idusuario'];
            $idproduto=$_POST['idproduto'];
            $preco=$_POST['preco'];
            $tempo_de_duracao = $_POST['tempo_de_duracao'];
            $quantidade = $_POST['quantidade'];
            $data=date('Y-m-d H:i:s');
            #codigo para inserir os valores na base de dados
            $sql="INSERT INTO `stock`(`idproduto`, `idusuario`, `preco`, `tempo_de_duracao`, `data`, `quantidade`) VALUES
             ('$idproduto','$idusuario','$preco','$tempo_de_duracao','$data','$quantidade')";
             mysqli_query($conn,$sql);
             header('Location: ../listarProduto.php');
            ?>