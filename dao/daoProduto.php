<?php
class DaoProduto
{
    public function listaProduto()
    {
        $list = [];
        $pst = Conexao::getPreparedStatement('select * from Produto');
        $pst ->execute();
        $list = $pst -> fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }

    

}