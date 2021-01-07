<?php include('config.php'); ?>
<?php Site::updateUserOnline();?>
<?php Site::contador(); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Teste</title>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/style.css">
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<body>

    <?php
        $url = isset($_GET['url']) ? $_GET['url'] : 'home';

        switch($url){

            case 'sobre':
                echo '<target target="sobre">';
            break;

            case 'servicos':
                echo '<target target="servicos">';
            break;

        }

    ?>
    <header class="topo">
        
        <div class="logo">
            <h1>Meu WebSite</h1>
        </div><!--logo-->
        <nav class="menu">
            <ul>
                <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
                <li><a href="<?php echo INCLUDE_PATH; ?>sobre">Sobre</a></li>
                <li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
                <li><a href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
            </ul>
        </nav><!--menu-->
        <div class="logo-mobile">
            <i class="fas fa-bars"></i>
        </div><!--logo-menu-->
    </header><!--topo-->
    <nav class="menu-mobile hide">
            <ul>
            <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
                <li><a href="<?php echo INCLUDE_PATH; ?>sobre">Sobre</a></li>
                <li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
                <li><a href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
            </ul>
        </nav><!--menu-mobile-->

        <?php

            // atribuindo o arquivo home.php nesta variavel
          

            //verificando se o arquivo existe na pasta pages
            if(file_exists('pages/'.$url.'.php')){

                include('pages/'.$url.'.php' );

            } else{
                //podemos fazer o que quiser, pois a pagina  nao existe
                if($url != 'sobre' && $url != 'servicos'){
                    $pagina404 = true;
                    include('pages/404.php');
                } else{

                    include('pages/home.php');

                }
            }
        ?>

            <!--verificando se esta na pagina de erro se tiver adicione uma class="fixed no footer"-->

    <footer <?php if(isset($pagina404) && $pagina404 == true) echo 'class="fixed"';?> class="rodape">
        <h3>Todos os direitos reservados</h3>
    </footer><!--rodape-->


    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/slick.js"></script>
    <script src="https://kit.fontawesome.com/8debdb91c9.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo INCLUDE_PATH; ?>js/main.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/scroll.js"></script>
 

    <?php
        if($url == 'contato'){
    ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDf7Di1l_1ZWosZZ2OIJVkMtG1ga8Lzn0k"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/map.js"></script>
    <?php } ?>
    <script src="<?php echo INCLUDE_PATH; ?>js/formularios.js"></script>
</body>
</html>