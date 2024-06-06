<?php
# INICAR A SESSAO
include '../Connection/conexao.php';
# CONDICAO PARA SABER SE EXITE ALGUMA SESSAO
if (isset($_POST['telefone']) || isset($_POST['senha'])) {
  echo "<script>alert('FALHA AO ENTRAR USUÁRIO OU SENHA INCORRETA');</script>";
} 
    # CONDICAO PARA SABER SE O TAMANHO DO USUARIO É IGUAL A 0 
    if(strlen($_POST['telefone'])==0){
      echo 'POR FAVOR PREENCHA O SEU USUÁRIO';  
    } else 
     # CONDICAO PARA SABER SE O TAMANHO DA SENHA É IGUAL A 0 
    if (strlen($_POST['senha'])==0) {
      # code...
      echo 'POR FAVOR PREENCHA A SUA SENHA'; 
    } else{
      #limpar o campo para nao ser acessado por invasor
      $user=$conn->real_escape_string($_POST['telefone']);
      $password=$conn->real_escape_string($_POST['senha']);

      $sql="SELECT * FROM usuario WHERE telefone='$user' AND senha='$password'";
      $query=$conn->query($sql) or die("FALHA NA CONEXAO DO CODIGO SQL: " .$conn->error);

      #condicao para verificar se a quantidade de rexisto for igual a 1
      $quantidade=$query->num_rows;
      if($quantidade>0){
        #se o usuario existe ira pegar no banco de dados
        $user=$query->fetch_assoc();
        #condicao para criar uma nova sessao
        if(!isset($_SESSION)){
          session_start();
        }
        #pegar os dados do usario
        $_SESSION['idusuario']=$user['idusuario'];
        $_SESSION['nome']=$user['nome'];
        $_SESSION['funcao']=$user['funcao'];
         // Recupera o caminho da imagem do banco de dados (substitua com sua lógica real)
        switch ($_SESSION['funcao']) {
          case 'gestor':
              # CHAMANDO O FORMULARIO DO ADMINISTRADOR...
              header('Location: ../admin.php');
              break;
          case '':
               # CHAMANDO O FORMULARIO DO TECNICO...
              header('Location: ../index.php');
              break;
          }
      }else{
        
      }
      }
 
?>