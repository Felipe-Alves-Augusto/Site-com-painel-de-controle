<?php
    if(isset($_GET['loggout'])){
        Painel::loggout();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle</title>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL?>css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <aside class="lado show">
        <div class="box-usuario">
            <div class="avatar-usuario">
                <i class="fas fa-user"></i>
            </div><!--avatar-usuario-->
        </div><!--box-usuario-->
        <div class="nome-user">
            <p><?php echo $_SESSION['nome']?></p>
            <p><?php echo Painel::cargo($_SESSION['cargo'])?></p>
        </div><!--nome-user-->
        <div class="itens-menu">
            <h2>Cadastro</h2>
            <ul>
                <li><a href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrarDepoimento">Cadastro Depoimento</a></li>
                <li><a href="">Cadastro Serviços</a></li>
                <li><a href="">Novas Histórias</a></li>
            </ul>
        </div><!--itens-menu-->
        <div class="itens-menu">
            <h2>Gestão</h2>
            <ul>
                <li><a href="">Listar Depoimento</a></li>
                <li><a href="">Listar Serviços</a></li>
                <li><a href="">Listar Novas Histórias</a></li>
            </ul>
        </div><!--itens-menu-->
        <div class="itens-menu">
            <h2>Administração do Painel</h2>
            <ul>
                <li><a href="">Adicionar Usuários</a></li>
                <li><a href="<?php INCLUDE_PATH_PAINEL?>editar-user">Editar Usuários</a></li>
            </ul>
        </div><!--itens-menu-->
        
    </aside><!--lado-->
    <header>
        <div class="center">
            <div class="menu-btn">
                <i class="fas fa-bars"></i>
            </div><!--menu-btn-->
            <div class="loggout">
            <a style="margin-right:50px;" href="<?php echo INCLUDE_PATH_PAINEL?>home"><i class="fas fa-home"></i></a>
            <a href="<?php echo INCLUDE_PATH_PAINEL?>?loggout"><i class="fas fa-sign-out-alt"></i>Sair</a>
            </div><!--loggout-->
        </div><!--center-->
    </header>
    <?php Painel::carregarPagina()?>

    <script src="<?php echo INCLUDE_PATH_PAINEL?>js/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script src="https://kit.fontawesome.com/8debdb91c9.js" crossorigin="anonymous"></script>
    <script src="<?php echo INCLUDE_PATH_PAINEL?>js/painel.js"></script>
    <script src="js/grafico.js"></script>
</body>
</html>
