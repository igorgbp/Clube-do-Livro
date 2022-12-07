<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php
        ini_set('error_reporting', E_ALL); // mesmo resultado de: error_reporting(E_ALL);
        ini_set('display_errors', 1);
                define('_BASE', $_SERVER['DOCUMENT_ROOT'] . '/Clube-do-Livro/');

                require_once _BASE . 'phpDocs/conexao.php';
                require_once _BASE . 'produto/produto.php';
                require_once _BASE . 'dao/daoProduto.php';
                $dp = new DaoProduto();
                $list = $dp->listaProduto();
                
                ?>
    </div>
</body>
</html>