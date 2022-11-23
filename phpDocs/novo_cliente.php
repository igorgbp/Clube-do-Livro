<?php    define('_BASE', $_SERVER['DOCUMENT_ROOT'] . '/clube-do-livro/');
    require_once _BASE . 'phpDocs/conexao.php';
    require_once _BASE . 'phpDocs/cliente.php';
    require_once _BASE . 'dao/daoCliente.php';

    // $id_cliente = filter_input(INPUT_POST, 'id_cliente');
    $nome = filter_input(INPUT_POST, 'nome');
    $email = filter_input(INPUT_POST, 'email');
    $senha = filter_input(INPUT_POST, 'senha');
    // echo ($id_cliente);
    // echo ('<br>');
    echo ($nome);
    echo ('<br>');
    echo ($email);
    echo ('<br>');
    echo ($senha);
    echo ('<br>');

    $cliente = new Cliente();
    // $u->setId_cliente($id_cliente);
    $cliente->setNome($nome);
    $cliente->setEmail($email);
    $cliente->setSenha($senha);


    $daoCliente = new DaoCliente();
    if ($daoCliente->Novo_cliente($cliente)) {
    echo 'cadastro realizado';
    } else {
    echo 'erro ao cadastrar';
    }
