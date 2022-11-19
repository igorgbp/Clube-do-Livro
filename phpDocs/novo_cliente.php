<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    define('_BASE', $_SERVER['DOCUMENT_ROOT'] . '/clube-do-livro/');
    require_once _BASE . 'phpDocs/conexao.php';
    require_once _BASE . 'phpDocs/cliente.php';
    require_once _BASE . 'dao/daoCliente.php';

    // $id_cliente = filter_input(INPUT_POST, 'id_cliente');
    $nome = filter_input(INPUT_POST, 'nome');
    $cpf = filter_input(INPUT_POST, 'cpf');
    $email = filter_input(INPUT_POST, 'email');
    $senha = filter_input(INPUT_POST, 'senha');
    // echo ($id_cliente);
    // echo ('<br>');
    echo ($nome);
    echo ('<br>');
    echo ($cpf);
    echo ('<br>');
    echo ($email);
    echo ('<br>');
    echo ($senha);
    echo ('<br>');

    $cliente = new Cliente();
    // $u->setId_cliente($id_cliente);
    $cliente->setNome($nome);
    $cliente->setCpf($cpf);
    $cliente->setEmail($email);
    $cliente->setSenha($senha);


    $daoCliente = new DaoCliente();
    if ($daoCliente->Novo_cliente($cliente)) {
        echo 'cadastro realizado';
    } else {
        echo 'erro ao cadastrar';
    }


    ?>
    <form action='new.php'>
        <button> voltar</button>
    </form>
    <form action='seeUserData.php'>
        <button> Ver usuarios </button>
    </form>
</body>

</html>