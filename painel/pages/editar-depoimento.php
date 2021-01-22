<?php
    // se a url tiver o parametro id faça isso
    if(isset($_GET['id'])){
        //pegando o id clicado
        $id = intval($_GET['id']);
        $depoimento = Painel::select('tb_admin.depoimentos','id = ?',array($id));
    } else{
        Painel::alert('erro','Você precisar recuperar o ID.');
        die();
    }
        

?>

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
        <h2><i class="far fa-edit"></i>Novas Histórias</h2>

        <form action="" method="post">

           <?php 
                if(isset($_POST['acao'])){
                    $nome = $_POST['nome'];
                    $depoimento2 = $_POST['depoimento'];
                    $idUpdate = $_POST['id'];
                    if(Painel::atualizarDepoimento($nome,$depoimento2,$idUpdate)){
                        Painel::alert('sucesso','Depoimento atualizado com sucesso!');

                    } else{
                        Painel::alert('erro','Erro ao atualizar o depoimento!');
                    }
                }

            ?>

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="hidden" name="nome_tabela" value="tb_admin.depoimentos">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="text" name="nome" class="form-control" value="<?php echo $depoimento['nome']; ?>">
            </div><!--form-group-->
            <div class="form-group">
                <label for="depoimento">Escreva o depoimento:</label>
                <textarea name="depoimento" class="form-control"><?php echo $depoimento['depoimento']; ?></textarea>
            </div><!--form-group-->
            <input type="submit" class="btn btn-primary" name="acao" value="Editar">
            

        </form>

    </div><!--edit-->
    
</body>
</html>