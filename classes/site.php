<?php

    class Site {

        public static function updateUserOnline(){
            //enquanto estiver no site o token vai continuar o msm
            //depois que sair ele altera
            if(isset($_SESSION['online'])){
                $token = $_SESSION['online'];
                $horarioAtual = date('Y-m-d H:i:s'); // formatando a hora
                $sql = MySql::conectar()->prepare("UPDATE tb_admin_online SET ultima_acao = ? WHERE token = ?");
                $sql->execute(array($horarioAtual, $token));

            } else{
                //aqui no else é a primeira vez que o usuario esta entrando no site
                /*
                    depois vai fazer a inserção no banco de dados pegando o ip dele,
                    pegando a date e o horario atual que ele entro no site
                    e gerando um token unico para aquele usuario com o uniqid();
                 */
                // o uniqid gera um indentificador unico;
                $_SESSION['online'] = uniqid();
                $token = $_SESSION['online'];
                $horarioAtual = date('Y-m-d H:i:s');
                $ip = $_SERVER['REMOTE_ADDR']; // aqui pega o valor do ip do usuario que estiver no site
                $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin_online` VALUES (null,?,?,?)");
                $sql->execute(array($ip, $horarioAtual, $token));
            }
        }


        public static function contador(){
            if(!isset($_COOKIE['visita'])){
                setcookie('visita','true',time() + (60*60*24*1));
                $ip = $_SERVER['REMOTE_ADDR'];
                $dia = date('Y-m-d');
                $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin_visitas` VALUES (null,?,?)");
                $sql->execute([$ip,$dia]);
            }
        }

    }


?>