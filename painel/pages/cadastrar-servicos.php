
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Depoimento</title>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL ?>css/login.css">
</head>
<body <?php verificarPermissaoPagina(2); ?>>
    <div class="edit">
        <h2><i class="far fa-edit"></i> Cadastrar Serviços</h2>

        <form action="" method="post">

           <?php 
                $nome_tabela =  'tb_admin.servicos';
                if(isset($_POST['acao'])){
                    if(Painel::insert($_POST)){
                        Painel::alert('sucesso','Serviço cadastrado com sucesso!');

                    } else{
                        Painel::alert('erro', 'Erro ao cadastrar o serviço!');
                    }
                }


            ?>

     
            <div class="form-group">
                <label for="depoimento">Escreva o depoimento:</label>
                <textarea name="servicos" id="" class="form-control"></textarea>
                <input type="hidden" name="nome_tabela" value="tb_admin.servicos">
            </div><!--form-group-->
            <input type="submit" class="btn btn-primary" name="acao" value="Cadastrar">
            

        </form>

    </div><!--edit-->
    
</body>
</html>