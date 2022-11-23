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
        <h1>ASDF</h1>
    </div>
    <div class="down">
        <div>


            <div class='card'>
                <?php
                define('_BASE', $_SERVER['DOCUMENT_ROOT'] . '/loja/');

                require_once _BASE . 'phpDocs/conexao.php';
                require_once _BASE . 'produto/produto.php';
                require_once _BASE . 'dao/DaoProduto.php';
                $dp = new DaoProduto();
                $list = $dp->listaProduto();

                ?>
                
                <p>

                </p>

                <?php
                

                foreach ($list as $indice => $valor) {

                    foreach ($valor as $item => $dado) {

                        if ($item == 'nome') {
                            echo ($dado);
                        }
                        if ($item == 'descricao') {
                            echo ($dado);
                        }

                        echo '</br>';
                    }
                }
                ?>
            </div>


        </div>
    </div>
</body>

</html>