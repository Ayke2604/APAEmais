<!DOCTYPE html>
<html>
    <head>
    <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>laços que transformam</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='../css/usuarios.css'>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    </head>
<html>
    <head>
        <title>Usuários | Projeto para Web com PHP</title>
        <link rel="stylesheet"
            href="lib/bootstrap-4.2.1-dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                        include 'includes/topo.php';
                        include 'includes/valida_login.php';
                        if($_SESSION['login']['usuario']['adm'] !==1){
                            header('Location: index.php');
                        }
                    ?>
                </div>
            </div>
        <div class="row" style="min-height: 500px;">
            <div class="col-md-12">
                <?php include 'includes/menu.php'; ?>
            </div>
            <div class="col-md-12" style="padding-top: 50px;">
                <?php include 'includes/busca.php'; ?>
                <?php
                        require_once 'includes/funcoes.php';
                        require_once 'core/conexao_mysql.php';
                        require_once 'core/sql.php';
                        require_once 'core/mysql.php';

                        foreach($_GET as $indice => $dado){ //como funciona esse comando
                            $$indice = limparDados($dado);
                        }

                        $data_atual = date('Y-m-d H:i:s');

                        $criterio = [];

                        if(!empty($busca)){
                            $criterio[] = ['nome', 'like', "%{$busca}%"];
                        }

                        $result = buscar(
                            'usuario',
                            [
                                'id',
                                'nome',
                                'email',
                                'data_criacao',
                                'ativo',
                                'adm'
                            ],
                            $criterio,
                            'data_criacao DESC, nome ASC'
                        );

                    ?>
                    <table class="table table-bordered table-hover table-striped
                        table-responsive{-sm|-md|-lg|-xl}">
                    <thead>
                        <tr id="customers">
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Data cadastro</th>
                            <th>Ativo</th>
                            <th>Administrador</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($result as $entidade):
                                $data = date_create($entidade['data_criacao']);
                                $data = date_format($data, 'd/m/Y H:i:s');
                        ?>
                        <tr id="customers">
                            <td><?php echo $entidade['nome'] ?></td>
                            <td><?php echo $entidade['email'] ?></td>
                            <td><?php echo $data ?></td>
                            <td><a href='core/usuario_repositorio.php?acao=status&id=<?php echo $entidade['id']?> &valor=<?php echo !$entidade['ativo']?>'><?php echo ($entidade['ativo']==1)  ? 'Desativar' : 'Ativar'; ?> </a></td>
                            <td><a href='core/usuario_repositorio.php?acao=adm&id=<?php echo $entidade['id']?> &valor=<?php echo !$entidade['adm']?>'><?php echo ($entidade['adm']==1)  ?  'Rebaixar' : 'Promover'; ?> </a></td>
                        </tr> <!--ele vai pro usuario_repositorio.php, a ação é status, e o-->
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
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