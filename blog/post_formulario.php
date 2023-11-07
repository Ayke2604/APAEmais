<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Page Title</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='../css/post.css'>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>




  <header>
    <a href="#"><img src="../img/Logo2.png" class="logo"></a>
    <div class="menuuu"></div>
    <nav>
      <ul>
        <li><a href="#" class="c">Início</a></li>
        <li><a href="#">Sobre nós</a></li>
        <li><a href="#">Contatos</a></li>

        

        
        <li><a href="blog/index.php">Fórum</a></li>

      </ul>
    </nav>
    <div class="clearfix"></div>
  </header>


  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      $('.menuuu').click(function () {
        $('.menuuu').toggleClass('active')
        $('nav').toggleClass('active')
      })
    })
  </script>

 

 

            <div class="row" style="min-height: 500px;">
                
                <div class="col-md-10" style="padding-top: 50px;">
                    <?php
                        require_once 'includes/funcoes.php';
                        require_once 'core/conexao_mysql.php';
                        require_once 'core/sql.php';
                        require_once 'core/mysql.php';

                        foreach($_GET as $indice => $dado){
                            $$INDICE = limparDados($dado);
                        }

                        if(!empty($id)){
                            $id = (int)$id;

                            $criterio = [
                                ['id', '=', $id]
                            ];

                            $retorno = buscar(
                                'post',
                                ['*'],
                                $criterio
                            );

                            $entidade = $retorno[0];
                        }
                    ?>

                    <h1 class="titulo">Forum</h1>
                    <form method="post" action="core/post_repositorio.php">
                        <input type="hidden" name="acao"
                            value="<?php echo empty($id) ? 'insert' : 'update' ?>">
                        <input type="hidden" name="id"
                            value="<?php echo $entidade['id'] ?? '' ?>">
                        <div class="form-group">
                                
                                <input class="form-group" type="text"  placeholder="Título"
                                    required id="titulo" name="titulo"
                                    value="<?php echo $entidade['titulo'] ?? '' ?>">
                        </div>
                        <div class="form-group">
                                
                                <textarea class="form-control" type="text"  placeholder="Texto"
                                    require="require" id="texto" name="texto" rows="5"><?php echo $entidade['texto'] ?? '' ?></textarea>
                        </div>
                        <div class="form-group">
                            <h2 class="texto">Data e hora de postagem:</h2>
                            <?php 
                                $data = (!empty($entidade['data_postagem']))?
                                    explode(' ', $entidade['data_postagem'])[0] : '';
                                $hora = (!empty($entidade['data_postagem']))? // separa a hora da data pelo explode
                                    explode(' ', $entidade['data_postagem'])[1] : '';
                            ?>
                            <div class="row">
                                <div class="col-md-3">  
                                    <input class="form-control" type="date"
                                        required
                                        id="data_postagem"
                                        name="data_postagem"
                                        value="<?php echo $data ?>">
                                </div>
                                <div class="col-md-3">  
                                    <input class="form-control" type="time"
                                        required
                                        id="hora_postagem"
                                        name="hora_postagem"
                                        value="<?php echo $hora ?>">
                                </div>
                            </div>
                        </div>   
                        <div class="texto-right">  
                            <button class="active"
                                    type="submit">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>


  
  <footer><a href="https://github.com/Ayke2604">
      <p>Git - Ayke2604</p>
    </a></footer>
  <script src='js/central.js'></script>
</body>

</html>