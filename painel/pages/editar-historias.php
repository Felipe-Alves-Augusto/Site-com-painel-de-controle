<?php
    // se a url tiver o parametro id faça isso
    if(isset($_GET['id'])){
        //pegando o id clicado
        $id = intval($_GET['id']);
        $historias = Painel::select('tb_admin.historias','id = ?',array($id));
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
    <title>Adicionar Usúarios</title>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL ?>css/login.css">
</head>
<body <?php verificarPermissaoPagina(2); ?>>
<div class="edit">
        <h1><i class="fas fa-history"></i> Editar Novas Histórias</h1>
        <form method="post" enctype="multipart/form-data">

            <?php
                    
                if(isset($_POST['acao'])){
                    $data = $_POST['data'];
                    $titulo = $_POST['titulo'];
                    $content = $_POST['content'];
                    $imagem = $_FILES['foto'];
                    $imagem_atual = $POST['imagem_atual'];
                }
               

                    
                   

            ?>

       
            <div class="form-group">
                <label for="name">Data:</label>
                <input type="date" name="data" class="form-control" id="data" value="<?php echo $historias['data']; ?>">
            </div><!--form-group-->
            <div class="form-group">
                <label for="senha">Título:</label>
                <input type="text" name="titulo" class="form-control" id="titulo" value="<?php echo $historias['titulo']; ?>">
            </div><!--form-group-->
            <div class="form-group">
                <label for="email">Conteúdo:</label>
                <textarea type="text" name="content" class="form-control" id="content"><?php echo $historias['content']; ?></textarea>
            </div><!--form-group-->

            <div class="form-group">
                <label for="img">Imagem:</label>
                <input type="file" name="foto" class="form-control" id="img">
                <input type="hidden" name="img_atual" value="<?php echo $historias['foto']; ?>">
                <input type="hidden" name="nome_tabela" value="tb_admin.historias">
            </div><!--form-group-->
            <button type="submit" name="acao" class="btn btn-primary">Editar!</button>
        </form>
    </div><!--BOX-CONTENT-->



<script src="https://kit.fontawesome.com/8debdb91c9.js" crossorigin="anonymous"></script>
    
</body>
</html>