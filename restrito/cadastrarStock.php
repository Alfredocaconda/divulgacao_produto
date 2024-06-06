<?php 
    include 'protecao.php';
    include 'Connection/conexao.php';
        $id_admin= $_SESSION['idusuario'];
        $iduser=$_GET['idproduto'] ?? '';
        $sql="SELECT * FROM `produto` WHERE `idproduto`='$iduser'";
        $dados=mysqli_query($conn,$sql);
        $linha=mysqli_fetch_assoc($dados);
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

</head>
<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
                <div class="sidebar_blog_1">
                    <div class="sidebar-header">
                        <div class="logo_section">
                            <a href="admin.php"><img class="logo_icon img-responsive" src="logotipo/logo.jpg" alt="#" />
                            </a>
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
        <div class="sidebar_blog_2">
        <h4>General</h4>
        <ul class="list-unstyled components">
        <li class="active">
        <a href="#dashboard" data-toggle="collapse" aria-expanded="false" 
        class="dropdown-toggle"><i class="fa fa-dashboard yellow_color"></i>
        <span>FUNCIONARIO</span></a>
        <ul class="collapse list-unstyled" id="dashboard">
        <li>
        <a href="CadastrarFuncionario.php">> <span>CADASTRAR</span></a>
        </li>
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
<li>
<a class="dropdown-toggle" data-toggle="dropdown">
<span class="name_user"><?php  echo $_SESSION['nome'] ?></span></a>
<div class="dropdown-menu">
<a class="dropdown-item" href="profile.html">MEU PERFIL</a>
<a class="dropdown-item" href="#"><span>SAIR</span> <i class="fa fa-sign-out"></i></a>
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
<!--Conteudos Main content -->
<section class="content">
<h2>Inserir no Stock</h2>  
<!--LINHA-->
<div class="row">
<div class="col">
<form action="Controller/CadastrarStock.php" method="Post" enctype="multipart/form-data" class="row g-3">
<input type="hidden" name="idusuario" value="<?php echo $_SESSION['idusuario'] ?>">
<input type="hidden" name="idproduto" value="<?php echo $linha['idproduto'] ?>">
<div class="col-md-6">
<label for="inputEmail4" class="form-label">Nome/Categoria/Descrição</label>
<input type="text" class="form-control" name="nome" id="inputEmail4" 
placeholder="DIGITE AQUI O SEU NOME" required 
value="<?php echo $linha['nome']." / ".$linha['descricao']." / ".$linha['categoria']?>" >
</div>
<div class="col-md-6">
<label for="endereco" class="form-label">Preço</label>
<input type="text" class="form-control" id="inputAddress" name="preco"
placeholder="DIGITE AQUI A SUA O PREÇO" required>
</div>
<div class="col-md-6">
<label for="telefone" class="form-label">Tempo de Duração</label>
<input type="number" class="form-control" id="inputAddress" name="tempo_de_duracao" 
placeholder="TEMPO DE DURAÇÃO" required>
</div>
<div class="col-md-6">
<label for="telefone" class="form-label">Quantidade</label>
<input type="number" class="form-control" id="inputAddress" name="quantidade" 
placeholder="DIGITE AQUI A QUANTIDADE" required>
</div>

<div class="col-12">
<button type="submit" class="btn btn-primary">Guardar</button>
</div>
</form>  
</div>
</div>
</section>
</div>
</div>
<!-- end testimonial -->
<!-- progress bar -->

<!-- end progress bar -->
</div>

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