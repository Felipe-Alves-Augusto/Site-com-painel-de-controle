<?php

  if(isset($_GET['excluir'])){
    $deletarID = intval($_GET['excluir']);
    //Painel::deletar('tb_admin.usuarios', $deletarID);
  }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Deletar Usuários</title>
  <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL ?>css/login.css">

</head>
<body <?php verificarPermissaoPagina(2); ?>>
  <div class="edit">
      <h2>Deletar Usuários</h2>
      <table class="table">
  <thead class="thead-dark">
  <h2 class='description' style="margin-top:70px">Usuários cadastrados no painel</h2>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Cargo</th>
      <th scope="col">Deletar</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    
    $userPainel = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` ORDER BY nome ASC");
    $userPainel->execute();
    $userPainel = $userPainel->fetchAll();



    foreach($userPainel as $key => $value){

   ?>

    <tr>
      
      <td><?php echo $value['nome']; ?></td>
      <td><?php echo Painel::cargo($value['cargo']);?></td>
      <td><a href="<?php echo INCLUDE_PATH_PAINEL ?>deletar-user?excluir=<?php  $value['id']; ?>" class="btn btn-danger">Deletar</a></td>
    </tr>
  </tbody>
<?php } ?>
</table>

  </div><!--edit-->
</body>
</html>