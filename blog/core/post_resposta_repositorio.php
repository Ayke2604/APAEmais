<?php
session_start();
require_once '../includes/valida_login.php';
require_once '../includes/funcoes.php';
require_once 'conexao_mysql.php';
require_once 'sql.php';
require_once 'mysql.php';

foreach($_POST as $indice => $dado) {
    $$indice = limparDados($dado);
}

foreach($_GET as $indice => $dado) {
    $$indice = limparDados($dado);
}


switch($acao){
    case 'insert':
        $trimmed = trim($texto);

       
        $dados =[
            'titulo' => $titulo,
            'texto' => $texto,
            'fk_id_post' => $id_post,
            'usuario_id' => $_SESSION['login']['usuario']['id']
        ];

       
        insere(
            'resposta',
            $dados
        );
        
        
        break;

}

header('Location: ../index.php');