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

    define('INCLUDE_PATH', 'http://localhost/PHP Projetos/projeto_01/');
    define('INCLUDE_PATH_PAINEL', INCLUDE_PATH.'painel/');
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

?>