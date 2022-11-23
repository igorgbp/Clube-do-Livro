<?php
class DaoCliente
{
    public function list()
    {
        $list = [];
        $pst = Conexao::getPreparedStatement('select * from Cliente');
        $pst ->execute();
        $list = $pst -> fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }

    public function Novo_cliente (Cliente $cliente)
    {
        $sql = 'insert into Cliente ( nome, email, senha) values (?,?,?)';
        $pst = Conexao::getPreparedStatement($sql);
        // $pst -> bindValue(1, $cliente->getId_cliente());
        $pst -> bindValue(1, $cliente->getNome());
        $pst -> bindValue(2, $cliente->getEmail());
        $pst -> bindValue(3, $cliente->getSenha());
        if ($pst -> execute ()) {
            return true;
        }   else {
            return false;
        }
    }

    public function exclui (Cliente $cliente)
    {
        $sql = 'delete from Cliente where id_cliente = ?';
        $pst = Conexao::getPreparedStatement($sql);
        $pst -> bindValue(1, $cliente->getId_cliente());
        if ($pst -> execute()){
            return true;
        }else {
            return false;
        }
    }


    public function update (Cliente $cliente)
    {
        $sql = 'update Cliente set nome = ?, cpf = ?, email = ? where id_cliente = ?';
        $pst = Conexao::getPreparedStatement($sql);
        $pst -> bindValue(1, $cliente->getNome());
        $pst -> bindValue(2, $cliente->getCpf());
        $pst -> bindValue(3, $cliente->getEmail());
        $pst -> bindValue(4, $cliente->getId_cliente());

        if ($pst ->execute())
        {
            return true;
        }else {
            return false;
        }
    }
    public function busca (Cliente $cliente)
    {
        $list = [];
        $pst = Conexao::getPreparedStatement('select * from Cliente where id_cliente= ?');
        $pst -> bindValue(1, $cliente->getId_cliente());
        $pst ->execute();
        $list = $pst -> fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }

    public function VerificaLogin (Cliente $cliente)
    {
        $list = [];
        $pst = Conexao::getPreparedStatement('select * from Cliente where email = ? and senha = ?');
        $pst -> bindValue(1, $cliente->getEmail());
        $pst -> bindValue(2, $cliente->getSenha());

        $pst ->execute();
        $list = $pst -> fetchAll(PDO::FETCH_ASSOC);
        if (count($list)>0) {
            return true;
        }else return false;
        echo($list);
        return $list;
    }

}