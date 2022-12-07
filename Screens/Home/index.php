<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div class="up">
        <h1>ASDadfF</h1>
    </div>
    <?php
        ini_set('error_reporting', E_ALL); // mesmo resultado de: error_reporting(E_ALL);
        ini_set('display_errors', 1);
        define('_BASE', $_SERVER['DOCUMENT_ROOT'] . '/Clube-do-Livro/');

        require_once _BASE . 'phpDocs/conexao.php';
        require_once _BASE . 'produto/produto.php';
        require_once _BASE . 'dao/daoProduto.php';
        $dp = new DaoProduto();
        $list = $dp->listaProduto();

        echo ($list)
        
        // foreach ($list as $indice => $valor) {

        //     foreach ($valor as $item => $dado) {

        //         if ($item == 'nome') {
        //             echo ($dado);
        //         }
        //         if ($item == 'descricao') {
        //             echo ($dado);
        //         }

        //         echo '</br>';
        //     }
        // }


        
     ?>


    <div class="down">
            <?php
            
            
            ?>
            <div class='card'>
                
                    <h1 class='name_product'>nome do produto</h1>

                    <h1 class = 'description_product'>descição aqui eu não sei o que colocar pra apenas adicionar coisas</h1>
            </div>       
        
    </div>
</body>

</html>