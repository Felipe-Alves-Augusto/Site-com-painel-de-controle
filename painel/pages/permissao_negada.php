<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php INCLUDE_PATH_PAINEL ?>css/login.css">
    
    <title></title>
    <style>
        .box-content{
            width:100%;
            margin-top:40px;
        }

        
    </style>
</head>
<body>

    <div class="box-content">
        <?php Painel::alert('erro','Você não tem permissão de acessar esta página!'); ?>
    </div>

    

</body>
</html>