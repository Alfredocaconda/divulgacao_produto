<?php
include 'protecao.php';
$id_admin= $_SESSION['idusuario'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HSC</title>
  <!--------LINK DO CSS -->
  <link rel="stylesheet" href="estilo.css">
  <!------- LINK DO JAVASCRIPT-->
  <link rel="stylesheet" href="js/script.js">
  <!--LINK DE ICONES-->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>

<body>
  <!-------INICIO DO CABEÇALHO-->
  <section id="cabecalho">
    <a href="#" class="logo_tipo"><img width="210" src="logotipo/logo.jpg" alt="#" /></a>
    <!--INICIO DO NAVEGADOR-->
    <div>
      <ul id="navbar">
        <li><a class="active" href="index.php">PAGINA PRINCIPAL</a></li>
        <li><a href="loja.php">LOJA</a></li>
        <li><a href="acerca.php">ACERCA</a></li>
        <li><span class="name_user"><?php  echo $_SESSION['nome'] ?></span></a></li>
        <li><a class="btn btn-danger" href="logaut.php"><span>SAIR</span></a></li>
        <li id="lg-bag"><a href="loja.html"><i class="far fa-shopping-bag"></i></a></li>
        <a href="#" id="close"><i class="far fa-times"></i></a>
      </ul>
    </div>
    <div id="mobile">
        <a href="cart.html"><i class="far fa-shopping-bag"></i></a>
        <i id="bar" class="fas fa-outdent"></i>
    </div>
    <!--FIM DO NAVEGADOR-->
  </section>
  <!-------FIM DO CABEÇALHO-->
  <!-- INICIO DO DAS INFORMACOES DA PRIMERIA PAGINA-->
  <section id="hero">
    <form class="d-flex" action="index.php" method="POST" role="search">
      <section  class="section-p1 section-m1">
        <div class="formu">
          <input type="text" name="buscar"placeholder="PESQUISAR PRODUTO">
          <button>PESQUISAR</button>
        </div>
      </section>
    </form>
      <h4>OFERTA DE COMÉRCIO</h4>
      <h2>OFERTAS DE SUPER VALOR</h2>
      <h1>EM TODOS OS PRODUTOS</h1>
      <p>ECONOMIZE MAIS COM CUPONS E ATÉ 70% DE DESCONTO!</p>
      <button>COMPRE AGORA</button>
  </section>
    <!---- FIM DAS INFORMAÇÕES DA PRIMEIRA PAGINA-->
    <!-- INICIO DAS CARACTERISTICAS -->
    <section id="feature" class="section-p1">
      <?php
        # chamando a conexao e a funcao...
        include 'Connection/conexao.php';
        //pegar os dados apartir do banco de dados
        $sql="SELECT * FROM vstock ORDER BY nome ASC
        LIMIT 5 OFFSET 2";
        //executar a query que ira ser declarado uma variavel que ira receber a conexao e os dados do banco de dados
        //esta variavel ira receber todos os objectos do banco de dados
        $dados=mysqli_query($conn,$sql); 
        while ($linha=mysqli_fetch_assoc($dados)) {
          $nome=$linha['nome'];
          $descricao=$linha['descricao'];
          $categoria=$linha['categoria'];
          $quantidade=$linha['quantidade'];
          $preco=$linha['preco'];
          $tempo=$linha['tempo_de_duracao'];
          $imagem=$linha['imagem'];
            if (!$imagem==null) {
            # code...
            $mostrar_foto="<img src='img/$imagem' class='listar_foto'>";
            }
            else {
          $mostrar_foto='';
          }
      ?>
        <div class="central">
          <div class="fe-box">
            <?php echo $mostrar_foto ?>
            <h6><?php echo $nome." ".$descricao." ".$categoria ?></h6>                               
            <h6><?php echo "Quantidade :".$quantidade ?></h6>                               
            <h6><?php echo "Tempo de Duração:".$tempo ?></h6>                               
            <h6>Envio Gratis</h6>                           
          </div>
        </div>
        <?php
      }
      ?>
  </section>
  <!---      FIM DAS CARACTERISTICAS-->
  <!--             INICIO DE PRODUTOS FUTUROS-->
  <section id="product1" class="section-p1">
      <h2>NOVOS PRODUTOS</h2>
      <p>ALGUMA COLEÇÃO NOVO MORDEN DESIGN </p>
      <div class="pro-conteiner">
        <?php
          $pesquisar=$_POST['buscar'] ?? '';
          include 'Connection/conexao.php';
          //pegar os dados apartir do banco de dados
          $sql2="SELECT * FROM vstock WHERE nome LIKE '%$pesquisar%'  ORDER BY nome desc";
          //executar a query que ira ser declarado uma variavel que ira receber a conexao e os dados do banco de dados
          //esta variavel ira receber todos os objectos do banco de dados
          $dados2=mysqli_query($conn,$sql2); 
          while ($linha=mysqli_fetch_assoc($dados2)) {
            $nome=$linha['nome'];
            $descricao=$linha['descricao'];
            $categoria=$linha['categoria'];
            $quantidade=$linha['quantidade'];
            $preco=$linha['preco'];
            $tempo=$linha['tempo_de_duracao'];
            $imagem=$linha['imagem'];
              if (!$imagem==null) {
              # code...
              $mostrar_foto="<img src='img/$imagem' class='listar_foto'>";
              }
              else {
              # code...
              $mostrar_foto='';
              }
        ?>
          <div class="pro">
            <?php echo $mostrar_foto ?>
            <div class="descricao">
                <span><?php echo $nome ?></span>
                <h5><?php echo $categoria ?></h5>     
                <!-- INICIO ESTRELAS-->
                <div class="star">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
               <!---FIM ESTRELA-->
              <h4><?php echo "Quantidade :".$quantidade ?></h4>
              <h4><?php echo "Tempo de Duração:".$tempo ?></h4>
            </div>
          </div>
        <?php
        }
        ?>
    </div>
  </section>
    <!--  ========= INCIO DE SUB-BANNER===========-->
    <section id="sm-banner" class="section-p1">
      <div class="banner-box">
        <h4>OFERTAS DE CREAZY</h4>
        <h2>POR 1 OBTER GRÁTIS</h2>
        <span>O MELHOR VESTIDO CLÁSSICO ESTÁ À VENDA EM CARA</span>
        <button class="branco">SABER MAIS</button>
      </div>
      <div class="banner-box banner-box2">
        <h4>PRIMAVERA/VERÃO</h4>
        <h2>TEMPORADA DE UPCOMING</h2>
        <span>O MELHOR VESTIDO CLÁSSICO ESTÁ À VENDA EM CARA</span>
        <button class="branco">COLEÇÃO</button>
      </div>
    </section>
    <!---==========INICIO DEPOIS DE SUB-BANNER==========-->
    <section id="banner3">
      <div class="banner-box">
        <h2>VENDA TEMPORARIA</h2>
        <h3>COLEÇÃO INVERNO - 50% OFF</h3>
      </div>
      <div class="banner-box banner-box3">
        <h2>VENDA TEMPORARIA</h2>
        <h3>COLEÇÃO INVERNO - 50% OFF</h3>
      </div>
      <div class="banner-box banner-box4">
        <h2>VENDA TEMPORARIA</h2>
        <h3>COLEÇÃO INVERNO - 50% OFF</h3>
      </div>
    </section>
    <!---==========FIM DEPOIS DE SUB-BANNER==========-->
    <!--============INICIO DE NOVAS INFORMAÇÕES ==========-->
    <section id="newslatter" class="section-p1 section-m1">
      <div class="newstext">
        <h4>INSCREVA-SE PARA HSC</h4>
        <p>RECEBA ATUALIZAÇÕES POR E-MAIL SOBRE NOSSA LOJA MAIS RECENTE E <span> OFERTAS ESPECIAIS .</span></p>
      </div>
      <div class="formu">
        <input type="text" placeholder="O SEU ENDEREÇO DE E-MAIL">
        <button class="normal">INSCREVA-SE</button>
      </div>
    </section>
      <!--============FIM DE NOVAS INFORMAÇÕES ==========-->
    <footer class="section-p1">
      <div class="col">
        <a href="#" class="logo_tipo"><img width="210" src="logotipo/logo.jpg" alt="#" /></a>
        <h4>CONTACTO</h4>
        <p> <strong>ENDEREÇO: </strong>CATUMBELA, BENGUELA</p>
        <p> <strong>TELEFONE: </strong> (244) 935-460-590 / (244) 955-698-784</p>
        <p> <strong>HORA: </strong> 08:30-16:30, MON-SAT</p>
        <div class="follow">
        <h4>ACOMPANHAMENTO</h4>
          <div class="icon">
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-twiter"></i>
            <i class="fab fa-instagran"></i>
            <i class="fab fa-printerest-p"></i>
            <i class="fab fa-youtube"></i>
          </div>
        </div>
      </div>
      <div class="col">
        <h4>SOBRE</h4>
        <a href="#">SOBRE NÓS</a>
        <a href="#">INFORMAÇÃO DE ENTREGA</a>
        <a href="#">POLÍTICA DE PRIVACIDADE</a>
        <a href="#">TERMOS E CONDIÇÕES</a>
        <a href="#">ENTRE EM CONTATO CONOSCO</a>
      </div>
      <div class="col">
        <h4>MINHA CONTA</h4>
        <a href="#">ENTRAR</a>
        <a href="#">VER CARRINHO</a>
        <a href="#">MINHA LISTA DE DESEJOS</a>
        <a href="#">ACOMPANHE MEU PEDIDO</a>
        <a href="#">AJUDA</a>
      </div>
      <div class="col install">
        <h4>APLICATIVO INSTALADOR</h4>
        <p>LOJA DE APP FORMULÁRIO OU JOGO DE GOOGLE</p>
        <div class="row">
        <a href="#"><img src="imagens/PLAY STORY.jpg" alt="" class="imagens"></a>
        </div>
        <p>GATEWAYS DE PAGAMENTO SEGURO</p>
        <a href="#"><img src="imagens/VISA.png" alt="" class="imagens"></a>
      </div>
      <div class="copyrigth"><p>@ 2024, HOUSE SMARTH CONVENCIONAL LDA</p> </div>
   </footer>
  </body>
</html>