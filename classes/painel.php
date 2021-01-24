<?php

    class Painel {

        public static function logado(){

            return isset($_SESSION['login']) ? true : false;

        }

        public static function loggout(){
            setcookie('lembrar', true, time()-1, '/');
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
                echo '<div class="sucesso bg-success">'.$mensagem.'</div>';
            } else if($tipo == 'erro'){
                echo '<div class="erro bg-danger">'.$mensagem.'</div>';
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
            if($imagem['type'] == 'imagem/jpeg' || $imagem['type'] == 'imagem/jpg' || $imagem['type'] == 'imagem/png'){
                // pegando o tamanho da imagem com o $imagem['size'] e convertendo em KB dividindo em 1024
                // o size retorna em bytes
                // o valor dessa conta retornar quebrado então com intval transforma o numero em inteiro
                $tamanho = intval($imagem['size'] / 1024);
                if($tamanho < 400){
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
            $formatoArquivo = explode('.',$file['name']);
            $imagemNome = uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1];
            if(move_uploaded_file($file['tmp_name'],BASE_DIR_PAINEL.'/uploads/'.$imagemNome)){
                return $imagemNome;
            } else {
                return false;
            }
        }

        public static function deleteFile($file){
            @unlink(BASE_DIR_PAINEL.'/uploads/'.$file);
        }

        public static function insert($arr){
            $certo = true;
            $nome_tabela = $arr['nome_tabela'];
            $query = "INSERT INTO `$nome_tabela` VALUES (null";
            foreach($arr as $key => $value){
                $nome_coluna= $key;
                $valor = $value;
                if($nome_coluna == 'acao' || $nome_coluna == 'nome_tabela'){
                    continue;
                }

                if($value == ''){
                    $certo = false;
                    break;
                }

                $query.=",?";
                $parametros[] = $value;
            }

            $query.=")";
            if($certo == true){
                $sql = MySql::conectar()->prepare($query);
                @$sql->execute($parametros);
            }
            return $certo;

        }

        public static function selectAll($tabela){

            $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela`");
            $sql->execute();
            return $sql->fetchAll();

        }

        public static function deletar($tabela,$id=false){
            if($id == false){
                $sql = MySql::conectar()->prepare("DELETE FROM `$tabela`");
            } else{
                $sql = MySql::conectar()->prepare("DELETE FROM `$tabela` WHERE id = $id");
            }
            $sql->execute();
        }

        // select para pegar apenas um elemento especifico

        //table = nome da tabela
        //query = mecionar o id = ?
        // array para executar o comando
        public static function select($table,$query,$arr){
            $sql = MySql::conectar()->prepare("SELECT * FROM `$table` WHERE $query");
            $sql->execute($arr);
            return $sql->fetch();
        }

            // FUNÇÃO DE UPDATE DINAMICA
        /*
        public static function update($arr){
            $certo = true;
            $first = false;
            $nome_tabela = $arr['nome_tabela'];
            $query = "UPDATE `$nome_tabela` SET ";
            foreach($arr as $key => $value){
                $nome_coluna= $key;
                $valor = $value;
                if($nome_coluna == 'acao' || $nome_tabela == 'nome_tabela' || $nome == 'id'){
                    continue;
                }

                if($value == ''){
                    $certo = false;
                    break;
                }

                if($first == false){
                    $first = true;
                    $query.="$nome=?";
                } else{
                    $query.=",$nome=?";
                }
                
                $parametros[] = $value;
            }

            
            if($certo == true){
                $parametros[] = $arr['id'];
                $sql = MySql::conectar()->prepare($query. 'WHERE id=?');
                $sql->execute($parametros);
            }
            return $certo;

        }
        */

        // função para atualizar o depoimento

        public static function atualizarDepoimento($nome,$depoimento,$id){
            $sql = MySql::conectar()->prepare("UPDATE `tb_admin.depoimentos` SET nome = ?, depoimento = ? WHERE id = ?");
            if($sql->execute(array($nome,$depoimento,$id))){
                return true;
                
            } else{
                return false;
            }
        }


        public static function atualizarHistorias($data, $titulo, $foto,$content,$id){
            $sql = MySql::conectar()->prepare("UPDATE `tb_admin.historias` SET data = ?, titulo = ?, foto = ?, content = ?WHERE id = ?");
            if($sql->execute([$data, $titulo, $foto,$content,$id])){
                return true;

            } else{
                return false;
            }
            
        }

    }



?>