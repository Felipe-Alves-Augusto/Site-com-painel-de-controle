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
        <h1><i class="fas fa-history"></i> Novas Histórias</h1>
        <form method="post" enctype="multipart/form-data">

            <?php
                    
                if(isset($_POST['acao'])){
                    $data = $_POST['data'];
                    $titulo = $_POST['titulo'];
                    $content = $_POST['content'];
                    $imagem = $_FILES['foto'];

                    if($data == ''){
                        Painel::alert('erro','Mencione uma data!');

                    } else if($titulo == ''){
                        Painel::alert('erro','Mencione um título para sua história!');

                    } else if($content == ''){
                        Painel::alert('erro','Mencione o conteúdo da sua história!');

                    } else if($imagem == ''){
                        Painel::alert('erro','Selecione uma imagem para sua história!');

                    } else{
                        //podemos cadastrar
                        if(Painel::imagemValida($imagem) == true){
                            Painel::alert('erro','Selecione um formato JPEG, JPG ou PNG');

                        } else{
                            $imagem = Painel::uploadImagem($imagem);
                            $arr = ['data'=>$data, 'titulo'=>$titulo, 'foto'=>$imagem, 'content'=>$content, 'nome_tabela'=>'tb_admin.historias'];
                            Painel::insert($arr);
                            Painel::alert('sucesso','Sua história foi cadastrada com sucesso!');
                        }
                    }
                }
                   

            ?>

       
            <div class="form-group">
                <label for="name">Data:</label>
                <input type="date" name="data" class="form-control" id="data" value="">
            </div><!--form-group-->
            <div class="form-group">
                <label for="senha">Título:</label>
                <input type="text" name="titulo" class="form-control" id="titulo" value="">
            </div><!--form-group-->
            <div class="form-group">
                <label for="email">Conteúdo:</label>
                <textarea type="text" name="content" class="form-control" id="content" value=""></textarea>
            </div><!--form-group-->

            <div class="form-group">
                <label for="img">Imagem:</label>
                <input type="file" name="foto" class="form-control" id="img">
                <input type="hidden" name="img_atual" value="">
                <input type="hidden" name="nome_tabela" value="tb_admin.historias">
            </div><!--form-group-->
            <button type="submit" name="acao" class="btn btn-primary">Cadastrar!</button>
        </form>
    </div><!--BOX-CONTENT-->



<script src="https://kit.fontawesome.com/8debdb91c9.js" crossorigin="anonymous"></script>
    
</body>
</html>