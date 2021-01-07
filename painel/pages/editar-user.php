<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuários</title>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL?>css/style.css">
</head>
<body>
    <div class="edit">
        <h1><i class="fas fa-user-edit"></i> Editar Usuários</h1>
        <form method="post" enctype="multipart/form-data">

            <?php 

                if(isset($_POST['acao'])){
                    $password = $_POST['senha'];
                    $nome = $_POST['nome'];
                    $imagem = $FILES['imagem'];
                    $img_atual = $POST['img_atual'];

                    if($imagem['name'] != ''){

                    } else{
                        $imagem = $img_atual;
                        $usuario = new Usuario();
                        if($usuario->atualizarUsuario($nome, $senha,$imagem)){
                            Painel::alert('sucesso','Atualizado com sucesso!');

                        } else{
                            Painel::alert('erro', 'Falha ao atualizar!');
                        }
                    }
                    
                }
            ?>

            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" name="nome" class="form-control" id="name" value="<?php echo $_SESSION['nome'];?>">
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" class="form-control" id="senha" value="<?php echo $_SESSION['password']; ?>">
            </div>
            <div class="form-group">
                <label for="img">Imagem:</label>
                <input type="file" name="imagem" class="form-control" id="img">
                <input type="hidden" name="img_atual" value="<?php echo $_SESSION['img'];?>">
            </div>
            <button type="submit" name="acao" class="btn btn-primary">Atualizar</button>
        </form>
    </div><!--BOX-CONTENT-->



<script src="https://kit.fontawesome.com/8debdb91c9.js" crossorigin="anonymous"></script>
</body>
</html>