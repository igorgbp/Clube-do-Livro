<?php

define('_BASE', $_SERVER['DOCUMENT_ROOT'] . '/loja/');
    require_once _BASE . 'phpDocs/conexao.php';
    require_once _BASE . 'phpDocs/cliente.php';
    require_once _BASE . 'dao/daoCliente.php';

$email = filter_input(INPUT_POST, 'email');
$senha = filter_input(INPUT_POST, 'senha');

echo ($email);
echo ('<br>');
echo ($senha);
echo ('<br>');
var_dump(($senha));



$cliente = new Cliente();
$cliente->setEmail($email);
$cliente->setSenha($senha);


$daoCliente = new DaoCliente();
if ($daoCliente->VerificaLogin($cliente)) {
// echo "<script language='javascript' type='text/javascript'>
// alert('Usuário cadastrado com sucesso!');window.location.
// href='../Screens/Home/index.html'</script>";
header('location: ../Screens/Home/index.php');
} else {
echo 'NAO TEM ';
}
