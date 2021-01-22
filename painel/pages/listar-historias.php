<?php
    $historias = Painel::selectAll('tb_admin.historias');

    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        $selectImagem = MySql::conectar()->prepare("SELECT foto FROM `tb_admin.historias` WHERE id = ?");
        $selectImagem->execute(array($_GET['excluir']));
        @$imagem = $selectImagem->fetch()['foto'];
        Painel::deleteFile($imagem);
        Painel::deletar('tb_admin.historias', $idExcluir);
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Novas Histórias</title>
</head>
<body <?php verificarPermissaoPagina(2);?>>
    <div class="table-2">
        <h2><i class="fas fa-history"></i>  Listar Novas Histórias</h2>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th class="scope">Data</th>
                    <th class="scope">Título</th>
                    <th class="scope">Foto</th>
                    <th class="scope">Editar</th>
                    <th class="scope">Deletar</th>
                </tr>
            </thead>
            <tbody class="table-light">

                <?php 
                    foreach($historias as $key => $value){

                    
                ?>

                <tr>
                    <td><?php echo  $value['data']; ?></td>
                    <td><?php echo $value['titulo']; ?></td>
                    <td><img style="height:50px; " src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['foto']; ?>" alt=""></td>
                    <td><a class="btn btn-primary" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-historias?id=<?php echo $value['id']; ?>">Editar</a></td>
                    <td><a class="btn btn-danger" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-historias?excluir=<?php echo $value['id'];?>">Deletar</a></td>
                </tr>
                <?php } ?>
            
            </tbody>
        </table>
    </div><!--edit-->
    
    <script src="https://kit.fontawesome.com/8debdb91c9.js" crossorigin="anonymous"></script>
</body>
</html>