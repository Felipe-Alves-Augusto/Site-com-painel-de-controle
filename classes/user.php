<?php

    class Usuario {

        public function atualizarUsuario($nome,$senha,$imagem){

            $sql = MySql::conectar()->prepare("UPDATE `tb_admin.usuarios` SET password = ?, img = ?, nome = ? WHERE user = ? ");

            if($sql->execute([$password,$imagem,$nome,$_SESSION['user']])){
                return true;
            } else{
                return false;
            }

        }

    }


?>