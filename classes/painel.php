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
                '0' => 'normal',
                '1' => 'Cliente',
                '2'=> 'Sub-Administrador',
                '3' => 'Adiministrador'
            
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


        // mensagens de erro e sucesso para os formularios
        public static function alert($tipo,$mensagem){
            if($tipo == 'sucesso'){
                echo '<div class="sucesso">'.$mensagem.'</div>';
            } else if($tipo == 'erro'){
                echo '<div class="erro">'.$mensagem.'</div>';
            }
        }
            
         function selecionarMenu($par){
            //<i class="fas fa-angle-double-right"></i>;
            $url = explode('/',@$_GET['url'])[0];
            if($url == $par){
                echo 'class="menu-active"';
            }

        }

        public static $cargos = [
            '0' => 'normal',
            '1' => 'Cliente',
            '2'=> 'Sub-Administrador',
            '3' => 'Adiministrador'
        ];

        //determinando os tipos de imagem que pode fazer o upload
        //com o $imagem['type']

        public static function imagemValida($imagem){
            if($imagem['type'] == 'image/jpeg' || $imagem['type'] == 'image/jpg' || $imagem['type'] == 'image/png'){
                // pegando o tamanho da imagem com o $imagem['size'] e convertendo em KB dividindo em 1024
                // o size retorna em bytes
                // o valor dessa conta retornar quebrado então com intval transforma o numero em inteiro
                $tamanho = intval($imagem['size'] / 1024);
                if($tamanho < 300){
                    return true;

                } else{
                    return false;
                }

                return true;

            } else{
                return false;
            }
        }

        public static function uploadImagem($file){
            //função que faz uploads de imagem atraves dos formularios
            if(move_uploaded_file($file['tmp_name'],BASE_DIR_PAINEL.'/uploads/'.$file['name'])){
                return $file['name'];
            } else {
                return false;
            }
        }

        public static function deleteFile($file){
            @unlink(BASE_DIR_PAINEL.'/uploads/'.$file);
        }

    }



?>