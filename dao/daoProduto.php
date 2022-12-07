

<?php

ini_set('error_reporting', E_ALL); // mesmo resultado de: error_reporting(E_ALL);
ini_set('display_errors', 1);
class DaoProduto
{
    public function listaProduto()
    {
        $list = [];
        $pst = Conexao::getPreparedStatement('select * from Produto');
        $pst -> execute();
        $list = $pst -> fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }
}