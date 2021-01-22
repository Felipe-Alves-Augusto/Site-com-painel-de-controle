<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Usúarios</title>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL ?>css/login.css">
</head>
<body <?php verificarPermissaoPagina(2); ?>>
<div class="edit">
        <h1><i class="fas fa-user-edit"></i> Adicionar Usuários</h1>
        <form method="post" enctype="multipart/form-data">

            <?php
                    
                if(isset($_POST['acao'])){
                    $senha = $_POST['password'];
                    $nome = $_POST['nome'];
                    $email = $_POST['email'];
                    $imagem = $_FILES['imagem'];
                    $cargo = $_POST['cargo'];

                    //validações dos campos para adicionar os usuarios
                    if($nome == ''){
                        Painel::alert('erro', 'O nome está vazio!');
                    }
                     else if($senha == ''){
                        Painel::alert('erro', 'A senha está vazia!');
                    } else if ($email == ''){
                        Painel::alert('erro', 'O email está vazio!');
                    } else if(User::userExists($email)){
                        Painel::alert('erro', 'Este email ja existe!, Por favor selecione outro.');
                    }
                     else if($cargo == ''){
                        Painel::alert('erro', 'Selecione um cargo');
                    } else{
                        // apenas cadastrar no banco de dados
                        $user = new User();
                        $user->cadastrarUsuario($email,$senha,$imagem,$nome,$cargo);
                        Painel::alert('sucesso', 'O cadastro do usuário '.$nome.' foi feito com sucesso!');
                    }
                    
                }

            ?>

       
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" name="nome" class="form-control" id="name" value="">
            </div><!--form-group-->
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" name="password" class="form-control" id="senha" value="">
            </div><!--form-group-->
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" id="email" value="">
            </div><!--form-group-->

            <div class="form-group">
                <label for="email">Cargo:</label>
                <select name="cargo" id="cargo">
                    <?php foreach(Painel::$cargos as $key => $value){
                        if($key < $_SESSION['cargo']) echo '<option value="'.$key.'">'.$value.'</option>';
                    } ?>
                </select>
            </div><!--form-group-->
            <div class="form-group">
                <label for="img">Imagem:</label>
                <input type="file" name="imagem" class="form-control" id="img">
                <input type="hidden" name="img_atual" value="">
            </div><!--form-group-->
            <button type="submit" name="acao" class="btn btn-primary">Cadastrar</button>
        </form>
    </div><!--BOX-CONTENT-->



<script src="https://kit.fontawesome.com/8debdb91c9.js" crossorigin="anonymous"></script>
    
</body>
</html>