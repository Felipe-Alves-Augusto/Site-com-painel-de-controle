<?php

    session_start();
    date_default_timezone_set('America/Sao_Paulo');
    $autoLoad = function($class){
        if($class == 'Email'){

            include('classes/phpMailer/src/PHPMailer.php');

        }
        include('classes/'.$class.'.php');

    };

    spl_autoload_register($autoLoad);


    //URLS AMIGAVEIS
    define('INCLUDE_PATH', 'http://192.168.15.110/PHP%20Projetos/projeto_01/');
    define('INCLUDE_PATH_PAINEL', INCLUDE_PATH.'painel/');
    
    define('BASE_DIR_PAINEL', __DIR__.'/painel');

    //conectar com o banco de dados
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', '');
    define('DATABASE', 'projeto_01');



    /*
    function cargo($cargo){

        $arr = [
            '0' => 'normal',
            '1'=> 'Administrador',
            '2' => 'Sub-Adiministrador'
        ];

        return $arr[$cargo];
    }

    */

    /*a função verificarPermissao verifica se o usuario tem o cargo maior ou igual a 2
        se tiver o usuario pode acessar aquela pagina
        */

        /*
    function verificarPermissao($permissao){
        if($_SESSION['cargo'] >= $permissao){
            return;
        } else{
            echo 'style="display:none"';
        }
    }
    */

    /*
        aqui está pegando a SESSION cargo que esta puxando do banco de dados
        se caso o usuario não tiver a permissao da um include no arquivo permissao_negada.php
    */
    
    function verificarPermissaoPagina($permissao){
        if($_SESSION['cargo'] >= $permissao){
            return;
        } else{
            include('painel/pages/permissao_negada.php');
            die();
        }
    }

?>