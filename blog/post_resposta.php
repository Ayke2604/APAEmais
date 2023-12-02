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
        <form action="core/post_resposta_repositorio.php" method="post">
            <input type="hidden" name="acao" value="insert">
            <input type="hidden" name="id_post"
                               value="<?php echo $_GET["post"] ?? '' ?>"> 
            <input type="text" name="titulo" id="">
            <input type="text" name="texto" id="">
            <input type="submit" value="enviar">
        </form>
    </body>

</html>