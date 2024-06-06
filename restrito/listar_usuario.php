<?php 
include 'protecao.php';
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
                     <div class="icon_setting"></div>
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
                                       <a class="dropdown-item" href="logaut.php"><span>SAIR</span> <i class="fa fa-sign-out"></i></a>
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
                              <h2>LISTAR OS USUARIOS</h2>
                           </div>
                       
    <?php
      # pesquisando pelo usuario...
      $pesquisar=$_POST['buscar'] ?? '';
       # chamando a conexao e a funcao...
     include 'Connection/conexao.php';
    //pegar os dados apartir do banco de dados
     $sql="SELECT * FROM usuario WHERE funcao <> 'gerente' and funcao<>'funcionario' and nome LIKE '%$pesquisar%' ";
     //executar a query que ira ser declarado uma variavel que ira receber a conexao e os dados do banco de dados
     //esta variavel ira receber todos os objectos do banco de dados
     $dados=mysqli_query($conn,$sql); 
    ?>
    <div class="container">
        <!--LINHA-->
        <div class="row">
            <!--coluna-->
            <div class="col"> 
                <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <form class="d-flex" action="listar_usuario.php" method="POST" role="search">
                        <input class="form-control me-2" type="search" name="buscar" placeholder="Nome do Funionario" aria-label="Search" autofocus>
                         <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                    </form>
                </div>
                 </nav>
                <table class="table table-hover">
                    <theard>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Senha</th>
                            <th scope="col">Opções</th>
                        </tr>
                    </theard>
                    <tbody>
                    <?php
                    //condicao para pegar todos os valores e mostrar na tabela
                    //condicao para percorrer o vector
                    while ($linha=mysqli_fetch_assoc($dados)) {
                        $idfuncionario=$linha['idusuario'];
                        $nome=$linha['nome'];
                        $genero=$linha['genero'];
                        $telefone=$linha['telefone'];
                        $funcao=$linha['funcao'];
                        $senha=$linha['senha'];
                        $data_nascimento=$linha['data_nascimento'];
                        $endereco=$linha['endereco'];
                        $bi=$linha['bi'];
                        $bi=$linha['bi'];
                        
                        echo " <tr>
                        <th width=100px scope='row'>$nome</th>
                        <th width=100px >$telefone</th>
                        <th width=100px >$senha</th>
                        <th width=100px>
                            <a href='Act_funcionario.php?idf=$idfuncionario' 
                            class='btn btn-success btn-sm'>Editar</a>
                          <a href='#' class='btn btn-danger btn-sm'  data-toggle='modal'
                          data-target='#confirma'
                             onclick=" .'"' ."pegar_dados($idfuncionario,'$nome')" .'"' ."
                             >Apagar</a>
                        </th>
                        </tr>";
                     }
                     // onclick="pegar_dados('$idusuario','$nome')"; o secredo esta aqui
                     ?>
                    </tbody>
                </table>
            </div>
        </div>
  </div>
 <!-- Modal -->
 <div class="modal fade" id="confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmação para Apagar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="Controller/Apagar_funcionario.php" method="post">
        <p>Deseja realmente apagar <b id="nome_pessoa">Nome da pessoa</b>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
        <input type="hidden" name="nome" id="nome_pessoa_1" value="">
       <input type="hidden" name="idusuario" id="idusuario" value="">
        <input type="submit" class="btn btn-danger" value="Sim">
        </form>
      </div>
    </div>
  </div>
</div>
 <!-- Modal para dar entrada do produto -->
 <div class="modal fade" id="entrada" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmação para Dar entrada do Produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="Control/Dar_entrada.php" method="post">
        <p>Deseja realmente dar entrada <b id="nome_produto">Nome da pessoa</b>?</p>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
        <input type="hidden" name="nome" id="nome_pessoa_1" value="">
       <input type="hidden" name="idusuario" id="idusuario" value="">
        <input type="submit" class="btn btn-danger" value="Sim">
        </form>
      </div>
    </div>
  </div>
</div>
    <!-- /.content -->
    <!--- java script---->
<script type="text/javascript">
function pegar_dados(idusuario,nome){
  //pegar o nome da pessoa
  document.getElementById('nome_pessoa').innerHTML=nome;
  document.getElementById('nome_pessoa_1').value=nome;
  // para pegar o id
  document.getElementById('idusuario').value=idusuario;
}
</script>
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