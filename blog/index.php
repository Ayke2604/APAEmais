<!DOCTYPE html>
<html>
    <head>
    <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>laços que transformam</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='../css/duvidas.css'>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    </head>
    <body>
    <div class="col-md-12">
                    <!-- Topo //-->
                    <?php
                        include 'includes/topo.php';
                    ?>
                </div>
   


                <div class="col-md-12">
                    <!-- Topo //-->
                    <?php
                        include 'includes/menu.php';
                    ?>
                </div>









<div class="col-md-12">
                    <!-- Topo //-->
                    <?php
                        include 'includes/topo1.php';
                    ?>
                </div>

        <div class="container">
            <div class="row">
                
            </div>
            <div class="row" style="min-height: 500px;">
                <div class="col-md-12">

            <div class="col-md-10" style="padding-top: 5px;">
                <!--Conteúdo //-->
                
                <?php
                    include 'includes/busca.php';
                ?>

                <?php
                    date_default_timezone_set('America/Sao_Paulo'); // Seta o fuso horario correto
                    require_once 'includes/funcoes.php';
                    require_once 'core/conexao_mysql.php';
                    require_once 'core/sql.php';
                    require_once 'core/mysql.php';

                    foreach($_GET as $indice => $dado) {
                        $$indice = limparDados($dado);
                    }

                    $data_atual = date('Y-m-d H:i:s'); //serve como parametro para serem exibidos apenas
                    // os posts com datas menores ou igual a essas.
                    // usa-se ano/mes/dia para ser mais facil de comparar em ordem decrescente
                    $criterio = [
                        ['data_postagem', '<=', $data_atual]
                    ];

                    if(!empty($busca)) {
                        $criterio[] = [
                            'AND',
                            'titulo',
                            'like',
                            "%{$busca}%"
                        ];
                        
                    }

                    $posts = buscar(
                        'post',
                        [
                            'titulo',
                            'data_postagem',
                            'id',
                            ' (select nome 
                                from usuario
                                where usuario.id = post.usuario_id) as nome'
                        ],
                        $criterio,
                        'data_postagem DESC'
                    );
                ?>

                <div>
                <div class="list-group">
                        <?php
                        foreach($posts as $post):
                            $data = date_create($post['data_postagem']); //cria a data
                            $data = date_format($data, 'd/m/Y H:i:s'); // formata a data
                            
                        ?>
                        <a class="list-group-item list-group-item-action"
                            href="post_detalhe.php?post=<?php echo $post['id']?>"> <!--Cria uma href com base em ID-->
                            <strong><?php echo $post['titulo']?></strong>
                            [<?php echo $post['nome']?>]
                            <span class="badge badge-dark"><?php echo $data?></span>
                        </a>
                        <?php if((isset($_SESSION['login'])) //checa se esta logado e se o adm é = 1
                && ($_SESSION['login']['usuario']['adm'] === 1)) : ?>
                        <a href="core/post_repositorio.php?acao=delete&id=<?php echo $post['id']?>"> Deletar
                        </a>
                        <?php endif;?>
                        <?php endforeach; ?>
                    </div>

                            

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
               
            </div>
        </div>
    </div>
    
    <div class="col-md-12">
                    <!-- Topo //-->
                    <?php
                        include 'includes/rodape.php';
                    ?>
                </div>


    
    </body>
</html>