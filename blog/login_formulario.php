
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




  <header>
    <a href="#"><img src="../img/Logo2.png" class="logo"></a>
    <div class="menu-toggle"></div>
    <nav>
      <ul>
        <li><a href="../index.html" class="active">Início</a></li>
        <li><a href="#">Sobre nós</a></li>
        <li><a href="#">Contatos</a></li>
        <li><a href="#">Logar</a></li>
        <li><a href="cadastro.html">Cadastrar</a></li>
      </ul>
    </nav>
    <div class="clearfix"></div>
  </header>


  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      $('.menu-toggle').click(function () {
        $('.menu-toggle').toggleClass('active')
        $('nav').toggleClass('active')
      })
    })
  </script>

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