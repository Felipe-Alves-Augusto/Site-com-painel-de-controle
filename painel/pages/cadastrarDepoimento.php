<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Depoimento</title>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL ?>css/login.css">
</head>
<body <?php verificarPermissaoPagina(2); ?>>
    <div class="edit">
        <h2>Cadastro de Depoimentos</h2>

        <form action="" method="post">

            <?php
                if(isset($_POST['acao'])){
                    if(Painel::insert($_POST)){
                        Painel::alert('sucesso','Cadastramento feito com sucesso!');
                    } else{
                        Painel::alert('erro', 'Não pode enviar campos vazios!');
                    }
                }

            ?>

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="hidden" name="nome_tabela" value="tb_admin.depoimentos">
                <input type="text" name="nome" class="form-control">
            </div><!--form-group-->
            <div class="form-group">
                <label for="depoimento">Escreva o depoimento:</label>
                <textarea name="depoimento" id="" class="form-control"></textarea>
            </div><!--form-group-->
            <input type="submit" class="btn btn-primary" name="acao" value="Cadastrar">
            

        </form>

    </div><!--edit-->
    
</body>
</html>