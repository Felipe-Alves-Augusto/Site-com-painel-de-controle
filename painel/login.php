<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL?>css/login.css">
</head>
<body>
    <aside style="background-color: #1de9b6;height:100%" class="sidebar">
        <h1>Bem Vindo!</h1>
        <p>Efetue o login para acessar o painel de controle!</p>
        <p>ou clique no botão abaixo para voltar para o site</p>
        <a href="../index.php"><button>HOME</button></a>
    </aside><!--sidebar-->

    <div class="box-login">
        <h2>EFETUE O LOGIN:</h2>
    <?php

        if(isset($_POST['acao'])){
            $email = $_POST['email'];
            $password = $_POST['senha'];
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE email = ? AND password = ? ");
            $sql->execute([$email, $password]);
            if($sql->rowCount() == 1){
                //logamos com sucesso
                //chamando as colunas do banco
                $info = $sql->fetch();
                $_SESSION['login'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['user'] = $user;
                $_SESSION['password'] = $password;
                $_SESSION['cargo'] = $info['cargo'];
                $_SESSION['nome'] = $info['nome'];
                $_SESSION['img'] = $info['img'];
                header('Location:'.INCLUDE_PATH_PAINEL);
                die();
                echo 'entro';

            } else{
                //falhou ao logar
                echo '<p style="color:red;margin-top:20px" class="error">Email e senha incorretos!</p>';
            }
        }   
    ?>
        <form action="" method="post">
            <input type="email" name="email" placeholder="Email:">
            <input type="password" name="senha" placeholder="Senha:">
            <input type="submit" name="acao" value="ENTRAR!">
        
        </form>
    </div><!--box-login-->
    
</body>
</html>