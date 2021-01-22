<?php
    $depoimentos = Painel::selectAll('tb_admin.depoimentos');

    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        Painel::deletar('tb_admin.depoimentos', $idExcluir);
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
        <h2><i class="fas fa-address-card"></i> Listar Depoimento</h2>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th class="scope">Nome</th>
                    <th class="scope">Depoimento</th>
                    <th class="scope">Editar</th>
                    <th class="scope">Deletar</th>
                </tr>
            </thead>
            <tbody class="table-light">

                <?php 
                    foreach($depoimentos as $key => $value){

                    
                ?>

                <tr>
                    <td><?php echo $value['nome']; ?></td>
                    <td><?php echo $value['depoimento']; ?></td>
                    <td><a class="btn btn-primary" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-depoimento?id=<?php echo $value['id']; ?>">Editar</a></td>
                    <td><a class="btn btn-danger" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-depoimento?excluir=<?php echo $value['id'];?>">Deletar</a></td>
                </tr>
                <?php } ?>
            
            </tbody>
        </table>
        <nav aria-label="">
            <ul class="pagination pagination-sm">
            <li class="page-item active" aria-current="page">
                <span class="page-link">1</span>
            </li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
  </ul>
</nav>
    </div><!--edit-->
    
    <script src="https://kit.fontawesome.com/8debdb91c9.js" crossorigin="anonymous"></script>
</body>
</html>