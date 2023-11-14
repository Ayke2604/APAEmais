<link rel='stylesheet' type='text/css' media='screen' href='../css/duvidas.css'>

<br>
<br>
<div class="card">
    <div class="card-header">
        <h1 class="titulo">Centro que Perguntas</h1>
    </div>
    <?php if (isset($_SESSION['login'])): ?>
    <div class="ola">
        <p class="ola">Olá <?php echo $_SESSION['login']['usuario']['nome']?>!
        <a href="core/usuario_repositorio.php?acao=logout"
        class="btn btn-link btn-sm" role="button">Sair</a></p>
    </div>
   
    <?php endif ?>
</div>