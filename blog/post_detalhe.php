<!DOCTYPE html> <!--Código de detalhamento de um post-->
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Page Title</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='../css/resposta.css'>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>



<?php
    require_once 'includes/funcoes.php';
    require_once 'core/conexao_mysql.php';
    require_once 'core/sql.php';
    require_once 'core/mysql.php';

    foreach($_GET as $indice => $dado) {
        $$indice = limparDados($dado);
    }

    $posts = buscar(
        'post',
        [
            'titulo',
            'data_postagem',
            'texto',
            '(select nome
                from usuario
                where usuario.id = post.usuario_id) as nome'
        ],
        [
            ['id', '=', $post]
        ]
    );
    $post = $posts[0];
    $data_post = date_create($post['data_postagem']);
    $data_post = date_format($data_post, 'd/m/Y H:i:s');

?>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                        include 'includes/topo.php';
                    ?>

                </div>
            </div>
            <div class="row" style="min-height: 500px;">
                <div class="col-md-12">
                    <?php include 'includes/menu.php'; ?>
                </div>
                <div class="col-md-10" style="padding-top: 50px;">
                    <div class="card-body">
                        <h5 class="titulo"><?php echo $post['titulo']?></h5>
                        <h5 class="list-group">
                            <?php echo $data_post?> Por <?php echo $post['nome']?>
                        </h5>
                        <div class="list-group2">
                           <p> <?php echo html_entity_decode($post['texto']) ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="botao"><a href="index.php">Voltar</a></button>
            <div class="row">
                <div class="col-md-12">
                    <?php 
                        include 'includes/rodape.php';
                    ?>
                    
                </div>
            </div>
        </div>
      
        <script src="lib/bootstrap-4.2.1-dist/js/bootstrap.min.js"></script>
    </body>
</html>