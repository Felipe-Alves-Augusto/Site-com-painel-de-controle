<?php $userOnline = Painel::listarUserOnline(); 

      //pegando visitar totais do site
      $visitasTotal = MySql::conectar()->prepare("SELECT * FROM `tb_admin_visitas`");
      $visitasTotal->execute();

      $visitasTotal = $visitasTotal->rowCount();


      //pegando visitar hoje do site
      $visitasHoje = MySql::conectar()->prepare("SELECT * FROM `tb_admin_visitas` WHERE dia = ?");
      $visitasHoje->execute(array(date('Y-m-d')));

      $visitasHoje = $visitasHoje->rowCount();


?>

<section class="home">
        <h1><i class="fas fa-home"></i> Painel de Controle</h1>
    </section>
    <div class="content">
        <div style="background-color:#311b92" class="box-content">
            
                <h2><i class="fas fa-eye"></i> Usuários Online</h2>
           
            <p><?php echo count($userOnline);?></p>
        </div><!--box--content-->
        <div style="background-color:#ffc107" class="box-content">
           
                <h2>Total de Visitas</h2>
           
            <p><?php echo $visitasTotal;?></p>
        </div><!--box--content-->
        <div style="background-color:#d50000" class="box-content">
            
                <h2>Visitas Hoje</h2>
            
            <p><?php echo $visitasHoje;?></p>
        </div><!--box--content-->
    </div><!--content-->
    <section class="user-online">
    <table class="table">
  <thead class="thead-dark">

    <tr>
      <th scope="col">#</th>
      <th scope="col">IP</th>
      <th scope="col">Ultima Ação</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($userOnline as $key => $value){

   ?>
    <tr>
      <th scope="row">1</th>
      <td><?php echo $value['ip']; ?></td>
      <td><?php echo date('d-m-y H:i',strtotime($value['ultima_acao']));?></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
    </tr>
  </tbody>
<?php } ?>
</table>
    </section><!--table-->
    <section class="grafico">
        <canvas id="myChart" width="1000"></canvas>
    </section><!--grafico-->