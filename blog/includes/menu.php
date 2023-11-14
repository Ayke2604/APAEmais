<header>
    <a href="#"><img src="../img/Logo2.png" class="logo"></a>
    <div class="menuuu"></div>
    <nav>
      <ul>
       <li><a href="../index.html" class="active">Início</a></li>
        <li><a href="#">Sobre nós</a></li>
        
        <li class="nav-item">
                <a  href="usuario_formulario.php">Cadastre-se</a>
            </li>
            
            <li class="nav-item">
                <a href="login_formulario.php">Logar</a>
            </li>
            <?php if((isset($_SESSION['login']))):?>
            <li class="nav-item">
                <a class="nav-link" href="post_formulario.php">Incluir Post</a>
            </li>
            <?php endif; ?>
            <?php if((isset($_SESSION['login'])) //checa se esta logado e se o adm é = 1
                && ($_SESSION['login']['usuario']['adm'] === 1)) : ?>
            <li class="nav-item">
                <a class="nav-link" href="usuarios.php">Usuários</a>
            </li>
            <?php endif; ?>  
            <li class="nav-item">
                <a  href="index.php">Forum</a>
            </li>
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
