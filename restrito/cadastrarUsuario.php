<?php
    if (isset($_GET['mensagem'])) {
        $mensagem = htmlspecialchars($_GET['mensagem']);
        echo "<script type='text/javascript'>alert('$mensagem');</script>";
    }
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
    <!-- calendar file css -->
    <link rel="stylesheet" href="js/semantic.min.css" />
   
</head>
<body class="inner_page login">
    <div class="full_container">
        <div class="container">
            <div class="center verticle_center full_height">
                <div class="login_section">
                    <div class="logo_login">
                        <div class="center">
                        <img width="210" src="logotipo/logo.jpg" alt="#" />
                        <!-- <img width="210" src="images/logo/logo.png" alt="#" />-->
                        </div>
                    </div>
                    <div class="login_form">
                        <form action="Controller/FController.php" method="post">
                        <fieldset>
                    <div class="field">
            <label class="label_field">NOME</label>
    <input type="text" name="nome" placeholder="NOME COMPLETO" required/>
</div>
<div class="field">
<label class="label_field">TELEFONE</label>
<input type="number" name="telefone" placeholder="TELEFONE" required/>
</div>
<div class="field">
<label class="label_field">SENHA</label>
<input type="password" name="senha" placeholder="SENHA" required/>
</div>
<div class="field margin_0">
<label class="label_field hidden">hidden label</label>
<button class="main_bt">Cadastrar</button>
</div>
</fieldset>
</form>
</div>
</div>
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
<!-- nice scrollbar -->
<script src="js/perfect-scrollbar.min.js"></script>
<script>
var ps = new PerfectScrollbar('#sidebar');
</script>
<!-- custom js -->
<script src="js/custom.js"></script>
</body>
</html>