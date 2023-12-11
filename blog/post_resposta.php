<!DOCTYPE html>
<html>
    <head>
    <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>laços que transformam</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='../css/responder.css'>
  

    </head>
    <body>
    <h1 class="titulo">Resposta</h1>
    <h2 class="texto">Escreva seu comentário</h2>
        <form action="core/post_resposta_repositorio.php" method="post">
            <input type="hidden" name="acao" value="insert">
            <input type="hidden" name="id_post"
                               value="<?php echo $_GET["post"] ?? '' ?>"> 
            <input type="text" name="titulo" id="" maxlength="75" placeholder="Titúlo (75 - Max. Caracteres)">
            <input type="text" name="texto" id="" maxlength="80" placeholder="Texto (80 Max. Caracteres)">
            <div class="texto-right">  
                           <a href='post_detalhe.php'> <button class="active"
                                    type="submit" >Salvar</button></a>
                        </div>
        </form>
    </body>

</html>