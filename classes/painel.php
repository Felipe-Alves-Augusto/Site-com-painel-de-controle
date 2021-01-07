<?php

    class Painel {

        public static function logado(){

            return isset($_SESSION['login']) ? true : false;

        }

        public static function loggout(){
            session_destroy();
            header('Location:'.INCLUDE_PATH_PAINEL);
        }

        public static function cargo($cargo){
            
            $arr = [
                '0' => 'Normal',
                '1' => 'Administrador',
                '2' => 'Sub-Administrador'
            ];

            return $arr[$cargo];
        }

        //essa função pega a url do painel caso a pagina não existir retorna para home
        public static function carregarPagina(){
            if(isset($_GET['url'])){
                $url = explode('/', $_GET['url']);
                if(file_exists('pages/'.$url[0].'.php')){
                    include('pages/'.$url[0].'.php');

                } else{
                    // caso a pagina nao existe vai retornar para a home
                    header('Location: '.INCLUDE_PATH_PAINEL);
                }

            } else{
                include('pages/home.php');
            }
        }


        //lista o tanto de usuarios esta online no site
        public static function listarUserOnline(){
            self::limparUserOnline();
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin_online`");
            $sql->execute();
            return $sql->fetchAll();
        }

        
        // essa função limpa os usuarios se eles ficar 1 minuto sem fazer nenhuma ação
        public static function limparUserOnline(){
            $date = date('Y-m-d H:i:s');
            $sql = MySql::conectar()->exec("DELETE FROM `tb_admin_online` WHERE ultima_acao < '$date' - INTERVAL 1 MINUTE");
        }


        public static function alert($tipo,$mensagem){
            if($tipo == 'sucesso'){
                echo '<div class="sucesso">'.$mensagem.'</div>';
            } else if($tipo == 'erro'){
                echo '<div class="erro">'.$mensagem.'</div>';
            }
        }
            

    }

?>