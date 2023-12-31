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
<div class="col-md-12">
                    <!-- Topo //-->
                    <?php
                        include 'includes/menu.php';
                    ?>
                </div>

    <form method="post" action="core/usuario_repositorio.php" id="contact-form" class="form cf">
        <h3 class="col-100">Cadastro</h3>
    
        <div class="col cf">
        <input type="hidden" name="acao"
                               value="<?php echo empty($id) ? 'insert' : 'update' ?>"><!-- o ? age como um "if"
                               o que esta a esquerda é caso seja verdade, o que esta a direita é falso-->
                        <input type="hidden" name="id"
                               value="<?php echo $entidade['id'] ?? '' ?>"> <!-- Uma maneira mais redundante,
                            o caso seja verdade é a propia comparação, e o falso é apos as 2 interrogações-->
                        <div class="form-row cf">
                            <label for="nome">Nome *</label>
                            <input class="form-row cf" type="text"
                                required id="nome" name="nome"
                                value="<?php echo $entidade['nome'] ?? '' ?>">
                        </div>

            
            <div class="form-row cf">
                            <label for="email">Email *</label>
                            <input class="form-control" type="text"
                                required id="email" name="email"
                                value="<?php echo $entidade['email'] ?? '' ?>">
                        </div> 

                        
                        <div class="form-row cf">
                            <label for="senha">Senha *</label>
                            <input class="form-control" type="password"
                                required id="senha" name="senha">
                        </div>
        </div>
        
    
        
    
        <div class="form-row col-100 cf">
            <input type="submit" name="submit" value="Enviar" class="btn send-btn">
        </div>
    </form>
  <script src='../js/login.js'></script>
</body>

</html>