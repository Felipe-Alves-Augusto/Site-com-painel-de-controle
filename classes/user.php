<?php

    class User {

        public function atualizarUser($email,$senha,$imagem,$nome){
            $sql = MySql::conectar()->prepare("UPDATE `tb_admin.usuarios` SET email = ?, password = ?, img = ?, nome = ? WHERE email = ?");
            if($sql->execute(array($email,$senha, $imagem, $nome,$_SESSION['email']))){
                return true;

            } else{
                return false;
            }
        }

        public static function userExists($email){
            $sql = MySql::conectar()->prepare("SELECT `id` FROM `tb_admin.usuarios` WHERE email = ?");
            $sql->execute(array($email));
            if($sql->rowCount() == 1){
                return true;

            } else{
                return false;
            }
        }


        // função para inserir os usuarios no banco de dados
       
        public static function cadastrarUsuario($email,$senha,$imagem,$nome,$cargo){
            $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.usuarios`(id,email,password,img,nome,cargo) VALUES (null,?,?,?,?,?)");
            $sql->execute([$email,$senha,$nome,$cargo]);
        }

    }




?>