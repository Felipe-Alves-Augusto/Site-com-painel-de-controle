<?php
    $servicos = Painel::selectAll('tb_admin.servicos');

    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        Painel::deletar('tb_admin.servicos', $idExcluir);
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Depoimento</title>
</head>
<body <?php verificarPermissaoPagina(2);?>>
    <div class="table-2">
        <h2><i class="fas fa-address-card"></i> Listar Serviços</h2>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th class="scope">Serviços</th>
                    <th class="scope">Editar</th>
                    <th class="scope">Deletar</th>
                </tr>
            </thead>
            <tbody class="table-light">

                <?php 
                    foreach($servicos as $key => $value){

                    
                ?>

                <tr>
                    
                    <td><?php echo $value['servicos']; ?></td>
                    <td><a class="btn btn-primary" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-servicos?id=<?php echo $value['id']; ?>">Editar</a></td>
                    <td><a class="btn btn-danger" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-servicos?excluir=<?php echo $value['id'];?>">Deletar</a></td>
                </tr>
                <?php } ?>
            
            </tbody>
        </table>
    </div><!--edit-->
    
    <script src="https://kit.fontawesome.com/8debdb91c9.js" crossorigin="anonymous"></script>
</body>
</html>