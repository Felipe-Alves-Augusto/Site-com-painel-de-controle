
<?php
    if(isset($_POST['acao'])){

        if($_POST['email'] != ''){

            $email = $_POST['email'];
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
               
               $mail = new Email(); // vc coloca as configurações da sua hospedagem para fazer o envio de email
                                        //host, email da hospedagem, senha e o nome
                $mail->address('felipealvesaugusto9@gmail.com'); // email da conta criada
                $info = array('assunto'=>'Um novo email cadastrado no site', 'corpo'=>$email);
                $mail->formatarEmail($info);
                if($mail->enviarEmail()){
                    
                   
                } else{
                    
                }

            } else{

                echo '<script>alert("Não é um email valido")</script>';

            }
            
            
        } else{

            echo '<script>alert("Campos vazios não são permitidos")</script>';

        }

    }

?>
<section style="background-image:url(https://images.pexels.com/photos/34950/pexels-photo.jpg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);background-position:center;background-size:cover;" class="banner-principal">
    <div class="banner-single"></div><!--banner-principal-->
        <div class="auto-play">
            <form id="form" action="" method="post">
                <h2>Qual seu melhor e-mail?</h2>
                <input id="email" type="email" name="email">
                <br>
                <input type="submit" value="Cadastrar" name="acao">

                
        
                <p id="error" class="error">Insira seu E-mail!</p>
                <p id="sucess">Cadastrado com Sucesso!<i id="close" class="fas fa-times"></i></p>

            </form>
        </div><!--auto-play-->
    </section><!--banner-principal-->
    <section class="sobre" id="sobre">
    
        <p>Novembro 14, 2020</p>
        <h1>Lorem Ipsum</h1>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum omnis ipsa explicabo, nesciunt sit velit dicta! Optio minus reprehenderit molestiae? Quae sequi magni non deleniti quia dolor quam officia id!</p>
        <img src="https://images.pexels.com/photos/589840/pexels-photo-589840.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="">
    </section><!--sobre-->
        <h1 class="story">HISTÓRIAS</h1>
            <?php 

                $historias = MySql::conectar()->prepare("SELECT * FROM `tb_admin.historias`");
                $historias->execute();
                $historias = $historias->fetchAll();

                foreach ($historias as $key => $value) {



            ?>
               
                <section class="card">
                
                    <div class="titulo-card">
                        <p><?php echo $value['data']; ?></p>
                        <h2><?php echo $value['titulo']; ?></h2>
                        <div class="zoom">
                            <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['foto']; ?>" alt="">
                        </div><!--zoom-->
                        <p><?php echo $value['content']; ?></p>
                        <button>HISTÓRIA</button>
                    </div><!--titulo-card-->
                </section><!--card-->
        <?php } ?>
        <div class="clear"></div>
    
    </div><!--container-->

  
    <section id="servicos" class="clientes">
        <div class="depoimentos">
            <h2>Depoimentos de nossos Clientes!</h2>
            <?php
                    $depoimentos = MySql::conectar()->prepare("SELECT * FROM `tb_admin.depoimentos`");
                    $depoimentos->execute();
                    $depoimentos = $depoimentos->fetchAll();

                    foreach($depoimentos as $key => $value){

                    
                    
                ?>

                <p><?php echo $value['depoimento']; ?></p>

                <?php }?>

            
            <hr>
            
      
           
        </div><!--depoimentos-->
        <div class="servicos">

            <h2>Serviços</h2>
            <?php 
                $servicos = MySql::conectar()->prepare("SELECT * FROM `tb_admin.servicos`");
                $servicos->execute();
                $servicos = $servicos->fetchAll();

                foreach($servicos as $key => $value){
            ?>
            <ul>
            
     
                <li><?php echo $value['servicos']; ?><li>
                
                <?php } ?>
  
            </ul>
        </div><!--servicos-->
    </section><!--depoimentos-->
    <div class="user" id="user">
    <a href="<?php echo INCLUDE_PATH_PAINEL;?>"><i class="fas fa-user-cog animate__animated animate__heartBeat animate__repeat-3 animate__delay-2s "></i></a>
    </div>