<?php 
include 'protecao.php';
include 'Connection/conexao.php';
$id_admin= $_SESSION['idusuario'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>HOUSE SMARTH CONVENCIONAL LDA</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- site icon -->
   <link rel="icon" href="images/fevicon.png" type="image/png" />
   <!-- bootstrap css -->
   <link rel="stylesheet" href="css/bootstrap.min.css" />
   <!-- site css -->
   <link rel="stylesheet" href="style.css" />
   <!-- responsive css -->
   <link rel="stylesheet" href="css/responsive.css" />
   <!-- color css -->
   <link rel="stylesheet" href="css/colors.css" />
   <!-- select bootstrap -->
   <link rel="stylesheet" href="css/bootstrap-select.css" />
   <!-- scrollbar css -->
   <link rel="stylesheet" href="css/perfect-scrollbar.css" />
   <!-- custom css -->
   <link rel="stylesheet" href="css/custom.css" />
      <style>
         .listar_foto{
         width: 60px;
         height: 60px;
         border-radius: 70px;
         }
         .mosta_foto{
         width: 250px;
         }
      </style>
</head>
<body class="dashboard dashboard_1">
   <div class="full_container">
   <div class="inner_container">
   <!-- Sidebar  -->
   <nav id="sidebar">
   <div class="sidebar_blog_1">
      <div class="sidebar-header">
         <div class="logo_section">
         <a href="admin.php"><img class="logo_icon img-responsive" src="logotipo/logo.jpg" alt="#" /></a>
         </div>
      </div>
      <div class="sidebar_user_info">
         <div class="user_profle_side">
            <div class="user_info">
               <h6><?php  echo $_SESSION['nome'] ?></h6>
               <p><span class="online_animation"></span> Online</p>
            </div>
         </div>
      </div>
   </div>
   <div class="sidebar_blog_2">
      <h4>General</h4>
      <ul class="list-unstyled components">
         <li class="active"><a href="#dashboard" data-toggle="collapse" aria-expanded="false" 
         class="dropdown-toggle"><i class="fa fa-dashboard yellow_color"></i><span>FUNCIONARIO</span></a>
         <ul class="collapse list-unstyled" id="dashboard">
            <li><a href="CadastrarFuncionario.php">> <span>CADASTRAR</span></a></li>
            <li>
               <a href="listarFuncionario.php">> <span>LISTAR</span></a>
            </li>
         </ul>
      </li>
      <li>
      <a href="#element" data-toggle="collapse" aria-expanded="false" 
      class="dropdown-toggle"><i class="fa fa-diamond purple_color"></i> <span>PRODUTOS</span></a>
      <ul class="collapse list-unstyled" id="element">
         <li><a href="cadastrar_produto.php">> <span>CADASTRAR</span></a></li>
         <li><a href="listarProduto.php">> <span>LISTAR</span></a></li>
               <li><a href="listarStock.php">> <span>LISTAR STOCK</span></a></li>
            </ul>
            </li>
         <li>
         <a href="#apps" data-toggle="collapse" aria-expanded="false"
         class="dropdown-toggle"><i class="fa fa-object-group blue2_color"></i> <span>USUARIO</span></a>
         <ul class="collapse list-unstyled" id="apps">
         <li><a href="listar_usuario.php">> <span>LISTAR</span></a></li>
         </ul>
         </li>
         </ul>
         </div>
      </nav>
      <!-- end sidebar -->
      <!-- right content -->
      <div id="content">
      <!-- topbar -->
      <div class="topbar">
      <nav class="navbar navbar-expand-lg navbar-light">
         <div class="full">
            <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
         <div class="logo_section">
            <a href="admin.php"><img class="img-responsive" src="logotipo/logo.jpg" alt="#" /></a>
         </div>
            <div class="right_topbar">
               <div class="icon_info">
                  <ul class="user_profile_dd">
                     <li><a class="dropdown-toggle" data-toggle="dropdown">
                        <span class="name_user"><?php  echo $_SESSION['nome'] ?></span></a>
                        <div class="dropdown-menu">
                           <a class="dropdown-item" href="index.php"><span>SAIR</span> <i class="fa fa-sign-out"></i></a>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </nav>
   </div>
   <!-- end topbar -->
   <!-- dashboard inner -->
   <div class="midde_cont">
   <div class="container-fluid">
   <div class="row column_title">
   <div class="col-md-12">
   <div class="page_title">
   <h2>INFORMACOES</h2>
   </div>
   </div>
   </div>
   <div class="row column1">
   <div class="col-md-6 col-lg-3">
   <div class="full counter_section margin_bottom_30">
   <div class="couter_icon">
   <div> 
   <i class="fa fa-user yellow_color"></i>
   </div>
   </div>
   <div class="counter_no">
   <div>
   <p class="total_no">
   <?php


   // Consulta SQL para contar os usuários
   $sql = "SELECT COUNT(idusuario) as total_usuarios FROM usuario where funcao <> ''";
   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
   // Exibe o número de usuários cadastrados
   $row = $result->fetch_assoc();
   echo "<h1>".$row["total_usuarios"]."</h1>";
   } else {
   echo "<h1>0</h1>";
   } 
   ?>
   </p>
   <p class="head_couter">FUNCIONARIO</p>
   </div>
   </div>
   </div>
   </div> 
   <div class="col-md-6 col-lg-3">
   <div class="full counter_section margin_bottom_30">
   <div class="couter_icon">
   <div> 
   <i class="fa fa-clock-o blue1_color"></i>
   </div>
   </div>
   <div class="counter_no">
   <div>
   <p class="total_no">
   <?php
   // Consulta SQL para contar os usuários
   $sql = "SELECT COUNT(idproduto) as total_usuarios FROM produto";
   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
   // Exibe o número de usuários cadastrados
   $row = $result->fetch_assoc();
   echo "<h1>".$row["total_usuarios"]."</h1>";
   } else {
   echo "<h1>0</h1>";
   } 
   ?>
   </p>
   <p class="head_couter">PRODUTOS</p>
   </div>
   </div>
   </div>
   </div>
   <div class="col-md-6 col-lg-3">
   <div class="full counter_section margin_bottom_30">
   <div class="couter_icon">
   <div> 
   <i class="fa fa-cloud-download green_color"></i>
   </div>
   </div>
   <div class="counter_no">
   <div>
   <p class="total_no">
   <?php
   // Consulta SQL para contar os usuários
   $sql = "SELECT COUNT(idstock) as total_usuarios FROM stock";
   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
   // Exibe o número de usuários cadastrados
   $row = $result->fetch_assoc();
   echo "<h1>".$row["total_usuarios"]."</h1>";
   } else {
   echo "<h1>0</h1>";
   } 
   ?>
   </p>
   <p class="head_couter">STOCK</p>
   </div>
   </div>
   </div>
   </div>
   <div class="col-md-6 col-lg-3">
   <div class="full counter_section margin_bottom_30">
   <div class="couter_icon">
   <div> 
   <i class="fa fa-comments-o red_color"></i>
   </div>
   </div>
   <div class="counter_no">
   <div>
   <p class="total_no">
   <?php
   // Consulta SQL para contar os usuários
   $sql = "SELECT COUNT(idusuario) as total_usuarios FROM usuario where funcao <> 'gerente'
   and funcao<>'funcionario'";
   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
   // Exibe o número de usuários cadastrados
   $row = $result->fetch_assoc();
   echo "<h1>".$row["total_usuarios"]."</h1>";
   } else {
   echo "<h1>0</h1>";
   } 
   ?>
   </p>
   <p class="head_couter">USUARIO</p>
   </div>
   </div>
   </div>
   </div>
   </div>
   <!-- end graph -->
   <table class="table table-hover">
   <theard>
   <tr>
   <th scope="col">Foto</th>
   <th scope="col">Nome</th>
   <th scope="col">Descrição</th>
   <th scope="col">Categoria</th>
   <th scope="col">Funcionário</th>
   </tr>
   </theard>
   <tbody>
   <?php
   $sql="SELECT * FROM vproduto";
   $dados=mysqli_query($conn,$sql);

   $linha=mysqli_fetch_assoc($dados);
   $imagem=$linha['imagem'];
   $mostrar_foto="<img src='img/$imagem' class='listar_foto'>";
   //executar a query que ira ser declarado uma variavel que ira receber a conexao e os dados do banco de dados
   //esta variavel ira receber todos os objectos do banco de dados
   $dados=mysqli_query($conn,$sql);
   //condicao para pegar todos os valores e mostrar na tabela
   //condicao para percorrer o vector
   while ($linha=mysqli_fetch_assoc($dados)) {
   $idproduto=$linha['idproduto'];
   $nome=$linha['nome'];
   $categoria=$linha['categoria'];
   $descricao=$linha['descricao'];
   $imagem=$linha['imagem'];
   $nomef=$linha['nomef'];
   if (!$imagem==null) {
   # code...
   $mostrar_foto="<img src='img/$imagem' class='listar_foto'>";
   }
   else {
   # code...
   $mostrar_foto='';
   }
   echo " <tr>
   <th>$mostrar_foto</th>
   <th scope='row'>$nome</th>
   <th >$categoria</th>
   <th >$descricao</th>
   <th >$nomef</th>
   </tr>";
   }
   // onclick="pegar_dados('$idusuario','$nome')"; o secredo esta aqui
   ?>
   </tbody>
   </table>
   </div>
   <!-- footer -->
   <div class="container-fluid">
   <div class="footer">
   <p>@ 2024, HOUSE SMARTH CONVENCIONAL LDA </p>
   </div>
   </div>
   </div>
   <!-- end dashboard inner -->
   </div>
   </div>
   </div>
   <!-- jQuery -->
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <!-- wow animation -->
   <script src="js/animate.js"></script>
   <!-- select country -->
   <script src="js/bootstrap-select.js"></script>
   <!-- owl carousel -->
   <script src="js/owl.carousel.js"></script> 
   <!-- chart js -->
   <script src="js/Chart.min.js"></script>
   <script src="js/Chart.bundle.min.js"></script>
   <script src="js/utils.js"></script>
   <script src="js/analyser.js"></script>
   <!-- nice scrollbar -->
   <script src="js/perfect-scrollbar.min.js"></script>
   <script>
   var ps = new PerfectScrollbar('#sidebar');
   </script>
   <!-- custom js -->
   <script src="js/chart_custom_style1.js"></script>
   <script src="js/custom.js"></script>
</body>
</html>