
<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Page Title</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='../css/cadastro.css'>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>

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

  <br>
  <br>
  <form id="contact-form" class="form cf" method="post" action="core/usuario_repositorio.php">
    <h3 class="col-100">Login *</h3>

    <div class="col cf">
        <input type="hidden" name="acao" value="login">
                            <div class="form-row cf">
                                <label for="email">E-mail *</label>
                                <input type="text"
                                    require="required" id="email" name="email">
                            </div>

        <div class="form-row cf">
                                <label for="senha">Senha *</label>
                                <input type="password"
                                    require="required" id="senha" name="senha">
                            </div>
    </div>


    </div>

    
    <div class="form-row col-100 cf">
                                <button class="btn btn-success"
                                    type="submit">Acessar</button>
                            </div>
  
  
</body>

</html>