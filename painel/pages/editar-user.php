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
                    
                    $nome = $_POST['nome'];
                    $senha = $_POST['password'];
                    $email = $_POST['email'];
                    $imagem = $_FILES['imagem']; // O $_FILES serve para resgatar inputs do tipo file
                    $img_atual = $_POST['img_atual'];
                    $user = new User();
                    if($imagem['name'] != ''){
                        // existe o upload de imagem
                        if(Painel::imagemValida($imagem)){
                            Painel::deleteFile($img_atual);
                            $imagem = Painel::uploadImagem($imagem);
                            if($user->atualizarUser($email,$senha,$imagem,$nome)){
                                Painel::alert('sucesso','Atualizado com sucesso!');
    
                            } else{
                                Painel::alert('erro', 'Ocorreu um erro ao atualizar com a imagem!');
                            }
                          

                        }


                    } else{
                        $imagem = $img_atual;
                        if($user->atualizarUser($email,$senha,$imagem,$nome)){
                            Painel::alert('sucesso','Atualizado com sucesso!');

                        } else{
                            Painel::alert('erro', 'Ocorreu um erro ao atualizar!');
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
                <input type="password" name="password" class="form-control" id="senha" value="<?php echo $_SESSION['password']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" id="email" value="<?php echo $_SESSION['email']; ?>">
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