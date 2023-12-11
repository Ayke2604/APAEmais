<!DOCTYPE html> <!--Código de detalhamento de um post-->
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Page Title</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='../css/resposta2.css'>
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
    $id_post = $post;
    
    $posts = buscar(
        'post',
        [
            'id',
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

    $respostas = buscar(
       /* 'resposta',
        [
            'id',
            'texto',
            'titulo',
            'data_criacao',
            '(select nome
                from usuario
                where usuario_id = resposta.usuario_id) as nome'
        ],
        [
            ['fk_id_post', '=', $post["id"]]
        ]*/
         'resposta',
        [
            'id',
            'titulo',
            'data_criacao',
            'texto',
            '(select nome
                from usuario
                where usuario.id = resposta.usuario_id) as nome'
        ],
        [
            ['fk_id_post', '=', $post["id"]]
        ]
    );
    
   

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
                        <h3 class="resposta">Comentários:</h3>
                    </div>
                </div>
            </div>
            
            <?php
                foreach($respostas as $resposta):
                            $data = date_create($resposta['data_criacao']); //cria a data
                            $data = date_format($data, 'd/m/Y H:i:s'); // formata a data              
            ?>
                        <a class="list-group-item list-group-item-action"> <!--Cria uma href com base em ID-->
                        <div class="resposas_cometario">    
                        -<?php echo $resposta['nome']?>-
                            <strong><?php echo $resposta ['titulo']?></strong>
                            <?php echo $resposta['texto']?>
                            <span class="badge badge-dark"><?php echo $data?></span>
                </div>
                        </a>
                
                        <?php endforeach; ?>
            <button class="botao"><a href="index.php">Voltar</a></button>
           
        
          
            <button class="botao2"><a href="post_resposta.php?post=<?php echo $post['id']; ?>">Responder</a></button>
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